<?php 
include_once('include/class.cryptDes.php');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
}
else {
    $protocol = 'http://';
}
$domainName = $_SERVER['HTTP_HOST'].'';

if($config["isLocalHost"]){
    $encrypt = $_SESSION['username'];
}else{
    $crypt = new cryptDes();
    $encrypt = $crypt->encrypt($_SESSION['username']);
}

$qrCodeRegistrationUrl = urldecode($protocol.$domainName."/publicRegistration.php?qr=".$encrypt);
$registrationUrl = urldecode($protocol.$domainName."/publicRegistration.php?qr=".$encrypt);

?>

<body>
    
    <section class="sideBarHeader">
        <div class="kt-container">
            <div class="col-12">
                <div class="row justify-content-between">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="align-self-center mr-5">
                                <a href="dashboard.php">
                                    <img alt="Logo" src="<?php echo $config['logoURL']; ?>" class="sideBarLogo">
                                </a>
                            </div>

                            <div class="align-self-center pcOnly">
                                <span class="welcomeFont">
                                    <?php echo $translations['M02032'][$language]; //Welcome ?>, <?php echo $_SESSION['username'] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="align-self-center pcOnly">
                        <div class="row justify-content-end">

                            <div class="align-self-center mr-3">
                                <i class="fa fa-qrcode qrIcon" aria-hidden="true" data-toggle="modal" data-target="#qr_modal"></i>
                            </div>
                            <div class="align-self-center" style="width: 260px;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="headerTimer">
                                            <span class="currentTime"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="">
                                                <button type="button" class="btn headerLangBtn" data-toggle="dropdown" data-offset="10px,10px">
                                                    <span id="languageText"><?php echo $config["languages"][$language]['displayName'] ?></span>
                                                    <span class="iconLan"><i class="fa fa-angle-down" aria-hidden="true"></i></span>

                                                </button>
                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim languageDropDownBox">
                                                    <ul class="kt-nav navLanguage">
                                                        <?php $languages = $config['languages']; ?>
                                                        <?php foreach($languages as $key => $value) { 
                                                            if ($key=="chineseSimplified") {
                                                                $flag="chinese";
                                                            }else if ($key=="chineseTraditional") {
                                                                $flag="taiwan";
                                                            }else if ($key == "korean"){
                                                                $flag="korean";
                                                            }else if ($key == "thailand"){
                                                                $flag="thai";
                                                            }else if ($key == "vietnam"){
                                                                $flag="vietnam";
                                                            }else if ($key == "japanese"){
                                                                $flag="japanese";
                                                            }else if($key == 'english'){
                                                                $flag="english";
                                                            }
                                                            ?>

                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                                                    <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png">
                                                                    <span class="kt-nav__link-text languageFont" id="english">
                                                                        <?php echo $languages[$key]['displayName']; ?>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn settingBtn" data-toggle="dropdown" data-offset="10px,10px">
                                                    <span class="settingIcon">
                                                        <i class="la la-cog"></i>
                                                    </span>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim languageDropDownBox">
                                                    <ul class="kt-nav navLanguage">

                                                        <?php
                                                            if (!in_array("Edit Profile", $_SESSION['blockedRights'])) { ?>
                                                                <li class="kt-nav__item">
                                                                    <a href="editProfile.php" class="kt-nav__link">
                                                                    <span class="kt-nav__link-text languageFont">
                                                                        <?php echo $translations['M00417'][$language]; //Edit Profile ?>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                            }
                                                        ?>

                                                        <li class="kt-nav__item walletAddressDisplay">
                                                            <a href="addWalletAddress.php" class="kt-nav__link">
                                                                <span class="kt-nav__link-text languageFont">
                                                                    <?php echo $translations['M00468'][$language]?>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li class="kt-nav__item walletAddressDisplay">
                                                            <a href="addWalletAddressListing.php" class="kt-nav__link">
                                                                <span class="kt-nav__link-text languageFont">
                                                                    <?php echo $translations['M00471'][$language]?>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <?php
                                                            if (!in_array("Change Login Password", $_SESSION['blockedRights'])) { ?>
                                                                <li class="kt-nav__item">
                                                                    <a href="changeLoginPassword.php" class="kt-nav__link">
                                                                        <span class="kt-nav__link-text languageFont">
                                                                            <?php echo $translations['M00082'][$language]; //Change Login Password ?>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            }
                                                        ?>

                                                        <?php
                                                            if (!in_array("Change Transaction Password", $_SESSION['blockedRights'])) { ?>
                                                                <li class="kt-nav__item">
                                                                    <a href="changeTransactionPassword.php" class="kt-nav__link">
                                                                        <span class="kt-nav__link-text languageFont">
                                                                            <?php echo $translations['M00087'][$language]; //Change Transaction Password ?>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            }
                                                        ?>

                                                        <!-- <li class="kt-nav__item">
                                                            <a href="kyc.php" class="kt-nav__link">
                                                                <span class="kt-nav__link-text languageFont">
                                                                    <?php echo $translations['M00193'][$language]; //KYC ?>
                                                                </span>
                                                            </a>
                                                        </li> -->
                                                        <li class="kt-nav__item">
                                                            <a href="javascript:;" class="kt-nav__link"  onclick="beforeLogout()">
                                                                <span class="kt-nav__link-text languageFont">
                                                                    <?php echo $translations['M00142'][$language]; //Log Out ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="align-self-center belowPc">
                        <div class="row">

                            <div class="align-self-center mr-3">
                                <i class="fa fa-qrcode sidebarTopIconQR" aria-hidden="true" data-toggle="modal" data-target="#qr_modal"></i>
                            </div>

                            <div class="align-self-center mr-3">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false">
                                    <i class="fa fa-globe sidebarTopIcon"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim languageDropDownBox">
                                    <ul class="kt-nav navLanguage">
                                        <?php $languages = $config['languages']; ?>
                                        <?php foreach($languages as $key => $value) { 
                                            if ($key=="chineseSimplified") {
                                                $flag="chinese";
                                            }else if ($key=="chineseTraditional") {
                                                $flag="taiwan";
                                            }else if ($key == "korean"){
                                                $flag="korean";
                                            }else if ($key == "thailand"){
                                                $flag="thai";
                                            }else if ($key == "vietnam"){
                                                $flag="vietnam";
                                            }else if ($key == "japanese"){
                                                $flag="japanese";
                                            }else if($key == 'english'){
                                                $flag="english";
                                            }
                                            ?>

                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                                    <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png">
                                                    <span class="kt-nav__link-text languageFont" id="english">
                                                        <?php echo $languages[$key]['displayName']; ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="align-self-center mr-3">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false">
                                    <i class="fa fa-cog sidebarTopIcon"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl languageDropDownBox ">
                                    <div class="kt-notification">
                                        <?php
                                            if (!in_array("Edit Profile", $_SESSION['blockedRights'])) { ?>
                                                <a href="editProfile.php" class="kt-notification__item profileDropdown">
                                                    <?php echo $translations['M00417'][$language]; //Edit Profile ?>
                                                </a>
                                                <?php
                                            }
                                        ?>

                                        <a href="addWalletAddress.php" class="kt-notification__item profileDropdown walletAddressDisplay">
                                            <?php echo $translations['M00468'][$language]; //Add Wallet Address ?>
                                        </a>
                                        <a href="addWalletAddressListing.php" class="kt-notification__item profileDropdown walletAddressDisplay">
                                            <?php echo $translations['M00471'][$language]; //Wallet Address Listing ?>
                                        </a>

                                        <?php
                                            if (!in_array("Change Login Password", $_SESSION['blockedRights'])) { ?>
                                                <a href="changeLoginPassword.php" class="kt-notification__item profileDropdown">
                                                    <?php echo $translations['M00082'][$language]; //Change Login Password ?>
                                                </a>
                                                <?php
                                            }
                                        ?>

                                        <?php
                                            if (!in_array("Change Transaction Password", $_SESSION['blockedRights'])) { ?>
                                                <a href="changeTransactionPassword.php" class="kt-notification__item profileDropdown">
                                                    <?php echo $translations['M00087'][$language]; //Change Transaction Password ?>
                                                </a>
                                                <?php
                                            }
                                        ?>

                                        <a href="javascript:;" class="kt-notification__item profileDropdown" onclick="beforeLogout()">
                                            <?php echo $translations['M00142'][$language]; //Log Out ?>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="align-self-center mr-3">
                                <i class="fa fa-bars sidebarTopIcon menuIcon"></i>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="startSideBar">
        <div class="sideBarScreen" style="display: none;"></div>
        <div class="sideBar">
            <div class="col-12">
                <div class="row">

                    <div class="col-12 sideBarMenu">
                        <a href="dashboard.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                         <?php echo $translations['M00025'][$language]; //Dashboard ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="registration.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                         <?php echo $translations['M00027'][$language]; //Registration ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="portfolio.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                        <?php echo $translations['M00142'][$language]; //MY PORTFOLIO ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="payment.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                        <?php echo $translations['M02058'][$language]; //INVESTMENT ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                         <?php echo $translations['M00028'][$language]; //Bonus ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>


                        <div class="col-12 sideBarMenuDropdown">
                            <?php
                            foreach($_SESSION["bonusReport"] AS $bonusData){
                                echo '<a href="'.$bonusData['name'].'.php" class="btn sideBarMenuDropdownItem">';
                                    echo '<span>'.$translations[$bonusData['languageCode']][$language].'</span>';
                                echo '</a>';
                                
                            } 
                            ?>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                         <?php echo $translations['M00960'][$language]; //Diagram ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="sponsorDiagram.php" class="btn sideBarMenuDropdownItem">
                                <?php echo $translations['M01782'][$language]; //Sponsor Diagram ?>
                            </a>
                            <a href="placementDiagram.php" class="btn sideBarMenuDropdownItem">
                                <?php echo $translations['M00432'][$language]; //placement Diagram ?>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="news.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-newspaper" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                        <?php echo $translations['M00030'][$language]; //News ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-inbox" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                         <?php echo $translations['M00031'][$language]; //Inbox ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="support.php" class="btn sideBarMenuDropdownItem">
                                <?php echo $translations['M00032'][$language]; //Support ?>
                            </a>
                            <a href="inbox.php" class="btn sideBarMenuDropdownItem">
                                <?php echo $translations['M00149'][$language]; //INBOX ?>
                            </a>
                        </div>

                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="download.php" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarIcon">
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </div>
                                    <div class="align-self-center sideBarText">
                                        <?php echo $translations['M00031'][$language]; //MEMBER GUIDE ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="sideBarContent">
            
