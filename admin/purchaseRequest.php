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
                                                    <!-- ID Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01777'][$language]; /* Reference Number */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="refNo" dataType="text">
                                                    </div>
                                                    <!-- Buying Date Search -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01694'][$language]; /* Buying Date */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input id="buyingDateStart" type="text" class="form-control" dataName="buyingDate" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input id="buyingDateEnd" type="text" class="form-control" dataName="buyingDate" dataType="dateRange">
                                                        </div>
                                                    </div> -->
                                                    <div id="datepicker" class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01694'][$language]; /* Buying Date */?>
                                                        </label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="buyingDateStart" type="text" class="form-control" name="start" dataName="buyingDate" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="buyingDateEnd" type="text" class="form-control" name="end" dataName="buyingDate" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <!-- Vendor Name Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01703'][$language]; /* Vendor Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
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
                                                            <option value="approved">
                                                                Approved
                                                            </option>
                                                            <option value="save">
                                                                Save
                                                            </option>
                                                            <option>
                                                                Cancelled
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
                                                    <!-- Warehouse Search -->
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01739'][$language]; /* Warehouse */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="warehouseSearch" dataType="text">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                        <a href="newPurchaseRequest.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                            New Purchase Request
                        </a>
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        'ID',
        'PR No',
        'Buying Date',
        'Vendor Name',
        'Total Amount',
        'Created By',
        'Approved By',
        'Status',
        'Remark',
        'Warehouse',
        );
    var sortThArray = Array(
        "pr.id",
        "pr.order_number",
        "pr.buying_date",
        "v.name",
        "pr.total_cost",
        "pr.Created_by",
        "pr.approved_by",
        "pr.status",
        "pr.remarks",
        "w.warehouse_location"
    );
    var searchId = 'searchForm';

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

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

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);

        var sortData = getSortData(tableId);

        var formData   = {
            command     : "getPurchaseRequestList",
            pageNumber  : pageNumber,
            inputData   : searchData,
            sortData    : sortData
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        var prTable = data.purchaseRequestList;

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }

        if (data != "" && prTable.length > 0) {
            var newPrTable = []
            $.each(prTable, function(k, v) {
                if(v['approved_by'] == "-") {
                    var editBtn = `
                        <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    `;
                } else {
                    var editBtn = `
                        <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                    `;
                }
                // var approveBtn = `
                //     <a data-toggle="tooltip" title="" id="approve${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Approve"><i class="fa fa-check"></i></a>
                // `;

                // if(v['status'] != 'Approved') {
                    // btnList = editBtn + approveBtn;
                // } else {
                    btnList = editBtn;
                // }

                var rebuildData = {
                    id            : v['id'],
                    orderNumber   : v['orderNumber'],
                    buying_date   : v['buying_date'],
                    vendor        : v['vendor'],
                    cost          : v['cost'],
                    created_by    : v['Created_by'],
                    approved_by   : v['approved_by'],
                    status        : v['status'],
                    // approved_date : v['approved_date'],
                    remarks       : v['remarks'],
                    warehosue     : v['warehouse_location'],
                    btnList       : btnList,
                };
                newPrTable.push(rebuildData);
            }); 
        }
        buildTable(newPrTable, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            var role = tableRow.find('td:eq(4)').text();
            var vendor = tableRow.find('td:eq(3)').text();

            $.redirect("editPurchaseRequest.php",{id: editId, role: role, vendor: vendor});
        }

        if (btnName == 'approve') {
            var editId = tableRow.attr('data-th');
            var rowId = tableRow.attr('id');
            updatePurchaseStatus(editId, rowId);
        }
    }

    function updatePurchaseStatus(editId, rowId) { 
        var formData   = {
            command     : "purchaseRequestApprove",
            id          : editId,
            status      : 'Approved'
        };
        
        fCallback = loadUpdateStatus;

        $("#edit" + rowId + "fa-edit").css("display", "none");
        $("#edit" + rowId).html('<i class="fa fa-eye"></i>');
        $("#approve" + rowId).css("display", "none");
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadUpdateStatus(result, message) {
        showMessage('Approved Successfully', 'success', 'Approved Successfully', 'check', ''); 
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    $('#datepicker input').each(function() {
        $(this).datepicker('clearDates');
    });

    $('#buyingDateStart').datepicker({
        // language: language,
        format      : 'yyyy-mm-dd',
        orientation : 'auto',
        autoclose   : true
    });

    $('#buyingDateEnd').datepicker({
        // language: language,
        format      : 'yyyy-mm-dd',
        orientation : 'auto',
        autoclose   : true
    });

    // const statusBtn = document.getElementsByName("approve");
    // const status = document.getElementById('status');
    // if (id == '48') {
    //     // status.disabled = true;
    //     console.log(status);
    // }

</script>
</body>
</html>
