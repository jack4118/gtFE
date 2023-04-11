<div class="left side-menu">
    <div class="mobileSidebar">
        <div class="sidebar-inner sideBarScroll" style="overflow-y: auto;">
            <a href="homepage.php"><img class="dashboardLogo" src="images/project/companyLogo2.png" alt="Company Logo"></a>
            <!--- Sidemenu -->
            <div id="sidebar-menu mb-4" style="margin-top:15%;">
                <ul class="list-unstyled text-left p-0">
                    <li class="sideBarList whiteFont">
                        <div class="sidebarDiv selected">
                            <div class="px-4">
                                <div class="px-4 py-2">
                                    <a href="#" class="navigation">
                                        <i class="fas fa-list dashboardIcon grayFont"></i>
                                        <p class="dashboardText grayFont"><?php echo $translations['M00126'][$language]; /* Dashboard */?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
                            <div class="px-4">
                                <div class="px-4 py-2">
                                    <a href="transactionHistory.php" class="navigation">
                                        <i class="fas fa-envelope-open-text dashboardIcon grayFont"></i>
                                        <p class="dashboardText grayFont"><?php echo $translations['M00156'][$language]; /* My Wallet */?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
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
                    <li class="sideBarList grayFont">
                        <div class="sidebarDiv">
                            <div class="px-4">
                                <div class="px-4 py-2">
                                    <a href="javascript:;" onclick="beforeLogout()" class="navigation">
                                        <i class="fas fa-sign-out-alt dashboardIcon grayFont"></i>
                                        <p class="dashboardText grayFont"><?php echo $translations['M00022'][$language]; /* Logout */?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dashboardFooter mt-4">
                <p class="blackFont dashboardFooterText">2021 &copy; <?php echo $translations['M03114'][$language]; /* Metafiz */?>.</p>
                <p class="blackFont dashboardFooterText"><?php echo $translations['M00153'][$language]; /* All Rights Reserved */?>.</p>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
</div>




<?php include 'logout.js'; ?>