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

<input type="hidden" name="" class="hideFunction">
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading" style="background-color: #f8f8f8">
    <div class="modal fade" id="canvasMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="canvasTitle" class="modal-title"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modalLine"></div>
                <div class="modal-body modalBodyFont">
                    <div id="canvasAlertMessage"></div>
                </div>
                <div class="modal-footer">
                     <button id="canvasCloseBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>

                </div>
            </div>
        </div>
    </div>

    <section class="registerPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row justify-content-center loginBlock register">
                    <div class="col-xl-7 col-lg-10 col-11" style="margin: 80px auto">
                        <div class="row cardWrapper">
                            <div class="col-6 logoBlock text-left">
                                <img src="./images/project/companyLogo2.png" alt="Logo" style="height: 90px;">
                                <!-- <img src="<?php echo $config['logoURL']; ?>" style="height: 80px;"> -->
                            </div>
                            <div class="col-6 mb-2 mt-2 text-right">
                                <div class="btn-group">
                                    <div class="d-inline-block dropdown-toggle languageFontRegister beforeLoginForm px-3 py-2 my-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                        <?php echo $config["languages"][$language]['displayName'] ?>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right dropdown_language">
                                        <?php $languageArr = $config["languages"]; 
                                            foreach($languageArr as $key => $value) {
                                        ?>
                                            <a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4 mb-5">
                                <h2 class="d-block my-0 loginTitle" data-lang="M03106">
                                    <?php echo $translations['M03136'][$language]; //Register An Account ?>
                                </h2>
                            </div>

                            <div class="col-12 mt-3 mt-md-0 mb-lg-5">
                                <ul class="col-12 progressBarDesc">
                                    <li style="z-index: 4;" class="active"><span data-lang="M03137"><?php echo $translations['M03137'][$language]; //Personal Information ?></span></li>
                                    <li style="z-index: 3;"><span data-lang="M03138"><?php echo $translations['M03138'][$language]; //Billing Address & Delivery Address ?></span></li>
                                    <li style="z-index: 2;"><span data-lang="M03139"><?php echo $translations['M03139'][$language]; //Bank Info ?><br><span>(<?php echo $translations['M03256'][$language]; //Optional ?>)</span></span></li>
                                    <li style="z-index: 1;"><span data-lang="M03140"><?php echo $translations['M03140'][$language]; //Additional Info ?></span></li>
                                    <li style="z-index: 0;"><span data-lang="M03141"><?php echo $translations['M03141'][$language]; //Review Form ?></span></li>
                                </ul>
                            </div>

                            <div id="registerSection01" class="col-12">
                                <div class="mb-3 d-lg-none" style="color: #000;"><?php echo $translations['M03137'][$language]; //Personal Information ?></div>
                                <div class="row align-items-md-baseline">
                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00177"><span class="text-danger">* </span><?php echo $translations['M00177'][$language]; //Full Name ?></span> (<?php echo $translations['M03142'][$language]; //Information entered must be exact as per IC ?>)
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="name" placeholder="<?php echo $translations['M02434'][$language]; //Enter your full name ?>">
                                        <span id="nameError" class="customError text-danger" error="error"></span>
                                    </div>
                                    
                                    <!-- <div class="col-md-6 mt-4 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00104"><?php echo $translations['M00104'][$language]; //Username ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="username" placeholder="<?php echo $translations['M03143'][$language]; //Enter your preferred username ?>">
                                        <span id="usernameError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00187"><span class="text-danger">* </span><?php echo $translations['M00187'][$language]; //Email Addresss ?></span>
                                            <!-- <small> | <?php echo $translations['M02154'][$language]; /* Register code will be sent to this email except China */ ?></small> -->
                                        </label>
                                        <input type="email" class="form-control beforeLoginForm" id="email" placeholder="<?php echo $translations['M03144'][$language]; //Enter your email address ?>">
                                        <span id="emailError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03145"><span class="text-danger">* </span><?php echo $translations['M03145'][$language]; //Phone Number ?></span>
                                            <!-- <small> | <?php echo $translations['M02155'][$language]; /* Register code will be sent to this number ONLY China */ ?></small> -->
                                        </label>
                                        <div id="phone" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0;">
                                            <!-- <input class="form-control col-3" id="phoneCode" placeholder="+60" style="border: none;"> -->
                                            <select id="dialingArea" class="form-control beforeLoginForm my-0" style="border: none; max-width: 90px;"></select>
                                            <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm col ml-1 my-0" id="phoneNo" placeholder="<?php echo $translations['M02436'][$language]; //Enter Your Phone Number ?>" style="border: none;">
                                        </div>
                                        <span id="phoneError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['B00252'][$language]; //Identity Number ?>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="identityNumber" placeholder="<?php echo $translations['B00252'][$language]; //Identity Number ?>">
                                        <span id="identityNumberError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M01058"><span class="text-danger">* </span><?php echo $translations['M01058'][$language]; //Date of Birth ?></span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control beforeLoginForm" id="dateOfBirth" placeholder="<?php echo $translations['M03146'][$language]; //Select your date of birth ?>">
                                            <i class="far fa-calendar-alt calIco active" onclick="$('#dateOfBirth').focus();"></i>
                                            <span id="dateOfBirthError" class="customError text-danger" error="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
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

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['M00037'][$language]; //Country ?>
                                        </label>
                                        <select id="country" class="form-control beforeLoginForm">
                                            <option value=""><?php echo $translations['M00179'][$language]; ?></option>
                                        </select>
                                        <span id="countryError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03150"><span class="text-danger">* </span><?php echo $translations['M03150'][$language]; //Password ?></span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control beforeLoginForm" id="password" placeholder="<?php echo $translations['M02439'][$language]; //Enter Your Password ?>">
                                            <i class="far fa-eye-slash eyeIco active"></i>
                                            <span id="passwordError" class="customError text-danger" error="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00191"><span class="text-danger">* </span><?php echo $translations['M00191'][$language]; //Retype Password ?></span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control beforeLoginForm" id="checkPassword" placeholder="<?php echo $translations['M03151'][$language]; //Confirm your password ?>">
                                            <i class="far fa-eye-slash eyeIco1 active"></i>
                                            <span id="checkPasswordError" class="customError text-danger" error="error"></span>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['M00042'][$language]; //Transaction Password ?>
                                        </label>
                                        <input type="password" class="form-control beforeLoginForm" id="tPassword" placeholder="<?php echo $translations['M00042'][$language]; //Transaction Password ?>">
                                        <span id="tPasswordError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>
                                        </label>
                                        <input type="password" class="form-control beforeLoginForm" id="checkTPassword" placeholder="<?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>">
                                        <span id="checkTPasswordError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M01651"><span class="text-danger">* </span><?php echo $translations['M01651'][$language]; //Sponsor Username ?></span>
                                        </label>
                                          <?php if($_GET['qr']){ ?>
                                            <input type="text" class="form-control beforeLoginForm" id="sponsorUsername" disabled value="<?php echo $_GET['qr'] ?>">
                                          <?php }else{ ?>
                                            <input type="text" class="form-control beforeLoginForm" id="sponsorUsername" placeholder="<?php echo $translations['M02441'][$language]; //Enter your Sponsor Username ?>" onkeyup="updateMemberName()">
                                          <?php } ?>
                                        <span id="sponsorUsernameError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M02933"><?php echo $translations['M02933'][$language]; //Sponsor Username ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="sponsorName" disabled>
                                        <span id="sponsorUsernameError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00195"><?php echo $translations['M00195'][$language]; //Placement  Username ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="placementUsername">
                                        <span id="placementUsernameError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00197"><?php echo $translations['M00197'][$language]; //Placement Position ?></span>
                                        </label>
                                        <div class="kt-radio-inline loginRadio row mt-4">
                                            <label for="leftCheckbox" class="col-md-6 col-12 otpCheckbox">
                                                <label class="kt-radio bankRadio mt_x" data-lang="M00198">
                                                    <input type="radio" name="leftRightPosition" value="1" id="leftCheckbox" checked>
                                                    <label class="formLabel beforeLogin boldTxt"><?php echo $translations['M00198'][$language]; //Left ?></label>
                                                    <span></span>
                                                </label>
                                            </label>
                                            <label class="col-md-6 col-12 otpCheckbox" for="rightCheckbox" >
                                                <label class="kt-radio walletRadio mt_x" data-lang="M00200">
                                                    <input type="radio" name="leftRightPosition" value="2" id="rightCheckbox">
                                                    <label class="formLabel beforeLogin boldTxt"><?php echo $translations['M00200'][$language]; //Right ?></label>
                                                    <span></span>
                                                </label>
                                            </label>
                                        </div>
                                        <span id="placementPositionError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4"></div>

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
                                        <label class="formLabel"><?php echo $translations['M00196'][$language]; //Placement Username ?></label>
                                        <input id="placementUsername" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00196'][$language]; //Placement Username ?>">
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
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
                                    </div> -->
                                    <!-- <div id="loginError" class="col-12" style="color: #ff2222;"></div> -->

                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6">
                                                <button id="nextBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" onclick="nextSection(1)" data-lang="M00155"><?php echo $translations['M00155'][$language]; //Next ?></button>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="cancelBtn" class="btn btn-default loginBtn cancelBtn w-100 letterSpace" data-lang="M00278"><?php echo $translations['M00278'][$language]; //Cancel ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 py-4">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6 <?php if($fromQR){echo 'hide';} ?>">
                                                <a class="text-center btn loginBtn back d-block w-100" href="login.php">
                                                    <?php echo $translations['M00163'][$language]; //BACK ?>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="signUpBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div id="registerSection02" class="col-12" style="display: none;">
                                <div class="mb-3 d-lg-none" style="color: #000;"><?php echo $translations['M03138'][$language]; //Billing Address & Delivery Address ?></div>
                                <div  class="row align-items-baseline">
                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M02466"><span class="text-danger">* </span><?php echo $translations['M02466'][$language]; //Address ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="address" placeholder="<?php echo $translations['M03152'][$language]; //Enter your address ?>">
                                        <span id="addressError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00178"><span class="text-danger">* </span><?php echo $translations['M00178'][$language]; //Country ?></span>
                                        </label>
                                        <select id="countryID" class="form-control beforeLoginForm">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="countryIDError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel" >
                                            <span class="labelTitle"data-lang="M00181"><span class="text-danger">* </span><?php echo $translations['M00181'][$language]; //Province ?></span>
                                        </label>
                                        <select id="state" class="form-control beforeLoginForm">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="stateError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M00676"><span class="text-danger">* </span><?php echo $translations['M00676'][$language]; //City ?></span>
                                        </label>
                                        <select id="city" class="form-control beforeLoginForm" disabled="">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="cityError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03153"><span class="text-danger">* </span><?php echo $translations['M03153'][$language]; //Street Name ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="streetName" placeholder="<?php echo $translations['M03154'][$language]; //Enter your street name ?>">
                                        <span id="streetNameError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03497"><span class="text-danger">* </span> <?php echo $translations['M03497'][$language]; //District ?> </span>
                                        </label>
                                        <select id="district" class="form-control beforeLoginForm" disabled="">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="districtError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03155"><span class="text-danger">* </span><?php echo $translations['M03155'][$language]; //Sub-District ?></span>
                                        </label>
                                        <select id="subDistrict" class="form-control beforeLoginForm" disabled="">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="subDistrictError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03158"><span class="text-danger">* </span><?php echo $translations['M03158'][$language]; //Zip Code ?></span>
                                        </label>
                                        <select id="postalCode" class="form-control beforeLoginForm" disabled="">
                                            <option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
                                        </select>
                                        <span id="postalCodeError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03158"><span class="text-danger">* </span><?php echo $translations['M03158'][$language]; //Postal Code ?></span>
                                        </label>
                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/[0-9]{0,5}/);" type="text" class="form-control beforeLoginForm" id="postalCode" placeholder="<?php echo $translations['M03159'][$language]; //Enter your postal code ?>">
                                        <span id="postalCodeError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['B00252'][$language]; //Identity Number ?>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="identityNumber" placeholder="<?php echo $translations['B00252'][$language]; //Identity Number ?>">
                                        <span id="identityNumberError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel" >
                                            <span class="labelTitle"data-lang="M00180"><span class="text-danger">* </span><?php echo $translations['M00180'][$language]; //State ?></span>
                                        </label>
                                        <select id="state" class="form-control beforeLoginForm">
                                            <option><?php echo $translations['M03427'][$language]; //Select State ?></option>
                                        </select>
                                        <span id="stateError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03160"><?php echo $translations['M03160'][$language]; //Remarks ?></span>
                                        </label>
                                        <textarea type="text" class="form-control beforeLoginForm" id="remarks" placeholder="<?php echo $translations['M03161'][$language]; //Enter remarks ?>" style="min-height: 100px;"></textarea>
                                        <span id="remarksError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <div class="col-md-12 mb-4">
                                        <input type="checkbox" id="addressType" name="addressType">
                                        <label for="addressType" class="formLabel" data-lang="M03162">
                                            <?php echo $translations['M03162'][$language]; //Use this address as my delivery address ?>
                                        </label>
                                    </div>

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['M00042'][$language]; //Transaction Password ?>
                                        </label>
                                        <input type="password" class="form-control beforeLoginForm" id="tPassword" placeholder="<?php echo $translations['M00042'][$language]; //Transaction Password ?>">
                                        <span id="tPasswordError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4">
                                        <label class="formLabel">
                                            <?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>
                                        </label>
                                        <input type="password" class="form-control beforeLoginForm" id="checkTPassword" placeholder="<?php echo $translations['M00043'][$language]; //Retype Transaction Password ?>">
                                        <span id="checkTPasswordError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
                                        <label class="formLabel"><?php echo $translations['M00196'][$language]; //Placement Username ?></label>
                                        <input id="placementUsername" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00196'][$language]; //Placement Username ?>">
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
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
                                    </div> -->
                                    <!-- <div id="loginError" class="col-12" style="color: #ff2222;"></div> -->

                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6">
                                                <button id="nextBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" onclick="nextSection(2)" data-lang="M00155"><?php echo $translations['M00155'][$language]; //Next ?></button>
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <button id="backBtn" class="btn btn-default w-100 letterSpace" onclick="goToSection(1)" data-lang="M00278"><?php echo $translations['M00218'][$language]; //Back ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 py-4">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6 <?php if($fromQR){echo 'hide';} ?>">
                                                <a class="text-center btn loginBtn back d-block w-100" href="login.php">
                                                    <?php echo $translations['M00163'][$language]; //BACK ?>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="signUpBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div id="registerSection03" style="display: none;">
                                <div class="mb-3 d-lg-none" style="color: #000;"><?php echo $translations['M03139'][$language]; //Bank Info ?></div>
                                <!-- <div class="col-md-6 col-12 mb-4">
                                    <div class="row">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03605"><span class="text-danger">* </span><?php echo $translations['M03605'][$language]; //Bank Option ?></span>
                                        </label>
                                        <div class="ml-5">
                                            <label>
                                                <input type="radio" id="addBank" name="bankOption" value="1"  class="bankOption" checked>
                                                <span for='addBank'><?php echo $translations['M02697'][$language]; //Add ?></span>
                                            </label>
                                            <label class="ml-3">
                                                <input type="radio" id="skipBank" name="bankOption" value="0"  class="bankOption">
                                                <span for='skipBank'><?php echo $translations['M02141'][$language]; //Skip ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row align-items-baseline">                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03163"><?php echo $translations['M03163'][$language]; //Bank Name ?></span>
                                        </label>
                                        <!-- <input type="text" class="form-control beforeLoginForm" id="bankName" placeholder="Enter your bank name"> -->
                                        <select id="bankType" class="form-control beforeLoginForm bankField">
                                            <option value="">
                                                <?php echo $translations['M03442'][$language]; //Select Bank ?>
                                            </option>
                                        </select>
                                        <span id="bankTypeError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03164"><?php echo $translations['M03164'][$language]; //Bank Branch ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm bankField" id="branch" placeholder="<?php echo $translations['M03165'][$language]; //Enter your bank branch ?>">
                                        <span id="branchError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03166"><?php echo $translations['M03166'][$language]; //Bank City ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm bankField" id="bankCity" placeholder="<?php echo $translations['M03167'][$language]; //Enter your bank city ?>">
                                        <span id="bankCityError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03168"><?php echo $translations['M03168'][$language]; //Account Holder's Name ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm bankField" id="accountHolder" placeholder="<?php echo $translations['M03169'][$language]; //Enter your bank account holder's name ?>">
                                        <span id="accountHolderError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></span>
                                        </label>
                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm bankField" id="accountNo" placeholder="<?php echo $translations['M03170'][$language]; //Enter your bank account number ?>">
                                        <span id="accountNoError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4"></div>

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle">Bank Account Front Page</span>
                                        </label>
                                        <div id="bankAccFrontPage" class="col-md-12 beforeLoginForm flexUploadDiv">
                                            <input type="hidden" id="bankAccFrontPageData">
                                            <input type="hidden" id="bankAccFrontPageName">
                                            <input type="hidden" id="bankAccFrontPageSize">
                                            <input type="hidden" id="bankAccFrontPageType">
                                            <input type="hidden" id="bankAccFrontPageFlag">
                                            <input type="file" id="bankAccFrontPageUpload" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('bankAccFrontPage', this)">
                                            <button class="uploadBtn" id="uploadBtn" onclick="$('#bankAccFrontPageUpload').click();">Upload</button>
                                            <input type="text" class="flexUploadInput" id="bankAccFrontPageFileName" placeholder="No file chosen" style="background: transparent;" disabled>
                                        </div>
                                        <span id="bankAccFrontPageError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle">State</span>
                                        </label>
                                        <select id="state" class="form-control beforeLoginForm">
                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                            <option value="Selangor">Selangor</option>
                                        </select>
                                        <span id="stateError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
                                        <label class="formLabel"><?php echo $translations['M00196'][$language]; //Placement Username ?></label>
                                        <input id="placementUsername" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00196'][$language]; //Placement Username ?>">
                                    </div> -->

                                    <!-- <div class="col-md-12 mb-4 <?php if($fromQR){echo 'hide';} ?>">
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
                                    </div> -->
                                    <!-- <div id="loginError" class="col-12" style="color: #ff2222;"></div> -->

                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-4 col-lg-4">
                                                <button id="nextBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" onclick="nextSection(3,'1')" data-lang="M00155"><?php echo $translations['M00155'][$language]; //Next ?></button>
                                            </div>
                                            <div class="col-4 col-lg-4">
                                                <button id="skipBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" onclick="nextSection(3,'0')" data-lang="M00155"><?php echo $translations['M02141'][$language]; //Skip ?></button>
                                            </div>
                                            <div class="col-4 col-lg-4">
                                                <button id="backBtn" class="btn btn-default w-100 letterSpace" onclick="goToSection(2)" data-lang="M00278"><?php echo $translations['M00218'][$language]; //Back ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 py-4">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6 <?php if($fromQR){echo 'hide';} ?>">
                                                <a class="text-center btn loginBtn back d-block w-100" href="login.php">
                                                    <?php echo $translations['M00163'][$language]; //BACK ?>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="signUpBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div id="registerSection04" style="display: none;">
                                <div class="mb-3 d-lg-none" style="color: #000;"><?php echo $translations['M03140'][$language]; //Additional Info ?></div>
                                <div class="row align-items-baseline">
                                    <div class="col-md-6 mb-4">
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

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="03176"><span class="text-danger">* </span><?php echo $translations['M03176'][$language]; //Numbers of Child ?></span>
                                        </label>
                                        <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control beforeLoginForm" id="childNumber" placeholder="<?php echo $translations['M03177'][$language]; //Enter your numbers of child ?>">
                                        <span id="childNumberError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03474"><span class="text-danger">* </span><?php echo $translations['M03474'][$language]; //Child Age ?></span>
                                        </label>
                                        <select id="childAge" class="form-control beforeLoginForm" disabled>
                                            <option value=""><?php echo $translations['M03475'][$language]; //--- Select Age --- ?></option>
                                        </select>
                                        <span id="childAgeError" class="customError text-danger" error="error"></span>
                                        <div id="childAgeList" class="row" style="margin-top: 20px; display: none;"></div>
                                    </div>

                                    <div class="col-md-6 mb-4">
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

                                    <div id="identityNumberDiv" class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03183"><span class="text-danger">* </span><?php echo $translations['M03183'][$language]; //ID Number (KTP) ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="identityNumber" placeholder="<?php echo $translations['M03184'][$language]; //Enter your KTP ID Number ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        <span id="identityNumberError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div id="passportNumberDiv" class="col-md-6 mb-4" style="display: none;">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03185"><span class="text-danger">* </span><?php echo $translations['M03185'][$language]; //Passport Number ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="passportNumber" placeholder="<?php echo $translations['M03186'][$language]; //Enter your passport number ?>">
                                        <span id="passportNumberError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle" data-lang="M03178"><?php echo $translations['M03178'][$language]; //NPWP Number ?></span>
                                        </label>
                                        <input type="text" class="form-control beforeLoginForm" id="taxNumber" placeholder="<?php echo $translations['M03179'][$language]; //Enter your NPWP Number ?>">
                                        <span id="taxNumberError" class="customError text-danger" error="error"></span>
                                    </div>

                                    <!-- <div class="col-md-6 mb-4">
                                        <label class="formLabel">
                                            <span class="labelTitle">ID Image</span>
                                        </label>
                                        <div id="ktpImage" class="col-md-12 beforeLoginForm flexUploadDiv">
                                            <input type="hidden" id="ktpImageData">
                                            <input type="hidden" id="ktpImageName">
                                            <input type="hidden" id="ktpImageSize">
                                            <input type="hidden" id="ktpImageType">
                                            <input type="hidden" id="ktpImageFlag">
                                            <input type="file" id="ktpImageUpload" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('ktpImage', this)">
                                            <button class="uploadBtn" id="uploadBtn" onclick="$('#ktpImageUpload').click();">Upload</button>
                                            <input type="text" class="flexUploadInput" id="ktpImageFileName" placeholder="No file chosen" style="background: transparent;" disabled>
                                        </div>
                                        <span id="ktpImageError" class="customError text-danger" error="error"></span>
                                    </div> -->

                                    <!-- <div class="col-md-6 mt-4 mb-4"></div> -->

                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6">
                                                <button id="nextBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" onclick="nextSection(4)" data-lang="M00155"><?php echo $translations['M00155'][$language]; //Next ?></button>
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <button id="backBtn" class="btn btn-default w-100 letterSpace" onclick="goToSection(3)" data-lang="M00278"><?php echo $translations['M00218'][$language]; //Back ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 py-4">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6 <?php if($fromQR){echo 'hide';} ?>">
                                                <a class="text-center btn loginBtn back d-block w-100" href="login.php">
                                                    <?php echo $translations['M00163'][$language]; //BACK ?>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="signUpBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div id="registerSection05" style="display: none;">
                                <div class="mb-3 d-lg-none" style="color: #000;"><?php echo $translations['M03141'][$language]; //Review Form ?></div>
                                <div class="row align-items-baseline">
                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 reviewTableHeader">
                                            <label class="formLabel mr-3">
                                                <span class="labelTitle" data-lang="M03137"><?php echo $translations['M03137'][$language]; //Personal Information ?></span>
                                            </label>
                                            <label class="formLabel">
                                                <span class="labelTitle reviewTableEdit" onclick="goToSection(1)"><?php echo $translations['M00226'][$language]; //Edit ?></span>
                                            </label>
                                        </div>

                                        <div class="col-md-12 mb-4 mt-4">
                                            <table class="reviewTable">
                                                <tbody>
                                                    <tr>
                                                        <td data-lang="M00177"><?php echo $translations['M00177'][$language]; //Full Name ?></td>
                                                        <td>:</td>
                                                        <td id="nameDisplay"></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td data-lang="M00104"><?php echo $translations['M00104'][$language]; //Username ?></td>
                                                        <td>:</td>
                                                        <td id="usernameDisplay"></td>
                                                    </tr> -->
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
                                                    <!-- <tr>
                                                        <td data-lang="M00195"><?php echo $translations['M00195'][$language]; //Placement Username ?></td>
                                                        <td>:</td>
                                                        <td id="placemetUsernameDisplay"></td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td data-lang="M00197"><?php echo $translations['M00197'][$language]; //Placement Position ?></td>
                                                        <td>:</td>
                                                        <td id="placementPositionDisplay"></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                            <!-- <div class="row mb-2">
                                                <div class="col-4">Full Name</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">Tan Ming Teong</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">Username</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">Director123</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">Email Address</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">example123@gmail.com</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">Phone Number</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">+601234567890</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">Date of Birth</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">12/12/1998</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">Gender</div>
                                                <div class="col-1">:</div>
                                                <div class="col-7">Male</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4 mb-2">Sponsor ID</div>
                                                <div class="col-1 mb-2">:</div>
                                                <div class="col-7 mb-2">1234567</div>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4 mb-4">
                                        <div class="col-md-12 reviewTableHeader">
                                            <label class="formLabel mr-3">
                                                <span class="labelTitle" data-lang="M03138"><?php echo $translations['M03138'][$language]; //Billing Address & Delivery Address ?></span>
                                            </label>
                                            <label class="formLabel">
                                                <span class="labelTitle reviewTableEdit" onclick="goToSection(2)"><?php echo $translations['M00226'][$language]; //Edit ?></span>
                                            </label>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-4">
                                            <table class="reviewTable">
                                                <tbody>
                                                    <tr>
                                                        <td data-lang="M02466"><?php echo $translations['M02466'][$language]; //Address ?></td>
                                                        <td>:</td>
                                                        <td id="addressDisplay"></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td data-lang="M03153"><?php echo $translations['M03153'][$language]; //Street Name ?></td>
                                                        <td>:</td>
                                                        <td id="streetNameDisplay"></td>
                                                    </tr> -->
                                                    <tr>
                                                        <td data-lang="M03155"><!-- <?php echo $translations['M03155'][$language]; //Sub-District ?> -->District</td>
                                                        <td>:</td>
                                                        <td id="districtDisplay"></td>
                                                    </tr>
                                                    <tr>
                                                        <td data-lang="M03155"><?php echo $translations['M03155'][$language]; //Sub-District ?></td>
                                                        <td>:</td>
                                                        <td id="subDistrictDisplay"></td>
                                                    </tr>
                                                    <tr>
                                                        <td data-lang="M03158"><?php echo $translations['M03158'][$language]; //Postal Code ?></td>
                                                        <td>:</td>
                                                        <td id="postalCodeDisplay"></td>
                                                    </tr>
                                                    <tr>
                                                        <td data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></td>
                                                        <td>:</td>
                                                        <td id="cityDisplay"></td>
                                                    </tr>
                                                    <tr>
                                                        <td data-lang="M00181"><?php echo $translations['M00181'][$language]; //Province ?></td>
                                                        <td>:</td>
                                                        <td id="stateDisplay"></td>
                                                    </tr>
                                                    <tr>
                                                        <td data-lang="M00178"><?php echo $translations['M00178'][$language]; //Country ?></td>
                                                        <td>:</td>
                                                        <td id="countryDisplay"></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td data-lang="M03160"><?php echo $translations['M03160'][$language]; //Remarks ?></td>
                                                        <td>:</td>
                                                        <td id="remarksDisplay"></td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td data-lang="M03283"><?php echo $translations['M03283'][$language]; //Address Type ?></td>
                                                        <td>:</td>
                                                        <td id="addressTypeDisplay"></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4 mb-4">
                                        <div class="col-md-12 reviewTableHeader">
                                            <label class="formLabel mr-3">
                                                <span class="labelTitle" data-lang="M03139"><?php echo $translations['M03139'][$language]; //Bank Info ?></span>
                                            </label>
                                            <label class="formLabel">
                                                <span class="labelTitle reviewTableEdit" onclick="goToSection(3)"><?php echo $translations['M00226'][$language]; //Edit ?></span>
                                            </label>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-4">
                                            <table class="reviewTable">
                                                <tbody>
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
                                                    <!-- <tr>
                                                        <td>Bank Account Front Page</td>
                                                        <td>:</td>
                                                        <td>hello.png</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4 mb-4">
                                        <div class="col-md-12 reviewTableHeader">
                                            <label class="formLabel mr-3">
                                                <span class="labelTitle" data-lang="M03140"><?php echo $translations['M03140'][$language]; //AddItional Info ?></span>
                                            </label>
                                            <label class="formLabel">
                                                <span class="labelTitle reviewTableEdit" onclick="goToSection(4)"><?php echo $translations['M00226'][$language]; //Edit ?></span>
                                            </label>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-4">
                                            <table class="reviewTable">
                                                <tbody>
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
                                                    <!-- <tr>
                                                        <td>ID Image</td>
                                                        <td>:</td>
                                                        <td>hello.png</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6">
                                                <button id="submitBtn" class="btn btn-primary loginBtn nextBtn w-100 letterSpace" data-lang="M02515"><?php echo $translations['M02515'][$language]; //Submit ?></button>
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <button id="backBtn" class="btn btn-default w-100 letterSpace" onclick="goToSection(4)" data-lang="M00278"><?php echo $translations['M00218'][$language]; //Back ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 py-4">
                                        <div class="row justify-content-between">
                                            <div class="col-6 col-lg-6 <?php if($fromQR){echo 'hide';} ?>">
                                                <a class="text-center btn loginBtn back d-block w-100" href="login.php">
                                                    <?php echo $translations['M00163'][$language]; //BACK ?>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 text-right">
                                                <button id="signUpBtn" class="btn loginBtn w-100"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- <?php include 'footerLogin.php'; ?> -->
<?php include 'sharejs.php'; ?>


</body>

<!-- end::Body -->
</html>

<script>

    var url             = 'scripts/reqDefault.php';
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

        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        updateMemberName();

        // getBankOption = $('input[name="bankOption"]:checked').val();

        $('.logoBlock img').click(function() {
            $.redirect('homepage');
        });

        $('#dialingArea').change(function() {
            var country = $('#dialingArea option:selected').attr('name');
            $(`#countryID option[name="${country}"]`).prop('selected', true);

            var dialingCountry = $('#dialingArea option:selected').attr('name');
            $("#countryID > option").each(function() {
                if($(this).attr('name') === dialingCountry)
                    $("#countryID").val($(this).val()).change();
            });

            countryChanged();
        });

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
    childAgeOption = data.childAgeOption;
    bankList = data.bankDetails;

    if(childAgeOption) {
        $.each(childAgeOption, function(k, v) {
            $('#childAge').append(`<option value="${k}">${v['display']}`);
        });
    }

    $.getJSON(jsonUrl, function( jsonData ) {

        saveJsonData = jsonData;
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

        goToSection(++currentIndex);
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


</script>
