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
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">
                                    Edit Sales Order
                                </h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="editUser" role="form" data-parsley-validate novalidate>
                                            <div class="form-group" hidden>
                                                <label>
                                                    <?php echo $translations['A00128'][$language]; /* ID */ ?>
                                                </label>
                                                <input id="id" type="text" class="form-control" readonly/>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="product">Product</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="productList">
                                                <div>
                                                    <div class="row mx-0 productGroup">
                                                        <div class="col-md-1">
                                                            <label for="">1.</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="productName">Product Name</label>
                                                                <select class="form-control" id="productName">
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="variant1">Variant 1</label>
                                                                <select class="form-control" id="variant1">
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="variant2">Variant 2</label>
                                                                <select class="form-control" id="variant2">
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="quantity">Quantity</label>
                                                                <input class="form-control" type="text" id="quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input class="form-control" type="text" id="price">
                                                            </div>
                                                        </div>

                                                        <!-- Default -->
                                                        <div class="defaultProduct">
                                                            <div><label class="m-b-0">Default</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Add Product -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="addProduct" onclick="addProduct()">
                                                        <div><b><i class="fa fa-plus-circle addProductIcon"></i></b></div>
                                                        <div><label>Add Product</label></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row m-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="totalQuantity">
                                                            <?php echo $translations['A01657'][$language]; /* Total Quantity */ ?>
                                                        </label>
                                                        <input id="totalQuantity" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="subtotal">
                                                            Subtotal
                                                        </label>
                                                        <input id="subtotal" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="taxes">
                                                            Taxes
                                                        </label>
                                                        <input id="taxes" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="deliveryFee">
                                                            Delivery Fee
                                                        </label>
                                                        <input id="deliveryFee" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="total">
                                                            Total
                                                        </label>
                                                        <input id="total" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row m-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="deliveryMethod" class="control-label">
                                                            Delivery Method
                                                        </label>
                                                        <input id="deliveryMethod" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="paymentMethod" class="control-label">
                                                            Payment Method
                                                        </label>
                                                        <input id="paymentMethod" type="text" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="status" class="control-label">
                                                            Status
                                                        </label>
                                                        <select class="form-control" id="status">
                                                            <option value=""></option>
                                                            <option value="Paid">Paid</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Waiting for Payment">Waiting for Payment</option>
                                                            <option value="Payment Verified">Payment Verified</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            </br></br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 m-b-20">
                            <button id="updateBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                Update Sale Order
                            </button>
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

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

// Initialize the arguments for ajaxSend function
var url                     = 'scripts/reqDefault.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;
var fCallback               = '';

var saleId                  = '<?php echo $_POST['id']; ?>';
var salesOrderLoaded        = false;
var productListLoaded       = false;
var variantLoading          = false;

var variantIndex;

$(document).ready(function() {
    getSaleDetail();

    getProduct();

    beforeGetProductDetails();

    $('#updateBtn').click(editOrderDetails);
});

function getSaleDetail() {
    var formData = {
        command     : 'getSaleDetail',
        SaleID      : saleId
    };
    fCallback = loadSaleDetail;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSaleDetail(data, message) {
    var packageList = [];
    var totalQuantity = 0;

    if(data) packageList = data.packageList;
    else packageList = packages;

    if(packageList) {
        var html = '';

        $.each(packageList, function (k, v) {
            html += `
                <div class="products" id="product${k+1}">
                    <div class="row mx-0 productGroup">
                        <div class="col-md-1">
                            <label class="number">${k+1}.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <select class="form-control productName" id="productName${k+1}" oninput="getProductDetails(this)">
                                    <option value="">${v['packageDisplay']}</option>
                                </select>
                            </div>
                        </div>
            `;

            var attrName = v['product_attribute_name'];
            var variants;

            if(attrName != '') {
                variants = v['product_attribute_name'].split(', ');
                
                html += `
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="variant1Name">Variant 1</label>
                                <select class="form-control variant1">
                                    <option value="">${variants[0]}</option>
                                </select>
                            </div>
                        </div>
                `;

                html += `
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="variant2Name">Variant 2</label>
                                <select class="form-control variant2">
                                    <option value="">${variants[1]}</option>
                                </select>
                            </div>
                        </div>
                `;
            } else {
                html += `
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="variant1Name">Variant 1</label>
                                <select class="form-control variant1">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                `;

                html += `
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="variant2Name">Variant 2</label>
                                <select class="form-control variant2">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                `;
            }   
                
            html += `
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control quantity" type="number" value=${numberThousand(v['packageQuantity'], 0)} id="quantity${k+1}" oninput="calculatePrice(this)">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input class="form-control unitPrice" type="text" value="${numberThousand(v['packagePrice'], 2)}" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control price" type="text" value="${numberThousand(v['totalPackagePrice'], 2)}" disabled>
                            </div>
                        </div>
            `;

            if(k == 0) {
                html += `
                        <!-- Default -->
                        <div class="defaultProduct">
                            <div><label class="m-b-0">Default</label></div>
                        </div>
                `;
            } else {
                html += `
                        <!-- Remove Product -->
                        <div class="removeProduct" id="removeProduct${k+1}" onclick="removeProduct(this)">
                            <b><i class="fa fa-times removeProductIcon"></i></b>
                        </div>
                `;
            }

            html += `
                    </div>
                </div>
            `;
            totalQuantity += parseInt(v['packageQuantity']);
        });

        $('#productList').html(html);
        $('#totalQuantity').val(totalQuantity);
    }

    var subtotal = data.subtotal;

    if(subtotal) {
        $('#subtotal').val(subtotal);
    }

    var invoiceDetail = data.invoiceDetail;

    if(invoiceDetail) {
        $('#status').val(invoiceDetail.status);

        $('#subtotal').val(numberThousand(invoiceDetail.subtotal, 2));
        $('#taxes').val(numberThousand(invoiceDetail.paymentTax, 2));
        $('#deliveryFee').val(numberThousand(invoiceDetail.shippingfee, 2));
        $('#total').val(numberThousand(invoiceDetail.paymentAmount, 2));
        $('#deliveryMethod').val(invoiceDetail.deliveryMethod);
        $('#paymentMethod').val(invoiceDetail.paymentMethod);
    }

    salesOrderLoaded = true;
}

function getProduct() {
    if(!salesOrderLoaded) {
        setTimeout(getProduct, 1000);
    } else {
        var formData = {
            command     : 'getProduct',
        };
        fCallback = loadProduct;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function loadProduct(data, message) {
    var getProductDetail = data.getProductDetail;

    if(getProductDetail) {
        var products = $('#productList').find('.products');
        
        $.each(products, function (k, v) {
            var currentProduct = $(`#product${k+1} .productName option:selected`).html();
            var html = '';

            $.each(getProductDetail, function(k1, v1) {
                if(v1['name'] == currentProduct) {
                    html += `
                        <option value="${v1['id']}" selected>${v1['name']}</option>
                    `;
                } else {
                    html += `
                        <option value="${v1['id']}">${v1['name']}</option>
                    `;
                }
            });

            var productsName = $(`#product${k+1} .productName`);
            productsName.html(html);
        });  
    }

    productListLoaded = true;
}

function beforeGetProductDetails(e) {
    if(!productListLoaded) {
        setTimeout(beforeGetProductDetails, 1000);
    } else {
        var products = $('#productList').find('.products');
    
        $.each(products, function () {
            var productName;
            if(e) productName = e;
            else productName = $(this).find('.productName');
            getProductDetails(productName);
        });
    }
}

function getProductDetails(e) {
    var index = $(e).attr('id').replace('productName', '');

    if(variantLoading) {
        setTimeout(function() {
            getProductDetails(e);
        }, 1000);
    } else {
        variantIndex = index;
        variantLoading = true;

        var formData = {
            command         : 'getProductDetails',
            productInvId    : $(`#product${variantIndex} .productName option:selected`).val()
        };
        fCallback = loadProductDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
}

function loadProductDetails(data, message) {
    var variants = data.attribute;

    if(variants) {
        $.each(variants, function(k, v) {
            var currentVariant = $(`#product${variantIndex} .variant${k+1} option:selected`).html();
            var html = '';

            $.each(v[v['attribute_name']], function(k1, v1) {
                if(v1['name'] == currentVariant) {
                    html += `
                        <option value="${v1['id']}" selected>${v1['name']}</option>
                    `;
                } else {
                    html += `
                        <option value="${v1['id']}">${v1['name']}</option>
                    `;
                }
            });

            $(`#product${variantIndex} .variant${k+1}`).html(html);
            $(`#product${variantIndex} .variant${k+1}Name`).html(v['attribute_name']);
        });
    } else {
        var html = '';
        html += `<option value=""></option>`;
        $(`#product${variantIndex} .variant1`).html(html);
        $(`#product${variantIndex} .variant2`).html(html);

        $(`#product${variantIndex} .variant1Name`).html('Variant 1');
        $(`#product${variantIndex} .variant2Name`).html('Variant 2');
    }

    var productInventory = data.productInventory;

    if(productInventory) {
        var unitPrice = productInventory[0].cost;
        $(`#product${variantIndex} .unitPrice`).val(numberThousand(unitPrice, 2));
    }

    var quantityField = $(`#product${variantIndex} .quantity`);
    var quantity = quantityField.val();
    if(quantity == '') quantityField.val(1);
    calculatePrice(quantityField);

    variantLoading = false;
}

function addProduct() {
    var k = parseInt($('#productList').find('.products:last-child').attr('id').replace('product', ''));
    var html = '';

    html += `
        <div class="products" id="product${k+1}">
            <div class="row mx-0 productGroup">
                <div class="col-md-1">
                    <label class="number">${k+1}.</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control productName" id="productName${k+1}" oninput="getProductDetails(this)">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="variant1Name">Variant 1</label>
                        <select class="form-control variant1">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="variant2Name">Variant 2</label>
                        <select class="form-control variant2">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control quantity" type="number" value="" id="quantity${k+1}" oninput="calculatePrice(this)">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Unit Price</label>
                        <input class="form-control unitPrice" type="text" value="" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control price" type="text" value="" disabled>
                    </div>
                </div>
                <!-- Remove Product -->
                <div class="removeProduct" id="removeProduct${k+1}" onclick="removeProduct(this)">
                    <b><i class="fa fa-times removeProductIcon"></i></b>
                </div>
            </div>
        </div>
    `;

    $('#productList').append(html);

    getProduct();

    var productName = $(`#product${k+1}`).find('.productName');
    beforeGetProductDetails(productName);
}

function calculatePrice(e) {
    var index = $(e).attr('id').replace('quantity', '');

    // Price for this product
    var quantity = $(`#product${index} .quantity`).val();
    var unitPrice = $(`#product${index} .unitPrice`).val();
    var price = parseInt(quantity) * parseFloat(unitPrice);
    $(`#product${index} .price`).val(numberThousand(price.toFixed(2), 2));

    // Total quantity & Subtotal
    var lastIndex = parseInt($('#productList').find('.products:last-child').attr('id').replace('product', ''));
    var totalQuantity = 0;
    var subtotal = 0;

    for(var i = 1; i <= lastIndex; i++) {
        var quantity = 0;
        var price = 0;

        var quantityField = $(`#product${i} .quantity`).val();
        if(quantityField != '') quantity = quantityField;
        
        var priceField = $(`#product${i} .price`).val();
        if(priceField != '') price = priceField;

        totalQuantity += parseInt(quantity);
        subtotal += parseFloat(price);
    }

    $('#totalQuantity').val(numberThousand(totalQuantity, 0));
    $('#subtotal').val(numberThousand(subtotal.toFixed(2), 2));

    var taxes = $('#taxes').val();
    var deliveryFee = $('#deliveryFee').val();
    var total = 0;
    total += parseFloat(subtotal) + parseFloat(taxes) + parseFloat(deliveryFee);
    $('#total').val(numberThousand(total, 2));
}

function removeProduct(e) {
    var index = $(e).attr('id').replace('removeProduct', '');

    $(`#product${index}`).remove();

    var products = $('#productList').find('.products');
    var lastIndex = parseInt($('#productList').find('.products:last-child').attr('id').replace('product', ''));
    
    var k = 1;
    $.each(products, function() {
        $(this).attr('id', `product${k}`);
        $(this).find('.number').html(`${k}.`);
        $(this).find('.productName').attr('id', `productName${k}`);
        $(this).find('.quantity').attr('id', `quantity${k}`);
        $(this).find('.removeProduct').attr('id', `removeProduct${k}`);
        k++;
    });

    var quantityField = $(`#product1 .quantity`);
    calculatePrice(quantityField);
}

function editOrderDetails() {
    var products = $('#productList').find('.products');
    var orderDetailArray = [];

    $.each(products, function() {
        var product_id = $(this).find('.productName').val();
        var quantity = $(this).find('.quantity').val();

        var variants = [];
        var variant1 = $(this).find('.variant1').val();
        var variant2 = $(this).find('.variant2').val();
        if(variant1 != '') variants.push(variant1);
        if(variant2 != '')variants.push(variant2);
        var product_template_id = variants.toString();

        var list = {
            product_id          : product_id,
            quantity            : quantity,
            product_template_id : product_template_id
        }

        orderDetailArray.push(list);
    });

    var formData = {
        command             : 'editOrderDetails',
        saleID              : saleId,
        orderDetailArray    : orderDetailArray,
        shipping_fee        : $('#deliveryFee').val(),
        payment_amount      : $('#total').val(),
        status              : $('#status').val(),
        payment_tax         : $('#taxes').val(),
        payment_method      : $('#paymentMethod').val(),
        delivery_method     : $('#deliveryMethod').val()
    };
    fCallback = successEditOrderDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successEditOrderDetails(data, message) {
    showMessage('Update Successful.', 'success', 'Edit Sales Order', '', 'purchaseOrder.php');
}

</script>
</body>
</html>
