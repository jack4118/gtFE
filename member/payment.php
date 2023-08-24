<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Cart Title -->
<section class="section checkoutBg">
    <div class="kt-container row">
        <div class="col-12 titleText larger bold text-white text-center text-md-left" data-lang="M02893"><?php echo $translations['M02893'][$language] /* My Cart */ ?></div>
    </div>
</section>

<input type="hidden" id="PromoCodeInput" class="">
<input type="hidden" id="pointsToUse" class="">
<input type="hidden" id="postcode" class="">
<input type="hidden" id="deliveryMethod" name="deliveryMethod" value="Pickup">
<!-- My Cart Stepper -->
<section class="section whiteBg px-0 pb-0">
    <div class="kt-container row">
        <div class="col-12">
            <div class="wrapper option-1 option-1-1 mt-5 mt-md-0">
                <ol class="c-stepper">
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M03815"><?php echo $translations['M03815'][$language] /* Review Order */ ?></h3>
                    </li>
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M02466"><?php echo $translations['M02466'][$language] /* Address */ ?></h3>
                    </li>
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M03816"><?php echo $translations['M03816'][$language] /* Confirm Order */ ?></h3>
                    </li>
                    <li class="c-stepper__item active">
                        <h3 class="c-stepper__title" data-lang="M00208"><?php echo $translations['M00208'][$language] /* Payment */ ?></h3>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="kt-container row mb-5 mb-md-0">
        <div class="col-md-6 col-12 order-md-2 order-1">
            <!-- Order Summary -->
            <div class="borderAll grey normal">
                <!-- <div class="darkBlueBg p-4 bodyText larger bold text-white" data-lang="M03261"><?php echo $translations['M03261'][$language] /* Order Summary */ ?></div> -->
                <div class="greyBg orderSummary">
                    <table class="w-100">
                        <thead class="borderBottom grey normal">
                            <tr>
                                <th class="px-4 py-4" colspan="4"><div class="bodyText smaller lightBold text-center" data-lang="M02990" style="width: 100%;"><?php echo $translations['M02990'][$language] /* Product */ ?></div></th>
                                <!-- <th class="text-center px-2 py-4"><div class="bodyText smaller lightBold" data-lang="M00244"><?php echo $translations['M00244'][$language] /* Quantity */ ?></div></th>
                                <th class="text-right px-4 py-4"><div class="bodyText smaller lightBold" data-lang="M03129"><?php echo $translations['M03129'][$language] /* Price */ ?></div></th> -->
                            </tr>
                        </thead>
                        <tbody id="cartList">
                            <tr>
                                <td colspan="5" class="p-4 text-center">
                                    <div class="bodyText smaller lightBold" data-lang="M03803" style="width: 100%;"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 order-md-1 order-2 pt-5 pt-md-0">
            <?php if($_SESSION['POST'][$postAryName]['manualBankTransfer']) { ?>
                <!-- Manual Bank Transfer -->
                <div class="bodyText larger bold pb-3" data-lang="M03839"><?php echo $translations['M03839'][$language] /* Manual Bank Transfer */ ?></div>
                <div class="greyBg">
                    <div class="borderAll grey normal px-5 py-4">
                        <div class="mx-2" data-lang="M03841"><?php echo $translations['M03841'][$language] /* Please transfer the total price to the below bank account. */ ?></div>
                        <div class="text-center my-3">
                            <img class="paymentMethodContainer" src="images/project/maybank.png" width="220px" height="180px">
                        </div>
                        <div class="text-red font-italic" data-lang="M03842"><?php echo $translations['M03842'][$language] /* ** Please DM us with your location and postcode to ensure your location is cover by us ** */ ?></div>
                    </div>
                </div>
            <?php } else if ($_SESSION['POST'][$postAryName]['qrCodePayment']) { ?>
                <!-- QR Code Payment -->
                <div class="bodyText larger bold pb-3" data-lang="M03840"><?php echo $translations['M03840'][$language] /* QR Code */ ?></div>
                <div class="greyBg">
                    <div class="borderAll grey normal px-5 py-4">
                        <div class="mx-2" data-lang="M03843"><?php echo $translations['M03843'][$language] /* Please scan the QR Code below to make payment. */ ?></div>
                        <div class="text-center my-3">
                            <img class="paymentMethodContainer" src="images/project/qr-code.png" width="220px" height="250px">
                        </div>
                        <div class="text-red font-italic" data-lang="M03842"><?php echo $translations['M03842'][$language] /* ** Please DM us with your location and postcode to ensure your location is cover by us ** */ ?></div>
                    </div>
                </div>
            <?php } ?>

            <!-- Upload Receipt -->
            <div class="form-group mt-5">
                <label for="uploadReceipt"><span class="text-red">*</span data-lang="M03844"> <?php echo $translations['M03844'][$language] /* Upload Receipt */ ?></label>
                <div class="position-relative">
                    <input class="form-control" type="text" id="receiptName" readonly>
                    <input class="form-control" type="hidden" id="receiptData">
                    <input class="form-control" type="hidden" id="receiptSize">
                    <input class="form-control" type="hidden" id="receiptType">
                    <button type="button" class="btn btn-primary grey px-3 py-2 bodyText smaller uploadReceipt" id="uploadBtn" data-lang="M03844"> <?php echo $translations['M03844'][$language] /* Upload Receipt */ ?></button>
                </div>
                <input type="file" id="uploadReceipt" class="d-none" accept=".jpg, .jpeg, .png, .pdf">
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center" id="cart-button">
                <button type="button" class="btn btn-primary grey" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
                <button type="button" class="btn btn-primary" id="submitBtn">
                    <div class="bodyText smaller text-white" data-lang="M00346"><?php echo $translations['M00346'][$language] /* Submit */ ?></div>
                    <!-- <div class="bodyText smaller text-white">></div> -->
                </button>
            </div>
        </div>
    </div>
</section>

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

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;

var userId          = '<?php echo $_SESSION['userID'] ?>';
var txnAmount       = '<?php echo $_SESSION['POST'][$postAryName]['txnAmount'] ?>';
var purchaseId      = '<?php echo $_SESSION['POST'][$postAryName]['purchaseId'] ?>';
var saleId          = '<?php echo $_SESSION['POST'][$postAryName]['saleId'] ?>';
var txnTime         = '<?php echo $_SESSION['POST'][$postAryName]['txnTime'] ?>';
var deliveryMethodOpt = '<?php echo $_SESSION['POST'][$postAryName]['deliveryMethodOpt'] ?>';
var promoToNextPage   = '<?php echo $_SESSION['POST'][$postAryName]['promoToNextPage']?>';
var pointsToUse =  '<?php echo $_SESSION['POST'][$postAryName]['pointsToUse'] ?>';

var paymentMethod =  '<?php echo $_SESSION['POST'][$postAryName]['paymentMethod'] ?>';
var paymentDelivery =  '<?php echo $_SESSION['POST'][$postAryName]['paymentDelivery'] ?>';
var total_price =  '<?php echo $_SESSION['POST'][$postAryName]['total_price'] ?>';
var postcode =  '<?php echo $_SESSION['POST'][$postAryName]['postcode'] ?>';


$(document).ready(function() {
    redeemAmount = pointsToUse;
    deliveryMethodType = deliveryMethodOpt
    // Check if payment method is selected
    var manualBankTransfer = '<?php echo $_SESSION['POST'][$postAryName]['manualBankTransfer'] ?>';
    var qrCodePayment = '<?php echo $_SESSION['POST'][$postAryName]['qrCodePayment'] ?>';

    if(manualBankTransfer == '' && qrCodePayment == '' || !saleId || saleId == '') {
        showMessage('<?php echo $translations['M03845'][$language] /* No payment method selected. */ ?> <br> <a class="modalText text-red text-underline" href="reviewOrder" data-lang="M03846"><?php echo $translations['M03846'][$language] /* Back To Cart */ ?></a>', 'warning', '<?php echo $translations['M02885'][$language] /* Payment Method */ ?>', 'warning', 'reviewOrder');
    }

    $('#pointsToUse').val(redeemAmount);
    $('#deliveryMethod').val(deliveryMethodOpt);
    $('#PromoCodeInput').val(promoToNextPage);
    $('#postcode').val(postcode);
    
    // Load summary cart
    getShoppingCart();

    

    $('#uploadBtn').click(function() {
        $('#uploadReceipt').click();
    })

    $('#uploadReceipt').change(function() {
        if (this.files && this.files[0]) {
            var that = this;
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#receiptData").empty().val(reader["result"]);
                $("#receiptName").val(that.files[0]["name"]);
                $("#receiptSize").empty().val(that.files[0]["size"]);
                $("#receiptType").empty().val(that.files[0]["type"]);
            }
            reader.readAsDataURL(that.files[0]);
        }
    });

    $('#backBtn').click(function() {
        $.redirect('confirmOrder', {
            txnAmount: txnAmount,
            purchaseId: purchaseId,
            saleId: saleId,
            txnTime: txnTime,
            promoToNextPage: promoToNextPage,
            pointsToUse: redeemAmount,
            deliveryMethodOpt: deliveryMethodOpt,
        });
    });

    $('#submitBtn').click(uploadReceipt);

});

function updateSaleOrder() {  
    
    var formData = {
        command     	: 'updateSaleOrder',
        saleID          : saleId,
        promo_code      : promoToNextPage,
        paymentMethod   : paymentMethod,
        paymentDelivery : paymentDelivery,
        total_price     : total_price,
        redeemAmount    : pointsToUse,
        bkend_token     : bkend_token,
        deliveryMethod : deliveryMethodOpt,
        postcode  : $('#postcode').val(),
    };
    var fCallback = successPlaceOrder;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function uploadReceipt() {    
    var formData = {
        command     	: 'uploadReceipt',
        data            : $('#receiptData').val(),
        type            : 'receipt',
        fileName        : $("#receiptName").val(),
        saleID          : saleId,
        bkend_token     : bkend_token,
        redeemAmount    : pointsToUse,
    };
    var fCallback = updateSaleOrder;
	// var fCallback = successPlaceOrder;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}


function successPlaceOrder(data, message) {
    clearCart();
    localStorage.removeItem('oldCartList');
    removeCookie('redeemAmount');
    var guestPhoneNumber = '<?php echo $_SESSION['guestPhoneNumber'] ?>';


    var clientId = userId;
    if (clientId) {
        showMessage(
            '<?php echo $translations['M03902'][$language] /* Order Placed Successful. */ ?>',
            'success',
            '<?php echo $translations['M00208'][$language] /* Payment */ ?>',
            'success',
            '/orderStatus?SONO=' + encodeURIComponent(data.so_no)
        );

    } else {
        showMessage(
             '<?php echo $translations['M03902'][$language] /* Order Placed Successful. */ ?>',
            'success',
            '<?php echo $translations['M00208'][$language] /* Payment */ ?>',
            'success', 
            '/orderStatus?SONO=' + encodeURIComponent(data.so_no)+"&phone="+guestPhoneNumber.substr(-4)
        );
    } 
}

</script>
