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
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['M02965'][$language]; /* DELIVERY ORDER number */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="doNo" dataType="text">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Delivery Partner
                                                    </label>
                                                    <input type="text" class="form-control name" dataName="deliveryPartner" dataType="text">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <select id="status" type="text" class="form-control" dataName="status" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01167'][$language]; /* Created By */ ?>
                                                    </label>
                                                    <input type="text" class="form-control name" dataName="createdBy" dataType="text">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01171'][$language]; /* Last Update */ ?>
                                                    </label>
                                                    <input type="text" class="form-control name" dataName="updatedBy" dataType="text">
                                                </div>
                                            </div>

                                        </form>

                                        <div class="col-xs-12">
                                            <button id="searchDOBtn" type="submit" class="btn btn-primary waves-effect waves-light">
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
                    <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                        Export to xlsx
                    </button>
                    <form>
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="alert text-center" style="display: none;"></div>
                                <div id="doListDiv" class="table-responsive"></div>
                                <span id="paginateText"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="pagerDOList"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
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
    var divId    = 'doListDiv';
    var tableId  = 'deliveryOrderListTable';
    var pagerId  = 'pagerDOList';
    var btnArray = {};
    var thArray  = Array (
        "DO No",
        "Delivery Partner",
        "Status",
        "Creator",
        "Updater",
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
                $("#searchDOBtn").click();
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

        $('#searchDOBtn').click(function() {
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
                "DO No",
                "Delivery Partner",
                "Status",
                "Creator",
                "Updater",
            );

            var key = Array(
                'delivery_order_no',
                'delivery_partner',
                'status',
                'creator',
                'updater',
            );

            // getDOListing
            var formData = {
                command: "getDOListing",
                filename: "DeliveryOrderListingReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "invDeliveryList",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadDefaultListing(data, message) {
        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        $('#basicwizard').show();
        if (data.invDeliveryList) {
    		var newList = [];
            $.each(data.invDeliveryList, function(k, v) {
                var buildView = `
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['delivery_order_no']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                `;

                var rebuildData = {
                    delivery_order_no      : v['delivery_order_no'],
                    delivery_partner       : v['delivery_partner'],
                    status                 : v['status'],
                    creator                : v['creator'],
                    updater                : v['updater'],
                    buildView              : buildView,
                };
                newList.push(rebuildData);
            });
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
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

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId = 'searchInvoice';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command             : "getDOListing",
            pageNumber          : pageNumber,
            searchData          : searchData,
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function viewDetails(doNo) {

        $.redirect("deliveryOrderDetails.php", {doNo, doNo})
    }
</script>
</body>
</html>