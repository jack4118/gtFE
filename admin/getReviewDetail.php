<?php 
    session_start();

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
                    <div class="col-sm-4">
                         <a href="getReviewListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">
                                    Edit Review
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="editReview" role="form" data-parsley-validate novalidate>
                                            <div class="form-group" hidden>
                                                <label>Customer Name</label>
                                                <input id="customer_name" type="text" class="form-control" readonly disabled required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Product</label>
                                                <input id="product_name" type="text" class="form-control" readonly disabled required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Customer Review</label>
                                                <textarea rows="4" id="customer_review" type="text" class="form-control" readonly disabled required/></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Rating</label>
                                                <input id="rating" type="text" class="form-control" readonly disabled required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Approval</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="reject" name="radioInline"/>
                                                        <label for="inlineRadio1" style="padding-left: 10px;">
                                                            Reject
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="approve" name="radioInline"/>
                                                        <label for="inlineRadio2" style="padding-left: 10px;">
                                                            Approve
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Anonymous : </label><label id="anonymousStatus"> </label>
                                                <!-- <input id="anonymous" type="text" class="form-control" readonly disabled required/> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                            <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                            </button>
                        </div>
                    </div>
                    <!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var reviewID       = "<?php echo $_POST['reviewID']; ?>";

    var fCallback      = "";
    $(document).ready(function() {
        var formData = {
            command        : "getCustomerReviewDetailAdmin",
            reviewID       : reviewID,
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });
    
    function loadDefaultListing(data, message) {
        review = data[0];

        if(review.status == "Approved") {
            $("input[name=radioInline][id=inlineRadio2]").prop("checked","checked");
        } else {
            $("input[name=radioInline][id=inlineRadio1]").prop("checked","checked");
        }

        $("#product_name").val(review.productName);
        $("#customer_review").val(review.customerReview);
        $("#rating").val(review.rating);
        if(review.is_anonymousStatus == 1){
            var displayStatus = 'Yes';
        }else{
            var displayStatus = 'No';
        }
        $("#anonymousStatus").text(displayStatus);
    }

    $("#edit").click(function() {
        var formData = {
            command        : "updateCustomerReview",
            reviewID       : reviewID,
            action         : $('input[name=radioInline]:checked').val(),
        };

        fCallback = successEdit;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });
    
    function successEdit(data, message) {
        showMessage('Review successfully updated.', 'success', 'Update Review', 'check', 'getReviewListing.php');
    }
</script>
</body>
</html>
