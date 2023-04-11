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
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <form id="purchaseForm" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <!-- <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Current Low Stock Quantity
                                                            </label>
                                                            <input type="text" class="form-control" id="currentQty" disabled="">
                                                        </div> -->
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Low Stock Quantity
                                                            </label>
                                                            <input type="text" class="form-control" id="qty">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-xs-12">
                                                <button id="setBtn" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display:none">
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
                <!-- container -->
            </div>
            <!-- content -->
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

    // Initialize all the id in this page
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        'Date',
        'Quantity',
        'Status',
        'Created By'
    );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var creditData = {};

    $(document).ready(function() {
        var formData = {
            'command'   : 'getLowStockQuantity'
        };
        fCallback = loadData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)

        $('#setBtn').click(function() {
            $('.text-danger').text("");

            var quantity = $("#qty").val();
            var formData = {
                'command'       : 'setLowStockQuantity',
                'quantity'      : quantity
            };

            fCallback = setQty;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadData(data, message) {
        // $("#currentQty").val(data.currentQuantity)
        var tableNo;
        $('#basicwizard').show();
        if(data) {
            var newList = [];
            $.each(data.previousQuantity, function(k, v) {
                var rebuildData = {
                    date : v['date'],
                    quantity : v['quantity']?numberThousand(v['quantity'],0):0,
                    status : v['status'],
                    createdBy : v['createdBy']
                };
                newList.push(rebuildData);
            });
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
    } 
    function setQty(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'lowStockQuantity.php');
    }
    
</script>
</body>
</html>