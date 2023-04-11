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
</section>

<section class="section whiteBg">
    <div class="row mb-5 mb-md-0">
        <div class="col-md-8 col-12">
            <!-- Cart -->
            <div class="borderAll grey normal">
                <div class="greyBg orderSummary">
                    <table class="w-100">
                        <thead class="borderBottom grey normal">
                            <tr>
                                <th class="px-4 py-4"><div class="bodyText smaller lightBold" data-lang="M02990"><?php echo $translations['M02990'][$language] /* Product */ ?></div></th>
                                <th class="text-center px-2 py-4"><div class="bodyText smaller lightBold" data-lang="M00244"><?php echo $translations['M00244'][$language] /* Quantity */ ?></div></th>
                                <th class="text-right px-4 py-4"><div class="bodyText smaller lightBold" data-lang="M03129"><?php echo $translations['M03129'][$language] /* Price */ ?></div></th>
                                <th></th>
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
        <div class="col-md-4 col-12 pt-5 pt-md-0">
            <div class="greyBg borderAll grey normal">
                <div class="p-4 borderBottom grey normal">
                    <div class="bodyText smaller lightBold" data-lang="M02895"><?php echo $translations['M02895'][$language] /* Order Total */ ?></div>
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
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="bodyText smaller" data-lang="M03819"><?php echo $translations['M03819'][$language] /* Points to use/redeem */ ?>:</div>
                                <input type="text" id="pointsToUse" class="form-control2 text-right bodyText smaller lightBold" style="width: 70px; height: auto;" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="px-4 pt-4">
                    <div class="borderBottom grey normal">

                        <?php if(isset($_SESSION['userID'])) { ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bodyText smaller" data-lang="M03820"><?php echo $translations['M03820'][$language] /* Redeemed Amount */ ?>:</div>
                                <div class="bodyText smaller lightBold text-red" id="redeemedAmount">-RM0.00</div>
                            </div>
                        <?php } ?>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bodyText smaller" data-lang="M02881"><?php echo $translations['M02881'][$language] /* Subtotal */ ?>:</div>
                            <div class="bodyText smaller lightBold" id="subtotal">RM0.00</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bodyText smaller" data-lang="M03821"><?php echo $translations['M03821'][$language] /* Taxes */ ?>:</div>
                            <div class="bodyText smaller lightBold" id="taxes">RM0.00</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bodyText smaller" data-lang="M03822"><?php echo $translations['M03822'][$language] /* Total Savings */ ?>:</div>
                            <div class="bodyText smaller lightBold text-green" id="totalSavings">RM0.00</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="bodyText smaller" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?>:</div>
                            <div class="bodyText smaller lightBold text-green text-uppercase" data-lang="M00061" id="deliveryFee"><?php echo $translations['M00061'][$language] /* Free */ ?></div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="bodyText larger lightBold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div>
                        <div class="bodyText larger lightBold" id="totalSalePrice">RM0.00</div>
                    </div>
                    <div class="p-3 whiteBg borderAll grey normal mt-3" id="applyPromo">
                        <span class="bodyText smaller" data-lang="M03823"><?php echo $translations['M03823'][$language] /* Have a voucher */ ?>?</span> &nbsp; <a href="javascript:;" class="bodyText smaller text-red lightBold text-underline" data-lang="M03824"><?php echo $translations['M03824'][$language] /* Apply Promo */ ?></a>
                    </div>
                    <div class="position-relative mt-3" id="promoInput">
                        <input type="text" class="form-control2 w-100 px-3 pt-0" placeholder="Promo Code">
                        <img src="images/project/delete-icon.png" class="removePromoIcon" id="removePromo">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12 pt-5 pt-md-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <button type="button" class="btn btn-primary blue px-4 py-3 col-12 col-lg-4 col-md-5 d-flex justify-content-between align-items-center" id="backBtn">
                    <div class="bodyText smaller text-white"><</div>
                    <div class="bodyText smaller text-white" data-lang="M03398"><?php echo $translations['M03398'][$language] /* Continue Shopping */ ?></div>
                </button>
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-3 col-md-4 d-flex justify-content-between align-items-center mt-3 mt-md-0" id="checkoutBtn">
                    <div class="bodyText smaller text-white" data-lang="M02817"><?php echo $translations['M02817'][$language] /* Checkout */ ?></div>
                    <div class="bodyText smaller text-white">></div>
                </button>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="removeConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title showLangCode" data-lang="M03825">
                    <?php echo $translations['M03825'][$language] /* Remove Confirmation */ ?>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M03905">
                        <?php echo $translations['M03905'][$language] /* Doing this action will delete the item from your cart, are you sure you want to do this? */ ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer pb-4">
                <button onclick="getShoppingCart()" type="button" class="btn btn-primary grey py-2 mr-3" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M00278">
                        <?php echo $translations['M00278'][$language] /* Cancel */ ?>
                    </span>
                </button>
                <button onclick="removeShoppingCart()" type="button" class="btn btn-primary py-2" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M02539">
                        <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                    </span>
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

var userId                  = '<?php echo $_SESSION['userID'] ?>';

var removedProductId        = null;
var removedProductTemplate  = null;
var cartList                = [];

$(document).ready(function() {    
    getShoppingCart();

    $('#applyPromo').click(function() {
        $('#applyPromo').hide();
        $('#promoInput').show();
    });

    $('#removePromo').click(function() {
        $('#applyPromo').show();
        $('#promoInput').hide();
    })

    $('#backBtn').click(function() {
        $.redirect('foodMenu');
    });
    
    $('#checkoutBtn').click(function() {
        var pointsToUse = $('#pointsToUse').val();
        $.redirect('checkoutAddress', { pointsToUse: pointsToUse });
    });
});

function showRemoveConfirmationModal(productId, productTemplate) {
    $('#removeConfirmationModal').modal();
    removedProductId = productId;
    removedProductTemplate = productTemplate;
}

</script>