<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
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
                <div class="row m-b-5">
                    <div class="col-lg-12" style="display: flex; align-items: center; justify-content: space-between;">
                        <span style="color: black; font-size: 20px; margin-right: auto;">Purchase Order</span>
                        <div id="searchForm" class="form-inline search">
                            <div class="input-container">
                                <input id="searchBtn" type="text" placeholder="Search..." class="searchview_input">
                                <button id="searchIcon" class="fa fa-search"></button>
                                <ul class="searchview_opt" id="selType">
                                    <li name="search-option" value="PO No" dataName="refNo" dataType="text">Search <em>PO No</em></li>
                                    <li name="search-option" value="Vendor Name" dataName="name" dataType="text">Search <em>Vendor Name</em></li>
                                    <li name="search-option" value="Purchase Representative" dataName="assignee" dataType="text">Search <em>Purchase Representative</em></li>
                                    <li name="search-option" value="Purchase Date" dataName="buyingDate" dataType="dateRange">Search <em>Purchase Date</em></li>
                                    <li name="search-option" value="Approved By" dataName="approvedBy" dataType="text">Search <em>Approved By</em></li>
                                    <li name="search-option" value="Status" dataName="status" dataType="text">Search <em>Status</em></li>
                                    <li name="search-option" value="Warehouse" dataName="warehouseSearch" dataType="text">Search <em>Warehouse</em></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-b-5">
                    <div class="col-lg-12">
                        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; height: 70px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <button id="addPObutton" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;">
                                    <span style="display: inline-block; margin-right: 5px;">
                                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                    </span>
                                    Create
                                </button>

                                <!-- <button id="downloadbtn" class="bg-white" style="padding: 5px 10px; border: 1px solid #ccc;">
                                    <span style="display: inline-block;">
                                        <i class="fa fa-download" aria-hidden="true" style="color: black;"></i>
                                    </span>
                                </button>

                                <button id="printbtn" class="text-white bg-white" style="display: inline-block; padding: 5px 10px; border: 1px solid #ccc;">
                                    <span style="display: inline-block;">
                                        <i class="fa fa-print" aria-hidden="true" style="color: black;">Print</i>
                                    </span>
                                </button> -->

                                <!-- <div class="dropdown" id="actionContainer" style="position: relative; display: inline-block;">
                                    <button onclick="dropdown()" class="dropbtn">
                                        <span style="display: inline-block;">
                                            <i class="fa fa-cog" aria-hidden="true" style="color: black;">Action</i>
                                        </span>
                                    </button>
                                    <div class="dropdown-content" id="action">
                                        <button id="exportbtn" >
                                            <span style="margin-left: 10px">
                                                <i class="fas fa-share">Export</i>
                                            </span>
                                        </button>
                                        <button id="deletebtn">
                                            <span style="margin-left: 10px">
                                                <i class="fas fa-trash">Delete</i>
                                            </span>
                                        </button>
                                    </div>
                                </div> -->
                                <div class="btn-group">
                                    <button type="button" class="btn custom-button1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span><i class="fa fa-cog" aria-hidden="true"></i></span> Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu">
                                        <a class="dropdown-item custom-dropdown-item" id="deleteBtn">
                                            <div class="text-center">Delete</div>
                                        </a>
                                        <a class="dropdown-item custom-dropdown-item" id="approveBtn">
                                            <div class="text-center">Approve</div>
                                        </a>
                                        <a class="dropdown-item custom-dropdown-item" id="cancelBtn">
                                            <div class="text-center">Cancelled</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="paginationContainer" style="display: flex; align-items: center; margin-right: 10px;">
                                <span id="paginateText" style="display: inline-block; margin-right: 7px; font-size:10px; color: black;"></span>
                                <div class="text-right" style="display: inline-block;">
                                    <ul class="pagination justify-content-end" id="listingPager"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div id="basicwizard" class="pull-in">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv" class="table-responsive"></div>
                                <span id="paginateText"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="listingPager"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script>
var divId = 'listingDiv';
var tableId = 'listingTable';
var pagerId = 'listingPager';
// var btnArray = Array('edit', 'approve');
var btnArray = {};
var thArray = Array(
    'ID',
    'PO No',
    'Vendor Name',
    'Purchase Representative',
    'Purchase Date',
    'Approve By',
    'Total (RM)',
    'Status',
    'Remark',
    'Warehouse',
);

var sortThArray = Array(
    "po.id",
    "po.order_number",
    "v.name",
    "", //assignee
    "po.purchase_date",
    "", //approved by
    "po.total_cost",
    "po.status",
    "po.remarks",
    "w.warehouse_location",
    
);

var searchId = 'searchForm';

var url = 'scripts/reqAdmin.php';
var method = 'POST';
var debug = 0;
var bypassBlocking = 0;
var bypassLoading = 0;
var pageNumber = 1;
var formData = "";
var fCallback = "";
var dataForm = [];
var checkList = [];
var maxPageNumber;

var vendorName = '<?php echo $_POST['vendorName'] ?>';
var inputField = document.getElementById("searchBtn");

    $(document).ready(function() {
        pagingCallBack(pageNumber, loadSearch);

        $('#searchIcon').click(function() {
            if($("#searchIcon").hasClass("fa fa-times")){
                $("#searchBtn").val("");
                $(".searchview_opt").css("display", "none");
                $("#searchIcon").removeClass("fa fa-times");
                $("#searchIcon").addClass("fa fa-search");
                var inputValue = '';
                $('.searchview_opt li').each(function() {
                    var dataNameAttribute = $(this).attr("value");
                    $(this).html(`Search <em>${dataNameAttribute}</em> ${inputValue}`);
                });
                dataForm = [];
                pagingCallBack(pageNumber, loadSearch);
            }
        });

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
                var dataName = "refNo";
                var dataType = "text";
                var dataValue = $(this).val();
                if (dataValue.trim() !== "") {
                    dataForm = [];
                    dataForm.push({ dataName: dataName, dataType: dataType, dataValue: dataValue });
                    pagingCallBack(pageNumber, loadSearch, dataForm);
                }
            }
        });

        // Initialize date picker
        $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
            $(this).val('');
        });

        $('#addPObutton').click(function () {
            poType = "add";
            $.redirect("purchase.php", {poType, poType})
        });

        $(document).on("click", "#listingTable td", function(e) {
            if (!$(this).is(':first-child')) {
                $.redirect("purchase.php", {
                    id: $(this).parent().data('th'),
                });
            }
        });

    });

    function pagingCallBack(pageNumber, fCallback, dataForm) {
        if ((pageNumber == 1 || pageNumber <= maxPageNumber) && pageNumber != 0) {
            if (pageNumber > 1) bypassLoading = 1;
            var searchData = dataForm;
            var sortData = getSortData(tableId);
            var formData = {
                command: "getPurchaseOrderList",
                pageNumber: pageNumber,
                inputData: searchData,
                sortData    : sortData,
                module     : 'warehouse',
                permissionType : 'filter',
            };
            if (!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else
        {
            pageNumber = 1;
            pagingCallBack(pageNumber, fCallback, dataForm);
        }
    }

function loadDefaultListing(data, message) {
    var tableNo;
    if(data.purchaseOrderList)
    {
        var poTable = data.purchaseOrderList;
    }
    else
    {
        var poTable = [];
    }
    if(data.totalPage)
    {
        maxPageNumber = data.totalPage;
    }

    var sortArray = {
        'sortThArray'   : sortThArray,
        'sortBy'        : data['sortBy'],
    }

    if (data != "" && poTable.length > 0) {
        var newPoTable = []

        $.each(poTable, function(k, v) {

            var rebuildData = {
                id            : v['id'],
                order_number  : v['order_number'],
                vendor        : v['vendor'],
                assignee      : v['assignee'],
                buying_date   : v['buying_date'],
                approved_by   : v['approved_by'],
                cost          : v['cost'],
                status        : v['status'],
                remarks       : v['remarks'],
                warehouse     : v['warehouse_location'],
            };
            newPoTable.push(rebuildData);
        });
    }

    buildTable(newPoTable, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
    addColumn(tableId);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    if (data != "" && poTable.length > 0) {
        var tables = document.getElementsByTagName('table');
        resizableGrid(tables[0]);
    }

    $('td:nth-child(8)').addClass('text-right');
    $('th:nth-child(2), td:nth-child(2)').hide();

    $('.searchview_opt').css('display', 'none');

    // hide action button's option if admin dont have permission
    if(data.adminPermission)
    {
        if(data.adminPermission.cancelled != 1)
        {
            document.getElementById('cancelBtn').style.display = 'none';
        }
        else if(data.adminPermission.remove != 1)
        {
            document.getElementById('deleteBtn').style.display = 'none';
        }
        else if(data.adminPermission.approve != 1)
        {
            document.getElementById('approveBtn').style.display = 'none';
        }
    }
}

function confirmPoStatus(id) {
    var formData = {
        command: "approvePurchaseOrder",
        id: id,
        status: 'Confirmed'
    };

    if (fCallback)
        fCallback = loadPurchaseOrderUpdate;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
    loadDefaultListing(data, message);
    $('#searchMsg').addClass('alert-success').html(
        '<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
    setTimeout(function() {
        $('#searchMsg').removeClass('alert-success').html('').hide();
    }, 3000);
}

function loadPurchaseOrderUpdate(result) {
    showMessage('Approved Successfully', 'success', 'Approved Successfully', 'user-plus', 'order.php');

    $('#' + tableId).find('tbody tr').each(function() {
        id = $(this).find('td:eq(0)').text();
        var column = $(this).find('td:eq(6)').children();
        var editBtn = column[1].id;

        if (result.status == "Confirmed" && id == result.id) {
            $('#'.editBtn).attr('onclick', 'return false');
        }
    });
}

    function addColumn(tableId) {
        var rows = $('#' + tableId + ' tr');

        for (var i = 0; i < rows.length; i++) {
            var checkbox = $('<input />', {
                type: 'checkbox',
                id: 'chk' + i,
                value: 'myvalue' + i
            });
            if (i == 0) {
                checkbox.wrap('<th style="width: 12px !important;"></th>').parent().prependTo(rows[i]);
            } else {
                checkbox.wrap('<td style="width: 12px !important; cursor: default !important;"></td>').parent().prependTo(rows[i]);
            }

            checkbox.click(function () {
                var isChecked = $(this).is(':checked');
                var rowId = $(this).closest('tr').attr('data-th');

                if (isChecked) {
                    checkList.push(rowId);
                } else {
                    // Remove the rowId from checkList
                    checkList = checkList.filter(function (item) {
                        return item !== rowId;
                    });
                }
            });
        }

        $("#chk0").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
            checkList = [];
            rows.each(function () {
                var rowId = $(this).attr('data-th');
                checkList.push(rowId);
            });
        });
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
            // spanText.html('Showing ' + startRow + ' - ' + endRow + ' of ' + totalRecord + ' records.');

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
                // dataForm = [];
                if(dataName != null && dataValue != '')
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

            // pager.find('.prevLink').click(function() {
            //     var pageNum = parseInt(pager.find('li.active a').text())-1;
            //     goPage(pageNum);
            // });
            // pager.find('.nextLink').click(function() {
            //     var pageNum = parseInt(pager.find('li.active a').text())+1;
            //     goPage(pageNum);
            // });
            
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
            var pager = $('#'+pagerId);
            var spanText = pager.parent('div').prev();
            spanText.html('');

            pageNumber = maxPageNumber;
            var paginateMsg = "%%from%%%%to%%  %%total%%";
            
            var findText = ['%%from%%', '%%to%%', '%%total%%'];
            var replaceText = ['', '', ''];
            
            $.each(findText, function(k, val) {
                paginateMsg = paginateMsg.replace(val, replaceText[k], paginateMsg);
            });
        
            spanText.html(paginateMsg);
            $('.prevLink').hide();
            $('.nextLink').hide();
        }
    }

    $('#deleteBtn').click(function() {
        var checkedIDs = [];
        var checkedDetails = [];
        $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
            var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
            checkedIDs.push(checkboxID);
        });
        if(checkedIDs.length > 0)
        {
            var formData = {
                command: "poBatchAction",
                checkList: checkedIDs,
                action     : 'delete',
            };
    
            fCallback = loadDeletePurchaseOrder;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else
        {
            showMessage('You must Check at least one row to perform batch action', 'warning', 'Success Update Purchase Order', 'check', '');
        }

    });

    $('#approveBtn').click(function() {
        var checkedIDs = [];
        var checkedDetails = [];
        $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
            var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
            checkedIDs.push(checkboxID);
        });
        if(checkedIDs.length > 0)
        {
            var formData = {
                command: "poBatchAction",
                checkList: checkedIDs,
                action     : 'approved',
            };
    
            fCallback = loadConfirmPurchaseOrder;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else
        {
            showMessage('You must Check at least one row to perform batch action', 'warning', 'Success Update Purchase Order', 'check', '');
        }
    });
    $('#cancelBtn').click(function() {
        showMessage("Confirm Purchase Order Cancellation", 'warning', "Are you sure you want to cancel this purchase order?", '', '', ['Confirm']);
        $('#canvasConfirmBtn').click(function() {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('tbody [type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length > 0)
            {
                var formData = {
                    command: "poBatchAction",
                    checkList: checkedIDs,
                    action     : 'cancelled',
                };
                fCallback = loadCancelledPurchaseOrder;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            else
            {
                showMessage('You must Check at least one row to perform batch action', 'warning', 'Success Update Purchase Order', 'check', '');
            }
        });
    });

    function loadConfirmPurchaseOrder(data, message) {
        showMessage('Purchase Order Has Been Approved', 'success', 'Success Update Purchase Order', 'check', 'order.php'
        );
    }

    function loadDeletePurchaseOrder(data, message) {
        showMessage('Purchase Order Has Been Delete', 'success', 'Success Update Purchase Order', 'check', 'order.php'
        );
    }

    function loadCancelledPurchaseOrder(data, message) {
        showMessage('Purchase Order Has Been Cancelled', 'success', 'Success Update Purchase Order', 'check', 'order.php');
    }
</script>
</body>

</html>