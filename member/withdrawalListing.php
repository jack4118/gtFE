<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00018'][$language]; //Withdrawal History ?>
        </div>
        <div class="col-12 mt-4">
            <form id="searchDIV" class="filter">
                <div class="row align-items-end">
                    <div class="col-lg-4 col-md-4 col-12 form-group" id="datepicker">
                        <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
                        <div class="input-daterange input-group" id="datepicker-range">
                            <input id="dateRangeStart" type="text" class="input-sm form-control px-1" name="start" dataType="dateRange" dataName="createdAt" autocomplete="off">
                            <span class="input-group-text px-0"><i class="fas fa-arrow-right"></i></span>
                            <input id="dateRangeEnd" type="text" class="form-control px-1" name="end" dataType="dateRange" autocomplete="off" dataName="createdAt">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 form-group d-flex align-items-center"> 
                        <button id="searchBtn" class="btn btn-primary" type="button" data-lang="M03383"><?php echo $translations['M03383'][$language] /*Search*/ ?></button>
                        <i class="fas fa-sync-alt ml-3 resetBtnStyle" id="resetBtn"></i>
                    </div>
                </div>
            </form>
        </div>

       
    </div>
    <div class="kt-container pt-4">
        <div class="col-12 mt-4 walletDiv">
            <form>
                <div id="basicwizard" class="pull-in col-12 px-0">
                    <div class="tab-content b-0 m-b-0 p-t-0">
                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                        <div id="transactionHistoryDiv" class="table-responsive"></div>
                        <span id="paginateText"></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="pagerList"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";
var walletName = "<?php echo $_POST['walletName']; ?>";


var divId    = 'transactionHistoryDiv';
var tableId  = 'transactionHistoryTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
    "<?php echo $translations['M00389'][$language]; //Date ?>",
    "<?php echo $translations['M03163'][$language]; //Bank Name ?>",
    "<?php echo $translations['M00471'][$language]; //Branch ?>",
    "<?php echo $translations['M00676'][$language]; //City ?>",
    "<?php echo $translations['M03725'][$language]; //Bank Acc No ?>",
    "<?php echo $translations['M00457'][$language]; //Withdrawal Amount ?>",
    "<?php echo $translations['M01076'][$language]; //Receivable Amount ?>",
    "<?php echo $translations['M02103'][$language]; //Status ?>",
    "<?php echo $translations['M02535'][$language]; //Remark ?>"
);


$(document).ready(function(){
  $("#walletName").html(walletName);

    formData  = {
        command : "getWithdrawalListing"
    };
    fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });

        $('#dateRangeEnd').click(function() {
            $('#dateRangeStart').trigger('click');
        });

    $("#resetBtn").click(function(){
        $("#searchDIV").find("input").each(function(){
            $(this).val('');
        });
        $('#dateRangeStart').data('daterangepicker').remove();
        $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });
        $('#searchDIV').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
        });
    });
    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });
});

function pagingCallBack(pageNumber, loadSearch)
{
    if(pageNumber > 1) bypassLoading = 1;


    var searchId     = "searchDIV";
    var searchData = buildSearchDataByType(searchId);

    var formData   = {
            command     : "getWithdrawalListing",
            pageNumber: pageNumber,
            searchData : searchData
    };

    if(!fCallback)
            fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00159'][$language]; //Search Successful ?></span>').show();
        setTimeout(function() {
                $('#searchMsg').removeClass('noData').html('').hide();
        }, 3000);
}

function loadDefaultListing(data, message) {

    console.log(data);
    var list = data.withdrawalListing;
    var tableNo;

    if(list){
        var newList = [];
        if(list){
            $.each(list, function(k,v){
                $.each(v, function(key,value){

                    if (!value) {
                        v[key]="-";
                    }
                });
                var rebuildData ={
                    created_at          : v['created_at'],
                    bank_name           : v['bank_name'],
                    branch              : v['branch'],
                    bank_city           : v['bank_city'],
                    account_no          : v['account_no'],
                    amount              : numberThousand(v['amount'],2),
                    receivable_amount   : numberThousand(v['receivable_amount'],2),
                    status              : v['status'],
                    remark              : v['remark'],
                };
                newList.push(rebuildData);
            });
        }
    } 
    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    $.each(list, function(k, v) {
        $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
    });

    $('#' + tableId).find('tr').each(function () {
        $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
        $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
    });


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
        ]
    });
}




 // function tableBtnClick(btnId) {

 //        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
 //        var tableRow = $('#'+btnId).parent('td').parent('tr');
 //        var tableId  = $('#'+btnId).closest('table');

 //        if (btnName == 'cancel') {
 //            // $("#cancelWithdrawalBox").modal("show");
 //            var canvasBtnArray = {
 //                    Submit: '<?php echo $translations['M00147'][$language]; //Submit ?>'
 //            };

 //            showMessage('<?php echo $translations['A01159'][$language]; //Are you sure you want to cancel this Withdrawal Request? ?>', "warning", "<?php echo $translations['M00106'][$language]; //Cancel Withdrawal ?>","", "",canvasBtnArray);

 //            var transID = tableRow.attr('data-th');

 //            $('#canvasSubmitBtn').click(function() {

 //                var formData = {
 //                    'command': 'updateWithdrawalStatus',
 //                    'withdrawalId' : transID,
 //                    'status' : "Cancel"
 //                };
 //                fCallback = loadDelete;
 //                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

 //                function loadDelete(data,message){
 //                    // showMessage('You canceled your withdrawal request.', "warning", "Cancel Withdrawal","", "",canvasBtnArray);
 //                    var formData  = {
 //                        command: 'getWithdrawalListing',
 //                        creditType: "<?php echo $_POST['creditType']; ?>"
 //                    };
 //                    var fCallback = loadDefaultListing;
 //                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
 //                }
 //            });
 //        }
 //    }
</script>
