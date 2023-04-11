<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<link href="css/login.css?v=<?php echo filemtime('css/login.css'); ?>" rel="stylesheet" type="text/css" />

<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading loginPage" style="background-color: #f8f8f8">

    <section class="forgotPasswordPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-12" style="margin-top: 30px;margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-12 text-right d-block d-sm-none">
                                <div class="btn-group">
                                    <span type="" class="dropdown-toggle languageFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                        <?php echo $config["languages"][$language]['displayName'] ?>
                                    </span>
                                    <div class="dropdown-menu dropdown_language">
                                        <?php $languages = $config['languages']; ?>
                                        <?php foreach($languages as $key => $value) { 
                                            if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                                                $flag="chinese";
                                            }else if ($key == "korean"){
                                                $flag="korean";
                                            }else if ($key == "vietnam"){
                                                $flag="vietnam";
                                            }else if ($key == "japanese"){
                                                $flag="japanese";
                                            }else if($key == 'english'){
                                                $flag="english";
                                            }else if ($key == "thailand"){
                                                $flag="thai";
                                            }
                                            ?>
                                            <a href="javascript:void(0)" class="changeLanguage dropdown-item" language="<?php echo $key; ?>" style="margin-top: 0;margin-bottom: 0;">
                                                <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png">
                                                <?php echo $languages[$key]['displayName']; ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="login.php">
                                    <img src="<?php echo $config['logoURL']; ?>" style="height: 70px;">
                                </a>
                            </div>
                            <div class="col-12 loginTitle" style="margin-top: 20px;">
                                <?php echo $translations['M00289'][$language]; //Reset Password ?>
                            </div>

                            <div class="col-12" style="margin-top: 20px;">
                                <form>
                                    <div class="col-12 px-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="formLabel"><?php echo $translations['M00036'][$language]; /* Username */ ?></label>
                                                <input autocomplete="off" id="username" class="form-control beforeLoginForm" type="text" >
                                            </div>
                                            <div class="col-12 mt-4">
                                                <label class="formLabel"><?php echo $translations['M00039'][$language]; /* Email */ ?></label>
                                                <input autocomplete="off" id="email" class="form-control beforeLoginForm" type="text" placeholder="example: sample@gmail.com">
                                            </div>

                                            <div class="col-12 mt-4" id="passwordDIV" style="display: none;">
                                                <label class="formLabel"><?php echo $translations['M00083'][$language]; //New Password ?></label>
                                                <input autocomplete="off" id="newPassword" class="form-control beforeLoginForm" type="password" placeholder="">
                                            </div>

                                            <div class="col-12 mt-4" id="rePasswordDIV" style="display: none;">
                                                <label class="formLabel"><?php echo $translations['M00084'][$language]; //Re-Type New Password ?></label>
                                                <input autocomplete="off" id="rePassword" class="form-control beforeLoginForm" type="password" placeholder="">
                                            </div>

                                            <div class="col-12 mt-4" id="verificationDIV" style="display: none;">
                                                <label class="formLabel">
                                                    <?php echo $translations['M00390'][$language]; //OTP Code ?>
                                                </label>
                                                <div class="input-group">
                                                    <input id="inputCode" class="form-control beforeLoginForm" type="text">

                                                    <button class="btn btnPrimary ml-2 py-0" id="sendCode" type="button" style="width: 150px; height: 34px;"><?php echo $translations['M00391'][$language]; //Send Code ?></button>

                                                    <span id="timer" class="form__button-wrapper text-center" style="display: none; color: #fff; width: 95px;">
                                                        <span class="p-3" style="display:block"></span>
                                                    </span>
                                                </div>
                                                <span id="otpCode" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12" style="margin-top: 20px;">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <button id="resetPassword" type="button" class="btn beforeLoginBtn" style=""><?php echo $translations['M00034'][$language]; //Next ?></button>
                                        <button id="resetPassword2" type="button" class="ml-0 btn beforeLoginBtn" style="display: none;"><?php echo $translations['M00289'][$language]; //Reset Password ?></button>
                                    </div>
                                    <div class="col-md-6 col-12 align-self-center">
                                        <a href="login.php" class="forgotPasswordBtn">
                                            <?php echo $translations['M01449'][$language]; //BACK TO LOGIN ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-block d-sm-none" style="color: #000">
                                <?php echo $translations['M01024'][$language]; //Don’t have an account? ?> <a href="publicRegistration.php" style="color: #000;font-weight: 600;text-transform: uppercase;"><?php echo $translations['M01985'][$language]; //SIGN UP ?></a>
                            </div>
                        </div>
                    </div>

              


                    


                </div>
            </div>
        </div>

        <div class="registerBox">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 loginFont">
                        <?php echo $translations['M00002'][$language]; //Don’t have an account? ?> <a href="publicRegistration.php" class="signupFontLink" style="text-transform: uppercase;"><?php echo $translations['M01985'][$language]; //SIGN UP ?></a> 
                    </div>
                    <div class="col-12">
                        <div class="btn-group">
                            <span type="" class="dropdown-toggle languageFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                <?php echo $config["languages"][$language]['displayName'] ?>
                            </span>
                            <div class="dropdown-menu dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-52px, 38px, 0px);overflow: hidden;">
                              <?php
                                  $languageArr = $config["languages"];
                                  foreach($languageArr as $key => $value) {
                              ?>
                                    <a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
                              <?php
                                  }
                              ?>
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

</html>




<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var loginType = "username";
var username, captcha, newPassword, rePassword, verificationCode;

$(document).ready(function(){
  // $('input:radio[name="radioInline"]').change(function(){
  //     if ($(this).val() == '0') {
  //       $("#username").attr("placeholder", "<?php echo $translations['M00187'][$language]; //Enter mobile number ?>");
  //        $("#username").attr("oninput", "this.value = this.value.replace(/[^0-9.]/g, \'\');");
  //        loginType = "telNumber";

  //     }


  //     $("input.form-control").each(function(){
  //         $(this).val('');
  //         $(this).removeClass('is-invalid');
  //         $('.invalid-feedback').html("");
  //     });
  // });

  $("#resetPassword").click(function(){
    username = $("#username").val();
    email = $("#email").val();
    captcha = $('#captcha').val();

    $("input").each(function(){
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').html("");
    });

    $('#secureCodeRefresh').parent().removeClass('inputError');

    if (username == "")
    {
        if (loginType=="telNumber") {
      errorDisplay("username","<?php echo $translations['E00664'][$language]; //Please Enter Mobile Number. ?>");
            refreshCaptcha();
        }else{
            errorDisplay("username","<?php echo $translations['E00116'][$language]; //Please Enter Username. ?>");
            refreshCaptcha();
        }
    }

    showCanvas();

      var formData  = {
          'command' : 'forgotPasswordVerification',
          'username': username,
          'type' : "email",
          'receiveInput' : email,
      };

      var fCallback = validateToResetPassword;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

  });

  $('#sendCode').click(function(){
      var formData  = {
          command : "sendOTPCode",
          // type : "resetPassword",
          'username': username,
          'value' : '0'
      };
      fCallback = otpCallback;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  });





  $("#resetPassword2").click(function(){
    email = $("#email").val();
    password = $("#newPassword").val();
    retypePassword = $("#rePassword").val();
    verificationCode = $("#inputCode").val();

    $("input").each(function(){
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').html("");
    });

    if (password == "")
    {
      errorDisplay("newPassword","<?php echo $translations['M00517'][$language]; //Please Enter Your New Password. ?>");
      // refreshCaptcha();
    }
    else if (retypePassword == "")
    {
      errorDisplay("rePassword","<?php echo $translations['M00518'][$language]; //Please Retype Your New Password. ?>");
      // refreshCaptcha();
    }
    else if (verificationCode == "")
    {
      errorDisplay("verificationDIV","<?php echo $translations['M00193'][$language]; //Please Renter Your New Password. ?>");
      // refreshCaptcha();
    }
    else
    {
      showCanvas();

      var formData  = {
          'command' : 'forgotPasswordConfirmation',
          'username': username,
          "type" : "email",
          "receiveInput" : email,
          'password': password,
          'retypePassword' : retypePassword,
          'otpCode': verificationCode
      };

      var fCallback = memberResetPassword;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

  });

});

function validateToResetPassword(data, message)
{
  $("#resetPassword").hide();
  $("#captchaDIV").hide();
  $("#resetPassword2").show();
  $("#passwordDIV").show();
  $("#rePasswordDIV").show();
  $("#verificationDIV").show();
  $("#section1").css('pointer-events', 'none');

  countDown('',180);
}

function memberResetPassword(data, message)
{
  showMessage('<?php echo $translations['M00287'][$language]; //Succesfully reset password. ?>', "success", "<?php echo $translations['M00289'][$language]; //Reset Pasword ?>","", "login.php");


}


function refreshCaptcha(){
    $('input#captcha').val("");
    $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
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
        $('#timer span').empty().append(seconds+"<?php echo $translations['M00995'][$language]; /* Sec */ ?>");
        setTimeout('countDown(sendCode,'+(second-1)+')',1000);
    }else{
        $('#sendCode').hide();
        $('#timer').show();
        $('#timer span').empty().append(minutes+"<?php echo $translations['M00994'][$language]; /* Min */ ?>"+" "+seconds+"<?php echo $translations['M00995'][$language]; /* Sec */ ?>");
        setTimeout('countDown(sendCode,'+(second-1)+')',1000);
    }
  }
</script>
