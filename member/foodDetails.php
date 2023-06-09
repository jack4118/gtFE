<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/lightslider.css?v=<?php echo filemtime('css/lightslider.css'); ?>" rel="stylesheet" type="text/css" />
<!-- <link href="css/bootstrap.min.css?v=<?php echo filemtime('css/boottsrap.min.css'); ?>" rel="stylesheet" type="text/css" /> -->

<?php include 'homepageHeader.php';?>

<section class="section-product-details whiteBg">
    <div class="row mb-3">
        <div class="col-md-12">
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homepage" data-lang="M03873"><?php echo $translations['M03873'][$language]; //Home ?></a></li>
                    <li class="breadcrumb-item" data-lang="M03874"><a href="foodMenu" data-lang="M03873"><?php echo $translations['M03874'][$language]; //Categories ?></a></li>
                    <!-- <li class="breadcrumb-item" data-lang="M03875"><?php echo $translations['M03875'][$language]; //All Products ?></li> -->
                    <li class="breadcrumb-item"><span id="foodBreadcrumb"></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-5" id="sliderDiv">
            <!-- <ul id="lightSlider"> -->
                <!-- <li data-thumb="images/project/product2.jpg"> <img src="images/project/product2.jpg" /> </li>
                <li data-thumb="images/project/product3.jpg"> <img src="images/project/product3.jpg" /> </li>
                <li data-thumb="images/project/product4.jpg"> <img src="images/project/product4.jpg" /> </li>
                <li data-thumb="images/project/product5.jpg"> <img src="images/project/product5.jpg" /> </li> -->
            <!-- </ul> -->
        </div>
        <div class="col-md-7 food-detail-title-div">
            <h2 style="font-weight: 400;" id="foodTitle"></h2>
            <span class="food-detail-title-line"></span>
            <h2>RM <font id="foodCost"></font></h2>

            <div id="attribute">
            </div>

            <div class="food-detail-add-minus">
                <div class="row" style="width: 375px;">
                    <div class="col-auto">
                        <span class="minus">-</span>
                        <input type="text" value="1" id="quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
                        <span class="plus">+</span>
                    </div>

                    <div class="col pr-0" id="foodDetailsBtns">
                        <button class="btn button-red" id="addCartBtn" data-lang="M03878"><?php echo $translations['M03878'][$language]; //Add To Cart ?></button>
                        <button class="btn button-red" id="addWishlistBtn" onclick="beforeAddToWishlist()" data-lang="M04030"><img src="images/project/wws2.png" width="15px" class="mr-2"><?php echo $translations['M04030'][$language]; //Add To Wishlist ?></button>
                        <input id="localimageinput" class="hide">
                    </div>
                </div>
            </div>

            <div>
                <div class="red-notice mb-3" data-lang="M03876">
                    <?php echo $translations['M03876'][$language]; //Free shipping with minimum spend RM280.00 ?>
                    <input id="packageID" style="display: none;">
                </div>
            </div>

            <!-- <div class="red-border-notice mb-3" data-lang="M03877">
                <i class="fa fa-clock mr-2"></i> <?php echo $translations['M03877'][$language]; //Cooking Time ?>: <span id="cookingTime"></span>
            </div> -->

            <div class="food-detail-div-fix-width">
                <div class="row">
                    <div class="col-6">
                        
                    </div>
                    <!-- <div class="col-6">
                        <button class="btn button-dark">Buy Now</button>
                    </div> -->
                </div>

                <!-- <p data-lang="M03886"><i class="fa fa-heart"></i> <?php echo $translations['M03886'][$language]; //Add to Favourites ?></p> -->
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12 food-detail-description-tab">
            <ul class="nav nav-tabs">
                <li><a class="active" data-toggle="tab" href="#description" data-lang="M03879"><?php echo $translations['M03879'][$language]; //Description ?></a></li>
                <li><a data-toggle="tab" href="#cookingSuggestion" data-lang="M03880"><?php echo $translations['M03880'][$language]; //Cooking Suggestion ?></a></li>
                <!-- <li><a data-toggle="tab" href="#fullInstruction" data-lang="M03881"><?php echo $translations['M03881'][$language]; //Full Instruction ?></a></li> -->
                <!-- <li><a data-toggle="tab" href="#fullInstruction2" data-lang="M03881"><?php echo $translations['M03881'][$language]; //Full Instruction ?> 2</a></li> -->
            </ul>

            <div class="tab-content">
                <div id="description" class="tab-pane fade in active show">
                </div>

                <div id="cookingSuggestion" class="tab-pane fade">
                    <div id="cookingSuggestion_text"></div>
                    <div id="fullInstruction_text" class="mt-4"></div>
                    <div id="fullInstruction2_text" class="mt-4"></div>
                </div>

                <!-- <div id="fullInstruction" class="tab-pane fade">
                </div>

                <div id="fullInstruction2" class="tab-pane fade">
                    <div id="fullInstruction2_text"></div>

                    <div id="tryvideo"></div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="row hide">
        <div class="col-12 mb-3">
            <h1 class="mb-4" data-lang="M03882"><?php echo $translations['M03882'][$language]; //Customer Reviews ?></h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="row rating-header">
                        <div class="col-md-5">
                            <?php echo $translations['M03883'][$language]; //Average Product Rating ?>
                        </div>
                        <div class="col-md-5">
                            <b>4.7 &nbsp;</b>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <table class="table table-responsive rating">
                <tbody>
                    <tr>
                        <td>5 Star</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:70%">
                                </div>
                            </div>
                        </td>
                        <td>43</td>
                    </tr>
                    <tr>
                        <td>4 Star</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:80%">
                                </div>
                            </div>
                        </td>
                        <td>36</td>
                    </tr>
                    <tr>
                        <td>3 Star</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:30%">
                                </div>
                            </div>
                        </td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>2 Star</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:20%">
                                </div>
                            </div>
                        </td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>1 Star</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:15%">
                                </div>
                            </div>
                        </td>
                        <td>8</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6 mb-3">
            <div class="red-bordered-div">
                <p><b data-lang="M03884"><?php echo $translations['M03884'][$language]; //Share your thoughts with others ?></b></p>
                <p><button class="btn button-red button-fix-width" data-lang="M03885"><?php echo $translations['M03885'][$language]; //Write a Review ?></button></p>
                <p data-lang="M03386"><?php echo $translations['M03886'][$language]; //Only buyers who purchased the product<br/>may leave a review ?></p>
            </div>
        </div>
    </div>
</section>

<section class="section section-review hide">
    <!-- Loop start -->
    <div class="row review-row">
        <div class="col-md-3 col-lg-2">
            <div class="profile-round">
                <img src="images/project/profile-icon.png" class="img-fluid">
            </div>
            liz******
        </div>
        <div class="col-md-9 col-lg-10">
            <div class="row rating-header">
                <div class="col-12">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="review-header">Lorem ipsum dolor sit amet</p>

                    <p class="review-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis, diam lacinia dictum gravida, magna felis semper mi, scelerisque consectetur magna erat a est.</p>
                
                    <p class="review-time">01/03/2023 Friday, 08:09:10 PM</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Loop end -->
</section>

<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback       = "";
var slideIndex      = 1;
var radiodata       = [];
var language = "<?php echo $language; ?>";

var id = "<?php echo $_POST['id']?>";
var foodDetailsUpdateWishlist = true;

$(document).ready(function(){ 
    var formData  = {
        command     : "getProductDetails",
        productInvId  : id,
        language      : language
    };
    var fCallback = loadDefaultListing; 
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });        
});

function loadDefaultListing (data,message,session) {
    var foodList = data.productInventory;

    if(data.stockQuantity && data.stockQuantity > 0) {
        $('#addCartBtn').show();
    } else {
        $('#addWishlistBtn').show();
    }

    $('#foodBreadcrumb').text(foodList[0].name);
    $('#foodTitle').text(foodList[0].name);
    $('#foodCost').text(numberThousand(foodList[0].salePrice,2));
    $('#cookingTime').text(foodList[0].cookingTime);
    $('#description').html(foodList[0].description);
    $('#fullInstruction2_text').html(foodList[0].fullInstruction2);
    $('#fullInstruction_text').html(foodList[0].fullInstruction);
    $('#packageID').val(foodList[0].id);
    if(data.productInventory[0].media){
        var localimage = foodList[0].media[0].url;
        $('#localimageinput').val(localimage);
    }
    var cookingSuggestHTML = "";
    
    if(data.attribute) {
        var foodAttributeHTML = '';
    
        $.each(data.attribute, function(k, v) {
            foodAttributeHTML +=  `
                <div class="attribute-radio-div" id="${v['attribute_id']}">
                    <label><b>${v['attribute_name']}:</b></label><br/>
            `;

            radiodata.push(`${v['attribute_name']}`);

            $.each(v[v['attribute_name']], function(v1, m1) {
                if(v1 ==0){
                foodAttributeHTML +=  `
                    <input type="radio" id="${m1['id']}" variantname="${m1['name']}" name="${v['attribute_name']}" value="${m1['id']}" checked="checked">
                        <label for="${m1['name']}">${m1['name']}</label>
                `;
            }else{
                foodAttributeHTML +=  `
                    <input type="radio" id="${m1['id']}" variantname="${m1['name']}" name="${v['attribute_name']}" value="${m1['id']}">
                        <label for="${m1['name']}">${m1['name']}</label>
                `;
            }
            });
            
            foodAttributeHTML +=  `
                </div>
            `;
        });

        $("#attribute").html(foodAttributeHTML);
        
    }

    if(data.productInventory) {
        var imageSliderHTML = '';
    
        $.each(data.productInventory, function(m, n) { 
            imageSliderHTML =  `<ul id="lightSlider">`;
            
            $.each(n['media'], function(m1, n1) {
                imageSliderHTML +=  `
                    <li data-thumb="${n1['url']}"> <img src="${n1['url']}" /> </li>
                `;
            });

            imageSliderHTML +=  `</ul>`;
        });

        // $("#lightSlider").html(imageSliderHTML);        
        $("#sliderDiv").html(imageSliderHTML);
        
        $('#lightSlider').lightSlider({ 
            gallery: true,
            item: 1, 
            loop: true, 
            slideMargin: 0, 
            thumbItem: 4 
        });
    }

    //if(data.productInventory) {
    //    var videoHTML = '';
    
    //    $.each(data.productInventory, function(m, n) { 
    //        if(n['video'] && n['video'].length > 0) { 
    //            $.each(n['video'], function(m2, n2) {
    //                videoHTML +=  `                        
    //                    <iframe width="560" height="315" src="https://www.youtube.com/embed/${n2['url']}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    //                `;
    //            });
    //        }
    //    });

    //    $('#cookVideo').html(videoHTML);
    //    $('#cookingSuggestion_text').html(foodList[0].cookingSuggestion);
    //}

    //new cooking suggestion API
    if(data.cookingDetail){
        cookingSuggestHTML +=  `<div class="accordion" id="accordionExample">`;

        for (var i = 0; i < data.cookingDetail.length; i++) {
            var suggestionName = data.cookingDetail[i].name;
            var description = data.cookingDetail[i].description;
            var suggestionRemark = data.cookingDetail[i].remark;
            var suggestionUrl = data.cookingDetail[i].url;
            var suggestionCookingTime = data.cookingDetail[i].cooking_time;

            cookingSuggestHTML +=  `
                <div class="card food-suggestion">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse${i}" aria-expanded="true">     
                        <span class="title" style="font-size: 18px; font-weight: 500;" data-lang="M03938">
                            <font style="color: #ec4a41;"><?php echo $translations['M03938'][$language]; //Cooking Method ?>: </font>${suggestionName}
                        </span>
                        <span class="accicon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <div id="collapse${i}" class="collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <i class="fa fa-clock"></i> <?php echo $translations['M03877'][$language]; //Cooking Time ?>: ${suggestionCookingTime} minutes
                                    </p>
                                    <div id="description" class="description-height">${description}</div>
                                    
                                    <div id="suggestionRemark" class="mt-3 suggestionRemark" data-lang="M00448">
                                        <b>${suggestionRemark}</b>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="cookVideo"><iframe width="560" height="315" src=${suggestionUrl} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        cookingSuggestHTML +=  `</div>`;

        $("#cookingSuggestion").html(cookingSuggestHTML);
    }
}
var localStorageCart;
$('#addCartBtn').click(function(data) {
    var product_template =[];
    var product_template_name =[];
    var clientID = '<?php echo  $_SESSION["userID"]  ?>';
    var packageID = $("#packageID").val();
    var quantity = $("#quantity").val();
    var localimage = $("#localimageinput").val();

    $.each(radiodata, function(k, v) { 
        var product_variant_id = $('input[name='+ '"' + v + '"' +']:checked').val();
        var product_variant_name = $('input[name='+ '"' + v + '"' +']:checked').attr("variantname");
        product_template.push(product_variant_id);
        product_template_name.push(product_variant_name);
    })

    var product_template_string = product_template.toString();

    if(!clientID) {
        var total = $('#foodCost').text() * quantity;
        localStorageCart =
        {
            packageID   : parseInt(packageID),
            productID   : parseInt(packageID),
            quantity    : quantity,
            product_template    : product_template_string,
            product_attribute_value_id    : product_template_string,
            product_attribute_name    : product_template_name,
            img: "1663137058_nl8dpj9t5gbcwvz1_2174tp0wa3slzvfe.jpeg",
            price: $('#foodCost').text(),
            stockCount: 100,
            productName : $('#foodTitle').text(),
            total : numberThousand(total,2),
            img: localimage,
        }


        var formData  = {
            // command             : "guestAddShoppingCart", ## old api 
            command             : 'addShoppingCart',
            // clientID            : clientID,
            packageID           : packageID,
            quantity            : quantity,
            type                : "add",
            product_template    : product_template_string,
            step                : 1 // to differentiate between guest or registered user for BE

        }; 

        if($.cookie('bkend_token')) {
            formData['bkend_token'] = $.cookie('bkend_token')
        }

        var fCallback = successAddCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $.redirect('reviewOrder');

    } else { 
        
        var formData  = {
            command     : "addShoppingCart",
            clientID    : clientID,
            packageID   : packageID,
            quantity    : quantity,
            type        : "add",
            product_template    : product_template_string
        }; 

        if($.cookie('bkend_token')) {
            formData['bkend_token'] = $.cookie('bkend_token')
        }

        var fCallback = successAddCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
})

function successAddCart (data,message) {
    newcart(localStorageCart);
    $.cookie('bkend_token', data['bkend_token'],{expires:10000})
    showMessage('<span data-lang="M03397"><?php echo $translations['M03397'][$language] /* Successfully added to cart. */ ?></span>', 'success', '<span data-lang="M02544"><?php echo $translations['M02544'][$language] /* Success */ ?>', '', '');
    getNumberOfCartItems();
}

function beforeAddToWishlist() {
    addItemToWishlist(id);
}

</script>
