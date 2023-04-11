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
                                                        <div class="col-sm-4 form-group" id="datepicker" >
                                                            <label class="control-label" data-th="date"><?php echo $translations['A00137'][$language]; /* Date */?></label>
                                                            <div class="input-daterange input-group" id="datepicker-range">
                                                                <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="searchDate" dataType="dateRange" autocomplete="off">
                                                                <div class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </div>
                                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="searchDate" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Member ID
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group" id="datepicker" >
                                                            <label class="control-label" data-th="date">Approved Date</label>
                                                            <div class="input-daterange input-group" id="datepicker-rangeApproved">
                                                                <input id="dateRangeStartApproved" type="text" class="form-control" name="start" dataName="approvedDate" dataType="dateRange" autocomplete="off">
                                                                <div class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </div>
                                                                <input id="dateRangeEndApproved" type="text" class="form-control" name="end" dataName="approvedDate" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */?>
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="Success"><?php echo $translations['A01073'][$language]; /* Success */?></option>
                                                                <option value="Pending"> <?php echo $translations['A01135'][$language]; /* Pending */ ?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */?>
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="Success"><?php echo $translations['A01073'][$language]; /* Success */?></option>
                                                                <option value="Pending"> <?php echo $translations['A01135'][$language]; /* Pending */ ?></option>
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
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                            </button>
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
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

    // Initialize all the id in this page
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
            '<?php echo $translations['A00137'][$language]; /* Date */?>',
            'Member ID',
            '<?php echo $translations['A00102'][$language]; /* username */ ?>',
            'Credit Type',
            '<?php echo $translations['M00909'][$language]; /* Wallet Address */ ?>',
            'Fund In Amount',
            'Callback Amount',
            'Receivable Amount',
            'Status',
            'Approved At',
            'Transaction Hash'
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
        
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
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

        //   $('#searchFundInHistory').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // });

        // $('#seeAllBtn').click(function() {

        //     var searchID = 'searchForm';
        //     var searchData = buildSearchDataByType(searchID);
        //     formData  = {
        //         command : 'packageCashbackList',
        //         inputData   : searchData,
        //         pageNumber   : 1,
        //         seeAll   : 1
        //     };
        //     // console.log(searchData);
        //     fCallback = loadDefaultListing;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // }); 
    });

      function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getFundInListing',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn(){
         
          var searchID = 'searchForm';
          var searchData = buildSearchDataByType(searchID);
         
            var key  = Array (
               'created_at',
               'memberID',
               'username',
               'creditDisplay',
               'walletAddress',
               'top_up_amount',
               'call_back_amount',
               'coin_rate',
               'converted_amount',
               'receivable_amount',
               'status',
               'call_back_on',
               'transaction_hash'
            );

            var formData  = {
                command    : "getFundInListing",
                filename   : "FundInReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "addressPageListing"
            };
             $.redirect('exportExcel2.php', formData); 
    }

    
    function loadDefaultListing(data, message) {
        console.log(data);

        $('#basicwizard').show();
        $('#seeAllBtn, #exportBtn').show();
        
        var fundInList = data.fundInList;
        if (fundInList){
            var newData = [];
            $.each(fundInList, function(i, obj){
                var rebuild = {
                    date : obj.created_at,
                    member_id : obj.member_id, 
                    username: obj.username, 
                    payCreditDisplay: obj.payCreditDisplay, 
                    walletAddress: obj.wallet_address, 
                    top_up_amount : addCormer(obj.top_up_amount),
                    call_back_amount : addCormer(obj.call_back_amount),
                    receivable_amount : addCormer(obj.receivable_amount),
                    status: obj.status,
                    call_back_at : obj.call_back_at,
                    transaction_hash :  obj.transaction_hash
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // if(data.availableCredit) {
        //     var selectOption = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

        //     $.each(data.availableCredit, function(i,obj){
        //         selectOption += `<option value="${i}">${obj}</option>`;
        //     });

        //     $("#creditTypeSelect").html(selectOption);
        // }

        $('#'+tableId).find('tbody tr').each(function(){
            // $(this).find("td:eq(3)").css("text-align", "right");
            $(this).find("td:eq(4)").css("text-align", "right");
            $(this).find("td:eq(5)").css("text-align", "right");
            $(this).find("td:eq(6)").css("text-align", "right");
            $(this).find("td:eq(7)").css("text-align", "right");
            // $(this).find('td:last-child').css('text-align', 'right');

            // var detectCreditType = $(this).find("td:eq(2)").text();
            // console.log(detectCreditType);
            // var walletAddress = $(this).find("td:eq(3)").text();
            // if(detectCreditType == "bitcoin" || detectCreditType == "ethereum"){
            //     $(this).find("td:eq(11)").html('<a data-toggle="tooltip" title="" href="https://www.blockchain.com/btc/address/'+walletAddress+'" target="_blank" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Accept"><i class="fa fa-eye"></i></a>');
            // }else {
            //      $(this).find("td:eq(11)").html('-');
            // }
        });

        if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchForm #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }

        // $('#'+tableId+' tr:last').after(data.total);

       //  $('#'+tableId).tableExport({
       //      headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
       //      footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
       //      formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
       //      filename: 'Fund_In_History', // (id, String), filename for the downloaded file, (default: 'id')
       //      bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
       //      exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
       //      position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
       //      ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
       //      ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
       //      trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
       //  });

       // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
       // $('button.xlsx').text('Export to xlsx');
       // $('table#'+tableId).find("caption").append('<button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');
    }

    // function tableBtnClick(btnId) {

    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');

    //     if (btnName == 'withdrawal'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         var formData = {
    //             command     : "validateAddCapitalWithdrawal",
    //             portfolioID : id
    //         };
    //         fCallback = redirectWithdrawal;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }

    //     else if (btnName == 'view'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         // alert('XD');
    //         var formData = {
    //             command : "getLoanDetails",
    //             referenceID  : id ,
    //         };
            
    //         // console.log(formData);
            
    //         fCallback = showLoanDetails;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }
    // }
    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getFundInListing",
            searchData    : searchData,
            pageNumber   : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
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
        
        $('#searchDate').daterangepicker({
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

    // Set the activity type dropdown in the search part
    function setSearchOption(data, searchVal) {
        $('#searchForm #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchForm #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchForm #activityType').val(searchVal);
        }
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