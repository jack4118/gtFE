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
                        <span style="color: black; font-size: 20px; margin-right: auto;">Admin</span>
                        <div id="searchForm" class="form-inline search">
                            <div class="input-container">
                                <input id="searchBtn" type="text" placeholder="Search..." class="searchview_input">
                                <button id="searchIcon" class="fa fa-search"></button>
                                <ul class="searchview_opt" id="selType">
                                    <li name="search-option" value="Full Name"    dataName="adminFullName"      dataType="text">Search <em>Full Name</em></li>
                                    <li name="search-option" value="Username"     dataName="adminUsername"  dataType="text">Search <em>Username</em></li>
                                    <li name="search-option" value="Email"        dataName="adminEmail"     dataType="text">Search <em>Email</em></li>
                                    <li name="search-option" value="Created Date" dataName="adminCreatedAt" dataType="dateRange">Search <em>Created Date</em></li>
                                    <li name="search-option" value="Status"       dataName="adminDisabled"  dataType="text">Search <em>Status</em></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-b-5">
                    <div class="col-lg-12">
                        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; height: 70px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <button id="addAEbutton" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;">
                                    <span style="display: inline-block; margin-right: 5px;">
                                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                    </span>
                                    Create
                                </button>
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00103'][$language]; /* Email */ ?>',
        '<?php echo $translations['A00110'][$language]; /* Role Name */ ?>',
        '<?php echo $translations['A01739'][$language]; /* Warehouse */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
        '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
        '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>'
        );

    var sortThArray  = Array(
        'id',
        'adminFullName',
        'adminUsername',
        'adminEmail',
        'adminRoleName',
        '',
        'adminDisabled',
        'adminCreatedAt',
        'adminLastLogin',
        );

    var searchId = 'searchForm';

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
    var dataForm        =[];         


    var inputField = document.getElementById("searchBtn");

        $(document).ready(function() {
            pagingCallBack(pageNumber, loadSearch);

            $('#searchIcon').click(function() {
                if($("#searchIcon").hasClass("fa fa-times")){
                    $("#searchBtn").val("");
                    $(".searchview_opt").css("display", "none");
                    $("#searchIcon").removeClass("fa fa-times");
                    $("#searchIcon").addClass("fa fa-search");
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

            // if (dataType === "dateRange") {
            //     if (dataValue) {
            //         dataValue = dateToTimestamp(dataValue);
            //     } else {
            //         dataValue = 0;
            //     }
            // }

            dataForm = [];
            dataForm.push({dataName : dataName, dataType : dataType, dataValue : dataValue});
            pagingCallBack(pageNumber, loadSearch, dataForm);
        });

        $('#searchBtn').on('keyup', function(event) {            
            if (event.key === "Enter") {
                event.preventDefault(); 
                var dataName = "adminFullName";
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

        // $("body").keyup(function(event) {
        //     if (event.keyCode == 13) {
        //         $("#searchBtn").click();
        //     }
        // });

        // $('#resetBtn').click(function() {
        //         $('#alertMsg').removeClass('alert-success').html('').hide();
        //         $('#searchForm').find('input').each(function() {
        //             $(this).val(''); 
        //         });
        //         $('#searchForm').find('select').each(function() {
        //             $(this).val('');
        //             $("#searchForm")[0].reset();
        //         });

        //     });

        $('#addAEbutton').click(function () {
            aeType = "add";
            $.redirect("editAdmin.php", {aeType, aeType})
        });

        $(document).on("click", "#listingTable td", function(e) {
            if (!$(this).is(':first-child')) {
                $.redirect("editAdmin.php", {
                    id: $(this).parent().data('th'),
                });
            }
        });
            pagingCallBack(pageNumber, loadSearch);

            $('#searchBtn').click(function() {
            }); 
        });

    function pagingCallBack(pageNumber, fCallback, dataForm){
        if(pageNumber > 1) bypassLoading = 1;
        var searchData = dataForm;
        var sortData = getSortData(tableId);
        console.log (sortData);
        var formData   = {
            command         : "getAdminList",
            pageNumber      : pageNumber,
            inputData       : searchData,
            sortData        : sortData,
            module          : 'warehouse',
            permissionType  : 'filter',
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        var adminList = data.getAdminlist;

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }

        if (data != "" && data.adminList.length > 0) {
            var newTable = [];

            $.each(data.adminList, function(k, v) {

                var rebuildData = {
                    id            : v['id'],
                    name          : v['name'],
                    username      : v['username'],
                    email         : v['email'],
                    roleName      : v['roleName'],
                    warehouse     : v['warehouse_location'],
                    disabled      : v['disabled'],
                    createdAt     : v['createdAt'],
                    lastLogin     : v['lastLogin'],
                };
                newTable.push(rebuildData);
            });
        }
        buildTable(newTable, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        addColumn(tableId);
        paginationv2(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data != "" && newTable.length > 0) {
            var tables = document.getElementsByTagName('table');
            resizableGrid(tables[0]);
        }

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align','center');
            
        });

        $('#' + tableId).find('tbody tr td:nth-child(7)').click(function() {
            tableBtnClick(editId, role);
        });

        $('th:nth-child(2), td:nth-child(2)').hide();
        $('.searchview_opt').css('display', 'none');

    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html(
            '<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function addColumn(tableId) {
        var rows = $('#' + tableId + ' tr');
        
        for (var i = 0; i < rows.length; i++) {
            var checkbox = $('<input />', {
                type: 'checkbox',
                id: 'chk' + i,
                value: 'myvalue' + i,
                class: 'larger-checkbox',
            });
            if(i == 0){
                checkbox.wrap('<th style="width : 12px !important;"></th>').parent().prependTo(rows[i]);
            }
            else{
                checkbox.wrap('<td style="width : 12px !important; cursor: default !important;"></td>').parent().prependTo(rows[i]);
            }
        }
        $("#chk0").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            var role = tableRow.find('td:eq(4)').text();
            $.redirect("editAdmin.php",{id: editId, role : role});
        }
    }



</script>
</body>
</html>
