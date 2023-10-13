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
                    <div class="row m-b-5">
                        <div class="col-lg-12" style="display: flex; align-items: center; justify-content: space-between;">
                            <span style="color: black; font-size: 20px; margin-right: auto;">Package</span>
                            <div id="searchForm" class="form-inline search">
                                <div class="input-container">
                                    <input id="searchBtn" type="text" placeholder="Search..." class="searchview_input">
                                    <button id="searchIcon" class="fa fa-search"></button>
                                    <ul class="searchview_opt" id="selType">
                                        <li name="search-option" value="SKU Code" dataName="code" dataType="text">Search <em>SKU Code</em></li>
                                        <li name="search-option" value="Package Name" dataName="productName" dataType="text">Search <em>Package Name</em></li>
                                        <li name="search-option" value="Category" dataName="category" dataType="text">Search <em>Category</em></li>
                                        <li name="search-option" value="Sale Price" dataName="salePrice" dataType="text">Search <em>Sale Price</em></li>
                                        <li name="search-option" value="Publish" dataName="isPublish" dataType="text">Search <em>Publish</em></li>
                                        <li name="search-option" value="Archive" dataName="isArchive" dataType="text">Search <em>Archive</em></li>
                                        <li name="search-option" value="Vendor Name" dataName="vendorName" dataType="text">Search <em>Vendor Name</em></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-5">
                        <div class="col-lg-12 productList-buttonGrp">
                            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; height: 70px;">
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <button id="addPackage" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;">
                                        <span style="display: inline-block; margin-right: 5px;">
                                            <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                        </span>
                                        Create
                                    </button>

                                    <button id="exportBtn" style="padding: 5px 10px; background: white; border: 1px solid #ccc;">
                                        <span style="display: inline-block; color: black;">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </span>
                                    </button>

                                    <button id="printButton" style="padding: 5px 10px; background: white; border: 1px solid #ccc; color: black;">
                                        <span style="display: inline-block; margin-right: 5px;">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </span>
                                        Print
                                    </button>

                                    <div class="btn-group">
                                        <button type="button" class="btn custom-button1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span><i class="fa fa-cog" aria-hidden="true"></i></span> Action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu">
                                            <a class="dropdown-item custom-dropdown-item" id="archiveBtn">
                                                <div class="text-center">Archive</div>
                                            </a>
                                            <a class="dropdown-item custom-dropdown-item" id="unArchiveBtn">
                                                <div class="text-center">Unarchive</div>
                                            </a>
                                            <a class="dropdown-item custom-dropdown-item" id="publishBtn">
                                                <div class="text-center">publish</div>
                                            </a>
                                            <a class="dropdown-item custom-dropdown-item" id="unPublishBtn">
                                                <div class="text-center">Unpublish</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="paginationContainer" style="display: flex; align-items: center; margin-right: 10px;">
                                    <span id="paginateText" style="display: inline-block; margin-right: 7px; font-size:10px; color: black;"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerList"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="listingDiv" class="table-responsive verticalTable"></div>
                                    </div>
                                </div>
                            </form>
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
            "check",
            "Image",
            "SKU Code",
            "Package Name",
            "Category",
            "Sale Price",
            "Mystery Food Quantity",
            "Publish Status",
            "Vendor Name",
        );
        var sortThArray = Array(
            "",
            "",
            "p.barcode",
            "p.name",
            "p.categ_id",
            "p.sale_price",
            "",
            "p.is_published"
        );
            
        //View Details Table
        var divIdDetails = 'listingDivDetails';
        var tableIdDetails = 'listingTableDetails';
        var pagerIdDetails = 'listingPagerDetails';
        var btnArrayDetails = {};

        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 
        var vendorName = '<?php echo $_POST['vendorName'] ?>';
        var maxPageNumber;

        var inputField = document.getElementById("searchBtn");
        $(document).ready(function() {
            $('#vendorName').val(vendorName);

            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchBtn").click();
                }
            });

            $('#searchIcon').click(function() {
                if ($("#searchIcon").hasClass("fa fa-times")) {
                    $("#searchBtn").val(""); 
                    $(".searchview_opt").css("display", "none");
                    $("#searchIcon").removeClass("fa fa-times");
                    $("#searchIcon").addClass("fa fa-search");
                    var inputValue = '';
                    $('.searchview_opt li').each(function() {
                        var dataNameAttribute = $(this).attr("value");
                        $(this).html(`Search <em>${dataNameAttribute}</em> ${inputValue}`);
                    });

                    pagingCallBack(pageNumber, loadSearch);
                }
            });
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });

            pagingCallBack(pageNumber, loadSearch);

            $(document).on('click', function (event) {
                var $inputContainer = $('.input-container');
                var $searchOptions = $('.searchview_opt');

                if (!$inputContainer.is(event.target) && $inputContainer.has(event.target).length === 0) {
                    $(".searchview_opt").css("display", "none");
                }else{
                    $(".searchview_opt").css("display", "block");
                }
            });

            $('#searchBtn').on('keyup', function() {
                var inputValue = $(this).val();
                var searchview_opt = $('.searchview_opt');

                $('.searchview_opt li').each(function() {
                    var dataNameAttribute = $(this).attr("value");
                    $(this).html(`Search <em>${dataNameAttribute}</em> ${inputValue}`);
                });

                if (inputValue !== "") {
                    $('.searchview_opt').css('display', 'block');
                    $("#searchIcon").removeClass("fa fa-search");
                    $("#searchIcon").removeClass("fa-times fa");
                    $("#searchIcon").addClass("fa fa-times");
                } else {
                    $('.searchview_opt').css('display', 'none');
                    $("#searchIcon").removeClass("fa fa-times");
                    $("#searchIcon").addClass("fa fa-search");
                }

            });

            $('#selType li').on('click', function () {
                var dataName = $(this).attr('dataName'); 
                var dataType = $(this).attr('dataType');
                var dataValue = inputField.value;

                $('#searchBtn').attr('dataName', dataName);

                if (dataType === "dateRange") {
                    if (dataValue) {
                        dataValue = dateToTimestamp(dataValue);
                    } else {
                        dataValue = 0;
                    }
                }

                dataForm = [];
                dataForm.push({dataName : dataName, dataType : dataType, dataValue : dataValue});
                pagingCallBack(pageNumber, loadSearch, dataForm);
            });

            $('#searchBtn').on('keyup', function(event) {            
                if (event.key === "Enter") {
                    event.preventDefault(); 
                    var dataName = "code";
                    var dataType = "text";
                    var dataValue = $(this).val();
                    if (dataValue.trim() !== "") {
                        dataForm = [];
                        dataForm.push({ dataName: dataName, dataType: dataType, dataValue: dataValue });
                        pagingCallBack(pageNumber, loadSearch, dataForm);
                    }
                }
            });

            $('#addPackage').click(function() {
                var actionType = "add";
                $.redirect("package.php", {actionType, actionType})
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

            $(document).on("click", "#listingTable td", function(e) {
                if (!$(this).is(':first-child')) {
                    $.redirect("package.php", {
                        packageID: $(this).parent().data('th'),
                    });
                }
            });
        });

        function pagingCallBack(pageNumber, fCallback, dataForm) {
            if ((pageNumber == 1 || pageNumber <= maxPageNumber) && pageNumber != 0) {

                if(pageNumber > 1) bypassLoading = 1;

                var searchID = "searchForm";
                var searchData = dataForm;
                
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
            else
            {
                pageNumber = maxPageNumber;
            }
        }

        function pagination(pagerId, pageNumber, totalPage, totalRecord, numRecord) {
            if (!isNaN(pageNumber)) {

                var pager = $('#'+pagerId);
                var endRow = pageNumber * numRecord;
                var startRow = endRow - numRecord + 1;
            
                var pagerSize = 10;
                var pagerLeftInterval = 4;
                var pagerRightInterval = 4;
                
                var spanText = pager.parent('div').prev();
                spanText.html('');
                pager.find('li').remove();
                if(!totalPage) return;

                if (endRow > totalRecord)
                    endRow = totalRecord;

                var paginateMsg = "%%from%%-%%to%% / %%total%%";
                
                var findText = ['%%from%%', '%%to%%', '%%total%%'];
                var replaceText = [startRow, endRow, totalRecord];
                
                $.each(findText, function(k, val) {
                    paginateMsg = paginateMsg.replace(val, replaceText[k], paginateMsg);
                });
            
                spanText.html(paginateMsg);

                if(pagerSize > totalPage) {
                    pagerSize = totalPage;
                }

                if(pageNumber >= 1) {
                    pager.append('<li class="link"><a href="#" class="prevLink"><i class="fa fa-angle-left"></i></a></li>');
                }
                var curr = 0;
                while(totalPage > curr && totalPage > 1) {
                    pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
                    $('.pageLink').hide();
                    curr++;
                }
                if(pageNumber <= totalPage) {
                    pager.append('<li class="link"><a href="#" class="nextLink"><i class="fa fa-angle-right"></a></li>');
                }
            
                function paginateNum(pageNum) {
                    pager.find('li').not('.link').hide();
                    pageNum-=1;
                    var pagerMin = pageNum - pagerLeftInterval;
                    var pagerMax = pageNum + pagerRightInterval;
                    if(pagerMin < 0) {
                        pagerMin = 0;
                        pagerMax = pagerSize;
                    }
                    pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
                }
                
                var eq = parseInt(pageNumber)-1;

                pager.find('li').not('.link').eq(eq).addClass("active");
                paginateNum(parseInt(pageNumber));

                if (totalPage > 1) {
                    var dataName = $('#searchBtn').attr('dataName');
                    var dataType = 'text'
                    var dataValue = inputField.value;

                    if (dataType === "dateRange") {
                        if (dataValue) {
                            dataValue = dateToTimestamp(dataValue);
                        } else {
                            dataValue = 0;
                        }
                    }
                    dataForm = [];
                    if(dataName != null)
                    {
                        dataForm.push({dataName : dataName, dataType : dataType, dataValue : dataValue});
                    }

                    pager.find('.prevLink').click(function () {
                        var pageNum = parseInt(pager.find('li.active a').text()) - 1;
                        goPage(pageNum, dataForm);
                    });
                    if(pageNumber != totalPage)
                    {
                        pager.find('.nextLink').click(function () {
                            var pageNum = parseInt(pager.find('li.active a').text()) + 1;
                            if(dataForm.length > 0)
                            {
                                goPage(pageNum, dataForm);
                            }
                            else
                            {
                                goPage(pageNum);
                            }
                        });
                    }
                } else {
                    // Disable prevLink and nextLink when totalPage is one
                    pager.find('.prevLink').addClass('disabled');
                    pager.find('.nextLink').addClass('disabled');
                }
                
                function goPage(pageNum, dataForm) {
                    var searchData = dataForm;

                    paginateNum(pageNum);
                    pager.children().removeClass("active");
                    pager.children().eq(pageNum+1).addClass("active");
                    pagingCallBack(pageNum, '', searchData);
                }
            }
            else
            {
                pageNumber = maxPageNumber;
            }
        }
        
        function loadDefaultListing(data, message) {

            if(data.totalPage)
            {
                maxPageNumber = data.totalPage;
            }

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

                    var checkbox = "<input name ='checkbox' type ='checkbox'>";

                    var rebuildData = {
                        checkdate              : checkbox,
                        productImage           : v['productImage'],
                        skuCode                : v['skuCode'],
                        name                   : v['name'],
                        category               : v['categoryDisplay'],
                        salePrice              : addCommas(v['salePrice']),
                        mysteryFoodQuantity    : v['mysteryFoodQuantity'],
                        publishStatus          : v['publishStatus'],
                        vendorName             : v['vendorName'],
                    };

                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            if (data != "" && list.length > 0) {
                var tables = document.getElementsByTagName('table');
                resizableGrid(tables[0]);
            }
            if(list) {
                $.each(list, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
                });      
            }

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('td:eq(3)').css('text-align', "right");
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "center");
            });

            $('.searchview_opt').css('display', 'none');
        }

        function editPackage(packageID) {
            $.redirect('package.php', {
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

        $('#archiveBtn').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if (checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {

                var formData = {
                    command: 'updateBatchProduct',
                    checkedIDs: checkedIDs,
                    status: 'Archive',
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#unArchiveBtn').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if (checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {

                var formData = {
                    command: 'updateBatchProduct',
                    checkedIDs: checkedIDs,
                    status: 'Unarchive',
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#unPublishBtn').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if (checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {

                var formData = {
                    command: 'updateBatchProduct',
                    checkedIDs: checkedIDs,
                    status: 'Unpublish',
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#publishBtn').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if (checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {

                var formData = {
                    command: 'updateBatchProduct',
                    checkedIDs: checkedIDs,
                    status: 'Publish',
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        function updateCallback(data, message) {
            showMessage('<span data-lang="A00616"><?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?></span>', 'success', '<span data-lang="A00617"><?php echo $translations['A00617'][$language]; /* Update Status */ ?></span>', 'edit', 'getPackageList.php');
        }
    </script>
</body>
</html>