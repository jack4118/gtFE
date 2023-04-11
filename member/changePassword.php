<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<section class="pageContent loginPagePadding">
	<div class="col-12 pageTitle">
		<?php echo $translations['M00580'][$language]; // Change Password ?>
	</div>
	<!-- <div class="col-12 PageTitleSub" style="margin-top: 30px;">
		PASSWORD
	</div>
	<div class="col-12">
		<hr>
	</div> -->
	<div class="col-12 whiteBg" style="margin-top: 20px;">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="form-group col-lg-5 col-sm-6 col-12">
						<label class="formLable" data-lang="M03508"><?php echo $translations['M03508'][$language]; /* Current Password */?></label>
						<input id="currentPassword" type="password" class="form-control formDesign">
						<span id="currentPasswordError" class="customError text-danger"></span>
					</div>
				</div>
			</div>
			<div class="col-12" style="margin-top: 20px;">
				<div class="row">
					<div class="form-group col-lg-5 col-sm-6 col-12">
						<label class="formLable" data-lang="M00573"><?php echo $translations['M00573'][$language]; /* New Password */?></label>
						<input id="newPassword" type="password" class="form-control formDesign">
						<span id="newPasswordError" class="customError text-danger"></span>
					</div>
				</div>
			</div>
			<div class="col-12" style="margin-top: 20px;">
				<div class="row">
					<div class="form-group col-lg-5 col-sm-6 col-12">
						<label class="formLable" data-lang="M03509"><?php echo $translations['M03509'][$language]; /* Retype New Password */?></label>
						<input id="newPasswordConfirm" type="password" class="form-control formDesign">
						<span id="newPasswordConfirmError" class="customError text-danger"></span>
					</div>
				</div>
			</div>

			<div class="col-12" style="margin-top: 20px;">		
					<button id="changePasswordBtn" type="button" class="btn btn-primary" data-lang="M03510"><?php echo $translations['M03510'][$language]; /* Save */?></button>	
			</div>
		</div>
	</div>
</section>
<!-- end:: Content -->

<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<!-- <div id="kt_scrolltop" class="kt-scrolltop">
<i class="fa fa-arrow-up"></i>
</div> -->

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

$(document).ready(function() {
	$('#changePasswordBtn').click(function() {
    	$(".invalid-feedback").remove();
    	$('input').removeClass('is-invalid');

    	var currentPassword = $('#currentPassword').val();
    	var newPassword = $('#newPassword').val();
    	var newPasswordConfirm = $('#newPasswordConfirm').val();

    	var formData  = {
            command				: "memberChangePassword",
            passwordCode		: 1,
            currentPassword		: currentPassword,
            newPassword			: newPassword,
            newPasswordConfirm	: newPasswordConfirm
        };
            
        fCallback = successChangePassword;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
});

function successChangePassword(data, message) {
	showMessage("<?php echo $translations['M03511'][$language]; /* Success Change Password */ ?>", "success", "<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>", "success", "changePassword");
}

</script>