<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>


<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <?php echo $translations['M03712'][$language]; //Unilevel Bonus Report ?>
    </div>
    <div class="mt-4">
        <form id="searchDIV" class="filter">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
                    <label data-lang="M03698"><?php echo $translations['M03698'][$language] /*Bonus Date*/ ?></label>
                    <div class="input-daterange input-group" id="datepicker-range">
                        <input id="dateRangeStart" type="text" class="input-sm form-control px-1" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off">
                        <span class="input-group-text px-0"><i class="fas fa-arrow-right"></i></span>
                        <input id="dateRangeEnd" type="text" class="form-control px-1" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate">
                    </div>
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
        '<?php echo $translations['M03698'][$language]; /* Bonus Date */ ?>',
        '<?php echo $translations['M03033'][$language]; /* Rank*/ ?>',
        '<?php echo $translations['M03713'][$language]; /* No. of couple flush */ ?>',
        '<?php echo $translations['M03714'][$language]; /* Flush DVP */ ?>',
        '<?php echo $translations['M03715'][$language]; /* Calculated DVP */ ?>',
        '<?php echo $translations['M02162'][$language]; /* Bonus Amount */ ?>',
);


$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	pagingCallBack(pageNumber,loadSearch);

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
        command     : "getUnilevelBonusReport",
        pageNumber     : pageNumber,
        searchData     : searchData,
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

        if (list){
            $.each(list, function(k, v){
                var rebuildData = {
                    bonusDate 	        : v['bonusDate'],
                    rank 	            : v['rank'],
                    flushNum 	        : addCommas(v['flushNum'])  ,
                    flushDVP 		    : addCommas(v['flushDVP']),
                    calDVP              : addCommas(v['calDVP']),
                    bonusAmount         : addCommas(v['bonusAmount']),
                };
                newList.push(rebuildData);
          });
        }
	}
    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    $('#' + tableId).find('tr').each(function () {
        $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
        $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
        $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
        $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
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
}


</script>
