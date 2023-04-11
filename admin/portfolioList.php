<?php 
    session_start(); 
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

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00547'][$language]; /* Entry Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="entryDate" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="entryDate" dataType="dateRange"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked>
                                                            <label for="match"
                                                                   style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;">
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="username"
                                                               dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="fullName"
                                                               dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00926'][$language]; /* Maturity Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00927'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01242'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername"
                                                               dataType="text">
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
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select id="status" class="form-control" dataName="status"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="Active"><?php echo $translations['A00372'][$language]; /* Active */ ?></option>
                                                            <option value="Inactive"><?php echo $translations['A01236'][$language]; /* Ended */ ?></option>
                                                            <option value="Terminated"> <?php echo $translations['A01131'][$language]; /* terminated */ ?></option>
                                                            <option value="Pending Terminate">Pending Terminate</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Wallet Type
                                                        </label>
                                                        <select id="cryptoType" class="form-control" dataName="cryptoType"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="BTC"><?php echo $translations['C00001'][$language]; /* BTC */ ?></option>
                                                            <option value="USDT"><?php echo $translations['C00003'][$language]; /* USDT */ ?></option>
                                                            <option value="arbitReward"> <?php echo $translations['C00005'][$language]; /* Arbitrage Wallet */ ?></option>
                                                            <option value="cashReward"><?php echo $translations['C00011'][$language]; /* Cash Wallet */ ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Purchase Type 
                                                        </label>
                                                        <select class="form-control" dataName="category" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="Register">
                                                                Register
                                                            </option>
                                                            <option value="Top Up">
                                                                Top Up
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>

                                        <div class="col-xs-12" style="margin-top: 10px">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button type="submit" id="resetBtn"
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
                        <div id="basicwizard" class="pull-in" style="display:none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;"><?php echo $translations['A01352'][$language]; /* Export to xlsx */ ?></a>
                                <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;">
                                    <?php echo $translations['A01191'][$language]; /* See All */ ?>
                                </a>
                                <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="detectSeeAll" value="0">
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = Array(
        "<?php echo $translations['A00547'][$language]; /* Entry Date */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "Full Name",
        "Country",
        "Purchase Type",
        "Package Price",
        "<?php echo $translations['A00206'][$language]; /* Bonus Value */?>",
        "NBV",
        "NBVR", 
        'BTC',
        'USDT',
        'AR Wallet',
        'CR Wallet',
        "Wallet Type",
        "BTC Conversion Rate",
        "<?php echo $translations['A00318'][$language]; /* Status */?>",
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var offsetSecs = getOffsetSecs();

    $(document).ready(function () {

        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

    });

    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var searchID = 'searchForm';
        var key = Array(
            'createdAt',
            'username',
            'fullname',
            'country',
            'portfolioCategory',
            'productPrice',
            'amount',
            'nbv',
            'nbvr',
            'BTC',
            'USDT',
            'arbitReward',
            'cashReward',
            'wallet_type',
            'btc_rate',
            'statusDisplay',
        );

        var formData = {
            command: "getPortfolioList",
            filename: "PortfolioListReport",
            searchData: searchData,
            pageNumber      : 1,
            seeAll          : 1,
            header: thArray,
            key: key,
            DataKey: "portfolioPageListing",
            type: "export",
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command         : 'getPortfolioList',
            searchData      : searchData,
            pageNumber      : 1,
            seeAll          : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $("#exportBtn").show();
        } else {
            $("#exportBtn").hide();
        }

        if (data.totalPage > 1) {
            $("#seeAllBtn").show();
        } else {
            $("#seeAllBtn").hide();
        }

        var tableNo;
        var portfolioPageListing = data.portfolioPageListing;

        if (data != "" && portfolioPageListing.length > 0) {
            var newData = [];
            $.each(portfolioPageListing, function (i, obj) {
                var rebuild = {
                    createdAt: obj.createdAt,
                    username: obj.username,
                    fullname: obj.fullname,
                    country: obj.country,
                    portfolioCategory: obj.portfolioCategory,
                    productPrice: obj.productPrice ? addCormer(obj.productPrice) : '-',
                    amount: obj.amount ? addCormer(obj.amount) : '-',
                    nbv: obj.nbv ? addCormer(obj.nbv) : '-',
                    nbvr: obj.nbvr ? addCormer(obj.nbvr) : '-',
                    btc: obj.BTC ? addCormer(obj.BTC) : '0.00',
                    usdt: obj.USDT ? addCormer(obj.USDT) : '0.00',
                    arbitReward: obj.arbitReward ? addCormer(obj.arbitReward) : '0.00',
                    cashReward: obj.cashReward ? addCormer(obj.cashReward) : '0.00',
                    wallet_type: obj.wallet_type ? obj.wallet_type : '-',
                    btc_rate: obj.btc_rate ? obj.btc_rate : '-',
                    statusDisplay: obj.statusDisplay,
                };

                newData.push(rebuild);
            });

            var totalAmount = data.grandTotal;
            var nbvGrandTotal = data.nbvGrandTotal;
            var nbvrGrandTotal = data.nbvrGrandTotal;
            var BTCGrandTotal = data.BTCGrandTotal ? addCormer(data.BTCGrandTotal) : '0.00';
            var USDTGrandTotal = data.USDTGrandTotal ? addCormer(data.USDTGrandTotal) : '0.00';
            var arbitRewardGrandTotal = data.arbitRewardGrandTotal ? addCormer(data.arbitRewardGrandTotal) : '0.00';
            var cashRewardGrandTotal = data.cashRewardGrandTotal ? addCormer(data.cashRewardGrandTotal) : '0.00';
        }

        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody').append(`
            <tr class="">
                <td style="border: none!important;"></td>
                <td style="border: none!important;"></td>
                <td style="border: none!important;"></td>
                <td style="border: none!important;"></td>
                <td style="border: none!important;"></td>
                <td style="text-align:right;border-left: none;">
                    <b>
                        <?php echo $translations['A00651'][$language]; /* Grand Total */?>: 
                    </b>
                </td>
                <td id="grandTotal" style="border-right: none!important;"></td>
                <td id="nbvGrandTotal" style="border-right: none!important;"></td>
                <td id="nbvrGrandTotal" style="border-right: none!important;"></td>
                <td id="BTCGrandTotal" style="border-right: none!important;"></td>
                <td id="USDTGrandTotal" style="border-right: none!important;"></td>
                <td id="arbitRewardGrandTotal" style="border-right: none!important;"></td>
                <td id="cashRewardGrandTotal" style="border-right: none!important;"></td>
                <td style="border: block!important;"></td>
                <td style="border: block!important;"></td>
                <td style="border: block!important;"></td>
            </tr>`);

 

        $('#grandTotal').text(addCormer((parseFloat(totalAmount)).toFixed(2)));
        $('#nbvGrandTotal').text(addCormer((parseFloat(nbvGrandTotal)).toFixed(2)));
        $('#nbvrGrandTotal').text(addCormer((parseFloat(nbvrGrandTotal)).toFixed(2)));
        $('#BTCGrandTotal').text(BTCGrandTotal);
        $('#USDTGrandTotal').text(USDTGrandTotal);
        $('#arbitRewardGrandTotal').text(arbitRewardGrandTotal);
        $('#cashRewardGrandTotal').text(cashRewardGrandTotal);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css('text-align', "right");
        });
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();

        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getPortfolioList",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');

        return today;
    }
</script>
</body>
</html>
