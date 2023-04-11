<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<link href="css/login.css?v=<?php echo filemtime('css/login.css'); ?>" rel="stylesheet" type="text/css" />

<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading loginPage" style="background-color: #f8f8f8">

    <section class="loginPage">
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
                                <?php echo $translations['M01445'][$language]; //Welcome Back ?>
                            </div>

                            <div class="col-12" style="margin-top: 20px;">
                                <form>
                                    <div class="col-12 px-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="formLabel"><?php echo $translations['M00001'][$language]; //Username ?></label>
                                                <input id="username" class="form-control beforeLoginForm" type="text">
                                            </div>
                                            <div class="col-12" style="margin-top: 20px;">
                                                <label class="formLabel"><?php echo $translations['M00002'][$language]; //Password ?></label>
                                                <input id="password" class="form-control beforeLoginForm" type="password">
                                            </div>
                                            <div class="col-12" style="margin-top: 20px;">
                                                <label class="formLabel"><?php echo $translations['M00003'][$language]; //Security Code ?></label>
                                                <div class="input-group">
                                                    <input id="captcha" type="text" class="form-control beforeLoginForm" name="securityCode" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text captchaIcon" id="basic-addon2">
                                                            <i id="secureCodeRefresh" class="fa fa-refresh" style="cursor: pointer; color: #3f68b0;"></i>
                                                        </span>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <img id="captchaImage" class="ml-3" src="captcha.php?" style="width: 90px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 noteText">
                                                <?php echo $translations['M00004'][$language]; //Please fill in the security code above to validate your access. ?>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12" style="margin-top: 20px;">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <button type="button" id="loginBtn" class="btn beforeLoginBtn" style="text-transform: uppercase;"><?php echo $translations['M00005'][$language]; //SIGN IN ?></button>
                                    </div>
                                    <div class="col-md-6 col-12 align-self-center">
                                        <a href="resetPassword.php" class="btn forgotPasswordBtn"><?php echo $translations['M00203'][$language]; //Forgot Password ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-block d-sm-none" style="color: #000">
                                <?php echo $translations['M01024'][$language]; //Do not have account? ?> <a href="publicRegistration.php" style="color: #000;font-weight: 600;text-transform: uppercase;"><?php echo $translations['M00200'][$language]; //SIGN UP ?></a>
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
                        <?php echo $translations['M01024'][$language]; //Do not have account? ?> <a href="publicRegistration.php" class="signupFontLink" style="text-transform: uppercase;"><?php echo $translations['M00200'][$language]; //SIGN UP ?></a> 
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

    $(document).ready(function(){
        var url             = 'scripts/reqLogin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var fCallback = "";

        // default login type
        var loginType = "username";

        var id        = "<?php echo $_POST['id']; ?>";
        var username  = "<?php echo $_POST['username']; ?>";

        if (id && username) {
            var formData  = {
                'command'   : 'memberLogin',
                'id'        : id,
                'loginType' : "username",
                'username'  : username
            };

            validateLogin(formData);
        }

        $('#secureCodeRefresh').click(function(event) {
            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#loginBtn").click();
            }
        });

        $('#loginBtn').click(function(){
            $('#loginError').hide();
            var username = $('#username').val();
            var password = $('#password').val();
            var captcha = $('#captcha').val();

            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

            $('#secureCodeRefresh').parent().removeClass('inputError');

            showCanvas();

            var formData  = {
                'command'   : 'memberLogin',
                'username'  : username,
                'password'  : password,
                'loginType' : loginType,
                'captcha'   : captcha
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
                window.location.href = "dashboard.php";
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

</script>
