<?php 
    session_start();

    include_once("mobileDetect.php");
    $detect = new Mobile_Detect;

    $thisPage = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <div id="wrapper">

        <?php include("topbar.php"); ?>
        <?php include("sidebar.php"); ?>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00180'][$language]; /* Fill Up Info */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="registrationForm" class="text-center alert hide"></div>
                                            <form id="memberRegistrationForm" role="form">
                                                <div class="col-md-12 m-b-rem3">
                                                    <h2>
                                                        Personal Information
                                                    </h2>
                                                </div>
                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00177"><span class="text-danger">* </span><?php echo $translations['M00177'][$language]; //Full Name ?></span> (<?php echo $translations['M03142'][$language]; //Information entered must be exact as per IC ?>)
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="name" placeholder="<?php echo $translations['M02434'][$language]; //Enter your full name ?>">
                                                    <span id="nameError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00187"><span class="text-danger">* </span><?php echo $translations['M00187'][$language]; //Email Addresss ?></span>
                                                        <!-- <small> | <?php echo $translations['M02154'][$language]; /* Register code will be sent to this email except China */ ?></small> -->
                                                    </label>
                                                    <input type="email" class="form-control beforeLoginForm" id="email" placeholder="<?php echo $translations['M03144'][$language]; //Enter your email address ?>">
                                                    <span id="emailError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03145"><span class="text-danger">* </span><?php echo $translations['M03145'][$language]; //Phone Number ?></span>
                                                        <!-- <small> | <?php echo $translations['M02155'][$language]; /* Register code will be sent to this number ONLY China */ ?></small> -->
                                                    </label>
                                                    <div id="phone" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0;">
                                                        <!-- <input class="form-control col-3" id="phoneCode" placeholder="+60" style="border: none;"> -->
                                                        <select id="dialingArea" class="form-control beforeLoginForm" style="border: none; max-width: 90px;"></select>
                                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm col ml-1" id="phoneNo" placeholder="<?php echo $translations['M02436'][$language]; //Enter Your Phone Number ?>" style="border: none;">
                                                    </div>
                                                    <span id="phoneError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M01058"><span class="text-danger">* </span><?php echo $translations['M01058'][$language]; //Date of Birth ?></span>
                                                    </label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control beforeLoginForm" id="dateOfBirth" placeholder="<?php echo $translations['M03146'][$language]; //Select your date of birth ?>">
                                                        <i class="far fa-calendar-alt calIco active" onclick="$('#dateOfBirth').focus();"></i>
                                                        <span id="dateOfBirthError" class="customError text-danger" error="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 m-b-rem1"></div>
                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03147"><span class="text-danger">* </span><?php echo $translations['M03147'][$language]; //Gender ?></span>
                                                    </label>
                                                    <select id="gender" class="form-control beforeLoginForm">
                                                        <option value="" data-lang="M03148"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                        <option value="male" data-lang="M03148"><?php echo $translations['M03148'][$language]; //Male ?></option>
                                                        <option value="female" data-lang="M03149"><?php echo $translations['M03149'][$language]; //Female ?></option>
                                                    </select>
                                                    <span id="genderError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03150"><span class="text-danger">* </span><?php echo $translations['M03150'][$language]; //Password ?></span>
                                                    </label>
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control beforeLoginForm" id="password" placeholder="<?php echo $translations['M02439'][$language]; //Enter Your Password ?>">
                                                        <i class="far fa-eye-slash eyeIco active"></i>
                                                        <span id="passwordError" class="customError text-danger" error="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00191"><span class="text-danger">* </span><?php echo $translations['M00191'][$language]; //Retype Password ?></span>
                                                    </label>
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control beforeLoginForm" id="checkPassword" placeholder="<?php echo $translations['M03151'][$language]; //Confirm your password ?>">
                                                        <i class="far fa-eye-slash eyeIco1 active"></i>
                                                        <span id="checkPasswordError" class="customError text-danger" error="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M01651"><span class="text-danger">* </span><?php echo $translations['M01651'][$language]; //Sponsor Username ?></span>
                                                    </label>
                                                      <?php if($_GET['qr']){ ?>
                                                        <input type="text" class="form-control beforeLoginForm" id="sponsorUsername" disabled value="<?php echo $_GET['qr'] ?>">
                                                      <?php }else{ ?>
                                                        <input type="text" class="form-control beforeLoginForm" id="sponsorUsername" placeholder="<?php echo $translations['M02441'][$language]; //Enter your Sponsor Username ?>">
                                                      <?php } ?>
                                                    <span id="sponsorUsernameError" class="customError text-danger" error="error"></span>
                                                </div>
                                                <div class="col-md-12 m-b-rem3">
                                                    <h2>
                                                        Address
                                                    </h2>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M02466"><span class="text-danger">* </span><?php echo $translations['M02466'][$language]; //Address ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="address" placeholder="<?php echo $translations['M03152'][$language]; //Enter your address ?>">
                                                    <span id="addressError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00178"><span class="text-danger">* </span><?php echo $translations['M00178'][$language]; //Country ?></span>
                                                    </label>
                                                    <select id="countryID" class="form-control beforeLoginForm">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="countryIDError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel" >
                                                        <span class="labelTitle"data-lang="M00181"><span class="text-danger">* </span><?php echo $translations['M00181'][$language]; //Province ?></span>
                                                    </label>
                                                    <select id="state" class="form-control beforeLoginForm">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="stateError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00676"><span class="text-danger">* </span><?php echo $translations['M00676'][$language]; //City ?></span>
                                                    </label>
                                                    <select id="city" class="form-control beforeLoginForm" disabled="">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="cityError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03497"><span class="text-danger">* </span> <?php echo $translations['M03497'][$language]; //District ?> </span>
                                                    </label>
                                                    <select id="district" class="form-control beforeLoginForm" disabled="">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="districtError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03155"><span class="text-danger">* </span><?php echo $translations['M03155'][$language]; //Sub-District ?></span>
                                                    </label>
                                                    <select id="subDistrict" class="form-control beforeLoginForm" disabled="">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="subDistrictError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03158"><span class="text-danger">* </span><?php echo $translations['M03158'][$language]; //Zip Code ?></span>
                                                    </label>
                                                    <select id="postalCode" class="form-control beforeLoginForm" disabled="">
                                                        <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                                    </select>
                                                    <span id="postalCodeError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-12 m-b-rem3">
                                                    <input type="checkbox" id="addressType" name="addressType">
                                                    <label for="addressType" class="formLabel" data-lang="M03162">
                                                        <?php echo $translations['M03162'][$language]; //Use this address as my delivery address ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-12 m-b-rem3">
                                                    <h2>
                                                        Bank Information
                                                    </h2>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03163"><span class="text-danger">* </span><?php echo $translations['M03163'][$language]; //Bank Name ?></span>
                                                    </label>
                                                    <!-- <input type="text" class="form-control beforeLoginForm" id="bankName" placeholder="Enter your bank name"> -->
                                                    <select id="bankType" class="form-control beforeLoginForm">
                                                        <option value="">
                                                            <?php echo $translations['M03442'][$language]; //Select Bank ?>
                                                        </option>
                                                    </select>
                                                    <span id="bankTypeError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03164"><span class="text-danger">* </span><?php echo $translations['M03164'][$language]; //Bank Branch ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="branch" placeholder="<?php echo $translations['M03165'][$language]; //Enter your bank branch ?>">
                                                    <span id="branchError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03166"><span class="text-danger">* </span><?php echo $translations['M03166'][$language]; //Bank City ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="bankCity" placeholder="<?php echo $translations['M03167'][$language]; //Enter your bank city ?>">
                                                    <span id="bankCityError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03168"><span class="text-danger">* </span><?php echo $translations['M03168'][$language]; //Account Holder's Name ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="accountHolder" placeholder="<?php echo $translations['M03169'][$language]; //Enter your bank account holder's name ?>">
                                                    <span id="accountHolderError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M02913"><span class="text-danger">* </span><?php echo $translations['M02913'][$language]; //Bank Account Number ?></span>
                                                    </label>
                                                    <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm" id="accountNo" placeholder="<?php echo $translations['M03170'][$language]; //Enter your bank account number ?>">
                                                    <span id="accountNoError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-12 m-b-rem3">
                                                    <h2>
                                                        Additional Information
                                                    </h2>
                                                </div>
                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M00327"><span class="text-danger">* </span><?php echo $translations['M00327'][$language]; //Status ?></span>
                                                    </label>
                                                    <select id="martialStatus" class="form-control beforeLoginForm">
                                                        <option><?php echo $translations['M03443'][$language]; //Select Status ?></option>
                                                        <option value="single" data-lang="M03171"><?php echo $translations['M03171'][$language]; //Single ?></option>
                                                        <option value="married" data-lang="M03172"><?php echo $translations['M03172'][$language]; //Married ?></option>
                                                        <option value="widowed" data-lang="M03173"><?php echo $translations['M03173'][$language]; //Widowed ?></option>
                                                        <option value="divorced" data-lang="M03174"><?php echo $translations['M03174'][$language]; //Divorced ?></option>
                                                        <option value="separated" data-lang="M03175"><?php echo $translations['M03175'][$language]; //Separated ?></option>
                                                    </select>
                                                    <span id="martialStatusError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="03176"><span class="text-danger">* </span><?php echo $translations['M03176'][$language]; //Numbers of Child ?></span>
                                                    </label>
                                                    <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm" id="childNumber" placeholder="<?php echo $translations['M03177'][$language]; //Enter your numbers of child ?>">
                                                    <span id="childNumberError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03474"><span class="text-danger">* </span><?php echo $translations['M03474'][$language]; //Child Age ?></span>
                                                    </label>
                                                    <select id="childAge" class="form-control beforeLoginForm" disabled>
                                                        <option value=""><?php echo $translations['M03475'][$language]; //--- Select Age --- ?></option>
                                                    </select>
                                                    <span id="childAgeError" class="customError text-danger" error="error"></span>
                                                    <div id="childAgeList" class="row" style="margin-top: 20px; display: none;"></div>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03180"><span class="text-danger">* </span><?php echo $translations['M03180'][$language]; //ID Type ?></span>
                                                    </label>
                                                    <!-- <input type="text" class="form-control beforeLoginForm" id="IDType" placeholder="Enter your ID Type"> -->
                                                    <select id="identityType" class="form-control beforeLoginForm">
                                                        <option value="nric" data-lang="M03181"><?php echo $translations['M03181'][$language]; //KTP ?></option>
                                                        <option value="passport" data-lang="M03182"><?php echo $translations['M03182'][$language]; //Passport ?></option>
                                                    </select>
                                                    <span id="identityTypeError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div id="identityNumberDiv" class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03183"><span class="text-danger">* </span><?php echo $translations['M03183'][$language]; //ID Number (KTP) ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="identityNumber" placeholder="<?php echo $translations['M03184'][$language]; //Enter your KTP ID Number ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <span id="identityNumberError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div id="passportNumberDiv" class="col-md-6 m-b-rem3" style="display: none;">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03185"><span class="text-danger">* </span><?php echo $translations['M03185'][$language]; //Passport Number ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="passportNumber" placeholder="<?php echo $translations['M03186'][$language]; //Enter your passport number ?>">
                                                    <span id="passportNumberError" class="customError text-danger" error="error"></span>
                                                </div>

                                                <div class="col-md-6 m-b-rem3">
                                                    <label class="formLabel">
                                                        <span class="labelTitle" data-lang="M03178"><?php echo $translations['M03178'][$language]; //NPWP Number ?></span>
                                                    </label>
                                                    <input type="text" class="form-control beforeLoginForm" id="taxNumber" placeholder="<?php echo $translations['M03179'][$language]; //Enter your NPWP Number ?>">
                                                    <span id="taxNumberError" class="customError text-danger" error="error"></span>
                                                </div>
                                            </form>
                                            <div class="col-xs-12 col-sm-12">
                                                <button id="nextBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00205'][$language]; /* Next */ ?>
                                                </button>
                                                <!-- <button id="resetBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div>

    </div>

    <div class="modal fade in" id="confirmationDetails" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content-wrapper">
                <div class="modal-content" style="overflow-y:scroll;max-height: 85vh">
                    <div class="modal-header clearfix text-left">
                        <button id="closeModalBtn" type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5>
                            Confirmation
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive" style="border: none;">
                            <table class="table">
                        <tbody>
                            <tr>
                                <td data-lang="M00177"><?php echo $translations['M00177'][$language]; //Full Name ?></td>
                                <td>:</td>
                                <td id="nameDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M00187"><?php echo $translations['M00187'][$language]; //Email Addresss ?></td>
                                <td>:</td>
                                <td id="emailDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03145"><?php echo $translations['M03145'][$language]; //Phone Number ?></td>
                                <td>:</td>
                                <td id="phoneDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M01058"><?php echo $translations['M01058'][$language]; //Date of Birth ?></td>
                                <td>:</td>
                                <td id="dateOfBirthDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03147"><?php echo $translations['M03147'][$language]; //Gender ?></td>
                                <td>:</td>
                                <td id="genderDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M01651"><?php echo $translations['M01651'][$language]; //Sponsor Username ?></td>
                                <td>:</td>
                                <td id="sponsorUsernameDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M02466"><?php echo $translations['M02466'][$language]; //Address ?></td>
                                <td>:</td>
                                <td id="addressDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03153"><?php echo $translations['M03153'][$language]; //Street Name ?></td>
                                <td>:</td>
                                <td id="streetNameDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03155"><?php echo $translations['M03155'][$language]; //Sub-District ?></td>
                                <td>:</td>
                                <td id="subDistrictDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></td>
                                <td>:</td>
                                <td id="cityDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03158"><?php echo $translations['M03158'][$language]; //Postal Code ?></td>
                                <td>:</td>
                                <td id="postalCodeDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M00180"><?php echo $translations['M00180'][$language]; //State ?></td>
                                <td>:</td>
                                <td id="stateDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M00178"><?php echo $translations['M00178'][$language]; //Country ?></td>
                                <td>:</td>
                                <td id="countryDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03163"><?php echo $translations['M03163'][$language]; //Bank Name ?></td>
                                <td>:</td>
                                <td id="bankTypeDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03164"><?php echo $translations['M03164'][$language]; //Bank Branch ?></td>
                                <td>:</td>
                                <td id="branchDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03166"><?php echo $translations['M03166'][$language]; //Bank City ?></td>
                                <td>:</td>
                                <td id="bankCityDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03168"><?php echo $translations['M03168'][$language]; //Account Holder's Name ?></td>
                                <td>:</td>
                                <td id="accountHolderDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></td>
                                <td>:</td>
                                <td id="accountNoDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M00327"><?php echo $translations['M00327'][$language]; //Status ?></td>
                                <td>:</td>
                                <td id="martialStatusDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03176"><?php echo $translations['M03176'][$language]; //Numbers of Child ?></td>
                                <td>:</td>
                                <td id="childNumberDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03176"><?php echo $translations['M03474'][$language]; //Child Age ?></td>
                                <td>:</td>
                                <td id="childAgeDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03178"><?php echo $translations['M03178'][$language]; //NPWP Number ?></td>
                                <td>:</td>
                                <td id="taxNumberDisplay"></td>
                            </tr>
                            <tr>
                                <td data-lang="M03180"><?php echo $translations['M03180'][$language]; //ID Type ?></td>
                                <td>:</td>
                                <td id="identityTypeDisplay"></td>
                            </tr>
                            <tr id="identityNumberDisplayRow">
                                <td data-lang="M03183"><?php echo $translations['M03183'][$language]; //ID Number (KTP) ?></td>
                                <td>:</td>
                                <td id="identityNumberDisplay"></td>
                            </tr>
                            <tr id="passportNumberDisplayRow">
                                <td data-lang="M03185"><?php echo $translations['M03185'][$language]; //Passport Number ?></td>
                                <td>:</td>
                                <td id="passportNumberDisplay"></td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" onclick="confirmRegister();">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    
    var url             = 'scripts/reqClient.php';
    var jsonUrl         = 'json/addressList.json';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var position        = "";
    var codeNum         = "";
    var type            = "<?php echo $_GET['type']; ?>";
    var fullName;
    var username;
    var country;
    var identityNumber;
    var dialingArea;
    var phone;
    var password;
    var checkPassword;
    var tPassword;
    var checkTPassword;
    var dateOfBirth;
    var sponsorName;
    var placementUsername;
    var placementPosition;

    
    
    $(document).ready(function() {
        $("#closeModalBtn").click(function(){
            $("#confirmationDetails").hide();
        });


        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadDefaultListing;
        ajaxSend('scripts/reqAdmin.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // registerType(type);

        $('#dialingArea').change(function() {
            var country = $('#dialingArea option:selected').attr('name');
            $(`#countryID option[name="${country}"]`).prop('selected', true);

            countryChanged();
        })

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
                    <div class="col-xs-5 ageTag" name="${selected}">${text} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
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

        $(document).on('click',function(event){
            if(!$(event.target).closest('.modal-dialog').length && !$(event.target).is('.modal-dialog')) {
                $("#confirmationDetails").hide();
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

        $('#nextBtn').click(function() {
            nextSection(4);
        });

        $('#submitBtn').click(function() {
            confirmRegister();
        });
    });

    

    
    function SortByName(a, b){
        var aName = a.name.toLowerCase();
        var bName = b.name.toLowerCase(); 
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
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

    [].forEach.call(document.querySelectorAll('#dialingArea'), function(s) {
        s.addEventListener('focus', focus);
        s.addEventListener('blur', blur);
        blur.call(s);
    });

    $('#dialingArea').change(function() {
        $('#dialingArea').blur();
    });

    function loadDefaultListing(data,message){
        childAgeOption = data.childAgeOption;
        bankList = data.bankDetails;

        if(childAgeOption) {
            $.each(childAgeOption, function(k, v) {
                $('#childAge').append(`<option value="${k}">${v['display']}`);
            });
        }

        $.getJSON(jsonUrl, function( jsonData ) {

            saveJsonData = jsonData;

            // console.log(jsonData);
            // countriesList = jsonData.countriesList;
            // countriesList.sort(SortByName);
            // districtList = jsonData.countyList;
            // districtList.sort(SortByName);
            // subDistrictList = jsonData.subCountyList;
            // subDistrictList.sort(SortByName);
            // postalCodeList = jsonData.postalCodeList;
            // cityList = jsonData.cityList;
            // cityList.sort(SortByName);
            // stateList = jsonData.stateList;
            // stateList.sort(SortByName);
            var firstCountry = saveJsonData['countriesList'][0]['id'];

            if(saveJsonData['countriesList']) {
                $.each(saveJsonData['countriesList'], function(k,v) {
                    var selected = '';

                    var countryDisplay = '';
                    countryDisplay = v['display'];

                    $('#countryID').append('<option value="'+v['id']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" '+selected+'>'+countryDisplay+'</option>');
                    $('#dialingArea').append('<option value="'+v['countryCode']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" display="'+countryDisplay+'" '+selected+'>+'+v['countryCode']+'</option>');

                    $('#countryID option[value=100]').attr('selected','selected');

                });

                // if (country) {
                //     $('#country').val(country);
                // }
                
                // var phoneCode = $('#country option:selected').attr('data-code');
                // $('#phoneCode').text(phoneCode);
            }

            // filter state based on country selected then build option
            var countryID = $("#countryID").val();
            filterData("state", countryID, "country_id", "stateList", "id", "stateDisplay");


            // filter city based on state selected then build option
            var stateID = $("#state").val();
            filterData("city", stateID, "state_id", "cityList", "id", "cityDisplay");

            // filter district based on state selected then build option
            var cityID = $("#city").val();
            filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

            // filter sub district based on state selected then build option
            var countyID = $("#district").val();
            filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

            // filter zipcode based on state selected then build option
            var subCountyID = $("#subDistrict").val();
            filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

            $('#countryID').change(function(){
                var countryID = $("#countryID").val();
                filterData("state", countryID, "country_id", "stateList", "id", "stateDisplay");

                var stateID = $("#state").val();
                filterData("city", stateID, "state_id", "cityList", "id", "cityDisplay");

                var cityID = $("#city").val();
                filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

                var countyID = $("#district").val();
                filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                var subCountyID = $("#subDistrict").val();
                filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

                $('#state').prop("disabled",true);
                $('#city').prop("disabled",true);
                $('#district').prop("disabled",true);
                $('#subDistrict').prop("disabled",true);
                $('#postalCode').prop("disabled",true);

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
            });

            $("#state").change(function(){
                var stateID = $(this).val();
                filterData("city", stateID, "state_id", "cityList", "id", "cityDisplay");

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

                var stateDDL = $('#state option:selected').val();
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

            if(bankList) {
                $.each(bankList, function(key) {
                    var selected = '';
                    if(bankList[key][0]['country_id']==firstCountry) {
                        $.each(bankList[key], function(k) {
                            $('#bankType').append('<option value="'+bankList[key][k]['id']+'" data-code="'+bankList[key][k]['country_id']+'" name="'+bankList[key][k]['name']+'" '+selected+'>'+bankList[key][k]['display']+'</option>');
                        });
                    }
                });
            }
        });
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

    $('.eyeIco').click(function() {    
        if($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');

            $('#password').attr('type','text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');

            $('#password').attr('type','password');
        }
    });

    $('.eyeIco1').click(function() {    
        if($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');

            $('#checkPassword').attr('type','text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');

            $('#checkPassword').attr('type','password');
        }
    });

    function nextSection(selectedIndex) {
        $('.invalid-feedback').remove();
        $('span.customError').html('');
        $('div').removeClass('is-invalid');
        $('select').removeClass('is-invalid');
        $('input').removeClass('is-invalid');

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
        var addressType = ($('#addressType').is(':checked'))?'delivery':'billing';
        var bankID = $('#bankType option:selected').val();
        var branch = $('#branch').val();
        var bankCity = $('#bankCity').val();
        var accountHolder = $('#accountHolder').val();
        var accountNo = $('#accountNo').val();
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
            command         : 'memberRegistration',
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
            address         : address,
            // streetName      : streetName,
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
            childAge        : childAge,
            taxNumber       : taxNumber,
            identityType    : identityType
        }
        identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;

        var fCallback = completeSection;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function completeSection(data, message) {
        if(data) {
            var state = '';
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
            });
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
                    var text = childAgeOption[v];
                    if(k == 0) {
                        childAge += `${text} <?php echo $translations['M03476'][$language]; //years old ?>`;
                    } else {
                        childAge += `, ${text} <?php echo $translations['M03476'][$language]; //years old ?>`;
                    }
                });
            }
            $('#confirmationDetails').show();
            $('#confirmationDetails').css({"background":"rgba(0,0,0,0.5)"});

            $('#nameDisplay').text(data.fullName);
            // $('#usernameDisplay').text(data.username);
            $('#emailDisplay').text(data.email);
            $('#phoneDisplay').text(`+${data.dialingArea}${data.phone}`);
            $('#dateOfBirthDisplay').text(data.dateOfBirth);
            $('#genderDisplay').text(data.gender);
            $('#sponsorUsernameDisplay').text(data.sponsorName);

            $('#addressDisplay').text(data.address);
            $('#streetNameDisplay').text(data.streetName);
            $('#subDistrictDisplay').text(data.subDistrict);
            $('#cityDisplay').text(data.city);
            $('#postalCodeDisplay').text(data.postalCode);
            $('#stateDisplay').text(state);
            $('#countryDisplay').text(country);
            $('#remarksDisplay').text(remarks);
            // $('#addressTypeDisplay').text(data.addressType+" address");

            $('#bankTypeDisplay').text(bank);
            $('#branchDisplay').text(data.branch);
            $('#bankCityDisplay').text(data.bankCity);
            $('#accountHolderDisplay').text(data.accountHolder);
            $('#accountNoDisplay').text(data.accountNo);

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
        }
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

        // Step 2
        var address = $('#address').val();
        var streetName = $('#streetName').val();
        var subDistrict = $('#subDistrict').val();
        var city = $('#city').val();
        var postalCode = $('#postalCode').val();
        var state = $('#state option:selected').val();
        var country = $('#countryID option:selected').val();
        var remarks = $('#remarks').val() || "";

        // Step 3
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

        var formData = {
            command         : 'memberRegistrationConfirmation',
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
            address         : address,
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
            childAge        : childAge,
            taxNumber       : taxNumber,
            identityType    : identityType
        };
        identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passportNumber;

        var fCallback = completeRegistration;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function completeRegistration(data, message) {
        $('#confirmationDetails').hide();
        showMessage(message,'success','<?php echo $translations['M03136'][$language]; //Register An Account ?>','','memberRegistration.php');
    }


</script>
</body>
</html>
