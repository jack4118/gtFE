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
                                                            <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00377'][$language]; /* Updated At */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="updatedAt" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="updatedAt" dataType="dateRange">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            Package Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="productName" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A00318'][$language]; /* Status */?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="Active">
                                                                <?php echo $translations['A00372'][$language]; /* Active */?>
                                                            </option>
                                                            <option value="Inactive">
                                                                <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                            </option>
                                                            <option value="Sold Out">
                                                                Sold Out
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A00245'][$language]; /* Code */?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="code" dataType="text">
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
            "Created Date",
            "Active Date",
            "Package Code",
            "Package Name",
            "Total Weights",
            // "Description",
            "Retail Price",
            "Promotion Price",
            "Member Price",
            // "Category",
            // "Stock Balance",
            // "Total Sold",
            "PV",
            "Status",
            "Updated Date",
            "Done By",
            "Edit",
            "Adjust"
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
                var thArray  = Array (
                    "Created Date",
                    "Active Date",
                    "Package Code",
                    "Package Name",
                    "Total Weights",
                    // "Description",
                    "Retail Price",
                    "Promotion Price",
                    "Member Price",
                    // "Category",
                    // "Stock Balance",
                    // "Total Sold",
                    "PV",
                    "Status",
                    "Updated Date",
                    "Done By"
                );

                var key = Array(
                    'createdAt',
                    'activeDate',
                    'code',
                    'name',
                    'weight',
                    // 'description',
                    'retailPrice',
                    'promoPrice',
                    'memberPrice',
                    // 'categoryDisplay',
                    // 'totalBalance',
                    // 'totalSold',
                    'pvPrice',
                    'statusDisplay',
                    'updatedAt',
                    'updaterName'
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
                command     : "getPackageListing",
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
            var list = data.packageList;
            if(list) {
                var newList = [];
                // var j = 0;

                $.each(list, function(k, v) {

                    var buildBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    // var adjustBtn = `-`;
                    // if (v['isAdjustable'] == 1) {
                    var adjustBtn = `
                        <a data-toggle="tooltip" title="" onclick="adjustRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Adjust" aria-describedby="tooltip645115"><i class="fa fa-wrench"></i></a>
                    `;
                    if(v['adjustRestricted'] == 1){
                        adjustBtn = "-";
                    }
                    // } else {
                    //     adjustBtn = `-`;
                    // }

                    var rebuildData = {
                        createdAt       : v['createdAt'],
                        activeDate      : v['activeDate'],
                        code            : v['code'],
                        name            : v['name'],
                        totalWeights    : numberThousand(v['weight'], 2),
                        // description     : v['description'],
                        retailPrice     : numberThousand(v['retailPrice'], 2),
                        promoPrice      : v['promoPrice']!="-"?numberThousand(v['promoPrice'], 2):v['promoPrice'],
                        memberPrice     : numberThousand(v['memberPrice'], 2),
                        // categoryDisplay : v['categoryDisplay'],
                        // totalBalance    : numberThousand(v['totalBalance'], 0),
                        // totalSold       : numberThousand(v['totalSold'], 0),
                        pvPrice         : numberThousand(v['pvPrice'], 2),
                        statusDisplay   : v['statusDisplay'],
                        updatedAt       : v['updatedAt'],
                        updaterName     : v['updaterName'],
                        buildBtn        : buildBtn,
                        adjustBtn       : adjustBtn
                    };
                    // ++j;
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('th:last-child, td:last-child').css('text-align', "center");
                $(this).find('th:eq(-2), td:eq(-2)').css('text-align', "center");
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
                $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
                $(this).find('th:eq(6), td:eq(6)').css('text-align', "right");
                $(this).find('th:eq(7), td:eq(7)').css('text-align', "right");
                $(this).find('th:eq(8), td:eq(8)').css('text-align', "right");
                // $(this).find('th:eq(9), td:eq(9)').css('text-align', "right");
            });
        }

        function editRecord(id) {
            $.redirect('editPackageDetails.php', {
                id : id
            });
        }

        function adjustRecord(packageID) {
            $.redirect('packageAdjustment.php', {
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