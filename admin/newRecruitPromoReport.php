<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);
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
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="date" dataType="dateRange">
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
                                                            <input id="nameMatch" type="radio" name="nameType" class="nameType" value="match" > 
                                                            <label for="nameMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="nameLike" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="nameLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control name" dataName="memberFullName" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            From <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="fromMemberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            From Member Full Name
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="fromFullNameMatch" type="radio" name="fromFullNameType" class="fromFullNameType" value="match" > 
                                                            <label for="fromFullNameMatch" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="fromFullNameLike" type="radio" name="fromFullNameType" class="fromFullNameType" value="like" style="margin-left: 15px;" checked> 
                                                            <label for="fromFullNameLike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control fromFullName" dataName="fromMemberFullName" dataType="text">
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
                        <!-- <a id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a> -->
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
                        <!-- <div id="updatedStatusWrap" style="display: none;">
                            <span>
                                <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                            </span>
                            <select id="status">
                                <option value="paid" selected>
                                    Paid
                                </option>
                            </select>
                            <button type="submit" id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00300'][$language]; /* Update */ ?>
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>

<div class="modal fade in" id="reportDetail" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content-wrapper">
            <div class="modal-content" style="overflow-y:scroll;max-height: 85vh">
                <div class="modal-header clearfix text-left">
                    <h5>
                        <?php echo $translations['M03521'][$language]; /* Total Direct Downline */ ?>
                    </h5>
                    <button id="closeModalBtn" type="button" class="close" data-dismiss="modal" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="basicwizard2" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg2" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv2" class="table-responsive"></div>
                                <span id="paginateText2"></span>
                                <div class="text-center2">
                                    <ul class="pagination pagination-md" id="listingPager2"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>
    var url       = 'scripts/reqBonus.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var divId2    = 'listingDiv2';
    var tableId2  = 'listingTable2';
    var pagerId2  = 'listingPager2';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>',
        'Member ID',
        'Member Full Name',
        'From Member ID',
        'From Member Full Name', 
        'Package Name',
        'Bonus Payout',
        );

    var thArray2  = Array(
        'From Member ID',
        'Full Name',
        'PVP',
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
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            var getDataType = $("input[name=fromFullNameType]:checked").val();
            $('.fromFullName').attr('dataType', getDataType);
            pagingCallBack(pageNumber, loadSearch);
        });

        // $(document).on('click',function(event){
        //     if(!$(event.target).closest('.modal-dialog').length && !$(event.target).is('.modal-dialog')) {
        //         $("#reportDetail").hide();
        //     } 
        // });

        // $('#updateBtn').click(function(){
        //     showMessage('Are you sure want to updated status', 'warning', '<?php echo $translations['A00250'][$language]; //Confirmation ?>', 'warning', '',{Confirm:"<?php echo $translations['A00123'][$language]; //Confirm ?>"});
        //     $('#canvasConfirmBtn').click(function(){
        //         var checkId = $('.checkId:checked').val();

        //         var formData = {
        //             command    : "updatePayoutStatus",
        //             bonusPayoutID : checkId
        //         };
        //         fCallback = statusSuccessUpdated;
        //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        //     });
        // });
    });


    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var exportParams = {
            inputData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var key  = Array (
            'date',
            'memberID',
            'fullName',
            'cityName',
            'totalPVP',
            'bonusPayout',
            'totalNumberOfDirectDownline',
        );

        var formData = {
            command     : "addExcelReq",
            API         : "getNewRecuitAndActiveProgram",
            fileName    : "NewRecuitAndActiveProgram",
            inputData   : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "exportArray",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
       
        var tableNo;
        if(data){
            if(data.data){
                var newList = [];
                $.each(data.data, function(k, v) {
                    var action = `
                        <a data-toggle="tooltip" title="" onclick="viewDetails('${v['id']}')" data-original-title="view" aria-describedby="" style="margin:0px 4px 0px 4px">
                            ${v['totalNumberOfDirectDownline']}
                        </a>`;
                        

                    var rebuildData = {
                        bonus_date                 : v['bonus_date'],
                        member_id                  : v['member_id'],
                        member_full_name           : v['member_full_name'],
                        from_member_id             : v['from_member_id'],
                        from_member_full_na        : v['from_member_full_name'],
                        package_name               : v['package_name'],
                        bonus_rebate               : numberThousand(v['bonus_rebate'],2),
                    };

                    newList.push(rebuildData);
                });
            }
        }
            
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord); 
        // $('#'+tableId).find('tbody tr').each(function(){
        //     $(this).find('td:eq(-1)').css('width', "100px");
        // });
    }

    function closeModal(){
        $("#reportDetail").hide();
    }

    function viewDetails(id){
        $("#reportDetail").show();
        $('#reportDetail').css({"background":"rgba(0,0,0,0.5)"});
        var formData = {
            command     : "getRecruitPromoDetails",
            id          : id
        };
        fCallback = loadData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadData(data, message) {
        $("#reportDetail").show();
        $(document).on('click',function(event){
            if(!$(event.target).closest('.modal-dialog').length && !$(event.target).is('.modal-dialog')) {
                $("#reportDetail").hide();
            } 
        });
        $('#basicwizard2').show();

        var tableNo;
        var bonusList = data.allRecord;

        if(bonusList) {
            var newList = [];
            $.each(bonusList, function(k, v) {
                var action = `
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="edit" aria-describedby="" style="margin:0px 4px 0px 4px">
                        <i class="fa fa-edit"></i>
                    </a>`;
                    

                var rebuildData = {
                    fromMemberID                        : v['fromMemberID'],
                    fullname                            : v['fullname'],
                    PVP                                 : numberThousand(v['PVP'],2)
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId2, divId2, thArray2, btnArray, message, tableNo);
        pagination(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    }

    function statusSuccessUpdated(data,message){
        showMessage(message, 'success', '<?php echo $translations['A01073'][$language]; //Success ?>', '', 'bonusPayout.php')
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
            command    : "getNewRecuitAndActiveProgram",
            searchData  : searchData,
            pageNumber : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>
