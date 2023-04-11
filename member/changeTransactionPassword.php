<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
    <div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00087'][$language]; //Change Transaction Password ?>
        </div>
        <div class="col-12">
            <div id="editPassword" class="row">

                <div class="col-md-8 col-lg-7 col-12">
                    <div class="">
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00088'][$language]; //Old Transaction Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="currentTPassword" class="form-control inputDesign" type="password">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00089'][$language]; //New Transaction Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="newTPassword" class="form-control inputDesign" type="password">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00090'][$language]; //Retype New Transaction Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="newTPasswordConfirm" class="form-control inputDesign" type="password">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button id="resetBtn" type="button" class="btn btn-default"><?php echo $translations['M00085'][$language]; //Reset ?></button>
                                <button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button> 
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
	// Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;


    $(document).ready(function() {
        $('#nextBtn').click(function() {
        	$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

        	if ($('#currentTPassword').val()=="") {
        		errorDisplay("currentTPassword","<?php echo $translations['M00520'][$language]; //Please Enter Your Current Transaction Password. ?>");
        	}else if($('#newTPassword').val()==""){
        		errorDisplay("newTPassword","<?php echo $translations['M00521'][$language]; //Please Enter Your New Transaction Password. ?>");
        	}else if($('#newTPasswordConfirm').val()==""){
        		errorDisplay("newTPasswordConfirm","<?php echo $translations['M00522'][$language]; //Please Retype Your New Transaction Password. ?>");
        	}else{
        		var canvasBtnArray = {
			        Confirm: '<?php echo $translations['M00086'][$language]; /* Confirm */ ?>'
			    };

        		showMessage('<?php echo $translations["M00519"][$language]; /* This will change the settings for your changes. Are you sure that you want to proceed */ ?> ?', 'warning', '<?php echo $translations["M00523"][$language]; /* Change settings */ ?>', '', '', canvasBtnArray);

        		$('#canvasConfirmBtn').click(function() {
        			confirmModal();
        		});
        	}
        });

        // reset to default search
        $('#resetBtn').click(function() {
            $('#editPassword').find('input').each(function() {
                $(this).val('');
            });
            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
        });

        $('#confirmBtn').click(function(){
            var currentTPassword    = $('#currentTPassword').val();
            var newTPassword        = $('#newTPassword').val();
            var newTPasswordConfirm = $('#newTPasswordConfirm').val();
            var formData           = {
                                        command            : "memberChangeTransactionPassword",
                                        currentPassword    : currentTPassword,
                                        newPassword        : newTPassword,
                                        newPasswordConfirm : newTPasswordConfirm
            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function submitCallback(data, message) {
    	showMessage('<?php echo $translations["M00524"][$language]; /* Successful changed password */ ?>.', 'success', '<?php echo $translations["M00331"][$language]; /* Change Password */ ?>', '', 'changeLoginPassword.php');
    }

    function confirmModal() {
        var currentTPassword    = $('#currentTPassword').val();
        var newTPassword        = $('#newTPassword').val();
        var newTPasswordConfirm = $('#newTPasswordConfirm').val();
        var formData           = {
                                    command            : "memberChangeTransactionPassword",
	                                currentPassword    : currentTPassword,
		                            newPassword        : newTPassword,
		                            newPasswordConfirm : newTPasswordConfirm
        };
        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
