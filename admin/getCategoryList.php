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
                                                    <label class="control-label" for="" data-th="">
                                                        Category Name
                                                    </label>
                                                    <input id="name" type="text" class="form-control" dataName="name" dataType="text">
                                                </div>

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
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        Parent Category Name
                                                    </label>
                                                    <input id="parent_category" type="text" class="form-control" dataName="parent_category" dataType="text">
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
                                <div id="addProduct" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Add Category
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
                                            <input class="typeRadio" id="product" type="radio" value="product" name="typeRadio" checked/>
                                            <!-- <div>
                                                <div class="cateTab">
                                                    <div class="cateItem cateItem2">
                                                        <input class="typeRadio" id="package" type="radio" value="package" name="typeRadio" checked />
                                                        <label for="package">
                                                            <?php echo $translations['A00203'][$language]; /* Package */?>
                                                        </label>
                                                    </div>
                                                    <div class="cateItem cateItem2">
                                                        <input class="typeRadio" id="product" type="radio" value="product" name="typeRadio"/>
                                                        <label for="product">
                                                            <?php echo $translations['A00828'][$language]; /* Product */?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cateblock" style="padding: 10px;"> -->
                                                <div id="announcementListDiv" class="table-responsive"></div>
                                                <span id="paginateText"></span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pagerAnnouncementList"></ul>
                                                </div>
                                            <!-- </div> -->
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
            // "Created At",
            "Category Name",
            "Parent Category",
            "Status",
            "Edit"
        );
        var sortThArray = Array(
            "name",
            "parent_id",
            "deleted"
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

            pagingCallBack(pageNumber, loadSearch);
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#addProduct').click(function() {
                $.redirect("addCategoryDetails.php");
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

            $('#seeAllBtn').click(function() {
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = "searchForm";
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getCategoryInventory",
                    searchData  : searchData,
                    pageNumber  : 1,
                    seeAll      : 1
                };

                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#exportBtn').click(function () {
                var searchId = 'searchForm';
                var searchData = buildSearchDataByType(searchId);
                var selected = $('.typeRadio:checked').val();
                var catType = selected.charAt(0).toUpperCase() + selected.slice(1);
                var thArray  = Array (
                    // "Created At",
                    "Category Name",
                    "Parent Category",
                    "Status"
                );

                var key = Array(
                    // 'createdAt',
                    'display',
                    'parent_category',
                    'statusDisplay'
                );

                var formData = {
                    command: "getCategoryInventory",
                    filename: catType+"CategoryListingReport",
                    searchData: searchData,
                    header: thArray,
                    key: key,
                    DataKey: "categoryList",
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
                command     : "getCategoryInventory",
                pageNumber  : pageNumber,
                searchData  : searchData,
                sortData    : sortData
            }; console.log(formData)

            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            if (data.totalPage > 1) {
                $("#seeAllBtn").show();
            } else {
                $("#seeAllBtn").hide();
            }

            if (data) {
                $("#exportBtn").show();
            } else {
                $("#exportBtn").hide();
            }

            $('#basicwizard').show();
            $('.cateTab').show();

            var sortArray = {
                'sortThArray'   : sortThArray,
                'sortBy'        : data['sortBy'],
            }

            var tableNo;
            var list = data.categoryList;
            if(list) {
                var newList = [];
                // var j = 0;

                $.each(list, function(k, v) {

                    var buildBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="m-t-5 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    var rebuildData = {
                        // created_at : v['createdAt'],
                        display : v['name'],
                        parentCategory : v['parent_category'],
                        statusDisplay : v['statusDisplay'],
                        buildBtn : buildBtn
                    };
                    // ++j;
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('thead tr').each(function () {
                $(this).find('th:nth-child(2)').css('text-align', "center");
                $(this).find('th:last').css('text-align', "center");
            });

            $('#' + tableId).find('tbody tr').each(function () {
                $(this).find('td:nth-child(2)').css('text-align', "center");
                $(this).find('td:last').css('text-align', "center");
            });
        }

        function editRecord(id) {
            $.redirect('editCategoryDetails.php', {
                id : id
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