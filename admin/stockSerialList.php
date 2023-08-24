<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
//Form submission issue
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
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
                <div class="card-box" style="border-radius:0px">
                    <div class="">
                        <div class="col-xl-12">
                            <div class="row" style="display:flex">
                                <div class="col-md-6 m-b-10">
                                    <span><?php echo $translations['A01695'][$language]; ?>: </span>
                                    <span id="productName">-</span>
                                </div>
                                <div class="col-md-6 m-b-10">
                                    <span><?php echo $translations['A01703'][$language]; ?>: </span>
                                    <span id="vendorName">-</span>
                                    <br/>
                                    <span><?php echo $translations['A01702'][$language]; ?>: </span>
                                    <span id="code">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                            <?php echo $translations['A01702'][$language]; /* SKU code */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="skuCode" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01695'][$language]; /* Product Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="product" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="email">
                                                            <?php echo $translations['A01701'][$language]; /* Serial Number */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="serialNo" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" data-th="disabled">
                                                            <?php echo $translations['A01705'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="Sold">
                                                                <?php echo $translations['M03098'][$language]; /* Sold */ ?>
                                                            </option>
                                                            <option value="Active">
                                                                <?php echo $translations['M03654'][$language]; /* Active */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="email">
                                                            <?php echo $translations['A01738'][$language]; /* Best Before Date */ ?>
                                                        </label>
                                                        <input type="date" class="form-control" dataName="date" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
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
        '<?php echo $translations['A01701'][$language]; /* Serial Number */ ?>',
        '<?php echo $translations['A01738'][$language]; /* Best Before Date */ ?>',
        '<?php echo $translations['A01705'][$language]; /* Status */ ?>',

        // '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        // '<?php echo $translations['A01700'][$language]; /* Expiration Date */ ?>',
        // '<?php echo $translations['A01699'][$language]; /* Stock In Date */ ?>'
    );
    var searchId = 'searchForm';

    var sortThArray = Array(
        "barcode",
        "name",
        "serial_number",
        "expiration_date",
        "status"
    );

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var poId            = '<?php echo $_POST['poId']; ?>';
    var productId       = '<?php echo $_POST['productId']; ?>';
    var productName     = "<?php echo $_POST['productName']; ?>" != "-" ? "<?php echo $_POST['productName']; ?>" : "";
    var vendorName      = '<?php echo $_POST['vendorName']; ?>' != "-" ? '<?php echo $_POST['vendorName']; ?>' : "";
    var code            = '<?php echo $_POST['code']; ?>' != "-" ? '<?php echo $_POST['code']; ?>' : "";

    $(document).ready(function() {
        $('span#productName').html(productName);
        $('span#vendorName').html(vendorName);
        $('span#code').html(code);

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
    });

    /* Call getStockList API */
    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var sortData = getSortData(tableId);

        /* Search data */
        var searchData  = buildSearchDataByType(searchId);
        var formData    = {
            command     : "getStockList",
            pageNumber  : pageNumber,
            inputData   : searchData,
            layer       : 3,
            poId        : poId,
            productId   : productId,
            sortData    : sortData
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    /* getStockList callback (Stock Listing) */
    function loadDefaultListing(data, message) {
        // console.log(data);
        var tableNo;

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }

        if(data){
            if (data.stockList != "" && data.stockList.length > 0) {
                var newList = []
                $.each(data.stockList, function(k, v) {

                    var buildBtn = `
                            <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                        `;

                    var textColor = '#000';
                    if(v['status'] == 'Sold') textColor = 'red';
                    else if(v['status'] == 'Active') textColor = 'green';

                    var rebuildData = {
                        // id                  : v['id'],
                        barcode             : v['barcode'],
                        name                : v['name'],
                        serial_number       : v['serial_number'],
                        best_before         : v['expiration_date'],
                        status              : v['status'],
                        buildBtn            : buildBtn,
                        textColor           : textColor,

                        // expiration_date     : v['expiration_date'],
                        // stock_in_datetime   : v['stock_in_datetime'],
                    };
                    newList.push(rebuildData);
                }); 
            }
        }
        
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data.stockList) {
            $('#'+tableId).find('thead tr').each(function() {
                $(this).find('th:eq(1)').css('text-align', "right");           
            });
            $('#'+tableId).find('tbody tr').each(function() {
                $(this).find('td:eq(1)').css('text-align', "right");
                $(this).find('td:last-child').css('display', "none");

                if($(this).find('td:last-child').text() == 'red') {
                    $(this).find('td').css('color', $(this).find('td:last-child').text());
                } else if($(this).find('td:last-child').text() == 'green') {
                    $(this).find('td').css('color', $(this).find('td:last-child').text());
                }
            });
        }
    }

    function editRecord(stockID) {
        $.redirect('editStock.php', {
            stockID     : stockID,
            poId        : poId,
            productId   : productId,
            productName : productName,
            vendorName  : vendorName,
            code        : code
        });
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function testing(){
        console.log('test');
    }

    function redirectBreadcrumbs() {

        if(productName.includes("zzz123666")) {
            productName = productName.replace("zzz123666","'");
        }
        $.redirect("stockBatchList.php", {productId : productId, productName : productName, vendorName : vendorName, code : code});
    }

</script>
</body>
</html>