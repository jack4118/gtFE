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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                Paid
                                                            </option>
                                                            <option value="0">
                                                                Unpaid
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations["A00148"][$language];/* Member ID */?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Email
                                                        </label>
                                                        <input type="text" class="form-control" dataName="email" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Rank
                                                        </label>
                                                        <select class="form-control" dataName="rank" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">Member</option>
                                                            <option value="2">Fiz Entreprenuer</option>
                                                            <option value="3">Fiz Executive</option>
                                                            <option value="4">Fiz Director</option>
                                                            <option value="5">Fiz Unicorn</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Bank Account No.
                                                        </label>
                                                        <input type="text" class="form-control" dataName="bankAccNo" dataType="text">
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
    var url       = 'scripts/reqAdmin.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        
        'check',
        '<?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
        'Member ID',
        'Email',
        'Name',
        'City',
        'Bank Name',
        'Bank Account No',
        'Rank',
        'Total Personal Group Bonus CV',
        'Total Personal Group Bonus (IDR)',
        'Team Bonus CV',
        'Team Bonus (IDR)',
        'Leadership Bonus CV',
        'Leadership Bonus (IDR)',
        'Cash Award Bonus (IDR)',
        'Recruit & Active Programme (IDR)',
        'Total Bonus Amount (IDR)',
        'NPWP Status',
        'Bonus Tax Percentage',
        'Total Net Bonus Amount (IDR)'
        );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var id = '<?php echo $_POST['id']?>';

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

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function(){
            showMessage('Are you sure want to updated status', 'warning', '<?php echo $translations['A00250'][$language]; //Confirmation ?>', 'warning', '',{Confirm:"<?php echo $translations['A00123'][$language]; //Confirm ?>"});
            $('#canvasConfirmBtn').click(function(){

                var bonusID = [];
                $('#' + tableId).find('[type=checkbox]:checked').each(function () {
                    var checkboxID = $(this).attr('getClientID');
                    $.each(checkboxID.split(','),function(k,v){
                        bonusID.push(v);
                    });
                });

                if (bonusID.length === 0)
                    showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
                
                else if(bonusID.length >= 500){
                    showMessage('Cannot select records more than 500.', 'warning', 'Update Status', 'edit', '');
                }else{
                    var formData = {
                        command         : "updatePayoutDetailsStatus",
                        bonusPayoutID   : id,
                        bonusID         : bonusID
                    };
                    fCallback = statusSuccessUpdated;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });
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

        var thArray  = Array(
            '<?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>',
            '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
            'Member ID',
            'Email',
            'Name',
            'City',
            'Bank Name',
            'Bank Account No',
            'Rank',
            'Total Personal Group Bonus CV',
            'Total Personal Group Bonus (IDR)',
            'Team Bonus CV',
            'Team Bonus (IDR)',
            'Leadership Bonus CV',
            'Leadership Bonus (IDR)',
            'Cash Award Bonus (IDR)',
            'Recruit & Active Programme (IDR)',
            'Total Bonus Amount (IDR)',
            'NPWP Status',
            'Bonus Tax Percentage',
            'Total Net Bonus Amount (IDR)'
        );

        var key  = Array (
            'bonusDate',
            'status',
            'memberID',
            'email',
            'name',
            'cityName',
            'bankName',
            'bankAccNo',
            'rank',
            'goldmineCV',
            'goldmineBonusRP',
            'teamBonusCV',
            'teamBonusRP',
            'leadershipBonusCV',
            'leadershipBonusRP',
            'cashAwardBonusRP',
            'recruitPromo',
            'totalBonusAmountRP',
            'npwpStatus',
            'taxPercentage',
            'totalNetBonusRP'
        );

        var formData = {
            // command     : "addExcelReq",
            // API         : "getBonusPayoutDetailListing",
            // fileName    : "bonusPayoutDetail",
            // inputData   : searchData,
            // params      : exportParams,
            // headerAry   : thArray,
            // keyAry      : key,
            // titleKey    : "exportArray",
            // type        : 'export',
            // returnType  : 'excel',
            // usernameSearchType : $("input[name=usernameType]:checked").val()

            command: "getBonusPayoutDetailListing",
            filename: "bonusPayoutDetail",
            bonusPayoutSummaryID : id,
            searchData: searchData,
            pageNumber      : 1,
            seeAll          : 1,
            header: thArray,
            key: key,
            DataKey: "bonusPayoutDetail",
            type: "export",
            usernameSearchType : $("input[name=usernameType]:checked").val()
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
        var bonusList = data.bonusPayoutDetail;

        if(bonusList) {
            var newList = [];
            $.each(bonusList, function(k, v) {
                var checkbox = "";
                if(v['status'] == 'Unpaid'){
                    checkbox = `<input class='bonusIDCheckbox' type='checkbox' getClientID='${v['bonusIDAry']}' value='${v['bonusIDAry']}' />`;
                }else{
                    checkbox = '-';
                }
                var rebuildData = {  
                    checkbox            : checkbox,
                    bonusDate           : v['bonusDate'],
                    status              : v['status'],
                    memberID            : v['memberID'],
                    email               : v['email'],
                    name                : v['name'],
                    cityName            : v['cityName'],
                    bankName            : v['bankName'],
                    bankAccNo           : v['bankAccNo'],
                    rank                : v['rank'],
                    goldmineCV          : numberThousand(v['goldmineCV'],2),                    
                    goldmineBonusRP     : numberThousand(v['goldmineBonusRP'],2),
                    teamBonusCV         : numberThousand(v['teamBonusCV'],2),
                    teamBonusRP         : numberThousand(v['teamBonusRP'],2),
                    leadershipBonusCV   : numberThousand(v['leadershipBonusCV'],2),                    
                    leadershipBonusRP   : numberThousand(v['leadershipBonusRP'],2),
                    cashAwardBonusRP    : numberThousand(v['cashAwardBonusRP'],2),              
                    recruitPromo        : numberThousand(v['recruitPromo'],2),
                    totalBonusAmountRP  : numberThousand(v['totalBonusAmountRP'],2),   
                    npwpStatus          : v['npwpStatus'],
                    taxPercentage       : numberThousand(v['taxPercentage'],2),
                    totalNetBonusRP     : numberThousand(v['totalNetBonusRP'],2),
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
            command    : "getBonusPayoutDetailListing",
            bonusPayoutSummaryID : id,
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
