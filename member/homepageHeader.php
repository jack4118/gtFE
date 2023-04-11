<section class="headerMenu homepageHeader d-none d-md-block">
    <div class="kt-container">
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-2">
                    <a href="homepage">
                        <img src="images/project/logo-colour.png" class="homepage_header_logo" width="180px">
                    </a>
                </div>
                <div class="col-10 d-flex justify-content-end">
                    <div class="header_menu_div">
                        <a class="dropbtn showDropdown bodyText smaller px-0" href="homepage" data-lang="M02184"><?php echo $translations['M02184'][$language] /* Home */ ?></a>
                    </div>
                    <div class="header_menu_div">
                        <a class="dropbtn showDropdown bodyText smaller px-0" href="foodMenu" data-lang="M02806"><?php echo $translations['M02806'][$language] /* Menu */ ?></a>
                    </div>
                    <div class="header_menu_div">
                        <a class="dropbtn showDropdown bodyText smaller px-0" href="career" data-lang="M03792"><?php echo $translations['M03792'][$language] /* Our Career */ ?></a>
                    </div>
                    <div class="header_menu_div">
                        <div class="seperateLine">|</div>
                    </div>
                    <div class="header_menu_div d-flex align-items-center">
                        <?php if ($_SESSION['userID']) { ?>
                            <a class="dropbtn px-0 bodyText smaller" href="profile">
                                <img src="images/project/nav-profile-icon.png" width="25px" class="mr-1">
                                <span class="bodyText smaller"><?php echo $_SESSION['name'] ?></span>
                            </a>
                            <div class="dropdown">
                                <button class="dropbtn"><i class="fas fa-angle-down bodyText smaller"></i></button>
                                <div class="dropdown-list">
                                    <a class="bodyText smaller" href="javascript:;" onclick="beforeLogout()" data-lang="M00022"><?php echo $translations['M00022'][$language]; /* Logout */?></a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a class="dropbtn px-0 bodyText smaller" href="login">
                                <img src="images/project/nav-profile-icon.png" width="25px" class="mr-1">
                                <span class="bodyText smaller" data-lang="M01025"><?php echo $translations['M01025'][$language] /* Login */ ?></span>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="header_menu_div">
                    </div>
                    <div class="header_menu_div mr-0">
                        <!-- <a class="dropbtn px-0 mr-3" href="favourite"><img src="images/project/love-icon.png" width="20px"></a> -->
                        <a class="dropbtn px-0 mr-3 cartIcon" href="reviewOrder">
                            <img src="images/project/cart-icon.png" width="20px">
                        </a>
                        <a class="dropbtn showDropdown px-0"><img src="images/project/language-icon.png" width="20px"></a>
                        <div class="dropdown-content dropdownContent">
                            <?php $languages = $config['languages']; ?>
                            <?php foreach($languages as $key => $value) {?>
                                <a href="javascript:;" class="btn menuDropdownBtn bodyText smaller changeLanguage" language="<?php echo $key;?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                 <?php echo $languages[$key]['displayName']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="headerMenu homepageHeaderMobile d-block d-md-none">
    <div class="kt-container">
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-7">
                    <a href="homepage">
                        <img src="images/project/logo-colour.png" class="homepage_header_logo" width="150px">
                    </a>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <div class="mr-2">
                        <a class="dropbtn px-0 mr-3 cartIcon" href="reviewOrder">
                            <img src="images/project/cart-icon.png" width="20px">
                        </a>
                    </div>
                    <div class="dropdown" onclick="showSidebar()">
                        <i class="fa fa-bars menuIcon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sidebar" class="mobileSidebar">
        <div class="text-center mt-4">
            <a href="homepage"><img class="sidebarLogo" src="images/project/logo-colour.png" width="180px"></a>
        </div>
        <div class="my-4 px-4">
            <div>
                <?php if ($_SESSION['userID']) { ?>
                    <a class="dropbtn px-0 bodyText smaller" href="profile">
                        <img src="images/project/nav-profile-icon.png" width="25px" class="mr-1">
                        <span class="bodyText smaller"><?php if($_SESSION['name']) { echo $_SESSION['name']; } else { echo $_SESSION['username']; } ?></span>
                    </a>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-angle-down bodyText smaller"></i></button>
                        <div class="dropdown-list" style="left: 50%; transform: translateX(-50%);">
                            <a class="bodyText smaller" href="javascript:;" onclick="beforeLogout()" data-lang="M00022"><?php echo $translations['M00022'][$language]; /* Logout */?></a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a class="dropbtn px-0 bodyText smaller" href="login">
                        <img src="images/project/nav-profile-icon.png" width="25px" class="mr-1">
                        <span class="bodyText smaller" data-lang="M01025"><?php echo $translations['M01025'][$language] /* Login */ ?></span>
                    </a>
                <?php } ?>
                
            </div>
        </div>
        <div class="my-3 px-4">
            <a class="dropbtn px-0 mr-3" href="favourite"><img src="images/project/love-icon.png" width="20px"></a>
            <a class="dropbtn px-0 mr-3 cartIcon" href="reviewOrder">
                <img src="images/project/cart-icon.png" width="20px">
            </a>
            <a class="dropbtn px-0"><img src="images/project/language-icon.png" width="20px"></a>
            <div class="dropdown-content dropdownContent">
                <?php $languages = $config['languages']; ?>
                <?php foreach($languages as $key => $value) {?>
                    <a href="javascript:;" class="btn menuDropdownBtn bodyText smaller changeLanguage" language="<?php echo $key;?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                        <?php echo $languages[$key]['displayName']; ?>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="homepage" data-lang="M02184"><?php echo $translations['M02184'][$language] /* Home */ ?></a>
        </div>
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="foodMenu" data-lang="M02806"><?php echo $translations['M02806'][$language] /* Menu */ ?></a>
        </div>
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="career" data-lang="M03792"><?php echo $translations['M03792'][$language] /* Our Career */ ?></a>
        </div>
    </div>
    <div id="sidebarBG" class="transparentBG" onclick="hideSidebar()">
        <div id="closeButton" class="closeSidebar"> <i class="fa fa-times menuIcon"></i></div>
    </div>
</section>