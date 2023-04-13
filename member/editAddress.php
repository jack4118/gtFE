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
					<div><a class="bodyText larger bold" href="javascript:;" id="backBtn"><</a>&emsp;<span class="bodyText larger bold" id="myAddressNo" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
					
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
						<label class="mb-0 bodyText smaller" for="fullName" data-lang="M00177"><?php echo $translations['M00177'][$language] /* Full Name */ ?></label>
						<input class="form-control" type="text" id="fullName">
					</div>
					<div class="form-group col-12">
						<label class="mb-0 bodyText smaller" for="address" data-lang="M03808"><?php echo $translations['M03808'][$language] /* Street and Number */ ?></label>
						<input class="form-control" type="text" id="address">
					</div>
					<div class="form-group col-md-6 col-12">
						<label class="mb-0 bodyText smaller" for="cityID" data-lang="M00183"><?php echo $translations['M00183'][$language] /* City */ ?></label>
						<input class="form-control" type="text" id="cityID">
					</div>
					<div class="form-group col-md-6 col-12">
						<label class="mb-0 bodyText smaller" for="postCodeID" data-lang="M03158"><?php echo $translations['M03158'][$language] /* Zip Code */ ?></label>
						<input class="form-control" type="text" id="postCodeID">
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
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-2 col-md-3 text-center mr-3" id="saveBtn">
                    <div class="bodyText smaller text-white" data-lang="M03510"><?php echo $translations['M03510'][$language] /* Save */ ?></div>
                </button>
				<button type="button" class="btn btn-primary grey px-4 py-3 col-12 col-lg-2 col-md-3 text-center" id="deleteBtn">
                    <div class="bodyText smaller text-white" data-lang="M03292"><?php echo $translations['M03292'][$language] /* Delete */ ?></div>
                </button>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title showLangCode" data-lang="M03804">
                    <?php echo $translations['M03804'][$language] /* Delete Confirmation */ ?>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M03805">
                        <?php echo $translations['M03805'][$language] /* Doing this action will delete the address from your address list, are you sure you want to do this? */ ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer pb-4">
                <button type="button" class="btn btn-primary grey py-2 mr-3" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M00278">
                        <?php echo $translations['M00278'][$language] /* Cancel */ ?>
                    </span>
                </button>
                <button onclick="deleteAddress()" type="button" class="btn btn-primary py-2" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M02539">
                        <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

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

var url             			= 'scripts/reqDefault.php';
var method          			= 'POST';
var debug           			= 0;
var bypassBlocking  			= 0;
var bypassLoading   			= 0;
var fCallback       			= '';

var addressId 					= '<?php echo $_POST['addressId'] ?>';
var addressType 				= '<?php echo $_POST['addressType'] ?>';
var addressNo 					= '<?php echo $_POST['addressNo'] ?>';

var currentStateId				= '';
var countryStateListIsLoaded 	= false;

$(document).ready(function() {
	if(!addressId || addressId == '' || !addressType || addressType == '' || !addressNo || addressNo == '') {
		showMessage('<?php echo $translations['M03813'][$language] /* Invalid address. */ ?>', 'warning', '<?php echo $translations['M02857'][$language] /* Edit Address */ ?>', '', 'myAddress');
	}

	// Display Address Title
	$('#myAddressNo').html(`<?php echo $translations['M02809'][$language] /* My Address */ ?> ${addressNo}`);

	loadCountryState();

	getAddress();

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

	// Set as default
	$('#isDefault').val(0);
	$('#isDefault').change(function() {
		$('#isDefault').toggleClass('active');

		if($('#isDefault').hasClass('active')) {
			$('#isDefault').val(1);
			$('#isDefault').prop('checked', true);
		} else {
			$('#isDefault').val(0);
			$('#isDefault').prop('checked', false);
		}
	});

	$('#countryID').change(function() {
		var countryId = $('#countryID').val();
		loadState(countryId);
	});

	$('#backBtn').click(function() {
		$.redirect('myAddress');
	})

    $('#saveBtn').click(editAddress);

	$('#deleteBtn').click(deleteBtnClicked);

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#saveBtn").click();
		}
	});

});

function loadCountryState() {
	var formData = {
        command     	: 'getState',
    };
	fCallback = loadCountryStateList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadState(countryId) {
	if(!countryIsLoaded || !currentStateId) {
		setTimeout(function() {
			loadState(countryId);
		}, 1000);
	} else {
		var formData = {
			command     	: 'getState',
			countryId 		: countryId
		};
		fCallback = loadStateList;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
}

function loadCountryStateList(data, message, result) {
	var countryList = data.country;
	var stateList = data.state;
	displayCountryList(countryList);
	displayStateList(stateList);
	countryStateListIsLoaded = true;
}

function loadStateList(data, message, result) {
	var stateList = data.state;
	displayStateList(stateList);
	countryIsLoaded = false;
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

	if(currentStateId && currentStateId != '') {
		$('#stateID').val(currentStateId);
		currentStateId = '';
	}
}

function getAddress() {
	if(!countryStateListIsLoaded) {
		setTimeout(function() {
			getAddress();
		}, 1000);
	} else {
		var formData = {
			command     	: 'getAddress',
			id 				: addressId,
		};
		fCallback = loadAddress;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
}

function loadAddress(data, message) {
	var selectedAddress = data.addressDetails;
	
	if(selectedAddress) {
		if(selectedAddress.type == '1') $('#isDefault').trigger('change');

		$('#fullName').val(selectedAddress.name);
		$('#address').val(selectedAddress.address);
		$('#cityID').val(selectedAddress.cityID);
		$('#postCodeID').val(selectedAddress.postCodeID);
		$('#countryID').val(selectedAddress.countryID);
		currentStateId = selectedAddress.stateID;

		countryIsLoaded = true;
		countryStateListIsLoaded = false;

		$('#countryID').trigger('change');
	}
}

function editAddress() {
	var formData = {
        command     	: 'editAddress',
		id 				: addressId,
		addressType 	: addressType,
		fullName 		: $('#fullName').val(),
		address 		: $('#address').val(),
		cityID 			: $('#cityID').val(),
		postalCodeID 	: $('#postCodeID').val(),
		stateID 		: $('#stateID').val(),
		countryID 		: $('#countryID').val(),
		isDefault 		: $('#isDefault').val()
    };
    fCallback = successUpdateAddress;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successUpdateAddress(data, message) {
	showMessage('<?php echo $translations['M03802'][$language] /* Update Successful. */ ?>', 'success', '<?php echo $translations['M03814'][$language] /* Edit My Address */ ?>', '', 'myAddress');
}

function deleteBtnClicked() {
	$('#deleteConfirmationModal').modal();
}

function deleteAddress() {
    var formData = {
        command     	: 'deleteAddress',
        id          	: addressId,
		addressType 	: addressType,
        disabled    	: 1,
    };
    fCallback = successDeleteAddress;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successDeleteAddress(data, message) {
	showMessage('<?php echo $translations['M03806'][$language] /* Delete Successful. */ ?>', 'success', `<?php echo $translations['M02809'][$language] /* My Address */ ?> ${addressNo}`, '', 'myAddress');
}

</script>