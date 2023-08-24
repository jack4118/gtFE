<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section section-career-header">
    <div class="kt-container row">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="white-div">
                <h3 class="jp-title" data-lang="M03940"><?php echo $translations['M03940'][$language]; // GoTasty Vision ?></h3>
                <p class="mb-0" data-lang="M03941"><?php echo $translations['M03941'][$language]; //At GoTasty, we aim to position ourselves as the leader of frozen cooked food in Malaysia. We are committed to our company values which are uncompromising quality of food and customer satisfaction. ?></p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="kt-container row">
        <div class="col-md-12 text-center">
            <h3 class="jp-title pt-5 mb-0" data-lang="M03942"><?php echo $translations['M03942'][$language]; //GoTasty Objective ?></h3>
        </div>
    </div>

    <div class="kt-container row pb-5">
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5" data-lang="M03943">
                <?php echo $translations['M03943'][$language]; //To achieve 100% customer satisfaction.?>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5" data-lang="M03944">
                <?php echo $translations['M03944'][$language]; //To achieve cost optimization while maintaining food quality and customer service. ?>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5" data-lang="M03945">
                <?php echo $translations['M03945'][$language]; //To be the largest frozen cooked food platform in Malaysia. ?>
            </div>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="kt-container row">
        <div class="col-md-12 text-center">
            <h3 class="jp-title" data-lang="M03946"><?php echo $translations['M03946'][$language]; //Current Opening ?></h3>
        </div>
    </div>
    <div class="kt-container row" id="careerPost">
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
    var vacancy = [
            { 
                vacancyID: 1, 
                vacancyName: "<?php echo $translations['M03947'][$language]; //Operation Executive ?>", 
                vacancyDesc: "<?php echo $translations['M03948'][$language]; //Interact with customer for all enquiries & ensure customer satisfaction. ?>",
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime ?>",
                vacancyLocation: "<?php echo $translations['M04094'][$language]; //Kuala Lumpur ?>",
                vacancyImage: "career1.jpg"
            },
            { 
                vacancyID: 2, 
                vacancyName: "<?php echo $translations['M03950'][$language]; //Junior Software Engineer ?>", 
                vacancyDesc: "<?php echo $translations['M03951'][$language]; //Participate in coding, developing and back-end system support on existing systems. ?>",
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime ?>",
                vacancyLocation: "<?php echo $translations['M04094'][$language]; //Kuala Lumpur ?>",
                vacancyImage: "career2.jpg"
            },
            { 
                vacancyID: 3, 
                vacancyName: "<?php echo $translations['M03952'][$language]; //Graphic Designer ?>", 
                vacancyDesc: "<?php echo $translations['M03953'][$language]; //Design and develop UI and assist customers visualize on their end product output. ?>",
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime ?>",
                vacancyLocation: "<?php echo $translations['M04094'][$language]; //Kuala Lumpur ?>",
                vacancyImage: "career3.jpg"
            },
            { 
                vacancyID: 4, 
                vacancyName: "<?php echo $translations['M03954'][$language]; //Customer Service ?>", 
                vacancyDesc: "<?php echo $translations['M03948'][$language]; //Interact with customers and all enquiries & ensure customer satisfaction. ?>",
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime ?>",
                vacancyLocation: "<?php echo $translations['M04096'][$language]; //Kuala Lumpur, Penang ?>",
                vacancyImage: "career4.jpg"
            },
        ]


    $(document).ready(function(){
        getShoppingCart();
        var vacancyHTML = '';
    
        $.each(vacancy, function(k, v) {
            vacancyHTML +=  `
                <div class="col-md-6" id="career${v['vacancyID']}">
                    <div class="career-post">
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="images/project/${v['vacancyImage']}">
                            </div>
                            <div class="col">
                                <h5>${v['vacancyName']}</h5>
                                <p class="mb-4">${v['vacancyDesc']}</p>

                                <span class="badge label"><i class="fa fa-clock"></i> ${v['vacancyType']}</span>
                                <span class="badge label"><i class="fa fa-map-marker"></i> ${v['vacancyLocation']}</span>
            `;

            // $.each(v.vacancyLocation, function(k1, m) {
            //     vacancyHTML +=  `    
            //     `;
            // });

            vacancyHTML +=  `                        
                                <p class="mt-4 mb-0">
                                    <button onclick="viewDetail(${v['vacancyID']})" class="btn button-red button-fix-width"><?php echo $translations['M03955'][$language]; //See Details ?></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#careerPost").html(vacancyHTML);
    });

    function viewDetail(id) {
        $.redirect('careerDetail',{id});
    };

</script>
