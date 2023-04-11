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
                        <a id="invoiceBack" href="getDeliveryOrderListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
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
                                            <span class='invoiceCompanyName'> PT META FIZ INTERNASIONAL</span>
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
                                        <div class="col-xs-12 m-b-10">
                                            <img class="invoiceLogo" src="images/logo.png">
                                        </div>
                                        <div class="col-xs-12">
                                            <span class='invoiceCompanyName'>DO No: </span><span class="invoiceCompanyName" id="deliveryOrderNo">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Delivery Order Date:</span>
                                            <span class="invoiceThinLarge" id="deliveryOrderDate">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <span class="invoiceBoldLarge">Invoice No:</span>
                                            <span class="invoiceThinLarge" id="invoiceNo">-</span>
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
                                <!-- <div class="mobile-full default-half m-t-20">
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
                                </div> -->
                                <div class="mobile-full default-half m-t-20">
                                    <div class="row" id="deliverySection" style="display: none;">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceBoldLarge'>Ship To:</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Member ID:</span>
                                            <span class="invoiceThin" id="memberID">-</span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
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
                                        <div class="col-xs-12 m-t-5">
                                            <label class="invoiceBold">Tracking Number:</label>
                                            <input id="trackingNo" class="invoiceThin form-control trackNo" style="width: auto;display: unset;" type="text"></span>
                                            <br>
                                            <span id="trackingNoError" class="customError text-danger" error="error"></span>
                                            <br>
                                            <button class="btn btn-primary btn-md waves-effect waves-light m-t-rem1 issueBtn">Issue</button>
                                        </div>
                                    </div>
                                    <div class="row" id="pickupSection" style="display: none;">
                                        <div class="col-xs-12 m-b-10">
                                            <span class='invoiceBoldLarge'>Pick Up:</span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Member Name:</span>
                                            <span class="invoiceThin" id="pickupMemberName"></span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Member ID:</span>
                                            <span class="invoiceThin" id="pickupMemberID"></span>
                                        </div>
                                        <div class="col-xs-12">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="pickupAddress"></span>
                                        </div>
                                        <div class="col-xs-12 m-t-5">
                                            <label class="invoiceBold">Tracking Number:</label>
                                            <input id="trackingNo" class="invoiceThin form-control trackNo" style="width: auto;display: unset;" type="text"></span>
                                            <br>
                                            <span id="trackingNoError" class="customError text-danger" error="error"></span>
                                            <br>
                                            <button class="btn btn-primary btn-md waves-effect waves-light m-t-rem1 issueBtn">Update</button>
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
                        <div class="col-xl-12" style="margin-top: 100px;">
                            <div class="row" style="display: flex; justify-content: flex-end;">
                                <div class="col" style="width: 100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <b>Receiver</b>
                                        </div>
                                        <div class="col-sm-12 signField"></div>
                                        <div class="col-sm-12">
                                            <b>Date: </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="width: 20px;"></div>
                                <div class="col" style="width: 100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <b>Driver</b>
                                        </div>
                                        <div class="col-sm-12 signField"></div>
                                        <div class="col-sm-12">
                                            <b>Date: </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="width: 20px;"></div>
                                <div class="col" style="width: 100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <b>Warehouse</b>
                                        </div>
                                        <div class="col-sm-12 signField"></div>
                                        <div class="col-sm-12">
                                            <b>Date: </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="width: 20px;"></div>
                                <div class="col" style="width: 100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <b>Admin</b>
                                        </div>
                                        <div class="col-sm-12 signField"></div>
                                        <div class="col-sm-12">
                                            <b>Date: </b>
                                        </div>
                                    </div>
                                </div>
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
        "Package Name",
        "Package Code",
        "Item",
        "SKU No",
        "Quantity"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();
    var doID      = "<?php echo $_POST['id']?>";
    var editFlag = '<?php echo $_SESSION['invEditable']; ?>';

    $(document).ready(function() {
        // if(editFlag == 0){
        //     $('.trackNo').prop('disabled',true);
        // }else{
        //     $('.trackNo').prop('disabled',false);
        // }
        // if invoiceId empty return back invoiceList.php 
        if(!doID) {
            var message  = 'Purchase order does not exist.';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'purchaseOrder.php');
            return;
        }
        formData  = {
            command     : "getDeliveryOrderDetail",
            deliveryOrderID   : doID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#print').click(function() {
            $('.issueBtn').hide();
            window.print();
            $('.issueBtn').show();
        });

        $('.issueBtn').click(function(){
            var trackingNo = $('#trackingNo').val();

            var formData = {
                command             : "updateDeliveryOrder",
                deliveryOrderID     : doID,
                trackingNo          : trackingNo
            };
            fCallback = loadUpdate;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadUpdate(data, message) {
        showMessage(message, 'success', 'Congratulations', 'edit', 'getDeliveryOrderListing.php');
    }

    function loadDefaultListing(data, message) {
        // console.log(data)

        $("#companyAddress").html(data.companyAddress)
        $("#companyPhone").html(data.companyContact.contactNo)
        // $("#companyFax").html(data.companyContact.fax)
        $("#companyEmail").html(data.companyContact.email)

        $("#billingFullName").html(data.fullname)
        $("#memberID").html(data.memberID || "-")
        $(".trackingNumber").html(data.trackingNumber)

        $("#deliveryOrderNo").html(data.deliveryOrderNo)
        $("#deliveryOrderDate").html(data.deliveryOrderDate)
        $("#invoiceNo").html(data.invoiceNo)
        $("#invoiceDate").html(data.invoiceDate)

        switch (data.deliveryOption) {
            case 'delivery':
                var deliveryAddress = data.deliveryAddress
                var subDistrict = deliveryAddress.subDistrictDisplay ? deliveryAddress.subDistrictDisplay + ", " : ""
                var address = deliveryAddress.address + ", " + deliveryAddress.districtDisplay + ", " + subDistrict + deliveryAddress.cityDisplay + ", " + deliveryAddress.stateDisplay + ", " + deliveryAddress.postCodeDisplay + ", " + deliveryAddress.countryDisplay
                $("#deliveryFullName").html(deliveryAddress.name)
                $("#deliveryAddress").html(address)
                $("#deliveryPhone").html("+"+ deliveryAddress.dialCode + " " + deliveryAddress.phone)
                $("#deliveryEmail").html(deliveryAddress.email || "-")
                $("#deliverySection").show();
                $("#pickupSection").remove();
            break;

            case 'pickup':
                // $("#pickupAddress").html(data.deliveryAddress.pickUpAddress)
                $("#pickupMemberName").html(data.fullname?data.fullname:"-")
                $("#pickupMemberID").html(data.memberID?data.memberID:"-")
                $("#pickupAddress").html(data.pickUpAddress)
                $("#deliverySection").remove();
                $("#pickupSection").show();
            break;
        }        

        // if(data.trackingNumber != "-"){
            $("#trackingNo").val(data.trackingNumber);
        //     $("#trackingNo").prop("disabled",true);
        //     $(".issueBtn").hide();
        // }
        // else{
        //     $("#trackingNo").val("")
        // }

        $('#basicwizard').show();
        var tableNo;

        if (data.deliveryOrderList) {
            var newList = [];
            var deliveryOrderList = data.deliveryOrderList;

            $.each(deliveryOrderList, function(k,v) {
                $.each(v, function(k1, v1) {
                    var buildStockCode = ``;
                    var buildStockQty = ``;

                    $.each(v1['stockList'], function(k2,v2) {
                        if(k2==0) {
                            buildStockCode += `
                                ${v2['stockCode']}
                            `;
                            buildStockQty += `
                                ${v2['quantity']}
                            `;
                        } else {
                            buildStockCode += `
                                <br>${v2['stockCode']}
                            `;
                            buildStockQty += `
                                <br>${numberThousand(v2['quantity'], 0)}
                            `;
                        }
                    })

                    var rebuildData = {
                        packageName: v1['packageName'],
                        packageCode: v1['packageCode'],
                        product: v1['product'],
                        buildStockCode,
                        buildStockQty
                    };
                    // ++j;
                    newList.push(rebuildData);
                });
            });

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#' + tableId).addClass('invoiceTable');

            $('#' + tableId).find('thead tr, tbody tr').each(function () {
                $(this).find('th:eq(1), td:eq(1)').css('text-align', "center");
                $(this).find('th:eq(2), td:eq(2)').css('text-align', "center");
                $(this).find('th:eq(3), td:eq(3)').css('text-align', "center");
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "center");
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