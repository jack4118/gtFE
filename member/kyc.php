<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
		<div class="pageTitle">
			<?php echo $translations['M02317'][$language]; //KYC Verification ?>
		</div>
        <div class="row mt-3">
           <div class="col-md-6 col-12 mb-3 d-flex flex-column">
				<label for="emailCheck" class="displayBtn" id="emailWrap">
					<div class="h-100 row align-items-center">
						<div class="col-2"><img src="/images/project/email.png" class="kycIconImg"></div>
		           		<div class="col-8"> 
		           			<div data-lang="M03296" class="blackTxt"><?php echo $translations['M03296'][$language]; //Email Verification ?></div>
		           			<div data-lang="M03297" class="kycDescTxt"><?php echo $translations['M03297'][$language]; //We'll need your email address ?></div>
		           		</div>
		           		<div class="col-2 text-right kycIcon" id="emailIcon"><i class="fas fa-chevron-right"></i></div>
		           		<div class="col-2 text-right verifyIcon disabledIcon" id="emailVerify"><i class="fas fa-check-circle"></i></div>
					</div>
				</label>
			</div>

			<div class="col-md-6 col-12 mb-3 d-flex flex-column">
				<label for="idCheck" class="displayBtn" id="idWrap">
					<div class="h-100 row align-items-center">
						<div class="col-2"><img src="/images/project/id-verification.png" class="kycIconImg"></div>
		           		<div class="col-8">		           			
		           			<div data-lang="M03298" class="blackTxt"><?php echo $translations['M03298'][$language]; //ID Verification ?></div>
		           			<div data-lang="M03299" class="kycDescTxt"><?php echo $translations['M03299'][$language]; //Will be available after phone and email verification. ?></div>
		           		</div>
		           		<div class="col-2 text-right kycIcon disabledIcon" id="IDIcon"><i class="fas fa-chevron-right"></i></div>
		           		<div class="col-2 text-right verifyIcon disabledIcon" id="IDVerifyStatus"></i></div>
					</div>
				</label>
			</div>

			<div class="col-md-6 col-12 mb-3 d-flex flex-column">
				<label for="bankCheck" class="displayBtn" id="bankWrap">
					<div class="h-100 row align-items-center">
						<div class="col-2"><img src="/images/project/bank-account-cover.png" class="kycIconImg"></div>
		           		<div class="col-8">		           			
		           			<div data-lang="M03300" class="blackTxt"><?php echo $translations['M03300'][$language]; //Bank Account Cover ?></div>
		           			<div data-lang="M03301" class="kycDescTxt"><?php echo $translations['M03301'][$language]; //Will be available after ID Verification. ?></div>
		           		</div>
		           		<div class="col-2 text-right kycIcon disabledIcon" id="bankIcon"><i class="fas fa-chevron-right"></i></div>
		           		<div class="col-2 text-right verifyIcon disabledIcon" id="bankVerifyStatus"></div>
					</div>
				</label>
			</div>

			<div class="col-md-6 col-12 mb-3 d-flex flex-column">
				<label for="npwpCheck" class="displayBtn" id="npwpWrap">
					<div class="h-100 row align-items-center">
						<div class="col-2"><img src="/images/project/npwp-verification.png" class="kycIconImg"></div>
		           		<div class="col-8">		           			
		           			<div data-lang="M03302" class="blackTxt"><?php echo $translations['M03302'][$language]; //NPWP Verification ?></div>
		           			<div data-lang="M03303" class="kycDescTxt"><?php echo $translations['M03303'][$language]; //Will be available after bank account cover ?></div>
		           		</div>
		           		<div class="col-2 text-right kycIcon disabledIcon" id="npwpIcon"><i class="fas fa-chevron-right"></i></div>
		           		<div class="col-2 text-right verifyIcon disabledIcon" id="npwpVerifyStatus"><i class="fas fa-check-circle"></i></div>
					</div>
				</label>
			</div>
        </div>

	    <input type="checkbox" id="emailCheck" class="checkKYC hide" disabled value="emailVerify">
	    <div id="emailVerifyWrap" class="mt-4 displayWraper">
	    	<div class="pageTitle" data-lang="M03296">
				<?php echo $translations['M03296'][$language]; //Email Verification ?>
			</div>
			<div class="mt-3 whiteBg">
				<div class="kycIntroTxt"><?php echo $translations['M03327'][$language]; //Please enter your email address and enter the 6-digit code to verify ?></div>
				<div class="kycIntroTxt"><?php echo $translations['M03328'][$language]; //Without email verification, ?> <b><?php echo $translations['M03329'][$language]; //you cannot checkout from Metafiz cart. ?></b></div>
				<div class="mt-5">
					<div class="form-group col-md-6 col-12 px-0">
	                    <label data-lang="M03330"><?php echo $translations['M03330'][$language]; //Enter Email Address ?></label>
	                    <div class="input-group">
	                        <input id="emailInp" class="form-control" type="text" disabled>
	                        <button class="btn btn-primary ml-2" id="sendCode" type="button"><?php echo $translations['M01451'][$language]; //Send OTP ?></button>
	                        <span id="timer" class="text-center ml-2 btn btn-primary" style="display: none;">
	                            <span class=""></span>
	                        </span>
	                    </div>
	                </div>
	                <div class="form-group col-lg-6 col-12 px-0" id="otpWrap" style="display: none;">
						<label data-lang="M03331"><?php echo $translations['M03331'][$language]; //Enter OTP Number ?></label>
						<input id="otpCodeInp" type="text" class="form-control">
						<span id="otpCode"></span>
					</div>
					<div>
						<button class="btn btn-primary" id="submitEmailBtn" style="display: none" data-lang="M02336"><?php echo $translations['M02336'][$language]; //Submit ?></button>
					</div>
				</div>
			</div>
	    </div>

	    <input type="checkbox" id="idCheck" class="checkKYC hide" value="idVerify" disabled>
	    <div id="IDVerifyWrap" class="mt-4 displayWraper">
	    	<div class="pageTitle" data-lang="M03298">
				<?php echo $translations['M03298'][$language]; //ID Verification ?>
			</div>
			<div class="mt-3 whiteBg">
				<div class="kycIntroTxt"><?php echo $translations['M03337'][$language]; //Please enter your details for the ID Verification ?></div>
				<div class="kycIntroTxt"><?php echo $translations['M03338'][$language]; //Without ID verification, ?> <b><?php echo $translations['M03329'][$language]; //you cannot checkout from Metafiz cart. ?></b></div>
				<div class="mt-5 row">
					<div class="form-group col-lg-6 col-12">
						<label data-lang="M03336"><?php echo $translations['M00177'][$language]; //Enter Full Name ?></label>
						<input id="nameInp" type="text" class="form-control" disabled>
						<span id="fullName"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label id="idTypeDis"><?php echo $translations['M03455'][$language]; //KTP Number ?></label>
						<input id="idNoInp" type="text" class="form-control" disabled>
						<span id="id"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M02466"><?php echo $translations['M02466'][$language]; //Address ?></label>
						<input id="addressInp" type="text" class="form-control" disabled>
						<span id="address"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
	                	<label data-lang="M03333"><?php echo $translations['M03333'][$language]; //Upload Images ?></label>
                		<div>
                			<div class="input-group greyBtnWrap">
							  <div class="input-group-prepend">
							  	<span class="input-group-text">
							  		<button class="btn greyBtn" onclick="$('#uploadImage').click();"><?php echo $translations['M02428'][$language]; //Upload ?></button>
							  	</span>
							  </div>
							  <input class="form-control fileName imgInpBorder" id="imageName1" placeholder="<?php echo $translations['M03334'][$language]; //No file choose ?>">
							  <div class="input-group-append">
             	            <button id="viewImage1" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('1')">
             	                <i class="fa fa-eye text-white"></i>
             	            </button>
             	            <button id="viewImgID" type="button" class="btn uploadBtn" style="display: none;" onclick="showImgID()">
             	                <i class="fa fa-eye text-white"></i>
             	            </button>
             	          
             	            <button id="deleteImage1" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('1')">
             	                <i class="fa fa-times" style="color: red"></i>
             	            </button>
             	        </div>
							</div>
                	        <span class="appendUploadError"></span>
                	        <input type="hidden" id="storeImageData1">
                	        <input type="hidden" id="storeImageName1">
                	        <input type="hidden" id="storeImageType1">
                	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                	            <input id='uploadImage' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName('1', this)" required/><br /><br />
                	        </form>
                	    </div>
							<div id="remark1" class="mt-2"></div>
					</div>
				</div>
				<div>
					<button class="btn btn-primary" id="submitIDBtn" onclick="uploadKYC('idVerify')" data-lang="M02336"><?php echo $translations['M02336'][$language]; //Submit ?></button>
				</div>
			</div>
	    </div>

	    <input type="checkbox" id="bankCheck" class="checkKYC hide" value="bankAccVerify" disabled>
	    <div id="bankVerifyWrap" class="mt-4 displayWraper">
	    	<div class="pageTitle" data-lang="M03300">
				<?php echo $translations['M03300'][$language]; //Bank Account Cover ?>
			</div>
			<div class="mt-3 whiteBg">
				<div class="kycIntroTxt"><?php echo $translations['M03339'][$language]; //Please enter your details for the Bank Account Cover ?></div>
				<div class="kycIntroTxt"><?php echo $translations['M03340'][$language]; //Without Bank Account Cover, ?> <b><?php echo $translations['M03329'][$language]; //you cannot checkout from Metafiz cart. ?></b></div>
				<div class="mt-5 row">
					<div class="form-group col-lg-6 col-12">
						<label data-lang="M03163"><?php echo $translations['M03163'][$language]; //Bank Name ?></label>
						<input id="bankInp" type="text" class="form-control" disabled>
						<span id="bankName"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M02913"><?php echo $translations['M02913'][$language]; //Bank Account Number ?></label>
						<input id="bankNoInp" type="text" class="form-control" disabled>
						<span id="bankAcc"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M02906"><?php echo $translations['M02906'][$language]; //Bank Account Holder ?></label>
						<input id="bankHolderInp" type="text" class="form-control" disabled>
						<span id="bankHolder"></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M03333"><?php echo $translations['M03333'][$language]; //Upload Images ?></label>
						<div>
                		<div class="input-group greyBtnWrap">
							  <div class="input-group-prepend">
							  	<span class="input-group-text" id="bankUpload">
							  		<button class="btn greyBtn" onclick="$('#uploadImage2').click();"><?php echo $translations['M02428'][$language]; //Upload ?></button>
							  	</span>
							  </div>
							  <input class="form-control fileName imgInpBorder" id="imageName2" placeholder="<?php echo $translations['M03334'][$language]; //No file choose ?>">
							  <div class="input-group-append">
                	            <button id="viewImage2" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('2')">
                	                <i class="fa fa-eye text-white"></i>
                	            </button>

                	            <button id="viewImgBank" type="button" class="btn uploadBtn" style="display: none;" onclick="showImgBank()">
                	                <i class="fa fa-eye text-white"></i>
                	            </button>
                	          
                	            <button id="deleteImage2" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('2')">
                	                <i class="fa fa-times" style="color: red"></i>
                	            </button>
                	        </div>
							</div>
                	        <span class="appendUploadError"></span>
                	        <input type="hidden" id="storeImageData2">
                	        <input type="hidden" id="storeImageName2">
                	        <input type="hidden" id="storeImageType2">
                	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                	            <input id='uploadImage2' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName2('2', this)" required/><br /><br />
                	        </form>
                	    </div>
							<div id="remark2" class="mt-2"></div>
					</div>
				</div>
				<div>
					<button class="btn btn-primary" id="submitBankBtn" onclick="uploadKYC('bankAccVerify')" data-lang="M02336"><?php echo $translations['M02336'][$language]; //Submit ?></button>
				</div>
			</div>
	    </div>

	    <input type="checkbox" id="npwpCheck" class="checkKYC hide" value="NPWPVerify" disabled>
	    <div id="NPWPVerifyWrap" class="mt-4 displayWraper">
	    	<div class="pageTitle" data-lang="M03302">
				<?php echo $translations['M03302'][$language]; //NPWP Verification ?>
			</div>
			<div class="mt-3 whiteBg">
				<div class="kycIntroTxt"><?php echo $translations['M03341'][$language]; //Please enter your details for the NPWP Verification ?></div>
				<div class="kycIntroTxt"><?php echo $translations['M03342'][$language]; //Without NPWP Verification, ?> <b><?php echo $translations['M03329'][$language]; //you cannot checkout from Metafiz cart. ?></b></div>
				<div class="mt-5 row">
					<div class="form-group col-lg-6 col-12">
						<label data-lang="M03336"><?php echo $translations['M00177'][$language]; //Enter Full Name ?></label>
						<input id="nameNPWPInp" type="text" class="form-control" disabled>
						<span id=""></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M03343"><?php echo $translations['M03178'][$language]; //NPWP Number ?></label>
						<input id="npwpNo" type="text" class="form-control" disabled>
						<span id=""></span>
					</div>
	                <div class="form-group col-lg-6 col-12">
						<label data-lang="M03333"><?php echo $translations['M03333'][$language]; //Upload Images ?></label>
						<div>
                			<div class="input-group greyBtnWrap">
							  <div class="input-group-prepend">
							  	<span class="input-group-text">
								    <button class="btn greyBtn" onclick="$('#uploadImage3').click();"><?php echo $translations['M02428'][$language]; //Upload ?></button>
							  	</span>
							  </div>
							  <input class="form-control fileName imgInpBorder" id="imageName3" placeholder="<?php echo $translations['M03334'][$language]; //No file choose ?>">
							  <div class="input-group-append">
                	            <button id="viewImage3" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('3')">
                	                <i class="fa fa-eye text-white"></i>
                	            </button>

                	            <button id="viewImgNPWP" type="button" class="btn uploadBtn" style="display: none;" onclick="showImgNPWP()">
                	                <i class="fa fa-eye text-white"></i>
                	            </button>
                	          
                	            <button id="deleteImage3" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('3')">
                	                <i class="fa fa-times" style="color: red"></i>
                	            </button>
                	        </div>
							</div>
                	        <span class="appendUploadError"></span>
                	        <input type="hidden" id="storeImageData3">
                	        <input type="hidden" id="storeImageName3">
                	        <input type="hidden" id="storeImageType3">
                	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                	            <input id='uploadImage3' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName3('3', this)" required/><br /><br />
                	        </form>
                	    </div>
							<div id="remark3" class="mt-2"></div>
					</div>
				</div>
				<div>
					<button class="btn btn-primary" id="submitNPWPBtn" onclick="uploadKYC('NPWPVerify')" data-lang="M02336"><?php echo $translations['M02336'][$language]; //Submit ?></button>
				</div>
			</div>
	    </div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span id="canvasTitle" class="modal-title"><?php echo $translations['M00046'][$language]; //Preview ?></span> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont text-center">
                <img id="modalImg" src="" style="width: 400px;">
            </div>
            <div class="modal-footer">
                 <button id="canvasCloseBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00020'][$language]; //Close ?></button>
             </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKYCConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <!-- <img src="/images/project/successIcon.png" class="img-fluid"> -->
                <i class="fa fa-check"></i>
                <!-- <div class="mt-3 modal-title">
                    <?php echo $translations['M00268'][$language]; //Confirmation ?>
                </div> -->
                <div class="mt-3 modalText">
                    <div id="modalKYCConfirmContent"></div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-default w-100" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
                 <button id="modalKYCConfirmBtn" type="button" class="ml-3 btn btn-primary w-100" data-dismiss="modal" data-lang="M02817">
                    <?php echo $translations['M02539'][$language]; //Confirm ?>
                 </button>
            </div>
        </div>
    </div>
</div>
<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var email = "<?php echo $_SESSION['userEmail']; ?>";
    // var reqData = [];
    var saveVerifyType;
    var passData;
    var currentImgData;
    var tempMediaUrl = "<?php echo $config['tempMediaUrl']; ?>kyc/";
    var imgData1;
    var imgData2;
    var imgData3;


    $(document).ready(function(){
    	$('#emailInp').val(email);    	

    	var formData  = {
	        command : "getMemberDetails"
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	
    	$('#sendCode').click(function(){
            $(".invalid-feedback").remove();
            var email = $('#emailInp').val();

	        var formData  = {
	            command : "sendOTPCode",
	            type : "verifyKYC",
	            sendType : "email",
              	email : email,
              	username : '<?php echo $_SESSION['username']; ?>'
            };
                
            fCallback = otpCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#submitEmailBtn').click(function(){
        	emailVerifyConfirmation();
        });
	});

	$(".checkKYC").change(function(){
    	$(".checkKYC").not(this).prop("checked", false);
    	$(this).prop("checked", true);
    	// if($(this).is(':checked')){
    	// 	$('.appendUploadError').append('<span id="uploadError">123</span>');
    	// }else{

    	// }
    });
	
    $('.checkKYC').change(function(){
		var verifyType = $('.checkKYC:checked').val();
		if(verifyType != 'emailVerify'){
			var formData = {
	    		command         : "getKYCDetailsNew",
	    		verifyType 		: verifyType
	        };
	        var fCallback = loadKYCData;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}
	});

	function loadKYCData(data,message){
		$('#nameInp').val(data.fullName || "");
		$('#idNoInp').val(data.idNum);
		$('#addressInp').val(data.address || "");
		$('#bankInp').val(data.bankName || "");
		$('#bankNoInp').val(data.bankAccNo || "");
		$('#bankHolderInp').val(data.bankAccHolder || "");
		$('#nameNPWPInp').val(data.fullName || "");
		$('#npwpNo').val(data.npwpNum || "");
		if(data.idType == 'Passport'){
			$('#idTypeDis').html('<?php echo $translations['M03185'][$language]; //Passport Number ?>');
		}
		$('#remark1').html("");
		$('#remark2').html("");
		$('#remark3').html("");
		if(data.remarkDetail) {
			var verifyType = $('.checkKYC:checked').val();
			var remarkStatus = data.remarkDetail.status;
			var remarkDetail = data.remarkDetail.remark;
			if(remarkStatus == "Rejected") {
				switch (verifyType) {
					case 'idVerify':
						$('#remark1').html(`<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> ${remarkDetail}</span>`);
						break;
					case 'bankAccVerify':
						$('#remark2').html(`<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> ${remarkDetail}</span>`);
						break;
					case 'NPWPVerify':
						$('#remark3').html(`<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> ${remarkDetail}</span>`);
						break;
				}
			}
		}
	}

	function loadDefaultListing(data,message){
		isEmailVerify = data.member.emailVerify;
		isBankVerify = data.member.BankAccountCover;
		isIDVerify = data.member.IDVerification;
		isNPWPVarify = data.member.NPWPVerification;
		imgData2 = data.member.BankAccountCoverImageName;
		imgData3 = data.member.NPWPVerificationImageName;
		imgData1 = data.member.IDVerificationImageName;

		if(isEmailVerify == 0){
    		$('#idCheck, #bankCheck, #npwpCheck').prop("disabled",true);
    		$('#bankWrap,#idWrap,#npwpWrap').addClass('disabledWrap');
    		$('#emailCheck').prop("disabled",false);
    	}else if(isEmailVerify == 1){
    		$('#idCheck, #bankCheck, #npwpCheck').prop("disabled",false);
    		$('#emailCheck').prop("disabled",true);
    		$('#emailWrap').addClass('verifiedWrap');
    	}

    	if(isBankVerify == 0){
    		// $('#bankWrap').addClass('disabledWrap');
    		$('#bankWrap').removeClass('verified');
    	}else if(isBankVerify == 'Approved'){
    		$('#bankWrap').removeClass('disabledWrap');
    		var bankStatus = `<i class="fas fa-check-circle"></i>`;
    		$('#bankVerifyStatus').html(bankStatus);
    		$('#bankCheck').prop("disabled",true);
    		$('#bankWrap').addClass('disabled');
    		$('#bankVerifyStatus').removeClass('disabledIcon');
    	}else if(isBankVerify == 'Rejected'){
    		$('#bankWrap').removeClass('disabledWrap');
    		var bankStatus = `<i class="fas fa-times-circle"></i>`;
    		$('#bankVerifyStatus').html(bankStatus);
    		$('#bankVerifyStatus').removeClass('disabledIcon').addClass('red');
    	}else if(isBankVerify == 'Waiting Approval'){
    		var bankStatus = `<i class="fas fa-hourglass-half"></i>`;
    		$('#bankVerifyStatus').html(bankStatus);
    		$('#bankVerifyStatus').removeClass('disabledIcon').addClass('yellow');
			$('#imageName2').prop('disabled',true);
    		$('#uploadImage2').prop('disabled',true);
    		$('#submitBankBtn').hide();
    		$('#viewImgBank').show();
    		$('#imageName2').val(imgData2);
    	}

    	if(isIDVerify == 0){
    		// $('#idWrap').addClass('disabledWrap');
    		$('#idWrap').removeClass('verified');
    	}else if(isIDVerify == 'Approved'){
    		$('#idWrap').removeClass('disabledWrap');
    		var idStatus = `<i class="fas fa-check-circle"></i>`;
    		$('#IDVerifyStatus').html(idStatus);
    		$('#idCheck').prop("disabled",true);
    		$('#idWrap').addClass('disabled');
    		$('#IDVerifyStatus').removeClass('disabledIcon');
    	}else if(isIDVerify == 'Rejected'){
    		$('#idWrap').removeClass('disabledWrap');
    		var idStatus = `<i class="fas fa-times-circle"></i>`;
    		$('#IDVerifyStatus').html(idStatus);
    		$('#IDVerifyStatus').removeClass('disabledIcon').addClass('red');
    	}else if(isIDVerify == 'Waiting Approval'){
    		var idStatus = `<i class="fas fa-hourglass-half"></i>`;
    		$('#IDVerifyStatus').html(idStatus);
    		$('#IDVerifyStatus').removeClass('disabledIcon').addClass('yellow');
			$('#imageName1').prop('disabled',true);
    		$('#uploadImage').prop('disabled',true);
    		$('#submitIDBtn').hide();
    		$('#viewImgID').show();
    		$('#imageName1').val(imgData1);
    	}

    	if(isNPWPVarify == 0){
    		// $('#npwpWrap').addClass('disabledWrap');
    		$('#npwpWrap').removeClass('verified');
    	}else if(isNPWPVarify == 'Approved'){
    		$('#npwpWrap').removeClass('disabledWrap');
    		var npwpStatus = `<i class="fas fa-check-circle"></i>`;
    		$('#npwpVerifyStatus').html(npwpStatus);
    		$('#npwpVerifyStatus').removeClass('disabledIcon');
    		$('#npwpCheck').prop("disabled",true);
    		$('#npwpWrap').addClass('disabled');
    	}else if(isNPWPVarify == 'Rejected'){
    		$('#npwpWrap').removeClass('disabledWrap');
    		var npwpStatus = `<i class="fas fa-times-circle"></i>`;
    		$('#npwpVerifyStatus').html(npwpStatus);
    		$('#npwpVerifyStatus').removeClass('disabledIcon').addClass('red');
    	}else if(isNPWPVarify == 'Waiting Approval'){
    		var npwpStatus = `<i class="fas fa-hourglass-half"></i>`;
    		$('#npwpVerifyStatus').html(npwpStatus);
    		$('#npwpVerifyStatus').removeClass('disabledIcon').addClass('yellow');
			$('#imageName3').prop('disabled',true);
    		$('#uploadImage3').prop('disabled',true);
    		$('#submitNPWPBtn').hide();
    		$('#viewImgNPWP').show();
    		$('#imageName3').val(imgData3);
    	}
		
	}

	function uploadKYC(verifyType) {
    	$(".invalid-feedback").remove();

    	saveVerifyType = verifyType;

    	if(verifyType == "idVerify"){
			var imgName = $('#storeImageName1').val();
			currentImgData = $('#storeImageData1').val();
    	}else if(verifyType == "bankAccVerify"){
			var imgName = $('#storeImageName2').val();
			currentImgData = $('#storeImageData2').val();
		}else{
			var imgName = $('#storeImageName3').val();
			currentImgData = $('#storeImageData3').val();
		}

    	var formData  = {
            command : "addKYCValidation",
            imgName: imgName,
            verifyType : verifyType
        };

        passData = formData;
            
        fCallback = verifyConfirmation;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function verifyConfirmation(data,message){
		$('#modalKYCConfirm').modal('show');
    	if(saveVerifyType == "idVerify"){
			$('#modalKYCConfirmContent').empty().html('<?php echo $translations['M03366'][$language]; /* Are u sure want to verify ID? */ ?>');
    	}else if(saveVerifyType == "bankAccVerify"){
			$('#modalKYCConfirmContent').empty().html('<?php echo $translations['M03367'][$language]; /* Are u sure want to verify Bank Accout Cover? */ ?>');
		}else{
			$('#modalKYCConfirmContent').empty().html('<?php echo $translations['M03368'][$language]; /* Are u sure want to verify NPWP ? */ ?>');
		}

		$('#modalKYCConfirmBtn').click(function(){
			$(".invalid-feedback").remove();
			var formData = passData;
			formData['command'] = "addKYCConfirmation";
		        
		    fCallback = submitCallback;
		    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	}

	function emailVerifyConfirmation(data,message){
		$('#modalKYCConfirm').modal('show');
		$('#modalKYCConfirmContent').empty().html('<?php echo $translations['M03364'][$language]; /* Are u sure want to verify email? */ ?>');
		$('#modalKYCConfirmBtn').click(function(){
			$(".invalid-feedback").remove();
        	var otpCode = $('#otpCodeInp').val();

        	var formData  = {
	            command : "validateKYCOTP",
	            otpCode : otpCode
            };
                
            fCallback = emailVerifySuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	}

	function emailVerifySuccess(data,message){
		$('#modalKYCConfirm').modal('hide');
		showMessage("<?php echo $translations['M03377'][$language]; /* Success Verified Email */ ?>", "success", "<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>", "success", "kyc");
	}

	function otpCallback(data, message) {
		$('#otpWrap').show();
		$('#submitEmailBtn').show();
	  if(data.remainingTime) {
	    var second = data.remainingTime;

	    var minutes = Math.floor(second/60);
	    var seconds = second - (minutes*60);

	    var leftTime = `${minutes==0?"":minutes + "m"} ${seconds}s.`;


	    countDown('#sendCode', second);
	    showMessage(`${message.replace(".", leftTime)}`, "warning", "<?php echo $translations['E00730'][$language]; /* Error */ ?>", "warning");
	  }else{
	    countDown('#sendCode', data.resendOTPCountDown);
	    showMessage(message, "success", "<?php echo $translations['M03456'][$language]; /* Send OTP Code */ ?>", "success");
	  }
	  
	}

	function countDown(id, second){
	  var minutes = Math.floor(second/60);
	  var seconds = second - (minutes*60);

	  if(minutes == 0 && seconds == 0){
	    $('#sendCode').show();
	    $('#timer').hide();
	    return;
	  }else if(minutes == 0 && seconds != 0){
	    $('#sendCode').hide();
	    // $('#sendCode').show();
	    $('#timer span').empty().append(seconds+"s");
	    setTimeout('countDown(sendCode,'+(second-1)+')',1000);
	  }else{
	    $('#sendCode').hide();
	    $('#timer').show();
	    $('#timer span').empty().append(minutes+"m"+" "+seconds+"s");
	    setTimeout('countDown(sendCode,'+(second-1)+')',1000);
	  }
	}

	$(document).on('change','.checkKYC',function(){
		var verifyType = $('.checkKYC:checked').val();
		if(verifyType == "idVerify"){
			$('.appendUploadError').empty();
			$('#IDVerifyWrap .appendUploadError').append('<span id="upload"></span>');
			$('#IDVerifyWrap .appendUploadError').append('<span id="imgName"></span>');
		}
		if(verifyType == "bankAccVerify"){
			$('.appendUploadError').empty();
			$('#bankVerifyWrap .appendUploadError').append('<span id="upload"></span>');
			$('#bankVerifyWrap .appendUploadError').append('<span id="imgName"></span>');
		}
		if(verifyType == "NPWPVerify"){
			$('.appendUploadError').empty();
			$('#NPWPVerifyWrap .appendUploadError').append('<span id="upload"></span>');
			$('#NPWPVerifyWrap .appendUploadError').append('<span id="imgName"></span>');
		}
	});

	function displayImageName(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.val(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#frontImgError').html('')
	        	} else {
	        		$('#frontImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function displayImageName2(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.val(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#backImgError').html('')
	        	} else {
	        		$('#backImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function displayImageName3(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.val(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#selfieImgError').html('')
	        	} else {
	        		$('#selfieImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function showImage(n) {
	    // $("#modalImg").attr('style','display: inline-block');
	    $("#modalImg").attr('src', $("#storeImageData"+n).val());
	    $("#modalVideo").attr('style','display:none');
	    $("#showImage").modal();
	}

	function showImgBank(){
		$("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgData2);
      $("#showImage").modal();
	}

	function showImgID(){
		$("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgData1);
      $("#showImage").modal();
	}

	function showImgNPWP(){
		$("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgData3);
      $("#showImage").modal();
	}

	function deleteImage(id) {
	    $("#imageUpload"+id).val("");
	    $('#imageName'+id).val('');
	    $("#storeImageData"+id).val("");
	    $("#storeImageName"+id).val("");
	    $("#storeImageSize"+id).val("");
	    $("#storeImageType"+id).val("");
	    $("#storeImageFlag"+id).val("");

	    $("#viewImage"+id).hide();
	    $("#deleteImage"+id).hide();
	}

	function submitCallback(data,message) {
		// var storeImageData = ""; 
		if(data && data.imgName){
	        var reqData2 = new FormData();

	        var imagefiles = currentImgData || "";
	        var block = imagefiles.split(";");
	        var contentType = block[0].split(":")[1];
	        var realData = block[1].split(",")[1];

	        var blob = b64toBlob(realData, contentType);
	        
	        reqData2.append('imageData', blob);
	        reqData2.append('image', data['imgName']);
	        reqData2.append('folderName', 'kyc');
	        // reqData2.append('uploadType', 'private');

	        $.ajax({
	            url: 'scripts/reqUploadCDN.php',
	            type: 'post',
	            data: reqData2,
	            contentType: false,
	            processData: false,
	            async: false,
	            success: function(data){
	                uploadyKYCSuccess();
	            },
	        });
	    }else{
	        uploadyKYCSuccess();
	    }
	}

	function b64toBlob(b64Data, contentType, sliceSize) {
	    contentType = contentType || '';
	    sliceSize = sliceSize || 512;

	    var byteCharacters = atob(b64Data);
	    var byteArrays = [];

	    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
	        var slice = byteCharacters.slice(offset, offset + sliceSize);

	        var byteNumbers = new Array(slice.length);
	        for (var i = 0; i < slice.length; i++) {
	            byteNumbers[i] = slice.charCodeAt(i);
	        }

	        var byteArray = new Uint8Array(byteNumbers);

	        byteArrays.push(byteArray);
	    }

	  var blob = new Blob(byteArrays, {type: contentType});
	  return blob;
	}

	function uploadyKYCSuccess(data,message){
		$('#modalKYCConfirm').modal('hide');

		if(saveVerifyType == "idVerify"){
			showMessage("<?php echo $translations['M03378'][$language]; /* Success Verified ID */ ?>", "success", "<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>", "success", "kyc");
    	}else if(saveVerifyType == "bankAccVerify"){
			showMessage("<?php echo $translations['M03379'][$language]; /* Success Verified Bank Account Cover */ ?>", "success", "<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>", "success", "kyc");
		}else{
			showMessage("<?php echo $translations['M03380'][$language]; /* Success Verified NPWP */ ?>", "success", "<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>", "success", "kyc");
		}
	}

</script>