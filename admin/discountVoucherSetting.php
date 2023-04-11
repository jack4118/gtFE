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

                        <div class="col-lg-12 col-md-12">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Discount Voucher Setting
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                  <!-- <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00952'][$language]; /* Type */ ?> <span class="text-danger">*</span></label>
                                                        <select id="type" class="form-control">
                                                           <option value="add"><?php echo $translations['A01238'][$language]; /* Add */ ?></option>
                                                            <option value="remove"><?php echo $translations['A01239'][$language]; /* Remove */ ?></option>
                                                        </select>
                                                    </div> -->
                                                    <!-- <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00102'][$language]; /* Username */ ?> <span class="text-danger">*</span></label>
                                                        <input id="username" type="text" class="form-control">
                                                    </div> -->
                                                </div>

                                                 <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a href="addVoucher.php" type="button" class="btn btn-primary waves-effect w-md waves-light">Add Discount Voucher</a>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12 px-0" style="margin-top: 30px">
                                                    <div id="basicwizard" class="pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                    <div id="listingDiv" class="table-responsive"></div>
                                                            <span id="paginateText"></span>
                                                    <!-- <div class="text-center">
                                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                                    
                                                    </div> -->
                                                    </div>
                                                    </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                        
                  
                    <!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
             '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
             '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>',
             '<?php echo $translations['A00245'][$language]; /* Code */ ?>',
             '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
             'Total Balance',
             'Total Used',
             '<?php echo $translations['A01448'][$language]; /* Updated By */ ?>',
             '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
            );

    $(document).ready(function() {

        var formData = {
            command  : "getDiscountVoucherSetting",
        };
        var fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);  
    });

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var list = data.voucherList;
        if(list) {
            var newList = [];
            $.each(list, function(k, v) {

                var adjustBtn = `
                    <a data-toggle="tooltip" title="" onclick="editDisVoucher('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                `;
                var updaterName = '';
                if(v['updaterName'] == null || v['updaterName'] == ''){
                    updaterName = '-';
                }else{
                    updaterName = v['updaterName'];
                }

                var rebuildData = {
                    createdAt       : v['createdAt'],
                    updatedAt      : v['updatedAt'],
                    code            : v['code'],
                    name            : v['name'],
                    totalBalance    : v['totalBalance'],
                    totalUsed       : v['totalUsed'],
                    updaterName     : updaterName,
                    status          : v['status'],
                    adjustBtn       : adjustBtn
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
            $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
        });
    }

    function editDisVoucher(id) {
        $.redirect('editVoucher.php', {
            id : id
        });
    }

</script>
</body>
</html>
