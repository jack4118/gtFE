<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'homepageHeader.php'; ?>

<link href="css/invoice.css" rel="stylesheet" type="text/css" />
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<?php if($_POST['viewType'] == "quotation"){ ?> 
    <section class="pageContent loginPagePadding section">
        <div id="invoiceContent" class="invoiceOuterWrapper whiteBg mt-3">
            <div class="invoiceWrapper">
                <div class="col-12 pt-5">
                    <div class="row pb-4">
                        <div class="col-12 col-md-5 text-center text-md-left">
                            <img src="images/project/newlogo-dark.png" class="img-fluid">
                        </div>
                        <div class="col-12 col-md-6 offset-md-1 text-center text-md-right mt-5 mt-md-0">
                            <div class="bodyText larger" id="companyAddress" style="max-width: 300px; margin-left: auto;">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="borderBottom darkGrey normal"></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                            <div class="bodyText smaller bold" data-lang="M03438"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?>:</div>
                            <div class="bodyText smaller mt-2" id="billingAddress">-</div>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <div class="bodyText smaller bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?>:</div>
                            <div class="bodyText smaller mt-2" id="shippingAddress">-</div>
                        </div>
                    </div>
                    
                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                            <div class="bodyText smaller bold" data-lang="M03935"><?php echo $translations['M03935'][$language] /* Order */ ?> <font id="orderNumber"></font></div>

                            <div class="bodyText smaller bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:</div>
                            <div class="bodyText smaller" id="orderDate">-</div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <form id="orderHistoryPrint">
                                <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                        <div id="invoiceDiv" class="table-responsive"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="col-12" data-lang="M04022">
                            <?php echo $translations['M04022'][$language] /* Payment terms */ ?>: <font id="paymentMethod">-</font>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-center py-5">
            <button type="button" class="btn btn-primary grey col-12 col-lg-2 col-md-3 text-center mr-0 mr-md-4" id="backBtn">
                <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
            </button>
            <button type="button" class="btn btn-primary col-12 col-lg-2 col-md-3 text-center mt-3 mt-md-0" id="download">
                <div class="bodyText smaller text-white" data-lang="M00150">
                    <?php echo $translations['M00150'][$language]; /* Download */ ?>
                    <?php if(isset($_POST['type'])) echo $_POST['type']; /* Invoice / Quotation */ ?>
                </div>
            </button>
        </div>
    </section>
<?php } ?>

<?php if($_POST['viewType'] == "deliveryOrder"){ ?> 
    <section class="pageContent loginPagePadding section">
        <div id="invoiceContent" class="invoiceOuterWrapper whiteBg mt-3">
            <div class="invoiceWrapper">
                <div class="col-12 pt-5">
                    <div class="row pb-4">
                        <div class="col-12 col-md-5 text-center text-md-left">
                            <img src="images/project/newlogo-dark.png" class="img-fluid">
                        </div>
                        <div class="col-12 col-md-6 offset-md-1 text-center text-md-right mt-5 mt-md-0">
                            <div class="bodyText larger" id="companyAddress3" style="max-width: 300px; margin-left: auto;">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="borderBottom darkGrey normal"></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <div class="bodyText smaller mt-2" id="billingAddressDO">-</div>
                        </div>
                    </div>
                    
                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                            <div class="bodyText smaller bold" data-lang="M04023"><?php echo $translations['M04023'][$language] /* DO RECEIPT */ ?><font id="orderNumber2"></font></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12 col-md-4">
                            <div class="bodyText smaller bold" data-lang="M02954"><?php echo $translations['M02954'][$language] /* Invoice Date */ ?>:</div>
                            <div class="bodyText smaller" id="orderDate2">-</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="bodyText smaller bold" data-lang="M03936"><?php echo $translations['M03936'][$language] /* Due Date */ ?>:</div>
                            <div class="bodyText smaller" id="dueDate">-</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="bodyText smaller bold" data-lang="M03937"><?php echo $translations['M03937'][$language] /* Source */ ?>:</div>
                            <div class="bodyText smaller" id="source">-</div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <form id="orderHistoryPrint">
                                <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                        <div id="invoiceDiv" class="table-responsive"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <p data-lang="M04024"><?php echo $translations['M04024'][$language] /* Please use the following communication for your payment: RECEIPT */ ?><font id="orderNumberInfo"></font></p>

                            <p style="color: red;">所有食物请保存在4摄氏度以下。已解冻的食物不宜再反复冷冻存放。所有事物烹饪前都不需要预先解冻。</p>

                            <p style="color: red;">Please keep all food below 4 degree Celsius. Thawed food should not be re-frozen.</p>

                            <p style="color: red;">No thawing is needed prior cooking.</p>
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="col-12">
                            <p class="bodyText larger" style="color:#38571a;" data-lang="M04025"><b><?php echo $translations['M04025'][$language] /* Earn RM10 by referring a friend! */ ?></b></p>

                            <p style="color:#38571a;" data-lang="M04026"><?php echo $translations['M04026'][$language] /* Get your friend to sign up an account with GoTasty with referral code: your phone number. <br/>You are entitled for RM10 rewards when your friend make first purchase above RM100. */ ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-center py-5">
            <button type="button" class="btn btn-primary grey col-12 col-lg-2 col-md-3 text-center mr-0 mr-md-4" id="backBtn">
                <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
            </button>
            <button type="button" class="btn btn-primary col-12 col-lg-2 col-md-3 text-center mt-3 mt-md-0" id="download">
                <div class="bodyText smaller text-white" data-lang="M00150">
                    <?php echo $translations['M00150'][$language]; /* Download */ ?>
                    <?php if(isset($_POST['type'])) echo $_POST['type']; /* Invoice / Quotation */ ?>
                </div>
            </button>
        </div>
    </section>
<?php } ?>

<?php include 'homepageFooter.php'; ?>

</body>

<!-- Print Content  -->
<?php if($_POST['viewType'] == "quotation"){ ?>
    <div id="printContent" class="invoiceOuterWrapper whiteBg">
        <div class="invoiceWrapper">
            <div class="col-12 pt-5">
                <div class="row pb-4">
                    <div class="col-5 text-center text-md-left">
                        <img src="images/project/newlogo-dark.png" class="img-fluid">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6 text-center text-md-right">
                        <div class="bodyText larger" id="companyAddress2" style="max-width: 300px; margin-left: auto;">-</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="borderBottom darkGrey normal"></div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03438"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="billingAddress2">-</div>
                    </div>
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="shippingAddress2">-</div>
                    </div>
                </div>
                
                <div class="row pt-4">
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03935"><?php echo $translations['M03935'][$language] /* Order */ ?> <font id="orderNumber3"></font></div>

                        <div class="bodyText smaller bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:</div>
                        <div class="bodyText smaller" id="orderDate3">-</div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <form id="orderHistoryPrint2">
                            <div id="basicwizardInvoice2" class="pull-in col-12 px-0">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsgInvoice2" class="text-center" style="display: block;"></div>
                                    <div id="invoiceDiv2" class="table-responsive"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-12" data-lang="M04022">
                        <?php echo $translations['M04022'][$language] /* Payment terms */ ?>: <font id="paymentMethod2">-</font>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($_POST['viewType'] == "deliveryOrder"){ ?>
    <div id="printContent" class="invoiceOuterWrapper whiteBg">
        <div class="invoiceWrapper">
                <div class="col-12 pt-5">
                    <div class="row pb-4">
                        <div class="col-5 text-center text-md-left">
                            <img src="images/project/newlogo-dark.png" class="img-fluid">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6 text-right mt-5 mt-md-0">
                            <div class="bodyText larger" id="companyAddress4" style="max-width: 300px; margin-left: auto;">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="borderBottom darkGrey normal"></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="bodyText smaller mt-2" id="billingAddressDO2">-</div>
                        </div>
                    </div>
                    
                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                            <div class="bodyText smaller bold" data-lang="M04023"><?php echo $translations['M04023'][$language] /* DO RECEIPT */ ?><font id="orderNumber4"></font></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M02954"><?php echo $translations['M02954'][$language] /* Invoice Date */ ?>:</div>
                            <div class="bodyText smaller" id="orderDate4">-</div>
                        </div>
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M03936"><?php echo $translations['M03936'][$language] /* Due Date */ ?>:</div>
                            <div class="bodyText smaller" id="dueDate2">-</div>
                        </div>
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M03937"><?php echo $translations['M03937'][$language] /* Source */ ?>:</div>
                            <div class="bodyText smaller" id="source">-</div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <form id="orderHistoryPrint2">
                                <div id="basicwizardInvoice2" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsgInvoice2" class="text-center" style="display: block;"></div>
                                        <div id="invoiceDiv2" class="table-responsive"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <p data-lang="M04024"><?php echo $translations['M04024'][$language] /* Please use the following communication for your payment: RECEIPT */ ?><font id="orderNumberInfo"></font></p>

                            <p style="color: red;">所有食物请保存在4摄氏度以下。已解冻的食物不宜再反复冷冻存放。所有事物烹饪前都不需要预先解冻。</p>

                            <p style="color: red;">Please keep all food below 4 degree Celsius. Thawed food should not be re-frozen.</p>

                            <p style="color: red;">No thawing is needed prior cooking.</p>
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="col-12">
                            <p class="bodyText larger" style="color:#38571a;" data-lang="M04025"><b><?php echo $translations['M04025'][$language] /* Earn RM10 by referring a friend! */ ?></b></p>

                            <p style="color:#38571a;" data-lang="M04026"><?php echo $translations['M04026'][$language] /* Get your friend to sign up an account with GoTasty with referral code: your phone number. <br/>You are entitled for RM10 rewards when your friend make first purchase above RM100. */ ?></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>


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

var saleId          = '<?php echo $_POST['id']  ?>';
var viewType          = '<?php echo $_POST['viewType']  ?>';

var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};
var deliveryDate = document.getElementById("deliveryDate");
var deliveryDateLabel = document.getElementById("deliveryDateLabel");
var trackingNoLabel = document.getElementById("trackingNoLabel");
var trackingNo = document.getElementById("trackingNo");

// Hide the deliveryDate and trackingNo elements
// <?php if($_POST['type'] != $translations['M03923'][$language] /* Delivery Order */) 
// {
// ?>
//     deliveryDate.style.display = "none";
//     deliveryDateLabel.style.display = "none";
//     trackingNoLabel.style.display = "none";
//     trackingNo.style.display = "none";
// <?php
// }
// ?>


var thArrayInvoice  = Array (
    "<?php echo $translations['M03910'][$language] /* Product */ ?>",
    "<?php echo $translations['M00244'][$language] /* Quantity */ ?>",
    "<?php echo $translations['M00242'][$language] /* Unit Price */ ?>",
    "<?php echo $translations['M01795'][$language] /* Amount */ ?>",
);

$(document).ready(function() { 
    if(!saleId) {
        showMessage('<?php echo $translations['M03911'][$language] /* Invalid Order. */ ?>', 'warning', '<?php if(isset($_POST['type'])) { echo $_POST['type']; } /* Invoice / Quotation */ ?>', 'warning', 'paymentListing');
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
        var shippingAddress = data.deliveryAddress;
        var billingAddress = data.billingAddress;
        var invoiceDetail = data.invoiceDetail;
        var packageList = data.packageList;
        var subtotal = data.subtotal;
        var dueDate = data.dueDate;
        var source = data.source;
        var accumulatedRewardPoint = data.accumulatedRewardPoint;

        $("#paymentMethod").html(invoiceDetail.paymentMethod);
        $("#paymentMethod2").html(invoiceDetail.paymentMethod);

        var company = `
            <div class="bodyText smaller bold">${companyAddress['name']}</div>
            <div class="bodyText smaller">${companyAddress['address']}, ${companyAddress['city']},</div>
            <div class="bodyText smaller">${companyAddress['postCode']} ${companyAddress['state']}</div>
        `;
        $('#companyAddress').html(company);
        $('#companyAddress2').html(company);
        $('#companyAddress3').html(company);
        $('#companyAddress4').html(company);

        if(invoiceDetail.deliveryMethod == 'Pickup') {
            var pickup = `
                <div class="bodyText smaller bold">${invoiceDetail.deliveryMethod}</div>
            `;
            $('#shippingAddress').parent().find('div:first-child').html(pickup);
            $('#shippingAddress2').parent().find('div:first-child').html(pickup);
            $('#shippingAddress').html('');
            $('#shippingAddress2').html('');
        } else {
            // if(shippingAddress) {
                var shipping = `
                    <div class="bodyText smaller">${invoiceDetail.shipping_name}</div>
                    <div class="bodyText smaller">${invoiceDetail.shipping_address}</div>
                    <div class="bodyText smaller"> <i class="fa fa-phone bodyText smaller bold"></i> +60${invoiceDetail.shipping_phone}</div>
                `;
                $('#shippingAddress').html(shipping);
                $('#shippingAddress2').html(shipping);
            // } 
        }
        
        // if(billingAddress) {
            var billing = `
                <div class="bodyText smaller">${invoiceDetail.billing_name}</div>
                <div class="bodyText smaller">${invoiceDetail.billing_address}</div>
                <div class="bodyText smaller"><i class="fa fa-phone bodyText smaller bold"></i> +60${invoiceDetail.billing_phone}</div>
            `;
            $('#billingAddress').html(billing);
            $('#billingAddress2').html(billing);
            $('#billingAddressDO').html(billing);
            $('#billingAddressDO2').html(billing);
        // }

        $('#orderNumber').html("#" + invoiceDetail.so_no);
        $('#orderNumberInfo').html(invoiceDetail.id);
        $('#orderNumber2').html(invoiceDetail.id);
        $('#orderNumber3').html("#" + invoiceDetail.so_no);
        $('#orderNumber4').html(invoiceDetail.do_name);

        // moment(v['created_at'], 'YYYY-MM-DD h:mm:ss').format('Do MMMM YYYY')
        $('#orderDate').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate2').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate3').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate4').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");

        $('#dueDate').html(dueDate);
        $('#dueDate2').html(dueDate);
        $('#source').html(source);

        var newList = [];
        $.each(packageList, function(k, v) {
            var productName = '';

            productName += `
                <font class="bodyText smaller">${v['packageDisplay']}</font>
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

        // $('#' + invoiceTableId).find('tbody tr:last-child').after(`
        //     <tr>
        //         <td><?php echo $translations['M03821'][$language] /* Taxes */ ?></td>
        //         <td>1</td>
        //         <td>RM${numberThousand(invoiceDetail.paymentTax, 2)}</td>
        //         <td>RM${numberThousand(invoiceDetail.paymentTax, 2)}</td>
        //     </tr>
        //     <tr>
        //         <td><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?></td>
        //         <td>1</td>
        //         <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
        //         <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
        //     </tr>
        // `);
           
        if(viewType == "quotation") {             
            $('#' + invoiceTableId).find('tbody').after(`
                <tr id="totalRow">
                    <td colspan="2"></td>
                    <td>
                        <?php echo $translations['M00250'][$language] /* Total */ ?>
                    </td>
                    <td style="text-align: right;">
                        RM${numberThousand(invoiceDetail.paymentAmount, 2)}
                    </td>
                </tr>
            `);
        }

        if(viewType == "deliveryOrder") {             
            $('#' + invoiceTableId).find('tbody').after(`
                <tr id="totalRow">
                    <td colspan="2"></td>
                    <td>
                        <?php echo $translations['M00250'][$language] /* Total */ ?><br/>
                        <?php echo $translations['M04027'][$language] /* Accumulated Reward Point */ ?>
                    </td>
                    <td style="text-align: right;">
                        RM${numberThousand(invoiceDetail.paymentAmount, 2)} <br/>
                        ${accumulatedRewardPoint}
                    </td>
                </tr>
            `);
        }

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
