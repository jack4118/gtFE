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
                <div class="row m-b-5">
                    <div class="col-lg-12" style="display: flex; align-items: center; justify-content: space-between;">
                        <span style="color: black; font-size: 20px; margin-right: auto;">Sales Order</span>
                        <div id="searchForm" class="form-inline search">
                            <div class="tag-container" id="tagContainer"></div>
                                <div class="input-container">
                                    <input id="searchBtn" type="text" placeholder="Search..." class="searchview_input">
                                    <button id="searchIcon" class="fa fa-search"></button>
                                    <ul class="searchview_opt" id="selType">
                                        <li name="search-option" value="SO NO" dataName="soNumber" dataType="text">Search <em>SO NO</em></li>
                                        <li name="search-option" value="Customer Name" dataName="fullname" dataType="like">Search <em>Customer Name</em></li>
                                        <li name="search-option" value="Mobile Number" dataName="mobileNumber" dataType="text">Search <em>Mobile Number</em></li>
                                        <li name="search-option" value="Payment Method" dataName="payment_method" dataType="text">Search <em>Payment Method</em></li>
                                        <li name="search-option" value="Delivery Method" dataName="deliveryOption" dataType="text">Search <em>Delivery Method</em></li>
                                        <li name="search-option" value="Status" dataName="status" dataType="text">Search <em>Status</em></li>
                                        <li name="search-option" value="Total Amount" dataName="totalAmount" dataType="text">Search <em>Total Amount</em></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-b-5">
                <div class="col-lg-12">
                    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; height: 70px;">
                        <div style="display: flex; align-items: center; margin-bottom: 10px;">
                            <button id="addSObutton" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;">
                                <span style="display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                </span>
                                Create
                            </button>

                            <div class="btn-group" style="display: none">
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
                                <ul class="pagination justify-content-end" id="pagerInvoiceList"></ul>
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
                            <div id="invoiceListDiv" class="table-responsive"></div>
                            <span id="paginateText"></span>
                            <div class="text-center">
                                <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
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
<?php
    $adminUsername   = $_SESSION['username'];
    $adminID         = $_SESSION['userID'];
    $adminSession    = $_SESSION['sessionID'];
?>
<script>

    var url       = 'scripts/reqDefault.php';
    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};// Array('view');
    var thArray  = Array (
        "SO NO",
        "Order Date",
        "Customer Name",
        "Mobile Number",
        "Payment Method",
        "Delivery Method",
        "Status",
        "Total Amount",
    );

    var sortThArray = Array(
        "so_no",
        "created_at",
        "billing_name",
        "billing_phone",
        "payment_method",
        "delivery_method",
        "status",
        "payment_amount"
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
    var dataForm = [];
    var multiSearchForm = [];
    var maxPageNumber;

    var inputField = document.getElementById("searchBtn");
    $(document).ready(function() {

        const tagContainer = document.getElementById('tagContainer');
        const searchInput = document.getElementById('searchBtn');

        const searchOptions = document.querySelectorAll('[name="search-option"]');
        searchOptions.forEach(option => {
            option.addEventListener('click', () => {
                const dataName = option.getAttribute('dataName');
                const dataType = option.getAttribute('dataType');
                const dataValue = searchInput.value.trim();
                if (dataValue !== '') {
                    createTag(dataName, dataType, dataValue);
                    // searchInput.value = ''; 
                }
            });
        });

        document.getElementById('searchIcon').addEventListener('click', () => {
            const inputValue = searchInput.value.trim();
            if (inputValue !== '') {
                createTag('Custom Tag', '',inputValue);
                searchInput.value = ''; 
            }
        });

        searchInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault(); 
                const inputValue = searchInput.value.trim();
                var dataName = "soNumber";
                var dataType = "text";
                if (inputValue.trim() !== "") {
                    dataForm = [];
                    searchInput.value = ''; 
                    createTag(dataName, dataType, inputValue);
                    pagingCallBack(pageNumber, loadSearch, dataForm);
                }
            }
        });

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchInvoiceBtn").click();
            }
        });

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
                multiSearchForm = [];
                clearTagsAndForm();
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
            $('#searchBtn').val('');
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

        // $('#searchBtn').on('keyup', function(event) {            
        //     if (event.key === "Enter") {
        //         event.preventDefault(); 
        //         var dataName = "refNo";
        //         var dataType = "text";
        //         var dataValue = $(this).val();
        //         if (dataValue.trim() !== "") {
        //             dataForm = [];
        //             dataForm.push({ dataName: dataName, dataType: dataType, dataValue: dataValue });
        //             pagingCallBack(pageNumber, loadSearch, dataForm);
        //         }
        //     }
        // });

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

        $('#searchInvoiceBtn').click(function() {
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
                "SO ID",
                "SO NO",
                "Order Date",
                // "Invoice Number",
                // "DO Number",
                "Customer Name",
                // "Member ID",
                "Mobile Number",
                "Payment Method",
                "Delivery Method",
                "Status",
                "Total Amount"
            );

            var key = Array(
                'poNumber',
                'sono',
                'created_at',
                // 'invoiceNumber',
                // 'DONumber',
                'fullname',
                // 'memberID',
                'username',
                'paymentMethod',
                'deliveryOption',
                'statusDisplay',
                'payment_amount'
            );

            var formData = {
                command: "getPOListing",
                filename: "SalesOrderListingReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "invoiceList",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#addSObutton').click(function () {
            // $.redirect("addSaleOrder.php")
            soType = "add";
            $.redirect("editSaleOrder.php", {soType, soType})
        });

        $(document).on("click", "#invoiceListTable td", function(e) {
            if (!$(this).is(':first-child')) {
                $.redirect("editSaleOrder.php", {
                    id: $(this).parent().data('th'),
                });
            }
        });
    });
    function loadDefaultListing(data, message) {
        data ? $("#exportBtn").show() : $("#exportBtn").hide();
        $('#basicwizard').show();

        if(data.totalPage)
        {
            maxPageNumber = data.totalPage;
        }

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }
        
        if (data.invoiceList) {
    		var newList = [];
            $.each(data.invoiceList, function(k, v) {


                var buildView = `
                    <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['sono'].toString()}', '${v['username']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                `;

                if (v['issueDOAllowed'] == 1) {
                    var issueDO = `
                        <a data-toggle="tooltip" title="" onclick="issueDO(${v['id']})" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Issue DO"><i class="fa fa-edit"></i></a>
                    `;  
                } else  {
                    var issueDO = "-";
                }

                

                // if (v['deliveryOption'] == "delivery" || v['deliveryOption'] == "pickup") {
                //     var viewBtn2 = `
                //         <a data-toggle="tooltip" title="" onclick="goDoDetails(${v['id']})" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>
                //     `;
                // } else {
                //     var viewBtn2 = `-`;
                // }

                var rebuildData = {
                    sono                : v['sono'],
                    created_at          : v['created_at'],
                    fullname            : v['fullname'],
                    memberID            : v['username'],
                    paymentMethod       : v['paymentMethod'],
                    deliveryOption      : v['deliveryOption'],
                    statusDisplay       : v['statusDisplay'],
                    payment_amount      : v['payment_amount'],
                };
                newList.push(rebuildData);
            });
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
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

    function viewDetails(sono, username) {

        var url = '<?php echo $config['loginToMemberURL'] ?>orderStatus?SONO=' + encodeURIComponent(sono)+"&phone="+ encodeURIComponent(username.slice(-4))+"&b=1";
        window.location.href = url;
    }

    function issueDO(id) {
        $.redirect("issueDO.php", {id, id})
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        var status = tableRow.find('td:eq(7)').text();
        var id = tableRow.find('td:eq(0)').text();
        var delivery_method = tableRow.find('td:eq(5)').text();
        var payment_method = tableRow.find('td:eq(4)').text();

        $.redirect("editSaleOrder.php",{id: id, status: status, payment_method: payment_method, delivery_method: delivery_method});
    }

    function pagingCallBack(pageNumber, fCallback, dataForm) {
        if ((pageNumber == 1 || pageNumber <= maxPageNumber) && pageNumber != 0) {
            if (pageNumber > 1) bypassLoading = 1;
            var searchData = dataForm;
            var sortData = getSortData(tableId);
            var formData = {
                command: "getPOListing",
                pageNumber: pageNumber,
                // searchData: searchData,
                searchData  :multiSearchForm,
                sortData    : sortData,
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

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    function createTag(dataName, dataType, dataValue) {
        var reqSearch = {
            dataName: dataName,
            dataType: dataType,
            dataValue: dataValue,
        };
        multiSearchForm.push(reqSearch);
        const value = $('#selType li[dataName="' + dataName + '"]').attr('value');
        const tag = document.createElement('div');
        tag.classList.add('tag');
        tag.textContent = value + ': ' + dataValue;

        const closeBtn = document.createElement('span');
        closeBtn.classList.add('close-btn');
        closeBtn.innerHTML = '&times;'; // Close symbol (X)
        closeBtn.addEventListener('click', () => {
            tag.remove();
            removeTagFromForm(dataName, dataValue);
        });

        tag.appendChild(closeBtn);
        tagContainer.appendChild(tag);
    }

    function removeTagFromForm(dataName, dataValue) {
        const indexToRemove = multiSearchForm.findIndex(tag => tag.dataName === dataName && tag.dataValue === dataValue);
        if (indexToRemove !== -1) {
            multiSearchForm.splice(indexToRemove, 1);
        }
        pagingCallBack(pageNumber, loadSearch, dataForm);
    }

    function clearTagsAndForm() {
        // Clear tags from the UI
        $('#tagContainer').empty();

        // Clear the multiSearchForm array
        multiSearchForm.length = 0;
    }

</script>
</body>
</html>