<section class="homepageHeader">
    <div class="kt-container"> 
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-2">
                    <a href="homepage">
                        <img src="images/project/companyLogoText.png" class="homepage_header_logo">
                    </a>
                </div>

                <div class="col-10 d-flex justify-content-end">
                    <!-- <?php if ($_SESSION['userID']) { ?>
                        <div class="header_menu_div blackFont menuActive"><a href="dashboard.php" class="btn blackFont"><?php echo $translations['M00126'][$language]; /* Dashboard */?></a></div>
                    <?php } ?> -->
                    
                    <div class="header_menu_div blackFont dropdown">
                        <button class="dropbtn blackFont showDropdown menuActive px-0"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?>&nbsp;</button>
                        <div class="dropdown-content blackFont dropdownContent">
                            <a href="companyProfile" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03104'][$language]; /* Company Profile */?></a>
                            <!-- <a href="memberBenefits.php" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03105'][$language]; /* Member Benefits */?></a> -->
                            <a href="productPortfolio" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03106'][$language]; /* Product Portfolio */?></a>
                        </div>
                    </div>
                    <div class="header_menu_div blackFont dropdown">
                        <button class="dropbtn blackFont showDropdown menuActive px-0"><?php echo $translations['M03457'][$language]; /* E-Catalogue */?>&nbsp;</button>
                        <div class="dropdown-content blackFont dropdownContent appendCatalogueDropDown">
                        </div>
                    </div>
                    <div class="header_menu_div blackFont">
                        <a href="productListing" class="btn blackFont menuActive px-0"><?php echo $translations['M03107'][$language]; /* Shop */?></a>
                    </div>
                    <div class="header_menu_div blackFont dropdown">
                        <button class="dropbtn blackFont showDropdown menuActive px-0"><?php echo $translations['M03496'][$language]; /* Help Center */?>&nbsp;</button>
                        <div class="dropdown-content blackFont dropdownContent">
                            <a href="contactUs" class="btn menuDropdownBtn blackFont"><?php echo $translations['M02048'][$language]; /* Contact Us */?></a>
                            <a href="https://care.meta-fiz.com/" target="_blank" class="btn menuDropdownBtn blackFont" data-lang="M03487"><?php echo $translations['M03487'][$language]; /* Warranty Claim */?></a>
                            <a href="termsAndConditions" class="btn menuDropdownBtn blackFont" data-lang="M03052"><?php echo $translations['M03052'][$language]; /* Terms and Conditions */?></a>
                        </div>
                    </div>
                    <div class="header_menu_div blackFont dropdown">
                        <button class="dropbtn blackFont showDropdown menuActive px-0"><?php echo $config["languages"][$language]['displayName'] ?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                        
                        <div class="dropdown-content blackFont dropdownContent">
                            <?php $languages = $config['languages']; ?>
                            <?php foreach($languages as $key => $value) {?>
                                <a href="javascript:;" class="blackFont btn menuDropdownBtn changeLanguage" language="<?php echo $key;?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                 <?php echo $languages[$key]['displayName']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="header_menu_div d-flex align-items-center mr-0">
                        <div id="cart" class="blackFont">
                            <a href="shoppingCart" class="blackFont menuActive cartBtn smallIconBtn">
                                <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                                <span class="cartNo" style="display: none;"></span>
                            </a>  
                        </div>

                        <?php if ($_SESSION['userID']) { ?>
                            <div class="ml-3">
                                <a href="dashboard" class="btn btn-primary">
                                    <?php echo $translations['M00126'][$language]; /* Dashboard */?>
                                </a> 
                            </div>
                        <?php } else { ?>
                            <div id="login" class="ml-3">
                                <a href="javascript:;" class="btn btn-primary" onclick="showModal()">
                                    <?php echo $translations['M03518'][$language]; /* Login/Sign Up */?>
                                </a> 
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="col-md-2 header_menu_div blackFont row justify-content-end">
                        <div id="search" class="col-md-4">
                            <a href="javascript:;" class="px-4 blackFont">
                                <i class="fa fa-search fa-lg"></i>
                            </a>   
                        </div>
                        <div id="cart" class="col-md-4">
                            <a href="shoppingCart.php" class="px-4 blackFont">
                                <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                            </a>   
                        </div>
                        <div id="login" class="col-md-4">
                            <a href="javascript:;" class="px-4 blackFont" onclick="showModal()">
                                <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                            </a> 
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="homepageHeaderMobile">
        <div class="kt-container">
            <div class="row">
                <div class="col-md-4 col-5">
                    <div class="">
                        <a href="homepage">
                            <img src="images/project/companyLogoText.png" class="homepage_header_logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-7 justify-content-end d-flex align-items-center">
                    <!-- <div class="blackFont dropdown">
                        <button class="dropbtn blackFont showDropdown">
                            <i class="fas fa-globe menuIcon dropdownIcon"></i>
                        </button>
                        <div class="dropdown-content2 blackFont dropdownContent">
                            <?php $languages = $config['languages']; ?>
                            <?php foreach($languages as $key => $value) {?>
                               <a href="javascript:;" class="blackFont btn menuDropdownBtn changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                 <?php echo $languages[$key]['displayName']; ?>
                                </a>
                            <?php
                              }
                            ?>
                        </div>
                    </div> -->

                    <!-- <?php if (!$_SESSION['userID']) { ?>
                        <div id="loginMobile" class="pl-4 pl-md-5 blackFont" onclick="showModal()">
                             <i class="fa fa-user menuIcon"></i>
                        </div>
                    <?php } ?> -->
                   
                    <a href="shoppingCart" class="ml-4 ml-md-5 cartBtn smallIconBtn">
                        <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                        <span class="cartNo" style="display: none;"></span>
                    </a>
                   
                    <div class="ml-4 ml-md-5 blackFont dropdown" onclick="showSidebar()">
                        <i class="fa fa-bars menuIcon"></i>
                    </div>
                </div>
                <!-- <div class="header_menu_div blackFont dropdown">
                    <button class="dropbtn blackFont showDropdown"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?>&nbsp;</button>
                    <div class="dropdown-content blackFont dropdownContent">
                        <a href="companyProfile.php" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03104'][$language]; /* Company Profile */?></a>
                        <a href="memberBenefits.php" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03105'][$language]; /* Member Benefits */?></a>
                        <a href="productPortfolio.php" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03106'][$language]; /* Product Portfolio */?></a>
                    </div>
                </div> -->
            </div>
        </div>

    <div id="sidebar" class="mobileSidebar">
        <div class="text-center mt-4">
            <a href="homepage"><img class="sidebarLogo" src="images/project/companyLogo2.png" alt="Company Logo" width="130"></a>
        </div>
        <?php if ($_SESSION['userID']) { ?>
            <div class="my-4 text-center">
                <a href="dashboard" class="btn btn-primary">
                    <?php echo $translations['M00126'][$language]; /* Dashboard */?>
                </a> 
            </div>
        <?php } else { ?>
            <div id="login" class="my-4 text-center">
                <a href="javascript:;" class="btn btn-primary" onclick="showModal()">
                    <?php echo $translations['M03518'][$language]; /* Login/Sign Up */?>
                </a> 
            </div>
        <?php } ?>

        <!-- <?php if ($_SESSION['userID']) { ?>
            <div class="my-4 px-4 text-left">
                <a href="dashboard.php" class="btn blackFont"><?php echo $translations['M00126'][$language]; /* Dashboard */?></a>
            </div>
        <?php } ?> -->

        <div class="my-4 px-4 text-left blackFont btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn blackFont showDropdown px-0"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content blackFont dropdownContent">
                    <a href="companyProfile" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03104'][$language]; /* Company Profile */?></a>
                    <!-- <a href="memberBenefits" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03105'][$language]; /* Member Benefits */?></a> -->
                    <a href="productPortfolio" class="btn menuDropdownBtn blackFont"><?php echo $translations['M03106'][$language]; /* Product Portfolio */?></a>
                </div>
            </div>
        </div>
        <div class="my-4 px-4 text-left blackFont btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn blackFont showDropdown px-0"><?php echo $translations['M03457'][$language]; /* E-Catalogue */?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content blackFont dropdownContent appendCatalogueDropDown">
                </div>
            </div>
        </div>
        <div class="my-4 px-4 text-left">
            <a href="productListing" class="btn blackFont p-0"><?php echo $translations['M03107'][$language]; /* Shop */?></a>
        </div>
        <div class="my-4 px-4 text-left blackFont btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn blackFont showDropdown px-0"><?php echo $translations['M03496'][$language]; /* Help Center */?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content blackFont dropdownContent">
                    <a href="contactUs" class="btn menuDropdownBtn blackFont"><?php echo $translations['M02048'][$language]; /* Contact Us */?></a>
                    <a href="https://care.meta-fiz.com/" target="_blank" class="btn menuDropdownBtn blackFont" data-lang="M03487"><?php echo $translations['M03487'][$language]; /* Warranty Claim */?></a>
                    <a href="termsAndConditions" class="btn menuDropdownBtn blackFont" data-lang="M03052"><?php echo $translations['M03052'][$language]; /* Terms and Conditions */?></a>
                </div>
            </div>
        </div>
        <!-- <div class="my-4 px-4 text-left blackFont btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn blackFont showDropdown px-0"><?php echo $translations['M03496'][$language]; /* Help Center */?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content blackFont dropdownContent">
                    <a href="contactUs.php" class="btn menuDropdownBtn blackFont"><?php echo $translations['M02048'][$language]; /* Contact Us */?></a>
                    <a href="https://dev.care.meta-fiz.com/" target="_blank" class="btn menuDropdownBtn blackFont" data-lang="M03487"><?php echo $translations['M03487'][$language]; /* Warranty Claim */?></a>
                </div>
            </div>
        </div> -->
        <div class="my-4 px-4 text-left blackFont btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn blackFont showDropdown px-0"><?php echo $config["languages"][$language]['displayName'] ?>&nbsp;<i class="fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content blackFont dropdownContent">
                    <?php $languages = $config['languages']; ?>
                    <?php foreach($languages as $key => $value) {  ?>
                        <a href="javascript:;" class="btn menuDropdownBtn blackFont changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languages[$key]['displayName']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div id="sidebarBG" class="transparentBG" onclick="hideSidebar()">
        <div id="closeButton" class="closeSidebar"> <i class="fa fa-times menuIcon"></i></div>
    </div>
</section>

<div class="modal fade loginModal" id="loginModal" role="dialog">
    <div class="modal-dialog modal-lg modalPage1" role="document">
        <div class="modal-content homepage_modal">
            <div class="modal-header py-0 justify-content-end">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 pb-5">
                <img class="homepage_modal_logo" src="images/project/companyLogo2.png" alt="Logo">
                <div class="mt-4 text-center">
                    <span class="homepage_modal_title"><?php echo $translations['M01445'][$language]; /* Welcome Back */?>!</span>
                </div>
                <div class="text-center homepage_modal_div">
                    <span class="d-inline mb-4 modalSmallText"><?php echo $translations['M01984'][$language]; /* Don't have an Account? */?>&nbsp;</span><a class="smallLink" href="publicRegistration"><?php echo $translations['M01985'][$language]; /* Sign Up */?></a>
                </div>
                <form class="mt-4 contentPadding">
                    <div class="homepage_modal_div2 homepage_modal_flex_div">
                        <i class="fa fa-user homepage_modal_flex_icon"></i>
                        <input id="usernameInput" class="homepage_modal_flex_input form-control loginInput" type="text" placeholder="<?php echo $translations['M03286'][$language]; /* Member ID/Email Address */?>" autocomplete="off">
                    </div>
                    <div class="homepage_modal_div2 homepage_modal_flex_div">
                        <i class="fa fa-lock homepage_modal_flex_icon"></i>
                        <input id="passwordInput" class="homepage_modal_flex_input form-control loginInput" type="password" placeholder="<?php echo $translations['M02301'][$language]; /* Password */?>" autocomplete="off">
                        <i id="eyeOpen" class="fa fa-eye homepage_modal_flex_icon2 hidden cursorPointer" onclick="hidePassword()"></i>
                        <i id="eyeClose" class="fa fa-eye-slash homepage_modal_flex_icon2 cursorPointer" onclick="showPassword()"></i>
                    </div>
                </form>
                <div class="mt-4 homepage_modal_div text-center contentPadding">
                    <button id="loginBtn" class="homepage_modal_button btn btn-primary">
                        <?php echo $translations['M01025'][$language]; /* Login */?>
                    </button>
                </div>
                <div class="homepage_modal_div contentPadding">
                    <span id="username"></span>
                    <span id="password"></span>
                </div>
                <div class="mt-4 text-center">
                    <a id="forgotBtn" class="modalSmallText" href="javascript:;" onclick="showForgotPwdModal();"><?php echo $translations['M03108'][$language]; /* Forgot Member ID or Password? */?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal-dialog modal-lg modalPage3" role="document" style="display: none;">
        <div class="modal-content homepage_modal">
            <div class="modal-header py-0 justify-content-end">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="contentPadding">
                    <div class="d-flex">
                        <i class="mt-2 mr-4 fas fa-chevron-left step3 cursorPointer backIcon"></i>
                        <div class="text-left">
                            <span class="homepage_modal_title">Forgot Member ID?</span>
                        </div>
                    </div>
                    <form>
                        <div class="mt-5">
                            <div id="forgotEmailDiv" class="homepage_modal_div2 homepage_modal_flex_div mb-0">
                                <input id="forgotEmail" class="homepage_modal_flex_input form-control" type="text" placeholder="<?php echo $translations['M00187'][$language]; /* Email Address */?>">
                            </div>
                            <div class="row mx-0 px-0 align-items-center">
                                <div class="col-md-8 col-6 px-0">
                                    <div class="homepage_modal_div2 homepage_modal_flex_div">
                                        <input id="forgotOTP" class="homepage_modal_flex_input form-control" type="text" placeholder="<?php echo $translations['M01050'][$language]; /* Please insert otp code */?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pr-0">
                                    <button id="otpBtn" class="homepage_modal_button btn btn-primary h-100">
                                        Send OTP
                                    </button>
                                </div>
                            </div>
                            <div class="homepage_modal_div2 homepage_modal_flex_div mt-0">
                                <input id="newPwd" class="homepage_modal_flex_input form-control" type="text" placeholder="<?php echo $translations['M00573'][$language]; /* New Password */?>">
                            </div>
                            <div class="homepage_modal_div2 homepage_modal_flex_div">
                                <input id="retypeNewPwd" class="homepage_modal_flex_input form-control" type="text" placeholder="<?php echo $translations['M00574'][$language]; /* Re-Type New Password */?>">
                            </div>
                        </div>
                    </form>
                    <div class="mt-4 mb-2 homepage_modal_div text-center">
                        <button id="resetBtn" class="homepage_modal_button btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="modal fade forgotModal" id="forgotPwdModal" role="dialog">
    <div class="modal-dialog modal-lg modalPage2" id="" role="document">
        <div class="modal-content homepage_modal">
            <div class="modal-header py-0 justify-content-end">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="contentPadding">
                    <div class="d-flex">
                        <a href="javascript:;" onclick="backToLogin();"><i class="mt-2 mr-4 fas fa-chevron-left step2 cursorPointer backIcon"></i></a>
                        <div class="text-left">
                            <span class="homepage_modal_title"><?php echo $translations['M03108'][$language]; /* Forgot Member ID or Password? */?></span>
                        </div>
                    </div>
                    <form class="mt-5">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="radio radio-inline mr-3 d-flex">
                                    <input type="radio" name="radio" value="memberID"  class="radioStyle forgotRadio" checked>
                                    <span class="forgotRadioText d-inline" data-lang="M00548"><?php echo $translations['M00548'][$language]; //Member ID ?></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="radio radio-inline d-flex">
                                    <input type="radio" name="radio" value="password" class="radioStyle forgotRadio">
                                    <span class="forgotRadioText d-inline" data-lang="M02301"><?php echo $translations['M02301'][$language]; //Password ?></span>
                                </label>
                            </div>
                        </div>

                        <div id="memberIDWrap">
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <select class="form-control homepage_modal_flex_input" id="idType">
                                    <option value="nric"><?php echo $translations['M03181'][$language]; /* KTP */?></option>
                                    <option value="passport"><?php echo $translations['M03182'][$language]; /* Passport */?></option>
                                </select>
                            </div>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="IDInput" class="forgot form-control homepage_modal_flex_input" type="text" placeholder="<?php echo $translations['M03460'][$language]; /* ID Number(KTP) */?>">
                            </div>
                            <span class="appendIDError"></span>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="idFullName" class="forgot form-control homepage_modal_flex_input" type="text" placeholder="<?php echo $translations['M00177'][$language]; /* Full Name */?>">
                            </div>
                            <span class="appendNameError"></span>
                            <div class="input-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="dobForgotID" class="forgot form-control date homepage_modal_flex_input" placeholder="<?php echo $translations['M01058'][$language]; /* Date of Birth */?>">
                                <div class="input-group-append date" style="border: none;">
                                    <i class="homepage_modal_flex_icon2 fas fa-calendar-alt fa-lg" onclick="$('#dobForgotID').focus();"></i>
                                </div>
                            </div>
                            <span class="appendBODError"></span>
                        </div>
                        <div id="pwdWrap" style="display: none;">
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="pwdFullNameInp" class="forgot form-control homepage_modal_flex_input" type="text" placeholder="<?php echo $translations['M03452'][$language]; /* Member ID/Email */?>">
                            </div>
                            <span id="email"></span>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <select class="form-control homepage_modal_flex_input" id="idTypePwd">
                                    <option value="nric"><?php echo $translations['M03181'][$language]; /* KTP */?></option>
                                    <option value="passport"><?php echo $translations['M03182'][$language]; /* Passport */?></option>
                                </select>
                            </div>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="ktpPwdInput" class="forgot form-control homepage_modal_flex_input" type="text" placeholder="<?php echo $translations['M03460'][$language]; /* ID Number(KTP) */?>">
                            </div>
                            <span class="appendIDError"></span>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="pwdFullName" class="forgot form-control homepage_modal_flex_input" type="text" placeholder="<?php echo $translations['M00177'][$language]; /* Full Name */?>">
                            </div>
                            <span class="appendNameError"></span>
                            <div class="input-group homepage_modal_flex_div homepage_modal_div2">
                                <input id="dobForgotPwd" class="forgot form-control date homepage_modal_flex_input" placeholder="<?php echo $translations['M01058'][$language]; /* Date of Birth */?>">
                                <div class="input-group-append date" style="border: none;">
                                    <i class="homepage_modal_flex_icon2 fas fa-calendar-alt fa-lg" onclick="$('#dobForgotPwd').focus();"></i>
                                </div>
                            </div>
                            <span class="appendBODError"></span>
                            <div class="form-group row homepage_modal_flex_div homepage_modal_div2" style="padding-left: 0; border: none;">
                                <div class="col-md-8 col-6 pl-0">
                                    <div class="homepage_modal_flex_div homepage_modal_div2 my-0">
                                        <input id="verificationCode" type="text" class="form-control beEmpty homepage_modal_flex_input" placeholder="<?php echo $translations['M03453'][$language]; //Enter OTP ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pl-0 homepage_modal_flex_div homepage_modal_div2 my-0" style="border: none;">
                                    <button type="button" id="sendCodeForgotPwd" class="btn btn-primary w-100 green" data-lang="M01451" style="height:42px">
                                        <?php echo $translations['M01451'][$language]; //send OTP ?>
                                    </button>
                                    <button id="timerForgotPwd" class="form-control btn w-100" disabled style="display: none"><span></span></button>
                                </div>
                            </div>
                            <span id="otpCode"></span>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2" style="display:none">
                                <input id="pwdInp" class="forgot form-control homepage_modal_flex_input" type="password" placeholder="<?php echo $translations['M00573'][$language]; /* New Password */?>">
                            </div>
                            <span id="password2" class="customError text-danger" error="error"></span>
                            <div class="form-group homepage_modal_flex_div homepage_modal_div2" style="display:none">
                                <input id="retypePassword" class="forgot form-control homepage_modal_flex_input" type="password" placeholder="<?php echo $translations['M02661'][$language]; /* Retype Password */?>">
                            </div>
                            <span id="retypePasswordError" class="customError text-danger" error="error"></span>
                        </div>
                    </form>
                    <div class="mt-4 homepage_modal_div text-center">
                        <button id="forgotNextBtn" class="homepage_modal_button btn btn-primary green w-100" type="button">
                            <?php echo $translations['M03462'][$language]; //Find My ID ?>
                        </button>
                        <button id="updatedPwd" class="homepage_modal_button btn btn-primary green w-100" type="button" style="display: none;">
                            <?php echo $translations['M00580'][$language]; //Change Password ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
