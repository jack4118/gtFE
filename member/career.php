<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section section-career-header">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="white-div">
                <h3 class="jp-title">GoTasty Vision</h3>
                <p>At GoTasty, we aim to position ourselves as the leader of frozen cooked food in Malaysia. We are committed to our company values which are uncompromising quality of food and customer satisfaction.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="jp-title">GoTasty Objective</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5">
                To achieve 100% customer satisfaction.
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5">
                To achieve cost optimization while maintaining food quality and customer service.
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="objective-div p-5">
                To be the largest frozen cooked foos platform in Malaysia.
            </div>
        </div>
    </div>
</section>

<section class="section whiteBg">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="jp-title mb-5">Current Opening</h3>
        </div>
    </div>
    <div class="row" id="careerPost">
        <!-- <div class="col-md-6">
            <div class="career-post">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="images/project/career1.jpg">
                    </div>
                    <div class="col">
                        <h5>Operation Executive</h5>
                        <p class="mb-4">Interact with customers for all enquiries & ensure customer satisfaction.</p>

                        <span class="badge label"><i class="fa fa-clock"></i> Full Time</span>
                        <span class="badge label"><i class="fa fa-map-marker"></i> Kuala Lumpur</span>
                        
                        <p class="mt-4">
                            <button onclick="viewDetail()" class="btn button-red button-fix-width">See Details</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="career-post">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="images/project/career2.jpg">
                    </div>
                    <div class="col">
                        <h5>Junior Software Engineer</h5>
                        <p class="mb-4">Participate in coding, developing and back-end system support on existing systems.</p>

                        <span class="badge label"><i class="fa fa-clock"></i> Full Time</span>
                        <span class="badge label"><i class="fa fa-map-marker"></i> Kuala Lumpur</span>
                        
                        <p class="mt-4">
                            <button onclick="viewDetail()" class="btn button-red button-fix-width">See Details</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="career-post">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="images/project/career3.jpg">
                    </div>
                    <div class="col">
                        <h5>Graphic Designer</h5>
                        <p class="mb-4">Design and develop UI and assist customers visualize on their end product output.</p>

                        <span class="badge label"><i class="fa fa-clock"></i> Full Time</span>
                        <span class="badge label"><i class="fa fa-map-marker"></i> Kuala Lumpur</span>
                        
                        <p class="mt-4">
                            <button onclick="viewDetail()" class="btn button-red button-fix-width">See Details</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="career-post">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="images/project/career4.jpg">
                    </div>
                    <div class="col">
                        <h5>Customer Service</h5>
                        <p class="mb-4">Interact with customers and all enquiries & ensure customer satisfaction.</p>

                        <span class="badge label"><i class="fa fa-clock"></i> Full Time</span>
                        <span class="badge label"><i class="fa fa-map-marker"></i> Kuala Lumpur</span>
                        <span class="badge label"><i class="fa fa-map-marker"></i> Penang</span>
                        
                        <p class="mt-4">
                            <button onclick="viewDetail()" class="btn button-red button-fix-width">See Details</button>
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
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
                vacancyName: "Operation Executive", 
                vacancyDesc: "Interact with customer for all enquiries & ensure customer satisfaction.",
                vacancyType: "Fulltime",
                vacancyLocation: ["Kuala Lumpur"],
                vacancyImage: "career1.jpg"
            },
            { 
                vacancyID: 2, 
                vacancyName: "Junior Software Engineer", 
                vacancyDesc: "Participate in coding, developing and back-end system support on existing systems.",
                vacancyType: "Fulltime",
                vacancyLocation: ["Kuala Lumpur"],
                vacancyImage: "career2.jpg"
            },
            { 
                vacancyID: 3, 
                vacancyName: "Graphic Designer", 
                vacancyDesc: "Design and develop UI and assist customers visualize on their end product output.",
                vacancyType: "Fulltime",
                vacancyLocation: ["Kuala Lumpur"],
                vacancyImage: "career3.jpg"
            },
            { 
                vacancyID: 4, 
                vacancyName: "Customer Service", 
                vacancyDesc: "Interact with customers and all enquiries & ensure customer satisfaction.",
                vacancyType: "Fulltime",
                vacancyLocation: ["Kuala Lumpur","Penang"],
                vacancyImage: "career4.jpg"
            },
        ]


    $(document).ready(function(){
        var vacancyHTML = '';
    
        $.each(vacancy, function(k, v) {
            vacancyHTML +=  `
                <div class="col-md-6">
                    <div class="career-post">
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="images/project/${v['vacancyImage']}">
                            </div>
                            <div class="col">
                                <h5>${v['vacancyName']}</h5>
                                <p class="mb-4">${v['vacancyDesc']}</p>

                                <span class="badge label"><i class="fa fa-clock"></i> ${v['vacancyType']}</span>
            `;

            $.each(v.vacancyLocation, function(k1, m) {
                vacancyHTML +=  `    
                                <span class="badge label"><i class="fa fa-map-marker"></i> ${m}</span>
                `;
            });

            vacancyHTML +=  `                        
                                <p class="mt-4">
                                    <button onclick="viewDetail(${v['vacancyID']})" class="btn button-red button-fix-width">See Details</button>
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