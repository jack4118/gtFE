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
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="nameMatch" type="radio" name="nameType" class="nameType" value="match" > 
                                                            <label for="nameMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="nameLike" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="nameLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control name" dataName="name" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Phone
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="like" type="radio" name="phoneType" class="phoneType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="phone" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="emailType" class="emailType" value="match" checked> 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="emailType" class="emailType" value="like" style="margin-left: 15px;" > 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control email" dataName="email" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <!-- <div class="col-sm-4 form-group">
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
                                                    </div> -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Sponsor ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="sponsor" dataType="text">
                                                    </div> -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Main Leader ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                    </div> -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Rank
                                                        </label>
                                                        <select class="form-control" dataName="rank" dataType="select">
                                                            <option value="">All</option>
                                                            <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                            <?php } ?>
                                                        </select> -->
                                                        <!-- <label class="control-label">
                                                            <?php echo $translations['A00984'][$language]; /* Rank */ ?>   
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="">
                                                                Fiz member
                                                            </option>
                                                            <option value="">
                                                                Fiz executive
                                                            </option>
                                                            <option value="">
                                                                Fiz manager
                                                            </option>
                                                            <option value="">
                                                                Fiz director
                                                            </option>
                                                        </select> -->
                                                    <!-- </div> -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>   
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="active">
                                                                    Active
                                                                </option> -->
                                                                <!-- <option value="inactive" disabled hidden>
                                                                    Inactive
                                                                </option> -->
                                                                <!-- <option value="disabled">
                                                                    Disable
                                                                </option> -->
                                                                <!-- <option value="suspended">
                                                                    Suspended
                                                                </option> -->
                                                                <!-- <option value="freezed">
                                                                    Freezed
                                                                </option> -->
                                                                <!-- <option value="terminated">
                                                                    Terminated
                                                                </option>
                                                        </select>
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Client Type
                                                        </label>
                                                        <select class="form-control" dataName="clientType" dataType="clientType">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="Client">
                                                                    Client
                                                                </option>
                                                                <option value="Guest">
                                                                    Guest
                                                                </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Last Purchase Date
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="like" type="radio" name="date" class="date" value="like" style="margin-left: 15px;"checked > 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="date" class="form-control" dataName="date" dataType="text">
                                                    </div>
                                                    
                                                </div>
                                            </div>
<!-- 
                                            <div class="col-xs-12">
                                                <div class="row">
                                                 
                                                </div>
                                            </div> -->
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
                        <button id="addMemberBtn" class="btn btn-primary waves-effect waves-light m-b-rem1">
                            Add Member
                        </button>
                        <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                        <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
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
    var url       = 'scripts/reqClient.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '',
        // '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        'Mobile Number',
        'Email Address',
        'Loyalty Point',
        'Account Type (Guest | Customer)',
        // '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
        'Last Purchase Date',
        // 'Sponsor ID',
        // '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        // 'Rank',
        // '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>',
        // '<?php echo $translations['A01350'][$language]; /* Last Login IP Address */ ?>',
        // '<?php echo $translations['A00112'][$language]; /* Created At */ ?>'
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

        $('#searchBtn').click(function() {
            
            var getDataType = $("input[name=emailType]:checked").val();
            $('.email').attr('dataType', getDataType);
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
            var getPhoneType = $("input[name=phoneType]:checked").val();
            $('.phone').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
            var getClientType = $("select[dataName='clientType']").val();
            $('.clientType').attr('dataType', getClientType);
            pagingCallBack(pageNumber, loadSearch);
            var getLastPurchaseDate = $("input[name=date]:checked").val();
            $('.date').attr('dataType', getClientType);
            pagingCallBack(pageNumber, loadSearch);

        });

        $('#addMemberBtn').click(function() {
            $.redirect("addMember.php");
        });
    });

    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var thArray = Array(
            '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
            '<?php echo $translations['A00103'][$language]; /* Email */ ?>',
            '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
            '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
            'Sponsor ID',
            '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
            'Rank',
            '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>',
            '<?php echo $translations['A01350'][$language]; /* Last Login IP Address */ ?>',
            '<?php echo $translations['A00112'][$language]; /* Created At */ ?>'
        );
       
        var key = Array(
            'memberID',
            'email',
            'name',
            'status',
            'sponsorUsername',
            'country',
            'rank',
            'lastLogin',
            'lastLoginIp',
            'createdAt'
        );
        var formData = {
            command: "getMemberList",
            filename: "MemberList",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "memberList",
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        if (data) {
            $('#exportBtn').show(); 
        } else {
            $('#exportBtn').hide();
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

                var editBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['clientID']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                var rebuildData = {
                    editBtn : editBtn,
                    // memberID : v['memberID'],
                    name : v['name'],
                    phone : v['phone'],
                    email : v['email'],
                    point : v['balance_to_point'],
                    type : v['type'],
                    // status : v['status'],
                    LastPurchaseDate : v['LastPurchaseDate'],




                    // status : v['status'],
                    // sponsorUsername : v['sponsorUsername'],
                    // country : v['country'],
                    // rank : v['rank'],
                    // lastLogin : v['lastLogin'],
                    // lastLoginIp : v['lastLoginIp'],
                    // createdAt : v['createdAt']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('tr').each(function(){
            $(':eq(14)',this).remove().insertBefore($(':eq(0)',this));
        });

        if(memberList) {
            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
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
        $.redirect("editMember.php", {id : id});
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command   : "getMemberList",
            searchData : searchData,
            pageNumber : pageNumber
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>