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
                             <a href="stockMovement.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
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
                                            <select id="fromLocation" class="form-control">
                                                <option value="">Select a Location</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                To
                                            </label>
                                            <select id="toLocation" class="form-control">
                                                <option value="">Select a Location</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Available Stock
                                            </label>
                                            <input type="text" class="form-control" id="activeStockCount" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Enter amount for stock out
                                            </label>
                                            <input type="text" class="form-control" id="quantity" oninput="loadStockInTable()">
                                            <p id="quantityPassError" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="quantityPassErrorText" style="margin-left: 15px;">&nbsp;</span></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <label>
                                                Remark
                                            </label>
                                            <input type="text" class="form-control" id="remark">
                                            <p id="inputError" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="inputErrorText" style="margin-left: 15px;">&nbsp;</span></p>
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
                                <button id="saveStockIn" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Save</button>
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
    var url2                = 'scripts/reqDefault.php';
    var method              = 'POST';
    var debug               = 0;
    var bypassBlocking      = 0;
    var bypassLoading       = 0;
    var fCallback           = "";
    var productID           = "<?php echo $_POST['productId']; ?>";
    var transferNo          = "";
    var tableIndex          = '';
    var activeStockCount    = '';
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";

   

    $(document).ready(function() { 
        if (productID) {
            var formData = {
                'command'       : 'getStockCount',
                'productID'     : productID
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    function loadDefaultListing(data, message) {
        $('#stockID').val(data.transferNo);
        transferNo      = data.transferNo;

        $('#activeStockCount').val(data.activeStockCount);
        activeStockCount      = data.activeStockCount;

        var stockLocationData = data.stockLocation;

        var selectElement = document.getElementById('fromLocation');
        stockLocationData.forEach(function(location) {
            var option = document.createElement('option');
            option.value = location.id;
            option.text = location.code;
            selectElement.appendChild(option);
        });

        var selectElement = document.getElementById('toLocation');
        stockLocationData.forEach(function(location) {
            var option = document.createElement('option');
            option.value = location.id;
            option.text = location.code;
            selectElement.appendChild(option);
        });
    }

    function loadStockInTable() {
        $('#quantityPassError').hide();
        $('#inputError').hide();

       
        var quantityInput = document.getElementById("quantity");
        var quantityValue = quantityInput.value;
        
        if(quantityValue > activeStockCount){
            $('#stockIn').css("display", "none");
            $('#quantityPassError').show();
			$('#quantityPassErrorText').text("The quantity for stock out should not exceed the available stock.");
			return false;
        }

        if (isNaN(quantityValue)) {
            $('#quantityPassError').show();
			$('#quantityPassErrorText').text("Please input a valid number");
			return false;
        } 

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

        for (var i = 0; i < quantityValue; i++) {
            var formData = {
                command           : 'getProductDetails',
                productInvId      : productID,
            }

            fCallback = loadStockInTableBody;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }

    function loadStockInTableBody(data, message) {
        var k = tableIndex;
        var productInventory = data.productInventory;

        var html3 = `
            <tr>
                <td>${k+1}</td>
                <td>${productInventory[0].name}</td>
                <td>
                    <input class="form-control stockInInput" type="text" id="stockInSerialNo${k+1}" oninput="removeUrl(this)"> 
                    <input class="form-control stockInInputProductId" style="display: none;" type="text" id="stockInProductId${k+1}" value="${productInventory[0].id}">
                </td>
            </tr>
        `;

        $('#stockInTableBody').append(html3);

        tableIndex++;
    }

    $('#saveStockIn').click(function() {
        var stockTransferList = [];
        $('#quantityPassError').hide();
        $('#inputError').hide();

        var quantityInput = document.getElementById("quantity");
        var quantityValue = quantityInput.value;

        var getToLocation = document.getElementById("toLocation");
        var toLocation    = getToLocation.value;

        var getFromLocation = document.getElementById("fromLocation");
        var fromLocation    = getFromLocation.value;

        var remark          = document.getElementById("remark");
        var transferRemark  = remark.value;

        if(!quantityValue){
            $('#inputError').show();
			$('#inputErrorText').text("Please enter stock quantity");
			return false;
        }

        if(!fromLocation){
            $('#inputError').show();
			$('#inputErrorText').text("Please enter Starting Location");
			return false;
        }

        if(!toLocation){
            $('#inputError').show();
			$('#inputErrorText').text("Please enter Ending Location");
			return false;
        }

        if(fromLocation == toLocation){
            $('#inputError').show();
			$('#inputErrorText').text("Please choose different start and end locations.");
			return false;
        }

        // for(i = 0; i < $(".stockInInput").length; i++) {
        //     var newI = i + 1;
        //     var perSerial = {
        //         serial_number: $("#stockInSerialNo" + newI).val(),
        //     }
        //     stockTransferList.push(perSerial);
        // }

        for (var i = 0; i < $(".stockInInput").length; i++) {
            var newI = i + 1;
            var serialNumber = $("#stockInSerialNo" + newI).val();
            stockTransferList.push(serialNumber);
        }

        var formData = {
            command             : 'stockOutProcess',
            transferNo          : transferNo,
            toLocation          : toLocation,
            fromLocation        : fromLocation,
            transferQuantity    : quantityValue,
            transferRemark      : transferRemark,
            stockTransferList   : stockTransferList,
        }
        fCallback = successStockOut;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function successStockOut() {
        showMessage('Stock Transfer Saved.', 'success', 'Stock Transfer', 'check', 'stockMovement.php');
    }

    function removeUrl(e) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');
        $(e).val(serialNo);
    }
   
</script>
</body>
</html>
