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
                        <a href="pricelisting.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        <?php echo $translations['A00115'][$language]; /* Back */ ?>
                    </a>
                </div><!-- end col -->
            </div>

            <div class="row" id="addPricelist">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Price List Name</label>
                                    <input id="pricelist_name" type="text" class="form-control">
                                </div>

                                <div class="col-md-3 form-group">
                                    <label>Start Date</label>
                                    <input id="start_date" type="text" class="form-control">
                                </div>

                                <div class="col-md-3 form-group">
                                    <label>End Date</label>
                                    <input id="end_date" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="promoProducts">
                                    <div class="promoProducts_item">
                                        <div class="defaultTag">Default</div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Product Name</label>
                                                <select id="product_id" class="form-control product_id1" onchange="loadSalePrice(this)"></select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Sale Price</label>
                                                <input id="sale_price" type="text" class="form-control" disabled>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Price Computation</label>
                                                <select id="discount_type" class="form-control" onchange="loadDiscountPrice(this)">
                                                    <option value=""></option>
                                                    <option value="percentage">Discount</option>
                                                    <option value="fixed">Fixed Price</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Value</label>
                                                <input id="discount_amount" type="text" class="form-control" oninput="loadDiscountPrice(this)">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Discount Price</label>
                                                <input id="discount_price" type="text" class="form-control" disabled>
                                            </div>
                                            <input id="condition" type="hidden" class="form-control" value="product">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <div class="addProduct m-r-15" onclick="addRow()">
                                        <b><i class="fa fa-plus-circle"></i></b>
                                        <span>Add Condition Product</span>
                                    </div>
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <div class="addProduct" onclick="showaddBatchModal()">
                                        <b><i class="fa fa-plus-circle"></i></b>
                                        <span>Add Batch Condition Product</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 m-b-20">
                    <button id="submitBtn" type="button" class="btn btn-primary waves-effect waves-light">
                        Submit
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

<div class="modal fade" id="showaddBatchModal" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    Create Price List Rules
                </h4>
            </div>
            <div class="modal-body">
                <div class="modal-body-title">Price Computation</div>
                <div class="batchPriceComputation">
                    <div class="sub-title">Computation</div>
                    <div class="radioGrp">
                        <div class="radio radio-inline">
                            <input id="fixedRadio" type="radio" value="fixed" name="batchComputation" checked/>
                            <label for="fixedRadio">
                                Fixed Price
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <input id="percentageRadio" type="radio" value="percentage" name="batchComputation"/>
                            <label for="percentageRadio">
                                Discount
                            </label>
                        </div>
                    </div>
                </div>
                <div class="batchValue">
                    <div class="sub-title">Value*</div>
                    <div class="form-group">
                        <input type="text" id="batchDiscountAmt" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="modal-body-title">Conditions</div>
                <div class="batchPriceComputation">
                    <div class="sub-title">Apply On</div>
                    <div class="radioGrp">
                        <div class="radio radio-inline">
                            <input id="productRadio" type="radio" value="product" name="batchCondition" checked/>
                            <label for="productRadio">
                                All Products
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <input id="productCategoryRadio" type="radio" value="productCategory" name="batchCondition"/>
                            <label for="productCategoryRadio">
                                Product Category
                            </label>
                        </div>
                    </div>
                </div>
                <div class="batchCategory" id="batchProductCategoryGrp">
                    <div class="sub-title">Product Category</div>
                    <div class="form-group">
                        <select id="batchCategoryId" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="btnGrp">
                    <button type="button" onclick="saveBatchFunction()" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Save & New</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Discard</button>
                </div>
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

var url                 = 'scripts/reqAdmin.php';
var method              = 'POST';
var debug               = 0;
var bypassBlocking      = 0;
var bypassLoading       = 0;

var condition           = null;
var categoryId          = null;
var allProducts         = [];
var allCategories       = [];
var productsByCategory  = [];
var action              = '';
var productDropdown     = '';
var categoryDropdown    = '';
var batchComputation    = null;
var batchDiscountAmt    = null;
var wrapperLength       = 2;


$(document).ready(function() { 
    setTodayDatePicker();

    condition = 'product';
    action = loadProductList;
    getProductAndCategory();

    condition = 'productCategory';
    action = loadCategoryList;
    getProductAndCategory();

    $('input[name=batchCondition]').change(function() {
        toggleProductCategory(this);
    });

    $('#submitBtn').click(addPriceList);
});

function getProductAndCategory() {
    var formData = {
        command         : 'getProductAndCategory',
        condition       : condition,
        category_id     : categoryId,
    };

    var fCallback = action;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadProductList(data, message) {
    if(data) {
        allProducts = [];
        var productList = data.productList;
        productDropdown = '<option></option>';

        if(productList && productList.length > 0) {
            $.each(productList, function(k, v) {
                productDropdown += `<option value="${v['id']}">${v['name']}</option>`;
                allProducts.push(v);
            });
            
            $('.promoProducts_item').each(function() {
                var productListInput = $(this).find('#product_id');
                if(productListInput.hasClass('loaded')) return;
                productListInput.empty().append(productDropdown);
                productListInput.addClass('loaded');
            });

            $('.product_id1').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
        }
    }
}

function loadCategoryList(data, message) {
    if(data) {
        allCategories = [];
        var categoryList = data.categoryList;
        categoryDropdown = '<option></option>';

        if(categoryList && categoryList.length > 0) {
            $.each(categoryList, function(k, v) {
                categoryDropdown += `<option value="${v['id']}">${v['name']}</option>`;
                allCategories.push(v);
            });

            $('#batchCategoryId').empty().append(categoryDropdown);
        }
    }
}

function loadSalePrice(e) {
    condition = $(e).parent().parent().find('#condition').val();
    var products;
    if(condition == 'product') products = allProducts;
    else if(condition == 'productCategory') products = productsByCategory;

    var product = products.filter((item) => item.id == $(e).val());
    var salePrice = product[0]['sale_price'];
    $(e).parent().parent().find('#sale_price').val(salePrice);
}

function loadDiscountPrice(e) {
    condition = $(e).parent().parent().find('#condition').val();
    var products;
    if(condition == 'product') products = allProducts;
    else if(condition == 'productCategory') products = productsByCategory;

    if($(e).attr('id') == 'discount_amount') {
        e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); 
        e.value = e.value.match(/^[0-9]+\.?[0-9]{0,2}/);
    }

    var discountType = $(e).parent().parent().find('#discount_type').val();
    var value = $(e).parent().parent().find('#discount_amount').val();

    if(discountType != '' && value != '') {
        var productId = $(e).parent().parent().find('#product_id').val();
        var product = products.filter((item) => item.id == productId);
        var salePrice = product[0]['sale_price'];
        var discountPrice = 0.00;

        if(discountType == 'percentage') discountPrice = salePrice *= (1 - value / 100);
        else if(discountType == 'fixed') discountPrice = salePrice -= value;

        $(e).parent().parent().find('#discount_price').val(Number(discountPrice).toFixed(2));
    }
}

function toggleProductCategory(e) {
    if($(e).val() == 'product') {
        $('#batchProductCategoryGrp').css('display', 'none');
    } else if($(e).val() == 'productCategory') {
        $('#batchProductCategoryGrp').css('display', 'flex');
    }
}

function saveBatchFunction() {
    batchComputation = $('input[name=batchComputation]:checked').val();
    batchDiscountAmt = $('#batchDiscountAmt').val();
    condition = $('input[name=batchCondition]:checked').val();
    if(condition == 'product') categoryId = null;
    else if(condition == 'productCategory') categoryId = $('#batchCategoryId').val();
    action = addBatchRow;

    getProductAndCategory();
}

function addRow() {
    var html = `
        <div class="promoProducts_item">
            <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Product Name</label>
                    <select id="product_id" class="form-control product_id${(wrapperLength)}" onchange="loadSalePrice(this)">
                        ${productDropdown}
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Sale Price</label>
                    <input id="sale_price" type="text" class="form-control" disabled>
                </div>
                <div class="col-md-2 form-group">
                    <label>Price Computation</label>
                    <select id="discount_type" class="form-control" onchange="loadDiscountPrice(this)">
                        <option value=""></option>
                        <option value="percentage">Discount</option>
                        <option value="fixed">Fixed Price</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Value</label>
                    <input id="discount_amount" type="text" class="form-control" oninput="loadDiscountPrice(this)">
                </div>
                <div class="col-md-2 form-group">
                    <label>Discount Price</label>
                    <input id="discount_price" type="text" class="form-control" disabled>
                </div>
                <input id="condition" type="hidden" class="form-control" value="product">
            </div>
        </div>
    `;

    $('#promoProducts').append(html);

    $('.product_id'+wrapperLength).select2({
        dropdownAutoWidth: true,
        templateResult: newFormatState,
        templateSelection: newFormatState,
    });

    wrapperLength++;
}

function addBatchRow(data, message) {
    var wrapperLength = 1;
    $('#promoProducts').empty();

    if(data) {
        productsByCategory = [];
        var productList = data.productList;
        if(productList && productList.length > 0) {
            $.each(productList, function(k, v) {
                var innerHtml = `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>`;
                if(k == 0) innerHtml = `<div class="defaultTag">Default</div>`;

                var html = `
                    <div class="promoProducts_item">
                        ${innerHtml}
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Product Name</label>
                                <select id="product_id" class="form-control product_id${(wrapperLength)}" onchange="loadSalePrice(this)">
                                    ${productDropdown}
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Sale Price</label>
                                <input id="sale_price" type="text" class="form-control" disabled>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Price Computation</label>
                                <select id="discount_type" class="form-control" onchange="loadDiscountPrice(this)">
                                    <option value=""></option>
                                    <option value="percentage">Discount</option>
                                    <option value="fixed">Fixed Price</option>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Value</label>
                                <input id="discount_amount" type="text" class="form-control" oninput="loadDiscountPrice(this)">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Discount Price</label>
                                <input id="discount_price" type="text" class="form-control" disabled>
                            </div>
                            <input id="condition" type="hidden" class="form-control" value="${condition}">
                        </div>
                    </div>
                `;

                productsByCategory.push(v);
                $('#promoProducts').append(html);
                $('.promoProducts_item:last-child').find('#product_id').val(v['id']).trigger('change');
                $('.promoProducts_item:last-child').find('#discount_amount').val(batchDiscountAmt);
                $('.promoProducts_item:last-child').find('#discount_type').val(batchComputation).trigger('change');
            });

            $('.product_id'+wrapperLength).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            wrapperLength++;
        }
    }
}

function showaddBatchModal() {
    $('#showaddBatchModal').modal();
}

function closeDiv(e) {
    $(e).parent().remove();
}

function addPriceList() {
    var productList = [];
    $('.promoProducts_item').each(function() {
        var item = {
            product_id      : $(this).find('#product_id').val(),
            discount_type   : $(this).find('#discount_type').val(),
            discount_amount : $(this).find('#discount_amount').val(),
            condition       : $(this).find('#condition').val(),
            start_date      : $('#start_date').val(),
            end_date        : $('#end_date').val(),
        };
        productList.push(item);
    });

    var formData = {
        command         : "addPriceList",
        pricelist_name  : $("#pricelist_name").val(),
        product_list    : productList,
    };
    var fCallback = successAddedPriceList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddedPriceList(data, message) {
    showMessage('Price List Created Successfully', 'success', 'Success Create Price List', 'check', 'pricelisting.php');
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
    
    $('#start_date').daterangepicker({
        minDate: today,
        singleDatePicker: true,
        timePicker: true,
        locale: {
            format: 'YYYY-MM-DD HH:mm:ss'
        }
    });
    var dateToday = $('#start_date').val('');

    $('#end_date').daterangepicker({
        minDate: today,
        singleDatePicker: true,
        timePicker: true,
        locale: {
            format: 'YYYY-MM-DD HH:mm:ss'
        }
    });
    var dateToday = $('#end_date').val('');

    return dateToTimestamp(today);
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
