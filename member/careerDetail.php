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
                <h3 id="objectiveTitle" style="display: none;">Objective</h3>
                <ul class="career-ul" id="vacancyObjective"></ul>
            </p>

            <p>
                <h3>Responsibilities</h3>
                <ul class="career-ul" id="vacancyResponsibilities"></ul>
            </p>

            <p>
                <h3>Skills & Qualifications</h3>
                <ul class="career-ul" id="vacancyQualification"></ul>
            </p>
        </div>
        <div class="col-md-6">
            <div class="section-shadow">
                <form action="mailto:hanyaolim.thenux@gmail.com" method="get" enctype="text/plain">
                    <h2 class="mb-5">Apply For This Job</h2>

                    <label>Name</label>
                    <input type="text" id="name" class="form-control beforeLoginForm col ml-1" placeholder="Please enter your name">

                    <label>Phone</label>
                    <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" id="phone" class="form-control beforeLoginForm col ml-1" placeholder="Please enter your phone number">

                    <label>Email Address</label>
                    <input type="email" id="email" class="form-control beforeLoginForm col ml-1" placeholder="Please enter your email address">

                    <label>Upload Your Resume</label>
                    <input type="file" id="myFile" name="filename">

                    <div class="row mt-4">
                        <div class="col">
                            <a href="javascript:void(0)" id="submitBtn" type="submit" class="btn button-red button-fix-width">
                                Submit
                            </a>
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
                vacancyName: "Operation Executive",
                vacancyObjective: [
                        "Interact with customers for all enquiries & ensure customer satisfaction."
                    ], 
                vacancyResponsibilities: [
                        "Packing of food according to type & size of food, labelling of food.",
                        "Scheduling & purchasing from vendor according to stock level and customer demand.",
                        "Stock in packed items & stock out for delivery.",
                        "Ensure items packed for delivery are according to Purchase Order.",
                        "Report to superior for any damage of machine/food.",
                        "Housekeeping & ensure tidiness and cleanliness of warehouse.",
                    ],
                vacancyQualification: [
                        "Minimum SPM graduates.",
                        "Experience of warehousing/manufacturing is an added value.",
                        "Knowlwedge of basic computer applications & basic admistrative procedures.",
                        "Good communication skills - Chinese & English.",
                        "Attention to detail and accuracy.",
                        "Target oriented"
                    ],
                vacancyType: "Fulltime",
            },
            { 
                vacancyID: 2, 
                vacancyName: "Junior Software Engineer",
                vacancyObjective: [], 
                vacancyResponsibilities: [
                        "Participate in coding, developing, and back-end system support on existing systems.",
                        "Develop and maintain standard and customised application.",
                        "Troubleshooting incidents and provide timely update and escalation when appropriate.",
                        "Develop/Test systems and to ensure the successful delivery of the products within the estimated time frame.",
                        "Translate business requirements into functional and non functional requirements.",
                        "Work closely with team members.",
                        "Responsible and passionate in research and development of new technologies.",
                    ],
                vacancyQualification: [
                        "Candidate must possess at least a Professional Certificate, Diploma, Advanced/Higher/Graduate Diploma, Bachelor's Degree, Post Graduate Diploma, Professional Degree, Computer Science/Information Technology, Engineering (Computer/Telecommunication) or equivalent.",
                        "Required skill(s): PHP, MySQL, NodeJS, LINUX, Solidity.",
                        "Applicants must be willing to work in Kuala Lumpur City Centre.",
                    ],
                vacancyType: "Fulltime",
            },
            { 
                vacancyID: 3, 
                vacancyName: "Graphic Designer",
                vacancyObjective: [], 
                vacancyResponsibilities: [
                        "Design and develop UI and assist customers visualize on their end product output so as to ensure our clients has the confidence in our ability to achieve their commercial goal.",
                        "Able to apply human metaphoric to interface design and develop UI frame to ensure relevant and user-friendly operational usage of user interface.",
                        "Deliver web and mobile UI design that support cross browser compatibility and UI responsiveness.",
                        "Conceptualize visuals based on requirement.",
                        "Develop Illustration, Graphic, logos and other designs using software or by hand.",
                        "Use the appropriate colors and layout for each graphic.",
                        "Collaborate with Software Engineers and Project Managers to provide design and deliverable for new and existing functionalities.",
                        "Keep update on technologies and market trends to propose improvement on company’s product base on industry needs.",
                    ],
                vacancyQualification: [
                        "Preferable candidates posses a Bachelor’s Degree, Post Graduate Diploma or Professional Degree in Art/Design/Creative Multimedia or equivalent.",
                        "Proficiency in Adobe Photoshop and Adobe Illustrator",
                        "Knowledge and experience in After Effects, Premiere Pro and Adobe XD is an added advantage.",
                        "Proactive, motivated and a team player.",
                        "Able to work in a high pace environment and meeting datelines",
                    ],
                vacancyType: "Fulltime",
            },
            { 
                vacancyID: 4, 
                vacancyName: "Customer Service",
                vacancyObjective: [
                        "Interact with customers for all enquiries & ensure customer satisfaction."
                    ], 
                vacancyResponsibilities: [
                        "Deal directly with customers either by phone call / WhatsApp / Telegram / Messenger / other social application.",
                        "Respond promptly to customer inquiries.",
                        "Provide pricing and service information.",
                        "Handle and reslove customer complaints.",
                        "Communicate and coordinate with sales & operation department.",
                        "Keep records of customer interactions and transactions.",
                        "Record details of inquiries, comments and complaints, as well as details of action taken",
                        "Perform duties & responsibilities assigned by superior, as and when needed.",
                    ],
                vacancyQualification: [
                        "Minimun SPM graduates.",
                        "Experience of customer service is an added value.",
                        "Knowledge of basic computer applications.",
                        "Knowledge of social media platforms.",
                        "Knowledge of administrative procedures.",
                        "Good communication skills - Chinese & English.",
                        "Attention to detail and accuracy",
                        "Customer service orientation",
                    ],
                vacancyType: "Fulltime",
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
                        <div class="col-auto">
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