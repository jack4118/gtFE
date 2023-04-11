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

<body style="display: block;">
    <!-- <section class="homepageHeaderBlackBG"></section> -->

    <div class="kt-container px-0">
        <div class="row mx-0">
            <div class="col-12 col-lg-2 ipadproOnly sidebarMenuWrapper text-center">
                <a href="homepage"><img class="sidebarLogo" src="images/project/companyLogo2.png" alt="Company Logo" width="100"></a>
                <div class="row sideMenuWrapper">
                    <div class="col-12 sideBarMenu">
                        <a href="dashboard" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/1-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M00126'][$language]; //Dashboard ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 sideBarMenu">
                        <a href="transactionHistory" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/12-gray.png" class="sidebarImg"></span></span>
                                        <span class="sideBarText"><?php echo $translations['M00156'][$language]; /* My Wallet */?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 sideBarMenu">
                        <a href="myProfile" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/2-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M03314'][$language]; //My Profile ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/5-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M02871'][$language]; //My Purchases ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <a href="orderListing" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03316">
                                            <?php echo $translations['M03316'][$language]; // Order Listing ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="orderTracking" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03515">
                                            <?php echo $translations['M03515'][$language]; // Order Tracking ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- <a href="orderHistory.php" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03315'][$language]; // Order History ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                        </div>
                        
                    </div>
                    <div class="col-12 sideBarMenu">

                        <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/4-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M02237'][$language]; //Settings ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <a href="addressListing" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03295">
                                            <?php echo $translations['M03295'][$language]; // Address Listing ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="changePassword" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M00580">
                                            <?php echo $translations['M00580'][$language]; // Change Password ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="kyc" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M02317">
                                            <?php echo $translations['M02317'][$language]; // KYC Verification ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="bankAccount" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M02145">
                                            <?php echo $translations['M02145'][$language]; // Bank Account ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="col-12 sideBarMenu">

                        <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/5-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M03113'][$language]; //Community ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <a href="sponsorDiagram" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03306">
                                            <?php echo $translations['M03306'][$language]; // Sponsor Diagram ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="placementDiagram" class="btn sideBarMenuDropdownItem" id="hasPlacementPosition" style="display:none">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03701">
                                            <?php echo $translations['M03701'][$language]; // Placement Diagram ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="pvpTransactionHistory" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03317">
                                            <?php echo $translations['M03317'][$language]; // PVP Transaction History ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="dvpMonthlySalesSummary" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03721">
                                        <?php echo $translations['M03721'][$language]; // DVP Monthly Sales Summary ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- <a href="pgpMonthlySalesSummary" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03318'][$language]; // PGP Monthly Sales Summary ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <a href="pvpMonthlySalesSummary" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03319">
                                            <?php echo $translations['M03319'][$language]; // PVP Monthly Sales Summary ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="downlineperformanceRprt" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03671">
                                            <?php echo $translations['M03671'][$language]; // Downline Performance Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                   
                    <div class="col-12 sideBarMenu">
                       <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/6-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M00979'][$language]; //Bonus ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <!-- <a href="bonusReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03320'][$language]; // Personal Group Bonus ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <a href="teamBonusReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03321'][$language]; // Team Development Pass Up Bonus ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <a href="leadershipBonusReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03322'][$language]; // Leadership Development Pass Up Bonus ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <a href="bonusPayoutListing" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03323'][$language]; // Bonus Payout Listing ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- <a href="recruitPromoReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03493'][$language]; // Recruit and Active Program Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <a href="newRecruitPromoReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03697">
                                            <?php echo $translations['M03697'][$language]; // New Recruit and Active Program Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                            <a href="enrollmentBonus" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03699">
                                            <?php echo $translations['M03699'][$language]; // Enrollment Bonus Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="coupleBonus" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03700">
                                            <?php echo $translations['M03700'][$language]; // Couple Bonus Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="unilevelBonus" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03712">
                                            <?php echo $translations['M03712'][$language]; // Unilevel Bonus Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="leadershipCashRewardReport" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="M03716">
                                            <?php echo $translations['M03716'][$language]; // Leadership Cash Reward Report ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- <div class="col-12 sideBarMenu">
                        <a href="starProgram" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/7-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M03324'][$language]; //Star Program ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> -->

                    <div class="col-12 sideBarMenu">
                        <a href="monthlyPerformanceReport" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail d-flex">
                                        <div class="col-2 sideBarIcon2 px-2"><img src="images/project/7-gray.png" class="sidebarImg2"></div>
                                        <div class="col-10 sideBarText px-1"><?php echo $translations['M03736'][$language]; //Monthly Performance Report ?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- <div class="col-12 sideBarMenu">
                        <a href="cashAward" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/8-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M03325'][$language]; //Cash Award ?></span>
                                    </div>
                                </div>
                            </div>
                        </a> 
                    </div> -->
                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/9-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $translations['M00016'][$language]; //More ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <a href="support" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M00314'][$language]; // Support ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="inbox" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M00307'][$language]; // Inbox ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="news" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M03326'][$language]; // News and Announcement ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- <a href="download" class="btn sideBarMenuDropdownItem">
                                <div class="col-12">
                                    <div class="row sideItemSpace">
                                        <div class="align-self-center sideBarText" data-lang="">
                                            <?php echo $translations['M00150'][$language]; // Download ?>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-12 sideBarMenu d-lg-none">
                        <a href="javascript:;" class="btn sideBarItem menuBtn sideBarDropdown">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/10-gray.png" class="sidebarImg"></span>
                                        <span class="sideBarText"><?php echo $config["languages"][$language]['displayName'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="sideBarMenuDropdown">
                            <?php $languages = $config['languages']; ?>
                            <?php foreach($languages as $key => $value) {  ?>
                                <a href="javascript:;" class="btn sideBarMenuDropdownItem changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                    <div class="col-12">
                                        <div class="row sideItemSpace">
                                            <div class="align-self-center sideBarText">
                                                <?php echo $languages[$key]['displayName']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 sideBarMenu" onclick="beforeLogout()">
                        <a href="javascript:;" class="btn sideBarItem menuBtn">
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-12 sidebarDetail">
                                        <span class="sideBarIcon px-2"><img src="images/project/11-gray.png" class="sidebarImg"></span></span>
                                        <span class="sideBarText"><?php echo $translations['M01793'][$language]; /* Logout */?></span>
                                    </div>
                                </div>
                            </div>
                        </a> 
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10 ipadproOnly px-0 pageContentWrapper">
                <div class="col-lg-12 col-12 ipadViewNone menuWrap">
                    <?php include "menu.php" ?>
                </div>


