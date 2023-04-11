    <?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container" style="color: #000; background-color: #fff; padding: 50px 0;">
    <div class="row mx-0 justify-content-center">
        <div class="col-10">
            <div class="checkoutTitle">
                <label data-lang="M03190"><?php echo $translations['M03190'][$language]; /* Shipping Details */?></label>
            </div>
        </div>
    </div>

   
    <div class="row mx-0 justify-content-center">
        <div class="col-10 px-0">
            <div class="row mx-0 px-0">
                <div class="col-md-4 col-sm-12 mt-4 shippingSelectionDiv">
                    <input class="radioStyle" type="radio" name="shipping" id="shipping1" value="standardDelivery" checked>
                    <label for="shipping1">
                        <img src="images/project/delivery_truck.png" class="shippingIcon mx-2" alt="">
                        <p class="blackFont d-inline" data-lang="M02920"><?php echo $translations['M02920'][$language]; /* Standard Delivery */?></p>
                    </label>
                </div>
                <div class="col-md-4 col-sm-12 mt-4 shippingSelectionDiv">
                    <input class="radioStyle" type="radio" name="shipping" id="shipping2" value="expressDelivery">
                    <label for="shipping2">
                        <img src="images/project/globe.png" class="shippingIcon mx-2" alt="">
                        <p class="blackFont d-inline" data-lang="M03191"><?php echo $translations['M03191'][$language]; /* Express Delivery */?></p>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-0 justify-content-center">
        <div class="col-10">
            <div class="row mx-0 px-0 justify-content-center">
                <div class="col m-1 p-4">
                    <div class="checkoutTitle">
                        <label data-lang="M03192"><?php echo $translations['M03192'][$language]; /* Shipping Address */?></label>
                    </div>
                    <div class="row d-flex m-2 justify-content-between borderline3">
                        <table style="width: 100%;">
                            <tr style="width: 100%;">
                                <td style="width:40%;" class="grayFont" data-lang="M03193">
                                    <?php echo $translations['M03193'][$language]; /* First Name */?>
                                </td>
                                <td style="width:10%;" class="grayFont">
                                    :
                                </td>
                                <td style="width:50%;" class="blackFont">
                                    Ming Teong
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03194">
                                    <?php echo $translations['M03194'][$language]; /* Last Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Tan
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03195">
                                    <?php echo $translations['M03195'][$language]; /* Company Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00178">
                                    <?php echo $translations['M00178'][$language]; /* Country */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Malaysia
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M02466">
                                    <?php echo $translations['M02466'][$language]; /* Address */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    No.11, Jalan Senai 2
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03153">
                                    <?php echo $translations['M03153'][$language]; /* Street Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Jalan Senai 2
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00180">
                                    <?php echo $translations['M00180'][$language]; /* State */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Perak
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03158">
                                    <?php echo $translations['M03158'][$language]; /* Postal Code */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    12345
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00298">
                                    <?php echo $translations['M02298'][$language]; /* Phone Number */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    +601234567890
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00187">
                                    <?php echo $translations['M00187'][$language]; /* Email Address */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    example@gmail.com
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col m-1 p-4">
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
                    <div class="row mx-1 my-0">
                        <div class="col-12 checkoutBtn">
                            <button class="alignMiddle btn btn-primary whiteFont btnAddToCart" style="float: right;" data-lang="M03189"><?php echo $translations['M03189'][$language]; /* Proceed to Payment */?>&nbsp;></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="row mx-0 justify-content-center">
        <div class="col-10">
            <div class="row mx-0 px-0 justify-content-center">
                <div class="col m-1 p-4">
                    <div class="checkoutTitle">
                        <label data-lang="M03260"><?php echo $translations['M03260'][$language]; /* Billing Address */?></label>
                    </div>
                    <div class="row d-flex m-2 justify-content-between borderline3">
                        <table style="width: 100%;">
                            <tr style="width: 100%;">
                                <td style="width:40%;" class="grayFont" data-lang="M03193">
                                    <?php echo $translations['M03193'][$language]; /* First Name */?>
                                </td>
                                <td style="width:10%;" class="grayFont">
                                    :
                                </td>
                                <td style="width:50%;" class="blackFont">
                                    Ming Teong
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03194">
                                    <?php echo $translations['M03194'][$language]; /* Last Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Tan
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03195">
                                    <?php echo $translations['M03195'][$language]; /* Company Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00178">
                                    <?php echo $translations['M00178'][$language]; /* Country */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Malaysia
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M02466">
                                    <?php echo $translations['M02466'][$language]; /* Address */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    No.11, Jalan Senai 2
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03153">
                                    <?php echo $translations['M03153'][$language]; /* Street Name */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Jalan Senai 2
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M00180">
                                    <?php echo $translations['M00180'][$language]; /* State */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    Perak
                                </td>
                            </tr>
                            <tr>
                                <td class="grayFont" data-lang="M03158">
                                    <?php echo $translations['M03158'][$language]; /* Postal Code */?>
                                </td>
                                <td class="grayFont">
                                    :
                                </td>
                                <td class="blackFont">
                                    12345
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col m-1 p-4">
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
        window.location.href="paymentMethod.php";
    });
});

</script>