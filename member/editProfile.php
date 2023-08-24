<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<?php
    if (in_array("Edit Profile", $_SESSION['blockedRights'])){
        header("Location: dashboard.php");
    }
?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00417'][$language]; //Edit Profile ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-lg-7 col-md-8 col-12">
	                <div class="">
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00081'][$language]; //Member ID ?></label>
	                        <div class="col-md-8">
	                        	<input id="memberId" class="form-control" type="text" disabled>
	                        </div>
	                        
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00036'][$language]; //Username ?></label>
	                        <div class="col-md-8">
	                        	<input id="username" class="form-control" type="text" disabled>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00037'][$language]; //Coutnry ?></label>
	                        <div class="col-md-8">
		                        <select class="form-control" id="country" disabled>
		                        </select>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00381'][$language]; //Mobile Number ?></label>
	                        <div class="input-group col-md-8">
	                        	<div class="input-group-append" style="background-color: #aaaaaa40"><span class="input-group-text form-control" id="dialCode"></span></div>
	                        	<input type="text" class="form-control" id="phone" disabled>
	                        </div>
	                    </div>
	                   	<div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00035'][$language]; //Full Name ?></label>
	                        <div class="col-md-8">
	                        	<input id="realName" type="text" class="form-control" disabled>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00320'][$language]; //Date of Birth ?></label>
	                        <div class="col-md-8">
	                        	<input id="datepicker" type="text" class="form-control" disabled>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00276'][$language]; //Email Address ?></label>
                        	<div class="col-md-8">
	                        	<input id="email" type="text" class="form-control" disabled>
                        	</div>
	                    </div>
	                    <!-- <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00044'][$language]; //Referral Username ?></label>
	                        <input id="introducer" type="text" class="form-control" disabled>
	                    </div> -->
	                    <div class="form-group row">
	                        <label class="col-md-4"><?php echo $translations['M00042'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
	                        <div class="col-md-8">
	                        	<input id="transactionPassword" type="password" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-12">
	                        	<button id="save" type="button" class="btn btn-primary"><?php echo $translations['M00561'][$language]; //Save Changes ?></button>
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

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span id="canvasTitle" class="modal-title"><?php echo $translations['M00417'][$language]; //Edit Profile ?></span> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo $translations['M00469'][$language]; //Are You Sure Want To Change Those Settings? ?></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00020'][$language]; //Close ?></button>
                <button id="confirmBtn" type="button" class="btn btnThemeModal" data-dismiss="modal"><?php echo $translations['M00077'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var type            = "<?php echo $_POST['type']; ?>";
var countryName;
var placementSetting;

$(document).ready(function(){
	var formData  = {
		command   : "getMemberDetails"
	};
	var fCallback = loadMemberDetail;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$('#country').change(function(){
			var phoneCode = $('#country option:selected').attr('data-countryCode');
			countryName = $('#country option:selected').attr('name');
			$('#dialCode').text("+"+phoneCode);
	});

	$('#datepicker').datepicker({
					autoclose: true,
					format: "yyyy-mm-dd"
	});

	$("#save").click(function(){
		$("input").each(function(){
			$(this).removeClass('is-invalid');
			$('.invalid-feedback').html("");
		});

		$('#confirmationModal').modal('show');
	});

	$('#save').click(function() {
		var realName = $('#realName').val();
		var passport = $('#passport').val();
		var datepicker = $('#datepicker').val();
		var weChat = $('#weChat').val();
		var whatsApp = $('#whatsApp').val();
		var country = $('#country').val();
		var address = $('#address').val();
		var memberId = $('#memberId').val();
		var username = $('#username').val();
		var email = $('#email').val();
		var dialCode = $('#dialCode').text();
		var phoneNumber = $('#phone').val();
		var introducer = $('#introducer').val();
		var transactionPassword = $('#transactionPassword').val();

		var formData = {
			command            : "editMemberDetails",
			fullName					 : realName,
			passport					 : passport,
			dob				 				 : datepicker,
			weChat						 : weChat,
			whatsApp					 : whatsApp,
			country						 : country,
			address					   : address,
			email					     : email,
			dialCode					 : dialCode,
			phoneNumber				 : phoneNumber,
			tPassword					 : transactionPassword
		};
		var fCallback = successChange;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
});


function loadMemberDetail(data, message)
{
	var countryList = data.countryList;

	$.each(countryList, function(key) {
			$('#country').append('<option value="'+countryList[key]['id']+'" data-countryCode="'+countryList[key]['countryCode']+'" name="'+countryList[key]['name']+'">'+countryList[key]['name']+'</option>');
	});

	var memberDetails = data.member;
	var memberDetails2 = data.memberDetails;
	var username = memberDetails2['username'];
	var phoneCode = memberDetails['dial_code'];
	// $('input[name=placementSetting][value=' + memberDetails['placementSetting'] + ']').prop('checked',true)

	$('#realName').val(memberDetails['name']);
	$('#passport').val(memberDetails['passport']);
	$('#datepicker').val(memberDetails['dob']);
	$('#weChat').val(memberDetails['weChat']);
	$('#whatsApp').val(memberDetails['whatsApp']);
	$('#country').val(memberDetails['country_id']);
	$('#address').val(memberDetails['address']);
	$('#memberId').val(memberDetails['member_id']);
	$('#username').val(username);
	$('#email').val(memberDetails['email']);
	$('#dialCode').html('<span>' +phoneCode+ '</span>');
	$('#phone').val(memberDetails['phone']);
	$('#introducer').val(memberDetails['sponsorUsername']);
}


function successChange(data, message) {
	showMessage('<?php echo $translations['M00079'][$language]; //Update Successful. ?>', 'success', '<?php echo $translations['M00417'][$language]; //Edit Profile ?>', '', 'editProfile.php');
}
</script>
