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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Package
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" class="usernameType" value="match" > 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="package" dataType="text">
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
                                                            <input id="nameMatch" type="radio" name="nameType" class="nameType" value="match" checked> 
                                                            <label for="nameMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="nameLike" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" > 
                                                            <label for="nameLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control name" dataName="fullname" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
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
                                                        <input id="mainLeaderID" type="text" class="form-control"
                                                                dataName="mainLeaderID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Date
                                                        </label>

                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataName="dateRange" dataType="dateRange" autocomplete="off">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="input-sm form-control" name="end" dataName="dateRange" dataType="dateRange" autocomplete="off">
                                                        </div>
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
        'Main Leader ID',
        'Main Leader Name',
        'Package',
        'Quantity',
        'Unit Price',
        'Total Price',
        'PV',
        'City', 
        'Sponsor ID', 
        'Sponsor Name'
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
            var searchId = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
            var key = Array(
                'date',
                'memberID',
                'fullName',
                // 'username',
                'mainLeaderID',
                'mainLeaderName',
                'package',
                'quantity',
                'unitPrice',
                'totalPrice',
                'pv',
                'city',
                'sponsorID',
                'sponsorName'
            );

            var formData = {
                command: "getPVPListing",
                filename: "PVPListingReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "list",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function seeAll() {
        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPVPListing",
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
            command     : "getPVPListing",
            pageNumber  : pageNumber,
            searchData   : searchData,
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        data ? $("#seeAllBtn").show() : $("#seeAllBtn").hide();
        var tableNo;
        if(data){
            var newList = [];
            $.each(data.list, function(k, v) {
                var rebuildData = {
                    date : v['date'],
                    memberID : v['memberID'],
                    fullName : v['fullName'],
                    // username : v['username'],
                    mainLeaderID: v['mainLeaderID'],
                    mainLeaderName: v['mainLeaderName'],
                    package : v['package'],
                    quantity : numberThousand(v['quantity'],0),
                    unitPrice : numberThousand(v['unitPrice'],2),
                    totalPrice : numberThousand(v['totalPrice'],2),
                    pv : numberThousand(v['pv'],2),
                    city : v['city'],
                    sponsorID : v['sponsorID'],
                    sponsorName : v['sponsorName'],
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


</script>
</body>
</html>
