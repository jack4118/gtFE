<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php //include 'header.php'; ?>
<meta name="viewport" content="width=1024">

<link href="css/invoice.css" rel="stylesheet" type="text/css" />

<section class="pageContent loginPagePadding">
	<!-- <div class="pageTitle">
		<span><?php echo $translations['M02974'][$language] /*Invoice*/ ?></span>
	</div> -->

    <div id="invoiceContent" class="invoiceOuterWrapper whiteBg my-3">
        <div class="invoiceWrapper">
            <div class="col-12">
                <div class="row mobileReverse">
                    <div class="mobile-full default-half">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <span class='invoiceCompanyName'>PT META FIZ INTERNASIONAL</span>
                            </div>
                            <div class="col-12">
                                <span class="invoiceBold"><?php echo $translations['M03258'][$language] /*Address*/ ?>:</span>
                                <span class="invoiceThin companyAddress" id="companyAddress">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M03227'][$language] /*Phone*/ ?>:</span>
                                <span class="invoiceThin companyPhone" id="companyPhone">-</span>
                            </div>
                            <!-- <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M03436'][$language] /*Fax*/ ?>:</span>
                                <span class="invoiceThin companyFax" id="companyFax">-</span>
                            </div> -->
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M02655'][$language] /*Email*/ ?>:</span>
                                <span class="invoiceThin companyEmail" id="companyEmail">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-full default-half">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <img class="invoiceLogo" src="images/project/companyLogoText.png">
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBoldLarge"><?php echo $translations['M00532'][$language] /*Invoice No*/ ?>:</span>
                                <span class="invoiceThinLarge invoiceNo" id="invoiceNo">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBoldLarge"><?php echo $translations['M02995'][$language] /*Tracking No*/ ?>:</span>
                                <span class="invoiceThinLarge trackingNo" id="trackingNo">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBoldLarge"><?php echo $translations['M00525'][$language] /*Transaction Date*/ ?>:</span>
                                <span class="invoiceThinLarge invoiceDate" id="invoiceDate">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="mobile-full default-half mt-5">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <span class='invoiceBoldLarge'><?php echo $translations['M03437'][$language] /*Bill To*/ ?>:</span>
                            </div>
                            <div class="col-12">
                                <span class="invoiceBold"><?php echo $translations['M00377'][$language] /*Name */ ?>:</span>
                                <span class="invoiceThin" id="billingFullName">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M00548'][$language] /*Member ID */ ?>:</span>
                                <span class="invoiceThin" id="memberID">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M02466'][$language] /*Address */ ?>:</span>
                                <span class="invoiceThin" id="billingAddress">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M03227'][$language] /*Phone */ ?>:</span>
                                <span class="invoiceThin" id="billingPhone">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M02655'][$language] /*Email */ ?>:</span>
                                <span class="invoiceThin" id="billingEmail">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-full default-half mt-5">
                        <div class="row" id="deliverySection" style="display: none;">
                            <div class="col-12 mb-3">
                                <span class='invoiceBoldLarge'><?php echo $translations['M03438'][$language] /*Ship To */ ?>:</span>
                            </div>
                            <div class="col-12">
                                <span class="invoiceBold"><?php echo $translations['M00377'][$language] /*Name */ ?>:</span>
                                <span class="invoiceThin" id="deliveryFullName">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M02466'][$language] /*Address */ ?>:</span>
                                <span class="invoiceThin" id="deliveryAddress"></span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M03227'][$language] /*Phone */ ?>:</span>
                                <span class="invoiceThin" id="deliveryPhone"></span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="invoiceBold"><?php echo $translations['M02655'][$language] /*Email */ ?>:</span>
                                <span class="invoiceThin" id="deliveryEmail"></span>
                            </div>
                        </div>
                        <div class="row" id="pickupSection" style="display: none;">
                            <div class="col-12 mb-3">
                                <span class='invoiceBoldLarge'><?php echo $translations['M03255'][$language] /*Pickup */ ?>:</span>
                            </div>
                            <div class="col-12">
                                <span class="invoiceBold"><?php echo $translations['M02466'][$language] /*Address */ ?>:</span>
                                <span class="invoiceThin" id="pickupAddress"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <form>
                    <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                        <div class="tab-content b-0 m-b-0 p-t-0">
                            <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                            <div id="invoiceDiv" class="table-responsive"></div>
                            <!-- <span id="paginateText"></span>
                            <div class="text-center">
                                <ul class="pagination pagination-md" id="pagerList"></ul>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="default-half mobile-full remarksBox">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $translations['M03459'][$language] /*Special Note */ ?>: <span id="specialNote" style="font-weight: 600; word-break: break-all;">-</span>
                            </div>
                            <div class="col-12 mt-2">
                                <?php echo $translations['M03160'][$language] /*Remarks */ ?>: <span id="remark" style="font-weight: 600; word-break: break-all;">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="default-half mobile-full">
                        <div class="row">
                            <div class="col-12 text-right">
                                <?php echo $translations['M03264'][$language] /*Subtotal */ ?>: <span id ="subtotal" class="invoiceTotalAmount"></span>
                            </div>
                            <div class="col-12 text-right">
                                <?php echo $translations['M02823'][$language] /*Tax */ ?> (<span id="taxPercentage"></span>%): <span id ="taxCharges" class="invoiceTotalAmount"></span>
                            </div>
                            <div class="col-12 text-right">
                                <?php echo $translations['M03388'][$language] /*Shipping */ ?>: <span id ="deliveryFee" class="invoiceTotalAmount"></span>
                            </div>
                            <div class="col-12 text-right" id="discountAmountDiv" style="display: none;">
                                <?php echo $translations['M03527'][$language] /*Discount */ ?> (<span id="discountCode"></span>): <span id ="discountAmount" class="invoiceTotalAmount" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5 text-right">
                <div class="grandTotalBox">
                    <?php echo $translations['M03267'][$language] /*Total */ ?>:
                    <span id="grandTotal" class="invoiceTotalAmount"></span>
                </div>
            </div>
        </div>
        <img class="invoiceFooterImg" src="images/project/invoiceFooter.png">
    </div>

    <div class="col-12 px-0 my-4">
        <!-- <button type="button" onclick="window.location.href='orderListing.php'" class="btn btn-default waves-effect waves-light"><?php echo $translations['M00218'][$language]; /* Back */ ?></button> -->
        <button id="download" type="button" class="btn btn-primary waves-effect waves-light" style="background: #27a9e0;">
            <?php echo $translations['M03434'][$language]; /* Download Invoice */ ?>
        </button>
    </div>

</section>


<?php include 'footer.php'; ?>
</body>



<!-- Print Content  -->


<div id="printContent" class="invoiceOuterWrapper whiteBg">
    <div class="invoiceWrapper">
        <div class="col-12">
            <div class="row mobileReverse">
                <div class="mobile-full default-half">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span class='invoiceCompanyName'>PT META FIZ INTERNASIONAL</span>
                        </div>
                        <div class="col-12">
                            <span class="invoiceBold"><?php echo $translations['M03258'][$language] /*Address*/ ?>:</span>
                            <span class="invoiceThin companyAddress">-</span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="invoiceBold"><?php echo $translations['M03227'][$language] /*Phone*/ ?>:</span>
                            <span class="invoiceThin companyPhone">-</span>
                        </div>
                        <!-- <div class="col-12 mt-2">
                            <span class="invoiceBold"><?php echo $translations['M03436'][$language] /*Fax*/ ?>:</span>
                            <span class="invoiceThin companyFax">-</span>
                        </div> -->
                        <div class="col-12 mt-2">
                            <span class="invoiceBold"><?php echo $translations['M02655'][$language] /*Email*/ ?>:</span>
                            <span class="invoiceThin companyEmail">-</span>
                        </div>
                    </div>
                </div>
                <div class="mobile-full default-half">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <img class="invoiceLogo" src="images/project/companyLogoText.png">
                        </div>
                        <div class="col-12 mt-2">
                            <span class="invoiceBoldLarge"><?php echo $translations['M00532'][$language] /*Invoice No*/ ?>:</span>
                            <span class="invoiceThinLarge invoiceNo">-</span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="invoiceBoldLarge"><?php echo $translations['M00532'][$language] /*Invoice No*/ ?>:</span>
                            <span class="invoiceThinLarge trackingNo">-</span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="invoiceBoldLarge"><?php echo $translations['M00525'][$language] /*Transaction Date*/ ?>:</span>
                            <span class="invoiceThinLarge invoiceDate">-</span>
                        </div>
                    </div>
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

var invoiceID = '<?php echo $_POST['invoiceID']  ?>'



var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};

var thArrayInvoice  = Array (
    "<?php echo $translations['M02919'][$language]; /* Item */ ?>",
    "<?php echo $translations['M03441'][$language]; /* Total Weight */ ?> (kg)",
    "<?php echo $translations['M03129'][$language]; /* Price */ ?>",
    "<?php echo $translations['M03130'][$language]; /* PV */ ?>",
    "<?php echo $translations['M02246'][$language]; /* Quantity */ ?>",
    "<?php echo $translations['M03133'][$language]; /* Total */ ?>"
);



$(document).ready(function() {


    formData  = {
        command     : "getInvoiceDetail",
        invOrderID   : invoiceID
    };
    fCallback = loadInvoiceDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});

	
});


function loadInvoiceDetails(data, message) {

    var billingAddress = data.billingAddressDetail
    var subDistrict = billingAddress.subDistrict ? billingAddress.subDistrict + ", " : ""
    var address = billingAddress.address + ", " + billingAddress.district + ", " + subDistrict + billingAddress.city + ", " + billingAddress.state + ", " + billingAddress.postCode + ", " + billingAddress.country
    $("#billingFullName").html(billingAddress.fullname)
    $("#billingAddress").html(address)
    $("#billingPhone").html("+"+ billingAddress.dialingArea + " " + billingAddress.phone)
    $("#billingEmail").html(billingAddress.email || "-")
    $("#memberID").html(data.clientDetail.memberID || "-")


    $("#specialNote").html(data.invoiceDetail.specialNote)
    $("#remark").html(data.invoiceDetail.remark)



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
    // $("#companyFax").html(data.companyContact.fax)
    $("#companyEmail").html(data.companyContact.email)

    $("#invoiceNo").html(data.invoiceDetail.referenceNo)
    $("#trackingNo").html(data.invoiceDetail.trackingNo)
    $("#invoiceDate").html(data.invoiceDetail.createdAt)


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

    var tableNo;

    if (data.packageList) {
        var newList = [];
        var packageList = data.packageList

        $.each(packageList, function(k,v) {
            var buildPackageName = `
                ${v['packageDisplay']}
            `;

            $.each(v['productList'], function(k2,v2) {
                buildPackageName += `
                    <br>-${v2['productDisplay']} × ${parseInt(v2['stockQuantity'])}
                `
            })

            var rebuildData = {
                buildPackageName,
                totalProductWeight: numberThousand(v['totalProductWeight'], 2),
                packagePrice: numberThousand(v['packagePrice'], 2),
                pvPrice: numberThousand(v['pvPrice'], 2),
                packageQuantity: parseInt(v['packageQuantity']),
                totalPackagePrice: numberThousand(v['totalPackagePrice'], 2),

            };
            // ++j;
            newList.push(rebuildData);
        })

        buildTable(newList, invoiceTableId, invoiceDivId, thArrayInvoice, btnArrayInvoice, message, tableNo);
        pagination(invoicePagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + invoiceTableId).addClass('invoiceTable');

        $('#' + invoiceTableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(1), td:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2), td:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3), td:eq(3)').css('text-align', "right");
            $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
            $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
        });



    }


}


$(document).on("click", "#download", function() {
    var invoiceContent = $("#invoiceContent").html()
    $("#printContent").html(invoiceContent)
    window.print()
})


</script>
