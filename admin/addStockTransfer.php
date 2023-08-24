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
                                                Source location
                                            </label>
                                            <select id="fromLocation" class="form-control">
                                                <option value="">Select a Location</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>
                                                Destination Location
                                            </label>
                                            <select id="toLocation" class="form-control">
                                                <option value="">Select a Location</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Available Stock
                                            </label>
                                            <input type="text" class="form-control" id="activeStockCount" disabled>
                                        </div>
                                    </div> -->

                                    <!-- <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Enter amount for stock out
                                            </label>
                                            <input type="text" class="form-control" id="quantity" oninput="loadStockInTable()">
                                            <p id="quantityPassError" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="quantityPassErrorText" style="margin-left: 15px;">&nbsp;</span></p>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <label>
                                                Delivery Tracking Number
                                            </label>
                                            <input type="text" class="form-control" id="deliveryTN">
                                        </div>
                                    </div> -->

                                    <!-- <div class="row">
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <label>
                                                Remark
                                            </label>
                                            <input type="text" class="form-control" id="remark">
                                            <p id="inputError" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="inputErrorText" style="margin-left: 15px;">&nbsp;</span></p>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Delivery Tracking Number
                                            </label>
                                            <input type="text" class="form-control" id="dTN">
                                        </div>

                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Schedule Date
                                            </label>
                                            <input type="date" class="form-control" id="date">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Source Document
                                            </label>
                                            <input type="text" class="form-control" id="stockID" disabled>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;">
                                            <label>
                                                Remark
                                            </label>
                                            <input type="text" class="form-control" id="remark">
                                            <!-- <p id="inputError" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="inputErrorText" style="margin-left: 15px;">&nbsp;</span></p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <h5 class="col-md-12 mt-5">
                                                Product Detail
                                            </h5>
                                            <div id="appendProduct">
                                                <div class="col-md-7">
                                                    <div class="addProductWrapper default">
                                                        <span class="dtxt">Default</span>
                                                        
                                                        <div class="row" id="pr1">
                                                            
                                                            <div class="col-md-9">
                                                                <label>1. Product</label>
                                                                <select id="productSelect1" class="form-control productSelect" required></select>
                                                                <input id="noteProductInput1" class="form-control" style="display: none;" readonly>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Quantity</label>
                                                                <input id="quantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="addProduct" onclick="addRow()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Product</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="saveStockIn" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Save</button>
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
                            </div>
                        <div>
                        <button id="stockTransferBtn" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Stock Transfer</button>
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
    var wrapperLength = 2;
    var html = `<option value="">Select Product</option>`;
    var totalLoop =[1];
   

    $(document).ready(function() { 
        var formData = {
            'command'       : 'addStockList'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
    });

    function loadDefaultListing(data, message) {
        $('#stockID').val(data.transferNo);
        transferNo      = data.transferNo;

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

        var product = data.productList;

        if(product) {
            $.each(product, function(i, obj) {
                html += `<option value="${obj.id}">${obj.barcode} - ${obj.name}</option>`;
            });
            
            $(".productSelect").html(html);
        }

        $('#productSelect1').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });    
    }

    $('#saveStockIn').click(function() {
        var productSet= [];
        var getToLocation = document.getElementById("toLocation");
        var toLocation    = getToLocation.value;

        var getFromLocation = document.getElementById("fromLocation");
        var fromLocation    = getFromLocation.value;

        // Checkpoint
        var trackingNo = document.getElementById("dTN");
        var trackingNum    = trackingNo.value;

        var date = document.getElementById("date");
        var schDate    = date.value;

        var remark          = document.getElementById("remark");
        var transferRemark  = remark.value;

        // if(!fromLocation){
        //     $('#inputError').show();
		// 	$('#inputErrorText').text("Please enter Starting Location");
		// 	return false;
        // }

        // if(!toLocation){
        //     $('#inputError').show();
		// 	$('#inputErrorText').text("Please enter Ending Location");
		// 	return false;
        // }

        // if(fromLocation == toLocation){
        //     $('#inputError').show();
		// 	$('#inputErrorText').text("Please choose different start and end locations.");
		// 	return false;
        // }


        // for(i = 0; i < $(".stockInInput").length; i++) {
        //     var newI = i + 1;
        //     var perSerial = {
        //         serial_number: $("#stockInSerialNo" + newI).val(),
        //     }
        //     stockTransferList.push(perSerial);
        // }

        for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
            var name = $('option:selected', "#productSelect"+v).text();
            var quantity = $('#quantity' + v).val();

            if($("#productType" + v).val() == "note") {
                var product_id = "0";
                var name = $("#noteProductInput"+v).val();
            } else {
                var product_id = $('option:selected', "#productSelect"+v).val();
            }

            var id = $('#id'+v).val();
            action = $('#action'+v).val();

            if($('#action'+v).val() == "add" && $('#id'+v).val() != "") {
                action = "";
            }
            if($('#action'+v).val() == "add" && $('#id'+v).val() == "") {
                action = "add";
            }

            var perProduct = {
                product_id : product_id,
                name : name,
                quantity: quantity,
                action: action,
            }

            if($('#action'+v).val() != "delete")
                productSet.push(perProduct);
        }


        var formData = {
            command             : 'generateStockOutList',
            transferNo          : transferNo,
            toLocation          : toLocation,
            fromLocation        : fromLocation,
            trackingNum         : trackingNum,
            schDate             : schDate,
            transferRemark      : transferRemark,
            orderDetailArray    : productSet,
        }
        fCallback = generateStockList;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function generateStockList(data) {
       
        var quantityValue = data.quantity;
        data.stockArr.sort((a, b) => a.name.localeCompare(b.name));
        
        // if(quantityValue > activeStockCount){
        //     $('#stockIn').css("display", "none");
        //     $('#quantityPassError').show();
		// 	$('#quantityPassErrorText').text("The quantity for stock out should not exceed the available stock.");
		// 	return false;
        // }

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

        data.stockArr.forEach((item) => {
            var productId = item.product_id;
            const formData = {
            command: 'getProductDetails',
            productInvId: item.product_id,
            };

            // fCallback = loadStockInTableBody;
            fCallback = (responseData) => loadStockInTableBody(responseData, data.barCode);
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });


    }

    function loadStockInTableBody(data, barCode) {
        var k = tableIndex;
        var productInventory = data.productInventory;
        var productId = productInventory[0].id;
        var barcodeOptions = '';

        // Find barcodes for the matching product_id
        if (barCode && barCode.length > 0)
        {
            var matchingBarcodes = barCode.filter(item => item.product === productId.toString());
            console.log(matchingBarcodes);
            if (matchingBarcodes.length > 0) {
                barcodeOptions = matchingBarcodes.map(barcode => `<option value="${barcode.serial_number}">${barcode.serial_number}</option>`).join('');
            }
        }

        var html3 = `
            <tr>
                <td>${k + 1}</td>
                <td>${productInventory[0].name}</td>
                <td>
                    <select class="form-control stockInInput" id="stockInSerialNo${k + 1}" onchange="removeUrl(this)">
                        <option value="">Select an option</option>
                        ${barcodeOptions}
                    </select>
                    <input class="form-control stockInInputProductId" style="display: none;" type="text" id="stockInProductId${k + 1}" value="${productId}">
                </td>
            </tr>
        `;

        $('#stockInTableBody').append(html3);

        tableIndex++;
    }


    function removeUrl(e) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');
        $(e).val(serialNo);
    }

    function addRow(data){
        
        var wrapper = `
            <div class="col-md-7">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">

                        
                        <div class="col-md-9">
                            <label><font id="noteProductLabel${(wrapperLength)}">${(wrapperLength)}.  Product</font></label>
                            <select id="productSelect${(wrapperLength)}" class="form-control productSelect" required>                                                                 
                            </select>
                            <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;" readonly>
                            <input id="productType${(wrapperLength)}" class="form-control hide">
                        </div>
                        <div class="col-md-3">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" class="form-control quantityInput" value="0" placeholder="0"  required/>
                        </div>
                       
                    </div>
                </div>
            </div>
        `;

        $("#appendProduct").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);

        $('#productSelect'+wrapperLength).select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function closeDiv(n, id) {
       
        var totalLoop = [1];

        const index = totalLoop.indexOf(id);

        $("#action" + id).val('delete');

        if (index > -1) {
            totalLoop.splice(index, 1);
        }

        var lang = $(n).parent().find('.productSelect').val();

        // $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        $(n).parent().css("display", "none");
        $("#closeBtn" + id).css("display", "none");
        $("#total" + id).val(0.00);
        $("#quantity" + id).val(0);
        $("#quantity" + id).attr("disabled", true);;
        $("#productSelect" + id).attr("disabled", true);

    }

    $('#stockTransferBtn').click(function() {
        var stockTransferList = [];
        $('#quantityPassError').hide();
        $('#inputError').hide();

        var getToLocation = document.getElementById("toLocation");
        var toLocation    = getToLocation.value;

        var getFromLocation = document.getElementById("fromLocation");
        var fromLocation    = getFromLocation.value;

        var remark          = document.getElementById("remark");
        var transferRemark  = remark.value;

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
            transferRemark      : transferRemark,
            stockTransferList   : stockTransferList,
        }
        fCallback = successStockOut;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function successStockOut() {
        showMessage('Stock Transfer Saved.', 'success', 'Stock Transfer', 'check', 'stockTransfer.php');
    }

    function newFormatState(method) {
        if (!method.id) {
            return method.text;
        }

        var optimage = $(method.element).attr('data-image')
        if (!optimage) {
            return method.text;
        } else {
            var $opt = $(
                '<span onclick="changeTokenCategory('+method.text+')"><img src="' + optimage + '" class="tokenOptionImg" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
            );
            return $opt;
        }
    };
   
</script>
</body>
</html>
