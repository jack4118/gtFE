<?php
include 'include/config.php';
include 'head.php';
include 'header.php';
$currentTime = microtime(true) * 1000;
$stopRecord = $_SESSION["stopRecord"];
?>
<link rel="stylesheet" href="css/progresscircle.css">
<link rel="stylesheet" href="css/dashboard.css">
<input type="hidden" name="" class="hideFunction">

<div id="popUpModal" class="popUpModal modal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="exampleModalLabel" style="display: none;">
  	<button type="button" class="close popUpModalClose" data-dismiss="modal" aria-label="Close">&times;</button>
  	<div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class="modal-body text-center" style="overflow-y: auto; background-color: #000;">

        <?php 
            foreach($_SESSION['memo'] as $key => $value) {
              if($key == 0)
                echo '<img class="mySlides" src="'.$config['tempMediaUrl'].$value["upload_name"].'" style="width: 100%;">';
              else
                echo '<img class="mySlides" src="'.$config['tempMediaUrl'].$value["upload_name"].'" style="width: 100%;">';
          }
        ?>

      </div>
      <?php
            foreach($_SESSION['memo'] as $key => $value) {
              if($key >=1)
                echo '<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>';
          }
        ?>
      
    </div>
  	</div>
</div>


<div class="pageContent loginPagePadding">
	<!-- START HERE -->
	<div class="section1_div py-5 mb-4 drippingBg">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-4"></div>
			<div class="col-md-8" id="timerCountdown">
				<!-- <div class="row">
					<div class="dashboardText ml-3" data-lang="M03268"><?php echo $translations['M03756'][$language]; /* Please purchase any starter kit before */?>
					<span id="starterKitDate" class="dashboardDate">20/21/22</span>
					<span>.</span>
					</div>
				</div>
				<div id="dashboardTimer" class="dashboardTimer row mt-3">
					<div>
						<span class="dashboardTimerText">00</span>
						<span>days</span>
						<span class="dashboardTimerText">00</span>
						<span>hours</span>
					</div>
					<div>
						<span class="dashboardTimerText">00</span>
						<span>minutes</span>
						<span class="dashboardTimerText">00</span>
						<span>seconds</span>
					</div>
				</div> -->
			</div>
		</div>
	</div>

	<div class="section1_div">
		<div class="row justify-content-center">
			<div class="col-md-4 text-center">
				<div>
					<img class="section1_img" src="images/project/pvp.png" alt="Personal Volume Point">
				</div>
				<div class="mt-2 grayFont dbPointLabel" data-lang="M03268"><?php echo $translations['M03268'][$language]; /* Personal Volume Point */?></div>
				<div id="pvp" class="dbPointNum">0</div>
			</div>
			<!-- <div class="col-md-4 text-center mt-4 mt-md-0">
				<img class="section1_img" src="images/project/pgp.png" alt="Personal Group Point">
				<div class="mt-2 grayFont dbPointLabel" data-lang="M03269"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?></div>
				<div id="pgp" class="dbPointNum">0</div>
			</div> -->
			<div class="col-md-4 text-center mt-4 mt-md-0">
				<div>
					<img class="section1_img" src="images/project/dvp.png" alt="Numbers of Couple">
				</div>
				<div class="mt-2 grayFont dbPointLabel" data-lang="M03730"><?php echo $translations['M03730'][$language]; /* Numbers of Couple */?></div>
				<div id="couple" class="dbPointNum">0</div>
			</div>
		</div>
	</div>

	<div class="mt-4 section1_div px-0">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-5 col-md-6 text-center">
				<div>
					<img class="section1_img" src="images/project/rank.png" alt="Personal Volume Point">
				</div>
				<div class="mt-2 dbRankTitle">
					<span data-lang="M03271"><?php echo $translations['M03271'][$language]; /* Current Rank */?>: </span>
					<span id="currentRank" class="rankLevel" data-lang="M03272"></span>
				</div>
				<div class="px-5">
					<!-- Progress Bar -->
					<progress id="currentRankProgress" class="progressBar" id="file" value="" max="100"></progress>
				</div>
				<div class="dbRankDate px-5">
					<div>
						<span class="grayFont" data-lang="M03275"><?php echo $translations['M03275'][$language]; /* Remaining Days */?>: </span>
						<span id="currentRankRemainingDay" class="bold blackFont"></span>	
					</div>
					<div>
						<label id="currentRankPercent" class="bold blackFont mb-0" for="file"></label>
					</div>
				</div>
			</div>
			<div class="col-lg-7 col-12">
				<div class="row">
					<div class="col-md-4 text-center section2_div mt-5 mt-md-0">
						<img class="section2_img2" src="images/project/td.png" alt="Total Downline">
						<div class="blackFont mt-4 section2_Div_p" data-lang="M03276">
							<?php echo $translations['M03276'][$language]; /* Total Downline */?>
						</div>

						<!-- <div id="totalDownline" class="mt-2 dbSponsorNum">0</div>
						<div id="totalDownline" class="mt-2 dbSponsorNum">0</div> -->
						<div class="blackFont d-flex justify-content-center align-items-center">Left: <span id="totalDownlineLeft" class="dbSponsorNum pl-2"></span></div>
						<div class="blackFont d-flex justify-content-center align-items-center">Right: <span id="totalDownlineRight" class="dbSponsorNum pl-2"></span></div>
					</div>
					<div class="col-md-4 text-center section2_div mt-5 mt-md-0">
						<img class="section2_img2" src="images/project/tad.png" alt="Total Active Downline">
						<div class="blackFont mt-4 section2_Div_p" data-lang="M03277">
							<?php echo $translations['M03277'][$language]; /* Total Active Downline */?>
						</div>
						<div id="totalActiveDownline" class="mt-2 dbSponsorNum">0</div>
					</div>
					<div class="col-md-4 text-center section2_div mt-5 mt-md-0">
						<img class="section2_img2" src="images/project/nm.png" alt="New Members">
						<div class="blackFont mt-4 section2_Div_p" data-lang="M03278">
							<?php echo $translations['M03278'][$language]; /* New Members */?>
						</div>
						<div id="newMember" class="mt-2 dbSponsorNum">0</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mt-4">
		<div class="row">
			<!-- <div class="col-lg-5 d-flex flex-column">
				<div class="section1_div">
					<div class="d-flex justify-content-between align-items-center pb-2">
						<div class="pageTitle" data-lang="M03121"><?php echo $translations['M03121'][$language]; /* Metafiz Cash Award */?></div>
						<a href="cashAward" class="dbSmallLink"><?php echo $translations['M00016'][$language]; /* More */?> ></a>
					</div>	
					<div class="row">
						<div class="col-lg-12 col-md-6">
							<div class="section3_row2 mt-3 p-4">
								<div class="d-flex align-items-center">
									<div id="director" class="circlechart" data-percentage=""></div>
								    <div class="ml-4">
										<div class="grayFont awardLabel" data-lang="M03392"><?php echo $translations['M03392'][$language]; /* MetaFiz Director Award */?></div>
										<div class="mt-1 bold blackFont awardText">RP 12,000,000</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-6">
							<div class="section3_row2 mt-3 p-4">
								<div class="d-flex align-items-center">
									<div id="unicorn" class="circlechart" data-percentage=""></div>
								    <div class="ml-4">
										<div class="grayFont awardLabel" data-lang="M03393"><?php echo $translations['M03393'][$language]; /* MetaFiz Unicorn Award */?></div>
										<div class="mt-1 bold blackFont awardText">RP 30,000,000</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-lg d-flex flex-column mt-4 mt-lg-0">
				<div class="section1_div">
					<div class="row justify-content-between align-items-center">
						<div class="col-md-6">
                            <div class="pageTitle" data-lang="M03268">
                                <span id="monthlyReportTitle">
                                    <?php echo $translations['M03268'][$language]; /* Personal Volume Point */?>
                                </span>
                            </div>
                        </div>
						<div class="col-md-6 mt-md-0 mt-3 px-0 monthSelWrap">
                            <select id="selectType" class="form-control selection">
                                <option value="1" data-value="1"><?php echo $translations['M03268'][$language]; /* Personal Volume Point */?></option>
                                <option value="2" data-value="2"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?></option>
                                <option value="3" data-value="3"><?php echo $translations['M03731'][$language]; /* Couple */?></option>
                            </select>
                        </div>
					</div>
					<div class="mt-4">
						<table id="monthlySalesTable" class="table dbTableStyle"></table>
					</div>
					<div class="mt-2 text-right">
						<div id="monthlySalesHREF"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="mt-4 section1_div">
		<div class="row">
			<div class="col-lg-4 col-md-5 text-center">
				<div class="pageTitle pb-5" data-lang="M03123"><?php echo $translations['M03123'][$language]; /* Metafiz Star Program */?></div>
				<div id="pvPercentage" class="circlechart big" data-percentage=""></div>
			    <div class="mt-4 dbPvDate">
					<span class="grayFont">Remaining Days: </span>
					<span id="pvPercentageRemainingDays" class="bold blackFont"></span>
				</div>
			</div>
			<div class="col-lg-8 col-md-7 mt-4 mt-md-0">
				<div class="dbGrayBg">
					<div class="d-flex justify-content-between">
						<div class="dbOrangeText" data-lang="M03124"><?php echo $translations['M03124'][$language]; /* Previous Records */?></div>
						<a href="starProgram" class="dbSmallLink"><?php echo $translations['M00016'][$language]; /* More */?> ></a>
					</div>
					<div class="mt-4">
						<table id="previousRecordTable" class="table dbTableStyle"></table>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="mt-4 section1_div">	
		<div class="row align-items-center">
			<!-- <div class="col-lg-4 col-md-5 text-center">
				<div class="pageTitle pb-5" data-lang="M03123"><?php echo $translations['M03123'][$language]; /* Leadership Cash Reward */?></div>
				<div id="pvPercentage" class="circlechart big" data-percentage=""></div>
			    <div class="mt-4 dbPvDate">
					<span class="grayFont">Remaining Days: </span>
					<span id="pvPercentageRemainingDays" class="bold blackFont"></span>
				</div>
			</div> -->
			<!-- <div class="d-none d-md-block col-md-4 ">
				<img class="walletImg" src="images/project/cashAward.png" alt="walletPageBackground">
			</div> -->

			<div class="col-lg-4 col-md-5 text-center">
				<!-- <div class="pageTitle pb-2" data-lang="M03754"><?php echo $translations['M03754'][$language]; /* Leadership Cash Reward Progress */?></div> -->
				<div id="leadershipCashRewardPercent" class="circlechart big" data-percentage=""></div>
				<div class="mt-4 dbPvDate">
					<span class="grayFont">Remaining Days: </span>
					<span id="leadershipCashRewardDaysRemaining" class="bold blackFont"></span>
				</div>
			</div>
			<div class="col-md-7">
				<div class="dbGrayBg">
					<div class="pageTitle pb-2" data-lang="M03754"><?php echo $translations['M03754'][$language]; /* Leadership Cash Reward Progress */?></div>
					<!-- <div class="d-flex justify-content-between">
						<div class="dbOrangeText" data-lang="M03124"><?php echo $translations['M03124'][$language]; /* Previous Records */?></div>
						<a href="starProgram" class="dbSmallLink"><?php echo $translations['M00016'][$language]; /* More */?> ></a>
					</div> -->
					<div class="mt-4">
						<!-- <table id="previousRecordTable" class="table dbTableStyle"></table> -->
						<div id="leadershipCashRewardData"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="mt-4 section1_div p-0">
		<div id="dashboardBanner" class="slideshow-container">
			<div class="newsSlide fading">
	        	<div>
	        	    <a href="javascript:;"><img class="dbBanner m-0 p-0" src="/images/project/banner1.jpg" alt="compProfileBanner"></a>
	        	</div>
	        	<div class="p-5 dbNews">
	        		<div class="pageTitle">
	        		    TITLE
	        		</div>
        		    <div class="mt-2 content grayFont">
        		        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        		        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        		        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        		        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        		        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        		        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
        		    </div>
	        	</div>
	        </div>
			<div class="p-5">
		      	<span class="slideLine" onclick="showSlides(1)"></span> 
		     	<span class="slideLine" onclick="showSlides(2)"></span> 
		      	<span class="slideLine" onclick="showSlides(3)"></span> 
		     	<span class="slideLine" onclick="showSlides(4)"></span> 
		    </div>
	    </div>
	</div> -->
	<!-- END HERE -->
</div>

<?php include 'footer.php'; ?>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

<div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" data-lang="M00451"><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage" data-lang="M00033"><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
            	<button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal" data-lang="M00112"><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div>

<script src="js/progresscircle.js"></script>


<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var slideIndex = 1;

$(document).ready(function(){
	var formData  = {
	    command: 'getDashboard',
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$('.monthSelOption').on('click', function() {
	    year = $(this).attr('data-value');
	    $('#selMonth').text($(this).text());
	});

	if("<?php echo $_SESSION['memo']; ?>") {
      $('#popUpModal').modal('show');

      "<?php unset($_SESSION['memo']); ?>"
    }
	// showSlides(1);
	// var formData  = {
	//     command: 'getDashboardBanner'
	// };
	// var fCallback = loadBanner;
	// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

function loadBanner(data, message) {
	if(data.bannerData){
		var dashboardBannerHTML = '';
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var today = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
		$.each(data.bannerData, function(k, v) {
			var startDate = v['start_date'];
			var endDate = v['end_date'];
			if(Date.parse(startDate) <= Date.parse(today) && Date.parse(endDate) >= Date.parse(today)){

				dashboardBannerHTML +=  `
								        <div class="newsSlide fading">
								        	<div>
								        	    <a href="${v['page']}"><img class="dbBanner m-0 p-0" src="<?php echo $config['tempMediaUrl'] ?>${v['upload_name']}" alt="compProfileBanner"></a>
								        	</div>
								        	<div class="p-5 dbNews">
								        		<div class="pageTitle">
								        		    ${v['subject']}
								        		</div>
							        		    <div class="mt-2 content grayFont">
							        		        <div>${v['description']}</div>
							        		    </div>
								        	</div>
								        </div>
										`;
			}
		});
        dashboardBannerHTML += `<div class="p-5">`
        $.each(data.bannerData, function(k, v) {
			dashboardBannerHTML += `<span class="slideLine" onclick="showSlides(${k+1})"></span>` 
      	});
		dashboardBannerHTML += `</div>`;

		$("#dashboardBanner").html(dashboardBannerHTML);

	}
    showSlides(slideIndex);
}

function loadDefaultListing(data, message) {
	if(data){
		$("#currentRank").html(data.rank);
		$("#currentRank2").html(data.rank);
		$("#pgp").html(numberThousand((data.pgp),0));
		$("#pvp").html(numberThousand((data.pvp),0));
		$("#couple").html(numberThousand((data.couple),0));
		$("#totalActiveDownline").html(data.totalActiveDownline);
		$("#newMember").html(data.newMember);
		$("#pvPercentage").data("percentage",data.pvPercentage);
		$("#leadershipCashRewardPercent").data("percentage",data.leadershipCashReward.progressPercent);
		$("#leadershipCashRewardDaysRemaining").html(data.leadershipCashReward.remainingDays);

		if(data.totalDownline.left === null){
			$("#totalDownlineLeft").html("0");
		}
		else{
			$("#totalDownlineLeft").html(data.totalDownline.left);
		}

		if(data.totalDownline.right === null){
			$("#totalDownlineRight").html("0");
		}else{
			$("#totalDownlineRight").html(data.totalDownline.right);
		}

		if(data.cashAward) {
			$("#director").data("percentage",data.cashAward.director);
			$("#unicorn").data("percentage",data.cashAward.unicorn);
		}

		if(data.curRankProgress){
			$("#currentRankRemainingDay").html(data.curRankProgress.remainingDays + " <?php echo $translations["M02493"][$language] //Day ?>");
			$("#pvPercentageRemainingDays").html(data.curRankProgress.remainingDays + " <?php echo $translations["M02493"][$language] //Day ?>");
			$("#currentRankPercent").html(data.curRankProgress.totalEntitlePercent + "/100 %");
			$("#currentRankProgress").prop("value",data.curRankProgress.totalEntitlePercent);
		}

		$(function(){
			$('.circlechart').circlechart();
		})
	}

	if(data.monthlySales) {
		var monthlySalesTableHTML = `<tr class="tableHeader">
								<th>
									<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
								</th>
								<th>
									<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
								</th>
								<th>
									<span data-lang="M03130"><?php echo $translations['M03130'][$language]; /* PV */?></span>
								</th>
							</tr>`;
		$.each(data.monthlySales, function(k, v) {
			monthlySalesTableHTML += `
									<tr class="tableRow">
										<td>${v['months']}</td>  <td>${numberThousand(v['sales'],2)}</td>  <td>${numberThousand(v['pv'],2)}</td>
									</tr>
									`
		});

		var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="pvpMonthlySalesSummary" class="dbSmallLink">
										<?php echo $translations['M00016'][$language]; /* More */?> >
									</a>`


		$("#monthlySalesTable").html(monthlySalesTableHTML);
		$("#monthlySalesHREF").html(monthlySalesTableHREF);
	}else{
		monthlySalesTableHTML = `<tr class="tableHeader">
										<th>
											<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
										</th>
										<th>
											<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
										</th>
										<th>
											<span data-lang="M03130"><?php echo $translations['M03130'][$language]; /* PV */?></span>
										</th>
									</tr>
									<tr>
										<td colspan="3">
											<div class="my-5 text-center">
												<div class="mb-3"><img src="images/project/no-results.png" width="80px"/></div>
												<div class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found ?></div>
											</div>
										</td>
									</tr>
									`;

		$("#monthlySalesTable").html(monthlySalesTableHTML);
		$("#monthlySalesHREF").html(monthlySalesTableHREF);
	}

	if(data.leadershipCashReward){
		var leadershipCashRewardHTML = `
			<div class="leadershipCashRewardData">
				<div data-lang="M03742"><?php echo $translations['M03742'][$language]; /* Couple Target */?> :</div>
				<span id="" class="leadershipCashRewardText">${data.leadershipCashReward.nextTargetValue}</span>
			</div>

			<div class="leadershipCashRewardData">
				<div data-lang="M03743"><?php echo $translations['M03743'][$language]; /* Current Couple */?> :</div>
				<span id="" class="leadershipCashRewardText">${data.leadershipCashReward.totalCouple}<span>
			</div>
			`;

		$("#leadershipCashRewardData").html(leadershipCashRewardHTML);
	}

	$("#selectType").on("change",function(){
        var selectedOption = $("#selectType").find(":selected").val()
        switch(selectedOption){
            case '1':
                $("#monthlyReportTitle").html("<?php echo $translations['M03268'][$language]; /* Personal Volume Point */?>");

				//monthly pvp 
				if(data.monthlySales) {
					var monthlySalesTableHTML = `<tr class="tableHeader">
											<th>
												<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
											</th>
											<th>
												<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
											</th>
											<th>
												<span data-lang="M03130"><?php echo $translations['M03130'][$language]; /* PV */?></span>
											</th>
										</tr>`;
					$.each(data.monthlySales, function(k, v) {
						monthlySalesTableHTML += `
												<tr class="tableRow">
													<td>${v['months']}</td>  <td>${numberThousand(v['sales'],2)}</td>  <td>${numberThousand(v['pv'],2)}</td>
												</tr>
												`
					});

					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="pvpMonthlySalesSummary" class="dbSmallLink">
										<?php echo $translations['M00016'][$language]; /* More */?> >
									</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}else{
					monthlySalesTableHTML = `<tr class="tableHeader">
													<th>
														<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
													</th>
													<th>
														<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
													</th>
													<th>
														<span data-lang="M03130"><?php echo $translations['M03130'][$language]; /* PV */?></span>
													</th>
												</tr>
												<tr>
													<td colspan="3">
														<div class="my-5 text-center">
															<div class="mb-3"><img src="images/project/no-results.png" width="80px"/></div>
															<div class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found ?></div>
														</div>
													</td>
												</tr>
												`;
					
					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="pvpMonthlySalesSummary" class="dbSmallLink">
													<?php echo $translations['M00016'][$language]; /* More */?> >
												</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}
                break;

            case '2':
                $("#monthlyReportTitle").html("<?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>");

				//monthly dvp
				if(data.monthlyDVP) {
					var monthlySalesTableHTML = `<tr class="tableHeader">
											<th>
												<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
											</th>
											<th>
												<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
											</th>
											<th>
												<span data-lang="M03737"><?php echo $translations['M03737'][$language]; /* DVP Left */?></span>
											</th>
											<th>
												<span data-lang="M03738"><?php echo $translations['M03738'][$language]; /* DVP Right */?></span>
											</th>
										</tr>`;
					$.each(data.monthlyDVP, function(k, v) {
						monthlySalesTableHTML += `
												<tr class="tableRow">
													<td>${v['months']}</td>  <td>${numberThousand(v['sales'],2)}</td>  <td>${numberThousand(v['dvpLeft'],2)}</td> <td>${numberThousand(v['dvpRight'],2)}</td>
												</tr>
												`
					});

					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="dvpMonthlySalesSummary" class="dbSmallLink">
										<?php echo $translations['M00016'][$language]; /* More */?> >
									</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}
				else{
					monthlySalesTableHTML = `<tr class="tableHeader">
													<th>
														<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
													</th>
													<th>
														<span data-lang="M02160"><?php echo $translations['M02160'][$language]; /* Sales */?></span>
													</th>
													<th>
														<span data-lang="M03737"><?php echo $translations['M03737'][$language]; /* DVP Left */?></span>
													</th>
													<th>
														<span data-lang="M03738"><?php echo $translations['M03738'][$language]; /* DVP Right */?></span>
													</th>
												</tr>
												<tr>
													<td colspan="3">
														<div class="my-5 text-center">
															<div class="mb-3"><img src="images/project/no-results.png" width="80px"/></div>
															<div class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found ?></div>
														</div>
													</td>
												</tr>
												`;

					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="dvpMonthlySalesSummary" class="dbSmallLink">
						<?php echo $translations['M00016'][$language]; /* More */?> >
					</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}
                break;
				
            case '3':
                $("#monthlyReportTitle").html("<?php echo $translations['M03731'][$language]; /* Couple */?>");

				//monthly couple
				if(data.monthlyCouple) {
					var monthlySalesTableHTML = `<tr class="tableHeader">
											<th>
												<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
											</th>
											<th>
												<span data-lang="M03731"><?php echo $translations['M03731'][$language]; /* Couple */?></span>
											</th>
										</tr>`;
					$.each(data.monthlyCouple, function(k, v) {
						monthlySalesTableHTML += `
												<tr class="tableRow">
													<td>${v['months']}</td>  <td>${numberThousand(v['couples'],2)}</td>
												</tr>
												`
					});

					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="coupleBonus" class="dbSmallLink">
													<?php echo $translations['M00016'][$language]; /* More */?> >
												</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}
				else{
					monthlySalesTableHTML = `<tr class="tableHeader">
													<th>
														<span data-lang="M03279"><?php echo $translations['M03279'][$language]; /* Months */?></span>
													</th>
													<th>
														<span data-lang="M03731"><?php echo $translations['M03731'][$language]; /* Couple */?></span>
													</th>
												</tr>
												<tr>
													<td colspan="3">
														<div class="my-5 text-center">
															<div class="mb-3"><img src="images/project/no-results.png" width="80px"/></div>
															<div class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found ?></div>
														</div>
													</td>
												</tr>
												`;

					var monthlySalesTableHREF = `<a id="monthlySalesHREF" href="coupleBonus" class="dbSmallLink">
						<?php echo $translations['M00016'][$language]; /* More */?> >
					</a>`

					$("#monthlySalesTable").html(monthlySalesTableHTML);
					$("#monthlySalesHREF").html(monthlySalesTableHREF);
				}
                break;

            default:
                $("#monthlySalesHREF").attr("href","pvpMonthlySalesSummary");
				$("#monthlySalesHREF").html(monthlySalesTableHREF);
                break;
        }
    })

	// account status countdown display
	if(data.validPeriod.isNew === 0){
		var dashboardCountdownTimer;
		const validUntil = new Date(data.validPeriod.validTill * 1000);
		let validYear = validUntil.getFullYear();
		let validMonth = validUntil.getMonth() + 1;
		let validDate = validUntil.getDate();

		const purchaseBefore  = new Date(data.validPeriod.purchaseBefore * 1000);
		let validPurchaseYear = purchaseBefore.getFullYear();
		let validPurchaseMonth = purchaseBefore.getMonth() + 1;
		let validPurchaseDate = purchaseBefore.getDate();

		dashboardCountdownTimer = `
			<div class="row">
				<div class="dashboardText dashboardActiveID ml-3" data-lang="M03758">
					<?php echo $translations['M03758'][$language]; /* Your ID is active until  */?>
					<span class="dashboardActiveID">${validDate}/${validMonth}/${validYear}.</span>
				</div>
			</div>
			<div class="row mt-3 mb-5">
				<div class="dashboardText ml-3" data-lang="M03759">
					<?php echo $translations['M03759'][$language]; /* Please purchase 50 PVP or Recruit 1 Metafiz Join Pack before  */?>
					<span class="dashboardDate">${validPurchaseDate}/${validPurchaseMonth}/${validPurchaseYear}.</span>
				</div>
			</div>`

		$("#timerCountdown").html(dashboardCountdownTimer);
	}

	// purchase starter kit countdown display
	if(data.validPeriod.isNew === 1){
		let dashboardCountdownTimer;
		const validUntil = new Date(data.validPeriod.validTill * 1000);
		let purchaseBefore = new Date(data.validPeriod.purchaseBefore * 1000);

		let validYear = validUntil.getFullYear();
		let validMonth = validUntil.getMonth() + 1;
		let validDate = validUntil.getDate();

		let days;
		let hours;
		let minutes;
		let seconds;

		let remainingTime;

		let countdownTimer = setInterval(()=>{
			const now = new Date().getTime();
			remainingTime = purchaseBefore - now;

			days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
			hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
			seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

			if( days < 10){
				days = "0" + days; 
			}

			if( hours < 10){
				hours = "0" + hours; 
			}

			if( minutes < 10){
				minutes = "0" + minutes; 
			}

			if( seconds < 10){
				seconds = "0" + seconds; 
			}

			dashboardCountdownTimer = `
			<div class="row">
				<div class="dashboardText ml-3" data-lang="M03268">
					<?php echo $translations['M03756'][$language]; /* Please purchase any starter kit before */?>
					<span id="starterKitDate" class="dashboardDate">${validDate}/${validMonth}/${validYear}</span>
					<span>.</span>
				</div>
			</div>
			<div id="dashboardTimer" class="dashboardTimer row mt-3">
				<div>
					<span class="dashboardTimerText">${days}</span>
					<span data-lang="M03611">
						<?php echo $translations['M03611'][$language]; /* Days */?>
					</span>
					<span class="dashboardTimerText">${hours}</span>
					<span data-lang="M03057">
						<?php echo $translations['M03057'][$language]; /* Hours */?>
					</span>
				</div>
				<div>
					<span class="dashboardTimerText">${minutes}</span>
					<span data-lang="M03058">
						<?php echo $translations['M03058'][$language]; /* Minutes */?>
					</span>
					<span class="dashboardTimerText">${seconds}</span>
					<span data-lang="M03757">
						<?php echo $translations['M03757'][$language]; /* Seconds */?>
					</span>
				</div>
			</div>`

		$("#timerCountdown").html(dashboardCountdownTimer);
		})

		if(remainingTime < 0){
			clearInterval(countdownTimer);

			dashboardCountdownTimer = `
			<div class="row">
				<div class="dashboardText ml-3" data-lang="M03268">
					<?php echo $translations['M03756'][$language]; /* Please purchase any starter kit before */?>
					<span id="starterKitDate" class="dashboardDate">${validDate}/${validMonth}/${validYear}</span>
					<span>.</span>
				</div>
			</div>
			<div id="dashboardTimer" class="dashboardTimer row mt-3">
				<div>
					<span class="dashboardTimerText">00</span>
					<span data-lang="M03611">
						<?php echo $translations['M03611'][$language]; /* Days */?>
					</span>
					<span class="dashboardTimerText">00</span>
					<span data-lang="M03057">
						<?php echo $translations['M03057'][$language]; /* Hours */?>
					</span>
				</div>
				<div>
					<span class="dashboardTimerText">00</span>
					<span data-lang="M03058">
						<?php echo $translations['M03058'][$language]; /* Minutes */?>
					</span>
					<span class="dashboardTimerText">00</span>
					<span data-lang="M03757">
						<?php echo $translations['M03057'][$language]; /* Seconds */?>
					</span>
				</div>
			</div>`
		}
	}
}

function showSlides(n) {
  	var i;
  	var slides = document.getElementsByClassName("newsSlide");
  	var slideLines = document.getElementsByClassName("slideLine");
  	if (n > slides.length) {n = 1}    
  	if (n < 1) {n = slides.length}
  	for (i = 0; i < slides.length; i++) {
  	    slides[i].style.display = "none";  
  	}
  	for (i = 0; i < slideLines.length; i++) {
  	    slideLines[i].classList.remove("active");
  	}
  	slides[n-1].style.display = "block";  
  	slideLines[n-1].classList.add("active");
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }

  if (x[slideIndex-1]) {
  	x[slideIndex-1].style.display = "block";
  }
  
}

</script>