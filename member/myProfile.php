<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<?php
    if (in_array("Edit Profile", $_SESSION['blockedRights'])){
        header("Location: dashboard.php");
    }
?>

<section class="pageContent loginPagePadding">
	<div class="pageTitle">
		My Profile
	</div>
    <div class="mt-3 section1_div">
        <div class="row align-items-center">
        	<div class="col-lg-5 col-md-6 col-12 text-center">
        		<div>
        			<img class="profileIcon" src="/images/project/profileIcon.png">
        		</div>
        		<div class="mt-3 profileFont01">
        			<span id="realName"></span>
        		</div>
        		<div class="profileFont02">
        			<span id="username"></span>
        		</div>
        		<div class="mt-3 profileFont03">
        			Joined Since <span id="joinDate"></span>
        		</div>
        		<div class="mt-4 px-5 px-md-0 px-lg-4">
        			<div class="row">
	        			<div class="col-md-6">
	        				<div class="profileFont04" id="buildEmailKYC">
	        					<i class="fa fa-close checkIcon red"></i>
	        					<span class="kycCheckText"><?php echo $translations['M03370'][$language]; //Email Unverified ?></span>
	        				</div>
	        			</div>
	        			<div class="col-md-6 mt-3 mt-md-0">
	        				<div class="profileFont04" id="buildIDKYC">
	        					<i class="fa fa-close checkIcon red"></i>
	        					<span class="kycCheckText"><?php echo $translations['M03371'][$language]; //ID Unverified ?></span>
	        				</div>
	        			</div>
	        			<div class="col-md-6 mt-3">
	        				<div class="profileFont04" id="buildBankKYC">
	        					<i class="fa fa-close checkIcon red"></i>
	        					<span class="kycCheckText"><?php echo $translations['M03373'][$language]; //Bank Unverified ?></span>
	        				</div>
	        			</div>
	        			<div class="col-md-6 mt-3">
	        				<div class="profileFont04" id="buildNPWPKYC">
	        					<i class="fa fa-close checkIcon red"></i>
	        					<span class="kycCheckText"><?php echo $translations['M03375'][$language]; //NPWP Unverified ?></span>
	        				</div>
	        			</div>
	        		</div>
        		</div>
        		<div class="col-12 mt-4">
        			<button data-toggle="modal" data-target="#qr_modal" class="btn btn-primary">Referral Code</button>
        		</div>
            </div>
            <div class="col-lg-7 col-md-6 col-12 mt-4 mt-md-0">
            	<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M00177">
            				<?php echo $translations['M00177'][$language]; //Full Name ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="realNameSide" class="col-5 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M02097">
            				<?php echo $translations['M02097'][$language]; //Username ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="usernameSide" class="col-7 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M00187">
            				<?php echo $translations['M00187'][$language]; //Email Address ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="email" class="col-7 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M00178">
            				<?php echo $translations['M00178'][$language]; //Country ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="countryName" class="col-7 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M02298">
            				<?php echo $translations['M02298'][$language]; //Phone Number ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="phone" class="col-7 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M01058">
            				<?php echo $translations['M01058'][$language]; //Date of Birth ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="dob" class="col-7 profileFont06"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M03147">
            				<?php echo $translations['M03147'][$language]; //Gender ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="gender" class="col-7 profileFont06" style="text-transform: capitalize;"></div>
            		</div>
        		</div>
        		<div class="profileDetailSection">
            		<div class="row">
            			<div class="col-4 profileFont05" data-lang="M01651">
            				<?php echo $translations['M01651'][$language]; //Sponsor ID ?>
            			</div>
            			<div class="col-1 profileFont05">
            				:
            			</div>
            			<div id="sponsorID" class="col-7 profileFont06"></div>
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
	var name = data.member.fullname;
	var email = data.member.email;
	var phoneNumber = data.member.phoneNumber;
	var dob = data.member.dob;
	var gender = data.member.gender;
	var sponsorID = data.member.sponsorID;	
	var dialingArea = data.member.dialingArea;

	$('#realName').html(name);
	$('#realNameSide').html(name);
	$('#username').html(username);
	$('#usernameSide').html(username);
	$('#email').html(email);
	$('#phone').html("(+" + dialingArea + ") " + phoneNumber);
	$('#dob').html(dob);
	$('#gender').html(gender);
	$('#sponsorID').html(sponsorID);

	var joinDate = new Date(memberDetails.joinedAt)
	$('#joinDate').html(`
		${
		    (joinDate.getMonth()+1).toString().padStart(2, '0')}/${
		    joinDate.getDate().toString().padStart(2, '0')}/${
		    joinDate.getFullYear().toString().padStart(4, '0')} ${
		    joinDate.getHours().toString().padStart(2, '0')}:${
		    joinDate.getMinutes().toString().padStart(2, '0')}:${
		    joinDate.getSeconds().toString().padStart(2, '0')
		}
    `);
	$('#countryName').html(memberDetails.country);


	if(data.member.emailVerify == 1){
		var buildEmailKYC = `
							<i class="fa fa-check checkIcon green"></i>
							<?php echo $translations['M03369'][$language]; //Email Verified ?>
					`;
		$('#buildEmailKYC').html(buildEmailKYC);
	}
	

	if(data.member.IDVerification == 'Approved'){
		var buildIDKYC = `
						<i class="fa fa-check checkIcon green"></i>
						<?php echo $translations['M03372'][$language]; //ID Verified ?>
					`;

		$('#buildIDKYC').html(buildIDKYC);
	}
	

	if(data.member.BankAccountCover == 'Approved'){
		var buildBankKYC = `
						<i class="fa fa-check checkIcon green"></i>
						<?php echo $translations['M03374'][$language]; //Bank Verified ?>
					`;

		$('#buildBankKYC').html(buildBankKYC);
	}
	

	if(data.member.NPWPVerification == 'Approved'){
		var buildNPWPKYC = `
						<i class="fa fa-check checkIcon green"></i>
						<?php echo $translations['M03376'][$language]; //NPWP Verified ?>
					`;

		$('#buildNPWPKYC').html(buildNPWPKYC);
	}
}

function successChange(data, message) {
	showMessage('<?php echo $translations['M00079'][$language]; //Update Successful. ?>', 'success', '<?php echo $translations['M00417'][$language]; //Edit Profile ?>', '', 'editProfile.php');
}

</script>
