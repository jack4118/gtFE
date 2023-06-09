<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'homepageHeader.php'; ?>

<link href="css/invoice.css" rel="stylesheet" type="text/css" />
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<section class="pageContent loginPagePadding p-0">
    <!-- Order Details Title -->
    <div class="section checkoutBg">
        <div class="titleText larger bold text-white text-center text-md-left" data-lang="M03927"><?php echo $translations['M03927'][$language] /* Order Details */ ?></div>
    </div>

    <div class="section whiteBg">
        <div class="borderAll grey normal bg-light p-5">
            <div class="row px-md-5">
                <div class="col-md-6">
                    <div class="bodyText larger pb-3" data-lang="M00224"><?php echo $translations['M00224'][$language] /* Name */ ?>:&ensp;<span class="fw-500" id="name"></span></div>
                    <div class="bodyText larger pb-3" data-lang="M02298"><?php echo $translations['M02298'][$language] /* Mobile Number */ ?>:&ensp;<span class="fw-500" id="mobileNumber"></span></div>
                    <div class="bodyText larger pb-3" data-lang="M02655"><?php echo $translations['M02655'][$language] /* Email */ ?>:&ensp;<span class="fw-500" id="email"></span></div>
                    <div class="bodyText larger pb-3 pb-md-0" data-lang="M03928"><?php echo $translations['M03928'][$language] /* Order Status */ ?>:&ensp;<span class="fw-500" id="orderStatus"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="bodyText larger pb-3" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:&ensp;<span class="fw-500" id="orderDate"></span></div>
                    <div class="bodyText larger d-flex"> 
                        <div data-lang="M02828"><?php echo $translations['M02828'][$language] /* Delivery Address */ ?>:&ensp;</div>
                        <div class="fw-500" id="deliveryAddress"></div>
                    </div>
                </div>
            </div>
            
        </div>

        <div id="invoiceContent" class="invoiceOuterWrapper whiteBg mt-3 p-0">
            <div class="invoiceWrapper p-0">
                <div class="col-12 pt-5 px-0">
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                        <div id="invoiceDiv" class="table-responsive"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-center py-5">
            <button type="button" class="btn btn-primary grey col-12 col-lg-2 col-md-3 text-center mr-0 mr-md-4" id="backBtn">
                <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
            </button>
            <button type="button" class="btn btn-primary col-12 col-lg-3 col-md-4 text-center mt-3 mt-md-0" id="download">
                <div class="bodyText smaller text-white" data-lang="M03929">
                    <?php echo $translations['M03929'][$language] /* Download Receipt */ ?>
                </div>
            </button>
        </div>
    </div>
</section>

<?php include 'homepageFooter.php'; ?>

</body>

<!-- Print Content  -->
<div id="printContent" class="invoiceOuterWrapper whiteBg">
    <div class="borderAll grey normal bg-light p-5">
        <div class="row px-5">
            <div class="col-6">
                <div class="bodyText larger pb-3" data-lang="M00224"><?php echo $translations['M00224'][$language] /* Name */ ?>:&ensp;<span class="fw-500" id="name2"></span></div>
                <div class="bodyText larger pb-3" data-lang="M02298"><?php echo $translations['M02298'][$language] /* Mobile Number */ ?>:&ensp;<span class="fw-500" id="mobileNumber2"></span></div>
                <div class="bodyText larger pb-3" data-lang="M02655"><?php echo $translations['M02655'][$language] /* Email */ ?>:&ensp;<span class="fw-500" id="email2"></span></div>
                <div class="bodyText larger" data-lang="M03928"><?php echo $translations['M03928'][$language] /* Order Status */ ?>:&ensp;<span class="fw-500" id="orderStatus2"></span></div>
            </div>
            <div class="col-6">
                <div class="bodyText larger pb-3" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:&ensp;<span class="fw-500" id="orderDate2"></span></div>
                <div class="bodyText larger d-flex"> 
                    <div data-lang="M02828"><?php echo $translations['M02828'][$language] /* Delivery Address */ ?>:&ensp;</div>
                    <div class="fw-500" id="deliveryAddress2"></div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="invoiceWrapper p-0">
        <div class="col-12 pt-5 px-0">
            <div class="row">
                <div class="col-12">
                    <form>
                        <div id="basicwizardInvoice2" class="pull-in col-12 px-0">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsgInvoice2" class="text-center" style="display: block;"></div>
                                <div id="invoiceDiv2" class="table-responsive"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var saleId          = '<?php echo $_POST['fpx_sellerOrderNo'] ?>';
var responseCode    = '<?php echo $_POST['fpx_debitAuthCode'] ?>';

var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};

var thArrayInvoice  = Array (
    "",
    "<span class='text-white' data-lang='M03930'><?php echo $translations['M03930'][$language] /* Product Name */ ?></span>",
    "<span class='text-white' data-lang='M00244'><?php echo $translations['M00244'][$language] /* Quantity */ ?></span>",
    "<span class='text-white' data-lang='M03129'><?php echo $translations['M03129'][$language] /* Price */ ?></span>",
);

$(document).ready(function() {
    formData  = {
        command     : "getSaleDetail",
        SaleID      : saleId
    };
    fCallback = loadInvoiceDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#backBtn').click(function() {
        $.redirect('paymentListing');
    })

    $('#download').click(function() {
        window.print();
    })
});

function loadInvoiceDetails(data, message) {

    if(data) {
        var invoiceDetail = data.invoiceDetail;
        var packageList = data.packageList;
        var subtotal = data.subtotal;

        if(invoiceDetail) {
            $('#name').html(invoiceDetail['shipping_name']);
            $('#name2').html(invoiceDetail['shipping_name']);

            $('#mobileNumber').html('+60' + invoiceDetail['shipping_phone']);
            $('#mobileNumber2').html('+60' + invoiceDetail['shipping_phone']);

            $('#email').html(invoiceDetail['shipping_email']);
            $('#email2').html(invoiceDetail['shipping_email']);

            $('#deliveryAddress').html(invoiceDetail['shipping_address']);
            $('#deliveryAddress2').html(invoiceDetail['shipping_address']);
        }

        if(invoiceDetail.deliveryMethod != 'delivery') {
            $('#deliveryAddress').parent().find('div:first-child').html(`<div class="fw-500" data-lang="M02827"><?php echo $translations['M02827'][$language] /* Self Pickup */ ?></div>`);
            $('#deliveryAddress2').parent().find('div:first-child').html(`<div class="fw-500" data-lang="M02827"><?php echo $translations['M02827'][$language] /* Self Pickup */ ?></div>`);

            $('#deliveryAddress').html('');
            $('#deliveryAddress2').html('');
        }

        $('#orderDate').html(invoiceDetail.orderDate);
        $('#orderDate2').html(invoiceDetail.orderDate);

        var orderStatus;
        if(responseCode == '00') {
            orderStatus = '<span data-lang="M03931"><?php echo $translations['M03931'][$language] /* Payment Success */ ?></span>';
        } else {
            orderStatus = '<span data-lang="M03932"><?php echo $translations['M03932'][$language] /* Payment Unsuccessful */ ?></span>';
        }
        $('#orderStatus').html(orderStatus);
        $('#orderStatus2').html(orderStatus);

        var newList = [];
        $.each(packageList, function(k, v) {
            if(k == 0) return;

            var productName = '';

            productName += `
                ${v['packageDisplay']}
            `;

            if(v['product_attribute_name'] != '') {
                productName += `
                    <br>(${v['product_attribute_name']})
                `;
            }

            var rebuildData = {
                productImg      : `<img class="orderSummaryImg" src="${v['image']}">`,
                productName     : productName,
                quantity        : numberThousand(v['packageQuantity'], 0),
                amount          : 'RM' + numberThousand(v['totalPackagePrice'], 2),
            };

            newList.push(rebuildData);
        });

        var tableNo;

        buildTable(newList, invoiceTableId, invoiceDivId, thArrayInvoice, btnArrayInvoice, message, tableNo);
        pagination(invoicePagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        var deliveryMethodHtml = '';

        if(invoiceDetail.deliveryMethod != 'delivery') {
            deliveryMethodHtml = '<span data-lang="M02827"><?php echo $translations['M02827'][$language] /* Self Pickup */ ?></span>';
        } else {
            deliveryMethodHtml = '<span data-lang="M02826"><?php echo $translations['M02826'][$language] /* Delivery */ ?></span>';
        }

        $('#' + invoiceTableId).find('tbody').append(`
            <tr>
                <td></td>
                <td class="text-capitalize">${data.source} - ${deliveryMethodHtml} <span data-lang="M03933"><?php echo $translations['M03933'][$language] /* Go Tasty Sdn. Bhd. */ ?></span></td>
                <td>1</td>
                <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</td>
                <td>RM${numberThousand(invoiceDetail.paymentAmount, 2)}</td>
            </tr>
        `);

        $('#' + invoiceTableId).addClass('receiptTable');

        $('#' + invoiceTableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(0), td:eq(0)').css('text-align', "center");
            $(this).find('th:eq(1)').css('text-align', "center");
            $(this).find('th:eq(2), td:eq(2)').css('text-align', "center");
            $(this).find('th:eq(3), td:eq(3)').css('text-align', "center");
            $(this).find('th:eq(3), td:eq(3)').css('font-weight', "500");
        });

        var table = $('#basicwizardInvoice').html();
        $('#basicwizardInvoice2').html(table);
    }
}

</script>