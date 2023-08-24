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

<!-- My Cart Stepper -->
<section class="section whiteBg px-0 pb-0">
    <div class="kt-container row">
        <div class="col-12">
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
                                <td colspan="4" class="p-4 text-center">
                                    <div class="bodyText smaller lightBold" data-lang="M03803" style="width: 100%;"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
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

                    <!-- Send as Gift-->
                    <div class="col-12" id="userGift">
                        <input type="checkbox" id="sendAsGift" class="mr-2 checkForGift">
                        <label for="sendAsGift" ><?php echo $translations['M04089'][$language] /* Send as gift */ ?></label>
                    </div>

                    <!-- Shipping Address -->
                    <div id="displayShippingAddress">
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
                </div>
                
                <!-- For no address logged-in user -->
                <div id="noAddress">
                    <div id="userCheckoutDetails">
                        <!-- <div class="bodyText larger bold" data-lang="M03831"><?php echo $translations['M03831'][$language] /* Checkout As Guest */ ?></div> -->
                        <!-- <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div> -->
                        <div class="row pt-4">
                            <div class="col-12 form-group">
                                <label for="name"><span class="text-red" data-lang="M04038">*</span> <?php echo $translations['M04038'][$language] /* Full Name / Company Name */ ?></label>
                                <input class="form-control" type="text" id="userName">
                            </div>
                            <!-- <div class="col-md-6 col-12 form-group">
                                <label for="emailAddress" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                                <input class="form-control" type="text" id="userEmailAddress">
                            </div> -->
                            <div class="col-12 form-group">
                                <label for="phone"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                                <div class="row m-0 align-items-center">
                                    <select class="form-control col-2" id="userDialingArea" style="width: 80px;">
                                        <option value="60">+60</option>
                                    </select>
                                    <input class="form-control col-8" type="text" id="userPhone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                </div>
                            </div>
                            <!-- <div class="col-12 form-group">
                                <label for="companyName" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                                <input class="form-control" type="text" id="userCompanyName">
                            </div> -->
                            <div class="col-12 form-group">
                                <label for="streetNo"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 1</label>
                                <input class="form-control" type="text" id="userStreetNo">
                            </div>
                            <div class="col-12 form-group">
                                <label for="userAddress2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 2</label>
                                <input class="form-control" type="text" id="userAddress2">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="city"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                                <input class="form-control" type="text" id="userCity">
                            </div>
                            <div class="col-md-6 col-12 form-group">
                                <label for="zipCode"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                                <input class="form-control" type="text" id="userZipCode" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength = "5">
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
                            <div class="col-12 form-group" id="userShip">
                                <input type="checkbox" id="userShipToSameAddress" class="mr-2" checked>
                                <label for="userShipToSameAddress" data-lang="M03847"><?php echo $translations['M03847'][$language] /* Ship to the same address */ ?></label>
                            </div>

                            <!-- Send as Gift-->
                            <!-- <div class="col-12" id="userGift2">
                                <input type="checkbox" id="sendAsGift2" class="mr-2 checkForGift">
                                <label for="sendAsGift2" >Send as gift</label>
                            </div> -->
                        </div>
                    </div>

                    <!-- No Add user - Shipping address -->
                    <div id="userShippingAddressForm">
                        <div class="bodyText larger bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                        <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div>
                        <div class="row pt-4">
                            <div class="col-12 form-group">
                                <label for="userName2"><span class="text-red" data-lang="M04038">*</span> <?php echo $translations['M04038'][$language] /* Full Name / Company Name */ ?></label>
                                <input class="form-control" type="text" id="userName2">
                            </div>
                            <!-- <div class="col-md-6 col-12 form-group">
                                <label for="userEmailAddress2" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                                <input class="form-control" type="text" id="userEmailAddress2">
                            </div> -->
                            <div class="col-12 form-group">
                                <label for="userPhone2"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                                <div class="d-flex align-items-center">
                                    <select class="form-control" id="userDialingArea2" style="width: 80px;">
                                        <option value="60">+60</option>
                                    </select>
                                    <input class="form-control" type="text" id="userPhone2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                </div>
                            </div>
                            <!-- <div class="col-12 form-group">
                                <label for="userCompanyName2" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                                <input class="form-control" type="text" id="userCompanyName2">
                            </div> -->
                            <div class="col-12 form-group">
                                <label for="userStreetNo2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 1</label>
                                <input class="form-control" type="text" id="userStreetNo2">
                            </div>
                            <div class="col-12 form-group">
                                <label for="secondUserAddress2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 2</label>
                                <input class="form-control" type="text" id="secondUserAddress2">
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
                            <label for="name"><span class="text-red" data-lang="M04038">*</span> <?php echo $translations['M04038'][$language] /* Full Name / Company Name */ ?></label>
                            <input class="form-control" type="text" id="name">
                        </div>
                        <!-- <div class="col-md-6 col-12 form-group">
                            <label for="emailAddress" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                            <input class="form-control" type="text" id="emailAddress">
                        </div> -->
                        <div class="col-12 form-group">
                            <label for="phone"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                            <div class="row m-0 align-items-center">
                                <select class="form-control col-4" id="dialingArea" style="width: 80px;">
                                    <option value="60">+60</option>
                                </select>
                                <input class="form-control col-8" type="text" id="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                            </div>
                        </div>
                        <!-- <div class="col-12 form-group">
                            <label for="companyName" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                            <input class="form-control" type="text" id="companyName">
                        </div> -->
                        <div class="col-12 form-group">
                            <label for="streetNo"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 1</label>
                            <input class="form-control" type="text" id="streetNo">
                        </div>
                        <div class="col-12 form-group">
                            <label for="address2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 2</label>
                            <input class="form-control" type="text" id="address2">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="city"><span class="text-red" data-lang="M00183">*</span> <?php echo $translations['M00183'][$language] /* City */ ?></label>
                            <input class="form-control" type="text" id="city">
                        </div>
                        <div class="col-md-6 col-12 form-group">
                            <label for="zipCode"><span class="text-red" data-lang="M03544">*</span> <?php echo $translations['M03544'][$language] /* Zip Code */ ?></label>
                            <input class="form-control" type="text" id="zipCode" id="userZipCode" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength = "5">
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
                        <div class="col-12 form-group" id="guestShip">
                            <input type="checkbox" id="guestShipToSameAddress" class="mr-2" checked>
                            <label for="guestShipToSameAddress" data-lang="M03847"><?php echo $translations['M03847'][$language] /* Ship to the same address */ ?></label>
                        </div>

                        <!-- Send as Gift-->
                        <div class="col-12" id="userGift3">
                            <input type="checkbox" id="sendAsGift3" class="mr-2 checkForGift">
                            <label for="sendAsGift3" ><?php echo $translations['M04089'][$language] /* Send as gift */ ?></label>
                        </div>
                    </div>
                </div>

                <!-- Guest - Shipping address -->
                <div id="guestShippingAddressForm">
                    <div class="bodyText larger bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                    <div class="bodyText smaller pb-3" data-lang="M03832"><?php echo $translations['M03832'][$language] /* No need to register. Please fill in your details for this order. */ ?></div>
                    <div class="row pt-4">
                        <div class="col-12 form-group">
                            <label for="name2"><span class="text-red" data-lang="M04038">*</span> <?php echo $translations['M04038'][$language] /* Full Name / Company Name */ ?></label>
                            <input class="form-control" type="text" id="name2">
                        </div>
                        <!-- <div class="col-md-6 col-12 form-group">
                            <label for="emailAddress2" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                            <input class="form-control" type="text" id="emailAddress2">
                        </div> -->
                        <div class="col-12 form-group">
                            <label for="phone2"><span class="text-red" data-lang="M01774">*</span> <?php echo $translations['M01774'][$language] /* Phone */ ?></label>
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="dialingArea2" style="width: 80px;">
                                    <option value="60">+60</option>
                                </select>
                                <input class="form-control" type="text" id="phone2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                        <!-- <div class="col-12 form-group">
                            <label for="companyName2" data-lang="M03195"><?php echo $translations['M03195'][$language] /* Company Name */ ?></label>
                            <input class="form-control" type="text" id="companyName2">
                        </div> -->
                        <div class="col-12 form-group">
                            <label for="streetNo2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 1</label>
                            <input class="form-control" type="text" id="streetNo2">
                        </div>
                        <div class="col-12 form-group">
                            <label for="secondAddress2"><span class="text-red" data-lang="M03808">*</span><?php echo $translations['M04069'][$language] /* Address Line */ ?> 2</label>
                            <input class="form-control" type="text" id="secondAddress2">
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
            <div class="text-center">
                <p id="getAddressError" class="customError text-danger" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="getAddressErrorText" style="margin-left: 15px;">&nbsp;Incorrect. Please try again.</span></p>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3" id="cart-button">
                
                <button type="button" class="btn btn-primary grey" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
                <button type="button" class="btn btn-primary" id="nextBtn">
                    <div class="bodyText smaller text-white" data-lang="M02095"><?php echo $translations['M02095'][$language] /* Next */ ?></div>
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

var url                     = 'scripts/reqDefault.php';
var urlFPX                  = 'scripts/reqFPX.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var userId                  = '<?php echo $_SESSION['userID'] ?>';
var pointsToUse             = '<?php echo $_SESSION['POST'][$postAryName]['pointsToUse'] ?>';
var promoDiscount           = '<?php echo $_SESSION['POST'][$postAryName]['promoDiscount'] ?>';
var promoToNextPage         = '<?php echo $_SESSION['POST'][$postAryName]['promoToNextPage']?>';
var shippingCountryChanged  = false;
var shipToSameAddress       = true;
var billingAddressId         = '';
var shippingAddressId         = '';
var userShipToSameAddress = true;
var sendAsGift = false;
var currentStateId = '';
var editAddressBtn = false;
var cartLoaded              = false;
var fpx_txnAmount;
var shippingPostcode = "";


var nextBtnFlag = true;
if("<?php echo $_SESSION['POST'][$postAryName]['guestToken']; ?>"){
    var guestToken = "<?php echo $_SESSION['POST'][$postAryName]['guestToken']; ?>";
}

$(document).ready(function() {
    redeemAmount = pointsToUse;

    $('#pointsToUse').val(redeemAmount);
    $('#voucherApplied').val(promoDiscount);
    $('#PromoCodeInput').val(promoToNextPage);    

    getDeliveryMethod();
    
    if($('#userShipToSameAddress').is(':checked')) {   // Same Address
        $('#userShippingAddressForm').hide();
    } else {   // Same Address
        $('#userShippingAddressForm').show();
    }
    
    // Checkout address list
    if(userId) getAddressList(1);
    else {
        loadCountryState();
        getShoppingCart();
    }


    // Load summary cart
   // getShoppingCart();

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

    $('#backBtn').click(function() { 
  
        if(nextBtnFlag == false) { 
            // return console.log("1")
            $.redirect('checkoutAddress',{
                                            promoToNextPage                  : $('#PromoCodeInput').val(),
                                            pointsToUse                    : $('#pointsToUse').val(), 
                });

        } else { 
            // return console.log("2")
            $.redirect('reviewOrder',{
                                            promoToNextPage                  : $('#PromoCodeInput').val(),
                                            pointsToUse                    : $('#pointsToUse').val(), 
                });
        }
    });

    $('#nextBtn').click(function() {
        console.log("userId = "+userId);
        if(!userId) 
            guestOwnerVerification();
        else 
            addressVerification();
            // $.redirect('checkoutAddress');
    });
});

function changeBillingAddress(addressId) {
    billingAddressId = addressId;
}

function changeShippingAddress(addressId,postcode) {
    shippingAddressId = addressId;
    shippingPostcode = postcode;
    $("#postcode").val(shippingPostcode);
    getShoppingCart();
    console.log(shippingPostcode);


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
                    <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="billingAddress" checked onclick="changeBillingAddress(${v['deliveryID']})">
                `;
                billingAddressId = v['deliveryID'];
            } else {
                if(k == 0) {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="billingAddress" onclick="changeBillingAddress(${v['deliveryID']})" checked>
                    `;
                    billingAddressId = v['deliveryID'];
                } else {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="billingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="billingAddress" onclick="changeBillingAddress(${v['deliveryID']})">
                    `;
                }
            }

            html += `
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="mr-3">
                            <div class="bodyText smaller lightBold mb-1">${v['fullname']}</div>
                            <div class="bodyText smaller" id="billingFullAddress${v['deliveryID']}">${v['address']}</div>
                        </div>
                        <button type="button" class="btn btn-primary px-3 py-3 text-center" style="min-width:60px" id="editShippingAddress${v['deliveryID']}" onclick="editBtnClicked(${v['deliveryID']}, '${v['address_type']}', '${k+1}')">
                            <div class="bodyText smaller text-white" data-lang="M00226"><?php echo $translations['M00226'][$language] /* Edit */ ?></div>
                        </button>
                    </div>
                </label>
            `;     
        });

        $('#billingAddressList').html(html);
        $('#userCheckoutDetails').hide();
        $('#guestShip').css("display", "none");
        $('#userShip').css("display", "none");
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
                    <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="shippingAddress" checked onclick="changeShippingAddress(${v['deliveryID']},${v['postCode']})">
                `;
                shippingAddressId = v['deliveryID'];
                shippingPostcode = v['postCode'];
                $("#postcode").val(shippingPostcode);
            } else {
                if(k == 0) {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="shippingAddress" onclick="changeShippingAddress(${v['deliveryID']},${v['postCode']})" checked>
                    `;
                    shippingAddressId = v['deliveryID'];
                    shippingPostcode = v['postCode'];
                    $("#postcode").val(shippingPostcode);
                } else {
                    html += `
                        <input class="radio-control mr-3" type="radio" id="shippingAddress${v['deliveryID']}" data-postcode="`+v['postCode']+`" name="shippingAddress" onclick="changeShippingAddress(${v['deliveryID']},${v['postCode']})">
                    `;
                }
            }

            html += `
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="mr-3">
                            <div class="bodyText smaller lightBold mb-1">${v['fullname']}</div>
                            <div class="bodyText smaller" id="shippingFullAddress${v['deliveryID']}">${v['address']}</div>
                        </div>
                        <button type="button" class="btn btn-primary px-3 py-3 text-center"  style="min-width:60px" id="editShippingAddress${v['deliveryID']}" onclick="editBtnClicked(${v['deliveryID']}, '${v['address_type']}', '${k+1}')">
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

    changeShippingAddress(shippingAddressId,shippingPostcode);
}

function addBtnClicked(addressType) {
    // $.redirect('addNewAddress', { addressType: addressType });
    editAddressBtn = false;
    billingAddressId = "";
    shippingAddressId = "";
    shippingPostcode = "";

    $('#noAddress').show();
    $('#gotAddress').hide();
    $('#userCheckoutDetails').show();
    loadCountryState();

    nextBtnFlag = false;
}

function editBtnClicked(addressId) {
    nextBtnFlag = false;
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
    shippingPostcode = "";

    $('#noAddress').show();
    $('#gotAddress').hide();
    $('#userCheckoutDetails').show();
    loadCountryState();

    $("#userName").val(data.addressDetails.name);
    $("#userEmailAddress").val(data.addressDetails.email);
    var mobilePhone = data.addressDetails.phone;
    if (mobilePhone.substring(0, 2) === "60") {
        mobilePhone = mobilePhone.substring(2);
    }

    $("#userPhone").val(mobilePhone);

    // $("#userPhone").val(data.addressDetails.phone);
    // $("#userCompanyName").val(data.addressDetails.name);
    $("#userStreetNo").val(data.addressDetails.address);
    $("#userAddress2").val(data.addressDetails.address_2);
    $("#userCity").val(data.addressDetails.cityID);
    $("#userZipCode").val(data.addressDetails.postCodeID);
    $("#userCountry").val(data.addressDetails.countryID);
    $("#userAddressID").val(data.addressDetails.id);

    currentStateId = data.addressDetails.stateID; 

    // $('#userCountry').trigger('change');
}

function guestOwnerVerification() { 
    // var cartList = getOldCart();  

    $('#getAddressError').hide();

    var userName = $('#name').val();
    var userPhone = $('#phone').val();
    var userStreetNo = $('#streetNo').val();
    var userStreetNo2 = $('#address2').val();
    var userCity = $('#city').val();
    var userZipCode = $('#zipCode').val();
    var userCountry = $('#country').val();
    var userState = $('#state').val();

    if(!userName){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['E00106'][$language] /* Please Enter Full Name */ ?>');
        return false;
    }

    if(!userPhone){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['E00664'][$language] /* Please Enter Mobile Number. */ ?>');
        return false;
    }

    if(!userStreetNo){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M02936'][$language] /* Please Enter Address */ ?>'+1);
        return false;
    }

    if(!userStreetNo2){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M02936'][$language] /* Please Enter Address */ ?>'+2);
        return false;
    }

    if(!userCity){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04090'][$language] /* Please Enter City */ ?>');
        return false;
    }

    if(!userZipCode){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04091'][$language] /* Please Enter Zip Code */ ?>');
        return false;
    }

    if(!userCountry){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04092'][$language] /* Please Enter Country */ ?>');
        return false;
    }

    if(!userState){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04093'][$language] /* Please Select State */ ?>');
        return false;
    }


    if(cartList) {
        var packageList = cartList.map((item) => {
            return { 
                packageID: item.productID,
                quantity: item.quantity,
                product_template: item.product_attribute_value_id
            };
        });

        var number = removeFirstTwoCharacters($('#phone').val());

        var giftCheckboxAmount = $('.checkForGift:checked').length 

        var giftCheckboxStatus = 0;


        if(giftCheckboxAmount && giftCheckboxAmount > 0) {
            giftCheckboxStatus = 1
        }

        var formData = {
            command             : 'guestOwnerVerification',
            promo_code          : promoToNextPage,
            name                : $('#name').val(),
            emailAddress        : $('#emailAddress').val(),
            phone               : number,
            dialingArea         : $('#dialingArea').val(),
            // companyName         : $('#companyName').val(),
            streetNo            : $('#streetNo').val(),
            address2            : $('#address2').val(),
            city                : $('#city').val(),
            zipCode             : $('#zipCode').val(),
            country             : $('#country option:selected').html(),
            state               : $('#state option:selected').html(),
            package             : cartListIncludePromo,
            purchaseAmount      : parseFloat(fpx_txnAmount),
            shipping_fee        : parseFloat(($('#deliveryFee').html()).replace('RM', '')),
            bkend_token         : bkend_token,
            is_gift             : giftCheckboxStatus,
            deliveryMethod      : $('input[name=deliveryMethod]:checked').val(),
        };

        if($('#guestShipToSameAddress').is(':checked')) {
            formData['name2']                   = $('#name').val();
            // formData['emailAddress2']           = $('#emailAddress').val();
            formData['phone2']                  = $('#phone').val();
            formData['dialingArea2']            = $('#dialingArea').val();
            // formData['companyName2']            = $('#companyName').val();
            formData['streetNo2']               = $('#streetNo').val();
            formData['address22']               = $('#address2').val();
            formData['city2']                   = $('#city').val();
            formData['zipCode2']                = $('#zipCode').val();
            formData['country2']                = $('#country option:selected').html(),
            formData['state2']                  = $('#state option:selected').html(),
            formData['guestShipToSameAddress']  = 1;
        } else {
            formData['name2']                   = $('#name2').val();
            // formData['emailAddress2']           = $('#emailAddress2').val();
            formData['phone2']                  = $('#phone2').val();
            formData['dialingArea2']            = $('#dialingArea2').val();
            // formData['companyName2']            = $('#companyName2').val();
            formData['streetNo2']               = $('#streetNo2').val();
            formData['address22']               = $('#secondAddress2').val();
            formData['city2']                   = $('#city2').val();
            formData['zipCode2']                = $('#zipCode2').val();
            formData['country2']                = $('#country2 option:selected').html(),
            formData['state2']                  = $('#state2 option:selected').html(),
            formData['guestShipToSameAddress']  = 0;
        }
        console.log(formData);

        $("#postcode").val(formData['zipCode2']);
        var fCallback = successCreateGuestAcc;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function successCreateGuestAcc(data, message) {
    console.log(successCreateGuestAcc);
    if(data) {
        let deliveryMethodOpt = $('input[name=deliveryMethod]:checked').val();

        $.redirect('confirmOrder', {
            txnAmount: data.payment_amount,
            purchaseId: data.purchase_id,
            saleId: data.saleDetail_id,
            txnTime: data.getTxnTime,
            clientId: data.clientID,
            promoToNextPage: promoToNextPage,
            pointsToUse: redeemAmount,
            cartList: cartList,
            deliveryMethodOpt: deliveryMethodOpt,
            postcode : $("#postcode").val(),
        });
    }
}

function addressVerification() {
    console.log("billingAddressId ="+billingAddressId);
    console.log("shippingAddressId ="+shippingAddressId);

    if(billingAddressId && shippingAddressId) {
        addNewPayment()
    }else {
        addAddress()
    }
}

function addAddress() { 
    $('#getAddressError').hide();

    var userName = $('#userName').val();
    var userPhone = $('#userPhone').val();
    var userStreetNo = $('#userStreetNo').val();
    var userStreetNo2 = $('#userAddress2').val();
    var userCity = $('#userCity').val();
    var userZipCode = $('#userZipCode').val();
    var userCountry = $('#userCountry').val();
    var userState = $('#userState').val();

    if(!userName){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['E00106'][$language] /* Please Enter Full Name */ ?>');
        return false;
    }

    if(!userPhone){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['E00664'][$language] /* Please Enter Mobile Number. */ ?>');
        return false;
    }

    if(!userStreetNo2){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M02936'][$language] /* Please Enter Address */ ?>'+2);
        return false;
    }

    if(!userStreetNo){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M02936'][$language] /* Please Enter Address */ ?>'+1);
        return false;
    }

    if(!userCity){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04090'][$language] /* Please Enter City */ ?>');
        return false;
    }

    if(!userZipCode){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04091'][$language] /* Please Enter Zip Code */ ?>');
        return false;
    }

    if(!userCountry){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04092'][$language] /* Please Enter Country */ ?>');
        return false;
    }

    if(!userState){
        $('#getAddressError').show();
        $('#getAddressErrorText').text('<?php echo $translations['M04093'][$language] /* Please Select State */ ?>');
        return false;
    }

    console.log("addAddress = "+editAddressBtn);
	if(editAddressBtn == false) {
        var formData = {
            command     	: 'addAddress',
    		addressType 	: 'shipping',
    		fullName 		: $('#userName').val(),
            phone           : $('#userPhone').val(),
            email           : $('#userEmailAddress').val(),
    		address 		: $('#userStreetNo').val(),
            address2        : $('#userAddress2').val(),
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
            address2        : $('#userAddress2').val(),
            email           : $('#userEmailAddress').val(),
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
        phone           : $('#userPhone2').val(),
		address 		: $('#userStreetNo2').val(),
		address2 		: $('#secondUserAddress2').val(),
		cityID 			: $('#userCity2').val(),
		postalCodeID 	: $('#userZipCode2').val(),
		stateID 		: $('#userState2 option:selected').val(),
        email           : $('#userEmailAddress').val(),
		disabled 		: 0,
		isDefault 		: 0,
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

    if(!billingAddressId){
        var selectedIdbill = document.querySelector('input[name="billingAddress"]:checked').id;
        billingAddressId = selectedIdbill.replace('billingAddress', '');
    }
    
    if(!shippingAddressId){
        var selectedIdship = document.querySelector('input[name="shippingAddress"]:checked').id;
        shippingAddressId = selectedIdship.replace('shippingAddress', '');
    }

    var giftCheckboxAmount = $('.checkForGift:checked').length 

    var giftCheckboxStatus = 0;


    if(giftCheckboxAmount && giftCheckboxAmount > 0) {
        giftCheckboxStatus = 1
    }

    let deliveryMethodOpt = $('input[name=deliveryMethod]:checked').val();

    console.log("deliveryMethodOpt = "+deliveryMethodOpt);

    if(deliveryMethodOpt == 'Pickup') {
        shippingAddressId = ''
    }

    var formData = {
        command     	    : 'addNewPayment',
        purchase_amount     : fpx_txnAmount,
        package_id          : 'PACKAGE001',
        promo_code          : $("#PromoCodeInput").val(),
        quantityOfReward    : '0',
        isRedeemReward      : '0',
        redeemAmount        : $("#pointsToUse").val(),
        memberPointDeduct   : '0',
        shipping_fee        : parseFloat(($('#deliveryFee').html()).replace('RM', '')),
        billing_address     : billingAddressId,
        shipping_address    : shippingAddressId,
        deliveryMethod      : deliveryMethodOpt,
        bkend_token         : bkend_token,
        userID              : userId,
        is_gift             : giftCheckboxStatus

    };
	var fCallback = successAddNewPayment;
    ajaxSend(urlFPX, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddNewPayment(data, message) {
    if(nextBtnFlag == false) {
        $.redirect('checkoutAddress',{
                                            promoToNextPage                  : $('#PromoCodeInput').val(),
                                            pointsToUse                    : $('#pointsToUse').val(), 
                });
    } else {
        var deliveryMethodOpt = $('input[name=deliveryMethod]:checked').val();

        $.redirect('confirmOrder', {
            txnAmount: data.payment_amount,
            purchaseId: data.purchase_id,
            saleId: data.saleDetail_id,
            txnTime: data.getTxnTime,
            promoToNextPage: promoToNextPage,
            pointsToUse: redeemAmount,
            deliveryMethodOpt: deliveryMethodOpt,
            postcode : $("#postcode").val(),
        });
    }
}

function removeVoucher() {
    if($('#PromoCodeInput').val() == "") {
        showMessage('<?php echo $translations['M03833'][$language] /* No voucher applied. */ ?>', 'Warning', '<?php echo $translations['M03834'][$language] /* Voucher Applied */ ?>', 'warning', '');
    } else {
        $('#voucherApplied').html('-RM0.00');
        $('#PromoCodeInput').val("")
        promoToNextPage = '';
        getShoppingCart();
        showMessage('<?php echo $translations['M03835'][$language] /* Voucher has been removed. */ ?>', 'success', '<?php echo $translations['M03834'][$language] /* Voucher Applied */ ?>', 'success', '');
    }
}

function getDeliveryMethod() {
    var clientId = userId;
    if(!clientId) {
        clientId = '<?php echo $_SESSION['POST'][$postAryName]['clientId'] ?>';
    }

    var formData = {
        command         : 'getDeliveryMethod',
        userID          : clientId,
        bkend_token     : bkend_token,
    };
    var fCallback = loadDeliveryMethod;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDeliveryMethod(data, message) {
    var deliveryMethod = data;
    var name = '';

    if(deliveryMethod) {
        var html = '';
        $.each(deliveryMethod, function(k, v) {
            if(v['name'] == 'Self Pickup') {
                name = "<?php echo $translations['M04099'][$language] /* Self Pickup */ ?>";
                html += `
                    <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="Pickup">
                        <input class="radio-control mr-3" type="radio" id="Pickup" name="deliveryMethod" value="Pickup" onchange="getShoppingCart()">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <div class="bodyText smaller lightBold mb-2">${name}</div>
                                <div class="bodyText smaller">${v['address']}</div>
                            </div>
                            <div class="bodyText smaller lightBold text-green text-uppercase" id="selfPickupCharges">${v['fees']}</div>
                        </div>
                    </label>
                `;
            } else if(v['name'] == 'Delivery Charges' || v['name'] == 'Dry Delivery Charges') {
                name = "<?php echo $translations['M03837'][$language] /* Dry Delivery Charges */ ?>";
                
                
                html += `
                    <label class="radio-group greyBg borderAll grey normal p-4 d-flex align-items-center mb-3" for="delivery">
                        <input class="radio-control mr-3" type="radio" id="delivery" name="deliveryMethod" value="delivery" checked onchange="getShoppingCart()">
                        <div class="d-flex justify-content-between w-100">
                            <div class="bodyText smaller lightBold">${name}</div>
                    `;

                    if(v['deliveryFees'] != "FREE") {
                        html += `
                                    <div class="bodyText smaller lightBold text-green text-uppercase" id="deliveryCharges">RM${numberThousand(v['deliveryFees'], 2)}</div>
                                </div>
                            </label>
                        `;
                    } else {
                        html += `
                                    <div class="bodyText smaller lightBold text-green text-uppercase" id="deliveryCharges">FREE</div>
                                </div>
                            </label>
                        `;
                    }
            }
        });

        $('#deliveryMethods').html(html);
    }
}

function checkOutCalculation() {

    checkDeliveryMethodStatus();

    $('#bankPassError').hide();

    if(!cartLoaded) {
        setTimeout(function() {
            checkOutCalculation();
        }, 1000);
    } else {
        var clientId = userId;
        if(!clientId) {
            clientId = '<?php echo $_SESSION['POST'][$postAryName]['clientId'] ?>';
        }

        var formData = {
            command     	    : 'CartTotalAmountCalculation',
            userID              : clientId,
            promo_code          : promoToNextPage,
            deliveryMethod      : $('input[name=deliveryMethod]:checked').val(),
            bkend_token         : bkend_token,
        };

        // if($.cookie('redeemAmount')) formData['redeemAmount'] = $.cookie('redeemAmount');
        if(redeemAmount) formDate['redeemAmount'] = redeemAmount;

        var fCallback = loadCheckoutCalculation;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
    }
}

function loadCheckoutCalculation(data, message) {
    if(data) {

        deliveryMethodType = $('input[name=deliveryMethod]:checked').val()
        fpx_txnAmount = data.cartTotal;

        //$('#redeemedAmount').html('-RM' + numberThousand(data.redeemAmount, 2));
        /*$('#deliveryCharges').html('RM' + numberThousand(data.shippingFee, 2));
        $('#deliveryFee').html('RM' + numberThousand(data.shippingFee, 2));
        $('#voucherApplied').html('-RM' + numberThousand(data.promoDiscount, 2));
        $('#totalSalePrice').html('RM' + numberThousand(data.cartTotal, 2));*/
    }
}

function checkDeliveryMethodStatus(){
    let methodType = $('input[name=deliveryMethod]:checked').val()

    if(methodType && methodType == 'Pickup') {
        $('#displayShippingAddress').hide()
        $('#guestShip').hide()
        $('#userShip').hide()

    }else {
        $('#displayShippingAddress').show()
        $('#guestShip').show()
        $('#userShip').show()
    }
}

</script>
