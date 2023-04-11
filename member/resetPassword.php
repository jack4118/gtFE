<?php 
include 'include/config.php';
include 'head.php'; 
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
                        <div class="col-12 call-us">
                            <?php echo $translations['M03849'][$language]; //Call us at?>: <font style="font-weight: 400;">+6018-2626000</font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="loginPage forgot-password">
        <div class="kt-container">
            <div class="row justify-content-center" style="margin-left: unset; margin-right: unset;">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="login-signup-card row">
                        <div class="col-12 p-5">
                            <h3 class="text-center" data-lang="M03854"><?php echo $translations['M03866'][$language]; //Forgot Password? ?></h3>

                            <div>
                                <label data-lang="M03851"><?php echo $translations['M03851'][$language]; //Phone Number ?></label>
                                <div class="row phone">
                                    <select id="dialingArea" class="form-control1 beforeLoginForm col-3">
                                        <!-- <option value="71">+71</option> -->
                                        <option value="60" selected>+60</option>
                                    </select>
                                    <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm col ml-1" id="phone">
                                </div>
                            </div>
                            
                            <div class="position-relative">
                                <label data-lang="M03859"><?php echo $translations['M03859'][$language]; //Verification Code ?></label>                        
                                <input type="text" class="form-control beforeLoginForm" id="otp">
                                <div id="verificationCodeError" class="customError text-danger"></div>
                                <div class="input-group-append col-md-6 col-7 resend-otp" style="margin-top: 0; padding: 0 !important;">
                                    <button id="resend-otp" class="btn button-green w-100" data-lang="M03860">
                                        <?php echo $translations['M03860'][$language]; //Request OTP ?>
                                    </button>

                                    <span class="form__button-wrapper timer col-4" style="display: none; color: #fff; width: 95px;">
                                        <span class=" mt-3 " style="display:block; color: #000; width: 95px;"></span>
                                    </span>                 
                                </div>
                            </div>
                            
                            <div class="position-relative">
                                <label data-lang="M03869"><?php echo $translations['M03869'][$language]; //New Password ?></label>                        
                                <input type="password" class="form-control beforeLoginForm" id="password" placeholder="Enter Your Password">
                                <div id="passwordError" class="customError text-danger" error="error"></div>
                                <div class="input-group-append col-1 col-sm-1 icon-see">
                                    <span class="input-group-text captchaIcon" style="padding:unset">
                                        <i class="far fa-eye eyeIco active" style="cursor: pointer; color: #939393;"></i>
                                    </span>                        
                                </div>
                            </div>
                            
                            <div class="position-relative">
                                <label data-lang="M03870"><?php echo $translations['M03870'][$language]; //Confirm New Password ?></label>                        
                                <input type="password" class="form-control beforeLoginForm" id="checkPassword" placeholder="Enter Your Password">
                                <div id="checkPasswordError" class="customError text-danger" error="error"></div>
                                <div class="input-group-append col-1 col-sm-1 icon-see">
                                    <span class="input-group-text captchaIcon" style="padding:unset">
                                        <i class="far fa-eye eyeIco1 active" style="cursor: pointer; color: #939393;"></i>
                                    </span>                        
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <button id="resetBtn" class="btn button-red button-reset-password" style="padding: .65rem .85rem;" data-lang="M03871">
                                        <?php echo $translations['M03871'][$language]; //Reset Password ?>
                                    </button>
                                </div>
                                <div class="col">
                                    <button id="backBtn" class="btn button-link" data-lang="M03872">
                                        <?php echo $translations['M03872'][$language]; //Back to Login ?>
                                    </button>
                                </div>
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

</html>

<script>

    $(document).ready(function(){
        var url             = 'scripts/reqDefault.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var fCallback = "";

        // default login type
        var username  = $('#dialingArea option:selected').val() + $('#phone').val();
        var password  = $('#password').val();

        if (username) {
            var formData  = {
                'command'   : 'memberLogin',
                'id'        : "",
                'loginBy' : "phone",
                'username'  : username,
                'password'  : password,
            };

            // validateLogin(formData);
        }

        // $('#secureCodeRefresh').click(function(event) {
        //     $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
        //     $('input#captcha').val("");
        // });

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#loginBtn").click();
            }
        });

        $('#loginBtn').click(function(){
            $('#loginError').hide();
            var username = $('#username').val();
            var password = $('#password').val();
            // var captcha = $('#captcha').val();

            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

            $('#secureCodeRefresh').parent().removeClass('inputError');

            showCanvas();

            username = $('#dialingArea option:selected').val() + $('#phone').val();
            password = $('#password').val();

            var formData  = {
                'command'   : 'memberLogin',
                'id'  : "",
                'username'  : username,
                'loginBy' : "phone",
                'password'   : password
            };

            validateLogin(formData);
        });

    });

    function validateLogin(formData){
        startRecordTime("Login Performance");
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
                window.location.href = "homepage";
            }
            else {
                refreshCaptcha();
                if(obj.statusMsg != '')
                {
                    if(obj.data != null && obj.data.field)
                            showCustomErrorField(obj.data.field, obj.statusMsg);
                        else
                            errorHandler(obj.code, obj.statusMsg);
                }
            }
        });
    }

    function refreshCaptcha(){
        $('input#captcha').val("");
        $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
    }

    $('#signUpBtn').click(function() {
        $.redirect("publicRegistration");
    })

    $('#forgotPasswordBtn').click(function() {
        $.redirect("resetPassword");
    })


    $('#resend-otp').click(function(){
        $("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });

        $('#phoneError').hide();
        $('#verificationCodeError').hide();
        $('#passwordError').hide();
        $('#passwordError').hide();

        var dialCode = $('#dialingArea option:selected').val();;
        var number = $('#phone').val();
        var phone = dialCode + number;
        // var retypePassword = $('#retypePassword').val();

        var formData  = {
            command     : "memberResetPasswordVerification",
            phone       : phone,
        };
        fCallback = otpCallback; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function otpCallback(data, message) {
        showMessage(message, 'success', 'Send OTP Code', 'success','');
        countDown(data.resendOTPCountDown);
    }

    function countDown(second){
        var minutes = Math.floor(second/60);
        var seconds = second - (minutes*60);
        if(minutes == 0 && seconds == 0){
            $('#resend-otp').text('Resend OTP')
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

    $('#resetBtn').click(function(){
        $("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });

        $('#phoneError').hide();
        $('#verificationCodeError').hide();
        $('#passwordError').hide();
        $('#passwordError').hide();

        var dialCode = $('#dialingArea option:selected').val();;
        var number = $('#phone').val();
        var phone = dialCode + number;
        var retypePassword = $('#checkPassword').val();
        var password = $('#password').val();
        var verificationCode = $('#otp').val();

        var formData  = {
            command     : "memberResetPassword",
            clientID    : "",
            phone       : phone,
            verificationCode : verificationCode,
            password    : password,
            retypePassword : retypePassword,
            otpType : "phone"
        };
        fCallback = resetCallback; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function resetCallback(data, message) {
        showMessage(message, 'success', 'Reset Password', 'success','homepage');
    }

    $('#backBtn').click(function() {
        $.redirect("login");
    })

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
</script>
