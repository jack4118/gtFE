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
                                                            <?php echo $translations['A01665'][$language]; /* Shop Name */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="shopMatch" type="radio" name="shopType" class="shopType" value="match"> 
                                                            <label for="shopMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="shopLike" type="radio" name="shopType" class="shopType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="shopLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input id="shopnameSearch" type="text" class="form-control" dataName="shopname" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01671'][$language]; /* Owned by */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="ownerMatch" type="radio" name="ownerType" class="ownerType" value="match"> 
                                                            <label for="ownerMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="ownerLike" type="radio" name="ownerType" class="ownerType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="ownerLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input id="ownernameSearch" type="text" class="form-control" dataName="ownername" dataType="text">
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
                        <a href="newShop.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-rem1 m-r-rem3">
                            <?php echo $translations['A01654'][$language]; /* New Shop */ ?>
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
        '<?php echo $translations['A01664'][$language]; /* Shop ID */ ?>',
        '<?php echo $translations['A01665'][$language]; /* Shop Name */ ?>',
        '<?php echo $translations['A01666'][$language]; /* Adress */ ?>',
        '<?php echo $translations['A01671'][$language]; /* Owned By */ ?>',
        '<?php echo $translations['A01672'][$language]; /* Deleted */ ?>',
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
            var getShopType = $("input[name=shopType]:checked").val();
            $('#shopnameSearch').attr('dataType', getShopType);
            var getOwnerType = $("input[name=ownerType]:checked").val();
            $('#ownernameSearch').attr('dataType', getOwnerType);
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
    //         command     : "getShopList",
    //         filename    : "ShopList",
    //         searchData  : searchData,
    //         header      : thArray,
    //         key         : key,
    //         DataKey     : "shopList",
    //         type        : "export"
    //     };
    //     fCallback = exportExcel;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        // if (data) {
        //     $('#exportBtn').show(); 
        // } else {
        //     $('#exportBtn').hide();
        // }

        var tableNo;

        if (data && data != "") {
            var shopList = data.shopList;

            if(shopList && shopList.length > 0) {
                var newList = [];

                $.each(shopList, function(k, v) {
                    var editBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    var rebuildData = {
                        editBtn     : editBtn,
                        id          : v['id'],
                        name        : v['name'],
                        address     : v['address'],
                        ownername   : v['ownername'],
                        deleted     : v['deleted'],
                        createdAt   : v['createdAt']
                    };
                    newList.push(rebuildData);
                });
            }
        } else {
            data = '';
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (shopList) {
            $.each(shopList, function(k, v) {
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
        $.redirect("editShop.php", {id : id});
    }

    function pagingCallBack(pageNumber, fCallback) {
        var searchId    = 'searchForm';
        var searchData  = buildSearchDataByType(searchId);

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getShopList",
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