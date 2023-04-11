<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
	<div class="pageTitle">
		<span id="creditType"></span><?php echo $translations['M00156'][$language]; /* My Wallet */?>
	</div>
	<div class="mt-3 walletDiv px-md-5">
	    <div class="row align-items-center buildWallet"></div>

		<!-- <div class="row align-items-center">	
    		<div class="col-md-3">
			<h4>Bonus Wallet</h4>
		        <img class="walletImg" src="images/project/myWallet.png" alt="walletPageBackground">
    		</div>

    		<div class="col-md-3 col-12 mt-4 mt-md-0 pl-md-5">
		        <div class="walletPgLabel">
		        	<?php echo $translations['M00915'][$language]; /* Wallet Balance */?>
		        </div>
		        <div id="walletBal" class="walletPgAmt">
		        	
		        </div>	
    		</div>
	    </div> -->
	</div>
	<div class="mt-5 mt-4">
		<div class="pageTitle"><?php echo $translations['M00170'][$language]; /* Transaction History */?> - <span id="currCreditType"></span></div>
	</div>
	<div class="mt-3 walletDiv">
	    <form>
	        <div id="basicwizard" class="pull-in col-12 px-0">
	            <div class="tab-content b-0 m-b-0 p-t-0">
	                <div id="alertMsg" class="text-center" style="display: block;"></div>
	                <div id="transactionHistoryDiv" class="table-responsive"></div>
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

	var creditType = "<?php echo $_POST['creditType']; ?>";
	var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var divId    = 'transactionHistoryDiv';
	var tableId  = 'transactionHistoryTable';
	var pagerId  = 'pagerList';
	var btnArray = {};
	var thArray  = Array (
	'<?php echo $translations['M00389'][$language]; //Date ?>',
	'<?php echo $translations['M02069'][$language]; //Transaction Type ?>',
	'<?php echo $translations['M02070'][$language]; //To / From ?>',
	'<?php echo $translations['M02071'][$language]; //In ?>',
	'<?php echo $translations['M02072'][$language]; //Out ?>',
	'<?php echo $translations['M02324'][$language]; //Balance ?>',
	'<?php echo $translations['M02073'][$language]; //Done By ?>',
	'<?php echo $translations['M02535'][$language]; //Remark ?>',
	);
	var saveCreditType;
	var saveCreditTypeDisplay;

	$(document).ready(function() {
		var formData  = {
			command: 'getDashboard'
		};
		var fCallback = loadWalletListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});

	function pagingCallBack(pageNumber, fCallback){
	    if(pageNumber > 1) bypassLoading = 1;

	    var formData = {
	        command             : "getTransactionHistory",
	        creditType  		: saveCreditType,
	        pageNumber          : pageNumber
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
		$('#creditType').html(data.creditDisplay);
		var list = data.transactionList;
		var tableNo;
		var grandTotal = data.grandTotal;
		var htmlContent = "";
		// $('#walletBal').html(data.balance?numberThousand(data.balance,2):0)
		if(list){
			var newList = [];
			$.each(list, function(k, v) {
				if (v['credit_in'] != "-") {
					var credit_in = addCommas(Number(v['credit_in']).toFixed(data.decimal));
				} else {
					var credit_in = v['credit_in'];
				}

				if (v['credit_out'] != "-") {
					var credit_out = addCommas(Number(v['credit_out']).toFixed(data.decimal));
				} else {
					var credit_out = v['credit_out'];
				}

				if(v['subject'] == "Re-entry")
				{
					var transactiontype = '<?php echo $translations['M00426'][$language]; //Subscription ?> ' +translations[v['package']][language];
				}
				else
				{
					var transactiontype = v['subject'];
				}

				var getCurrentInfo = "";
				if(creditType == "quantiniumWallet")
					getCurrentInfo = v['packageSN'];
				else
					getCurrentInfo = v['to_from'];

				var rebuildData = {
					created_at 		: v['created_at'],
					subject 		: transactiontype,
					getCurrentInfo  : getCurrentInfo,
					credit_in 		: credit_in,
					credit_out 		: credit_out,
					balance 		: addCommas(Number(v['balance']).toFixed(data.decimal)),
					creator_id 		: v['creator_id'],
					remark 			: v['remark']
				};
				newList.push(rebuildData);

			});
		} 

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

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
	        ]
	    });
	}

	function loadWalletListing(data, message){
		var blockedRights = [<?php echo '"'.implode('","', $_SESSION['blockedRights']).'"' ?>];
		saveCreditType = data['wallet'][0]['type'];
		saveCreditTypeDisplay = data['wallet'][0]['creditDisplay'];
		$("#currCreditType").text(saveCreditTypeDisplay)

		if (data.wallet) {
			var buildWallet = "";

			$.each(data.wallet, function(k, v) {
				var buildMenu = "";
				var creditType = v['type'];
				var rightName = "";

				if (v['type'] == 'usdWallet') {
					rightName = creditType+" Release";
					if(blockedRights.indexOf(rightName) == -1){ 
						buildMenu += `<a href="releaseListing.php" class="dropdown-item" data-lang='M02157'><?php echo $translations['M02157'][$language]; /* From Empire Entertainment */ ?></a>`;
					}
				}

				// if (v['showTransactionHistory'] == 1) {
				// 	rightName = creditType + " Transaction History";
				// 	if(blockedRights.indexOf(rightName) == -1){ 
				// 		buildMenu += `<a href="javascript:;" onclick="redirectTransactionHistory('${v['type']}','${v['translation_code']}')" class="dropdown-item" data-lang='M00170'><?php echo $translations['M00170'][$language]; //Transaction History ?></a>`;
				// 	}	
				// }
				
				if (v['isFundinable'] == 1) {
					rightName = creditType + " Fund In";
					if(blockedRights.indexOf(rightName) == -1){
						buildMenu += `<a href="javascript:;" onclick="redirectFundInCredit('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00978'><?php echo $translations["M00978"][$language]; //Deposit by Crypto ?></a>`;

						buildMenu += `<a href="javascript:;" onclick="redirectFundInListing('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00014'><?php echo $translations["M00014"][$language]; //Fund In History ?></a>`;
					}

				}

				if (v['isTransferable'] == 1) {
					rightName = creditType + " Transfer";
					if(blockedRights.indexOf(rightName) == -1){ 
						buildMenu += `<a href="javascript:;" onclick="redirectTransferCredits('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00015'><?php echo $translations['M00015'][$language]; //Transfer Credit ?></a>`;
					}
				}

				if (v['isConvertible'] == 1) {
					buildMenu += `<a href="javascript:;" onclick="redirectConvertCredits('${v['type']}', '${v['translation_code']}')" class="dropdown-item" data-lang='M00016'><?php echo $translations['M00016'][$language]; //Convert ?></a>`;
				} 

				if (v['isWithdrawable'] == 1) {
					rightName = creditType + " Withdrawal";
					if(blockedRights.indexOf(rightName) == -1){ 
						buildMenu += `<a href="javascript:;" onclick="redirectWithdrawalCredits('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='T00003'><?php echo $translations['T00003'][$language]; //Withdrawal ?></a>`;
					}
					rightName = creditType + " Withdrawal Listing";
					if(blockedRights.indexOf(rightName) == -1){ 
						buildMenu += `<a href="javascript:;" onclick="redirectWithdrawalListing('${v['type']}', '${v['translation_code']}')" class="dropdown-item" data-lang='M00018'><?php echo $translations['M00018'][$language]; //Withdrawal History ?></a>`;
					}
				}

				

				// <div class="col-md-6 col-12 my-3 my-md-0 walletWrapper" id="${v['type']}">
				if(v['type'] == 'mfizCredit'){
					buildWallet +=`
						<div class="col-md-6 col-12 my-3 my-md-0 walletWrapper ${k == 0 ? 'active' : ''}" id="${v['type']}" onclick="getThisWallet(this,'${v['type']}','${v['creditDisplay']}')">
						 	<div class="row justify-content-between mx-0">
						 		<div><h4>${v['creditDisplay']}</h4></div>
						 		
						 	</div>						
							<div class="row align-items-center">
								<div class="col-md-6 col-7">
									<img class="walletImg" src="images/project/${v['type']}Wallet.png" alt="walletPageBackground">
								</div>
								<div class="col-md-6 col-12">
									<div class="walletPgLabel">
										<?php echo $translations['M00915'][$language]; /* Wallet Balance */?>
									</div>
									<div id="walletBal" class="walletPgAmt">${addCommas(Number(v['balance']).toFixed(v['decimal']))}</div>	
								</div>
							</div>
						</div>
					`;
				}else{
					buildWallet +=`
						<div class="col-md-6 col-12 my-3 my-md-0 walletWrapper ${k == 0 ? 'active' : ''}" id="${v['type']}" onclick="getThisWallet(this,'${v['type']}','${v['creditDisplay']}')">
						 	<div class="row justify-content-between mx-0">
						 		<div><h4>${v['creditDisplay']}</h4></div>
						 		<div>
						 			<a href="javascript:;" class="walletMoreBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" x-placement="bottom-right">
										<i class="fa fa-ellipsis-h" style="color: #000;"></i>
									</a>
						 			<div class="dropdown-menu walletDropdown" role="menu">
										${buildMenu}
									</div>
						 		</div>
						 	</div>						
							<div class="row align-items-center">
								<div class="col-md-6 col-7">
									<img class="walletImg" src="images/project/${v['type']}Wallet.png" alt="walletPageBackground">
								</div>
								<div class="col-md-6 col-12">
									<div class="walletPgLabel">
										<?php echo $translations['M00915'][$language]; /* Wallet Balance */?>
									</div>
									<div id="walletBal" class="walletPgAmt">${addCommas(Number(v['balance']).toFixed(v['decimal']))}</div>	
								</div>
							</div>
						</div>
					`;
				}
				
				// buildWallet +=`
				// 	<div class="col-md-4 mt-md-0 mt-4 mb-4">
				// 		<div class="dashboardWalletBox px-0">
				// 			<div class="col-12">
				// 				<div class="row">
				// 					<div class="col-10 dashboardSection03Text01">
				// 						${v['creditDisplay']}
				// 					</div>
				// 					<div class="col-2">
				// 						<div class="dropdownBtn px-1">
				// 							<i class="fa fa-ellipsis-h" style="color: #fff;"></i>
				// 							<div class="dropdownBox">
				// 								${buildMenu}
				// 							</div>
				// 						</div>
				// 					</div>
				// 					<div class="col-12">
				// 						<div class="dashboardSection03Line"></div>
				// 					</div>
				// 					<div class="col-12 mt-4">
				// 						<div class="dashboardSection03Text03">
				// 						<img src="images/project/creditcard_icon.png" class="mr-1" data-lang='M00097'>
				// 							<?php echo $translations['M00097'][$language]; /* Balance */ ?>
				// 						</div>
				// 						<div class="dashboardSection03Text02">
				// 							$ ${addCommas(Number(v['balance']).toFixed(v['decimal']))} 
				// 						</div>
				// 					</div>
				// 				</div>
				// 			</div>
				// 		</div>
				// 	</div>
				// `;

			});

			$('.buildWallet').html(buildWallet);
			pagingCallBack();

			// $('.walletWrapper').on('click',function(){
			// 	$(".walletWrapper").not(this).removeClass("active");
			// 	$(this).addClass("active");
			// })

			

			$('.goFundIn').click(function() {
				var getType = $(this).attr('data-type');
				var creditType = $(this).attr('creditType');

				$.redirect('fundIn.php', {
					getType 	: getType,
					creditType 	: creditType
				});
			})
		}
	}
		
	function getThisWallet(e, currentCreditType,currentCreditDisplay){
				$(".walletWrapper").removeClass("active");
				$(e).addClass("active");
				console.log(e)
				saveCreditType = currentCreditType
				$("#currCreditType").text(currentCreditDisplay)
				pagingCallBack();
			}

	function redirectWithdrawalCredits(credit, creditDisplay) {
		$.redirect("withdrawal.php", {creditType: credit, creditDisplay : creditDisplay});
	}

	function redirectWithdrawalListing(credit) {
		$.redirect("withdrawalListing.php", {creditType: credit});
	}
</script>
