<?php
session_start();


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
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchInvoice" role="form">
                                          <div class="col-sm-12 px-0">

                                            <div id="datepicker" class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['M03909'][$language]; /* Order Date */?>
                                                </label>
                                                <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="transactionDate" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="transactionDate" dataType="dateRange">
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00937'][$language]; /* Invoice Number */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="invoiceNo" dataType="text">
                                            </div> -->

                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div> -->

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00171'][$language]; /* Mobile Number */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo 'Customer Name'; /* User Name */?>
                                                </label>
                                                <span class="pull-right">
                                                    <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                    <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control name" dataName="fullname" dataType="text">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 px-0">

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Payment Method
                                                </label>
                                                <select id="payment_method" type="text" class="form-control" dataName="payment_method" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="FPX">
                                                        FPX
                                                    </option>
                                                    <option value="ManualBankTransfer">
                                                        Manual Bank Transfer
                                                    </option>
                                                    <option value="QRCode">
                                                        QR Code
                                                    </option>
                                                </select> 
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Delivery Method
                                                </label>
                                                <select id="deliveryOption" type="text" class="form-control" dataName="deliveryOption" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="delivery">
                                                        Delivery
                                                    </option>
                                                    <option value="pickup">
                                                        Pickup
                                                    </option>
                                                </select> 
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Status
                                                </label>
                                                <select id="status" type="text" class="form-control" dataName="status" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <!-- <option value="Draft">
                                                        Draft
                                                    </option>
                                                    <option value="Pending Payment Approve">
                                                        Pending Payment Approve
                                                    </option>
                                                    <option value="Paid">
                                                        Paid
                                                    </option>
                                                    <option value="Cancelled">
                                                        Cancelled
                                                    </option>
                                                    <option value="Failed">
                                                        Failed
                                                    </option>
                                                    <option value="Delivered">
                                                        Delivered
                                                    </option> -->
                                                </select> 
                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    SO ID
                                                </label>
                                                <input type="text" class="form-control" dataName="poNumber" dataType="text">
                                            </div>

                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    DO Number
                                                </label>
                                                <input type="text" class="form-control" dataName="doNumber" dataType="text">
                                            </div> -->
                                        </div>

                                    </form>
                                    <div class="col-xs-12">
                                        <button id="searchInvoiceBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
                                        </button>
                                        <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">
                                            <?php echo $translations['A00053'][$language]; /* Reset */?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                <button id="addSOBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="margin-right: 10px;">
                    Add SO
                </button>
                <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                    Export to xlsx
                </button>
                <!-- <div class="card-box p-b-0"> -->
                    <form>
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="alert text-center" style="display: none;"></div>
                                <div id="invoiceListDiv" class="table-responsive"></div>
                                <span id="paginateText"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
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
<?php
    $adminUsername   = $_SESSION['username'];
    $adminID         = $_SESSION['userID'];
    $adminSession    = $_SESSION['sessionID'];
?>
<script>

    var url       = 'scripts/reqDefault.php';
    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};// Array('view');
    var thArray  = Array (
        "SO ID",
        "SO NO",
        "Order Date",
        // "Invoice Number",
        // "DO Number",
        "Customer Name",
        "Mobile Number",
        "Payment Method",
        "Delivery Method",
        "Status",
        "Total Amount",
        "Button (View/Edit)",
        // "Issue DO"
    );

    var sortThArray = Array(
        "id",
        "so_no",
        "created_at",
        "billing_name",
        "billing_phone",
        "payment_method",
        "delivery_method",
        "status",
        "payment_amount"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();
    var adminUsername  = "<?php echo $adminUsername;?>";
    var adminID        = "<?php echo $adminID;?>";
    var adminSession   = "<?php echo $adminSession;?>";


    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchInvoiceBtn").click();
            }
        });
        

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchInvoice').find('input:not([type=radio])').each(function() {
                $(this).val('');
            });
            $('#searchInvoice').find('select').each(function() {
                $(this).val('');
            });
        });

        pagingCallBack(pageNumber, loadSearch);

        $('#searchInvoiceBtn').click(function() {
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

        $('#exportBtn').click(function () {
            var searchId = 'searchInvoice';
            var searchData = buildSearchDataByType(searchId);
            var thArray  = Array (
                "SO ID",
                "SO NO",
                "Order Date",
                // "Invoice Number",
                // "DO Number",
                "Customer Name",
                // "Member ID",
                "Mobile Number",
                "Payment Method",
                "Delivery Method",
                "Status",
                "Total Amount"
            );

            var key = Array(
                'poNumber',
                'sono',
                'created_at',
                // 'invoiceNumber',
                // 'DONumber',
                'fullname',
                // 'memberID',
                'username',
                'paymentMethod',
                'deliveryOption',
                'statusDisplay',
                'payment_amount'
            );

            var formData = {
                command: "getPOListing",
                filename: "SalesOrderListingReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "invoiceList",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#addSOBtn').click(function () {
            // $.redirect("addSaleOrder.php")
            soType = "add";
            $.redirect("editSaleOrder.php", {soType, soType})
        });


    });

    function loadDefaultListing(data, message) {
        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        $('#basicwizard').show();

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }
        
        if (data.invoiceList) {
    		var newList = [];
            $.each(data.invoiceList, function(k, v) {


                var buildView = `
                    <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['sono'].toString()}', '${v['username']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                `;

                if (v['issueDOAllowed'] == 1) {
                    var issueDO = `
                        <a data-toggle="tooltip" title="" onclick="issueDO(${v['id']})" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Issue DO"><i class="fa fa-edit"></i></a>
                    `;  
                } else  {
                    var issueDO = "-";
                }

                

                // if (v['deliveryOption'] == "delivery" || v['deliveryOption'] == "pickup") {
                //     var viewBtn2 = `
                //         <a data-toggle="tooltip" title="" onclick="goDoDetails(${v['id']})" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                //     `;
                // } else {
                //     var viewBtn2 = `-`;
                // }

                var rebuildData = {
                    poNumber            : v['poNumber'],
                    sono                : v['sono'],
                    created_at          : v['created_at'],
                    // invoiceNumber       : v['invoiceNumber'],
                    // DONumber            : v['DONumber'],
                    fullname            : v['fullname'],
                    memberID            : v['username'],
                    paymentMethod       : v['paymentMethod'],
                    deliveryOption      : v['deliveryOption'],
                    statusDisplay       : v['statusDisplay'],
                    payment_amount      : v['payment_amount'],
                    buildView           : buildView
                    // issueDO
                };
                newList.push(rebuildData);
            });
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(2)').css('max-width', "250px");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(2)').css('max-width', "250px");
        });        

        if (data.statusList) {
            var buildStatusList;

            $.each(data.statusList, function(k, v) {
                buildStatusList += `
                    <option value="${v['status']}">${v['status']}</option>
                `;
            });

            var selectListStatus = $('#status');
            if (selectListStatus.find('option').length === 1) {
                selectListStatus.append(buildStatusList);
            }
        }
    }

    function viewDetails(sono, username) {
        console.log(sono);

        var url = '<?php echo $config['loginToMemberURL'] ?>orderStatus?SONO=' + encodeURIComponent(sono)+"&phone="+ encodeURIComponent(username.slice(-4))+"&b=1";
        window.location.href = url;
    }





    function issueDO(id) {
        $.redirect("issueDO.php", {id, id})
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        var status = tableRow.find('td:eq(7)').text();
        var id = tableRow.find('td:eq(0)').text();
        var delivery_method = tableRow.find('td:eq(5)').text();
        var payment_method = tableRow.find('td:eq(4)').text();

        $.redirect("editSaleOrder.php",{id: id, status: status, payment_method: payment_method, delivery_method: delivery_method});
    }

    // function viewDetails(invoiceID) {
    //     $.redirect('viewInvoice.php',{
    //         invoiceId : invoiceID,
    //         invoceType : "invoice"
    //     }); 
    // }

    // function goDoDetails(invoiceID) {
    //     $.redirect('viewInvoice.php',{
    //         invoiceId : invoiceID,
    //         invoceType : "deliveryOrder"
    //     }); 
    // }


    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId = 'searchInvoice';
        var searchData = buildSearchDataByType(searchId);

        var sortData = getSortData(tableId);

        var formData = {
            command             : "getPOListing",
            pageNumber          : pageNumber,
            offsetSecs          : offsetSecs,
            searchData          : searchData,
            sortData            : sortData
            // usernameSearchType : $("input[name=usernameType]:checked").val(),
            // fullnameSearchType  : $("input[name=fullnameSearchType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });
</script>
</body>
</html>