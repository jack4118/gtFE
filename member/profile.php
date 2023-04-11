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
                    <div><img src="images/project/profile-filled.png" width="12px" class="mr-3"><span class="bodyText smaller lightBold text-red" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="myAddressBtn">
                    <div><img src="images/project/home-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="paymentHistoryBtn">
                    <div><img src="images/project/payment-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Payment History */ ?></span></div>
                </div>
                <div class="button px-4 py-3" id="changePasswordBtn">
                    <div><img src="images/project/pw-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M00580"><?php echo $translations['M00580'][$language] /* Change Password */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12 pt-5 pt-md-0">
            <!-- My Profile Details -->
            <div class="whiteBg borderAll grey normal p-4 p-md-5">
                <div class="bodyText larger bold mb-2" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></div>
                <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
                <div class="form-group mt-5">
                    <label class="mb-0 bodyText smaller" for="name" data-lang="M03649"><?php echo $translations['M03649'][$language] /* Name */ ?></label>
                    <input class="form-control" type="text" id="name">
                </div>
                <div class="form-group">
                    <label class="mb-0 bodyText smaller" for="email" data-lang="M00187"><?php echo $translations['M00187'][$language] /* Email Address */ ?></label>
                    <input class="form-control" type="text" id="email">
                </div>
                <div class="form-group">
                    <label class="mb-0 bodyText smaller" for="phone" data-lang="M02298"><?php echo $translations['M02298'][$language] /* Phone Number */ ?></label>
                    <div class="row m-0">
                        <select id="dailingCode" class="form-control col-5 col-sm-2 col-md-3" style="width:80px;" disabled>
                            <option value="60">+60</option>
                        </select>
                        <input class="form-control col-7 col-sm-10 col-md-9" type="text" id="phone" disabled>
                    </div>
                    
                </div>
                <div class="form-group mb-0">
                    <label class="mb-0 bodyText smaller" for="points" data-lang="M03800"><?php echo $translations['M03800'][$language] /* Loyalty Points */ ?></label>
                    <div class="pt-3">
                        <img src="images/project/star-icon.png" width="12px" class="mr-2"><span class="bodyText smaller lightBold text-red" id="points">0</span><span class="bodyText smaller lightBold text-red" data-lang="M03801"> <?php echo $translations['M03801'][$language] /* Points Available */ ?></span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-2 col-md-3 text-center" id="saveBtn">
                    <div class="bodyText smaller text-white" data-lang="M02756"><?php echo $translations['M02756'][$language] /* Save */ ?></div>
                </button>
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
    var formData = {
        command     : 'getMemberDetails'
    };
    fCallback = getMemberDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

    $('#saveBtn').click(editMemberDetails);

    $("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#saveBtn").click();
		}
	});
});

function getMemberDetails(data, message) {
    var myAccountDetails = data.member;
    var points = data.userPointBalance;

    if(myAccountDetails) {
        $('#name').val(myAccountDetails.name);
        $('#email').val(myAccountDetails.email);
        $('#dailingCode').val(myAccountDetails.dial_code);
        $('#phone').val(myAccountDetails.phone);
    }

    if(points) {
        $('#points').html(addCommas(points));
    }
}

function editMemberDetails() {
    var formData = {
        command     : 'editMemberDetails',
        fullName    : $('#name').val(),
        email       : $('#email').val(),
        dialCode    : $('#dailingCode').val(),
        number      : $('#phone').val()
    };
    fCallback = successEditProfile;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successEditProfile(data, message) {
    showMessage('<?php echo $translations['M03802'][$language] /* Update Successful. */ ?>', 'success', '<?php echo $translations['M03314'][$language] /* My Profile */ ?>', '', 'profile');
}

</script>