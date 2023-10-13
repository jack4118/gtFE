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
    <div class="kt-container row mb-3">
        <div class="col-md-12">
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="foodMenu" data-lang="M04104"><?php echo $translations['M04104'][$language]; //View all ?></a></li>
                    <li class="breadcrumb-item" style="display: none;"><a href="homepage" data-lang="M03873"><?php echo $translations['M03873'][$language]; //Home ?></a></li>
                    <li class="breadcrumb-item" style="display: none;" data-lang="M03874"><a href="foodMenu" data-lang="M03873"><?php echo $translations['M03874'][$language]; //Categories ?></a></li>

                    <li class="breadcrumb-item"><span id="foodBreadcrumbCategory"></span></li>
                    <li class="breadcrumb-item"><span id="foodBreadcrumb"></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="kt-container row mb-5">
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
            <h4 class="oriPrice"><font id="foodOriCost"></font></h4>
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
                        <button class="btn button-red" id="addWishlistBtn" onclick="beforeAddToWishlist()" data-lang="M04030"><?php echo $translations['M04030'][$language]; //Add To Wishlist ?></button>
                        <input id="localimageinput" class="hide">
                    </div>
                </div>
            </div>

            <div>
                <div class="red-notice mb-3" id="sales_description_div">
                    <p id='sales_description'></p>
                    <input id="packageID" style="display: none;">
                </div>
            </div>

            <!-- <div class="red-border-notice mb-3" data-lang="M03877">
                <i class="fa fa-clock mr-2"></i> <?php echo $translations['M03877'][$language]; //Cooking Time ?>: <span id="cookingTime"></span>
            </div> -->

            <div class="food-detail-div-fix-width">
                <!-- <div class="row">
                    <div class="col-6">
                        
                    </div>
                    <div class="col-6">
                        <button class="btn button-dark">Buy Now</button>
                    </div>
                </div> -->
                <?php if($_SESSION["userID"] != null){ ?>
                <!-- <?php echo $_SESSION["userID"] ?> -->
                    <p data-lang="M03886" onclick="beforeAddToFavourite()"><i class="fa fa-heart"></i> <?php echo $translations['M03886'][$language]; //Add to Favourites ?></p>
                <?php } ?>

                <?php if($_SESSION["userID"] == null){ ?>
                    <p data-lang="M03886" onclick="redirectToLoginPage()"><i class="fa fa-heart"></i> <?php echo $translations['M03886'][$language]; //Add to Favourites ?></p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="kt-container row mb-2">
        <div class="col-12 food-detail-description-tab">
            <ul class="nav nav-tabs">
                <li id="descriptionTab"><a class="active" data-toggle="tab" href="#description" data-lang="M03879"><?php echo $translations['M03879'][$language]; //Description ?></a></li>
                <li id="cookingSuggestionTab"><a data-toggle="tab" href="#cookingSuggestion" data-lang="M03880"><?php echo $translations['M03880'][$language]; //Cooking Suggestion ?></a></li>
                <!-- <li><a data-toggle="tab" href="#fullInstruction" data-lang="M03881"><?php echo $translations['M03881'][$language]; //Full Instruction ?></a></li> -->
                <!-- <li><a data-toggle="tab" href="#fullInstruction2" data-lang="M03881"><?php echo $translations['M03881'][$language]; //Full Instruction ?> 2</a></li> -->
            </ul>

            <div class="tab-content">
                <div id="description" class="tab-pane fade in active show">
                </div>

                <div id="cookingSuggestion" class="tab-pane fade">
                    <!-- <div id="cookingSuggestion_text"></div> -->
                    <!-- <div id="fullInstruction_text" class="mt-4"></div> -->
                    <!-- <div id="fullInstruction2_text" class="mt-4"></div> -->
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

    <div class="kt-container row">
        <!--<div class="col-md-6 mb-5">
            <h1 class="mb-4" data-lang="M03882"><?php echo $translations['M03882'][$language]; //Customer Reviews ?></h1>

            <div class="row">
                <div class="col-12">
                    <div class="row rating-header mb-3">
                        <div class="col-md-7 col-lg-6">
                            <?php echo $translations['M03883'][$language]; //Average Product Rating ?>
                        </div>
                        <div class="col-md-5 col-lg-6">
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
        </div>-->

        <!-- <div class="col-md-6 mb-5" id="loginToReview">
            <div class="">
                <div class="row">
                    <div class="col-auto">
                        <div class="profile-round">
                            <img src="images/project/profile-icon.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col rating-header">
                        Guest<br/>

                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>




                <p><b data-lang="M03884"><?php echo $translations['M03884'][$language]; //Share your thoughts with others ?></b></p>
                <p><button class="btn button-red button-fix-width" data-lang="M03885"><?php echo $translations['M03885'][$language]; //Write a Review ?></button></p>
                <p data-lang="M03386"><?php echo $translations['M03886'][$language]; //Only buyers who purchased the product<br/>may leave a review ?></p>
            </div>
        </div> -->

        <div class="col-md-6 mb-5" id="loginToReview">
            <h1 class="mb-4" data-lang="M03882"><?php echo $translations['M03882'][$language]; //Customer Reviews ?></h1>
            <div class="row">
                <div class="col-auto">
                    <div class="profile-round">
                        <img src="images/project/profile-icon.png" class="img-fluid">
                    </div>
                </div>
                <div class="col rating-header">
                    <?php echo $translations['M04070'][$language] //Guest ?><br/>

                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>

                    <p data-lang="" class="mt-5"><?php echo $translations['M04073'][$language] //Please ?> <a href="login" class="text-red"><u style="font-weight: 500;"><?php echo $translations['M02656'][$language] //login ?></u></a> <?php echo $translations['M04072'][$language] //to leave a review. ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3" id="purchaseToReview">
            <h1 class="mb-4" data-lang="M03882"><?php echo $translations['M03882'][$language]; //Customer Reviews ?></h1>
            <div class="row">
                <div class="col-auto">
                    <div class="profile-round">
                        <img src="images/project/profile-icon.png" class="img-fluid">
                    </div>
                </div>
                <div class="col rating-header">
                    <font class="guestName"><?php echo $translations['M04070'][$language] //Guest ?></font><br/>

                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>

                    <p data-lang="" class="mt-5"><?php echo $translations['M04071'][$language] //Make a purchase to leave a review. ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3" id="leaveReview">
            <h1 class="mb-4" data-lang="M03882"><?php echo $translations['M03882'][$language]; //Customer Reviews ?></h1>
            <div class="row">
                <div class="col-auto">
                    <div class="profile-round">
                        <img src="images/project/profile-icon.png" class="img-fluid">
                    </div>
                </div>
                <div class="col rating-header">
                    <font class="guestName"><?php echo $translations['M04070'][$language] //Guest ?></font><br/>

                    <div class = "col-12">
                        <fieldset class="rate">
                            <input type="radio" id="rating5" name="rating" value="5" /><label for="rating5" title="5 stars"></label>
                            <input type="radio" id="rating4" name="rating" value="4" checked="checked" /><label for="rating4" title="4 stars"></label>
                            <input type="radio" id="rating3" name="rating" value="3" /><label for="rating3" title="3 stars"></label>
                            <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="2 stars"></label>
                            <input type="radio" id="rating1" name="rating" value="1"/><label for="rating1" title="1 star"></label>
                        </fieldset>
                        <div style="position: absolute;">
                            <input type="checkbox" id="anonymousCheckbox" name="anonymous" value="1"/>
                            <label for="anonymousCheckbox"><?php echo $translations['M04105'][$language] //Anonymous ?></label>
                        </div>
                    </div>

                    <p class="mt-5">
                        <textarea id="reviewTextarea" rows="4" placeholder="Leave a review..." class="mb-4"></textarea>
                        <button id="sendBtn" class="btn button-red button-fix-width" data-lang="M02336"><?php echo $translations['M02336'][$language] //Submit ?></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-review">
    <!-- Loop start -->
    <!-- <div class="row review-row">
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
    </div> -->
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
var userId = '<?php echo $_SESSION["userID"]  ?>';
var userName = '<?php echo $_SESSION["name"]  ?>';
var id = "<?php echo $_SESSION['POST'][$postAryName]['id']?>";
var chosenCategory = "<?php echo $_SESSION['POST'][$postAryName]['chosenCategory']?>";
var chosenCategoryHTML = "";
var foodDetailsUpdateWishlist = true;
var inFavouriteList = false;
var fav_id;
var foodNameFromFoodDetail = "";
// var buyBefore = true;

$(document).ready(function(){
    /*window.addEventListener('beforeunload', () => {
        alert("back")
        if(chosenCategory != "") {
            $.cookie("maintainLoading",true)
        }
        $.cookie("keepLoading","")
    });*/
    if(id) {
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    } else {
        console.log('id',id);
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href = 'foodMenu.php' );
        }
    }

    getShoppingCart();
    getReview();
    
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
    var cookingDetailTab = data.cookingDetail;

    if(!data.stockQuantity){
        data.stockQuantity = 0;
    }
    // Wishlist
    if(data.stockQuantity && data.stockQuantity > 0) {
        $('#addCartBtn').show();
    } else {
        $('.food-detail-add-minus').html(`
            <div class="row" style="width: 375px;">
                <div class="col-12">
                    <div class="bodyText larger text-red" data-lang="M03005"><?php echo $translations['M03005'][$language] /* Out Of Stock */ ?></div>
                </div>

                <div class="col-auto pr-0" id="foodDetailsBtns">
                    <button class="btn button-red mt-3" id="addWishlistBtn" onclick="beforeAddToWishlist()" data-lang="M04030"><?php echo $translations['M04030'][$language]; //Add To Wishlist ?></button>
                    <input id="localimageinput" class="hide">
                </div>
            </div>
        `);

        if(userId) {
            $('#addWishlistBtn').show();
        }
    }

    $('#foodBreadcrumb').text(foodList[0].name);
    // $('#foodBreadcrumb').text(foodList[0].name);
    if(chosenCategory != "") {
        chosenCategoryHTML += `<a onclick="backToCategory()" style="cursor: pointer;">`;
        chosenCategoryHTML += chosenCategory;
        chosenCategoryHTML += `</a>`;

        $('.breadcrumb-item:nth-child(2)').css("display","none");
        // $('#foodBreadcrumbCategory').text(chosenCategory);
        $('#foodBreadcrumbCategory').html(chosenCategoryHTML);
    } else {
        $('.breadcrumb-item:nth-child(4)').css("display","none");
        $('#foodBreadcrumbCategory').css("display","none");
    }

    foodNameFromFoodDetail = foodList[0].name; 
    $('#foodTitle').text(foodList[0].name);

    foodNameFromFoodDetail = foodList[0].sales_description; 

    if(foodList[0].sales_description == ""){
        $('#sales_description_div').hide();
    }else{
        $('#sales_description_div').show();
        $('#sales_description').text(foodList[0].sales_description);
    }
    

    //Description
    if(data.productInventory[0].description == "") {
        $("#descriptionTab").hide();
        $("#description").hide();
    } else {
        $("#descriptionTab").show();
        $("#description").show();
        $('#descriptionTab').find('a').click();
        $("#description").html(data.productInventory[0].description);
    }

    //Cooking Suggestion
    if(!data.cookingDetail) {
        $("#cookingSuggestionTab").hide();
        $("#cookingSuggestion").hide();
    } else {
        $("#cookingSuggestionTab").show();
        $("#cookingSuggestion").show();
        $('#cookingSuggestionTab').find('a').click();
    }







    // if(data.cookingDetail[0].name != "") {
    //     $("#cookingSuggestionTab").css("display", "unset");
    //     $("#cookingSuggestion").css("display", "unset");
    //     $('#cookingSuggestionTab').find('a').click();
    // }

    if(foodList[0].latestPrice != 0) {
        $('#foodCost').text(Number(foodList[0].latestPrice).toFixed(2));
        $('#foodOriCost').text('RM ' + Number(foodList[0].salePrice).toFixed(2));
    } else {
        $('#foodCost').text(Number(foodList[0].salePrice).toFixed(2));
        $('#foodOriCost').parent().addClass('hide');
    }
    
    $('#cookingTime').text(foodList[0].cookingTime);

    // if(foodList[0].description == '' && foodList[0].fullInstruction == '') {
    //     $(".food-detail-description-tab .tab-content").css("display", "none");
    // }

    // if(foodList[0].description == '') {
    //     $('#descriptionTab').css('display', 'none');
    //     // $('#cookingSuggestionTab').find('a').click();
    //     // $('#cookingSuggestionTab').css('display', 'none');
    // } else {
    //     $('#description').html(foodList[0].description);
    // }

    // if((foodList[0].fullInstruction == '' && foodList[0].cookingSuggestion == '') || (foodList[0].cookingSuggestion != '' && foodList[0].fullInstruction != '')) {
    //     $('#cookingSuggestionTab').css('display', 'none');
    //     // $('#cookingSuggestionTab').find('a').click();
    // // } else {
    //     // $('#description').html(foodList[0].description);
    // }
    
    // $('#fullInstruction2_text').html(foodList[0].fullInstruction2);
    // $('#fullInstruction_text').html(foodList[0].fullInstruction);
    $('#packageID').val(foodList[0].id);

    if(foodList[0].favourite) {
        $('.food-detail-div-fix-width').find('.fa-heart').addClass('active');
    } else {
        $('.food-detail-div-fix-width').find('.fa-heart').removeClass('active');
    }

    inFavouriteList = foodList[0].favourite;
    fav_id = foodList[0].fav_id;

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

            $.each(n['video'], function(m1, n1) {
                imageSliderHTML += `
                    <li>
                        <video controls>
                            <source src="${n1['url']}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </li>
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
                                        <i class="fa fa-clock"></i> <?php echo $translations['M03877'][$language]; //Cooking Time ?>: ${suggestionCookingTime} <?php echo $translations['M04103'][$language]; //minute ?>
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
            step                : 1, // to differentiate between guest or registered user for BE
            bkend_token         : bkend_token,
        }; 

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
            product_template    : product_template_string,
            bkend_token : bkend_token,
        }; 

        var fCallback = successAddCart;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
})

function successAddCart (data,message) {
    if(!userId) newcart(localStorageCart);
    bkend_token = data['bkend_token'];
    showMessage('<span data-lang="M03397"><?php echo $translations['M03397'][$language] /* Successfully added to cart. */ ?></span>', 'success', '<span data-lang="M02544"><?php echo $translations['M02544'][$language] /* Success */ ?>', '', '');
    getNumberOfCartItems();
}

function beforeAddToWishlist() {
    addItemToWishlist(id);
}

function beforeAddToFavourite() {
    addItemToFavourite(id, inFavouriteList, fav_id);
}

function backToCategory() { 
    $.redirect('foodMenu',{
        categoryFromFoodDetail : chosenCategory,
        foodNameFromFoodDetail : foodNameFromFoodDetail,
        idFromFoodDetail : id
    })
}

$("#sendBtn").click(function(){ 
    var rating          = $("input[name=rating]:checked").val();
    var msg             = $("#reviewTextarea").val();
    var is_anonymous    = document.getElementById("anonymousCheckbox").checked ? document.getElementById("anonymousCheckbox").value : "0";

    if(msg != "") {
        var formData = {
            command         : "addReview",
            clientID        : userId,
            product_id      : id,
            msg             : msg,
            rating          : rating,
            is_anonymous    : is_anonymous
        };
        fCallback = successReview;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
})

function successReview() {
    showMessage('<span data-lang="">Successfully submit your review.</span>', 'success', '<span data-lang="M02544"><?php echo $translations['M02544'][$language] /* Success */ ?>', '', '');

    $("#reviewTextarea").val("");
}

function getReview() {
    var formData = {
        command: "getReview",
        product_id: id,
    };
    fCallback = successGetReview;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successGetReview(data, message) {
    if(userId) {
        $(".guestName").text(userName);
        $("#loginToReview").addClass("hide");

        if(data.isallow == 1) {
            $("#purchaseToReview").addClass("hide");
            $("#leaveReview").removeClass("hide");
        } else {
            $("#purchaseToReview").removeClass("hide");
            $("#leaveReview").addClass("hide");
        }
    } else {
        $("#loginToReview").removeClass("hide");
        $("#purchaseToReview").addClass("hide");
        $("#leaveReview").addClass("hide");
    }

    var reviewList = data.reviewList;
    var reviewHTML = "";

    $.each(reviewList, function(k, v) {
        if(v['anonymousStatus'] != 1){
            reviewHTML += `
                <div class="row review-row">
                    <div class="col-md-3 col-lg-2">
                        <div class="profile-round">
                            <img src="images/project/profile-icon.png" class="img-fluid">
                        </div>
                        ${v['clientName']}
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <div class="row rating-header">
                            <div class="col-12">
            `;
        }else{
            reviewHTML += `
                <div class="row review-row">
                    <div class="col-md-3 col-lg-2">
                        <div class="profile-round">
                            <img src="images/project/profile-icon.png" class="img-fluid">
                        </div>
                            Anonymous
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <div class="row rating-header">
                            <div class="col-12">
            `;
        }
      

        for(var i = 0; i < v['clientRating']; i++) {
            reviewHTML += `<i class="fa fa-star"></i>`;
        };

        var remainStar = 5 - v['clientRating'];
        for(var i = 0; i < remainStar; i++) {
            reviewHTML += `<i class="fa fa-star-o"></i>`;
        };

        reviewHTML += `
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="review-description">${v['clientMsg']}</p>
                        
                            <p class="review-time">${v['date']}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    $(".section-review").html(reviewHTML)
}

function redirectToLoginPage() {
    showMessage('<?php echo $translations['M04078'][$language] /* Login to continue */ ?>', 'success', '', '', 'login');
}

</script>
