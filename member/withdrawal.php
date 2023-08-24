<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
	<div class="col-12 pageTitle" data-lang="M00172">
		<span id="walletName"></span> - <?php echo $translations['M00172'][$language]; // Withdrawal ?>
	</div>
	<div class="mt-3 section1_div">
	    <div class="row align-items-center">
	        <div class="col-12">

	            <div class="whiteBg">
	                <div class="row">
	                	<div class="col-12">
	                		<div class="row">
	                			<div class="form-group col-lg-5 col-sm-6 col-12">
									<span class="withdrawBalance" data-lang="M00232"><?php echo $translations['M00232'][$language]; //Available Balance ?> : <span id="balance"></span></span>
								</div>
	                		</div>
	                	</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12">
							<label class="registrationLabel" data-lang="M00457"><?php echo $translations['M00457'][$language]; //Withdrawal Amount ?></label>
							<input id="amount" type="text" class="form-control formDesign" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
							<span id="amountError" class="customError text-danger"></span>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12">
							<label class="registrationLabel" data-lang="M00465"><?php echo $translations['M00465'][$language]; //Amount Receivable ?></label>
							<input id="receivableAmount" type="text" class="form-control formDesign" disabled>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M00487"><?php echo $translations['M00487'][$language]; //Account Holder Name ?></label>
							<input id="accHolderName" type="text" class="form-control formDesign" disabled>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M03615"><?php echo $translations['M03615'][$language]; //Bank ?></label>
							<input id="bank" type="text" class="form-control formDesign" disabled>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M00471"><?php echo $translations['M00471'][$language]; //Branch ?></label>
							<input id="branch" type="text" class="form-control formDesign" disabled>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></label>
							<input id="city" type="text" class="form-control formDesign" disabled>
						</div>
	                	<div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></label>
							<input id="accNum" type="text" class="form-control formDesign" disabled>
						</div>
	                	<!-- <div class="form-group col-lg-5 col-sm-6 col-12 bankWrap" style="margin-top: 20px;display:none;">
							<label class="registrationLabel" data-lang="M00181"><?php echo $translations['M00181'][$language]; //Province ?></label>
							<input id="province" type="text" class="form-control formDesign" disabled>
						</div> -->
	                	<div class="form-group col-lg-5 col-sm-6 col-12" style="margin-top: 20px">
							<label class="registrationLabel" data-lang="M02307"><?php echo $translations['M02307'][$language]; //Transaction Password ?></label>
							<input id="transactionPassword" type="password" class="form-control formDesign">
						</div>
						<div class="form-group col-lg-5 col-sm-6 col-12 addBankBtn" style="margin-top: 20px;display:none;">
							<a href="bankAccount" type="button" class="btn btn-primary" data-lang="M00585">
								<?php echo $translations['M00585'][$language]; /* Add Bank Account */?>
							</a>
						</div>
						<div class="col-12" style="margin-top: 20px;">		
							<button id="nextBtn" type="button" class="btn btn-primary" data-lang="M02674">
								<?php echo $translations['M02674'][$language]; /* Next */?>
							</button>										
						</div>	            
	                </div>
	            </div>
	        </div>
	    </div>	
	</div>
</section>

<div class="modal fade successModal" id="withdrawConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span class="modal-title" data-lang="M00027"><?php echo $translations['M00027'][$language]; //Withdrawal Confirmation ?></span> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <table style="width: 100%;">
                	<tr>
                		<td class="pt-3 bold" data-lang="M03726"><?php echo $translations['M03726'][$language]; //Withdraw to ?></td>
                		<td class="pt-3" id="bank_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M00487"><?php echo $translations['M00487'][$language]; //Account Holder Name ?></td>
                		<td class="pt-3" id="holderName_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M00471"><?php echo $translations['M00471'][$language]; //Branch ?></td>
                		<td class="pt-3" id="branch_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></td>
                		<td class="pt-3" id="city_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></td>
                		<td class="pt-3" id="accNo_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M00457"><?php echo $translations['M00457'][$language]; //Withdrawal Amount ?></td>
                		<td class="pt-3" id="amount_c"></td>
                	</tr>
                	<tr>
                		<td class="pt-3 bold" data-lang="M03727"><?php echo $translations['M03727'][$language]; //Net Withdrawal Amount ?></td>
                		<td class="pt-3" id="netAmt_c"></td>
                	</tr>
                </table>
            </div>
            <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-default" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
                 <button id="confirmWithdrawBtn" type="button" class="ml-3 btn btn-primary" data-dismiss="modal" data-lang="M02664">
                    <?php echo $translations['M02664'][$language]; //Confirm ?>
                 </button>
            </div>
        </div>
    </div>
</div>


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
	var fCallback = "";
	var type;
	var walletName = "<?php echo $_POST['walletName']; ?>";
	var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var walletAddress,amount,transactionPassword;
	var creditType		= "<?php echo $_POST['creditType']; ?>";
	var minAmount,maxAmount,adminFee,totalDeductible,totalAdminFee,cryptoType;
	var qrImg,imgName;
	var file,reader,test;
	var uploadQR ="";
	var receiveAmount =0;
	var creditAdminCharges = {};
	var type = ""; 
	var withdrawalType = "";
	var bankID;
	var branch;
	var bankName;
	var holderName;
	var accNo;
	var city;


	$(document).ready(function(){
		$("#walletName").html(creditDisplay);
		console.log(creditDisplay)
		var formData = {
			'command' : "getCreditData",
			creditType : creditType,
			type : "withdrawal"
		};
		var fCallback = loadWithdrawalData;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#nextBtn").click();
			}
		});

		// default data
		type = "bank";

  		$('#amount').keyup(function() {
        	totalAmount = $('#amount').val();
			// adminFeeCal = totalAmount * (parseFloat(adminFee)/100);
			// receiveAmount = totalAmount - adminFeeCal;
			// $('#totalDeductible').val((parseFloat(receiveAmount).toFixedNoRounding(8)));
			$('#receivableAmount').val(totalAmount);
		});

		$("#nextBtn").click(function(){

			$('.invalid-feedback').remove();
			$('input').removeClass('is-invalid');
			type = type;
			bankID = bankID;
			branch = $('#branch').val();
			amount = $("#amount").val();
			city = $('#city').val();
			transactionPassword = $("#transactionPassword").val();
			var accountNumber = $('#accNum').val()

			if(amount == "")
			{
				errorDisplay("amountError", "<?php echo $translations['M03728'][$language]; //Please Enter Withdraw Amount. ?>");
			} else if (amount == 0) {
				errorDisplay("amountError", "<?php echo $translations['M03729'][$language]; //This Amount Cannot Be 0. ?>");
			} 
			// else if (receiveAmountCal-balanceCal>0) {
			// 	errorDisplay("amount", "<?php echo $translations['E00266'][$language]; //Insufficient Balance ?>");
			// }
			else if(transactionPassword == "")
			{
				errorDisplay("transactionPassword", "<?php echo $translations['E00128'][$language]; //Please enter transaction password. ?>");
			}
			else
			{
				var formData = {
					'command' : "memberAddNewWithdrawal",
					type					: type,
					creditType				: creditType,	
					amount					: amount,
					transactionPassword		: transactionPassword,	
					bankID					: bankID,
					accountNumber			: accountNumber,		
					branch					: branch,
					bank_city 				: city
				};

				var fCallback = withdrawConfirmation;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
		});
	});

	function loadWithdrawalData(data, message) {
		if(data.hasBankFlag == 1){
			$('.bankWrap').show()
			$('.addBankBtn').hide()
		}else{
			$('.bankWrap').hide()
			$('.addBankBtn').show()
			$('.addBankBtn').addClass('d-flex align-items-end')
		}
		balance = data.balance;
		// adminFee = data.adminFeePercentage;
		$('#balance').text(addCommas(Number(balance).toFixed(2)));   
		// $('#totalAdminFee').val(adminFee);   

     	$.each(data.walletData, function(k, v){
     		if(v['credit_type'] == cryptoType)$('#walletAddress').val(v['info']);
        });

        var bankData = data.bankData;

        if(bankData != '-' || bankData != ""){
			$('#accHolderName').val(bankData[0]['account_holder']);
			$('#bank').val(bankData[0]['bank_display']);
			$('#accNum').val(bankData[0]['account_no']);
			$('#branch').val(bankData[0]['branch']);
			$('#city').val(bankData[0]['bank_city']);
			bankID = bankData[0]['bank_id']
			bankName = bankData[0]['bank_display']
			holderName = bankData[0]['account_holder']
			accNo = bankData[0]['account_no']
			branch = bankData[0]['branch']
			city = bankData[0]['bank_city']
			// $('#province').val(bankData[0]['province']);
        }
	}

	function withdrawConfirmation(data, message) {
		$('#bank_c').text(bankName);
		$('#holderName_c').text(holderName);
		$('#accNo_c').text(accNo);
		$('#branch_c').text(branch);
		$('#city_c').text(city);
		$('#amount_c').text(numberThousand(data.totalAmount,2));
		$('#netAmt_c').text(numberThousand(data.receivableAmount,2));

		$("#withdrawConfirmModal").modal('show');
		$("#confirmWithdrawBtn").click(function(){
			type = type;
			bankID = bankID;
			branch = $('#branch').val();
			amount = $("#amount").val();
			city = $('#city').val();
			transactionPassword = $("#transactionPassword").val();
			var accountNumber = $('#accNum').val()
			var formData = {
				'command' 				: "memberAddNewWithdrawalConfirmation",
				type					: type,
				creditType				: creditType,	
				amount					: amount,
				transactionPassword		: transactionPassword,	
				bankID					: bankID,
				accountNumber			: accountNumber,		
				branch					: branch,
				bank_city				: city
			};

			var fCallback = withdrawSuccess;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		})
	}

	function withdrawSuccess(data,message){
		$("#withdrawConfirmModal").modal('hide');
		showMessage(message, 'success', '<span data-lang="M02651"><?php echo $translations['M02651'][$language]; //Congratulation ?></span>', 'success', 'dashboard');
	}

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // $('#blah').attr('src', e.target.result);
                $("#imgData").empty().val(reader["result"]);
                $("#imgName").empty().val(input.files[0]["name"]);
                $("#imgSize").empty().val(input.files[0]["size"]);
                $("#imgType").empty().val(input.files[0]["type"]);
                $("#fileName").empty().val(input.files[0]["name"]);
                // alert($("#imgName").val());
                // alert($("#imgType").val());
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

	$("#upload").change(function(){
        readURL(this);
    });

    function chooseFile() {
      $("#upload").click();
  }


</script>
