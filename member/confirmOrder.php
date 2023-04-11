<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Cart Title -->
<section class="section checkoutBg">
    <div class="titleText larger bold text-white text-center text-md-left" data-lang="M02893"><?php echo $translations['M02893'][$language] /* My Cart */ ?></div>
</section>

<!-- My Cart Stepper -->
<section class="section whiteBg px-0 pb-0">
    <div class="wrapper option-1 option-1-1 mt-5 mt-md-0">
    <ol class="c-stepper">
        <li class="c-stepper__item">
            <h3 class="c-stepper__title" data-lang="M03815"><?php echo $translations['M03815'][$language] /* Review Order */ ?></h3>
        </li>
        <li class="c-stepper__item">
            <h3 class="c-stepper__title" data-lang="M02466"><?php echo $translations['M02466'][$language] /* Address */ ?></h3>
        </li>
        <li class="c-stepper__item active">
            <h3 class="c-stepper__title" data-lang="M03816"><?php echo $translations['M03816'][$language] /* Confirm Order */ ?></h3>
        </li>
        <li class="c-stepper__item">
            <h3 class="c-stepper__title" data-lang="M00208"><?php echo $translations['M00208'][$language] /* Payment */ ?></h3>
        </li>
    </ol>
    </div>
</section>

<section class="section whiteBg">
    <div class="row mb-5 mb-md-0">
        <div class="col-md-6 col-12 order-md-2 order-1">
            <!-- Order Summary -->
            <div class="borderAll grey normal">
                <div class="darkBlueBg p-4 bodyText larger bold text-white" data-lang="M03261"><?php echo $translations['M03261'][$language] /* Order Summary */ ?></div>
                <div class="greyBg orderSummary">
                    <table class="w-100">
                        <thead class="borderBottom grey normal">
                            <tr>
                                <th class="px-4 py-4"><div class="bodyText smaller lightBold" data-lang="M02990"><?php echo $translations['M02990'][$language] /* Product */ ?></div></th>
                                <th class="text-center px-2 py-4"><div class="bodyText smaller lightBold" data-lang="M00244"><?php echo $translations['M00244'][$language] /* Quantity */ ?></div></th>
                                <th class="text-right px-4 py-4"><div class="bodyText smaller lightBold" data-lang="M03129"><?php echo $translations['M03129'][$language] /* Price */ ?></div></th>
                            </tr>
                        </thead>
                        <tbody id="cartList">
                            <tr>
                                <td colspan="5" class="p-4 text-center">
                                    <div class="bodyText smaller lightBold" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 order-md-1 order-2 pt-5 pt-md-0">
            <!-- Delivery Method -->
            <div class="bodyText larger bold pb-3" data-lang="M03836"><?php echo $translations['M03836'][$language] /* Select a Delivery Method */ ?></div>
            <div id="deliveryMethods">
                <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3">
                    <div class="bodyText smaller lightBold" data-lang="M03900"><?php echo $translations['M03900'][$language] /* Loading... */ ?></div>
                </label>
            </div>

            <!-- Payment Method -->
            <div class="bodyText larger bold py-3" data-lang="M03838"><?php echo $translations['M03838'][$language] /* Select a Payment Method */ ?></div>
            <div id="paymentMethods">
                <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3">
                    <div class="bodyText smaller lightBold" data-lang="M03900"><?php echo $translations['M03900'][$language] /* Loading... */ ?></div>
                </label>
            </div>
            
            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <button type="button" class="btn btn-primary grey px-4 py-3 col-12 col-lg-3 col-md-4 text-center" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-5 col-md-7 d-flex justify-content-between align-items-center mt-3 mt-md-0" id="proceedToPaymentBtn">
                    <div class="bodyText smaller text-white" data-lang="M03189"><?php echo $translations['M03189'][$language] /* Proceed to Payment */ ?></div>
                    <div class="bodyText smaller text-white">></div>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- FPX Form -->
<div>
    <form id= "fpx_interbanking" action= "https://uat.mepsfpx.com.my/FPXMain/seller2DReceiver.jsp" method ="post">
        <input type="hidden" name="fpx_msgType" id="fpx_msgType" value="">
        <input type="hidden" name="fpx_msgToken" id="fpx_msgToken" value="">
        <input type="hidden" name="fpx_sellerExId" id="fpx_sellerExId" value="">
        <input type="hidden" name="fpx_sellerExOrderNo" id="fpx_sellerExOrderNo" value="">
        <input type="hidden" name="fpx_sellerTxnTime" id="fpx_sellerTxnTime" value="">
        <input type="hidden" name="fpx_sellerOrderNo" id="fpx_sellerOrderNo" value="">
        <input type="hidden" name="fpx_sellerId" id="fpx_sellerId" value="">
        <input type="hidden" name="fpx_sellerBankCode" id="fpx_sellerBankCode" value="">
        <input type="hidden" name="fpx_txnCurrency" id="fpx_txnCurrency" value="">
        <input type="hidden" name="fpx_txnAmount" id="fpx_txnAmount" value="">
        <input type="hidden" name="fpx_buyerEmail" id="fpx_buyerEmail" value=""> 
        <input type="hidden" name="fpx_checkSum" id="fpx_checkSum" value="">
        <input type="hidden" name="fpx_buyerBankId" id="fpx_buyerBankId" value="">
        <input type="hidden" name="fpx_productDesc" id="fpx_productDesc" value="">
        <input type="hidden" name="fpx_version" id="fpx_version" value="">

        <!-- <input type="submit" value="Click To Pay" name="Submit"> -->
    </form>                         
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>

var url                     = 'scripts/reqDefault.php';
var urlFPX                  = 'scripts/reqFPX.php';           
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var userId                  = '<?php echo $_SESSION['userID'] ?>';

var paymentMethodsLoaded    = false;
var saleOrderUpdated        = false;
var settingIsLoaded         = false;
var checkSumIsLoaded        = false;
var cartLoaded              = false;

var saleId                  = '<?php echo $_POST['saleId'] ?>';
var fpx_msgType;
var fpx_msgToken;
var fpx_sellerExId;
var fpx_sellerExOrderNo     = '<?php echo $_POST['purchaseId'] ?>';
var fpx_sellerTxnTime       = '<?php echo $_POST['txnTime'] ?>';
var fpx_sellerOrderNo       = '<?php echo $_POST['purchaseId'] ?>';
var fpx_sellerId;
var fpx_sellerBankCode;
var fpx_txnCurrency;
var fpx_txnAmount           = '<?php echo $_POST['txnAmount'] ?>';
var fpx_buyerEmail;
var fpx_checkSum;
var fpx_buyerBankId;
var fpx_productDesc         = 'Package <?php echo $_POST['purchaseId'] ?>';
var fpx_version;

$(document).ready(function() {
    if(!saleId || saleId == '') {
        showMessage('<?php echo $translations['M03899'][$language] /* Invalid cart. */ ?> <br> <a class="modalText text-red text-underline" href="reviewOrder" data-lang="M03846"><?php echo $translations['M03846'][$language] /* Back To Cart */ ?></a>', 'warning', '<?php echo $translations['M03816'][$language] /* Confirm Order */ ?>', 'warning', 'reviewOrder');
    }

    getDeliveryMethod();
    getPaymentMethod();
    getBankDetails();
    // Load summary cart
    getShoppingCart(1);
    checkOutCalculation();

    $('#backBtn').click(function() {
        $.redirect('checkoutAddress');
    });

    $('#proceedToPaymentBtn').click(updateSaleOrder);
});

function getDeliveryMethod() {
    var clientId = userId;
    if(!clientId) {
        clientId = '<?php echo $_POST['clientId'] ?>';
    }

    var formData = {
        command         : 'getDeliveryMethod',
        userID          : clientId
    };
    var fCallback = loadDeliveryMethod;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDeliveryMethod(data, message) {
    var deliveryMethod = data;

    if(deliveryMethod) {
        var html = '';
        $.each(deliveryMethod, function(k, v) {
            if(v['name'] == 'Self Pickup') {
                html += `
                    <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="Pickup">
                        <input class="radio-control mr-3" type="radio" id="Pickup" name="deliveryMethod" value="Pickup" onchange="checkOutCalculation()">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <div class="bodyText smaller lightBold mb-2">${v['name']}</div>
                                <div class="bodyText smaller">${v['address']}</div>
                            </div>
                            <div class="bodyText smaller lightBold text-green text-uppercase" id="selfPickupCharges">${v['fees']}</div>
                        </div>
                    </label>
                `;
            } else if(v['name'] == 'Delivery Charges') {
                html += `
                    <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="delivery">
                        <input class="radio-control mr-3" type="radio" id="delivery" name="deliveryMethod" value="delivery" checked onchange="checkOutCalculation()">
                        <div class="d-flex justify-content-between w-100">
                            <div class="bodyText smaller lightBold">${v['name']}</div>
                            <div class="bodyText smaller lightBold text-green text-uppercase" id="deliveryCharges">RM${numberThousand(v['fees'], 2)}</div>
                        </div>
                    </label>
                `;
            }
        });

        $('#deliveryMethods').html(html);
    }
}

function getPaymentMethod() {
    var formData = {
        command         : 'getPaymentDeliveryOptions'
    };
    var fCallback = loadPaymentMethod;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadPaymentMethod(data, message) {
    var paymentMethod = data.pamentMethod;

    if(paymentMethod) {
        var html = '';
        $.each(paymentMethod, function(k, v) {
            if (v['name'] == 'FPX') {
                html += `
                    <label class="radio-group greyBg mb-3 mb-0 w-100" for="${v['name']}">
                        <div class="borderAll grey normal p-4">
                            <div class="d-flex align-items-center">
                                <input class="radio-control mr-3" type="radio" id="${v['name']}" name="paymentMethod" value="${v['name']}" checked>
                                <div class="bodyText smaller lightBold">
                                    <img src="images/project/fpx-logo.png" width="45px" class="mr-2">
                                    <span class="bodyText smaller lightBold" data-lang="M03196"><?php echo $translations['M03196'][$language]; /* FPX Online Banking */?></span>
                                </div>
                            </div>
                            <div class="mt-3 ml-4">
                                <select id="bankLists" class="bodyText smaller lightBold form-control2 col-12">
                                    <option value="" data-lang="M03442"><?php echo $translations['M03442'][$language] /* Select Bank */ ?></option>
                                </select>
                            </div>
                        </div>
                    </label>
                `;
            } else {
                html += `
                    <label class="radio-group greyBg mb-3 w-100" for="${v['name']}">
                        <div class="borderAll grey normal p-4 d-flex align-items-center">
                            <input class="radio-control mr-3" type="radio" id="${v['name']}" name="paymentMethod" value="${v['name']}">
                            <div class="bodyText smaller lightBold">${v['value']}</div>
                        </div>
                    </label>
                `;
            }
        });

        $('#paymentMethods').html(html);
        paymentMethodsLoaded = true;
    }
}

function getBankDetails() {
    if (!paymentMethodsLoaded) {
        setTimeout(function() {
            getBankDetails();
        }, 1000);
    } else {
        var formData = {
            command     	: 'getBankDetails',
            paymentMethod   : 'fpx'
        };
        var fCallback = loadBankDetails;
        ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function loadBankDetails(data, message) {
    var fpxBankInfo = data.bankInfo;

    if(fpxBankInfo) {
        getBankLists(fpxBankInfo);
    }
}

function getBankLists(fpxBankInfo) {
    var formData = {
        command     	: 'getBankLists',
        fpxBankInfo     : fpxBankInfo
    };
	var fCallback = loadBankLists;
    ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadBankLists(data, message) {
    if(data) {
        var html = '';
        html += `<option value="" data-lang="M03442"><?php echo $translations['M03442'][$language] /* Select Bank */ ?></option>`;

        $.each(data, function(k, v) {
            html += `<option value="${v['name']}">${v['displayName']}</option>`;
        });

        $('#bankLists').html(html);
    }
}

function updateSaleOrder() {
    var formData = {
        command     	: 'updateSaleOrder',
        saleID          : saleId,
        paymentMethod   : $('input[name=paymentMethod]:checked').val(),
        paymentDelivery : $('input[name=deliveryMethod]:checked').val(),
        total_price     : $('#totalPrice').html(),
    };
	var fCallback = proceedToPayment;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function proceedToPayment(data, message) {
    if($('#ManualBankTransfer').is(':checked')) {
        $.redirect('payment', { 
            manualBankTransfer: true,
            txnAmount: '<?php echo $_POST['txnAmount'] ?>',
            purchaseId: '<?php echo $_POST['purchaseId'] ?>',
            saleId: '<?php echo $_POST['saleId'] ?>',
            txnTime: '<?php echo $_POST['txnTime'] ?>'
        });
    } else if($('#QRCode').is(':checked')) {
        $.redirect('payment', { 
            qrCodePayment: true,
            txnAmount: '<?php echo $_POST['txnAmount'] ?>',
            purchaseId: '<?php echo $_POST['purchaseId'] ?>',
            saleId: '<?php echo $_POST['saleId'] ?>',
            txnTime: '<?php echo $_POST['txnTime'] ?>'
        });
    } else {
        // FPX payment
        getProviderSettingFPX();
        buildCheckSum();
        redirectToFPX();
    }
}

function getProviderSettingFPX() {
    var formData = {
        command     	    : 'getProviderSettingFPX',
    };
	var fCallback = prepareForPayment;
    ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function prepareForPayment(data, message) {
    if(data) {
        fpx_msgType         = (data.filter((item) => item.name == 'msgType'))[0].value;
        fpx_msgToken        = (data.filter((item) => item.name == 'msgToken'))[0].value;
        fpx_sellerExId      = (data.filter((item) => item.name == 'sellerExId'))[0].value;
        fpx_sellerId        = (data.filter((item) => item.name == 'sellerId'))[0].value;
        fpx_sellerBankCode  = (data.filter((item) => item.name == 'sellerBankCode'))[0].value;
        fpx_txnCurrency     = (data.filter((item) => item.name == 'txnCurrency'))[0].value;
        fpx_buyerEmail      = (data.filter((item) => item.name == 'buyerEmail'))[0].value;
        fpx_version         = (data.filter((item) => item.name == 'version'))[0].value;

        settingIsLoaded = true;
    }
}

function buildCheckSum() {
    if (!settingIsLoaded) {
        setTimeout(function() {
            buildCheckSum();
        }, 1000);
    } else {
        fpx_buyerBankId = $('#bankLists').val();

        var formData = {
            command     	    : 'buildCheckSum',
            bankId              : fpx_buyerBankId,  // TEST0021 - for testing purpose
            buyerEmail          : fpx_buyerEmail,
            msgToken            : fpx_msgToken,
            msgType             : fpx_msgType,
            prodDesc            : fpx_productDesc,
            sellerBankCode      : fpx_sellerBankCode,
            sellerExId          : fpx_sellerExId,
            sellerExOrderNo     : fpx_sellerExOrderNo,
            sellerId            : fpx_sellerId,
            sellerOrderNo       : fpx_sellerOrderNo,
            txnTime             : fpx_sellerTxnTime,
            txnAmount           : fpx_txnAmount,
            txnCurrency         : fpx_txnCurrency,
            version             : fpx_version,
        };
        var fCallback = loadCheckSum;
        ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
    }
}

function loadCheckSum(data, message) {
    if(data) {
        fpx_checkSum = data.fpx_checkSum;
        fpx_sellerTxnTime = data.txnTime;
        checkSumIsLoaded = true;
    }
}

function redirectToFPX() {
    if(!checkSumIsLoaded) {
        setTimeout(function() {
            redirectToFPX();
        }, 1000);
    } else {
        $('#fpx_msgType').val(fpx_msgType);
        $('#fpx_msgToken').val(fpx_msgToken);
        $('#fpx_sellerExId').val(fpx_sellerExId);
        $('#fpx_sellerExOrderNo').val(fpx_sellerExOrderNo);
        $('#fpx_sellerTxnTime').val(fpx_sellerTxnTime);
        $('#fpx_sellerOrderNo').val(fpx_sellerOrderNo);

        $('#fpx_sellerId').val(fpx_sellerId);
        $('#fpx_sellerBankCode').val(fpx_sellerBankCode);
        $('#fpx_txnCurrency').val(fpx_txnCurrency);
        $('#fpx_txnAmount').val(fpx_txnAmount);
        $('#fpx_buyerEmail').val(fpx_buyerEmail);
        $('#fpx_checkSum').val(fpx_checkSum);
        $('#fpx_buyerBankId').val(fpx_buyerBankId);
        $('#fpx_productDesc').val(fpx_productDesc);
        $('#fpx_version').val(fpx_version);

        $('#fpx_interbanking').submit();
    }
}

function checkOutCalculation() {
    if(!cartLoaded) {
        setTimeout(function() {
            checkOutCalculation();
        }, 1000);
    } else {
        var clientId = userId;
        if(!clientId) {
            clientId = '<?php echo $_POST['clientId'] ?>';
        }

        var formData = {
            command     	    : 'CheckOutCalculation',
            userID              : clientId,
            deliveryMethod      : $('input[name=deliveryMethod]:checked').val()
        };
        var fCallback = loadCheckoutCalculation;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
    }
}

function loadCheckoutCalculation(data, message) {
    var shippingFee = data.shippingFee;
    var totalPrice = data.cartTotal;

    fpx_txnAmount = totalPrice;

    $('#deliveryFee').html('RM' + numberThousand(shippingFee, 2));
    $('#totalPrice').html(numberThousand(totalPrice, 2));
}

</script>