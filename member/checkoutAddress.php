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
        <li class="c-stepper__item active">
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
            <?php if($_SESSION['userID']) { ?>
                <!-- Checkout As Member -->

                <div id="gotAddress">
                    <!-- Billing Address -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="bodyText larger bold mb-3" data-lang="M03287"><?php echo $translations['M03287'][$language] /* Billing Address */ ?></div>
                        <a class="bodyText smaller bold text-red pt-5 mb-3" href="javascript:;" onclick="addBtnClicked('shipping')" data-lang="M03289">+ <?php echo $translations['M03289'][$language] /* Add New Address */ ?></a>
                    </div>
                    <div id="billingAddressList">
                        <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3">
                            <div class="bodyText smaller lightBold mb-1" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                        </label>
                    </div>
                    
                    <!-- Shipping Address -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="bodyText larger bold pt-5 mb-3" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                        <a class="bodyText smaller bold text-red pt-5 mb-3" href="javascript:;" onclick="addBtnClicked('shipping')" data-lang="M03289">+ <?php echo $translations['M03289'][$language] /* Add New Address */ ?></a>
                    </div>
                    <div id="shippingAddressList">
                        <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3">
                            <div class="bodyText smaller lightBold mb-1" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                        </label>
                    </div>
                </div>
                <!-- For no address logged-in user -->
                <div id="noAddress">
                    <div id="userCheckoutDetails">
                        <!-- <div class="bodyText larger bold" data-lang="M03831"><?php echo $translations['M03831'][$language] /* Checkout As Guest */ ?></div> -->
                        <!-- <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div> -->
                        <div class="row pt-4">
                            <div class="col-12 form-group">
                                <label for="name"><span class="text-red" data-lang="M00224">*</span> <?php echo $translations['M00224'][$language] /* Name */ ?></label>
                                <input class="form-control" type="text" id="userName">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="emailAddress" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                                <input class="form-control" type="text" id="userEmailAddress">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="phone"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                                <div class="row m-0 align-items-center">
                                    <select class="form-control col-4" id="userDialingArea" style="width: 80px;">
                                        <option value="60">+60</option>
                                    </select>
                                    <input class="form-control col-8" type="text" id="userPhone">
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label for="companyName" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                                <input class="form-control" type="text" id="userCompanyName">
                            </div>
                            <div class="col-12 form-group">
                                <label for="streetNo"><span class="text-red" data-lang="M03808">*</span> <?php echo $translations['M03808'][$language] /* Street and Number */ ?></label>
                                <input class="form-control" type="text" id="userStreetNo">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="city"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                                <input class="form-control" type="text" id="userCity">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="zipCode"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                                <input class="form-control" type="text" id="userZipCode">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userCountry"><span class="text-red" data-lang="M00178">*</span> <?php echo $translations['M00178'][$language] /* Country */ ?></label>
                                <select id="userCountry" class="form-control">
                                    <option value="" data-lang="M02737"><?php echo $translations['M02737'][$language] /* Select Country */ ?></option>
                                </select>

                                <input class="form-control hide" type="text" id="userAddressID">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userState"><span class="text-red" data-lang="M00554">*</span> <?php echo $translations['M00554'][$language] /* State/Province */ ?></label>
                                <select id="userState" class="form-control">
                                    <option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>
                                </select>
                            </div>

                            <!-- No Add user - Ship to the same address -->
                            <div class="col-12 form-group">
                                <input type="checkbox" id="userShipToSameAddress" class="mr-2" checked>
                                <label for="userShipToSameAddress" data-lang="M03847"><?php echo $translations['M03847'][$language] /* Ship to the same address */ ?></label>
                            </div>
                        </div>
                    </div>

                    <!-- No Add user - Shipping address -->
                    <div id="userShippingAddressForm">
                        <div class="bodyText larger bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                        <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div>
                        <div class="row pt-4">
                            <div class="col-12 form-group">
                                <label for="userName2"><span class="text-red" data-lang="M00224">*</span> <?php echo $translations['M00224'][$language] /* Name */ ?></label>
                                <input class="form-control" type="text" id="userName2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userEmailAddress2" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                                <input class="form-control" type="text" id="userEmailAddress2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userPhone2"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                                <div class="d-flex align-items-center">
                                    <select class="form-control" id="userDialingArea2" style="width: 80px;">
                                        <option value="60">+60</option>
                                    </select>
                                    <input class="form-control" type="text" id="userPhone2">
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label for="userCompanyName2" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                                <input class="form-control" type="text" id="userCompanyName2">
                            </div>
                            <div class="col-12 form-group">
                                <label for="userStreetNo2"><span class="text-red" data-lang="M03808">*</span> <?php echo $translations['M03808'][$language] /* Street and Number */ ?></label>
                                <input class="form-control" type="text" id="userStreetNo2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userCity2"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                                <input class="form-control" type="text" id="userCity2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userZipCode2"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                                <input class="form-control" type="text" id="userZipCode2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userCountry2"><span class="text-red" data-lang="M00178">*</span> <?php echo $translations['M00178'][$language] /* Country */ ?></label>
                                <select id="userCountry2" class="form-control">
                                    <option value="" data-lang="M02737"><?php echo $translations['M02737'][$language] /* Select Country */ ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="userState2"><span class="text-red" data-lang="M00554">*</span> <?php echo $translations['M00554'][$language] /* State/Province */ ?></label>
                                <select id="userState2" class="form-control">
                                    <option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <!-- Checkout With Your Account -->
                <!-- <div class="text-center px-4 pb-5" id="memberCheckoutBtn">
                    <button type="button" class="btn btn-primary bodyText smaller px-4 py-3" data-lang="M03829"><?php echo $translations['M03829'][$language] /* Checkout With Your Account */ ?></button>
                </div> -->

                <!-- Or Seperator -->
                <!-- <div class="text-center px-4 mb-5 borderBottom grey normal position-relative">
                    <div class="bodyText smaller text-uppercase checkoutAddressOr" data-lang="M03830"><?php echo $translations['M03830'][$language] /* or */ ?></div>
                </div> -->

                <!-- Checkout As Guest -->
                <div id="guestCheckoutDetails">
                    <!-- <div class="bodyText larger bold" data-lang="M03831"><?php echo $translations['M03831'][$language] /* Checkout As Guest */ ?></div> -->
                    <!-- <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div> -->
                    <div class="row pt-4">
                        <div class="col-12 form-group">
                            <label for="name"><span class="text-red" data-lang="M00224">*</span> <?php echo $translations['M00224'][$language] /* Name */ ?></label>
                            <input class="form-control" type="text" id="name">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="emailAddress" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                            <input class="form-control" type="text" id="emailAddress">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="phone"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                            <div class="row m-0 align-items-center">
                                <select class="form-control col-4" id="dialingArea" style="width: 80px;">
                                    <option value="60">+60</option>
                                </select>
                                <input class="form-control col-8" type="text" id="phone">
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="companyName" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                            <input class="form-control" type="text" id="companyName">
                        </div>
                        <div class="col-12 form-group">
                            <label for="streetNo"><span class="text-red" data-lang="M03808">*</span> <?php echo $translations['M03808'][$language] /* Street and Number */ ?></label>
                            <input class="form-control" type="text" id="streetNo">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="city"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                            <input class="form-control" type="text" id="city">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="zipCode"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                            <input class="form-control" type="text" id="zipCode">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="country"><span class="text-red" data-lang="M00178">*</span> <?php echo $translations['M00178'][$language] /* Country */ ?></label>
                            <select id="country" class="form-control">
                                <option value="" data-lang="M02737"><?php echo $translations['M02737'][$language] /* Select Country */ ?></option>
                            </select>
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="state"><span class="text-red" data-lang="M00554">*</span> <?php echo $translations['M00554'][$language] /* State/Province */ ?></label>
                            <select id="state" class="form-control">
                                <option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>
                            </select>
                        </div>

                        <!-- Guest - Ship to the same address -->
                        <div class="col-12 form-group">
                            <input type="checkbox" id="guestShipToSameAddress" class="mr-2" checked>
                            <label for="guestShipToSameAddress" data-lang="M03847"><?php echo $translations['M03847'][$language] /* Ship to the same address */ ?></label>
                        </div>
                    </div>
                </div>

                <!-- Guest - Shipping address -->
                <div id="guestShippingAddressForm">
                    <div class="bodyText larger bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                    <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div>
                    <div class="row pt-4">
                        <div class="col-12 form-group">
                            <label for="name2"><span class="text-red" data-lang="M00224">*</span> <?php echo $translations['M00224'][$language] /* Name */ ?></label>
                            <input class="form-control" type="text" id="name2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="emailAddress2" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                            <input class="form-control" type="text" id="emailAddress2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="phone2"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="dialingArea2" style="width: 80px;">
                                    <option value="60">+60</option>
                                </select>
                                <input class="form-control" type="text" id="phone2">
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="companyName2" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                            <input class="form-control" type="text" id="companyName2">
                        </div>
                        <div class="col-12 form-group">
                            <label for="streetNo2"><span class="text-red" data-lang="M03808">*</span> <?php echo $translations['M03808'][$language] /* Street and Number */ ?></label>
                            <input class="form-control" type="text" id="streetNo2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="city2"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                            <input class="form-control" type="text" id="city2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="zipCode2"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                            <input class="form-control" type="text" id="zipCode2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="country2"><span class="text-red" data-lang="M00178">*</span> <?php echo $translations['M00178'][$language] /* Country */ ?></label>
                            <select id="country2" class="form-control">
                                <option value="" data-lang="M02737"><?php echo $translations['M02737'][$language] /* Select Country */ ?></option>
                            </select>
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="state2"><span class="text-red" data-lang="M00554">*</span> <?php echo $translations['M00554'][$language] /* State/Province */ ?></label>
                            <select id="state2" class="form-control">
                                <option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php } ?>
            

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
                <button type="button" class="btn btn-primary grey px-4 py-3 col-12 col-lg-4 col-md-5 text-center" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M04018"><?php echo $translations['M04018'][$language] /* Cancel Order */ ?></div>
                </button>
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-5 col-md-6 d-flex justify-content-between align-items-center mt-3 mt-md-0" id="nextBtn">
                    <div class="bodyText smaller text-white" data-lang="M02095"><?php echo $translations['M02095'][$language] /* Next */ ?></div>
                    <div class="bodyText smaller text-white">></div>
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

var url                     = 'scripts/reqDefault.php';
var urlFPX                  = 'scripts/reqFPX.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var userId                  = '<?php echo $_SESSION['userID'] ?>';
var pointsToUse             = '<?php echo $_POST['pointsToUse'] ?>';
var shippingCountryChanged  = false;
var shipToSameAddress       = true;
var billingAddressId         = '';
var shippingAddressId         = '';
var userShipToSameAddress = true;
var currentStateId = '';
var editAddressBtn = false;

$(document).ready(function() {
    if($('#userShipToSameAddress').is(':checked')) {   // Same Address
        $('#userShippingAddressForm').hide();
    } else {   // Same Address
        $('#userShippingAddressForm').show();
    }
    // Checkout address list
    if(userId) getAddressList(1);
    else loadCountryState();

    $('#pointsToUse').val(pointsToUse);

    // Load summary cart
    getShoppingCart(1);

    $('#memberCheckoutBtn').click(function() {
        $.redirect('login');
    });

    $('#country').change(function() {
        var countryId = $('#country').val();
        shippingCountryChanged = false;
        loadCountryState(countryId);
    });

    $('#country2').change(function() {
        var countryId = $('#country2').val();
        shippingCountryChanged = true;
        loadCountryState(countryId);
    })

    $('#userCountry').change(function() {
        var countryId = $('#country').val();
        shippingCountryChanged = false;
        loadCountryState(countryId);
    });

    $('#useCountry2').change(function() {
        var countryId = $('#country2').val();
        shippingCountryChanged = true;
        loadCountryState(countryId);
    })

    $('#guestShipToSameAddress').change(function() {
        if($('#guestShipToSameAddress').is(':checked')) {   // Same Address
            $('#guestShippingAddressForm').hide();
            $('#guestName').focus();
            shipToSameAddress = true;

            $('html, body').animate({
                scrollTop: $("#guestCheckoutDetails").offset().top - 30
            }, 1000);
        } else {    // Other address
            $('#guestShippingAddressForm').show();
            $('#guestShippingName').focus();
            shipToSameAddress = false;

            $('html, body').animate({
                scrollTop: $("#guestShippingAddressForm").offset().top - 70
            }, 1000);
        }
    });

    // for logged-in user with no address
    $('#userShipToSameAddress').change(function() {
        if($('#userShipToSameAddress').is(':checked')) {   // Same Address
            $('#userShippingAddressForm').hide();
            $('#userName').focus();
            useShipToSameAddress = true;

            $('html, body').animate({
                scrollTop: $("#userCheckoutDetails").offset().top - 30
            }, 1000);
        } else {    // Other address
            $('#userShippingAddressForm').show();
            $('#userShippingName').focus();
            userShipToSameAddress = false;

            // $('html, body').animate({
            //     scrollTop: $("#userShippingAddressForm").offset().top - 70
            // }, 1000);
        }
    });

    $('#removeVoucher').click(function() {
        if($('#voucherApplied').html() == 'RM0.00') {
            showMessage('<?php echo $translations['M03833'][$language] /* No voucher applied. */ ?>', 'warning', '<?php echo $translations['M03834'][$language] /* Voucher Applied */ ?>', 'warning', '');
        } else {
            $('#voucherApplied').html('RM0.00');
            showMessage('<?php echo $translations['M03835'][$language] /* Voucher has been removed. */ ?>', 'success', '<?php echo $translations['M03834'][$language] /* Voucher Applied */ ?>', 'success', '');
        }
    });

    $('#backBtn').click(function() {
        $.redirect('foodMenu');
    });

    $('#nextBtn').click(function() {
        if(!userId) guestOwnerVerification();
        else addressVerification();
    });
});

function changeBillingAddress(addressId) {
    shippingAddressId = addressId;
}

function changeShippingAddress(addressId) {
    shippingAddressId = addressId;
}

function loadCountryState(countryId) {
	var formData = {
        command     	: 'getState',
		countryId 		: countryId
    };

	if(countryId && countryId != '') fCallback = loadStateList;
	else fCallback = loadCountryStateList;
    
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadCountryStateList(data, message) {
	var countryList = data.country;
	var stateList = data.state;
	displayCountryList(countryList);
	displayStateList(stateList);
}

function loadStateList(data, message) {
	var stateList = data.state;
	displayStateList(stateList);
}

function displayCountryList(list) {
	if(list) {
		var html = '';
		html += `<option value="" data-lang="M02737"><?php echo $translations['M02737'][$language] /* Select Country */ ?></option>`;
		$.each(list, function(k, v) {
            if(v['name'] == 'Malaysia') {
                html += `
                    <option value="${v['id']}" selected>${v['name']}</option>
                `;
            }
		});

		$('#country').html(html);
        $('#country2').html(html);

        $('#userCountry').html(html);
        $('#userCountry2').html(html);
	}
}

function displayStateList(list) {
	if(list) {
		var html = '';
		html += `<option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>`;
		$.each(list, function(k, v) {
			html += `
				<option value="${v['id']}">${v['name']}</option>
			`;
		});

        $('#state').html(html);
        $('#state2').html(html);

        $('#userState').html(html);
        $('#userState2').html(html);
	}

    if(currentStateId && currentStateId != '') {
        $('#userState').val(currentStateId);
        currentStateId = '';
    }
}

function getAddressList() {
    var formData = {
        command     : 'getAddressList'
    };
    var fCallback = loadCheckoutAddressList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadCheckoutAddressList(data, message) {
    var addressList = data.list;

    if(addressList) {
        var html = '';
        $.each(addressList, function(k, v) {
            html += `
                <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="billingAddress${v['deliveryID']}">
            `;

            if(v['type'] == '1') {
                html += `
                    <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" name="billingAddress" checked onclick="changeBillingAddress(${v['deliveryID']})">
                `;
                billingAddressId = v['deliveryID'];
            } else {
                if(k == 0) {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" name="billingAddress" onclick="changeBillingAddress(${v['deliveryID']})" checked>
                    `;
                    billingAddressId = v['deliveryID'];
                } else {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" name="billingAddress" onclick="changeBillingAddress(${v['deliveryID']})">
                    `;
                }
            }

            html += `
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="mr-3">
                            <div class="bodyText smaller lightBold mb-1">${v['fullname']}</div>
                            <div class="bodyText smaller" id="billingFullAddress${v['deliveryID']}">${v['address']}</div>
                        </div>
                        <button type="button" class="btn btn-primary px-5 py-3 text-center" id="editShippingAddress${v['deliveryID']}" onclick="editBtnClicked(${v['deliveryID']}, '${v['address_type']}', '${k+1}')">
                            <div class="bodyText smaller text-white" data-lang="M00226"><?php echo $translations['M00226'][$language] /* Edit */ ?></div>
                        </button>
                    </div>
                </label>
            `;     
        });

        $('#billingAddressList').html(html);
        $('#userCheckoutDetails').hide();
    }else {
        $('#noAddress').show()
        $('#gotAddress').hide()
        loadCountryState()
    }

    // Shipping Address
    if(addressList) {
        var html = '';
        $.each(addressList, function(k, v) {
            html += `
                <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="shippingAddress${v['deliveryID']}">
            `;

            if(v['type'] == '1') {
                html += `
                    <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" name="shippingAddress" checked onclick="changeShippingAddress(${v['deliveryID']})">
                `;
                shippingAddressId = v['deliveryID'];
            } else {
                if(k == 0) {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" name="shippingAddress" onclick="changeShippingAddress(${v['deliveryID']})" checked>
                    `;
                    shippingAddressId = v['deliveryID'];
                } else {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" name="shippingAddress" onclick="changeShippingAddress(${v['deliveryID']})">
                    `;
                }
            }

            html += `
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="mr-3">
                            <div class="bodyText smaller lightBold mb-1">${v['fullname']}</div>
                            <div class="bodyText smaller" id="shippingFullAddress${v['deliveryID']}">${v['address']}</div>
                        </div>
                        <button type="button" class="btn btn-primary px-5 py-3 text-center" id="editShippingAddress${v['deliveryID']}" onclick="editBtnClicked(${v['deliveryID']}, '${v['address_type']}', '${k+1}')">
                            <div class="bodyText smaller text-white" data-lang="M00226"><?php echo $translations['M00226'][$language] /* Edit */ ?></div>
                        </button>
                    </div>
                </label>
            `;     
        });

        $('#shippingAddressList').html(html);
    }else {
        $('#noAddress').show()
        $('#gotAddress').hide()
        loadCountryState()
    }
}

function addBtnClicked(addressType) {
    // $.redirect('addNewAddress', { addressType: addressType });
    editAddressBtn = false;
    billingAddressId = "";
    shippingAddressId = "";

    $('#noAddress').show();
    $('#gotAddress').hide();
    $('#userCheckoutDetails').show();
    loadCountryState();
}

function editBtnClicked(addressId) {
    // $.redirect('editAddress', { addressId: addressId, addressType: addressType, addressNo: addressNo });

    editAddressBtn = true;

    var formData = {
        command         : 'getAddress',
        id              : addressId,
    };

    fCallback = loadAddress;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadAddress(data, message) {
    billingAddressId = "";
    shippingAddressId = "";

    $('#noAddress').show();
    $('#gotAddress').hide();
    $('#userCheckoutDetails').show();
    loadCountryState();

    $("#userName").val(data.addressDetails.name);
    $("#userEmailAddress").val(data.addressDetails.email);
    $("#userPhone").val(data.addressDetails.phone);
    // $("#userCompanyName").val(data.addressDetails.name);
    $("#userStreetNo").val(data.addressDetails.address);
    $("#userCity").val(data.addressDetails.cityID);
    $("#userZipCode").val(data.addressDetails.postCodeID);
    $("#userCountry").val(data.addressDetails.countryID);
    $("#userAddressID").val(data.addressDetails.id);

    currentStateId = data.addressDetails.stateID;

    // $('#userCountry').trigger('change');
}

function guestOwnerVerification() {
    var cartList = getOldCart();

    if(cartList) {
        var packageList = cartList.map((item) => {
            return { 
                packageID: item.productID,
                quantity: item.quantity,
                product_template: item.product_attribute_value_id
            };
        });

        var formData = {
            command             : 'guestOwnerVerification',
            name                : $('#name').val(),
            emailAddress        : $('#emailAddress').val(),
            phone               : $('#phone').val(),
            dialingArea         : $('#dialingArea').val(),
            companyName         : $('#companyName').val(),
            streetNo            : $('#streetNo').val(),
            city                : $('#city').val(),
            zipCode             : $('#zipCode').val(),
            country             : $('#country option:selected').html(),
            state               : $('#state option:selected').html(),
            package             : packageList,
            purchaseAmount      : parseFloat($('#totalPrice').html()),
            shipping_fee        : parseFloat(($('#deliveryFee').html()).replace('RM', '')),
            bkend_token         : $.cookie('oldToken')
        };

        if($('#guestShipToSameAddress').is(':checked')) {
            formData['name2']                   = $('#name').val();
            formData['emailAddress2']           = $('#emailAddress').val();
            formData['phone2']                  = $('#phone').val();
            formData['dialingArea2']            = $('#dialingArea').val();
            formData['companyName2']            = $('#companyName').val();
            formData['streetNo2']               = $('#streetNo').val();
            formData['city2']                   = $('#city').val();
            formData['zipCode2']                = $('#zipCode').val();
            formData['country2']                = $('#country option:selected').html(),
            formData['state2']                  = $('#state option:selected').html(),
            formData['guestShipToSameAddress']  = 1;
        } else {
            formData['name2']                   = $('#name2').val();
            formData['emailAddress2']           = $('#emailAddress2').val();
            formData['phone2']                  = $('#phone2').val();
            formData['dialingArea2']            = $('#dialingArea2').val();
            formData['companyName2']            = $('#companyName2').val();
            formData['streetNo2']               = $('#streetNo2').val();
            formData['city2']                   = $('#city2').val();
            formData['zipCode2']                = $('#zipCode2').val();
            formData['country2']                = $('#country2 option:selected').html(),
            formData['state2']                  = $('#state2 option:selected').html(),
            formData['guestShipToSameAddress']  = 0;
        }

        var fCallback = successCreateGuestAcc;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function successCreateGuestAcc(data, message) {
    if(data) {
        $.redirect('confirmOrder', {
            txnAmount: data.payment_amount,
            purchaseId: data.purchase_id,
            saleId: data.saleDetail_id,
            txnTime: data.getTxnTime,
            clientId: data.clientID
        });
    }
}

function addressVerification() {
    if(billingAddressId && shippingAddressId) {
        addNewPayment()
    }else {
        
        addAddress()

        // if($('#guestShipToSameAddress').is(':checked')) {
        //     addAddress()
        // }else {
        //     addAddress()
        //     addAddress2()
        // }
    }
}

function addAddress() { 
	if(editAddressBtn == false) {
        var formData = {
            command     	: 'addAddress',
    		addressType 	: 'shipping',
    		fullName 		: $('#userName').val(),
            phone           : $('#userPhone').val(),
    		address 		: $('#userStreetNo').val(),
    		cityID 			: $('#userCity').val(),
    		postalCodeID 	: $('#userZipCode').val(),
    		stateID 		: $('#userState option:selected').val(),
    		disabled 		: 0,
    		isDefault 		: 1
        };

        if($('#userShipToSameAddress').is(':checked')) {
            fCallback = successAddAddress;
        }else {
            fCallback = addAddress2;
        }
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    } else {
        var formData = {
            command         : 'editAddress',
            id              : $("#userAddressID").val(),
            addressType     : 'shipping',
            fullName        : $('#userName').val(),
            address         : $('#userStreetNo').val(),
            phone           : $('#userPhone').val(),
            cityID          : $('#userCity').val(),
            postalCodeID    : $('#userZipCode').val(),
            stateID         : $('#userState option:selected').val(),
            countryID       : $('#country').val(),
            isDefault       : 1
        };
        fCallback = successUpdateAddress;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function successUpdateAddress(data, message) {
    showMessage('<?php echo $translations['M03802'][$language] /* Update Successful. */ ?>', 'success', '<?php echo $translations['M03814'][$language] /* Edit My Address */ ?>', '', 'checkoutAddress');
}

function addAddress2(data) {
    billingAddressId = data['address_id_shipping']

	var formData = {
        command     	: 'addAddress',
		addressType 	: 'shipping',
		fullName 		: $('#userName2').val(),
		address 		: $('#userStreetNo2').val(),
		cityID 			: $('#userCity2').val(),
		postalCodeID 	: $('#userZipCode2').val(),
		stateID 		: $('#userState2 option:selected').val(),
		disabled 		: 0,
		isDefault 		: 0
    };

    fCallback = successAddAddress2;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddAddress(data,message) {

    billingAddressId = data['address_id_shipping']
    shippingAddressId = data['address_id_shipping']
    addNewPayment()
}

function successAddAddress2(data,message) {
    shippingAddressId = data['address_id_shipping']

    addNewPayment()
}

function addNewPayment() {
    var formData = {
        command     	    : 'addNewPayment',
        purchase_amount     : $('#totalPrice').html(),
        package_id          : 'PACKAGE001',
        quantityOfReward    : '0',
        isRedeemReward      : '0',
        redeemAmount        : $.cookie('redeemAmount'),
        memberPointDeduct   : '0',
        shipping_fee        : parseFloat(($('#deliveryFee').html()).replace('RM', '')),
        billing_address     : billingAddressId,
        shipping_address    : shippingAddressId,
        bkend_token         :$.cookie('oldToken'),
        userID              : userId

    };
	var fCallback = successAddNewPayment;
    ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddNewPayment(data, message) {
    if(data) {
        $.redirect('confirmOrder', {
            txnAmount: data.payment_amount,
            purchaseId: data.purchase_id,
            saleId: data.saleDetail_id,
            txnTime: data.getTxnTime,
        });
    }
}

</script>
