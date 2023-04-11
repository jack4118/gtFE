<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="kt-container kt-grid__item kt-grid__item--fluid standardPageMargin">
	<div class="row">
		<div class="col-12 PageTitleSub">
			ADD BANK ACCOUNT
		</div>

		<div class="col-12" style="margin-top: 5px; margin-bottom: 5px;">
			<hr>
		</div>

		<div class="col-12 PageTitle">
			Account Information
		</div>
		<div class="col-12 my-3">
			<span class="ProductSansStyle f-16 blueFontStyle" style=""><?php echo $translations["M00035"][$language]; /* Full Name */ ?>: <span id="fullname"></span></span>
			<span class="ml-md-5 ProductSansStyle f-16 d-inline-block blueFontStyle" style=""><?php echo $translations["M00036"][$language]; /* Username */ ?>: <span id="username"></span></span>
			<span class="ml-5 ProductSansStyle f-16 blueFontStyle" style=""><?php echo $translations["M00081"][$language]; /* Member ID */ ?>: <span id="memberId"></span></span>
		</div>
		
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">ACCOUNT HOLDER NAME</label>
					<input id="accHolderName" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">BANK</label>
					<select id="bankType" class="form-control formDesign" id="exampleSelect1">
						<option value="">
                            <?php echo $translations["M00073"][$language]; /* Please select a bank */ ?>
                        </option>
					</select>
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">ACCOUNT NO</label>
					<input id="accountNo" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">PROVINCE</label>
					<input id="province" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">BRANCH</label>
					<input id="branch" type="text" class="form-control formDesign">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable">TRANSACTION PASSWORD</label>
					<input id="tPassword" type="PASSWORD" class="form-control formDesign">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">

				<button id="submitBtn" type="button" class="btn btn-primary">Confirm</button>

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
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0; 
    var accHolderName, bankType, accountNo, province, branch, tPassword;

    $(document).ready(function() {
        formData        = {command : 'getBankAccountDetailMember'};
        fCallback       = loadDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
        	$("input,select").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

            accHolderName       = $('#accHolderName').val();
	        bankType            = $('#bankType').find('option:selected').val();
	        accountNo       	= $('#accountNo').val();
	        province            = $('#province').val();
	        branch              = $('#branch').val();
	        tPassword 			= $('#tPassword').val();

	        if (accHolderName=="") {
        		errorDisplay("accHolderName","Please Enter Your Account Holder Name.");
        	}else if(bankType==""){
        		errorDisplay("bankType","Please Choose Your Bank.");
        	}else if(accountNo==""){
        		errorDisplay("accountNo","Please Enter Your Account Number.");
        	}else if(province==""){
        		errorDisplay("province","Please Enter Your Province.");
        	}else if(branch==""){
        		errorDisplay("branch","Please Enter Your Branch.");
        	}else if(tPassword==""){
        		errorDisplay("tPassword","Please Enter Your Transaction Password.");
        	}else{
	        	var canvasBtnArray = {
			        Confirm: '<?php echo $translations['M00077'][$language]; /* Confirm */ ?>'
			    };

	    		showMessage('<?php echo $translations["M00519"][$language]; /* This will change the settings for your changes. Are you sure that you want to proceed */ ?> ?', 'warning', '<?php echo $translations["M00523"][$language]; /* Change settings */ ?>', '', '', canvasBtnArray);

	    		$('#canvasConfirmBtn').click(function() {
	    			confirmModal();
	    		});
	    	}
        });
    });

    function loadDetail(data, message) {
        var clientDetail = data.clientDetails;
        $('#username').text(clientDetail.username);
        $('#fullname').text(clientDetail.name);
        $('#memberId').text(clientDetail.id);
        $('#accHolderName').val(clientDetail.username);

        loadBankDropdown(data.bankDetails);
    }

    // Set the activity type dropdown in the search part
    function loadBankDropdown(data) {
        if(data) {
            $.each(data, function(key) {
                    $('#bankType').append('<option id="'+data[key]['id']+'" value="'+data[key]['id']+'" name="'+data[key]['name']+'">'+data[key]['name']+'</option>');
                });
        } else {
	        var message  = '<?php echo $translations["M00596"][$language]; /* No Banks found */ ?>.';
	        showMessage(message, 'error', '<?php echo $translations["M00197"][$language]; //Failed ?>', 'exclamation-triangle', '');
    	}
    }

    function confirmModal() {
        var accHolderName       = $('#accHolderName').val();
        var bankType            = $('#bankType').find('option:selected').val();
        var accountNo       	= $('#accountNo').val();
        var province            = $('#province').val();
        var branch              = $('#branch').val();
        var tPassword 			= $('#tPassword').val();

        var formData  = {
                            command             : "addBankAccountDetailMember",
                            accHolderName       : accHolderName,
                            bankType            : bankType,
                            accountNo       	: accountNo,
                            province            : province,
                            branch              : branch,
                            tPassword : tPassword
        }
        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function submitCallback(data, message) {
    	showMessage('<?php echo $translations["M00598"][$language]; /* Successful add bank account */ ?>.', 'success', '<?php echo $translations["M00599"][$language]; /* Add New Bank Account */ ?>', 'edit', 'bankAccountListing.php');
    }

</script>
