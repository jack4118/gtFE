<?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
    echo '<script>window.location.href="accessDenied.php";</script>';
    else
    $_SESSION['lastVisited'] = $thisPage;

    //Form submission issue
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");
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
                    <!-- Left Column -->
                    <div class="col-md-8" style="margin-bottom: 20px;">
                        <!-- Your current content on the left side -->
                        <button id="edit" class="btn waves-effect waves-light" style="padding: 6px 10px; background: #3B5998; color: #fff; border: none; border-radius: 0px; cursor: pointer; margin-right: 2px;">
                            <span style="display: inline-block; margin-right: 5px;">
                                <i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i>
                            </span>
                            Edit
                        </button>

                        <div style="display: inline-block;">
                            <button id="addPO" class="btn waves-effect waves-dark" style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0px; cursor: pointer;">
                                <span style="display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-plus" aria-hidden="true" style="color: black;"></i>
                                </span>
                                Create
                            </button>
                        </div>

                        <button id="save" class="btn waves-effect waves-light" style="padding: 6px 10px; background: #3B5998; color: #fff; border: none; border-radius: 0px; cursor: pointer; margin-right: 2px;">
                            <span style="display: inline-block; margin-right: 5px;">
                                <i class="fa fa-floppy-o" aria-hidden="true" style="color: white;"></i>
                            </span>
                            Save
                        </button>

                        <div style="display: inline-block;">
                            <button id="discard" class="btn waves-effect waves-dark" style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0px; cursor: pointer;">
                                <span style="display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-times" aria-hidden="true" style="color: black;"></i>
                                </span>
                                Discard
                            </button>
                        </div>

                        <br>
                        <br>
                        <div style="display: flex; flex-direction: column; align-items: flex-start; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
                            <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">

                                <div id="RFQ" style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0; width: 50px; text-align: center; ">
                                    RFQ
                                </div>
                                <div style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0;">
                                    Approved
                                </div>
                                <div style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0;">
                                    Purchasing
                                </div>
                                <div style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0;">
                                    Pending Stock In
                                </div>
                                <div style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0;">
                                    Done
                                </div>
                            </div>
                        </div>
                        <div style="padding: 6px; border-bottom: 1px solid #ccc;">
                            <button id="approve" class="btn waves-effect waves-light" style="padding: 5px 10px; background: #3B5998; color: #fff; border: none; border-radius: 0px; cursor: pointer; margin-right: 2px;">
                                Approve
                            </button>
                            <button id="cancelled" class="btn waves-effect waves-dark" style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0px; cursor: pointer;text-align: center;">
                                Cancel
                            </button>
                        </div>
                        <br>
                        <div style="background-color: #f9f9f9; padding: 40px; border: 1px solid #ccc; border-radius: 5px;">
                        <div class="col-md-8" style="display: flex; flex-direction: column">
                            <span style="font-weight: bold; color: #000; font-size: 14px;">Purchase</span>
                            <span style="font-weight: bold; color: #000; font-size: 24px;">New</span>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid #ccc;">
                                <!-- Left Column with Spans -->
                                <div style="display: flex; flex-direction: column;">
                                    <br>
                                    <span style="font-weight: bold; color: #000; font-size: 14px; margin: 0 0 0 12px;">Assignee</span>
                                    <span style="font-weight: bold; color: #000; font-size: 14px; margin: 55px 0 0 12px;">Vendor</span>
                                    <span style="font-weight: bold; color: #000; font-size: 14px; margin: 55px 0 0 12px;">Vendor Address</span>
                                    <span style="font-weight: bold; color: #000; font-size: 14px; margin: 55px 0 0 12px;">Purchase Date</span>
                                    <span style="font-weight: bold; color: #000; font-size: 14px; margin: 55px 0 8px 12px;">Deliver To</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form>
                                    <!-- Input fields -->
                                    <div class="form-group">
                                        <select id="assignAdmin" class="form-control" required>
                                        </select>
                                        <span style="display: inline-block; margin-right: 5px;">
                                            <i class="fa fa-external-link" aria-hidden="true" style="color: #3B5998;"></i>
                                        </span>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <select id="vendorDropdown" class="form-control" required>
                                        </select>
                                        <span style="display: inline-block; margin-right: 5px;">
                                            <i class="fa fa-external-link" aria-hidden="true" style="color: #3B5998;"></i>
                                        </span>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <select id="branchAddressDropdown" class="form-control" required>
                                            <option value="">Select the address</option>
                                        </select>
                                        <input id="branchAddressText" class="form-control" readonly>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <input type="text" class="form-control" id="purchaseDate" name="purchaseDate" dataName="purchaseDate" dataType="singleDate">
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <select id="warehouseDropdown" class="form-control" required>
                                            <option value="">Select a warehouse</option>
                                        </select>
                                        <input id="warehouse" type="text" class="form-control" style="display: none;" disabled />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <span style="color: #3B5998; font-size: 16px;">Products</span>
                        <hr style="border: none; border-top: 1px solid #ccc; width: 100%; margin: -2px 0 0 0; padding: 0;">
                        <br>
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="productDiv" class="table-responsive verticalTable"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                        <!-- Buttons -->
                        <button id="addProduct" style="padding: 5px 10px; background: #3B5998; color: #fff; border: none; border-radius: 0px; cursor: pointer;">Add a Product</button>
                        <button style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0px; cursor: pointer;">Add a FOC</button>
                        <button style="padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ccc; border-radius: 0px; cursor: pointer;">Add a note</button>
                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                        <br>
                        <br>
                        <div style="margin-left: 550px">
                            <span style="font-weight: bold; color: #000; font-size: 18px;">Total: </span>
                            <span id="total" style="font-weight: bold; color: #000; font-size: 18px;">0.00</span>
                        </div>
                    </div>
                        
                    </div>
                    <br>
                    <br>
                    <!-- Right Column for System Journal -->
                    <div style="display: flex; flex-direction: column; align-items: flex-start; margin-top: 10px">
                        </div>
                    <div class="col-md-4" style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
                        <div class="system-journal" style="height: 300px; overflow-y: auto;">
                            <div class="message" style="background-color: #f0f0f0; display: flex; align-items: center;">
                                <div class="profile-circle"></div>
                                <div>
                                    <span class="username">John Doe:</span>
                                    <span class="content">User John Doe logged in.</span>
                                    <span class="timestamp">2 minutes ago</span>
                                </div>
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

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var url2             = 'scripts/reqDefault.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var fCallback       = "";
        var editId          = "<?php echo $_POST['id']; ?>";
        // var status          = "<?php echo $_POST['status']; ?>";
        var status          = '';
        var createdAt       = "<?php echo $_POST['createdAt']; ?>";
        var vendor          = "<?php echo $_POST['vendor']; ?>";
        var html = `<option value="">Select Product</option>`;
        var product_list      = null;
        var wrapperLength = 2;
        var subtotal = 0;
        var action = "";
        var typeR = "";
        var totalLoop =[1];
        var vendor_id_ini = "";
        var assign_id_ini = "";
        var tableIndex;
        var serialInputNum = [];
        var vendorName = "";
        var serial_number = [];
        var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";
        var addImgCount = 0;
        var addImgIDNum = 0;
        var usedSerialNo = [];
        var poType          = "<?php echo $_POST['poType']; ?>";
        var productId       = '<?php echo $_POST['productId'] ?>';
        var vendorId        = '<?php echo $_POST['vendorId'] ?>';
        var divId    = 'productDiv';
        var tableId  = 'productTable';
        var trID = 0;
        var btnArray = {};
        var thArray  = Array (
            "Product Name",
            "Quantity",
            "Unit Price",
            "Subtotal",
            `<i class="fa fa-ellipsis-v" aria-hidden="true" style="color: black;"></i>`
        );
        var trArray  = Array (
            `<select id="productDropdown" class="form-control" required>
                <option value="">Select product</option>
            </select>`,
            `<input id="quantity" type="number" value="0"/>`,
            `<input id="unitPrice" type="number" value="0" readonly />`,
            `<input id="subtotal" type="number" value="0" readonly />`,
            "",
        );

        $(document).ready(function() { 
            if (poType != 'add') {
                $("#branchField").show();
                $("#imageSection").show();
                $("#assignAdmin").attr("disabled", "true");
                $("#vendorDropdown").attr("disabled", "true");
                $("#branchAddressDropdown").attr("disabled", "true");
                $("#purchaseDate").attr("disabled", "true");
                $("#warehouseDropdown").attr("disabled", "true");
                $("#save").hide();
                $("#discard").hide();
                var formData = {
                    'command': 'getPurchaseOrderDetails',
                    'id'     : editId,
                    'module' : 'PO',
                    'permissionType'   : 'action'
                };
                fCallback = loadEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }else
            {
                $(".addProductWrapper").css("display", "none");
                $(".addProductWrapper.noData").css("display", "none");
                $(".addProduct").css("display", "none");
                $("#remarks").attr("disabled", "true");
                $("#edit, #save, #approve, #cancelled, #branchAddressText").hide();
                $("#RFQ").css({"background": "#3B5998", "color": "#fff", "border-color": "#3B5998"});
                $("#addPO, #discard").show();
                $('#basicwizard').show();
                vendorList();
            }
            
            $('#productDiv').find('#productTable').remove();
            $('#productDiv').append('<table id="productTable" class="table table-striped table-bordered no-footer m-0"></table>');
            $('#productDiv').find('#productTable').append('<thead><tr></tr></thead>');
            $('#productDiv').find('#productTable').append('<tbody></tbody>');

            $.each(thArray, function(key, val) {                
                $('#productTable').find('thead tr').append('<th>'+val+'</th>');
            });

            setTodayDatePicker();
            productTable();
            
            var formData = {
                command        : "getWarehouse",
                module         : 'warehouse',
                permissionType : 'filter',
            };
            fCallback = loadFormDropdownWarehouse
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



            $('#edit').click(function(){
                $("#assignAdmin").attr("disabled", false);
                $("#vendorDropdown").attr("disabled", false);
                $("#branchAddressDropdown").attr("disabled", false);
                $("#purchaseDate").attr("disabled", false);
                $("#warehouseDropdown").attr("disabled", false);
                $("#edit").hide();
                $("#addPO").hide();
                $("#save").show();
                $("#discard").show();
                
            })

            $('#addProduct').click(function(){
                productTable();
            })


            $('#vendorDropdown').change(function() {
                if($('#vendorDropdown option:selected').val() != 0) {
                    currentTokenCategory = $('#vendorDropdown :selected').val();
                    productDetails();
                }
                $('#total').text("0.00");
            })

            function productDetails() {
                var selectedOption = $('#vendorDropdown option:selected');
                var vendorName = $.trim(selectedOption.text());
                
                var formData = {
                    command        : "getProductList",
                    vendor_name    : vendorName,
                };
                fCallback = productListOpt;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }

            function loadFormDropdownWarehouse(data, message) {
                warehouseData = data;
                $.each(warehouseData, function(key, val) {
                    var vName = val['warehouse_location'];
                    $('#warehouseDropdown').append($('<option>', {
                        value: val['id'],
                        text: vName
                    }));
                });
            }

            
            
        });

        function setTodayDatePicker() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            }
            var today = yyyy+'-'+mm+'-'+dd;
            
            $('#purchaseDate').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
            var dateToday = $('#purchaseDate').val(today);

            $('#timeFrom').timepicker({
                defaultTime : '',
                showSeconds: true
            });
            $('#timeTo').timepicker({
                defaultTime : '',
                showSeconds: true
            });

            return dateToTimestamp(today);
        }

        function productTable() {
            $('#productTable').find('tbody').append('<tr id='+trID+'></tr>');

            $.each(trArray, function(key, val) {                
                $('#productTable').find('tr#'+trID).append('<td>'+val+'</td>');
            });

            trID++;

        }

        // create purchase Order button
        $('#addPO').click(function() {
            var productSet= [];

            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                if($('#total' + v).val() != "0") {
                    var id = $("#productSelect" + v).val();
                    var name = $('option:selected', "#productSelect"+v).text();
                    var cost = $('#cost' + v).val();
                    var quantity = $('#quantity' + v).val();

                    var perProduct = {
                        id :id,
                        name:name,
                        cost :cost,
                        quantity: quantity,
                    }
                    productSet.push(perProduct);
                }
            }

            uploadImage = [];
            uploadImageData = [];
            $(".popupMemoImageWrapper").each(function() { 
                var imgData = $(this).find('[id^="storeFileData"]').val();
                var imgName = $(this).find('[id^="storeFileName"]').val();
                var imgType = $(this).find('[id^="storeFileType"]').val();
                var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                var imgSize = $(this).find('[id^="storeFileSize"]').val();
                var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

                if(imgData != "") {
                    buildUploadImage = {
                        imgName : imgName,
                        imgType : imgType,
                        imgFlag : imgFlag,
                        imgSize : imgSize,
                        uploadType : imgUploadType
                    };

                    // if(parseFloat(imgSize) / 1048576 > 3) {
                    //     imgSizeFlag = false;
                    // }
                    var stringImgData = '';

                    if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
                        stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
                    } else {
                        stringImgData = JSON.stringify(imgData);
                    }

                    reqData = {
                        imgName : imgName,
                        // imgData : JSON.stringify(imgData),
                        imgData : stringImgData,
                        // imgType : imgType,
                        // imgSize : imgSize,
                        // uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(reqData);
                }
            });

            var formData = {
                command  : "addPurchase",
                assign_id : $("#assignAdmin").val(),
                vendor_id : $("#vendorDropdown").val(),
                branchName_id : $("#branchNameDropdown").val(),
                branchAddress_id : $("#branchAddressDropdown").val(),
                vendor_address_id : $("#branchAddressDropdown").val(),
                warehouse_id : $("#warehouseDropdown").val(),
                buying_date : $("#purchaseDate").val(),
                product_list : productSet,
                remarks : $("#remarks").val(),
                uploadImage: uploadImage,
                poType  : "add",
                module  : "PO",
                permissionType : "action",
            };
            var fCallback = sendNew;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });


        function sendNew(data, message) {
            var editId = data.po_id;
            showMessage('Purchase Order Has Been Created Successfully', 'success', 'Success Create Purchase Order', 'check', ['purchase1.php', {id : editId} ])
        }
        

        function vendorList(vendorName) {
            var formData = {
                command        : "getVendorList",
            };
            fCallback = displayVendorList;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function displayVendorList(data, message) {
            vendorList = data.vendorList;
            adminList = data.adminList;
            if (vendorList) {
                var vendorName = '';
                vendorName += `<option value="" data-lang="M02737">Please select vendor</option>`;
                $.each(vendorList, function(k, v) {
                    vendorName += `
                        <option value="${v['id']}">${v['name']}</option>
                    `;
                });
                $('#vendorDropdown').html(vendorName); // Append new options
            }
            console.log('assign_id_ini:',assign_id_ini);
            if(adminList)
            {
                var adminName = '';
                adminName += `<option value="" data-lang="M02737">Please select Admin</option>`;
                $.each(adminList, function(k, v) {
                    adminName += `
                        <option value="${v['id']}">${v['name']}</option>
                    `;
                });
                $('#assignAdmin').html(adminName); // Append new options
                $("#assignAdmin").val(assign_id_ini).select2();
            }
        }
        
        function productListOpt(data, message) {
            if(data) {
                var html3 = `<option value="">Select the address</option>`;
                $.each(data.branch, function(i, obj) { 
                    html3 += `<option value="${obj.id}">${obj.address}</option>`;
                });
                $("#branchAddressDropdown").html(html3);
            } 

            if(poType === 'add')
            {
                if(data.length < 1) {
                    showMessage('This vendor have no product yet. Please choose other vendor to continue.', 'warning', 'New Purchase Order', 'warning', '');
                    $('#vendorDropdown').val('');
                }
            }
        }

        
        // function loadEdit(data, message) {
        //     vendorList();
        //     status = data.status;
        //     $("#total").text(data.total_cost);
        //     // $("#remarks").val(data.remarks);
        //     $("#warehouse").val(data.current_warehouse_location);
        //     $("#warehouseDropdown").hide();
        //     $("#warehouse").show();
        //     // $("#statusField").show();
        //     // $("#status").val(data.status);
        //     // $("#createdBy").val(data.created_by);
        //     // $("#approvedBy").val(data.approved_by);
        //     $("#branchAddressText").val(data.vendor_address);
        //     $("#branchAddressDropdown").hide();
        //     $("#branchAddressText").show();
        //     $('#poNo').text(data.order_number);
        //     $('#purchaseDate').val(data.purchase_date);
        //     assign_id_ini = data.assignTo;
        //     productList = data.productList;

        //     if(vendor == ""){
        //         vendorName = data.productList[0]['vendor_name'];
        //     }

        //     if(data.status == "Approved" || data.status == "Pending For Stock In" || data.status == "Done" || data.status == "Cancelled" || data.status == "Purchasing") {
        //         $("#cancelled").hide();
        //         $("#approve").hide();
        //     }

        //     if(data.status == "Pending For Stock In") {
        //         $("#inputSerial").removeAttr("disabled").focus();
        //     }

        //     if(data.status == "Approved")
        //     {
        //         $("#accept").show();
        //         $("#reject").show();
        //     }

        //     if(data.status == "Purchasing")
        //     {
        //         $("#upgradeStockIn").show();
        //     }

        //     $.each(productList, function (k, v) { 
        //         var newK = k + 1;
        //         if(k != 0) 
        //             addRow(productList);

        //         loopQuantity(k);

        //         $("#quantity" + newK).val(v['quantity']);
        //         $("#id" + newK).val(v['purchase_product_id']);
        //         $("#productType" + newK).val(v['type']);

        //         $("#cost" + newK).val(v['cost'].toFixed(2));
        //         var editTotal = v['cost'] * v['quantity'];
        //         $("#total" + newK).val(editTotal.toFixed(2)); 


        //         if(status != "RFQ" && status != "Approved" && status != "Purchasing") {
        //             $("#remarks").attr("disabled", true);
        //             $("input").attr("disabled", true);
        //             $("select").attr("disabled", true);
        //             $(".addProduct").css("display", "none");
        //             $("#edit").attr("disabled", true);
        //             $("#approve").attr("disabled", true);
        //             $(".closeBtn").css("display", "none");
        //             if(status != "Cancelled") {
        //                 $("#serialNumberTable").css("display", "block");
        //             }
        //             $('.addProductImage').hide();
        //         }         
        //     });

        //     var imageList = data.imageList;

        //     $.each(imageList, function(k, v) {
        //         var newK = k + 1;
        //         addImage(v['url']);
        //         $('#fileName' + newK).html(v['name']);
        //         $("#viewImg" + newK).css('display', 'inline-block');
        //         $("#deleteImg" + newK).css('display', 'inline-block');

        //         $('#storeFileName' + newK).val(v['name']);
        //         $('#storeFileData' + newK).val(v['url']);
        //         $('#storeFileIsExist' + newK).val('true');

        //         var dataUrl = '';

        //         var image = new Image();
        //         image.crossOrigin='anonymous';
        //         image.onload = () => {
        //             var canvas = document.createElement('canvas');
        //             var ctx = canvas.getContext('2d');
        //             canvas.height = image.naturalHeight;
        //             canvas.width = image.naturalWidth;
        //             ctx.drawImage(image, 0, 0);
        //             dataUrl = canvas.toDataURL();

        //             $('#storeFileIsExist' + newK).val('true');
        //             $('#storeFile64Bit' + newK).val(dataUrl);
        //         }
                
        //         image.src = $('#storeFileData' + newK).val();
        //     })

        //     if(status == 'Pending For Stock In') {
        //         assignSerialNumber();
        //         $('#serial').prop("readonly", "true");
        //         $('#inputSerial').attr('disabled', false);
        //     }

        //     if(status == 'Confirmed') {
        //         assignSerialNumber();
        //     }

        //     loopQuantity(data.productList.length);

        //     if(status == 'Done') {
        //         var displaySerial = '';

        //         $.each(data.serialList, function(m, n) {
        //             displaySerial += `${n}\n`;  
        //         })

        //         $('#serial').val(displaySerial);
        //         $('#serial').prop("readonly", "true");

        //         if(data.serialNumberList != null){
        //             serial_number = data.serialNumberList;
                
        //             $('#serialForDone').val(serial_number.join('  ||  '));
        //         }
        //     }

        //     vendor_id_ini = data.vendor_id;

        //     var formData = {
        //         command        : "getVendor",
        //     };
        //     fCallback = loadFormDropdownVendor;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // }


        function newFormatState(method) {
            if (!method.id) {
                return method.text;
            }

            var optimage = $(method.element).attr('data-image')
            if (!optimage) {
                return method.text;
            } else {
                var $opt = $(
                    '<span onclick="changeTokenCategory('+method.text+')"><img src="' + optimage + '" class="tokenOptionImg" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
                );
                return $opt;
            }
        };

        $('#vendorDropdown').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        $('#assignAdmin').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

    </script>
</body>
</html>