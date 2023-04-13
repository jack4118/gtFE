<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'homepageHeader.php'; ?>

<link href="css/invoice.css" rel="stylesheet" type="text/css" />
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<section class="pageContent loginPagePadding section">
    <div id="invoiceContent" class="invoiceOuterWrapper whiteBg mt-3">
        <div class="invoiceWrapper">
            <div class="col-12 text-center pb-5">
                <span class="titleText larger bold text-uppercase" data-lang="M00237"><?php echo $translations['M00237'][$language] /*Invoice*/ ?></span>
            </div>
            <div class="col-12 pt-5">
                <div class="row pb-5">
                    <div class="col-12 col-md-6 text-center text-md-left">
                        <img src="images/project/logo-colour.png" width="250px">
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-right mt-5 mt-md-0">
                        <div class="bodyText larger bold" id="companyAddress">-</div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-12 col-md-6">
                        <div class="bodyText larger bold" data-lang="M03438"><?php echo $translations['M03438'][$language] /* Ship To */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="shippingAddress">-</div>
                    </div>
                    <div class="col-12 col-md-6 mt-5 mt-md-0">
                        <div class="bodyText larger bold" data-lang="M03437"><?php echo $translations['M03437'][$language] /* Bill To */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="billingAddress">-</div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-12">
                        <div class="borderBottom darkGrey normal"></div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-12 col-md-6">
                        <div class="bodyText larger bold" data-lang="M03908"><?php echo $translations['M03908'][$language] /* Order Number */ ?></div>
                        <div class="bodyText smaller mt-2" id="orderNumber">-</div>
                    </div>
                    <div class="col-12 col-md-6 mt-5 mt-md-0">
                        <div class="bodyText larger bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?></div>
                        <div class="bodyText smaller mt-2" id="orderDate">-</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="borderBottom darkGrey normal"></div>
                    </div>
                </div>
                <div class="row pt-5">
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
            <div class="bodyText smaller text-white" data-lang="M03434"><?php echo $translations['M03434'][$language]; /* Download Invoice */ ?></div>
        </button>
    </div>
</section>

<?php include 'homepageFooter.php'; ?>

</body>

<!-- Print Content  -->
<div id="printContent" class="invoiceOuterWrapper whiteBg">
    <div class="invoiceWrapper">
        <div class="col-12 text-center pb-5">
            <span class="titleText larger bold text-uppercase" data-lang="M00237"><?php echo $translations['M00237'][$language] /*Invoice*/ ?></span>
        </div>
        <div class="col-12 pt-5">
            <div class="row pb-5">
                <div class="col-6 text-left">
                    <img src="images/project/logo-colour.png" width="250px">
                </div>
                <div class="col-6 text-right">
                    <div class="bodyText larger bold" id="companyAddress2">-</div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-6">
                    <div class="bodyText larger bold" data-lang="M03438"><?php echo $translations['M03438'][$language] /* Ship To */ ?>:</div>
                    <div class="bodyText smaller mt-2" id="shippingAddress2">-</div>
                </div>
                <div class="col-6">
                    <div class="bodyText larger bold" data-lang="M03437"><?php echo $translations['M03437'][$language] /* Bill To */ ?>:</div>
                    <div class="bodyText smaller mt-2" id="billingAddress2">-</div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-12">
                    <div class="borderBottom darkGrey normal"></div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-6">
                    <div class="bodyText larger bold" data-lang="M03908"><?php echo $translations['M03908'][$language] /* Order Number */ ?></div>
                    <div class="bodyText smaller mt-2" id="orderNumber2">-</div>
                </div>
                <div class="col-6">
                    <div class="bodyText larger bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?></div>
                    <div class="bodyText smaller mt-2" id="orderDate2">-</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="borderBottom darkGrey normal"></div>
                </div>
            </div>
            <div class="row pt-5">
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

var saleId          = '<?php echo $_POST['id']  ?>'

var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};

var thArrayInvoice  = Array (
    "<?php echo $translations['M03910'][$language] /* Product */ ?>",
    "<?php echo $translations['M00244'][$language] /* Quantity */ ?>",
    "<?php echo $translations['M00242'][$language] /* Unit Price */ ?>",
    "<?php echo $translations['M01795'][$language] /* Amount */ ?>",
);

$(document).ready(function() {
    if(!saleId) {
        showMessage('<?php echo $translations['M03911'][$language] /* Invalid Order. */ ?>', 'warning', '<?php echo $translations['M00237'][$language] /*Invoice*/ ?>', 'warning', 'paymentListing');
    }


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
        var companyAddress = data.companyAddressAct;
        var companyContact = data.companyContact;
        var shippingAddress = data.deliveryAddressDetail;
        var billingAddress = data.billingAddressDetail;
        var invoiceDetail = data.invoiceDetail;
        var packageList = data.packageList;
        var subtotal = data.subtotal;

        var company = `
            <div class="bodyText smaller bold">${companyAddress['name']} ${companyAddress['registrationNo']}</div>
            <div class="bodyText smaller">${companyAddress['address']}</div>
            <div class="bodyText smaller">${companyAddress['postCode']} ${companyAddress['city']}</div>
            <div class="bodyText smaller">${companyAddress['state']}</div>
            <div class="bodyText smaller" data-lang="M03912"><?php echo $translations['M03912'][$language] /* Phone number */ ?>: +${companyContact['contactNo']}</div>
            <div class="bodyText smaller" data-lang="M03913"><?php echo $translations['M03913'][$language] /* Email */ ?>: ${companyContact['email']}</div>
        `;
        $('#companyAddress').html(company);
        $('#companyAddress2').html(company);

        if(invoiceDetail.deliveryMethod == 'Pickup') {
            var pickup = `
                <div class="bodyText smaller bold">${invoiceDetail.deliveryMethod}</div>
            `;
            $('#shippingAddress').parent().find('div:first-child').html(pickup);
            $('#shippingAddress2').parent().find('div:first-child').html(pickup);
            $('#shippingAddress').html('');
            $('#shippingAddress2').html('');
        } else {
            var shipping = `
                <div class="bodyText smaller bold">${shippingAddress['fullname']}</div>
                <div class="bodyText smaller">${shippingAddress['address']}</div>
                <div class="bodyText smaller">${shippingAddress['postCode']} ${shippingAddress['city']}</div>
                <div class="bodyText smaller">${shippingAddress['state']} ${shippingAddress['country']}</div>
                <div class="bodyText smaller" data-lang="M03912"><?php echo $translations['M03912'][$language] /* Phone number */ ?>: +${billingAddress['dialingArea']}${shippingAddress['phone']}</div>
            `;
            $('#shippingAddress').html(shipping);
            $('#shippingAddress2').html(shipping);
        }
        

        var billing = `
            <div class="bodyText smaller bold">${billingAddress['fullname']}</div>
            <div class="bodyText smaller">${billingAddress['address']}</div>
            <div class="bodyText smaller">${billingAddress['postCode']} ${billingAddress['city']}</div>
            <div class="bodyText smaller">${billingAddress['state']} ${billingAddress['country']}</div>
            <div class="bodyText smaller" data-lang="M03912"><?php echo $translations['M03912'][$language] /* Phone number */ ?>: +${billingAddress['dialingArea']}${billingAddress['phone']}</div>
        `;
        $('#billingAddress').html(billing);
        $('#billingAddress2').html(billing);

        $('#orderNumber').html(invoiceDetail.id);
        $('#orderNumber2').html(invoiceDetail.id);

        $('#orderDate').html(invoiceDetail.createdAt);
        $('#orderDate2').html(invoiceDetail.createdAt);

        var newList = [];
        $.each(packageList, function(k, v) {
            var productName = '';

            productName += `
                <div class="bodyText smaller">${v['packageDisplay']}</div>
            `;

            if(v['product_attribute_name'] != '') {
                productName += `
                    <div class="bodyText smaller">(${v['product_attribute_name']})</div>
                `;
            }

            var rebuildData = {
                productName     : productName,
                quantity        : numberThousand(v['packageQuantity'], 0),
                unitPrice       : 'RM' + numberThousand(v['packagePrice'], 2),
                amount          : 'RM' + numberThousand(v['totalPackagePrice'], 2),
            };

            newList.push(rebuildData);
        });

        var tableNo;

        buildTable(newList, invoiceTableId, invoiceDivId, thArrayInvoice, btnArrayInvoice, message, tableNo);
        pagination(invoicePagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + invoiceTableId).find('tbody').after(`
            <thead id="totalGrp">
                <tr>
                    <td colspan="3" class="text-right" data-lang="M02824"><?php echo $translations['M02824'][$language] /* Sub Total */ ?> :</td>
                    <td>RM${numberThousand(invoiceDetail.subtotal, 2)}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right" data-lang="M03821"><?php echo $translations['M03821'][$language] /* Taxes */ ?> :</td>
                    <td>RM${numberThousand(invoiceDetail.paymentTax, 2)}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right" data-lang="M03794"><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?> :</td>
                    <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" class="text-right" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?> :</td>
                    <td>RM${numberThousand(invoiceDetail.paymentAmount, 2)}</td>
                </tr>
            </thead>
        `);

        $('#' + invoiceTableId).addClass('invoiceTable');

        $('#' + invoiceTableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(1), td:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2), td:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3), td:eq(3)').css('text-align', "right");
        });

        $('#' + invoiceTableId).find('thead#totalGrp').each(function () {
            $(this).find('tr:eq(0)').css('border-bottom', "none");
            $(this).find('tr:eq(1)').css('border-bottom', "none");
            $(this).find('tr:eq(2)').css('border-bottom', "none");

            $(this).find('tr:eq(0)').css('border-top', "1px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(1)').css('border-top', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(1)').css('border-bottom', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(2)').css('border-top', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(2)').css('border-bottom', "2px solid #E9EBF2");
        });

        var table = $('#basicwizardInvoice').html();
        $('#basicwizardInvoice2').html(table);
    }
}

</script>
