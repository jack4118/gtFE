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
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">
                                Purchase Request
                            </h4>
                            <div class="row hide">
                                <div class="col-md-6">
                                    <form role="form" id="newPurchaseRequest" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div class="form-group">
                                                    <label for="">
                                                        <!-- <?php echo $translations['A01661'][$language]; /* Vendor */ ?> -->
                                                        Vendor
                                                    </label></br>
                                                    <!-- <input id="vendor_name" type="text" class="form-control"  required/> -->
                                                    <select id="vendor-dropdown" class="form-control">
                                                        <option value="">Select a vendor</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01661'][$language]; /* Product Name */ ?>
                                                    </label>
                                                    <!-- <input id="product_name" type="text" class="form-control"  required/> -->
                                                    <select id="product_name" class="form-control">
                                                        <option value="">Select a product</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01662'][$language]; /* Quantity */ ?>
                                                    </label>
                                                    <input id="quantity" type="text" class="form-control"  required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01663'][$language]; /* Cost */ ?>
                                                    </label>
                                                    <input id="product_cost" type="text" class="form-control"  required/>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01657'][$language]; /* Total Quantity */ ?>
                                                    </label>
                                                    <input id="total_quantity" type="text" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01658'][$language]; /* Total Cost */ ?>
                                                    </label>
                                                    <input id="total_cost" type="text" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01660'][$language]; /* Approved Date */ ?>
                                                    </label>
                                                    <input id="approved_date" type="text" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01659'][$language]; /* Approved By */ ?>
                                                    </label>
                                                    <input id="approved_by" type="text" class="form-control"/>
                                                </div> -->

                                                <!-- <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01659'][$language]; /* Created at */ ?>
                                                    </label>
                                                    <input id="created_at" type="text" class="form-control"/>
                                                </div> -->

                                                 <!-- <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
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
                                                </div> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>












                            <div class="form-group">
                                <div class="row mx-0">
                                    <div class="col-md-4">
                                        <label>
                                            Buying Date
                                        </label>
                                        <input id="buyingnDate" class="form-control" dataName="buyingDate" dataType="singleDate">
                                    </div>

                                    <div class="col-md-4">
                                        <label>
                                            Vendor
                                        </label>
                                        <select id="vendor-dropdown" class="form-control">
                                            <option value="">Select a vendor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div id="appendImage">
                                                <div class="col-md-12">
                                                    <div class="popupMemoImageWrapper default">
                                                        <span class="dtxt">Default</span>
                                                        <!-- <input type="hidden" id="storeFileData1">
                                                        <input type="hidden" id="storeFileName1">
                                                        <input type="hidden" id="storeFileSize1">
                                                        <input type="hidden" id="storeFileType1">
                                                        <input type="hidden" id="storeFileFlag1">
                                                        <input type="file" id="fileUpload1" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('1', this)">
                                                        <div>
                                                            <a href="javascript:;" onclick="$('#fileUpload1').click()" class="btn btn-primary btnUpload">Upload</a>
                                                            <span id="fileName1" class="fileName">No File Uploaded</span>
                                                            <a id="viewImg1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showImg('1')">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div> -->
                                                        <div class="row" id="pr1">
                                                            <div class="col-md-3">
                                                                <label>1. Product</label>
                                                                <select id="productSelect1" class="form-control productSelect"></select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Quantity</label>
                                                                <input id="quantity1" type="number" oninput="productListOpt()" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Cost</label>
                                                                <input id="cost1" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Total Amount</label>
                                                                <input id="total1" type="text" value="0.00" class="form-control" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="addLanguageImage" onclick="addRow()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Product</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Subtotal</label>
                                        <input id="subtotal" class="form-control" value="0.00" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <label>Remark</label>
                                        <textarea id="remark" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
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
    var product_list      = null;
    var selectedLang    =  [];
    var html = `<option value="">Select Product</option>`;
        
    var fCallback;

    $(document).ready(function() { 

        vendorList();

        $('#vendor_name').change(function() {
		// var vendor_name = $('#vendor_name').text();
        var selectedOption = $('#vendor_name option:selected');
        var optionText = $.trim(selectedOption.text());
        productDetails();
	    });

        $('#add').click(function() {
            var validate = $('#newPurchaseRequest').parsley().validate();
            if(validate) {
                showCanvas();
                var product_name = $('select#product_name option:selected').text();
                var product_id = $('select#product_name option:selected').val();
                var vendor_id = $('#vendor-dropdown').val();
                var quantity = $('#quantity').val();
                var product_cost    = $('#product_cost').val();
                // console.log(vendor_id);

                var formData = {
                    command  : "addPurchaseRequest",
                    product_name : product_name,
                    product_id   : product_id,
                    vendor_id : vendor_id,
                    quantity : quantity,
                    product_cost    : product_cost,

                };
                var fCallback = sendNew;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        var formData = {
            command        : "getVendor",
        };
        fCallback = loadFormDropdownVendor
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var formData = {
            command        : "getProduct",
        };
        fCallback = productListOpt
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $(".quantityInput").keyup(function () { console.log("ok");
            this.value|=0;

            var quantity_id = this.id;
            var totalID = "#total" + quantity_id.substring(8);
            var quantity = $('#' + quantity_id).val();
            var product_cost_id = '#cost' + quantity_id.substring(8); 
            var product_cost = $(product_cost_id).val(); 


            console.log("totalID: " + totalID);
            console.log("product_cost: " + product_cost);
            console.log("quantity: " + quantity);

            $(totalID).val(numberThousand(product_cost * quantity,2));
        })

    });
    
    function loadFormDropdown(data, message) {
        roleData = data.roleList;

        $.each(roleData, function(key) {
            $('#roleID').append('<option value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });



    }

    function vendorList(vendorName)
    {
        var formData = {
            command        : "getVendorList",
        };
        fCallback = displayVendorList;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function productDetails()
    {
        var selectedOption = $('#vendor_name option:selected');
        var vendorName = $.trim(selectedOption.text());
        var formData = {
            command        : "getProductList",
            vendor_name    : vendorName,
        };
        fCallback = displayProductList;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function displayVendorList(data, message) {
    if (data) 
    {
        var vendorName = '';
		vendorName += `<option value="" data-lang="M02737">Please select vendor</option>`;
        $.each(data, function(k, v) {
            vendorName += `
                <option value="${v['id']}">${v['name']}</option>
            `;
        });

        $('#vendor_name').html(vendorName);
    }
}

    function displayProductList(data, message) {
    if (data) 
    {
        var productName = '';
        $.each(data, function(k, v) {
            productName += `
                <option value="${v['id']}">${v['name']}</option>
            `;
        });

        $('#product_name').html(productName);
    }
}


    
    function sendNew(data, message) {
        showMessage('Purchase Request Has Been Created Successfully', 'success', 'Success Create Purchase Request', 'user-plus', 'purchaseRequest.php');
    }

    function loadFormDropdownVendor(data, message) {
        vendorData = data.getVendorDetail;

        $.each(vendorData, function(key, val) {
            var vName = val['name'];
            // console.log(vName);
            $('#vendor-dropdown').append($('<option>', {
                value: val['id'],
                text: vName
            }));
        });
    }

    function loadFormDropdownProduct(data, message) {
        // productData = data.getProductDetail;

        $.each(productData, function(key, val) {
            var pName = val['name'];
            // console.log(pName);
            $('#product_name').append($('<option>', {
                value: val['id'],
                text: pName
            }));
        });
    }

    function addRow(){
        var wrapperLength = $(".popupMemoImageWrapper").length + 1;

        var wrapper = `
            <div class="col-md-12">
                <div class="popupMemoImageWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-3">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" class="form-control productSelect">
                                  ${html}                                
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Quantity</label>
                            <input id="quantity" type="number" oninput="this.value|=0" class="form-control" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Cost</label>
                            <input id="cost" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Total Amount</label>
                            <input id="total" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" readonly/>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendImage").append(wrapper);
    }

    function closeDiv(n) {
        var lang = $(n).parent().find('.productSelect').val();
        if(lang != "") {
            var inArr = $.inArray(lang, selectedLang);
            selectedLang.splice(inArr, 1)
        }

        $(n).parent().parent().remove();
    }
    
    function productListOpt(data, message) {
        if(data.getProductDetail) {
            
            $.each(data.getProductDetail, function(i, obj) {
                html += `<option value="${obj.id}" dataCost="${obj.cost}">${obj.name}</option>`;
            });
            
            $("#productSelect1").html(html);
        }

        $(".productSelect").change(function () {
            var cost_id = this.value - 1;
            var select_id = this.id;
            var product_cost = data.getProductDetail[cost_id].cost;
            var costID = "#cost" + select_id.substring(13);
            $(costID).val(product_cost);

            $(".quantityInput").keyup();
        });
    }

    function keyinQuantity() {
        var quantity = $("#quantity1").val(); 
        var total_per_row = quantity * product_cost;
        var decimal_total_per_row = numberThousand(total_per_row,2);

        $('#total1').val(decimal_total_per_row);
    }

    function deleteImg(id) {
        $("#fileUpload"+id).val("");
        $("#fileName"+id).text("No File Uploaded");
        $("#storeFileData"+id).val("");
        $("#storeFileName"+id).val("");
        $("#storeFileSize"+id).val("");
        $("#storeFileType"+id).val("");
        $("#storeFileFlag"+id).val("");

        $("#viewImg"+id).hide();
        $("#deleteImg"+id).hide();

        var lang = $("#productSelect"+id).val();
        $("#productSelect"+id).html(productListOpt());
        $("#productSelect"+id).removeAttr('disabled');

        if(lang != "") {
            var inArr = $.inArray(lang, selectedLang);
            selectedLang.splice(inArr, 1)
        }
    }

    function displayFileName(id, n) {
        var dFileName = $("#fileName"+id);

        if (n.files && n.files[0]) {
            var filesize = n.files[0].size;
            if(filesize >  3000000){
                alert("Maximun upload size 3 MB");
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                dFileName.text(n.files[0]["name"]);

                $("#storeFileData"+id).val(reader["result"]);
                $("#storeFileName"+id).val(n.files[0]["name"]);
                $("#storeFileSize"+id).val(n.files[0]["size"]);
                $("#storeFileType"+id).val(n.files[0]["type"]);
                $("#storeFileFlag"+id).val('1');

                $("#viewImg"+id).css('display', 'inline-block');
                $("#deleteImg"+id).css('display', 'inline-block');
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

    function showImg(n) {
        $("#modalImg").attr('src', $("#storeFileData"+n).val());
        $("#showImage").modal();
    }

    function submitCallback(data, message) {
        if(data){
            $('#modalProcessing').modal('show');
            $.each(data, function (lang, val) {
                var reqData2 = new FormData();

                if(val.imgName){
                    // $('[name=storeVideoName]').val(reqData[lang]['image']);
                    var imagefiles = reqData[lang]['imgData'];//$('#uploadVideo')[0].files[0];
                    var block = imagefiles.split(";");
                    // Get the content type of the image
                    var contentType = block[0].split(":")[1];// In this case "image/gif"
                    // get the real base64 content of the file
                    var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

                    // // Convert it to a blob to upload
                    var blob = b64toBlob(realData, contentType);
                    // $('[name=videoName]').val(data.company_video_name);
                    
                    reqData2.append('imageData', blob);
                    reqData2.append('image', val['imgName']);
                }

                $.ajax({
                    url: 'scripts/reqUploadCDN.php',
                    type: 'post',
                    data: reqData2,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function(data){
                        // console.log(data);
                        // return;
                        // var json = JSON.parse(data);
                        // console.log(data);
                        // if (json.status == 'ok') {
                        //     uploadVideoSuccess();
                        // }
                    },
                });
            });

            $('#modalProcessing').modal('hide');

            uploadVideoSuccess();
        }
    }

    function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
    }

    function detectDuplicate(n) {
        var thisSelected = $(n).val();
        var inArr = $.inArray(thisSelected, selectedLang);

        if(inArr >= 0) {
            $(n).val("");
            alert("This language is selected.");
        }else {
            selectedLang.push(thisSelected);
            $(n).attr('disabled', 'disabled');
        }
    }

    $('#buyingDate').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });
</script>
</body>
</html>
