<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<span id="walletName"></span> - <?php echo $translations["M00371"][$language]; //Deposit ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-lg-6 col-12">
	                <div class="row">
	                    <div class="col-12 normalText">
	                        <?php echo $translations['M00302'][$language]; //Send ?> <span class="getCoinType"></span> <?php echo $translations['M00100'][$language]; //to the following wallet address. ?>
	                    </div>

	                    <div class="col-12" style="margin-top: 20px;overflow: hidden;">
	                        <div class="col-12 depositQRposition">
	                            <img src="<?php echo $config['favicon']; ?>" class="QRLogo">
	                        </div>
	                        <div id="payPaymentQR" class="depositQR"></div>
	                    </div>

	                    <div class="col-12 normalText">
	                        <?php echo $translations['M00275'][$language]; //Wallet Address ?>
	                    </div>

	                    <div class="col-md-9 col-sm-12" style="margin-top: 5px; display: flex;">
	                        <input id="QRreferralLink2" type="text" class="form-control inputDesign" readonly="readonly">
	                        <button onclick="myFunction()" type="button" class="btn btn-primary"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
	                    </div>
	                    <div id="walletCheck" class="col-12" style="margin-top: 10px;display: none;margin-bottom: 10px;color: green">
	                        <i class="fa fa-check fa-lg ml-2 mr-2" aria-hidden="true"></i>
	                        <span><?php echo $translations['M00880'][$language]; //Copied To Clipboard ?></span>
	                    </div>
	                    <div class="col-12" style="color:#666666;">
	                      <li><?php echo $translations['M00101'][$language]; //Coin will be deposited after 3 network confirmations ?></li>
	                    </div>
	                </div>
	            </div>

	            <div class="col-lg-6 col-12">
	                <div class="row">
	                    <div class="col-12 depositAlertBox2">
	                        <div class="row">
	                            <div class="col-12 depositAlertBox">
	                                <div class="row">
	                                    <div class="col-md-2 col-12 align-self-center text-center">
	                                        <img src="images/alertIcon.png" class="alertIcon">
	                                    </div>
	                                    <div class="col-md-9 col-12">
	                                        <div class="row">
	                                            <div class="col-12 normalText">
	                                                <li><?php echo $translations['M00103'][$language]; //Send only ?> <span class="getCoinType"></span> <?php echo $translations['M00109'][$language]; //to this deposit address. ?></li>
	                                            </div>
	                                            <div class="col-12 normalText">
	                                                <?php echo $translations['M00116'][$language]; //Sending coin or token other than ?> <span class="getCoinType"></span> <?php echo $translations['M00139'][$language]; //to this address may result in the loss of your deposit. ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
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

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>
=

</html>
<script type="text/javascript" src="js/qrcode.js"></script>
<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
    var amount = '<?php echo $_POST['amount']; ?>';
    var coin_type = '<?php echo $_POST['coin_type']; ?>';

    $(document).ready(function(){
    	$("#walletName").html(creditDisplay);
    	$('.getCoinType').html(creditDisplay);

        var formData  = {
            command   	: "getTheNuxTransactionToken",
            amount 	    : amount,
            coin_type 	: coin_type
        };

        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);      
	});



	function submitCallback(data, message) {
		
	    var walletAddress = data.theNuxCoinPrefix +":"+ data.walletAddress;
	    var QRCODE_CONTENT = walletAddress;

	    console.log(data);

	    // alert(QRCODE_CONTENT);
	    $('#QRreferralLink2').val(data.walletAddress);
	    var form = document.forms['qrForm'];    
	    var typeNumber = 5;
	    var errorCorrectLevel = 'M';
	    var qrcode = new QRCode(document.getElementById("payPaymentQR"), {
	        text: QRCODE_CONTENT,
	        width: 200,
	        height: 200,
	        colorDark : "#000000",
	        colorLight : "#ffffff",
	        correctLevel : QRCode.CorrectLevel.H
	    });
	}


	function myFunction() {
	    $("#walletCheck").show();
	    var copyText = document.getElementById("QRreferralLink2");
	    copyText.select();
	    document.execCommand("copy");

	    setTimeout(function () {
	      $("#walletCheck").hide();
	    }, 1000);
	}


</script>