<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container px-0" style="color: #000;">
    <div class="homepagePadding mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="checkoutTitle" data-lang="M03733">
                    <?php echo $translations['M03733'][$language]; //Placement Position Form ?>
                </div>

                <div class="mt-5 row">
                    <div class="col-md-6 pr-lg-5">
                        <div class="col-md-6 pr-lg-5">
                            <div class="row">
                                <div class="col-12 p-3 px-0">
                                    <label class="control-label" data-lang="M01651"><?php echo $translations['M01651'][$language]; //Sponsor ID ?></label>
                                    <input type="text" class="form-control" id="sponsorID" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-3 px-0">
                                    <label class="control-label" data-lang="M03680"><?php echo $translations['M03680'][$language]; //Sponsor Name ?></label>
                                    <input type="text" class="form-control" id="sponsorName" disabled>
                                </div>
                            </div>
                            <div class="row" id="placementPositionWrap" style="display: none;">
                                <label class="col-12 p-3 px-0">
                                    <span class="labelTitle" data-lang="M00197"><?php echo $translations['M00197'][$language]; //Placement Position ?></span>
                                </label>
                                <div class="kt-radio-inline loginRadio row mx-0">
                                    <label for="leftCheckbox" class="col-md-6 col-12 otpCheckbox">
                                        <label class="kt-radio bankRadio mt_x" data-lang="M00198">
                                            <input type="radio" name="leftRightPosition" value="1" id="leftCheckbox">
                                            <label class="formLabel beforeLogin boldTxt"><?php echo $translations['M00198'][$language]; //Left ?></label>
                                            <span></span>
                                        </label>
                                    </label>
                                    <label class="col-md-6 col-12 otpCheckbox" for="rightCheckbox" >
                                        <label class="kt-radio walletRadio mt_x" data-lang="M00200">
                                            <input type="radio" name="leftRightPosition" value="2" id="rightCheckbox">
                                            <label class="formLabel beforeLogin boldTxt"><?php echo $translations['M00200'][$language]; //Right ?></label>
                                            <span></span>
                                        </label>
                                    </label>
                                </div>
                                <span id="placementPositionError" class="customError text-danger" error="error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-1">
                    <div class="col-12 checkoutBtn">
                        <button onclick="goCheckout()" class="btn btn-primary productButton1 whiteFont btnAddToCart alignMiddle"><?php echo $translations['M00155'][$language]; //Next ?>&nbsp;<i class="ml-1 fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
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
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var packageAry = getPackageAry();

$(document).ready(function() {

    var kycStatus = getKYC();

    if (kycStatus) {

        var formData  = {
            command: 'purchasePackageVerification',
            step: 1,
            packageAry

        };
        var fCallback = loadCheckout;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    } else {

       showMessage("<?php echo $translations['M02979'][$language]; /* Please verify your KYC before proceed. */?>", "info", "<?php echo $translations['M02464'][$language]; /* KYC Verification */?>", "", "kyc") 

    }   

});

function loadCheckout(data, message) {
    $("#sponsorID").val(data.sponsorMemberID)
    $("#sponsorName").val(data.sponsorName)
}

function goCheckout() {
    var placementPosition = $("input[name=leftRightPosition]:checked").val()
    var isChecked;
    if($('input[name=leftRightPosition]').is(':checked')){
        $.redirect('checkout',{
            placementPosition : placementPosition
        });
    }else{
        showMessage('<?php echo $translations['M03734'][$language]; /* Please select placement position before go next step */?>', 'warning', '<?php echo $translations['M03735'][$language]; /* Warning */?>', 'warning')
    }
    
    
    // alert(1)
    // console.log(placementPosition)
}

</script>