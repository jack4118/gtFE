<script>

var url             = '/scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;

var userId = '<?php echo $_SESSION['userID'] ?>';
var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;
var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";

$(document).ready(function() {

    if (sessionID != '') {
        isLoggedIn = true
    }

    // Show number of cart items on header
    if((pageName != 'reviewOrder.php') && (pageName != 'checkoutAddress.php') && (pageName != 'confirmOrder.php') && (pageName != 'payment.php')) {
        getNumberOfCartItems();
    }
})

// window.addEventListener("unload", function (e) {
//     if (isLoggedIn) {
       
//     }
// });


//Backend Cart

// function getBackendCart () {

//     var formData  = {
//         command: 'getShoppingCart'

//     };
//     var fCallback = syncCart;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

// }

// function syncCart (data, message) {

//     saveCart(data.cartList)

// }



// function updateBackendCart() {

//     var cartList = getCart()

//     if (cartList && cartList.length>0) {

//         var formData  = {
//             command: 'updateShoppingCart',
//             package: cartList

//         };
//         var fCallback = updateBackendCartCallback;
//         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

//     } else {

//         getBackendCartPostLogin()

//     }

// }

// function updateBackendCartCallback (data, message) {
//     getBackendCartPostLogin()
// }


// function getBackendCartPostLogin (data, message) {
//     var formData  = {
//         command: 'getShoppingCart'

//     };
//     var fCallback = syncCartPostLogin;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
// }


// function syncCartPostLogin (data, message) {

//     saveCart(data.cartList, 1)

// }



// function addBackendCart(packageID, quantity) {

//     var type = 'add'

//     var formData  = {
//         command: 'addShoppingCart',
//         packageID,
//         quantity,
//         type

//     };
//     var fCallback = addBackendCartCallback;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
// }

// function addBackendCartCallback (data, message) {
//     getBackendCart()
// }





// function incBackendItem(packageID) {

//     var type = 'inc'

//     var formData  = {
//         command: 'addShoppingCart',
//         packageID,
//         type

//     };
//     var fCallback = incBackendItemCallback;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

// }

// function incBackendItemCallback (data, message) {
//     getBackendCart()
// }



// function decBackendItem(packageID) {

//     var type = 'dec'

//     var formData  = {
//         command: 'addShoppingCart',
//         packageID,
//         type

//     };
//     var fCallback = decBackendItemCallback;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

// }

// function decBackendItemCallback (data, message) {
//     getBackendCart()
// }



// function removeBackendItem(packageID) {
//     var formData  = {
//         command: 'removeShoppingCart',
//         packageID

//     };
//     var fCallback = removeBackendItemCallback;
//     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
// }

// function removeBackendItemCallback(data, message) {
//     getBackendCart()
// }



// //Frontend Cart

// function saveCart(cartList, isPostLogin) {

//     localStorage.setItem('cartList', JSON.stringify(cartList))

//     if(!isPostLogin) {
//         renderCartNo();
//     } else {
//         if(window.location.pathname == "/shoppingCart") {
//             window.location.href = "shoppingCart";
//         } else{
//             window.location.href = "dashboard";
//         }
//     }
// }

// function getCart () {
    
//     //Get local storage cart list
//     var cartList = JSON.parse(localStorage.getItem('cartList')) || []

//     if (cartList.length>0 && cartList[0].productID) {
//         clearCart()
//         getCart()
//     }

//     return cartList
// }


// function getPackageAry () {

//     var cartList = JSON.parse(localStorage.getItem('cartList'))

//     var packageAry = (cartList).filter((item) => item.disabled == 0)    

//     packageAry = packageAry.map(({disabled, packageName, img,  ...rest}) => {
//       return rest;
//     });

//     return packageAry

// }


// function renderCartNo() {

//     var cartList  = getCart()

//     //calculate total quantity
//     var cartNo = 0;
//     $.each(cartList, function(k,v) {
//         cartNo += v['quantity']
//     })

//     if (cartNo > 0) {
//         if (cartNo > 99) {
//             $(".cartNo").html('...')
//         } else {
//             $(".cartNo").html(cartNo)
//         }
//         $(".cartNo").show()
//     } else {
//         $(".cartNo").hide() 
//     }

// }


// function addItem (productID, quantity) {

//     if (typeof quantity == "string") {
//         quantity = parseInt(quantity)
//     }

//     if (typeof productID == "string") {
//         productID = parseInt(productID)
//     }

//     if (isLoggedIn) {
//         addBackendCart(productID, quantity)
//     } else {

//         var cartList  = getCart()

//         var checkDuplicate = (cartList).filter((item) => item.packageID == productID )

//         if (checkDuplicate.length > 0) {

//             var thisItem = checkDuplicate[0]

//             thisItem.quantity += quantity

//             var newCartList = (cartList).filter((item) => item.packageID !== productID )

//             newCartList.push(thisItem)

//             cartList = newCartList


//         } else {

//             var newItem = {
//                 packageID: productID,
//                 quantity
//             }

//             cartList.push(newItem)

//         }

//         saveCart(cartList)
//     }

//     $("#addCartModal").modal()
// }


// function removeItem (productID, quantity) {

//     //Pass quantity="0" for remove all

//     if (typeof quantity == "string") {
//         quantity = parseInt(quantity)
//     }

//     if (typeof productID == "string") {
//         productID = parseInt(productID)
//     }


//     if (isLoggedIn) {
//         removeBackendItem(productID)
//     } else {

//         var cartList = getCart()

//         var checkExist = (cartList).filter((item) => item.packageID == productID )

//         var newCartList = (cartList).filter((item) => item.packageID !== productID )

//         if (checkExist.length > 0) {

//             var thisItem = checkExist[0]

//             if (quantity == 0) {

//                 //Use newCartList directly 

//             } else {

//                 if (thisItem.quantity > quantity) {
//                     thisItem.quantity -= quantity 
//                     newCartList.push(thisItem)
//                 } 

//             }

//             cartList = newCartList


//         } else {

//             return alert("Product not exists.")

//         }
        
//         saveCart(cartList)
//     }

// }


// function updateItem (productID, quantity) {

//     //Pass quantity="all" for remove all

//     var cartList = getCart()

//     var checkExist = (cartList).filter((item) => item.packageID == productID )

//     var thisItem = checkExist[0]

//     var newCartList = (cartList).filter((item) => item.packageID !== productID )

//     thisItem.quantity = quantity 

//     newCartList.push(thisItem)
    
//     saveCart(cartList)

// }


// function clearCart () {
//     localStorage.removeItem('cartList')
//     renderCartNo()
// }


// function cartCountryHandler (productList, countryID) {


//     //Do nothing if it's guest
//     if (countryID == "")
//         return

//     var cartList  = getCart()
//     var removedItem = 0 //save how many items have been removed from cart due to country eligibility issue


//     var mergedCartList = []

//     $.each(cartList, function(k,v) {

//         var singleItem = (productList).filter((item) => item.id == v['packageID'] )

//         if (singleItem.length > 0) {
//            singleItem = singleItem[0]
//            singleItem['quantity'] = v['quantity']
//            mergedCartList.push(singleItem) 
//         } else {
//            mergedCartList.push(v)
//         }

//     })


//     $.each(mergedCartList, function(k,v) {
//         var countryAry = [];
//         var isEligible = false; //true if the package is eligible for this user.
//         var disabled = v['disabled'];

//         $.each(v['price'], function(k,v) {
//             countryAry.push(k)
//         })

//         $.each(countryAry, function(k,v) {
//             if (v == countryID) {
//                 isEligible = true
//             }
//         })

//         if (v['disabled'] == 1) {
//             isEligible = true
//             // $.each(countryAry, function(k,v) {
//             //     if (v == countryID) {
//             //         isEligible = true
//             //     }
//             // })
//         }

//         if(countryID == 0){
//             removeItem(v['id'], 0)
//         }

//         if (!isEligible) {
//             removedItem ++;
            
//         }

//     })

//     if (removedItem > 0) {
//         $("#countryRemoveText").html(removedItem)
//         $("#countryRemoveModal").modal();
//     }
// }


// function productCountryHandler (data, countryID) {

//     if (countryID == "")
//         return data

//     if (countryID == 0)
//         return data

//     // Hide starter kit package if user already purchased starter kit.

//     var starterKitPurchased = parseInt(localStorage.getItem('starterKitPurchased'))

//     if (starterKitPurchased) {
//         var updateProductList = (data.productList).filter((item) => item.str == 0)
//         data.productList = updateProductList
//     }


//     //Hide package which isnt available for user's country

//     $.each(data.productList, function(k,v) {

//         var countryAry = [];
//         var isEligible = false; //true if the package is eligible for this user.

//         $.each(v['price'], function(k,v) {
//             countryAry.push(k)
//         })

//         $.each(countryAry, function(k,v) {
//             if (v == countryID) {
//                 isEligible = true
//             }
//         })

//         if (isEligible == false) {
//             var updateProductList = (data.productList).filter((item) => item.id !== v['id'] )
//             data.productList = updateProductList
//         }

//     })

//     return data
// }



// //To handle product which added to cart before login, turns out unavailable after logged in
// function handleCheckoutError (errorField) {

//     var removedItem = errorField.length

//     var removePackage = []

//     $.each(errorField, function(k,v) {
//         var packageID = v['id'].replace('package', '')
//         packageID = packageID.replace('Error', '')
//         removePackage.push(packageID)
//     })

//     $.each(removePackage, function(k,v) {
//         removeItem(v, 0)
//     })

//     $("#packageRemoveText").html(removedItem)
//     $("#soldOutPackageModal").modal();
    
// }

// function noStarterKitError (data) {
//     showMessage(data.statusMsg, "Error", translations["M02525"][language],"error", "shoppingCart.php");
// }
var cartList1 = [];
var cartList2 = [];

function newcart(newdata){
    var cartList = [];
    var itemExist = [];
    var otherItems = [];

    cartList1 = getCart();

    if(cartList1){
        itemExist = cartList1.filter((item) => (item.productID).toString() == (newdata.productID).toString() && item.product_attribute_value_id == newdata.product_attribute_value_id);

        if(itemExist && itemExist.length == 1) {
            itemExist[0]['quantity'] = parseFloat(itemExist[0]['quantity']) + parseFloat(newdata.quantity);
            itemExist[0]['total'] = parseFloat(itemExist[0]['total']) + parseFloat(newdata.total);

            otherItems = cartList1.filter((item) => (item.productID).toString() != (newdata.productID).toString() && item.product_attribute_value_id != newdata.product_attribute_value_id);
            if(otherItems && otherItems.length > 0) {
                cartList = otherItems;
                cartList.push(itemExist[0]);
            } else {
                cartList = itemExist;
            }
        } else {
            cartList1.push(newdata);
            cartList = cartList1;
        }

        cartList = cartList1;
    } else {
        cartList.push(newdata);
    }
    
    saveCart(cartList)
}
function saveCart(cartList) {
    

    localStorage.setItem('cartList', JSON.stringify(cartList));
}

function getCart() {
    return JSON.parse(localStorage.getItem('cartList'));
}

function clearCart() {
    localStorage.removeItem('cartList');
}

function updateItemTotal(cartList) {
    if(cartList) {
        $.each(cartList, function(k, v) {
            cartList[k]['total'] = parseFloat(v['price']) * parseFloat(v['quantity']);
        });

        saveCart(cartList);
    }
}

function getTotal(cartList) {
    var subTotal = 0;
    var taxes = 0;  // default value
    var deliveryFee = 0;
    var totalSalePrice = 0;

    if(cartList) {
        deliveryFee = 35; // default value

        $.each(cartList, function(k, v) {
            subTotal += parseFloat(v['total']);
        });

        totalSalePrice = subTotal + taxes + deliveryFee; 
    }

    var totalList = {
        subTotal        : subTotal,
        taxes           : taxes,
        deliveryFee     : deliveryFee,
        totalSalePrice  : totalSalePrice
    };

    return totalList;

}

function getShoppingCart(summary) {
    if(!userId) {
        if(summary) loadSummaryCart();
        else loadShoppingCart();
    } else {
        var formData  = {
            command: 'getShoppingCart'
        };

        var fCallback = '';
        if(summary) fCallback = loadSummaryCart;
        else fCallback = loadShoppingCart;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function loadShoppingCart(data, message) {
    var points;
    var subTotal;
    var taxes;
    var deliveryFee;
    var totalSalePrice;
    var redeemAmount;

    if(data) {
        cartList = data.cartList;
        points = data.Point;
        subTotal = data.subTotal;
        taxes = data.Taxes;
        deliveryFee = data.deliveryFee;
        totalSalePrice = data.totalSalePrice;
        redeemAmount = data.redeemAmount;
        totalPriceAfterDeliveryFee = totalSalePrice;
    } else {
        cartList = getCart();
        var totalList = getTotal(cartList);
        subTotal = totalList.subTotal;
        taxes = totalList.taxes;
        deliveryFee = totalList.deliveryFee;
        totalSalePrice = totalList.totalSalePrice;
        totalPriceAfterDeliveryFee = totalSalePrice;
    }

    if(cartList && cartList.length > 0) {
        var html = '';

        $.each(cartList, function(k, v) {
            html += `
                <tr id="${v['productID']}">
                    <td class="pl-4 py-3 d-flex align-items-center">
                        <img class="orderSummaryImg" src="${v['img']}">
                        <div class="bodyText smaller lightBold ml-3">
                            ${v['productName']}
                `;

                if(v['product_attribute_value_id']) {
                    html += `
                        <br/>(${v['product_attribute_name']})
                    `;
                }

                html += `            
                        </div>
                    </td>
                    <td class="py-4 px-2 text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="button" class="form-control2 px-3 d-flex align-items-center whiteBg bodyText larger lightBold" onclick="decItem(${v['productID']}, ${v['quantity']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')">-</button>
                            <input type="text" id="quantity${v['productID']}" class="form-control2 text-center bodyText larger lightBold" value="${v['quantity']}" style="width: 50px;" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onblur="numItem(${v['productID']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')">
                            <button type="button" class="form-control2 px-3 d-flex align-items-center whiteBg bodyText larger lightBold" onclick="incItem(${v['productID']}, ${v['quantity']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')">+</button>
                        </div>
                    </td>
                    <td class="pr-4 py-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(v['total'], 2)}</div></td>
                    <td><img src="images/project/delete-icon.png" class="pr-4 py-4 text-center removeCartItemIcon" width="35px" onclick="showRemoveConfirmationModal(${v['productID']}, '${v['product_attribute_value_id']}')"></td>
                </tr>
            `;
        });
    } else {
        html += `
            <tr>
                <td colspan="5" class="p-4 text-center">
                    <div class="bodyText smaller lightBold" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                </td>
            </tr>
        `;
    }

    $('#cartList').html(html);
        
    $('#totalPoints').html(numberThousand(points, 0));
    $('#pointsAmount').html(numberThousand(points, 0));
    $('#redeemedAmount').html('-RM' + numberThousand(redeemAmount, 2));
    $('#subtotal').html('RM' + numberThousand(subTotal, 2));
    $('#taxes').html('RM' + numberThousand(taxes, 2));

    if(deliveryFee != "0" || deliveryFee != 0) $('#deliveryFee').html('RM' + numberThousand(deliveryFee, 2));
    else $('#deliveryFee').html('<?php echo $translations['M00061'][$language] /* Free */ ?>');

    $('#totalSalePrice').html('RM' + numberThousand(totalSalePrice, 2));

    loadNumberOfCartItems(data, message);
}

function loadSummaryCart(data, message) {
    var points;
    var subTotal;
    var taxes;
    var deliveryFee;
    var totalSalePrice;
    var redeemAmount;
    cartList = getCart();

    if(data && data.cartList && data.cartList.length > 0) {
        cartList = data.cartList;
        points = data.Point;
        subTotal = data.subTotal;
        taxes = data.Taxes;
        deliveryFee = data.deliveryFee;
        totalSalePrice = data.totalSalePrice;
        redeemAmount = data.redeemAmount;
        totalPriceAfterDeliveryFee = totalSalePrice;
    } else if(cartList && cartList.length > 0) {
        var totalList = getTotal(cartList);
        subTotal = totalList.subTotal;
        taxes = totalList.taxes;
        deliveryFee = totalList.deliveryFee;
        totalSalePrice = totalList.totalSalePrice;
        totalPriceAfterDeliveryFee = totalSalePrice;
    } else {
        showMessage('<?php echo $translations['M03906'][$language] /* Cart is empty. */ ?>', 'warning', '<?php echo $translations['M03907'][$language] /* Empty Cart */ ?>', 'warning', 'foodMenu');
        return;
    }

    if(cartList && cartList.length > 0) {
        var html = '';

        // Summary Cart
        $.each(cartList, function(k, v) {
            html += `
                <tr id="${v['productID']}">
                    <td class="pl-4 pt-4 d-flex align-items-center">
                        <img class="orderSummaryImg" src="${v['img']}">
                        <div class="bodyText smaller lightBold ml-3">
                            ${v['productName']}
            `;

                if(v['product_attribute_value_id']) {
                    html += `
                        <br/>(${v['product_attribute_name']})
                    `;
                }

                html += ` 
                        </div>
                    </td>
                    <td class="py-4 px-2 text-center"><div class="bodyText smaller lightBold">${v['quantity']}</div></td>
                    <td class="pr-4 py-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(v['price'], 2)}</div></td>
                </tr>
            `;
        });
    }

    // Points
    if(userId && pageName == 'checkoutAddress.php') {
        html += `
            <tr>
                <td colspan="2" class="pl-4 pt-4"><div class="bodyText smaller" data-lang="M03817"><?php echo $translations['M03817'][$language] /* Your total points */ ?>:</div></td>
                <td class="pr-4 pt-4 text-right"><div class="bodyText smaller lightBold">${numberThousand(points, 0)}</div></td>
            </tr>
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03818"><?php echo $translations['M03818'][$language] /* Your points amount */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold">${numberThousand(points, 0)}</div></td>
            </tr>
        `;

        var pointsToUse = '<?php echo $_POST['pointsToUse'] ?>';
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03819"><?php echo $translations['M03819'][$language] /* Points to use/redeem */ ?>:</div></td>
                <td class="pr-4 text-right"><input type="text" id="pointsToUse" class="form-control2 text-right bodyText smaller lightBold" style="width: 70px; height: auto;" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="${pointsToUse}"></td>
            </tr>
        `;
    }

    // Seperate Line
    html += `
            <tr>
                <td colspan="3" class="p-4"><div class="borderBottom grey normal"></div></td>
            </tr>
    `;

    // Redeemed Amount
    <?php if(isset($_SESSION['userID'])) { ?>
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03820"><?php echo $translations['M03820'][$language] /* Redeemed Amount */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold text-red">-RM${numberThousand(redeemAmount, 2)}</div></td>
            </tr>
        `;
    <?php } ?>

    // Subtotal
    html += `
        <tr>
            <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M02881"><?php echo $translations['M02881'][$language] /* Subtotal */ ?>:</div></td>
            <td class="pr-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(subTotal, 2)}</div></td>
        </tr>
    `;

    // Taxes
    html += `
        <tr>
            <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03821"><?php echo $translations['M03821'][$language] /* Taxes */ ?>:</div></td>
            <td class="pr-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(taxes, 2)}</div></td>
        </tr>
    `;

    // Total savings 
    html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03822"><?php echo $translations['M03822'][$language] /* Total Savings */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold text-green">RM0.00</div></td>
            </tr>
    `;

    // Delivery Fee
    if(deliveryFee) {
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div></td>
                <td class="pr-4 text-right"><span class="bodyText smaller lightBold text-green text-uppercase" id="deliveryFee">RM${numberThousand(deliveryFee, 2)}</span></td>
            </tr>
        `;

        if(pageName == 'confirmOrder.php') {
            $('#deliveryCharges').html('RM' + numberThousand(deliveryFee, 2));
        }
    } else {
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold text-green text-uppercase" data-lang="M00061"><?php echo $translations['M00061'][$language] /* Free */ ?></div></td>
            </tr>
        `;
    }
    

    // Voucher Applied
    html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="bodyText smaller" data-lang="M03826"><?php echo $translations['M03826'][$language] /* Voucher Applied */ ?>:</div></td>
                <td class="pr-4 text-right">
                    <div class="position-relative">
    `;
    
    if(pageName == 'checkoutAddress.php') {
        html += `
                        <span class="bodyText smaller lightBold text-underline removeVoucher" id="removeVoucher" data-lang="M03827"><?php echo $translations['M03827'][$language] /* Remove */ ?></span>
        `;
    }

    html += `
                        <span class="bodyText smaller lightBold text-red" id="voucherApplied">-RM0.00</span>
                    </div>
                </td>
            </tr>
    `;

    // Seperate Line
    html += `
            <tr>
                <td colspan="3" class="p-4"><div class="borderBottom grey normal"></div></td>
            </tr>
    `;

    // Total
    html += `
        <tr>
            <td colspan="2" class="pl-4 pb-4"><div class="bodyText larger lightBold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div></td>
            <td class="pr-4 pb-4 text-right"><span class="bodyText larger lightBold">RM</span><span class="bodyText larger lightBold" id="totalPrice">${numberThousand(totalSalePrice, 2)}</span></td>
        </tr>
    `;

    $('#cartList').html(html);

    if(pageName == 'confirmOrder.php') {
        cartLoaded = true;
    }

    loadNumberOfCartItems(data, message);
}

function incItem(productId, quantity, stockCount, productTemplate) {
    var newQuantity = ++quantity;

    if(newQuantity > stockCount) {
        showMessage('<?php echo $translations['M03828'][$language] /* The quantity has reached stock limit. */ ?>', 'warning', '<?php echo $translations['M03815'][$language] /* Review Order */ ?>', '', '');
        return;
    }

    if(!userId) {
        updateQuantity(productId, newQuantity, productTemplate);
        getShoppingCart();
    } else {
        var formData  = {
            command             : 'addShoppingCart',
            packageID           : productId,
            quantity            : newQuantity,
            type                : 'inc',
            product_template    : productTemplate
        };
        var fCallback = getShoppingCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function decItem(productId, quantity, stockCount, productTemplate) {
    var newQuantity = --quantity;

    if(newQuantity == 0) {
        showRemoveConfirmationModal(productId, productTemplate);
        return;
    }

    if(!userId) {
        updateQuantity(productId, newQuantity, productTemplate);
        getShoppingCart();
    } else {
        var formData  = {
            command             : 'addShoppingCart',
            packageID           : productId,
            quantity            : newQuantity,
            type                : 'dec',
            product_template    : productTemplate
        };
        var fCallback = getShoppingCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function numItem(productId, stockCount, productTemplate) {
    var quantity = $('#quantity' + productId).val();

    if(quantity == '') {
        getShoppingCart();
        return;
    } else if(quantity == 0) {
        showRemoveConfirmationModal(productId, productTemplate);
        return;
    } else if(quantity > stockCount) {
        showMessage('<?php echo $translations['M03828'][$language] /* The quantity has reached stock limit. */ ?>', 'warning', '<?php echo $translations['M03815'][$language] /* Review Order */ ?>', '', '');
        getShoppingCart();
        return;
    }

    if(!userId) {
        updateQuantity(productId, quantity, productTemplate);
        getShoppingCart();
    } else {
        var formData  = {
            command     : 'addShoppingCart',
            packageID   : productId,
            quantity    : quantity,
            type        : 'num',
            product_template    : productTemplate
        };
        var fCallback = getShoppingCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function updateQuantity(productId, quantity, productTemplate) {
    cartList  = getCart();

    if(cartList) {
        $.each(cartList, function(k, v) {
            if((v['productID']).toString() == (productId).toString() && v['product_attribute_value_id'] == productTemplate) {
                v['quantity'] = quantity;
                return;
            }
        });

        updateItemTotal(cartList);  // will call saveCart in this function

        // saveCart(cartList);
    }
}

function removeItem(productId, productTemplate) {
    cartList  = getCart();

    if(cartList && cartList.length == 1) {
        clearCart();
    } else {
        var newCartList = cartList.filter((item) => (item.productID).toString() != (productId).toString() || item.product_attribute_value_id != productTemplate);
        saveCart(newCartList);
        console.log('')
    }
}

function removeShoppingCart() {
    if(!userId) {
        removeItem(removedProductId, removedProductTemplate);
        getShoppingCart();
    } else {
        var formData  = {
            command             : 'removeShoppingCart',
            packageID           : removedProductId,
            product_template    : removedProductTemplate
        };
        var fCallback = getShoppingCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function getNumberOfCartItems() {
    if(!userId) {
        loadNumberOfCartItems();
    } else {
        var formData  = {
            command   : 'getShoppingCart',
        };
        var fCallback = loadNumberOfCartItems;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function loadNumberOfCartItems(data, message) {
    var numberOfCartItems = 0;
    var html = '';

    html += `
        <img src="images/project/cart-icon.png" width="20px">
        <div class="numOfCartItems">0</div>
    `;

    $('.cartIcon').html(html);

    var cartList;

    if(data) cartList = data.cartList;
    else cartList = getCart();

    if(cartList) {
        $.each(cartList, function(k, v) { numberOfCartItems += parseInt(v['quantity']); });
        $('.numOfCartItems').html(numberOfCartItems);
    }
}

</script>