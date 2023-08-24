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
                                                    <!-- ID Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01777'][$language]; /* Reference Number */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="refNo" dataType="text">
                                                    </div>
                                                    <!-- Buying Date Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01694'][$language]; /* Buying Date */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="buyingDate" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="buyingDate" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <!-- Vendor Name Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01703'][$language]; /* Vendor Name */ ?>
                                                        </label>
                                                        <input id="vendorName" type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <!-- Status Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01705'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="done">
                                                                Done
                                                            </option>
                                                            <option value="pending">
                                                                Pending For Stock In
                                                            </option>
                                                            <option value="draft">
                                                                Draft
                                                            </option>
                                                            <option value="confirmed">
                                                                Confirmed
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- Approved By Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01659'][$language]; /* Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="approvedBy" dataType="text">
                                                    </div>
                                                    <!-- Approved Date Search -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01660'][$language]; /* Approved Date */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01739'][$language]; /* Warehouse */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="warehouseSearch" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <!-- Warehouse Search
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01739'][$language]; /* Warehouse */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="warehouseSearch" dataType="text">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
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
                        <form>
                            <div id="basicwizard" class="pull-in">
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
var divId = 'listingDiv';
var tableId = 'listingTable';
var pagerId = 'listingPager';
// var btnArray = Array('edit', 'approve');
var btnArray = {};
var thArray = Array(
    'ID',
    'PO No',
    // '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
    'Created Date',
    // '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
    'Vendor Name',
    // '<?php echo $translations['A00103'][$language]; /* Email */ ?>',
    'Total Amount',
    // '<?php echo $translations['A00110'][$language]; /* Role Name */ ?>',
    'Status',
    // '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
    // 'Created By',
    // '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
    // 'Approved By',
    // '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>'
    // 'Approved Date',
    'Remark',
    'Warehouse',
    // '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>'
);

var sortThArray = Array(
    "po.id",
    "po.order_number",
    "po.created_at",
    "v.name",
    "po.total_cost",
    "po.status",
    "po.remarks",
    "w.warehouse_location"
);

var searchId = 'searchForm';

var url = 'scripts/reqAdmin.php';
var method = 'POST';
var debug = 0;
var bypassBlocking = 0;
var bypassLoading = 0;
var pageNumber = 1;
var formData = "";
var fCallback = "";

var vendorName = '<?php echo $_POST['vendorName'] ?>';

    $(document).ready(function() {
        $('#vendorName').val(vendorName);

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        pagingCallBack(pageNumber, loadSearch);

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        // Initialize date picker
        $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
            $(this).val('');
        });
    });

function pagingCallBack(pageNumber, fCallback) {
    if (pageNumber > 1) bypassLoading = 1;

    var searchData = buildSearchDataByType(searchId);

    var sortData = getSortData(tableId);

    var formData = {
        command: "getPurchaseOrderList",
        pageNumber: pageNumber,
        inputData: searchData,
        sortData    : sortData
    };

    if (!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing(data, message) {
    var tableNo;
    var poTable = data.purchaseOrderList;

    var sortArray = {
        'sortThArray'   : sortThArray,
        'sortBy'        : data['sortBy'],
    }

    if (data != "" && poTable.length > 0) {
        var newPoTable = []

        $.each(poTable, function(k, v) {
            if(v['status'] == "Done") {
                var editBtn = `
                    <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                `;
            } else {
                var editBtn = `
                    <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                `;
            }

            // if (v['status'] == 'Confirmed') {
                // btnList = editBtn;
            // } else if (v['status'] == 'Done') {
                // btnList = '';
            // } else {
                // btnList = editBtn + approveBtn;
                btnList = editBtn;
            // }/

            var rebuildData = {
                id            : v['id'],
                order_number  : v['order_number'],
                buying_date   : v['buying_date'],
                vendor        : v['vendor'],
                cost          : v['cost'],
                status        : v['status'],
                // created_by    : v['Created_by'],
                // approved_by   : v['approved_by'],
                // approved_date : v['approved_date'],
                remarks       : v['remarks'],
                warehouse     : v['warehouse_location'],
                btnList       : btnList,
            };
            newPoTable.push(rebuildData);
        });
    }

    buildTable(newPoTable, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    // $('#'+ tableId).find('tbody tr').each(function(){
    //     $(this).find('td:last-child').css('text-align','center');
    // });
}

function tableBtnClick(btnId) {
    var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
    var tableRow = $('#' + btnId).parent('td').parent('tr');
    var tableId = $('#' + btnId).closest('table');

    if (btnName == 'edit') {
        var editId = tableRow.attr('data-th');
        var status = tableRow.find('td:eq(5)').text();
        var createdAt = tableRow.find('td:eq(2)').text();
        var vendor = tableRow.find('td:eq(3)').text();
        // var newVendor = vendor.replace(/\s+/g, "");

        $.redirect("editPurchaseOrder.php", {
            id: editId,
            status: status,
            createdAt: createdAt,
            vendor: vendor
        });
    }

    if (btnName == 'approve') {
        var editId = tableRow.attr('data-th');
        var role = tableRow.find('td:eq(4)').text();
        // $.redirect("order.php",{id: editId, role : role});
        document.getElementById('approve').onclick = confirmPoStatus(editId);
    }
}

function confirmPoStatus(id) {
    var formData = {
        command: "approvePurchaseOrder",
        id: id,
        status: 'Confirmed'
    };

    if (fCallback)
        fCallback = loadPurchaseOrderUpdate;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
    loadDefaultListing(data, message);
    $('#searchMsg').addClass('alert-success').html(
        '<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
    setTimeout(function() {
        $('#searchMsg').removeClass('alert-success').html('').hide();
    }, 3000);
}

function loadPurchaseOrderUpdate(result) {
    showMessage('Approved Successfully', 'success', 'Approved Successfully', 'user-plus', 'order.php');

    $('#' + tableId).find('tbody tr').each(function() {
        id = $(this).find('td:eq(0)').text();
        var column = $(this).find('td:eq(6)').children();
        var editBtn = column[1].id;

        if (result.status == "Confirmed" && id == result.id) {
            $('#'.editBtn).attr('onclick', 'return false');
        }
    });
}
</script>
</body>

</html>