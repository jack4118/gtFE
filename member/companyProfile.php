<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageHeader.php';?>

<!-- Banner -->
<div>
    <div class="banner productListingPortfolioBanner">
        <img class="bannerImg compProf m-0 p-0" src="images/project/products2.jpg" alt="companyProfileBanner">
        <!-- <img class="bannerImg3" src="./images/project/companyLogo2.png" alt="Logo"> -->
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03104"><?php echo $translations['M03104'][$language]; /* Company Profile */?></label>
            <!-- <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang=:M03116><?php echo $translations['M03116'][$language]; /* Who We Are */?></span>
            </div> -->
        </div>
    </div>
    
</div>

<div class="homepagePadding">
    <!-- About Metafiz -->
    <div class="col-12 pb-3">
        <div class="row my-4 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-6 aboutImageDiv">
                <img class="aboutImage" src="images/project/metafizBuilding.jpg" alt="About Metafiz">
            </div>
            <div class="col-md-6 col-lg-6 mt-4 mt-md-0 aboutContentDivRight pl-lg-5">
                <div class="aboutTitle2">
                    <?php echo $translations['M03464'][$language]; //About Metafiz ?>
                </div>
                <div class="aboutContent2">
                    <p><b><?php echo $translations['M03465'][$language]; ?></b> <?php echo $translations['M03466'][$language]; ?> <b><?php echo $translations['M03465'][$language]; ?></b> <?php echo $translations['M03467'][$language]; ?></p>
                </div>
            </div>
        </div>
        <div class="row my-4 aboutDiv justify-content-center align-items-center">
            <div class="col-md-6 col-lg-6 aboutContentDivLeft pr-lg-5">
                <div class="aboutTitle">
                    <?php echo $translations['M03468'][$language]; //Geetings ?>
                </div>
                <div class="aboutContent">
                    <p><b><?php echo $translations['M03469'][$language]; ?></b> <?php echo $translations['M03470'][$language]; ?></p>
                    <!-- <?php echo $translations['M03471'][$language]; //Ryan Maharyadi ?><br>
                    <?php echo $translations['M03472'][$language]; //Director of PT. META FIZ INTERNASIONAL ?> -->
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mt-4 mt-md-0 aboutImageDiv">
                <img class="aboutImage" src="images/project/buildingImage.jpg" alt="About Metafiz">
            </div>
        </div>
    </div>

    <!-- Metafiz Details -->
    <div class="col-12 pb-3">
        <div class="row my-md-5 justify-content-center">
          <div class="col-12">
                <div class="row">
                      <div class="col-lg-6 col-md-6 p-1">
                            <div class="blockWrapper">
                                <div class="row compDiv m-2">
                                    <div class="col-2">
                                        <img class="compImage" src="images/project/icon1.png" alt="Vision">
                                    </div>
                                    <div class="col">
                                        <div class="compTitle"><?php echo $translations['M03499'][$language]; //Vision ?></div>
                                        <div class="compContent"><?php echo $translations['M03500'][$language]; //To become trusted company that can always be relied on who will always provide quality and legitimate product, also business opportunity ?></div>
                                    </div>
                                </div>
                                <div class="row compDiv m-2 lastBlock">
                                    <div class="col-2">
                                        <img class="compImage" src="images/project/icon3.png" alt="Company's Culture">
                                    </div>
                                    <div class="col">
                                        <div class="compTitle"><?php echo $translations['M03501'][$language]; //Company's Culture ?></div>
                                        <div class="compContent"><?php echo $translations['M03502'][$language]; //Active!, Develop! & Appropriate! ?></div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 p-1">
                            <div class="blockWrapper">
                                <div class="row compDiv m-2">
                                    <div class="col-2">
                                        <img class="compImage" src="images/project/icon4.png" alt="Mission">
                                    </div>
                                    <div class="col">
                                        <div class="compTitle"><?php echo $translations['M03505'][$language]; //Mission ?></div>
                                        <div class="compContent"><?php echo $translations['M03506'][$language]; //Provide assistance to empowering people's potential in order to reach their goals ?></div>
                                    </div>
                                </div>
                                <div class="row compDiv m-2 lastBlock">
                                    <div class="col-2">
                                        <img class="compImage" src="images/project/icon2.png" alt="Company's Value">
                                    </div>
                                    <div class="col">
                                        <div class="compTitle"><?php echo $translations['M03503'][$language]; //Company's Value ?></div>
                                        <div class="compContent"><?php echo $translations['M03504'][$language]; //Trusted, Quality & Worthwhile ?></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                </div>
              </div>
        </div>
    </div>

    <!-- Video -->
    <!-- <div class="col-12 pb-3">
        <div class="my-md-5 text-center">
            <video controls class="compVideo">
                <source src="https://scontent-speed101.sgp1.cdn.digitaloceanspaces.com/ME78TAFyfIpsZfD4/profile.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div> -->
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
<script>
    
</script>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<!-- <div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div> -->



<script>
    
</script>