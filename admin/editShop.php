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
                         <a href="shop.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A01667'][$language]; /* Shop Detail */ ?>
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                <form role="form" id="editShop" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01647'][$language]; /* Shop Owner Name */ ?>
                                                    </label>
                                                    <select id="shopOwner" class="form-control"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01665'][$language]; /* Shop Name */ ?>
                                                    </label>
                                                    <input id="shopName" type="text" class="form-control" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01666'][$language]; /* Address */ ?>
                                                    </label>
                                                    <textarea id="address" type="text" class="form-control" required></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01672'][$language]; /* Deleted */ ?>
                                                    </label>
                                                    <div id="status" class="m-b-20">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" value="0" name="radioInline" checked="checked"/>
                                                            <label for="inlineRadio1">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" value="1" name="radioInline"/>
                                                            <label for="inlineRadio2">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback;
    var shopId          = "<?php echo $_POST['id']; ?>";

    $(document).ready(function() {
        /* Get Shop Details */
        if (shopId) {
            var formData = {
                command             : "getShopDetail",
                id                  : shopId,
                getShopOwnerFlag    : 1
            }
            var fCallback = loadShop;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            /* Edit Shop */
            $('#edit').click(function() {
                var ownerId     = $('#shopOwner').find('option:selected').val();
                var shopName    = $('#shopName').val();
                var address     = $('#address').val();
                var deleted     = $('#status').find('input[type=radio]:checked').val();

                /* Validate */
                var validate = $('#editShop').parsley().validate();
                if (validate) {
                    showCanvas();
                    var formData = {
                        command     : "editShop",
                        shopId      : shopId,
                        ownerId     : ownerId,
                        shopName    : shopName,
                        address     : address,
                        deleted     : deleted
                    };
                    var fCallback = editShopCallback;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        }
        else {
            showMessage('<?php echo $translations['E01163'][$language]; /* Shop does not exist. */ ?>', 'warning', '<?php echo $translations['A01674'][$language]; /* Edit Shop */ ?>', 'exclamation-triangle', 'shop.php');
        }
    });

    /* Prefill Shop Owner */
    function loadShop(data, message) {
        var html = '';
        if (data.getShopOwnerList) {
            $.each(data.getShopOwnerList, function(key, value) {
                html += `<option value="${value['id']}">${value['name']}</option>`;
            });
            $('#shopOwner').html(html);
        }
        if (data.shopDetail) {
            $('#shopOwner option[value='+ data.shopDetail['owner_id'] +']').attr('selected', true);
            $('#shopName').val(data.shopDetail['name']);
            $('#address').val(data.shopDetail['address']);
            $('#status input[name="radioInline"][value='+ data.shopDetail['deleted'] +']').attr('checked', true);
        }
    }

    /* Edit Shop Owner Callback Message */
    function editShopCallback(data, message) {
        showMessage('<?php echo $translations['A01673'][$language]; /* Successful updated shop. */ ?>', 'success', '<?php echo $translations['A01674'][$language]; /* Edit Shop */ ?>', 'user-plus', 'shop.php');
    }

</script>
</body>
</html>