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
                                <div class="mobile-full default-half">
                                    <div class="row">
                                        <div class="col-xs-12 m-b-10">
                                            <img class="invoiceLogo" src="images/logo.png">
                                        </div>
                                        <div class="col-xs-12">
                                            <span class='invoiceCompanyName'>PO No: </span><span class="invoiceCompanyName" id="purchaseOrderNo">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Invoice No:</span>
                                            <span class="invoiceThinLarge" id="invoiceNo">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Transaction Date:</span>
                                            <span class="invoiceThinLarge" id="invoiceDate">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Delivery Option:</span>
                                            <span class="invoiceThinLarge text-capitalize" id="deliveryOption">-</span>
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
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="billingEmail">-</span>
                                        </div>
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
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="deliveryEmail"></span>
                                        </div>
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
                                        <div class="col-xs-12">
                                            Special Note: <span id="specialNote" style="font-weight: 600; word-break: break-all;">-</span>
                                        </div>
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
                        <a id="issueBtn" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Issue
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

    var checkboxAll = "<input id='selectAll' name='checkbox' type='checkbox'>";

    var thArray  = Array(
        checkboxAll,
        "Enter Qty",
        "Qty Balance",
        "Package",
        "Item",
        "Total Weight (kg)",
        "Price",
        "PV",
        "Quantity",
        "Total"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();
    var poID      = "<?php echo $_POST['id']?>";

    $(document).ready(function() {

        // if invoiceId empty return back invoiceList.php 
        if(!poID) {
            var message  = 'Purchase order does not exist.';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'purchaseOrder.php');
            return;
        }

        formData  = {
            command     : "getIssueDOPage",
            invOrderID   : poID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#print').click(function() {
            window.print();
        });

    });

    function loadDefaultListing(data, message) {

        // console.log(data)

        var billingAddress = data.billingAddressDetail
        var subDistrict = billingAddress.subDistrict ? billingAddress.subDistrict + ", " : ""
        var address = billingAddress.address + ", " + billingAddress.district + ", " + subDistrict + billingAddress.city + ", " + billingAddress.state + ", " + billingAddress.postCode + ", " + billingAddress.country
        $("#billingFullName").html(billingAddress.fullname || "-")
        $("#billingAddress").html(address)
        $("#billingPhone").html("+"+ billingAddress.dialingArea + " " + billingAddress.phone)
        $("#billingEmail").html(billingAddress.email || "-")
        $("#memberID").html(data.clientDetail.memberID || "-")

        $("#specialNote").html(data.invoiceDetail.specialNote)
        $("#remark").html(data.invoiceDetail.remark)

        var insuranceTax = data.invoiceDetail.insuranceTax;
        var insuranceDisplay;

        data.showInsuranceTax == 0 ? insuranceDisplay = " " : insuranceDisplay = ` <span>Insurance Charges:</span> <span class="invoiceTotalAmount">${insuranceTax}</span>`
        $("#insuranceChargesDisplay").html(insuranceDisplay);

        switch (data.invoiceDetail.deliveryOption) {
            case 'delivery':
                var deliveryAddress = data.deliveryAddressDetail
                var subDistrict = deliveryAddress.subDistrict ? deliveryAddress.subDistrict + ", " : ""
                var address = deliveryAddress.address + ", " + deliveryAddress.district + ", " + subDistrict + deliveryAddress.city + ", " + deliveryAddress.state + ", " + deliveryAddress.postCode + ", " + deliveryAddress.country
                $("#deliveryFullName").html(deliveryAddress.fullname)
                $("#deliveryAddress").html(address)
                $("#deliveryPhone").html("+"+ deliveryAddress.dialingArea + " " + deliveryAddress.phone)
                $("#deliveryEmail").html(deliveryAddress.email || "-")
                $("#deliverySection").show();
                $("#pickupSection").hide();
            break;

            case 'pickup':
                $("#pickupAddress").html(data.deliveryAddressDetail.pickUpAddress)
                $("#deliverySection").hide();
                $("#pickupSection").show();
            break;
        }

        $("#companyAddress").html(data.companyAddress)
        $("#companyPhone").html(data.companyContact.contactNo)
        $("#companyFax").html(data.companyContact.fax)
        $("#companyEmail").html(data.companyContact.email)

        $("#purchaseOrderNo").html(data.invoiceDetail.purchaseOrderNo)
        $("#invoiceNo").html(data.invoiceDetail.referenceNo)
        $("#invoiceDate").html(data.invoiceDetail.createdAt)
        $("#deliveryOption").html(data.invoiceDetail.deliveryOption)

        $("#subtotal").html(numberThousand(data.invoiceDetail.subTotal, 2))
        $("#taxPercentage").html(parseFloat(data.taxPercentage))
        $("#taxCharges").html(numberThousand(data.invoiceDetail.taxCharges, 2))
        $("#deliveryFee").html(numberThousand(data.invoiceDetail.deliveryFee, 2))
        $("#grandTotal").html(numberThousand(data.invoiceDetail.paidAmount, 2))
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


                $.each(v['productList'], function(k2,v2) {

                    var buildPackageName;
                    var totalProductWeight;
                    var packagePrice;
                    var pvPrice;
                    var packageQuantity;
                    var totalPackagePrice;

                    var checkbox;
                    var quantityInput;
                    var remainingQty;

                    if (k2 == 0) {
                        buildPackageName = v['packageDisplay']
                        totalProductWeight = numberThousand(v['totalProductWeight'], 2)
                        packagePrice = numberThousand(v['packagePrice'], 2)
                        pvPrice = numberThousand(v['pvPrice'], 2)
                        packageQuantity = parseInt(v['packageQuantity'])
                        totalPackagePrice = numberThousand(v['totalPackagePrice'], 2)
                    } else {
                        buildPackageName = ""
                        totalProductWeight = ""
                        packagePrice = "" 
                        pvPrice = ""
                        packageQuantity = ""
                        totalPackagePrice = ""
                    }

                    if (v2['quantityLeft'] > 0) {

                        checkbox = `
                            <input name='checkbox' type='checkbox' packageID='${v['package']}' productID='${v2['productID']}'>
                        `;

                        quantityInput = `
                            <input type='text' class="productQty"><br>
                            <span id="quantity${v['package']}_${v2['productID']}Error" class="errorSpan text-danger"></span>
                        `
                    } else {

                        checkbox = `-`;

                        quantityInput = `
                            -<br>
                            <span id="quantity${v['package']}_${v2['productID']}Error" class="errorSpan text-danger"></span>
                        `

                    }                    

                    remainingQty = parseFloat(v2['quantityLeft'])

                    var rebuildData = {
                        checkbox,
                        quantityInput,
                        remainingQty,
                        buildPackageName,
                        productDisplay: v2['productDisplay'],
                        totalProductWeight,
                        packagePrice,
                        pvPrice,
                        packageQuantity,
                        totalPackagePrice

                    };
                    newList.push(rebuildData);
                })                
            })

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).addClass('invoiceTable');

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
                $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
                $(this).find('th:eq(6), td:eq(6)').css('text-align', "right");
                $(this).find('th:eq(7), td:eq(7)').css('text-align', "right");
                $(this).find('th:eq(8), td:eq(8)').css('text-align', "right");
                $(this).find('th:eq(9), td:eq(9)').css('text-align', "right");
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


    $(document).on('click', '#selectAll', function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    })


    $(document).on('click', '#issueBtn', function() {
        var checkedIDs = [];
        var productAry = [];
        var checkedDetails = [];
        $('.errorSpan').empty();
        $('#' + tableId).find('[type=checkbox]:checked').each(function () {
            if($(this).attr('id') != 'selectAll') {
                var packageID = $(this).attr('packageID')
                var productID = $(this).attr('productID')
                var quantity  = $(this).closest('tr').find('.productQty').val()
                // console.log(quantity)
                var single = {
                    packageID,
                    productID,
                    quantity
                }
                productAry.push(single);
            }
        });
        if (productAry.length === 0)
            showMessage('Please select product to be issued.', 'warning', 'Issue DO', 'edit', '');
        
        else if(productAry.length >= 500){
            showMessage('Cannot select records more than 500', 'warning', 'Update Status', 'edit', '');
        } else {
            var formData = {
                command: 'issueDO',
                invOrderID: poID,
                productAry
            };

            // console.log(formData)
            fCallback = issueCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    })


    function issueCallback(data, message) {
        showMessage('Successfully Issued DO.', 'success', 'Delivery Order', 'edit', 'getDeliveryOrderListing.php');
    }

</script>
</body>
</html>