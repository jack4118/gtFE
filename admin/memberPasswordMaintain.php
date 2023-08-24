<?php 
    session_start();
    //Form submission issue
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");

    include_once("mobileDetect.php");
    $detect = new Mobile_Detect;

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapse">
                                                <?php echo $translations['A00280'][$language]; /* Menu */ ?>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 menuActive active">
                                                <a>
                                                    <?php echo $translations['A00281'][$language]; /* Edit Profile */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00282'][$language]; /* Password Maintain */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00283'][$language]; /* Referral Diagram */ ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                            <?php 
                            if( $detect->isMobile() ) {
                                include 'editMemberSideBarXs.php';
                            }else{
                                include 'editMemberSideBar.php';
                            }
                        ?>

                        

                        <div class="col-lg-9 col-md-9">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00284'][$language]; /* Member Details */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span> 
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> :
                                                        </span>
                                                        <b id="topName" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?> :
                                                        </span>
                                                        <b id="topUsername" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?> :
                                                        </span>
                                                        <b id="topMemberID" class="m-l-rem1"></b>
                                                    </div>
                                                </div>

                                               <!--  <div class="col-lg-7 col-sm-7">
                                                    <div class="m-b-rem1 p-t-rem2 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span>
                                                            <?php echo $translations['A00288'][$language]; /* Unit Tier */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topUnitTier"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00289'][$language]; /* Sponsor Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topSponsorBP"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00290'][$language]; /* Pairing Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topPairingBP"></b></h3>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00282'][$language]; /* Password Maintain */ ?>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="password" name="password" value="1" checked="true">
                                                            <label for="password">
                                                                <?php echo $translations['A00504'][$language]; /* Login Password */ ?>
                                                            </label>
                                                        </div>
                                                        <!-- <div class="radio radio-inline">
                                                            <input type="radio" id="tPassword" name="password" value="2">
                                                            <label for="tPassword">
                                                                <?php echo $translations['A00186'][$language]; /* Transaction Password */ ?>
                                                            </label>
                                                        </div><br> -->
                                                        <span id="passwordTypeError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00506'][$language]; /* New Password */ ?>
                                                        </label>
                                                        <input id="newPassword" type="password" class="form-control" required="true">
                                                        <span id="newPasswordError" class="customError text-danger"></span>
                                                        <span id="newTPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Confirm Password
                                                        </label>
                                                        <input id="confirmNewPassword" type="password" class="form-control" required="true">
                                                        <span id="newConfirmPasswordError" class="customError text-danger"></span>
                                                        <span id="newConfirmTPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id="submit" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="">
                                                            <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include("footer.php"); ?>
        </div><!-- End content-page -->

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div><!-- END wrapper -->

    <script>var resizefunc = [];</script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var member_id  = "<?php echo $_POST['id']; ?>";


        $(document).ready(function() {
            var memberId  = "<?php echo $_POST['id']; ?>";
            // if id empty return back member.php             
            if(!memberId) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }

            var formData  = {
                command   : "getCustomerServiceMemberDetails",
                memberId  : memberId
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submit').click(function() {
                $('.customError').text('');
                var passwordType       = $('input[name=password]:checked').val();
                var newPassword        = $('#newPassword').val();
                var confirmNewPassword = $('#confirmNewPassword').val();

                var formData = {
                                    command            : "changeMemberPassword",
                                    clientID           : memberId,
                                    passwordType       : passwordType,
                                    newPassword        : newPassword,
                                    confirmNewPassword : confirmNewPassword,
                                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#memberPasswordMaintain').parent().addClass('active');

            $('#backBtn').click(function() {
                $.redirect('member.php');
            });

            $('#editMemberDetails').click(function() {
                $.redirect('editMember.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#memberPasswordMaintain').click(function() {
                $.redirect('memberPasswordMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#sponsorTree').click(function() {
                $.redirect('treeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#placementTree').click(function() {
                $.redirect('treePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#uplineListing').click(function() {
                $.redirect('sponsorUpline.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#rankMaintain').click(function() {
                $.redirect('rankMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#portfolioList').click(function() {
                $.redirect('memberPortfolioList.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#activityLogsListing').click(function() {
                $.redirect('activityLogsListing.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#changeSponsor').click(function() {
                $.redirect('changeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#changePlacement').click(function() {
                $.redirect('changePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#memberCreditsTransaction').click(function() {
                $.redirect('memberCreditsTransaction.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#memberAccountBalance').click(function() {
                $.redirect('accountBalance.php?type=bonusDef' , {
                                                                    id       : "<?php echo $_POST['id']; ?>",
                                                                    fullName : member_id,
                                                                    username : name,
                });
            });
            $('#loginToMember').click(function(){
                var url = "scripts/reqAdmin.php";
                var formData  = {
                    command : "getMemberLoginDetail",
                    memberId : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loginToMember;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function loadDefaultData(data, message) {
            if(data.memberDetails) {
                $('#topName').text(data.memberDetails.name);
                $('#topMemberID').text(data.memberDetails.member_id);
                $('#topUsername').text(data.memberDetails.username);
                $('#topUnitTier').text(data.memberDetails.unit_tier);
                $('#topPairingBP').text(data.memberDetails.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.memberDetails.sponsor_bonus_percentage+"%");
            }
        }

        function loginToMember(data){
            var form = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
                action: data.url
            }).appendTo(document.body);

            $('<input type="hidden" />').attr({
                name: 'id',
                value: data.id
            }).appendTo(form);

            $('<input type="hidden" />').attr({
                name: 'username',
                value: data.username
            }).appendTo(form);

            $('<input type="hidden" />').attr({
                name: 'adminID',
                value: data.adminID
            }).appendTo(form);

            $('<input type="hidden" />').attr({
                name: 'adminSession',
                value: data.adminSession
            }).appendTo(form);

            form.submit();
            form.remove();
        }

        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00508'][$language]; /* Successful changed password. */ ?>', 'success', '<?php echo $translations['A00509'][$language]; /* Change Password */ ?>', 'edit', ['memberPasswordMaintain.php', {id: "<?php echo $_POST['id']; ?>"}]);
        }
    </script>
</body>
</html>