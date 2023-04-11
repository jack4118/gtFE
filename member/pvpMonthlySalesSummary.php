<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <?php echo $translations['M03319'][$language]; //PVP Monthly Sales Summary ?>
    </div>
    <div class="mt-4">
    	<form id="searchDIV" class="filter">
	        <div class="row align-items-end">
	        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
	        	    <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
	        	    <input name="date" id="date" class="form-control text-center" />
	        	</div>
                <div class="col-lg-4 col-md-6 col-12 form-group d-flex align-items-center"> 
                    <button id="searchBtn" class="btn btn-primary" type="button" data-lang="M03383"><?php echo $translations['M03383'][$language] /*Search*/ ?></button>
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
                    <div id="listingDiv" class="table-responsive"></div>
                    <span id="paginateText"></span>
                    <div class="text-center">
                        <ul class="pagination pagination-md" id="pagerList"></ul>
                    </div>
                </div>
            </div>
        </form>
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

var divId    = 'listingDiv';
var tableId  = 'listingTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
        '<?php echo $translations['M00389'][$language]; /* Date */ ?>',
        '<?php echo $translations['M02778'][$language]; /* Total Sales */ ?>',
        '<?php echo $translations['M03132'][$language]; /* Total PV */ ?>',
);


$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	pagingCallBack(pageNumber,loadSearch);

    // $('#date').daterangepicker({
    //     showDropdowns:true,
    //     timePicker: false,
    //     startView: "months",
    //     minViewMode: "months",
    //     locale: {
    //         format: 'MM/YYYY'
    //     }
    // });
    // $('#date').val('');

    $('#date').datepicker({
        startView: "months",
        minViewMode: "months",
        format: 'mm/yyyy'
    });
    $('#date').val('');

	// Reset Button
	$("#resetBtn").click(function(){
		$("#searchDIV").find("input").each(function(){
			$(this).val('');
		});
		
		$('#searchDIV').find('select').each(function() {
			$(this).val('');
			$("#searchDIV")[0].reset();
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
    var searchData = [];
    selectedDate = $("#date").val().split("/");
    var month = selectedDate[0];
    if(month.charAt(0) == 0){
        month = month.slice(1)
    }
    var year = selectedDate[1];
    searchData.push({
        'dataName':'selectMonth',
        'dataValue': month
    },{
        'dataName':'selectYear',
        'dataValue': year
    })
    var formData = {
        command             : "getOwnMonthlySalesSummary",
        pageNumber          : pageNumber,
        inputData           : searchData
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
	var list = data.pvpReport;
	var tableNo;
	var htmlContent = "";

	if(list){
        var tableNo;
        var newList = [];

        if (list){
            $.each(list, function(k, v){
                var rebuildData = {
                    date 	        : v['date'],
                    totalSales 	    : numberThousand(v['totalSales'],2),
                    totalPV 		: numberThousand(v['totalPV'],2)
                };
                newList.push(rebuildData);
          });
        }
	}

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	if (data.pageNumber > 1) {
		$('#seeAllBtn').show();
	} else {
		$('#seeAllBtn').hide();
	}

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
}


function successMessage(data, message) {
	$('#terminatePortfolio').modal('hide');
	showMessage(message, "success", "<?php echo $translations['M00072'][$language]; /* Congratulations */ ?>","", "portfolio");
}
</script>
