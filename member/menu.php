<div class="headerMenu p-3">
    <div class="row align-items-center">
        <div class="col-md-4 text-left d-none d-md-inline-block">
            <div class="menuUsername boldBlack"><?php echo $translations['M01445'][$language]; /* Welcome Back */?>, <?php echo $_SESSION['name'] ?></div>
            <div class="thinBlack currentTime"></div>
        </div>
        <div class="col-md-8">
            <div class="d-flex justify-content-end align-items-center">
                <div class="">
                    <a href="productListing" class="btn btn-primary">
                        <?php echo $translations['M03517'][$language]; /* Buy Product */?>
                    </a>
                </div>
                <div class="ml-3 position-relative d-none d-lg-inline-block">
                    <a href="javascript:;" class="btn showDropdown dropbtn">
                        <?php echo $config["languages"][$language]['displayName'] ?>
                        <i class="fas fa-caret-down dropdownIcon"></i>
                    </a>
                    <div class="dropdown-content dropdownContent">
                        <?php $languages = $config['languages']; ?>
                        <?php foreach($languages as $key => $value) {  ?>
                            <!-- <div class="headerMenuDropdownItem"> -->
                                <a href="javascript:;" class="btn menuDropdownBtn changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                    <?php echo $languages[$key]['displayName']; ?>
                                </a>
                            <!-- </div> -->
                        <?php } ?>
                    </div>
                </div>
                <div class="d-lg-none">
                    <i class="fa fa-bars btn headerBurgerBtn pr-0"></i>
                    <div class="homepageHeaderBlackBG">
                        <i class="fa fa-times headerMenuClose"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <section class="homepageHeaderMobile">
    <div class="kt-container">
        <div class="col-12">
            <div class="row">
                <div class="col-4 align-self-center">
                    <img src="images/project/companyLogoText.png" style="width: 100%">
                </div>
                <div class="col-8 align-self-center">
                    <div class="row justify-content-end">
                        <div class="align-self-center mr-3">
                            <span class="dropdown-toggle languageFont btn d-flex align-items-center" data-toggle="dropdown" style="cursor: pointer;">
                                <?php echo $config["languages"][$language]['displayName'] ?>
                            </span>
                            <div class="dropdown-menu walletDropdown" role="menu">
                                <?php $languages = $config['languages']; ?>
                                <?php foreach($languages as $key => $value) { 
                                    if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                                        $flag="chinese";
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
                                    }else if($key == 'malay'){
                                        $flag="indonesia";
                                    } ?>

                                    <a href="javascript:;" class="dropdown-item" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                        <?php echo $languages[$key]['displayName']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="align-self-center mr-3">
                            <a href="javascript:;" onclick="beforeLogout()" class="btn">
                                <i class="fa fa-user fa-lg header_menu_div blackFont" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-bars headerBurgerBtn"></i>
                            <section class="homepageHeaderBlackBG">
                                <i class="fa fa-times headerMenuClose"></i>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->