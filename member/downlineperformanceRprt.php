<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <?php echo $translations['M03671'][$language]; //Downline Performance Report ?>
    </div>
    <div class="mt-4">
    	<form id="searchDIV" class="filter">
	        <div class="row align-items-end">
                <div class="col-lg-6 col-md-6 col-12 form-group" id="datepicker">
                    <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
                    <!-- <div class="input-daterange input-group" id="datepicker-range">
                        <input id="dateRangeStart" type="text" class="input-sm form-control px-1 text-center" name="start" dataType="dateRange" dataName="reportMonth" autocomplete="off">
                        <span class="input-group-text px-0"><i class="fas fa-arrow-right"></i></span>
                        <input id="dateRangeEnd" type="text" class="form-control px-1 text-center" name="end" dataType="dateRange" autocomplete="off" dataName="reportMonth">
                    </div> -->
                    <input id="searchDate" type="text" class="form-control" dataName="reportMonth" dataType="singleDate">
                </div>
	        	<!-- <div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
	        	    <label><?php echo $translations['M00389'][$language] /*Date*/ ?></label>
	        	    <input name="date" id="date" class="form-control text-center" />
	        	</div> -->
                <div class="col-lg-4 col-md-4 col-6 form-group d-flex align-items-center"> 
                    <button id="searchBtn" class="btn btn-primary" type="button" data-lang="M03383"><?php echo $translations['M03383'][$language] /*Search*/ ?></button>
                    <i class="fas fa-sync-alt ml-3 resetBtnStyle" id="resetBtn"></i>
                </div>

                <div class="col-lg-2 col-md-2 col-6 form-group row justify-content-end px-0">
	    			<button id="downloadBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00301'][$language] /*Download*/ ?></button>
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

var reportDate;

var thArray  = Array(
        '<?php echo $translations['M03744'][$language]; /* Report Month */ ?>',
        '<?php echo $translations['M00548'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['M00224'][$language]; /* Name */ ?>',
        '<?php echo $translations['M00676'][$language]; /* City */ ?>',
        '<?php echo $translations['M00181'][$language]; /* Province */ ?>',  
        // '<?php echo $translations['M03745'][$language]; /* Highest Rank */ ?>', 
        '<?php echo $translations['M03033'][$language]; /* Rank */ ?>',    
        '<?php echo $translations['M01651'][$language]; /* Sponsor ID */ ?>', 
        '<?php echo $translations['M03680'][$language]; /* Sponsor Name */ ?>',
        '<?php echo $translations['M00427'][$language]; /* Level */ ?>',
        '<?php echo $translations['M03746'][$language]; /* Placement Structure (L/R) */ ?>',
        '<?php echo $translations['M03747'][$language]; /* Placement Sponsor ID */ ?>',
        '<?php echo $translations['M03748'][$language]; /* Placement Sponsor Name */ ?>',
        '<?php echo $translations['M03652'][$language]; /* PVP */ ?>',
        '<?php echo $translations['M03710'][$language]; /* No of Couple */ ?>',
        '<?php echo $translations['M03750'][$language]; /* No of New Recruit */ ?>',
        '<?php echo $translations['M03751'][$language]; /* Active Until */ ?>',
        '<?php echo $translations['M03752'][$language]; /* Remaining DVP Left */ ?>',
        '<?php echo $translations['M03753'][$language]; /* Remaining DVP Right */ ?>',
        '<?php echo $translations['M00327'][$language]; /* Status */ ?>'


        // '<?php echo $translations['M00548'][$language]; /* Member ID */ ?>',
        // '<?php echo $translations['M03672'][$language]; /* Member Name */ ?>',
        // '<?php echo $translations['M00183'][$language]; /* City */ ?>',
        // '<?php echo $translations['M02002'][$language]; /* Rank */ ?>',
        // '<?php echo $translations['M03673'][$language]; /* Member Level */ ?>',
        // '<?php echo $translations['M00327'][$language]; /* Status */ ?>',
        // '<?php echo $translations['M03674'][$language]; /* PVP */ ?>',
        // // '<?php echo $translations['M03675'][$language]; /* PGP */ ?>',
        // '<?php echo $translations['M03676'][$language]; /* Active Leg */ ?>',
        // '<?php echo $translations['M03677'][$language]; /* DVP */ ?>',
        // '<?php echo $translations['M03678'][$language]; /* No of active downline */ ?>',
        // '<?php echo $translations['M03679'][$language]; /* No. of new recruit */ ?>',
        // '<?php echo $translations['M01651'][$language]; /* Sponsor ID */ ?>',
        // '<?php echo $translations['M03680'][$language]; /* Sponsor Name */ ?>',
        // '<?php echo $translations['M03681'][$language]; /* Nearest upline director */ ?>',
        // '<?php echo $translations['M03682'][$language]; /* nearest upline director name */ ?>'
);


$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	var formData  = {
        command: 'getDownlinePerformanceReport'
    };
    var fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// pagingCallBack(pageNumber,loadSearch);

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

    // $('#date').datepicker({
    //     startView: "months",
    //     minViewMode: "months",
    //     format: 'mm/yyyy'
    // });
    // $('#date').val('');

    $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('#searchDate').val("");

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
            $("#searchDIV")[0].reset();
        });
	});
	// END Reset Button

	// Search Button
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
	// END Search Button

    $('#downloadBtn').click(function(){
        downloadReport();
    })
});

function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);

    // var searchData = [];
    // selectedDate = $("#date").val().split("/");
    // var month = selectedDate[0];
    // if(month.charAt(0) == 0){
    //     month = month.slice(1)
    // }
    // var year = selectedDate[1];
    // searchData.push({
    //     'dataName':'selectMonth',
    //     'dataValue': month
    // },{
    //     'dataName':'selectYear',
    //     'dataValue': year
    // })
    var formData = {
        command             : "getDownlinePerformanceReport",
        pageNumber          : pageNumber,
        searchData          : searchData,
        reportDate          : reportDate
    };
    fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function downloadReport(){
    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var searchID = 'searchDIV';
    var keyAry = Array(
        'reportMonth',
        'memberID',
        'memberName',
        'city',
        'province',
        'rank',
        'sponsorID',
        'sponsorName',
        'memberLevel',
        'placementStructureLR',
        'placementSponsorID',
        'placementSponsorName',
        'pvp',
        'numberCouple',
        'newRecruit',
        'activeUntil', 
        'remainingLeftDVP',
        'remainingRightDVP',
        'status'
    );

    var params = {
                    clientID: <?php echo $_SESSION ['userID'] ?>,
                    searchData: searchData,
                    pageNumber: 1,
                    seeAll: 1,
    }

    var formData = {
        command: "instantMemberExcelExport",
        api: "getDownlinePerformanceReport",
        clientID: <?php echo $_SESSION ['userID'] ?>,
        titleKey: "reportList",
        type: "excel",
        params: params,
        fileName: "DownlinePerformanceReport",
        headerAry: thArray,
        keyAry: keyAry,  
    };
    var fCallback = downloadReportDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function downloadReportDetails(data, message){
    const xlsxBase64 = data.baseFile;
    const linkSource = `data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64, ${xlsxBase64}`;
    const downloadLink = document.createElement("a");
    const fileName = "Downline Performance Report";

    downloadLink.href = linkSource;
    downloadLink.download = fileName;
    downloadLink.click();
}

function loadSearch(data, message) {
		$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00159'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}

function loadDefaultListing(data, message) {
	var list = data.reportList;
	var tableNo;
	var htmlContent = "";

	if(list){
        var tableNo;
        var newList = [];
        $("#downloadBtn").show();

        if (list){
            $.each(list, function(k, v){
                var rebuildData = {
                    reportMonth                 : v['reportMonth'],
                    memberID 	                : v['memberID'],
                    memberName                  : v['memberName'],
                    city                        : v['city'],
                    province                    : v['province'],
                    // highestRank                 : v['highestRank'],
                    rank                        : v['rank'],
                    sponsorID                   : v['sponsorID'],
                    sponsorName                 : v['sponsorName'],
                    memberLevel                 : v['memberLevel'],
                    placementStructureLR        : v['placementStructureLR'],
                    placementSponsorID          : v['placementSponsorID'],
                    placementSponsorName        : v['placementSponsorName'],
                    pvp                         : numberThousand(v['pvp'],2),
                    numCouple                   : v['numberCouple'],
                    newRecruit                  : v['newRecruit'],
                    activeUntil                 : v['activeUntil'],
                    remainingLeftDVP            : v['remainingLeftDVP'],
                    remainingRightDVP           : v['remainingRightDVP'],
                    status                      : v['status'],
                };
                newList.push(rebuildData);
          });
          
        }
	}else{
        $("#downloadBtn").hide();
    }

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    // $('#' + tableId).find('thead tr, tbody tr').each(function () {
    //     $(this).find('th:eq(6), td:eq(6)').css('text-align', "right");
    //     $(this).find('th:eq(7), td:eq(7)').css('text-align', "right");
    //     $(this).find('th:eq(9), td:eq(9)').css('text-align', "right");
    // });

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
            { responsivePriority: 4, targets: 4 },
            { responsivePriority: 5, targets: 5 },
            { responsivePriority: 6, targets: 6 },
            { responsivePriority: 7, targets: 7 },
            { responsivePriority: 8, targets: 8 },
            { responsivePriority: 9, targets: 9 },
            { responsivePriority: 10, targets: 10 },
            { responsivePriority: 11, targets: 11 },
            { responsivePriority: 12, targets: 12 },
            { responsivePriority: 13, targets: 13 },
            { responsivePriority: 14, targets: 14 },
            { responsivePriority: 15, targets: 15 },
            { responsivePriority: 16, targets: 16 },
        ]
    });
}

function successMessage(data, message) {
	$('#terminatePortfolio').modal('hide');
	showMessage(message, "success", "<?php echo $translations['M00072'][$language]; /* Congratulations */ ?>","", "portfolio");
}
</script>
