<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
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
                                                        <label class="control-label">
                                                            <?php echo $translations['A01678'][$language]; /* Device Ref. */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="deviceMatch" type="radio" name="deviceType" class="deviceType" value="match"> 
                                                            <label for="deviceMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="deviceLike" type="radio" name="deviceType" class="deviceType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="deviceLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input id="devicerefSearch" type="text" class="form-control" dataName="deviceref" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01679'][$language]; /* Device Name */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="nameMatch" type="radio" name="nameType" class="nameType" value="match"> 
                                                            <label for="nameMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="nameLike" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="nameLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input id="devicenameSearch" type="text" class="form-control" dataName="devicename" dataType="text">
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
                        <div class="row m-0" style="display: flex">
                        <a href="newDevice.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-rem1 m-r-rem3">
                            <?php echo $translations['A01680'][$language]; /* New Shop Device */ ?>
                        </a>
                        <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                        <!-- <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a> -->
                    </div>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display:none">
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
    var url         = 'scripts/reqAdmin.php';
    var divId       = 'listingDiv';
    var tableId     = 'listingTable';
    var pagerId     = 'listingPager';
    var btnArray    = {};
    var thArray     = Array(
        '',
        '<?php echo $translations['A01681'][$language]; /* Device ID */ ?>',
        '<?php echo $translations['A01678'][$language]; /* Device Ref. */ ?>',
        '<?php echo $translations['A01679'][$language]; /* Device Name */ ?>',
        '<?php echo $translations['A01682'][$language]; /* Data */ ?>',
        '<?php echo $translations['A01683'][$language]; /* Located At */ ?>',
        '<?php echo $translations['A01642'][$language]; /* Disabled */ ?>',
        '<?php echo $translations['A01644'][$language]; /* Created At */ ?>'
    );


    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $("#searchForm")[0].reset();
        });

        pagingCallBack(pageNumber, loadSearch);

        $('#searchBtn').click(function() {
            var getDeviceType = $("input[name=deviceType]:checked").val();
            $('#devicenameSearch').attr('dataType', getDeviceType);
            var getNameType = $("input[name=nameType]:checked").val();
            $('#devicenameSearch').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    // function exportBtn() {
    //     var searchID = 'searchForm';
    //     var searchData = buildSearchDataByType(searchID);
    //     var thArray = Array(
    //         '<?php echo $translations['A01664'][$language]; /* Shop ID */ ?>',
    //         '<?php echo $translations['A01665'][$language]; /* Shop Name */ ?>',
    //         '<?php echo $translations['A01666'][$language]; /* Adress */ ?>',
    //         '<?php echo $translations['A01671'][$language]; /* Owned By */ ?>',
    //         '<?php echo $translations['A01672'][$language]; /* Deleted */ ?>',
    //         '<?php echo $translations['A01644'][$language]; /* Created At */ ?>'
    //     );
    //     var key = Array(
    //         'id',
    //         'name',
    //         'address',
    //         'ownername',
    //         'deleted',
    //         'created_at'
    //     );
    //     var formData = {
    //         command     : "getShopDeviceList",
    //         filename    : "ShopDeviceList",
    //         searchData  : searchData,
    //         header      : thArray,
    //         key         : key,
    //         DataKey     : "shopDeviceList",
    //         type        : "export"
    //     };
    //     fCallback = exportExcel;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

    function loadDefaultListing(data, message) {
        console.log(data.deviceList);
        $('#basicwizard').show();

        // if (data) {
        //     $('#exportBtn').show(); 
        // } else {
        //     $('#exportBtn').hide();
        // }

        var tableNo;
        var deviceList = data.deviceList;

        if (data != "" && deviceList.length > 0) {
            var newList = [];

            $.each(deviceList, function(k, v) {
                var editBtn = `
                    <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                `;

                var rebuildData = {
                    editBtn     : editBtn,
                    id          : v['id'],
                    deviceRef   : v['deviceRef'],
                    name        : v['name'],
                    data        : v['data'],
                    shopName    : v['shopName'],
                    disabled    : v['disabled'],
                    createdAt   : v['createdAt']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (deviceList) {
            $.each(deviceList, function(k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-id', v['id']);
            });
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function editRecord(id) {
        $.redirect("editDevice.php", {id : id});
    }

    function pagingCallBack(pageNumber, fCallback) {
        var searchId    = 'searchForm';
        var searchData  = buildSearchDataByType(searchId);

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getShopDeviceList",
            searchData  : searchData,
            pageNumber  : pageNumber
        };

        if (!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>