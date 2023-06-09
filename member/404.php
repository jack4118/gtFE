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
        <div class="col-md-6 text-right">
            <img src="images/project/erroe-404.png" class="img-fluid">
        </div>
        <div class="col-md-5 offset-md-1">
            <div class="errorPageTextDiv">
                <h3 data-lang="M03917"><?php echo $translations['M03917'][$language] /* UH OH... */ ?></h3>
                <p>
                    <span data-lang="M03918"><?php echo $translations['M03918'][$language] /* Your Food Is Entering The Freezer. */ ?></span> <br/>
                    <span data-lang="M03919"><?php echo $translations['M03919'][$language] /* Visit Our Frosted Food */ ?></span> <a href="foodMenu" data-lang="M03920"><?php echo $translations['M03920'][$language] /* Here */ ?></a>
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