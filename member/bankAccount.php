<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="pageContent loginPagePadding">
	<div class="pageTitle" data-lang="M02145">
		<?php echo $translations['M02145'][$language]; //Bank Account ?>
	</div>
	<div class="mt-3 whiteBg">
		<div class="row">
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03163"><?php echo $translations['M03163'][$language]; //Bank Name ?></label>
				<select id="bankName" class="form-control bankField">
                    <!-- <option value=""><?php echo $translations['M03442'][$language]; //Select Bank ?></option> -->
                </select>
				<span id="bankType"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03164"><?php echo $translations['M03164'][$language]; //Bank Branch ?></label>
				<input id="branchInp" type="text" class="form-control bankField">
				<span id="branch"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03166"><?php echo $translations['M03166'][$language]; //Bank City ?></label>
				<input id="bankCityInp" type="text" class="form-control bankField">
				<span id="bankCity"></span>
			</div>
			<div class="form-group col-lg-6 ccol-12">
				<label data-lang="M03168"><?php echo $translations['M03168'][$language]; //Account Holder's Name ?></label>
				<input id="holderInp" type="text" class="form-control bankField">
				<span id="accHolderName"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></label>
				<input id="accNoInp" type="text" class="form-control bankField">
				<span id="accountNo"></span>
			</div>
			<div class="mt-3 col-12">
				<button type="button" id="saveBankBtn" class="btn-primary btn" style="display:none"><?php echo $translations['M02756'][$language]; //Save ?></button>
			</div>
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


	$(document).ready(function(){
		var formData  = {
            command   : "getBankAccountDetail"
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("#saveBankBtn").click(function(){
			$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
            var accountHolder = $('#holderInp').val();
            var bankID = $('#bankName').val();
            var accountNo = $('#accNoInp').val();
            var bankCity = $('#bankCityInp').val();
            var branch = $('#branchInp').val();

            formData  = {
	            command 			: "addBankAccountDetail",
	            accountHolder 		: accountHolder,
				bankID 				: bankID,
				accountNo 			: accountNo,
				bankCity 			: bankCity,
				branch 				: branch
	        };

	        fCallback = addBankSuccess;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	});

	function loadDefaultListing(data,message){
		if(data.bankDetails){
			var bankOptionHTML = '<option value=""><?php echo $translations['M03442'][$language]; //Select Bank ?></option>';
			$.each(data.bankDetails,function(k,v){
				bankOptionHTML += `<option value='${v['id']}'>${v['display']}</option>`;
			});
			$("#bankName").html(bankOptionHTML)
		}

		var bankData = data.clientDetails;
		if(bankData.hasBank == 1){
			$("#bankName").val(bankData.bankID);
			$("#branchInp").val(bankData.branch);
			$("#bankCityInp").val(bankData.bank_city);
			$("#holderInp").val(bankData.accountHolder);
			$("#accNoInp").val(bankData.accountNo);
			$(".bankField").attr('disabled',true);
			$("#saveBankBtn").hide();
		}else{
			$(".bankField").attr('disabled',false);
			$("#saveBankBtn").show();
		}
	}

	function addBankSuccess(data,message){
		showMessage(message, 'success', '<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>', 'success', 'bankAccount');
	}
</script>
