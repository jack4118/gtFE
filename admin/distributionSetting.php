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
                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSet" aria-expanded="false" aria-controls="collapseSet" class="collapse">
                                                Set Distribution
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSet" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                            <!-- "category_id":"1",
                                               "distDateTS":"1619598119",
                                               "amount":100,
                                               "type":"Total Dist" or "Dist Per T" -->

                                             <div class="col-sm-12 px-0 form-horizontal">
                                                <div class="col-sm-5 form-group" >
                                                    <label class="control-label col-sm-4" data-th="date">Distribution Date</label>
                                                    <div class="col-sm-8 input-daterange">
                                                        <input id="distDateTS" type="text" class="form-control" autocomplete="off">
                                                        <span id="dateError" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-5 form-group" >
                                                    <label class="control-label col-sm-4" data-th="date">Amount</label>
                                                    <div class="col-sm-8">
                                                        <input id="amount" type="text" class="form-control" autocomplete="off">
                                                        <span id="amountError" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-5 form-group" >
                                                    <label class="control-label col-sm-4" data-th="date">Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control type" id="type"></select>
                                                        <span id="typeError" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-5 form-group" >
                                                    <label class="control-label col-sm-4" data-th="date">Category</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control category" id="category"></select>
                                                        <span id="categoryError" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-5 form-group" >
                                                    <label class="control-label col-sm-4" data-th="date">Calculate Amount</label>
                                                    <div class="col-sm-8">
                                                        <input id="calAmount" type="text" class="form-control" autocomplete="off" disabled>
                                                        <span id="categoryError" class="text-danger"></span>
                                                        <button id="calculateAmt" class="btn btn-primary m-t-rem1">Calculate</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <button id="setBtn" class="btn btn-primary waves-effect waves-light">
                                                    Set
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-rem1">
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
                                            <form id="searchFundInHistory" role="form">
                                             <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="date">Created Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="createdAt" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00941'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="createdAt" dataType="dateRange">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 form-group" id="datepicker2" >
                                                    <label class="control-label" data-th="date">Actived Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart2" type="text" class="form-control" name="start" dataName="activeAt" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00941'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd2" type="text" class="form-control" name="end" dataName="activeAt" dataType="dateRange">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        Type
                                                    </label>
                                                    <select class="form-control type" dataName="type" dataType="select"></select>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        Category
                                                    </label>
                                                    <select class="form-control category" dataName="category" dataType="select"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 px-0">
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
                            <!-- <div class="card-box p-b-0"> -->
                                <button id="exportBtn" type="" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button>
                                 <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="fundInListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pageFundInList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                           <!--  </div> -->
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
    var divId    = 'fundInListDiv';
    var tableId  = 'fundInListTable';
    var pagerId  = 'pageFundInList';
    var btnArray = {};
    var thArray  = Array(
            "Distribution Date",
            "Type",
            "Category",
            "Period",
            "Amount",
            "Created By"
        );

    var subThArray  = Array(
        "Distribution Date",
        "Type",
        "Category",
        "Period",
        "Amount",
        "Created By"
    );

    var subTableKey = Array(
        {key: "active_date", type: "text"},
        {key: "type", type: "text"},
        {key: "category", type: "text"},
        {key: "period", type: "text"},
        {key: "amount", type: "number"},
        {key: "created_by", type: "text"}
    );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 

    $(document).ready(function() {
        setTodayDatePicker();
        // formData    = {command      : 'getFundInListing'
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#searchBtn').click(function() {
            $('#paginateText').empty();
            $('#fundInListDiv').empty();
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchFundInHistory').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchFundInHistory').find('select').val('');
            setTodayDatePicker();
        });

        var formData = {
            command      : "getDistributionDetails"
        };
        
        fCallback = loadDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    
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

        $('#setBtn').click(function() {

            var distDateTS = $("#distDateTS").val();
            var amount = $("#amount").val();
            var type = $("#type").val();
            var category = $("#category").val();

            distDateTS = distDateTS==""?"":dateToTimestamp(distDateTS);

            var formData   = {
                command : 'setDistribution',
                distDateTS : distDateTS,
                amount : amount,
                type : type,
                category_id : category,
            };
            fCallback = updateCallback;

            // console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#calculateAmt').click(function() {

            var distDateTS = $("#distDateTS").val();
            var amount = $("#amount").val();
            var type = $("#type").val();
            var category = $("#category").val();

            distDateTS = distDateTS==""?"":dateToTimestamp(distDateTS);

            var formData   = {
                command : 'getDistributionAmount',
                distDateTS : distDateTS,
                amount : amount,
                type : type,
                category_id : category,
            };
            fCallback = showAmount;

            // console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function deleteDistribution(id){

        showMessage("Confirm to delete distribution?", 'danger', "Delete Distribution", 'trash', '', ["Confirm"]);
        $('#canvasConfirmBtn').click(function () {
            var formData   = {
                command : 'removeDistributionSetting',
                id: id
            };
            fCallback = updateCallback;

            // console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        
    }

    // function exportBtn(){
         
    //       var searchID = 'searchFundInHistory';
    //       var searchData = buildSearchDataByType(searchID);
    //         var thArray = Array(
    //             "Member ID",
    //             "Username",
    //             "Full Name",
    //             "Main Leader Username",
    //             "Coin Type",
    //             "Wallet Address",
    //             "Amount",
    //             "Rate",
    //             "Received Amount",
    //             "Callback Amount",
    //             "Status",
    //             "Date",
    //             "Approved At"
    //             );
    //         var key  = Array (
    //             'memberID',
    //            'username',
    //            'fullname',
    //            'mainLeaderUsername',
    //            'credit_type',
    //            'walletAddress',
    //            'amount',
    //            'rate',
    //            'totalValue',
    //            'receivableAmount',
    //            'status',
    //            'created_at',
    //            'approved_at'
    //         );
    //         var formData  = {
    //             command    : "getFundInListing",
    //             filename   : "FundInReport",
    //             inputData  : searchData,
    //             header     : thArray,
    //             key        : key,
    //             DataKey    : "addressPageListing"
    //         };
    //          $.redirect('exportExcel2.php', formData); 
    // }

    
    function showAmount(data, message) {
        $("#calAmount").val(data.calculatedAmount);
    }

    
    function loadDetails(data, message) {
        var typeHtml = "<option value=''>Select Type</option>";
        var categoryHtml = "<option value=''>Select Category</option>";

        $.each(data.typeList, function(k,v){
            typeHtml+=`<option value="${v}">${v}</option>`;
        });

        $.each(data.categoryList, function(k,v){
            categoryHtml+=`<option value="${v['id']}">${v['categoryDisplay']}</option>`;
        });

        $(".type").html(typeHtml);
        $(".category").html(categoryHtml);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);

        $('#basicwizard').show();

        var tableNo;

        var list = data.bankAccList;

        if (list) {
            var newData = [];

            $.each(list, function (i, obj) {

                var rebuild = {
                    active_date: obj['active_date'],
                    type: obj['type'],
                    category: obj['category'],
                    period: obj['period'],
                    amount: obj['amount'],
                    created_by: obj['created_by'],
                    subTableData: obj['log']
                };

                newData.push(rebuild);
            });
        }

        buildTableWithSubTable(newData, tableId, divId, thArray, subThArray, subTableKey, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getDistributionListing",
            searchData    : searchData,
            pageNumber   : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    // Set the default date which is today.
    // Set the timepicker
    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = dd+'/'+mm+'/'+yyyy;
        
        $('#createdAt').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#activedAt').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        var dateToday = $('#searchDate').val('');

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
    function updateCallback(data, message) {
        showMessage(message, 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'distributionSetting.php');
    }
    
</script>
</body>
</html>