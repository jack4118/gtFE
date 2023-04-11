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
                <label data-lang="M03187"><?php echo $translations['M03187'][$language]; /* Pickup Locations */?></label>
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
                            <div class="col-12 pickUpSelectionDiv">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-2 radioDiv">
                                        <input class="radioStyle" type="radio" name="pickupLocation" id="pickupLocation1" value="HQ" checked>
                                    </div>
                                    <div class="col-8">
                                        <label for="pickupLocation1">
                                            <h3 class="bold blackFont">HQ</h3>
                                            <p class="grayFont">Street 121 Kernang Utara No 17, Jakarta 14420 Indonesia</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pickUpSelectionDiv">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-2 radioDiv">
                                        <input class="radioStyle" type="radio" name="pickupLocation" id="pickupLocation2" value="Cabinet2">
                                    </div>
                                    <div class="col-8">
                                        <label for="pickupLocation2">
                                            <h3 class="bold blackFont">Cabinet 2</h3>
                                            <p class="grayFont">Street 121 Kernang Utara No 17, Jakarta 14420 Indonesia</p>
                                        </label>
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
                            <button class="btn btn-primary whiteFont btnAddToCart btnAddToCart alignMiddle" style="float: right;" data-lang="M03189"><?php echo $translations['M03189'][$language]; /* Proceed to Payment */?>&nbsp;></i></button>
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
});

    $('.checkoutBtn').click(function() {
        window.location.href="shippingDetails.php";
    });
</script>