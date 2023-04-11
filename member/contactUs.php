<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container px-0">
    <div class="row mx-0 justify-content-center" style="color: #000;">
        <div class="col-md-5 col-12 contactDetailsDiv">
            <div class="contactDetailsDesc">
                <div class="row mx-0">
                    <div class="pt-4 contactTitle" data-lang="M03225"><?php echo $translations['M03225'][$language]; //Our Contact Details ?></div>
                </div>
                <!-- <div class="row mx-0">
                    <span class="thin mt-2 contactSubtitle1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                </div> -->

                <div class="d-flex align-items-center mt-5 contactDiv">
                    <div class="mr-4">
                        <img src="images/project/Location.png" class="contactIco">
                    </div>
                    <div class="">
                        <div class="row mx-0">
                            <label data-lang="M03226"><?php echo $translations['M03226'][$language]; //Location ?></label>
                        </div>
                        <div class="row mx-0">
                            <span class="contactText">
                            Pergudangan Taman Tekno 2 Blok H8 
                            <br> No. 15-16 Jalan Taman. Tekno Widya Raya,
                            <br> BSD, Kecamatan Setu, 
                            <br> Kota Tangerang Selatan, 
                            <br> Banten 15314
                        </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center contactDiv">
                    <div class="mr-4">
                        <img src="images/project/Phone.png" class="contactIco">
                    </div>
                    <div class="">
                        <div class="">
                            <label data-lang="M03227"><?php echo $translations['M03227'][$language]; //Phone ?></label>
                        </div>
                        <div class="">
                            <span class="contactText">021-75685326</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center contactDiv">
                    <div class="mr-4">
                        <img src="images/project/Mail.png" class="contactIco">
                    </div>
                    <div class="">
                        <div class="">
                            <label data-lang="M03228"><?php echo $translations['M03228'][$language]; //Support ?></label>
                        </div>
                        <div class="">
                            <span class="contactText">cs@meta-fiz.com</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center contactDiv">
                    <div class="mr-4">
                        <img src="images/project/User.png" class="contactIco">
                    </div>
                    <div class="">
                        <div class="">
                            <label data-lang="M03229"><?php echo $translations['M03229'][$language]; //Operation Hours ?></label>
                        </div>
                        <div class="">
                            <span class="contactText">9.00am - 5.00pm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 contactForm">
            <div class="row justify-content-center m-0 p-0">
                <div class="col-lg-10 m-0 p-0">
                    <div class="bold contactTitle pt-4 px-4 mb-0" data-lang="M03230"><?php echo $translations['M03230'][$language]; //Get In Touch With Us ?></div>
                    <div class="contactSubtitle2 grayFont px-4 pb-4 mt-2" data-lang="M03231"><?php echo $translations['M03231'][$language]; //We Are Always Here To Help Your Business ?></div>
                </div>
            </div>
            
            <form id="contactForm" class="">
                <div class="row justify-content-center mx-0">
                    <div class="col-lg-5 col-md-6 px-4 pt-md-4 pb-md-0 py-2">
                        <input id="contactName" class="form-control blue" type="text" placeholder="<?php echo $translations['M03232'][$language]; //Your Name ?>*">
                    </div>
                    <div class="col-lg-5 col-md-6 px-4 pt-md-4 pb-md-0 py-2">
                        <input id="contactUsEmail" class="form-control blue" type="text" placeholder="<?php echo $translations['M00187'][$language]; //Email Address ?>*">
                    </div>
                </div>
                <div class="row justify-content-center mx-0">
                    <div class="col-lg-5 col-md-6 px-4 pt-md-4 pb-md-0 py-2">
                        <input id="phone" class="form-control blue" type="text" placeholder="<?php echo $translations['M03145'][$language]; //Phone Number ?>*">
                    </div>
                    <div class="col-lg-5 col-md-6 px-4 pt-md-4 pb-md-0 py-2">
                        <input id="subject" class="form-control blue" type="text" placeholder="<?php echo $translations['M00302'][$language]; //Subject ?>">
                    </div>
                </div>
                <div class="row justify-content-center mx-0">
                    <div class="col-lg-10 px-4 py-md-4 py-2">
                        <textarea id="message" class="form-control blue" style="min-height: 150px; resize: none;" type="text" placeholder="<?php echo $translations['M03233'][$language]; //Your Message ?>"></textarea>
                    </div>
                </div>
            </form>
            <div class="row justify-content-center mx-0">
                <div class="col-lg-10 p-4">
                    <button id="sendBtn" class="btn btn-primary blue letterSpace" data-lang="M00317"><?php echo $translations['M00317'][$language]; //Send Message ?></button>
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

<!-- <div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div> -->



<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
$(document).ready(function(){

    $("#sendBtn").click(function(){
        var subject     = $("#subject").val();
        var message     = $("#message").val();
        var name        = $("#contactName").val();
        var phone       = $("#phone").val();
        var email       = $("#contactUsEmail").val();
        formData  = {
            command     : 'addPublicTicket',
            subject     : subject,
            message     : message,
            name        : name,
            phone       : phone,
            email       : email
        };
        fCallback = submitCallback;
        // console.log(formData)
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function submitCallback(data, message) {
        showMessage(message, 'success', 'Success', 'edit', 'contactUs');
    }
});
</script>