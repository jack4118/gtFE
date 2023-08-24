<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;
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
                        <div class="col-sm-4">
                             <a href="stockTransfer.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">
                                    Stock Transfer Detail
                                </h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                Stock Transfer ID
                                            </label>
                                            <input type="text" class="form-control" id="stockID" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                From
                                            </label>
                                            <input type="text" class="form-control" id="fromLocation" disabled>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                To
                                            </label>
                                            <input type="text" class="form-control" id="toLocation" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Stock Quantity
                                            </label>
                                            <input type="text" class="form-control" id="quantity" disabled>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Status
                                            </label>
                                            <input type="text" class="form-control" id="status" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <label>
                                                Remark
                                            </label>
                                            <input type="text" class="form-control" id="remark" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- Serial Number List -->
                    <div class="row" id="stockIn" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <p class="text-center foc-title">Stock Transfer</p>
                                <div id="stockInTable">
                                    
                                </div>
                                <button id="saveStockIn" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; display:none;">Receive</button>
                            </div>
                        <div>
                    </div>
                    
                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url                 = 'scripts/reqAdmin.php';
    var method              = 'POST';
    var debug               = 0;
    var bypassBlocking      = 0;
    var bypassLoading       = 0;
    var fCallback           = "";
    var transferNo          = "<?php echo $_POST['transferNo']; ?>";
    var tableIndex          = '';
    var quantity            = '';


   

    $(document).ready(function() { 
        if(transferNo){
            $('#stockID').val(transferNo);
        }

        if (transferNo) {
            var formData = {
                'command'       : 'getTransferDetail',
                'transferNo'     : transferNo
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

    });

    function loadDefaultListing(data, message) {
        console.log(data);

        $('#fromLocation').val(data.from);
        $('#toLocation').val(data.to);
        $('#status').val(data.state);

        if(data.state == 'In Progress'){
            $('#saveStockIn').show();
        }

        if(data.transferDetail){
            $('#remark').val(data.transferDetail.remark);
            $('#quantity').val(data.transferDetail.total_quantity);

            quantity = data.transferDetail.total_quantity;
        }

        if(data.product){
            loadStockInTable(data.product);
        }
        
    }

    function loadStockInTable(data) {       

        $('#stockInTable').show();
        $('#stockIn').css("display", "block");
       
        var html2 = '';

        html2 += `
            <table class="table table-striped table-bordered no-footer m-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Serial No</th>
                    </tr>
                </thead>
                <tbody id="stockInTableBody">
                </tbody>
            </table>
        `;

        $('#stockInTable').html(html2);

        tableIndex = 0;


        $('#stockInTableBody').html('');

        for (var i = 0; i < quantity; i++) {
            loadStockInTableBody(data);
        }
    }

    function loadStockInTableBody(data, message) {
        var k = tableIndex;
        var productInventory = data.productInventory;

        var html3 = `
            <tr>
                <td>${k+1}</td>
                <td>${data[tableIndex].name}</td>
                <td>
                    <input class="form-control stockInInput" type="text" id="stockInSerialNo${k+1}" value="${data[tableIndex].serial_number}" oninput="removeUrl(this)" disabled> 
                    <input class="form-control stockInInputProductId" style="display: none;" type="text" id="stockInProductId${k+1}" value="${data[tableIndex].id}">
                </td>
            </tr>
        `;

        $('#stockInTableBody').append(html3);

        tableIndex++;
    }

    $('#saveStockIn').click(function() {
        
        var formData = {
            command             : 'stockInProcess',
            transferNo          : transferNo,
        }
        fCallback = successStockIn;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function successStockIn() {
        showMessage('Stock Received', 'success', 'Stock Transfer', 'check', 'stockTransfer.php');
    }

    function removeUrl(e) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');
        $(e).val(serialNo);
    }
   
</script>
</body>
</html>
