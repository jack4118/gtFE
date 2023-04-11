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
    var invProductID = "<?php echo $_POST['invProductID']; ?>";
    var exportUrl = 'scripts/reqAdmin.php';

    var divId    = 'announcementListDiv';
    var tableId  = 'announcementListTable';
    var pagerId  = 'pagerAnnouncementList';
    var pageNumber      = 1; 
    var btnArray = {};
    var thArray  = Array (
        "Date",
        "Action",
        "Amount In",
        "Amount Out",
        "Remark"
    );

    $(document).ready(function() {

        var formData  = {
            command: 'getProductTransactionHistory',
            invProductID : invProductID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $('#submitBtn').click(function() {
        //     $('.customError').text('');

        //     var quantity = $("#quantity").val();
        //     var remark = $("#remark").val();
        //     var type = $('input[name=adjustmentType]:checked').val();

        //     var formData  = {
        //         command         : 'adjustInvProduct',
        //         invProductID : invProductID,
        //         quantity : quantity,
        //         remark : remark,
        //         type : type
        //     };

        //     fCallback = successAdjustment;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // });
    });

    // function successAdjustment(data, message) {
    //     showMessage(message, 'success', 'Product Adjustment', 'edit', ['invProductAdjustment.php', {invProductID : invProductID}]);
    // }

    function exportBtn() {

        var key  = Array (
           'createdAt',
           "subject",
           'amountIn',
           'amountOut',
           'remark',
        );

        var formData  = {
            command     : "getProductTransactionHistory",
            invProductID: invProductID,
            filename    : 'productTransactionHistoryReport',
            DataKey     : "list",
            type        : "export",
            header      : thArray,
            key         : key,
        };

        fCallback = exportExcel;
        ajaxSend(exportUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "getProductTransactionHistory",
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
        var totalIn = 0;
        var totalOut = 0;

        if(list) {
            var newList = [];

            $.each(list, function(k, v) {

                var doBtn = v['subject'];
                /*if(v['refID']) {
                    doBtn = `<a href="javascript:void(0);" onclick="goToDO('${v['refID']}')">${v['subject']}</a>`;
                }*/

                totalIn += parseFloat(v['amountIn']);
                totalOut += parseFloat(v['amountOut']);

                var rebuildData = {
                    date : v['createdAt'],
                    type : doBtn,
                    amountIn : numberThousand(v['amountIn'],2),
                    amountOut : numberThousand(v['amountOut'],2),
                    remark : v['remark']
                    // remark : v['adminRemark']==""?v['remark']:(v['remark']==""?"Admin Remark: "+v['adminRemark']:v['remark']+"<br>Admin Remark: "+v['adminRemark'])
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId+" tbody tr:last").after(`
            <tr>
                <td colspan="2" class="text-right"><b>Grand Total</b></td>
                <td>${numberThousand(totalIn,0)}</td>
                <td>${numberThousand(totalOut,0)}</td>
                <td></td>
            </tr>
        `);

        $('#' + tableId).find('tbody tr, thead tr').each(function () {
            $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
        });

        $('#' + tableId).find('tbody tr:last').each(function () {
            $(this).find('td:eq(1)').css('text-align', "right");
            $(this).find('td:eq(2)').css('text-align', "right");
        });
    }

    function goToDO(id) {
        $.redirect("getDeliveryOrderDetails.php", {
            id: id,
            backID: "<?php echo $_POST['invProductID']; ?>",
            backUrl: window.location.href
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

