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
                             <a href="order.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">
                                    Purchase Order
                                </h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                Vendor
                                            </label>
                                            <select id="vendorDropdown" class="form-control" disabled>
                                                <!-- <option value="">Select a vendor</option> -->
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                Status
                                            </label>
                                            <input id="status" type="text" class="form-control" disabled />
                                        </div>
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
                                                                    <label>1. Product</label>
                                                                    <select id="productSelect1" class="form-control productSelect" required></select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Quantity</label>
                                                                    <!-- <input id="quantity1" type="number" oninput="productListOpt()" class="form-control quantityInput" value="0" placeholder="0" required/> -->
                                                                    <input id="quantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Cost</label>
                                                                    <input id="cost1" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" required readonly/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Total Amount</label>
                                                                    <input id="total1" type="number" value="0.00" class="form-control totalInput" readonly/>
                                                                    
                                                                    <input id="id1" type="text" class="form-control hide"/>
                                                                    <input id="action1" type="text" class="form-control hide" value="" type="">
                                                                    <input id="productType1" type="text" class="form-control hide"/ value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="addProduct" onclick="addRow()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Product</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="addProduct" onclick="addFOC()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add FOC</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>Subtotal</label>
                                            <input id="subtotal" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>
                                                Branch Address
                                            </label>
                                            <input id="branchAddressText" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6"  style="margin-top: 15px;">
                                            <label>Warehouse Location</label>
                                            <input id="warehouse" type="text" class="form-control" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>Remarks</label>
                                            <textarea id="remarks" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                            Images (Recommended Size: 600 x 310 px)
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div id="buildImg">
                                                </div>

                                                <div class="col-md-4 addImgBtn">
                                                    <div class="addProductImage" onclick="addImage()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Images</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <span id="imgError" class="errorSpan text-danger"></span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span id="imgTypeError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>Created By</label>
                                            <input id="createdBy" type="text" class="form-control" disabled />
                                        </div>
                                        <div class="col-md-6" style="margin-top: 15px;">
                                            <label>Approved By</label>
                                            <input id="approvedBy" type="text" class="form-control" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-t-20">
                                            <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Update Purchase Order
                                            </button>

                                            <button id="approve" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Confirm Purchase Order
                                            </button>

                                            <button id="cancelled" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Cancelled Purchase Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="row" id="serialNumberTable" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <!-- <button id="assign" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Assign Serial Number</button>
                                <button id="clearInput" class="btn btn-primary" onclick="clearSerial()" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;">Clear Serial Number</button> -->

                                <div class="card foc-card mx-0" id="foc" >
                                    <p class="text-center foc-title">Serial number</p>
                                    <div class="card-body">
                                        <div class="form-group" id="focProd">
                                            <label class="control-label">
                                                Serial Number List:
                                            </label>
                                            <textarea type="text" id="serial" class="form-control" style="height: 100px;"></textarea>
                                            <textarea type="text" id="serialShowIncrement" class="form-control" style="display: none;"></textarea>
                                            <textarea type="text" id="serialForDone" class="form-control" style="display: none;"></textarea>
                                    </div>
                                    </div>
                                </div>

                                <!-- <button id="confirmSerial" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;" disabled>Confirm Serial Number</button> -->
                                <button id="printSerial" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Print Serial Number</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="stockIn" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <p class="text-center foc-title">Stock In</p>
                                <input class="form-control stockOutInput m-b-10" type="text" id="inputSerial" onchange="removeUrl(this, event)">
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

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                    <video id="modalVideo" width="400" controls>
                    <source src="" type="">
                    </video>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
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
    var url             = 'scripts/reqAdmin.php';
    var url2             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback       = "";
    var editId          = "<?php echo $_POST['id']; ?>";
    var status          = "<?php echo $_POST['status']; ?>";
    var createdAt       = "<?php echo $_POST['createdAt']; ?>";
    var vendor          = "<?php echo $_POST['vendor']; ?>";
    var html = `<option value="">Select Product</option>`;
    var product_list      = null;
    var wrapperLength = 2;
    var subtotal = 0;
    var action = "";
    var typeR = "";
    var totalLoop =[1];
    var vendor_id_ini = "";
    var tableIndex;
    var serialInputNum = [];
    var vendorName = "";
    var serial_number = [];
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";
    var addImgCount = 0;
    var addImgIDNum = 0;
    var usedSerialNo = [];

    $(document).ready(function() { 
        if (editId) {
            var formData = {
                'command': 'getPurchaseOrderDetails',
                'id'     : editId
            };
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else{
            window.location = 'order.php';
        }

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

        // $('#vendor_name').change(function() {
        //     var selectedOption = $('#vendor_name option:selected');
        //     var optionText = $.trim(selectedOption.text());
        //     productDetails();
        //     countSubtotal();
        // });

        $('#approve').click(function() {
            var productSet= [];

            // $.each(totalLoop, function (k, v) {
            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                var name = $('option:selected', "#productSelect"+v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();
                var product_id = $('option:selected', "#productSelect"+v).val();
                var id = $('#id'+v).val();
                action = $('#action'+v).val();

                if($('#action'+v).val() == "add" && $('#id'+v).val() != "") {
                    action = "";
                    typeR = "";
                }
                if($('#action'+v).val() == "add" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "";
                }
                if ($('#action'+v).val() == "foc" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "foc";
                }
                if ($('#action'+v).val() == "delete" && $('#productType'+v).val() == "FOC") {
                    // action = "delete";
                    typeR = "foc";
                }
                if (v == "1") {
                    action = "";
                    typeR = "";
                }

                var perProduct = {
                    id : id,
                    product_id : product_id,
                    name:name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                    type: typeR,
                }
                productSet.push(perProduct);
            }
            // })

            uploadImage = [];
            uploadImageData = [];
            $(".popupMemoImageWrapper").each(function() { 
                var imgData = $(this).find('[id^="storeFileData"]').val();
                var imgName = $(this).find('[id^="storeFileName"]').val();
                var imgType = $(this).find('[id^="storeFileType"]').val();
                var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                var imgSize = $(this).find('[id^="storeFileSize"]').val();
                var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

                if(imgData != "") {
                    buildUploadImage = {
                        imgName : imgName,
                        imgType : imgType,
                        imgFlag : imgFlag,
                        imgSize : imgSize,
                        uploadType : imgUploadType
                    };

                    // if(parseFloat(imgSize) / 1048576 > 3) {
                    //     imgSizeFlag = false;
                    // }
                    var stringImgData = '';

                    if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
                        stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
                    } else {
                        stringImgData = JSON.stringify(imgData);
                    }

                    reqData = {
                        imgName : imgName,
                        // imgData : JSON.stringify(imgData),
                        imgData : stringImgData,
                        // imgType : imgType,
                        // imgSize : imgSize,
                        // uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(reqData);
                }
            });

            var formData = {
                command: "approvePurchaseOrder",
                vendor_id             : $("#vendorDropdown").val(),
                purchase_product_list : productSet,
                remarks               : $("#remarks").val(),
                uploadImage           : uploadImage,
                id                    : editId,
                status                : 'Confirmed'
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
                    createdAt: createdAt,
                    vendor: vendor
                }]
            );
        }

        $('#edit').click(function() {
            var productSet= [];

            // $.each(totalLoop, function (k, v) {
            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                var name = $('option:selected', "#productSelect"+v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();
                var product_id = $('option:selected', "#productSelect"+v).val();
                var id = $('#id'+v).val();
                action = $('#action'+v).val();

                if($('#action'+v).val() == "add" && $('#id'+v).val() != "") {
                    action = "";
                    typeR = "";
                }
                if($('#action'+v).val() == "add" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "";
                }
                if ($('#action'+v).val() == "foc" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "foc";
                }
                if ($('#action'+v).val() == "delete" && $('#productType'+v).val() == "FOC") {
                    // action = "delete";
                    typeR = "foc";
                }
                if (v == "1") {
                    action = "";
                    typeR = "";
                }

                var perProduct = {
                    id : id,
                    product_id : product_id,
                    name:name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                    type: typeR,
                }
                productSet.push(perProduct);
            }
            // })

            uploadImage = [];
            uploadImageData = [];
            $(".popupMemoImageWrapper").each(function() { 
                var imgData = $(this).find('[id^="storeFileData"]').val();
                var imgName = $(this).find('[id^="storeFileName"]').val();
                var imgType = $(this).find('[id^="storeFileType"]').val();
                var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                var imgSize = $(this).find('[id^="storeFileSize"]').val();
                var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

                if(imgData != "") {
                    buildUploadImage = {
                        imgName : imgName,
                        imgType : imgType,
                        imgFlag : imgFlag,
                        imgSize : imgSize,
                        uploadType : imgUploadType
                    };

                    // if(parseFloat(imgSize) / 1048576 > 3) {
                    //     imgSizeFlag = false;
                    // }
                    var stringImgData = '';

                    if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
                        stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
                    } else {
                        stringImgData = JSON.stringify(imgData);
                    }

                    reqData = {
                        imgName : imgName,
                        // imgData : JSON.stringify(imgData),
                        imgData : stringImgData,
                        // imgType : imgType,
                        // imgSize : imgSize,
                        // uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(reqData);
                }
            });

            var formData = {
                command  : "purchaseOrderEdit",
                // buying_date : $("#buyingDate").val(),
                vendor_id : $("#vendorDropdown").val(),
                purchase_product_list : productSet,
                remarks : $("#remarks").val(),
                id : editId,
                uploadImage: uploadImage,

            }; 
            var fCallback = sendEdit;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#printSerial').click(printStickers);
    });

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

    function loadFormDropdownProduct(data, message) {
        $.each(productData, function(key, val) {
            var pName = val['name'];
            $('#product_name').append($('<option>', {
                value: val['id'],
                text: pName
            }));
        });
    }
    // var wrapperLength = $(".addProductWrapper").length + 1;

    function addRow(data){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-4">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>
                                                                 
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
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
                            <input id="productType${(wrapperLength)}" type="text" class="form-control hide" value=""/>
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
        // loopQuantity(id);
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
                            <input id="productType${(wrapperLength)}" type="text" class="form-control hide" value="FOC"/>
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
        // loopQuantity(id); 
    }

    function closeDiv(n,id) {
        var totalLoop =[1];

        const index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');
        // $("#id" + id).val('');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        // $(n).parent().parent().remove();
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

        // $.each(totalLoop, function (k, v) {
        //     var total = $("#total" + v).val();
        //     subtotal = parseFloat(total) + parseFloat(subtotal);
        // })

        $("#subtotal").val(subtotal.toFixed(2));
    }
    
    function productListOpt(data, message) {
        if(data) {
            $.each(data.product, function(i, obj) {
                html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
            });
            
            $(".productSelect").html(html);
        }

        loadSelect();
    }

    function keyinQuantity() {
        var quantity = $("#quantity1").val(); 
        var total_per_row = quantity * product_cost;
        var decimal_total_per_row = total_per_row.toFixed(2);

        $('#total1').val(decimal_total_per_row);
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
    
    function loadEdit(data, message) {
        $("#subtotal").val(data.total_cost);
        $("#remarks").val(data.remarks);
        $("#warehouse").val(data.current_warehouse_location);
        $("#createdBy").val(data.Created_by);
        $("#approvedBy").val(data.approved_by);
        $("#branchAddressText").val(data.vendor_address);

        productList = data.productList;

        if(vendor == ""){
            vendorName = data.productList[0]['vendor_name'];
        }

        if(data.status == "Confirmed" || data.status == "Pending For Stock In" || data.status == "Done" || data.status == "Cancelled") {
            $("#cancelled").hide();
        }

        if(data.status == "Pending For Stock In") {
            $("#inputSerial").removeAttr("disabled").focus();
        }

        $.each(productList, function (k, v) { 
            var newK = k + 1;
            if(k != 0) 
                addRow(productList);

            loopQuantity(k);

            $("#quantity" + newK).val(v['quantity']);
            $("#id" + newK).val(v['purchase_product_id']);
            $("#productType" + newK).val(v['type']);

            $("#cost" + newK).val(v['cost'].toFixed(2));
            var editTotal = v['cost'] * v['quantity'];
            $("#total" + newK).val(editTotal.toFixed(2)); 

            // $("#productSelect" + newK).val(v['product_id']);

            if(status != "Draft") {
                $("#remarks").attr("disabled", true);
                $("input").attr("disabled", true);
                $("select").attr("disabled", true);
                $(".addProduct").css("display", "none");
                $("#edit").attr("disabled", true);
                $("#approve").attr("disabled", true);
                $(".closeBtn").css("display", "none");
                if(status != "Cancelled") {
                    $("#serialNumberTable").css("display", "block");
                }
                $('.addProductImage').hide();
                //assignSerialNumber();;
            }         
        });

        var imageList = data.imageList;

        $.each(imageList, function(k, v) {
            var newK = k + 1;
            addImage(v['url']);
            $('#fileName' + newK).html(v['name']);
            $("#viewImg" + newK).css('display', 'inline-block');
            $("#deleteImg" + newK).css('display', 'inline-block');

            $('#storeFileName' + newK).val(v['name']);
            $('#storeFileData' + newK).val(v['url']);
            $('#storeFileIsExist' + newK).val('true');

            var dataUrl = '';

            var image = new Image();
            image.crossOrigin='anonymous';
            image.onload = () => {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                canvas.height = image.naturalHeight;
                canvas.width = image.naturalWidth;
                ctx.drawImage(image, 0, 0);
                dataUrl = canvas.toDataURL();

                $('#storeFileIsExist' + newK).val('true');
                $('#storeFile64Bit' + newK).val(dataUrl);
            }
            
            image.src = $('#storeFileData' + newK).val();
        })

        if(status == 'Pending For Stock In') {
            assignSerialNumber();
            $('#serial').prop("readonly", "true");
            $('#inputSerial').attr('disabled', false);
        }

        if(status == 'Confirmed') {
            assignSerialNumber();
        }

        loopQuantity(data.productList.length);

        if(status == 'Done') {
            var displaySerial = '';

            $.each(data.serialList, function(m, n) {
                displaySerial += `${n}\n`;  
            })

            $('#serial').val(displaySerial);
            $('#serial').prop("readonly", "true");

            if(data.serialNumberList != null){
                serial_number = data.serialNumberList;
            
                $('#serialForDone').val(serial_number.join('  ||  '));
            }
        }

        vendor_id_ini = data.vendor_id;

        var formData = {
            command        : "getVendor",
        };
        fCallback = loadFormDropdownVendor;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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

        var selectedOption = $('#vendorDropdown option:selected').text();
        var formData = {
            command        : "getProductList",
            vendor_name    : vendor,
        };
        fCallback = productListOpt;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSelect() {
        var formData = {
            'command': 'getPurchaseOrderDetails',
            'id'     : editId
        };
        fCallback = selectPR;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function selectPR(data, message) {
        productData = data.productList;
        $.each(data.productList, function (m, v) {
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
        showMessage('<?php echo $translations['A01742'][$language] /* Purchase Order Has Been Updated */ ?>', 'success', '<?php echo $translations['A00684'][$language] /* Update Successful */ ?>', 'check', 'order.php');
    }

    function assignSerialNumber() {
        var product_name_set  = $('option:selected', "#productSelect1").text();

        for(var v = 2; v < $(".productSelect").length + 1; v++) {
            var name = ", " + $('option:selected', "#productSelect"+v).text();

            product_name_set += name;
        }
        
        var formData = {
            command       : 'assignSerial',
            id            : editId
            // product_name  : product_name_set
        };

        fCallback = generateSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function generateSerial(data, message) {
        var showIncrement = data.showIncrement;
        serial_number = data.serial_number;

        showIncrement = showIncrement.join(';');

        $('#serialShowIncrement').val(showIncrement);

        var displaySerial = '';

        $.each(data.displaySerialNumber, function(m, n) {
            displaySerial += `${n}\n`;  
        })

        $('#serial').val(displaySerial);
        $('#serial').prop("readonly", "true");

        if(status != "Pending For Stock In") {
            confirmSerialAfterAssign();
        } else {
            loadStockInTable();
        }
        // serialInputNum = serial_number;
        // $("#confirmSerial").attr("disabled", false);
    }

    function clearSerial(){
        $('#serial').val('');
        $("#confirmSerial").attr("disabled", true);
    }

    function confirmSerialAfterAssign() {
        var id                  = editId;
        var product_name        = $('input#product_name').val();
        var serial              = $('textarea#serialShowIncrement').val();
        var serialList          = serial.split(';');

        var formData = {
            command           : 'confirmSerial',
            id                : id,
            // product_name      : product_name,
            serial            : serialList,
        } 

        fCallback = successConfirmSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function successConfirmSerial(data, message) {
        status = 'Pending For Stock In';
        $('#status').val(status);
        $("#confirmSerial").attr("disabled", true);
        $("#assign").attr("disabled", true);
        $("#clearInput").attr("disabled", true);

        loadStockInTable();
        //showMessage('Confirmed PO Serial Number', 'success', 'Success', 'check', '');
    }

    function loadStockInTable() {
        $('#stockInTable').show();
        $('#stockIn').css("display", "block");

        var data = $('#serialShowIncrement').val();
        data = data.split(';');

        var newData = [];

        $.each(data, function(k, v) {
            var splitData = v.split(',');

            var list = {
                serial      : splitData[0],
                productId   : splitData[1].split(':')[1],          
            };

            newData.push(list);
        });

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

        $.each(newData, function(k, v) {
            var formData = {
                command           : 'getProductDetails',
                productInvId      : v['productId'],
            }

            fCallback = loadStockInTableBody;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    }

    function loadStockInTableBody(data, message) {
        var k = tableIndex;
        var productInventory = data.productInventory;

        var html3 = `
            <tr>
                <td>${k+1}</td>
                <td>${productInventory[0].name}</td>
                <td>
                    <input class="form-control stockInInput" type="text" id="stockInSerialNo${k+1}" onfocus="serialChecking(this)" oninput="inputSerialChecking(this)"> 
                    <input class="form-control stockInInputProductId" style="display: none;" type="text" id="stockInProductId${k+1}" value="${productInventory[0].id}">
                    <input class="form-control hide" type="text" id="skuCode${k+1}" value="${productInventory[0].skuCode.replace('N', '')}">
                </td>
            </tr>
        `;

        $('#stockInTableBody').append(html3);
        if(status == "Pending For Stock In") $('#inputSerial').removeAttr('disabled').focus();

        tableIndex++;
    }

    $('#saveStockIn').click(function() {
        var serial = [];
        var serialProductId = [];

        for(i = 0; i < $(".stockInInput").length; i++) {
            var newI = i + 1;
            var perSerial = {
                serial_number: $("#stockInSerialNo" + newI).val(),
            }
            serial.push(perSerial);
        }

        for(i = 0; i < $(".stockInInputProductId").length; i++) {
            var newI = i + 1;
            var perSerialProductId = {
                serial_number: $("#stockInSerialNo" + newI).val(),
                product_id: $("#stockInProductId" + newI).val(),
            }
            serialProductId.push(perSerialProductId);
        }

        var formData = {
            command         : 'ActiveSerialCheck',
            po_id           : editId,
            serial          : serial,
            serialProductId : serialProductId,
        }

        fCallback = checkSerialNotInList;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function checkSerialNotInList(data, message) {
        var serialNotInList = data.serialNotInList;

        if(serialNotInList) {
            // Clear serial not in list & show error message
        } else {
            successSaveSerial();
        }
    }

    function successSaveSerial() {
        showMessage('Stock in saved.', 'success', 'Stock In', 'check', 'order.php');
    }

    function printStickers() {
        $('#printarea').empty();

        if(serial_number && productList) {
            $.each(serial_number, function(k, v) {
                var html = `
                    <div class="printSticker" id="printSticker${k+1}">
                        <div class="productNameEN bigText"></div>
                        <div><b>Best Before : <span class="bestBefore"></span></b></div>
                        <div class="qrCode"></div>
                        <div class="qrLink smallText"></div>
                    </div>
                `;

                $('#printarea').append(html);

                var serialLink = defaultSNUrl + v;
                var QRCODE_CONTENT = serialLink;

                $(`#printSticker${k+1} .qrLink`).html(serialLink);

                $(`#printSticker${k+1} .qrCode`).qrcode({
                    render: "canvas",
                    text: QRCODE_CONTENT,
                    width: 100,
                    height: 100,
                    background: "#ffffff",
                    foreground: "#000000",
                });
            })

            var count = 0;

            $.each(productList, function(k, v) {
                for(var i = 0; i < v['quantity']; i++) {
                    $(`#printSticker${count+1} .productNameZH`).html(v['name']);
                    $(`#printSticker${count+1} .productNameEN`).html(v['name']);
                    $(`#printSticker${count+1} .bestBefore`).html(v['best_before_days']);
                    count++;
                }
            });

            window.print();
        } else {
            showMessage('Serial number or product not found.', 'warning', 'Print Serial Number', '', '');
        }
    }

    function removeUrl(e, evt) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');

        var index = serialNo.lastIndexOf('GT');
        serialNo = serialNo.substring(index);
        $(e).val(serialNo);

        $('#stockInTableBody tr').each(function() {
            var skuCode = $(this).find('[id^=skuCode]').val() + '-';
            if(serialNo.includes(skuCode)) {
                var stockInSerialNo = $(this).find('[id^=stockInSerialNo]');
                if(stockInSerialNo.val() == serialNo) {
                    $('#canvasMessage').addClass('serialExist');
                    showMessage(`Serial number ${serialNo} already exist.`, 'warning', 'Warning', 'warning', '');
                    $('#inputSerial').focus();
                    return false;
                } else if(stockInSerialNo.val() == '' || stockInSerialNo.val() == skuCode) {

                    if(!usedSerialNo.includes(serialNo)) {
                        usedSerialNo.push(serialNo)
                        stockInSerialNo.val(serialNo);
                        return false;
                    }
                }
            }   
        });
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

    function serialChecking(e) {
        console.log(e)
        
        var skuCode = $(e).parent().find('[id^=skuCode]').val() + '-';
        if($(e).val() == '') $(e).val(skuCode);

        console.log($(e).val(skuCode),"second")

    }

    function inputSerialChecking(e) {
        var aNthChild = $(e).attr('id').replace('stockInSerialNo', '');
        var skuCode = $(e).parent().find('[id^=skuCode]').val() + '-';

        var aSerialLength = $(e).val().length;
        var bSerialLength = skuCode.length;

        if(aSerialLength < bSerialLength) {
            $(e).val(skuCode);
        }

        $('#stockInTableBody tr').each(function() {
            var stockInSerialNo = $(this).find('[id^=stockInSerialNo]');
            var bNthChild = stockInSerialNo.attr('id').replace('stockInSerialNo', '');
            
            if(bNthChild != aNthChild) {
                if(stockInSerialNo.val() == $(e).val() && stockInSerialNo.val() != skuCode) {
                    $('#canvasMessage').addClass('inputSerialExist');
                    showMessage(`Serial number ${$(e).val()} already exist.`, 'warning', 'Warning', 'warning', '');
                    $(e).val(skuCode);
                    warningInput = e;
                }
            }
        });
    }

    function closeDivImg(n) {
        addImgCount = addImgCount - 1;

        var img = $(n).parent().find('[id^="storeFileID"]').val();

        if(typeof(img) != 'undefined') {
            imageId.push(img);
        }
        $(n).parent().parent().remove();

        $("#imgTypeError").html("");
        $("#imgError").html("");
    }

    function deleteImg(id) {
        $("#fileUpload"+id).val("");
        $("#fileName"+id).text("No File Uploaded");
        $("#storeFileData"+id).val("");
        $("#storeFileName"+id).val("");
        $("#storeFileType"+id).val("");
        $("#storeFileUploadType"+id).val("");

        $("#viewImg"+id).hide();
        $("#deleteImg"+id).hide();
        $("#fileNotUploaded"+id).show()
        $("#thumbnailImg"+id).attr('src', "");
    }

    function showImg(n, imgUrl) {
        $("#modalImg").attr('style','display: block');
        
        if(imgUrl != 'undefined')
            $("#modalImg").attr('src', imgUrl);
        else
            $("#modalImg").attr('src', $("#storeFileData" + n).val());

        $("#modalVideo").attr('style','display:none');
        $("#showImage").modal();
    }

    function addImage(url) {
        addImgCount = addImgCount + 1; 
        addImgIDNum = addImgIDNum + 1;

        var buildImg = "";

        buildImg += `
            <div class="col-sm-4 col-xs-12">
                <div class="popupMemoImageWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                    <input type="hidden" id="storeFileData${addImgIDNum}">
                    <input type="hidden" id="storeFileName${addImgIDNum}">
                    <input type="hidden" id="storeFileType${addImgIDNum}">
                    <input type="hidden" id="storeFileFlag${addImgIDNum}">
                    <input type="hidden" id="storeFileSize${addImgIDNum}">
                    <input type="hidden" id="storeFileIsExist${addImgIDNum}">
                    <input type="hidden" id="storeFile64Bit${addImgIDNum}">
                    <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                    <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                    <div>
                        <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                        <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                        <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
                        <img id="thumbnailImg${addImgIDNum}" src="${url}" style="width:100%;" />
                        <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}', '${url}')">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;

        $("#buildImg").append(buildImg);

        if(url) $(`#fileNotUploaded${addImgIDNum}`).hide();
        else $(`#thumbnailImg${addImgIDNum}`).hide();

        if(status != "Draft") {
            $('#buildImg .btnUpload').hide();
            $('#buildImg .closeBtn').hide();
        }

        /*if (addImgCount == 1) {
            $(".addImgBtn").hide();
        }*/
        
    }

    function displayFileName(id, n) {
        var dFileName = $("#fileName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // $('#blah').attr('src', e.target.result);
                // $("#imgData"+input.id).empty().val(reader["result"]);
                dFileName.text(n.files[0]["name"]);
                // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                // $("#imgFlag"+input.id).empty().val("1");

                $("#storeFileData"+id).val(reader["result"]);
                $("#storeFileName"+id).val(n.files[0]["name"]);
                $("#storeFileSize"+id).val(n.files[0]["size"]);
                $("#storeFileType"+id).val(n.files[0]["type"]);
                $("#storeFileFlag"+id).val('1');

                if((n.files[0]["type"]).split('/')[0] === 'image'){
                    $("#storeFileUploadType"+id).val('image');
                    uploadFileType = 'image';
                }else{
                    $("#storeFileUploadType"+id).val('video');
                    uploadFileType = 'video';
                }

                // $("#viewImg"+id).attr('data-res', reader["result"]);
                $("#viewImg"+id).css('display', 'inline-block');
                $("#deleteImg"+id).css('display', 'inline-block');
                $("#fileNotUploaded"+id).hide()
                $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val()).show();
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

    $('#cancelled').click(function() {
        var formData   = {
            command     : "cancelledPurchaseOrder",
            id          : editId,
        };
        
        fCallback = loadCancelled;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadCancelled(result, message) {
        showMessage('Purchase Order has been cancelled.', 'success', 'Purchase Order has been cancelled.', 'check', 'order.php'); 
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
