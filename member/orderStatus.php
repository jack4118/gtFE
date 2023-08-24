<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Pre Order Status -->
<div id="preOrderStatusPage">
    <section class="section whiteBg">
        <div class="kt-container row py-5">
            <div class="col-md-5 px-5">
                <img src="images/project/pre-order-status.png" alt="" width="100%">
            </div>
            <div class="col-md-7 px-5 pt-5 pt-md-0 align-self-center">
                <div class="titleText smaller bold" data-lang="M04059"><?php echo $translations['M04059'][$language] /* Please enter the last 4 digits of your mobile number to check your order details. */ ?></div>
                <div class="row m-0 pt-3">
                    <input class="col-12 col-md-auto form-control2" type="text" id="phoneNo" placeholder="Last 4 digits of your mobile number" maxlength = "4" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    <button type="button" class="btn btn-primary col-12 col-md-auto text-center ml-0 ml-md-4 mt-4 mt-md-0" id="checkInvoiceBtn">
                        <div class="bodyText smaller text-white" data-lang="M04060"><?php echo $translations['M04060'][$language] /* Check Invoice */ ?></div>
                    </button>
                    <!-- <p id="insertPassPhrase" class="editProfileInput" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;"><img src="images/alertIcon.png" width="20px"><span id="insertPassPhraseErrorText" style="margin-left: 15px;">&nbsp;</span></p> -->
                    <input class="col-12 col-md-auto form-control2" type="text" id="insertPassPhrase" placeholder="Last 4 digits of your mobile number" maxlength = "4" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="margin-bottom:10px;text-align: left;display:none;margin-top: 10px;">
                </div>
            </div>
        </div>
    </section>
</div>

<div id="orderStatusPage">
    <!-- Order Status Stepper -->
    <section class="section whiteBg px-md-5 pb-0">
        <div class="kt-container">
            <div class="titleText larger bold text-left text-md-center pt-4 pt-md-0 pb-5" data-lang="M03928"><?php echo $translations['M03928'][$language] /* Order Status */ ?></div>
            <div class="wrapper option-1 option-1-1">
                <div class="c-stepper__line"></div>
                <ol class="orderStatus c-stepper flex-column flex-md-row align-items-start justify-content-center m-0">
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M02921"><?php echo $translations['M02921'][$language] /* Order Received */ ?></h3>
                        <h3 class="c-stepper__title" id="orderReceivedDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04061"><?php echo $translations['M04061'][$language] /* Payment Confirmed */ ?></h3>
                        <h3 class="c-stepper__title" id="paymentConfirmedDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column" style="display: none;">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04062"><?php echo $translations['M04062'][$language] /* Payment Failed */ ?></h3>
                        <h3 class="c-stepper__title" id="paymentFailedDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04053"><?php echo $translations['M04053'][$language] /* Order Processing */ ?></h3>
                        <h3 class="c-stepper__title" id="orderProcessingDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04063"><?php echo $translations['M04063'][$language] /* Packed */ ?></h3>
                        <h3 class="c-stepper__title" id="packedDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04054"><?php echo $translations['M04054'][$language] /* Out for Delivery */ ?></h3>
                        <h3 class="c-stepper__title" id="outOfDeliveryDate"></h3>
                    </li>
                    <li class="c-stepper__item flex-row flex-md-column">
                        <h3 class="c-stepper__title ml-4 ml-md-0" data-lang="M04055"><?php echo $translations['M04055'][$language] /* Order Delivered */ ?></h3>
                        <h3 class="c-stepper__title" id="orderDeliveredDate"></h3>
                    </li>
                    
                </ol>
            </div>
        </div>
    </section>

    <section class="section whiteBg">
        <div class="kt-container row mb-5 mb-md-0">
            <div class="col-12 d-flex flex-column flex-md-row">
                <span class="bodyText larger" data-lang="M04056"><?php echo $translations['M04056'][$language] /* Details for order */ ?>&nbsp;</span> 
                <span class="bodyText larger bold" id="orderNoDate"></span>
            </div>
            <div class="col-12 pt-4">
                <div class="orderDetails">
                    <div class="row m-0 py-4 py-md-5">
                        <div class="col-md-6 px-0 seperateLine">
                            <div class="bodyText smaller bold pb-3 px-4 px-md-5" data-lang="M03934"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?></div>
                            <div class="d-flex px-4 px-md-5" id="billingAddress"></div>
                            <div class="pt-2 px-4 px-md-5 pb-4 pb-md-0" id="billingPhone"></div>
                        </div>
                        <div class="col-md-6 px-0 seperateLine pt-4 pt-md-0">
                            <div class="bodyText smaller bold pb-3 px-4 px-md-5" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?></div>
                            <div class="d-flex px-4 px-md-5" id="shippingAddress"></div>
                            <div class="pt-2 px-4 px-md-5 pb-4 pb-md-0" id="shippingPhone"></div>
                        </div>
                    </div>
                    <div class="row m-0 pb-4 pb-md-5">
                        <div class="col-12 px-0 d-none d-md-block" id="orderDetailsTable"></div>
                        <div class="col-12 px-0 d-block d-md-none" id="orderDetailsTable2"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12" id="totalPrice">
                <div class="py-4 totalOrderAmt">
                    <span class="bodyText larger bold px-4 px-md-5" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>: </span>
                    <span class="bodyText larger bold px-4 px-md-5">RM0.00</span>
                </div>
            </div> -->
        </div>
        <div class="kt-container row flex-column flex-md-row align-items-center py-5">
            <div class="col-12 col-lg-2 col-md-3 mr-0 mr-md-4">
                <button type="button" class="btn btn-primary text-center w-100" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
            </div>
            <div class="col-12 col-lg-2 col-md-3">
                <select id="download" class="btn mt-3 mt-md-0 form-control2 w-100">
                    <option class="text-center" value="" selected hidden data-lang="M00301"><?php echo $translations['M00301'][$language] /* Download */ ?></option>
                    <option class="text-left" value="invoice" data-lang="M00528"><?php echo $translations['M00528'][$language] /* Invoice */ ?></option>
                    <option class="text-left" value="receipt" data-lang="M04064"><?php echo $translations['M04064'][$language] /* Receipt */ ?></option>
                    <option class="text-left" value="delivery order" data-lang="M02891"><?php echo $translations['M02891'][$language] /* Delivery Order */ ?></option>
                </select>
            </div>
        </div>
    </section>
</div>


<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

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

var isLogin         = '<?php echo $_SESSION['userID'] ?>';


var soNo            = "<?php echo $_GET['SONO']; ?>";
var getPhone            = "<?php echo $_GET['phone']; ?>";


var responseCode    = '<?php echo $_SESSION['POST'][$postAryName]['responseCode'] ?>';
var fromFPX         = '<?php echo $_SESSION['POST'][$postAryName]['fromFPX'] ?>';

var phone           = "<?php echo $_SESSION['POST'][$postAryName]['phone'] ?>";
var redirectPass    = "";
var saleId          = "";
var passphrase      = "";
var back            = '<?php echo $_GET["b"] ?>';

var thArray  = Array (
    "<?php echo $translations['M03910'][$language] /* Product */ ?>",
    "<?php echo $translations['M00244'][$language] /* Quantity */ ?>",
    "<?php echo $translations['M00242'][$language] /* Unit Price */ ?>",
    "<?php echo $translations['M01795'][$language] /* Amount */ ?>",
);

$(document).ready(function() {
    if(phone){
        passphrase = phone.substr(-4);
    }

    if(getPhone)passphrase = getPhone;

    formData  = {
        command     : "orderDetailCheck",
        passphrase  : passphrase,
        soID        : soNo,
    };
    fCallback = loadInvoiceDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    /*if(isLogin) {
        formData  = {
            command     : "orderDetailCheck",
            soID        : soNo,
            step        : 'first'
        };
        fCallback = loadInvoiceDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    } else {
        $('#preOrderStatusPage').show();
    }*/

    $('#checkInvoiceBtn').click(function() {
        $("input,select").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });
        var passphrase = $('#phoneNo').val();
        redirectPass = passphrase;

        formData  = {
            command     : "orderDetailCheck",
            passphrase  : passphrase,
            soID        : soNo
        };
        fCallback = loadInvoiceDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#backBtn').click(function() {

        if(back == 1)history.back();
        else if(isLogin)$.redirect('paymentListing');
        else $.redirect('homepage');
    });

    $('#download').change(function() {
        var viewType = $(this).val();
        viewInvoice(viewType);
    });
});

function loadInvoiceDetails(data, message) {
    $("input,select").each(function(){
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').html("");
    });
    if(data == 'ShowPage'){
        $('#preOrderStatusPage').show();
    }
    if(data && data != 'ShowPage') {
        if(!saleId){
            saleId = data.invoiceDetail.id;
            // saleId = '';
        }
        var shippingAddress = data.deliveryAddress;
        var billingAddress = data.billingAddress;
        var invoiceDetail = data.invoiceDetail;
        var packageList = data.packageList;
        var subtotal = data.subtotal;
        var accumulatedRewardPoint = data.accumulatedRewardPoint;
        var giftStatus = data.giftStatus;

        if(invoiceDetail.deliveryMethod.toLowerCase() == 'pickup') {
            $('#shippingAddress').parent().find('div:first-child').html('<?php echo $translations['M02994'][$language] /* Pickup Address */ ?>');
            
            var shippingAddress = `
                <i class="fa fa-home mr-2"></i>
                <div>
                    <div class="bodyText smaller">${data.companyAddressAct.name}</div>
                    <div class="bodyText smaller address">${data.companyAddress.replace(/\n/g, '<br>')}</div>
                </div>
            `;

            var shippingMobile = `
                <i class="fa fa-phone mr-2"></i>
                <span class="bodyText smaller">${data.companyContact.contactNo}</span>
            `;

            $('#shippingAddress').html(shippingAddress);
            $('#shippingPhone').html(shippingMobile);
        } else {
            var shippingAddress = `
                <i class="fa fa-home mr-2"></i>
                <div>
                    <div class="bodyText smaller">${invoiceDetail.shipping_name}</div>
                    <div class="bodyText smaller address">${invoiceDetail.shipping_address.replace(/\n/g, ',<br>')}.</div>
                </div>
            `;

            // var shippingPhone = invoiceDetail['shipping_phone'];
            // if (shippingPhone.charAt(0) === '6') {
            //     shippingPhone = shippingPhone.substring(1);
            // }else if (shippingPhone.charAt(0) !== '0') {
            //     shippingPhone = '0' + shippingPhone;
            // }else{
            //     shippingPhone = invoiceDetail['shipping_phone'];
            // }

            var shippingMobile = `
                <i class="fa fa-phone mr-2"></i>
                <span class="bodyText smaller">${invoiceDetail.shipping_phone}</span>
            `;

            $('#shippingAddress').html(shippingAddress);
            $('#shippingPhone').html(shippingMobile);
        }
        
        var billingAddress = `
            <i class="fa fa-home mr-2"></i>
            <div>
                <div class="bodyText smaller">${invoiceDetail.billing_name}</div>
                <div class="bodyText smaller address">${invoiceDetail.billing_address.replace(/\n/g, ',<br>')}.</div>
            </div>
        `;

        // var billingPhone = invoiceDetail['billing_phone'];
        // if (billingPhone.charAt(0) === '6') {
        //     billingPhone = billingPhone.substring(1);
        // }else if (billingPhone.charAt(0) !== '0') {
        //     billingPhone = '0' + billingPhone;
        // }else{
        //     billingPhone = invoiceDetail['shipping_phone'];
        // }

        var billingMobile = `
            <i class="fa fa-phone mr-2"></i>
            <span class="bodyText smaller">${invoiceDetail.billing_phone}</span>
        `;

        $('#billingAddress').html(billingAddress);
        $('#billingAddressDO').html(billingAddress);
        $('#billingPhone').html(billingMobile);

        $('#orderNoDate').html("#" + invoiceDetail.so_no + ' (' + moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM YYYY') + "" + ')');

        // if(invoiceDetail.orderDate) {
        //     $('#orderReceivedDate').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        // if(invoiceDetail.paymentDate) {
        //     $('#paymentConfirmedDate').html(moment(invoiceDetail.paymentDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        //     $('#paymentFailedDate').html(moment(invoiceDetail.paymentDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        // if(invoiceDetail.processingDate) {
        //     $('#orderProcessingDate').html(moment(invoiceDetail.processingDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        // if(invoiceDetail.packedDate) {
        //     $('#packedDate').html(moment(invoiceDetail.packedDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        // if(invoiceDetail.outOfDeliveryDate) {
        //     $('#outOfDeliveryDate').html(moment(invoiceDetail.outOfDeliveryDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        // if(invoiceDetail.deliveredDate) {
        //     $('#orderDeliveredDate').html(moment(invoiceDetail.deliveredDate, 'DD-MM-YYYY h:mm:ss').format('DD MMMM') + "");
        // }

        if(invoiceDetail.status == 'Pending Payment Approve') {
            $('#download').find('option[value="receipt"], option[value="delivery order"]').prop('hidden', 'hidden');
        } else if(invoiceDetail.status == 'Paid' || invoiceDetail.status == 'Failed' || invoiceDetail.status == 'Packed' || invoiceDetail.status == 'Order Processing') {
            $('#download').find('option[value="delivery order"]').prop('hidden', 'hidden');
        }

        if(invoiceDetail.status == 'Pending Payment Approve' && invoiceDetail.paymentMethod != 'FPX') {
            $('#orderReceivedDate').parent().addClass('active');
        }else if(invoiceDetail.status == 'Pending Payment Approve' && invoiceDetail.paymentMethod == 'FPX') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentFailedDate').parent().addClass('active');
            $('#paymentConfirmedDate').parent().hide();
            $('#paymentFailedDate').parent().show();
        } else if(invoiceDetail.status == 'Paid' ) {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentConfirmedDate').parent().addClass('active');
            $('#paymentConfirmedDate').parent().show();
            $('#paymentFailedDate').parent().hide();
        } else if(invoiceDetail.status == 'Failed') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentFailedDate').parent().addClass('active');
            $('#paymentConfirmedDate').parent().hide();
            $('#paymentFailedDate').parent().show();
        } else if(invoiceDetail.status == 'Packed') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentConfirmedDate').parent().addClass('activeNext');
            $('#orderProcessingDate').parent().addClass('activeNext');
            $('#packedDate').parent().addClass('active');
        } else if(invoiceDetail.status == 'Out of Delivery' || invoiceDetail.status == 'Out For Delivery') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentConfirmedDate').parent().addClass('activeNext');
            $('#orderProcessingDate').parent().addClass('activeNext');
            $('#packedDate').parent().addClass('activeNext');
            $('#outOfDeliveryDate').parent().addClass('active');
        } else if(invoiceDetail.status == 'Delivered') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentConfirmedDate').parent().addClass('activeNext');
            $('#orderProcessingDate').parent().addClass('activeNext');
            $('#packedDate').parent().addClass('activeNext');
            $('#outOfDeliveryDate').parent().addClass('activeNext');
            $('#orderDeliveredDate').parent().addClass('active');
        }else if(invoiceDetail.status == 'Order Processing') {
            $('#orderReceivedDate').parent().addClass('activeNext');
            $('#paymentConfirmedDate').parent().addClass('activeNext');
            $('#orderProcessingDate').parent().addClass('active');
            $('#paymentConfirmedDate').parent().show();
            $('#paymentFailedDate').parent().hide();
        }
        
        if(fromFPX) {
            if(responseCode == '00') {
                $('#paymentConfirmedDate').parent().show();
                $('#paymentFailedDate').parent().hide();
            } else {
                $('#paymentConfirmedDate').parent().hide();
                $('#paymentFailedDate').parent().show();
            }
        }

        // Order Details Table
        $('#orderDetailsTable').empty();
        $('#orderDetailsTable2').empty();

        var table = '';
        var tableMobile = '';

        table += `
            <table>
                <thead>
                    <tr>
        `;

        tableMobile += `
            <div class="px-4 px-md-5">
                <div class="bodyText smaller bold pb-4" data-lang="M03666"><?php echo $translations['M03666'][$language] /* Product */ ?></div>
        `;

        $.each(thArray, function(k, v) {
            table += `
                        <td class="px-4 px-md-5">${v}</td>
            `;
        });
                    
        table += `
                    </tr>
                <thead>
                <tbody>
        `;

        $.each(packageList, function(k, v) {
            var hasDiscount = false;
            if(v['latestUnitPrice'] && v['latestPrice']) hasDiscount = true;

            if(v['type'] == 'package' || v['type'] == 'product' || v['type'] == 'shipping_fee'){
                var packagePrice;
                if(v['packagePrice']) packagePrice = 'RM' + Number(v['packagePrice']).toFixed(2);
                else packagePrice = '';

                var totalPackagePrice;
                if(v['totalPackagePrice']) totalPackagePrice = 'RM' + Number(v['totalPackagePrice']).toFixed(2);
                else totalPackagePrice = '';

                table += `
                    <tr class="orderContent">
                        <td class="px-4 px-md-5">${v['packageDisplay']}</td>
                        <td class="px-4 px-md-5">${numberThousand(v['packageQuantity'], 0)}</td>
                        <td class="px-4 px-md-5">${hasDiscount ? 'RM' + Number(v['latestUnitPrice']).toFixed(2) : packagePrice}</td>
                        <td class="px-4 px-md-5">${hasDiscount ? 'RM' + Number(v['latestPrice']).toFixed(2) : totalPackagePrice}</td> 
                    </tr>
                `;

                tableMobile += `
                    <div class="d-flex justify-content-between pb-4">
                        <div class="pr-3">
                            <div class="bodyText smaller">${v['packageDisplay']}</div>
                            <div>
                                <span class="bodyText smaller" data-lang="M03095"><?php echo $translations['M03095'][$language] /* Qty */ ?>: ${numberThousand(v['packageQuantity'], 0)}</span>
                                <span class="bodyText smaller ml-4">Unit Price: RM${numberThousand(v['packagePrice'], 2)}</span>
                            </div>
                        </div>
                        <div class="bodyText smaller">RM${numberThousand(v['totalPackagePrice'], 2)}</div>
                    </div>
                `;
            }else{
                table += `
                    <tr class="orderContent">
                        <td class="px-4 px-md-5">${v['packageDisplay']}</td>
                        <td class="px-4 px-md-5"></td>
                        <td class="px-4 px-md-5"></td>
                        <td class="px-4 px-md-5">-RM${numberThousand(v['totalPackagePrice'], 2)}</td> 
                    </tr>
                `;

                tableMobile += `
                    <div class="d-flex justify-content-between pb-4">
                        <div class="pr-3">
                            <div class="bodyText smaller">${v['packageDisplay']}</div>
                            <div>
                                <span class="bodyText smaller" data-lang="M03095"></span>
                                <span class="bodyText smaller ml-4"></span>
                            </div>
                        </div>
                        <div class="bodyText smaller">-RM${numberThousand(v['totalPackagePrice'], 2)}</div>
                    </div>
                `;
            }
            
        });

        tableMobile += `
            </div>
        `;

        // if(giftStatus)
           
        if(invoiceDetail.status == 'Out For Delivery' ||invoiceDetail.status == 'Out of Delivery' || invoiceDetail.status == 'Delivered') {
            table += `
                    <tr class="orderSummary total">`;
                    if(giftStatus){
                        table += `<td class="px-4 px-md-5 pt-4" style="color:red">Remark: This is a gift</td>`;
                    }else{
                        table += `<td class="px-4 px-md-5 pt-4"></td>`;
                    }
                    table += `<td class="px-4 px-md-5 pt-4" colspan="2" data-lang="M00250">
                            <?php echo $translations['M00250'][$language] /* Total */ ?> <br/>
                        </td>
                        <td class="px-4 px-md-5 pt-4" id="subtotal">
                            RM${numberThousand(invoiceDetail.releaseAmount, 2)} <br/>
                        </td>
                    </tr>`;

                    if(invoiceDetail.status == 'Delivered'){
                        
                    table += 
                    `<tr class="orderSummary total">
                        <td class="px-4 px-md-5 pt-2"></td>
                        <td class="px-4 px-md-5 pt-2" colspan="2" data-lang="M04027">
                            <?php echo $translations['M04027'][$language] /* Accumulated Reward Point */ ?>
                        </td>
                        <td class="px-4 px-md-5 pt-2" id="subtotal">
                            ${accumulatedRewardPoint}
                        </td>
                    </tr>`;
                    }
                    
            tableMobile += `
                <div class="px-4 px-md-5 mt-3 totalLine">
                    <div class="d-flex justify-content-between pt-4">
                        <div class="bodyText larger bold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div>
                        <div class="bodyText larger bold">RM${numberThousand(invoiceDetail.releaseAmount, 2)}</div>
                    </div>
                    <div class="d-flex justify-content-between pt-2">
                        <div class="bodyText larger bold" data-lang="M04027"><?php echo $translations['M04027'][$language] /* Accumulated Reward Point */ ?>:</div>
                        <div class="bodyText larger bold">${accumulatedRewardPoint}</div>
                    </div>`;
                    if(giftStatus){
                        tableMobile += ` <div class="d-flex justify-content-between pt-4" style="color:red">Remark: This is a gift</div>`;
                    }
                tableMobile += `    </div> 
            `;
        } else {
           
            table += `<tr class="orderSummary total">`;
                    if(giftStatus){
                        table += `<td class="px-4 px-md-5 pt-4" style="color:red">Remark: This is a gift</td>`;
                    }else{
                        table += `<td class="px-4 px-md-5 pt-4"></td>`;
                    }
                    table += `    <td class="px-4 px-md-5 pt-4" colspan="2"><?php echo $translations['M00250'][$language] /* Total */ ?></td>
                        <td class="px-4 px-md-5 pt-4" id="subtotal">RM${numberThousand(invoiceDetail.releaseAmount, 2)}</td>
                    </tr>`;
            

            tableMobile += `
                <div class="px-4 px-md-5 mt-3 totalLine">`;
                tableMobile += `        <div class="d-flex justify-content-between pt-4">
                        <div class="bodyText larger bold" data-lang="M00250"><?php echo $translations['M00250'][$language] /* Total */ ?>:</div>
                        <div class="bodyText larger bold">RM${numberThousand(invoiceDetail.releaseAmount, 2)}</div>
                    </div>`;
                    if(giftStatus){
                        tableMobile += ` <div class="d-flex justify-content-between pt-4" style="color:red">Remark: This is a gift</div>`;
                    }
                tableMobile += `    </div>`;
        }

        table += `
                </tbody>
            </table>
        `;

        $('#orderDetailsTable').html(table);
        $('#orderDetailsTable2').html(tableMobile);

        $('#preOrderStatusPage').hide();
        $('#orderStatusPage').show();
    }
}

function viewInvoice(viewType) {
    
    if(phone){
        $.redirect('viewInvoice', {id: saleId, responseCode: responseCode, fromFPX: fromFPX, viewType: viewType,soNo:soNo,phone:passphrase});
    }else if(soNo){
        $.redirect('viewInvoice', {id: saleId, responseCode: responseCode, fromFPX: fromFPX, viewType: viewType, returnedSoNum: soNo,soNo:soNo, redirectPass: redirectPass,phone:passphrase});
    }else{
        $.redirect('viewInvoice', {id: saleId, responseCode: responseCode, fromFPX: fromFPX, viewType: viewType,soNo:soNo,phone:passphrase});
    }
}

</script>
