<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="kt-container kt-grid__item kt-grid__item--fluid standardPageMargin form_bg">
	<div class="row">
		<div id="walletName" class="col-12 PageTitleSub" style="color: #1B75BB; text-transform: uppercase;">
		</div>
		<div class="col-12 PageTitleSub">
			<?php echo $translations['M00261'][$language]; //CREDIT TRANSFER ?>
		</div>
		<div class="col-12" style="margin-top: 5px; margin-bottom: 5px;">
			<hr>
		</div>
		<div class="col-12 PageTitle" style="margin-top: 30px;">
			<?php echo $translations['M00021'][$language]; //Credit Balance ?> : <span id="balance"></span>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00101'][$language]; //Transfer Amount ?><span class="kt-font-danger">*</span></label>
					<input id="transferAmount" type="text" class="form-control formDesign" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
				</div>
			</div>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00036'][$language]; //Username ?><span class="kt-font-danger">*</span></label>
					<input id="receiverUsername" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00099'][$language]; //Remark ?></label>
					<input id="remark" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00042'][$language]; //Transaction Password ?><span class="kt-font-danger">*</span></label>
					<input id="transactionPassword" type="Password" class="form-control formDesign">
				</div>
			</div>
		</div>


		<div class="col-12" style="margin-top: 20px;">

			<button type="button" id="nextBtn" class="btn btn-primary"><?php echo $translations['M00034'][$language]; //Next ?></button>

		</div>
	</div>
</div>
<!-- end:: Content -->
<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
	var url             = 'scripts/reqDefault.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";
	var type = 1;
	var transferAmount,receiverUsername,remark,transactionPassword;
	var creditType    = "<?php echo $_POST['creditType']; ?>";
	var balance = "<?php echo $_POST['balance']; ?>";
	var walletName = "<?php echo $_POST['walletName']; ?>";



	$(document).ready(function(){

		if (!creditType) {
			var message  = '<?php echo $translations['M00115'][$language]; //You don’t have permission to access. Please try again later. ?>';
            showMessage(message, 'warning', '<?php echo $translations['M00197'][$language]; //Failed ?>', '', 'dashboard.php');
            return;
		}

		$('#walletName').html(walletName);

		$('#balance').text(currencyFormat(parseFloat(balance),2));

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#nextBtn").click();
			}
		});

		$("#nextBtn").click(function(){
			$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

			transferAmount = $("#transferAmount").val();
			receiverUsername = $("#receiverUsername").val();
			remark = $("#remark").val();
			transactionPassword = $("#transactionPassword").val();

			if(transferAmount == "")
			{
				errorDisplay("transferAmount", "<?php echo $translations['M00491'][$language]; //Enter your transfer amount ?>");
			}
			else if (transferAmount == 0)
			{
				errorDisplay("transferAmount", "<?php echo $translations['M00527'][$language]; //This Amount Cannot Be 0. ?>");
			}
			else if (transferAmount > parseFloat(balance))
			{
				errorDisplay("transferAmount", "<?php echo $translations['E00266'][$language]; //Insufficient Balance. ?>");
			}
			else if(receiverUsername == "")
			{
				errorDisplay("receiverUsername", "<?php echo $translations['E00656'][$language]; //Please Enter User Name. ?>");
			}
			else if(transactionPassword == "")
			{
				errorDisplay("transactionPassword", "<?php echo $translations['E00128'][$language]; //Please enter transaction password. ?>");
			}
			else
			{
				var formData = {
					'command' : 'memberTransferCredit',
					'type' : type,
					'creditType' : creditType,
					'balance' : balance,
					'transferAmount' : transferAmount,
					'receiverUsername' : receiverUsername,
					'remark' : remark,
					'transactionPassword' : transactionPassword
				};

				var fCallback = transferConfirmation;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
		});
	});

	function transferConfirmation(data, message)
	{
		$.redirect('transferConfirmation.php',{
			type : type,
			creditType : creditType,
			balance : balance,
			transferAmount : transferAmount,
			receiverUsername : receiverUsername,
			remark : remark,
			transactionPassword : transactionPassword,
			walletName : walletName
		});
	}

	function errorDisplay(type,errorMsg){

		$("#"+type).addClass('is-invalid');
		$("#"+type).after('<div class="invalid-feedback">'+errorMsg+'</div>');
		$("#"+type).focus();

	}
</script>
