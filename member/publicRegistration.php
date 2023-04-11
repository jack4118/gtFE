<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<?php
include_once('include/class.cryptDes.php');

$fromQR = false;
if(isset($_POST['fromQR'])) {
    $fromQR = $_POST['fromQR']==1?true:false;
}

if($_GET){
    $referralUsername = $_GET['qr'];
    if(!$config["isLocalHost"]){
        $crypt = new cryptDes();
        $encryptedUsername = $referralUsername;
        $referralUsername = $crypt->decrypt($referralUsername);
    }

    $pPosition = $_GET['p'];
    $pUsername = $_GET['pu'];

    $fromQR = true;

}

if (isset($_SESSION["userID"]) && isset($_SESSION["sessionID"])) {
    session_destroy();
}


?>

<link href="css/login.css?v=<?php echo filemtime('css/login.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading loginPage" style="background-color: #f8f8f8">
    <?php include 'homepageHeader.php';?>

    <section class="jp-page-banner login-signup">
        <div class="kt-container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <h1 data-lang="M03848"><?php echo $translations['M03848'][$language]; //Enjoy Favourite Food Instantly!?> </h1>
                </div>
                <div class="col-sm-6 col-md-7 offset-lg-3 col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" target="_blank"><img src="images/project/sm1.png" class="img-fluid"></a>
                            <a href="#" target="_blank"><img src="images/project/sm2.png" class="img-fluid"></a>
                            <a href="#" target="_blank"><img src="images/project/sm3.png" class="img-fluid"></a>
                            <a href="#" target="_blank"><img src="images/project/sm4.png" class="img-fluid"></a>
                        </div>
                        <div class="col-12 call-us" data-lang="M03849">
                            <?php echo $translations['M03849'][$language]; //Call us at?>: <font style="font-weight: 400;">+6018-2626000</font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="loginPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="login-signup-card row">
                    <div class="col-md-6">
                        <h3 data-lang="M03855"><?php echo $translations['M03855'][$language]; //Sign Up ?></h3>

                        <div class="tab-content">
                            <div class="page1 tab-pane fade in active show">
                                <div>
                                    <label data-lang="M03851"><?php echo $translations['M03851'][$language]; //Phone Number ?></label>
                                    <div class="row phone">
                                        <select id="dialingArea" class="form-control1 beforeLoginForm col-3">
                                            <option value="60" selected>+60</option>
                                        </select>
                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" id="phone" class="form-control beforeLoginForm col ml-1">
                                    </div>
                                </div>
                                
                                <div class="position-relative">
                                    <label data-lang="M03859"><?php echo $translations['M03859'][$language]; //Verification Code ?></label>                        
                                    <input type="text" class="form-control beforeLoginForm" id="otp">
                                    <!-- <div id="verificationCodeError" class="customError text-danger"></div> -->
                                    <div class="input-group-append col-md-5 col-6 px-0 resend-otp" style="">
                                        <button id="resend-otp" class="btn button-grey w-100" data-lang="M03860">
                                            <?php echo $translations['M03860'][$language]; //Request OTP ?>
                                        </button>

                                        <span class="form__button-wrapper timer col-6" style="display: none; color: #fff; width: 95px;">
                                            <span class=" mt-3 " style="display:block; color: #000; width: 95px;"></span>
                                        </span>                 
                                    </div>
                                </div>
                                
                                <div class="position-relative">
                                    <label data-lang="M03852"><?php echo $translations['M03852'][$language]; //Password ?></label>                        
                                    <input type="password" class="form-control beforeLoginForm" id="password" placeholder="Enter Your Password">
                                    <!-- <div id="passwordError" class="customError text-danger" error="error"></div> -->
                                    <div class="input-group-append col-1 col-sm-1 icon-see">
                                        <span class="input-group-text captchaIcon" style="padding:unset">
                                            <i class="far fa-eye eyeIco active" style="cursor: pointer; color: #939393;"></i>
                                        </span>                        
                                    </div>
                                </div>
                                
                                <div class="position-relative">
                                    <label data-lang="M03861"><?php echo $translations['M03861'][$language]; //Confirm Password ?></label>                        
                                    <input type="password" class="form-control beforeLoginForm" id="checkPassword" placeholder="Enter Your Password">
                                    <!-- <div id="checkPasswordError" class="customError text-danger" error="error"></div> -->
                                    <div class="input-group-append col-1 col-sm-1 icon-see">
                                        <span class="input-group-text captchaIcon" style="padding:unset">
                                            <i class="far fa-eye eyeIco1 active" style="cursor: pointer; color: #939393;"></i>
                                        </span>                        
                                    </div>
                                </div>
                                
                                <div>
                                    <label data-lang="M03858"><?php echo $translations['M03858'][$language]; //Referral Mobile Number ?></label>
                                    <div class="row">
                                        <select id="sponsorDialingArea" class="form-control1 beforeLoginForm col-3">
                                            <option value="60" selected>+60</option>
                                        </select>
                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" id="referral" class="form-control beforeLoginForm col ml-1">
                                    </div>                      
                                    <!-- <div id="sponsorIdCodeError" class="customError text-danger"></div> -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <p class="note" data-lang="M03862"><?php echo $translations['M03862'][$language]; //Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purpose described in our privacy policy. ?></p>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <button class="btn button-red signUpBtn" data-lang="M03855">
                                            <?php echo $translations['M03855'][$language]; //Sign Up ?>
                                        </button>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>

                            <div class="page2 tab-pane fade">
                                <h5 data-lang="M03863"><?php echo $translations['M03863'][$language]; //You are almost there !?></h5>
                                <p data-lang="M03864"><?php echo $translations['M03864'][$language]; //To ensure you having a good experience with our platform, we would like to know your name. Please help to fill in your name in order to complete registration. Once you complete register, you may start shopping and get reward points for each purchase. ?></p>

                                <label data-lang="M03865"><?php echo $translations['M03865'][$language]; //Full Name ?></label>                        
                                <input type="text" class="form-control beforeLoginForm" id="fullName" placeholder="Enter Your Full Name">
                                <div id="fullNameError" class="invalid-feedback" style="display:block;"></div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <button class="btn button-red signUpBtn" data-lang="M03855">
                                            <?php echo $translations['M03855'][$language]; //Sign Up ?>
                                        </button>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <h3 data-lang="M03866"><?php echo $translations['M00108'][$language]; //Sign In ?></h3>
                        <p data-lang="M03867"><?php echo $translations['M03867'][$language]; //Sign in to your account if you already have an account with GoTasty. ?></p>

                        <div class="row mt-4">
                            <div class="col">
                                <button id="loginBtn" class="btn button-red" data-lang="M03868">
                                    <?php echo $translations['M03868'][$language]; //Sign In Here ?>
                                </button>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>        
    </section>

<?php include 'homepageFooter.php'; ?>

<?php include 'sharejs.php'; ?>


</body>

<!-- end::Body -->
</html>

<script>

    var url             = 'scripts/reqLogin.php';
    var jsonUrl         = 'json/addressList.json';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var currentIndex    = 1;
    var childAgeOption  = {};
    var countriesList;
    var districtList;
    var subDistrictList;
    var postalCodeList;
    var cityList;
    var stateList;
    var bankList;
    var saveJsonData;
    var currBankOption;
    // var leftRightPosition;

    $(document).ready(function(){
        
        window.ajaxEnabled = true;
        loadDefaultListing();
        //send OTP
        $('#sendCodeSignUp').click(function(){
            $(".invalid-feedback").remove();
            var phoneFullNumber = "60" + $('#phoneNo').val()
            // var phoneFullNumber = $('#dialingArea option:selected').val() + $('#phoneNo').val()
            var formData  = {
                command : "accountSignUpVerification",
                type : 'register',
                dialCode: $('#dialingArea option:selected').val(),
                number: $('#phoneNo').val(),
                phone : phoneFullNumber
            };
            fCallback = otpCallbackSignup;
            ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#nextBtn').click(function(){
            $("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });
        // var phoneFullNumber = $('#dialingArea option:selected').val() + $('#phoneNo').val()
        var formData  = {
          command : "accountSignUpVerification",
            dialCode: $('#dialingArea option:selected').val(),
            type : 'register',
            number: $('#phoneNo').val(),
            step: 2,
            phone : phoneFullNumber,
            verificationCode : $('#verificationCode').val()
        }; 
        fCallback = successVerifyOTP;
        ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
        });

        // var formData  = {
        //     command   : "getRegistrationDetailMember"
        // };
        // var fCallback = loadCountryList;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // var formData  = {
        //     command   : "getRegistrationDetailMember"
        // };
        // var fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // updateMemberName();

        // getBankOption = $('input[name="bankOption"]:checked').val();

        $('.logoBlock img').click(function() {
            $.redirect('homepage');
        });

        // $('#dialingArea').change(function() {
        //     var country = $('#dialingArea option:selected').attr('name');
        //     $(`#countryID option[name="${country}"]`).prop('selected', true);

        //     var dialingCountry = $('#dialingArea option:selected').attr('name');
        //     $("#countryID > option").each(function() {
        //         if($(this).attr('name') === dialingCountry)
        //             $("#countryID").val($(this).val()).change();
        //     });

        //     countryChanged();
        // });

        $('#countryID').change(function() {
            countryChanged();
        });

        $('#dateOfBirth').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#childNumber').keyup(function() {
            var childNumber = $('#childNumber').val();
            if(childNumber == "" || childNumber == "0") {
                $('#childAge').prop('disabled', true);
            } else {
                $('#childAge').prop('disabled', false);
            }
        });

        $('#childAge').change(function() {
            var selected = $('#childAge :selected').val();
            var text = $('#childAge :selected').text();
            if(selected != "") {
                $('#childAgeList').append(`
                    <div class="col-xs-4 ageTag" name="${selected}">${text} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                `);
            }
            $('#childAgeList').show();
            $('#childAge').val('');
        });

        $(document).on("click", ".ageTag", function() {
            $(this).remove();
            if($('#childAgeList').children().length==0) {
                $('#childAgeList').hide();
            }
        });

        $('#identityType').change(function() {
            if($('#identityType option:selected').val()=="nric") {
                $('#identityNumberDiv').show();
                $('#passportNumberDiv').hide();
            } else {
                $('#identityNumberDiv').hide();
                $('#passportNumberDiv').show();
            }
        });

        $('#submitBtn').click(function() {
            confirmRegister();
        });

        $('.cancelBtn').click(function() {
            window.location.href = "homepage";
        });
});

// $('.bankOption').change(function(){
//     getBankOption = $('input[name="bankOption"]:checked').val();
//     console.log(getBankOption);
//     if(getBankOption == 1){
//         $(".bankField").attr('disabled',false)
//     }else{
//         $(".bankField").attr('disabled',true)
//     }
    
// })

function otpCallbackSignup(data, message) {
  $('#dialingArea, #phoneNo').attr('disabled',true);
  if(data.remainingTime) {
    var second = data.remainingTime;

    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);

    var leftTime = `${minutes==0?"":minutes + "m"} ${seconds}s.`;


    countDownSignUp('#sendCodeSignUp', second);
    showMessage(`${message.replace(".", leftTime)}`, "warning", "<?php echo $translations['E00730'][$language]; /* Error */ ?>", "warning");
  }else{
    countDownSignUp('#sendCodeSignUp', data.resendOTPCountDown);
    showMessage(message, "success", "<?php echo $translations['M03456'][$language]; /* Send OTP Code */ ?>", "success");
  }
}

function countDownSignUp(id, second){
  var minutes = Math.floor(second/60);
  var seconds = second - (minutes*60);

  if(minutes == 0 && seconds == 0){
    $('#sendCodeSignUp').show();
    $('#timerSignUpResend').hide();
    return;
  }else if(minutes == 0 && seconds != 0){
    $('#sendCodeSignUp').hide();
    // $('#sendCode').show();
    $('#timerSignUpResend span').empty().append(seconds+"s");
    setTimeout('countDownSignUp(sendCodeSignUp,'+(second-1)+')',1000);
  }else{
    $('#sendCodeSignUp').hide();
    $('#timerSignUpResend').show();
    $('#timerSignUpResend span').empty().append(minutes+"m"+" "+seconds+"s");
    setTimeout('countDownSignUp(sendCodeSignUp,'+(second-1)+')',1000);
  }
}


function successVerifyOTP(data,message){
  $('#verificationCode').attr('disabled',true);
  $('.invalid-feedback').remove();
  nextSection(1);
}

function updateMemberName() {
    var memberID = $('#sponsorUsername').val();
    if(memberID.length >= 7) {
        var formData = {
            command     : 'memberGetMemberName',
            memberID    : memberID
        }
        fCallback = loadName;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    } else {
        $('#sponsorName').val('');
    }
}

function loadName(data, message) {
    if(data.memberName) {
        $('#sponsorName').val(data.memberName);
    }
}

function SortByName(a, b){
    var aName = a.name.toLowerCase();
    var bName = b.name.toLowerCase(); 
    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
}


function loadDefaultListing(data,message){
    // childAgeOption = data.childAgeOption;
    // bankList = data.bankDetails;

    // if(childAgeOption) {
    //     $.each(childAgeOption, function(k, v) {
    //         $('#childAge').append(`<option value="${k}">${v['display']}`);
    //     });
    // }
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
    var vList = [];
    $.each(data, function(k,v){
        if(vList.indexOf(v[value]) < 0) {
            option+=`<option value="${v[value]}">${v[display]}</option>`;
            vList.push(v[value]);
        }
        
    });
    $("#"+id).html(option);

    // new TomSelect("#"+id,{
    //     sortField: {
    //         field: "text",
    //         direction: "asc"
    //     }
    // });
}

function focus() {
  [].forEach.call(this.options, function(o) {
    o.textContent = o.getAttribute('display') + ' (' + o.getAttribute('data-code') + ')';
  });
}
function blur() {
  [].forEach.call(this.options, function(o) {
    // console.log(o);
    o.textContent = o.getAttribute('data-code');
  });
}

// [].forEach.call(document.querySelectorAll('#dialingArea'), function(s) {
//     s.addEventListener('focus', focus);
//     s.addEventListener('blur', blur);
//     blur.call(s);
// });

// $('#dialingArea').change(function() {
//     $('#dialingArea').blur();
// });

function countryChanged() {
    var countryID = $('#countryID option:selected').val();

    $('#district').html('');
    $('#district').html('<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(districtList, function(key) {
        var selected = '';
        if(districtList[key]['country_id']==firstCountry) {
            $('#district').append('<option value="'+districtList[key]['id']+'" data-code="'+districtList[key]['country_id']+'" name="'+districtList[key]['name']+'" '+selected+'>'+districtList[key]['name']+'</option>');
        }
    });

    $('#subDistrict').html('');
    $('#subDistrict').html('<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(subDistrictList, function(key) {
        var selected = '';
        if(subDistrictList[key]['country_id']==firstCountry) {
            $('#subDistrict').append('<option value="'+subDistrictList[key]['id']+'" data-code="'+subDistrictList[key]['country_id']+'" name="'+subDistrictList[key]['name']+'" '+selected+'>'+subDistrictList[key]['name']+'</option>');
        }
    });

    $('#postalCode').html('');
    $('#postalCode').html('<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(postalCodeList, function(key) {
        var selected = '';
        if(stateList[key]['country_id']==countryID) {
            $('#state').append('<option value="'+postalCodeList[key]['id']+'" data-code="'+postalCodeList[key]['country_id']+'" name="'+postalCodeList[key]['postalCode']+'" '+selected+'>'+postalCodeList[key]['postalCode']+'</option>');
        }
    });

    $('#city').html('');
    $('#city').html('<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(cityList, function(key) {
        var selected = '';
        if(subDistrictList[key]['country_id']==firstCountry) {
            $('#city').append('<option value="'+cityList[key]['id']+'" data-code="'+cityList[key]['country_id']+'" data-code-2="'+cityList[key]['state_id']+'" name="'+cityList[key]['name']+'" '+selected+'>'+cityList[key]['name']+'</option>');
        }
    });

    $('#state').html('');
    $('#state').html('<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(stateList, function(key) {
        var selected = '';
        if(stateList[key]['country_id']==countryID) {
            $('#state').append('<option value="'+stateList[key]['id']+'" data-code="'+stateList[key]['country_id']+'" name="'+stateList[key]['stateDisplay']+'" '+selected+'>'+stateList[key]['stateDisplay']+'</option>');
        }
    });
    // $('#state').children().length==0 ? $('#state').prop('disabled', true) : $('#state').prop('disabled', false);
    
    $('#bankType').html('');
    $('#bankType').html(`<option value=""><?php echo $translations['M03442'][$language]; //Select Bank ?></option>`);
    $.each(bankList, function(key) {
        var selected = '';
        if(bankList[key][0]['country_id']==countryID) {
            $.each(bankList[key], function(k) {
                $('#bankType').append('<option value="'+bankList[key][k]['id']+'" data-code="'+bankList[key][k]['country_id']+'" name="'+bankList[key][k]['name']+'" '+selected+'>'+bankList[key][k]['display']+'</option>');
            });
        }
    });
}

/*function stateChanged() {
    var countryID = $('#countryID option:selected').val();
    var state = $('#state option:selected').val();

    $('#city').html('');
    $('#city').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
    $.each(cityList, function(key) {
        var selected = '';
        if(subDistrictList[key]['country_id']==countryID && subDistrictList[key]['state_id']==state) {
            $('#city').append('<option value="'+cityList[key]['id']+'" data-code="'+cityList[key]['country_id']+'" data-code-2="'+cityList[key]['state_id']+'" name="'+cityList[key]['name']+'" '+selected+'>'+cityList[key]['name']+'</option>');
        }
    });
}*/

$('.eyeIco').click(function() {    
    if($(this).hasClass('fa-eye-slash')) {
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');

        $('#password').attr('type','password');
    } else {
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');

        $('#password').attr('type','text');
    }
});

$('.eyeIco1').click(function() {    
    if($(this).hasClass('fa-eye-slash')) {
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');

        $('#checkPassword').attr('type','password');
    } else {
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');

        $('#checkPassword').attr('type','text');
    }
});

function nextSection(selectedIndex,bankOptional) {
    // if(bankOptionalChoice){
    //     bankOptional =  bankOptionalChoice;
    // }
    $('.invalid-feedback').remove();
    $('div').removeClass('is-invalid');
    $('select').removeClass('is-invalid');
    $('input').removeClass('is-invalid');
    if(bankOptional){
        currBankOption = bankOptional;
    }
    currentIndex = selectedIndex;
    var step = selectedIndex;

    // Step 1
    var registerType = 'free';
    var fullName = $('#name').val();
    // var username = $('#username').val(); // Removed
    var email = $('#email').val();
    var dialingArea = $('#dialingArea option:selected').val();
    var phone = $('#phoneNo').val();
    var dateOfBirth = dateToTimestamp($('#dateOfBirth').val());
    var gender = $('#gender option:selected').val();
    var password = $('#password').val();
    var checkPassword = $('#checkPassword').val();
    var sponsorName = $('#sponsorUsername').val();
    var otpCode = $('#verificationCode').val();
    // leftRightPosition = $("input[name=leftRightPosition]:checked").val();

    var countryDDL = $('#countryID option:selected').val();
    countryDDL != "-"? ($('#state').prop("disabled",false)) : ($('#state').prop("disabled",true));
    var stateDDL = $('#state option:selected').val();
    stateDDL != "-"? ($('#city').prop("disabled",false)) : ($('#city').prop("disabled",true));
    var cityDDL = $('#city option:selected').val();
    cityDDL != "-"? ($('#district').prop("disabled",false)) : ($('#district').prop("disabled",true));
    var districtDDL = $('#district option:selected').val();
    districtDDL != "-"? ($('#subDistrict').prop("disabled",false)) : ($('#subDistrict').prop("disabled",true));
    var subDistrictDDL = $('#subDistrict option:selected').val();
    subDistrictDDL != "-"? ($('#postalCode').prop("disabled",false)) : ($('#postalCode').prop("disabled",true));


    // Step 2
    var address = $('#address').val();
    // var streetName = $('#streetName').val();
    var district = $('#district option:selected').val();
    var subDistrict = $('#subDistrict option:selected').val();
    var postalCode = $('#postalCode option:selected').val();
    var city = $('#city option:selected').val();
    var state = $('#state option:selected').val();
    var country = $('#countryID option:selected').val();
    var remarks = $('#remarks').val() || "";

    // Step 3
    // var bankOptional = $('input[name="bankOption"]:checked').val();
    var addressType = ($('#addressType').is(':checked'))?'delivery':'billing';
    var bankID = $('#bankType option:selected').val();
    var branch = $('#branch').val();
    var bankCity = $('#bankCity').val();
    var accountHolder = $('#accountHolder').val();
    var accountNo = $('#accountNo').val();
    // bankOptional = bankOptional;
    // var uploadData = getImgObj('bankAccFrontPage'); // Removed

    // Step 4
    var martialStatus = $('#martialStatus option:selected').val();
    var childNumber = $('#childNumber').val();
    var childAge = [];
    $('.ageTag').each(function(index, value) {
        childAge.push($(this).attr('name'));
    });
    var taxNumber = $('#taxNumber').val();
    var identityType = $('#identityType option:selected').val();
    var identityNumber = $('#identityNumber').val();
    var passportNumber = $('#passportNumber').val();
    
   
    // var ktpImage = getImgObj('ktpImage'); // Removed

    var formData = {
        command         : 'publicRegistration',
        step            : step,
        registerType    : registerType,
        fullName        : fullName,
        // username        : username,
        email           : email,
        dialingArea     : dialingArea,
        phone           : phone,
        dateOfBirth     : dateOfBirth,
        gender          : gender,
        password        : password,
        checkPassword   : checkPassword,
        sponsorName     : sponsorName,
        otpCode         : otpCode,
        // placementPosition : leftRightPosition,
        /*address         : address,
        streetName      : streetName,
        subDistrict     : subDistrict,
        city            : city,
        postalCode      : postalCode,
        state           : state,
        country         : country,
        remarks         : remarks,
        addressType     : addressType,
        bankID          : bankID,
        branch          : branch,
        bankCity        : bankCity,
        accountHolder   : accountHolder,
        accountNo       : accountNo,
        martialStatus   : martialStatus,
        childNumber     : childNumber,
        taxNumber       : taxNumber,
        identityType    : identityType*/
    };
    if(step>=2) {
        formData['address']     = address;
        // formData['streetName']  = streetName;
        formData['district'] = district;
        formData['subDistrict'] = subDistrict;
        formData['postalCode']  = postalCode;
        formData['city']        = city;
        formData['state']       = state;
        formData['country']     = country;
        formData['remarks']     = remarks;
        formData['addressType'] = addressType;
    }
    if(step>=3) {
        if(currBankOption == 1){
            formData['bankOptional'] = currBankOption;
            formData['bankID'] = bankID;
            formData['branch'] = branch;
            formData['bankCity'] = bankCity;
            formData['accountHolder'] = accountHolder;
            formData['accountNo'] = accountNo;
        }else{
            formData['bankOptional'] = currBankOption;
        }
    }
    if(step>=4) {
        formData['martialStatus'] = martialStatus;
        formData['childNumber'] = childNumber;
        formData['childAge'] = childAge;
        formData['taxNumber'] = taxNumber;
        formData['identityType'] = identityType;
        identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;
    }
    var fCallback = completeSection;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function completeSection(data, message) {
    console.log(data)
    if(data) {
        /*var state = '';
        $.each(stateList, function(key) {
            if(stateList[key]['id']==data.state) {
                state = stateList[key]['stateDisplay'];
            }
        });
        var country = '';
        $.each(countriesList, function(key) {
            if(countriesList[key]['id']==data.country) {
                country = countriesList[key]['display'];
            }
        });*/
        var remarks = '';
        data.remarks==''|| data.remarks==null ? remarks='none' : remarks=data.remarks;
        var bank = '';
        $.each(bankList, function(key) {
            $.each(bankList[key], function(k) {
                if(bankList[key][k]['id']==data.bankID) {
                    bank = bankList[key][k]['display'];
                }
            });
        });
        var childAge = '';
        if(data.childAge) {
            $.each(data.childAge.split('#'), function(k, v) {
                var text = childAgeOption[v]['display'];
                if(k == 0) {
                    childAge += text;
                } else {
                    childAge += `, ${text}`;
                }
            });
        }

        $('#nameDisplay').text(data.fullName);
        // $('#usernameDisplay').text(data.username);
        $('#emailDisplay').text(data.email);
        $('#phoneDisplay').text(`+${data.dialingArea}${data.phone}`);
        $('#dateOfBirthDisplay').text(data.dateOfBirth);
        $('#genderDisplay').text(data.gender);
        $('#sponsorUsernameDisplay').text(data.sponsorName);

        $('#addressDisplay').text(data.address);
        // $('#streetNameDisplay').text(data.streetName);
        $('#districtDisplay').text(data.district);
        $('#subDistrictDisplay').text(data.subDistrict);
        $('#postalCodeDisplay').text(data.postalCode);
        $('#cityDisplay').text(data.city);
        $('#stateDisplay').text(data.state);
        $('#countryDisplay').text(data.country);
        $('#remarksDisplay').text(remarks);

        // $('#placemetUsernameDisplay').text(data.placementDownline['username']);

        var placementPositionReturn;
        if(data.placementPosition == 1){
            placementPositionReturn = '<?php echo $translations['M00198'][$language]; //Left ?>'
        }else{
            placementPositionReturn = '<?php echo $translations['M00200'][$language]; //Right ?>'
        }
        // $('#placementPositionDisplay').text(placementPositionReturn);

        // $('#addressTypeDisplay').text(data.addressType+" address");
        // if(currBankOption == 1){
        //     $('#bankTypeDisplay').text(bank);
        //     $('#branchDisplay').text(data.branch);
        //     $('#bankCityDisplay').text(data.bankCity);
        //     $('#accountHolderDisplay').text(data.accountHolder);
        //     $('#accountNoDisplay').text(data.accountNo);
        // }else{
        //     $('#bankTypeDisplay').text('-');
        //     $('#branchDisplay').text('-');
        //     $('#bankCityDisplay').text('-');
        //     $('#accountHolderDisplay').text('-');
        //     $('#accountNoDisplay').text('-');
        // }
        $('#bankTypeDisplay').text(bank || '-');
        $('#branchDisplay').text(data.branch || '-');
        $('#bankCityDisplay').text(data.bankCity || '-');
        $('#accountHolderDisplay').text(data.accountHolder || '-');
        $('#accountNoDisplay').text(data.accountNo || '-');

        $('#martialStatusDisplay').text(data.martialStatus);
        $('#childNumberDisplay').text(data.childNumber);
        $('#childAgeDisplay').text(childAge);
        $('#taxNumberDisplay').text(data.taxNumber);
        $('#identityTypeDisplay').text(data.identityType);
        $('#identityNumberDisplay').text(data.identityNumber);
        $('#passportNumberDisplay').text(data.passport);

        if(data.identityType!='<?php echo $translations['M02425'][$language]; //Passport ?>') {
            $('#identityNumberDisplayRow').show();
            $('#passportNumberDisplayRow').hide();
        } else {
            $('#identityNumberDisplayRow').hide();
            $('#passportNumberDisplayRow').show();
        }

        if (currentIndex == 1){
            //skip to 3
            goToSection(5)
        }else {
         goToSection(++currentIndex);
       }
    }
}

function goToSection(selectedIndex) {
    currentIndex = selectedIndex;

    var sectionArray = ['registerSection01', 'registerSection02', 'registerSection03', 'registerSection04', 'registerSection05'];
    $.each(sectionArray, function(index, value) {
        index+1 == currentIndex ? $('#'+value).show() : $('#'+value).hide();
    });

    $('.progressBarDesc li').removeClass('active');
    $('.progressBarDesc').find('li').eq(selectedIndex-1).addClass('active');
}

function confirmRegister() {
    // Step 1
    var registerType = 'free';
    var fullName = $('#name').val();
    // var username = $('#username').val();
    var email = $('#email').val();
    var dialingArea = $('#dialingArea option:selected').val();
    var phone = $('#phoneNo').val();
    var dateOfBirth = dateToTimestamp($('#dateOfBirth').val());
    var gender = $('#gender option:selected').val();
    var password = $('#password').val();
    var checkPassword = $('#checkPassword').val();
    var sponsorName = $('#sponsorUsername').val();
    // leftRightPosition = $("input[name=leftRightPosition]:checked").val();

    // Step 2
    var address = $('#address').val();
    var streetName = $('#streetName option:selected').val();
    var district = $('#district option:selected').val();
    var subDistrict = $('#subDistrict option:selected').val();
    var postalCode = $('#postalCode option:selected').val();
    var city = $('#city option:selected').val();
    var state = $('#state option:selected').val();
    var country = $('#countryID option:selected').val();
    var remarks = $('#remarks').val() || "";

    // Step 3
    // var bankOptional = $('input[name="bankOption"]:checked').val();
    var addressType = ($('#addressType').is(':checked'))?'delivery':'billing';
    var bankID = $('#bankType option:selected').val();
    var branch = $('#branch').val();
    var bankCity = $('#bankCity').val();
    var accountHolder = $('#accountHolder').val();
    var accountNo = $('#accountNo').val();

    // Step 4
    var martialStatus = $('#martialStatus option:selected').val();
    var childNumber = $('#childNumber').val();
    var childAge = [];
    $('.ageTag').each(function(index, value) {
        childAge.push($(this).attr('name'));
    });
    var taxNumber = $('#taxNumber').val();
    var identityType = $('#identityType option:selected').val();
    var identityNumber = $('#identityNumber').val();
    var passportNumber = $('#passportNumber').val();

    if(currBankOption == 1){
        var formData = {
            command         : 'publicRegistrationConfirmation',
            registerType    : registerType,
            fullName        : fullName,
            // username        : username,
            email           : email,
            dialingArea     : dialingArea,
            phone           : phone,
            dateOfBirth     : dateOfBirth,
            gender          : gender,
            password        : password,
            checkPassword   : checkPassword,
            sponsorName     : sponsorName,
            // placementPosition : leftRightPosition,
            address         : address,
            // streetName      : streetName,
            district        : district,
            subDistrict     : subDistrict,
            postalCode      : postalCode,
            city            : city,
            state           : state,
            country         : country,
            remarks         : remarks,
            addressType     : addressType,
            bankOptional    : currBankOption,            
            bankID          : bankID,
            branch          : branch,
            bankCity        : bankCity,
            accountHolder   : accountHolder,
            accountNo       : accountNo,
            martialStatus   : martialStatus,
            childNumber     : childNumber,
            childAge        : childAge,
            taxNumber       : taxNumber,
            identityType    : identityType
        };
        identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;
    }else{
        var formData = {
            command         : 'publicRegistrationConfirmation',
            registerType    : registerType,
            fullName        : fullName,
            // username        : username,
            email           : email,
            dialingArea     : dialingArea,
            phone           : phone,
            dateOfBirth     : dateOfBirth,
            gender          : gender,
            password        : password,
            checkPassword   : checkPassword,
            sponsorName     : sponsorName,
            // placementPosition : leftRightPosition,
            address         : address,
            // streetName      : streetName,
            district        : district,
            subDistrict     : subDistrict,
            postalCode      : postalCode,
            city            : city,
            state           : state,
            country         : country,
            remarks         : remarks,
            addressType     : addressType,
            bankOptional    : currBankOption,
            martialStatus   : martialStatus,
            childNumber     : childNumber,
            childAge        : childAge,
            taxNumber       : taxNumber,
            identityType    : identityType
        };
        identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;
    }
    // var formData = {
    //     command         : 'publicRegistrationConfirmation',
    //     registerType    : registerType,
    //     fullName        : fullName,
    //     // username        : username,
    //     email           : email,
    //     dialingArea     : dialingArea,
    //     phone           : phone,
    //     dateOfBirth     : dateOfBirth,
    //     gender          : gender,
    //     password        : password,
    //     checkPassword   : checkPassword,
    //     sponsorName     : sponsorName,
    //     address         : address,
    //     // streetName      : streetName,
    //     district        : district,
    //     subDistrict     : subDistrict,
    //     postalCode      : postalCode,
    //     city            : city,
    //     state           : state,
    //     country         : country,
    //     remarks         : remarks,
    //     //start bank
        
    //     addressType     : addressType,
    //     bankID          : bankID,
    //     branch          : branch,
    //     bankCity        : bankCity,
    //     accountHolder   : accountHolder,
    //     accountNo       : accountNo,

    //     //end bank
    //     martialStatus   : martialStatus,
    //     childNumber     : childNumber,
    //     childAge        : childAge,
    //     taxNumber       : taxNumber,
    //     identityType    : identityType
    // };
    // identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;

    var fCallback = completeRegistration;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function completeRegistration(data, message) {
    showMessage(message,'success','<?php echo $translations['M03136'][$language]; //Register An Account ?>','success','homepage');
}

/*function displayFileName(id, n) {
    var dFileName = $("#"+id+"FileName");

    if (n.files && n.files[0]) {
        var filesize = n.files[0].size;
        if(filesize >  3000000){
            alert("Maximun upload size 3 MB");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            dFileName.attr("placeholder", n.files[0]["name"]);

            // $("#"+id+"Data").val(reader["result"]);
            $("#"+id+"Name").val(n.files[0]["name"]);
            $("#"+id+"Size").val(n.files[0]["size"]);
            $("#"+id+"Type").val(n.files[0]["type"]);
            $("#"+id+"Flag").val('1');
        };

        reader.readAsDataURL(n.files[0]);
    }
}*/

/*function getImgObj(id) {
    var uploadData = {};

    // var imgData = $('.flexUploadDiv').find('[id^="'+id+'Data"]').val();
    var imageName = $('.flexUploadDiv').find('[id^="'+id+'Name"]').val();
    var imageType = $('.flexUploadDiv').find('[id^="'+id+'Type"]').val();
    var imageFlag = $('.flexUploadDiv').find('[id^="'+id+'Flag"]').val() || '1';
    var imageSize = $('.flexUploadDiv').find('[id^="'+id+'Size"]').val();

    // var defaultImage = (imgData=='')?'':1;
    uploadData[0] = {
        // imgData: imgData,
        imageName: imageName,
        imageType: imageType,
        imageFlag: imageFlag,
        imageSize: imageSize
        // defaultImage: defaultImage
    };

    return uploadData;
}*/
$('#loginBtn').click(function() {
    $.redirect("login");
})

$('#resend-otp').click(function(){ 
    $("input").each(function(){
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').html("");
    });

    // $('#phoneError').hide();
    // $('#verificationCodeError').hide();
    // $('#passwordError').hide();
    // $('#passwordError').hide();

    var dialCode = $('#dialingArea option:selected').val();;
    var number = $('#phone').val();
    var phone = dialCode + number;
    // var retypePassword = $('#retypePassword').val();

    var formData  = {
        command     : "accountSignUpVerification",
        type        : "register",
        dialCode    : dialCode,
        number      : number,
        phone       : phone,
    };
    fCallback = otpCallback; 
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

function otpCallback(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M03914'][$language] /* Send OTP Code */ ?>', 'success','');
    countDown(data.resendOTPCountDown);
}

function countDown(second){
    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);
    if(minutes == 0 && seconds == 0){
        $('#resend-otp').text('<?php echo $translations['M03558'][$language] /* Resend OTP */ ?>')
        $('#resend-otp').show();
        $('.timer').hide();
        return;
    }else if(minutes == 0 && seconds != 0){
        $('#resend-otp').hide();
        $('#timer').show();
        $('.timer span').empty().append(seconds+" "+"Sec");
        setTimeout('countDown('+(second-1)+')',1000);
    }else{
        // console.log(second)
        $('#resend-otp').hide();
        $('.timer').show();
        $('.timer span').empty().append(minutes+" "+"Min"+" "+seconds+" "+"Sec");
        setTimeout('countDown('+(second-1)+')',1000);
    }
}

$('.signUpBtn').click(function(){
    $("input").each(function(){
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').html("");
    });

    // $('#phoneError').hide();
    // $('#verificationCodeError').hide();
    // $('#passwordError').hide();
    // $('#passwordError').hide();

    var dialingArea = $('#dialingArea option:selected').val();
    var number = $('#phone').val();
    var phone = number;
    var otpCode = $('#otp').val();
    var password = $('#password').val();
    var checkPassword = $('#checkPassword').val();
    var sponsorDialingArea = $('#sponsorDialingArea').val();
    var sponsorId = $('#referral').val();
    var fullName = $('#fullName').val();
    var username = $('#dialingArea option:selected').val() + $('#phone').val();

    var formData  = {
        command     : "publicRegistrationConfirmation",
        registerType: "free",
        dialingArea : dialingArea,
        phone       : phone,
        password    : password,
        checkPassword : checkPassword,
        otpCode     : otpCode,
        type        : "register",
        fullName        : fullName,
        username    : username,
    };

    if(sponsorId != '') {
        formData['sponsorId'] = sponsorDialingArea + sponsorId;
    } else {
        formData['sponsorId'] = '';
    }
    // fCallback = signUpCallback; 
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
    showCanvas();

    $.ajax({
        type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url      : 'scripts/reqDefault.php', // the url where we want to POST
        data     : formData, // our data object
        dataType : 'text', // what type of data do we expect back from the server
        encode   : true
    })
    .done(function(data) {
        var obj = JSON.parse(data);

        if(obj.status =='error' && obj.statusMsg == 'Invalid Referral ID') {
            hideCanvas();
            $('#sponsorIdCodeError').text("<?php echo $translations['M03915'][$language] /* Invalid Referral Mobile Number */ ?>");
            $('#sponsorId').css("border-color","#ff0000");
        } else if(obj.status != 'ok') {
            if(obj.statusMsg != ''){
                if(obj.data != null && obj.data.field) {
                    hideCanvas();
                    showCustomErrorField(obj.data.field, obj.statusMsg);
                }else if(obj.statusMsg == "Please Enter Username") {
                    hideCanvas();
                    $('#fullName').addClass('is-invalid');
                    $('#fullNameError').html('<?php echo $translations['M01963'][$language] /* Please Enter Full Name */ ?>');

                    $('.page1').removeClass('active');
                    $('.page1').removeClass('in'); 
                    $('.page1').removeClass('show'); 

                    $('.page2').addClass('active');
                    $('.page2').addClass('in');
                    $('.page2').addClass('show');
                }else {
                    hideCanvas();
                    errorHandler(obj.code, obj.statusMsg); 
                }                  
            }
        } else if(obj.status =='ok') {
            hideCanvas();
            // $.redirect('homepage');
            var formData  = {
                'command'   : 'memberLogin',
                'id'  : "",
                'username'  : username,
                'loginBy' : "phone",
                'password'   : password
            };

            $.ajax({
                type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url      : 'scripts/reqLogin.php', // the url where we want to POST
                data     : formData, // our data object
                dataType : 'text', // what type of data do we expect back from the server
                encode   : true
            })
            .done(function(data) {
                var obj = JSON.parse(data);
                hideCanvas();
                if(obj.status == "ok") {
                    clearCart();
                    window.location.href = "homepage";
                }
            })
        }      
        else {
            $('.page1').removeClass('active');
            $('.page1').removeClass('in'); 
            $('.page1').removeClass('show'); 

            $('.page2').addClass('active');
            $('.page2').addClass('in');
            $('.page2').addClass('show');
        }
    })
});

function signUpCallback(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M03456'][$language]; /* Send OTP Code */ ?>', 'success','');
}

</script>
