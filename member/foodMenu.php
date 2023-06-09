<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section">
    <div class="row">
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
        <div class="row mb-5 form-group">
            <div class="col-md-6">
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" data-lang="M03873"><?php echo $translations['M03873'][$language]; //Home ?></a></li>
                        <li class="breadcrumb-item" data-lang="M03874"><?php echo $translations['M03874'][$language]; //Categories ?></li>
                        <!-- <li class="breadcrumb-item" data-lang="03889"><?php echo $translations['M03889'][$language]; //All Products ?></li> -->
                        <li class="breadcrumb-item" id="breadcrumbCategory"></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-left text-md-right">
                <div class="well well-sm">
                    <font style="font-size: 14px;" data-lang="M03890"><?php echo $translations['M03890'][$language]; //Sort by ?>:</font>
                    <div class="btn-group">
                        <a href="#" id="grid" class="btn btn-default btn-sm d-none d-md-block">
                            <i class="fa fa-th-large"></i>
                        </a>
                        <a href="#" id="list" class="btn btn-default btn-sm d-none d-md-block">
                            <i class="fa fa-th-list"></i>
                        </a>

                        <input id="searchInput" type="text" class="form-control" placeholder="<?php echo $translations['M00052'][$language] /* Search */ ?>" dataType="text" dataName="name">
                        <a href="javascript:void(0)" id="searchBtn" class="btn btn-default btn-sm d-none d-md-block" style="background-image: linear-gradient(to bottom, #f37067, #c82f26);">
                            <i class="fa fa-search" style="color: #fff !important;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
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
var language = "<?php echo $language; ?>";

$(document).ready(function(){
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#products .item').removeClass('grid-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});

    $("body").keyup(function(event) {
        if (event.keyCode == 13) {
            $("#searchBtn").click();
        }
    });

    // /** Food List **/
    // var formData  = {
    //     command     : "getProductInventoryList",
    //     pageNumber  : 1
    // };
    // var fCallback = loadDefaultListing; 
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    /** Food Category */
    var formData  = {
        command     : "getCategoryInventoryMember",
        pageNumber  : 1,
        language    : language
    };
    var fCallback = loadDefaultListing; 
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, fCallback);
    });        
});

function pagingCallBack(pageNumber, fCallback){
    // if(pageNumber > 1) bypassLoading = 1;

    var searchID = "searchForm";
    var searchData = buildSearchDataByType(searchID);
    var formData   = {
        command     : "getCategoryInventoryMember",
        pageNumber  : pageNumber,
        searchData  : searchData,
        language    : language,
    }; 

    if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing (data,message) { 
    
    if(data.productInventory && data.productInventory.length > 0) {
        var foodMenuHTML = '';
    
        $.each(data.productInventory, function(k, v) {
            foodMenuHTML +=  `
                <div class="item col-xs-4 col-lg-4">
                    <a href="javascript:void(0)" onclick="foodClick(${v['id']})" style="cursor: pointer;">
                        <div class="thumbnail">
                            <img class="group list-group-image img-fluid" src="${v['image']}" alt="" />
                            <div class="caption">
                                <p class="group inner list-group-item-text" style="text-align: center;">
                                    ${v['name']}</p>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4 class="group inner list-group-item-heading" style="margin-bottom: 15px;">RM${numberThousand(v['salePrice'],2)}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 cart-btn-div">
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <div class="btn button-red button-fix-width-2" href="#1" data-lang="M02181"><?php echo $translations['M02181'][$language]; //View ?></div>
                                                <!-- <i class="fa fa-heart "></i> -->
                                            </div>
                                        </div>
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
                                        <li class="${n['name']}" id="${n['name']}" name="${n['name']}" dataName="type" dataType="select">
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
                        <li class="${m['name']}" id="${m['name']}" name="${m['name']}" dataName="type" dataType="select">
                            ${m['name']}
                        </li>
                    `;
                }

                // if(m['subCategory'] != null) {
                //     foodCategoryHTML +=  `
                //         <ul class="subCat">
                //     `;

                //     $.each(m.subCategory, function(m, n) {
                //         foodCategoryHTML +=  `
                //             <li class="${n['name']}" id="${n['name']}" name="${n['name']}" dataName="type" dataType="select">${n['name']}</li>
                //         `;
                //     });

                //     foodCategoryHTML +=  `
                //             </ul>
                //         </li>
                //     `;
                // }

            });

            $("#category").html(foodCategoryHTML);
        }        
    }
}


function foodClick(id) {
    $.redirect("foodDetails",{id});
}

document.addEventListener('click',(e) => {
    if(e.target && e.target.matches("ul#category li")) {
        let elem = e.target;
        // let elementClass = e.target.className;
        let elementClass = e.target.getAttribute("name");
        liname = elementClass;

        $(e.target).siblings().removeClass("active");

        if (elementClass !== '') {
            $(e.target).addClass("active");
            $('#breadcrumbCategory').text(elementClass);

            var clientID = '<?php echo  $_SESSION["userID"]  ?>';
            var dataValue = elementClass;

            // var foodList = data.productInventory;
            pagingCallBack(pageNumber, dataValue)

            // var formData  = {
            //     // command     : "getProductListMember",
            //     command     : "getCategoryInventoryMember",
            //     // dataName    : "type",
            //     // dataType    : "select",
            //     // dataValue   : dataValue
            //     categories  :   elementClass
            // };
            // var fCallback = loadDefaultListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }
})

function pagingCallBack(pageNumber, fCallback) {

    var searchID = "searchForm";
        var searchData = buildSearchDataByType(searchID ,liname);
        var formData = {
            command: "getCategoryInventoryMember",
            searchData: $("#searchInput").val(),
            categories  :   liname,
            language    : language,
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
</script>