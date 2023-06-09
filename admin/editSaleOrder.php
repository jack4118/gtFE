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
                                    Sales Order
                                </h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" id="viewReceiptBtn">
                                            
                                        </div>
                                    </div>
                                    <div class="row" id="statusGroup">
                                        <!-- <div class="col-md-6">
                                            <label>
                                                Vendor
                                            </label>
                                            <select id="vendorDropdown" class="form-control" disabled>
                                                <option value="">Select a vendor</option>
                                            </select>
                                        </div> -->
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
                                                                    <input id="noteProductInput1" class="form-control" style="display: none;" readonly>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Quantity</label>
                                                                    <input id="quantity1" type="number" oninput="productListOpt()" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Cost</label>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Subtotal</label>
                                            <input id="subtotal" class="form-control" value="0.00" type="number" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Payment Tax</label>
                                            <input id="payment_tax" class="form-control" value="0.00" type="number" readonly>
                                        </div>
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
                                    <!-- <div class="row">
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <label>Remarks</label>
                                            <textarea id="remarks" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-md-12 m-t-20" id="actions">
                                            <button id="edit" class="btn btn-primary waves-effect waves-light m-r-10">
                                                Update SO
                                            </button>

                                            <!-- <button id="approve" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Approve PO
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="row">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box" id="stockOut" style="display: none;">
                                <p class="text-center foc-title">Stock Out</p>
                                <div id="stockOutTable">
                                    
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input id="skipWarning" type="checkbox" value="">
                                    <label for="checkbox2">
                                        Check to ignore extra stock warning
                                    </label>
                                </div>

                                <button id="saveStockOut" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Stock Out</button>
                            </div>
                        <div>
                    </div>

                    <div class="row" id="trackingNoDiv" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tracking Number</label>
                                        <input id="trackingNo" class="form-control trackingNo" type="text">

                                        <button id="saveTrackingNo" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="deliveredDiv" style="display: none;">
                        <div class="col-lg-12 m-b-30">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Set to Delivered</label>
                                        <button id="updateDelivered" class="btn btn-primary m-t-10" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;">Delivered</button>
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
    var grandtotal = "";
    var step = "";
    var defaultSNUrl = 'https://dev.gotasty.net/sn/';

    $(document).ready(function() {
        var formData = {
            'command': 'getSaleOrderDetails',
            'SaleID'     : editId
        };
        fCallback = loadEdit;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if(status == "Paid" || status == "Packed" || status == "Out of Delivery") {
            $("#stockOut").css("display", "block");
            $("#trackingNoDiv").css("display", "block");
            $("#deliveredDiv").css("display", "block");

            var newData = [];

            var stockOut_html = '';

            stockOut_html += `
                <table class="table table-striped table-bordered no-footer m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Serial No</th>
                        </tr>
                    </thead>
                    <tbody id="stockOutTableBody">
                    </tbody>
                </table>
            `;

            $('#stockOutTable').html(stockOut_html);

            tableIndex = 0;

            $('#stockOutTableBody').html('');

            var formData = {
                command           : 'getStockOutDetails',
                sale_id     : editId
            }

            fCallback = loadStockOutTableBody;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        if(status == "Paid") {
            $("#trackingNoDiv").css("display", "none");
            $("#deliveredDiv").css("display", "none");
        }

        if(status == "Packed") {
            $("#stockOut").css("display", "none");
            $("#deliveredDiv").css("display", "none");
        }

        if(status == "Out of Delivery") {
            $("#stockOut").css("display", "none");
            $("#trackingNoDiv").css("display", "none");
        }

        function loadStockOutTableBody(data, message) {
            var html_SO = "";
            var k2 = 1;
            
            $.each(data, function (k, v) {
                for(var w = 0; w < v['quantity']; w++) {
                    html_SO += `
                        <tr>
                            <td>${k2}</td>
                            <td id="item_name${k2}">${v['item_name']}</td>
                            <td><input class="form-control stockOutInput" type="text" id="stockOutSerialNo${k2}" oninput="removeUrl(this)"></td>
                        </tr>
                    `;

                    k2++;
                }
            })            

            $('#stockOutTableBody').append(html_SO);
        }


        $("#subtotal").change(function () {
            grantotal = $("#subtotal").val() + $("#payment_tax").val() + $("#shipping_fee").val();

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

        // $('#vendor_name').change(function() {
        //     var selectedOption = $('#vendor_name option:selected');
        //     var optionText = $.trim(selectedOption.text());
        //     productDetails();
        //     countSubtotal();
        // });

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

            // $.each(totalLoop, function (k, v) {
            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                var name = $('option:selected', "#productSelect"+v).text();
                var cost = $('#cost' + v).val();
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
                    // id : id,
                    product_id : product_id,
                    name : name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                }

                if($('#action'+v).val() != "delete")
                    productSet.push(perProduct);
            }
            // }) 

            var formData = {
                command  : "editOrderDetails",
                orderDetailArray : productSet,
                saleID: editId,
                shipping_fee: $("#shipping_fee").val(),
                payment_amount: $("#grandtotal").val(),
                payment_tax: $("#payment_tax").val(),
                payment_method: "<?php echo $_POST['payment_method']; ?>",
                delivery_method: "<?php echo $_POST['delivery_method']; ?>",
                status: status,

            };

            var fCallback = sendEdit;

            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
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
                        <div class="col-md-4">
                            <label>${(wrapperLength)}. <font id="noteProductLabel${(wrapperLength)}">Product</font></label>
                            <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>                                                                 
                            </select>
                            <input id="noteProductInput${(wrapperLength)}" class="form-control" style="display: none;" readonly>
                            <input id="productType${(wrapperLength)}" class="form-control hide">
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
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendProduct").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);

        totalLoop.push(wrapperLength);
        wrapperLength++;
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
    
    function productListOpt(data, message) {
        var product = data.getProductDetail;
        if(product) {
            $.each(product, function(i, obj) {
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

    function loadSelect() {
        var formData = {
            'command': 'getSaleOrderDetails',
            'SaleID'     : editId
        };
        fCallback = selectPR;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function selectPR(data, message) {
        $.each(data.orderDetails, function (m, v) {
            var newM = m + 1;

            $("#productSelect" + newM).val(v['product_id']);
        });
    }

    function sendEdit(data, message) {        
        showMessage('Purchase Request Has Been Updated', 'success', 'Purchase Request Updated', 'check', 'purchaseOrder.php');
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

    function clearSerial(){
        $('#serial').val('');
        $("#confirmSerial").attr("disabled", true);
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

    $('#saveStockOut').click(function() {
        var stock_out_serial = [];

        for(i = 0; i < $(".stockOutInput").length; i++) {
            var newI = i + 1;
            var perSerial = {
                serial_number: $("#stockOutSerialNo" + newI).val(),
                item_name: $("#item_name" +newI).text()
            }
            stock_out_serial.push(perSerial);
        }

        var formData = {
            command     : 'updateStatusOnPacking',
            sale_id       : editId,
            serial      : stock_out_serial,
            step        : step
        } 

        fCallback = successSaveStockOut;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function successSaveStockOut() {
        showMessage('Stock out saved.', 'success', 'Stock Out', 'check', 'purchaseOrder.php');
    }

    $("#saveTrackingNo").click(function() {
        var formData = {
            command     : 'updateStatusOnTracking',
            sale_id       : editId,
            trackingNo    : $("#trackingNo").val(),
        }

        fCallback = successTracking;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    })

    function successTracking() {
        showMessage('Tracking number saved.', 'success', 'Tracking Number', 'check', '');
    }

    $("#updateDelivered").click(function() {
        var formData = {
            command     : 'updateStatusOnDelivered',
            saleID       : editId,
        }

        fCallback = successDelivered;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)    
    })

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

        productList = data.orderDetails;

        productDetails();
        
        $.each(productList, function (k, v) { 
            var newK = k + 1;
            if(k != 0) 
                addRow(productList);

            loopQuantity(k);

            $("#quantity" + newK).val(v['quantity']);
            $("#id" + newK).val(v['purchase_product_id']);
            $("#productType" + newK).val(v['type']);

            if(v['item_name']=="Redeemed Points"){
                $("#cost" + newK).val(v['cost']).css("color", "transparent");
                var editTotal = v['cost'] * v['quantity'];
                $("#noteProductLabel" + newK).html("Note");
                $("#productSelect" + newK).css("display", "none");
                $("#noteProductInput" + newK).css("display", "block");
                $("#noteProductInput" + newK).val(v['item_name']);
                $("#quantity" + newK).attr("disabled", true);
                $("#closeBtn" + newK).css("display","none");
            }else{
                $("#cost" + newK).val(v['cost'].toFixed(2));
                var editTotal = v['cost'] * v['quantity'];
            }

            if(v['item_name'] == "Delivery Charges") {
                $("#noteProductLabel" + newK).html("Note");
                $("#productSelect" + newK).css("display", "none");
                $("#noteProductInput" + newK).css("display", "block");
                $("#noteProductInput" + newK).val(v['item_name']);
                $("#quantity" + newK).attr("disabled", true);
            }
        });

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

        if(data.so_status == "Paid" || data.so_status == "Packed" || data.so_status == "Out of Delivery") {
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

</script>
</body>
</html>
