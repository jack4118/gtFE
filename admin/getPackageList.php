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
                                                            SKU Code
                                                        </label>
                                                        <input type="text" class="form-control" dataName="code" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Package Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="productName" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                             Publish Status
                                                        </label>
                                                        <select class="form-control" dataName="isPublish" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="yes" selected>
                                                                Yes
                                                            </option>
                                                            <option value="no">
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Category
                                                        </label>
                                                        <input type="text" class="form-control" dataName="category" dataType="text">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
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
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Vendor Name
                                                        </label>
                                                        <input id="vendorName" type="text" class="form-control" dataName="vendorName" dataType="text">
                                                    </div>
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
                                <div id="addPackage" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Add Package
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
            "Image",
            "SKU Code",
            "Package Name",
            "Category",
            "Sale Price",
            "Mystery Food Quantity",
            "Publish Status",
            // "Archive Status",
            "",
        );
        var sortThArray = Array(
            "",
            "p.barcode",
            "p.name",
            "p.categ_id",
            "p.sale_price",
            "",
            "p.is_published"
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 
        var vendorName = '<?php echo $_POST['vendorName'] ?>';

        $(document).ready(function() {
            $('#vendorName').val(vendorName);

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
                    'vendorName',
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
            
            var sortData = getSortData(tableId);

            var formData   = {
                command     : "getPackageListing",
                pageNumber  : pageNumber,
                searchData  : searchData,
                sortData    : sortData
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

            var sortArray = {
                'sortThArray'   : sortThArray,
                'sortBy'        : data['sortBy'],
            }

            var tableNo;
            var list = data.packageList;
            if(list) {
                var newList = [];
                $.each(list, function(k, v) {
                    var editBtn = `
                        <a data-toggle="tooltip" title="" onclick="editPackage('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    var rebuildData = {
                        // created_at      : v['created_at'],
                        // name            : v['name'],
                        // description     : v['description'],
                        // sale_price      : addCommas(v['sale_price']),
                        productImage           : v['productImage'],
                        skuCode                : v['skuCode'],
                        name                   : v['name'],
                        category                : v['categoryDisplay'],
                        salePrice              : addCommas(v['salePrice']),
                        mysteryFoodQuantity   : v['mysteryFoodQuantity'],
                        publishStatus          : v['publishStatus'],
                        vendorName          : v['vendorName'],

                        // archiveStatus          : v['archiveStatus'],
                        editBtn                 : editBtn,
                    };

                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('td:eq(3)').css('text-align', "right");
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "center");
            });
        }

        function editPackage(packageID) {
            $.redirect('editPackageDetails.php', {
                packageID : packageID
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