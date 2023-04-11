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
                        <div onclick="window.location='getProductInventory.php'" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
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
    var invProductID = "<?php echo $_POST['invProductID']; ?>";

    var divId    = 'announcementListDiv';
    var tableId  = 'announcementListTable';
    var pagerId  = 'pagerAnnouncementList';
    var pageNumber      = 1; 
    var btnArray = {};
    var thArray  = Array (
        "Date",
        "Supplier Code - Name",
        "Supplier DO",
        // "SKU Code",
        "Quantity",
        "Cost Price",
        "Total Cost Price",
        "Remark",
        "Edit/View"
        // "View Stock Transaction History",
        // "Adjust Stock"
    );

    $(document).ready(function() {

        var formData  = {
            command: 'getStockDetails',
            invProductID : invProductID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $('#submitBtn').click(function() {
        //     $('.customError').text('');

        //     var type = $('input[name=adjustmentType]:checked').val();
        //     var quantity = $("#quantity").val();
        //     var stockInDate = $("#stockInDate").val()=="" ? $("#stockInDate").val() : dateToTimestamp($("#stockInDate").val());
        //     var remark = $("#remark").val();

        //     var formData  = {
        //         command         : 'adjustInvStock',
        //         stockID         : selectedID,
        //         type            : type,
        //         quantity        : quantity,
        //         stockInDate     : stockInDate,
        //         remark          : remark
        //     };

        //     fCallback = successAdjustment;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // });
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "getStockDetails",
            invProductID : invProductID,
            pageNumber  : pageNumber,
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var list = data.list;
        var cost = 0;
        var qty = 0;
        var totalCost = 0;

        if(list) {
            var newList = [];

            $.each(list, function(k, v) {

                // var viewBtn = `
                //     <a data-toggle="tooltip" title="" onclick="viewHistory('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View Stock Transaction History" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                // `;
                // var adjustBtn = `
                //     <a data-toggle="tooltip" title="" onclick="adjustStock('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Adjust Stock" aria-describedby="tooltip645115"><i class="fa fa-wrench"></i></a>
                // `;

                var btn = `
                    <a data-toggle="tooltip" title="" onclick="stockDetail('${v['id']}', '${Number(v['quantity'])}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit/View" aria-describedby="tooltip645115"><i class="fa fa-wrench"></i></a>
                `;

                qty += parseFloat(v['quantity']);
                cost += parseFloat(v['cost']);
                totalCost += parseFloat(v['totalCost']);

                var rebuildData = {
                    stockInDate : v['stockInDate'],
                    supplier : v['supplierCode'] + ' - ' + v['supplierName'],
                    doNumber : v['doNumber'],
                    // skuCode : v['skuCode'],
                    quantity : numberThousand(v['quantity'], 0),
                    cost : numberThousand(v['cost'], 2),
                    totalCost : numberThousand(v['totalCost'], 2),
                    remark : v['remark'],
                    btn : btn
                    // viewBtn : viewBtn,
                    // adjustBtn : adjustBtn
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId+" tbody tr:last").after(`
            <tr>
                <td colspan="3" class="text-right"><b>Grand Total</b></td>
                <td class="text-right">${numberThousand(qty, 0)}</td>
                <td class="text-right">${numberThousand(cost, 2)}</td>
                <td class="text-right">${numberThousand(totalCost, 2)}</td>
                <td colspan="2"></td>
            </tr>
        `);

        $('#' + tableId).find('tbody tr, thead tr').each(function () {
            $(this).find('td:last-child, th:last-child').css('text-align', "center");
            // $(this).find('td:eq(-2), th:eq(-2)').css('text-align', "center");
            $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
        });
    }

    function loadTransaction(data, message) {
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

        buildTable(newList, tableId2, divId2, thArray2, btnArray2, message, tableNo);
        pagination2(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId2+" tbody tr:last").after(`
            <tr>
                <td colspan="2" class="text-right"><b>Grand Total</b></td>
                <td class="text-right">${numberThousand(totalIn,0)}</td>
                <td class="text-right">${numberThousand(totalOut,0)}</td>
                <td colspan="2"></td>
            </tr>
        `);

        $('#' + tableId2).find('tbody tr, thead tr').each(function () {
            $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
        });
    }

    /*function viewHistory(invStockID) {
        $.redirect('invStockTransaction.php', {
            invStockID : invStockID,
            invProductID: invProductID
        });
    }*/

    /*function adjustStock(stockID) {
        $.redirect('invStockAdjustment.php', {
            stockID : stockID,
            invProductID: invProductID
        });
    }*/

    function stockDetail(invStockID, balance) {
        $.redirect('invStockTransaction.php', {
            invStockID : invStockID,
            balance    : balance,
            invProductID: invProductID
        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }




</script>
</body>
</html>

