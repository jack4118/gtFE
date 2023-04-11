<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Page Content -->
<div class="kt-container px-0">
    <div class="greyBackdrop show" onclick="toggleSidebar()">
        <div class="text-right"><i class="fas fa-times fa-2x" style="color: #fff; padding: 20px"></i></div>
    </div>
    <div class="banner productListingPortfolioBanner">
        <img src="/images/project/products2.jpg" class="bannerImg">
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03125"><?php echo $translations['M03125'][$language]; //All Products ?></label>
            <!-- <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang="M03125"><?php echo $translations['M03125'][$language]; //All Products ?></span>
            </div> -->
        </div>
    </div>

    <div class="row" style="margin: auto;">
        <div id="sidebar" class="col-lg-3 sidebar show">
            <div class="productSearchBox form-group mb-4">
                <div class="inputBox input-group">
                    <!-- <input id="searchProduct" type="text" class="form-control inputPrepend" placeholder="<?php echo $translations['M03284'][$language]; //Search products... ?>" oninput="loadAutocompleted()"> -->
                    <input id="searchProduct" type="text" class="form-control inputPrepend" placeholder="<?php echo $translations['M03284'][$language]; //Search products... ?>">
                    <div class="input-group-append pSearchBtn" onclick="loadSearchProduct()">
                        <span class="login-input-group-text inputAppendText"><i class="fas fa-search blueFont"></i></span>
                    </div>
                </div>
                <div id="appendOption" class="productAutocompleted" style="display: none"></div>
            </div>

            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-12 px-0 mb-3 filterTitle">
                        <label data-lang="M03234"><?php echo $translations['M03234'][$language]; //Product Categories ?></label>
                    </div>
                    <div id="productCatDiv" class="col row mb-3 productCat">
                        <!-- <div class="col-12">
                            <span data-lang="M03235"><?php echo $translations['M03235'][$language]; //Fresh and Clear ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03236"><?php echo $translations['M03236'][$language]; //Mind and Soul ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03237"><?php echo $translations['M03237'][$language]; //Rest and Relax ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03238"><?php echo $translations['M03238'][$language]; //Shield and Purify ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03239"><?php echo $translations['M03239'][$language]; //Diffuser ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03240"><?php echo $translations['M03240'][$language]; //Foot Spa ?></span>
                        </div>
                        <div class="col-12">
                            <span data-lang="M03241"><?php echo $translations['M03241'][$language]; //Others ?></span>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-12 px-0 mb-3 filterTitle">
                        <label data-lang="M03242"><?php echo $translations['M03242'][$language]; //Filter by Price ?></label>
                    </div>
                    <div class="row mb-3 productFilterPrice">
                        <div class="col-12">
                            <div class="row px-2 sliderDiv">
                                <div id="priceSlider" class="col-12"></div>
                            </div>
                        </div>
                        <div id="price" class="col-12" style="text-align: center;">
                            <!-- <span>Price: Rp 0 - Rp 10,000,000</span> -->
                        </div>
                        <input type="hidden" id="searchMin">
                        <input type="hidden" id="searchMax">
                        <div class="col-12" style="text-align: center;">
                            <button class="btnFilter btn btn-primary" data-lang="M03243" onclick="filterPrice()"><?php echo $translations['M03243'][$language]; //Filter ?></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-12 col-mb-4">
                <div class="row">
                    <div class="col-12 px-0 mb-3 filterTitle">
                        <label data-lang="M03244"><?php echo $translations['M03244'][$language]; //Product Tags ?></label>
                    </div>
                    <div class="col-12 px-0 mb-3 productTag">
                        <ul>
                            <li data-lang="M03235"><?php echo $translations['M03245'][$language]; //Accessories ?></li>
                            <li data-lang="M03236"><?php echo $translations['M03246'][$language]; //Calming ?></li>
                            <li data-lang="M03237"><?php echo $translations['M03247'][$language]; //Flower ?></li>
                            <li data-lang="M03238"><?php echo $translations['M03248'][$language]; //Relaxing ?></li>
                            <li data-lang="M03239"><?php echo $translations['M03249'][$language]; //Spa ?></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>

        <div id="productListing" class="col-lg-9 col-12 productListDiv">
            <div class="col-12 mb-3 filterHeader">
                <div class="text-left filterLeft">
                    <span id="sidebarToggle" class="sidebarToggle alignMiddle" onclick="toggleSidebar()"><i class="fas fa-sliders-h fa-2x"></i></span>
                    <div style="position: relative;" class="ml-4">
                       <input type="checkbox" id="sortBtn" class="sortBtn hide">
                       <label for="sortBtn" class="sidebarToggle sortStyle primary d-md-none d-block"><i class="fa fa-sort-amount-asc fa-2x"></i></label>
                       <div class="sortBox">
                           <button onclick="updateView(this, 'new')" class="topFilter selected" data-lang="M03250"><?php echo $translations['M03250'][$language]; //New ?></button>
                           <!-- <button onclick="updateView(this, 'all')" class="topFilter selected" data-lang="M00015"><?php echo $translations['M00015'][$language]; //View All ?></button> -->
                           <button onclick="updateView(this, 'pricehtl')" class="topFilter" data-lang="M03251"><?php echo $translations['M03251'][$language]; //Price high to low ?></button>
                           <button onclick="updateView(this, 'pricelth')" class="topFilter" data-lang="M03252"><?php echo $translations['M03252'][$language]; //Price low to high ?></button>
                       </div> 
                    </div>
                </div>
                <div class="text-right filterRight">
                    <span id="gridView" onclick="toggleView($(this))"><i class="fas fa-th-large fa-2x active"></i></span>
                    <span id="listView" onclick="toggleView($(this))"><i class="fas fa-bars fa-2x"></i></span>
                </div>
            </div>

            <div id="productGridView" class="col-12 px-0">

            </div>

            <div id="productListView" class="col-12 px-0" style="display: none;">
                    
            </div>
            <div class="row mt-4 px-4 alignMiddle" style="justify-content: space-between;">
                <div class="text-center">
                    <ul class="pagination pagination-md" id="pagerList"></ul>
                </div>
                <span id="paginateText" style="margin-bottom: 1rem;"></span>
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

<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js" type="text/javascript"></script>

<script>

var url             = 'scripts/reqDefault.php';
var jsonUrl         = 'json/productList.json';
var imgPath         = '<?php echo $config['tempMediaUrl'] ?>inv/'
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";
var pagerId  = 'pagerList';
var rowPerPage = 24;
var totalRow = 0;
var totalPage = 0;

var minPrice = 0;
var maxPrice = 10000000;

var test = [];

var catListlen = 0;
var prodListlen = 0;
var listHtml;
var gridHtml;
var langList = {
    english: "eng",
    chineseSimplified: "cSim",
    chineseTraditional: "cTra",
    indonesian: "indo"
};
var jsonData;
var currentData;
var searchCatID;
var currentCID = 100;
var currentType = "new";
var countryID = '<?php echo $_SESSION['countryID'] ?>' || ""
var sessionID = '<?php echo $_SESSION['sessionID'] ?>' || ""
var isLoggedIn = false;
    
$(document).ready(function() {


    if (countryID && countryID != 0 && countryID != "") {
        currentCID = countryID
    }

    if (sessionID != '') {
        isLoggedIn = true
    }
    

    $.getJSON(jsonUrl, function( data ) {
        jsonData = productCountryHandler(data, currentCID);
        currentData = jsonData.productList;

        getCurrency(currentCID, jsonData.curList);

        // var items = [];
        // $.each( data, function( k, v ) {
        //   items.push( "<li id='" + k + "'>" + v + "</li>" );
        // });

        if (jsonData.catList) {
            catListlen = Object.keys(jsonData.catList).length;
        } else {
            catListlen = 0
        }

        if (jsonData.productList) {
            prodListlen = Object.keys(jsonData.productList).length;
        } else {
            prodListlen = 0
        }

        
        loadDefaultListing(jsonData);
    });

    $('#priceSlider').slider({
        range: true,
        min: 0,
        max: 10000000,
        values: [0, 10000000],
        slide: function(event, ui) {
            $('#price').html(`Price: Rp ${addCommas(ui.values[0])} - Rp ${addCommas(ui.values[1])}`);
        },
        stop: function(event, ui) {
            minPrice = $(this).slider('values', 0);
            maxPrice = $(this).slider('values', 1);
        }
        
    });

    $('#price').html(`Price: Rp ${addCommas($('#priceSlider').slider('values', 0))} - Rp ${addCommas($('#priceSlider').slider('values', 1))}`);

    
    // for(var i = 0; i < catListlen;i++)
    //     if($('#checkbox'+(i+1)).is(':checked'))
    //         test.push($('#checkbox'+(i+1)).val());
    // test = [];

    $("#searchProduct").on("keydown", function(e){
        var allItem = $(".productItem");
        var selectedItem = $(".productItem.selected");
        var isDropdown = allItem.length>0?true:false;
        var isActive = selectedItem.length>0?true:false;
        var prevInd = 0;
        var nextInd = 0;

        if(isDropdown) {
            if(isActive) {
                var cInd = allItem.index(selectedItem);
                nextInd = cInd + 1;
                prevInd = cInd - 1;

                if(nextInd >= allItem.length) {
                    nextInd = cInd;
                }

                if(prevInd < 0) {
                    prevInd = 0;
                }
            }else{
                prevInd = 0;
                nextInd = 0;
            }
        }

        if(e.keyCode == 40) {
            e.preventDefault();
            $(".productItem").removeClass("selected");
            $(".productItem").eq(nextInd).addClass("selected");
        }else if(e.keyCode == 38){
            e.preventDefault();
            $(".productItem").removeClass("selected");
            $(".productItem").eq(prevInd).addClass("selected");
        }else if(e.keyCode == 13){
            e.preventDefault();
            if(isDropdown && isActive) {
                var text = $(".productItem.selected").text();
                $(this).val(text);
                $("#appendOption").hide();
            }
            loadSearchProduct();
        }else{
            loadAutocompleted();
        }
    });
});

function loadSearchProduct() {
    var inp = $("#searchProduct").val();

    if(inp != "") {
        var formData  = {
          command: 'getProductIDForSearch',
          searchWord: inp
        };
        var fCallback = displaySearchProduct;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }else {
        $("#allCateBtn").trigger("click");
    }
}

function displaySearchProduct(data, message) {
    var searchProducts = jsonData['productList'].filter((item) => $.inArray(item['id'], data['productID']) >= 0);
    currentData = searchProducts;
    buildListing();

    $('.catItem').removeClass("active");
}

function filterPrice() {

    searchCatID = $('.catItem.active').attr("data-cat");
    var wsData = jsonData;

    if(searchCatID == "all") {
        currentData = wsData['productList'];
    }else {
        var filteredData = (wsData.productList).filter((item) => $.inArray(searchCatID, item['cat']) >= 0);
        currentData = filteredData;
    }

    filteredData = (currentData).filter(function(item){
        return (parseFloat(item['price'][currentCID]['retail'])>=minPrice && parseFloat(item['price'][currentCID]['retail'])<=maxPrice);
    });

    currentData = filteredData;
    buildListing();
};

function resetSlider() {
    var $slider = $("#priceSlider");
    $slider.slider("values", 0, 0);
    $slider.slider("values", 1, 10000000);

    $('#price').html(`Price: Rp ${addCommas($('#priceSlider').slider('values', 0))} - Rp ${addCommas($('#priceSlider').slider('values', 1))}`);
}

function loadDefaultListing(data) {
    
    var productCatDivHtml = `
        <div id="allCateBtn" class="catItem active" data-cat="all">
            <?php echo $translations['M00055'][$language]; // All ?>
        </div>
    `;
    
    var tableNo;
    if(data.catList) {
        $.each(data.catList, function(k, v) {
            productCatDivHtml += 
            `
            <div class="catItem" data-cat="${k}">
                ${v[langList['<?php echo $_SESSION['language']; ?>']]}
            </div>
            `;
        });
    }
    else {
        productCatDivHtml += ``
    }
    $('#productCatDiv').html(productCatDivHtml);

    // buildListing();
    pagingCallBack(pageNumber);


    $(".catItem").click(function(){
        $("#searchProduct").val("");
        $('.catItem').removeClass("active");
        $(this).addClass("active");
        searchCatID = $(this).attr("data-cat");
        var wsData = jsonData;

        if(searchCatID == "all") {
            currentData = wsData['productList'];
        }else {
            var filteredData = (wsData.productList).filter((item) => $.inArray(searchCatID, item['cat']) >= 0);
            currentData = filteredData;
        }
        
        buildListing();
        resetSlider();
    });

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
    
}

function loadAutocompleted() {
    $.getJSON("/json/autocompleteProductList.json", function( data ) {
        var inp = $("#searchProduct").val();
        var expression = new RegExp(inp, "i");
        var optionDropdown = $("#appendOption");
        optionDropdown.empty();
        var itemArr = [];

        var count = 0;
        $.each(data,function (k,v) {
            if (v['name'].search(expression) != -1) {
                optionDropdown.show();

                if($.inArray(v['name'], itemArr) == -1) {
                    itemArr.push(v['name']);
                    optionDropdown.append('<div class="productItem">'+v['name']+'</div>');
                }
            }
        });
    });

    // $("#appendOption").html();
}

$(document).on("click",'.productItem',function(){
    var productName = $(this).text();
    $("#searchProduct").val(productName);
    $("#appendOption").hide();
});

$(document).on("blur",'#searchProduct',function(){
    var optionDropdown = $("#appendOption");
    setTimeout(function(){
        optionDropdown.hide();
    }, 200);
});

function pagingCallBack(pn) {
    pageNumber = pn;
    buildListing();
}


function buildListing() {
    var list = currentData;

    if (list == null) {
        var productListViewHtml = "";
        var productGridViewHtml = "";

        var noProductDisplay = `
            <div class="col-12 text-center mt-5">
                <img src="images/project/no-results.png" class="noResultIcon">
            </div>
            <div class="col-12 text-center mt-4">
                <h5><?php echo $translations['M03403'][$language]; /* No Products Found. */?></h5>
            </div>
        `
        productListViewHtml += `<div class="row">`;
        productGridViewHtml += `<div class="row">`;

        productGridViewHtml += noProductDisplay;
        productListViewHtml += noProductDisplay;

        $('#productListView').html(productListViewHtml);
        $('#productGridView').html(productGridViewHtml);

        return

    }   


    totalRow = currentData.length;   
    totalPage = Math.ceil(totalRow/rowPerPage);
    pagination(pagerId, pageNumber, totalPage, totalRow, rowPerPage);

    if(currentType == "new") {
        list = list.slice().reverse();;
    }

    if(currentType == "pricelth") {
        list = list.slice().sort((a, b) => parseFloat(a['price'][currentCID]['retail']) - parseFloat(b['price'][currentCID]['retail']));
    }

    if(currentType == "pricehtl") {
        list = list.slice().sort((a, b) => parseFloat(b['price'][currentCID]['retail']) - parseFloat(a['price'][currentCID]['retail']));
    }

    var startFrom = (pageNumber-1)*rowPerPage;
    list = list.slice().splice(startFrom, rowPerPage);

    var productListViewHtml = "";
    var productGridViewHtml = "";

    var noProductDisplay = `
        <div class="col-12 text-center mt-5">
            <img src="images/project/no-results.png" class="noResultIcon">
        </div>
        <div class="col-12 text-center mt-4">
            <h5><?php echo $translations['M03403'][$language]; /* No Products Found. */?></h5>
        </div>
    `
    productListViewHtml += `<div class="row">`;
    productGridViewHtml += `<div class="row">`;

    var starterKitPurchased = parseInt(localStorage.getItem('starterKitPurchased'))

    if(list.length>0) {
        $.each(list, function(k, v) {

            var nameDisplay = v[langList['<?php echo $_SESSION['language']; ?>']]['name'];

            var imgUrl;
            if (v['img'] !== null) {
                imgUrl = imgPath + v['img'][0]
            } else {
                imgUrl = "/images/project/noProductImg.png"
            }

            var price = numberThousand(v['price'][currentCID]['retail'], 2);
            var promoPrice = numberThousand(v['price'][currentCID]['promo'], 2);


            var hasPromo = true;

            if (v['price'][currentCID]['promo'] == 0) {
                var memberPrice = v['price'][currentCID]['retail'];
                hasPromo = false;
            } else {
                var memberPrice = v['price'][currentCID]['promo'];  
            }

            if (isLoggedIn) {

                var discountPercentage = localStorage.getItem('discountPercentage')

                if (discountPercentage == 25) {
                    if (v['price'][currentCID]['mPrice'] > 0) {
                        memberPrice = v['price'][currentCID]['mPrice']
                    } else {
                        memberPrice = getMemberPrice(memberPrice)
                    } 
                } else if (discountPercentage == 30) {
                   if (v['price'][currentCID]['msPrice'] > 0) {
                       memberPrice = v['price'][currentCID]['msPrice']
                   } else {
                       memberPrice = getMemberPrice(memberPrice)
                   } 
                }

            } else {

                memberPrice = getMemberPrice(memberPrice)
            }


            buildPrice = `
                <div class="mt-3 productDesc">
                    <span>Retail Price:</span>
                    <span id="price${k}" class="productPrice">${getCurrency()} ${price}</span>
                </div>
            `

            buildListPrice = `
                <div class="row productDesc">
                    <span>Retail Price:</span>
                    <span class="productPrice">${getCurrency()} ${price}</span>
                </div>
            `

            var buildAmountSection = ""

            if (isLoggedIn) {

                if (hasPromo) {
                    buildPrice = `
                        <div class="mt-3 productDesc">
                            <span>Retail Price:</span>
                            <span id="price${k}" class="productPrice promoSlash">${getCurrency()} ${price}</span>
                        </div>
                        <div class="mt-1 productDesc">
                            <span>Promo Price:</span>
                            <span id="price${k}" class="productPrice">${getCurrency()} ${promoPrice}</span>
                        </div>
                    `

                    buildListPrice = `
                        <div class="row productDesc">
                            <span>Retail Price:</span>
                            <span class="productPrice promoSlash">${getCurrency()} ${price}</span>
                        </div>
                        <div class="row productDesc">
                            <span>Promo Price:</span>
                            <span class="productPrice">${getCurrency()} ${promoPrice}</span>
                        </div>
                    `
                } 

                if (v['str'] == 1) {

                    buildAmountSection = `
                        ${buildPrice}
                        <div class="mt-1 productDesc">
                            <span>PV:</span>
                            <span class="productPrice">${v['pv']} PV</span>
                        </div>
                    `

                    buildListAmountSection = `
                        ${buildListPrice}
                        <div class="row productDesc">
                            <span>PV:</span>
                            <span class="productPrice">${v['pv']} PV</span>
                        </div>
                    `

                } else {

                    if (starterKitPurchased) {
                        buildAmountSection = `
                            ${buildPrice}
                            <div class="mt-1 productDesc">
                                <span>Member Price:</span>
                                <span class="productPrice">${getCurrency()} ${numberThousand(memberPrice, 2)}</span>
                            </div>
                            <div class="mt-1 productDesc">
                                <span>PV:</span>
                                <span class="productPrice">${v['pv']} PV</span>
                            </div>
                        `

                        buildListAmountSection = `
                            ${buildListPrice}
                            <div class="row productDesc">
                                <span>Member Price:</span>
                                <span class="productPrice">${getCurrency()} ${numberThousand(memberPrice, 2)}</span>
                            </div>
                            <div class="row productDesc">
                                <span>PV:</span>
                                <span class="productPrice">${v['pv']} PV</span>
                            </div>
                        `

                    } else {

                        buildAmountSection = `
                            ${buildPrice}
                            <div class="mt-1 productDesc">
                                <span>PV:</span>
                                <span class="productPrice">${v['pv']} PV</span>
                            </div>
                        `

                        buildListAmountSection = `
                            ${buildListPrice}
                            <div class="row productDesc">
                                <span>PV:</span>
                                <span class="productPrice">${v['pv']} PV</span>
                            </div>
                        `


                    }

                    

                }

                
            } else {

                buildAmountSection = `
                    ${buildPrice}
                `;

                buildListAmountSection = `
                    ${buildListPrice}
                `;


            }


            productGridViewHtml += 
            `
            <div id="div${k}" class="col-md-6 col-lg-4 mt-4">
                <div class="productDiv">
                    <div onclick="productDetail('${v['code']}', '${imgUrl}')">
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
                                    <div class="input-group-append inputGroupBtn remove">
                                        <div class="inputAppendIcon">-</div>
                                    </div>
                                    <input type="text" class="form-control productQty" style="text-align: center;" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" />
                                    <div class="input-group-append inputGroupBtn add">
                                        <div class="inputAppendIcon">+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-primary btnAddToCart" productID="${v['id']}">
                                    <img src="/images/project/basket.png">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `

            productListViewHtml += 
            `
            <div id="listdiv${k}" class="row" style="width:100%;">
                <div class="col-12">
                    <div class="productList">
                        <div class="row mx-0 alignMiddle">
                            <div class="col-md-2 px-0"style="cursor:pointer" onclick="productDetail('${v['code']}', '${imgUrl}')" >
                                <img src="${imgUrl}">
                            </div>
                            <div class="col-md-7 paddingTopTenMobile">
                                <div class="row mx-0 alignMiddle">
                                    <div class="col-md-4">
                                        <span class="productTitle">${nameDisplay}</span>
                                    </div>
                                    <div class="col-md-5">
                                        ${buildListAmountSection}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 paddingTopTenMobile">
                                <div class="row productDesc">
                                    <div class="col-8">
                                        <div class="productInputBox input-group">
                                            <div class="input-group-append inputGroupBtn remove">
                                                <div class="inputAppendIcon">-</div>
                                            </div>
                                            <input type="text" class="form-control productQty" style="text-align: center;" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onkeyup="this.value = this.value==''?'1':this.value" />
                                            <div class="input-group-append inputGroupBtn add">
                                                <div class="inputAppendIcon">+</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button class="btn btn-primary btnAddToCart" productID="${v['id']}">
                                            <img src="/images/project/basket.png">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `

        });
    }
    else {
        productGridViewHtml += noProductDisplay;
        productListViewHtml += noProductDisplay;
    }

    productListViewHtml += `</div>`;
    productGridViewHtml += `</div>`;

    $('#productListView').html(productListViewHtml);
    $('#productGridView').html(productGridViewHtml);
}


$(document).on("click", ".btnAddToCart", function() {
    var productID = $(this).attr("productID")
    var quantity = $(this).closest("div").siblings().find(".productQty").val()

    addItem(productID, quantity)

})

function productDetail(code, imgUrl){
    $.redirect("productDetail", {
        code,
        imgUrl
    });
}

function toggleSidebar() {
    $('.sidebar').is(":visible") ? $('.sidebar').hide() : $('.sidebar').show();
    $('.sidebar').toggleClass('show');
    $('.greyBackdrop').toggleClass('show');
    $('#productListing').toggleClass('col-md-8 col-md-12');
    $('#productListing').toggleClass('col-lg-9 col-lg-12');
    // $('.productDiv').parent().toggleClass('col-md-6 col-md-4');
    $('.productDiv').parent().toggleClass('col-lg-4 col-lg-3');
}

function updateView(btn, type) {
    currentType = type;
    buildListing();

    $('.topFilter').removeClass("selected");
    $(btn).addClass("selected");
}

function toggleView(icon) {
    if(!icon.children().hasClass('active')) {
        $('#gridView').children().toggleClass('active');
        $('#listView').children().toggleClass('active');
    }

    if($('#gridView').children().hasClass('active')) {
        $('#productGridView').show();
        $('#productListView').hide();
    } else {
        $('#productGridView').hide();
        $('#productListView').show();
    }
}

</script>