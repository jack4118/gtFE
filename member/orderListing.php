<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
	<div class="">
		<div class="pageTitle">
			<span><?php echo $translations['M03316'][$language] /*Order Listing*/ ?></span>
		</div>
	    <div class="mt-4">
	    	<form id="searchDIV" class="filter">
		        <div class="row align-items-end">
		        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
		        	    <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
		        	    <div class="input-daterange input-group" id="datepicker-range">
		        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="date" autocomplete="off">
		        	    	<span class="input-group-text"><i class="fas fa-arrow-right"></i></span>
		        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="date">
		        	    </div>
		        	</div>

		        	<div class="col-lg-4 col-md-6 col-12 form-group">
		        	    <label><?php echo $translations['M00532'][$language]; //Invoice No ?></label>
                        <input type="text" class="form-control" dataName="invoiceNo" dataType="text">
                    </div>
		        	<div class="col-lg-4 col-md-6 col-12 form-group">
                        <label>
                            <?php echo $translations['M02103'][$language] /*Status*/ ?>
                        </label>
		        	    <select id="status" class="form-control" dataName="status" dataType="select">
                            <option value="">
                                <?php echo $translations['M00055'][$language]; /* All */ ?>
                            </option>
                            <option value="Paid">
                            	Paid
                            </option>
                            <option value="Partial">
                            	Partial
                            </option>
                            <option value="Completed">
                            	<?php echo $translations['M02876'][$language]; /* Completed */ ?>
                            </option>
                        </select>
		        	</div>
		        	
		        	<div class="col-lg-4 col-md-6 col-12 form-group">
			        	<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M03383'][$language] /*Apply*/ ?></button>
	    				<i class="fas fa-sync-alt ml-3 resetBtnStyle" id="resetBtn"></i>
	    			</div>
		        </div>
	    	</form>
	    </div>

        <div class="whiteBg">
            <form>
                <div id="basicwizard" class="pull-in col-12 px-0">
                    <div class="tab-content b-0 m-b-0 p-t-0">
                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                        <div id="portfolioDiv" class="table-responsive"></div>
                        <span id="paginateText"></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="pagerList"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</section>


<?php include 'footer.php'; ?>
</body>

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #f5f5f5;">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <div id="invoiceContent" class="invoiceOuterWrapper whiteBg mt-3">
                    <div class="invoiceWrapper">
                        <div class="col-12">
                            <div class="row mobileReverse">
                                <div class="mobile-full default-half">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <span class='invoiceCompanyName'>PT META FIZ INTERNASIONAL</span>
                                        </div>
                                        <div class="col-12">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="companyAddress">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="companyPhone">-</span>
                                        </div>
                                        <!-- <div class="col-12 mt-2">
                                            <span class="invoiceBold">Fax:</span>
                                            <span class="invoiceThin" id="companyFax">-</span>
                                        </div> -->
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="companyEmail">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-full default-half">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <img class="invoiceLogo" src="images/project/companyLogoText.png">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBoldLarge">Invoice No:</span>
                                            <span class="invoiceThinLarge" id="invoiceNo">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBoldLarge">Transaction Date:</span>
                                            <span class="invoiceThinLarge" id="invoiceDate">-</span>
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
                                            <span class='invoiceBoldLarge'>Bill To:</span>
                                        </div>
                                        <div class="col-12">
                                            <span class="invoiceBold">Name:</span>
                                            <span class="invoiceThin" id="billingFullName">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Member ID:</span>
                                            <span class="invoiceThin" id="memberID">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="billingAddress">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="billingPhone">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="billingEmail">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-full default-half mt-5">
                                    <div class="row" id="deliverySection" style="display: none;">
                                        <div class="col-12 mb-3">
                                            <span class='invoiceBoldLarge'>Ship To:</span>
                                        </div>
                                        <div class="col-12">
                                            <span class="invoiceBold">Name:</span>
                                            <span class="invoiceThin" id="deliveryFullName">-</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Address:</span>
                                            <span class="invoiceThin" id="deliveryAddress"></span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Phone:</span>
                                            <span class="invoiceThin" id="deliveryPhone"></span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <span class="invoiceBold">Email:</span>
                                            <span class="invoiceThin" id="deliveryEmail"></span>
                                        </div>
                                    </div>
                                    <div class="row" id="pickupSection" style="display: none;">
                                        <div class="col-12 mb-3">
                                            <span class='invoiceBoldLarge'>Pick Up:</span>
                                        </div>
                                        <div class="col-12">
                                            <span class="invoiceBold">Address:</span>
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
                                <div class="col-6 remarksBox">
                                    <div class="row">
                                        <div class="col-12">
                                            Special Note: <span id="specialNote" style="font-weight: 600; word-break: break-all;">-</span>
                                        </div>
                                        <div class="col-12 mt-3">
                                            Remarks: <span id="remark" style="font-weight: 600; word-break: break-all;">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            Subtotal: <span id ="subtotal" class="invoiceTotalAmount"></span>
                                        </div>
                                        <div class="col-12 text-right">
                                            Tax (<span id="taxPercentage"></span>%): <span id ="taxCharges" class="invoiceTotalAmount"></span>
                                        </div>
                                        <div class="col-12 text-right">
                                            Shipping: <span id ="deliveryFee" class="invoiceTotalAmount"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5 text-right">
                            <div class="grandTotalBox">
                                Total:
                                <span id="grandTotal" class="invoiceTotalAmount"></span>
                            </div>
                        </div>
                    </div>
                    <img class="invoiceFooterImg" src="images/project/invoiceFooter.png">
                </div>
            </div>
            <div class="modal-footer pb-4" style="background: inherit;">
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal"><?php echo $translations['M00278'][$language]; /* Cancel */ ?></button>
                    <button id="download" type="button" class="btn btn-primary waves-effect waves-light" style="background: #27a9e0">
                        <?php echo $translations['M03434'][$language]; /* Download Invoice */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Print Content  -->

<!-- <div id="printContent" class="invoiceOuterWrapper whiteBg"> -->
</div>


<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<?php include 'printStyling.php' ?>


<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array (
'<?php echo $translations['M03039'][$language]; //Date ?>',
'<?php echo $translations['M00532'][$language]; //Invoice No ?>',
'<?php echo $translations['M03428'][$language]; //Order Amount ?>',
'<?php echo $translations['M03132'][$language]; //Total PV ?>',
'<?php echo $translations['M02885'][$language]; //Payment Method ?>',
'<?php echo $translations['M02952'][$language]; //Delivery Method ?>',
'<?php echo $translations['M02103'][$language]; //Status ?>',
'<?php echo $translations['M03606'][$language]; //Tracking Status ?>',
''
);


var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};

var thArrayInvoice  = Array (
    "Item",
    "Total Weight (kg)",
    "Price",
    "PV",
    "Quantity",
    "Total"
);



$(document).ready(function() {

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});

	pagingCallBack(pageNumber, loadSearch);

	$('#dateRangeStart').daterangepicker({    
        autoApply: true,
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
        $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
        $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
    });

    $('#dateRangeEnd').click(function() {
        $('#dateRangeStart').trigger('click');
    });

	$("#resetBtn").click(function(){
		$("#searchDIV").find("input").each(function(){
			$(this).val('');
		});
		$('#dateRangeStart').data('daterangepicker').remove();
		$('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });
		$('#searchDIV').find('select').each(function() {
			$(this).val('');
			$("#searchDIV")[0].reset();
		});
	});
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
});



function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getMemberOrderListing",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
	loadDefaultListing(data, message);
	$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00159'][$language]; //Search Successful ?></span>').show();
	setTimeout(function() {
			$('#searchMsg').removeClass('noData').html('').hide();
	}, 3000);
}


function loadDefaultListing(data, message) {
	var list = data.invoiceList;
	var tableNo;
	var htmlContent = "";

	if(list){
		var newList = [];
		$.each(list, function(k, v) {
            var viewBtn;
			var statusHtml = ``;
			var color = "";
			switch(v['status']){
            	case "Completed":
            		color = "#8cbe44";
            		break;
            	case "Pending":
            		color = "red";
            		break;
            	default:
            }
			statusHtml = `<span style="color:${color}">${v['statusDisplay']}</span>`

            if(v['statusDisplay'] == 'Pending for Payment' || v['statusDisplay'] == 'Credited to wallet'){
                 viewBtn = '-';
            }else{
                viewBtn = `
                    <a href="javascript:;" style="color:#27a9e0;" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" onclick="viewInvoice('${v['id']}')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </a> 
                `;
               
            }
			
			var rebuildData = {
				created_at 		: v['created_at'],
				invoiceNumber 	: v['invoiceNumber'],
				orderAmount 	: numberThousand(v['orderAmount'],2),
				totalPV 		: numberThousand(v['totalPV'],2),
				paymentMethod 	: v['paymentMethod'],
				deliveryOption 	: v['deliveryOption'],
				statusDisplay 	: statusHtml,
                trackingStatus  : v['trackingStatus'],
				viewBtn 		: viewBtn
			};
			newList.push(rebuildData);

		});
	}

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    // START DataTables
    $('#'+tableId+' th:nth-child(1)').before('<th></th>');
    $('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');
    $('#'+tableId).find('tbody tr').each(function(){
        $(this).find('td:eq(6)').css('text-transform', "capitalize");
    });


    $('#'+tableId).DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "language": {
            "zeroRecords": "", 
            "emptyTable": ""
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        buttons: [
        'colvis'
    ],
        columnDefs: [
            { className: 'control', orderable: false, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
            { responsivePriority: 4, targets: 4 },
            { responsivePriority: 5, targets: 5 },
            { responsivePriority: 6, targets: 6 },
            { responsivePriority: 7, targets: 7 },
            { responsivePriority: 8, targets: 8 },
        ]
    });
}

function viewInvoice(invoiceID) {

    $.redirect('viewInvoice', {
        invoiceID
    })

}


function loadInvoiceDetails(data, message) {

    var billingAddress = data.billingAddressDetail
    var subDistrict = billingAddress.subDistrict ? billingAddress.subDistrict + ", " : ""
    var address = billingAddress.address + ", " + billingAddress.streetName + ", " + subDistrict + billingAddress.city + ", " + billingAddress.state + ", " + billingAddress.postCode + ", " + billingAddress.country
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
            var address = deliveryAddress.address + ", " + deliveryAddress.streetName + ", " + subDistrict + deliveryAddress.city + ", " + deliveryAddress.state + ", " + deliveryAddress.postCode + ", " + deliveryAddress.country
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
    $("#invoiceDate").html(data.invoiceDetail.createdAt)


    $("#subtotal").html(numberThousand(data.invoiceDetail.subTotal, 2))
    $("#taxPercentage").html(parseFloat(data.taxPercentage))
    $("#taxCharges").html(numberThousand(data.invoiceDetail.taxCharges, 2))
    $("#deliveryFee").html(numberThousand(data.invoiceDetail.deliveryFee, 2))
    $("#grandTotal").html(numberThousand(data.invoiceDetail.paidAmount, 2))

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

        $('#' + tableId).addClass('invoiceTable');

        $('#' + tableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(1), td:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2), td:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3), td:eq(3)').css('text-align', "right");
            $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
            $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
        });



    }

    $("#viewModal").modal()



}

function openViewTable(data, message) {
    $("#releaseError").html("");
    var tableNo;
    var headerArr = Array(
        '<?php echo $translations["M02967"][$language] //Item ?>',
        '<?php echo $translations["M03441"][$language] //Total Weight ?> (<?php echo $translations["M03093"][$language] //kg ?>)',
        '<?php echo $translations["M03129"][$language] //Price ?>',
        '<?php echo $translations["M03130"][$language] //PV ?>',
        '<?php echo $translations["M02246"][$language] //Quantity ?>',
        '<?php echo $translations["M03267"][$language] //Total ?>'
    )
    // if(data.invoiceList){
    //     var newList = [];
    //     $.each(data.invoiceList, function(k, v) {

    //         var rebuildData = {
    //             item
    //             totalWeight
    //             price
    //             pv
    //             quantity
    //             total
    //         };
    //         newList.push(rebuildData);

    //     });

    // buildTable(newList, 'detailTable', 'modalTable', headerArr, btnArray, message, tableNo);
    // pagination('modalPagingList', data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
                    
    $("#viewModal").modal("show");

}


</script>
