<script>

var url             = '/scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;


var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;


$(document).ready(function() {

    if (sessionID != '') {
        isLoggedIn = true
    }


})


// window.addEventListener("unload", function (e) {
//     if (isLoggedIn) {
       
//     }
// });


//Backend Cart

function getBackendCart () {

    var formData  = {
        command: 'getShoppingCart'

    };
    var fCallback = syncCart;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

}

function syncCart (data, message) {

    saveCart(data.cartList)

}



function updateBackendCart() {

    var cartList = getCart()

    if (cartList && cartList.length>0) {

        var formData  = {
            command: 'updateShoppingCart',
            package: cartList

        };
        var fCallback = updateBackendCartCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    } else {

        getBackendCartPostLogin()

    }

}

function updateBackendCartCallback (data, message) {
    getBackendCartPostLogin()
}


function getBackendCartPostLogin (data, message) {
    var formData  = {
        command: 'getShoppingCart'

    };
    var fCallback = syncCartPostLogin;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}


function syncCartPostLogin (data, message) {

    saveCart(data.cartList, 1)

}



function addBackendCart(packageID, quantity) {

    var type = 'add'

    var formData  = {
        command: 'addShoppingCart',
        packageID,
        quantity,
        type

    };
    var fCallback = addBackendCartCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
}

function addBackendCartCallback (data, message) {
    getBackendCart()
}





function incBackendItem(packageID) {

    var type = 'inc'

    var formData  = {
        command: 'addShoppingCart',
        packageID,
        type

    };
    var fCallback = incBackendItemCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

}

function incBackendItemCallback (data, message) {
    getBackendCart()
}



function decBackendItem(packageID) {

    var type = 'dec'

    var formData  = {
        command: 'addShoppingCart',
        packageID,
        type

    };
    var fCallback = decBackendItemCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

}

function decBackendItemCallback (data, message) {
    getBackendCart()
}



function removeBackendItem(packageID) {
    var formData  = {
        command: 'removeShoppingCart',
        packageID

    };
    var fCallback = removeBackendItemCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function removeBackendItemCallback(data, message) {
    getBackendCart()
}



//Frontend Cart

function saveCart(cartList, isPostLogin) {

    localStorage.setItem('cartList', JSON.stringify(cartList))

    if(!isPostLogin) {
        renderCartNo();
    } else {
        if(window.location.pathname == "/shoppingCart") {
            window.location.href = "shoppingCart";
        } else{
            window.location.href = "dashboard";
        }
    }
}

function getCart () {
    
    //Get local storage cart list
    var cartList = JSON.parse(localStorage.getItem('cartList')) || []

    if (cartList.length>0 && cartList[0].productID) {
        clearCart()
        getCart()
    }

    return cartList
}


function getPackageAry () {

    var cartList = JSON.parse(localStorage.getItem('cartList'))

    var packageAry = (cartList).filter((item) => item.disabled == 0)    

    packageAry = packageAry.map(({disabled, packageName, img,  ...rest}) => {
      return rest;
    });

    return packageAry

}


function renderCartNo() {

    var cartList  = getCart()

    //calculate total quantity
    var cartNo = 0;
    $.each(cartList, function(k,v) {
        cartNo += v['quantity']
    })

    if (cartNo > 0) {
        if (cartNo > 99) {
            $(".cartNo").html('...')
        } else {
            $(".cartNo").html(cartNo)
        }
        $(".cartNo").show()
    } else {
        $(".cartNo").hide() 
    }

}


function addItem (productID, quantity) {

    if (typeof quantity == "string") {
        quantity = parseInt(quantity)
    }

    if (typeof productID == "string") {
        productID = parseInt(productID)
    }

    if (isLoggedIn) {
        addBackendCart(productID, quantity)
    } else {

        var cartList  = getCart()

        var checkDuplicate = (cartList).filter((item) => item.packageID == productID )

        if (checkDuplicate.length > 0) {

            var thisItem = checkDuplicate[0]

            thisItem.quantity += quantity

            var newCartList = (cartList).filter((item) => item.packageID !== productID )

            newCartList.push(thisItem)

            cartList = newCartList


        } else {

            var newItem = {
                packageID: productID,
                quantity
            }

            cartList.push(newItem)

        }

        saveCart(cartList)
    }

    $("#addCartModal").modal()
}


function removeItem (productID, quantity) {

    //Pass quantity="0" for remove all

    if (typeof quantity == "string") {
        quantity = parseInt(quantity)
    }

    if (typeof productID == "string") {
        productID = parseInt(productID)
    }


    if (isLoggedIn) {
        removeBackendItem(productID)
    } else {

        var cartList = getCart()

        var checkExist = (cartList).filter((item) => item.packageID == productID )

        var newCartList = (cartList).filter((item) => item.packageID !== productID )

        if (checkExist.length > 0) {

            var thisItem = checkExist[0]

            if (quantity == 0) {

                //Use newCartList directly 

            } else {

                if (thisItem.quantity > quantity) {
                    thisItem.quantity -= quantity 
                    newCartList.push(thisItem)
                } 

            }

            cartList = newCartList


        } else {

            return alert("Product not exists.")

        }
        
        saveCart(cartList)
    }

}


function updateItem (productID, quantity) {

    //Pass quantity="all" for remove all

    var cartList = getCart()

    var checkExist = (cartList).filter((item) => item.packageID == productID )

    var thisItem = checkExist[0]

    var newCartList = (cartList).filter((item) => item.packageID !== productID )

    thisItem.quantity = quantity 

    newCartList.push(thisItem)
    
    saveCart(cartList)

}


function clearCart () {
    localStorage.removeItem('cartList')
    renderCartNo()
}


function cartCountryHandler (productList, countryID) {


    //Do nothing if it's guest
    if (countryID == "")
        return

    var cartList  = getCart()
    var removedItem = 0 //save how many items have been removed from cart due to country eligibility issue


    var mergedCartList = []

    $.each(cartList, function(k,v) {

        var singleItem = (productList).filter((item) => item.id == v['packageID'] )

        if (singleItem.length > 0) {
           singleItem = singleItem[0]
           singleItem['quantity'] = v['quantity']
           mergedCartList.push(singleItem) 
        } else {
           mergedCartList.push(v)
        }

    })


    $.each(mergedCartList, function(k,v) {
        var countryAry = [];
        var isEligible = false; //true if the package is eligible for this user.
        var disabled = v['disabled'];

        $.each(v['price'], function(k,v) {
            countryAry.push(k)
        })

        $.each(countryAry, function(k,v) {
            if (v == countryID) {
                isEligible = true
            }
        })

        if (v['disabled'] == 1) {
            isEligible = true
            // $.each(countryAry, function(k,v) {
            //     if (v == countryID) {
            //         isEligible = true
            //     }
            // })
        }

        if(countryID == 0){
            removeItem(v['id'], 0)
        }

        if (!isEligible) {
            removedItem ++;
            
        }

    })

    if (removedItem > 0) {
        $("#countryRemoveText").html(removedItem)
        $("#countryRemoveModal").modal();
    }
}


function productCountryHandler (data, countryID) {

    if (countryID == "")
        return data

    if (countryID == 0)
        return data

    // Hide starter kit package if user already purchased starter kit.

    var starterKitPurchased = parseInt(localStorage.getItem('starterKitPurchased'))

    if (starterKitPurchased) {
        var updateProductList = (data.productList).filter((item) => item.str == 0)
        data.productList = updateProductList
    }


    //Hide package which isnt available for user's country

    $.each(data.productList, function(k,v) {

        var countryAry = [];
        var isEligible = false; //true if the package is eligible for this user.

        $.each(v['price'], function(k,v) {
            countryAry.push(k)
        })

        $.each(countryAry, function(k,v) {
            if (v == countryID) {
                isEligible = true
            }
        })

        if (isEligible == false) {
            var updateProductList = (data.productList).filter((item) => item.id !== v['id'] )
            data.productList = updateProductList
        }

    })

    return data
}



//To handle product which added to cart before login, turns out unavailable after logged in
function handleCheckoutError (errorField) {

    var removedItem = errorField.length

    var removePackage = []

    $.each(errorField, function(k,v) {
        var packageID = v['id'].replace('package', '')
        packageID = packageID.replace('Error', '')
        removePackage.push(packageID)
    })

    $.each(removePackage, function(k,v) {
        removeItem(v, 0)
    })

    $("#packageRemoveText").html(removedItem)
    $("#soldOutPackageModal").modal();
    
}

function noStarterKitError (data) {
    showMessage(data.statusMsg, "Error", translations["M02525"][language],"error", "shoppingCart.php");
}

</script>