<script>

var url             = '/scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var cartListIncludePromo = [];

var userId = '<?php echo $_SESSION['userID'] ?>';
var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;
var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
var inputTimer;
var promoToNextPage = '';
var checkoutBtnClicked = false;
var deliveryMethodType;
var redeemAmount;

$(document).ready(function() {

    if (sessionID != '') {
        isLoggedIn = true
    }

    // Show number of cart items on header
    // if((pageName == 'checkoutAddress.php') && (pageName == 'confirmOrder.php') && (pageName == 'payment.php')) {
        getNumberOfCartItems();
    // }
})

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
    
}
function saveCart(cartList) {
    localStorage.setItem('cartList', JSON.stringify(cartList));
}

function getCart() {
    return JSON.parse(localStorage.getItem('cartList'));
}

function getOldCart() {
    return JSON.parse(localStorage.getItem('oldCartList'));
}

function clearCart() {
    localStorage.removeItem('cartList');
}

function updateItemTotal(cartList) {
    if(cartList) {
        $.each(cartList, function(k, v) {
            cartList[k]['total'] = parseFloat(v['price']) * parseFloat(v['quantity']);
        });

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

function incDecItemSuccess(data, message) {
    bkend_token = data['bkend_token'];
    // getShoppingCart(1, promoToNextPage);
    getShoppingCart();
}

function getShoppingCart(postcode) {
    showCanvas(); 

    var bkend_token = '<?php echo $_SESSION['bkend_token'] ?>';
    var redeemAmount = $('#pointsToUse').val();
    var promoToNextPage = $('#PromoCodeInput').val();
    var postcode = $("#postcode").val();
    var step = "";

    if(window.location.href.indexOf("reviewOrder") != -1){
        step = 1;

    }else if(window.location.href.indexOf("checkoutAddress") != -1){
        step = 2;
    }


    var deliveryMethod = "";
    if(window.location.href.indexOf("confirmOrder") != -1 || window.location.href.indexOf("payment") != -1){
        deliveryMethod = $("#deliveryMethod").val();
    }else{
        deliveryMethod = $('input[name=deliveryMethod]:checked').val();
    }
    var formData  = {
        command: 'getShoppingCart',
        promo_code: promoToNextPage,
        bkend_token : bkend_token,
        deliveryMethod: deliveryMethod,
        redeemAmount: redeemAmount,
        language: language,
        postcode: !postcode ? "" : postcode,
        step : step,

    };
    console.log(formData);
    var fCallback = '';
    fCallback = loadShoppingCart;

    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadShoppingCart(data, message) { 
    console.log("loadShoppingCart");
    console.log(data);
    var userPointAmount;
    var subTotal;
    var taxes;
    var deliveryFee;
    var totalSalePrice;
    var redeemAmount;
    var promoApply;
    var points;
    var subtotalAfterPromo;
    var promoApplyAmount;

    if(data.appliedPromoStatus == "invalid"){
        $('#PromoCodeInput').val("");
        showCustomErrorField(null,data.appliedPromoStatusMsg);
    }

    if(data) {
        cartList = data.cartList;
        appliedPromo = data.appliedPromo;
        points = data.Point;
        userPointAmount = data.userPointAmount;
        subTotal = data.subTotal;
        subtotalAfterPromo = data.subtotalAfterPromo;
        taxes = data.Taxes;
        deliveryFee = data.deliveryFee;
        totalSalePrice = data.totalSalePrice;
        promoApply = data.promoApplyAmount;
        redeemAmount = data.redeemAmount;
        totalPriceAfterDeliveryFee = totalSalePrice;
        promoApplyAmount = data.promoApplyAmount;
    } else {
        cartList = getCart();
        var totalList = getTotal(cartList);
        subTotal = totalList.subTotal;
        taxes = totalList.taxes;
        deliveryFee = totalList.deliveryFee;
        totalSalePrice = totalList.totalSalePrice;
        totalPriceAfterDeliveryFee = totalSalePrice;
    }

    if(window.location.href.indexOf("reviewOrder") != -1){
        if(cartList && cartList.length > 0 ) {
            var html = '';

            $("#checkoutBtn").prop("disabled",false);

            $.each(cartList, function(k, v) {
                var hasDiscount = false;
                if(v['latestTotal']) hasDiscount = true;
                html += `
                    <tr id="${v['productID']}">
                        <td class="pl-4 py-3 d-flex">
                            <div class="img-div">
                                <img class="img-fluid" src="${v['img']}">
                            </div>
                            <div class="bodyText smaller lightBold ml-3">
                                ${v['productName']}


                                <div class="mt-4">
                                    <div class="d-flex align-items-center">
                                        <div style="width:100%; margin-left: -10px;">
                                            <div class="bodyText smaller lightBold" style="width:fit-content;float:left;">RM ${hasDiscount ? Number(v['latestTotal']).toFixed(2) : Number(v['total']).toFixed(2)}</div>
                                            <div class="bodyText smaller lightBold  oriPrice ${hasDiscount || 'hide'}" style="${!hasDiscount || ''} width:fit-content;float:left;">RM ${Number(v['total']).toFixed(2)}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="form-control2 d-flex align-items-center whiteBg bodyText larger lightBold" onclick="decItem(${v['productID']}, ${v['quantity']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')">-</button>
                                        <input type="text" id="quantity${v['productID']}" class="form-control2 text-center bodyText larger lightBold" value="${v['quantity']}" style="width: 50px;" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onblur="numItem(${v['productID']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')" readonly>
                                        <button type="button" class="form-control2 d-flex align-items-center whiteBg bodyText larger lightBold" onclick="incItem(${v['productID']}, ${v['quantity']}, ${v['stockCount']}, '${v['product_attribute_value_id']}')">+</button>

                                        <img src="images/project/delete-icon.png" class="pl-4 py-4 text-center removeCartItemIcon" width="35px" onclick="showRemoveConfirmationModal(${v['productID']}, '${v['product_attribute_value_id']}')">
                                    </div>
                                </div>
                    `;

                    if(v['product_attribute_value_id']) {
                        html += `
                            <br/>(${v['product_attribute_name']})
                        `;
                    }
                html += `            
                            </div>
                        </td>
                        <td style="width: 0px;">
                            
                        </td>
                    </tr>
                `;
            });

        } else {

            $("#checkoutBtn").prop("disabled",true);

            html += `
                <tr>
                    <td class="p-4 text-center" colspan="2" style="width: 100%;">
                        <div class="bodyText smaller lightBold" data-lang="M03803" style="width: 100%;"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                    </td>
                </tr>
            `;
        }

        highlightNotAvailable(data);
        $('#cartList').html(html);
    }
    else if(window.location.href.indexOf("checkoutAddress") != -1){
        checkDeliveryMethodStatus()
        loadSummaryCart(data);

        $('#deliveryCharges').html('RM' + numberThousand(data.deliveryFee, 2));
        if($("#PromoCodeInput").val() == ""){
            $("#removeVoucher").hide();
        }
        
    }
    else if(window.location.href.indexOf("confirmOrder") != -1){
        loadCheckoutCalculation();
        loadSummaryCart(data);
        
    }else if(window.location.href.indexOf("payment") != -1){
        loadSummaryCart(data);
    }

    if(appliedPromo && appliedPromo.length > 0 ) {
        var html = '';

        
                                
                            
        $.each(appliedPromo, function(k, v) {
            html += '<div class="d-flex justify-content-between align-items-center "  style="">';
                html += `<div class="w-100 bodyText " data-lang="M03826" style="font-size: 12px;">${v['name']}:</div>`;
                html += `<div class="w-100 bodyText  lightBold text-red" id="" style="font-size: 12px;text-align:right;">-RM`+ numberThousand(v['totalDiscount'],2)+`</div>`;
            html += '</div>';
        });

        

        $('#promoBreakdown').html(html);
        $('#promoBreakdown').show();
    }else{
        $('#promoBreakdown').html("");
        $('#promoBreakdown').hide();
    }
        
    if(data.deliveryAvailability == 0){
        var message  = '<?php echo $translations['E01284'][$language]; /* Delivery is not available in your postcode area. */?>';
        showMessage(message, 'warning', 'Delivery not available', 'warning', '');
    }
    
        

    

    $('#totalPoints').html(numberThousand(points, 0));
    $('#pointsAmount').html('RM' + numberThousand(userPointAmount, 2));
    $('#subtotal').html('RM' + numberThousand(subTotal, 2));
    $('#subtotalAfterPromo').html('RM' + numberThousand(subtotalAfterPromo, 2));
    $('#taxes').html('RM' + numberThousand(taxes, 2));
    $('#deliveryFee').html('RM' + numberThousand(deliveryFee, 2));
    if(promoApplyAmount) $('#voucherApplied').html('-RM' + numberThousand(promoApplyAmount, 2));
    else $('#voucherApplied').html('-RM' + numberThousand(0, 2));
    $('#totalSalePrice').html('RM' + numberThousand(totalSalePrice, 2));

    console.log("redeemAmount = "+redeemAmount);

    /*if(userId && cartList && cartList.length > 0) {
        redeemAmount = $('#pointsToUse').val();
        promoToNextPage = $('#PromoCodeInput').val();
        //cartTotalAmountCalculation(redeemAmount , promoToNextPage);
    } else {*/
        //if(redeemAmount != "") {
            console.log("redeemAmount = "+redeemAmount);
            $('#redeemedAmount').html('-RM' + numberThousand(redeemAmount, 2));
        //}
        
        if(deliveryFee != "0" || deliveryFee != 0) 
            $('#deliveryFee').html('RM' + numberThousand(deliveryFee, 2));
        else 
            $('#deliveryFee').html('<?php echo $translations['M00061'][$language] /* Free */ ?>');

        $('#totalSalePrice').html('RM' + numberThousand(totalSalePrice, 2));

        if(promoApply)
        $('#voucherApplied').html('-RM' + numberThousand(promoApply, 2));
    //}

    loadNumberOfCartItems(data, message); 

    

    /*if(userId) {
        var formData  = {
            command             : 'getShoppingCartQuantity',
            clientID            : userId,
            bkend_token         : bkend_token,
        }; 

        var fCallback = highlightNotAvailable;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }*/
}

function loadSummaryCart(data, message) {
    var points;
    var userPointAmount;
    var subTotal;
    var taxes;
    var deliveryFee;
    var totalSalePrice;
    var subtotalAfterPromo;
    var promoApplyAmount;

    $.each(data.cartList, function(k, v) {
        var cartListID = {
            packageID : v['productID'],
            quantity : v['quantity'],
            product_template : v['product_template_id']
        }        
        cartListIncludePromo.push(cartListID);
    }); 

    if(data && data.cartList && data.cartList.length > 0) {
        cartList = data.cartList;
        points = data.Point;
        userPointAmount = data.userPointAmount;
        subTotal = data.subTotal;
        taxes = data.Taxes;
        deliveryFee = data.deliveryFee;
        totalSalePrice = data.totalSalePrice;
        fpx_txnAmount = totalSalePrice;
        // redeemAmount = data.redeemAmount;
        totalPriceAfterDeliveryFee = totalSalePrice;
        promoApplyAmount = data.promoApplyAmount;
        subtotalAfterPromo = data.subtotalAfterPromo;
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
            var hasDiscount = false;
            if(v['latestTotal']) hasDiscount = true;
            

            html += `
                <tr id="${v['productID']}">
                    <td class="pl-4 py-3 d-flex">
                        <div class="img-div">
                            <img class="img-fluid" src="${v['img']}">
                        </div>
                        
            `;

                if(v['product_attribute_value_id']) {
                    html += `
                        <br/>(${v['product_attribute_name']})
                    `;
                }

            html += `         
                    </td>
                    <td colspan="2" class="py-3">
                       <div class="bodyText smaller lightBold ml-3">
                            ${v['productName']}


                            <div class="mt-4">
                                <div style="">
                                    <div class="bodyText smaller lightBold " style="float:left;padding-right:10px;">RM ${hasDiscount ? Number(v['latestTotal']).toFixed(2) : Number(v['total']).toFixed(2)}</div>
                                    <div class="bodyText smaller lightBold oriPrice ${hasDiscount || 'hide'} " style="float:left;">RM ${Number(v['total']).toFixed(2)}</div>
                                </div>
                                <div class="d-flex w-100">
                                    <input type="text" class="form-control2 bodyText larger lightBold text-center" value="${v['quantity']}" style="width: 50px; margin-top: 15px; border: 2px solid #E0E0E0;" readonly>
                                </div>
                            </div>
                        </div> 
                    </td>
                    <td style="width: 0px">

                    </td>
                </tr>
            `;
        });
    }

    // Points
    if(userId && pageName == 'checkoutAddress.php') {
        html += `
            <tr>
                <td colspan="2" class="pl-4 pt-4"><div class="w-100 bodyText smaller" data-lang="M03817"><?php echo $translations['M03817'][$language] /* Your total points */ ?>:</div></td>
                <td class="pr-4 pt-4 text-right"><div class="bodyText smaller lightBold">${numberThousand(points, 0)}</div></td>
            </tr>
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100 bodyText smaller" data-lang="M03818"><?php echo $translations['M03818'][$language] /* Your points amount */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(userPointAmount, 2)}</div></td>
            </tr>
        `;

        var pointsToUse = '<?php echo $_SESSION['POST'][$postAryName]['pointsToUse'] ==""?0: $_SESSION['POST'][$postAryName]['pointsToUse']?>';
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100 bodyText smaller" data-lang="M03819"><?php echo $translations['M03819'][$language] /* Points to use/redeem */ ?>:</div></td>
                <td class="pr-4 text-right"><input type="text" id="pointsToUse" class="form-control2 text-right bodyText smaller lightBold" style="width: 70px; height: auto;" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="${pointsToUse}" disabled></td>
            </tr>
        `;
    }

    // Seperate Line
    html += `
            <tr>
                <td colspan="3" class="p-4"><div class="borderBottom grey normal"></div></td>
            </tr>
    `;

    // Subtotal
    html += `
        <tr>
            <td colspan="2" class="pl-4"><div class="w-100  bodyText smaller" data-lang="M04102"><?php echo $translations['M04102'][$language] /* Purchase Amount */ ?>:</div></td>
            <td class="pr-4 text-right"><div class="bodyText smaller lightBold">RM${numberThousand(subTotal, 2)}</div></td>
        </tr>
    `;

    // Redeemed Amount
    <?php if(isset($_SESSION['userID'])) { ?>
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100  bodyText smaller" data-lang="M03820"><?php echo $translations['M03820'][$language] /* Redeemed Amount */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold text-red" id="redeemedAmount">-RM0.00</div></td>
            </tr>
        `;
    <?php } ?>

    

    
    

    // Voucher Applied
    html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100 bodyText smaller" data-lang="M03826"><?php echo $translations['M03826'][$language] /* Promo Applied */ ?>:</div></td>
                <td class="pr-4 text-right">
                    <div class="position-relative voucherAppliedWidth">
    `;
    
    if(pageName == 'checkoutAddress.php') {
        html += `
                        <span class="w-100 bodyText smaller lightBold text-underline removeVoucher" id="removeVoucher" data-lang="M03827" onclick="removeVoucher()"><?php echo $translations['M03827'][$language] /* Remove */ ?></span>
        `;
    }

    if(!promoApplyAmount) promoApplyAmount = 0;
    
    html += `
                        <span class="bodyText smaller lightBold text-red" id="voucherApplied">-RM${numberThousand(promoApplyAmount, 2)}</span>
                    </div>
                </td>
            </tr>
    `;

    // promo breakdown
    html += `<tr>
                <td colspan="3" style="">`;
                html += '<div id="promoBreakdown" style="background-color: #ECECFF;margin-left:20px;margin-right:20px;padding:10px;display:none;">'
    
            html += '</div>';
    html +=     `</td>
            </tr>`;

    // Padding space
    html += `
            <tr>
                <td colspan="3" class="p-3"><div class=""></div></td>
            </tr>
    `;

    // subtotal
    html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100  bodyText smaller" data-lang="M03820"><?php echo $translations['M02881'][$language] /* Subtotal */ ?>:</div></td>
                <td class="pr-4 text-right"><div class="bodyText smaller lightBold " id="subtotalAfterPromo">RM${numberThousand(subtotalAfterPromo, 2)}</div></td>
            </tr>`;




    // Seperate Line
    html += `
            <tr>
                <td colspan="3" class="p-4"><div class="borderBottom grey normal"></div></td>
            </tr>
    `;

    // Delivery Fee
    if(deliveryFee) {
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100 bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div></td>
                <td class="pr-4 text-right"><span class="bodyText smaller lightBold text-green text-uppercase" id="deliveryFee">RM${numberThousand(deliveryFee, 2)}</span></td>
            </tr>
        `;

        if(pageName == 'confirmOrder.php') {
            $('#deliveryCharges').html('RM' + numberThousand(deliveryFee, 2));
        }
    } else {
        html += `
            <tr>
                <td colspan="2" class="pl-4"><div class="w-100  bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div></td>
                <td class="pr-4 text-right"><div id="deliveryFee" class="bodyText smaller lightBold text-green text-uppercase" data-lang="M00061"><?php echo $translations['M00061'][$language] /* Free */ ?></div></td>
            </tr>
        `;
    }
    // Seperate Line
    html += `
            <tr>
                <td colspan="3" class="p-4"><div class="borderBottom grey normal"></div></td>
            </tr>
    `;

    // Total
    html += `
        <tr>
            <td colspan="2" class="pl-4 pb-4"><div class="w-100 bodyText larger lightBold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div></td>
            <td class="pr-4 pb-4 text-right"><span class="w-100 bodyText larger lightBold" id="totalSalePrice">RM${numberThousand(totalSalePrice, 2)}</span></td>
        </tr>
    `;

    $('#cartList').html(html);

    if(pageName == 'checkoutAddress.php') {
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

    // if(!userId) {
    //     updateQuantity(productId, newQuantity, productTemplate);

    //     var formData  = {
    //         command             : 'addShoppingCart',
    //         packageID           : productId,
    //         quantity            : newQuantity,
    //         type                : "inc",
    //         product_template    : productTemplate,
    //         step                : 1 // to differentiate between guest or registered user for BE

    //     }; 

    //     if($.cookie('bkend_token')) {
    //         formData['bkend_token'] = $.cookie('bkend_token')
    //     }
    //     var fCallback = getShoppingCart;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    // } else {

        var formData  = {
            command             : 'addShoppingCart',
            packageID           : productId,
            quantity            : newQuantity,
            type                : 'inc',
            product_template    : productTemplate,
            bkend_token         : bkend_token,
        };

        var fCallback = incDecItemSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
}

function decItem(productId, quantity, stockCount, productTemplate) {
    var newQuantity = --quantity;

    var quantityInput = $("#quantity" + productId).val()
    
    var newQuantityInput = --quantityInput;
    // $("#quantity" + productId).val(newQuantityInput);

    // $("#quantity" + productId).val(newQuantity); 

    if(newQuantity == 0 || newQuantityInput == 0) {
        $("#quantity" + productId).val("0");
        showRemoveConfirmationModal(productId, productTemplate);
        return;
    }

    // if(!userId) {
    //     updateQuantity(productId, newQuantity, productTemplate);
    //     var formData  = {
    //         command             : 'addShoppingCart',
    //         packageID           : productId,
    //         quantity            : newQuantity,
    //         type                : 'dec',
    //         product_template    : productTemplate,
    //         step                : 1
    //     };
    //     if($.cookie('bkend_token')) {
    //         formData['bkend_token'] = $.cookie('bkend_token')
    //     }
    //     var fCallback = getShoppingCart;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // } else {

        var formData  = {
            command             : 'addShoppingCart',
            packageID           : productId,
            quantity            : newQuantity,
            type                : 'dec',
            product_template    : productTemplate,
            bkend_token         : bkend_token,
        };
        var fCallback = incDecItemSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
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

    // if(!userId) {
    //     updateQuantity(productId, quantity, productTemplate);
    //     var formData  = {
    //         command             : 'addShoppingCart',
    //         packageID           : productId,
    //         quantity            : newQuantity,
    //         type                : 'num',
    //         product_template    : productTemplate,
    //         step                : 1
    //     };
    //     if($.cookie('bkend_token')) {
    //         formData['bkend_token'] = $.cookie('bkend_token')
    //     }
    //     var fCallback = getShoppingCart;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // } else {

        var formData  = {
            command     : 'addShoppingCart',
            packageID   : productId,
            quantity    : quantity,
            type        : 'num',
            product_template    : productTemplate,
            bkend_token : bkend_token,
        };
        var fCallback = incDecItemSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
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
    }
}

function removeShoppingCart() {
    // if(!userId) {
    //     removeItem(removedProductId, removedProductTemplate);
    //     var formData  = {
    //         command             : 'removeShoppingCart',
    //         packageID           : removedProductId,
    //         product_template    : removedProductTemplate,
    //         step                : 1
    //     };
    //     if($.cookie('bkend_token')) {
    //         formData['bkend_token'] = $.cookie('bkend_token')
    //     }
    //     var fCallback = getShoppingCart;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // } else {

        var formData  = {
            command             : 'removeShoppingCart',
            packageID           : removedProductId,
            product_template    : removedProductTemplate,
            bkend_token         : bkend_token,
        };
        var fCallback = incDecItemSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
}
var addcart;
function getNumberOfCartItems(addcartdata) {
    // $.cookie("keepLoading", true);
    // if(!userId) {
    //     loadNumberOfCartItems();
    // } else {
        addcart=addcartdata

        var formData  = {
            // command: 'getSOShoppingCart', 
            command: 'getShoppingCart',
            bkend_token: bkend_token,
        };
        var fCallback = loadNumberOfCartItems;
        ajaxSend('scripts/reqDefault.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
    // }

    // $.cookie("keepLoading","");
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
    if(addcart == 1 ){
        // hideCanvas();)
        setTimeout(function() {
            showMessage('<span data-lang="M03397"><?php echo $translations['M03397'][$language] /* Successfully added to cart. */ ?></span>', 'success', '<span data-lang="M02544"><?php echo $translations['M02544'][$language] /* Success */ ?>', '', '');

     }, 1500);
     }
}

function applyPoint() {
    redeemAmount = $('#pointsToUse').val();
    promoToNextPage = $('#PromoCodeInput').val();
    // $.cookie('redeemAmount', redeemAmount);
    return getShoppingCart();
}

function cartTotalAmountCalculation(redeemAmount, promoToNextPage) { 
    console.log("cartTotalAmountCalculation !!!!!");
    var deliveryMethod = "";

    if('<?php echo $_SESSION['POST'][$postAryName]['deliveryMethodOpt'] ?>' == "Pickup") {
        deliveryMethod = "Pickup";
    } else {
        deliveryMethod = "delivery";
    }

    // var formData  = { 
    //     command             : 'CartTotalAmountCalculation',
    //     // command             : 'CartTotalAmountCalculationMember',
    //     deliveryMethod      : deliveryMethod,
    // };

    if(bkend_token) {
        var formData  = { 
            command             : 'CartTotalAmountCalculation',
            deliveryMethod      : deliveryMethod,
            promo_code          : promoToNextPage,
            bkend_token         : bkend_token,
        };
    }else{
        var formData  = { 
            command             : 'CartTotalAmountCalculationMember',
            deliveryMethod      : deliveryMethod,
            promo_code          : promoToNextPage,
            bkend_token         : bkend_token,
        };
    }

    // if($.cookie('redeemAmount')) formData['redeemAmount'] = $.cookie('redeemAmount');
    if(redeemAmount) formData['redeemAmount'] = redeemAmount;
    if(deliveryMethod) formData['deliveryMethod'] = deliveryMethod;

    showCanvas();

    $.ajax({
        type     : method,
        url      : url,
        data     : formData,
    })
    .done(function(data) {
        var obj = JSON.parse(data);
        hideCanvas();
        if(obj.status == "ok") {
            loadCartTotal(obj.data, obj.statusMsg, obj);
        }
        else {
            if(obj.statusMsg != '') {
                if(obj.data != null && obj.data.field)
                    showCustomErrorField(obj.data.field, obj.statusMsg);
                else
                    errorHandler(obj.code, obj.statusMsg);
            }

            // Reset if insufficient point
            $('#pointsToUse').val('');
            $('#redeemedAmount').html('-RM0.00');
        }
    });

    // var fCallback = loadCartTotal;
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadCartTotal(data, message) {
    if(data) {
        fpx_txnAmount = data.cartTotal;
        console.log("loadCartTotal");
        
        $('#redeemedAmount').html('-RM' + numberThousand(data.redeemAmount, 2));
        $('#deliveryFee').html('RM' + numberThousand(data.shippingFee, 2));
        $('#deliveryCharges').html('RM' + numberThousand(data.shippingFee, 2));
        $('#totalSalePrice').html('RM' + numberThousand(data.cartTotal, 2));
        $('#voucherApplied').html('-RM' + numberThousand(data.promoDiscount, 2));

        if(checkoutBtnClicked == true) {
            localStorage.setItem('oldCartList',localStorage.getItem('cartList'))
            localStorage.removeItem('cartList');

            var formData = {
                command         : 'updateStatusOnCheckout',
                pointsToUse     : $('#pointsToUse').val(),
                promo_code     : $('#PromoCodeInput').val(),
                bkend_token     : bkend_token
            };

            var fCallback = redirectToCheckoutAddress;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }
}

</script>