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
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
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
                                                                <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                                            </label>
                                                            <select class="form-control" dataName="creditType" dataType="select">
                                                                <option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>
                                                                <?php foreach($_SESSION["creditList"] as $value){ ?>
                                                                    <option value="<?php echo $value['name']; ?>"><?php echo $translations[$value['admin_translation_code']][$language]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <!-- <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="username" dataType="text">
                                                        </div> -->

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
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
                    </div>
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                            <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="purchaseCreditListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagePurchaseCreditList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'purchaseCreditListDiv';
    var tableId  = 'purchaseCreditListTable';
    var pagerId  = 'pagePurchaseCreditList';
    var btnArray = {};
    var thArray  = Array(
            'Date',
            'Member ID',
            'Member Full Name',
            // 'Username',
            'Main Leader ID',
            'Credit Type',
            'Purchase Amount',
            'Done By',
            'Remarks'
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
        });

    
        $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            $(this).val('');
        });
    });

    function seeAll() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command    : "getPurchaseCreditListing",
            searchData  : searchData,
            pageNumber : pageNumber,
            seeAll : 1
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
        };

        var key  = Array (
            'createdAt',
            'memberID',
            'name',
            'mainLeader',
            'creditTypeDisplay',
            'amount',
            'doneBy',
            'remark',
        );

        var formData = {
            command: "getPurchaseCreditListing",
            filename: "PurchaseCreditListReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "purchaseListing",
            type: 'export',
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $('#exportBtn, #seeAllBtn').show(); 
        } else {
            $('#exportBtn, #seeAllBtn').hide();
        }

        var tableNo;
        if(data.purchaseListing) {
            var newList = [];
            $.each(data.purchaseListing, function(k, v) {
                var rebuildData = {
                    createdAt           : v['createdAt'],
                    memberID            : v['memberID'],
                    name                : v['name'],
                    // username            : v['username'],
                    mainLeader          : v['mainLeader'],
                    creditTypeDisplay   : v['creditTypeDisplay'],
                    amount              : numberThousand(v['amount'],2),
                    doneBy              : v['doneBy'],
                    remark              : v['remark']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId+" tbody tr:last").after(`
            <tr>
                <td colspan="5" class="text-right"><b>Grand Total</b></td>
                <td style="text-align: right;">${numberThousand(data.grandTotal, 2)}</td>
                <td colspan="2"></td>
            </tr>
        `);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(5)").css("text-align", "right");
        });

        $('#basicwizard').show();
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command     : "getPurchaseCreditListing",
            searchData  : searchData,
            pageNumber  : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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