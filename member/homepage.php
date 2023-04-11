<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageHeader.php';?>

<div id="popUpModal" class="popUpModal modal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="exampleModalLabel" style="display: none;">
    <button type="button" class="close popUpModalClose" data-dismiss="modal" aria-label="Close">&times;</button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center" style="overflow-y: auto; background-color: #000;">
                <div id="buildMemo"></div>
            </div>
        </div>
    </div>
</div>

<div class="kt-container px-0">
    <section id="bannerSection" class="homepage_section01 homepagePadding" style="display: none;">
        <div id="banners" class="slideshow-container">
            <!-- <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03344'][$language]; /* Connecting Your Dreams And Make It Come True */?>
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div><?php echo $translations['M03345'][$language]; /* Bisnis kekinian dengan konsep "Sosial Selling & Networking" */?></div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="publicRegistration.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03346'][$language]; /* Join Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03347'][$language]; /* Aesira Ina Diffuser */?>
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div><?php echo $translations['M03348'][$language]; /* Diffuser pertama di Dunia yang dengan sentuhan islami anak dan 7 batu turmalin didalamnya */?></div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="productListing.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03349'][$language]; /* Shop Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner2.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03350'][$language]; /* Aesira Tourmaline Diffuser */?>
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div><?php echo $translations['M03348'][$language]; /* Diffuser pertama di Dunia yang dengan sentuhan islami anak dan 7 batu turmalin didalamnya */?></div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="productListing.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03349'][$language]; /* Shop Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner3.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03351'][$language]; /* Tanoshi Foot Spa */?>  
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div><?php echo $translations['M03352'][$language]; /* Kombinasi Pijatan dan rendaman air hangat yang akan membawa Anda kedalam tidur yang berkualitas */?>  </div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="productListing.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03349'][$language]; /* Shop Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03353'][$language]; /* Aesira Essential Oil */?>  
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div>
                                    <?php echo $translations['M03354'][$language]; /* Breath Happily, Focus Better, Quality Sleep and Protection */?> 
                                </div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="productListing.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03349'][$language]; /* Shop Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner5.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="homepage_slide fading">
                <div class="row mx-0">
                    <div class="col-md-6 col-lg-7 p-md-5">
                        <div class="homepage_section01_title">
                            <?php echo $translations['M03355'][$language]; /* This is Litteraly Soft Launching Promo */?> 
                        </div>
                        <div class="mt-md-4 mt-2 homepage_section01_content">
                            <div>
                                <div>
                                    <?php echo $translations['M03356'][$language]; /* Jangan sampai lepas */?> !!!
                                </div>
                            </div>
                        </div>
                        <div class="mt-md-5 mt-3 homepage_section01_button">
                            <a href="productListing.php" class="btn btn-primary letterSpace">
                                <?php echo $translations['M03349'][$language]; /* Shop Now */?>
                            </a>
                        </div>
                    </div>
                    <div class="mt-5 mt-md-0 col-md-6 col-lg-5">
                        <img class="homepage_section01_image" src="/images/project/banner6.jpg" alt="">
                    </div>
                </div>
            </div> -->
            <!-- <a class="slidePrev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="slideNext" onclick="plusSlides(1)">&#10095;</a> -->
        </div>
        <br>

        <div id="bannerDots" class="text-center">
          <!-- <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span> 
          <span class="dot" onclick="currentSlide(6)"></span> -->
        </div>
    </section>

    <section class="homepage_section02 homepagePadding mt-2">
        <div class="homepage_section02_title mt-4 mb-3"><?php echo $translations['M03115'][$language]; /* Discover Our Products */?></div>
        <div class="homepage_product_div">  
            <div class="row">
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="row">
                        <div class="col-md mb-3 mb-md-0">
                            <div class="homepage_product">
                                <img class="homepage_section02_image" src="/images/project/wallClock2.jpg" alt="Wall Clock">
                                <div class="homepage_section02_content">
                                    <?php echo $translations['M03480'][$language]; /* INA Diffuser */?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md mb-3 mb-md-0">
                            <div class="homepage_product">
                                <img class="homepage_section02_image" src="/images/project/vacuum.jpg" alt="Vacuum">
                                <div class="homepage_section02_content">
                                    <?php echo $translations['M03478'][$language]; /* Vacuum */?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="d-none d-md-block" style="height: 1px; background: #ccc;"></div>
                    <div class="row">
                        <div class="col-md mb-3 mb-md-0">
                            <div class="homepage_product">
                                <img class="homepage_section02_image" src="/images/project/diffuserTourmalineBlue.jpg" alt="Diffuser">
                                <div class="homepage_section02_content">
                                    <?php echo $translations['M03479'][$language]; /* Tourmaline Diffuser */?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md mb-3 mb-md-0">
                        <div class="homepage_product">
                                <img class="homepage_section02_image" src="/images/project/essentialOil.jpg" alt="Essential Oil">
                                <div class="homepage_section02_content">
                                    <?php echo $translations['M03477'][$language]; /* Essential Oil */?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md h-100 d-flex flex-column">
                        <img class="homepage_section02_image" src="/images/project/footSpa.jpg" alt="Foot Spa" style="flex: 1">
                        <div class="homepage_section02_content">
                            <?php echo $translations['M03481'][$language]; /* Foot Spa */?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 homepage_section03 homepagePadding">
        <div class="homepage_section03_content_div">
            <div class="row mx-0">
                <div class="col-lg-6 px-0">
                    <div class="homepage_section03_video_div">
                        <video controls class="homepage_section03_video">
                            <source src="https://scontent-speed101.sgp1.cdn.digitaloceanspaces.com/ME78TAFyfIpsZfD4/Product_Metafiz_Rev_Aset.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-lg-6  px-0 d-flex align-items-center">
                    <div class="p-3 p-md-5">
                        <div class="homepage_section03_content">
                            <!-- <?php echo $translations['M03473'][$language]; ?> -->
                            <p><b><?php echo $translations['M03482'][$language]; ?></b> <?php echo $translations['M03483'][$language]; ?></p>
                            <p><?php echo $translations['M03484'][$language]; ?></p>
                            <p><?php echo $translations['M03485'][$language]; ?></p>
                            <p><?php echo $translations['M03486'][$language]; ?></p>
                        </div>
                        <!-- <div class="mt-3 mt-md-5 homepage_section03_title">Tanoshi Foot Spa</div> -->
                        <!-- <div class="mt-1 homepage_section03_date thin">Since 2017</div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="homepage_section04 homepagePadding">
        <div class="homepage_section02_title mb-3" data-lang="M03105"><?php echo $translations['M03105'][$language]; /* What Do We Offer */?></div>
        <div class="row">
            <div class="col-md">
                <video height="100%" width="100%" controls>
                    <source src="https://scontent-speed101.sgp1.cdn.digitaloceanspaces.com/ME78TAFyfIpsZfD4/KANG_ROMY_PELUANG_BISNIS_REV.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <div class="col-md mt-4 mt-md-0">
                <ul class="homepage_section04_list">
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
    </section> -->

    <section class="homepage_section05 homepagePadding">
        <div class="pt-5 homepage_section02_title homepage_section05_margin_bottom text-center">
            <?php echo $translations['M03281'][$language]; /* Don't miss our update */?>.<br>
            <?php echo $translations['M03282'][$language]; /* Subscribe us for more info */?>.
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="homepage_section05_email_div mt-4 mb-5">
                    <i class="fa fa-envelope fa-lg homepage_section05_icon mx-3"></i>
                    <input class="homepage_section05_input" type="email" placeholder="<?php echo $translations['M03285'][$language]; /* Enter your email address */?>">
                    <button class="btn btn-primary homepage_section05_button">JOIN NOW</button>
                </div>
            </div>
        </div> -->
        <div class="borderline"></div>
    </section>
</div>

<?php include 'homepageFooter.php' ?>
    <section class="homepage_section05 homepagePadding mt-0">
        <div class="text-center mb-4">
            <img src="images/project/Visa_logo.png" width="80px" class="mx-5">
            <img src="images/project/Mastercard_logo.png" width="80px" class="mx-5">
        </div>  
    </section>
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
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var slideIndex = 1;
var memoURL = "<?php echo $config['tempMediaUrl']; ?>";

$(document).ready(function(){
    var formData  = {
        command: 'getDashboardBanner'
    };
    var fCallback = loadBanner;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    var formData  = {
        command: 'memberGetMemoList'
    };
    var fCallback = loadMemo;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    if("<?php echo $_SESSION['memo']; ?>") {
      $('#popUpModal').modal('show');

      "<?php unset($_SESSION['memo']); ?>"
    }
});


function loadBanner(data, message) {
    if(data.bannerData){
        var dashboardBannerHTML = '';
        var bannerDotsHTML = '';
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var today = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
        $.each(data.bannerData, function(k, v) {
            var startDate = v['start_date'];
            var endDate = v['end_date'];
            // if(Date.parse(startDate) <= Date.parse(today) && Date.parse(endDate) >= Date.parse(today)){
                bannerDotsHTML += `<span class="dot" onclick="currentSlide(${k+1})"></span> `;
                dashboardBannerHTML +=  `
                                        <div class="homepage_slide fading">
                                            <div class="row mx-0">
                                                <div class="col-md-6 col-lg-5 p-md-5">
                                                    <div class="homepage_section01_title">
                                                        ${v['subject']}
                                                    </div>
                                                    <div class="mt-md-4 mt-2 homepage_section01_content">
                                                        <div>
                                                            <div>${v['description']}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5 mt-md-0 col-md-6 col-lg-7">
                                                    <a href="${v['page']}"><img class="homepage_section01_image" src="<?php echo $config['tempMediaUrl'] ?>${v['upload_name']}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        `;
            // }
        });
        
        dashboardBannerHTML += `
            <a class="slidePrev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="slideNext" onclick="plusSlides(1)">&#10095;</a>
            `;

        $("#banners").html("");
        $("#banners").html(dashboardBannerHTML);

        $("#bannerDots").html(bannerDotsHTML)
        showSlides(slideIndex);
        $(".homepage_section02").removeClass('mt-2');
        $("#bannerSection").show();
    }
    else{
    }
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("homepage_slide");
    var slideLines = document.getElementsByClassName("dot");
    if (n > slides.length) {
        n = 1;
        slideIndex = 1;
    }    
    if (n < 1) {
        n = slides.length;
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < slideLines.length; i++) {
        slideLines[i].classList.remove("active");
    }
    slides[n-1].style.display = "block";  
    slideLines[n-1].classList.add("active");
}

function loadMemo(data, message){
    
    if (sessionStorage["publicMemoShown"] != 'yes') {
        if (data.memo.length > 0) {
            var buildMemo = "";

            if (data.memo.length == 1) {
                $.each(data.memo, function(k, v) {
                    buildMemo += `
                        <div>
                            <img class="mySlides" src="${memoURL+v['upload_name']}" style="width:100%;">
                        </div>
                    `;
                });
            } else if (data.memo.length > 1) {
                $.each(data.memo, function(k, v) {

                    if (k == 0) {
                        buildMemo += `
                            <div>
                                <img class="mySlides" src="${memoURL+v['upload_name']}" style="width:100%;">
                            </div>
                        `;
                    } else {
                        buildMemo += `
                            <img class="mySlides" src="${memoURL+v['upload_name']}" style="display: none;width:100%;">
                            
                        `;
                    }
                });

                buildMemo += `
                    <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                `;
            }

            $("#buildMemo").html(buildMemo);
            $("#popUpModal").modal();
        }
        sessionStorage["publicMemoShown"] = 'yes';
    }
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }

  if (x[slideIndex-1]) {
    x[slideIndex-1].style.display = "block";
  }
  
}
</script>