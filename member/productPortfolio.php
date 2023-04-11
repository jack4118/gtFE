<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php'
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Page Content -->
<div class="kt-container px-0">
    <div class="banner productListingPortfolioBanner">
        <img src="/images/project/products2.jpg" class="bannerImg">
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03106"><?php echo $translations['M03106'][$language]; /* Product Portfolio */?></label>
            <!-- <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang="M03106"><?php echo $translations['M03106'][$language]; /* Product Portfolio */?></span>
            </div> -->
        </div>
    </div>

    <div class="productPortfolio_section01">
        <div class="row justify-content-center" style="margin: auto;">
            <div class="col-md-10 productPortfolio_section01_title" data-lang="">
                <?php echo $translations['M03200'][$language]; //Pure single or pure essential oil blend has a strong and distinctive aroma characteristic for each type. ?><br>
                <?php echo $translations['M03498'][$language]; ?>
            </div>
        </div>
        <div class="row productPortfolio_section01_Div">
            <div class="col-md-3 order-2 order-md-1">
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio1.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03201"><?php echo $translations['M03201'][$language]; //Improves focus ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio2.png" class="productPortfolio_section01_Img light"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03202"><?php echo $translations['M03202'][$language]; //Helps digestion ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio3.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03206"><?php echo $translations['M03206'][$language]; //Improve the mood ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio4.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03204"><?php echo $translations['M03204'][$language]; //Help cure flu and relax muscles ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
            </div>
            <div class="col-md-6 order-3 order-md-2">
                <img src="/images/project/product-portfolio2.png" class="productBenefitImg">
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="productPortfolio_section01_Desc">
                            <div><img src="/images/project/cough.png" class="productPortfolio_section01_Img"></div>
                            <div class="productPortfolio_section01_Desc_Title" data-lang="M03204"><?php echo $translations['M03204'][$language]; //Help cure flu and relax muscles ?></div>
                            <div>Lorem Ipsum is simply dummy text of the printing</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="productPortfolio_section01_Desc">
                            <div><img src="/images/project/coronavirus.png" class="productPortfolio_section01_Img"></div>
                            <div class="productPortfolio_section01_Desc_Title" data-lang="M03205"><?php echo $translations['M03205'][$language]; //Protect from bacteria, viruses and immune system ?></div>
                            <div>Lorem Ipsum is simply dummy text of the printing</div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-md-3 order-1 order-md-3">
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio5.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03205"><?php echo $translations['M03205'][$language]; //Reducing levels of the stress hormone cortisol ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio6.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03207"><?php echo $translations['M03207'][$language]; //Maintain sleep quality ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio7.png" class="productPortfolio_section01_Img light"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03208"><?php echo $translations['M03208'][$language]; //Maintain appetite ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
                <div class="productPortfolio_section01_Desc">
                    <div><img src="/images/project/pPortfolio8.png" class="productPortfolio_section01_Img"></div>
                    <div class="productPortfolio_section01_Desc_Title" data-lang="M03203"><?php echo $translations['M03203'][$language]; //Protect from bacteria, viruses and immune system ?></div>
                    <!-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="productPortfolio_section02">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="pr-md-3 pr-0">
                    <div class="productPortfolio_section02_title">
                        <?php echo $translations['M03209'][$language]; //We use ?><!--  <span class="productPortfolio_title_special"><?php echo $translations['M03210'][$language]; //high quality ?></span> <?php echo $translations['M03211'][$language]; //and ?> <span class="productPortfolio_title_special"><?php echo $translations['M03212'][$language]; //certified product ?></span> <?php echo $translations['M03213'][$language]; //from the USA ?> -->
                    </div>
                    <div class="mt-4 portfolioContentText">
                        <?php echo $translations['M03488'][$language]; ?>
                    </div>
                    <!-- <div class="mt-4 d-flex">
                        <a href="productListing.php" class="btn btn-primary btn_section02 primary letterSpace mr-3" data-lang="M00927"><?php echo $translations['M00927'][$language]; //More Info ?></a>
                        <button onclick="loadCatalogue()" class="btn btn-primary btn_section02 secondary letterSpace" data-lang="M03214"><?php echo $translations['M03214'][$language]; //Product List ?></button>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 col-lg-6 mt-5 mt-md-0">
                <!-- <img src="/images/project/video3.jpg" style="width: 100%"> -->
                <video controls style="width: 100%">
                    <source src="https://scontent-speed101.sgp1.cdn.digitaloceanspaces.com/ME78TAFyfIpsZfD4/FOOT_SPA_WITH_MODEL.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <!-- <div class="productPortfolio_section03 homepagePadding">
        <div class="text-center">
            <div class="homepage_section02_title" data-lang="M03215">
                <?php echo $translations['M03215'][$language]; //Popular Products ?>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="row justify-content-center" id="buildProduct"></div>
        </div>
    </div> -->

    <div class="productPortfolio_section04">
        <div class="row" style="margin: auto;">
            <div class="col-md-6 alignMiddle" style="padding: 0;">
                <div class="row justify-content-center" style="margin: auto;">
                    <div class="col-md-10">
                        <img src="/images/project/holding-droppper2.png" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <div class="row justify-content-center" style="margin: auto;">
                    <div class="col-md-10">
                        <div class="productPortfolio_section02_title">
                            <!-- <span class="productPortfolio_title_special"> --><?php echo $translations['M03216'][$language]; //Aesira Essential Oils ?>?<!--  <?php echo $translations['M03217'][$language]; //Used to Treat Many Health Problems ?> -->
                        </div>
                        <!-- <div class="mt-4 portfolioContentText">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div> -->
                        <div>
                            <ul class="mt-4 productPortfolio_section04_list blue">
                                <li data-lang="M03218"><?php echo $translations['M03218'][$language]; //Halal ?></li>
                                <li data-lang="M03219"><?php echo $translations['M03219'][$language]; //Content with pure 100% essential oil ?></li>
                                <li data-lang="M03220"><?php echo $translations['M03220'][$language]; //Alcohol free ?></li>
                                <li data-lang="M03221"><?php echo $translations['M03221'][$language]; //Fragrance free ?></li>
                                <li data-lang="M03489"><?php echo $translations['M03489'][$language]; ?></li>
                                <li data-lang="M03490"><?php echo $translations['M03490'][$language]; ?></li>
                                <li data-lang="M03491"><?php echo $translations['M03491'][$language]; ?></li>
                                <li data-lang="M03492"><?php echo $translations['M03492'][$language]; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="productPortfolio_section05" style="display: none;">
        <div class="homepage_section02_title" data-lang="M03222">
            <?php echo $translations['M03222'][$language]; //What Our Clients Are Saying ?>
        </div>
        <div class="clientSlideWrap">
            <div id="clientSlick" class="client">
                <!-- <div class="justify-content-center"> -->
                    <div class="clientImg">
                        <img src="/images/project/p1.png">
                    </div>
                    <!-- <div class="mt-3" style="font-weight: 600;">Garmaho Gemoy</div>
                    <div class="mt-2" style="font-size: 0.9em; color: #8F8F8F;">Customer</div>
                    <div class="mt-2 mb-4" style="font-weight: 600;">
                        <span style="color: #FDC350;">&starf; &starf; &starf; &starf; &starf;</span>
                    </div> -->
                <!-- </div> -->
                <div class="clientImg">
                    <img src="/images/project/p5.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p4.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p2.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p3.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p1.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p5.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p4.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p2.png">
                </div>
                <div class="clientImg">
                    <img src="/images/project/p3.png">
                </div>
            </div>
        </div>
        <div class="row my-4 justify-content-center">
            <div class="col-md-10 col-lg-6">
                <blockquote class="reviewText">
                    The service that is served is very charming with friendly waiters and also a comfortable place so that it makes customers feel at home for a long time in this shop and also the tea shop owner provides free warm and pastries making the atmosphere so beautiful, and this is a very pleasant experience for me and I will visit here again every weekend with my family.
                </blockquote>
            </div>
        </div>
    </div>

    <div class="productPortfolio_section06 banner">
        <!-- <img src="/images/project/contact-us.jpg" class="bannerImg second"> -->
        <div class="text-white contactUs text-center">
            <div class="col-12">
                <div data-lang="M03223" class="title">
                    <?php echo $translations['M03223'][$language]; //Need more information? Call our hotline for help! ?>
                </div>
            </div>
            <div class="col-12 hpNo">
                021-75685326
            </div>
            <div class="mt-5 col-12">
                <a href="contactUs" class="btn btn-primary btn_section02 primary letterSpace" data-lang="M03224"><?php echo $translations['M03224'][$language]; //Contact Us ?></a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>
<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<link href="css/slick.css" rel="stylesheet" type="text/css" />
<link href="css/slick-theme.css" rel="stylesheet" type="text/css" />
<script src="js/slick.min.js" type="text/javascript"></script>
<script src="js/slick.js" type="text/javascript"></script>

<script>

var url             = 'scripts/reqDefault.php';
var jsonUrl         = 'json/productList.json';
var mediaUrl        = '<?php echo $config['tempMediaUrl'] ?>'+'inv/'
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var langList = {
    english: "eng",
    chineseSimplified: "cSim",
    chineseTraditional: "cTra",
    indonesian: "indo"
};


var currentCID = 100;
var countryID = '<?php echo $_SESSION['countryID'] ?>' || ""
var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;

$(document).ready(function() {

    // var formData  = {
    //   command: 'getBuyProductList'
    // };
    // var fCallback = loadProduct;
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    if (countryID) {
        currentCID = countryID
    }

    if (sessionID != '') {
        isLoggedIn = true
    }

    $.getJSON(jsonUrl, function(data) {

        getCurrency(currentCID, data.curList)

        loadProduct(productCountryHandler(data, currentCID));

    });



    $('#clientSlick').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024, //small laptop
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768, //tablet view
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480, //mobile view
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.contactBtn').click(function() {
        window.location.href = "contactUs";
    });
});

function loadCatalogue() {
    $('.appendCatalogueDropDown').children().first().click();
}

function loadProduct(data) {

    var buildProduct = ""
    var noProductDisplay = `
        <div class="col-12 text-center mt-5">
            <img src="images/project/no-results.png" class="noResultIcon">
        </div>
        <div class="col-12 text-center mt-4">
            <h5><?php echo $translations['M03403'][$language]; /* No Products Found. */?></h5>
        </div>
    `

    if (data.productList.length > 0) {
        $.each(data.productList, function(k,v) {

            var nameDisplay = v[langList['<?php echo $_SESSION['language']; ?>']]['name']


            var imgUrl;
            if (v['img'] !== null) {
                imgUrl = mediaUrl + v['img'][0]
            } else {
                imgUrl = "/images/project/noProductImg.png"
            }

            var price = numberThousand(v['price'][currentCID]['retail'], 2);


            var price = numberThousand(v['price'][currentCID]['retail'], 2);
            var promoPrice = numberThousand(v['price'][currentCID]['promo'], 2);


            var hasPromo = true;

            if (v['price'][currentCID]['promo'] == 0) {
                var memberPrice = v['price'][currentCID]['retail'];
                hasPromo = false;
            } else {
                var memberPrice = v['price'][currentCID]['promo'];  
            }


            buildPrice = `
                <div class="mt-3 productDesc">
                    <span>Retail Price:</span>
                    <span class="productPrice">${getCurrency()} $ ${price}</span>
                </div>
            `

            var buildAmountSection = ""

            if (isLoggedIn) {

                if (hasPromo) {
                    buildPrice = `
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice promoSlash">${getCurrency()} ${price}</span>
                        </div>
                        <div class="mt-1 productDesc">
                            <span>Promo Price:</span>
                            <span class="productPrice">${getCurrency()} ${promoPrice}</span>
                        </div>
                    `

                } 

                buildAmountSection = `
                    ${buildPrice}
                    <div class="mt-1 productDesc">
                        <span>Member Price:</span>
                        <span class="productPrice">${getCurrency()} ${numberThousand(getMemberPrice(memberPrice), 2)}</span>
                    </div>
                    <div class="mt-1 productDesc">
                        <span>PV:</span>
                        <span class="productPrice">${v['pv']} PV</span>
                    </div>
                `

            } else {

                buildAmountSection = `
                    ${buildPrice}
                `;

            }


            buildProduct += `

                <div class="col-md-6 col-lg-3 mt-4">
                    <div class="productDiv">
                        <div class="goProductDetail" productCode="${v['code']}" imgUrl="${imgUrl}">
                            <img src="${imgUrl}">
                        </div>
                        <div class="productText">
                            <div class="productTitle">
                                <span>${nameDisplay}</span>
                            </div>
                            ${buildAmountSection}
                            <div class="row productDesc mt-4">
                                <div class="col-8">
                                    <div class="productInputBox input-group">
                                        <div class="input-group-append inputGroupBtn">
                                            <div class="inputAppendIcon">-</div>
                                        </div>
                                        <input type="text" class="form-control" style="text-align: center;" value="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" />
                                        <div class="input-group-append inputGroupBtn">
                                            <div class="inputAppendIcon">+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <button class="btn btn-primary btnAddToCart">
                                        <img src="/images/project/basket.png">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        })
    } else {
        buildProduct += noProductDisplay;
    }

    
    $("#buildProduct").html(buildProduct)
}


$(document).on("click",".goProductDetail", function() {
    $.redirect("productDetail", {
        code: $(this).attr('productCode'),
        imgUrl: $(this).attr('imgUrl')
    })

})

$(document).on("click",".btnAddToCart", function() {
    $.redirect("shoppingCart", {
    })
})

</script>