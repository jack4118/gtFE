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
                                                            <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="username" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="email">
                                                            <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="email" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
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
        '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        '<?php echo $translations['A01695'][$language]; /* Product Name */ ?>',
        '<?php echo $translations['A01701'][$language]; /* Serial Number */ ?>',
        '<?php echo $translations['A01700'][$language]; /* Expiration Date */ ?>',
        '<?php echo $translations['A01699'][$language]; /* Stock In Date */ ?>'
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
    var poId            = '<?php echo $_POST['poId']; ?>';
    var productName     = '<?php echo $_POST['productName']; ?>' != "-" ? '<?php echo $_POST['productName']; ?>' : "";
    var vendorName      = '<?php echo $_POST['vendorName']; ?>' != "-" ? '<?php echo $_POST['vendorName']; ?>' : "";
    var code            = '<?php echo $_POST['code']; ?>' != "-" ? '<?php echo $_POST['code']; ?>' : "";

    $(document).ready(function() {
        console.log(productName);
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
        /* Toggle search function */
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    /* Call getStockList API */
    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;
        /* Search data */
        var searchData  = buildSearchDataByType(searchId);
        var formData    = {
            command     : "getStockList",
            pageNumber  : pageNumber,
            inputData   : searchData,
            layer       : 3,
            poId        : poId
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    /* getStockList callback (Stock Listing) */
    function loadDefaultListing(data, message) {
        var tableNo;
        console.log(data);
        if (data.stockList != "" && data.stockList.length > 0) {
            var newList = []
            $.each(data.stockList, function(k, v) {
                var rebuildData = {
                    id                  : v['id'],
                    name                : v['name'],
                    serial_number       : v['serial_number'],
                    expiration_date     : v['expiration_date'],
                    stock_in_datetime   : v['stock_in_datetime'],
                };
                newList.push(rebuildData);
            }); 
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

</script>
</body>
</html>