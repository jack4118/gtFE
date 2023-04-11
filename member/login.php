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
                    <h1 data-lang="M03848"><?php echo $translations['M03848'][$language]; //Enjoy Favourite Food Instantly! ?> </h1>
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
                            <?php echo $translations['M03849'][$language]; //Call us at ?>: <font style="font-weight: 400;">+6018-2626000</font>
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
                        <h3 data-lang="M03850"><?php echo $translations['M03850'][$language]; //Welcome Back ?></h3>

                        <label data-lang="M03851"><?php echo $translations['M03851'][$language]; //Phone Number ?></label>
                        <div class="row phone">
                            <select id="dialingArea" class="form-control1 beforeLoginForm col-3">
                                <!-- <option value="71">+71</option> -->
                                <option value="60" selected>+60</option>
                            </select>
                            <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm col ml-1" id="phone">
                        </div>
                        <div id="username" class="customError text-danger" error="error"></div>

                        <label data-lang="M03852"><?php echo $translations['M03852'][$language]; //Password ?></label>                        
                        <input type="password" class="form-control beforeLoginForm" id="password" placeholder="Enter Your Password">
                        <div id="passwordError" class="customError text-danger" error="error"></div>
                        <div class="input-group-append col-1 col-sm-1 icon-see" style="">
                            <span class="input-group-text captchaIcon" style="padding:unset">
                                <i class="far fa-eye eyeIco active" style="cursor: pointer; color: #939393;"></i>
                            </span>                        
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <button id="loginBtn" class="btn button-red" data-lang="M03853">
                                    <?php echo $translations['M03853'][$language]; //Login ?>
                                </button>
                            </div>
                            <div class="col">
                                <button id="forgotPasswordBtn" class="btn button-dark" data-lang="M03854">
                                    <?php echo $translations['M03854'][$language]; //Forgot Password? ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 data-lang="M03855"><?php echo $translations['M03855'][$language]; //Sign Up ?></h3>
                        <p data-lang="M03856"><?php echo $translations['M03856'][$language]; //Create a personal or business account for free, and start earning rewards! ?></p>

                        <div class="row mt-4">
                            <div class="col">
                                <button id="signUpBtn" class="btn button-red" data--lang="M03857">
                                    <?php echo $translations['M03857'][$language]; //Sign Up Here ?>
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
            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

            $('#usernameError').hide();
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
                clearCart();
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

    $('.eyeIco').click(function(){
        if($('.eyeIco').hasClass('fa-eye-slash')){
            $('.eyeIco').removeClass('fa-eye-slash');   
            $('.eyeIco').addClass('fa-eye');
            $(this).parent().parent().parent().find('#password').attr('type','password');
        }else{
            $('.eyeIco').removeClass('fa-eye');    
            $('.eyeIco').addClass('fa-eye-slash');
            $('.eyeIco').parent().parent().parent().find('#password').attr('type','text');
        }
    })

</script>