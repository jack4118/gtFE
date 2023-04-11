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
                                                        <label>Report Month</label>
                                                        <input id="searchDate" type="text" class="form-control" dataName="reportMonth" dataType="singleDate">
                                                    </div>


                                                    <div class="col-sm-4 form-group">
                                                        <label>Join Date</label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="joinDate" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="joinDate" dataType="dateRange">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control name" dataName="name" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Rank
                                                        </label>
                                                        <select class="form-control" dataName="rank" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>

                                                            <?php foreach($_SESSION["rankList"] as $key => $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                            <?php } ?>
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
                                                            <option value="Active">
                                                                Active
                                                            </option>
                                                            <option value="Suspended">
                                                                Suspended
                                                            </option> 
                                                            <option value="Terminated">
                                                                Terminated
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Sponsor ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="sponsorID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Sponsor Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="sponsorName" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Leader ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderID" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Main Leader ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Main Leader Username
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Placement Sponsor ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="placementSponsorID" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Placement Sponsor Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="placementSponsorName" dataType="text">
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
                        <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                        <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
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
        'Report Month',
        'Joining Date',
        'Member ID',
        'Name',
        'City',
        'Province',
        'Rank',
        'Main Leader ID',
        'Main Leader Username',
        'Sponsor ID',
        'Sponsor Name',
        'Level',
        'Placement Structure (L/R)',
        'Placement Sponsor ID',
        'Placement Sponsor Name',
        'PVP',
        'No of Couple',
        'No of New Recruit',
        'Active Until',
        'Remaining DVP Left',
        'Remaining DVP Right',
        'Status',
    );

    var thArray2 = Array(
        'Report Month',
        'Joining Date',
        'Member ID',
        'Name',
        'City',
        'Province',
        // 'Highest Rank',
        'Rank',
        'Main Leader ID',
        'Main Leader Username',
        'Sponsor ID', 
        'Sponsor Name', 
        'Level',
        'Placement Structure (L/R)',
        'Placement Sponsor ID',
        'Placement Sponsor Name',
        'PVP',
        'No of Couple',
        'No of New Recruit',
        'Active Until',
        'Remaining DVP Left',
        'Remaining DVP Right',
        'Status',
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    var clientID;
    var reportDate;

    $(document).ready(function() {
        $('#dateRangeStart').datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'auto',
            autoclose   : true
        });

        $('#dateRangeEnd').datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'auto',
            autoclose   : true
        });

        $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('#searchDate').val("");

        // $('#searchDate').on("change",function(){
        //     var temp = $(this).val().toString();
        //     temp = "01" + temp.slice(2)            
        //     $(this).val(temp)
        // });

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

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
            var getDataType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getDataType);
            pagingCallBack(pageNumber, loadSearch);
        });
    });
    function seeAll() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command    : "getMonthlyPerformanceRpt",
            searchData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=nameType]:checked").val(),
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
            usernameSearchType  : $("input[name=nameType]:checked").val()
        };

        var key  = Array (
            'monthYear',
            'joinDate',
            'memberID',
            'name',
            'city',
            'province',
            'rank',
            'mainLeaderID',
            'mainLeaderUsername',
            'sponsorMemberID',
            'sponsorName',
            'level',
            'placementStructure',
            'placementSponsorID',
            'placementSponsorName',
            'pvp',
            'couple',
            'newRecruit',
            'activeUntil',
            'dvpLeft',
            'dvpRight',
            'status',
        );

        var formData = {
            command     : "addExcelReq",
            titleKey    : "reportList",
            API         : "getMonthlyPerformanceRpt",
            headerAry   : thArray2,
            params      : exportParams,
            keyAry      : key,
            fileName    : 'MonthlyPerformanceReport',
            returnType  : 'excel'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn2() {

        var exportParams = {
            pageNumber  : pageNumber,
            clientID    : clientID,
            seeAll      : 1,
            usernameSearchType  : $("input[name=nameType]:checked").val()
        };


        var key  = Array (
            'monthYear',
            'joinDate',
            'memberID',
            'name',
            'city',
            'province',
            'rank',
            'mainLeaderID',
            'mainLeaderUsername',
            'sponsorMemberID',
            'sponsorName',
            'level',
            'placementStructure',
            'placementSponsorID',
            'placementSponsorName',
            'pvp',
            'couple',
            'newRecruit',
            'activeUntil',
            'dvpLeft',
            'dvpRight',
            'status',
        );

        var formData = {
            command     : "addExcelReq",
            titleKey    : "reportList",
            API         : "getMonthlyPerformanceDetail",
            params      : exportParams,
            headerAry   : thArray2,
            keyAry      : key,
            fileName    : 'MonthlyPerformanceDetailReport',
            returnType  : 'excel',
            clientID    : clientID,
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
        var reportList = data.reportList
        if(data != "" && reportList.length>0) {
            var newList = [];

            
            $.each(reportList, function(k, v) {
                var viewBtn = `<a data-toggle="tooltip" title="" onclick="viewDetails('${v.clientID}', '${v.reportDate}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>`;

                var rebuildData = {
                    monthYear : v['monthYear'],
                    joinDate : v['joinDate'],
                    memberID : v['memberID'],
                    name : v['name'],
                    city : v['city'],
                    province : v['province'],
                    rank : v['rank'],
                    mainLeaderID : v['mainLeaderID'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    sponsorMemberID : v['sponsorMemberID'],
                    sponsorName : v['sponsorName'],
                    level : v['level'],
                    placementStructure : v['placementStructure'],
                    placementSponsorID : v['placementSponsorID'],
                    placementSponsorName : v['placementSponsorName'],
                    pvp : addCormer(v['pvp']),
                    couple : v['couple'],
                    newRecruit : addCormer(v['newRecruit']),
                    activeUntil : v['activeUntil'],
                    dvpLeft : v['dvpLeft'],
                    dvpRight : v['dvpRight'],
                    status : v['status'],
                    viewBtn : viewBtn

                    // activeLeg : addCormer(v['activeLeg']),
                    // dvp : addCormer(v['dvp']),
                    // activeDownline : addCormer(v['activeDownline']),
                    // sponsorMemberID : v['sponsorMemberID'],
                    // sponsorName : v['sponsorName'],
                    // nearDirectorID : v['nearDirectorID'],
                    // nearDirector : v['nearDirector'],
                    // viewBtn : viewBtn
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

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMonthlyPerformanceRpt",
            searchData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=nameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function viewDetails(invoiceID, invoiceDate) {
        clientID = invoiceID;
        reportDate = invoiceDate;

        $.redirect("monthlyPerformanceDetail.php", { clientID:clientID, reportDate : reportDate});
        var formData = {
            command    : "getMonthlyPerformanceDetail",
            clientID   : clientID,
            reportDate : reportDate
        };
        fCallback = loadModalData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadModalData(data, message){
        $('#basicwizard2').show();

        if (data) {
            $('#exportBtn2').show(); 
        } else {
            $('#exportBtn2').hide();
        }

        var tableNo;
        var reportList = data.reportList
        
        if(data != "" && reportList.length>0) {
            var newList = [];

            
            $.each(reportList, function(k, v) {

                var rebuildData = {
                    monthYear : v['monthYear'],
                    joinDate : v['joinDate'],
                    memberID : v['memberID'],
                    name : v['name'],
                    city : v['city'],
                    province : v['province'],
                    rank : v['rank'],
                    mainLeaderID : v['mainLeaderID'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    sponsorMemberID : v['sponsorMemberID'],
                    sponsorName : v['sponsorName'],
                    level : v['level'],
                    placementStructure : v['placementStructure'],
                    placementSponsorID : v['placementSponsorID'],
                    placementSponsorName : v['placementSponsorName'],
                    pvp : addCormer(v['pvp']),
                    couple : v['couple'],
                    newRecruit : addCormer(v['newRecruit']),
                    activeUntil : v['activeUntil'],
                    dvpLeft : v['dvpLeft'],
                    dvpRight : v['dvpRight'],
                    status : v['status']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId2, divId2, thArray2, btnArray, message, tableNo);
        pagination(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

</script>
</body>
</html>
