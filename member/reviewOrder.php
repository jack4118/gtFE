<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Cart Title -->
<section class="section checkoutBg">
    <div class="kt-container">
        <div class="col-12 titleText larger bold text-white text-center text-md-left" data-lang="M02893"><?php echo $translations['M02893'][$language] /* My Cart */ ?></div>
    </div>
</section>

<!-- My Cart Stepper -->
<section class="section whiteBg px-0 pb-0">
    <div class="kt-container row">
        <div class="col-12">
            <div class="wrapper option-1 option-1-1 mt-5 mt-md-0">
                <ol class="c-stepper">
                    <li class="c-stepper__item active">
                        <h3 class="c-stepper__title" data-lang="M03815"><?php echo $translations['M03815'][$language] /* Review Order */ ?></h3>
                    </li>
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M02466"><?php echo $translations['M02466'][$language] /* Address */ ?></h3>
                    </li>
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M03816"><?php echo $translations['M03816'][$language] /* Confirm Order */ ?></h3>
                    </li>
                    <li class="c-stepper__item">
                        <h3 class="c-stepper__title" data-lang="M00208"><?php echo $translations['M00208'][$language] /* Payment */ ?></h3>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="kt-container row mb-5 mb-md-0">
        <div class="col-md-8 col-12">
            <!-- Cart -->
            <div class="borderAll grey normal">
                <div class="greyBg orderSummary">
                    <table class="w-100">
                        <thead class="borderBottom grey normal">
                            <tr>
                                <th class="px-4 py-4" colspan="4"><div class="bodyText smaller lightBold text-center" data-lang="M02990" style="width: 100%;"><?php echo $translations['M02990'][$language] /* Product */ ?></div></th>
                                <th></th>
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
        <div class="col-md-4 col-12 pt-5 pt-md-0">
            <div class="greyBg borderAll grey normal">
                <div class="p-4 borderBottom grey normal">
                    <div class="bodyText smaller lightBold" data-lang="M02895"><?php echo $translations['M02895'][$language] /* Order Total */ ?></div>
                </div>

                <div class="p-4">
                    <div class="p-3 whiteBg borderAll grey normal mt-3" id="applyPromo">
                        <span class="bodyText smaller" data-lang="M03823"><?php echo $translations['M03823'][$language] /* Have a voucher */ ?>?</span> &nbsp; <a href="javascript:;" class="bodyText smaller text-red lightBold text-underline" data-lang="M03824"><?php echo $translations['M03824'][$language] /* Apply Promo */ ?></a>
                    </div>
                    <div class="position-relative mt-3" id="promoInput">
                        <input type="text" class="form-control2 promoCodeInput w-100 px-3 pt-0" placeholder=<?php echo $translations['A01730'][$language] /* Promo code */ ?> id="PromoCodeInput">
                        <img src="images/project/delete-icon.png" class="removePromoIcon" id="removePromo">
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" id="applyPromoCode" style="display: none;">
                        <div class="bodyText smaller text-white" data-lang="M03824"><?php echo $translations['M03824'][$language] /* Apply Promo */ ?></div>
                    </button>
                </div>

                <?php if(isset($_SESSION['userID'])) { ?>
                    <div class="px-4 pt-4">
                        <div class="borderBottom grey normal">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bodyText smaller" data-lang="M03817"><?php echo $translations['M03817'][$language] /* Your total points */ ?>:</div>
                                <div class="bodyText smaller lightBold" id="totalPoints">0</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bodyText smaller" data-lang="M03818"><?php echo $translations['M03818'][$language] /* Your points amount */ ?>:</div>
                                <div class="bodyText smaller lightBold" id="pointsAmount">0</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="bodyText smaller" data-lang="M03819"><?php echo $translations['M03819'][$language] /* Points to use/redeem */ ?>:</div>
                                <input type="text" id="pointsToUse" class="form-control2 text-right bodyText smaller lightBold" style="width: 70px; height: auto;" oninput="this.value = this.value.replace(/[^0-9.]/g, '') " onchange="adjustToEven()">
                            </div>
                            <button type="button" class="btn btn-primary mb-4" id="applyPoint">
                                <div class="bodyText smaller text-white" data-lang="M04046"><?php echo $translations['M04046'][$language] /* Redeem Point */ ?></div>
                            </button>
                        </div>
                    </div>
                <?php } ?>

                <div class="px-4 pt-4">
                    <div class="py-4 borderBottom grey normal">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bodyText smaller" data-lang="M04102"><?php echo $translations['M04102'][$language] /* Purchase Amount */ ?>:</div>
                            <div class="bodyText smaller lightBold" id="subtotal">RM0.00</div>
                        </div>

                        <?php if(isset($_SESSION['userID'])) { ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bodyText smaller" data-lang="M03820"><?php echo $translations['M03820'][$language] /* Redeemed Amount */ ?>:</div>
                                <div class="bodyText smaller lightBold text-red" id="redeemedAmount">-RM0.00</div>
                            </div>
                        <?php } ?>
                        
                        
                        
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="bodyText smaller" data-lang="M03826"><?php echo $translations['M03826'][$language] /* Promo Applied */ ?>:</div>
                            <div class="bodyText smaller lightBold text-red" id="voucherApplied">-RM0.00</div>
                        </div>
                        <div class="normal mb-4" style="background-color: #ECECFF;padding:10px;bottom:5px;display:none;" id="promoBreakdown">
                            
                        </div>
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="bodyText smaller" data-lang=""><?php echo $translations['M02881'][$language] /* Subtotal */ ?>:</div>
                            <div class="bodyText smaller lightBold " id="subtotalAfterPromo">RM0.00</div>
                        </div>
                    </div>
                </div>

                <div class="px-4 ">
                    <div class="py-4 borderBottom grey normal">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div>
                            <div class="bodyText smaller lightBold text-green text-uppercase" data-lang="M00061" id="deliveryFee"><?php echo $translations['M00061'][$language] /* Free */ ?></div>
                        </div>
                    </div>
                </div>

                <!-- total row -->
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="bodyText larger lightBold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div>
                        <div class="bodyText larger lightBold" id="totalSalePrice">RM0.00</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12 pt-5 pt-md-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center" id="cart-button">
                <button type="button" class="btn btn-primary blue" id="backBtn">
                    <!-- <div class="bodyText smaller text-white"><</div> -->
                    <div class="bodyText smaller text-white" data-lang="M03398"><?php echo $translations['M03398'][$language] /* Continue Shopping */ ?></div>
                </button>
                <button type="button" class="btn btn-primary" id="checkoutBtn">
                    <div class="bodyText smaller text-white" data-lang="M02817"><?php echo $translations['M02817'][$language] /* Checkout */ ?></div>
                </button>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="removeConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <!-- <img src="" id="modalIcon" class="modal-icon"> -->
                <!-- <i class="fa fa-check-bell-o modal-icon"></i> -->
                <!-- <div class="mt-2 modal-title">
                    <?php echo $translations['M03825'][$language] /* Remove Confirmation */ ?>
                </div> -->
                <div id="canvasAlertMessage" class="mt-2 modalText">
                    <?php echo $translations['M03905'][$language] /* Are you sure you want to remove this item from your cart? */ ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button id="canvasCloseBtn" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00278">
                    <?php echo $translations['M00278'][$language]; //Cancel ?>
                 </button>
                <button onclick="removeShoppingCart()" type="button" class="btn btn-primary py-2" data-dismiss="modal"  data-lang="M02539">
                    <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                </button>
            </div>
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

</html>


<script>

var url                     = 'scripts/reqDefault.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var userId                  = '<?php echo $_SESSION['userID']; ?>';
var promoToNextPage   = '<?php echo $_SESSION['POST'][$postAryName]['promoToNextPage']; ?>';
var pointsToUse =  '<?php echo $_SESSION['POST'][$postAryName]['pointsToUse']; ?>';

var removedProductId        = null;
var removedProductTemplate  = null;
var cartList                = [];
var appliedPromo                = [];


$(document).ready(function() {
    //console.log("promoToNextPage11 = "+promoToNextPage);
    //console.log("pointsToUse11 = "+pointsToUse);
    removeCookie('redeemAmount');

    $('#PromoCodeInput').val(promoToNextPage);

    if(promoToNextPage){
        $('#applyPromo').hide();
        $('#promoInput').show();
        $('#applyPromoCode').show();
    }
    $('#pointsToUse').val(pointsToUse);
    getShoppingCart();

    $('#applyPromo').click(function() {
        $('#applyPromo').hide();
        $('#promoInput').show();
        $('#applyPromoCode').show();

        $('#PromoCodeInput').focus();
    });

    $('#removePromo').click(function() {
        promoToNextPage = ''
        $('#PromoCodeInput').val('').focus();
    })

    $('#backBtn').click(function() {
        $.redirect('foodMenu');
    });
    
    $('#checkoutBtn').click(checkoutBtnClicked);

    $('#applyPromoCode').click(applyPromoClick);

    $('#applyPoint').click(applyPoint);
});

function highlightNotAvailable(data,message) {
    var cartList = data.cartList;

    $.each(cartList, function(k, v) {
        if(v['availability'] != "yes") {
            $("#" + v['productID']).css("background-color", "#fc6b64");

            showMessage('Items highlighted are in low quantity or out of stock.', '', 'Low Stock Quantity', 'exclamation-triangle', '');
            $("#checkoutBtn").prop("disabled", true);
        } else {
            $("#" + v['productID']).css("background-color", "#unset");
            $("#checkoutBtn").prop("disabled", false);
        }
    })
}

function showRemoveConfirmationModal(productId, productTemplate) {
    $('#removeConfirmationModal').modal();
    removedProductId = productId;
    removedProductTemplate = productTemplate;
}

function checkoutBtnClicked() {
    checkoutBtnClicked = true;
    redirectToCheckoutAddress();
}

function redirectToCheckoutAddress(data, message) { 

    promoToNextPage = $('#PromoCodeInput').val();
    redeemAmount = $('#pointsToUse').val();
    promoDiscount = "";
    $.redirect('checkoutAddress', {pointsToUse: redeemAmount, promoDiscount: promoDiscount, promoToNextPage: promoToNextPage, redeemAmount: redeemAmount});
}

$("#PromoCodeInput").keypress(function(event) { 
    if (event.keyCode == '13') {
        applyPromoClick();
    }
})

function refreshPage(data, message) {
    var pointsToUse = '';
    if(data)
    {
        pointsToUse = data.pointsToUse;
        promoDiscount = data.promo_discount;
        if(data.guestToken){
            var guestToken = data.guestToken;
        }

        $('#voucherApplied').html('-RM' +numberThousand(promoDiscount, 2));
    }
}

function applyPromoClick() {
    getShoppingCart();
}

function applyPromoModule(data, message) { 
    var formData = {
        command         : 'getShoppingCart',
        promo_code     : $('#PromoCodeInput').val(),
        bkend_token     : bkend_token,
    };
    var fCallback = loadShoppingCart;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function adjustToEven() {
    var pointsInput = document.getElementById('pointsToUse');
    var inputValue = parseFloat(pointsInput.value);
    
    // Check if the input value is odd
    if (inputValue % 2 !== 0) {
        
        // Decrement odd number by 1 to make it even
        inputValue -= 1;
        pointsInput.value = inputValue;
    }

    if(!inputValue){
        pointsInput.value = 0;
    }
}
</script>