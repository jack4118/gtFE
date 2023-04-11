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
                                            <form id="searchFundInHistory" role="form">
                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group" id="datepicker" >
                                                        <label class="control-label" data-th="date">Created Date</label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="createdAt" dataType="dateRange" autocomplete="off">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="createdAt" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations["A00148"][$language];/* Member ID */?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations["A00117"][$language];/* Full Name */?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                         <input type="text" class="form-control name" dataName="fullName" dataType="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 px-0">
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                             <?php echo $translations['A00102'][$language]; /* Username */?>
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
                                                            Updated Date
                                                        </label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="updatedAt" dataType="dateRange" autocomplete="off">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="updatedAt" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations["A00318"][$language];/* Status */?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value=""><?php echo $translations["A00055"][$language]; /* All */?></option>
                                                            <option value="Waiting Approval"><?php echo $translations["B00254"][$language]?></option>
                                                            <option value="Approved"><?php echo $translations["B00256"][$language]/*approved*/?></option>
                                                            <option value="Rejected"><?php echo $translations["B00259"][$language]/*rejected*/?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Verification Type
                                                        </label>
                                                        <select class="form-control" dataName="docType" dataType="select">
                                                            <option value=""><?php echo $translations["A00055"][$language]; /* All */?></option>
                                                            <option value="Email Verification">Email Verification</option>
                                                            <option value="ID Verification">ID Verification</option>
                                                            <option value="Bank Account Cover">Bank Account Cover</option>
                                                            <option value="NPWP Verification">NPWP Verification</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 px-0">
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Verification Type
                                                        </label>
                                                        <select class="form-control" dataName="docType" dataType="select">
                                                            <option value=""><?php echo $translations["A00055"][$language]; /* All */?></option>
                                                            <option value="Email Verification">Email Verification</option>
                                                            <option value="ID Verification">ID Verification</option>
                                                            <option value="Bank Account Cover">Bank Account Cover</option>
                                                            <option value="NPWP Verification">NPWP Verification</option>
                                                        </select>
                                                    </div> -->
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
                    '<?php echo $translations['A00137'][$language]; /* Date */ ?>',
                    '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                    '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                    'Email Verification',
                    'ID Verification',
                    'Bank Account',
                    'NPWP Verification',
                    '<?php echo $translations['A01448'][$language]; /* Updated By */ ?>',
                    'Updated Date',
                    ''
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 

    $(document).ready(function() {
        setTodayDatePicker();

        $('#searchBtn').click(function() {
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
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

        $('#updateBtn').click(function() {
            var checkedIDs = [];
            $('.checkKyc:checked').each(function() {
                var checkboxID = $(this).val();
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateKYC',
                    kycIDAry : checkedIDs,
                    status : $('#statusSelect').val(),
                    remark : $('#remark').val()
                };
                fCallback = updateCallback;

                console.log(formData);
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    //   function seeAllBtn() {
    //     var searchID = 'searchFundInHistory';
    //     var searchData = buildSearchDataByType(searchID);
    //     formData  = {
    //         command : 'getFundInListing',
    //         inputData   : searchData,
    //         pageNumber   : 1,
    //         seeAll   : 1
    //     };

    //     // console.log(formData);
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

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

    
    function loadDefaultListing(data, message) {
        console.log(data);

        $('#basicwizard').show();
        // $('#seeAllBtn, #exportBtn').show();
        
        var addressPageListing = data.kycList;
        if (addressPageListing){
            var newData = [];
            $.each(addressPageListing, function(k, v){
                var checkbox = '';
                var action = `
                    <a data-toggle="tooltip" title="" onclick="viewKYCDetails('${v['clientID']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby="" style="margin:0px 4px 0px 4px">
                        <i class="fa fa-eye"></i>
                    </a>`;
                var emailStatus = '';
                if(v['emailVerified'] == 'Approved'){
                    emailStatus = `<i class="fa fa-check green"></i>`;
                }else if(v['emailVerified'] == 'Waiting Approval'){
                    emailStatus = `<span class="red" title="Waiting Approval">*</span>`;
                }else if(v['emailVerified'] == 'Rejected'){
                    emailStatus = '<i class="fa fa-times red"></i>';
                }else{
                    emailStatus = '';
                }

                var idStatus = '';
                if(v['ID Verification'] == 'Approved'){
                    idStatus = `<i class="fa fa-check green"></i>`;
                }else if(v['ID Verification'] == 'Waiting Approval'){
                    idStatus = `<span class="red" title="Waiting Approval">*</span>`;
                }else if(v['ID Verification'] == 'Rejected'){
                    idStatus = '<i class="fa fa-times red"></i>';
                }else{
                    idStatus = '';
                }

                var bankStatus = '';
                if(v['Bank Account Cover'] == 'Approved'){
                    bankStatus = `<i class="fa fa-check green"></i>`;
                }else if(v['Bank Account Cover'] == 'Waiting Approval'){
                    bankStatus = `<span class="red" title="Waiting Approval">*</span>`;
                }else if(v['Bank Account Cover'] == 'Rejected'){
                    bankStatus = '<i class="fa fa-times red"></i>';
                }else{
                    bankStatus = '';
                }

                var npwpStatus = '';
                if(v['NPWP Verification'] == 'Approved'){
                    npwpStatus = `<i class="fa fa-check green"></i>`;
                }else if(v['NPWP Verification'] == 'Waiting Approval'){
                    npwpStatus = `<span class="red" title="Waiting Approval">*</span>`;
                }else if(v['NPWP Verification'] == 'Rejected'){
                    npwpStatus = '<i class="fa fa-times red"></i>';
                } else{
                    npwpStatus = '';
                }              

                var rebuild = {
                    unread : v['unreadCount'],
                    createdAt: v['createdAt'],
                    memberID: v['memberID'],
                    name: v['name'] || '-',
                    emailVerified : emailStatus,
                    idStatus: idStatus,
                    bankStatus: bankStatus,
                    npwpStatus: npwpStatus,
                    updaterID: v['updaterID'] || '-',
                    updatedAt: v['updatedAt'],
                    action: action
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(0)').addClass('hide');
            var unreadMessageAlert = $(this).find('td:eq(0)').text();
            console.log(unreadMessageAlert);

            if(unreadMessageAlert != 0){
                $(this).find('td:eq(1)').append('<div align="center" style="position:relative;"><span class="badge kycListUnread">'+unreadMessageAlert+'</span></div>');
            }

            $(this).find('td:eq(1)').css('text-align', 'center');
            $(this).find('td:last-child').css('text-align', 'center');
        });

        // $("#"+tableId+" tr th:first-child").hide();
        // $("#"+tableId+" tr td:first-child").hide();
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getKYCListing",
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

    function viewKYCDetails(clientID) {
        $.redirect('kycDetails.php', {
            clientID: clientID
        });
    }

    // Set the activity type dropdown in the search part
    function setSearchOption(data, searchVal) {
        $('#searchFundInHistory #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchFundInHistory #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchFundInHistory #activityType').val(searchVal);
        }
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'kycListing.php');
    }
    
</script>
</body>
</html>