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
                         <a href="purchaseRequest.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">
                                    <?php echo $translations['A00127'][$language]; /* Edit Profile */ ?>
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="editUser" role="form" data-parsley-validate novalidate>
                                            <div class="form-group" hidden>
                                                <label>
                                                    <?php echo $translations['A00128'][$language]; /* ID */ ?>
                                                </label>
                                                <input id="id" type="text" class="form-control" disabled/>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label>
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                </label>
                                                <input id="name" type="text" class="form-control" required/>
                                            </div> -->
                                            
                                            <div class="form-group">
                                                <label>
                                                    <!-- <?php echo $translations['A01661'][$language]; /* Product Name */ ?> -->
                                                    Vendor
                                                </label>
                                                <!-- <input id="username" type="text" class="form-control"  required/> -->
                                                <input id="vendor_name" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $translations['A01661'][$language]; /* Product Name */ ?>
                                                </label>
                                                <!-- <input id="username" type="text" class="form-control"  required/> -->
                                                <input id="name" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    <!-- <?php echo $translations['A01657'][$language]; /* quantity */ ?> -->
                                                    Quantity
                                                </label>
                                                <input id="quantity" type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <!-- <?php echo $translations['A01658'][$language]; /* product_cost */ ?> -->
                                                    Cost
                                                </label>
                                                <input id="product_cost" type="text" class="form-control"/>
                                            </div>


                                            <div class="form-group">
                                                <label for="">
                                                    <!-- <?php echo $translations['A01657'][$language]; /* total quantity */ ?> -->
                                                    Total Quantity
                                                </label>
                                                <input id="total_quantity" type="text" class="form-control" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <!-- <?php echo $translations['A01658'][$language]; /* total_cost */ ?> -->
                                                    Total Cost
                                                </label>
                                                <input id="total_cost" type="text" class="form-control" readonly/>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A01659'][$language]; /* approved_by */ ?>
                                                </label>
                                                <input id="approved_by" type="text" class="form-control"/>
                                            </div> -->

                                            <!--<div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01660'][$language]; /* approved_date */ ?>
                                                    </label>
                                                    <input id="approved_date" type="text" class="form-control"/>
                                            </div>-->

                                            <!-- <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                </label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="0" name="radioInline"/>
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
                                            </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: inline-flex;">
                            <div class="col-md-12 m-b-20">
                                <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                    <!-- <?php echo $translations['A00123'][$language]; /* Confirm */ ?> -->
                                    <p>Confirm</p>
                                </button>
                            </div>

                            <!-- <div class="col-md-12 m-b-20">
                                <button id="approve" type="submit" class="btn btn-primary waves-effect waves-light">
                                    <p>Approve</p>
                                </button>
                            </div> -->
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
    var fCallback       = "";
    var editId          = "<?php echo $_POST['id']; ?>";

    $(document).ready(function() {
        if (editId) {
            var formData = {
                'command': 'getPurchaseRequestDetails',
                'id'     : editId
            };
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else{
            window.location = 'purchaseRequest.php';
        }
        
        $('#edit').click(function() {
            var validate = $('#editUser').parsley().validate();
            if(validate) {
                showCanvas();
                var id       = $('input#id').val();
                // var fullName = $('input#name').val();
                var product_name = $('input#name').val();
                // var approved_date = $('input#approved_date').val();
                var quantity    = $('input#quantity').val();
                var approved_by = $('input#approved_by').val();
                var product_cost   = $('input#product_cost').val();
                // var status   = $('#status').find('input[type=radio]:checked').val();

                var formData = {
                    'command'       : 'purchaseRequestEdit',
                    'id'            : id,
                    // 'fullName'   : fullName,
                    'product_name'  : product_name,
                    // 'approved_date'   : approved_date,
                    'quantity'      : quantity,
                    'approved_by'   : approved_by,
                    'product_cost'  : product_cost,
                    // 'approved_by'   : approved_by,
                    // 'status'     : status
                };
                console.log(id);
                console.log(quantity);
                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }); 

        // $('#approve').click(function() {
        //     var validate = $('#editUser').parsley().validate();
        //     if(validate) {
        //         showCanvas();
        //         var id       = $('input#id').val();
        //         var approved_date = $('input#approved_date').val();
        //         var approved_by = $('input#approved_by').val();
        //         var status   = $('#status').val();
                
        //         var formData = {
        //             'command'    : 'purchaseRequestApprove',
        //             'id'         : id,
        //             'approved_date'   : approved_date,
        //             'approved_by'   : approved_by,
        //             'status'     : status
        //         };
                
        //         fCallback = sendEdit;
        //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        //     }
        //     hide();
        // }); 
    });
    
    function loadFormDropdown(data, message) {
        roleData = data.roleList;
        $.each(roleData, function(key) {
            $('#roleID').append('<option name="' + roleData[key]['name'] + '" value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });

        $("#roleID option[name='" + userRole + "']").attr('selected', 'selected');
    }
    
    function loadEdit(data, message) {
        console.log(data);
        $.each(data.purchaseRequestDetail, function(key, val) {
            if(key == 'status') {
                $('#'+key).find('input[value="'+val+'"]').attr('checked', 'checked');
            }
            else {
                $('#'+key).val(val);
            }
        });
    }
    
    function sendEdit(data, message) {
        showMessage('Purchase Request Has Been Updated', 'success', 'Purchase Request Updated', 'address-card', 'purchaseRequest.php');
    }
</script>
</body>
</html>
