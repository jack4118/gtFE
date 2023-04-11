<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php'
?>

<body style="background-color: white;">
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Page Content -->
<div class="kt-container px-0">
    <div class="banner productPortfolioBanner">
        <img src="/images/project/productBanner.jpg" class="bannerImg">
        <div class="bannerText">
            <label class="bannerTitle mb-2 productName"></label>
            <!-- <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang="M03125"><?php echo $translations['M03125'][$language]; /* All Products */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02 productName"></span>
            </div> -->
        </div>
    </div>

    <div class="productDetail_section01 homepagePadding">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 px-md-5">
                <!-- <div class="imageDiv"> -->
                    <img id="activeImage" class="activeImage" src="images/project/noProductImg.png" alt="Product Image">
                <!-- </div> -->
                <div class="iconsDiv">
                    <!-- <img id="icon1" onclick="switchIcon(1)" class="iconActive" src="images/project/product3.png" alt="Product Image">
                    <img id="icon2" onclick="switchIcon(2)" class="iconInactive" src="images/project/product2.png" alt="Product Image">
                    <img id="icon3" onclick="switchIcon(3)" class="iconInactive" src="images/project/product2.png" alt="Product Image"> -->
                </div>
            </div>
            <div class="col-md-6 col-lg-5 px-md-5">
                <div class="mt-4 productDetailTitle productName"></div>
                <div class="mt-4">
                    <div class="productDesc grayFont">
                        <span>Retail Price:</span>
                        <span class="productPrice blackFont bold" id="price"></span>
                    </div>

                    <?php if($_SESSION['sessionID'] && $_SESSION['sessionID'] !== "") { ?>

                        <div class="mt-2 productDesc grayFont" style="display: none;">
                            <span>Promo Price:</span>
                            <span class="productPrice blackFont bold" id="promoPrice"></span>
                        </div>

                        <div class="mt-2 productDesc grayFont" style="display: none;">
                            <span>Member Price:</span>
                            <span class="productPrice blackFont bold" id="memberPrice"></span>
                        </div>

                        <div class="mt-2 productDesc grayFont">
                            <span><?php echo $translations['M03130'][$language]; //PV ?>:</span>
                            <span class="productPrice blackFont bold" id="pvPrice"></span>
                        </div>

                    <?php } ?>

                    
                    <div class="mt-2 productDesc grayFont">
                        <span>Product Code:</span>
                        <span class="productPrice blackFont bold" id="productCode">-</span>
                    </div>
                    <div class="mt-2 row productDesc grayFont">
                        <div class="col-6 col-md-7">
                            Amount:
                        </div>
                        <div class="col-6 col-md-5">
                            <div class="productInputBox input-group">
                                <div class="input-group-append inputGroupBtn remove">
                                    <div class="inputAppendIcon">-</div>
                                </div>
                                <input type="text" id="quantity" class="form-control blackFont" style="text-align: center;" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" autocomplete="off"/>
                                <div class="input-group-append inputGroupBtn add">
                                    <div class="inputAppendIcon">+</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button class="btn btn-primary blue letterSpace btnAddToCart">Add To Cart</button>
                    <!-- <button class="btn btn-primary productButton2 ml-4 whiteFont" onclick="">Buy Now</button>
                    <button class="btn btn-default productButton3 ml-4 blackFont" onclick="">List</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="productDetail_section02 homepagePadding pt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-11">
                <div class="text-center">
                    <p id="description" onclick="changeTab1()" class="descriptionTitleText activeText mr-3" data-lang="M03126"><?php echo $translations['M03126'][$language]; /* Description */?></p>
                    <!-- <p id="additional" onclick="changeTab2()" class="descriptionTitleText" data-lang="M03127"><?php echo $translations['M03127'][$language]; /* Additional Info */?></p> -->
                </div>
                <div class="descriptionContentDiv">
                    <p id="descriptionTab" class="descriptionContentTextActive">
                    </p>
                    <!-- <p id="additionalTab" class="descriptionContentTextActive">
                        <?php echo $translations['M03127'][$language]; /* Additional Info */?>
                    </p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="productPortfolio_section03 homepagePadding mb-5">
        <div class="text-center">
            <div class="homepage_section02_title" data-lang="M03128">
                <?php echo $translations['M03128'][$language]; /* Related Products */?>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-md-6 col-lg-3 mt-4">
                <div class="productDiv">
                    <div class="">
                        <img src="/images/project/product1.png">
                    </div>
                    <div class="productText">
                        <div class="productTitle">
                            <span>Lavender Oil</span>
                        </div>
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice">Rp 990,000</span>
                        </div>
                        <div class="productDesc">
                            <span>Member Price:</span>
                            <span class="productPrice">Rp 860,000</span>
                        </div>
                        <div class="productDesc">
                            <span>PV:</span>
                            <span class="productPrice">100 PV</span>
                        </div>
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
            <div class="col-md-6 col-lg-3 mt-4">
                <div class="productDiv">
                    <div class="">
                        <img src="/images/project/product1.png">
                    </div>
                    <div class="productText">
                        <div class="productTitle">
                            <span>Lavender Oil</span>
                        </div>
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice">Rp 990,000</span>
                        </div>
                        <div class="productDesc">
                            <span>Member Price:</span>
                            <span class="productPrice">Rp 860,000</span>
                        </div>
                        <div class="productDesc">
                            <span>PV:</span>
                            <span class="productPrice">100 PV</span>
                        </div>
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
            <div class="col-md-6 col-lg-3 mt-4">
                <div class="productDiv">
                    <div class="">
                        <img src="/images/project/product1.png">
                    </div>
                    <div class="productText">
                        <div class="productTitle">
                            <span>Lavender Oil</span>
                        </div>
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice">Rp 990,000</span>
                        </div>
                        <div class="productDesc">
                            <span>Member Price:</span>
                            <span class="productPrice">Rp 860,000</span>
                        </div>
                        <div class="productDesc">
                            <span>PV:</span>
                            <span class="productPrice">100 PV</span>
                        </div>
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
            <div class="col-md-6 col-lg-3 mt-4">
                <div class="productDiv">
                    <div class="">
                        <img src="/images/project/product1.png">
                    </div>
                    <div class="productText">
                        <div class="productTitle">
                            <span>Lavender Oil</span>
                        </div>
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice">Rp 990,000</span>
                        </div>
                        <div class="productDesc">
                            <span>Member Price:</span>
                            <span class="productPrice">Rp 860,000</span>
                        </div>
                        <div class="productDesc">
                            <span>PV:</span>
                            <span class="productPrice">100 PV</span>
                        </div>
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
        </div>
    </div> -->
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

    var description = document.getElementById("description");
    var additional = document.getElementById("additional");
    var descriptionTab = document.getElementById("descriptionTab");
    var additionalTab = document.getElementById("additionalTab");

    function changeTab1(){
        description.classList.add("activeText");
        additional.classList.remove("activeText");

        descriptionTab.classList.add("descriptionContentTextActive");
        descriptionTab.classList.remove("descriptionContentTextInactive");

        additionalTab.classList.add("descriptionContentTextInactive");
        additionalTab.classList.remove("descriptionContentTextActive");
    }
    function changeTab2(){
        descriptionTab.classList.remove("descriptionContentTextActive");
        descriptionTab.classList.add("descriptionContentTextInactive");

        additionalTab.classList.remove("descriptionContentTextInactive");
        additionalTab.classList.add("descriptionContentTextActive");

        description.classList.remove("activeText");
        additional.classList.add("activeText");
    }
    
</script>

<script>

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var jsonUrl   = 'json/productList.json'
var imgPath         = '<?php echo $config['tempMediaUrl'] ?>inv/'
var code = "<?php echo $_POST['code']; ?>";
var imgUrl = "<?php echo $_POST['imgUrl']; ?>";
var productID;


var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;

$(document).ready(function() {


    var formData  = {
        command: 'getBuyProductDetails',
        productCode: code

    };
    var fCallback = loadProductDetail;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    if (sessionID != '') {
        isLoggedIn = true
    }
    

    $('.add').click(function(){
        var qty = $(this).siblings('input').val();
        qty++;
        $(this).siblings('input').val(qty);
    });
    $('.remove').click(function(){
        var qty = $(this).siblings('input').val();
        qty--;
        if(qty >= 1)
        $(this).siblings('input').val(qty);
    });  

});

function loadProductDetail(data) {
    // var thisProduct = (productList).filter((product) => product.id == productId)
    // var product = thisProduct[0]

    console.log(data)

    $("#activeImage").attr('src', imgPath + data.img[0]);

    if (data.img.length > 0) {

        var buildIconsDiv = ""

        $.each(data.img, function(k,v) {

            var imgUrl = imgPath + v

            if (k == 0) {

                buildIconsDiv += `
                    <img id="icon${k}" onclick="switchIcon('${imgUrl}','${k}')" class="iconActive altImg" src="${imgUrl}" alt="Product Image">
                `
            } else {

                buildIconsDiv += `
                    <img id="icon${k}" onclick="switchIcon('${imgUrl}','${k}')" class="iconInactive altImg" src="${imgUrl}" alt="Product Image">
                `
            }
        })

        $(".iconsDiv").html(buildIconsDiv)
    } 





    // var nameDisplay;
    // var descDisplay;

    // switch('<?php echo $_SESSION['language'] ?>') {
    //   case 'english':
    //     nameDisplay = product['eng']['name']
    //     descDisplay = product['eng']['desc']
    //     break;
    //   case 'chineseSimplified':
    //     nameDisplay = product['cSim']['name']
    //     descDisplay = product['cSim']['desc']
    //     break;
    //   case 'chineseTraditional':
    //     nameDisplay = product['cTra']['name']
    //     descDisplay = product['cTra']['desc']
    //     break;
    //   case 'indonesia':
    //     nameDisplay = product['indo']['name']
    //     descDisplay = product['indo']['desc']
    //     break;
    //   default:
    //     nameDisplay = product['eng']['name']
    //     descDisplay = product['eng']['desc']
    // }

    $(".productName").html(data['nameDisplay'])
    $("#productCode").html(data['code'])
    productID = data['id']
    $("#price").html(getCurrency() + " " + numberThousand(data['price'], 2))

    if (data['promoPrice'] != 0) {
        $("#price").addClass("promoSlash")

        $("#promoPrice").html(getCurrency() + " " + numberThousand(data['promoPrice'], 2))
        $("#promoPrice").parents(".productDesc").show()

        var memberPrice = getMemberPrice(data['promoPrice'])
        $("#memberPrice").html(getCurrency() + " " + numberThousand(memberPrice, 2))
        $("#memberPrice").parents(".productDesc").show()
    } else {

        var memberPrice = getMemberPrice(data['price'])
        $("#memberPrice").html(getCurrency() + " " + numberThousand(memberPrice, 2))
        $("#memberPrice").parents(".productDesc").show()
    }

    $("#pvPrice").html(numberThousand(data['pvPrice'], 2) + " PV")
    var temp = data['description'].split("\n\n");
    var description = "";
    $.each(temp, function(k,v){
        description += `<p>${v}</p>`;
    });
    $('#descriptionTab').html(description);
    
    var buildDescription = "";
    // $("#descriptionTab").html(descDisplay)




                
}


function switchIcon(imgUrl, imageNum){

    $('#activeImage').attr('src', imgUrl)

    $('.altImg').removeClass('iconActive').addClass('iconInactive')
    $('#icon'+imageNum).addClass('iconActive').removeClass('iconInactive')

}


$(document).on("click",".btnAddToCart", function() {
    var quantity = $("#quantity").val()
    addItem(productID, quantity)

})



</script>