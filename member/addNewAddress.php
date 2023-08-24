<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Account Title -->
<section class="section myAccountBg">
	<div class="kt-container row">
		<div class="col-12 titleText larger bold text-white text-center text-md-left" data-lang="M03798"><?php echo $translations['M03798'][$language] /* My Account */ ?></div>
	</div>
</section>

<!-- My Account Content -->
<section class="section whiteBg">
    <div class="kt-container row mb-5 mb-md-0">
        <div class="col-lg-3 col-md-4 col-12">
            <!-- Menu -->
            <div class="borderAll grey normal greyBg">
                <div class="button borderBottom grey normal px-4 py-3" id="myProfileBtn">
                    <div><img src="images/project/profile-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="myAddressBtn">
                    <div><img src="images/project/home-filled.png" width="12px" class="mr-3"><span class="bodyText smaller lightBold text-red" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
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
            <div class="whiteBg borderAll grey normal p-4 p-md-5 position-relative">
                <div class="d-flex flex-column flex-md-row justify-content-between mb-2" data-lang="M03314">
					<div><a class="bodyText larger bold" href="myAddress"><</a>&emsp;<span class="bodyText larger bold" data-lang="M03289"><?php echo $translations['M03289'][$language] /* Add New Address */ ?></span></div>
					
				</div>
				
                <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
				<div class="d-flex align-items-center mt-5 mt-sm-0 isDefaultSlider">
					<!-- Rounded switch -->
					<label for="isDefault" class="switch mr-2">
						<input type="checkbox" id="isDefault">
						<span class="slider round"></span>
					</label>
					<label for="isDefault" class="bodyText smaller button" data-lang="M03807"><?php echo $translations['M03807'][$language] /* Set as default */ ?></label>
				</div>
				<div class="row">
					<div class="form-group col-12 mt-5">
						<label class="mb-0 bodyText smaller" for="fullName" data-lang="M04038"><?php echo $translations['M04038'][$language] /* Full Name / Company Name */ ?></label>
						<input class="form-control" type="text" id="fullName">
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="userPhone" data-lang="M02298"><?php echo $translations['M02298'][$language] /* Phone Number */ ?></label>
						<input class="form-control" type="text" id="userPhone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="address" data-lang="M04069"><?php echo $translations['M04069'][$language] /* Address Line */ ?> 1</label>
						<input class="form-control" type="text" id="address">
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="address2" data-lang="M04069"><?php echo $translations['M04069'][$language] /* Address Line */ ?> 2</label>
						<input class="form-control" type="text" id="address2">
					</div>
					<div class="form-group col-md-6 col-12">
						<label class="mb-0 bodyText smaller" for="city" data-lang="M00183"><?php echo $translations['M00183'][$language] /* City */ ?></label>
						<input class="form-control" type="text" id="city">
					</div>
					<div class="form-group col-md-6 col-12">
						<label class="mb-0 bodyText smaller" for="userZipCode" data-lang="M03158"><?php echo $translations['M03158'][$language] /* Zip Code */ ?></label>
						<input class="form-control" type="text" id="userZipCode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="countryID" data-lang="M02673"><?php echo $translations['M02673'][$language] /* Country */ ?></label>
						<select id="countryID" class="form-control">
						</select>
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="stateID" data-lang="M00554"><?php echo $translations['M00554'][$language] /* State/Province */ ?></label>
						<select id="stateID" class="form-control">
						</select>
					</div>
				</div>
            </div>
			

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row align-items-center mt-4">
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-2 col-md-3 text-center mr-3" id="addBtn">
                    <div class="bodyText smaller text-white" data-lang="M03809"><?php echo $translations['M03809'][$language] /* Add */ ?></div>
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
var addressType 	= '<?php echo $_SESSION['POST'][$postAryName]['addressType'] ?>';

$(document).ready(function() {
	if(!addressType || addressType == '') {
		showMessage('<?php echo $translations['M03810'][$language] /* Address type cannot be empty. */ ?>', 'warning', '<?php echo $translations['M03289'][$language] /* Add New Address */ ?>', '', 'myAddress');
	}

	loadCountryState();

	$('#countryID').change(function() {
		var countryId = $('#countryID').val();
		loadCountryState(countryId);
	});

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

	if(addressType == 'billing') {
		$('#isDefault').val(1);
		$('.isDefaultSlider').toggleClass('d-flex d-none');
	} else {
		$('#isDefault').val(0);
		$('#isDefault').change(function() {
			console.log('changed');
			$('#isDefault').toggleClass('active');

			if($('#isDefault').hasClass('active')) {
				$('#isDefault').val(1);
				$('#isDefault').prop('checked', true);
			} else {
				$('#isDefault').val(0);
				$('#isDefault').prop('checked', false);
			}
		});
	}

    $('#addBtn').click(addAddress);

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#addBtn").click();
		}
	});

	// $('#userPhone').focus(function() {
	// 	$(this).val('60');
	// })
});

function loadCountryState(countryId) {
	var formData = {
        command     	: 'getState',
		countryId 		: countryId
    };

	if(countryId && countryId != '') fCallback = loadStateList;
	else fCallback = loadCountryStateList;
    
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadCountryStateList(data, message) {
	var countryList = data.country;
	var stateList = data.state;
	displayCountryList(countryList);
	displayStateList(stateList);
}

function loadStateList(data, message) {
	var stateList = data.state;
	displayStateList(stateList);
}

function displayCountryList(list) {
	if(list) {
		var html = '';
		$.each(list, function(k, v) {
            if(v['name'] == 'Malaysia') {
                html += `
                    <option value="${v['id']}" selected>${v['name']}</option>
                `;
            }
		});

		$('#countryID').html(html);
	}
}

function displayStateList(list) {
	if(list) {
		var html = '';
		html += `<option value="" data-lang="M03811"><?php echo $translations['M03811'][$language] /* Select State/Province */ ?></option>`;
		$.each(list, function(k, v) {
			html += `
				<option value="${v['id']}">${v['name']}</option>
			`;
		});

		$('#stateID').html(html);
	}
}

function addAddress() {
	var formData = {
        command     	: 'addAddress',
		addressType 	: addressType,
		fullName 		: $('#fullName').val(),
		address 		: $('#address').val(),
		address2 		: $('#address2').val(),
		cityID 			: $('#city').val(),
		postalCodeID 	: $('#userZipCode').val(),
		stateID 		: $('#stateID').val(),
		phone 			: $('#userPhone').val(),
		disabled 		: 0,
		isDefault 		: $('#isDefault').val()
    };

    fCallback = successAddAddress;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddAddress(data, message) {
	showMessage('<?php echo $translations['M03812'][$language] /* Add Successful. */ ?>', 'success', '<?php echo $translations['M03289'][$language] /* Add New Address */ ?>', '', 'myAddress');
}

</script>