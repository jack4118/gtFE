<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00128'][$language]; //Registration ?>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00035'][$language]; //Full Name ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="fullName" class="form-control inputDesign" type="text" value="<?php echo $_POST['fullName']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00036'][$language]; //Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="username" class="form-control inputDesign" type="text" value="<?php echo $_POST['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00276'][$language]; //Email Address ?> <span class="mustFill">*</span>
                                    <!-- <small> | <?php echo $translations['M02154'][$language]; /* Register code will be sent to this email except China */ ?></small> -->
                                </label>
                                <div class="col-md-7">
                                    <input id="email" class="form-control inputDesign" type="text" value="<?php echo $_POST['email']; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00037'][$language]; //Country ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                   <select id="country" class="form-control inputDesign"></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00381'][$language]; //Mobile Number ?> <span class="mustFill">*</span>
                                    <!-- <small> | <?php echo $translations['M02155'][$language]; /* Register code will be sent to this number ONLY China */ ?></small> -->
                                </label>
                                <div class="col-md-7">
                                    <div class="input-group px-0">
                                        <div class="input-group-append signupMobileFormRight"><span class="input-group-text phoneCodeStyle" id="phoneCode"> <?php echo $_POST['dialingArea']; ?> </span></div>
                                           <input id="phone" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo $_POST['phone']; ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['B00252'][$language]; //Identity Number ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control inputDesign" id="identityNumber" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php echo $_POST['identityNumber']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M01058'][$language]; //Date Of Birth ?></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control inputDesign" id="dateOfBirth" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo $_POST['dateOfBirth']; ?>">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00002'][$language]; //Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="password" class="form-control inputDesign" type="password" value="<?php echo $_POST['password']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00041'][$language]; //Retype Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="checkPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['checkPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00042'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="tPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['tPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00043'][$language]; //Retype Transaction Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="checkTPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['checkTPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M01651'][$language]; //Sponsor Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="sponsorUsername" class="form-control inputDesign" type="text" value="<?php echo $_SESSION['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00196'][$language]; //Placement Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="placementUsername" class="form-control inputDesign" type="text">
                                    <div id="placementPosition" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
                                        <label class="kt-radio">
                                            <input type="radio" name="placementPosition" value="1"><?php echo $translations['M00198'][$language]; //Left ?>
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="placementPosition" value="2"><?php echo $translations['M00200'][$language]; //Right ?>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-5">
                                <div class="col-12">
                                    <button id="signUpBtn" type="button" class="btn btn-primary nextArrow" style="text-transform: uppercase;">
                                        <?php echo $translations['M00034'][$language]; //NEXT ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

</body>

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
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';
    var registerType = '<?php echo $_POST['registerType']; ?>';
    var creditUnit = '<?php echo $_POST['creditUnit']; ?>';
    var product = '<?php echo $_POST['product']; ?>';

    var fromDiagram = '<?php echo $_POST['fromDiagram']; ?>';
    var fromSponsorDiagram = '<?php echo $_POST['fromSponsorDiagram']; ?>';
    var getPlacementName = '<?php echo $_POST['getPlacementName']; ?>';


    var getSponserUsername = '<?php echo $_SESSION['username']; ?>';

    $(document).ready(function(){
        console.log(placementPosition);

        if (fromDiagram == 1) {
            $('#sponsorUsername').prop("disabled", true);
            $('#sponsorUsername').val(getSponserUsername);
            // $('#placementUsername').prop("disabled", true);
            $('#placementUsername').val(getPlacementName);
            // $("input[name=placementPosition]").prop("disabled", true);
            $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);
        } else if (fromSponsorDiagram == 1) {
            $('#sponsorUsername').prop("disabled", true);
            $('#sponsorUsername').val(getSponserUsername);
        } else {
            $('#sponsorUsername').prop("disabled", false);
            $('#sponsorUsername').val(sponsorName);
            // $('#placementUsername').prop("disabled", false);
            $('#placementUsername').val(placementUsername);
            // $("input[name=placementPosition]").prop("disabled", false);
            $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);
        }

        $('#fullName').val(fullName);
        $('#username').val(username);
        
        $('#identityNumber').val(identityNumber);
        $('#phoneCode').text(dialingArea);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#password').val(password);
        $('#checkPassword').val(checkPassword);
        $('#tPassword').val(tPassword);
        $('#checkTPassword').val(checkTPassword);
        $('#dateOfBirth').val(dateOfBirth);
        
        

        
        $("input[name=regType][value='"+registerType+"']").prop("checked", true);
        $('#creditUnit').val(creditUnit);

        if ($("input[name=regType]:checked").val() == 'credit') {
            $('#creditAmountDisplay').show();
        } else {
            $('#creditAmountDisplay').hide();
        };

        $('input[type=radio][name=regType]').change(function() {
            if (this.value == 'credit') {
                $('#creditAmountDisplay').show();
            } else {
                $('#creditAmountDisplay').hide();
            }
        });

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

        $('#signUpBtn').click(function(){

            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');

            fullName = $('#fullName').val();
            username = $('#username').val();
            country = $('#country').find('option:selected').val();
            identityNumber = $('#identityNumber').val();
            dialingArea = $('#phoneCode').text();
            phone = $('#phone').val();
            email = $('#email').val();
            password = $('#password').val();
            checkPassword = $('#checkPassword').val();
            tPassword = $('#tPassword').val();
            checkTPassword = $('#checkTPassword').val();
            dateOfBirth = $('#dateOfBirth').val();
            sponsorName = $('#sponsorUsername').val();
            placementUsername = $('#placementUsername').val();
            placementPosition = $("input[name=placementPosition]:checked").val();
            product = $("input[name=product]:checked").val();
            // registerType = $("input[name=regType]:checked").val();
            registerType = 'free';
            creditUnit = $('#creditUnit').val();

            if (registerType == "free") {
                var formData = {
                    'command' : "memberRegistration",
                    'registerType' : registerType,
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    'identityNumber' : identityNumber,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'product' : product,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    'dateOfBirth' : dateOfBirth,
                    'placementUsername' : placementUsername,
                    'placementPosition' : placementPosition,
                    'sponsorName' : sponsorName
                };


                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            } else if (registerType == "credit") {
                var formData = {
                    'command' : "memberRegistration",
                    'registerType' : registerType,
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    'identityNumber' : identityNumber,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'product' : product,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    'dateOfBirth' : dateOfBirth,
                    'sponsorName' : sponsorName,
                    'placementUsername' : placementUsername,
                    'placementPosition' : placementPosition,
                    'step' : 1,
                    'creditUnit' : creditUnit
                };


                var fCallback = publicRegistrationCredit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }

                
            
        });
});

function publicRegistrationSuccess() {
    $.redirect('registrationConfirmation.php', {
        fullName : fullName,
        username : username,
        country : country,
        identityNumber : identityNumber,
        dialingArea : dialingArea,
        phone : phone,
        email : email,
        product : product,
        password : password,
        checkPassword : checkPassword,
        tPassword : tPassword,
        checkTPassword : checkTPassword,
        dateOfBirth : dateOfBirth,
        sponsorName : sponsorName,
        registerType : registerType,
        creditUnit : creditUnit,
        fromDiagram : fromDiagram,
        fromSponsorDiagram : fromSponsorDiagram,
        placementUsername : placementUsername,
        placementPosition : placementPosition
    });
}

function publicRegistrationCredit() {
    $.redirect('registrationPayment.php', {
        fullName : fullName,
        username : username,
        country : country,
        identityNumber : identityNumber,
        dialingArea : dialingArea,
        phone : phone,
        email : email,
        product : product,
        password : password,
        checkPassword : checkPassword,
        tPassword : tPassword,
        checkTPassword : checkTPassword,
        dateOfBirth : dateOfBirth,
        sponsorName : sponsorName,
        placementUsername : placementUsername,
        placementPosition : placementPosition,
        registerType : registerType,
        creditUnit : creditUnit,
        fromDiagram : fromDiagram,
        fromSponsorDiagram : fromSponsorDiagram
    });
}


function loadCountries(data,message){
    var countriesList = data.countriesList;
    var productList = data.product;

    if(countriesList) {
        $('#country').append(`<option value=""><?php echo $translations['M00179'][$language]; /* Please select a country */ ?></option>`);
        $.each(countriesList, function(key) {
            var selected = '';


            var countryDisplay = '';
            countryDisplay = countriesList[key]['display'];

            $('#country').append('<option value="'+countriesList[key]['id']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" '+selected+'>'+countryDisplay+'</option>');
        });

        // $('#country').val('107');
        
        var phoneCode = $('#country option:selected').attr('data-code');
        $('#phoneCode').text(phoneCode);


    }



    if(productList) {
        var productHTML = "";

        $.each(productList, function(k,v){
            productHTML += `
                <label class="kt-radio">
                    <input type="radio" name="product" value="${k}"> ${v}
                    <span></span>
                </label>
            `;
        });

        $("#productID").html(productHTML);
        $("input[name=product][value='"+product+"']").prop("checked", true);
    }
}








</script>