<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <div>
            <?php echo $translations['M03287'][$language]; //Billing Address ?> 
        </div>
    </div>       
    <div class="mt-3">
        <div class="whiteBg">
            <form>
                <div id="basicwizard" class="pull-in col-12 px-0">
                    <div class="tab-content b-0 m-b-0 p-t-0">
                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                        <div id="billAddressList" class="table-responsive"></div>
                        <span id="paginateText"></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="pageList"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-between align-items-center">
        <div class="pageTitle" data-lang="M02828">
            <?php echo $translations['M02828'][$language]; //Delivery Address ?>
        </div>
        <div>
            <a href="addNewAddress" class="btn btn-primary">+ <?php echo $translations['M03288'][$language]; //Add New ?></a>  
        </div>
    </div>
    <form id="searchDIV" class="filter mt-3">
        <div class="row align-items-end">
            <div class="col-lg-4 col-md-6 col-12 form-group">
                <label><?php echo $translations['M00224'][$language]; //Name ?></label>
                <input type="text" class="form-control" dataName="name" dataType="text">
            </div>
            <div class="col-lg-4 col-md-6 col-12 form-group">
                <label><?php echo $translations['M01774'][$language]; //Phone ?></label>
                <input type="text" class="form-control" dataName="phone" dataType="text">
            </div>
            <div class="col-lg-4 col-md-6 col-12 form-group">
                <label><?php echo $translations['M02466'][$language]; //Address ?></label>
                <input type="text" class="form-control" dataName="address" dataType="text">
            </div>
            <div class="col-lg-4 col-md-6 col-12 form-group d-flex align-items-center">
                <button type="button" id="searchBtn" class="btn btn-primary"><?php echo $translations['M03383'][$language]; //Apply ?></button>
                <i class="fas fa-sync-alt ml-3 resetBtnStyle" id="resetBtn"></i>
            </div>
        </div>
    </form>
    <div class="mt-3">
        <div class="whiteBg">
           <div class="">
                <form>
                    <div id="basicwizard" class="pull-in col-12 px-0">
                        <div class="tab-content b-0 m-b-0 p-t-0">
                            <div id="alertMsgDelivery" class="text-center" style="display: block;"></div>
                            <div id="deliveryAddressList" class="table-responsive"></div>
                            <span id="paginateTextDelivery"></span>
                            <div class="text-center">
                                <ul class="pagination pagination-md" id="deliveryPageList"></ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
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
var saveData;


var divId    = 'billAddressList';
var tableId  = 'billAddressTable';
var pagerId  = 'pageList';
var btnArray = {};

var thArray  = Array(
        "<?php echo $translations['M00177'][$language]; //Full Name ?>",
        "<?php echo $translations['M01774'][$language]; //Phone ?>",
        "<?php echo $translations['M02466'][$language]; //Address ?>",
        ""
);

var divIdDelivery    = 'deliveryAddressList';
var tableIdDelivery  = 'deliveryAddressTable';
var pagerIdDelivery  = 'deliveryPageList';
var btnArrayDelivery = {};

var thArrayDelivery  = Array(
        "<?php echo $translations['M00177'][$language]; //Full Name ?>",
        "<?php echo $translations['M01774'][$language]; //Phone ?>",
        "<?php echo $translations['M02466'][$language]; //Address ?>",
        "",
        "",
        ""
);


$(document).ready(function(){

  var searchId = 'searchDIV';
  var searchData = buildSearchDataByType(searchId);

  $("#walletName").html(walletName);
    formData  = {
        command : "getAddressList"
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
            command     : "getAddressList",
            pageNumber: pageNumber,
            searchData : searchData
    };

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
    var billingList = data.billingList;
    var deliveryList = data.list;
    var tableNo;
    var tableNoDelivery;

    if(billingList){
        var newList = [];
        $.each(billingList, function(k,v){
            var name = v['fullname'];

            var buildBtn = `
                    <a href="javascript:;" data-toggle="tooltip" title="" onclick="editBillAddress('${v['deliveryID']}','billing')" class="btn btn-primary blue" data-lang="M00226"><?php echo $translations['M00226'][$language]; /* Edit */ ?></i></a>
            `;

            var rebuildData ={
                name        : name,
                phone       : v['phone'],
                address     : v['address'],
                editBtn     : buildBtn  
            };
            newList.push(rebuildData);
        });
    }

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

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
            { responsivePriority: -1, targets: 4 },
        ]
    });

    if(deliveryList){
        var newListDelivery = [];
        $.each(deliveryList, function(k,v){
            
            var name = v['fullname'];

            var buildBtn = `
                    <a href="javascript:;" data-toggle="tooltip" title="" onclick="editBillAddress('${v['deliveryID']}','delivery')" class="btn btn-primary blue" data-lang="M00226"><?php echo $translations['M00226'][$language]; /* Edit */ ?></i></a>
            `;

            var delBtn = `
                    <a href="javascript:;" data-toggle="tooltip" title="" onclick="delAddress('${v['deliveryID']}')" class="btn btn-default2" data-lang="M03292"><?php echo $translations['M03292'][$language]; /* Delete */ ?></i></a>
            `;

            if(v['type'] == 1){
               var isDefault = `<span class="orangeTxt" data-lang="M02856">[ <?php echo $translations['M02856'][$language]; /* Default */ ?> ]</span>`;
            }else{
                var isDefault = "";
            }

            var rebuildData ={
                name        : name,
                phone       : v['phone'],
                address     : v['address'],
                editBtn     : buildBtn,
                delBtn      : delBtn,
                isDefault   : isDefault
            };
            newListDelivery.push(rebuildData);
        });
    }

    buildTable(newListDelivery, tableIdDelivery, divIdDelivery, thArrayDelivery, btnArrayDelivery, message, tableNoDelivery);
    pagination(pagerIdDelivery, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    // START DataTables
    $('#'+tableIdDelivery+' th:nth-child(1)').before('<th></th>');
    $('#'+tableIdDelivery+' td:nth-child(1)').before('<td style="width:30px;"></td>');


    $('#'+tableIdDelivery).DataTable({
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
            { responsivePriority: 5, targets: 5 },
            { responsivePriority: 6, targets: 6 },
        ]
    });
}

function editBillAddress(id,addressType){
    $.redirect('editAddress',{
        id : id,
        addressType : addressType
    });
}

function delAddress(id) {
    var formData  = {
     command : 'deleteAddress', 
     id : id,
     disabled : 1
    };
    var fCallback = delAddressSucc;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function delAddressSucc(data, message) {
   showMessage(message, 'success', '<?php echo $translations['M03293'][$language]; /*Remove Success*/?>', 'success', 'addressListing');
}



 function tableBtnClick(btnId) {

        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'cancel') {
            // $("#cancelWithdrawalBox").modal("show");
            var canvasBtnArray = {
                    Submit: '<?php echo $translations['M00147'][$language]; //Submit ?>'
            };

            showMessage('<?php echo $translations['A01159'][$language]; //Are you sure you want to cancel this Withdrawal Request? ?>', "warning", "<?php echo $translations['M00106'][$language]; //Cancel Withdrawal ?>","", "",canvasBtnArray);

            var transID = tableRow.attr('data-th');

            $('#canvasSubmitBtn').click(function() {

                var formData = {
                    'command': 'updateWithdrawalStatus',
                    'withdrawalId' : transID,
                    'status' : "Cancel"
                };
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                function loadDelete(data,message){
                    // showMessage('You canceled your withdrawal request.', "warning", "Cancel Withdrawal","", "",canvasBtnArray);
                    var formData  = {
                        command: 'getWithdrawalListing',
                        creditType: "<?php echo $_POST['creditType']; ?>"
                    };
                    var fCallback = loadDefaultListing;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        }
    }
</script>
