<section class="dashboardHeader homepageHeader">
    <div class="kt-container p-0 m-0"> 
        <div class="col-md-12 headerDiv">
            <div class="row justify-content-between p-0 m-0">
                <!-- Welcome User -->
                <div class="col-md-4 centerText pl-4 py-2">
                    <p class="boldBlack text-left p-0 m-0 h5"><?php echo $translations['M01445'][$language]; /* Welcome Back */?>, <?php echo $_SESSION['name'] ?></p>
                </div>
                <!-- Day Date Time -->
                <div class="col-md-4 centerText py-2">
                    <p class="thinBlack text-center p-0 m-0 h5">Sunday, 18 November 2021, 16:16:07</p>
                </div>
                <!-- User -->
                <div class="col-md-4 borderLeft py-2">
                    <div class="row p-0 m-0">
                        <!-- Profile Picture -->
                        <div class="col-md-3 centerText">
                            <img class="headerImg" src="images/project/profilePic1.png" alt="Profile Picture">
                        </div>
                        <!-- Username -->
                        <div class="col-md-6 text-center p-0 centerText">
                            <p class="m-0 boldBlack h5"><?php echo $_SESSION['name'] ?></p>
                        </div>
                        <!-- Dropdown Menu -->
                        <div class="col-md-3 header_menu_div blackFont">
                            <a href="javascript:;" class="btn menuBtn headerMenuDropdown d-flex justify-content-center">
                                <p class="headerMenuIcon centerText blackFont">&gt;</p>
                            </a>
                            <div class="headerMenuDropdownBox right">
                                <a href="#" class="btn menuDropdownBtn changeLanguage blackFont sidebarFont">My Profile</a>
                            </div>
                        </div>
                        <!-- <div class="mobileHamburger header_menu_div">
                            <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>  
                        </div> -->
                    </div>
                </div>
                <!-- <div class="col-md-2 header_menu_div blackFont mx-0 btn-group homepage_header_lang">
                    <span type="" class="dropdown-toggle languageFont btn btn-default login d-flex align-items-center blackFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                        <i class="bi-globe mr-2"></i>
                        <?php echo $config["languages"][$language]['displayName'] ?>
                    </span>
                    <div class="dropdown-menu dropdown_language login" x-placement="bottom-end">
                        <?php $languages = $config['languages']; ?>
                        <?php foreach($languages as $key => $value) {  ?>
                           <a href="javascript:;" class="btn menuDropdownBtn changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                             <?php echo $languages[$key]['displayName']; ?>
                            </a>
                      <?php
                          }
                      ?>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="dashboardHeader homepageHeaderMobile">
    <div class="kt-container">
        <div class="d-flex justify-content-end">
            <div class="header_menu_div text-center">
                <a href="homepage.php">
                    <img src="images/project/companyLogoText.png" class="homepage_header_logo">
                </a>
            </div>
            <div class="justify-content-center d-flex">
                <!-- <div class="header_menu_div justify-content-center blackFont mx-0 px-0 btn-group d-block">
                    <span type="" class="dropdown-toggle d-flex align-items-center  blackFont p-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                        <i class="fas fa-globe fa-lg"></i>
                    </span>
                    <div class="dropdown-menu" x-placement="bottom-end">
                        <?php $languages = $config['languages']; ?>
                        <?php foreach($languages as $key => $value) { 
                            if ($key=="chineseSimplified") {
                                $flag="chinese";
                            }else if ($key == "korean"){
                                $flag="korean";
                            }else if ($key == "thailand"){
                                $flag="thai";
                            }else if ($key=="chineseTraditional"){
                                $flag="taiwan";
                            }else if ($key == "vietnam"){
                                $flag="vietnam";
                            }else if ($key == "japanese"){
                                $flag="japanese";
                            }else if($key == 'english'){
                                $flag="english";
                            }else if($key == 'malay'){
                                $flag="indonesia";
                            } ?>

                           <a href="javascript:;" class="btn menuDropdownBtn changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                             <?php echo $languages[$key]['displayName']; ?>
                            </a>
                      <?php
                          }
                      ?>
                    </div>
                </div> -->
                <div class="col-md-3 centerText">
                    <img class="headerImg" src="images/project/profilePic1.png" alt="Profile Picture">
                </div>
                <!-- Username -->
                <div class="col-md-6 text-center p-0 centerText">
                    <p class="m-0 boldBlack h5">Director123</p>
                </div>
                
                <div class="col-md-6 text-center p-0 centerText" onclick="showSidebar()">
                    <p class="m-0 boldBlack h5">☰</p>
                </div>
            </div>
        </div>

    </div>
    <div id="sidebarBG" class="transparentBG" onclick="hideSidebar()">
    </div>
    <div id="sidebar" class="mobileSidebar">
        <div id="closeButton" class="closeSidebar blackFont" onclick="hideSidebar()">&times;</div>
        <div class="text-center my-4">
            <img src="images/project/companyLogoText.png" class="homepage_header_logo">
        </div>
        <div class="borderline2 mb-4 p-0"></div>
        <div id="sidebar-menu mb-4">
            <ul class="list-unstyled text-left p-0">
                <li class="sideBarList2 whiteFont">
                    <div class="activeSidebarDiv">
                        <div class="px-4">
                            <div class="activeSidebar px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-list dashboardIcon whiteFont"></i>
                                <p class="dashboardText whiteFont"><?php echo $translations['M00126'][$language]; /* Dashboard */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-envelope-open-text dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M03117'][$language]; /* New Order */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-archive dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M02281'][$language]; /* My Order History */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-cog dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M02300'][$language]; /* Edit Profile */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="pl-1 fas fa-volume-off fa-lg dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M03118'][$language]; /* Network Display */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-user-friends dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M03119'][$language]; /* Activity Report */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-layer-group dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M03120'][$language]; /* Ticketing */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sideBarList2 grayFont">
                    <div class="inactiveSidebarDiv">
                        <div class="px-4">
                            <div class="px-4 py-2">
                                <a href="#" class="navigation">
                                <i class="fas fa-sign-out-alt dashboardIcon grayFont"></i>
                                <p class="dashboardText grayFont"><?php echo $translations['M00022'][$language]; /* Logout */?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="dashboardFooter2 mt-4">
            <p class="blackFont dashboardFooterText">2021 &copy; <?php echo $translations['M03114'][$language]; /* Metafiz */?>. <?php echo $translations['M00153'][$language]; /* All Rights Reserved */?>.</p>
        </div>
    </div>
</section>

<script>
    //SIDEBAR
    var sidebarBG = document.getElementById("sidebarBG");
    var sidebar = document.getElementById("sidebar");
    var closeButton = document.getElementById("closeButton");
    function showSidebar(){        
        sidebarBG.style.display = "block";
        sidebar.style.left = "0";
        sidebar.style.transition = "0.3s ease";
        closeButton.style.left = "73%";
        closeButton.style.transition = "0.3s ease";    

    }
    function hideSidebar(){        
        sidebarBG.style.display = "none";
        sidebar.style.left = "-80%";
        sidebar.style.transition = "0.3s ease";
        closeButton.style.left = "-73%";
        closeButton.style.transition = "0.3s ease";

    }
</script>