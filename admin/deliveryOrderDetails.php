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
                             <a href="deliveryOrder.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">
                                    <?php echo $translations['M02891'][$language]; /* Delivery Order */ ?>
                                </h4>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" id="viewReceiptBtn">
                                            
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['M02965'][$language]; /* DELIVERY ORDER number */ ?>
                                            </label>
                                            <input id="doNum" type="text" class="form-control" disabled />
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <h5 class="col-md-12 mt-3">
                                            <?php echo $translations['A01536'][$language]; /* Delivery Order Details */ ?>
                                        </h5>
                                        <div class="col-md-6">
                                            <label>
                                                Sale Order Number
                                            </label>
                                            <input id="soNum" type="text" class="form-control"  readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                            </label>
                                            <input id="status" type="text" class="form-control" readonly/>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['M02995'][$language]; /* Tracking Number */ ?>
                                            </label>
                                            <input id="trackNum" type="text" class="form-control"  readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['A01777'][$language]; /* Reference Number */ ?>
                                            </label>
                                            <input id="reference" type="text" class="form-control" readonly/>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['A01167'][$language]; /* Created By */ ?>
                                            </label>
                                            <input id="creator" type="text" class="form-control" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <?php echo $translations['A01644'][$language]; /* Created At */ ?>
                                            </label>
                                            <input id="createdAt" type="text" class="form-control"  readonly/>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label>
                                                Delivery Partner
                                            </label>
                                            <input id="deliveryPartner" type="text" class="form-control"  readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                Delivered Quantity
                                            </label>
                                            <input id="quantity" type="text" class="form-control"  readonly/>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-12">
                                            <label>
                                                <?php echo $translations['M00448'][$language]; /* Remark */ ?>
                                            </label>
                                            <input id="remark" type="text" class="form-control"  readonly/>
                                        </div>
                                    </div>


                                    <div class="row" style="margin-top: 20px;">
                                        <h5 class="col-md-12 mt-3">
                                            <?php echo $translations['M02816'][$language]; /* Delivery Detail */ ?>
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div id="appendDeliveryOrder">
                                                    <div class="col-md-12">
                                                        <div class="addProductWrapper default">
                                                            <span class="dtxt">Default</span>
                                                            
                                                            <div class="row" id="address1">
                                                                <input id="deliveryID1" class="form-control hide" disabled/>

                                                                <div class="col-md-6">
                                                                    <label>1. Product Name</label>
                                                                    <input id="name1" class="form-control" disabled/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Serial Number</label>
                                                                    <input id="serialNum1" class="form-control" disabled/>
                                                                </div>
                                                                <!-- <div class="col-md-6">
                                                                    <label>Box</label>
                                                                    <input id="box1" class="form-control" disabled/>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label>Remark</label>
                                                                    <input id="remark1" class="form-control" disabled/>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto" style="display:none">
                                                    <div class="addProduct" onclick="addRow()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Delivery Order</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
    var url                 = 'scripts/reqAdmin.php';
    var method              = 'POST';
    var debug               = 0;
    var bypassBlocking      = 0;
    var bypassLoading       = 0;
    var fCallback           = "";
    var doNo                = "<?php echo $_POST['doNo']; ?>";
    var wrapperLength       = 2;
    var totalLoop           = [1];

    $(document).ready(function() {
        var formData = {
            'command'   : 'getDODetails',
            'doNo'     : doNo
        };
        fCallback = loadDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDetails(data, message) {
       console.log(data);
       var deliveryOrderList = data.deliveryOrderDetail;
       var deliverQuantity   = data.deliveryOrderProductQuantity;


       if(deliveryOrderList){
            $("#doNum").val(deliveryOrderList.delivery_order_no);
            $("#soNum").val(deliveryOrderList.soNo);
            $("#status").val(deliveryOrderList.status);
            $("#trackNum").val(deliveryOrderList.tracking_number);
            $("#reference").val(deliveryOrderList.reference_number);
            $("#creator").val(deliveryOrderList.creatorName);
            $("#createdAt").val(deliveryOrderList.created_at);
            $("#deliveryPartner").val(deliveryOrderList.delivery_partner);
            $("#remark").val(deliveryOrderList.remark);
       }

       if(deliverQuantity){
            $("#quantity").val(deliverQuantity);
       }

        var doProductDetails = data.deliveryOrderProductDetails;
        if(doProductDetails){
            $.each(doProductDetails, function (k, v) { 
                var newK = k + 1;
                if(k != 0) 
                    addRow(doProductDetails);

                $("#deliveryID" + newK).val(v['id']);
                $("#name" + newK).val(v['productName']);
                $("#serialNum" + newK).val(v['serial_number']);
                $("#box" + newK).val(v['box']);
                $("#remark" + newK).val(v['remark']);
            })
        }
    }

    function addRow(data){
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <div class="row" id="address${(wrapperLength)}">

                        <input id="deliveryID${(wrapperLength)}" class="form-control hide" disabled/>

                        <div class="col-md-6">
                            <label>${(wrapperLength)}. Product Name</label>
                            <input id="name${(wrapperLength)}" class="form-control" disabled/>
                        </div>
                        <div class="col-md-6">
                            <label>Serial Number</label>
                            <input id="serialNum${(wrapperLength)}" class="form-control" disabled/>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <label>Box</label>
                            <input id="box${(wrapperLength)}" class="form-control" disabled/>
                        </div>
                        <div class="col-md-12" style="display:none">
                            <label>Remark</label>
                            <input id="remark${(wrapperLength)}" class="form-control" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendDeliveryOrder").append(wrapper);
        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

</script>
</body>
</html>
