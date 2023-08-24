<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <?php include("topbar.php"); ?>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sidebar.php"); ?>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Price List Name
                                                    </label>
                                                    <input type="text" class="form-control" dataName="pricelistName" dataType="text">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Date Range
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="dateRange" dataType="dateRange">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="dateRange" dataType="dateRange">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-sm-12">
                                            <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </div>
                                            <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 productList-buttonGrp">
                            <div>
                                <div id="createPriceList" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Create Price List
                                </div>
                                <!-- <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                                    Export to xlsx
                                </button> -->
                                <button id="seeAllBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                                    See All
                                </button>
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive verticalTable"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End row -->
            </div><!-- container -->
        </div><!-- content -->
        <?php include("footer.php"); ?>
    </div>
    <!-- End content-page -->
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div><!-- END wrapper -->

<!-- jQuery  -->
<script>var resizefunc = [];</script>

<?php include("shareJs.php"); ?>

<script>

// Initialize the arguments for ajaxSend function
var url             = 'scripts/reqAdmin.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;

var divId    = 'listingDiv';
var tableId  = 'listingTable';
var pagerId  = 'pagerList';
var btnArray = ['edit'];
var thArray  = Array (
    "Price List Name",
    "Start Date",
    "End Date",
);

$(document).ready(function() {
    $("body").keyup(function(event) {
        if (event.keyCode == 13) {
            $("#searchBtn").click();
        }
    });
        
    $('#resetBtn').click(function() {
        $("#searchForm")[0].reset();
    });

    pagingCallBack(pageNumber, loadSearch);
    
    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });

    $('#seeAllBtn').click(function() {
        if(pageNumber > 1) bypassLoading = 1;

        var searchID = "searchForm";
        var searchData = buildSearchDataByType(searchID);
        var formData   = {
            command     : "viewPriceList",
            searchData  : searchData,
            pageNumber  : 1,
            seeAll      : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#exportBtn').click(function () {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        var key = Array(
            "pricelist_name",
            "start_date",
            "end_date",
        );

        var formData = {
            command: "viewPriceList",
            filename: "PriceListReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "pricelist ",
            type: 'export',
        };
        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#createPriceList').click(function() {
        $.redirect('addPricelist.php');
    })

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });
});

function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchID = "searchForm";
        var searchData = buildSearchDataByType(searchID);
        var formData   = {
            command     : "viewPriceList",
            searchData  : searchData,
            pageNumber  : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing(data, message) {
    if (data) {
        $("#exportBtn, #seeAllBtn").show();
    } else {
        $("#exportBtn, #seeAllBtn").hide();
    }

    $('#basicwizard').show();

    var tableNo;
    var pricelist = data.pricelist;

    if(pricelist) {
        var newList = [];
        $.each(pricelist, function(k, v) {
            var rebuildData = {
                pricelist_name      : v['pricelist_name'],
                start_date          : v['start_date'],
                end_date            : v['end_date'],
            };
            newList.push(rebuildData);
        });
    }

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    if(pricelist) {
        $.each(pricelist, function(k, v) {
            $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
        });      
    }
}

function loadSearch(data, message) {
    loadDefaultListing(data, message);
    $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
    setTimeout(function() {
        $('#searchMsg').removeClass('alert-success').html('').hide(); 
    }, 3000);
}

function tableBtnClick(btnId) {
    var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    var tableRow = $('#'+btnId).parent('td').parent('tr');
    var tableId  = $('#'+btnId).closest('table');

    if (btnName == 'edit') {
        var editId = tableRow.attr('data-th');
        $.redirect("editPricelist.php",{id: editId});
    }
}

</script>

</body>
</html>