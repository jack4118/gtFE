<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<?php
include_once('include/class.cryptDes.php');

if($_GET){
    $referralUsername = $_GET['qr'];
    if(!$config["isLocalHost"]){
        $crypt = new cryptDes();
        $encryptedUsername = $referralUsername;
        $referralUsername = $crypt->decrypt($referralUsername);
    }
}

if($_POST['fromQr']=='1'){
    $language = "chineseSimplified";
}


if (isset($_SESSION["userID"]) && isset($_SESSION["sessionID"])) {
    session_destroy();
}


?>

<link href="css/login.css" rel="stylesheet" type="text/css" />

<input type="hidden" name="" class="hideFunction">
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading" style="background-color: #f8f8f8">

    <section class="registerPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row justify-content-center loginBlock register">
                    <div class="col-xl-7 col-lg-8 col-md-10 p-4">
                        <div class="row pagetitle">
                            <div class="col-12 logoBlock text-left">
                                <img src="<?php echo $config['logoURL']; ?>" style="height: 80px;">
                            </div>
                            <div class="col-12 mt-5">
                                <h2 class="d-block my-0 loginTitle" style="letter-spacing: 0;"><?php echo $translations['M00027'][$language]; //Registration ?> </h2>
                            </div>  
                            <div class="col-12 mb-2 mt-2 text-right <?php if($fromQR){echo 'hide';} ?>">
                                <div class="btn-group">
                                    <span type="" class="dropdown-toggle languageFontRegister" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                        <?php echo $config["languages"][$language]['displayName'] ?>
                                    </span>
                                    <div class="dropdown-menu dropdown_language">
                                        <?php $languageArr = $config["languages"]; 
                                            foreach($languageArr as $key => $value) {
                                        ?>
                                            <a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00035'][$language]; //Full Name ?>
                                </label>
                                <input type="text" class="form-control beforeLoginForm" disabled id="fullName" placeholder="<?php echo $translations['M00035'][$language]; //Full Name ?>">
                                <span id="fullNameError" class="customError text-danger" error="error"></span>
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00036'][$language]; //Username ?>
                                </label>
                                <input type="text" class="form-control beforeLoginForm" disabled id="username" placeholder="<?php echo $translations['M00036'][$language]; //Username ?>">
                                <span id="usernameError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00276'][$language]; //Email Address ?>
                                    <!-- <small> | <?php echo $translations['M02154'][$language]; /* Register code will be sent to this email except China */ ?></small> -->
                                </label>
                                <input type="email" class="form-control beforeLoginForm" disabled id="email" placeholder="<?php echo $translations['M00276'][$language]; //Email Address ?>">
                                <span id="emailError" class="customError text-danger" error="error"></span>
                            </div>

                            <!-- <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['B00252'][$language]; //Identity Number ?>
                                </label>
                                <input type="text" class="form-control beforeLoginForm" disabled id="identityNumber" placeholder="<?php echo $translations['B00252'][$language]; //Identity Number ?>">
                                <span id="identityNumberError" class="customError text-danger" error="error"></span>
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00320'][$language]; //Date Of Birth ?>
                                </label>
                                <input type="email" class="form-control beforeLoginForm" disabled id="dateOfBirth" placeholder="<?php echo $translations['M00320'][$language]; //Date Of Birth ?>">
                                <span id="dateOfBirthError" class="customError text-danger" error="error"></span>
                            </div> -->

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00037'][$language]; //Country ?>
                                </label>
                                <select id="country" class="form-control beforeLoginForm" disabled>
                                    <option value=""><?php echo $translations['M00179'][$language]; ?></option>
                                </select>
                                <span id="countryError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00381'][$language]; //Mobile Number ?>
                                    <!-- <small> | <?php echo $translations['M02155'][$language]; /* Register code will be sent to this number ONLY China */ ?></small> -->
                                </label>
                                <div class="row justify-content-between mx-0">
                                    <input class="form-control beforeLoginForm col-3" id="phoneCode" placeholder="<?php echo $translations['M00681'][$language]; ?>" disabled>
        <!--                             <select id="dialingArea" class="form-control beforeLoginForm  disabledcol-4">
                                        <option value="60">+60</option>
                                    </select> -->
                                    <input type="text" class="form-control beforeLoginForm col ml-1" disabled id="phone" placeholder="<?php echo $translations['M00381'][$language]; //Mobile Number ?>">
                                    <span id="phoneError" class="customError text-danger" error="error"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00002'][$language]; //Password ?>
                                </label>
                                <input type="password" class="form-control beforeLoginForm" disabled id="password" placeholder="<?php echo $translations['M00002'][$language]; //Password ?>">
                                <span id="passwordError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00041'][$language]; //Retype Password ?>
                                </label>
                                <input type="password" class="form-control beforeLoginForm" disabled id="checkPassword" placeholder="<?php echo $translations['M00041'][$language]; //Retype Password ?>">
                                <span id="checkPasswordError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00042'][$language]; //Transaction Password ?>
                                </label>
                                <input type="password" class="form-control beforeLoginForm" disabled id="tPassword" placeholder="<?php echo $translations['M00042'][$language]; //Transaction Password ?>">
                                <span id="tPasswordError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>
                                </label>
                                <input type="password" class="form-control beforeLoginForm" disabled id="checkTPassword" placeholder="<?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>">
                                <span id="checkTPasswordError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="formLabel">
                                    <?php echo $translations['M01651'][$language]; //Sponsor Username ?>
                                </label>
                                <input type="text" class="form-control beforeLoginForm" disabled id="sponsorUsername" placeholder="<?php echo $translations['M01651'][$language]; //Sponsor Username ?>">
                                <span id="sponsorUsernameError" class="customError text-danger" error="error"></span>
                            </div>

                            <div class="col-md-12 <?php if($_POST['fromQr']=='1'){echo 'hide';} ?>">
                                <label class="formLabel"><?php echo $translations['M00196'][$language]; //Placement Username ?></label>
                                <input id="placementUsername" class="form-control inputDesign" disabled type="text">
                            </div>

                            <div class="col-md-12 mb-4 mt-4 <?php if($_POST['fromQr']=='1'){echo 'hide';} ?>">
                                <div id="placementPosition" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
                                    <label class="kt-radio">
                                        <input type="radio" name="placementPosition" value="1" disabled><?php echo $translations['M00198'][$language]; //Left ?>
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="placementPosition" value="2" disabled><?php echo $translations['M00200'][$language]; //Right ?>
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <!-- <div id="loginError" class="col-12" style="color: #ff2222;"></div> -->



                            <div class="col-md-12 mb-4 hide">
                                <label class="formLabel">
                                    <?php echo $translations['M00684'][$language]; //Verification Code ?>
                                </label>
                                <div class="input-group">
                                    <input id="inputCode" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00684'][$language]; //Verification Code ?>">

                                    <button class="btn btnPrimary ml-2 py-0" id="sendCode" type="button" style="width: 150px; height: 34px;"><?php echo $translations['M00391'][$language]; //Send Code ?></button>

                                    <span id="timer" class="form__button-wrapper text-center" style="display: none; color: #fff; width: 95px;">
                                        <span class="p-3" style="display:block"></span>
                                    </span>
                                </div>
                                <small class="text-white" style="font-weight: lighter;"><?php echo $translations['M02191'][$language]; /* Did not receive the mail, check the spam mail */ ?></small>
                                <div id="otpType" class="kt-radio-inline loginRadio" style="margin-top: 5px; display: none;">
                                    <label class="kt-radio">
                                        <input type="radio" name="otpType" value="email"><?php echo $translations['M00276'][$language]; //Email Address ?>
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="otpType" value="phone"><?php echo $translations['M00381'][$language]; //Mobile Number ?>
                                        <span></span>
                                    </label>
                                </div>
                                <span id="otpCode" class="text-danger"></span>
                            </div>

                            <div class="col-12 py-4">
                                <div class="row justify-content-between">
                                    <div class="col-6 col-lg-6">
                                        <a href="javascript:;" class="text-center btn loginBtn back d-block w-100 goToPublicReg">
                                            <?php echo $translations['M00163'][$language]; //BACK ?>
                                        </a>
                                    </div>
                                    <div class="col-6 col-lg-6 text-right">
                                        <button id="confirmBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

                
    </section>
<?php include 'footerLogin.php'; ?>
<?php include 'sharejs.php'; ?>


</body>

<!-- end::Body -->
</html>

<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    var fullName = '<?php echo $_POST['fullName']; ?>';
    var username = '<?php echo $_POST['username']; ?>';
    var country = '<?php echo $_POST['country']; ?>';
    var identityNumber = '<?php echo $_POST['identityNumber']; ?>';
    var dialingArea = '<?php echo $_POST['dialingArea']; ?>';
    var phone = '<?php echo $_POST['phone']; ?>';
    var email = '<?php echo $_POST['email']; ?>';
    var password = '<?php echo $_POST['password']; ?>';
    var checkPassword = '<?php echo $_POST['checkPassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    var dateOfBirth = '<?php echo $_POST['dateOfBirth']; ?>';
    var sponsorName = '<?php echo $_POST['sponsorName']; ?>';
    var otpCode = '<?php echo $_POST['otpCode']; ?>';
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';
    var isFromQR = '<?php echo $_POST['isFromQR']; ?>';


    $(document).ready(function(){
        $('#fullName').val(fullName);
        $('#username').val(username);
        
        // $('#identityNumber').val(identityNumber);
        $('#phoneCode').val(dialingArea);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#password').val(password);
        $('#checkPassword').val(checkPassword);
        $('#tPassword').val(tPassword);
        $('#checkTPassword').val(checkTPassword);
        $('#dateOfBirth').val(dateOfBirth);
        $('#sponsorUsername').val(sponsorName);
        $('#placementUsername').val(placementUsername);

        $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);

        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#dateOfBirth').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $('#country').change(function(){
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);
        });

        if(dialingArea == "+86") {
            $("#otpType").show();
        }

        /*
        
        **for phone**
        "params": {
                "phoneNumber": "601600000",
                "type": "registration",
                "sendType": "phone",
                "dialCode": "86",
                "byPass": "1"
            }
        **for email**
        "params": {
                "type": "registration",
                "sendType": "email",
                "email": "khlim.ttwoweb@gmail.com",
                "byPass": "1"
            }

        */

        $('#sendCode').click(function(){

            $(".invalid-feedback").remove();

            var getCountry = $("#country option:selected").attr('data-code');

            var dialCode = $('#phoneCode').val();
            var phoneNumber = $('#phone').val();
            var email = $('#email').val();


            var formData  = {
                command : "sendOTPCode",
                email: email,
                type: "registration",
                sendType: "email",
                byPass: "1"
            };

            if(getCountry == "+86") {

                var otpSendType = $("input[name=otpType]:checked").val();

                if(!otpSendType || otpSendType == "") {
                    $("#otpCode").text('<?php echo $translations['M02184'][$language]; /* Please select OTP send type */ ?>');

                    return false;
                }

                formData  = {
                    command : "sendOTPCode",
                    phoneNumber: phoneNumber,
                    type: "registration",
                    sendType: otpSendType,
                    dialCode: dialCode,
                    email: email,
                    byPass: "1"
                };
            }
                
            fCallback = otpCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#confirmBtn').click(function(){

                $(".invalid-feedback").remove();

                var otpCode = $("#inputCode").val();
                var otpSendType = 'email';

                if(dialingArea == "+86") {
                    otpSendType = $("input[name=otpType]:checked").val();
                }

                var formData = {
                    'command' : "publicRegistrationConfirmation",
                    'registerType' : 'free',
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    'identityNumber' : identityNumber,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    // 'dateOfBirth' : dateOfBirth,
                    'sponsorName' : sponsorName,
                    // 'identityNumber' : identityNumber
                    'placementUsername' : placementUsername,
                    'placementPosition' : placementPosition,
                    'sendType': otpSendType,
                    'otpCode' : otpCode,
                    'isFromQR' : isFromQR
                };


                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });

        $('.goToPublicReg').click(function() {
            $.redirect('publicRegistration', {
                fullName : fullName,
                username : username,
                country : country,
                identityNumber : identityNumber,
                dialingArea : dialingArea,
                phone : phone,
                email : email,
                password : password,
                checkPassword : checkPassword,
                tPassword : tPassword,
                checkTPassword : checkTPassword,
                // dateOfBirth : dateOfBirth,
                sponsorName : sponsorName,
                // identityNumber : identityNumber,
                placementUsername : placementUsername,
                placementPosition : placementPosition,
                isFromQR : isFromQR,
                fromQR: '<?php echo $_POST['fromQr'] ?>'
            });
        });
});

function publicRegistrationSuccess(data, message) {
    showMessage('<?php echo $translations['M00004'][$language]; //Your registration is successful. ?>', 'success', '<?php echo $translations['M00072'][$language]; //Congratulations ?>', '', 'login');
}


function loadCountries(data,message){
    var countriesList = data.countriesList;

    if(countriesList) {
        $.each(countriesList, function(key) {
            var selected = '';

            var countryDisplay = '';
            countryDisplay = countriesList[key]['display'];

            $('#country').append('<option value="'+countriesList[key]['id']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" '+selected+'>'+countryDisplay+'</option>');
        });

        $('#country').val(country);
    }
}

function otpCallback(data, message) {
    // otpCode = data.otpCode;
    countDown('#sendCode', 180);
}

function countDown(id, second){
    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);
    if(minutes == 0 && seconds == 0){
        $('#sendCode').show();
        $('#timer').hide();
        return;
    }else if(minutes == 0 && seconds != 0){
        $('#sendCode').hide();
        $('#timer').show();
        $('#timer span').empty().append(seconds+"s");
        setTimeout('countDown(sendCode,'+(second-1)+')',1000);
    }else{
        $('#sendCode').hide();
        $('#timer').show();
        $('#timer span').empty().append(minutes+"m"+" "+seconds+"s");
        setTimeout('countDown(sendCode,'+(second-1)+')',1000);
    }
  }








</script>
