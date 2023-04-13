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
                                <div class="row mx-0">
                                    <div class="col-md-4">
                                        <label>
                                            Buying Date
                                        </label>
                                        <input id="buyingDate" class="form-control" dataName="buyingDate" dataType="singleDate" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>
                                            Vendor
                                        </label>
                                        <select id="vendor-dropdown" class="form-control" required>
                                            <option value="">Select a vendor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div id="appendImage">
                                                <div class="col-md-12">
                                                    <div class="popupMemoImageWrapper default">
                                                        <span class="dtxt">Default</span>
                                                        
                                                        <div class="row" id="pr1">
                                                            <div class="col-md-3">
                                                                <label>1. Product</label>
                                                                <select id="productSelect1" class="form-control productSelect" required></select>
                                                            </div>
                                                            <div class="col-md-3">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="addLanguageImage" onclick="addRow()">
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
                                        <label>Remarks</label>
                                        <textarea id="remarks" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
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
    var product_list      = null;
    var selectedLang    =  [];
    var html = `<option value="">Select Product</option>`;
        
    var fCallback;

    $(document).ready(function() { 
        setTodayDatePicker();

        $(".productSelect").change(function () {
        // var cost_id = this.value - 1;
            var select_id = this.id;
            var product_cost = $('option:selected', this).attr('datacost');
            var costID = "#cost" + select_id.substring(13);
            $(costID).val(product_cost);
            $(".quantityInput").keyup();
            $('.totalInput').trigger('change');

            countSubtotal();
        });

        vendorList();

        $('#vendor_name').change(function() {
            var selectedOption = $('#vendor_name option:selected');
            var optionText = $.trim(selectedOption.text());
            productDetails();
            countSubtotal();
        });

        $('#add').click(function() {
            var productSet= [];

            $.each(totalLoop, function (k, v) {
                var id = $("#productSelect" + v).val();
                var name = $('option:selected', "#productSelect"+v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();
                var perProduct = {
                    id :id,
                    name:name,
                    cost :cost,
                    quantity: quantity,
                }
                 productSet.push(perProduct);
            }) 

            var formData = {
                command  : "addPurchaseRequest",
                vendor_id : $("#vendor-dropdown").val(),
                buying_date : $("#buyingDate").val(),
                product_list : productSet,
                remarks : $("#remarks").val(),

            };
            var fCallback = sendNew;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        var formData = {
            command        : "getVendor",
        };
        fCallback = loadFormDropdownVendor
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var formData = {
            command        : "getProduct",
        };
        fCallback = productListOpt
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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

    // $("#productSelect2").change(function () {
    //     var select_id = this.id; 
    //     var product_cost = $('option:selected', this).attr('datacost');
    //     var costID = "#cost" + select_id.substring(13);
    //     $(costID).val(product_cost);

    //     $(".quantityInput").keyup();
    //     $('.totalInput').trigger('change');
    //     countSubtotal();
    // });
    
    function loadFormDropdown(data, message) {
        roleData = data.roleList;

        $.each(roleData, function(key) {
            $('#roleID').append('<option value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });
    }

    function vendorList(vendorName)
    {
        var formData = {
            command        : "getVendorList",
        };
        fCallback = displayVendorList;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function productDetails()
    {
        var selectedOption = $('#vendor_name option:selected');
        var vendorName = $.trim(selectedOption.text());
        var formData = {
            command        : "getProductList",
            vendor_name    : vendorName,
        };
        fCallback = displayProductList;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayVendorList(data, message) {
    if (data) 
    {
        var vendorName = '';
        vendorName += `<option value="" data-lang="M02737">Please select vendor</option>`;
        $.each(data, function(k, v) {
            vendorName += `
                <option value="${v['id']}">${v['name']}</option>
            `;
        });

        $('#vendor_name').html(vendorName);
        // $('#vendor-dropdown').html(vendorName);
    }
}

    function displayProductList(data, message) {
    if (data) 
    {
        var productName = '';
        $.each(data, function(k, v) {
            productName += `
                <option value="${v['id']}">${v['name']}</option>
            `;
        });

        $('#product_name').html(productName);
    }
}


    
    function sendNew(data, message) {
        showMessage('Purchase Request Has Been Created Successfully', 'success', 'Success Create Purchase Request', 'check', 'purchaseRequest.php');
    }

    function loadFormDropdownVendor(data, message) {
        vendorData = data.getVendorDetail;
        $.each(vendorData, function(key, val) {
            var vName = val['name'];
            $('#vendor-dropdown').append($('<option>', {
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
    var wrapperLength = $(".popupMemoImageWrapper").length + 1;
    var totalLoop =[1];

    function addRow(){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="popupMemoImageWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-3">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>
                                                                 
                            </select>
                        </div>
                        <div class="col-md-3">
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
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendImage").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);
        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function closeDiv(n,id) {
        const index = totalLoop.indexOf(id); 
        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        $(n).parent().parent().remove();

        countSubtotal();
    }

    function countSubtotal() {
        var subtotal = 0;
        $.each(totalLoop, function (k, v) {
            var total = $("#total" + v).val();
            subtotal = parseFloat(total) + parseFloat(subtotal);
        })

        $("#subtotal").val(subtotal.toFixed(2));
    }
    
    function productListOpt(data, message) {
        if(data.getProductDetail) {
            
            $.each(data.getProductDetail, function(i, obj) {
                html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
            });
            
            $("#productSelect1").html(html);
        }
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
</script>
</body>
</html>
