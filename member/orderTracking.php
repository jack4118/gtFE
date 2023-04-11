<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
	<div class="col-12">
		<div class="pageTitle text-center">
			<span><?php echo $translations['M03515'][$language] /*Order Tracking*/ ?></span>
            <br> <span class="grayFont" style="font-weight: 300;" data-lang="M03683"><?php echo $translations['M03683'][$language] /*Choose a courier to track your order immediately*/ ?>.</span>
		</div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12 mt-5">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="courierBox text-center" onclick="redirectJNE();">
                                <img class="mt-5 mb-4" src="images/project/JNE.png">
                                <div class="blackFont text-center mt-5" style="font-weight: 500;">
                                    JNE Express
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-5">
                            <div class="courierBox text-center" onclick="redirectON();">
                                <img class="" src="images/project/ONDELIVERY.png">
                                <div class="blackFont text-center mt-5" style="font-weight: 500;">
                                    ON Delivery
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



<!-- Print Content  -->

<!-- <div id="printContent" class="invoiceOuterWrapper whiteBg"> -->
</div>


<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<?php include 'printStyling.php' ?>


<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";



$(document).ready(function() {

	
});

function redirectJNE() {
    window.open('https://www.jne.co.id/en/tracking/trace');
}

function redirectON() {
    window.open('https://ondelivery.id/tracking');
}

</script>
