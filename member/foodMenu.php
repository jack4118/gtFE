<?php
include 'scripts/sessionStore.php';
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section">
    <div class="kt-container row">
        <div class="col-12 text-center">
            <h3 class="jp-title" data-lang="M03887"><?php echo $translations['M03887'][$language]; //Explore Our Menu ?></h3>

            <div class="row">
                <div class="col-12">
                    <img src="images/project/food-menu-img.jpg" class="img-fluid mb-4 foodMenu-img">
                </div>

                <!-- <div class="col-12">
                    <button id="loginBtn" class="btn button-red button-fix-width" data-lang="M03888">
                        <?php echo $translations['M03888'][$language]; //Buy Now ?>
                    </button>
                </div> -->
                
            </div>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="kt-container row mb-5 form-group">
        <div class="col-md-4">
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="foodMenu" data-lang="M04104"><?php echo $translations['M04104'][$language]; //View all ?></a></li>
                    <li class="breadcrumb-item" style="display: none;"><a href="#" data-lang="M03873"><?php echo $translations['M03873'][$language]; //Home ?></a></li>
                    <li class="breadcrumb-item" data-lang="M03874" style="display: none;"><?php echo $translations['M03874'][$language]; //Categories ?></li>
                    <!-- <li class="breadcrumb-item" data-lang="03889"><?php echo $translations['M03889'][$language]; //All Products ?></li> -->

                    <li class="breadcrumb-item" id="breadcrumbCategory"></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 text-left text-md-right">
            <div class="well well-sm">
                <div class="dropdown">
                    <a class="btn btn-default btn-sm d-none d-md-block dropbtn showDropdown">
                        <img src="images/project/filter-icon1.png" alt="">
                        <font class="px-1" style="font-size: 14px; color: #000;" data-lang="M02240"><?php echo $translations['M02240'][$language]; //Filter ?></font>
                        <img src="images/project/filter-icon2.png" alt="">
                    </a>
                    <div class="dropdown-content dropdownContent filterDropdownContent">
                        <a href="javascript:;" filter="" class="btn menuDropdownBtn bodyText smaller filterMenu" data-lang="M04041">
                            <?php echo $translations['M04041'][$language]; //None ?>
                        </a>
                        <a href="javascript:;" filter="1" class="btn menuDropdownBtn bodyText smaller filterMenu" data-lang="M04042">
                            <?php echo $translations['M04042'][$language]; //Price low to high ?>
                        </a>
                        <a href="javascript:;" filter="2" class="btn menuDropdownBtn bodyText smaller filterMenu" data-lang="M04043">
                            <?php echo $translations['M04043'][$language]; //Price high to low ?>
                        </a>
                        <a href="javascript:;" filter="3" class="btn menuDropdownBtn bodyText smaller filterMenu" data-lang="M04044">
                            <?php echo $translations['M04044'][$language]; //Alphabet a to z ?>
                        </a>
                        <a href="javascript:;" filter="4" class="btn menuDropdownBtn bodyText smaller filterMenu" data-lang="M04045">
                            <?php echo $translations['M04045'][$language]; //Alphabet z to a ?>
                        </a>
                    </div>
                </div>
                <!-- <font style="font-size: 14px;" data-lang="M03890"><?php echo $translations['M03890'][$language]; //Sort by ?>:</font> -->
                <div class="btn-group">
                    <a href="#" id="grid" class="btn btn-default btn-sm d-none d-md-block">
                        <i class="fa fa-th-large"></i>
                    </a>
                    <a href="#" id="list" class="btn btn-default btn-sm d-none d-md-block">
                        <i class="fa fa-th-list"></i>
                    </a>

                    <input id="searchInput" type="text" class="form-control" placeholder="<?php echo $translations['M00052'][$language] /* Search */ ?>" dataType="text" dataName="name">
                    <a href="javascript:void(0)" id="searchBtn" class="btn btn-default btn-sm d-none d-md-block mr-0" style="background-image: linear-gradient(to bottom, #f37067, #c82f26);">
                        <i class="fa fa-search" style="color: #fff !important;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container row">
        <div class="col-md-4 col-lg-3 categories-filter ">
            <h5 data-lang="M03874"><?php echo $translations['M03874'][$language]; //Categories ?></h5>
            <hr class="grey-line">
            <ul id="category"></ul>
        </div>
        <div class="col-md-8 col-lg-9">
            <div id="products" class="row jp-list-group">

                <!-- <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                        <div class="caption">
                            <p class="group inner list-group-item-text">
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
                </div> -->
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document" style="margin:auto;">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <!-- <img src="" id="modalIcon" class="modal-icon"> -->
                <!-- <i class="fa fa-check-bell-o modal-icon"></i> -->
                <div class="mt-2 modal-title" data-lang="M04057">
                    <?php echo $translations['M04057'][$language]; // Welcome to GoTasty. ?>
                </div>
                <div id="canvasAlertMessage" class="mt-2 modalText" data-lang="M04058">
                    <?php echo $translations['M04058'][$language]; // You successfully sign in to your account. ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button onclick="removeWelcomeModal()" type="button" class="btn btn-primary py-2" data-dismiss="modal"  data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; // Close ?>
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
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var slideIndex = 1;
var pageNumber = 1
var memoURL = "<?php echo $config['tempMediaUrl']; ?>";
var liname ="";
var selectedCatID = "";
var language = "<?php echo $language; ?>";
var localStorageCart = "";
var filter;
var selectedProduct;
var chosenCategory = "";
var userId = '<?php echo $_SESSION["userID"]  ?>';

var idFromFoodDetail = '<?php echo $_SESSION['POST'][$postAryName]["idFromFoodDetail"]  ?>';
var categoryFromFoodDetail = '<?php echo $_SESSION['POST'][$postAryName]["categoryFromFoodDetail"]  ?>';

$(document).ready(function(){
    var fromUrl = document.referrer; 
    var fromUrl2 = fromUrl.substring(fromUrl.lastIndexOf('/') + 1); 

    // if(fromUrl2 == 'foodDetails') {
        let scrollCookie = $.cookie("cookieScrollPos")

        if(!scrollCookie || scrollCookie == ''){
            $(window).scroll(function () {
            //set scroll position in session storage
                if ($(window).scrollTop() > 1000) {
                    var scrollPos = $(window).scrollTop();
                }
            });
        }
    // }
    
    if((fromUrl2 == "login" || fromUrl2 == "publicRegistration") && userId != "" ) {
        $('#welcomeModal').modal();
    }

    function removeWelcomeModal() {
        $("#welcomeModal").hide();
    }

    // from Food Detail page by pressing category
    if(idFromFoodDetail != "" && fromUrl2 == 'foodDetails' && categoryFromFoodDetail == "") {
        var scrollTo2 = document.getElementsByClassName("whiteBG");
            scrollTo2.scrollIntoView();
    }

    if(idFromFoodDetail != "" && fromUrl2 == 'foodDetails' && categoryFromFoodDetail != "") {
        setTimeout(action,3000);

        function action() {
            $('[name="'+categoryFromFoodDetail+'"]').click();

            var elem = $('[name="'+categoryFromFoodDetail+'"]');

            if (elem.parent().parent().parent().hasClass('collapse')) {
                elem.parent().parent().parent().addClass('show');
            }
            setTimeout(action2,3000);
        }

        function action2() {
            var scrollTo = document.getElementById("product" + idFromFoodDetail);
            scrollTo.scrollIntoView();
        }
    }


    getShoppingCart();

    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#products .item').removeClass('grid-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});

    $("body").keyup(function(event) {
        if (event.keyCode == 13) {
            $("#searchBtn").click();
        };
    });

    pagingCallBack();
    /** Food Category */
    // var formData  = {
    //     command     : "getCategoryInventoryMember",
    //     pageNumber  : 1,
    //     language    : language
    // };
    // var fCallback = loadDefaultListing; 
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, fCallback);
    });      
});

function pagingCallBack(pageNumber, fCallback) {
    var searchID = "searchForm";
    console.log(searchID+" , "+selectedCatID);
    //var searchData = buildSearchDataByType(searchID ,liname);
    var formData = {
        command: "getCategoryInventoryMember",
        searchData: $("#searchInput").val(),
        categories  :   selectedCatID,
        language    : language,
        filter      : filter,
    };

    fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing (data,message,session) {
    var fromUrl = document.referrer; 
    var fromUrl2 = fromUrl.substring(fromUrl.lastIndexOf('/') + 1); 

    var clientID = '<?php echo  $_SESSION["userID"]  ?>';

    if(data.productInventory && data.productInventory.length > 0) {
        var foodMenuHTML = '';
    
        $.each(data.productInventory, function(k, v) {
            foodMenuHTML +=  `
                <div class="item col-xs-4 col-lg-4" id="product${v['id']}">
                    <div class="thumbnail position-relative">
            `;

            var favouriteActive = '';

            if(v['favourite']) {
                favouriteActive = 'active';
            }

            if(clientID) {
                foodMenuHTML += `
                        <div class="productFavouriteIcon pb-0">
                            <a href="javascript:void(0)" onclick="favourite(${v['id']}, ${v['favourite']}, ${v['fav_id']})" style="cursor: pointer;">
                                <i class="fa fa-heart ml-0 ${favouriteActive}"></i>
                            </a>
                        </div>
                `;
            }else{
                foodMenuHTML += `
                    <div class="productFavouriteIcon pb-0">
                        <a href="javascript:void(0)" onclick="redirectToLoginPage()" style="cursor: pointer;">
                            <i class="fa fa-heart ml-0"></i>
                        </a>
                    </div>
                `;
            }

            foodMenuHTML +=  `
                        <a href="javascript:void(0)" onclick="foodClick(${v['id']})" style="cursor: pointer;">
            `;

            if(v['image'] == '') {
                foodMenuHTML +=  `
                            <img class="group list-group-image img-fluid defaultFoodImg" src="images/project/newlogo-dark.png" alt="" />
                `;
            } else {
                foodMenuHTML +=  `
                            <img class="group list-group-image img-fluid" src="${v['image']}" alt="" />
                `;
            }
            
            var hasDiscount = false;
            if(v['latestPrice'] != 0) hasDiscount = true;

            foodMenuHTML +=  `
                            <input class="hide" id="image_${v['id']}" value="${v['image']}">
                        </a>
                        <div class="caption">
                            <a href="javascript:void(0)" onclick="foodClick(${v['id']})" style="cursor: pointer;">
                                <p class="group inner list-group-item-text" style="text-align: center;" id="name_${v['id']}">${checkNameLength(v['name'])}</p>
                                <div class="row">
                                    <div class="col-12 text-center priceGrp">
                                        <h4 class="group inner list-group-item-heading">RM <font id="price_${v['id']}">${hasDiscount ? Number(v['latestPrice']).toFixed(2) : Number(v['salePrice']).toFixed(2)}</font></h4>
                                        <h5 class="oriPrice ${hasDiscount ? '' : 'hide'}">RM <font id="price_${v['id']}">${Number(v['salePrice']).toFixed(2)}</font></h5>
                                    </div>
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-12 cart-btn-div">
                                    <div class="row justify-content-center">
            `;
              
            if(v['stockQuantity'] > 0) {                                  
                foodMenuHTML += `<div class="col-auto"><button class="btn button-red" onclick="addToCart(${v['id']})" data-lang="M03878"><?php echo $translations['M03878'][$language]; //Add to Cart ?></button>`;
            } else {
                if(clientID) {
                    foodMenuHTML += `<div class="col-12" style="margin-top: -25px; text-align: center; color: red; font-weight: bold;">(<?php echo $translations['M04031'][$language]; //Out of Stock ?>)</div><div class="col-auto"><button class="btn button-red" onclick="addToWishlist(${v['id']})" data-lang="M04030"><?php echo $translations['M04030'][$language]; //Add to Wishlist ?></button>`;
                } else {
                    foodMenuHTML += `<div class="col-auto"><button class="btn button-grey" data-lang="M04031"><?php echo $translations['M04031'][$language]; //Out of Stock ?></button>`;
                }
            }

            foodMenuHTML += `
                                            </div>
                                        </div>
                            `;

            foodMenuHTML += `
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            `;
        });
    } else {
        foodMenuHTML =`
            <div style="text-align: center; width: 100%; min-height: 350px;">
                <h2 style="color: #ddd; margin-top: 100px;">No Data</h2>
            </div>
        `;
    }
     $("#products").html(foodMenuHTML);

    if(data.categoryList) {        
        if (!liname){
            var foodCategoryHTML = '';
            $.each(data.categoryList, function(l, m) {
                // foodCategoryHTML +=  `                    
                //     <li class="${m['name']}" id="${m['name']}" name="${m['name']}" dataName="type" dataType="select">
                //         ${m['name']}
                // `;

                foodCategoryHTML += `
                    <div id="accordion">
                        <div class="card food-category">`;

                if(m['subCategory'] != null) {
                    foodCategoryHTML += `
                            <li>
                                <div class="card-header" id="heading${l}" data-toggle="collapse" data-target="#collapse${l}" aria-expanded="true">
                                    ${m['name']}
                                    <span class="accicon"><i class="fas fa-angle-down"></i></span>
                                </div>
                                <div id="collapse${l}" class="collapse">
                                    <div class="card-body">
                                        <ul>`;

                    $.each(m.subCategory, function(m, n) {
                        foodCategoryHTML +=  `
                                        <li class="${n['name']}" id="${n['id']}" name="${n['name']}" dataName="type" dataType="select">
                                            ${n['name']}
                                        </li>
                                    `;
                    });

                    foodCategoryHTML += `
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                    `;
                } else {
                    foodCategoryHTML += `
                        <li class="${m['name']}" id="${m['id']}" name="${m['name']}" dataName="type" dataType="select">
                            ${m['name']}
                        </li>
                    `;
                }
            });

            $("#category").html(foodCategoryHTML);
        }        
    }

    window.onload = init;

    if($.cookie("cookieCategory") && $.cookie("cookieCategory") != '') { 
        setTimeout(action,3000);

        function action() {

            var categoryFromFoodDetailBack = $.cookie("cookieCategory");
            
            var elem = $('[name="'+categoryFromFoodDetailBack+'"]');

            $('[name="'+categoryFromFoodDetailBack+'"]').click();

            if (elem.parent().parent().parent().hasClass('collapse')) {
                elem.parent().parent().parent().addClass('show');
            }

            $.cookie("cookieCategory", "");            
        }
    }
    
    var init = setTimeout(function(){
        //return scroll position in session storage
        if ($.cookie("cookieScrollPos") && $.cookie("cookieScrollPos") != '' && $.cookie("cookieScrollPos") > 500){

            $("html").animate({ scrollTop: $.cookie("cookieScrollPos") },0); 

            $.cookie("cookieScrollPos","");
        }
    },1000);
}


function foodClick(id) {
    var scrollPos = $(window).scrollTop();

    $.cookie("cookieScrollPos", scrollPos);
    $.cookie("cookieCategory", chosenCategory);
    $.cookie("keepLoading", "1")
    $.redirect("foodDetails",{id, chosenCategory});
}

document.addEventListener('click',(e) => {
    if(e.target && e.target.matches("ul#category li")) {
        let elem = e.target;
        // let elementClass = e.target.className;
        let elementClass = e.target.getAttribute("name");
        liname = elementClass;
        selectedCatID = e.target.getAttribute("id")


        $("ul#category li").removeClass("active");
        // $(e.target).siblings().removeClass("active");

        if (elementClass !== '') {
            $(e.target).addClass("active");
            $('#breadcrumbCategory').text(elementClass);
            chosenCategory = elementClass;


            var clientID = '<?php echo  $_SESSION["userID"]  ?>';
            var dataValue = elementClass;

            // var foodList = data.productInventory;
            pagingCallBack(pageNumber, dataValue)
        }
    }
})

function addToCart(id) {
    var product_template =[];
    var product_template_name =[];

    var product_template_string = product_template.toString();
    var clientID = '<?php echo  $_SESSION["userID"]  ?>';

    if(!clientID) {
        var total = $('#price_' + id).text();
        localStorageCart =
        {
            packageID   : parseInt(id),
            productID   : parseInt(id),
            quantity    : "1",
            product_template    : product_template_string,
            product_attribute_value_id    : product_template_string,
            product_attribute_name    : product_template_name,
            // img: "1663137058_nl8dpj9t5gbcwvz1_2174tp0wa3slzvfe.jpeg",
            price: total,
            stockCount: 100,
            productName : $('#name_'+id).text(),
            total : numberThousand(total,2),
            img: $('#image_'+id).val(),
        };

        var formData  = {
            command             : 'addShoppingCart',
            packageID           : id,
            quantity            : "1",
            type                : "add",
            product_template    : product_template.toString(),
            step                : 1,
            bkend_token         : bkend_token,
        }; 
    } else {
        var formData  = {
            command             : "addShoppingCart",
            clientID            : '<?php echo  $_SESSION["userID"]  ?>',
            packageID           : id,
            quantity            : "1",
            type                : "add",
            product_template    : product_template.toString(),
            bkend_token         : bkend_token,
        }; 
    }

    var fCallback = successAddCart;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddCart (data,message) {
    bkend_token = data['bkend_token'];
    var addcart = 1;
    getNumberOfCartItems(addcart);

    
    var clientID = '<?php echo  $_SESSION["userID"]  ?>';

    if(!clientID)
        newcart(localStorageCart);
    
    
}

function addToWishlist(id) {
    var formData = {
        command : "addWishList",
        clientID : '<?php echo  $_SESSION["userID"]  ?>',
        product_id :   id,
        action : 'add',
    };

    fCallback = successAddWishList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

}

function successAddWishList(data, message) {
    showMessage(message, 'success', 'Success', 'check', '');
    getNumberOfWishlistItems();
}

function favourite(id, inList, fav_id) {
    selectedProduct = id;

    var formData = {
        command : "addProductFavouriteList",
        clientID : '<?php echo  $_SESSION["userID"]  ?>',
    };

    if(inList) {
        formData['action'] = 'remove';
        formData['favid'] = fav_id;
    } else {
        formData['action'] = 'add';
        formData['product_id'] = selectedProduct;
    }

    fCallback = successFavourite;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function redirectToLoginPage() {
    showMessage('<?php echo $translations['M04078'][$language] /* Login to continue */ ?>', 'success', '', '', 'login');
}

function successFavourite(data, message) {
    $('#product' + selectedProduct).find('.fa-heart').toggleClass('active');
    showMessage(message, 'success', 'Success', 'check', '');
    pagingCallBack(pageNumber, fCallback);
    getNumberOfFavouriteItems();
}

$('.filterMenu').click(function() {
    $('.showDropdown').removeClass('open');
    filterMenu($(this).attr('filter'));
});

function filterMenu(type) {
    filter = type;
    pagingCallBack(pageNumber, fCallback);
}

function checkNameLength(name) {
    if (name.length > 80)
        return name.substring(0,80)+'...';
    else
        return name;
}
</script>