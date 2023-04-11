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
                                                        <!-- <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Full Name
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input type="text" class="form-control name" dataName="name" dataType="text">
                                                        </div> -->
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Transaction Date
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </span>
                                                                <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Member ID
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Vacct No
                                                            </label>
                                                            <input type="text" class="form-control" dataName="vacct_no" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Ref No
                                                            </label>
                                                            <input type="text" class="form-control" dataName="reference_no" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Bank
                                                            </label>
                                                            <select class="form-control" dataName="bank_code" dataType="select">
                                                                <option value="">All</option>
                                                                <?php foreach($_SESSION["bankAry"] as $key => $value) { ?>
                                                                    <option value="<?php echo $value['code']; ?>">
                                                                        <?php echo $value['name']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                            </label>
                                                            <select class="form-control" dataName="status" dataType="select">
                                                                <option value="">All</option>
                                                                <?php foreach($_SESSION["statusAry"] as $key => $value) { ?>
                                                                    <option value="<?php echo $value['value']; ?>">
                                                                        <?php echo $value['display']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00296'][$language]; /* Address */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="address" dataType="text">
                                                        </div>
                                                    </div>
                                                </div> -->
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
                            <button id="seeAllBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                See All
                            </button>
                            <!-- <button id="exportBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                Export to xlsx
                            </button> -->
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
            'Transaction Date',
            'Member ID',
            'Vacct No',
            'Tx ID',
            'Ref No',
            'Bank',
            'Payment Method',
            'Currency',
            'Amount',
            'Vacct Valid TM',
            'Status'
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
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
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

        $('#seeAllBtn').click(function () {
            var searchId   = 'searchForm';
            var searchData = buildSearchDataByType(searchId);

            if(pageNumber > 1) bypassLoading = 1;
            
            var formData = {
                command     : "getPaymentGatewayRequestListing",
                searchData  : searchData,
                pageNumber  : pageNumber,
                seeAll      : 1
            };
            
            fCallback = loadDefaultListing;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#exportBtn').click(function () {
            var searchId = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
            var key = Array(
                'created_at',
                'member_id',
                'vacct_no',
                'tx_id',
                'reference_no',
                'bank_name',
                'type',
                'currency',
                'amount',
                'merchant_token',
                'statusDisplay'
            );

            var formData = {
                command: "getPaymentGatewayRequestListing",
                filename: "PaymentGatewayRequestListReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "result",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    
    function loadDefaultListing(data, message) {

        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        data ? $("#seeAllBtn").show() : $("#seeAllBtn").hide();
        $('#basicwizard').show()
        var tableNo;
        var list = data.result;
        if(list) {
            var newList = [];
            $.each(list, function(k, v) {
                
                var rebuildData = {
                    created_at          : v['created_at'],
                    member_id           : v['member_id'],
                    vacct_no            : v['vacct_no']||'-',
                    tx_id               : v['tx_id']||'-',
                    reference_no        : v['reference_no'],
                    bank_name           : v['bank_name']||'-',
                    payment_method      : v['type'],
                    currency            : v['currency']||'-',
                    amount              : v['amount'],
                    merchant_token      : v['merchant_token'],
                    statusDisplay       : v['statusDisplay'],
                };
                newList.push(rebuildData);
            });
        }    

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command     : "getPaymentGatewayRequestListing",
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