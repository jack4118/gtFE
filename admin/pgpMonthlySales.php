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
                                                <div class="row"><!-- 
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['M02990'][$language]; /* Product */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="package" dataType="text">
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Date
                                                        </label>

                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataName="date" dataType="dateRange" autocomplete="off">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="input-sm form-control" name="end" dataName="date" dataType="dateRange" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
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
                                                        <input type="text" class="form-control name" dataName="fullname" dataType="text">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Member Rank
                                                        </label>
                                                        <select class="form-control" dataName="memberRank" dataType="select">
                                                            <option value="">All</option>
                                                            <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            From Member ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="fromMemberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            From Member Rank
                                                        </label>
                                                        <select class="form-control" dataName="fromMemberRank" dataType="select">
                                                            <option value="">All</option>
                                                            <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                        <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">See All</a>
                        <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                            Export to xlsx
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in">
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        'Date',
        'Member ID',
        'Full Name',
        'Member Rank',
        'From Member ID',
        'From Member Rank',
        'Total PGP',
    );
    var searchId = 'searchForm';

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input[type=text]').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

            $("#seeAll").prop("checked", false);
            document.getElementById("like").checked = true;
        });

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

        $('#searchBtn').click(function() {
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#exportBtn').click(function () {
            var searchData = buildSearchDataByType(searchId);
            var key = Array(
                'date',
                'memberID',
                'fullname',
                'rank',
                'fromMemberID',
                'memberRank',
                'totalPGP',
            );

            var formData = {
                command: "getPGPMonthlySalesSummary",
                filename: "PGPListingReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "displayRecord",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function seeAll() {
        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPGPMonthlySalesSummary",
            pageNumber  : pageNumber,
            searchData  : searchData,
            seeAll      : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPGPMonthlySalesSummary",
            pageNumber  : pageNumber,
            searchData   : searchData,
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;

        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        data ? $("#seeAllBtn").show() : $("#seeAllBtn").hide();

        if(data){
            var newList = [];
            $.each(data.displayRecord, function(k, v) {
                var rebuildData = {
                    date : v['date'],
                    memberID : v['memberID'],
                    fullName : v['fullname'],
                    rank : v['rank'],
                    fromMemberID : v['fromMemberID'],
                    memberRank : v['memberRank'],
                    totalPGP : numberThousand(v['totalPGP'], 2)
                };

                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(-1)').css('text-transform', "right");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(-1)').css('text-transform', "right");
        });
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
