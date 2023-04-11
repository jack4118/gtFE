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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="username" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="email">
                                                            <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="email" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" data-th="disabled">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="disabled" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form>
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
                        </form>
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
    // var btnArray = Array('edit', 'approve');
    var btnArray = {};
    var thArray  = Array(
        'ID',
        'Product Name',
        'Total Quantity',
        'Total Price',
        'Status',
        'Approved By',
        'Approved Date',
        'Created At'
        // '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        // '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        // '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
        // '<?php echo $translations['A00103'][$language]; /* Email */ ?>',
        // '<?php echo $translations['A00110'][$language]; /* Role Name */ ?>',
        // '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
        // '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
        // '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>'
        // '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>'
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

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPurchaseOrderList",
            pageNumber  : pageNumber,
            inputData   : searchData
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        var poTable = data.purchaseOrderList;
        console.log(data.purchaseOrderList);

        if (data != "" && poTable.length > 0) {
            var newPoTable = []

            console.log(poTable);
            $.each(poTable, function(k, v) {
                var editBtn = `
                    <a data-toggle="tooltip" title="" id="edit${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                `;
                var approveBtn = `
                    <a data-toggle="tooltip" title="" id="approve${k}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Approve"><i class="fa fa-check"></i></a>
                `;
                console.log(v['status']);
                if(v['status'] == 'Confirmed') {
                    btnList = editBtn;
                } 
                else if(v['status'] == 'Done') {
                    btnList = '';
                }
                else {
                    btnList = editBtn + approveBtn;
                }

                var rebuildData = {
                    id            : v['id'],
                    name          : v['product_name'],
                    quantity      : v['total_quantity'],
                    cost          : v['total_cost'],
                    status        : v['status'],
                    approved_by   : v['approved_by'],
                    approved_date : v['approved_date'],
                    created_at    : v['created_at'],
                    btnList       : btnList,
                };
                newPoTable.push(rebuildData);
            }); 
        }

        buildTable(newPoTable, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // $('#'+ tableId).find('tbody tr').each(function(){
        //     $(this).find('td:last-child').css('text-align','center');
        // });
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            var status = tableRow.find('td:eq(4)').text();
            $.redirect("editPurchaseOrder.php",{id: editId, status : status});
            console.log(role);
        }

        if (btnName == 'approve') {
            var editId = tableRow.attr('data-th');
            var role = tableRow.find('td:eq(4)').text();
            // $.redirect("order.php",{id: editId, role : role});
            document.getElementById('approve').onclick = confirmPoStatus(editId);
        }
    }

    function confirmPoStatus(id) {
        var formData   = {
            command     : "approvePurchaseOrder",
            id          : id,
            status      : 'Confirmed'
        };

        if(fCallback)
            fCallback = loadPurchaseOrderUpdate;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function loadPurchaseOrderUpdate(result){
        showMessage('Approved Successfully', 'success', 'Approved Successfully', 'user-plus', 'order.php');

        $('#'+ tableId).find('tbody tr').each(function(){
            id = $(this).find('td:eq(0)').text();
            var column = $(this).find('td:eq(6)').children();
            var editBtn = column[1].id;
            // console.log(editBtn);
            
            if(result.status == "Confirmed" && id == result.id) {
                // console.log('aaa');
                $('#'.editBtn).attr('onclick', 'return false');
            }
        });
    }

</script>
</body>
</html>
