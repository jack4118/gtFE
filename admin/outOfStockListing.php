<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

$countryList = $_SESSION['countryList'];
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
                    <div class="col-sm-4">
                        <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-12">
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
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="country" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>

                                                            <?php
                                                            foreach ($countryList as $value => $countryRow) {
                                                                echo "<option value='".$countryRow['id']."'>".$countryRow['display']."</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="paid">
                                                                Paid
                                                            </option>
                                                            <option value="unpaid">
                                                                Unpaid
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    

                    <div class="col-lg-12">
                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
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
    var url       = 'scripts/reqAdmin.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        'Date',
        'Product Code',
        'Product Name',
        ''
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        $('#backBtn').click(function() {
            $.redirect('productStockDetail.php');
        });
        pagingCallBack(pageNumber, loadSearch);
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });



    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        var tableNo;

        if(data && data != null) {
            var newList = [];
            $.each(data.result, function(k, v) {
                var addBtn = `
                    <a data-toggle="tooltip" title="" onclick="addStock('${v['productID']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="edit" aria-describedby="" style="margin:0px 4px 0px 4px">
                        <i class="fa fa-edit"></i>
                    </a>`;

                var rebuildData = {
                    outOfStockDate      : v['outOfStockDate'],
                    productCode         : v['productCode'],
                    productName         : v['productName'],
                    addBtn : addBtn
                };

                newList.push(rebuildData);
            });

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
        else{
            $('#listingDiv').css({"padding":"20px"});
            $('#listingDiv').addClass("text-center");
            $('#listingDiv').html("No Results Found.");
            setTimeout(function() {
                $('#listingDiv').hide();
            }, 3000);
            
        }

    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function addStock(id){
        $.redirect('invProductAdjustment.php',{
            invProductID : id,
        })
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getOutOfStockListing",
            
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>
