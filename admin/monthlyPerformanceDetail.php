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
   
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    var clientID = "<?php echo $_POST['clientID']; ?>";
    var reportDate = "<?php echo $_POST['reportDate']; ?>";

    $(document).ready(function() {
        $('#backBtn').click(function() {
            $.redirect('monthlyPerformanceRpt.php');
        });

        pagingCallBack();
    });

    function exportBtn() {

        var exportParams = {
            pageNumber  : pageNumber,
            clientID    : clientID,
            reportDate  : reportDate,
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
            'placementStructureLR',
            'placementSponsorID',
            'placementSponsorName',
            'pvp',
            'couple',
            'newRecruit',
            'activeUntil',
            'remainingLeftDVP',
            'remainingRightDVP',
            'status',
        );

        var formData = {
            command     : "addExcelReq",
            titleKey    : "reportList",
            API         : "getMonthlyPerformanceDetail",
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            fileName    : 'MonthlyPerformanceDetailReport',
            returnType  : 'excel',
            clientID    : clientID,
            reportDate  : reportDate,
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $('#exportBtn').show(); 
        } else {
            $('#exportBtn').hide();
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
                    placementStructureLR : v['placementStructureLR'],
                    placementSponsorID : v['placementSponsorID'],
                    placementSponsorName : v['placementSponsorName'],
                    pvp : addCormer(v['pvp']),
                    couple : v['couple'],
                    newRecruit : addCormer(v['newRecruit']),
                    activeUntil : v['activeUntil'],
                    remainingLeftDVP : v['remainingLeftDVP'],
                    remainingRightDVP : v['remainingRightDVP'],
                    status : v['status'],
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
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMonthlyPerformanceDetail",
            clientID  : clientID,
            reportDate  : reportDate,
            pageNumber: pageNumber
        };
        // if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


</script>
</body>
</html>
