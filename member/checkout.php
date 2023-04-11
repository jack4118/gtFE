<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container px-0" style="color: #000;">
    <div class="homepagePadding mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="checkoutTitle" data-lang="M03253">
                    <?php echo $translations['M03253'][$language]; //Checkout ?>
                </div>

                <div class="mt-5 row">
                    <div class="col-md-6 pr-lg-5">
                        <form id="checkoutForm">
                            <div class="row" id="orderMethod">

                            </div>
                            <div id="shippingAddressDiv">
                                <!-- <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="form-control px-2 col-12 shippingOption">
                                            <select class="px-4">
                                                <option>Standard Shipping</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row mt-4">
                                    <div class="col-12 mb-3">
                                        <label class="formTitle" data-lang="M03192"><?php echo $translations['M03192'][$language]; //Shipping Address ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-2 p-3 px-0" id="hasDeliveryAddress" style="display: none;">
                                        <label class="control-label"><?php echo $translations['M03426'][$language]; //Saved Shipping Address ?></label>
                                        <div class="form-control px-2 col-12 shippingOption">
                                            <select class="px-4" id="buildDeliveryAddressOption">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <!-- <div class="col-6 p-3 px-0">
                                        <label class="control-label" data-lang="M03193"><?php echo $translations['M03193'][$language]; //First Name ?> *</label>
                                        <input type="text" class="form-control" id="firstName">
                                    </div>
                                    <div class="col-6 p-3 px-0">
                                        <label class="control-label" data-lang="M03194"><?php echo $translations['M03194'][$language]; //Last Name ?> *</label>
                                        <input type="text" class="form-control" id="lastName">
                                    </div> -->
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00177"><?php echo $translations['M00177'][$language]; //Full Name ?> *</label>
                                        <input type="text" class="form-control" id="fullName">
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03258"><?php echo $translations['M03258'][$language]; //Address ?> *</label>
                                        <input type="text" class="form-control" id="address">
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03257"><?php echo $translations['M03257'][$language]; //Country / Region ?> *</label>
                                        <select class="form-control" id="buildCountryOption">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00180"><?php echo $translations['M00181'][$language]; //Province ?> *</label>
                                        <select class="form-control" id="buildStateOption"></select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M02846"><?php echo $translations['M02846'][$language]; //City ?> *</label>
                                        <!-- <input type="text" class="form-control" id="city"> -->
                                        <select class="form-control" id="city" disabled></select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label"><?php echo $translations['M03497'][$language]; //District ?> *</label>
                                        <select class="form-control" id="district" disabled></select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label"><?php echo $translations['M03155'][$language]; //Sub-District ?> *</label>
                                        <!-- <input type="text" class="form-control" id="subDistrict"> -->
                                        <select class="form-control" id="subDistrict" disabled></select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03158"><?php echo $translations['M03158'][$language]; //Postal Code ?> *</label>
                                        <!-- <input type="text" class="form-control" id="postalCode"> -->
                                        <select class="form-control" id="postalCode" disabled></select>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03145"><?php echo $translations['M03145'][$language]; //Phone Number ?> *</label>
                                        <div class="row mx-0">
                                            <input type="text" class="form-control col-3" id="dialingArea" disabled>
                                            <input type="text" class="form-control col-9" id="phoneNumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row newDeliveryAddressSection">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00187"><?php echo $translations['M00187'][$language]; //Email Addresss ?> *</label>
                                        <input type="text" class="form-control" id="emailAddress">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <input id="sameAdd" type="checkbox">
                                        <label for="sameAdd" class="control-label" data-lang="M03259"><?php echo $translations['M03259'][$language]; //Use this address as my billing address ?></label>
                                    </div>
                                </div>
                            </div>

                            <!-- <div id="billingAddressDiv" style="display: none;">
                                <div class="row">
                                    <div class="col-12 mt-5 mb-3">
                                        <label class="formTitle" data-lang="M03260"><?php echo $translations['M03260'][$language]; //Billing Address ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00177"><?php echo $translations['M00177'][$language]; //Full Name ?> *</label>
                                        <input type="text" class="form-control" id="billingFullName">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03258"><?php echo $translations['M03258'][$language]; //Address ?> *</label>
                                        <input type="text" class="form-control" id="billingAddress">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03257"><?php echo $translations['M03257'][$language]; //Country / Region ?> *</label>
                                        <select class="form-control" id="buildBillingCountryOption">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00180"><?php echo $translations['M00181'][$language]; //Province ?> *</label>
                                        <select class="form-control" id="buildBillingStateOption">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M02846"><?php echo $translations['M02846'][$language]; //City ?> *</label>
                                        <select class="form-control" id="billingCity" disabled></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label"><?php echo $translations['M03497'][$language]; //District ?> *</label>
                                        <select class="form-control" id="billingDistrict" disabled></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label"><?php echo $translations['M03155'][$language]; //Sub-District ?> *</label>
                                        <select class="form-control" id="billingSubDistrict" disabled></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03158"><?php echo $translations['M03158'][$language]; //Postal Code ?> *</label>
                                        <select class="form-control" id="billingPostalCode" disabled></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03145"><?php echo $translations['M03145'][$language]; //Phone Number ?> *</label>
                                        <div class="row mx-0">
                                            <input type="text" class="form-control col-3" id="billingDialingArea" disabled>
                                            <input type="text" class="form-control col-9" id="billingPhoneNumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M00187"><?php echo $translations['M00187'][$language]; //Email Addresss ?> *</label>
                                        <input type="text" class="form-control" id="billingEmailAddress">
                                    </div>
                                </div>
                            </div> -->

                            <div id="pickupDiv" style="display: none;">
                                <div class="row">
                                    <div class="col-12 mt-5 mb-4">
                                        <label class="formTitle" data-lang="M03187"><?php echo $translations['M03187'][$language]; /* Pickup Locations */?></label>
                                    </div>
                                </div>
                                <div class="row mx-1 pickupDiv" id="buildPickupAddress"></div>
                                <div id="pickupID"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 pl-lg-5 mt-5 mt-md-0">
                        <div class="row">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-between">
                                <label class="formTitle" data-lang="M03261"><?php echo $translations['M03261'][$language]; //Order Summary ?></label>
                                <a href="shoppingCart" class="btn btn-primary whiteFont btnAddToCart">Edit</a>
                            </div>
                        </div>
                        <div class="m-1 mb-5 summaryDiv" id="buildSummary">
                            <!-- <div class="col-12 cartItem">
                                <div class="col-2 cartImgDiv alignMiddle">
                                    <img src="images/project/product1.png">
                                </div>
                                <span class="col-4">Lavender Oil x 1</span>
                                <span class="col-4">Rp 976,000</span>
                                <span class="col-2">100PV</span>
                            </div>
                            <div class="col-12 cartItem">
                                <div class="col-2 cartImgDiv alignMiddle">
                                    <img src="images/project/product2.png">
                                </div>
                                <span class="col-4">Lavender Oil x 1</span>
                                <span class="col-4">Rp 976,000</span>
                                <span class="col-2">100PV</span>
                            </div>
                            <div class="col-12 cartItem">
                                <div class="col-2 cartImgDiv alignMiddle">
                                    <img src="images/project/product3.png">
                                </div>
                                <span class="col-4">Lavender Oil x 1</span>
                                <span class="col-4">Rp 976,000</span>
                                <span class="col-2">100PV</span>
                            </div>
                            <div class="col-12 cartItem">
                                <div class="col-2 cartImgDiv alignMiddle">
                                    <img src="images/project/product4.png">
                                </div>
                                <span class="col-4">Lavender Oil x 1</span>
                                <span class="col-4">Rp 976,000</span>
                                <span class="col-2">100PV</span>
                            </div> -->
                        </div>
                                <!-- <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="promocodeTitle" data-lang="M03262"><?php echo $translations['M03262'][$language]; //Apply Promocode ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="inputBox input-group">
                                                <input id="promoCode" type="text" class="form-control inputPrepend" placeholder="Promotion or Discount Code">
                                                <div class="input-group-append">
                                                    <span class="login-input-group-text inputAppendText promocodeItem">
                                                        <button id="applyPromoBtn" class="btn btn-primary whiteFont btnAddToCart" data-lang="M03263"><?php echo $translations['M03263'][$language]; //Apply Code ?></button>
                                                        <i id="checkmark" class="fas fa-check" style="display: none;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feeCalc appliedPromo px-0" style="display: none;">
                                    <span>Promo code applied! We've taken 20% off your order.</span>
                                </div>
                                <div class="feeCalc appliedPromo px-0" style="display: none;">
                                    <a id="removePromo" style="border-bottom: 1px solid #8cbe44;color: #8cbe44;" href="javascript:;">Remove this code</a>
                                </div> -->
                                <div class="row feeCalc">
                                    <span data-lang="M03264"><?php echo $translations['M03264'][$language]; //Subtotal ?></span>
                                    <span class="bold" id="subtotalPrice">0</span>
                                </div>
                                <div class="row feeCalc appliedPromo" style="display: none;">
                                    <span data-lang="M03265"><?php echo $translations['M03265'][$language]; //Promocode ?></span>
                                    <span class="bold" style="color: #ff0000;">Rp 600,000</span>
                                </div>
                                <!-- <div class="row feeCalc">
                                    <span data-lang="M03266"><?php echo $translations['M03266'][$language]; //Shipping Fee ?></span>
                                    <span data-lang="" class="bold" id="shippingFee">0</span>
                                </div> -->
                                <div class="row feeCalc">
                                    <span data-lang="M02823" id="taxPercentage"><?php echo $translations['M02823'][$language]; //Tax ?></span>
                                    <span data-lang="" class="bold" id="taxes">0</span>
                                </div>
                                <div class="row feeCalc feeTotal">
                                    <span data-lang="M03267"><?php echo $translations['M03267'][$language]; //Total ?></span>
                                    <span id="totalPrice" class="bold">0</span>
                                </div>
                            </div>
                            <div class="col-md-6 pr-lg-5">
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03459"><?php echo $translations['M03459'][$language]; //Special Note ?></label>
                                        <input type="text" class="form-control" id="purchaseSpecialNote">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-3 px-0">
                                        <label class="control-label" data-lang="M03160"><?php echo $translations['M03160'][$language]; //Remark ?></label>
                                        <input type="text" class="form-control" id="purchaseRemark">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-12 checkoutBtn">
                                <button id="goPayment" class="btn btn-primary productButton1 whiteFont btnAddToCart alignMiddle" style="float: right;"><?php echo $translations['M03253'][$language]; //Checkout ?>&nbsp;<i class="ml-1 fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var packageAry = getPackageAry();


var jsonUrl         = 'json/productList.json';
var imgPath         = '<?php echo $config['tempMediaUrl'] ?>inv/';
var currentLang     = '<?php echo $_SESSION['language']; ?>';
var currentCID = 100;
var countryID = '<?php echo $_SESSION['countryID'] ?>' || ""
var jsonData;

var countryJsonUrl  = 'json/addressList.json';
var saveJsonData;
var saveReturnData;
var saveDeliveryType;
var placementPosition = "<?php echo $_POST['placementPosition']; ?>";

// var countryList;
// var stateList;
var isBillingAddress = 0;
var pickupID;

var deliveryAddressList;
// var billingAddressList;

var passData;

$(document).ready(function() {
    if (countryID) {
        currentCID = countryID
    }

    $.getJSON(jsonUrl, function( data ) {
        jsonData = data;
        getCurrency(currentCID, jsonData.curList)
        buildSummary(jsonData);
    });

    var kycStatus = getKYC();

    if (kycStatus) {

        var formData  = {
            command: 'purchasePackageVerification',
            step: 1,
            packageAry

        };
        var fCallback = loadCheckout;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    } else {

       showMessage("<?php echo $translations['M02979'][$language]; /* Please verify your KYC before proceed. */?>", "info", "<?php echo $translations['M02464'][$language]; /* KYC Verification */?>", "", "kyc") 

    }    

    $('#sameAdd').change(function() {
        if ($(this).is(":checked")) {
            isBillingAddress = 1;
            // $('#billingAddressDiv').hide();

        } else {
            isBillingAddress = 0;
            // $('#billingAddressDiv').show();
        }
    });

    $('#goPayment').click(function() {

        $(".invalid-feedback").remove();
        saveDeliveryType = $('input[name="orderMethod"]:checked').val();

        var deliveryOption = $('input[name="orderMethod"]:checked').val();
        var fullName = $('#fullName').val();
        var countryID = $('#buildCountryOption').val();
        var address = $('#address').val();
        var district = $('#district').val();
        var subDistrict = $('#subDistrict').val();
        var stateID = $('#buildStateOption').val();
        var city = $('#city').val();
        var postalCode = $('#postalCode').val();
        var dialingArea = getDialingArea($('#dialingArea').val());
        var phoneNumber = $('#phoneNumber').val();
        var emailAddress = $('#emailAddress').val();
        var purchaseSpecialNote = $('#purchaseSpecialNote').val();
        var purchaseRemark = $('#purchaseRemark').val();
        // var placementPosition = $("input[name=leftRightPosition]:checked").val();

        var addressID = $("#buildDeliveryAddressOption").val();

        if (addressID == 0) {
            addressID = ""
        }

        if (deliveryOption == 'pickup') {
            pickupID = $('input[name="pickupOption"]:checked').val();
        }

        if (isBillingAddress) {

            var formData  = {
                command: 'purchasePackageVerification',
                step: 3,
                packageAry,
                deliveryOption,
                fullName,
                countryID,
                address,
                district,
                subDistrict,
                stateID,
                city,
                postalCode,
                dialingArea,
                phoneNumber,
                emailAddress,
                isBillingAddress,
                pickupID,
                addressID,
                purchaseSpecialNote,
                purchaseRemark,
                placementPosition
            }

        } else {

            var formData  = {
                command: 'purchasePackageVerification',
                // step: 3,
                packageAry,
                deliveryOption,
                fullName,
                countryID,
                address,
                district,
                subDistrict,
                stateID,
                city,
                postalCode,
                dialingArea,
                phoneNumber,
                emailAddress,
                isBillingAddress,
                pickupID,
                addressID,
                purchaseSpecialNote,
                purchaseRemark,
                placementPosition
            }

        }

        passData = formData;
        passData['step'] = 3;
        console.log(formData)
        var fCallback = goPayment;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    $('#removePromo').click(function(){
        $('.appliedPromo').hide();
        $('#totalPrice').html("Rp 3,000,000");
        $('#checkmark').hide();
        $('#applyPromoBtn').show();
        $('#promoCode').prop( "disabled", false );
        $('#promoCode').val("");
    });

    $('#applyPromoBtn').click(function(){
        $('.appliedPromo').show();
        $('#totalPrice').html("Rp 2,400,000");
        $('#checkmark').show();
        $('#applyPromoBtn').hide();
        $('#promoCode').prop( "disabled", true );
    });

});

function buildSummary(data) {

    var cartList  = getPackageAry(); 

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
        singleItem = singleItem[0]
        singleItem['quantity'] = v['quantity']
        mergedCartList.push(singleItem)
    })


    var buildSummary = ""

    $.each(mergedCartList, function(k,v) {
        var imgUrl;
        if (v['img'] !== null) {
            imgUrl = imgPath + v['img'][0]
        } else {
            imgUrl = "/images/project/noProductImg.png"
        }

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
        }else{
            unitPrice = memberPrice
        }
        // console.log(unitPrice);
        var price = unitPrice * v['quantity']

        var pv = parseFloat(v['pv']) * v['quantity']

        buildSummary += `
            <div class="row cartItem">
                <div class="col-12 col-md-2 cartImgDiv alignMiddle">
                    <img src="${imgUrl}">
                </div>
                <span class="col-4">${v[langList[currentLang]]['name']} x ${v['quantity']}</span>
                <span class="col-4">${getCurrency()} ${numberThousand(price,2)}</span>
                <span class="col-4 col-md-2">${numberThousand(pv,2)} PV</span>
            </div>
        `
    })

    $("#buildSummary").html(buildSummary);
}

function filterData(nextSelectID, id, idVariable, nextAdd, value, display) {
    var filteredArr = (saveJsonData[nextAdd]).filter((item) => item[idVariable] == id );
    buildOption(nextSelectID, filteredArr, value, display);
}

function buildOption(id, data, value, display) {
    var option = `<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>`;
    data = data.sort(function(a, b) {
        var aName = a[display].toLowerCase();
        var bName = b[display].toLowerCase(); 
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
    });
    $.each(data, function(k,v){
        option+=`<option value="${v[value]}">${v[display]}</option>`;
    });
    $("#"+id).html(option);

    // new TomSelect("#"+id,{
    //     sortField: {
    //         field: "text",
    //         direction: "asc"
    //     }
    // });
}

function loadCheckout(data, message) {

    // console.log(data)
    // countryList = data.countryList
    // stateList = data.stateList;

    deliveryAddressList = data.deliveryAddressData

    $("#subtotalPrice").html(getCurrency() + " " + numberThousand(data.subTotal,2))
    $("#totalPrice").html(getCurrency() + " " + numberThousand(data.totalPrice,2))

    if (data.shippingFee = "0") {
        $("#shippingFee").html('<?php echo $translations['M00061'][$language]; /* Free */?>')
    } else {
        $("#shippingFee").html(numberThousand(data.shippingFee,2))
    }

    if (parseFloat(data.taxes) == "0") {
        $("#taxes").html('<?php echo $translations['M00061'][$language]; /* Free */?>')
    } else {
        $("#taxes").html(numberThousand(data.taxes,2))
    }

    $("#taxPercentage").append(" (" + parseFloat(data.taxPercentage) + "%)")

    

    var orderMethod = ""

    $.each(data.deliveryOption, function(k,v) {
        var methodImg;

        if (v['option'] == 'delivery') {
            methodImg = "images/project/delivery_truck.png"
        } else {
            methodImg = "images/project/fragile.png"
        }

        if (k == 0) {
            orderMethod += `
                <div class="col-12 col-lg-6 mb-4">
                    <div class="form-control col-12 shippingOption">
                        <input class="radioStyle orderMethod" id="${v['option']}" type="radio" name="orderMethod" value="${v['option']}" checked>
                        <label for="${v['option']}"><img src="${methodImg}" class="shippingIco">${v['optionDisplay']}</label>
                    </div>
                </div>
            `
        } else {
           orderMethod += `
               <div class="col-12 col-lg-6 mb-4">
                   <div class="form-control col-12 shippingOption">
                       <input class="radioStyle orderMethod" id="${v['option']}" type="radio" name="orderMethod" value="${v['option']}">
                       <label for="${v['option']}"><img src="${methodImg}" class="shippingIco">${v['optionDisplay']}</label>
                   </div>
               </div>
           ` 
        }
    })

    $("#orderMethod").html(orderMethod)


    if (deliveryAddressList && deliveryAddressList.length>0) {

        var buildDeliveryAddressOption = `
            <option value="0">Use a new address</option>
        `

        $.each(deliveryAddressList, function(k,v) {
            buildDeliveryAddressOption += `
                <option value="${v['addressID']}">
                    ${v['address'] || "-"}, ${v['district'] || "-"}, ${v['subDistrict'] || "-"}, ${v['city'] || "-"}, ${v['postalCode'] || "-"}, ${v['stateName'] || "-"}, ${v['countryName'] || "-"}
                </option>
            `
        })

        $("#hasDeliveryAddress").show()
        $("#buildDeliveryAddressOption").html(buildDeliveryAddressOption)
    }

    $.getJSON(countryJsonUrl, function( jsonData ) {
        saveJsonData = jsonData;
        // console.log(saveJsonData)
        var buildCountryOption = `
            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
        `;
        $.each(saveJsonData['countriesList'], function(k,v) {
            buildCountryOption += `
                <option value="${v['id']}" data-code="+${v['countryCode']}" name="${v['name']}">${v['display']}</option>
            `;
        })
        $("#buildCountryOption").html(buildCountryOption);
        loadCountryChange($('#buildCountryOption').val());
        $("#buildBillingCountryOption").html(buildCountryOption);
        loadBillingCountryChange($('#buildBillingCountryOption').val());

            
        $('#buildCountryOption option[value=100]').attr('selected','selected');
        $('#buildBillingCountryOption option[value=100]').attr('selected','selected');

        $("#dialingArea").val('');
        var thisCountry = (saveJsonData['countriesList']).filter((country) => country['id'] == countryID )
        if(thisCountry.length > 0) {
            var dialingArea = thisCountry[0]['countryCode']            
            $("#dialingArea").val("(+"+dialingArea+")");
        }

        $("#billingDialingArea").val('');
        var thisCountry2 = (saveJsonData['countriesList']).filter((country) => country['id'] == countryID )
        if(thisCountry2.length > 0) {
            var dialingArea = thisCountry2[0]['countryCode']            
            $("#billingDialingArea").val("(+"+dialingArea+")");
        }

        // Shipping Address
        // filter state based on country selected then build option
        var buildCountryOption = $("#buildCountryOption").val();
        filterData("buildStateOption", buildCountryOption, "country_id", "stateList", "id", "stateDisplay");

        // filter city based on state selected then build option
        var buildStateOption = $("#buildStateOption").val();
        filterData("city", buildStateOption, "state_id", "cityList", "id", "cityDisplay");

        // filter district based on state selected then build option
        var cityID = $("#city").val();
        filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

        // filter sub district based on state selected then build option
        var countyID = $("#district").val();
        filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

        // filter zipcode based on state selected then build option
        var subCountyID = $("#subDistrict").val();
        filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

        $('#buildCountryOption').change(function(){
            var buildCountryOption = $("#buildCountryOption").val();
            loadCountryChange(buildCountryOption);
            filterData("buildStateOption", buildCountryOption, "country_id", "stateList", "id", "stateDisplay");

            var buildStateOption = $("#buildStateOption").val();
            filterData("city", buildStateOption, "state_id", "cityList", "id", "cityDisplay");

            var cityID = $("#city").val();
            filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#district").val();
            filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#subDistrict").val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#buildStateOption').prop("disabled",true);
            $('#city').prop("disabled",true);
            $('#district').prop("disabled",true);
            $('#subDistrict').prop("disabled",true);
            $('#postalCode').prop("disabled",true);

            var countryDDL = $('#buildCountryOption option:selected').val();
            countryDDL != "-"? ($('#buildStateOption').prop("disabled",false)) : ($('#buildStateOption').prop("disabled",true));
            var stateDDL = $('#buildStateOption option:selected').val();
            stateDDL != "-"? ($('#city').prop("disabled",false)) : ($('#city').prop("disabled",true));
            var cityDDL = $('#city option:selected').val();
            cityDDL != "-"? ($('#district').prop("disabled",false)) : ($('#district').prop("disabled",true));
            var districtDDL = $('#district option:selected').val();
            districtDDL != "-"? ($('#subDistrict').prop("disabled",false)) : ($('#subDistrict').prop("disabled",true));
            var subDistrictDDL = $('#subDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));
        });

        $("#buildStateOption").change(function(){
            var buildStateOption = $(this).val();
            filterData("city", buildStateOption, "state_id", "cityList", "id", "cityDisplay");

            var cityID = $("#city").val();
            filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#district").val();
            filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#subDistrict").val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#city').prop("disabled",true);
            $('#district').prop("disabled",true);
            $('#subDistrict').prop("disabled",true);
            $('#postalCode').prop("disabled",true);

            var stateDDL = $('#buildStateOption option:selected').val();
            stateDDL != "-"? ($('#city').prop("disabled",false)) : ($('#city').prop("disabled",true));
            var cityDDL = $('#city option:selected').val();
            cityDDL != "-"? ($('#district').prop("disabled",false)) : ($('#district').prop("disabled",true));
            var districtDDL = $('#district option:selected').val();
            districtDDL != "-"? ($('#subDistrict').prop("disabled",false)) : ($('#subDistrict').prop("disabled",true));
            var subDistrictDDL = $('#subDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));
        });

        $("#city").change(function(){
            var cityID = $(this).val();
            filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#district").val();
            filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#subDistrict").val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#district').prop("disabled",true);
            $('#subDistrict').prop("disabled",true);
            $('#postalCode').prop("disabled",true);
            
            var cityDDL = $('#city option:selected').val();
            cityDDL != "-"? ($('#district').prop("disabled",false)) : ($('#district').prop("disabled",true));
            var districtDDL = $('#district option:selected').val();
            districtDDL != "-"? ($('#subDistrict').prop("disabled",false)) : ($('#subDistrict').prop("disabled",true));
            var subDistrictDDL = $('#subDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));
        });

        $("#district").change(function(){
            var countyID = $(this).val();
            filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#subDistrict").val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#subDistrict').prop("disabled",true);
            $('#postalCode').prop("disabled",true);
            
            var districtDDL = $('#district option:selected').val();
            districtDDL != "-"? ($('#subDistrict').prop("disabled",false)) : ($('#subDistrict').prop("disabled",true));
            var subDistrictDDL = $('#subDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));
        });

        $("#subDistrict").change(function(){
            var subCountyID = $(this).val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#postalCode').prop("disabled",true);
            
            var subDistrictDDL = $('#subDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));
        });


        // Billing Address
        // filter state based on country selected then build option
        var buildBillingCountryOption = $("#buildBillingCountryOption").val();
        filterData("buildBillingStateOption", buildBillingCountryOption, "country_id", "stateList", "id", "stateDisplay");

        // filter city based on state selected then build option
        var buildBillingStateOption = $("#buildBillingStateOption").val();
        filterData("billingCity", buildBillingStateOption, "state_id", "cityList", "id", "cityDisplay");

        // filter district based on state selected then build option
        var cityID = $("#billingCity").val();
        filterData("billingDistrict", cityID, "city_id", "countyList", "id", "countyDisplay");

        // filter sub district based on state selected then build option
        var countyID = $("#billingDistrict").val();
        filterData("billingSubDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

        // filter zipcode based on state selected then build option
        var subCountyID = $("#billingSubDistrict").val();
        filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

        $('#buildBillingCountryOption').change(function(){
            var buildBillingCountryOption = $("#buildBillingCountryOption").val();
            loadBillingCountryChange(buildBillingCountryOption);
            filterData("buildBillingStateOption", buildBillingCountryOption, "country_id", "stateList", "id", "stateDisplay");

            var buildBillingStateOption = $("#buildBillingStateOption").val();
            filterData("billingCity", buildBillingStateOption, "state_id", "cityList", "id", "cityDisplay");

            var cityID = $("#billingCity").val();
            filterData("billingDistrict", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#billingDistrict").val();
            filterData("billingSubDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#billingSubDistrict").val();
            filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#buildBillingStateOption').prop("disabled",true);
            $('#billingCity').prop("disabled",true);
            $('#billingDistrict').prop("disabled",true);
            $('#billingSubDistrict').prop("disabled",true);
            $('#billingPostalCode').prop("disabled",true);

            var countryDDL = $('#buildBillingCountryOption option:selected').val();
            countryDDL != "-"? ($('#buildBillingStateOption').prop("disabled",false)) : ($('#buildBillingStateOption').prop("disabled",true));
            var stateDDL = $('#buildBillingStateOption option:selected').val();
            stateDDL != "-"? ($('#billingCity').prop("disabled",false)) : ($('#billingCity').prop("disabled",true));
            var cityDDL = $('#billingCity option:selected').val();
            cityDDL != "-"? ($('#billingDistrict').prop("disabled",false)) : ($('#billingDistrict').prop("disabled",true));
            var districtDDL = $('#billingDistrict option:selected').val();
            districtDDL != "-"? ($('#billingSubDistrict').prop("disabled",false)) : ($('#billingSubDistrict').prop("disabled",true));
            var subDistrictDDL = $('#billingSubDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#billingPostalCode').prop("disabled",false)) : ($('#billingPostalCode').prop("disabled",true));
        });

        $('#buildBillingStateOption').change(function(){
            var buildBillingStateOption = $(this).val();
            filterData("billingCity", buildBillingStateOption, "state_id", "cityList", "id", "cityDisplay");

            var cityID = $("#billingCity").val();
            filterData("billingDistrict", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#billingDistrict").val();
            filterData("billingSubDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#billingSubDistrict").val();
            filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#billingCity').prop("disabled",true);
            $('#billingDistrict').prop("disabled",true);
            $('#billingSubDistrict').prop("disabled",true);
            $('#billingPostalCode').prop("disabled",true);

            var stateDDL = $('#buildBillingStateOption option:selected').val();
            stateDDL != "-"? ($('#billingCity').prop("disabled",false)) : ($('#billingCity').prop("disabled",true));
            var cityDDL = $('#billingCity option:selected').val();
            cityDDL != "-"? ($('#billingDistrict').prop("disabled",false)) : ($('#billingDistrict').prop("disabled",true));
            var districtDDL = $('#billingDistrict option:selected').val();
            districtDDL != "-"? ($('#billingSubDistrict').prop("disabled",false)) : ($('#billingSubDistrict').prop("disabled",true));
            var subDistrictDDL = $('#billingSubDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#billingPostalCode').prop("disabled",false)) : ($('#billingPostalCode').prop("disabled",true))
        });

        $('#billingCity').change(function(){
            var cityID = $(this).val();
            filterData("billingDistrict", cityID, "city_id", "countyList", "id", "countyDisplay");

            var countyID = $("#billingDistrict").val();
            filterData("billingSubDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#billingSubDistrict").val();
            filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#billingDistrict').prop("disabled",true);
            $('#billingSubDistrict').prop("disabled",true);
            $('#billingPostalCode').prop("disabled",true);

            var cityDDL = $('#billingCity option:selected').val();
            cityDDL != "-"? ($('#billingDistrict').prop("disabled",false)) : ($('#billingDistrict').prop("disabled",true));
            var districtDDL = $('#billingDistrict option:selected').val();
            districtDDL != "-"? ($('#billingSubDistrict').prop("disabled",false)) : ($('#billingSubDistrict').prop("disabled",true));
            var subDistrictDDL = $('#billingSubDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#billingPostalCode').prop("disabled",false)) : ($('#billingPostalCode').prop("disabled",true))
        });

        $('#billingDistrict').change(function(){
            var countyID = $(this).val();
            filterData("billingSubDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            var subCountyID = $("#billingSubDistrict").val();
            filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#billingSubDistrict').prop("disabled",true);
            $('#billingPostalCode').prop("disabled",true);

            var districtDDL = $('#billingDistrict option:selected').val();
            districtDDL != "-"? ($('#billingSubDistrict').prop("disabled",false)) : ($('#billingSubDistrict').prop("disabled",true));
            var subDistrictDDL = $('#billingSubDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#billingPostalCode').prop("disabled",false)) : ($('#billingPostalCode').prop("disabled",true))
        });

        $('#billingSubDistrict').change(function(){
            var subCountyID = $(this).val();
            filterData("billingPostalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#billingPostalCode').prop("disabled",true);

            var subDistrictDDL = $('#billingSubDistrict option:selected').val();
            subDistrictDDL != "-"? ($('#billingPostalCode').prop("disabled",false)) : ($('#billingPostalCode').prop("disabled",true))
        });

    });

    var buildPickupAddress = ""

    $.each(data.pickupAddressData, function(k,v) {
        buildPickupAddress += `
            <div class="col-12 pickUpSelectionDiv">
                <div class="row d-flex align-items-center">
                    <div class="col-2">
                        <input class="radioStyle pickupOption" type="radio" name="pickupOption" id="${v['name']}" value="${v['pickupID']}">
                    </div>
                    <div class="col-8">
                        <label for="${v['name']}" class="mb-0">
                            <h3 class="bold blackFont">${v['name']}</h3>
                            <div class="grayFont">${v['address']}</div>
                        </label>
                    </div>
                </div>
            </div>
        `
    })
    $("#buildPickupAddress").html(buildPickupAddress);

}

function loadCountryChange(countryID) {

    // if (countryID == 0) {

    //     var buildStateOption = `
    //         <option><?php echo $translations['M00054'][$language]; //Please Select ?></option>
    //     `
    //     $("#buildStateOption").html(buildStateOption)

    //     $("#phoneNumber").val("");

    // } else {

    //     var buildStateOption = ""

    //     var thisStateList = (stateList).filter((state) => state.country_id == countryID )

    //     if (thisStateList.length>0) {
    //         $.each(thisStateList, function(k,v) {
    //             buildStateOption += `
    //                 <option value="${v['id']}">
    //                     ${v['name']}
    //                 </option>
    //             `
    //         }) 
    //     } else {
    //         buildStateOption = `
    //             <option><?php echo $translations['M00054'][$language]; //Please Select ?></option>
    //         `
    //     }
    //     $("#buildStateOption").html(buildStateOption)

        $("#dialingArea").val('');
        var thisCountry = (saveJsonData['countriesList']).filter((country) => country['id'] == countryID )
        if(thisCountry.length > 0) {
            var dialingArea = thisCountry[0]['countryCode']            
            $("#dialingArea").val("(+"+dialingArea+")");
        }
    // }
}


function loadBillingCountryChange(countryID) {

    // var buildStateOption = ""

    // var thisStateList = (stateList).filter((state) => state.country_id == countryID )

    // $.each(thisStateList, function(k,v) {
    //     buildStateOption += `
    //         <option value="${v['id']}">
    //             ${v['name']}
    //         </option>
    //     `
    // })

    // $("#buildBillingStateOption").html(buildStateOption)

    $("#billingDialingArea").val('');
    var thisCountry = (saveJsonData['countriesList']).filter((country) => country['id'] == countryID )
    if(thisCountry.length > 0) {
        var dialingArea = thisCountry[0]['countryCode']
        $("#billingDialingArea").val("(+"+dialingArea+")");
    }
}




$(document).on("change", "#buildDeliveryAddressOption", function() {
    var selectedAddressID = $(this).val()

    var selectedAddressData = (deliveryAddressList).filter((address) => address.addressID == selectedAddressID)[0] 

    if ($(this).val() == 0) {
        $('.newDeliveryAddressSection div input, .newDeliveryAddressSection div select').val("").attr('disabled', false)
        // filter state based on country selected then build option
        var buildCountryOption = $("#buildCountryOption option:first-child").prop('selected', true);
        var buildCountryOption = $("#buildCountryOption").val();
        filterData("buildStateOption", buildCountryOption, "country_id", "stateList", "id", "stateDisplay");

        // filter city based on state selected then build option
        var buildStateOption = $("#buildStateOption").val();
        filterData("city", buildStateOption, "state_id", "cityList", "id", "cityDisplay");

        // filter district based on state selected then build option
        var cityID = $("#city").val();
        filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

        // filter sub district based on state selected then build option
        var countyID = $("#district").val();
        filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

        // filter zipcode based on state selected then build option
        var subCountyID = $("#subDistrict").val();
        filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
    } else {
        $('.newDeliveryAddressSection div input, .newDeliveryAddressSection div select').attr('disabled', true)
        $("#fullName").val(selectedAddressData.fullName || "-")
        $("#buildCountryOption").val(selectedAddressData.countryID || "")
        $("#address").val(selectedAddressData.address || "-")
        $("#city").html(`<option value=${selectedAddressData.cityID} selected>${selectedAddressData.city}</option>`)
        $("#city").val(selectedAddressData.cityID || "-")
        $("#district").html(`<option value=${selectedAddressData.districtID} selected>${selectedAddressData.district}</option>`)
        $("#district").val(selectedAddressData.districtID || "-")
        $("#subDistrict").html(`<option value=${selectedAddressData.subDistrictID} selected>${selectedAddressData.subDistrict}</option>`)
        $("#subDistrict").val(selectedAddressData.subDistrictID || "-")
        $("#buildStateOption").html(`<option value=${selectedAddressData.stateID} selected>${selectedAddressData.stateName}</option>`)
        $("#buildStateOption").val(selectedAddressData.stateID || "")
        // loadCountryChange($("#buildCountryOption").val())
        $("#postalCode").html(`<option value=${selectedAddressData.postalCodeID} selected>${selectedAddressData.postalCode}</option>`)
        $("#postalCode").val(selectedAddressData.postalCodeID || "-")
        $("#dialingArea").val("(+"+selectedAddressData.dialingArea+") ")
        $("#phoneNumber").val(selectedAddressData.phoneNumber)
        $("#emailAddress").val(selectedAddressData.emailAddress || "-")
    }


})

/*$(document).on("change", "#buildCountryOption", function() {
    loadCountryChange($(this).val())
})*/

/*$(document).on("change", "#buildBillingCountryOption", function() {
    loadBillingCountryChange($(this).val())
})*/


$(document).on("click", ".pickupOption", function() {
    $(".pickupOption").prop('checked', false)
    $(this).prop('checked', true)
})

$(document).on("click", ".orderMethod", function() {
    var method = $(this).attr('id')

    switch(method) {
      case 'delivery':
        $('#pickupDiv').hide();
        $('#shippingAddressDiv').show();
        $('input[name="pickupOption"]').prop('checked', false);
        pickupID = ""
        break;
      case 'pickup':
        $('#pickupDiv').show();
        $('#billingAddressDiv').hide();
        $('#sameAdd').prop('checked', true);
        isBillingAddress = 1;
        $('#shippingAddressDiv').hide();
        break;
      default:
        $('#pickupDiv').hide();
        $('#shippingAddressDiv').show();
        $('input[name="pickupOption"]').prop('checked', false);
        pickupID = ""
    }
})

function goPayment(data, message) {
    if(saveDeliveryType == 'pickup'){
        $.redirect('payment',{
            sendData : JSON.stringify(data),
            passData : JSON.stringify(passData),
            pickupID,
            isBillingAddress
        });
    }else{
        $.redirect('checkoutStep2',{
            sendData : JSON.stringify(data),
            passData : JSON.stringify(passData),
            pickupID,
            isBillingAddress
        });
    }
    
}

</script>