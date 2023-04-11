<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section section-favourite">
    <div class="row">
        <div class="col-12">
            <h3 class="jp-title">My Favourites</h3>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div id="favourite" class="row jp-list-group">
        <div class="item col-xs-4 col-md-3">
            <!-- <a onclick="foodClick(${v['id']})"> -->
                <div class="thumbnail">
                    <span class="favourite-counter">1000 Sold</span>
                    <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                    <div class="caption">
                        <p class="group inner list-group-item-text" style="text-align: center;">
                            Kuala Lumpur Kepong Leong Kee Bah Kut Teh - Pork Belly</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="group inner list-group-item-heading">RM25.90</h4>
                                <p class="lead">
                                    <font class="price-slash">RM30.90</font> -16%
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 cart-btn-div">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn button-red button-fix-width-2" href="#1">Add to cart</button>
                                        <i class="fa fa-heart active"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </a> -->
        </div>

        <div class="item col-xs-4 col-md-3">
            <!-- <a onclick="foodClick(${v['id']})"> -->
                <div class="thumbnail">
                    <span class="favourite-counter">1000 Sold</span>
                    <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                    <div class="caption">
                        <p class="group inner list-group-item-text" style="text-align: center;">
                            Kuala Lumpur Kepong Leong Kee Bah Kut Teh - Pork Belly</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="group inner list-group-item-heading">RM25.90</h4>
                                <p class="lead">
                                    <font class="price-slash">RM30.90</font> -16%
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 cart-btn-div">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn button-red button-fix-width-2" href="#1">Add to cart</button>
                                        <i class="fa fa-heart active"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </a> -->
        </div>

        <div class="item col-xs-4 col-md-3">
            <!-- <a onclick="foodClick(${v['id']})"> -->
                <div class="thumbnail">
                    <span class="favourite-counter">1000 Sold</span>
                    <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                    <div class="caption">
                        <p class="group inner list-group-item-text" style="text-align: center;">
                            Kuala Lumpur Kepong Leong Kee Bah Kut Teh - Pork Belly</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="group inner list-group-item-heading">RM25.90</h4>
                                <p class="lead">
                                    <font class="price-slash">RM30.90</font> -16%
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 cart-btn-div">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn button-red button-fix-width-2" href="#1">Add to cart</button>
                                        <i class="fa fa-heart active"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </a> -->
        </div>
        
        <div class="item col-xs-4 col-md-3">
            <!-- <a onclick="foodClick(${v['id']})"> -->
                <div class="thumbnail">
                    <span class="favourite-counter">1000 Sold</span>
                    <img class="group list-group-image img-fluid" src="images/project/menu.jpg" alt="" />
                    <div class="caption">
                        <p class="group inner list-group-item-text" style="text-align: center;">
                            Kuala Lumpur Kepong Leong Kee Bah Kut Teh - Pork Belly</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="group inner list-group-item-heading">RM25.90</h4>
                                <p class="lead">
                                    <font class="price-slash">RM30.90</font> -16%
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 cart-btn-div">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn button-red button-fix-width-2" href="#1">Add to cart</button>
                                        <i class="fa fa-heart active"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </a> -->
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
        var formData  = {
            command     : "getProductInventoryList",
            pageNumber  : 1
        };
        var fCallback = loadDefaultListing; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
    });

    function loadDefaultListing (data,message) {
        
}

</script>