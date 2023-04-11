<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container px-0" style="color: #000;">
    <div class="homepagePadding checkoutVerify mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-md-6 pr-lg-5">
                        <form id="checkoutForm">
                            <div class="row mx-0">
                                <div class="formTitle mb-4" data-lang="M03522">
                                    <?php echo $translations['M03522'][$language]; //Courier Service ?>
                                </div>
                            </div>
                            <div class="hideRadio row" id="courierComp">
                                
                            </div>
                            <div class="row mx-0">
                                <div class="formTitle mb-4" data-lang="M03522">
                                    Service Option
                                </div>
                            </div>
                            <div class="hideRadio row" id="serviceOption">

                            </div>
                            <div class="row mx-0 insuranceDisplayOption">
                                <input type="checkbox" id="insuranceOption" name="insuranceBtn" value="1" onClick="insuranceChecking(this)">
                                <label for="insuranceOption" class="ml-2 my-0 font-weight-bold" data-lang="M03760">
                                    <?php echo $translations['M03760'][$language]; //Insurance Option ?>
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 pl-lg-5 mt-5 mt-md-0">
                        <div class="row">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-between">
                                <label class="formTitle" data-lang="M03261"><?php echo $translations['M03261'][$language]; //Order Summary ?></label>
                            </div>
                        </div>
                        <div class="m-1 mb-5 summaryDiv" id="buildSummary"></div>
                                <div class="row feeCalc">
                                    <span data-lang="M03264"><?php echo $translations['M03264'][$language]; //Subtotal ?></span>
                                    <span class="bold" id="subtotalPrice">0</span>
                                </div>
                                <div class="row feeCalc appliedPromo" style="display: none;">
                                    <span data-lang="M03265"><?php echo $translations['M03265'][$language]; //Promocode ?></span>
                                    <span class="bold" style="color: #ff0000;">Rp 600,000</span>
                                </div>
                                <div class="row feeCalc">
                                    <span data-lang="M02823" id="taxPercentage"><?php echo $translations['M02823'][$language]; //Tax ?></span>
                                    <span data-lang="" class="bold" id="taxes">0</span>
                                </div>
                                <div class="row feeCalc" id="totalInsuranceCharges">
                                    <span data-lang="M03761" id="insuranceCharges"><?php echo $translations['M03761'][$language]; //Total Insurance Charges ?></span>
                                    <span id="insuranceTaxes" data-lang="" class="bold" id="">0</span>
                                </div>
                                <div class="row feeCalc feeTotal">
                                    <span data-lang="M03267"><?php echo $translations['M03267'][$language]; //Total ?></span>
                                    <span id="totalPrice" class="bold">0</span>
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
var sendData = '<?php echo $_POST['sendData']; ?>';
var passData = '<?php echo $_POST['passData']; ?>';
var pickupID = '<?php echo $_POST['pickupID']; ?>';
var isBillingAddress = parseInt('<?php echo $_POST['isBillingAddress']; ?>');

var jsonUrl         = 'json/productList.json';
var imgPath         = '<?php echo $config['tempMediaUrl'] ?>inv/';
var currentLang     = '<?php echo $_SESSION['language']; ?>';
var currentCID = 100;
var countryID = '<?php echo $_SESSION['countryID'] ?>' || ""
var jsonData;
var countryJsonUrl  = 'json/addressList.json';
var saveJsonData;
var isBillingAddress = 0;

var packageAry = getPackageAry();
var deliveryOption;
var pickupID;
var addressID;
var fullName;
var countryID;
var address;
var stateID;
var district;
var subDistrict;
var city;
var placementPosition;
var postalCode;
var dialingArea;
var phoneNumber;
var emailAddress;
var billingFullName;
var billingCountryID;
var billingAddress;
var billingDistrict;
var billingSubDistrict;
var billingCity;
var billingStateID;
var billingPostalCode;
var billingDialingArea;
var billingPhoneNumber;
var billingEmailAddress;
var purchaseSpecialNote;
var purchaseRemark;
var saveDeliveryType = '<?php echo $_POST['saveDeliveryType']; ?>';

var totalInsuranceCharges;
var insuranceOption;

$(document).ready(function() {

    $(".insuranceDisplayOption").hide();

    if (sendData == "") {
        window.location.href='checkout'
    } else {
        sendData = JSON.parse(sendData)
    }
    if (passData == "") {
        window.location.href='checkout'
    } else {
        passData = JSON.parse(passData)
    }

    if (countryID) {
        currentCID = countryID
    }

    $.getJSON(jsonUrl, function( data ) {
        jsonData = data;
        getCurrency(currentCID, jsonData.curList)
        buildSummary(jsonData);
    });

    loadCheckout(sendData);

    $("input[name='courierComp']").change(function(){
        updateServiceOption(sendData)
    });

    $('#goPayment').click(function() {

        $(".invalid-feedback").remove();
        var courierCompany = $('input[name="courierComp"]:checked').val();
        var courierService = $('input[name="serviceOption"]:checked').val();
        insuranceOption = $("input[name=insuranceBtn]:checked").val() || 0;

        if (isBillingAddress) {

            var formData  = {
                command: 'purchasePackageVerification',
                step: 4,
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
                courierService,
                courierCompany,
                placementPosition,
                insuranceOption
            }
        } else {

            var formData  = {
                command: 'purchasePackageVerification',
                step: 4,
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
                courierService,
                courierCompany,
                placementPosition,
                insuranceOption
            }
        }
        formData = passData;
        
        passData['courierService'] = courierService; 
        passData['courierCompany'] = courierCompany; 
        passData['step'] = 4; 
        passData['insuranceOption'] = insuranceOption; 
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

    $('#totalInsuranceCharges').hide()

});

function insuranceChecking(checkbox){
    let insuranceCheckbox = $("#totalInsuranceCharges");
    insuranceCheckbox.disabled = checkbox.checked ? 0 : 1;

    !insuranceCheckbox.disabled ?  insuranceCheckbox.show() : insuranceCheckbox.hide(); 

    if(!insuranceCheckbox.disabled){
        let totalAmount = parseFloat(sendData.totalPrice);  
        let priceCharges = 5000;
        let pricePercent = 0.002;

        totalInsuranceCharges = (pricePercent * totalAmount) + 5000;
        let totalToPay = totalAmount + totalInsuranceCharges;
        
        $("#insuranceTaxes").html("IDR" + ' ' + numberThousand(totalInsuranceCharges,2))
        $("#totalPrice").html("IDR" + ' ' + numberThousand(totalToPay,2))
    }
    else{
        $("#totalPrice").html(getCurrency() + " " + numberThousand(sendData.totalPrice,2))
    }
}

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

function loadCheckout(data) {
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


    var courierComp = data.courierCompany;
    var courierCompany = ""


    $.each(courierComp, function(k,v) {
        var compImg;
        if (v == 'JNE') {
            compImg = "images/project/JNE.png"
        } else {
            compImg = "images/project/ONDELIVERY.png"
        }
        
       courierCompany += `
           <div class="col-12 col-lg-6 mb-4 mt-1">
               <div class="courierOption">
                   <input class="radioStyle courierComp" id="${v}" type="radio" name="courierComp" value="${v}">
                   <label for="${v}"><img src="${compImg}" class="shippingIco">${v}</label>
               </div>
           </div>
       ` ;
    })
    $("#courierComp").html("")
    $("#courierComp").html(courierCompany)
    $('input[name="courierComp"]:first').attr('checked', true)

    updateServiceOption(data);

}

function updateServiceOption(data) {

    var serviceOption = ""
    if($('input[name="courierComp"]:checked').val() == "JNE"){

        $(".insuranceDisplayOption").show()
        $.each(data.courierList.JNE, function(k,v) {
            var courierTypImg;
            if (v['courier'] == 'REG') {
                courierTypeImg = "images/project/REG.png"
            } else {
                courierTypeImg = "images/project/JTR.png"
            }
            if (k == 0) {
                serviceOption += `
                        <div class="col-12 col-lg-6 mb-4 mt-1">
                           <div class="courierOption">
                               <input class="radioStyle serviceOption" id="${v['courier']}" type="radio" name="serviceOption" value="${v['courier']}" checked>
                               <label for="${v['courier']}"><img src="${courierTypeImg}" class="shippingIco">${v['courier']}</label>
                           </div>
                        </div>
                `;
            } else {
               serviceOption += `
                   <div class="col-12 col-lg-6 mb-4 mt-1">
                       <div class="courierOption">
                           <input class="radioStyle serviceOption" id="${v['courier']}" type="radio" name="serviceOption" value="${v['courier']}">
                           <label for="${v['courier']}"><img src="${courierTypeImg}" class="shippingIco">${v['courier']}</label>
                       </div>
                   </div>
               ` ;
            }
        })
    }else{
        $(".insuranceDisplayOption").hide();
        $.each(data.courierList.ONDELIVERY, function(k,v) {
            if (v['courier'] == 'REGULER') {
                courierTypeImg = "images/project/regular.png"
            } else if(v['courier'] == "CARGO") {
                courierTypeImg = "images/project/cargo.png"
            } else{
                courierTypeImg = "images/project/nextday.png"
            }
            if (k == 0) {
                serviceOption += `
                        <div class="col-12 col-lg-6 mb-4 mt-1">
                           <div class="courierOption">
                               <input class="radioStyle serviceOption" id="${v['courier']}" type="radio" name="serviceOption" value="${v['courier']}" checked>
                               <label for="${v['courier']}"><img src="${courierTypeImg}" class="shippingIco">${v['courier']}</label>
                           </div>
                        </div>
                `;
            } else {
               serviceOption += `
                   <div class="col-12 col-lg-6 mb-4 mt-1">
                       <div class="courierOption">
                           <input class="radioStyle serviceOption" id="${v['courier']}" type="radio" name="serviceOption" value="${v['courier']}">
                           <label for="${v['courier']}"><img src="${courierTypeImg}" class="shippingIco">${v['courier']}</label>
                       </div>
                   </div>
               ` ;
            }
        })
    }
    $("#serviceOption").html("")
    $("#serviceOption").html(serviceOption)
}

$(document).on("click", ".courierOption", function() {
    $(".courierOption").not(this).prop('checked', false);
    $(this).prop('checked', true);
    $(this).addClass('check');
    $('.courierOption').removeClass('check');

})

function goPayment(data, message) {
    $.redirect('payment',{
        sendData : JSON.stringify(data),
        passData : JSON.stringify(passData),
        pickupID,
        isBillingAddress,
        courierDisplay: $('input[name="serviceOption"]:checked').val(),
        courierCompany: $('input[name="courierComp"]:checked').val(),
        insuranceOption
    });
}

</script>