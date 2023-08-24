<?php
session_start();


?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<link href="css/invoice.css" rel="stylesheet" type="text/css" />
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row d-print-none">
                    <div class="col-sm-4">
                        <a id="invoiceBack" href="purchaseOrder.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="card-box">
                    <div class="invoiceWrapper">
                        <div class="col-xl-12">
                            <div class="row mobileReverse" style="display: flex; flex-wrap: wrap;">
                                <div class="mobile-full default-half m-t-20">
                                    <div class="row">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceCompanyName'>Go Tasty Sdn. Bhd</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="companyAddress">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="companyPhone">-</span>
                                        </div>
                                        <!-- <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Fax:</span>
                                            <span class="invoiceThin" id="companyFax">-</span>
                                        </div> -->
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="companyEmail">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-full default-half m-t-20">
                                    <div class="row">
                                        <!-- <div class="col-xs-12 m-b-10">
                                            <img class="invoiceLogo" src="images/GoTasty.png">
                                        </div> -->
                                        <div class="col-xs-12">
                                            <span class='invoiceCompanyName'>Sale No: </span><span class="invoiceCompanyName" id="purchaseOrderNo">-</span>
                                        </div>
                                        <!-- <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Invoice No:</span>
                                            <span class="invoiceThinLarge" id="invoiceNo">-</span>
                                        </div> -->
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Status:</span>
                                            <span class="invoiceThinLarge" id="trackingStatus">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Transaction Date:</span>
                                            <span class="invoiceThinLarge" id="invoiceDate">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row" style="display: flex; flex-wrap: wrap;">
                                <div class="mobile-full default-half m-t-20">
                                    <div class="row">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceBoldLarge'>Bill To:</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Name:</span>
                                            <span class="invoiceThin" id="billingFullName">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Member ID:</span>
                                            <span class="invoiceThin" id="memberID">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="billingAddress">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="billingPhone">-</span>
                                        </div>
                                        <!-- <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="billingEmail">-</span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="mobile-full default-half m-t-20">
                                    <div class="row" id="deliverySection" style="display: none;">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceBoldLarge'>Ship To:</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Name:</span>
                                            <span class="invoiceThin" id="deliveryFullName">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="deliveryAddress"></span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="deliveryPhone"></span>
                                        </div>
                                        <!-- <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="deliveryEmail"></span>
                                        </div> -->
                                    </div>
                                    <div class="row" id="pickupSection" style="display: none;">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceBoldLarge'>Pick Up:</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="pickupAddress"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 m-t-30">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="invoiceListDiv" class="table-responsive"></div>
                                        <!-- <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-12">
                            <div class="row" style="display: flex;">
                                <div class="col-xs-6 remarksBox">
                                    <div class="row" style="display: flex; flex-wrap: wrap;">
                                        <!-- <div class="col-xs-12">
                                            Special Note: <span id="specialNote" style="font-weight: 600; word-break: break-all;">-</span>
                                        </div> -->
                                        <div class="col-xs-12 m-t-8">
                                            Remarks: <span id="remark" style="font-weight: 600; word-break: break-all;">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row" style="display: flex; flex-wrap: wrap;">
                                        <div class="col-xs-12 text-right">
                                            Subtotal: <span id ="subtotal" class="invoiceTotalAmount"></span>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            Tax (<span id="taxPercentage"></span>%): <span id ="taxCharges" class="invoiceTotalAmount"></span>
                                        </div>
                                        <div class="col-xs-12 text-right" id="insuranceChargesDisplay">   
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            Shipping: <span id ="deliveryFee" class="invoiceTotalAmount"></span>
                                        </div>
                                        <div class="col-xs-12 text-right" id="discountAmountDiv" style="display: none;">
                                            Discount (<span id="discountCode"></span>): <span id ="discountAmount" class="invoiceTotalAmount" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 m-t-20 text-right">
                            <div class="grandTotalBox">
                                Total:
                                <span id="grandTotal" class="invoiceTotalAmount"></span>
                            </div>
                        </div>
                    </div>
                    <img class="invoiceFooterImg" src="images/invoiceFooter.png">
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <a id="print" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00753'][$language]; /* Print */ ?>
                        </a>
                        <a id="issueDO" class="btn btn-primary btn-md waves-effect waves-light m-b-20" style="display: none;">
                            Issue DO
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>

<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var url       = 'scripts/reqDefault.php';
    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};
    var thArray  = Array(
        "Item",
        // "Attribute",
        "Price",
        "Quantity",
        "Total"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();
    var poID        = "<?php echo $_POST['id']?>";
    var poStatus    = "<?php echo $_POST['status']?>";

    $(document).ready(function() {

        // if invoiceId empty return back invoiceList.php 
        if(!poID) {
            var message  = 'Purchase order does not exist.';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'purchaseOrder.php');
            return;
        }

        // poStatus !== 'Completed' ? $('#issueDO').show() : $('#issueDO').hide();

        formData  = {
            command     : "getSaleDetail",
            SaleID   : poID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#print').click(function() {
            window.print();
        });

        $('#issueDO').click(function() {
            $.redirect("issueDO.php", {id: poID});
        });
    });

    function loadDefaultListing(data, message) {
        if (data.invoiceDetail){
            var billingAddress = data.invoiceDetail
            // var subDistrict = billingAddress.subDistrict ? billingAddress.subDistrict + ", " : ""
            // var address = billingAddress.address + ", " + billingAddress.district + ", " + subDistrict + billingAddress.city + ", " + billingAddress.state + ", " + billingAddress.postCode + ", " + billingAddress.country
            var address = billingAddress.address + ", " + billingAddress.city + ", " + billingAddress.state + ", " + billingAddress.postCode + ", " + billingAddress.country
            $("#billingFullName").html(billingAddress.billing_name)
            $("#billingAddress").html(billingAddress.billing_address)
            // $("#billingPhone").html("+"+ billingAddress.dialingArea + " " + billingAddress.phone)
            $("#billingPhone").html("+"+ billingAddress.billing_phone)
            $("#billingEmail").html(billingAddress.email || "-")
        }else{
            $("#billingFullName").html("-")
            $("#billingAddress").html("-")
            $("#billingPhone").html("-")
            $("#billingEmail").html("-")
        }
      
        if(data.clientDetail){
            $("#memberID").html(data.clientDetail.memberID || "-")
        }

        // $("#specialNote").html(data.invoiceDetail.specialNote)
        // $("#remark").html(data.invoiceDetail.remark)

        var DOBtnFlag = data.issueDOAllowed;
        if(DOBtnFlag == 0){
            $('#issueDO').hide();
        }else{
            $('#issueDO').show();
        }

        var insuranceTax = data.invoiceDetail.insuranceTax;
        var insuranceDisplay;

        data.showInsuranceTax == 0 ? insuranceDisplay = " " : insuranceDisplay = ` <span>Insurance Charges:</span> <span class="invoiceTotalAmount">${insuranceTax}</span>`
        $("#insuranceChargesDisplay").html(insuranceDisplay);

        if(data.invoiceDetail.deliveryMethod){
            switch (data.invoiceDetail.deliveryMethod.toLowerCase()) {
                case 'delivery':
                    var deliveryAddress = data.invoiceDetail
                    // var subDistrict = deliveryAddress.subDistrict ? deliveryAddress.subDistrict + ", " : ""
                    // var address = deliveryAddress.address + ", " + deliveryAddress.district + ", " + subDistrict + deliveryAddress.city + ", " + deliveryAddress.state + ", " + deliveryAddress.postCode + ", " + deliveryAddress.country
                    // var address = deliveryAddress.address + ", " + deliveryAddress.city + ", " + deliveryAddress.state + ", " + deliveryAddress.postCode + ", " + deliveryAddress.country
                    $("#deliveryFullName").html(deliveryAddress.shipping_name)
                    $("#deliveryAddress").html(deliveryAddress.shipping_address)
                    $("#deliveryPhone").html("+"+ deliveryAddress.shipping_phone)
                    $("#deliveryEmail").html(deliveryAddress.email || "-")
                    $("#deliverySection").show();
                    $("#pickupSection").hide();
                break;

                case 'pickup':
                    if(data.deliveryAddressDetail){
                        $("#pickupAddress").html(data.deliveryAddressDetail.pickUpAddress)
                        $("#deliverySection").hide();
                        $("#pickupSection").show();
                    }
                    
                break;
            }
        }
        

        $("#companyAddress").html(data.companyAddress)
        $("#companyPhone").html(data.companyContact.contactNo)
        // $("#companyFax").html(data.companyContact.fax)
        $("#companyEmail").html(data.companyContact.email)

        $("#purchaseOrderNo").html(data.invoiceDetail.id)
        $("#invoiceNo").html(data.invoiceDetail.referenceNo)
        $("#trackingStatus").html(data.invoiceDetail.status)
        $("#invoiceDate").html(data.invoiceDetail.orderDate)

        if(data.subtotal){
            $("#subtotal").html(numberThousand(data.subtotal, 2))
        }else{
            $("#subtotal").html(numberThousand(0, 2))
        }

        $("#taxPercentage").html(parseFloat(data.taxPercentage))
        $("#taxCharges").html(numberThousand(data.invoiceDetail.paymentTax, 2))
        $("#deliveryFee").html(numberThousand(data.invoiceDetail.shippingfee, 2))
        $("#grandTotal").html(numberThousand(data.invoiceDetail.paymentAmount, 2))
        if(data.voucherData) {
            $("#discountAmountDiv").show()
            $("#discountCode").html(data.voucherData.voucherCode)
            $("#discountAmount").html(numberThousand(data.voucherData.realDiscountAmount, 2))
        }

        $('#basicwizard').show();
        var tableNo;

        if (data.packageList) {
            var newList = [];
            var packageList = data.packageList

            $.each(packageList, function(k,v) {
                var buildPackageName = `
                    ${v['packageDisplay']}
                `;

                // $.each(v['productList'], function(k2,v2) {
                //     buildPackageName += `
                //         <br>-${v2['productDisplay']} × ${parseInt(v2['stockQuantity'])}
                //     `
                // })

                var rebuildData = {
                    buildPackageName,
                    // totalProductWeight: numberThousand(v['totalProductWeight'], 2),
                    // pvPrice: (v['product_attribute_name']),
                    packagePrice: numberThousand(v['packagePrice'], 2),
                    packageQuantity: parseInt(v['packageQuantity']),
                    totalPackagePrice: numberThousand(v['totalPackagePrice'], 2),

                };
                // ++j;
                newList.push(rebuildData);
            })

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).addClass('invoiceTable');

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('th:eq(1), td:eq(1)').css('text-align', "right");
                $(this).find('th:eq(2), td:eq(2)').css('text-align', "right");
                $(this).find('th:eq(3), td:eq(3)').css('text-align', "right");
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
                $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
            });

            // $('#' + tableId).find('tbody').append(`
            //     <tr style="">
            //         <td colspan='5' class="text-right totalRow">Subtotal:</td>
            //         <td class="totalRow" style="text-align: right;"> ${numberThousand(data.invoiceDetail.subTotal, 2)} </td>
            //     </tr>
            //     <tr style="border-bottom: 1px solid transparent">
            //         <td colspan='5' class="text-right totalRow">Tax:</td>
            //         <td class="totalRow" style="text-align: right;""> ${numberThousand(data.invoiceDetail.taxCharges, 2)} </td>
            //     </tr>
            //     <tr style="border-bottom: 1px solid transparent">
            //         <td colspan='5' class="text-right totalRow">Shipping:</td>
            //         <td class="totalRow" style="text-align: right;"> ${numberThousand(data.invoiceDetail.deliveryFee, 2)} </td>
            //     </tr>
            // `);


        }



    }
</script>
</body>
</html>