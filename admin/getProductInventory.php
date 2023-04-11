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
                                                        <label class="control-label">
                                                            Product Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="productName" dataType="text">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A00318'][$language]; /* Status */?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="active">
                                                                Active
                                                            </option>
                                                            <option value="inactive">
                                                                Inactive
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            Code
                                                        </label>
                                                        <input id="" type="text" class="form-control" dataName="code" dataType="text">
                                                    </div>

                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            Category
                                                        </label>
                                                        <select class="form-control" dataName="category" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>

                                                            <?php foreach($_SESSION["productCategoryList"] as $category){ ?>
                                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['display']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div> -->
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
                                    Add Product
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

    <div class="modal stick-up" id="viewModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="pg-close fs-14"></i>
                        </button>
                        <h3>
                           Total Sales
                       </h3>
                   </div>
                   <div class="modal-body">
                        <div id="" class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                        <form>
                                            <div id="basicwizardDetails" class="pull-in" style="display: none">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsgDetails" class="text-center alert" style="display: none;"></div>
                                                    <div id="listingDivDetails" class="table-responsive"></div>
                                                    <span id="paginateTextDetails"></span>
                                                    <div class="text-center">
                                                        <ul class="pagination pagination-md" id="listingPagerDetails"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            "Created Date",
            "SKU Code",
            "Product Name",
            "Status",
            "Product Type",
            "Description",
            "Cost",
            "Sale Price",
            "Cooking Time",
            "Cooking Suggestion",
            "Full Instruction",
            "Full Instruction 2",
            "Vendor Name",
            "Category",
            "Expired Day",
            // "Weight",
            // "Price",
            // "Total Stock",
            // "No. of Stock Sold",
            // "Stock Balance",
            // "Updater ID",
            "Updated At",
            "Edit",
            // "Add Stock",
            // "View Stock",
            // "View Transaction"
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

        // var saveProductID=[];
        var saveData = {};

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

            $('#addProduct').click(function() {
                $.redirect("addProductInventory.php");
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
                    command     : "getProductInventory",
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
                    "SKU Code",
                    "Product Name",
                    // "Description",
                    "Category",
                    // "Weight",
                    // "Price",
                    // "Total Stock",
                    // "No. of Stock Sold",
                    // "Stock Balance",
                    "Status",
                    // "Updater ID",
                    "Updated At"
                );
                var key = Array(
                    'created_at',
                    'skuCode',
                    'name',
                    // 'description',
                    'categoryDisplay',
                    // 'weight',
                    // 'productCost',
                    // 'totalStock',
                    // 'totalStockOut',
                    // 'quantity',
                    'status',
                    // 'updater_id',
                    'updated_at'
                );

                var formData = {
                    command: "getProductInventory",
                    filename: "ProductInventoryReport",
                    searchData: searchData,
                    header: thArray,
                    key: key,
                    DataKey: "productInventory",
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
                    command     : "getProductInventory",
                    searchData  : searchData,
                    pageNumber  : pageNumber
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        /*function pagingCallBackModal(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = "searchForm";
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getPortfolioListQuickView",
                    productID   : saveProductID,
                    pageNumber  : pageNumber
                };
                if(!fCallback)
                    fCallback = loadSaleDetails;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }*/
        
        function loadDefaultListing(data, message) {
            if (data) {
                $("#exportBtn, #seeAllBtn").show();
            } else {
                $("#exportBtn, #seeAllBtn").hide();
            }

            $('#basicwizard').show();
            var tableNo;
            saveData = data.productInventory;
            if(saveData) {
                var newList = [];

                $.each(saveData, function(k, v) {

                    var buildBtn = `
                        <a data-toggle="tooltip" title="" onclick="editRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                    /*if(v['totalSales'] > 0){
                        var viewBtn = `
                            <a href="javascript:;" onclick="viewModal('${v['id']}')" class="tableMenu">${addCommas(Number(v['totalSales']).toFixed(2))}</a>
                        `;
                    }else{
                        var viewBtn = `${addCommas(Number(v['totalSales']).toFixed(2))}`;
                    }*/

                    var adjustBtn = `-`;
                    if (v['isAdjustable'] == 1) {
                        adjustBtn = `
                            <a data-toggle="tooltip" title="" onclick="addProductStock('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Add Product Stock" aria-describedby="tooltip645115"><i class="fa fa-wrench"></i></a>
                        `;
                    } else {
                        adjustBtn = `-`;
                    }

                    var viewStockBtn = `
                        <a data-toggle="tooltip" title="" onclick="viewStock('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View Stock" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                    `;

                    var viewTransBtn = `
                        <a data-toggle="tooltip" title="" onclick="viewRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View Transaction" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                    `;

                    /*var dropClass = "dropdown";
                    if(k==list.length-1 || k==list.length-2) {
                        dropClass = "dropup";
                    }

                    var buildStatusDropdown = `
                        <div class="${dropClass}">
                            <a href="javascript:;" data-toggle="dropdown" class="tableMenu">${v['statusDisplay']}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:;" onclick="changeStatus('${v['id']}', 'On Sale')">On Sale</a></li>
                                <li><a href="javascript:;" onclick="changeStatus('${v['id']}', 'Sold Out')">Sold Out</a></li>
                                <li><a href="javascript:;" onclick="changeStatus('${v['id']}', 'Close')">Close</a></li>
                            </div>
                        </div>
                    `;*/

                    var rebuildData = {
                        created_at          : v['created_at'],
                        code                : v['skuCode'],
                        name                : v['name'],
                        status              : v['status'],
                        productType         : v['productType'],
                        description         : v['description'],
                        cost                : numberThousand(v['cost'], 2),
                        salePrice           : numberThousand(v['salePrice'], 2),
                        cookingTime         : v['cookingTime'],
                        cookingSuggestion   : v['cookingSuggestion'],
                        fullInstruction     : v['fullInstruction'],
                        fullInstruction2    : v['fullInstruction2'],
                        vendorName          : v['vendorName'],
                        category            : v['categoryDisplay'],
                        expiredDay          : v['expiredDay'],
                        // weight              : addCommas(v['weight']),
                        // productCost      : numberThousand(v['productCost'], 2),
                        // totalStock          : numberThousand(v['totalStock'], 0),
                        // totalStockOut       : numberThousand(v['totalStockOut'], 0),
                        // quantity            : numberThousand(v['quantity'], 0),
                        // updater_id          : v['updater_id'],
                        updated_at          : v['updated_at'],
                        // status           : buildStatusDropdown,
                        buildBtn            : buildBtn,
                        // adjustBtn           : adjustBtn,
                        // viewStockBtn        : viewStockBtn,
                        // viewTransBtn        : viewTransBtn
                    };
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).find('tbody tr, thead tr').each(function () {
                // $(this).find('td:last-child, th:last-child').css('text-align', "center");
                // $(this).find('td:eq(-2), th:eq(-2)').css('text-align', "center");
                // $(this).find('td:eq(-3), th:eq(-3)').css('text-align', "center");
                // $(this).find('td:eq(-4), th:eq(-4)').css('text-align', "center");
                // $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
                // $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
                $(this).find('td:eq(6)').css('text-align', "right");
                $(this).find('td:eq(7)').css('text-align', "right");
            });
        }

        /*function changeStatus(id, status) {
            var formData  = {
                command         : 'editProductInventory',
                productID       : id,
                status          : status,
                updateType      : "subscriptionStatus"
            };

            // console.log(formData);

            fCallback = changeStatusSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }*/

        function editRecord(id) {
            $.redirect('editProductInventory.php', {
                id : id
            });
        }
        
        function addProductStock(invProductID) {
            $.redirect('invProductAdjustment.php', {
                invProductID : invProductID
            });
        }

        function viewStock(invProductID) {
            $.redirect('invStockDetail.php', {
                invProductID : invProductID
            });
        }

        function viewRecord(invProductID) {
            $.redirect('invProductTransaction.php', {
                invProductID : invProductID
            });
        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }
        
        /*function changeStatusSuccess(data, message) {
            pagingCallBack(pageNumber)
        }*/

        /*function viewModal(id) {

            var formData = {
                command  : "getPortfolioListQuickView",
                productID  : [id]
            };

            fCallback = loadSaleDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }*/

        /*function loadSaleDetails(data, message) {
            
            $("#basicwizardDetails").show();
            $("#viewModal").modal();

            var tableNo;

            if (data.portfolioList) {
            var newList = [];
                $.each(data.portfolioList, function (k, v) {
                    var rebuildData = {
                        created_at: v['created_at'],
                        reference_no: v['reference_no'],
                        username: v['username'],
                        tibSubscribed: numberThousand(v['tibSubscribed'], 6),
                        filTib: v['filTib'],
                        product_price: numberThousand(v['product_price'], 6)

                    };
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableIdDetails, divIdDetails, thArrayDetails, btnArrayDetails, message, tableNo);
            pagination(pagerIdDetails, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableIdDetails).find('tr').each(function () {
                $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
                $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
                $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
            });

            $('#' + tableIdDetails).find('tbody').append(`
                <tr style="">
                    <td colspan='3' class="text-right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</b></td>
                    <td style="text-align: right;"><b> ${numberThousand(data.grandTotal,6)} </b></td>
                    <td colspan='2'></td>
                </tr>
            `);
        }*/
    </script>
</body>
</html>