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
                                                            Vendor Code
                                                        </label>
                                                        <input type="text" class="form-control" dataName="supplierID" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Vendor Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Vendor Number
                                                        </label>
                                                        <input type="text" class="form-control" dataName="number" dataType="text">
                                                    </div>
                                                </div>

                                                <!-- <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Person In Charge
                                                        </label>
                                                        <input type="text" class="form-control" dataName="PIC" dataType="text">
                                                    </div>
                                                </div> -->

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Operation Hour
                                                        </label>
                                                        <input type="text" class="form-control" dataName="operationHour" dataType="text">
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
                            <!-- <div class="card-box p-b-0"> -->
                                <div id="addVendor" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Add Vendor
                                </div>
                                <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                                    Export to xlsx
                                </button>
                                <button id="seeAllBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                                    See All
                                </button>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive verticalTable"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div><!-- End row -->
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
        var pagerId  = 'pagerList';
        var btnArray = {};
        var thArray  = Array (
            "Vendor Code",
            "Vendor Name",
            "Vendor Number",
            // "Person In Charge",
	        "Operation Hour",
            "Status",
            "Edit"
        );

        var sortThArray = Array(
            "v.vendor_code",
            "v.name",
            "v.mobile",
            "v.note",
            "v.deleted"
        );

        //View Details Table
        var divIdDetails = 'listingDivDetails';
        var tableIdDetails = 'listingTableDetails';
        var pagerIdDetails = 'listingPagerDetails';
        var btnArrayDetails = {};

        /*var thArrayDetails = Array(
            'Subscription Date',
            'Reference No',
            'User ID',
            'Tib Subscribed',
            'FIL / Tib',
            'Total FIL'
        );*/
            
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
            });

            pagingCallBack(pageNumber, loadSearch);
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#addVendor').click(function() {
                $.redirect("addVendor.php");
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

            $('#seeAllBtn').click(function () {
                var searchID = "searchForm";
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getSupplierListing",
                    searchData  : searchData,
                    pageNumber  : pageNumber,
                    seeAll      : 1
                };
                fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#exportBtn').click(function () {
                var searchId = 'searchForm';
                var searchData = buildSearchDataByType(searchId);
                var thArray  = Array (
                    // "ID",
                    "Vendor Code",
                    "Vendor Name",
                    "Vendor Number",
                    "Operation Hour",
                    "Status",
                );
                var key = Array(
                    // 'id',
                    'code',
                    'name',
                    'phone',
                    // 'email',
                    // 'remark',
                    // 'pic',
                    'note',
                    'status',
                    // 'createdAt'
                );

                var formData = {
                    command: "getSupplierListing",
                    filename: "SupplierListingReport",
                    searchData: searchData,
                    header: thArray,
                    key: key,
                    DataKey: "supplierDetails",
                    type: 'export',
                };
                fCallback = exportExcel;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = "searchForm";
            var searchData = buildSearchDataByType(searchID);

            var sortData = getSortData(tableId);

            var formData   = {
                command     : "getSupplierListing",
                searchData  : searchData,
                pageNumber  : pageNumber,
                sortData    : sortData
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            // if (data) {
            //    $("#exportBtn, #seeAllBtn").show();
            // } else {
            //    $("#exportBtn, #seeAllBtn").hide();
            // }

            if (data) {
               $("#exportBtn").show();
            } else {
               $("#exportBtn").hide();
            }

            $('#basicwizard').show();
            var tableNo;

            var sortArray = {
                'sortThArray'   : sortThArray,
                'sortBy'        : data['sortBy'],
            }

            if(data.supplierDetails) {
                var newList = [];

                $.each(data.supplierDetails, function(k, v) {

                    var buildBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    var rebuildData = {
                        code                : v['code'],
                        name                : v['name'],
                        phone               : v['phone'],
                        // pic                 : v['pic'],
			            note		    : v['note'],
                        status              : v['status'],
                        buildBtn            : buildBtn
                    };
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('tbody tr, thead tr').each(function () {
                $(this).find('td:last-child, th:last-child').css('text-align', "center");
            });
        }

        function editRecord(supplierID) {
            $.redirect('editVendor.php', {
                supplierID : supplierID
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
