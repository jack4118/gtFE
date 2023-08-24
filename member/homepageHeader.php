<section class="section headerMenu homepageHeader d-none d-md-block py-1" style="background-color: #fff;">
    <div class="kt-container">
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-2">
                    <a href="homepage">
                        <?php 
                            if(strtolower($language) == "english")$logo_path =  "images/project/logo-colour2.png";
                            else $logo_path =  "images/project/logo_chinese.png";?>
                        <img src="<?php echo $logo_path?>" class="homepage_header_logo" width="200px" style="padding: 2px;">
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
                        <?php if ($_SESSION['userID']) { ?>
                            <a class="dropbtn px-0 mr-3 wishlistIcon" href="wishlist">
                                <img src="images/project/star-icon2.png" width="20px">
                            </a>
                            <a class="dropbtn px-0 mr-3 favouriteIcon" href="favourite">
                                <img src="images/project/love-icon.png" width="20px">
                            </a>
                        <?php } ?>
                        <a class="dropbtn px-0 mr-3 cartIcon" href="reviewOrder">
                            <img src="images/project/cart-icon.png" width="20px">
                        </a>
                        <a class="dropbtn showDropdown px-0"><img src="images/project/language-icon.png" width="20px"></a>

                        <div class="dropdown-content dropdownContent">
                            <?php foreach ($config['languages'] as $key => $displayName) { ?>
                                <?php $isoCode = isset($languageArr[$key]['isoCode']) ? $languageArr[$key]['isoCode'] : ''; ?>
                                <a href="javascript:;" class="btn menuDropdownBtn bodyText smaller changeLanguage"
                                language="<?php echo $key; ?>"
                                languageISO="<?php echo $isoCode; ?>">
                                    <?php echo htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8'); ?>
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
    <div class="section whiteBg py-0">
        <div class="kt-container row align-items-center">
            <div class="col-7 px-0">
                <a href="homepage">
                    <?php 
                        if(strtolower($language) == "english")$logo_path =  "images/project/logo-colour2.png";
                        else $logo_path =  "images/project/logo_chinese.png";
                    ?>
                    <img src="<?php echo $logo_path?>" class="homepage_header_logo" width="200px">
                </a>
            </div>
            <div class="col-5 px-0 d-flex justify-content-end">
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

    <div id="sidebar" class="mobileSidebar">
        <div class="text-center mt-4">
            <?php 
                if(strtolower($language) == "english")$logo_path =  "images/project/logo-colour2.png";
                else $logo_path =  "images/project/logo_chinese.png";
            ?>
            <a href="homepage"><img class="sidebarLogo" src="<?php echo $logo_path?>" width="180px"></a>
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
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="homepage" data-lang="M02184"><?php echo $translations['M02184'][$language] /* Home */ ?></a>
        </div>
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="foodMenu" data-lang="M02806"><?php echo $translations['M02806'][$language] /* Menu */ ?></a>
        </div>
        <div class="my-3 px-4 text-left blackFont btn-group">
            <a class="dropbtn showDropdown bodyText smaller px-0" href="career" data-lang="M03792"><?php echo $translations['M03792'][$language] /* Our Career */ ?></a>
        </div>
        <div class="my-3 px-4">
            <?php if ($_SESSION['userID']) { ?>
                <a class="dropbtn px-0 mr-3 wishlistIcon" href="wishlist"><img src="images/project/star-icon2.png" width="20px"></a>
                <a class="dropbtn px-0 mr-3 favouriteIcon" href="favourite"><img src="images/project/love-icon.png" width="20px"></a>
            <?php } ?>
            <a class="dropbtn px-0 mr-3 cartIcon" href="reviewOrder">
                <img src="images/project/cart-icon.png" width="20px">
            </a>
            <a class="dropbtn px-0 showDropdown"><img src="images/project/language-icon.png" width="20px"></a>
            <div class="dropdown-content dropdownContent">
                <?php foreach ($config['languages'] as $key => $displayName) { ?>
                    <?php $isoCode = isset($languageArr[$key]['isoCode']) ? $languageArr[$key]['isoCode'] : ''; ?>
                    <a href="javascript:;" class="btn menuDropdownBtn bodyText smaller changeLanguage"
                    language="<?php echo $key; ?>"
                    languageISO="<?php echo $isoCode; ?>">
                        <?php echo htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                    
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="sidebarBG" class="transparentBG" onclick="hideSidebar()">
        <div id="closeButton" class="closeSidebar"> <i class="fa fa-times menuIcon"></i></div>
    </div>
</section>