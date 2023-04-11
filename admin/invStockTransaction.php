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
                    <div class="col-sm-4">
                        <div onclick="redirectBack()" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Stock Balance</label>
                                            <input id="stockBal" type="text" class="form-control" disabled>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Adjustment Type</label>
                                            <div id="adjustmentType" class="m-b-20">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="adjustmentTypeIn" name="adjustmentType" value="in" data-parsley-multiple="adjustmentType">
                                                    <label for="adjustmentTypeIn">In</label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="adjustmentTypeOut" name="adjustmentType" value="out" data-parsley-multiple="adjustmentType">
                                                    <label for="adjustmentTypeOut">Out</label>
                                                </div>
                                            </div>
                                            <span id="typeError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Quantity</label>
                                            <input id="quantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span id="quantityError" class="customError text-danger"></span>
                                        </div>

                                        <!-- <div class="col-xs-12 input-daterange" style="margin-top: 20px">
                                            <label>Stock In Date (Optional)</label>
                                            <input id="stockInDate" type="text" class="form-control">
                                            <span id="stockInDateError" class="customError text-danger"></span>
                                        </div> -->

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Remark (Optional)</label>
                                            <input id="remark" type="text" class="form-control">
                                            <span id="remarkError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */?>
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
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1">
                                        <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                    </button>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="announcementListDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerAnnouncementList"></ul>
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
var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var invStockID = "<?php echo $_POST['invStockID']; ?>";
    var balance = "<?php echo $_POST['balance']; ?>";
    var invProductID = "<?php echo $_POST['invProductID']; ?>";

    var divId    = 'announcementListDiv';
    var tableId  = 'announcementListTable';
    var pagerId  = 'pagerAnnouncementList';
    var pageNumber      = 1; 
    var btnArray = {};
    var thArray    = Array (
        "Date",
        // "SKU Code",
        // "Client",
        "Transaction Subject",
        "Amount In",
        "Amount Out",
        // "Created By",
        // "Creator Type",
        "Remark",
        "Done By"
    );

    $(document).ready(function() {

        $('#stockBal').val(balance);

        var formData  = {
            command: 'getStockTransactionHistory',
            invStockID : invStockID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // Initialize date picker
        // $('.input-daterange input').each(function() {
        //     $(this).daterangepicker({
        //         singleDatePicker: true,
        //         timePicker: false,
        //         locale: {
        //             format: 'DD/MM/YYYY'
        //         }
        //     });
        //     $(this).val('');
        // });

        $('#submitBtn').click(function() {
            $('.customError').text('');
            var type = $('input[name=adjustmentType]:checked').val();
            var quantity = $("#quantity").val();
            // var stockInDate = $("#stockInDate").val()=="" ? $("#stockInDate").val() : dateToTimestamp($("#stockInDate").val());
            var remark = $("#remark").val();

            var formData  = {
                command         : 'adjustInvStock',
                stockID         : invStockID,
                type            : type,
                quantity        : quantity,
                // stockInDate     : stockInDate,
                remark          : remark
            };

            fCallback = successAdjustment;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    // function successAdjustment(data, message) {
    //     showMessage(message, 'success', 'Product Adjustment', 'edit', ['invProductAdjustment.php', {invProductID : invProductID}]);
    // }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "getStockTransactionHistory",
            invStockID  : invStockID,
            pageNumber  : pageNumber,
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn() {

        var key  = Array (
           'createdAt',
           'subject',
           'amountIn',
           "amountOut",
           'remark',
           "createdBy",
        );

        var formData  = {
            command     : "getStockTransactionHistory",
            invStockID  : invStockID,
            filename    : 'stockTransactionHistoryReport',
            DataKey     : "list",
            type        : "export",
            header      : thArray,
            key         : key,
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var list = data.list;
        var totalIn = 0;
        var totalOut = 0;

        if(list) {
            var newList = [];

            $.each(list, function(k, v) {

                totalIn += parseFloat(v['amountIn']);
                totalOut += parseFloat(v['amountOut']);

                var rebuildData = {
                    createdAt : v['createdAt'],
                    // skuCode : v['skuCode'],
                    // client : v['client'],
                    subject : v['subject'],
                    amountIn : numberThousand(v['amountIn'], 0),
                    amountOut : numberThousand(v['amountOut'], 0),
                    remark : v['remark'],
                    createdBy : v['createdBy'],
                    // createrType : v['createrType'],
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId+" tbody tr:last").after(`
            <tr>
                <td colspan="2" class="text-right"><b>Grand Total</b></td>
                <td class="text-right">${numberThousand(totalIn,0)}</td>
                <td class="text-right">${numberThousand(totalOut,0)}</td>
                <td colspan="2"></td>
            </tr>
        `);

        $('#' + tableId).find('tbody tr, thead tr').each(function () {
            $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function successAdjustment(data, message) {
        showMessage(message, 'success', 'Stock Adjustment', 'edit', ['invStockDetail.php', {invProductID : invProductID}]);
    }

    function redirectBack() {
        $.redirect('invStockDetail.php', {
            invProductID: invProductID
        });
    }


</script>
</body>
</html>

