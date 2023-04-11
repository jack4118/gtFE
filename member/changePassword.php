<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Account Title -->
<section class="section myAccountBg">
    <div class="titleText larger bold text-white text-center text-md-left" data-lang="M03798"><?php echo $translations['M03798'][$language] /* My Account */ ?></div>
</section>

<!-- My Account Content -->
<section class="section whiteBg">
    <div class="row mb-5 mb-md-0">
        <div class="col-lg-3 col-md-4 col-12">
            <!-- Menu -->
            <div class="borderAll grey normal greyBg">
                <div class="button borderBottom grey normal px-4 py-3" id="myProfileBtn">
                    <div><img src="images/project/profile-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="myAddressBtn">
                    <div><img src="images/project/home-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="paymentHistoryBtn">
                    <div><img src="images/project/payment-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Payment History */ ?></span></div>
                </div>
                <div class="button px-4 py-3" id="changePasswordBtn">
                    <div><img src="images/project/pw-filled.png" width="12px" class="mr-3"><span class="bodyText smaller lightBold text-red" data-lang="M00580"><?php echo $translations['M00580'][$language] /* Change Password */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12 pt-5 pt-md-0">
            <!-- My Profile Details -->
            <div class="whiteBg borderAll grey normal p-4 p-md-5">
                <div class="bodyText larger bold mb-2" data-lang="M03314">Change Password</div>
                <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
                <div class="form-group mt-5">
                    <label class="mb-0 bodyText smaller" for="currentPassword" data-lang="M03649">Old Password</label>
                    <input class="form-control" type="password" id="currentPassword">
                </div>
                <div class="form-group">
                    <label class="mb-0 bodyText smaller" for="newPassword" data-lang="M00187">New Password</label>
                    <input class="form-control" type="password" id="newPassword">
                </div>
				<div class="form-group">
                    <label class="mb-0 bodyText smaller" for="newPasswordConfirm" data-lang="M00187">Confirm New Password</label>
                    <input class="form-control" type="password" id="newPasswordConfirm">
                </div>

				<!-- Action Buttons -->
				<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
					<button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-2 col-md-3 text-center" id="saveBtn">
						<div class="bodyText smaller text-white" data-lang="M02756"><?php echo $translations['M02756'][$language] /* Save */ ?></div>
					</button>
				</div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback       = '';

$(document).ready(function() {
    $('#myProfileBtn').click(function() {
        $.redirect('profile');
    });

    $('#myAddressBtn').click(function() {
        $.redirect('myAddress');
    });

    $('#paymentHistoryBtn').click(function() {
        $.redirect('paymentListing');
    });

    $('#changePasswordBtn').click(function() {
        $.redirect('changePassword');
    });

    $('#saveBtn').click(memberChangePassword);

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#saveBtn").click();
		}
	});
});

function memberChangePassword() {
    var formData = {
        command     		: 'memberChangePassword',
        passwordCode    	: '1',	// 1- password, 2 - transaction password
        currentPassword 	: $('#currentPassword').val(),
        newPassword     	: $('#newPassword').val(),
        newPasswordConfirm  : $('#newPasswordConfirm').val()
    };
    fCallback = successChangePassword;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successChangePassword(data, message) {
    showMessage('<?php echo $translations['M03802'][$language] /* Update Successful. */ ?>', 'success', 'Change Password', '', 'profile');
}

</script>