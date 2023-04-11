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
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="country" dataType="select">
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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="paid">
                                                                Paid
                                                            </option>
                                                            <option value="unpaid">
                                                                Unpaid
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
                        <a id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
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
                        <div id="updatedStatusWrap" style="display: none;">
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
                        </div>
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
    var url       = 'scripts/reqBonus.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '',
        'Bonus Date',
        'Status',
        'Paid At',
        'Total Member',
        'Total Personal Group Bonus CV',
        'Total Personal Group Bonus (IDR)',
        'Total Team Bonus CV',
        'Total Team Bonus(IDR)',
        'Total Leadership CV',
        'Total Leadership Bonus(IDR)',
        'Total Cash Award Bonus(IDR)',
        'Recruit & Active Programme (IDR)',
        'Total Bonus Amount(IDR)',
        ''
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
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#exportBtn').click(function() {
            exportBtn();
        });

        $('#updateBtn').click(function(){
            showMessage('Are you sure want to updated status', 'warning', '<?php echo $translations['A00250'][$language]; //Confirmation ?>', 'warning', '',{Confirm:"<?php echo $translations['A00123'][$language]; //Confirm ?>"});
            $('#canvasConfirmBtn').click(function(){
                var checkId = $('.checkId:checked').val();

                var formData = {
                    command    : "updatePayoutStatus",
                    bonusPayoutID : checkId
                };
                fCallback = statusSuccessUpdated;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });
    });


    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var key  = Array (
            'bonusDate',
            'status',
            'paidAt',
            'totalMember',
            'totalGoldMineCV',
            'totalGoldMineBonus',
            'totalTeamCV',
            'totalTeamBonus',
            'totalLeadershipCV',
            'totalLeadershipBonus',
            'totalCashAwardBonus',
            'recruitPromo',
            'totalBonusAmount'
        );

        var thArray  = Array(
            'Bonus Date',
            'Status',
            'Paid At',
            'Total Member',
            'Total Personal Group Bonus CV',
            'Total Personal Group Bonus (IDR)',
            'Total Team Bonus CV',
            'Total Team Bonus(IDR)',
            'Total Leadership CV',
            'Total Leadership Bonus(IDR)',
            'Total Cash Award Bonus(IDR)',
            'Recruit & Active Programme (IDR)',
            'Total Bonus Amount(IDR)',
        );

        var formData = {
            command     : "getBonusPayoutListing",
            filename    : "bonusPayoutReport",
            searchData  : searchData,
            header      : thArray,
            key         : key,
            DataKey     : "bonusPayoutList",
            type        : 'export',
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        $('#updatedStatusWrap').show();

        if (data) {
            $('#exportBtn').show(); 
        } else {
            $('#exportBtn').hide();
        }
        var tableNo;
        var bonusList = data.bonusPayoutList;

        if(bonusList) {
            var newList = [];
            $.each(bonusList, function(k, v) {
                var action = `
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="edit" aria-describedby="" style="margin:0px 4px 0px 4px">
                        <i class="fa fa-edit"></i>
                    </a>`;
                    var checkbox = "";
                    if(v['status'] == 'Unpaid'){
                        checkbox = `<input class='checkId' type='checkbox' value='${v['id']}' />`;
                    }else{
                        checkbox = '-';
                    }

                var rebuildData = {
                    checkbox                : checkbox,
                    bonusDate               : v['bonusDate'],
                    status                  : v['status'],
                    paidAt                  : v['paidAt'],
                    totalMember             : v['totalMember'],
                    totalGoldMineCV         : numberThousand(v['totalGoldMineCV'],2),
                    totalGoldMineBonus      : numberThousand(v['totalGoldMineBonus'],2),
                    totalTeamCV             : numberThousand(v['totalTeamCV'],2),
                    totalTeamBonus          : numberThousand(v['totalTeamBonus'],2),
                    totalLeadershipCV       : numberThousand(v['totalLeadershipCV'],2),                    
                    totalLeadershipBonus    : numberThousand(v['totalLeadershipBonus'],2),
                    totalCashAwardBonus     : numberThousand(v['totalCashAwardBonus'],2),                
                    recruitPromo            : numberThousand(v['recruitPromo'],2),
                    totalBonusAmount        : numberThousand(v['totalBonusAmount'],2),
                    action                  : action
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // if(bonusList) {
        //     $.each(bonusList, function(k, v) {
        //         $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
        //     });      
        // }

        // $('#'+ tableId).find('tbody tr').each(function(){
        //     $(this).find('td:last-child').css('text-align','center');
        // });
    }

    function viewDetails(id){
        $.redirect("bonusPayoutDetail.php", {
                id: id
            });
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
            command    : "getBonusPayoutListing",
            searchData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>
