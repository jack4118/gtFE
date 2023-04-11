<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00092'][$language]; //Pairing Bonus ?>
		</div>
	    <div class="col-12">
	    	<form id="searchDIV">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00022'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off">
			        	    	<span class="input-group-text"><?php echo $translations['M00023'][$language] /*to*/ ?></span>
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate">
			        	  
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
	        <button id="seeAllBtn" type="button" class="btn btn-primary mb-2" style="display: none;"><?php echo $translations['A01191'][$language] //See All ?></button>
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
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
		'<?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>',
	     '<?php echo $translations['A00975'][$language]; /* Unit */ ?>',
	     '<?php echo $translations['A00976'][$language]; /* CFL */ ?>',
	     '<?php echo $translations['A00977'][$language]; /* CFR */ ?>',
	     '<?php echo $translations['A00978'][$language]; /* L */ ?>',
	     '<?php echo $translations['A00979'][$language]; /* R */ ?>',
	     '<?php echo $translations['A00980'][$language]; /* RL */ ?>',
	     '<?php echo $translations['A00981'][$language]; /* RR */ ?>',
	     '<?php echo $translations['A00973'][$language]; /* Percentage */ ?>',
	     '<?php echo $translations['A00974'][$language]; /* Bonus */ ?>'
);


$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getPairingBonusReport'
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

	$('#seeAllBtn').click(function() {

	    var searchID = 'searchForm';
	    var searchData = buildSearchDataByType(searchID);
	    formData  = {
	        command : 'getPairingBonusReport',
	        inputData   : searchData,
	        pageNumber   : 1,
	        seeAll   : 1
	    };
	    fCallback = loadDefaultListing;
	    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}); 
});


function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getPairingBonusReport",
        pageNumber          : pageNumber,
        inputData          : searchData
    };
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
	var list = data.bonusList;
	var tableNo;
	var htmlContent = "";

	if(list){
		var tableNo;

		 var newList = [];

		if (data.bonusList){
		     $.each(data.bonusList, function(k, v){
		     	var rebuildData = {
		            bonusDate 		: v['bonus_date'],
		            // unit 			: addCommas(Number(v['unit_price']).toFixed(8)),
		            // CFL 			: addCommas(Number(v['cf_position_1']).toFixed(8)),
		            // CFR 			: addCommas(Number(v['cf_position_2']).toFixed(8)),
		            // L 				: addCommas(Number(v['position_1']).toFixed(8)),
		            // R 				: addCommas(Number(v['position_2']).toFixed(8)),
		            // RL 				: addCommas(Number(v['rm_position_1']).toFixed(8)),
		            // RR 				: addCommas(Number(v['rm_position_2']).toFixed(8)),
		            // percent 		: addCommas(Number(v['percentage']).toFixed(2)),
		            // bonus 			: addCommas(Number(v['payable_amount']).toFixed(8))

		            unit 			: addCommas(Number(v['unit_price']).toFixed(8)),
		            CFL 			: v['cf_position_1'],
		            CFR 			: v['cf_position_2'],
		            L 				: v['position_1'],
		            R 				: v['position_2'],
		            RL 				: v['rm_position_1'],
		            RR 				: v['rm_position_2'],
		            percent 		: addCommas(Number(v['percentage']).toFixed(2)),
		            bonus 			: v['payable_amount']
		        };
		        newList.push(rebuildData);
		   });
		}


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('thead tr').each(function(){
        	$(this).find('th:eq(1)').css('text-align', "right");
        	$(this).find('th:eq(2)').css('text-align', "right");
        	$(this).find('th:eq(3)').css('text-align', "right");
        	$(this).find('th:eq(4)').css('text-align', "right");
        	$(this).find('th:eq(5)').css('text-align', "right");
        	$(this).find('th:eq(6)').css('text-align', "right");
        	$(this).find('th:eq(7)').css('text-align', "right");
        	$(this).find('th:eq(9)').css('text-align', "right");
        });

        $('#'+tableId).find('tbody tr').each(function(){
        	$(this).find('td:eq(1)').css('text-align', "right");
        	$(this).find('td:eq(2)').css('text-align', "right");
        	$(this).find('td:eq(3)').css('text-align', "right");
        	$(this).find('td:eq(4)').css('text-align', "right");
        	$(this).find('td:eq(5)').css('text-align', "right");
        	$(this).find('td:eq(6)').css('text-align', "right");
        	$(this).find('td:eq(7)').css('text-align', "right");
        	$(this).find('td:eq(9)').css('text-align', "right");
        });

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
                { responsivePriority: 4, targets: 4 },
                { responsivePriority: 5, targets: 5 },
                { responsivePriority: 6, targets: 6 },
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

	if (data.pageNumber > 1) {
		$('#seeAllBtn').show();
	} else {
		$('#seeAllBtn').hide();
	}
}

</script>
