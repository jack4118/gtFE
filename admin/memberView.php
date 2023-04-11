<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <div id="wrapper">
        <?php include("topbar.php"); ?>
        <?php include("sidebar.php"); ?>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <button id="backBtn" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" id="editMemberDetails" data-parsley-validate novalidate>
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                        </label>
                                                        <input id="email" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                           <?php echo $translations['A00171'][$language]; /* Phone */ ?>
                                                        </label>
                                                        <input id="phone" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00172'][$language]; /* Address */ ?>
                                                        </label>
                                                        <textarea id="address" class="form-control" rows="4" cols="50" readonly="true" readonly="true"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                           <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <input id="country" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                        </label>
                                                        <input id="disabled" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00156'][$language]; /* Suspended */ ?>
                                                        </label>
                                                        <input id="suspended" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00176'][$language]; /* Freezed */ ?>
                                                        </label>
                                                        <input id="freezed" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo 'Referral Full Name' ?>
                                                        </label>
                                                        <input id="sponsorUsername" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo 'Referral '.$translations['M02298'][$language]; /* Phone Number */ ?>
                                                        </label>
                                                        <input id="sponsorPhoneNumber" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="col-sm-12 px-0">
                                                        <div class="col-sm-12 px-0">
                                                            <hr style="color: #aaa;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 px-0">
                                                        <div class="col-sm-12 form-group px-0">
                                                            <label class="control-label" style="font-size: 1.2em;">
                                                                Billing Address
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Name
                                                        </label>
                                                        <input id="billingName" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Address
                                                        </label>
                                                        <input id="billingAddress" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            District
                                                        </label>
                                                        <input id="billingDistrict" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Sub District
                                                        </label>
                                                        <input id="billingSubDistrict" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            City
                                                        </label>
                                                        <input id="billingCity" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Postal Code
                                                        </label>
                                                        <input id="billingPostal" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            State
                                                        </label>
                                                        <input id="billingState" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Country
                                                        </label>
                                                        <input id="billingCountry" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Email
                                                        </label>
                                                        <input id="billingEmail" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Phone
                                                        </label>
                                                        <input id="billingPhone" type="text" class="form-control" readonly="true"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php include("footer.php"); ?>
            </div>
        </div>
<script>
    var resizefunc = [];
</script>
    <?php include("shareJs.php"); ?>
<script>

    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;

    $(document).ready(function() {
        var memberId  = "<?php echo $_POST['id']; ?>";
        // if id empty return back memberList.php 
        if(!memberId) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'memberList.php');
            return;
        }

        var formData  = {command : "getViewMemberDetails", memberId : memberId};
        var fCallback = loadMemberDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#backBtn').click(function() {
            $.redirect('memberList.php');
        });
    });
    
    function loadMemberDetails(data, message) {
        var memberDetails = data.member;
        var sponsorDetails = data.sponsorInfo;
        var billInfo = data.billingInfo;
        $('#fullName').val(memberDetails['name']);
        $('#email').val(memberDetails['email']);
        $('#phone').val(memberDetails['phone']);
        $('#address').val(memberDetails['address']);
        $('#country').val(memberDetails['country']);
        $('#disabled').val(memberDetails['disabled']);
        $('#suspended').val(memberDetails['suspended']);
        $('#freezed').val(memberDetails['freezed']);
        $('#sponsorUsername').val(sponsorDetails['sponsorName']);
        $('#sponsorPhoneNumber').val(sponsorDetails['sponsorDialCode'] + sponsorDetails['sponsorPhone']);
        $('#billingName').val(billInfo['name']);
        $('#billingAddress').val(billInfo['address']);
        $('#billingDistrict').val(billInfo['district']);
        $('#billingSubDistrict').val(billInfo['subDistrict']);
        $('#billingCity').val(billInfo['city']);
        $('#billingPostal').val(billInfo['postalCode']);
        $('#billingState').val(billInfo['state']);
        $('#billingCountry').val(billInfo['country']);
        $('#billingEmail').val(billInfo['email'] || '-');
        $('#billingPhone').val('+' + billInfo['dialingArea'] + billInfo['phone']);
    }
    
</script>
</body>
</html>
