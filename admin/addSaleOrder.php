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
                             <a href="purchaseOrder.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-5">
                                    Sales Order
                                </h4>

                                <div class="form-group">
                                    
                                    <!-- <div class="row" id="statusGroup">
                                        <div class="col-md-6">
                                            <label>
                                                Status
                                            </label>
                                            <input id="status" type="text" class="form-control" disabled />
                                        </div>
                                    </div> -->

                                    <div class="row" style="margin-top: 10px;">
                                        <h5 class="col-md-12 mt-3">
                                            Customer Detail
                                        </h5>
                                        <div class="col-md-6">
                                            <label>
                                                Mobile Number
                                            </label>
                                            <input id="mobileNo" type="text" class="form-control" onchange="getCustomerDetail()" oninput="this.value = this.value.replace(/[^0-9.]/g, '') "/>
                                            <span id="mobileNoError" class="errorSpan text-danger"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                Customer Name
                                            </label>
                                            <input id="name" type="text" class="form-control" readonly/>
                                        </div>

                                        <!-- New Address List plugin -->
                                        <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                            <label>Address List</label>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
                                                    <div class="col-xs-12 productBoxes2 default">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <button id="addBillAddress" class="btn btn-primary waves-effect waves-light mb-15">
                                                                   <i class="fa fa-plus-circle"></i> Add Address
                                                                </button>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <input id="billingID" type="text" class="form-control" style="display:none;" readonly>
                                                            </div>
                                                            <div class="col-xs-12 col-md-8">
                                                                <label>Billing Address</label>
                                                                <select id="billingAddressList" type="text" class="form-control" onchange="getBillingAddressDetail()">
                                                                <select>
                                                            </div>
                                                            <!-- <div class="col-xs-12 col-md-4">
                                                                <label>Email</label>
                                                                <input id="billingEmail" type="text" class="form-control" readonly>
                                                            </div> -->
                                                            <!-- <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Remark</label>
                                                                <input id="billingRemark" type="text" class="form-control" value="" readonly></input>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="billingAddrSec" class="col-xs-12" style="display:none;">
                                            <div class="row">
                                                <div class="col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
                                                    <div class="col-xs-12 productBoxes2 default">
                                                        <div class="row">
                                                            <div class="col-xs-8">
                                                                <label>Add Billing Address</label>
                                                            </div>
                                                            <div class="col-xs-4 text-danger text-right">
                                                                <button id="closeBillingAddress" class="btn btn-danger waves-effect waves-light">
                                                                <i class="fa fa-times-circle"></i> Close
                                                            </button>
                                                            </div>
                                                            <div class="col-md-6" style="margin-top: 10px">
                                                                <label>Name</label>
                                                                <input id="addBillingName" type="text" class="form-control">
                                                                <span id="billingNameError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Mobile Number</label>
                                                                <input id="addBillingPhone" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '') ">
                                                                <span id="billingPhoneError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <!-- <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Email</label>
                                                                <input id="addBillingEmail" type="text" class="form-control">
                                                                <span id="billingEmailError" class="errorSpan text-danger"></span>
                                                            </div> -->
                                                            <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Address line 1</label>
                                                                <input id="addBillingAddress" type="text" class="form-control">
                                                                <span id="billingAddressError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Address line 2</label>
                                                                <input id="addBillingAddressLine2" type="text" class="form-control">
                                                                <span id="billingAddressLine2Error" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>PostCode</label>
                                                                <input id="addBillingPostcode" type="text" class="form-control">
                                                                <span id="billingPostCodeError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>City</label>
                                                                <input id="addBillingCity" type="text" class="form-control">
                                                                <span id="billingCityError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>State</label>
                                                                <select id="stateList" type="text" class="form-control">
                                                                <select>
                                                                <span id="billingStateError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Country</label>
                                                                <select id="countryList" type="text" class="form-control">
                                                                <select>
                                                                <span id="billingCountryError" class="errorSpan text-danger"></span>

                                                            </div>
                                                            
                                                            <!-- <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Remark</label>
                                                                <input id="billingRemark" type="text" class="form-control" value="" readonly></input>
                                                            </div> -->
                                                        </div>
                                                        <button id="insertBillAddress" class="btn btn-primary waves-effect waves-light" style="margin-top: 10px;">
                                                            Add Address
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
                                                    <div class="col-xs-12 productBoxes2 default">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <button id="addShipAddress" class="btn btn-primary waves-effect waves-light mb-15">
                                                                    <i class="fa fa-plus-circle"></i> Add Address
                                                                </button>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <input id="shippingID" type="text" class="form-control" style="display:none;" readonly>
                                                                <input id="shippingPostCode" type="text" class="form-control" style="display:none;" readonly>
                                                            </div>
                                                            <div class="col-xs-12 col-md-8">
                                                                <label>Shipping Address</label>
                                                                <select id="shippingAddressList" type="text" class="form-control" onchange="getShippingAddressDetail()">
                                                                <select>
                                                            </div>
                                                            <!-- <div class="col-xs-12 col-md-4">
                                                                <label>Email</label>
                                                                <input id="shippingEmail" type="text" class="form-control" readonly>
                                                            </div> -->
                                                            <!-- <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Remark</label>
                                                                <input id="shippingRemark" type="text" class="form-control" value="" readonly></input>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="shippingAddrSec" class="col-xs-12" style="display:none;">
                                            <div class="row">
                                                <div class="col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
                                                    <div class="col-xs-12 productBoxes2 default">
                                                        <div class="row">
                                                            <div class="col-xs-8">
                                                                <label> Add Shipping Address</label>
                                                            </div>
                                                            <div class="col-xs-4 text-right">
                                                                <button id="closeShippingAddress" class="btn btn-danger waves-effect waves-light">
                                                                    <i class="fa fa-times-circle"></i> Close
                                                                </button>
                                                            </div>
                                                            <div class="col-md-6" style="margin-top: 10px">
                                                                <label>Name</label>
                                                                <input id="addShippingName" type="text" class="form-control">
                                                                <span id="shippingNameError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Mobile Number</label>
                                                                <input id="addShippingPhone" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '') ">
                                                                <span id="shippingPhoneError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <!-- <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Email</label>
                                                                <input id="addShippingEmail" type="text" class="form-control">
                                                                <span id="shippingEmailError" class="errorSpan text-danger"></span>
                                                            </div> -->
                                                            <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Address line 1</label>
                                                                <input id="addShippingAddress" type="text" class="form-control">
                                                                <span id="shippingAddressError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Address line 2</label>
                                                                <input id="addShippingAddressLine2" type="text" class="form-control">
                                                                <span id="shippingAddressLine2Error" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>PostCode</label>
                                                                <input id="addShippingPostcode" type="text" class="form-control">
                                                                <span id="shippingPostCodeError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>City</label>
                                                                <input id="addShippingCity" type="text" class="form-control">
                                                                <span id="shippingCityError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>State</label>
                                                                <select id="stateShippingList" type="text" class="form-control">
                                                                <select>
                                                                <span id="shippingStateError" class="errorSpan text-danger"></span>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top: 10px">
                                                                <label>Country</label>
                                                                <select id="countryShippingList" type="text" class="form-control">
                                                                <select>
                                                                <span id="shippingCountryError" class="errorSpan text-danger"></span>
                                                            </div>
                                                           
                                                            <!-- <div class="col-xs-12" style="margin-top: 10px">
                                                                <label>Remark</label>
                                                                <input id="billingRemark" type="text" class="form-control" value="" readonly></input>
                                                            </div> -->
                                                        </div>
                                                        <button id="insertShipAddress" class="btn btn-primary waves-effect waves-light" style="margin-top: 10px">
                                                            Add Address
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- New Address List plugin end here -->
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <h5 class="col-md-12 mt-5">
                                                    Product Detail
                                                </h5>
                                                <div id="appendProduct">
                                                    <div class="col-md-12">
                                                        <div class="addProductWrapper default">
                                                            <span class="dtxt">Default</span>
                                                            
                                                            <div class="row" id="pr1">
                                                                <div class="col-md-2">
                                                                    <label>1. SKU </label>
                                                                    <input id="codeProductInput1" class="form-control codeInput" readonly>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Product</label>
                                                                    <select id="productSelect1" class="form-control productSelect" required></select>
                                                                    <input id="noteProductInput1" class="form-control" style="display: none;" readonly>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Quantity</label>
                                                                    <input id="quantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Sale Price</label>
                                                                    <input id="cost1" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" required readonly/>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Total Amount</label>
                                                                    <input id="total1" type="number" value="0.00" class="form-control totalInput" readonly/>
                                                                    
                                                                    <input id="id1" type="text" class="form-control hide"/>
                                                                    <input id="action1" type="text" class="form-control hide" value="" type="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="addProduct" onclick="addRow()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Product</span>
                                                    </div>
                                                    <!-- <div class="addProduct" onclick="addServiceRow()" style="margin-left: 20px">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Service</span>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="display:none">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <h5 class="col-md-12 mt-5">
                                                    Payment Detail
                                                </h5>
                                                <div class="col-md-6">
                                                    <label>
                                                        Delivery Option
                                                    </label>
                                                    <select id="delivery" type="text" class="form-control" dataType="text" onchange="getDeliveryFee()">
                                                        <option value="">
                                                            Please select one option
                                                        </option>
                                                        <option value="delivery">
                                                            Delivery
                                                        </option>
                                                        <option value="pickup">
                                                            Pickup
                                                        </option>
                                                    </select> 
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label>
                                                        Payment method
                                                    </label>
                                                    <select id="payment_method" type="text" class="form-control" dataType="text">
                                                        <option value="">
                                                            Please select one option
                                                        </option>
                                                        <option value="FPX">
                                                            FPX Online Banking
                                                        </option>
                                                        <option value="QRCode">
                                                            QR code
                                                        </option>
                                                        <option value="ManualBankTransfer">
                                                            Manual Bank Transfer
                                                        </option>
                                                    </select> 
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;display:none">
                                            <label>Subtotal</label>
                                            <input id="subtotal" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Payment Tax</label>
                                            <input id="payment_tax" class="form-control" value="0.00" type="number" readonly>
                                        </div> -->
                                        <div class="col-md-6" style="margin-top: 30px;display:none">
                                            <label>Shipping Fee</label>
                                            <input id="shipping_fee" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Grand Total</label>
                                            <input id="grandtotal" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Remarks</label>
                                            <textarea id="remarks" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <p id="errorInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 20px;margin-left: 20px;"><img src="images/alertIcon.png" width="20px"><span id="errorText" style="margin-left: 15px;">&nbsp;Your mobile or password is incorrect. Please try again.</span></p>
                                        <div class="col-md-12 m-t-20" id="actions">
                                            <button id="addSOBtn" class="btn btn-primary waves-effect waves-light m-r-10">
                                                Add SO
                                            </button>
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
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var url2            = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback       = "";
    // var editId          = "<?php echo $_POST['id']; ?>";
    // var status          = "<?php echo $_POST['status']; ?>";
    // var createdAt       = "<?php echo $_POST['createdAt']; ?>";
    // var vendor          = "<?php echo $_POST['vendor']; ?>";
    var html = `<option value="">Select Product</option>`;
    var product_list      = null;
    var wrapperLength = 2;
    var subtotal = 0;
    var action = "";
    var typeR = "";
    var totalLoop =[1];
    var vendor_id_ini = "";
    var tableIndex;
    var grandtotal = "";
    var step = "";
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";
    var addCSCount = 1;
    var cTNum = 1;
    var getDeliveryOption = 0;
    var buildOption;
    var buildOptionLength = 0;
    var buildOption2;
    var buildOptionLength2 = 0;
    var buildOptionLengthState = 0;
    var buildOptionLengthCountry = 0;
    var buildOptionState;
    var buildOptionCountry;
    var buildOptionLengthState2 = 0;
    var buildOptionLengthCountry2 = 0;
    var buildOptionState2;
    var buildOptionCountry2;
    var clientID = "";
    var productArray = [1];
    var serviceArray = [];



    $(document).ready(function() {
        
        $("#status").val('Draft');

        var formData = {
            command        : "getProduct",
        };
        fCallback = productListOpt;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $(".productSelect").change(function () {
            $('.errorSpan').empty();
            $('#errorInput').hide();

            var select_id = this.id;
            var product_cost = $('option:selected', this).attr('datacost');
            var product_barcode = $('option:selected', this).attr('datacode');
            var costID = "#cost" + select_id.substring(13);
            var codeID = "#codeProductInput" + select_id.substring(13);
            $(costID).val(product_cost);
            $(codeID).val(product_barcode);
            $(".quantityInput").keyup();
            $('.totalInput').trigger('change');

            countSubtotal();
        });

        $('#addSOBtn').click(function() {

            $('.errorSpan').empty();
            $('#errorInput').hide();

            var productSet  = [];
            var serviceSet  = [];
            var    shipping_fee        = $("#shipping_fee").val();
            var    payment_amount      = $("#grandtotal").val();
            var    payment_tax         = $("#payment_tax").val();
            // var    payment_method      = $("#payment_method").val();
            var    delivery_method     = $("#delivery").val();
            var    billingAddr         = $("#billingID").val();
            var    shippingAddr        = $("#shippingID").val();
            var    mobileNumber        = $("#mobileNo").val();

            // if(!mobileNumber){
            //     $('#errorInput').show();
			// 	$('#errorText').text("Please enter mobile number");
			// 	return false;
            // }

            if(!clientID){
                $('#errorInput').show();
				$('#errorText').text("Please enter valid mobile number");
				return false;
            }

            // if(!payment_method){
            //     $('#errorInput').show();
			// 	$('#errorText').text("Please select payment method");
			// 	return false;
            // }

            // if(!delivery_method){
            //     $('#errorInput').show();
			// 	$('#errorText').text("Please select delivery method");
			// 	return false;
            // }

            if(!billingAddr){
                $('#errorInput').show();
				$('#errorText').text("Please choose billing address");
				return false;
            }

            if(!shippingAddr){
                $('#errorInput').show();
				$('#errorText').text("Please choose shipping address");
				return false;
            }

            // Set Product Array
            for (var v of productArray) {
                var name = $('option:selected', "#productSelect" + v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();

                if ($("#productType" + v).val() == "note") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                } else {
                    var product_id = $('option:selected', "#productSelect" + v).val();
                }

                var id = $('#id' + v).val();
                var action = $('#action' + v).val();

                if ($('#action' + v).val() == "add" && $('#id' + v).val() != "") {
                    action = "";
                }
                if ($('#action' + v).val() == "add" && $('#id' + v).val() == "") {
                    action = "add";
                }

                var perProduct = {
                    product_id: product_id,
                    name: name,
                    cost: cost,
                    quantity: quantity,
                    action: action,
                };

                // if ($('#action' + v).val() != "delete") {
                //     productSet.push(perProduct);
                // }

                if(perProduct['action'] != "delete"){
                    productSet.push(perProduct);
                }
            }


            for (var i = 0; i < productSet.length; i++) {
                if (productSet[i].product_id === "") {
                    $('#errorInput').show();
                    $('#errorText').text("Please choose product");
                    return false;
                }
            }

            for (var i = 0; i < productSet.length; i++) {
                if (productSet[i].quantity === "0") {
                    $('#errorInput').show();
                    $('#errorText').text("Please enter product quantity");
                    return false;
                }
            }

            // Set Service Array

            for (var i of serviceArray) {
                var name = $('option:selected', "#serviceSelect"+i).val();
                var cost = $('#cost' + i).val();
                var quantity = $('#quantity' + i).val();

                if($("#productType" + i).val() == "note") {
                    var product_id = "0";
                    var name = $("#noteProductInput"+i).val();
                } else {
                    var product_id = $('option:selected', "#serviceSelect"+i).val();
                }

                var id = $('#id'+i).val();
                action = $('#action'+i).val();

                if($('#action'+i).val() == "add" && $('#id'+i).val() != "") {
                    action = "";
                }
                if($('#action'+i).val() == "add" && $('#id'+i).val() == "") {
                    action = "add";
                }

                var perService = {
                    product_id : product_id,
                    name : name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                }

                if(perService['action'] != "delete"){
                    serviceSet.push(perService);
                }
            }

            for (var i = 0; i < serviceSet.length; i++) {
                if (serviceSet[i].product_id === "") {
                    $('#errorInput').show();
                    $('#errorText').text("Please choose service");
                    return false;
                }
            }

            for (var i = 0; i < serviceSet.length; i++) {
                if (serviceSet[i].quantity === "") {
                    $('#errorInput').show();
                    $('#errorText').text("Please enter service quantity");
                    return false;
                }
            }

            var formData = {
                command             : "addNewSO",
                orderDetailArray    : productSet,
                orderServiceArray   : serviceSet,
                clientID            : clientID,
                shipping_fee        : $("#shipping_fee").val(),
                payment_amount      : $("#grandtotal").val(),
                // payment_tax         : $("#payment_tax").val(),
                // payment_method      : $("#payment_method").val(),
                delivery_method     : $("#delivery").val(),
                billingAddr         : $("#billingID").val(),
                shippingAddr        : $("#shippingID").val(),
                shippingPostCode    : $("#shippingPostCode").val(),
                // status: status,
            };
            var fCallback = sendAdd;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });

    $('#addBillAddress').click(function() {
        $('.errorSpan').empty();
        $('#errorInput').hide();

        $("#billingAddrSec").show();

        var formData = {
            command             : "getListing",
        };
        var fCallback = displayCountryList;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    $('#insertBillAddress').click(function() {

        $('.errorSpan').empty();
        $('#errorInput').hide();

        // billing Address
        var    billingName          = $("#addBillingName").val();
        var    billingEmail         = $("#addBillingEmail").val();
        var    billingPhone         = $("#addBillingPhone").val();
        var    billingAddress       = $("#addBillingAddress").val();
        var    billingAddressLine2  = $("#addBillingAddressLine2").val();
        var    billingPostCode      = $("#addBillingPostcode").val();
        var    billingCity          = $("#addBillingCity").val();
        var    billingState         = $("#stateList").val();
        var    billingCountry       = $("#countryList").val();


        var formData = {
            command             : "insertMemberAddress",
            billingName         : billingName,
            billingEmail        : billingEmail,
            billingPhone        : billingPhone,
            billingAddress      : billingAddress,
            billingAddressLine2 : billingAddressLine2,
            billingPostCode     : billingPostCode,
            billingCity         : billingCity,
            billingState        : billingState,
            billingCountry      : billingCountry,
            clientID            : clientID,
            addressType         : "billing",
        }
        var fCallback = insertAddress;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#insertShipAddress').click(function() {

        $('.errorSpan').empty();
        $('#errorInput').hide();

        // billing Address
        var    billingName          = $("#addShippingName").val();
        var    billingEmail         = $("#addShippingEmail").val();
        var    billingPhone         = $("#addShippingPhone").val();
        var    billingAddress       = $("#addShippingAddress").val();
        var    billingAddressLine2  = $("#addShippingAddressLine2").val();
        var    billingPostCode      = $("#addShippingPostcode").val();
        var    billingCity          = $("#addShippingCity").val();
        var    billingState         = $("#stateShippingList").val();
        var    billingCountry       = $("#countryShippingList").val();

        var formData = {
            command             : "insertMemberAddress",
            billingName         : billingName,
            billingEmail        : billingEmail,
            billingPhone        : billingPhone,
            billingAddress      : billingAddress,
            billingAddressLine2 : billingAddressLine2,
            billingPostCode     : billingPostCode,
            billingCity         : billingCity,
            billingState        : billingState,
            billingCountry      : billingCountry,
            clientID            : clientID,
            addressType         : "shipping",
        }
        var fCallback = insertAddressShipping;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function insertAddress(data, message) {  
        $('.errorSpan').empty();
        $('#errorInput').hide();

        showMessage('Billing Address has been successfully added', 'success', 'Billing Address added', 'check', 'addSaleOrder.php');
    }

    function insertAddressShipping(data, message) {  
        $('.errorSpan').empty();
        $('#errorInput').hide();

        showMessage('Shipping Address has been successfully added', 'success', 'Shipping Address added', 'check', 'addSaleOrder.php');
    }
    
    $('#addShipAddress').click(function() {
        $('.errorSpan').empty();
        $('#errorInput').hide();
        $("#shippingAddrSec").show();

        var formData = {
            command             : "getListing",
        };
        var fCallback = displayShipCountryList;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    function displayShipCountryList(data) {
        $('.errorSpan').empty();
        $('#errorInput').hide();

        buildOptionLengthState2 = 0;
        buildOptionLengthCountry2 = 0;


        if(data){
            buildOptionState2 = `
                <option value="">Select State</option>
            `;
            $.each(data.state, function(k,v) {
                buildOptionState2 += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
                buildOptionLengthState2 = buildOptionLengthState2 + 1;
            });
        }

        var selectList = $('#stateShippingList');
        selectList.empty(); 
        selectList.append(buildOptionState2);

        if(data){
            buildOptionCountry2 = `
                <option value="">Select Country</option>
            `;
            $.each(data.country, function(k,v) {
                buildOptionCountry2 += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
                buildOptionLengthCountry2 = buildOptionLengthCountry2 + 1;
            });
        }

        var selectList = $('#countryShippingList');
        selectList.empty(); 
        selectList.append(buildOptionCountry2);

    }

    function displayCountryList(data) {
        $('.errorSpan').empty();
        $('#errorInput').hide();
        buildOptionLengthState = 0;
        buildOptionLengthCountry = 0;

        if(data){
            buildOptionState = `
                <option value="">Select State</option>
            `;
            $.each(data.state, function(k,v) {
                buildOptionState += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
                buildOptionLengthState = buildOptionLengthState + 1;
            });
        }

        var selectList = $('#stateList');
        selectList.empty(); 
        selectList.append(buildOptionState);

        if(data){
            buildOptionCountry = `
                <option value="">Select Country</option>
            `;
            $.each(data.country, function(k,v) {
                buildOptionCountry += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
                buildOptionLengthCountry = buildOptionLengthCountry + 1;
            });
        }

        var selectList = $('#countryList');
        selectList.empty(); 
        selectList.append(buildOptionCountry);

    }

    $('#closeBillingAddress').click(function() {
        $("#billingAddrSec").hide();
    });

    $('#closeShippingAddress').click(function() {
        $("#shippingAddrSec").hide();
    });


    function productListOpt(data, message) {
        $('.errorSpan').empty();
        $('#errorInput').hide();
        var product = data.getProductDetail;

        if(product) {
            $.each(product, function(i, obj) {
                html += `<option value="${obj.id}" datacode="${obj.barcode}" datacost="${obj.sale_price}">${obj.name}</option>`;
            });
            
            $(".productSelect").html(html);
        }

        $('#productSelect1').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });       
    }

    function getDeliveryFee(id) {
        $('.errorSpan').empty();
        $('#errorInput').hide();

        // store delivery method id 
        serviceArray.push(id);
        var select_id       = id;
        var getSelectNameID = document.getElementById("serviceSelect" + select_id);
        var selectName      = getSelectNameID.value;

        var formData = {
            command        : "getDeliveryFee",
            deliveryMethod : selectName,
            id             : id
        };
        fCallback = displayDeliveryFee;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayDeliveryFee(data) {
        $('.errorSpan').empty();
        $('#errorInput').hide();
        var fee = data['fee'];
        var id = data['id'];
        
        if(data['type'] == 'shippingFee'){
            $('#shipping_fee').val(fee);
            $("#cost" + id).val(fee);
            $("#quantity" + id).val(data['quantity']);
            $("#total" + id).val(data['total'].toFixed(2));
        }

        var subtotal = parseFloat($("#subtotal").val());
        var fee = parseFloat($("#shipping_fee").val());

        var grantotal = subtotal + fee;

        $("#grandtotal").val(parseFloat(grantotal).toFixed(2));
    }

    function searchDeliveryCharges() {
        var elements = document.querySelectorAll('[id^="serviceSelect"]');
        var deliveryChargesFreeShippingValues = [];

        for (var i = 0; i < elements.length; i++) {
            if (elements[i].value === "delivery") {
            deliveryChargesFreeShippingValues.push(elements[i].value);
            // deliveryChargesFreeShippingValues = elements[i].value
            }else if (elements[i].value === "pickup") {
            deliveryChargesFreeShippingValues.push(elements[i].value);
            // deliveryChargesFreeShippingValues = elements[i].value

            }
        }
        return deliveryChargesFreeShippingValues;
    }

    function getCustomerDetail(){
        $('.errorSpan').empty();
        $('#errorInput').hide();

        var mobileNo = document.getElementById("mobileNo");
        var mobileNo = mobileNo.value;

        var formData = {
            command         : 'getCustomerDetail',
            mobileNo        : mobileNo,
        }
        fCallback = displayUserDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "");            
    }

    function getBillingAddressDetail(){
        var selectedValue = $('#billingAddressList').val();

        var formData = {
            command         : 'getCustomerDetail',
            addressID       : selectedValue,
            type            : 'billing',
        }
        fCallback = displayAddressDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "");            
    }

    function getShippingAddressDetail(){
        var selectedValue = $('#shippingAddressList').val();

        var formData = {
            command         : 'getCustomerDetail',
            addressID       : selectedValue,
            type            : 'shipping',
        }
        fCallback = displayAddressDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "");            
    }

    function displayAddressDetail(data){
        var    shippingAddressList       = $("#shippingAddressList").val();
        var    billingAddressList        = $("#billingAddressList").val();
       if(data){
            if(data.address_type == 'billing'){
                $("#billingEmail").val(data.addressList.email);
                // $("#billingRemark").val(data.addressList.remark);
                $("#billingID").val(data.addressList.id);
                if(!data.addressList.email){
                    $("#billingEmail").val('');
                }

            }else if(data.address_type == 'shipping'){
                $("#shippingEmail").val(data.addressList.email);
                // $("#shippingRemark").val(data.addressList.remark);
                $("#shippingID").val(data.addressList.id);
                $("#shippingPostCode").val(data.addressList.post_code);
                if(!data.addressList.email){
                    $("#shippingEmail").val('');
                }
            }
       }

       if(!billingAddressList){
            $("#billingEmail").val('');
            $("#billingID").val('');
       }

       if(!shippingAddressList){
            $("#shippingEmail").val('');
            $("#shippingID").val('');
       }
    }

    $("#subtotal").change(function () {
        // grantotal = $("#subtotal").val() + $("#payment_tax").val() + $("#shipping_fee").val();
        var subtotal = parseFloat($("#subtotal").val());
        // var paymentTax = parseFloat($("#payment_tax").val());
        var shippingFee = parseFloat($("#shipping_fee").val());

        var grantotal = subtotal + shippingFee;

        $("#grandtotal").val(parseFloat(grantotal).toFixed(2));
    })

    function displayUserDetail(data){
        if(!data){
            $('#name').val('');
            $('#mobileNo').val('');
            clientID = '';
            
            $('#billingAddressList option[value!=""]').remove();
            $('#shippingAddressList option[value!=""]').remove();

            var    mobileNumber        = $("#mobileNo").val();

            if(!mobileNumber){
                $('#errorInput').show();
				$('#errorText').text("Please enter mobile number");
				return false;
            }
        } 
       if(data){
            $('#name').val(data.userDetail.name);
            clientID = data.userDetail.id;
        }   

       buildOptionLength = 0;

       if(data){
            buildOption = `
                <option value="">Select Address</option>
            `;
            if(data.billingAddressList != null)
            {
                $.each(data.billingAddressList, function(k,v) {
                    buildOption += `
                        <option value="${v['id']}">${v['address']}</option>
                    `;
                    buildOptionLength = buildOptionLength + 1;
                });
                var selectList = $('#billingAddressList');
                selectList.empty(); 
                selectList.append(buildOption);
            }
        }

        if(data){
            buildOption2 = `
                <option value="">Select Address</option>
            `;
            if(data.shippingAddressList != null)
            {
                $.each(data.shippingAddressList, function(k,v) {
                    buildOption2 += `
                        <option value="${v['id']}">${v['address']}</option>
                    `;
                    buildOptionLength2 = buildOptionLength2 + 1;
                });
    
                var selectList = $('#shippingAddressList');
                selectList.empty(); 
                selectList.append(buildOption2);
            }
        }
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = yyyy+'-'+mm+'-'+dd;
        
        $('#buyingDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        var dateToday = $('#buyingDate').val(today);

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    $(".quantityInput").keyup(function () {
        this.value|=0;

        var quantity_id = this.id;
        var totalID = "#total" + quantity_id.substring(8);
        var quantity = $('#' + quantity_id).val();
        var product_cost_id = '#cost' + quantity_id.substring(8); 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity).toFixed(2));
        $('.totalInput').trigger('change');
        countSubtotal();
    })

    $(".costInput").keyup(function () {
        // this.value|=0;

        var cost_id = this.id;
        var totalID = "#total" + cost_id.substring(4);
        var quantity_id = "#quantity" + cost_id.substring(4);
        var quantity = $(quantity_id).val();
        var product_cost_id = '#cost' + cost_id.substring(4); 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity,2).toFixed(2));
        $('.totalInput').trigger('change');
        countSubtotal();
    })

    function loadFormDropdown(data, message) {
        roleData = data.roleList;

        $.each(roleData, function(key) {
            $('#roleID').append('<option value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });
    }

    function productDetails() {
        var formData = {
            command        : "getProduct",
        };
        fCallback = productListOpt;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayProductList(data, message) {
        if (data && data.length > 0) {
            var productName = '';
            $.each(data, function(k, v) {
                productName += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
            });

            $('#product_name').html(productName);
        }
    }

    function loadFormDropdownVendor(data, message) {
        vendorData = data.getVendorDetail;
        $.each(vendorData, function(key, val) {
            var vName = val['name'];
            $('#vendorDropdown').append($('<option>', {
                value: val['id'],
                text: vName
            }));
        });

        $("#vendorDropdown").val(vendor_id_ini);
    }

    function loadFormDropdownProduct(data, message) {
        $.each(productData, function(key, val) {
            var pName = val['name'];
            $('#product_name').append($('<option>', {
                value: val['id'],
                text: pName
            }));
        });
    }

    function addRow(data){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">

                        <div class="col-md-2">
                            <label>${(wrapperLength)}.  SKU </label>
                            <input id="codeProductInput${(wrapperLength)}" class="form-control codeInput" readonly>
                        </div>
                        <div class="col-md-4">
                            <label><font id="noteProductLabel${(wrapperLength)}">Product</font></label>
                            <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>                                                                 
                            </select>
                            <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;" readonly>
                            <input id="productType${(wrapperLength)}" class="form-control hide">
                        </div>
                        <div class="col-md-2">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="0" placeholder="0" required/>
                        </div>
                        <div class="col-md-2">
                            <label>Sale Price</label>
                            <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                        </div>
                        <div class="col-md-2">
                            <label>Total Amount</label>
                            <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>

                            <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
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

    function addServiceRow(data){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="addServiceWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-3">
                        <label>${(wrapperLength)}.  Service </label>
                            <select id="serviceSelect${(wrapperLength)}" onchange="getDeliveryFee(${(wrapperLength)});" class="form-control productSelect" required>   
                                <option value="">Select Service</option>
                                <option value="delivery">Delivery</option>
                                <option value="pickup">Pickup</option>
                            </select>
                            <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;" readonly>
                            <input id="productType${(wrapperLength)}" class="form-control hide">
                        </div>
                        <div class="col-md-3">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="0" placeholder="0" disabled/>
                        </div>
                        <div class="col-md-3">
                            <label>Sale Price</label>
                            <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                        </div>
                        <div class="col-md-3">
                            <label>Total Amount</label>
                            <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>

                            <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
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

    function closeRow(rowIndex) {
        var rowSelector = `#pr${rowIndex}`;
        $(rowSelector).parent().remove();
    }

    function addFOC(data){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-4">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" class="form-control productSelect" required>                                                                 
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="0" placeholder="0" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Cost</label>
                            <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                        </div>
                        <div class="col-md-3">
                            <label>Total Amount</label>
                            <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>

                            <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="foc" type="foc"/>
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

    function closeDiv(n,id) {
        var totalLoop =[1];
        const index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        $("#closeBtn" + id).css("display","none");
        $("#total" + id).val(0.00);
        $("#quantity" + id).val(0);
        $("#quantity" + id).attr("disabled", true);;
        $("#productSelect" + id).attr("disabled", true);

        countSubtotal();
    }

    function countSubtotal() {
        var subtotal = 0;
        for(var i = 1; i < $(".totalInput").length + 1; i++) {
            if($("#total" + i).val() == "undefined") {
                $("#total" + i).val(0);
            }

            var total = $("#total" + i).val();
            subtotal += parseFloat(total);
        }

        $("#subtotal").val(subtotal.toFixed(2)).change();
    }
    
   

    function keyinQuantity() {
        var quantity = $("#quantity1").val(); 
        var total_per_row = quantity * product_cost;
        var decimal_total_per_row = total_per_row.toFixed(2);

        $('#total1').val(decimal_total_per_row);
    }

    function loopSelect(id) {
        productArray.push(id);
        var select_id = id;
        var productSelect = "#productSelect" + select_id;
        var product_cost = $('option:selected', productSelect).attr('datacost');
        var costID = "#cost" + select_id;
        $(costID).val(product_cost);

        // var codeSelect = "#codeInput" + select_id;
        var product_barcode = $('option:selected', productSelect).attr('datacode');
        var codeID = "#codeProductInput" + select_id;
        $(codeID).val(product_barcode);

        $("#quantityInput" + id).keyup(id);
        $("#totalInput" + id).trigger('change');
        countSubtotal();
        loopQuantity(id);
    }

    function loopQuantity(id) { 
        this.value|=0;

        var quantity_id = id;
        var totalID = "#total" + quantity_id;
        var quantity = $('#quantity' + quantity_id).val();
        var product_cost_id = '#cost' + quantity_id; 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity).toFixed(2));
        $("#totalInput" + id).trigger('change');
        countSubtotal();
    }

    $(".quantityInput").keyup(function() {
        countSubtotal();
    })

    

    // function selectPR(data, message) {
    //     $.each(data.orderDetails, function (m, v) {
    //         var newM = m + 1;

    //         $("#productSelect" + newM).val(v['product_id']);
    //     });
    // }

    function sendAdd(data, message) {       
        showMessage('Sale Order Has been Added', 'success', 'Sale Order Added', 'check', 'purchaseOrder.php');
    }

    function generateSerial(data, message) {
        var showIncrement = data.showIncrement;

        showIncrement = showIncrement.join(';');

        $('#serialShowIncrement').val(showIncrement);

        var serial_number = data.serial_number;
        $('#serial').val(serial_number.join('  ||  '));

        $("#confirmSerial").attr("disabled", false);
    }

    function clearSerial(){
        $('#serial').val('');
        $("#confirmSerial").attr("disabled", true);
    }

   
    $('input[type="checkbox"]').change(function() {
        if(this.checked === true) {
            step = 1;
        } else {
            step = "";
        }
    })

   

    function successSaveStockOut() {
        showMessage('Stock out saved.', 'success', 'Stock Out', 'check', 'purchaseOrder.php');
    }

   

    function successTracking() {
        showMessage('Tracking number saved.', 'success', 'Tracking Number', 'check', 'purchaseOrder.php');
    }

   

    function successDelivered() {
        showMessage('Status updated to Delivered', 'success', 'Delivered', 'check', 'purchaseOrder.php');
    }

    function changeStatus(e) {
        status = $(e).val();
    }

    function viewReceipt() {
        $('#viewReceiptModal').modal();
    }

    function loadEdit(data, message) {
        $("#payment_tax").val(data.payment_tax.toFixed(2));
        $("#shipping_fee").val(parseFloat(data.shipping_fee).toFixed(2));

        productList = data;

        // Allow admin to change status & view receipt if status = Pending Payment Approve
        if(status == "Pending Payment Approve") {
            $('#statusGroup').html(`
                <div class="col-md-6">
                    <label>
                        Status
                    </label>
                    <select id="status" class="form-control" onchange="changeStatus(this)">
                        <option value="${status}">${status}</option>
                        <option value="Paid">Paid</option>
                        <option value="Cancelled">Cancelled</option>                       
                    </select>
                </div>
            `);

            var receiptImg = data.receipt;
            if(receiptImg) {
                $('#receiptImg').attr('src', receiptImg);
                $('#receiptPdf').attr('src', receiptImg);

            if(data.file_type=="pdf") {
                $('#receiptImg').hide();
                $('#receiptPdf').show();
            } else {
                $('#receiptImg').show();
                $('#receiptPdf').hide();
            }

                $('#viewReceiptBtn').append(`
                    <button onclick="viewReceipt()" type="submit" class="btn btn-info waves-effect waves-light m-r-10 m-b-10">
                        View Receipt
                    </button>
                `);
            } 
        }

        if(data.so_status != "Draft" && data.so_status != "Pending" && data.so_status != "Pending Payment Approve") {
            $("#remarks").attr("disabled", true);
            $("input").attr("disabled", true);
            $("select").attr("disabled", true);
            $(".addProduct").css("display", "none");
            $("#edit").attr("disabled", true);
            $("#approve").attr("disabled", true);
            $(".closeBtn").css("display", "none");
            $("#serialNumberTable").css("display", "block");
            $('input[type="checkbox"]').attr("disabled", false);
        }

        if(data.so_status == "Paid" || data.so_status == "Packed" || data.so_status == "Out of Delivery" || data.so_status == "Out For Delivery") {
            $("#trackingNo").removeAttr('disabled');
            $(".stockOutInput").removeAttr("disabled");
        }


        if(data.so_status == "Delivered") {
            $(".stockOutInput").attr("disabled", "true");
            $("#trackingNo").removeAttr('disabled');
            $("#updateDelivered").attr("disabled", "true");
        }  

        loopQuantity(productList.length);
    }

    function removeUrl(e) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');
        $(e).val(serialNo);
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
