<?php
include 'include/config.php';
include 'head.php';


// Store Callback
$raw_body = "\n".date("Y-m-d H:i:s")."\t";
$raw_body .= file_get_contents('php://input');
$raw_body .= "\n".json_encode($_POST);

$file = 'log/paymentComplete.log';
file_put_contents($file, $raw_body, FILE_APPEND);

?>
<style type="text/css">
    .termFont {
        font-size: 14px;
        color: black;
    }

    .termRemark {
        font-size:11px;
    }
</style>
<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageHeader.php';?>

<!-- Banner -->
<!-- <div>
    <div class="banner productListingPortfolioBanner">
        <img class="bannerImg compProf m-0 p-0" src="images/project/products2.jpg" alt="companyProfileBanner">
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03052"><?php echo $translations['M03052'][$language]; /* Terms and Conditions */?></label>
            <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang=:M03116><?php echo $translations['M03116'][$language]; /* Who We Are */?></span>
            </div>
        </div>
    </div>
    
</div> -->

<div class="text-center paymentCompleteDiv termFont">
    <img id="statusImg" src="images/project/successIcon.png">
    <h1 id="statusTitle" class="p-4"><?php echo $translations['M00372'][$language]; /* Payment Successful */?></h1>
    <br>
    <p id="statusMessage">
        <?php echo $translations['M03539'][$language]; /* Congratulations! Your payment with Metafiz has been successful. */?>
    </p>
    <div>
        <a id="shopBtn" href="javascript:;" class="btn btn-default white mx-2"><?php echo $translations['M03398'][$language]; /* Continue Shopping */?></a>
        <a id="viewOrderBtn" href="javascript:;" class="btn btn-primary green mx-2"><?php echo $translations['M03543'][$language]; /* View Order  */?></a>
        <a id="tryAgainBtn" style="display: none;" href="javascript:;" class="btn btn-primary green mx-2"><?php echo $translations['M03542'][$language]; /* Try Again  */?></a>
    </div>
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
<script>
    
</script>
</body>

<?php include 'backToTop.php' ?>

<?php
    if(isset($_COOKIE['sessionData'])) {
        $_SESSION = json_decode($_COOKIE['sessionData'], true);
    }
?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<script>
// Get statusResult from nicepay redirect
var postData =  `<?php foreach ($_POST as $key => $value)
                    if($key == "resultMsg")
                        echo $value;
                ?>`;

$(document).ready(function() {
    // console.log(postData)
    if(postData == "SUCCESS"){
        $("#statusImg").attr("src","images/project/successIcon.png")
        $("#statusTitle").html(`<?php echo $translations['M00372'][$language]; /* Payment Successful */?>`)
        $("#statusMessage").html(`<?php echo $translations['M03539'][$language]; /* Congratulations! Your payment with Metafiz has been successful. */?>`)

        $("#shopBtn").show();
        $("#viewOrderBtn").show();
        $("#tryAgainBtn").hide();

    }else{
        $("#statusImg").attr("src","images/project/errorIcon.png")
        $("#statusTitle").html(`<?php echo $translations['M03540'][$language]; /* Payment Unsuccessful */?>`)
        $("#statusMessage").html(`<?php echo $translations['M03541'][$language]; /* Sorry! Your payment with Metafiz has been unsuccessful. Please try again. */?>`)

        $("#shopBtn").hide();
        $("#viewOrderBtn").hide();
        $("#tryAgainBtn").show();
    }
    $("#shopBtn").click(function (){
        $.redirect("productListing");
    });
    $("#viewOrderBtn").click(function (){
        $.redirect("orderListing");
    });
    $("#tryAgainBtn").click(function (){
        $.redirect("productListing");
    });
});
</script>