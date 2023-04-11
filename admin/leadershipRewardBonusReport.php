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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">
                                                        Bonus Date
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="bonusDate" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="bonusDate" dataType="dateRange" autocomplete="off">
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
                                                        Member Name
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match" type="radio" name="nameType" class="nameType" value="match" checked> 
                                                        <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;"> 
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                    <input type="text" class="form-control name" dataName="name" dataType="text">
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Rank
                                                    </label>
                                                    <select class="form-control" dataName="rankID" dataType="select">
                                                        <option value="">All</option>
                                                        <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div> -->
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Leader ID
                                                    </label>
                                                    <input type="text" class="form-control" dataName="leaderID" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                    Main Leader ID
                                                    </label>
                                                    <input id="mainLeaderID" class="form-control"
                                                            dataName="mainLeaderID" dataType="text">
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
                                                    class="btn btn-default waves-effect waves-light">
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
                        <a id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
                        <!-- <div class="card-box p-b-0"> -->
                       <!--  <button id="exportBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            Export to xlsx
                        </button>
                        <button id="seeAllBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            See All
                        </button> -->
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="bonusListDiv" class="table-responsive"></div>
                                    <span id="grandTotal"></span>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

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
    var divId = 'bonusListDiv';
    var tableId = 'bonusListTable';
    var pagerId = 'pagerBonusList';
    var btnArray = {};
    var thArray = Array(
        'Bonus Date',
        'Member ID',
        'Member Name',
        // 'Rank',
        'Accumulated Couple',
        'Bonus Amount (IDR)'
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqBonus.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function () {

        //reset to default search
        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function () {
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#exportBtn').click(function () {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var key = Array(
            'bonusDate',
            'memberID',
            'name',
            // 'rank',
            'accCouple',
            'bonusAmount'
        );

        var formData = {
            command: "getLeadershipCashRewardReport",
            filename: "LeadershipCashRewardReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "data",
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#seeAllBtn').click(function () {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getLeadershipCashRewardReport',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1,
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getLeadershipCashRewardReport",
            pageNumber: pageNumber,
            searchData: searchData,
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
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

        if (data.data) {
            var newList = [];
            $.each(data.data, function (k, v) {
                var rebuildData = {
                    bonusDate       : v['bonusDate'],
                    memberID        : v['memberID'],
                    name            : v['name'],
                    // rank            : v['rank'],
                    accCouple       : numberThousand(v['accCouple'],2),
                    bonusAmount     : numberThousand(v['bonusAmount'],2)
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tr').each(function () {
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5)').css('text-align', "right");
        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


</script>
</body>
</html>
