<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php'
?>

<body style="background-color: white;">
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Page Content -->
<div class="kt-container px-0">
    <div class="banner productPortfolioBanner">
        <img src="/images/project/productBanner.jpg" class="bannerImg">
        <div class="bannerText">
            <label class="bannerTitle mb-2"><?php echo $translations['M02815'][$language]; //Shopping Cart ?></label>
            <!-- <div class="bannerSubtitle">
                <span class="bannerSubtitle01">Home</span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02">Shopping Cart</span>
            </div> -->
        </div>
    </div>

    <div class="shoppingCartSection">
        <div class="cartTableDiv table-responsive">
            <div id="buildCart">
                <!-- <table class="blackFont cartTable table table-striped table-bordered no-footer m-0">
                    
                    <tr class="grayFont tableContent">
                        <td class="blackFont">
                            <i class="fa fa-times fa-lg removeBtn"></i>
                        </td>
                        <td>
                            Lavender Oil
                        </td>
                        <td class="text-center">
                            975,000
                        </td>
                        <td class="text-center">
                            100
                        </td>
                        <td class="text-center">
                            <div class="row productDesc">
                                <div class="productInputBox2 input-group">
                                    <div class="input-group-append inputGroupBtn remove">
                                        <div class="inputAppendIcon">-</div>
                                    </div>
                                    <input type="text" class="form-control" style="text-align: center;" value="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" />
                                    <div class="input-group-append inputGroupBtn add">
                                        <div class="inputAppendIcon">+</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            975,000
                        </td>
                    </tr>
                </table> -->
            </div>
        </div>
        <div class="row d-flex justify-content-between mt-4">
            <!-- <div class="col-md-4 mt-3 cartPVDisplay">
                <?php echo $translations['M03401'][$language]; //PV Earned ?>: <span id="totalPV"></span>
            </div>
            <div class="col-md-4 mt-3 cartRPDisplay loginDiv">
                <?php echo $translations['M03133'][$language]; //Total?> <?php echo $translations['M03519'][$language]; /* Instant Profit */?> <span id="currency2"></span>: <span id="totalInstant"></span>
            </div>
            <div class="col-md-4 text-md-right mt-3 cartRPDisplay">
                <?php echo $translations['M03133'][$language]; //Total?> <span id="currency"></span>: <span id="totalRP"></span>
            </div> -->
            <?php if($_SESSION['username'] && $_SESSION['username'] !== "") { ?>

                <div class="col-12 mt-5 text-center text-md-right checkoutDiv">
                    <button class="btn btn-primary blue letterSpace checkoutRedirect" data-lang="M03135"><?php echo $translations['M03135'][$language]; /* Proceed to Checkout */?></button>
                    <br>
                    <p class="mt-3 smallText" data-lang="M03134">* <?php echo $translations['M03134'][$language]; /* Taxes and shipping calculated at checkout */?></p>
                </div>

            <?php } else { ?>

                <div class="col-12 mt-5 text-left text-md-right checkoutDiv">
                    <button class="btn btn-primary blue letterSpace triggerLogin" data-lang="M03135"><?php echo $translations['M03135'][$language]; /* Proceed to Checkout */?></button>
                    <br>
                    <p class="mt-3 smallText" data-lang="M03134">* <?php echo $translations['M03134'][$language]; /* Taxes and shipping calculated at checkout */?></p>
                </div>

            <?php } ?>
        </div>
    </div>
    
    
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>
<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="/images/project/warningIcon.png" class="img-fluid">
                <div class="mt-3 modal-title">
                    <?php echo $translations['M02815'][$language]; //Shopping Cart ?>
                </div>
                <div class="mt-3 modalText">
                    <?php echo $translations['M03395'][$language]; //Doing this action will remove the item from your cart, are you sure you want to do this? ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-default" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
                 <button id="confirmRemoveBtn" type="button" class="ml-3 btn btn-primary" data-dismiss="modal" data-lang="M02664">
                    <?php echo $translations['M02664'][$language]; //Confirm ?>
                 </button>
            </div>
        </div>
    </div>
</div>

</html>

<link href="css/slick.css" rel="stylesheet" type="text/css" />
<link href="css/slick-theme.css" rel="stylesheet" type="text/css" />
<script src="js/slick.min.js" type="text/javascript"></script>
<script src="js/slick.js" type="text/javascript"></script>

<script>

var url             = 'scripts/reqDefault.php';
var jsonUrl         = 'json/productList.json';
var imgPath         = '<?php echo $config['tempMediaUrl'] ?>inv/';
var currentLang     = '<?php echo $_SESSION['language']; ?>';
var currentCID = 100;
var jsonData;


var countryID = '<?php echo $_SESSION['countryID'] ?>' || ""
var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;
var getStartKitFlag;
var placementPositionFlag;

var removeID;



$(document).ready(function() {
    placementPositionFlag = localStorage.getItem('hasplacementPosition')
    getStartKitFlag = localStorage.getItem('starterKitPurchased')
    if (countryID) {
        currentCID = countryID
    }

    if (sessionID != '') {
        isLoggedIn = true
    }


    $.getJSON(jsonUrl, function( data ) {
        jsonData = data;

        getCurrency(currentCID, jsonData.curList)

        buildCart(jsonData);
    });
    

    $("#currency").html("("+getCurrency()+")")
    $("#currency2").html("("+getCurrency()+")")

    

    $('.checkoutRedirect').click(function(){
        var cartList  = getPackageAry(); 
        var kycStatus = getKYC();

        if (cartList.length>0) {
            if (kycStatus) {
                if(placementPositionFlag == 0){
                    if(getStartKitFlag == 0){
                        window.location.href = 'placementPositionForm';
                    }
                }else{
                    window.location.href = 'checkout';
                }
            } else {
               showMessage("<?php echo $translations['M02979'][$language]; /* Please verify your KYC before proceed. */?>", "info", "<?php echo $translations['M02464'][$language]; /* KYC Verification */?>", "", "kyc") 
            }
        } else {
            showMessage("<?php echo $translations['M03402'][$language]; /* Your cart is empty. */?>", "info", "<?php echo $translations['M02815'][$language]; /* Shopping Cart */?>")
        }
    });

    $('.triggerLogin').click(function() {
        $('#loginModal').modal()
    })
});



function buildCart (data) {

    cartCountryHandler(data.productList, countryID);

    var cartList  = getCart();
     
    var langList = {
        english: "eng",
        chineseSimplified: "cSim",
        chineseTraditional: "cTra",
        indonesian: "indo"
    };
    var productList = data.productList
    var mergedCartList = []

    $.each(cartList, function(k,v) {

        var singleItem = (productList).filter((item) => item.id == v['packageID'] )


        if (singleItem.length > 0) {

           singleItem = singleItem[0]
           singleItem['quantity'] = v['quantity']
           singleItem['disabled'] = v['disabled']
           mergedCartList.push(singleItem) 

        } else {

           mergedCartList.push(v)
           var index = mergedCartList.findIndex(x => x.packageID === v['packageID']);
           mergedCartList[index].disabled = 1
           mergedCartList[index].expired = 1

        }
    })

    var buildCart = "";
    if(countryID != 0){
        var cartHeader = `
            <table id="cartTable" class="blackFont cartTable table table-striped table-bordered no-footer m-0">
                <thead>
                    <tr class="tableHeader2">
                        <th style="width:15%;">
                        </th>
                        <th style="width:15%;" >
                            <?php echo $translations['M02990'][$language]; /* Product */?>
                        </th>
                        <th style="width:10%;" id="retailPrice" class="text-center" >
                            <?php echo $translations['M03520'][$language]; /* Retail Price */?> (${getCurrency()})
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03519'][$language]; /* Instant Profit */?> (${getCurrency()})
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03129'][$language]; /* Price */?> (${getCurrency()})
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03130'][$language]; /* PV */?>
                        </th>
                        <th style="width:15%;" class="text-center" >
                            <?php echo $translations['M02246'][$language]; /* Quantity */?>
                        </th>
                        <th style="width:15%;" class="text-center" >
                            <?php echo $translations['M03131'][$language]; /* Subtotal */?> (${getCurrency()})
                        </th>
                    </tr>               
                </thead>
        `;
    }else{
        var cartHeader = `
            <table id="cartTable" class="blackFont cartTable table table-striped table-bordered no-footer m-0">
                <thead>
                    <tr class="tableHeader2">
                        <th style="width:15%;">
                        </th>
                        <th style="width:15%;" >
                            <?php echo $translations['M02990'][$language]; /* Product */?>
                        </th>
                        <th style="width:10%;" id="retailPrice" class="text-center" >
                            <?php echo $translations['M03520'][$language]; /* Retail Price */?> (-)
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03519'][$language]; /* Instant Profit */?> (-)
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03129'][$language]; /* Price */?> (-)
                        </th>
                        <th style="width:10%;" class="text-center" >
                            <?php echo $translations['M03130'][$language]; /* PV */?>
                        </th>
                        <th style="width:15%;" class="text-center" >
                            <?php echo $translations['M02246'][$language]; /* Quantity */?>
                        </th>
                        <th style="width:15%;" class="text-center" >
                            <?php echo $translations['M03131'][$language]; /* Subtotal */?> (-)
                        </th>
                    </tr>               
                </thead>
        `;
    }
    

    buildCart += cartHeader;


    var totalPV = 0;
    var totalRP = 0;
    var totalInstant = 0;

    var cartEmptyDisplay = `
        </table>
        <div class="my-5 text-center">
            <div class="mb-3"><img src="images/project/no-results.png" width="80px"></div>
            <div class="noResultTxt"><?php echo $translations['M03402'][$language]; /* Your cart is empty. */?></div>
        </div>
    `

    if (mergedCartList.length>0) {

        var buildCartItem = "";

        $.each(mergedCartList, function(k,v) {

            if (v['expired'] == '1') {

                var unitPrice = 0

                var subtotal = 0
                var subtotalPV = 0

                var imgUrl;
                if(v['img'])
                    imgUrl = v['img'][0];
                var nameDisplay = v['packageName']

                buildCartItem += `
                    <tr class="grayFont tableContent unavailableItem" productID="${v['packageID']}">
                        <td class="blackFont text-center">
                            <i class="fa fa-times fa-lg removeBtn" onclick=""></i>
                            <img src="<?php echo $config['tempMediaUrl'] ?>inv/${imgUrl}" class="ml-2 shopCartImg">
                        </td>
                        <td>
                            ${nameDisplay}
                        </td>
                        <td class="text-center">
                            -
                        </td>
                        <td class="text-center">
                            -
                        </td>
                        <td class="text-center">
                            -
                        </td>
                        <td class="text-center">
                            -
                        </td>
                        <td class="text-center" style="color: #ff0000">
                            <?php echo $translations['M03454'][$language]; /* Out Of Stock */?> 
                        </td>
                        <td class="text-center">
                            -
                        </td>
                    </tr>
                `


            } else {
                var imgUrl;
                if(v['img'])
                    imgUrl = v['img'][0];
                var nameDisplay = v[langList[currentLang]]['name']

                if (isLoggedIn) {

                    if (v['price'][currentCID]['promo'] == 0) {
                        var memberPrice = v['price'][currentCID]['retail'];
                    } else {
                        var memberPrice = v['price'][currentCID]['promo'];  
                    }

                    var discountPercentage = localStorage.getItem('discountPercentage')
                    var unitPrice;

                    if (discountPercentage == 25) {
                        if (v['price'][currentCID]['mPrice'] > 0) {
                            unitPrice = v['price'][currentCID]['mPrice']
                        } else {
                            unitPrice = getMemberPrice(memberPrice)
                        } 
                    } else if (discountPercentage == 30) {
                       if (v['price'][currentCID]['msPrice'] > 0) {
                           unitPrice = v['price'][currentCID]['msPrice']
                       } else {
                           unitPrice = getMemberPrice(memberPrice)
                       } 
                    }else {
                        unitPrice = memberPrice;
                    }

                    var subtotal = unitPrice * v['quantity']

                    var retailPrice = parseFloat(v['price'][currentCID]['retail'])
                    if(getStartKitFlag != 0){
                        var instantSubtotal = (retailPrice - unitPrice) * v['quantity']
                    }else{
                        var instantSubtotal = 0;
                    }

                    if(discountPercentage == 0) {
                        instantSubtotal = 0
                    }

                } else {

                    var unitPrice = parseFloat(v['price'][currentCID]['retail'])

                    var subtotal = unitPrice * v['quantity']
                }


                var subtotalPV = parseFloat(v['pv']) * v['quantity'] 

                buildCartItem += `
                    <tr class="grayFont tableContent" productID="${v['id']}">
                        <td class="blackFont text-center">
                            <i class="fa fa-times fa-lg removeBtn" onclick=""></i>
                            <img src="<?php echo $config['tempMediaUrl'] ?>inv/${imgUrl}" class="ml-2 shopCartImg">
                        </td>
                        <td>
                            ${nameDisplay}
                        </td>
                        <td class="text-center" id="retailPrice${v['id']}">
                            ${numberThousand(retailPrice, 2)}
                        </td>
                        <td class="text-center" id="instantSubtotal${v['id']}">
                            ${numberThousand(instantSubtotal,2)}
                        </td>
                        <td class="text-center" id="unitPrice${v['id']}">
                            ${numberThousand(unitPrice, 2)}
                        </td>
                        <td class="text-center" id="subtotalPV${v['id']}">
                            ${numberThousand(subtotalPV,2)}
                        </td>
                        <span class="hide" id="unitPV${v['id']}">${v['pv']}</span>
                        <td class="text-center">
                            <div class="row productDesc">
                                <div class="productInputBox2 input-group">
                                    <div class="input-group-append inputGroupBtn remove">
                                        <div class="inputAppendIcon">-</div>
                                    </div>
                                    <input type="text" class="form-control" style="text-align: center;" value="${v['quantity']}" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" id="quantity${v['id']}" readonly/>
                                    <div class="input-group-append inputGroupBtn add">
                                        <div class="inputAppendIcon">+</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center" id="subtotal${v['id']}">
                            ${numberThousand(subtotal,2)}
                        </td>
                    </tr>

                `
            }
        

            totalRP += subtotal;
            if(instantSubtotal && instantSubtotal!="-")
                totalInstant += instantSubtotal;
            totalPV += subtotalPV;
        }) 


        buildCartItem += `
            <tr class="grayFont tableContent">
                <td class="blackFont text-right cartRPDisplay">
                    <?php echo $translations['M03133'][$language]; //Total?>:
                </td>

                <td class="text-center">
                </td>

                <td class="text-center">
                </td>

                <td class="text-center">
                    <span id="totalInstant"></span>
                </td>

                <td class="text-center">
                </td>

                <td class="text-center">
                    <span id="totalPV"></span>
                </td>

                <td class="text-center">
                </td>

                <td class="text-center">
                    <span id="totalRP"></span>
                </td>
            </tr>
        `

        buildCart += `
                <tbody>
                    ${buildCartItem}
                </tbody>
            </table>
        `

    } else {
        buildCart += cartEmptyDisplay;
    }

    $("#buildCart").html(buildCart)
    $("#totalRP").html(numberThousand(totalRP,2))
    $("#totalPV").html(numberThousand(totalPV,2))
    $("#totalInstant").html(numberThousand(totalInstant,2))

    $(".shopCartImg").each(function(){
        if($(this).attr("src") === "<?php echo $config['tempMediaUrl'] ?>inv/undefined")
            $(this).attr("src","/images/project/noProductImg.png")
    })

    if (!isLoggedIn) {
        $('#cartTable tbody tr td:nth-child(3)').hide();
        $('#cartTable thead tr th:nth-child(3)').hide();

        $('#cartTable tbody tr td:nth-child(4)').hide();
        $('#cartTable thead tr th:nth-child(4)').hide();

        $(".loginDiv").css({"display":"none"});
    } 

}

function renderCalc (productID, type) {

    var instantProfit = 0;
    var newSubtotalInstant = 0;
    var totalInstant = 0;
    var newTotalInstant = 0;
    var thisQty = $("#quantity"+productID).val();
    var unitPrice = parseFloat($("#unitPrice"+productID).html().replace(/,/g, ''));
    var retailPrice = parseFloat($("#retailPrice"+productID).html().replace(/,/g, ''));
    var unitPV = parseFloat($("#unitPV"+productID).html());

    var newPV = thisQty * unitPV
    var newSubtotalRP = thisQty * unitPrice


    var totalPV = parseFloat($("#totalPV").html().replace(/,/g, ''));
    var totalRP = parseFloat($("#totalRP").html().replace(/,/g, ''));

    if(getStartKitFlag != 0){
        instantProfit = retailPrice - unitPrice;
        newSubtotalInstant = thisQty * instantProfit;
        totalInstant = parseFloat($("#totalInstant").html().replace(/,/g, ''));
    }

    var newTotalPV;
    var newTotalRP;
    var newTotalInstant;

    switch (type) {
        case 'inc':
            newTotalPV = totalPV + unitPV;
            newTotalRP = totalRP + unitPrice;
            if(getStartKitFlag != 0){
                newTotalInstant = totalInstant + instantProfit;
            }
            break;
        case 'dec':
            newTotalPV = totalPV - unitPV;
            newTotalRP = totalRP - unitPrice;
            if(getStartKitFlag != 0){
                newTotalInstant = totalInstant - instantProfit;
            }
            break;
    }   


    $("#subtotalPV"+productID).html(numberThousand(newPV, 2))
    $("#subtotal"+productID).html(numberThousand(newSubtotalRP, 2))
    $("#instantSubtotal"+productID).html(numberThousand(newSubtotalInstant, 2))

    $("#totalPV").html(numberThousand(newTotalPV, 2))
    $("#totalRP").html(numberThousand(newTotalRP, 2))
    $("#totalInstant").html(numberThousand(newTotalInstant, 2))


}


$(document).on("click", ".add", function() {
    var productID = $(this).parents('.tableContent').attr('productID')
    var qty = $(this).siblings('input').val();
    qty++;
    $(this).closest('td').find('input').val(qty);

    if (isLoggedIn) {
        incBackendItem(productID)
    } else {
        updateItem(productID, qty); 
    }

    renderCalc(productID, 'inc')
    // buildCart(jsonData);
})

$(document).on("click", ".remove", function() {
    var productID = $(this).parents('.tableContent').attr('productID')
    var qty = $(this).siblings('input').val();
    qty--;

    if (qty > 0) {
       $(this).siblings('input').val(qty); 

       renderCalc(productID, 'dec')

       if (isLoggedIn) {
            decBackendItem(productID)
       } else {
           updateItem(productID, qty); 
       }

    } else {

        $(this).siblings('input').val(1);

    }


    
    // buildCart(jsonData);
})

$(document).on("click", ".removeBtn", function() {
    removeID = $(this).parents('.tableContent').attr('productID')
    $("#removeModal").modal()
})


$(document).on("click", "#confirmRemoveBtn", function() {

    removeItem(removeID, 0);

    setTimeout(() => {
        buildCart(jsonData)
    }, 1000)

})






</script>
