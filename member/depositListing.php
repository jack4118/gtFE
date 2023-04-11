<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Portfolio", $_SESSION['blockedRights']['Subscription Portfolio'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<span id="walletName"></span> - <?php echo $translations["M02090"][$language]; //Deposit Listing ?>
		</div>
	    <div class="col-12">
	    	<form id="searchDIV">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00989'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    
			        	        <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="searchDate" autocomplete="off">
			        	        <!-- <div class="input-group-append"> -->
			        	            <span class="input-group-text"><?php echo $translations['M00023'][$language] /*to*/ ?></span>
			        	        <!-- </div> -->
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="searchDate">
			        	  
			        	    </div>
			        	</div>
			        </div>
	    		</div>

	    		<div class="col-12 px-0" style="margin-top: 20px;">
	    				<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
	    				<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
	    		</div>

	    	</form>
	    </div>

	   
	</div>
</section>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12">
			<form>
		        <div id="basicwizard" class="pull-in col-12 px-0">
		            <div class="tab-content b-0 m-b-0 p-t-0">
		                <div id="alertMsg" class="text-center" style="display: block;"></div>
		                <div id="portfolioDiv" class="table-responsive"></div>
		                <span id="paginateText"></span>
		                <div class="text-center">
		                    <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
		                </div>
		            </div>
		        </div>
		    </form>
		</div>
	</div>
</section>



<?php include 'footer.php'; ?>
</body>

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

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pageList';
var btnArray = {};

var thArray  = Array(
		'<?php echo $translations['M00058'][$language]; //Created at ?>',
		// '<?php echo $translations['M00036'][$language]; //Username ?>',
		'<?php echo $translations['M02098'][$language]; //Deposit Coin Type ?>',
		'<?php echo $translations['M02106'][$language]; //Deposit Amount ?>',
		'<?php echo $translations['M00976'][$language]; //Callback Amount ?>',
		'<?php echo $translations['M01009'][$language]; //Receivable Amount ?>',
		// '<?php echo $translations['M02101'][$language]; //Coin Rate ?>',
		// '<?php echo $translations['M02102'][$language]; //Converted Amount ?>',
		'<?php echo $translations['M00011'][$language]; //Status ?>',
		'<?php echo $translations['M00977'][$language]; //Callback At ?>',
		'<?php echo $translations['M00275'][$language]; //Wallet Address ?>',
);
var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";

$(document).ready(function(){
	$("#walletName").html(creditDisplay);
	var formData  = {
	  command: 'getFundInListing'
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

function pagingCallBack(pageNumber, loadSearch)
{
	if(pageNumber > 1) bypassLoading = 1;

	var searchId 	 = "searchDIV";
	var searchData = buildSearchDataByType(searchId);
	console.log(searchData);
	var formData   = {
			command     : "getFundInListing",
			pageNumber  : pageNumber,
			searchData  : searchData
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
	console.log(data);
	var list = data.fundInList;
	var tableNo;
	var grandTotal = data.grandTotal;
	var htmlContent = "";

	if(list){
		var newList = [];
		$.each(list, function(k,v){
			var rebuildData ={
				created_at					:	v['created_at'],
				// username					:	v['username'],
				payCreditDisplay			:	v['payCreditDisplay'],
				top_up_amount				:	v['top_up_amount'],
				call_back_amount			:	v['call_back_amount'],
				receivable_amount			:	v['receivable_amount'],
				// coin_rate					:	v['coin_rate'],
				// converted_receivable_amount	:	v['converted_receivable_amount'],
				status						:	v['status'],
				call_back_at				:	v['call_back_at'],
				wallet_address				:	v['wallet_address'],
			};
				newList.push(rebuildData);
		});

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		$('#'+tableId).find('thead tr').each(function(){
			$(this).find('th:eq(0)').css('white-space', "nowrap");
		});

		htmlContent = '<h4>Total Principle Amount : '+(grandTotal?grandTotal:0);

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
		                <span class="noResultTxt"><?php echo $translations["M00019"][$language] //No Results Found ?></span>
		            </div>
		        </div>
		    </div>
		`).show();
	}
}

function setSearchOption(data, searchVal) {
    $('#searchDIV').find('option:not(:first-child)').remove();
    $.each(data, function(key, val) {
        $('#searchDIV').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
    });
    if (searchVal != ' '){
        $('#searchDIV').val(searchVal);
    }
}
</script>
