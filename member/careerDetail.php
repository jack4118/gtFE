<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />

<?php include 'homepageHeader.php';?>

<section class="section section-career-detail">
    <div class="row">
        <div class="col-12" id="vacancyDetailTitle"></div>
    </div>
</section>

<section class="section whiteBg">
    <div class="row">
        <div class="col-md-6">
            <p>           
                <h3 id="objectiveTitle" style="display: none;" data-lang="M03956"><?php echo $translations['M03956'][$language]; //Objective ?></h3>
                <ul class="career-ul" id="vacancyObjective"></ul>
            </p>

            <p>
                <h3 data-lang="M03957"><?php echo $translations['M03957'][$language]; //Responsibilities ?></h3>
                <ul class="career-ul" id="vacancyResponsibilities"></ul>
            </p>

            <p>
                <h3 data-lang="M03958"><?php echo $translations['M03958'][$language]; //Skills & Qualifications ?></h3>
                <ul class="career-ul" id="vacancyQualification"></ul>
            </p>
        </div>
        <div class="col-md-6">
            <div class="section-shadow mb-5">
                <!-- <form action="mailto:yixiangkee11.ttwoweb@gmail.com" method="get" enctype="text/plain"> -->
                <form action="mailto:hanyaolim.thenux@gmail.com" method="get" enctype="text/plain">
                    <h2 class="mb-5" data-lang="M03959"><?php echo $translations['M03959'][$language]; //Apply For This Job ?></h2>

                    <label data-lang="M03960"><?php echo $translations['M03960'][$language]; //Name ?></label>
                    <input type="text" id="name" class="form-control beforeLoginForm col ml-1" placeholder="<?php echo $translations['M03960'][$language]; //Name ?>">

                    <label data-lang="M03961"><?php echo $translations['M03961'][$language]; //Phone ?></label>
                    <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" id="phone" class="form-control beforeLoginForm col ml-1" placeholder="<?php echo $translations['M03961'][$language]; //Phone ?>">

                    <label data-lang="M03962"><?php echo $translations['M03962'][$language]; //Email Address ?></label>
                    <input type="email" id="email" class="form-control beforeLoginForm col ml-1" placeholder="<?php echo $translations['M03962'][$language]; //Email Address ?>">

                    <label data-lang="M03963"><?php echo $translations['M03963'][$language]; //Upload Your Resume ?></label>
                    <input type="file" id="myFile" name="filename">

                    <div class="row mt-4">
                        <div class="col">
                            <!-- <a href="javascript:void(0)" id="submitBtn" type="submit" class="btn button-red button-fix-width"> -->
                            <button id="submitBtn" type="submit" class="btn button-red button-fix-width" data-lang="M03964">
                                <?php echo $translations['M03964'][$language]; //Submit ?>
                            </button>
                        </div>
                    </div>
                </form>
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
    var id = "<?php echo $_POST['id']?>";
    var vacancy = [
            { 
                vacancyID: 1, 
                vacancyName: "<?php echo $translations['M03947'][$language]; //Operation Executive ?>",
                vacancyObjective: [
                        "<?php echo $translations['M03965'][$language]; //Interact with customers for all enquiries & ensure customer satisfaction. ?>"
                    ], 
                vacancyResponsibilities: [
                        "<?php echo $translations['M03966'][$language]; //Packing of food according to type & size of food, labelling of food. ?>",
                        "<?php echo $translations['M03967'][$language]; //Scheduling & purchasing from vendor according to stock level and customer demand. ?>",
                        "<?php echo $translations['M03968'][$language]; //Stock in packed items & stock out for delivery. ?>",
                        "<?php echo $translations['M03969'][$language]; //Ensure items packed for delivery are according to Purchase Order. ?>",
                        "<?php echo $translations['M03970'][$language]; //Report to superior for any damage of machine/food. ?>",
                        "<?php echo $translations['M03971'][$language]; //Housekeeping & ensure tidiness and cleanliness of warehouse. ?>",
                    ],
                vacancyQualification: [
                        "<?php echo $translations['M03972'][$language]; //Minimum SPM graduates. ?>",
                        "<?php echo $translations['M03973'][$language]; //Experience of warehousing/manufacturing is an added value. ?>",
                        "<?php echo $translations['M03974'][$language]; //Knowledge of basic computer applications & basic admistrative procedures. ?>",
                        "<?php echo $translations['M03975'][$language]; //Good communication skills - Chinese & English. ?>",
                        "<?php echo $translations['M03976'][$language]; //Attention to detail and accuracy. ?>",
                        "<?php echo $translations['M03977'][$language]; //Target oriented ?>"
                    ],
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime?>",
            },
            { 
                vacancyID: 2, 
                vacancyName: "<?php echo $translations['M03950'][$language]; // Junior Software Engineer ?>",
                vacancyObjective: [], 
                vacancyResponsibilities: [
                        "<?php echo $translations['M03978'][$language]; //Participate in coding, developing, and back-end system support on existing systems. ?>",
                        "<?php echo $translations['M03979'][$language]; //Develop and maintain standard and customised application. ?>",
                        "<?php echo $translations['M03980'][$language]; //Troubleshooting incidents and provide timely update and escalation when appropriate. ?>",
                        "<?php echo $translations['M03981'][$language]; //Develop/Test systems and to ensure the successful delivery of the products within the estimated time frame. ?>",
                        "<?php echo $translations['M03982'][$language]; //Translate business requirements into functional and non functional requirements. ?>",
                        "<?php echo $translations['M03983'][$language]; //Work closely with team members. ?>",
                        "<?php echo $translations['M03984'][$language]; //Responsible and passionate in research and development of new technologies. ?>",
                    ],
                vacancyQualification: [
                        "<?php echo $translations['M03985'][$language]; //Candidate must possess at least a Professional Certificate, Diploma, Advanced/Higher/Graduate Diploma, Bachelor's Degree, Post Graduate Diploma, Professional Degree, Computer Science/Information Technology, Engineering (Computer/Telecommunication) or equivalent. ?>",
                        "<?php echo $translations['M03986'][$language]; //Required skill(s): PHP, MySQL, NodeJS, LINUX, Solidity. ?>",
                        "<?php echo $translations['M03987'][$language]; //Applicants must be willing to work in Kuala Lumpur City Centre. ?>",
                    ],
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime?>",
            },
            { 
                vacancyID: 3, 
                vacancyName: "<?php echo $translations['M03952'][$language]; //Graphic Designer ?>",
                vacancyObjective: [], 
                vacancyResponsibilities: [
                        "<?php echo $translations['M03988'][$language]; //Design and develop UI and assist customers visualize on their end product output so as to ensure our clients has the confidence in our ability to achieve their commercial goal. ?>",
                        "<?php echo $translations['M03989'][$language]; //Able to apply human metaphoric to interface design and develop UI frame to ensure relevant and user-friendly operational usage of user interface. ?>",
                        "<?php echo $translations['M03990'][$language]; //Deliver web and mobile UI design that support cross browser compatibility and UI responsiveness. ?>",
                        "<?php echo $translations['M03991'][$language]; //Conceptualize visuals based on requirement. ?>",
                        "<?php echo $translations['M03992'][$language]; //Develop Illustration, Graphic, logos and other designs using software or by hand. ?>",
                        "<?php echo $translations['M03993'][$language]; //Use the appropriate colors and layout for each graphic. ?>",
                        "<?php echo $translations['M03994'][$language]; //Collaborate with Software Engineers and Project Managers to provide design and deliverable for new and existing functionalities. ?>",
                        "<?php echo $translations['M03995'][$language]; //Keep update on technologies and market trends to propose improvement on company’s product base on industry needs. ?>",
                    ],
                vacancyQualification: [
                        "<?php echo $translations['M03996'][$language]; //Preferable candidates posses a Bachelor’s Degree, Post Graduate Diploma or Professional Degree in Art/Design/Creative Multimedia or equivalent. ?>",
                        "<?php echo $translations['M03997'][$language]; //Proficiency in Adobe Photoshop and Adobe Illustrator ?>",
                        "<?php echo $translations['M03998'][$language]; //Knowledge and experience in After Effects, Premiere Pro and Adobe XD is an added advantage. ?>",
                        "<?php echo $translations['M03999'][$language]; //Proactive, motivated and a team player. ?>",
                        "<?php echo $translations['M04000'][$language]; //Able to work in a high pace environment and meeting datelines ?>",
                    ],
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime?>",
            },
            { 
                vacancyID: 4, 
                vacancyName: "<?php echo $translations['M03954'][$language]; //Customer Service ?>",
                vacancyObjective: [
                        "<?php echo $translations['M04001'][$language]; //Interact with customers for all enquiries & ensure customer satisfaction. ?>"
                    ], 
                vacancyResponsibilities: [
                        "<?php echo $translations['M04002'][$language]; //Deal directly with customers either by phone call / WhatsApp / Telegram / Messenger / other social application. ?>",
                        "<?php echo $translations['M04003'][$language]; //Respond promptly to customer inquiries. ?>",
                        "<?php echo $translations['M04004'][$language]; //Provide pricing and service information. ?>",
                        "<?php echo $translations['M04005'][$language]; //Handle and reslove customer complaints. ?>",
                        "<?php echo $translations['M04006'][$language]; //Communicate and coordinate with sales & operation department. ?>",
                        "<?php echo $translations['M04007'][$language]; //Keep records of customer interactions and transactions. ?>",
                        "<?php echo $translations['M04008'][$language]; //Record details of inquiries, comments and complaints, as well as details of action taken ?>",
                        "<?php echo $translations['M04009'][$language]; //Perform duties & responsibilities assigned by superior, as and when needed. ?>",
                    ],
                vacancyQualification: [
                        "<?php echo $translations['M04010'][$language]; //Minimun SPM graduates. ?>",
                        "<?php echo $translations['M04011'][$language]; //Experience of customer service is an added value. ?>",
                        "<?php echo $translations['M04012'][$language]; //Knowledge of basic computer applications. ?>",
                        "<?php echo $translations['M04013'][$language]; //Knowledge of social media platforms. ?>",
                        "<?php echo $translations['M04014'][$language]; //Knowledge of administrative procedures. ?>",
                        "<?php echo $translations['M04015'][$language]; //Good communication skills - Chinese & English. ?>",
                        "<?php echo $translations['M04016'][$language]; //Attention to detail and accuracy ?>",
                        "<?php echo $translations['M04017'][$language]; //Customer service orientation ?>",
                    ],
                vacancyType: "<?php echo $translations['M03949'][$language]; //Fulltime?>",
            },
        ]


    $(document).ready(function(){
        var vacancyDetailTitleHTML = '';
        var vacancyObjectiveHTML = '';
        var vacancyResponsibilitiesHTML = '';
        var vacancyQualificationHTML = '';

        $.each(vacancy, function(k, v) {    
            if(v['vacancyID'] == id) {
                vacancyDetailTitleHTML =  `
                    <div class="row">
                        <div class="col-6 col-md-auto">
                            <h3 class="jp-title">${v['vacancyName']}</h3> 
                        </div>
                        <div class="col">
                            <span style="position: relative; top: 8px;"><i class="fa fa-clock"></i> ${v['vacancyType']}</span>
                        </div>
                    </div>
                `;

                if(v['vacancyObjective']['length'] != 0){
                    $('#objectiveTitle').css('display','unset')
                    $.each(v['vacancyObjective'], function(v, m) {
                        vacancyObjectiveHTML += `<li>${m}</li>`;
                    });
                    
                }

                $.each(v['vacancyResponsibilities'], function(v, m) {  
                    vacancyResponsibilitiesHTML += `<li>${m}</li>`;
                });

                $.each(v['vacancyQualification'], function(v, m) {  
                    vacancyQualificationHTML += `<li>${m}</li>`;
                });
            }
        });

        $("#vacancyDetailTitle").html(vacancyDetailTitleHTML);
        $("#vacancyObjective").html(vacancyObjectiveHTML);
        $("#vacancyResponsibilities").html(vacancyResponsibilitiesHTML);
        $("#vacancyQualification").html(vacancyQualificationHTML);
    });

    function loadDefaultListing (data,message) {
        
    }

</script>