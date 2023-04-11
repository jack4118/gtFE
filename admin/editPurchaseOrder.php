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
                         <a href="order.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
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
                                                    <?php echo $translations['A01661'][$language]; /* Product Name */ ?>
                                                </label>
                                                <input id="product_name" type="text" class="form-control" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A01657'][$language]; /* quantity */ ?>
                                                </label>
                                                <!-- <input id="email" type="text" class="form-control"  required/> -->
                                                <input id="quantity" type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01658'][$language]; /* product_cost */ ?>
                                                </label>
                                                <!-- <select id="roleID" class="form-control"> -->
                                                <input id="product_cost" type="text" class="form-control"/>
                                                <!-- </select> -->
                                            </div>


                                            <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A01657'][$language]; /* total quantity */ ?>
                                                </label>
                                                <input id="total_quantity" type="text" class="form-control" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01658'][$language]; /* total_cost */ ?>
                                                </label>
                                                <input id="total_cost" type="text" class="form-control" readonly/>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">
                                                    <p>Warehouse Location</p>
                                                </label>
                                                <select id="warehouse-dropdown" class="form-control" required>
                                                </select>
                                            </div>

                                            </br></br>

                                            <!-- Test FOC product -->

                                            <!-- <div class="col-md-12 m-b-20">
                                                <input type="button" class="btn btn-primary fa fa-plus" id="add-foc" value="Add FOC" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;" onclick="addFOC()"/>
                                                

                                                <div class="card foc-card" id="foc" style="display: none;" >
                                                    <p class="text-center foc-title">Free of charge product</p>
                                                    <div class="card-body">
                                                        <div class="form-group" id="focProd">
                                                            <label class="control-label">
                                                                Product Name:
                                                            </label>
                                                            <input id="foc_product_name" type="text" class="form-control" readonly/>
                                                        </div>

                                                        <div class="form-group" id="focProd">
                                                            <label class="control-label">
                                                                Quantity:
                                                            </label>
                                                            <input id="quantity" type="text" class="form-control"/>
                                                        </div>

                                                        <div class="form-group" id="focProd">
                                                            <label class="control-label">
                                                                Cost:
                                                            </label>
                                                            <input id="foc_product_cost" type="text" class="form-control" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: inline-flex;">
                            <div class="col-md-12 m-b-20">
                                <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                    <!-- <?php echo $translations['A00123'][$language]; /* Confirm */ ?> -->
                                    Update PO
                                </button>
                            </div>

                            <!-- <div class="col-md-12 m-b-20">
                                <button id="confirm" type="submit" class="btn btn-primary waves-effect waves-light">
                                    Confirm PO
                                </button>
                            </div> -->
                        </div>
                    </div>

                    <!-- Test serial number button -->
                    <div class="col-lg-12 m-b-20" style="background-color: white; padding: 15px; border-radius: 5px; display:none;" id="serialNumberTable">
                        <!-- <button class="btn btn-primary fa fa-plus" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;" onclick="generateSerialNumber()">Add Serial Number</button> -->
                        <button id="assign" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;">Assign Serial Number</button>
                        <button id="clearInput" class="btn btn-primary" onclick="clearInputField()" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;">Clear Serial Number</button>

                        <div class="card foc-card" id="foc" >
                            <p class="text-center foc-title">Serial number</p>
                            <div class="card-body">
                                <div class="form-group" id="focProd">
                                    <label class="control-label">
                                         Serial Number List:
                                    </label>
                                    <textarea type="text" id="serial" class="form-control" style="height: 100px;"></textarea>
                               </div>
                            </div>
                        </div>

                        <button id="confirmSerial" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;">Confirm Serial Number</button>
                        <!-- <button id="clearSerial" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important; margin-left: 10px;">Clear Serial Number</button> -->
                    <div>

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
    var status          = "<?php echo $_POST['status']; ?>";

    $(document).ready(function() {
        if (status == "Confirmed") $('div#serialNumberTable').css('display', 'block');
        // var formData = {
        //     command        : "getWarehouse",
        // };
        // fCallback = loadFormDropdownWarehouse
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if (editId) {
            var formData = {
                'command': 'getPurchaseOrderDetails',
                'id'     : editId,
            };
            console.log(editId);
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else{
            window.location = 'order.php';
        }

        // var formData = {
        //     command        : "getWarehouse",
        // };
        // fCallback = loadFormDropdownWarehouse
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#edit').click(function() {
            var validate = $('#editUser').parsley().validate();
            if(validate) {
                showCanvas();
                // var id       = $('input#id').val();
                var id          = editId;
                var product_name = $('input#product_name').val();
                var quantity    = $('input#quantity').val();
                var product_cost   = $('input#product_cost').val();
                var warehouse_id   = $('#warehouse-dropdown option:selected').val();
                
                var formData = {
                    'command'       : 'purchaseOrderEdit',
                    'id'            : id,
                    'product_name'  : product_name,
                    'quantity'      : quantity,
                    'product_cost'  : product_cost,
                    'warehouse_id'  : warehouse_id,
                };

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }); 

        $('#assign').click(function() {
            var validate = $('#editUser').parsley().validate();
            if(validate) {
                showCanvas();
                // var id       = $('input#id').val();
                var id              = editId;
                var product_name    = $('input#product_name').val();
                
                var formData = {
                    'command'    : 'assignSerial',
                    'id'         : id,
                    'product_name'  : product_name
                };
                fCallback = generateSerialNumber2;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }); 

        $('#confirmSerial').click(function(){
            var validate = $('#editUser').parsley().validate();
            if(validate) {
                showCanvas();
                var id                  = editId;
                var product_name        = $('input#product_name').val();
                var serial              = $('textarea#serial').val();
                var total_quantity      = $('input#total_quantity').val();

                var formData = {
                    'command'           : 'confirmSerial',
                    'id'                : id,
                    'product_name'      : product_name,
                    'serial'            : serial,
                    'total_quantity'    : total_quantity
                }

                fCallback = confirmSerialResult;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        })

    });

    // Clear Serial Number Field

    function clearInputField(){
        document.getElementById('serial').value = "";
    }



    // Test generate Serial Number

    // function generateSerialNumber(data, quantity) {
    //     const getQuantity = document.getElementById('quantity').value;
    //     console.log(data);
    //     console.log(data.test[0]['serial_number']);
    //     generateSerialNumbers(data, getQuantity);
    // }

    // function generateSerialNumber2(data, quantity) {
    //     console.log(data.serial_number);
    //     var serialNumber = data.serial_number;
    //     var parts = serialNumber.split('-');
    //     var runningNumber = parseInt(parts[2]) + 1;

    //     parts[2] = runningNumber.toString().padStart(3, '0');
    //     console.log(parts[2]);
    //     serialNumber = parts.join('-');
    //     document.getElementById('serial').value = serialNumber;
    //     sendEditTest(serialNumber);
    // }

    function confirmSerialResult(data, message) {
        // showMessage('<?php echo $translations['A00135'][$language]; /* Successful updated admin info. */ ?>', 'success', '<?php echo $translations['A00136'][$language]; /* Update Admin Info */ ?>', 'address-card', 'order.php');

        showMessage('Successfully created serial number!', 'success', 'Updated PO Record', 'address-card', 'order.php');
    }

    function generateSerialNumber2(data) {

        document.getElementById('serial').value = data;
        // sendEditTest(data);
    }



    function generateSerialNumbers(val, data, getQuantity) {
        const vendorCode = 'GT001-001-';        // here can assign to other product barcode
        const prefix = vendorCode;
        let serialNumbers = [];
        
        for (let i = 1; i <= getQuantity; i++) {
            const suffix = i.toString().padStart(3, '0'); // Use the current iteration number as the suffix and pad it with leading zeroes if necessary
            const serialNumber = prefix + suffix;
            if(val){
                // Get the last 3 number from database stock
                let snPart = val.split('-');
                let snSequence = parseInt(snPart[2]);

                let testJoin2 = snPart[0] + '-' + snPart[1];
                
                // Split the newly added serial number
                const serialNumber = prefix + suffix;
                let parts = serialNumber.split('-');

                let testJoin1 = parts[0] + '-' + parts[1];

                // Get the last 3 number from the newly added serial number
                let sequence_serial = parseInt(parts[2]);
                let newSequence = snSequence + sequence_serial;


                parts[2] = newSequence.toString().padStart(3, '0');
                let newSerialNumber = parts.join('-');
                serialNumbers.push(newSerialNumber); // Add the generated serial number to the array
            }
        }
        
        document.getElementById('serial').value = serialNumbers;
        sendEditTest(serialNumbers);
    }

    function loadFormDropdown(data, message) {
        roleData = data.roleList;
        $.each(roleData, function(key) {
            $('#roleID').append('<option name="' + roleData[key]['name'] + '" value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });

        $("#roleID option[name='" + userRole + "']").attr('selected', 'selected');
    }
    
    function loadEdit(data, message) {
        warehouseData = data.warehouse;

        $.each(warehouseData, function(key, val) {
            var wLocation = val['warehouse_location'];
            $('#warehouse-dropdown').append($('<option>', {
                value: val['id'],
                text: wLocation
            }));
        });

        var getStatus = data.purchaseOrderDetail;

        $('#poId').val(editId);

        if(getStatus.status == "Confirmed") {
            var getEdit = document.getElementById('edit');
            getEdit.style.display = 'none';
            console.log('anc');

            $('#quantity').prop('readonly', true);
            $('#product_cost').prop('readonly', true);
        }

        /* Prefill purchase order detail */
        $('#product_name').val(data.purchaseOrderDetail.product_name);
        $('#product_cost').val(data.purchaseOrderDetail.product_cost);
        $('#quantity').val(data.purchaseOrderDetail.quantity);
        $('#total_cost').val(data.purchaseOrderDetail.total_cost);
        $('#total_quantity').val(data.purchaseOrderDetail.total_quantity);
        $('#warehouse-dropdown').val(data.purchaseOrderDetail.warehouse_id);
    }

    function sendEditTest(data, message) {
        showMessage('<?php echo $translations['A00135'][$language]; /* Successful updated admin info. */ ?>', 'success', '<?php echo $translations['A00136'][$language]; /* Update Admin Info */ ?>', 'address-card');
    }
    
    function sendEdit(data, message) {
        showMessage('Successfully Update Purchase Order', 'success', 'Success Update Purchase Order', 'address-card', 'order.php');
    }

    function addFOC() {
        $('#foc').show();
    }

    // function loadFormDropdownWarehouse(data, message) {
    //     warehouseData = data.getWarehouseDetail;

    //     $.each(warehouseData, function(key, val) {
    //         var wLocation = val['warehouse_location'];

    //         $('#warehouse-dropdown').append($('<option>', {
    //             value: val['id'],
    //             text: wLocation
    //         }));
    //     });
    // }


</script>
</body>
</html>
