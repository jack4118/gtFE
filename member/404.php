<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section whiteBg errorPage">
    <div class="row">
        <div class="offset-md-1 col-md-5">
            <img src="images/project/erroe-404.png" class="img-fluid">
        </div>
        <div class="col-md-5">
            <div class="errorPageTextDiv">
                <h3>UH OH...</h3>
                <p>
                    Your Food Is Entering The Freezer. <br/>
                    Visit Our Frosted Food <a href="foodMenu">Here</a>
                </p>
            </div>
        </div>        
    </div>
</section>

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
    var fCallback = "";
    var slideIndex = 1;
    var memoURL = "<?php echo $config['tempMediaUrl']; ?>";


    $(document).ready(function(){
            
    });

    function loadDefaultListing (data,message) {
        
    }

</script>