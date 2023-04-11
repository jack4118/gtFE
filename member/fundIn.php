<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<span id="walletName"></span> - <?php echo $translations["M00371"][$language]; //Deposit ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div class="row">
	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M02091'][$language]; /* Fund In Amount */?><span class="mustFill">*</span></label>
	                        <input id="amount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
	                        <div id="amountError" class="invalid-feedback" style="display: block;"></div>
	                    </div>


	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M00278'][$language]; /* Crypto Type */?></label>

	                        <div id="cryptoType" class="kt-radio-list" style="margin-top: 10px;">
	                        	
	                        </div>

	                        <!-- <select id="cryptoType" class="form-control inputDesign" disabled>
	                        </select> -->
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00980'][$language]; /* Crypto Rate */?></label>
	                        <input id="cryptoRate" class="form-control inputDesign" type="text" disabled>
	                    </div>

	                    <!-- <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M02094'][$language]; /* Total Amount */?> (USDT)</label>
	                        <input id="convertedAmount" class="form-control inputDesign" type="text" disabled>
	                    </div> -->

	                    <!-- <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel">Transaction Password <span class="mustFill">*</span></label>
	                        <input id="fullName" class="form-control inputDesign" type="password">
	                    </div> -->

	                </div>
	            </div>


	            

	           
	        </div>
	    </div>

	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="nextBtn" type="button" class="btn btn-primary"><?php echo $translations['M00034'][$language]; /* Next */?></button>
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

    // var getType = '<?php echo $_POST['getType']; ?>';
    var creditType = '<?php echo $_POST['creditType']; ?>';
    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";

    $(document).ready(function(){
    	$("#walletName").html(creditDisplay);
        var formData  = {
            command   	: "getCreditData",
            type 	    : "fundIn",
            creditType 	: creditType
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
	});

	function loadDefaultListing (data,message) {
		console.log(data);
		$('#cryptoType').append(`

			<label class="kt-radio selectPackage">
				<input checked id="${data["coin_type"]}" type="radio" name="cryptoType" value="${data["coin_value"]}" dataRate="${data["rate"]}"><img src="images/icon/${creditType}.png" class="cryptoIcon">${data["coin_display"]}
				<span></span>
			</label>
			`);

		// <option id="'++'" name="'+data["coin_value"]+'" value="'+data["rate"]+'" selected>'+data["coin_display"]+'</option>
		$('#cryptoRate').empty().val(data.rate);
		$('#amount').empty().val(0);
		$('#convertedAmount').val(0);
	}

	$('#amount').on('input', function() {
		calculateAmount();
	});

	function calculateAmount(){
    	var amount = $('#amount').val();
    	var cryptoRate = $('#cryptoRate').val();
		var convertedAmount = amount * cryptoRate;
		$('#convertedAmount').val(convertedAmount);
    }

    $('#nextBtn').click(function(){
    	$('#amountError').hide();
    	var amount 		= $('#amount').val();
    	var coin_type 	= $("input[name=cryptoType]:checked").val();
    	// var coin_type 	= $('#cryptoType').find("option:selected").attr("name");

    	if (amount <= 0) {
    		$('#amount').focus();
    		$('#amountError').show();
    		$('#amountError').html('<?php echo $translations['E00828'][$language]; //Invalid Amount ?>');
    	} else {

    		
    		$.redirect('fundInConfirmation.php',{
    			amount : amount,
    			coin_type : coin_type,
    			creditDisplay : creditDisplay
    		});
    	}
    	
    	
    });

    function loadGetTokenCallback (data,message) {

		var url = data['qrPayURL'];
		var form = $('<form action="' + url + '" method="post">' +
		  '<input type="text" name="transaction_token" value="' + data['transaction_token'] + '" />' +
		  '</form>');
		$('body').append(form);
		form.submit();
	}


</script>