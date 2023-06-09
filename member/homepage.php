<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<!-- Section 1 -->
<section class="section homepageBgGrp1">
    <div class="homepageBg1 p-5">
        <div class="row m-0 p-0 p-lg-5 flex-column">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="borderBottom white light">
                    <div class="titleText larger bold pb-3 text-white" data-lang="M03764"><?php echo $translations['M03764'][$language]; /* Enjoy Favourite Food Instantly! */ ?></div>
                    <div class="pt-4"><i class="fa fa-check text-white bodyText larger mr-2"></i><span class="text-white bodyText larger" data-lang="M03765"><?php echo $translations['M03765'][$language] /* Skip Queue & Traffic */ ?></span></div>
                    <div class="pb-4"><i class="fa fa-check text-white bodyText larger mr-2"></i><span class="text-white bodyText larger" data-lang="M03766"><?php echo $translations['M03766'][$language] /* Only 5 minutes Preparation Time! */ ?></span></div>
                    <a class="btn btn-primary mt-3 mb-5" href="foodMenu" data-lang="M03767"><?php echo $translations['M03767'][$language] /* Order Now */ ?></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-12">
                <div class="mt-5 d-flex flex-column flex-sm-row">
                    <span class="titleText smaller text-white" data-lang="M03768"><?php echo $translations['M03768'][$language] /* Call us at */ ?>: &nbsp;</span>
                    <span class="titleText smaller bold text-white"> +6018-2626000</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2 -->
<section class="section whiteBg">
    <div class="homepageBg2 px-3 py-5 p-lg-5 d-none d-md-block">
        <div class="row m-0 p-0 p-lg-5">
            <div class="offset-7 offset-lg-8">
                <div class="titleText smaller bold text-white pb-3" data-lang="M03769"><?php echo $translations['M03769'][$language] /* What We Sell? */ ?></div>
                <div class="pt-4"><img src="images/project/wws1.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03770"><?php echo $translations['M03770'][$language] /* Your Hometown's Food */ ?></span></div>
                <div class="pt-4"><img src="images/project/wws2.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03771"><?php echo $translations['M03771'][$language] /* Your Favourite Food */ ?></span></div>
                <div class="pt-4"><img src="images/project/wws3.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03772"><?php echo $translations['M03772'][$language] /* Famous Food */ ?></span></div>
            </div>
        </div>
    </div>
    <div class="row m-0 d-block d-md-none">
        <div class="col-12 px-0">
            <img src="images/project/what-we-sell2.jpg" class="whatWeSellImg">
        </div>
        <div class="col-12 p-5 redBg">
            <div class="titleText smaller bold text-white pb-3" data-lang="M03769"><?php echo $translations['M03769'][$language] /* What We Sell? */ ?></div>
            <div class="pt-4"><img src="images/project/wws1.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03770"><?php echo $translations['M03770'][$language] /* Your Hometown's Food */ ?></span></div>
            <div class="pt-4"><img src="images/project/wws2.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03771"><?php echo $translations['M03771'][$language] /* Your Favourite Food */ ?></span></div>
            <div class="pt-4"><img src="images/project/wws3.png" width="20px" class="mr-4"><span class="text-white bodyText larger" data-lang="M03772"><?php echo $translations['M03772'][$language] /* Famous Food */ ?></span></div>
        </div>
    </div>
</section>

<!-- Section 3 -->
<section class="section whiteBg">
    <div class="titleText smaller bold text-center" data-lang="M03773"><?php echo $translations['M03773'][$language] /* Our Services */ ?></div>
    <div class="row mt-3 mb-5">
        <div class="col-md-3 col-sm-6 col-12 mb-5 mb-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="images/project/service1.jpg" class="ourServicesImg">
                </div>
                <div class="col-12">
                    <div class="pt-4"><span class="bodyText smaller bold" data-lang="M03774"><?php echo $translations['M03774'][$language] /* Dedicated team */ ?> </span><span class="bodyText smaller" data-lang="M03775"><?php echo $translations['M03775'][$language] /* to purchase food and ensure its freshness. */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-5 mb-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="images/project/service2-2.jpg" class="ourServicesImg">
                </div>
                <div class="col-12">
                    <div class="pt-4"><span class="bodyText smaller bold" data-lang="M03776"><?php echo $translations['M03776'][$language] /* Implement latest food packaging technology. */ ?> </span><span class="bodyText smaller" data-lang="M03777"><?php echo $translations['M03777'][$language] /* Vacuum pack and blast freezing to maintain food taste and quality. */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-5 mb-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="images/project/service3.jpg" class="ourServicesImg">
                </div>
                <div class="col-12">
                    <div class="pt-4"><span class="bodyText smaller bold" data-lang="M03778"><?php echo $translations['M03778'][$language] /* Cold truck delivery */ ?> </span><span class="bodyText smaller" data-lang="M03779"><?php echo $translations['M03779'][$language] /* and user friendly delivery tracking system. */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-5 mb-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="images/project/service4.jpg" class="ourServicesImg">
                </div>
                <div class="col-12">
                    <div class="pt-4"><span class="bodyText smaller bold" data-lang="M03780"><?php echo $translations['M03780'][$language] /* Ensure each pack of food are traceable */ ?> </span><span class="bodyText smaller" data-lang="M03781"><?php echo $translations['M03781'][$language] /* from the kitchen to your plate, all with one scan on our food label. */ ?></span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4 -->
<section class="whiteBg borderTop grey light">
    <div class="row m-0">
        <div class="col-md-5 col-12 px-0">
            <div class="row m-0">
                <div class="col-md-12 px-0 borderAll grey light">
                    <div class="mapouter borderAll grey light"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=31-G, Jalan Damai Raya 6, Alam Damai, 56000 Kuala Lumpur&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><a href="https://embedgooglemap.2yu.co/">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>
                </div>
                <div class="col-md-12 px-5 p-4 borderAll grey light d-flex flex-column justify-content-center">
                    <div class="bodyText smaller bold" data-lang="M03782"><?php echo $translations['M03782'][$language] /* Kuala Lumpur (Head Quater) */ ?></div>
                    <div class="bodyText smaller mt-1">31-G, Jalan Damai Raya 6, Alam Damai, <br> 56000 Kuala Lumpur</div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-12 px-0 borderAll grey light">
                    <div class="mapouter borderAll grey light"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=66-G, Skyline City, Lintang Sungai Pinang, 10150, Jelutong, Penang&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><a href="https://embedgooglemap.2yu.co/">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>
                </div>
                <div class="col-md-12 px-5 p-4 borderAll grey light d-flex flex-column justify-content-center">
                    <div class="bodyText smaller bold" data-lang="M03783"><?php echo $translations['M03783'][$language] /* Georgetown, Penang */ ?></div>
                    <div class="bodyText smaller mt-1">66-G, Skyline City, Lintang Sungai Pinang, <br> 10150 Jelutong, Penang</div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-12 p-5" id="contactUs">
            <div class="py-3 p-md-5">
                <div class="titleText smaller bold" data-lang="M03784"><?php echo $translations['M03784'][$language] /* Write To Us */ ?></div>
                <div class="bodyText larger py-3" data-lang="M03785"><?php echo $translations['M03785'][$language] /* Become one of our vendor? Any food you craving for? Talk to us! */ ?></div>
                <div class="row pt-5">
                    <div class="col-sm-6 col-12 form-group">
                        <label for="name" data-lang="M00224"><?php echo $translations['M00224'][$language] /* Name */ ?></label>
                        <input class="form-control" type="text" id="name" data-lang="M03786" placeholder="<?php echo $translations['M03786'][$language] /* Please enter your name */ ?>">
                    </div>
                    <div class="col-sm-6 col-12 form-group">
                        <label for="email" data-lang="M00990"><?php echo $translations['M00990'][$language] /* Email */ ?></label>
                        <input class="form-control" type="text" id="email" data-lang="M03787" placeholder="<?php echo $translations['M03787'][$language] /* Your mail here */ ?>">
                    </div>
                    <div class="col-12 form-group">
                        <label for="message" data-lang="M00316"><?php echo $translations['M00316'][$language] /* Message */ ?></label>
                        <input class="form-control" type="text" id="message" data-lang="M03788" placeholder="<?php echo $translations['M03788'][$language] /* Text your message here... */ ?>">
                    </div>
                    <div class="col-12 form-group">
                        <button type="button" id="submitBtn" class="btn btn-primary mt-3" data-lang="M00346"><?php echo $translations['M00346'][$language] /* Submit */ ?></button>
                    </div>
                </div>
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
    $('#submitBtn').click(submitContactUs);
});

function submitContactUs() {
    // Remove error message
    $('.text-danger').remove();

    // Validate input
    var validate = inputValidation();
    if(!validate) return;

    //Send email
    formData = {
        command: 'submitContactUs',
        name: $("#name").val(),
        email: $("#email").val(),
        message: $("#message").val(),
    };

    $.ajax({
        type: method,
        url: url,
        data: formData,
    })
    .done(function(data) {
        var obj = JSON.parse(data);
        if (obj.status == 'ok') {
            showMessage(obj.statusMsg, 'success', '<?php echo $translations['M03784'][$language] /* Write To Us */ ?>', 'success', '');
            
            // Reset contact us form
            $("#name").val('');
            $("#email").val('');
            $("#message").val('');
        } else {
            showMessage(obj.statusMsg, 'warning', '<?php echo $translations['M03784'][$language] /* Write To Us */ ?>', 'warning', '');
        }		
    });
}

function inputValidation() {
    if($("#name").val() == '') {
        $("#name").after('<span class="text-danger" data-lang="M03789"><?php echo $translations['M03789'][$language] /* Name cannot be empty. */ ?></span>');
        $("#name").focus();
        return false;
    } else if($("#email").val() == '') {
        $("#email").after('<span class="text-danger" data-lang="M03790"><?php echo $translations['M03790'][$language] /* Email cannot be empty. */ ?></span>');
        $("#email").focus();
        return false;
    } else if($("#message").val() == '') {
        $("#message").after('<span class="text-danger" data-lang="M03791"><?php echo $translations['M03791'][$language] /* Message cannot be empty. */ ?></span>');
        $("#message").focus();
        return false;
    }

    return true;
}

</script>