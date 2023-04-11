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
                <div class="checkoutTitle" data-lang="M00268">
                    <?php echo $translations['M00268'][$language]; //Confirmation ?>
                </div>

                <div class="mt-5 row">
                    <div class="row mx-0 px-0 justify-content-center">
                        <div class="col-md-6 pr-lg-5">
                            <div class="formTitle">
                                <label data-lang="M03192"><?php echo $translations['M03192'][$language]; /* Shipping Address */?></label>
                            </div>
                            <div class="row mx-0 justify-content-between borderline3 deliverySection">
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
                                        <td class="grayFont" data-lang="M03155">
                                            <?php echo $translations['M03155'][$language]; /* Sub-District */?>
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
                            <div class="mt-5 formTitle">
                                <label data-lang="M03260"><?php echo $translations['M03260'][$language]; /* Billing Address */?></label>
                            </div>
                            <div class="row mx-0 justify-content-between borderline3 deliverySection">
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
                                        <td class="grayFont" data-lang="M03155">
                                            <?php echo $translations['M03155'][$language]; /* Sub-District */?>
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
                        <div class="col-md-6 pl-lg-5 mt-5 mt-md-0">
                            <div class="formTitle pl-2">
                                <label data-lang="M02885"><?php echo $translations['M02885'][$language]; /* Payment Method */?></label>
                            </div>
                            <div class="row m-1 mb-5">
                                <div class="col-12 paymentDiv">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <input class="radioStyle" type="radio" name="paymentMethod" id="walletCredit" value="walletCredit" checked>
                                        </div>
                                        <div class="col-7">
                                            <label for="pickupLocation1 mb-0">
                                                <h3 class="bold blackFont" data-lang="M03381"><?php echo $translations['M03381'][$language]; /* Wallet Credits */?></h3>
                                                <div class="grayFont" data-lang="M03382"><?php echo $translations['M03382'][$language]; /* Use wallet credits to make faster payment online */?>.</div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-right">
                                            <img class="paymentIcon" src="images/project/fpx.png" alt="FPX Online Banking">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <p class="bold blackFont" data-lang="M00061"><?php echo $translations['M00061'][$language]; /* Free */?></p>
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
                                    <button class="alignMiddle btn btn-primary whiteFont btnAddToCart" style="float: right;" data-lang="M03199"><?php echo $translations['M03199'][$language]; /* Pay Now */?>&nbsp;<i class="ml-1 fas fa-chevron-right"></i></button>
                                </div>
                            </div>
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
    $('.checkoutBtn').click(function() {
        window.location.href="homepage.php";
    });
});

</script>