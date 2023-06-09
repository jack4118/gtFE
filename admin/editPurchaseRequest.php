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
                         <a href="purchaseRequest.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">
                                Purchase Request
                            </h4>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-15">
                                        <label>
                                            Buying Date
                                        </label>
                                        <input id="buyingDate" class="form-control" dataName="buyingDate" dataType="singleDate" required>
                                    </div>

                                    <div class="col-md-6 mb-15">
                                        <label>
                                            Vendor
                                        </label>
                                        <select id="vendorDropdown" class="form-control" disabled>
                                            <option value="">Select a vendor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-15">
                                        <label>
                                            Warehouse
                                        </label>
                                        <select id="warehouseDropdown" class="form-control" disabled>
                                            <option value="">Select a warehouse</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-15" id="appendBranch">
                                        <label>
                                            Branch Address
                                        </label>
                                        <!-- <select id="branchAddressDropdown" class="form-control" disabled>
                                            <option value="">Select the address</option>
                                        </select> -->
                                        <input id="branchAddressText" class="form-control" readonly>
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
                                                                <input id="action1" type="text" class="form-control hide"/ value="">
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
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Status</label>
                                        <input id="status" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Remarks</label>
                                        <textarea id="remarks" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Created By</label>
                                        <input id="createdBy" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Approved By</label>
                                        <input id="approvedBy" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                            Update Purchase Request
                        </button>
                        
                        <button id="approve" type="submit" class="btn btn-primary waves-effect waves-light">
                            Approve Purchase Request
                        </button>

                        <button id="cancelled" type="submit" class="btn btn-primary waves-effect waves-light">
                            Cancelled Purchase Request
                        </button>
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
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback       = "";
    var editId          = "<?php echo $_POST['id']; ?>";
    var vendor          = "<?php echo $_POST['vendor']; ?>";
    var html = `<option value="">Select Product</option>`;
    var product_list      = null;
    var wrapperLength = 2;
    var subtotal = 0;
    var action = "";
    var totalLoop =[1];
    var vendor_id_ini = "";

    $(document).ready(function() { 
        if (editId) {
            var formData = {
                'command': 'getPurchaseRequestDetails',
                'id'     : editId
            };
            fCallback = loadEdit; 
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else{
            window.location = 'purchaseRequest.php';
        }

        setTodayDatePicker();

        function loadEdit(data, message) {
            $("#buyingDate").val(data.buying_date.split(' ')[0]);
            $("#subtotal").val(data.total_cost);
            $("#remarks").val(data.remarks);
            $("#status").val(data.status);
            $("#createdBy").val(data.Created_by);
            $("#approvedBy").val(data.approved_by);
            $("#branchAddressText").val(data.vendor_address);

            productList = data.productList;

            $.each(productList, function (k, v) { 
                var newK = k + 1;
                if(k != 0) 
                    addRow(productList);

                loopQuantity(k);

                $("#quantity" + newK).val(v['quantity']);
                $("#id" + newK).val(v['purchase_product_id']);

                $("#cost" + newK).val(v['cost'].toFixed(2));
                var editTotal = v['cost'] * v['quantity'];
                $("#total" + newK).val(editTotal.toFixed(2)); 

                // $("#productSelect" + newK).val(v['product_id']);

                if(data.approved_by != null) {
                    $("#remarks").attr("disabled", true);
                    $("input").attr("disabled", true);
                    $("select").attr("disabled", true);
                    $(".addProduct").css("display", "none");
                    $("#approve").css("display", "none");
                    $("#edit").css("display", "none");
                    $(".closeBtn").css("display", "none");
                }         
            });

            loopQuantity(data.productList.length);

            vendor_id_ini = data.vendor_id;

            var formData = {
                command        : "getVendor",
            };
            fCallback = loadFormDropdownVendor;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            var formData = {
                command        : "getWarehouse",
            };
            fCallback = loadFormDropdownWarehouse
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

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
                }
                if($('#action'+v).val() == "add" && $('#id'+v).val() == "") {
                    action = "add";
                }

                var perProduct = {
                    id : id,
                    product_id : product_id,
                    name:name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                }
                productSet.push(perProduct);
            }
            // }) 

            var formData = {
                command  : "purchaseRequestEdit",
                buying_date : $("#buyingDate").val(),
                vendor_id : $("#vendorDropdown").val(),
                purchase_product_list : productSet,
                remarks : $("#remarks").val(),
                warehouse_id : $("#warehouseDropdown").val(),
                vendor_address_id : $("#branchAddressDropdown").val(),
                id : editId,
            };

            var fCallback = sendEdit;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#approve').click(function() {
            var formData   = {
                command     : "purchaseRequestApprove",
                id          : editId,
                status      : 'Approved'
            };
            
            fCallback = loadUpdateStatus;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#cancelled').click(function() {
            var formData   = {
                command     : "cancelledPurchaseRequest",
                id          : editId,
            };
            
            fCallback = loadCancelled;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
        // var formData = {
        //     command        : "getProduct",
        // };
        // fCallback = productListOpt
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var selectedOption = $('#vendorDropdown option:selected');
        var formData = {
            command        : "getProductList",
            vendor_name    : vendor,
        };
        fCallback = productListOpt;
        // console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#vendorDropdown').change(function() {
            productDetails();
            
            $('#subtotal').val("0.00");
            wrapperLength = 2;
        })
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
        var selectedOption = $('#vendorDropdown option:selected');
        var vendorName = $.trim(selectedOption.text());
        var formData = {
            command        : "getProductList",
            vendor_name    : vendorName,
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
        vendorAddressData = data.getVendorAddressDetail;

        $.each(vendorData, function(key, val) {
            var vName = val['name'];
            $('#vendorDropdown').append($('<option>', {
                value: val['id'],
                text: vName
            }));
        });
        $("#vendorDropdown").val(vendor_id_ini);

        $.each(vendorAddressData, function(key, val) {
            var branchName = val['branch_name'];
            $('#branchNameDropdown').append($('<option>', {
                value: val['id'],
                text: branchName
            }));
            var branchAddress = val['address'];
            $('#branchAddressDropdown').append($('<option>', {
                value: val['id'],
                text: branchAddress
            }));
        });
        $("#branchNameDropdown").val(vendor_id_ini);
        $("#branchAddressDropdown").val(vendor_id_ini);
    }

    function loadFormDropdownWarehouse(data, message) {
        warehouseData = data;
        $.each(warehouseData, function(key, val) {
            var vName = val['warehouse_location'];
            $('#warehouseDropdown').append($('<option>', {
                value: val['id'],
                text: vName
            }));
        });
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
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendProduct").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);

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

    function loadSelect() {
        var formData = {
            'command': 'getPurchaseRequestDetails',
            'id'     : editId
        };
        fCallback = selectPR;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function selectPR(data, message) {

        $.each(data.productList, function (index, value) {
            var productSelectID = "#productSelect" + (index + 1);
            $(productSelectID).val(value.product_id);
        });

        setTimeout(function() {
            $("#warehouseDropdown").val(data.warehouse_id);
        }, 100); 
    }



    function sendEdit(data, message) {
        showMessage('Purchase Request Has Been Updated', 'success', 'Purchase Request Updated', 'check', 'purchaseRequest.php');
    }

    function loadUpdateStatus(result, message) {
        showMessage('Approved Successfully', 'success', 'Approved Successfully', 'check', 'purchaseRequest.php'); 
    }

    function loadCancelled(result, message) {
        showMessage('Purchase Request has been cancelled.', 'success', 'Purchase Request has been cancelled.', 'check', 'purchaseRequest.php'); 
    }
</script>
</body>
</html>
