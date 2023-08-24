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
                                <h4 class="header-title m-t-0 m-b-30">
                                    Sales Order: <b id="saleNo"></b>
                                </h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" id="viewReceiptBtn">
                                            
                                        </div>
                                    </div>
                                    <div class="row" id="statusGroup">
                                        <div class="col-md-6">
                                            <label>
                                                Status
                                            </label>
                                            <input id="status" type="text" class="form-control" disabled />
                                        </div>
                                        <div id="creditNoteReferenceRow" class="col-md-6" style="display:none;">
                                            <label>
                                                Remittance reference number
                                            </label>
                                            <input id="creditNoteReference" type="text" class="form-control" disabled />
                                            
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <h5 class="col-md-12 mt-3">
                                            Customer Detail
                                        </h5>
                                        <div class="col-md-6">
                                            <label>
                                                Mobile Number
                                            </label>
                                            <input id="mobileNo" type="text" class="form-control" onchange="getCustomerDetail()" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" disabled />
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
                                                <div class="col-sm-8 col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
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
                                                            <div class="col-xs-12">
                                                                <label>Billing Address</label>
                                                                <select id="billingAddressList" type="text" class="form-control" onchange="getBillingAddressDetail()">
                                                                <select>
                                                            </div>
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
                                                <div class="col-sm-8 col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">
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
                                                            <div class="col-xs-12">
                                                                <label>Shipping Address</label>
                                                                <select id="shippingAddressList" type="text" class="form-control" onchange="getShippingAddressDetail()">
                                                                <select>
                                                            </div>
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
                                                <div id="appendProduct">
                                                    <div class="col-md-12">
                                                        <div class="addProductWrapper default">
                                                            <span class="dtxt">Default</span>
                                                            
                                                            <div class="row" id="pr1">
                                                                <div class="col-md-4">
                                                                    <label>1. <span id="noteProductLabel1">Product</span></label>
                                                                    <select id="productSelect1" class="form-control productSelect" required></select>
                                                                    <input id="noteProductInput1" class="form-control" style="display: none;">
                                                                    <input id="productType1" class="form-control hide">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Quantity</label>
                                                                    <input id="quantity1" type="number" oninput="productListOpt()" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Sale Price</label>
                                                                    <input id="cost1" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" required readonly/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Total Amount</label>
                                                                    <input id="total1" type="number" value="0.00" class="form-control totalInput" readonly/>
                                                                    
                                                                    <input id="id1" type="text" class="form-control hide"/>
                                                                    <input id="action1" type="text" class="form-control hide"/ value="" type="">
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
                                                    <div class="addProduct" onclick="addNoteRow()" style="margin-left: 20px">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Note</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <h5 class="col-md-12 mt-5">
                                                    Payment Detail
                                                </h5>
                                                <div class="col-md-6" style="display:none">
                                                    <label>
                                                        Delivery Option
                                                    </label>
                                                    <select id="delivery111" class="form-control" dataType="text" onchange="getDeliveryFee()">
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
                                                <div class="col-md-6">
                                                    <label>
                                                        Payment method
                                                    </label>
                                                    <select id="payment_method" type="text" class="form-control" dataType="text" onchange="displayReceipt()">
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Receipt -->
                                    <div class="row">
                                        <!-- <div class="col-md-12"> -->
                                            <div id="uploadReceiptSection" class="col-md-12 mt-5"  style="margin-top: 10px;margin-bottom: 20px;display:none">
                                                <!-- <?php if($_POST['manualBankTransfer']) { ?> -->
                                                    <!-- Manual Bank Transfer -->
                                                    <!-- <div class="bodyText larger bold pb-3" data-lang="M03839"><?php echo $translations['M03839'][$language] /* Manual Bank Transfer */ ?></div>
                                                    <div class="greyBg">
                                                        <div class="borderAll grey normal px-5 py-4">
                                                            <div class="mx-2" data-lang="M03841"><?php echo $translations['M03841'][$language] /* Please transfer the total price to the below bank account. */ ?></div>
                                                            <div class="text-center my-3">
                                                                <img class="paymentMethodContainer" src="images/maybank.png" width="220px" height="180px">
                                                            </div>
                                                            <div class="text-red font-italic" data-lang="M03842"><?php echo $translations['M03842'][$language] /* ** Please DM us with your location and postcode to ensure your location is cover by us ** */ ?></div>
                                                        </div>
                                                    </div> -->
                                                <!-- <?php } else if ($_POST['qrCodePayment']) { ?> -->
                                                    <!-- QR Code Payment -->
                                                    <!-- <div class="bodyText larger bold pb-3" data-lang="M03840"><?php echo $translations['M03840'][$language] /* QR Code */ ?></div>
                                                    <div class="greyBg">
                                                        <div class="borderAll grey normal px-5 py-4">
                                                            <div class="mx-2" data-lang="M03843"><?php echo $translations['M03843'][$language] /* Please scan the QR Code below to make payment. */ ?></div>
                                                            <div class="text-center my-3">
                                                                <img class="paymentMethodContainer" src="images/project/qr-code.png" width="220px" height="250px">
                                                            </div>
                                                            <div class="text-red font-italic" data-lang="M03842"><?php echo $translations['M03842'][$language] /* ** Please DM us with your location and postcode to ensure your location is cover by us ** */ ?></div>
                                                        </div>
                                                    </div>
                                                <?php } ?> -->

                                                <!-- Upload Receipt -->
                                                <div class="form-group mt-5">
                                                    <!-- <label for="uploadReceipt"><span class="text-red">*</span data-lang="M03844"> <?php echo $translations['M03844'][$language] /* Upload Receipt */ ?></label> -->
                                                    <div class="position-relative">
                                                        <input class="form-control" type="text" id="receiptName" readonly>
                                                        <input class="form-control" type="hidden" id="receiptData">
                                                        <input class="form-control" type="hidden" id="receiptSize">
                                                        <input class="form-control" type="hidden" id="receiptType">
                                                        <!-- <button type="button" class="btn btn-primary grey px-3 py-2 bodyText smaller uploadReceipt" id="uploadBtn" data-lang="M03844"> <?php echo $translations['M03844'][$language] /* Upload Receipt */ ?></button> -->
                                                    </div>
                                                    <input type="file" id="uploadReceipt" class="d-none" accept=".jpg, .jpeg, .png, .pdf">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>
                                                Promo Code
                                            </label>
                                            <input id="promoCode" type="text" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row" style = "display:none">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Subtotal</label>
                                            <input id="subtotal" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>

                                    <div class="row" style = "display:none">
                                        <div class="col-md-6" style="margin-top: 30px;">
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

                                    <div class="row">
                                        <p id="errorInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 20px;margin-left: 20px;"><img src="images/alertIcon.png" width="20px"><span id="errorText" style="margin-left: 15px;">&nbsp;Your mobile or password is incorrect. Please try again.</span></p>
                                        <div class="col-md-12 m-t-20" id="actions">
                                            <button id="addSOBtn" class="btn btn-primary waves-effect waves-light m-r-10">
                                                Add SO
                                            </button>
                                            <button id="edit" class="btn btn-primary waves-effect waves-light m-r-10">
                                                <?php echo $translations['A01786'][$language]; /* Update SO */ ?>
                                            </button>
                                            <button id="editPaid" class="btn btn-primary waves-effect waves-light m-r-10">
                                                <?php echo $translations['A01787'][$language]; /* Register Payment */ ?>
                                            </button> 
                                            <button id="editCancel" class="btn btn-primary waves-effect waves-light m-r-10">
                                                <?php echo $translations['A01788'][$language]; /* Cancel SO */ ?>
                                            </button>
                                            <button id="editOrderProcessing" class="btn btn-primary waves-effect waves-light m-r-10" style="display:none">
                                                Update to order processing
                                            </button>
                                            <button id="addCreditNoteBtn" class="btn btn-primary waves-effect waves-light m-r-10" style="">
                                                Add Credit Note
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- Item List -->
                    <div class="row">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box" id="stockOut">
                                <p class="text-center foc-title">Item List</p>
                                <input class="form-control m-b-10" type="text" id="inputSerial" onchange="removeUrl(this, event)" style="display:none">
                                <div id="stockOutTable">
                                    
                                </div>
                                <button id="saveStockOut" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;display:none">Stock Out</button>
                                <button id="displayDO" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;display:none;">Start DO</button>
                            </div>
                        <div>
                    </div>
                    <!-- End Item List -->

                    <!-- Delivery Order -->
                    <div class="row" id="deliveryOrderRow">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box" id="deliveryOrder" style="display:none">
                                <p class="text-center foc-title">Delivery Order <font id="deliveryOrderID"></font></p>
                                <input class="form-control m-b-10" type="text" id="inputSerialDO" >
                                <div id="deliveryOrderTable">
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="skipWarning" type="checkbox" value="">
                                    <label for="checkbox2">
                                        Check to ignore extra stock warning
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="stockOutMystery" type="checkbox" value="">
                                    <label for="checkbox3">
                                        Check to stock out mystery food
                                    </label>
                                </div>

                                <button id="saveDeliveryOrder" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Create Airway Draft</button>
                            </div>
                        <div>
                    </div>
                    <!-- End of Delivery Order -->

                     <!-- Delivery Order List-->
                     <div class="row" id="displayDOList" style="display:none">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <div id="doList">
                                    <p class="text-center foc-title">Delivery Order List</p>
                                </div>
                                <button id="updateTrackStatus" class="btn btn-primary m-t-15" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;display:none">Confirmed Received</button>
                                <button id="updateDeliverStatus" class="btn btn-primary m-t-15" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;display:none">Confirmed Delivered</button>
                            </div>
                        <div>
                    </div>
                    <!-- End of Delivery Order List -->

                    <div class="row" id="shippingMethodDiv" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4 class="header-title m-t-0 m-b-30">Shipping Method</h4>
                                    </div>
                                    <div class="col-12" id="status" style="display:flex; align-items: center; justify-content: space-around;">
                                        <div class="radio radio-inline">
                                            <input id="PARCELHUB" type="radio" value="PARCELHUB" name="shippingMethod" class="statusRadio" />
                                            <label class="text-center" for="PARCELHUB">
                                                <div class="shippingMethodLogo"><img src="images/ParcelHubLogo.png"></div>
                                                <div>PARCELHUB</div>
                                            </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input id="whallo" type="radio" value="Whallo" name="shippingMethod" class="statusRadio" />
                                            <label class="text-center" for="whallo">
                                                <div class="shippingMethodLogo"><img src="images/whallo-logo.png"></div>
                                                <div>Whallo</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="trackingNoDiv" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Shipping Details</h4>
                                <div class="row" id="tracking1" style="display: none;">
                                    <div class="col-md-6">
                                        <label>Tracking Number</label>
                                        <input id="trackingNo" class="form-control trackingNo" type="text">

                                        <button id="saveTrackingNo" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Save</button>
                                    </div>
                                </div>
                                <div class="row" id="tracking2">
                                    <div class="col-md-6" id="shipperDetails">
                                        <div class="form-group m-b-30" style="display:flex; flex-direction: column;">
                                            <label class="m-b-20">Shipper Branch</label>
                                            <div class="radio radio-inline mb-5" style="margin-bottom: 10px;">
                                                <input id="klBranch" type="radio" value="Kuala Lumpur" name="shipperBranch" class="statusRadio" checked />
                                                <label for="klBranch">
                                                    Kuala Lumpur
                                                </label>
                                            </div>
                                            <div class="radio radio-inline" style="margin-left: 0;">
                                                <input id="penangBranch" type="radio" value="Kuala Lumpur" name="shipperBranch" class="statusRadio" />
                                                <label for="penangBranch">
                                                    Penang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parcel Weight (in kg)*</label>
                                                    <input id="parcelWeight" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parcel Height (in cm)*</label>
                                                    <input id="parcelHeight" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parcel Width (in cm)*</label>
                                                    <input id="parcelWidth" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parcel Length (in cm)*</label>
                                                    <input id="parcelLength" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="receiverDetails">
                                        <div class="form-group">
                                            <label>Receiver / Company Name*</label>
                                            <input id="receiverName" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver Phone Number*</label>
                                            <input id="receiverPhone" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver Address Line 1*</label>
                                            <input id="receiverAddress1" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver Address Line 2*</label>
                                            <input id="receiverAddress2" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver City*</label>
                                            <input id="receiverCity" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver Post Code*</label>
                                            <input id="receiverPostCode" class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver State*</label>
                                            <input id="receiverState" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver Country Code*</label>
                                            <input id="receiverCountryCode" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Remark*</label>
                                            <input id="remark" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="whalloSubmitBtnDiv">
                                        <button id="whalloSubmitBtn" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Submit</button>
                                    </div>
                                    <div class="col-md-12" id="whalloOutOfDeliveryDiv" style="display: none;">
                                        <div class="row" style="display: flex; align-items: center;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tracking Number</label>
                                                    <input id="trackingNo2" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button id="printAirwayBillBtn" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; padding: 15px;">
                                                    <img src="images/printer-icon.png" height="25px" style="margin-right: 5px;">
                                                    <span>Print Airway Bill</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="deliveredDiv" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-12 m-b-20" id="trackParcel">
                                        <button id="trackParcelBtn" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Track Parcel</button>
                                        <label class="m-l-10" id="trackStatusUpdatedAt"></label>
                                        <label class="m-l-10" id="trackStatus"></label>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Set to Delivered</label>
                                        <button id="updateDelivered" class="btn btn-primary m-l-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Delivered</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
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

    <!-- Receipt Modal -->
    <div class="modal fade" id="viewReceiptModal" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Receipt
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="receiptImg" src="">
		    <embed id="receiptPdf" style="width:100%;"  src="">
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="creditNoteModal" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Add Credit Note
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                    <label>Remittance reference number</label>
                                    <input id="creditNoteReferenceInput" type="text" class="form-control">
                                    <span id="creditNoteError" class="errorSpan text-danger"></span>
                                    <span id="nameError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                    <label>Upload Bank Receipt</label>
                                    <div class="position-relative">
                                    <input class="form-control" type="hidden" id="creditNoteData">
                                    <input class="form-control" type="hidden" id="creditNoteName">
                                    <input class="form-control" type="hidden" id="creditNoteSize">
                                    <input class="form-control" type="hidden" id="creditNoteType">
                                </div>
                                <input type="file" id="uploadCreditNoteReceipt" class="" accept=".jpg, .jpeg, .png, .pdf">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                            <div id="submitCreditNoteBtn" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00323'][$language]; /* Submit */?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="changeItemModal" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Change Item Request
                    </h4>
                </div>
                <div class="modal-body">
                     <!-- Add a dropdown list here -->
                     <label for="originalItemSelection">Original Item:</label>
                    <select id="originalItemSelection" class="form-control">
                        <!-- Add more options as needed -->
                    </select>
                    <br>
                    <!-- Add a dropdown list here -->
                    <label for="itemSelection">Change Item:</label>
                    <select id="itemSelection" class="form-control">
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="btn-group mr-auto" role="group">
                        <div id="submitChangeItemRequestBtn" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00323'][$language]; /* Submit */?>
                        </div>
                    </div>
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">
                        <?php echo $translations['A00742'][$language]; /* Close */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="printarea">
        <div class="printSticker" id="1">
            <div><img src="images/GoTastyLogo.png" class="printLogo"></div>
            <div>Johor Segamat Hock Bee - Sambal Crisps 150g</div>
            <div>Jelutong Genting Cafe</div>
            <div>Chee Cheong Fun - Big (2 Packets)</div>
            <div>Best Before : 27 Feb 23</div>
            <div id="qrCode"></div>
            <div id="qrLink"></div>
            <div>Scan Here for preparation instruction</div>
            <div>Go Tasty Sdn Bhd (1429649-H)</div>
            <div class="socialMediaGrp">
                <div>
                    <img src="">
                    <span>facebook.com/gotasty.net</span>
                </div>
                <div>
                    <img src="">
                    <span>instagram.com/gotastynet</span>
                </div>
            </div>
        </div>
    </div>

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
    var editId              = "<?php echo $_POST['id']; ?>";
    // var status              = "<?php echo $_POST['status']; ?>";
    var status              = "";
    var createdAt           = "<?php echo $_POST['createdAt']; ?>";
    var vendor              = "<?php echo $_POST['vendor']; ?>";
    var html                = `<option value="">Select Product</option>`;
    var product_list        = null;
    var wrapperLength       = 2;
    var subtotal            = 0;
    var action              = "";
    var typeR               = "";
    var totalLoop           = [1];
    var vendor_id_ini       = "";
    var tableIndex;
    var grandtotal          = "";
    var step                = "";
    var defaultSNUrl        = 'https://dev.gotasty.net/sn/';
    var buildOption;
    var buildOptionLength   = 0;
    var buildOption2;
    var buildOptionLength2  = 0;
    var hawbNo;
    var clientID            = '';
    var warningInput;
    var productArray        = [1];
    var serviceArray        = [];
    var usedSerialNo        = [];
    var usedSerialNoDO      = [];
    var tempReceiverFullAddress, tempBillingFullAddress;
    var stockedOutArr;
    var serialNumberList    = [];
    var deliverOrderTableRow = 1;
    var enteredBarcodesByProduct = [];
    var enteredBarcodes = [];
    var deliveryID = '';
    var deliveryOrderList = [];
    var deliveryDisplayList = [];
    var soNo = '';
    var mysteryCheck = "";
    var storeDOSerialItemList = [];
    var storeProductList = [];
    var paymentMethodList = [];
    var countNote = 1;
    var soType          = "<?php echo $_POST['soType']; ?>";
    var currentDO       = '-';

    $(document).ready(function() {
        if(soType != 'add')
        {
            $("#addSOBtn").css("display", "none");

            var formData = {
                'command': 'getSaleOrderDetails',
                'SaleID'     : editId
            };
            fCallback = loadEdit;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
            $("#inputSerialDO").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    removeUrlDO(this, e);
                }
            });

            $("#addCreditNoteBtn").hide();
    
                if(status == "Order Processing"){
                    $("#deliveredDiv").css("display", "block");
                }
            
    
                var newData = [];
    
                var stockOut_html = '';
    
                stockOut_html += `
                    <table class="table table-striped table-bordered no-footer m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Package Name</th>
                                <th>Product Name</th>
                                <th>Serial No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="stockOutTableBody">
                        </tbody>
                    </table>
                `;
    
                $('#stockOutTable').html(stockOut_html);
    
                // Delivery Order Table
                var deliveryOrder_html = '';
    
                deliveryOrder_html += `
                    <table class="table table-striped table-bordered no-footer m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Serial No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="deliveryOrderTableBody">
                        </tbody>
                    </table>
                `;
    
                $('#deliveryOrderTable').html(deliveryOrder_html);
    
                tableIndex = 0;
    
                $('#stockOutTableBody').html('');
    
                var formData = {
                    command     : 'getStockOutDetails',
                    sale_id     : editId
                }
    
                fCallback = loadStockOutTableBody;
                ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            // }
        }
        else if(soType === 'add')
        {
            $("#mobileNo").prop("disabled", false);

            $("#edit").css("display", "none");
            $("#editPaid").css("display", "none");
            $("#editCancel").css("display", "none");
            $("#addCreditNoteBtn").css("display", "none");
            $("#stockOut").css("display", "none");

            var formData = {
                command        : "getProduct",
                soType         : "addSO",
            };
            fCallback = productListOpt;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

            $('#addSOBtn').click(function() {
                var productSet= [];
                var serviceSet  = [];

                var    payment_method      = $("#payment_method").val();
                // var    delivery_method     = $("#delivery").val();
                var    billingAddr         = $("#billingID").val();
                var    shippingAddr        = $("#shippingID").val();
                // var    statusSelect        = $("#statusSelect").val();

                for (var v of productArray) {
                    var name = $('option:selected', "#productSelect" + v).text();
                    var cost = $('#cost' + v).val();
                    var quantity = $('#quantity' + v).val();

                    if ($("#productType" + v).val() == "shipping_fee") {
                        var product_id = "0";
                        var name = $('option:selected', "#serviceSelect" + v).text();
                        var delivery_method= $('option:selected', "#serviceSelect" + v).text();
                    } else if ($("#productType" + v).val() == "promo_code") {
                        var product_id = "0";
                        var name = $("#noteProductInput" + v).val();
                    }  else if ($("#productType" + v).val() == "redeem_point") {
                        var product_id = "0";
                        var name = $("#noteProductInput" + v).val();
                    } 
                    else {
                        var product_id = $('option:selected', "#productSelect" + v).val();
                    }

                    var type = $("#productType" + v).val();
                    var id = $('#id' + v).val();
                    var action = $('#action' + v).val();

                    // back to here
                    if(type == 'note')
                    {
                        product_id = '0'; 
                        var name = $("#noteProductInput" + v).val();
                    }

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
                        type  : type,
                    };

                    if(perProduct['action'] != "delete"){
                        productSet.push(perProduct);
                    }
                } 

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
            
                var formData = {
                    command             : "editOrderDetails",
                    orderDetailArray    : productSet,
                    orderServiceArray   : serviceSet,
                    saleID              : editId,
                    shipping_fee        : $("#shipping_fee").val(),
                    payment_amount      : $("#grandtotal").val(),
                    payment_tax         : $("#payment_tax").val(),
                    payment_method      : payment_method,
                    delivery_method     : delivery_method,
                    status              : status,
                    billingAddr         : $("#billingID").val(),
                    shippingAddr        : $("#shippingID").val(),
                    receiptData         : $('#receiptData').val(),
                    receiptName         : $("#receiptName").val(),
                    promoCode           : $("#promoCode").val(),
                    shippingPostCode    : $("#shippingPostCode").val(),
                    soType              : 'add',
                    clientID            : clientID,
                };
                var fCallback = sendAdd;
                ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

        }

        if(status == "Paid") {
            $("#trackingNoDiv").css("display", "none");
            $("#deliveredDiv").css("display", "none");
            $("#deliveryOrder").css("display", "none");
            $(".changeItemBtn").prop("disabled", false);
        }

        if(status == "Order Processing") {
            $("#stockOut").css("display", "block");
            // $('#shippingMethodDiv').css("display", "block");
            $("#deliveredDiv").css("display", "none");
            // $("#trackingNoDiv").css("display", "block");
            $("#displayDO").css("display", "block");
            var radBtnDefault = document.getElementById("PARCELHUB");
            radBtnDefault.checked = true;
        }

        if(status == "Packed") {
            $("#deliveredDiv").css("display", "none");
            // $("#stockOut").css("display", "none");
            // $('#whalloOutOfDeliveryDiv').show();
            // $('#whalloSubmitBtnDiv').hide();
            $("#deliveryOrder").css("display", "none");
            $("#stockOut").find("input, button").each(function () {
                $(this).attr("disabled", true).hide();
            });
            $("#skipWarning").parent().hide();
            $("#trackingNoDiv").css("display", "none");
            $("#displayDO").css("display", "none");
            $('#shippingMethodDiv').css("display", "none");
            $("#trackingNoDiv").css("display", "none");

        }

        if(status == "Out For Delivery" || status == "Delivered") {
            // $("#stockOut").css("display", "none");
            $('#shippingMethodDiv').css("display", "none");
            $('#whalloOutOfDeliveryDiv').show();
            $('#whalloSubmitBtnDiv').hide();
            $('#shipperDetails').hide();
            $('#receiverDetails').hide();
            $('#remark').parent().parent().hide();
            $("#stockOut").find("input, button").each(function () {
                $(this).attr("disabled", true).hide();
            });
            $("#skipWarning").parent().hide();
            $("#saveTrackingNo").attr("disabled", true);
            $("#trackingNoDiv").css("display", "none");
            $("#updateTrackStatus").css("display", "none");
            $("#updateDeliverStatus").css("display", "block");
            // $("#trackingNoDiv").css("display", "none");
        }

        function loadStockOutTableBody(data, message) {
            serialNumberList = data;
            var html_SO = "";
            var k2 = 1;
            
            $.each(data, function (k, v) {
                for (var w = 0; w < v['quantity']; w++) {
                    html_SO += `
                        <tr id="stockOutTable${k2}">
                                <td>${k2}</td>
                                <td id="Package_name${k2}">${v['package_name']}</td>
                                <td id="item_name${k2}">${v['item_name']}</td>
                                <td>
                                    <input class="form-control stockOutInput" type="text" id="stockOutSerialNo${k2}" product-id="${v['product_id']}" onfocus="serialChecking(this)" oninput="inputSerialChecking(this)" value="${v['barcode']}" data-id="${v['id']}" disabled>
                                    <input class="form-control hide" type="text" id="stockOutSerialID${k2}" value="${v['product_id']}">
                                    <input class="form-control hide" type="text" id="skuCode${v['id']}" data-id="${v['id']}" value="${v['barcode'].replace('N', '')}">
                        `;

                    if (v['product_type']) {
                        html_SO += `
                            <input class="form-control additionalClass" type="text" id="stockOutProductType${k2}" value="${v['product_type']}" style="display: none;">
                        `;
                    }

                    html_SO += `
                            </td>
                            <td>
                            <button class="btn btn-icon waves-effect waves-light btn-primary changeItemBtn" style=""
                                    onclick="changeItem(this)" data-id="${v['id']}" data-skuCode="skuCode${v['id']}"
                                    data-name="${v['item_name']}" data-productID="${v['product_id']}" data-original-title="Change Item"
                                    title="Change Item" disabled> 
                                <i class="fa fa-edit"></i> 
                            </button>
                        </td>
                        </tr>
                    `;

                    k2++;
                }
            })

            $('#stockOutTableBody').append(html_SO);
            if(status == "Paid" || status == "Order Processing") {
                $('#inputSerial').removeAttr('disabled').focus();
            }

            for (var i = 0; i < serialNumberList.length; i++) {
                if(status == '')
                {
                    status = data.so_status;

                }
                if(status == "Paid")
                {
                    $(".changeItemBtn").prop("disabled", false);
                }
            }



            if (serialNumberList && serialNumberList != "") {
                highlightStockOutRow();
            }

            if (stockedOutArr && stockedOutArr != "") {
                insertSerialNumberData();
            }
        }

        function highlightStockOutRow() {
            $.each(serialNumberList, function(snlK, snlV) {
                if(snlV.deliveryOrder == 1){
                    $('tr[id^="stockOutTable"]').each(function() {
                        var barcode = $(this).find('input#stockOutSerialNo' + this.id.substring('stockOutTable'.length)).attr('value');
                        var snlBarcode = snlV.barcode;

                        if (barcode === snlBarcode) {
                            var tableElement = $('#stockOutTable').find('table');
                            tableElement.removeClass('table-striped');
                            $(this).css('background-color', '#90EE90');
                        }
                    });
                }
            });
        }

        $("#subtotal").change(function () {
            var subtotal = parseFloat($("#subtotal").val());
            var shippingFee = parseFloat($("#shipping_fee").val());
           
            var grantotal = subtotal;
            

            $("#grandtotal").val(parseFloat(grantotal).toFixed(2));
        })

        setTodayDatePicker();

        $('#status').val(status);

        $(".productSelect").change(function () {
            var select_id = this.id;
            var product_cost = $('option:selected', this).attr('datacost');
            var costID = "#cost" + select_id.substring(13);
            $(costID).val(product_cost);
            $(".quantityInput").keyup();
            $('.totalInput').trigger('change');

            countSubtotal();
        });

        $('#approve').click(function() {
            var formData = {
                command: "approvePurchaseOrder",
                id: editId,
                status: 'Confirmed'
            };

            if (fCallback)
                fCallback = loadConfirmPurchaseOrder;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })

        function loadConfirmPurchaseOrder(data, message) {
            showMessage('Purchase Order Has Been Approved', 'success', 'Success Update Purchase Order', 'check', 
                ['editPurchaseOrder.php', {
                    id: editId,
                    status: "Confirmed",
                    createdAt: createdAt
                }]
            ); 
        }

        $('#edit').click(function() {
            var productSet= [];
            var serviceSet  = [];

            var    payment_method      = $("#payment_method").val();
            // var    delivery_method     = $("#delivery").val();
            var    billingAddr         = $("#billingID").val();
            var    shippingAddr        = $("#shippingID").val();
            // var    statusSelect        = $("#statusSelect").val();

            for (var v of productArray) {
                var name = $('option:selected', "#productSelect" + v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();

                if ($("#productType" + v).val() == "shipping_fee") {
                    var product_id = "0";
                    var name = $('option:selected', "#serviceSelect" + v).text();
                    var delivery_method= $('option:selected', "#serviceSelect" + v).text();
                } else if ($("#productType" + v).val() == "promo_code") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                }  else if ($("#productType" + v).val() == "redeem_point") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                } 
                else {
                    var product_id = $('option:selected', "#productSelect" + v).val();
                }

                var type = $("#productType" + v).val();
                var id = $('#id' + v).val();
                var action = $('#action' + v).val();

                // back to here
                if(type == 'note')
                {
                    product_id = '0'; 
                    var name = $("#noteProductInput" + v).val();
                }

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
                    type  : type,
                };

                if(perProduct['action'] != "delete"){
                    productSet.push(perProduct);
                }
            } 

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
        
            var formData = {
                command             : "editOrderDetails",
                orderDetailArray    : productSet,
                orderServiceArray   : serviceSet,
                saleID              : editId,
                shipping_fee        : $("#shipping_fee").val(),
                payment_amount      : $("#grandtotal").val(),
                payment_tax         : $("#payment_tax").val(),
                payment_method      : payment_method,
                delivery_method     : delivery_method,
                status              : status,
                billingAddr         : $("#billingID").val(),
                shippingAddr        : $("#shippingID").val(),
                receiptData         : $('#receiptData').val(),
                receiptName         : $("#receiptName").val(),
                promoCode           : $("#promoCode").val(),
                shippingPostCode    : $("#shippingPostCode").val(),
            };
            var fCallback = sendEdit;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#editPaid').click(function() {
            var productSet= [];
            var serviceSet  = [];

            var    payment_method      = $("#payment_method").val();
            var    billingAddr         = $("#billingID").val();
            var    shippingAddr        = $("#shippingID").val();

            for (var v of productArray) {
                var name = $('option:selected', "#productSelect" + v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();

                if ($("#productType" + v).val() == "shipping_fee") {
                    var product_id = "0";
                    var name = $("#serviceSelect" + v).val();
                    var delivery_method = $("#serviceSelect" + v).val();
                } else if ($("#productType" + v).val() == "promo_code") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                }  else if ($("#productType" + v).val() == "redeem_point") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                } 
                else {
                    var product_id = $('option:selected', "#productSelect" + v).val();
                }

                var type = $("#productType" + v).val();
                var id = $('#id' + v).val();
                var action = $('#action' + v).val();

                if(type == 'note')
                {
                    product_id = '0'; 
                    var name = $("#noteProductInput" + v).val();
                }

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
                    type  : type,
                };

                if(perProduct['action'] != "delete"){
                    productSet.push(perProduct);
                }
            } 

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
           
            var formData = {
                command             : "editOrderDetails",
                orderDetailArray    : productSet,
                orderServiceArray   : serviceSet,
                saleID              : editId,
                shipping_fee        : $("#shipping_fee").val(),
                payment_amount      : $("#grandtotal").val(),
                payment_tax         : $("#payment_tax").val(),
                payment_method      : payment_method,
                delivery_method     : delivery_method,
                status              : 'Paid',
                billingAddr         : $("#billingID").val(),
                shippingAddr        : $("#shippingID").val(),
                receiptData         : $('#receiptData').val(),
                receiptName         : $("#receiptName").val(),
                promoCode           : $("#promoCode").val(),
                shippingPostCode    : $("#shippingPostCode").val(),
            };
            var fCallback = sendEdit;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#submitCreditNoteBtn").click(function() {
            $("#creditNoteError").html("");

            if($("#creditNoteReferenceInput").val().length == 0){
                $("#creditNoteError").html("Please Key in Remittance reference number.");
            }else{
                $('#creditNoteModal').modal('hide');

                $("#editCancel").click();
            }

        });

        $('#editCancel').click(function() {
            var productSet= [];
            var serviceSet  = [];

            var    payment_method      = $("#payment_method").val();
            var    delivery_method     = $("#delivery").val();
            var    billingAddr         = $("#billingID").val();
            var    shippingAddr        = $("#shippingID").val();
            // var    statusSelect        = $("#statusSelect").val();

            for (var v of productArray) {
                var name = $('option:selected', "#productSelect" + v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();

                if ($("#productType" + v).val() == "shipping_fee") {
                    var product_id = "0";
                    var name = $("#serviceSelect" + v).val();
                } else if ($("#productType" + v).val() == "promo_code") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                }  else if ($("#productType" + v).val() == "redeem_point") {
                    var product_id = "0";
                    var name = $("#noteProductInput" + v).val();
                } 
                else {
                    var product_id = $('option:selected', "#productSelect" + v).val();
                }

                var type = $("#productType" + v).val();
                var id = $('#id' + v).val();
                var action = $('#action' + v).val();

                if(type == 'note')
                {
                    product_id = '0'; 
                    var name = $("#noteProductInput" + v).val();
                }

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
                    type  : type,
                };

                if(perProduct['action'] != "delete"){
                    productSet.push(perProduct);
                }
            } 

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
           
            var formData = {
                command             : "editOrderDetails",
                orderDetailArray    : productSet,
                orderServiceArray   : serviceSet,
                saleID              : editId,
                shipping_fee        : $("#shipping_fee").val(),
                payment_amount      : $("#grandtotal").val(),
                payment_tax         : $("#payment_tax").val(),
                payment_method      : payment_method,
                delivery_method     : delivery_method,
                status              : 'Cancelled',
                billingAddr         : $("#billingID").val(),
                shippingAddr        : $("#shippingID").val(),
                receiptData         : $('#receiptData').val(),
                receiptName         : $("#receiptName").val(),
                creditNoteReference : $("#creditNoteReferenceInput").val(),
                creditNoteName      : $("#creditNoteName").val(),
                creditNoteData      : $('#creditNoteData').val(),
                promoCode           : $("#promoCode").val(),
                shippingPostCode    : $("#shippingPostCode").val(),
            };
            var fCallback = sendEdit;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#submitChangeItemRequestBtn").click(function() {
            var productSet= [];
            var serviceSet  = [];

            var originalItemSelection  = $("#originalItemSelection").val(); // sale order item id
            var itemSelection          = $("#itemSelection").val(); // product ID
            $('#changeItemModal').modal('hide');
            var formData = {
                command             : "changeSOItem",
                saleID              : editId,
                originalItemID      : originalItemSelection,
                changeItemProductID : itemSelection
            };
            var fCallback = changeSOItem;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });


        $('#addCreditNoteBtn').click(function() {

            
            $('#creditNoteModal').modal();

            $("#uploadCreditNoteReceipt").attr("disabled", false);
            $("#creditNoteReferenceInput").attr("disabled", false);
           
        });
        $('#editOrderProcessing').click(function() {
           
            var formData = {
                command             : "saleOrderProcess",
                saleID              : editId,
                status              : 'Order Processing',
            };
            var fCallback = updateOrderProcess;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        // Upload Receipt
        $('#uploadBtn').click(function() {
            $('#uploadReceipt').click();
        })

        $('#uploadReceipt').change(function() {
            if (this.files && this.files[0]) {
                var that = this;
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#receiptData").empty().val(reader["result"]);
                    $("#receiptName").val(that.files[0]["name"]);
                    $("#receiptSize").empty().val(that.files[0]["size"]);
                    $("#receiptType").empty().val(that.files[0]["type"]);
                }
                reader.readAsDataURL(that.files[0]);
            }
        });

        $('#uploadCreditNoteReceipt').change(function() {
            if (this.files && this.files[0]) {
                var that = this;
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#creditNoteData").empty().val(reader["result"]);
                    $("#creditNoteName").empty().val(that.files[0]["name"]);
                    $("#creditNoteSize").empty().val(that.files[0]["size"]);
                    $("#creditNoteType").empty().val(that.files[0]["type"]);
                }
                reader.readAsDataURL(that.files[0]);
            }
        });
        // $('#uploadReceiptBtn').click(uploadReceipt);
    });

    function displayReceipt() {  
        var selectedValue = $('#payment_method').val();
        var uploadReceiptSection = document.getElementById('uploadReceiptSection');
        uploadReceiptSection.style.display = 'block';

        if (selectedValue === 'FPX') {
            var uploadReceiptSection = document.getElementById('uploadReceiptSection');
            uploadReceiptSection.style.display = 'none';
        } 
    }

    function insertAddress(data, message) {  

        $('.errorSpan').empty();
        $('#errorInput').hide();
        var soType = "add";

        showMessage('Billing Address has been successfully added', 'success', 'Billing Address added', 'check');
        setTimeout(function() {
            $.redirect("editSaleOrder.php", { soType, soType });
        }, 1000); 
    }

    function insertAddressShipping(data, message) {  
        $('.errorSpan').empty();
        $('#errorInput').hide();
        var soType = "add";

        showMessage('Shipping Address has been successfully added', 'success', 'Shipping Address added', 'check');
        setTimeout(function() {
            $.redirect("editSaleOrder.php", { soType, soType });
        }, 1000); 
    }

    function sendAdd(data, message) {       
        showMessage('Sale Order Has been Added', 'success', 'Sale Order Added', 'check', 'purchaseOrder.php');
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

    function addRow(data){
        if(data)
        {
            var wrapper = `
                <div class="col-md-12">
                    <div class="addProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                        <div class="row" id="pr${(wrapperLength)}">
                            <div class="col-md-4">
                                <label>${(wrapperLength)}. <font id="noteProductLabel${(wrapperLength)}">Product</font></label>
                                <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>                                                                 
                                </select>
                                <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;">
                                <input id="productType${(wrapperLength)}" class="form-control hide">
                                <select id="serviceSelect${(wrapperLength)}" onchange="getDeliveryFee(${(wrapperLength)});" class="form-control" style="display: none;" required>  
                                </select>                                                               
                            </div>
                            <div class="col-md-2" ${(data[countNote].type === "note" ? 'style="display: none;"' : '')}>
                                <label id="quantityLabel${(wrapperLength)}">Quantity</label>
                                <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                            <div class="col-md-3" ${(data[countNote].type === "note" ? 'style="display: none;"' : '')}>
                                <label id="salePriceLabel${(wrapperLength)}">Sale Price</label>
                                <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                            </div>
                            <div class="col-md-3" ${(data[countNote].type === "note" ? 'style="display: none;"' : '')}>
                                <label id ="totalAmountLabel${(wrapperLength)}">Total Amount</label>
                                <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>
                            </div>
                            <div class="col-md-3">
                                <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                                <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            if (data[countNote].type === "note") {
                // Hide elements when type is "note"
                wrapper = $(wrapper).find(".quantityInput, .costInput, .totalInput").hide().end().prop("outerHTML");
            }
            countNote++;
            // Append wrapper to the DOM
            $("#appendProduct").append(wrapper);
        }
        else
        {
            var wrapper = `
                <div class="col-md-12">
                    <div class="addProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                        <div class="row" id="pr${(wrapperLength)}">
                            <div class="col-md-4">
                                <label>${(wrapperLength)}. <font id="noteProductLabel${(wrapperLength)}">Product</font></label>
                                <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>                                                                 
                                </select>
                                <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;">
                                <input id="productType${(wrapperLength)}" class="form-control hide">
                                <select id="serviceSelect${(wrapperLength)}" onchange="getDeliveryFee(${(wrapperLength)});" class="form-control" style="display: none;" required>  
                                </select>                                                               
                            </div>
                            <div class="col-md-2">
                                <label>Quantity</label>
                                <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                            <div class="col-md-3">
                                <label>Sale Price</label>
                                <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                            </div>
                            <div class="col-md-3">
                                <label>Total Amount</label>
                                <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>
                            </div>
                            <div class="col-md-3">
                                <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                                <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            // Append wrapper to the DOM
            $("#appendProduct").append(wrapper);
            $('#productSelect' + wrapperLength).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
            $("#productSelect"+wrapperLength).html(html);
        }


        productArray.push(wrapperLength);
        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function addNoteRow(data){
        var wrapper = `
            <div class="col-md-12">
                <div class="addServiceWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <label>Note</label>
                        <input id="noteProductInput${(wrapperLength)}" type="text" class="form-control quantityInput" style="width: 100%;" placeholder="Enter your note here...">
                        <input id="productType${(wrapperLength)}" class="form-control hide" value = "note">
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
        productArray.push(wrapperLength);
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
                                <option value="pickup">Pickup</option>
                                <option value="delivery">Delivery</option>
                                <option value="dryDelivery">Dry Delivery</option>
                            </select>
                            <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;">
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

    function closeDiv(n,id) {
        var totalLoop =[1];

        var index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        // $("#closeBtn" + id).css("display","none");
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

    function productListOpt(data, message) {
        if(data)
        {
            var product = data.getProductDetail;

            if(product) {
                $.each(product, function(i, obj) {
                    if(obj.product_type === 'product') {
                        storeProductList.push(obj);
                    }
                    html += `<option value="${obj.id}" datacost="${obj.sale_price}">${obj.name}</option>`;
                });
                
                $(".productSelect").html(html);
            }
        }
        else
        {
            var product = storeProductList;
        }
        

        if(soType === 'add')
        {
            if(data != null)
            {
                var buildOptionPayment = '<option value="">Select a Payment Method</option>';
                $.each(data.paymentArray, function(k,v) {
                    buildOptionPayment += `
                        <option value="${v['name']}" style="display:${v['status']}">${v['name']}</option>
                    `;
                    paymentMethodList.push(v);
                });
            }
            else
            {
                var buildOptionPayment = '<option value="">Select a Payment Method</option>';
                $.each(paymentMethodList, function(k,v) {
                    buildOptionPayment += `
                        <option value="${v['name']}" style="display:${v['status']}">${v['name']}</option>
                    `;
                });
            }

            var selectListPayment = $('#payment_method');
            selectListPayment.empty(); 
            selectListPayment.append(buildOptionPayment);

            $('#productSelect1').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });  
        }
        else
        {
            loadSelect();
        }
    }

    function loopSelect(id) {
        var select_id = id;
        var productSelect = "#productSelect" + select_id;
        var product_cost = $('option:selected', productSelect).attr('datacost');
        var costID = "#cost" + select_id;
        $(costID).val(product_cost);

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

    function loadSelect() {
        var formData = {
            'command': 'getSaleOrderDetails',
            'SaleID'     : editId
        };
        fCallback = selectPR;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function selectPR(data, message) {
        if(status == null)
        {
            status = data.so_status;
        }
        $.each(data.orderDetails, function (m, v) {
            var newM = m + 1;

            $("#productSelect" + newM).val(v['product_id']);

            $("#productSelect" + newM).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
        });
    }

    function sendEdit(data, message) {    
        showMessage('Sale Order Has Been Updated', 'success', 'Sale Order Updated', 'check');        
        location.reload();
    }

    function sendAdd(data, message) {
        var id = data.data.sale_id;
        var status = 'Draft';
        $.redirect("editSaleOrder.php",{id: id, status: status});
        // $.redirect("editSaleOrder.php",{id:  addSaleID});
        // showMessage('Sale Order Has Been Updated', 'success', 'Sale Order Updated', 'check', ['editSaleOrder.php', {id : addSaleID} ]);      
        // location.reload();
    }

    function changeSOItem(data, message) {
        var redirectStatus = 'Paid';
        showMessage('Sale Order Has Been Updated', 'success', 'Sale Order Updated', 'check', ['editSaleOrder.php', {id : editId, status : redirectStatus} ]);      
        location.reload();
    }

    function updateOrderProcess(data, message) {    
        var redirectStatus = 'Order Processing';
        showMessage('Sale Order Has Been Updated', 'success', 'Sale Order Updated', 'check', ['editSaleOrder.php', {id : editId, status : redirectStatus} ]);
    }

    $('#assign').click(function() {
        var product_name_set  = $('option:selected', "#productSelect1").text();

        for(var v = 2; v < $(".productSelect").length + 1; v++) {
            var name = ", " + $('option:selected', "#productSelect"+v).text();

            product_name_set += name;
        }
        
        var formData = {
            command       : 'assignSerial',
            id            : editId,
            product_name  : product_name_set
        };

        fCallback = generateSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function generateSerial(data, message) {
        var showIncrement = data.showIncrement;

        showIncrement = showIncrement.join(';');

        $('#serialShowIncrement').val(showIncrement);

        var serial_number = data.serial_number;
        $('#serial').val(serial_number.join('  ||  '));

        $("#confirmSerial").attr("disabled", false);
    }

    $('#confirmSerial').click(function() {
        var id                  = editId;
        var product_name        = $('input#product_name').val();
        var serial              = $('textarea#serialShowIncrement').val();
        var serialList          = serial.split(';');

        var formData = {
            command           : 'confirmSerial',
            id                : id,
            product_name      : product_name,
            serial            : serialList,
        } 

        fCallback = successConfirmSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    $('input[type="checkbox"]').change(function() {
        if(this.checked === true) {
            step = 1;
        } else {
            step = "";
        }
    })

    $('input[id="stockOutMystery"]').change(function() {
        if(this.checked === true) {
            mysteryCheck = 1;
        } else {
            mysteryCheck = "";
        }
    })

    $('#saveStockOut').click(function() {
        var stock_out_serial = [];
        var serialProductId = [];

        for(i = 0; i < $(".stockOutInput").length; i++) {
            var newI = i + 1;
            var perSerial = {
                serial_number: $("#stockOutSerialNo" + newI).val(),
                item_name: $("#item_name" +newI).text(),
            }
            stock_out_serial.push(perSerial);

            var perSerialID = {
                serial_number: $("#stockOutSerialNo" + newI).val(),
                product_id: $("#stockOutSerialID" +newI).val(),
                product_type: $("#stockOutProductType" +newI).val(),
            }
            serialProductId.push(perSerialID);
        }

        var formData = {
            command     : 'updateStatusOnPacking',
            sale_id     : editId,
            serial      : stock_out_serial,
            serialProductId: serialProductId,
            step        : step,
        } 

        fCallback = successSaveStockOut;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    $('#displayDO').click(function() {
        var formData = {
            command             : "insertDeliveryOrder",
            sale_id             : editId,
        };
        var fCallback = displayDeliveryOrder;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    $('#saveDeliveryOrder').click(function() {
        var deliveryOrderserial     = [];
        var boxDetail               = [];
        var stock_out_serial        = [];
        var serialProductId         = [];


        for(i = 0; i < $(".deliveryOrderInput").length; i++) {
            var newI = i + 1;
            var perSerial = {
                serial_number: $("#deliveryOrderSerialNo" + newI).val(),
                item_name: $("#itemNameDO" +newI).text(),
            }
            deliveryOrderserial.push(perSerial);

            var perSerialID = {
                serial_number   : $("#deliveryOrderSerialNo" + newI).val(),
                product_id      : $("#deliveryOrderSerialID" +newI).val(),
            }
            boxDetail.push(perSerialID);
        }

        for(i = 0; i < $(".deliveryOrderInput").length; i++) {
            var newI = i + 1;
            var serialNumber = $("#deliveryOrderSerialNo" + newI).val().trim();
            if (serialNumber.trim() !== '') {
                var perSerial = {
                    serial_number: serialNumber,
                    item_name: $("#itemNameDO" + newI).text(),
                };
                stock_out_serial.push(perSerial);
            }

            if (serialNumber !== '') {
                var perSerialID = {
                    serial_number: serialNumber,
                    product_id: $("#deliveryOrderSerialID" + newI).val(),
                    product_type: $("#deliveryOrderProductType" + newI).val(),
                };
                serialProductId.push(perSerialID);
            }
        }

        var formData = {
            command     : 'updateStatusOnPacking',
            sale_id     : editId,
            serial      : stock_out_serial,
            serialProductId: serialProductId,
            step        : step
        } 


        var formData = {
            command             : "DeliveryOrderUpdate",
            sale_id             : editId,
            deliveryOrderNO     : deliveryID,
            // trackingNo          : editId,
            // deliveryPartner    : editId,
            action             : 'closeDO',
            boxDetails         : boxDetail,
            serial             : stock_out_serial,
            serialProductId    : serialProductId,
            step               : step
        };
        var fCallback = showCloseDOMessage;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function showCloseDOMessage() {
        showMessage('Delivery Order Saved.', 'success', 'Stock Out', 'check', ['editSaleOrder.php', {id : editId, status : status} ]);
    }

    function displayDOList() {
        $("#displayDOList").css("display", "block");
        var container = document.getElementById("doList");

        // Generate Delivery Order List
        for (let i = 0; i < deliveryOrderList.length; i++) {
            var additionalContent = document.createElement("p");
            additionalContent.innerHTML = `<strong class="bold-text" style="font-size: 19px;text-decoration: underline;">Delivery Info</strong> <br> ` +
                `DO No: ${deliveryDisplayList[i].do_no} <br>` +
                `Status: ${deliveryDisplayList[i].status} <br>`;
                
            if (deliveryDisplayList[i].tracking_number) {
                if(deliveryDisplayList[i].status === 'Pending for Pickup')
                {
                    additionalContent.innerHTML += `Tracking No: ${deliveryDisplayList[i].tracking_number} <br>` +
                        `<button id="extraBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="addExtra('${deliveryDisplayList[i].do_no}')">Add Item</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="labelBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="showLabel('${deliveryDisplayList[i].tracking_number}')">Show Airway Label</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="trackingBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="viewDO('${deliveryDisplayList[i].do_no}')";">View DO</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="trackingBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="openTrackingLink('${deliveryDisplayList[i].tracking_number}')";">Tracking Link</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="cancelAirway${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="cancelAirway('${deliveryDisplayList[i].tracking_number}')";">Cancel Airway Bill</button>`;
                }
                else
                {
                    additionalContent.innerHTML += `Tracking No: ${deliveryDisplayList[i].tracking_number} <br>` +
                        `<button id="labelBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="showLabel('${deliveryDisplayList[i].tracking_number}')">Show Airway Label</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="trackingBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="viewDO('${deliveryDisplayList[i].do_no}')";">View DO</button>` +
                        `<span style="margin: 0 10px;"></span>` +
                        `<button id="trackingBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="openTrackingLink('${deliveryDisplayList[i].tracking_number}')";">Tracking Link</button>`;
                }
            }
            else if(deliveryDisplayList[i].status === 'Draft')
            {
                additionalContent.innerHTML += `Tracking No: ${deliveryDisplayList[i].tracking_number} <br>` +
                `<button id="extraBtn${i}" class="btn btn-primary waves-effect waves-light popup-button" onclick="addExtra('${deliveryDisplayList[i].do_no}')">Add Item</button>`;
            }
            
            container.appendChild(additionalContent);

            var deliveryOrderTable = createTable(deliveryOrderList[i]);
            container.appendChild(deliveryOrderTable);

            if (i !== deliveryOrderList.length - 1) {
                container.appendChild(document.createElement("br"));
            }
        }

        for (var data of deliveryDisplayList) {
            if (data.status === "Draft" && status == "Order Processing") {
                $("#shippingMethodDiv input").removeAttr('disabled');
                $('#trackingNoDiv input').removeAttr('disabled'); 
                $('#shippingMethodDiv').css("display", "block");
                $("#trackingNoDiv").css("display", "block");
                break;
            }else if (status == "Packed") {
                $('#updateTrackStatus').css("display", "block");
                break;
            }
        }
    }

    function showLabel(trackingNo) {

        var formData = {
            command     : 'parcelhubCheckLabel',
            hawb_no     : trackingNo,
        }
        fCallback = displayAirWayLabel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    }

    function addExtra(doNo){
        const deliveryOrderRow = document.getElementById('deliveryOrderRow');
        console.log('deliveryOrderRow', deliveryOrderRow);
        if (deliveryOrderRow) {
            // Scroll to the target section
            deliveryOrderRow.scrollIntoView({
                behavior: 'smooth' // You can use 'auto' for instant scrolling
            });
        }
        var formData = {
            command             : "insertDeliveryOrder",
            sale_id             : editId,
            do_no               : doNo
        };
        var fCallback = displayDeliveryOrder;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayAirWayLabel(data) {
        var pdfDataUrl = "data:application/pdf;base64," + data;

        var winparams = 'dependent=yes,locationbar=no,scrollbars=yes,menubar=yes,'+
            'resizable,screenX=50,screenY=50,width=850,height=1050';

        var htmlPop = '<embed width=100% height=100%'
                         + ' type="application/pdf"'
                         + ' src="data:application/pdf;base64,'
                         + escape(data)
                         + '"></embed>'; 

        var printWindow = window.open ("", "PDF", winparams);
        printWindow.document.write (htmlPop);
    }
  

    function createTable(data) {
        var table = document.createElement("table");
        table.className = "table table-striped table-bordered no-footer m-0";
        var thead = document.createElement("thead");
        var tbody = document.createElement("tbody");
        var rowNumber = 1;

        var headerRow = document.createElement("tr");
        var headers = ["No", "Product Name", "Serial Number"];
        var widths = ["10%", "60%", "30%"];
        for (var header of headers) {
            var th = document.createElement("th");
            th.textContent = header;
            headerRow.appendChild(th);
        }
        thead.appendChild(headerRow);

        var dataArray = Array.isArray(data) ? data : data['data'];

        for (var entry of dataArray) {
            var row = document.createElement("tr");
            row.innerHTML = `
                <td style="width: ${widths[0]}">${rowNumber}</td>
                <td style="width: ${widths[1]}">${entry.product_name}</td>
                <td style="width: ${widths[2]}">${entry.serial_number}</td>
            `;
            tbody.appendChild(row);
            rowNumber++;
        }

        table.appendChild(thead);
        table.appendChild(tbody);

        return table;
    }

    function displayDeliveryOrder(data) {
        deliveryID = data.deliveryOrderID;
        if(currentDO != '-')
        {
            if(deliveryID != currentDO)
            {
                currentDO = deliveryID;
                $('#deliveryOrderTableBody').empty(); // clear DO table
            }
        }
        
        $("#deliveryOrderID").text('(' + deliveryID + ')');
        $("#deliveryOrder").css("display", "block");

        if (data.existingDODetail) {
            var existingSerialNumbers = data.existingDODetail.map(function(item) {
                return item.serialNo;
            });

            storeDOSerialItemList = storeDOSerialItemList.filter(function(item) {
                return existingSerialNumbers.includes(item.serialNo);
            });
            for (var i = 0; i < data.existingDODetail.length; i++) {
                var serialNo = data.existingDODetail[i].serialNo;
                var productName = data.existingDODetail[i].productName;
                var productID = data.existingDODetail[i].productID;
                var skuCode = data.existingDODetail[i].skuCode || '';
                var soItemID = data.existingDODetail[i].soItemID || '';
                var rowIndex = i + 1;

                // Check if an item with the same serialNo or soItemID already exists
                var isDuplicate = storeDOSerialItemList.some(function(item) {
                    return item.serialNo === serialNo || item.soItemID === soItemID;
                });
                if (!isDuplicate) {
                    storeDOSerialItemList.push({
                        serialNo: serialNo,
                        productName: productName,
                        productID: productID,
                        soItemID: soItemID
                    });
                    generateDOTableRow(serialNo, productName, productID, skuCode, soItemID, rowIndex);
                }
            }
        }
        currentDO = deliveryID;
    }

    function successSaveStockOut() {
        showMessage('Stock out saved.', 'success', 'Stock Out', 'check', ['editSaleOrder.php', {id : editId, status : status} ]);
    }

    $("#saveTrackingNo").click(function() {
        var formData = {
            command     : 'updateStatusOnTracking',
            sale_id       : editId,
            deliveryPartner : $("input[name=shippingMethod]:checked").val(),
            trackingNo    : $("#trackingNo").val(),
        }

        fCallback = successTracking;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    })

    $("#updateTrackStatus").click(function() {
        var formData = {
            command     : 'updateStatusOnTracking',
            sale_id       : editId,
        }
        fCallback = successTracking;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    })

    function successTracking() {
        showMessage('The items have been confirmed for sale and are now out for delivery.', 'success', 'Tracking Number', 'check', ['editSaleOrder.php', {id : editId, status : status} ]);
    }

    $("#updateDeliverStatus").click(function() {
        
        var formData = {
            command     : 'updateStatusOnDelivered',
            saleID       : editId,
        }
        fCallback = successDelivered;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)    
    })

    function successDelivered() {
        showMessage('Status updated to Delivered', 'success', 'Delivered', 'check', ['editSaleOrder.php', {id : editId, status : status} ]);
    }

    function viewReceipt() {
        $('#viewReceiptModal').modal();
    }

    function changeItem(n) {
        var itemSelection = $('#itemSelection');
        var originalItemSelection = $('#originalItemSelection');
        originalItemSelection.empty();
        itemSelection.empty();
        var soItemID = n.getAttribute('data-id');
        var soItemName = n.getAttribute('data-name');
        originalItemSelection.append($('<option>', {
            value: soItemID,
            text: soItemName
        }));

        $.each(storeProductList, function(i, obj) {
            itemSelection.append($('<option>', {
                value: obj.id,
                'data-productID' : obj.id,
                'data-cost': obj.sale_price,
                text: obj.name
            }));
        });

        $('#itemSelection').prop('disabled', false);
        $('#itemSelection').select2();

        // Show the modal
        $('#changeItemModal').appendTo("body").modal('show');
    }

    
    function viewDO(doNo) 
    {   
        $('#download').find('option[value="delivery order"]').prop('hidden', 'hidden');

        var baseUrl = '<?php echo $config['loginToMemberURL'] ?>viewInvoice';
        var parameters = $.param({
            viewType: 'delivery order',
            saleId: editId,
            soNo: soNo,
            doNo: doNo,
            admin: 1,
        });
        var url = baseUrl + '?' + parameters;
        window.open(url, '_blank');
    }

    function openTrackingLink(trackingNumber) 
    {
        var trackingURL = `https://tracking.parcelhub.com.my/?tracking_codes=${trackingNumber}`;
        window.open(trackingURL, '_blank');
    }

    function loadEdit(data, message) {
        productDetails();
        soNo = data.soNo;

        status = data.so_status;

        $('#saleNo').text(soNo);

        // prefill promo code if got
        if(data.appliedPromoCode)
        {
            $('#promoCode').val(data.appliedPromoCode);
        }

        deliveryOrderList = data.deliveryOrderDetails;
        deliveryDisplayList = data.deliveryOrderDetails2;
        if(deliveryOrderList.length != 0){
            displayDOList();
        }

        if(data.remark){
            $("#creditNoteReferenceRow").show();
            $("#creditNoteReference").val(data.remark);
        }

        var buildOptionPayment = '<option value="">Select a Payment Method</option>';
        $.each(data.paymentArray, function(k,v) {
            buildOptionPayment += `
                <option value="${v['name']}" style="display:${v['status']}">${v['name']}</option>
            `;
        });

        var selectListPayment = $('#payment_method');
        selectListPayment.empty(); 
        selectListPayment.append(buildOptionPayment);

        if (data && data.shippingMethod != "Whallo") {
            if (data.shippingMethod) {
                $(`input[name=shippingMethod][value=${data.shippingMethod}]`).prop('checked', true);
            }
            $('#trackingNo').val(data.trackingNo);
        }

        if(data && data.hawbNo && data.shippingMethod == "Whallo") {
            hawbNo = data.hawbNo;
            $('input[name=shippingMethod][value=Whallo]').prop('checked', true);
            $('input[name=shippingMethod]').trigger('change');
            $('#trackingNo2').val(hawbNo);
        }

        if(data && data.remark) {
            $('#remark').val(data.remark);
        }

        if(data){
            status = data.so_status;
            $("#status").val(data.so_status);
        }

        if(data){
            $("#billingID").val(data.billingID);
            $("#shippingID").val(data.shippingID);
        }
        $("#payment_tax").val(data.payment_tax.toFixed(2));
        $("#shipping_fee").val(parseFloat(data.shipping_fee).toFixed(2));

        if(data.clientDetail){
            $('#name').val(data.clientDetail.name);
            $('#mobileNo').val(data.clientDetail.username);
            clientID = data.clientDetail.id;
        }
        if(data){
            $('#payment_method').val(data.paymentMethod);

            if(data.paymentMethod == 'FPX'){
                document.querySelector('#payment_method option[value="FPX"]').style.display = 'block';
            } 
            // else {
            //     document.querySelector('#payment_method option[value="FPX"]').style.display = 'none';
            // }

            if(data.paymentMethod && data.paymentMethod != 'FPX'){
                if(data.so_status ==  "Pending Payment Approve" || data.so_status ==  "Draft"){
                    var uploadReceiptSection = document.getElementById('uploadReceiptSection');
                    uploadReceiptSection.style.display = 'block';
                }
            }
        }

        buildOptionLength = 0;
        if(data.clientDetail){
            if(data.billingAddr){
                var billingAddr  = data.billingAddr;

            }else{
                var billingAddr  = 'Select Address';
            }

            buildOption = `
                <option value="">${billingAddr}</option>
            `;

            if(data.clientDetail.addressList){
                $.each(data.clientDetail.addressList, function(k,v) {
                    buildOption += `
                        <option value="${v['id']}">${v['address']}</option>
                    `;
                    buildOptionLength = buildOptionLength + 1;
                });
                $("#shippingPostCode").val(data.shippingAddress.address_post_code);

                var selectList = $('#billingAddressList');
                selectList.empty(); 
                selectList.append(buildOption);
            }
           
            if(data.billingEmail){
                $('#billingEmail').val(data.billingEmail);
            }

        }

        if(data.clientDetail){

            if(data.shippingAddr){
                var shippingAddr  = data.shippingAddr;
            }else{
                var shippingAddr  = 'Select Address';
            }
            
            buildOption2 = `
                <option value="">${shippingAddr}</option>
            `;

            if(data.clientDetail.addressList){
                $.each(data.clientDetail.addressList, function(k,v) {
                    buildOption2 += `
                        <option value="${v['id']}">${v['address']}</option>
                    `;
                    buildOptionLength2 = buildOptionLength2 + 1;
                });
                $("#shippingPostCode").val(data.shippingAddress.address_post_code);

                var selectList = $('#shippingAddressList');
                selectList.empty(); 
                selectList.append(buildOption2);
            }
            
            if(data.shippingEmail){
                $('#shippingEmail').val(data.shippingEmail);
            }
        }

        if (data.shippingAddress) {
            tempReceiverFullAddress = data.shippingAddress;
        }

        if (data.billingAddress) {
            tempBillingFullAddress = data.billingAddress;
        }

        productList = data.orderDetails;
        
        $.each(productList, function (k, v) { 
            var newK = k + 1;
            if(k != 0) 
                addRow(productList);

            loopQuantity(k);

            $("#quantity" + newK).val(v['quantity']);
            $("#id" + newK).val(v['purchase_product_id']);
            $("#productType" + newK).val(v['type']);

            if(v['type']=="redeem_point" || v['type']=="promo_code" || v['type'] == 'note' || v['type'] == "service"){
              
                if(v['type']=="promo_code"){
                    $("#cost" + newK).val(v['cost'] * -1).css("color", "transparent");
                }else{
                    $("#cost" + newK).val(v['cost']).css("color", "transparent");
                }
                var editTotal = v['cost'] * v['quantity'];
                $("#noteProductLabel" + newK).html(v['type'].charAt(0).toUpperCase() + v['type'].slice(1));
                $("#productSelect" + newK).css("display", "none");
                $("#noteProductInput" + newK).css("display", "block");
                $("#noteProductInput" + newK).val(v['item_name']);
                $("#quantity" + newK).attr("disabled", true);
                // handle for note type
                if(v['type'] != 'note')
                {
                    $("#closeBtn" + newK).css("display","none");
                }
                $("#s2id_productSelect" + newK).css("display", "none");
            } else if (v['type'] == "product" || v['type'] == "package" ) {
                $("#cost" + newK).val(v['cost']);
                var editTotal = v['cost'] * v['quantity'];
                $("#noteProductLabel" + newK).html(v['type'].charAt(0).toUpperCase() + v['type'].slice(1));
                $("#productSelect" + newK).val(v['product_id']);
                $("#productSelect" + newK).css("display", "block");
                $("#noteProductInput" + newK).css("display", "none");
                if(data.so_status ==  "Pending Payment Approve" || data.so_status ==  "Draft"){
                    $("#quantity" + newK).attr("disabled", false);
                }else{
                    $("#quantity" + newK).attr("disabled", true);
                }
                // $("#closeBtn" + newK).css("display","none");
                $("#s2id_productSelect" + newK).css("display", "none");
            }else if (v['type'] == "shipping_fee"){
                $("#cost" + newK).val(v['cost']);
                var editTotal = v['cost'] * v['quantity'];
                $("#noteProductLabel" + newK).html(v['type'].charAt(0).toUpperCase() + v['type'].slice(1));
                $("#productSelect" + newK).css("display", "none");
                $("#noteProductInput" + newK).css("display", "none");
                $("#serviceSelect" + newK).css("display", "block"); 
                $("#noteProductInput" + newK).val(v['item_name']);
                $("#quantity" + newK).attr("disabled", true);
                $("#closeBtn" + newK).css("display","none");
                $("#s2id_productSelect" + newK).css("display", "none");

                var buildOptionDelivery ='';
                $.each(data.deliveryMethodList, function(k, v) {
                    buildOptionDelivery += `
                        <option value="${v['value']}" ${v['check'] === 1 ? 'selected' : ''}>${v['name']}</option>
                    `;
                });

                var selectListPayment = $("#serviceSelect" + newK);
                selectListPayment.empty(); 
                selectListPayment.append(buildOptionDelivery);

                var deliverySelect;
                if (data.deliveryMethod == 'delivery' && data.shipping_fee == '35') {
                    deliverySelect = 'delivery';
                } else if (data.deliveryMethod == 'delivery' && data.shipping_fee == '15') {
                    deliverySelect = 'delivery';
                } else {
                    deliverySelect = data.deliveryMethod;
                }
                $("#serviceSelect" + newK).val(deliverySelect);
                getDeliveryFee(newK); 


            }else if (v['type'] == "stock"){
                $("#cost" + newK).val(v['cost']);
                var editTotal = v['cost'] * v['quantity'];
                $("#noteProductLabel" + newK).html(v['type'].charAt(0).toUpperCase() + v['type'].slice(1));
                $("#productSelect" + newK).css("display", "none");
                $("#noteProductInput" + newK).css("display", "block");
                $("#noteProductInput" + newK).val(v['item_name']);
                $("#quantity" + newK).attr("disabled", true);
                $("#closeBtn" + newK).css("display","none");
                $("#s2id_productSelect" + newK).css("display", "none");
            }

            if(data.so_status == 'Paid' || data.so_status == 'Order Processing' || data.so_status == 'Packed' || data.so_status == 'Out For Delivery' || data.so_status == 'Delivered')
            {
                $("#noteProductInput" + newK).prop("disabled", true);
            }
        });

        // Allow admin to change status & view receipt if status = Pending Payment Approve
        if(status == "Pending Payment Approve") {
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

            var receiptName = data.receiptName;
            if(receiptImg) {
                $("#receiptName").val(receiptName);
            }

        }

        if(data.so_status != "Draft" && data.so_status != "Pending" && data.so_status != "Pending Payment Approve") {
            $("#remarks").attr("disabled", true);
            $("input").attr("disabled", true);
            $("select").attr("disabled", true);
            $(".addProduct").css("display", "none");
            $("#edit").css("display", "none");
            $("#editPaid").css("display", "none");
            $("#editCancel").css("display", "none");
            $("#approve").attr("disabled", true);
            $(".closeBtn").css("display", "none");
            $("#serialNumberTable").css("display", "block");
            $('input[type="checkbox"]').attr("disabled", false);
        }

        if(data.so_status == "Paid") {
            $("#editOrderProcessing").show();
            $("#addCreditNoteBtn").show();
            $(".changeItemBtn").prop("disabled", false);
        }

        if(data.so_status == "Order Processing"){
            $("#editOrderProcessing").attr("disabled", true);
            $("#trackingNo").removeAttr('disabled');
            $("#inputSerial").removeAttr("disabled").focus();
            $("#inputSerialDO").removeAttr("disabled").focus();
            $("#addCreditNoteBtn").show();
            $("#displayDO").css("display", "block");
            $("#shippingMethodDiv input").removeAttr('disabled');
            $('#trackingNoDiv input').removeAttr('disabled'); 
            autoInpsertShippingData();
        }


        if(data.so_status == "Packed") {
            $("#inputSerial").attr("disabled", true);
            $('#shippingMethodDiv').css("display", "none");
            $("#trackingNoDiv").css("display", "none");
            $("#updateTrackStatus").css("display", "block");
            $("#displayDO").css("display", "none");
            $("#addCreditNoteBtn").show();
        }

        if(data.so_status == "Out of Delivery" || data.so_status == "Out For Delivery") {
            $("#trackingNo").removeAttr('disabled');
            $('#trackingNoDiv input').attr('disabled', true);
            $("#updateTrackStatus").css("display", "none");
            $("#updateDeliverStatus").css("display", "block");
            $("#addCreditNoteBtn").show();
        }

        if(data.so_status == "Delivered") {
            $("#trackingNo").removeAttr('disabled');
            $('#trackingNoDiv input').attr('disabled', true);
            $("#updateDelivered").attr("disabled", "true");
            $("#updateDeliverStatus").css("display", "none");
            $("#updateTrackStatus").css("display", "none");
            $("#addCreditNoteBtn").show();
        }  

        if (data.serial_number_list) {
            stockedOutArr = data.serial_number_list;
            insertSerialNumberData();
        }

        loopQuantity(productList.length);
    }

    function removeUrl(e, evt) {
        var url             = $(e).val();
        var serialNo        = url.replace(defaultSNUrl, '');
        var index           = serialNo.lastIndexOf('GT');
        serialNo            = serialNo.substring(index);
        var html_SO         = "";
        var targetBarcode   = $("#inputSerial").val();
        var productQuantity = 0;
        $(e).val(serialNo);

        var combinedData = combineQuantities(serialNumberList);

        for (let i = 0; i < combinedData.length; i++) {
            var countBarcode = targetBarcode.length;
            var countBarcode2 = combinedData[i]['barcode'].length + 3;
            var searchProductID = combinedData.find((item) => item.product_id === combinedData[i]['product_id']);
            if(targetBarcode.includes(combinedData[i]['barcode']) && countBarcode > countBarcode2){
                if (!enteredBarcodesByProduct[combinedData[i]['product_id']]) {
                    enteredBarcodesByProduct[combinedData[i]['product_id']] = [];
                }

                enteredBarcodes = enteredBarcodesByProduct[combinedData[i]['product_id']];
                var barcodeCount = enteredBarcodes.length;
              
               
                if (barcodeCount < combinedData[i]['quantity'] && !enteredBarcodes.includes(targetBarcode)) {
                    enteredBarcodes.push(targetBarcode);
                    // if (targetBarcode.includes(serialNumberList[i]['barcode']) && countBarcode > countBarcode2) {
                        html_SO += `
                            <tr>
                                <td>${deliverOrderTableRow}</td>
                                <td id="itemNameDO${deliverOrderTableRow}">${combinedData[i]['item_name']}</td>
                                <td>
                                    <input class="form-control deliveryOrderInput" type="text" id="deliveryOrderSerialNo${deliverOrderTableRow}" product-id="${combinedData[i]['product_id']}" onfocus="serialCheckingDO(this)" oninput="inputSerialCheckingDO(this)">
                                    <input class="form-control hide" type="text" id="deliveryOrderSerialID${deliverOrderTableRow}" value="${combinedData[i]['product_id']}">
                                    <input class="form-control hide" type="text" id="deliveryOrderSkuCode${deliverOrderTableRow}" value="${combinedData[i]['barcode'].replace('N', '')}">
                        `;

                        if (combinedData[i]['type']) {
                            html_SO += `
                                <input class="form-control additionalClass" type="text" id="deliveryOrderProductType${deliverOrderTableRow}" value="${combinedData[i]['type']}" style="display: none;">
                            `;
                        }

                        html_SO += `
                                </td>
                            </tr>
                        `;

                        deliverOrderTableRow++;

                        $('#deliveryOrderTableBody').append(html_SO);
                    // }
                } 
            }  
        }
        $('#stockOutTableBody tr').each(function() {
            var skuCode = $(this).find('[id^=skuCode]').val() + '-';
            if(serialNo.includes(skuCode)) {
                var stockOutSerialNo = $(this).find('[id^=stockOutSerialNo]');
                if(stockOutSerialNo.val() == serialNo) {
                    $('#canvasMessage').addClass('serialExist');
                    showMessage(`Serial number ${serialNo} already exist.`, 'warning', 'Warning', 'warning', '');
                    return false;
                } else if(stockOutSerialNo.val() == '' || stockOutSerialNo.val() == skuCode) {
                    if(!usedSerialNo.includes(serialNo)) {
                        usedSerialNo.push(serialNo)
                        stockOutSerialNo.val(serialNo);
                        return false;
                    }
                }
            }   
        });


        $('#deliveryOrderTableBody tr').each(function() {
            var skuCode = $(this).find('[id^=deliveryOrderSkuCode]').val() + '-';
            if(serialNo.includes(skuCode)) {
                var stockOutSerialNo = $(this).find('[id^=deliveryOrderSerialNo]');
               if(stockOutSerialNo.val() == '' || stockOutSerialNo.val() == skuCode) {
                    if(!usedSerialNoDO.includes(serialNo)) {
                        usedSerialNoDO.push(serialNo)
                        stockOutSerialNo.val(serialNo);
                        return false;
                    }
                }
            }   
        });
    }

    function combineQuantities(data) {
        var combinedItems = {};

        data.forEach((item) => {
            if (item.barcode in combinedItems) {
            combinedItems[item.barcode].quantity += item.quantity;
            } else {
            combinedItems[item.barcode] = { ...item };
            }
        });

        return Object.values(combinedItems);
    }

    function removeUrlDO(e, evt) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');
        var index = serialNo.lastIndexOf('GT');
        serialNo = serialNo.substring(index);
        var html_SO = "";
        var targetBarcode = $("#inputSerialDO").val();
        var productQuantity = 0;
        $(e).val(serialNo);
        var appendedInputID = "";
        serialNo = serialNo.trim(); // remove space from the serial number input
        var combinedData = combineQuantities(serialNumberList);
        $('#deliveryOrderTableBody').empty();

        // Now perform the checks on stockOutTableBody
        $('#stockOutTableBody tr').each(function() {
            var skuCode = $(this).find('[id^=skuCode]').val();
            console.log('serialNo:', serialNo);
            console.log('skuCode:', skuCode);
            if (serialNo.includes(skuCode)) {
                var stockOutSerialNo = $(this).find('[id^=stockOutSerialNo]');
                var insertedSkuAry = serialNo.split("-");
                if (stockOutSerialNo.val() == skuCode && skuCode != "" && insertedSkuAry.length > 2 && insertedSkuAry[2].length > 2 && !$("#stockOutMystery").is(":checked")) {
                    if (!usedSerialNo.includes(serialNo)) {
                        usedSerialNo.push(serialNo);
                        stockOutSerialNo.val(serialNo);
                        $("#"+appendedInputID).val(serialNo);
                        $(this).find('[id^=skuCode]').val(serialNo);                        
                        enteredBarcodes.push(serialNo);
                        var productName = $(this).find('[id^=item_name]').html();
                        var productID = $(this).find('[id^=stockOutSerialID]').val();
                        var soItemID = $(this).find('[id^=stockOutSerialNo]').data('id');

                        storeDOSerialItemList.push({
                            serialNo: serialNo,
                            productName: productName,
                            productID: productID,
                            soItemID: soItemID
                        });
                        
                        deliverOrderTableRow++;
                        return false;
                    }
                }
                if ($("#stockOutMystery").is(":checked")) {
                    var skuCode = $(this).find('[id^=skuCode]').val();
                    var insertedSkuAry = serialNo.split("-");
                    if (skuCode == "" && insertedSkuAry.length > 2 && insertedSkuAry[2].length > 2) {
                        if (!usedSerialNo.includes(serialNo)) {
                            usedSerialNo.push(serialNo);
                            stockOutSerialNo.val(serialNo);
                            $("#"+appendedInputID).val(serialNo);
                            $(this).find('[id^=skuCode]').val(serialNo);

                            var productName = $(this).find('[id^=item_name]').html();
                            var productID = $(this).find('[id^=stockOutSerialID]').val();
                            var soItemID = $(this).find('[id^=stockOutSerialNo]').data('id');

                            storeDOSerialItemList.push({
                                serialNo: serialNo,
                                productName: productName,
                                productID: productID,
                                soItemID: soItemID
                            });

                            enteredBarcodes.push(serialNo);

                            deliverOrderTableRow++;
                            return false;
                        }
                    }
                }
            }  
        });
        for (var i = 0; i < storeDOSerialItemList.length; i++) {
            var serialNo = storeDOSerialItemList[i].serialNo;
            var productName = storeDOSerialItemList[i].productName;
            var productID = storeDOSerialItemList[i].productID;
            var skuCode = storeDOSerialItemList[i].skuCode || ''; 
            var soItemID = storeDOSerialItemList[i].soItemID || ''; 
            var rowIndex = i + 1;

            generateDOTableRow(serialNo, productName, productID, skuCode, soItemID, rowIndex);
        }
    }


    $('#canvasMessage').on('hidden.bs.modal', function() {
        if($(this).hasClass('serialExist')) {
            $('#inputSerial').focus();
            $(this).removeClass('serialExist');
        } else if($(this).hasClass('inputSerialExist')) {
            warningInput.focus();
            $(this).removeClass('inputSerialExist');
        }
    })

    function generateDOTableRow(serialNo, productName, productID, skuCode, soItemID, rowIndex) {
        // console.log('Generating row for:', serialNo, productName, productID, skuCode, soItemID, rowIndex);
        var formattedSkuCode = skuCode ? skuCode.replace('N', '') : ''; 
        var html_SO = `
            <tr>
                <td>${rowIndex}</td>
                <td id="itemNameDO${rowIndex}">${productName}</td>
                <td>
                    <input class="form-control deliveryOrderInput" type="text" id="deliveryOrderSerialNo${rowIndex}" product-id="${productID}" onfocus="serialCheckingDO(this)" oninput="inputSerialCheckingDO(this)" value="${serialNo}" data-id="${soItemID}" disabled>
                    <input class="form-control hide" type="text" id="deliveryOrderSerialID${rowIndex}" value="${productID}">
                    <input class="form-control hide" type="text" id="deliveryOrderSkuCode${rowIndex}" value="${formattedSkuCode}">
        `;

        html_SO += `
                <input class="form-control additionalClass" type="text" id="deliveryOrderProductType${rowIndex}" value="product" style="display: none;">
        
            </td>
            <td>
                <a href="javascript:void(0);" class="btn btn-danger removeBtn" data-id="${soItemID}" data-sku="${formattedSkuCode}" data-rowIndex="${rowIndex}" data-sn="${serialNo}" onclick="cancelDORow(this)">&times;</a>
            </td>
        </tr>
        `;

        $('#deliveryOrderTableBody').append(html_SO);
        return html_SO;
    }

    function serialChecking(e) {
        var skuCode = $(e).parent().find('[id^=skuCode]').val() + '-';
        if($(e).val() == '') $(e).val(skuCode);
    }

    function serialCheckingDO(e) {
        var skuCode = $(e).parent().find('[id^=deliveryOrderSkuCode]').val();
        if($(e).val() == '') $(e).val(skuCode);
    }

    function inputSerialChecking(e) {
        var aNthChild = $(e).attr('id').replace('stockOutSerialNo', '');
        var skuCode = $(e).parent().find('[id^=skuCode]').val();

        var aSerialLength = $(e).val().length;
        var bSerialLength = skuCode.length;

        if(aSerialLength < bSerialLength) {
            $(e).val(skuCode);
        }

        $('#stockOutTableBody tr').each(function() {
            var stockOutSerialNo = $(this).find('[id^=stockOutSerialNo]');
            var bNthChild = stockOutSerialNo.attr('id').replace('stockOutSerialNo', '');
            
            if(bNthChild != aNthChild) {
                if(stockOutSerialNo.val() == $(e).val() && stockOutSerialNo.val() != skuCode) {
                    $('#canvasMessage').addClass('inputSerialExist');
                    showMessage(`Serial number ${$(e).val()} already exist.`, 'warning', 'Warning', 'warning', '');
                    $(e).val(skuCode);
                    warningInput = e;
                }
            }
        });
    }

    function inputSerialCheckingDO(e) {
        var aNthChild = $(e).attr('id').replace('deliveryOrderSerialNo', '');
        var skuCode = $(e).parent().find('[id^=deliveryOrderSkuCode]').val();

        var aSerialLength = $(e).val().length;
        var bSerialLength = skuCode.length;

        if(aSerialLength < bSerialLength) {
            $(e).val(skuCode);
        }

        $('#deliveryOrderTableBody tr').each(function() {
            var stockOutSerialNo = $(this).find('[id^=deliveryOrderSerialNo]');
            var bNthChild = stockOutSerialNo.attr('id').replace('deliveryOrderSerialNo', '');
            
            if(bNthChild != aNthChild) {
                if(stockOutSerialNo.val() == $(e).val() && stockOutSerialNo.val() != skuCode) {
                    $('#canvasMessage').addClass('inputSerialExist');
                    showMessage(`Serial number ${$(e).val()} already exist.`, 'warning', 'Warning', 'warning', '');
                    $(e).val(skuCode);
                    warningInput = e;
                }
            }
        });
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
                $("#shippingPostCode").val(data.addressList.post_code);
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

    function cancelDORow(n) {
        event.preventDefault();
        var soItemID = n.getAttribute('data-id');
        var rowIndex = n.getAttribute('data-rowIndex');
        var sn = n.getAttribute('data-sn');
        var sku;
        // search item list array and get SKU code for reset
        for(var i =0;i < serialNumberList.length;i++){
            if(serialNumberList[i]["id"] == soItemID){
                sku = serialNumberList[i]["barcode"];
            }
        }
        
        $("#skuCode"+soItemID).val(sku);

        usedSerialNo = usedSerialNo.filter(e => e !== sn); // will return ['A', 'C']

        $('#deliveryOrderTableBody').find('[data-id="' + soItemID + '"]').parent().parent().remove();

        // remove item list table, make it back to original value
        var inputElement = $('#stockOutTableBody').find('[data-id="' + soItemID + '"]').parent().parent().find('.stockOutInput');
        var currentValue = inputElement.val();
        var parts = currentValue.split('-');
        var newValue = parts.slice(0, 2).join('-');
        inputElement.val(newValue);
        var revertElement = '[data-id="' + soItemID + '"]';
        var elements = document.querySelectorAll(revertElement);
        elements.forEach(function(element) {
            if (element.value === currentValue) {
                element.value = newValue;
            }
        });
        $(n).closest('tr').remove();

        for (var i = 0; i < storeDOSerialItemList.length; i++) {
            if (storeDOSerialItemList[i].soItemID == soItemID) {
                storeDOSerialItemList.splice(i, 1);
                // console.log('storeDOSerialItemList after removal:', storeDOSerialItemList);
                break; 
            }
        }
        
        $('#deliveryOrderTableBody').empty();

        for (var i = 0; i < storeDOSerialItemList.length; i++) {
            var serialNo = storeDOSerialItemList[i].serialNo;
            var productName = storeDOSerialItemList[i].productName;
            var productID = storeDOSerialItemList[i].productID;
            var skuCode = storeDOSerialItemList[i].skuCode || ''; 
            var soItemID = storeDOSerialItemList[i].soItemID || ''; 
            var rowIndex = i + 1;
            
            generateDOTableRow(serialNo, productName, productID, skuCode, soItemID, rowIndex);
        }
    }

    function getDeliveryFee(id) {
        $('.errorSpan').empty();
        $('#errorInput').hide();

        // store delivery method id 
        var select_id       = id;
        var getSelectNameID = document.getElementById("serviceSelect" + select_id);
        var selectName      = getSelectNameID.value;
        var fee             = parseFloat($("#shipping_fee").val());
        var selectedOption = getSelectNameID.options[getSelectNameID.selectedIndex];
        var selectedText = selectedOption.textContent.trim();

        var formData = {
            command        : "getDeliveryFee",
            // deliveryMethod : selectName,
            deliveryMethod : selectedText,
            id             : id,
            previousFee    : fee,
            saleID        : editId,
            shippingPostCode : $("#shippingPostCode").val(),
        };
        fCallback = displayDeliveryFee;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayDeliveryFee(data) {
        $('.errorSpan').empty();
        $('#errorInput').hide();
        // $('#shipping_fee').val(data.Method);
        // $('#subtotal').val(parseFloat(data.amount).toFixed(2));
        var fee = data['fee'];
        var id = data['id'];
        if(data['type'] == 'shippingFee'){
            $('#shipping_fee').val(fee);
            $("#cost" + id).val(fee);
            $("#quantity" + id).val(data['quantity']);
                // $("#total" + id).val(data['total'].toFixed(2));
                $("#total" + id).val(data['total']);

        }
        if(data['previousFee']){
            var previousFee = data['previousFee'];
        }else{
            var previousFee = 0;
        }

        var subtotal = parseFloat($("#subtotal").val());
        var fee = parseFloat($("#shipping_fee").val());
        var grantotal = parseFloat($("#grandtotal").val());

        grantotal = grantotal + fee - previousFee;
        $("#grandtotal").val(parseFloat(grantotal).toFixed(2));
    }

    $('input[name=shippingMethod]').change(function() {
        if($(this).val() == 'Grab') {
            $('#tracking1').show();
            $('#tracking2').hide();
            $('#trackParcel').hide();
        } else {
            $('#tracking1').hide();
            $('#tracking2').show();
            $('#trackParcel').show();
            autoInpsertShippingData();
        }
    });

    $('#whalloSubmitBtn').click(function() {
        
        var shipperBranch = $('input[name=shipperBranch]').val();

        var klAddress = {
            shipper_name :  'GoTasty',
            shipper_address_line_1 :  '31-G, Jalan Damai Raya 6',
            shipper_address_line_2 :  'Alam Damai',
            shipper_city :  'Kuala Lumpur',
            shipper_postcode :  '56000',
            shipper_state :  'Kuala Lumpur',
            shipper_country_code :  'MY',
            shipper_tel :  '60182626000',
        };

        var penangAddress = {
            shipper_name :  'GoTasty',
            shipper_address_line_1 :  '66-G, Skyline City',
            shipper_address_line_2 :  'Lintang Sungai Pinang',
            shipper_city :  'Jelutong',
            shipper_postcode :  '10150',
            shipper_state :  'Penang',
            shipper_country_code :  'MY',
            shipper_tel :  '60182626000',
        };

        var shipperAddress;

        if(shipperBranch == 'Kuala Lumpur') shipperAddress = klAddress;
        else shipperAddress = penangAddress;

        var receiver_contact_person = $('#receiverName').val();
        var receiver_tel = $('#receiverPhone').val();
        var receiver_address_line_1 = $('#receiverAddress1').val();
        var receiver_address_line_2 = $('#receiverAddress2').val();
        var receiver_city = $('#receiverCity').val();
        var receiver_postcode = $('#receiverPostCode').val();
        var receiver_state = $('#receiverState').val();
        var receiver_country_code = $('#receiverCountryCode').val();

        var remark = $('#remark').val();
        var package_type = 'parcel';
        var pickup_type = 1;
        var receiver_name = receiver_contact_person;
        var parcel_weight = $('#parcelWeight').val();
        var parcel_height = $('#parcelHeight').val();
        var parcel_width = $('#parcelWidth').val();
        var parcel_length = $('#parcelLength').val();

        var delivery_order_no = getfirstDONo(deliveryDisplayList);

        const radioButtons = document.getElementsByName('shippingMethod');

        var selectedDelivery = '';
        for (const radioButton of radioButtons) {
            if (radioButton.checked) {
                selectedDelivery = radioButton.value;
                break;
            }
        }
        if(selectedDelivery == 'PARCELHUB'){
            var selectMethod = 'Whallo X';
        }
        else if(selectedDelivery == 'Whallo'){
            var selectMethod = 'Whallo Cold';
        }
        else
        {
            var selectMethod = 'Whallo X';
        }

        var formData = {
            command                 : 'parcelhubCreateParcel',
            shipper_name            : shipperAddress.shipper_name,
            shipper_address_line_1  : shipperAddress.shipper_address_line_1,
            shipper_address_line_2  : shipperAddress.shipper_address_line_2,
            shipper_city            : shipperAddress.shipper_city,
            shipper_postcode        : shipperAddress.shipper_postcode,
            shipper_state           : shipperAddress.shipper_state,
            shipper_country_code    : shipperAddress.shipper_country_code,
            shipper_tel             : shipperAddress.shipper_tel,
            receiver_contact_person : receiver_contact_person,
            receiver_address_line_1 : receiver_address_line_1,
            receiver_address_line_2 : receiver_address_line_2,
            receiver_city           : receiver_city,
            receiver_postcode       : receiver_postcode,
            receiver_state          : receiver_state,
            receiver_country_code   : receiver_country_code,
            receiver_tel            : receiver_tel,
            remark                  : remark,
            package_type            : package_type,
            pickup_type             : pickup_type,
            receiver_name           : receiver_name,
            sale_id                 : editId,
            parcel_weight           : parcel_weight,
            parcel_height           : parcel_height,
            parcel_width            : parcel_width,
            parcel_length           : parcel_length,
            delivery_order_no       : delivery_order_no,
            courier_name            : selectMethod,
        };
        fCallback = successSubmitWhallo;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function successSubmitWhallo(data, message) {
        if(data.message == 'Shipment created') {
            showMessage(data.message, 'success', 'Success Update Shipping Details', 'check', ['editSaleOrder.php', {id : editId, status : status} ]);  
        } else {
            showMessage(data.message, 'warning', 'Warning', 'warning', '');
        }
    }

    function getfirstDONo(dataList) {
        for (var data of dataList) {
            if (data.status === "Draft") {
                return data.do_no;
            }
        }
        return null; 
    }

    $('#printAirwayBillBtn').click(function() {
        var formData = {
            command     : 'parcelhubCheckLabel',
            hawb_no     : hawbNo,
        };
        fCallback = successRetrivePdf;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function successRetrivePdf(data, message) {
        var binary = atob(data.replace(/\s/g, ''));
		var len = binary.length;
		var buffer = new ArrayBuffer(len);
		var view = new Uint8Array(buffer);
		for (var i = 0; i < len; i++) {
			view[i] = binary.charCodeAt(i);
		}

		// Create the blob object with content-type "application/pdf"
		var blob = new Blob([view], { type: "application/pdf" });
		var url = URL.createObjectURL(blob);

		var viewPdfWindow = window.open(url, "_blank");
		
		setTimeout(function() {
			viewPdfWindow.document.title = 'Whallo Airway Bill';
		}, 500);
    }

    $('#trackParcelBtn').click(function() {
        var formData = {
            command     : 'parcelhubCheckTrack',
            hawb_no     : hawbNo,
        };
        fCallback = successTrackParcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function successTrackParcel(data, message) {
        if(data.Status) {
            $('#trackStatus').html(data.Status);
        }

        if(data.StatusUpdatedAt) {
            $('#trackStatusUpdatedAt').html(data.StatusUpdatedAt);
        }

        if (!data.Status && !data.StatusUpdatedAt) {
            $('#trackStatusUpdatedAt').html("No Result Found");
        }
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

    function insertSerialNumberData() {
        $.each(stockedOutArr, function(snlK, snlV) {
            var tempProductRow = $(`input[product-id=${snlV.product_id}]`);

            if (tempProductRow.length > 1) {
                var tempRowID = tempProductRow[0].id;
                $(`#${tempRowID}`).val(snlV['serial_number']).attr({ "disabled": true, "product-id": "" });
            } else {
                tempProductRow.val(snlV['serial_number']).attr("disabled", true);
            }

            $('tr[id^="stockOutTable"]').each(function() {
                var barcode = $(this).find('input#stockOutSerialNo' + this.id.substring('stockOutTable'.length)).attr('value');
                var snlBarcode = snlV.serial_number;

                if(snlBarcode.includes(barcode)){
                    var tableElement = $('#stockOutTable').find('table');
                    tableElement.removeClass('table-striped');
                    $(this).css('background-color', '#90EE90');
                }
            });
        });

    }

    function autoInpsertShippingData() {
        if (tempReceiverFullAddress) {
            $("#receiverName").val(tempReceiverFullAddress.address_name);
            $("#receiverPhone").val(tempReceiverFullAddress.address_phone);
            $("#receiverAddress1").val(tempReceiverFullAddress.address_line1);
            $("#receiverAddress2").val(tempReceiverFullAddress.address_line2);
            $("#receiverCity").val(tempReceiverFullAddress.address_city);
            $("#receiverPostCode").val(tempReceiverFullAddress.address_post_code);
            $("#receiverState").val(tempReceiverFullAddress.address_state);
        } else {
            $("#receiverName").val($("#name").val());
            $("#receiverPhone").val($("#username").val());
        }

        $("#receiverCountryCode").val("MY").attr("disabled", true);
    }

    function cancelAirway(trackingNo) {
        var formData = {
            command     : 'cancelParcelhub',
            shipment_id : trackingNo,
        };
        fCallback = cancelAirwayBill;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function cancelAirwayBill(data, message) {    
        showMessage('Cancelled Airway Bill', 'success', 'Sale Order Updated', 'check');        
        location.reload();
    }

</script>
</body>
</html>