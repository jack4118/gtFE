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
                                                    Date
                                                </label>
                                                <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="date" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="date" dataType="dateRange">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00937'][$language]; /* Invoice Number */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="invoiceNo" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Sales Order Number
                                                </label>
                                                <input type="text" class="form-control" dataName="purchaseOrderNo" dataType="text">
                                            </div>

                                            


                                        </div>

                                        <div class="col-sm-12 px-0">

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                </label>
                                                <span class="pull-right">
                                                    <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                    <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control name" dataName="fullname" dataType="text">
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
                                                        Pick Up
                                                    </option>
                                                </select> 
                                            </div>

                                            
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Status
                                                </label>
                                                <select id="status" type="text" class="form-control" dataName="status" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="Completed">
                                                        Completed
                                                    </option>
                                                    <option value="Pending">
                                                        Pending
                                                    </option>
                                                    <option value="To Ship">
                                                        To Ship
                                                    </option>
                                                    <option value="To PickUp">
                                                        To Pickup
                                                    </option>
                                                </select> 
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Delivery Order Number
                                                </label>
                                                <input type="text" class="form-control" dataName="deliveryOrderNo" dataType="text">
                                            </div>
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
                <!-- <div class="card-box p-b-0"> -->
                    <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                    <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
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

<div class="modal fade" id="cancelDOModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title">
                    Cancel DO 
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body modalBodyFont">
                <div class="form-group">
                    <label class="control-label">Remark(Optional)</label>
                    <input type="text" class="form-control" id="remarkInp">
                </div>
            </div>
            <div class="modal-footer" style="border-top: none;">
                 <button class="btn btn-primary waves-effect waves-light" id="submitBtn" data-dismiss="modal">Submit</button>
                 <button class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var url       = 'scripts/reqDefault.php';
    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};// Array('view');
    var thArray  = Array (
        "Date",
        "Invoice Number",
        "Full Name",
        "Member ID",
        "Payment Method",
        "SO Number",
        "Delivery Method",
        "DO Number",
        "Status",
        "View Details",
        "Cancel"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();

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

       
    });

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        
        if (data) {
            $('#exportBtn, #seeAllBtn').show(); 
        } else {
            $('#exportBtn, #seeAllBtn').hide();
        }
        if (data.deliveryOrderListing) {
    		var newList = [];
            $.each(data.deliveryOrderListing, function(k, v) {


                var buildView = `
                    <a data-toggle="tooltip" title="" onclick="viewDetails(${v['doID']})" class="m-t-5 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                `;


                // if (v['deliveryOption'] == "delivery" || v['deliveryOption'] == "pickup") {
                //     var viewBtn2 = `
                //         <a data-toggle="tooltip" title="" onclick="goDoDetails(${v['id']})" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                //     `;
                // } else {
                //     var viewBtn2 = `-`;
                // }

                if (v['cancelAllowed'] == 1) {
                    var cancelBtn = `
                        <a data-toggle="tooltip" title="" onclick="cancelDO(${v['doID']})" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Cancel"><i class="fa fa-trash"></i></a>
                    `;
                } else {
                    var cancelBtn = `-`;                    
                }

                var rebuildData = {
                    date                : v['date'],
                    invoiceNo           : v['invoiceNo'],
                    fullname            : v['fullname'],
                    memberID            : v['memberID'],
                    paymentMethod       : v['paymentMethod'],
                    purchaseOrderNo     : v['purchaseOrderNo'],
                    deliveryOption      : v['deliveryOption'],
                    deliveryOrderNo     : v['deliveryOrderNo'],
                    statusDisplay       : v['statusDisplay'],
                    buildView           : buildView,
                    cancelBtn           : cancelBtn
                };
                newList.push(rebuildData);
            });
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(6)').css('text-transform', "capitalize");
            $(this).find('th:eq(8)').css('text-align', "center");
            $(this).find('th:eq(9)').css('text-align', "center");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(6)').css('text-transform', "capitalize");
            $(this).find('td:eq(8)').css('text-align', "center");
            $(this).find('td:eq(9)').css('text-align', "center");
        });

        
    }

    function seeAll() {
        var searchID = 'searchInvoice';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command             : "getDeliveryOrderListing",
            pageNumber          : pageNumber,
            offsetSecs          : offsetSecs,
            searchData          : searchData,
            // fullnameSearchType  : $("input[name=fullnameSearchType]:checked").val(),
            seeAll              : 1
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn() {
        var searchID = 'searchInvoice';
        var searchData = buildSearchDataByType(searchID);

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
        };

        var thArray  = Array (
            "Date",
            "Invoice Number",
            "Full Name",
            "Member ID",
            "Payment Method",
            "SO Number",
            "Delivery Method",
            "DO Number",
            "Status",
        );

        var key  = Array (
            'date',
            'invoiceNo',
            'fullname',
            'memberID',
            'paymentMethod',
            'purchaseOrderNo',
            'deliveryOption',
            'deliveryOrderNo',
            'statusDisplay',
        );

        var formData = {
            command: "getDeliveryOrderListing",
            filename: "DeliveryOrderListReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "deliveryOrderListing",
            type: 'export',
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#cancelDOModal').on('hidden.bs.modal', function (e) {
      $(this).find('input').val(' ').end();
    })

    function cancelDO(doID){
        $("#cancelDOModal").modal('show');
        $("#submitBtn").click(function(){
            var remark = $("#remarkInp").val();
            var formData = {
                command: "cancelDO",
                deliveryOrderID : doID,
                remark : remark
            };
            fCallback = cancelDOSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    }

    function cancelDOSuccess(data,message){
        $("#cancelDOModal").modal('hide');
        showMessage(message,'success','Cancel DO','success','getDeliveryOrderListing.php');
    }

    function viewDetails(id) {
        $.redirect("getDeliveryOrderDetails.php", {id, id})
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

        if (btnName == 'view') {
            var invoiceId = tableRow.attr('data-th');
            $.redirect("viewInvoice.php",{invoiceId: invoiceId});
        }
    }


    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId = 'searchInvoice';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command             : "getDeliveryOrderListing",
            pageNumber          : pageNumber,
            offsetSecs          : offsetSecs,
            searchData          : searchData,
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