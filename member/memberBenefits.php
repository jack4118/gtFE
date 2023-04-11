<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageHeader.php';?>

<!-- Banner -->
<div>
    <div class="banner productPortfolioBanner">
        <img class="bannerImg m-0 p-0" src="images/project/benefitBanner.jpg" alt="companyProfileBanner">
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03105"><?php echo $translations['M03105'][$language]; /* Member Benefits */?></label>
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
                <img class="aboutImage" src="images/project/aboutUs.jpg" alt="About Metafiz">
            </div>
            <div class="col-md-6 col-lg-6 mt-4 mt-md-0 aboutContentDivRight pl-lg-5">
                <div class="aboutTitle2" data-lang="M03105">
                    <?php echo $translations['M03105'][$language]; /* Member Benefits */?>
                </div>
                <div class="aboutContent2">
                    <ul class="homepage_section04_list pl-0">
                        <li>
                            <?php echo $translations['M03357'][$language]; /* 25% Entrepreneur Instant Profit */?> 
                        </li>
                        <li>
                            <?php echo $translations['M03358'][$language]; /* Entrepreneur Personal Group Sale Bonus */?> 
                        </li>
                        <li>
                            <?php echo $translations['M03359'][$language]; /* Fiz Executive Group Bonus (Generation) */?> 
                        </li>
                        <li>
                            <?php echo $translations['M03360'][$language]; /* Fiz Director Group Bonus (Generation) */?> 
                        </li>
                        <li>
                            <?php echo $translations['M03361'][$language]; /* Yearly Metafiz Cash Reward */?> 
                        </li>
                        <li>
                            <?php echo $translations['M03362'][$language]; /* Car & Motorcycle Program */?>  
                        </li>
                        <li>
                            <?php echo $translations['M03363'][$language]; /* Travelling Program & Recognitiont */?> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="col-12 pb-3">
        <div class="my-md-5 text-center">
            <img class="compVideo" src="images/project/benefitVideo.jpg" alt="Company Video">
            <!-- <video controls class="compVideo">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video> -->
        </div>
    </div>
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