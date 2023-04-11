<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
    <div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00082'][$language]; //Change Login Password ?>
        </div>
        <div class="col-12">
            <div id="editPassword" class="row">

                <div class="col-lg-7 col-md-8 col-12">
                    <div class="">
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00002'][$language]; //Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="currentPassword" class="form-control inputDesign" type="password">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00083'][$language]; //New Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="newPassword" class="form-control inputDesign" type="password">    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5"><?php echo $translations['M00084'][$language]; //Retype New Password ?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="newPasswordConfirm" class="form-control inputDesign" type="password">    
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

        	if ($('#currentPassword').val()=="") {
        		errorDisplay("currentPassword","<?php echo $translations['M00516'][$language]; //Please Enter Your Current Password. ?>");
        	}else if($('#newPassword').val()==""){
        		errorDisplay("newPassword","<?php echo $translations['M00517'][$language]; //Please Enter Your New Password. ?>");
        	}else if($('#newPasswordConfirm').val()==""){
        		errorDisplay("newPasswordConfirm","<?php echo $translations['M00518'][$language]; //Please Retype Your New Password. ?>");
        	}else{
        		var canvasBtnArray = {
			        Confirm: '<?php echo $translations['M00086'][$language]; //Confirm ?>'
			    };

        		showMessage('<?php echo $translations['M00519'][$language]; //This will change the settings for your changes. Are you sure that you want to proceed ?> ?', 'warning', '<?php echo $translations["M00523"][$language]; //Change settings ?>', '', '', canvasBtnArray);

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

        $('#confirmBtn').click(function() {
            var currentPassword    = $('#currentPassword').val();
            var newPassword        = $('#newPassword').val();
            var newPasswordConfirm = $('#newPasswordConfirm').val();
            var formData           = {
                                        command            : "memberChangePassword",
                                        currentPassword    : currentPassword,
                                        newPassword        : newPassword,
                                        newPasswordConfirm : newPasswordConfirm
            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function submitCallback(data, message) {
    	showMessage('<?php echo $translations["M00524"][$language]; //Successful changed password ?>.', 'success', '<?php echo $translations["M00331"][$language]; //Change Password ?>', '', 'changeLoginPassword.php');
    }

    function confirmModal() {
        var currentPassword    = $('#currentPassword').val();
        var newPassword        = $('#newPassword').val();
        var newPasswordConfirm = $('#newPasswordConfirm').val();
        var formData           = {
                                    command            : "memberChangePassword",
	                                currentPassword    : currentPassword,
		                            newPassword        : newPassword,
		                            newPasswordConfirm : newPasswordConfirm
        };
        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
