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
            <!-- Address List -->
            <div id="addressList">
                <div class="whiteBg borderAll grey normal px-4 px-md-5 py-4 mb-3 text-center">
                    <div class="bodyText smaller lightBold" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <button type="button" class="btn btn-primary px-4 py-3 col-12 col-lg-3 col-md-5 text-center" onclick="addBtnClicked('shipping')">
                    <div class="bodyText smaller text-white" data-lang="M03289"><?php echo $translations['M03289'][$language] /* Add New Address */ ?></div>
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

var url                 = 'scripts/reqDefault.php';
var method              = 'POST';
var debug               = 0;
var bypassBlocking      = 0;
var bypassLoading       = 0;
var fCallback           = '';
var removedAddressId    = '';
var removedAddressType  = '';

$(document).ready(function() {
    getAddressList();

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
});

function getAddressList() {
    var formData = {
        command     : 'getAddressList'
    };
    var fCallback = loadAddressList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadAddressList(data, message) {
    var addressList = data.list;

    if(addressList) {
        var html = '';
        
        $.each(addressList, function(k, v) {
            html += `
                <div class="whiteBg borderAll grey normal px-4 px-md-5 py-4 mb-3" id="myAddress${v['deliveryID']}">
                    <div class="mb-2">
                        <span class="bodyText larger bold mr-4" data-lang="M02809">${v['fullname']}</span>
            `;

            if(v['type'] == '1') {
                html += `
                        <span class="bodyText smaller lightBold borderAll red light py-2 px-4 whiteBg text-red text-uppercase" data-lang="M02856"><?php echo $translations['M02856'][$language] /* Default */ ?></span>
                `;
            }

            html += `
                    </div>
                    <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
                    <div class="row justify-content-between pt-3">
                        <!-- Details -->
                        <div class="col-12 col-md-8 col-lg-7">
                            <div id="address${v['deliveryID']}">${v['address']}</div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="col-12 col-md-4 col-lg-5 pt-3 pt-md-0 mt-md-0 row mx-0 px-0">
                            <div class="col-6 col-md-12 col-lg-6">
                                <button type="button" class="btn btn-primary px-4 text-center w-100" id="editBtn${v['deliveryID']}" onclick="editBtnClicked(${v['deliveryID']}, '${v['address_type']}', '${k+1}')">
                                    <div class="bodyText smaller text-white" data-lang="M00226"><?php echo $translations['M00226'][$language] /* Edit */ ?></div>
                                </button>
                            </div>
                            <div class="col-6 col-md-12 col-lg-6 mt-0 mt-md-2 mt-lg-0">
                                <button type="button" class="btn btn-primary grey px-4 text-center w-100" id="deleteBtn${v['deliveryID']}" onclick="deleteBtnClicked(${v['deliveryID']}, '${v['address_type']}')">
                                    <div class="bodyText smaller text-white" data-lang="M03292"><?php echo $translations['M03292'][$language] /* Delete */ ?></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        $('#addressList').html(html);
    }

    
}

function addBtnClicked(addressType) {
    $.redirect('addNewAddress', { addressType: addressType });
}

function editBtnClicked(addressId, addressType, addressNo) {
    $.redirect('editAddress', { addressId: addressId, addressType: addressType, addressNo: addressNo });
}

function deleteBtnClicked(addressId, addressType) {
    $('#deleteConfirmationModal').modal();
    removedAddressId = addressId;
    removedAddressType = addressType;
}

function deleteAddress() {
    var formData = {
        command         : 'deleteAddress',
        id              : removedAddressId,
        addressType    : removedAddressType,
        disabled        : 1,
    };
    fCallback = successDeleteAddress;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successDeleteAddress(data, message) {
    showMessage('<?php echo $translations['M03806'][$language] /* Delete Successful. */ ?>', 'success', '<?php echo $translations['M02809'][$language] /* My Address */ ?>', '', 'myAddress');
}

</script>