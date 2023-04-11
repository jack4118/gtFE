<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
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
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-12 px-0">

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Date
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="transactionDate" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="transactionDate" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Member ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Full Name
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
                                                        <label class="control-label">
                                                            Leader ID
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderID" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                        Main Leader ID
                                                        </label>
                                                        <input id="mainLeaderID" class="form-control"
                                                                dataName="mainLeaderID" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A00318'][$language]; /* Status */?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="Paid">
                                                                Paid
                                                            </option>
                                                            <option value="Partial">
                                                                Partial
                                                            </option>
                                                            <option value="Completed">
                                                                Completed
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-sm-12">
                                                <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </div>
                                                <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="seeAllBtn" onclick="seeAll()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">See All</a>
                            <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none">
                                Export to xlsx
                            </button>
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0 px-0">
                                            
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
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div><!-- END wrapper -->
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'listingDiv';
        var tableId  = 'listingTable';
        var pagerId  = 'listingPager';
        var btnArray = {};
        var thArray  = Array (
            "Date",
            "Member ID",
            "Full Name",
            "Order Amount",
            "Order Details",
            "Total PV",
            "Payment Method",
            "Delivery Method",
            "Status",
            "",
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {

            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchBtn").click();
                }
            });
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
                var selected = $('.typeRadio:checked').val();
                $('#type option[value='+selected+']').prop('selected', true);
            });
            
            $('#searchBtn').click(function() {
                var getNameType = $("input[name=nameType]:checked").val();
                $('.name').attr('dataType', getNameType);
                pagingCallBack(pageNumber, loadSearch);
            });

            // Initialize date picker
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

            $('.typeRadio').change(function() {
                var selected = $('.typeRadio:checked').val();
                $('#type option[value='+selected+']').prop('selected', true);
                $("#searchBtn").click();
            })

            $('#exportBtn').click(function () {
                var searchId = 'searchForm';
                var searchData = buildSearchDataByType(searchId);
                var thArray  = Array (
                    "Date",
                    "Member ID",
                    "Full Name",
                    "Order Amount",
                    "Order Details",
                    "Total PV",
                    "Payment Method",
                    "Delivery Method",
                    "Status"
                );

                var key = Array(
                    'created_at',
                    'memberID',
                    'fullname',
                    'packageList',
                    'totalPV',
                    'paymentMethod',
                    'deliveryOption',
                    'statusDisplay'
                );

                var formData = {
                    command: "getAdminOrderListing",
                    filename: "AdminOrderListingReport",
                    searchData: searchData,
                    header: thArray,
                    key: key,
                    DataKey: "invoiceList",
                    type: 'export',
                };
                fCallback = exportExcel;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function seeAll() {
            var searchID = "searchForm";
            var searchData = buildSearchDataByType(searchID);
            var formData   = {
                command     : "getAdminOrderListing",
                pageNumber  : pageNumber,
                searchData  : searchData,
                seeAll      : 1
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = "searchForm";
            var searchData = buildSearchDataByType(searchID);
            var formData   = {
                command     : "getAdminOrderListing",
                pageNumber  : pageNumber,
                searchData  : searchData,
                seeAll      : 0,
            };

            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            data ? $("#exportBtn").show() : $("#exportBtn").hide();
            data ? $("#seeAllBtn").show() : $("#seeAllBtn").hide();
            $('#basicwizard').show();
            var tableNo;
            var list = data.invoiceList;
            if(list) {
                var newList = [];
                // var j = 0;

                $.each(list, function(k, v) {

                    var buildBtn = "";
                    if(v['status'] != "Completed"){
                        buildBtn = `
                        <a data-toggle="tooltip" title="" onclick="view('${v['id']}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="view" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                        `;
                    }
                    else{
                        buildBtn = "-";
                    }
                    var orderAmount = "";
                    var orderDetail = "";

                    var length = v['packageList'].length;
                    $.each(v['packageList'], function(k,v){
                        if(k != (length-1)){
                            orderAmount += `${v['amount']} <hr>`;
                            orderDetail += `${v['packageDisplay']} <hr>`;
                        }
                        else{
                            orderAmount += `${v['amount']}`;
                            orderDetail += `${v['packageDisplay']}`;
                        }
                        
                    });

                    var rebuildData = {
                        created_at : v['created_at'],
                        memberID : v['memberID'],
                        fullname : v['fullname'],
                        orderAmount : orderAmount,
                        orderDetail : orderDetail,
                        totalPV : v['totalPV'],
                        paymentMethod : v['paymentMethod'],
                        deliveryOption : v['deliveryOption'],
                        statusDisplay : v['statusDisplay'],
                        buildBtn : buildBtn
                    };
                    // ++j;
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }

        function view(id) {
            $.redirect('viewInvoice.php', {
                invoiceId : id
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