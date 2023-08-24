<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">

    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>

    <div class="content-page">
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01789'][$language]; /* SKU code (add “,” for search multiple”) */ ?>
                                                        </label>
                                                        <input id="skuCode" type="text" class="form-control" dataName="skuCode" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01695'][$language]; /* Product Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="productName" dataType="text">
                                                    </div>
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="email">
                                                            <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="email" dataType="text">
                                                    </div> -->
                                                </div>
                                            </div>
                                            <!-- <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" data-th="disabled">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="disabled" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </form>


                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                            Export to xlsx
                        </button>
                        <button id="seeAllBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                            See All
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A01702'][$language]; /* SKU code */ ?>',
        '<?php echo $translations['A01695'][$language]; /* Product Name */ ?>',
        '<?php echo $translations['A01696'][$language]; /* Quantity On Hand */ ?>',
        '<?php echo $translations['A01736'][$language]; /* Lock Quantity */ ?>',
        'Forecast Quantity',
        '<?php echo $translations['A01737'][$language]; /* Available Quantity */ ?>',
        'WishList Quantity',

        // '<?php echo $translations['A01697'][$language]; /* Total Purchased */ ?>',
        // '<?php echo $translations['A01698'][$language]; /* Total Sold */ ?>',
        // '<?php echo $translations['A01703'][$language]; /* Vendor Name */ ?>',
        // '<?php echo $translations['A01700'][$language]; /* Expiration Date */ ?>'
    );

    var sortThArray = Array(
        "barcode",
        "name"
    );

    var searchId = 'searchForm';

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 

    $(document).ready(function() { 
        /* Enter to toggle search button */
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        /* Reset all search fields */
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        pagingCallBack(pageNumber, loadSearch);
        
        /* Toggle search function */
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#seeAllBtn').click(function() {
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = "searchForm";
            var searchData = buildSearchDataByType(searchID);
            var formData   = {
                command     : "getStockList",
                searchData  : searchData,
                pageNumber  : 1,
                seeAll      : 1,
                layer       : 1
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#exportBtn').click(function () {
            var searchId = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
            var thArray  = Array (
                "SKU Code",
                "Product Name",
                "Quantity On Hand",
                "Lock Quantity",
                "Forecast Quantity",
                "Available Quantity",
                "WishList Quantity"
            );
            var key = Array(
                "barcode",
                "name",
                "on_hand",
                "lock_amt",
                "forecast_amt",
                "available_amt",
                "wishlist_amt"
            );

            var formData = {
                command: "getStockList",
                filename: "StockListReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "stockList",
                type: 'export',
                layer       : 1
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    /* Call getStockList API */
    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 0;
        /* Search data */
        var searchData  = buildSearchDataByType(searchId);

        var sortData = getSortData(tableId);

        var formData    = {
            command     : "getStockList",
            pageNumber  : pageNumber,
            inputData   : searchData,
            layer       : 1,
            sortData    : sortData
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    /* getStockList callback (Stock Listing) */
    function loadDefaultListing(data, message) {
        if (data) {
            $("#exportBtn, #seeAllBtn").show();
        } else {
            $("#exportBtn, #seeAllBtn").hide();
        }

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }

        var tableNo;
        if(data){
            if (data.stockList != "" && data.stockList.length > 0) {
                var newList = []
                $.each(data.stockList, function(k, v) {

                    if (v['name'].indexOf('\'') >= 0) {
                        var str = v['name'].replace(/'/g, "*");
                    } else {
                        var str = v['name'];
                    }

                    let a = v['name']

                    a = a.replace("'","zzz123666")

                    if(v["product_type"] == "package"){
                        var viewBtn = `
                            <a data-toggle="tooltip" title="" onclick="getBarcodeList('${v['product_id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby=""><i class="fa fa-list"></i></a>
                        `;
                    }
                    else {
                        var viewBtn = `
                            <a data-toggle="tooltip" title="" onclick="viewBatch('${v['product_id']}', '${a}', '${v['vendor']}', '${v['barcode']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby=""><i class="fa fa-list"></i></a>
                            <!-- <a data-toggle="tooltip" title="" onclick="viewBatch('${v['product_id']}', '${str}', '${v['vendor']}', '${v['barcode']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby=""><i class="fa fa-check"></i></a> -->
                        `;
                    }

                    var rebuildData = {
                        barcode         : v['barcode'],
                        name            : v['name'],
                        on_hand         : v['on_hand'],
                        lock_amt        : v['lock_amt'],
                        forecast_amt    : v['forecast_amt'],
                        available_amt   : v['available_amt'],
                        wishlist_amt    : v['wishlist_amt'],

                        // below is unuse in the future
                        // vendor          : v['vendor'],
                        // expiration_date : v['expiration_date'],
                        viewBtn         : viewBtn
                    };
                    newList.push(rebuildData);
                }); 
            }
        }
        
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data.stockList) {
            $('#'+tableId).find('thead tr').each(function() {
                $(this).find('th:eq(2)').css('text-align', "right");
            });
            $('#'+tableId).find('tbody tr').each(function() {
                $(this).find('td:eq(2)').css('text-align', "right");
            });
        }
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function viewBatch(productId, productName, vendorName, code) {
        if(productName.includes("zzz123666")) {
            productName = productName.replace("zzz123666","'");
        }
        $.redirect("stockBatchList.php", {productId : productId, productName : productName, vendorName : vendorName, code : code});
    }

    function getBarcodeList(productId) {
        var formData = {
            command     : "getPackageBarcode",
            productID   : productId,
        };
        fCallback = appendBarcodeString;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function appendBarcodeString(data) {
        if(data){
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#skuCode').val(data);
            document.getElementById("searchBtn").click();
        }
    }

</script>
</body>
</html>