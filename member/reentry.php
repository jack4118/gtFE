<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Investment", $_SESSION['blockedRights'])){
        header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M02058'][$language]; //Pledge Principle ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div class="row">
	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00006'][$language]; //Pledge Principle Amount ?> <span class="mustFill">*</span></label>
	                        <input id="creditUnit" class="form-control inputDesign" type="text">
	                    </div>
	                </div>
	            </div>


	            

	           
	        </div>
	    </div>

	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="submitBtn" type="button" class="btn btn-primary" style="text-transform: uppercase;"><?php echo $translations['M00034'][$language]; //NEXT ?></button>
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
    var creditUnit;

    $(document).ready(function(){

    	$('#submitBtn').click(function(){
    		$('.invalid-feedback').remove();
    		$('input').removeClass('is-invalid');
    		
    		creditUnit = $('#creditUnit').val();

    		var formData  = {
    		    command: 'reentryVerification',
    		    creditUnit : creditUnit,
    		    type : "credit",
    		    step : 1

    		};
    		var fCallback = goPayment;
    		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	});
        
        
	});




function goPayment (data,message) {
	$.redirect('payment.php',{
		creditUnit : creditUnit
	});
}








</script>