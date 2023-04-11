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
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
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
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="countryID" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>

                                                            <?php
                                                            foreach ($countryList as $value => $countryRow) {
                                                                echo "<option value='".$countryRow['id']."'>".$countryRow['display']."</option>";
                                                            }
                                                            ?>
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
                                                        <input type="text" class="form-control" dataName="sponsor" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Main Leader ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Rank
                                                        </label>
                                                        <select class="form-control" dataName="rank" dataType="select">
                                                            <option value="">All</option>
                                                            <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?>   
                                                        </label>
                                                        <select class="form-control" dataName="disabled" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
                                                        </select>
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>   
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="active">
                                                                Active
                                                            </option>
                                                            <!-- <option value="inactive" disabled hidden>
                                                                Inactive
                                                            </option> -->
                                                            <!-- <option value="disabled">
                                                                Disable
                                                            </option> -->
                                                            <option value="suspended">
                                                                Suspended
                                                            </option>
                                                            <!-- <option value="freezed">
                                                                Freezed
                                                            </option> -->
                                                            <option value="terminated">
                                                                Terminated
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00156'][$language]; /* Suspended */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="suspended" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
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
    var url       = 'scripts/reqClient.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('view');
    var thArray  = Array(
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        // '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        'Sponsor ID',
        'Sponsor Name',
        'Main Leader ID',
        '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        '<?php echo $translations['A00194'][$language]; /* City */ ?>',
        '<?php echo $translations['A00984'][$language]; /* Rank */?>',
        'PVP',
        'PGP',
        'Active Leg',
        'DVP',
        'Nearest Upline Director',
        // '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
        // '<?php echo $translations['A00156'][$language]; /* Suspended */ ?>',
        // '<?php echo $translations['A00164'][$language]; /* Freezed */ ?>',
        '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
        '<?php echo $translations['A01350'][$language]; /* Last Login IP Address */ ?>',
        '<?php echo $translations['M01026'][$language]; /* Join Date */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>'
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
            command    : "getMemberList",
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
            'memberID',
            // 'username',
            'name',
            'sponsorMemberID',
            'sponsorName',
            'mainLeaderUsername',
            'country',
            'city',
            'rank',
            'pvp',
            'pgp',
            'activeLeg',
            'dvp',
            'nearDirector',
            // 'disabled',
            // 'suspended',
            // 'freezed',
            'lastLogin',
            'lastLoginIp',
            'createdAt',
            'status'
        );

        var formData = {
            command: "getMemberList",
            filename: "MemberListReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "memberList",
            type: 'export',
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
        var memberList = data.memberList;
        if(data != "" && memberList.length>0) {
            var newList = [];

            $.each(memberList, function(k, v) {

                if (v['name'] == ""){
                    v['name'] = "-";
                }

                if (v['mainLeaderUsername'] == "") {
                    v['mainLeaderUsername'] = "-";
                }

                if (v['lastLoginIp'] == "") {
                    v['lastLoginIp'] = "-";
                }


                var rebuildData = {
                    memberID : v['memberID'],
                    // username : v['username'],
                    name : v['name'],
                    sponsorMemberID : v['sponsorMemberID'],
                    sponsorName : v['sponsorName'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    country : v['country'],
                    city : v['city'],
                    rank : v['rank'],
                    pvp : addCormer(v['pvp']),
                    pgp : addCormer(v['pgp']),
                    activeLeg : addCormer(v['activeLeg']),
                    dvp : addCormer(v['dvp']),
                    nearDirector : v['nearDirector'],
                    // disabled: v['disabled'],                    
                    // suspended : v['suspended'],
                    // freezed : v['freezed'],
                    lastLogin : v['lastLogin'],
                    lastLoginIp : v['lastLoginIp'],
                    createdAt : v['createdAt'],
                    status : v['status']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(memberList) {
            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
            });      
        }

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align','center');
        });
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'view') {
            var viewId = tableRow.attr('data-id');
            $.redirect("memberView.php", {id : viewId});
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMemberList",
            searchData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=nameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>
