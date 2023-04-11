<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>


<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <?php echo $translations['M03697'][$language]; // New Recruit and Active Program Report ?>
    </div>
    <div class="mt-4">
        <form id="searchDIV" class="filter">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
                    <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
                    <div class="input-daterange input-group" id="datepicker-range">
                        <input id="dateRangeStart" type="text" class="input-sm form-control px-1" name="start" dataType="dateRange" dataName="date" autocomplete="off">
                        <span class="input-group-text px-0"><i class="fas fa-arrow-right"></i></span>
                        <input id="dateRangeEnd" type="text" class="form-control px-1" name="end" dataType="dateRange" autocomplete="off" dataName="date">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 form-group d-flex align-items-center"> 
                    <button id="searchBtn" class="btn btn-primary" type="button" data-lang="M03383"><?php echo $translations['M03383'][$language] /*Search*/ ?></button>
                    <i class="fas fa-sync-alt ml-3 resetBtnStyle" id="resetBtn"></i>
                </div>
            </div>
        </form>
    </div>

    <div class="whiteBg">
        <form>
            <div id="basicwizard" class="pull-in col-12 px-0">
                <div class="tab-content b-0 m-b-0 p-t-0">
                    <div id="alertMsg" class="text-center" style="display: block;"></div>
                    <div id="listingDiv" class="table-responsive"></div>
                    <span id="paginateText"></span>
                    <div class="text-center">
                        <ul class="pagination pagination-md" id="pagerList"></ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<div class="modal fade in" id="reportDetail" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content-wrapper">
            <div class="modal-content" style="overflow-y:scroll;max-height: 85vh">
                <div class="modal-header clearfix text-left">
                    <h5>
                        <?php echo $translations['M03521'][$language]; /* Total Direct Downline */ ?>
                    </h5>
                    <button id="closeModalBtn" type="button" class="close" data-dismiss="modal" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="basicwizard2" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg2" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv2" class="table-responsive"></div>
                                <span id="paginateText2"></span>
                                <div class="text-center2">
                                    <ul class="pagination pagination-md" id="listingPager2"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" onclick="closeModal()"><?php echo $translations['M00112'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'sharejs.php'; ?>

</html>

<script>
var url       = 'scripts/reqDefault.php';
var divId    = 'listingDiv';
var tableId  = 'listingTable';
var pagerId  = 'listingPager';
var divId2    = 'listingDiv2';
var tableId2  = 'listingTable2';
var pagerId2  = 'listingPager2';
var btnArray = {};
var thArray  = Array(
        '<?php echo $translations['M00389'][$language]; /* Date */ ?>',
        '<?php echo $translations['M03433'][$language]; /* From Member ID */ ?>',
        '<?php echo $translations['M00177'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['M01770'][$language]; /* Bonus Payout */ ?>',
    );

var thArray2  = Array(
        '<?php echo $translations['M03433'][$language]; /* From Member ID */ ?>',
        '<?php echo $translations['M00177'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['M03494'][$language]; /* Total PVP */ ?>',
    );

var method         = 'POST';
var debug          = 0;
var bypassBlocking = 0;
var bypassLoading  = 0;
var pageNumber     = 1;

$(document).ready(function() {

    pagingCallBack(pageNumber, loadSearch);

    $("body").keyup(function(event) {
        if (event.keyCode == 13) {
            $("#searchBtn").click();
        }
    });

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

    $('#resetBtn').click(function() {
        $('#alertMsg').removeClass('alert-success').html('').hide();
        $('#searchForm').find('input:not([type=radio])').each(function() {
            $(this).val(''); 
        });
        $('#searchForm').find('select').each(function() {
            $(this).val('');
        });
    });

    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });
    
    $("#reportDetail").on('click',function(event){
        if(!$(event.target).closest('.modal-dialog').length && !$(event.target).is('.modal-dialog')) {
            $("#reportDetail").hide();
        } 
    });
});

function exportBtn() {
    var searchID = 'searchForm';
    var searchData = buildSearchDataByType(searchID);

    var exportParams = {
        searchData  : searchData,
        pageNumber  : pageNumber,
        seeAll      : 1,
        usernameSearchType  : $("input[name=usernameType]:checked").val()
    };

    var key  = Array (
        'date',
        'memberID',
        'fullName',
        'totalPVP',
        'bonusPayout',
        'totalNumberOfDirectDownline',
    );

    var formData = {
        command     : "addExcelReq",
        API         : "getNewRecuitAndActiveProgram",
        fileName    : "NewRecuitAndActiveProgram",
        searchData   : searchData,
        params      : exportParams,
        headerAry   : thArray,
        keyAry      : key,
        titleKey    : "exportArray",
        type        : 'export',
        returnType  : 'excel',
        usernameSearchType : $("input[name=usernameType]:checked").val()
    };

    fCallback = exportExcel;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}


function loadDefaultListing(data, message) {
    $('#basicwizard').show();
   
    var tableNo;
    if(data){
        if(data.data){
            var newList = [];
            $.each(data.data, function(k, v) {
                var action = `
                    <a data-toggle="tooltip" title="" onclick="viewDetails('${v['id']}')" data-original-title="view" aria-describedby="" style="margin:0px 4px 0px 4px;color:blue;text-decoration:underline;">
                        ${v['totalNumberOfDirectDownline']}
                    </a>`;
                    

                var rebuildData = {
                    bonus_date                    : v['bonus_date'],
                    member_id                     : v['member_id'],
                    member_full_name              : v['member_full_name'],
                    bonus_rebate                  : numberThousand(v['bonus_rebate'],2),
                };

                newList.push(rebuildData);
            });
        }
    }
    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord); 
    $('#'+tableId).find('th:eq(1)').css('width', "400px");    
    $('.table').find('th:eq(1)').css('width', "400px");    



    // START DataTables
    $('#'+tableId+' th:nth-child(1)').before('<th></th>');
    $('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');


    $('#'+tableId).DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "language": {
            "zeroRecords": "", 
            "emptyTable": ""
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        buttons: [
        'colvis'
    ],
        columnDefs: [
            { className: 'control', orderable: false, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
            { responsivePriority: 4, targets: 4 },
        ]
    });
}

function closeModal(){
    $('#reportDetail').removeClass("show");
    $("#reportDetail").hide();
}

function viewDetails(id){
    $("#reportDetail").show();
    $('#reportDetail').css({"background":"rgba(0,0,0,0.5)"});
    $('#reportDetail').addClass("show");

    var formData = {
        command     : "getRecruitPromoDetails",
        id          : id
    };
    fCallback = loadData;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadData(data, message) {
    $("#reportDetail").show();
    $('#basicwizard2').show();

    var tableNo;
    var bonusList = data.allRecord;

    if(bonusList) {
        var newList = [];
        $.each(bonusList, function(k, v) {

            var rebuildData = {
                fromMemberID                        : v['fromMemberID'],
                fullname                            : v['fullname'],
                PVP                                 : numberThousand(v['PVP'],2)
            };

            newList.push(rebuildData);
        });
    }

    buildTable(newList, tableId2, divId2, thArray2, btnArray, message, tableNo);
    pagination(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    // START DataTables
    $('#'+tableId2+' th:nth-child(1)').before('<th></th>');
    $('#'+tableId2+' td:nth-child(1)').before('<td style="width:30px;"></td>');


    $('#'+tableId2).DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "language": {
            "zeroRecords": "", 
            "emptyTable": ""
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        buttons: [
        'colvis'
    ],
        columnDefs: [
            { className: 'control', orderable: false, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
        ]
    });    
}

function statusSuccessUpdated(data,message){
    showMessage(message, 'success', '<?php echo $translations['M02342'][$language]; //Success ?>', '', 'bonusPayout')
}


function loadSearch(data, message) {
    loadDefaultListing(data, message);
    $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['M00306'][$language]; /* Search successful. */ ?></span>').show();
    setTimeout(function() {
        $('#searchMsg').removeClass('alert-success').html('').hide(); 
    }, 3000);
}

function pagingCallBack(pageNumber, fCallback){
    var searchId   = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    if(pageNumber > 1) bypassLoading = 1;

    var formData = {
        command    : "getNewRecuitAndActiveProgram",
        searchData  : searchData,
        pageNumber : pageNumber
    };
    if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

</script>
