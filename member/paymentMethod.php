<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container" style="color: #000; background-color: #fff; padding: 50px 0;">
    <div class="row mx-0 justify-content-center">
        <div class="col"></div>
        <div class="col-10">
            <div class="checkoutTitle">
                <label data-lang="M02885"><?php echo $translations['M02885'][$language]; /* Payment Method */?></label>
            </div>
        </div>
        <div class="col"></div>
    </div>

   
    <div class="row mx-0 justify-content-center">
        <div class="col-10 px-0">
            <div class="row">
                <div class="col-md-6 p-4">
                    <div class="col-12 px-0">
                        <div class="row m-1 mb-5 pickupDiv">
                            <div class="col-12 paymentDiv">
                                <div class="row d-flex justify-content-center">
                                    <div class="col radioDiv px-0">
                                        <input class="radioStyle" type="radio" name="paymentMethod" id="paymentMethod1" value="fpxOnlineBanking" checked>
                                    </div>
                                    <div class="col-7 pl-2 pr-0">
                                        <label for="pickupLocation1">
                                            <h3 class="bold blackFont" data-lang="M03196"><?php echo $translations['M03196'][$language]; /* FPX Online Banking */?></h3>
                                            <p class="grayFont">Use online banking to make faster payment online.</p>
                                        </label>
                                    </div>
                                    <div class="col-4 text-right px-0">
                                        <img class="paymentIcon" src="images/project/fpx.png" alt="FPX Online Banking">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 paymentDiv">
                                <div class="row d-flex justify-content-center">
                                    <div class="col radioDiv px-0">
                                        <input class="radioStyle" type="radio" name="paymentMethod" id="paymentMethod2" value="creditCard">
                                    </div>
                                    <div class="col-7 pl-2 pr-0">
                                        <label for="pickupLocation2">
                                            <h3 class="bold blackFont" data-lang="M03197"><?php echo $translations['M03197'][$language]; /* Credit Card/Debit Card */?></h3>
                                            <p class="grayFont">Use online banking to make faster payment online.</p>
                                        </label>
                                    </div>
                                    <div class="col-4 text-right px-0">
                                        <img class="paymentIcon" src="images/project/mastercard.png" alt="Credit Card/Debit Card">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 paymentDiv">
                                <div class="row d-flex justify-content-center">
                                    <div class="col radioDiv px-0">
                                        <input class="radioStyle" type="radio" name="paymentMethod" id="paymentMethod3" value="duitNow">
                                    </div>
                                    <div class="col-7 pl-2 pr-0">
                                        <label for="pickupLocation2">
                                            <h3 class="bold blackFont" data-lang="M03198"><?php echo $translations['M03198'][$language]; /* Duit Now */?></h3>
                                            <p class="grayFont">Use online banking to make faster payment online.</p>
                                        </label>
                                    </div>
                                    <div class="col-4 text-right px-0">
                                        <img class="paymentIcon" src="images/project/duitnow.png" alt="Duit Now">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <div class="m-1 p-4 pickupDiv">
                        <div class="row d-flex m-2 justify-content-between">
                            <p class="blackFont thin" data-lang="M02881"><?php echo $translations['M02881'][$language]; /* Subtotal */?></p>
                            <p class="bold blackFont">Rp 3,000,000</p>
                        </div>
                        <div class="row d-flex m-2 justify-content-between">
                            <p class="blackFont thin" data-lang="M03188"><?php echo $translations['M03188'][$language]; /* Promocode */?></p>
                            <p class="bold redFont">Rp 600,000</p>
                        </div>
                        <div class="row d-flex m-2 justify-content-between">
                            <p class="blackFont thin" data-lang="M02882"><?php echo $translations['M02882'][$language]; /* Shipping Fee */?></p>
                            <p class="bold blackFont">FREE</p>
                        </div>
                        <div class="row d-flex m-2 justify-content-between">
                            <p class="blackFont thin" data-lang="M02924"><?php echo $translations['M02924'][$language]; /* Tax */?></p>
                            <p class="bold blackFont">Rp 300,000</p>
                        </div>
                        <div class="row d-flex m-2 justify-content-between borderline3">
                            <p class="blackFont thin" data-lang="M00250"><?php echo $translations['M00250'][$language]; /* Total */?></p>
                            <p class="bold blackFont">Rp 2,700,000</p>
                        </div>
                    </div>
                    <div class="row m-1">
                        <div class="col-12 checkoutBtn">
                            <button class="alignMiddle btn btn-primary whiteFont btnAddToCart btnAddToCart " style="float: right;" data-lang="M03199"><?php echo $translations['M03199'][$language]; /* Pay Now */?>&nbsp;></i></button>
                        </div>
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
$(document).ready(function() {
    $('#sameAdd').change(function() {
        $(this).is(":checked") ? $('#billingAddress').hide() : $('#billingAddress').show();
    });
    $('.checkoutBtn').click(function() {
        window.location.href="homepage.php";
    });
});

</script>