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
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00623'][$language]; /* Product Name */?> 
                                                        </label>
                                                        <input type="text" class="form-control" dataName="productName" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01288'][$language]; /* Customer */?> <?php echo $translations['A01641'][$language]; /* Name */?> 
                                                        </label>
                                                        <input type="text" class="form-control" dataName="customerName" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                             Rating
                                                        </label>
                                                        <select class="form-control" dataName="rating" dataType="select">
                                                            <option value="" selected>
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="1">
                                                                1
                                                            </option>
                                                            <option value="2">
                                                                2
                                                            </option>
                                                            <option value="3">
                                                                3
                                                            </option>
                                                            <option value="4">
                                                                4
                                                            </option>
                                                            <option value="5">
                                                                5
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Status
                                                        </label>
                                                        <!-- <input type="text" class="form-control" dataName="status" dataType="text"> -->
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="" selected>
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="Pending">
                                                                <?php echo $translations['A01017'][$language]; /* Pending */?>
                                                            </option>
                                                            <option value="Approved">
                                                                <?php echo $translations['A01218'][$language]; /* Approved */?>
                                                            </option>
                                                            <option value="Rejected">
                                                                <?php echo $translations['A01439'][$language]; /* Rejected */?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                             Archive Status
                                                        </label>
                                                        <select class="form-control" dataName="isArchive" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="yes">
                                                                Yes
                                                            </option>
                                                            <option value="no" selected>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div> -->
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
                                <!-- <div id="addPackage" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Add Package
                                </div> -->
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
                                            <div id="announcementListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerAnnouncementList"></ul>
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
        var divId    = 'announcementListDiv';
        var tableId  = 'announcementListTable';
        var pagerId  = 'pagerAnnouncementList';
        var btnArray = {};
        var thArray  = Array (
            "Product",
            "Customer Name",
            "Rating",
            "Status",
            // "Archive Status",
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
            });

            pagingCallBack(pageNumber, loadSearch);
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#addPackage').click(function() {
                $.redirect("addPackageDetails.php");
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

            $('#seeAllBtn').click(function() {
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = "searchForm";
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getPackageListing",
                    searchData  : searchData,
                    pageNumber  : 1,
                    seeAll      : 1
                };

                fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#exportBtn').click(function () {
                var searchId = 'searchForm';
                var searchData = buildSearchDataByType(searchId);

                var key = Array(
                    'skuCode',
                    'name',
                    'categ_list',
                    'salePrice',
                    'mysteryFoodQuantity',
                    'publishStatus',
                    // 'archiveStatus'
                );

                var formData = {
                    command: "getPackageListing",
                    filename: "PackageListingReport",
                    searchData: searchData,
                    header: thArray,
                    key: key,
                    DataKey: "packageList",
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
            var formData   = {
                command     : "getCustomerReviewAdmin",
                pageNumber  : pageNumber,
                searchData  : searchData,
            };

            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {

            if (data) {
                $("#exportBtn, #seeAllBtn").show();
            } else {
                $("#exportBtn, #seeAllBtn").hide();
            }

            $('#basicwizard').show();
            var tableNo;
            var list = data.reviewList;
            if(list) {
                var newList = [];
                $.each(list, function(k, v) {
                    var editBtn = `
                        <a data-toggle="tooltip" title="" onclick="editReview('${v['reviewID']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    var rebuildData = {
                        // created_at      : v['created_at'],
                        // name            : v['name'],
                        // description     : v['description'],
                        // sale_price      : addCommas(v['sale_price']),

                        productName            : v['productName'],
                        customerName           : v['customerName'],
                        rating                 : v['rating'],
                        status                 : v['status'],

                        // archiveStatus          : v['archiveStatus'],
                        editBtn                 : editBtn,
                    };

                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('td:eq(4)').css('text-align', "center");
                $(this).find('td:eq(3)').css('text-align', "center");
                $(this).find('td:eq(2)').css('text-align', "center");
                $(this).find('td:eq(1)').css('text-align', "center");
                $(this).find('th').css('text-align', "center");
            });
        }

        function editReview(reviewID) {
            $.redirect('getReviewDetail.php', {reviewID : reviewID});
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