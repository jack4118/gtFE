<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section section-favourite">
    <div class="kt-container row">
        <div class="col-12">
            <h3 class="jp-title"><?php echo $translations['M04034'][$language] /* My Favourite */ ?></h3>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="kt-container row jp-list-group" id="favourite">
        <!-- <div class="item col-xs-4 col-md-3">
            <a onclick="foodClick(${v['id']})">
                <div class="thumbnail">
                    <span class="favourite-counter">1000 Sold</span>
                    <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                    <div class="caption">
                        <p class="group inner list-group-item-text" style="text-align: center;">
                            Kuala Lumpur Kepong Leong Kee Bah Kut Teh - Pork Belly</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="group inner list-group-item-heading">RM25.90</h4>
                                <p class="lead">
                                    <font class="price-slash">RM30.90</font> -16%
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 cart-btn-div">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn button-red button-fix-width-2" href="#1">Add to cart</button>
                                        <i class="fa fa-heart active"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->        
    </div>
</section>

<!-- <div class="modal fade" id="removeConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title showLangCode" data-lang="M03825">
                    <?php echo $translations['M03825'][$language] /* Remove Confirmation */ ?>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M04029">
                        <?php echo $translations['M04035'][$language] /* Doing this action will delete the item from your favourite list, are you sure you want to do this? */ ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer pb-4">
                <button type="button" class="btn btn-primary grey py-2 mr-3" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M00278">
                        <?php echo $translations['M00278'][$language] /* Cancel */ ?>
                    </span>
                </button>
                <button onclick="removeItemFromFavouritelist()" type="button" class="btn btn-primary py-2" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M02539">
                        <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="removeConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <!-- <img src="" id="modalIcon" class="modal-icon"> -->
                <!-- <i class="fa fa-check-bell-o modal-icon"></i> -->
                <!-- <div class="mt-2 modal-title">
                    <?php echo $translations['M03825'][$language] /* Remove Confirmation */ ?>
                </div> -->
                <div id="canvasAlertMessage" class="mt-2 modalText">
                    <?php echo $translations['M04048'][$language] /* Doing this action will delete the item from your favourite list, are you sure you want to do this? */ ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button id="canvasCloseBtn" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00278">
                    <?php echo $translations['M00278'][$language]; //Cancel ?>
                 </button>
                <button onclick="removeItemFromFavouritelist()" type="button" class="btn btn-primary py-2" data-dismiss="modal"  data-lang="M02539">
                    <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<script>
var url                     = 'scripts/reqDefault.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var selectedId;
var localStorageCart;
var wishlistList = [];
var clientID = '<?php echo  $_SESSION["userID"]  ?>';

$(document).ready(function() {
    getShoppingCart();
    getFavouritelist();
});

function getFavouritelist() {
    var formData = {
        command         : 'getProductFavouriteList',
        language: language,
    };
    var fCallback = loadFavouritelist;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadFavouritelist(data, message) {
    favouriteList = data;

    var numberHtml = '';

    numberHtml += `
        <img src="images/project/love-icon.png" width="20px">
        <div class="numOfFavouriteItems">0</div>
    `;

    $('.favouriteIcon').html(numberHtml);

    if(favouriteList && favouriteList.length > 0) {
        var numberOfFavouriteItems = favouriteList.length;
        if(numberOfFavouriteItems > 0) $('.numOfFavouriteItems').html(numberOfFavouriteItems);

        var html = '';
        $.each(favouriteList, function(k, v) {
            var hasDiscount = false;
            if(v['latestPrice']) hasDiscount = true;
            
            html += `
                <div class="item col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <a href="javascript:void(0)" onclick="foodClick(${v['product_id']})" style="cursor: pointer;">
                            <img class="group list-group-image img-fluid" src="${v['url']}"/>
                            <input class="hide" id="image_${v['product_id']}" value="${v['image']}">
                        </a>
                        <div class="caption">
                            <a href="javascript:void(0)" onclick="foodClick(${v['product_id']})" style="cursor: pointer;">
                                <p class="group inner list-group-item-text" style="text-align: center;">${v['name']}</p>
                                <div class="row mb-3">
                                    <div class="col-12 text-center priceGrp mb-0">
                                        <h4 class="group inner list-group-item-heading">RM${hasDiscount ? Number(v['latestPrice']).toFixed(2) : Number(v['sale_price']).toFixed(2)}</h4>
                                        <h5 class="oriPrice ${hasDiscount || 'hide'}">RM${Number(v['sale_price']).toFixed(2)}</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-12 cart-btn-div">
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
            `;

            if(v['stockQuantity'] && v['stockQuantity'] > 0) {
                html += `
                                            <button class="btn btn-primary button-fix-width-2 mr-3 px-0" onclick="wishlistAddToCart(${v['product_id']})" data-lang="M02818"><?php echo $translations['M02818'][$language] /* Add To Cart */ ?></button>
                `;
            } else {
                html += `
                                            <button class="btn btn-primary grey button-fix-width-2 mr-3 px-0" data-lang="M03005"><?php echo $translations['M03005'][$language] /* Out Of Stock */ ?></button>
                `;
            }

            html += `
                                            <a href="javascript:;" onclick="showRemoveConfirmationModal(${v['id']})"><img src="images/project/delete-icon2.png" width="20px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        $('#favourite').html(html);
    } else {
        var html = `
            <div class="col-12 borderAll grey normal p-4">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <div class="bodyText smaller lightBold" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                    </div>
                </div>
            </div>
        `;

        $('#favourite').html(html);
    }
}

function foodClick(id) {
    $.redirect("foodDetails",{id});
}

function wishlistAddToCart(packageID) {
    var clientID = '<?php echo  $_SESSION["userID"]  ?>';
    var product_template_string = '';

    var formData  = {
        command             : "addShoppingCart",
        clientID            : clientID,
        packageID           : packageID,
        quantity            : 1,
        type                : "add",
        product_template    : product_template_string,
        bkend_token         : bkend_token,
    }; 

    var fCallback = successWishlistAddToCart;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successWishlistAddToCart(data,message) {
    bkend_token = data['bkend_token'];
    showMessage('<span data-lang="M03397"><?php echo $translations['M03397'][$language] /* Successfully added to cart. */ ?></span>', 'success', '<span data-lang="M02544"><?php echo $translations['M02544'][$language] /* Success */ ?>', '', '');
    getNumberOfCartItems();
}

</script>