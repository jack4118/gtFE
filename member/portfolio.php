<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00007'][$language] /*Portfolio*/ ?>
		</div>
	    <div class="col-12">
	    	<form id="searchDIV">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00022'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="dateRange" autocomplete="off">
			        	    	<span class="input-group-text"><?php echo $translations['M00023'][$language] /*to*/ ?></span>
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="dateRange">
			        	  
			        	    </div>
			        	</div>
			        </div>
	    		</div>

	    		<div class="col-12 px-0">
	    				<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
	    				<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
	    		</div>

	    	</form>
	    </div>

	   
	</div>
	<div class="kt-container pt-4">
		<div class="col-12 mt-4">
			<div id="totalPrincipleAmount" class="pull-in col-12 px-0">
	        </div>
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
		    <div class="col-12">
		    	<button id="terminateBtn" class="btn btn-primary" type="button" name="button" style="display: none;"><?php echo $translations['M00047'][$language] //Termination ?></button>
		    </div>
		</div>
	</div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</body>
</html>

<div class="modal fade warningModal" id="terminatePortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span class="modal-title"><?php echo $translations['M00047'][$language] //Termination ?></span> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div class="col-12">
                	<div class="row">
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00014'][$language] //Total Principle ?></label>
                			<input id="totalPrinciple" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M02143'][$language] //Total Income Earned ?></label>
                			<input id="totalIncome" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00048'][$language] //Termination Fee ?></label>
                			<input id="terminationFee" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00104'][$language] //Amount Receivable ?></label>
                			<input id="amountReceivable" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00042'][$language] //Transaction Password ?></label>
                			<input id="paymentTPassword" class="form-control inputDesign" type="password">
                		</div>
                	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $translations['M00020'][$language]; //Close ?></button>
                <button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00077'][$language] /*Confirm*/ ?></button>
            </div>
        </div>
    </div>
</div>


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

var thArray  = Array(
		"<?php echo $translations['M01784'][$language] ?>",
		"<?php echo $translations['M00019'][$language] //Principle Amount ?>",
		"<?php echo $translations['M00166'][$language] //Bonus Value ?>",
		"<?php echo $translations['M00327'][$language] ?>",
);


$(document).ready(function(){

	$('#terminateBtn').click(function() {
		$('#terminatePortfolio').modal('show');
	});

	$('#confirmBtn').click(function() {
		$('.invalid-feedback').remove();
		$('input').removeClass('is-invalid');
		var paymentTPassword = $('#paymentTPassword').val();
		var formData  = {
		  command: 'requestPortfolioTermination',
		  paymentTPassword : paymentTPassword
		};
		var fCallback = successMessage;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getPortfolioList'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

	// Reset Button
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
			$("#searchForm")[0].reset();
		});
	});
	// END Reset Button

	// Search Button
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
	// END Search Button
});


function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getPortfolioList",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}



function loadSearch(data, message) {
		$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00159'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}

function loadDefaultListing(data, message) {
	console.log(data);
	if (data.terminatedData != null) {
		$('#totalPrinciple').val(data.terminatedData.totalPrinciple);
		$('#totalIncome').val(data.terminatedData.totalEarningAmount);
		$('#terminationFee').val(data.terminatedData.terminatedFees);
		$('#amountReceivable').val(data.terminatedData.amountReceivable +" "+ data.terminatedData.terminatedCreditTypeDisplay);
		$('#terminateBtn').show();
	} else {
		$('#terminateBtn').hide();
	}
	
	
	$('#totalPrincipleAmount').html('');
	var list = data.portfolioPageListing;
	var tableNo;
	var grandTotal = data.grandTotal;
	var htmlContent = "";


	if(list){
		var newList = [];
		$.each(list, function(k,v){
			var nbvValue = v['nbv'] != "0.00"?v['nbv']:v['nbvr'];
			var rebuildData ={
				entryDate			:	v['createdAt'],
				amount				:	v['amount'] != "0.00"?addCommas(Number(v['amount']).toFixed(2)):addCommas(Number(nbvValue).toFixed(2)),
				bonusValue			:	addCommas(Number(v['amount']).toFixed(2)), 
				price				:	v['statusDisplay'],
			};
				newList.push(rebuildData);
		});

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		$('#'+tableId).find('thead tr').each(function(){
			$(this).find('th:eq(0)').css('white-space', "nowrap");
		});

		htmlContent = '<h4><?php echo $translations['M00148'][$language]; //Total Principle Amount ?> : '+(grandTotal?grandTotal:0+'</h4>');

		$('#totalPrincipleAmount').append(htmlContent);

		// START DataTables
		$('#'+tableId+' th:nth-child(1)').before('<th></th>');
		$('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');


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
		    ]
		});

	} else {
		$("#"+divId).empty();
		$("#paginateText").empty();
		$('#alertMsg').html(`
		    <div class="row">
		        <div class="col-12 text-center">
		            ${buildTableHead(thArray)}
		            <div>
		                <i class="fa fa-align-justify noResultIcon"></i>
		                <span class="noResultTxt"><?php echo $translations["M00019"][$language] //No Results Found. ?></span>
		            </div>
		        </div>
		    </div>
		`).show();
	}
}

function tableBtnClick(btnId)
{
	var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
	var tableRow = $('#'+btnId).parent('td').parent('tr');
	var tableId  = $('#'+btnId).closest('table');

	if (btnName == 'activate')
	{
		var portfolioID = tableRow.attr('data-th');
		var days = tableRow.attr('data-name');
		var canvasBtnArray = {
						Confirm: 'Confirm'
		};
		showMessage('<?php echo $translations['M00192'][$language]; //I hereby read and understand this Portfolio Activation Agreement that by clicking Confirm, I agreed to skip the ?> '+days+' <?php echo $translations['M00253'][$language]; //days freelook period and directly activate the package without refund at my own will. ?>', "warning", "<?php echo $translations['M00254'][$language]; //Portfolio Activation Agreement ?>","", "",canvasBtnArray);

		$('#canvasConfirmBtn').click(function(){
			formData  = {
				command : "activatePortfolio",
				portfolioId : portfolioID
			};
			fCallback = activatePortfolio;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	}

	if(btnName == 'Withdraw')
	{
		var portfolioID = tableRow.attr('data-th');
		var canvasBtnArray = {
						Confirm: 'Confirm'
		};
		showMessage('<?php echo $translations['M00255'][$language]; //I hereby read and understand this Portfolio Capital Withdrawal Agreement that by clicking Confirm, I agreed to withdraw the package at my own will. ?>', "warning", "<?php echo $translations['M00256'][$language]; //Portfolio Capital Withdrawal Agreement ?>","", "",canvasBtnArray);

		$('#canvasConfirmBtn').click(function(){
			formData  = {
				command : "refundPortfolio",
				portfolioId : portfolioID
			};
			fCallback = withdrawSuccess;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	}

  if(btnName == 'view')
	{
		var portfolioID = tableRow.attr('data-th');
    // console.log(portfolioID);
	  $.redirect('portfolioDetails.php', {id: portfolioID});
	}
}

function activatePortfolio(data, message)
{
	showMessage('<?php echo $translations['M00257'][$language]; //Your portfolio has been successfully activated. ?>', "success", "<?php echo $translations['M00258'][$language]; //Portfolio Activation Agreement ?>","", "");

	var formData  = {
		command: 'getPortfolioList',
		pageNumber: pageNumber
	};
	fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function withdrawSuccess(data, message) {
	showMessage('<?php echo $translations['M00259'][$language]; //Your portfolio has been successfully withdraw. ?>', "success", "<?php echo $translations['M00260'][$language]; //Thanks ?>","", "");

	var formData  = {
		command: 'getPortfolioList',
		pageNumber: pageNumber
	};
	fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successMessage(data, message) {
	$('#terminatePortfolio').modal('hide');
	showMessage(message, "success", "<?php echo $translations['M00072'][$language]; /* Congratulations */ ?>","", "portfolio.php");
}
</script>
