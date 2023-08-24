<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
if(!isset ($_SESSION['access'][$thisPage]))
    echo '<script>window.location.href="accessDenied.php";</script>';
$_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
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
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">

                                    <div class="col-xs-12 contentPageTitle">
                                        Product Details
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Product Name (English)</label>
                                                <input id="invProductNameEnglish" type="text" class="form-control">
                                                <span id="invProductNameErrorEnglish" class="errorSpan text-danger"></span>
                                                <span id="nameErrorEnglish" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Product Name (Chinese)</label>
                                                <input id="invProductNameChinese" type="text" class="form-control">
                                                <span id="invProductNameErrorChinese" class="errorSpan text-danger"></span>
                                                <span id="nameErrorChinese" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Vendor Name</label>
                                                <select id="vendorName" class="form-control" dataName="vendorName" dataType="text">
                                                </select>
                                                <span id="vendorNameError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>SKU Code</label>
                                                <input id="skuCode" type="text" class="form-control" readonly>
                                                <span id="skuCodeError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px;"> -->
                                                <!-- <label>Product Type</label> -->
                                                <input id="productType" type="text" class="form-control" value = 'Product' readonly>
                                            <!-- </div> -->
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Best Before (Days)</label>
                                                <input id="expiredDay" type="number" class="form-control">
                                                <span id="expiredDayError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Delivery Method</label>
                                                <select id="deliveryMethod" class="form-control category" dataName="deliveryMethod" dataType="text">
                                                </select>
                                                <span id="deliveryMethodError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Category</label>
                                                <select id="category" class="form-control category" dataName="category" dataType="text">
                                                </select>
                                                <span id="categoryError" class="errorSpan text-danger"></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addCategoryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Cost</label>
                                                <input id="cost" type="number" class="form-control">
                                                <span id="costError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Sale Price</label>
                                                <input id="salePrice" type="number" class="form-control">
                                                <div><span id="costSuggest" class=""></span></div>
                                                <div><span id="salePriceError" class="errorSpan text-danger"></span></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Description(English)</label>
                                                <textarea id="description" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="descriptionError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Description(Chinese)</label>
                                                <textarea id="descriptionChinese" class="form-control" rows="4" cols="50"></textarea>
                                            </div>
                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Cooking Time</label>
                                                <textarea id="cookingTime" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="cookingTimeError" class="errorSpan text-danger"></span>
                                            </div> -->
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Cooking Suggestion</label>
                                                <textarea id="cookingSuggestion" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="cookingSuggestionError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Full Instruction</label>
                                                <textarea id="fullInstruction" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="fullInstructionError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Full Instruction 2</label>
                                                <textarea id="fullInstruction2" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="fullInstruction2Error" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12" style="margin-top: 20px">
                                                <label>Video</label>
                                                <input id="video" type="text" class="form-control">
                                                <span id="videoError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div> -->

                                        <!-- New Cooking Suggestion plugin -->
                                        <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                            <label>Cooking Suggestions</label>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div id="buildCookingSuggest"></div>
                                                <div class="col-md-4 addCookingSuggestBtn" style="display: none;">
                                                    <div class="addLanguageImage" onclick="addCookingSuggest()">
                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                        <span>Add Another Cooking Suggestion</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- New Cooking Suggestion plugin end here -->

                                        <div class="row">
                                            <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                                Product Images (Recommended Size: 600 x 310 px)
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div id="buildImg">
                                                    </div>

                                                    <div class="col-md-4 addImgBtn" style="display: none;">
                                                        <div class="addProductImage" onclick="addImage()">
                                                            <b><i class="fa fa-plus-circle"></i></b>
                                                            <span>Add Images</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <span id="imgError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-xs-12">
                                                <span id="imgTypeError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Publish Status</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-inline">
                                                        <input id="active" type="radio" value="1" name="publishStatus" checked="checked"/>
                                                        <label for="active">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input id="inActive" type="radio" value="0" name="publishStatus"/>
                                                        <label for="inActive">
                                                            <?php echo $translations['A00057'][$language]; /* No */?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Archive Status</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-inline">
                                                        <input id="activeArhive" type="radio" value="1" name="archiveStatus"/>
                                                        <label for="activeArhive">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input id="inActiveArhive" type="radio" value="0" name="archiveStatus" checked="checked"/>
                                                        <label for="inActiveArhive">
                                                            <?php echo $translations['A00057'][$language]; /* No */?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                            
                                    <div class="col-xs-12" style="margin-top: 20px;">
                                        <div class="row">
                                            <div class="col-xs-12" style="border: 1px solid #ff9804; background-color: #fff0db; padding: 10px;display:none;">
                                                <div class="row" onclick="toggleAttributeBox()">
                                                    <div class="col-xs-12">
                                                        <input type="checkbox" id="isVariant" onclick="toggleAttributeBox()" style="margin: 0;"><label for="isVariant" onclick="toggleAttributeBox()" style="margin: 0;">Variant</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="attributeBox" class="col-xs-12" style="border: 1px solid #ff9804; background-color: #fff0db; padding: 20px; display: none;">
                                                <div id="attr1" class="col-xs-6">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute 1</label>
                                                        <select id="attribute1" type="text" class="attribute form-control"></select>
                                                        <span id="attribute1Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Value</label>
                                                        <select id="attributeVal1" class="attributeVal form-control"></select>
                                                        <span id="attributeVal1Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="attributeVal1List" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll; background: white;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="attr2" class="col-xs-6">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute 2</label>
                                                        <select id="attribute2" type="text" class="attribute form-control"></select>
                                                        <span id="attribute2Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Value</label>
                                                        <select id="attributeVal2" class="attributeVal form-control"></select>
                                                        <span id="attributeVal2Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="attributeVal2List" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll; background: white;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="packageBox" class="col-xs-12" style="margin-top: 20px;  display: none;">
                                        <div class="row">
                                            <div class="col-xs-12" style="border: 1px solid #ff9804; background-color: #fff0db; padding: 20px;">
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Package</label>
                                                        <select id="package" type="text" class="package form-control"></select>
                                                        <span id="packageError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="packageList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll; background: white;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                        <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00323'][$language]; /* Submit */?>
                                        </div>
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

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                    <video id="modalVideo" width="400" controls>
                      <source src="" type="">
                    </video>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>

   
	<!-- <div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <span id="canvasTitle" class="modal-title"><?php echo "Processing"; //Processing ?></span>
	            </div>
	            <div class="modalLine"></div>
	            <div class="modal-body modalBodyFont">
	                <div id="canvasAlertMessage"><?php echo "Uploading file..."; //Uploading file... ?></div>
	            </div>
	            <div class="modal-footer">

	            </div>
	        </div>
	    </div>
	</div> -->

    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>

        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";
        var selectedLang = [];
        // var selectedCountry = [];
        var reqData =  new FormData();
        var reqVideoData =  new FormData();
        // var nameLanguages = [];
        // var descrLanguages = [];
        var cookingSuggestionName = [];
        var cookingSuggestionUrl = [];
        var cookingSuggestionRemark = [];
        // var countryTagArr = [];
        var uploadImage;
        var uploadImageData;
        var uploadVideo;
        var uploadVideoData;
        var buildOption;
        var buildOptionLength = 0;
        var packageCategoryOption;
        var categoryOption;
        var deliveryMethodOption;
        // var buildCountry;
        var addCSCount = 1;
        var cTNum = 1;
        var totalLoop = [1];
        var temp_id;
        var addImgCount = 0;
        var addImgIDNum = 0;
        var addVideoCount = 0;
        var addVideoIDNum = 0;
        // var addErrorCount = 0;
        var uploadFileType = 'image';
        var discountPercentage = 0;
        var discountUpPercentage = 0;
        // var selectedPayment = [];
        // var selectedDeposit = [];
        var createdData = new FormData();
        var attributeValList = [];
        var results = [];
        var packageProductList = [];

        var expiredDayInput = document.getElementById('expiredDay');
        var expiredDayError = document.getElementById('expiredDayError');

        expiredDayInput.addEventListener('input', function() {
            var inputValue = expiredDayInput.value;

            // Remove any non-numeric characters from the input value
            var numericValue = inputValue.replace(/\D/g, '');

            // Update the input value with the numeric-only value
            expiredDayInput.value = numericValue;

            // Display an error message if the input value is not numeric
            if (inputValue !== numericValue) {
                expiredDayError.textContent = 'Please enter a numeric value';
            } else {
                expiredDayError.textContent = '';
            }
        });

        // var divId    = 'productListDiv';
        // var tableId  = 'productListTable';
        // var pagerId  = 'pagerAnnouncementList';
        // var btnArray = {};
        // var thArray  = Array (
        //     "Product Code",
        //     "Price",
        //     "Quantity"
        // );
        // var pageNumber      = 1;

        var vendorId = '<?php echo $_POST['vendorId'] ?>';

        $(document).ready(function() {

            // hide product type
            document.getElementById("productType").style.display = "none";

            var formData  = {
                command: 'getProductInventoryDetails'
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // addPackage();

            $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
                // $(this).val('');
            });

            $('#category').change(function(){
                var categoryID = $(this).find("option:selected").val();
                var category = $(this).find("option:selected").text();

                if(categoryID != "") {
                    var categoryDiv = `
                    <div id="${categoryID}" data-select="category" class="categoryTag includecategoryTag" style="">${category} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#addCategoryList").append(categoryDiv);

                    $(this).find("option:selected").remove();
                    $(this).val('');
                }
            });

            $(document).on("click",".categoryTag",function() {
                $(this).remove();

                var selectId = $(this).attr('data-select');
                var categoryId = $(this).attr('id');
                var category = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${categoryId}">${category}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
            });

            $('#cost').on('change', function() {
                if($(this).val() == '') {
                    $('#costSuggest').hide();
                } else {
                    var cost = $(this).val();
                    var sale_price = (cost * (100 + discountPercentage)) / 100;

                    $('#costSuggest').text('Suggested sale price is RM ' + numberThousand(sale_price, 2));
                }
            });

            $('#salePrice').on('change', function() {

                var cost = parseFloat($(this).val());
                // var sale_price = (cost * (100 + discountPercentage)) / 100;
                var entered_price = parseFloat($('#salePrice').val());
                var costSuggestText = $('#costSuggest').text();
                var suggestedPrice = costSuggestText.match(/RM (\d+\.\d+)/);
                if (entered_price < suggestedPrice[1]) 
                {
                    showMessage("Sale Price is lower than suggested sale price.", 'warning', "Warning", '', '', '');
                } 
                else 
                {
                    $('#costSuggest').removeClass('warning');
                }
            });

            $('#addFee').change(function() {
                $('#addFee').is(':checked') ? $('#stockFee').show() : $('#stockFee').hide();
            });

            $('.attribute').on('change', function() {
                var attrId = $(this).val();
                var inputId = $(this).parent().parent().attr('id');

                var formData  = {
                    command : 'getAttributeDetail',
                    attrId  : attrId,
                    type    : 'get',
                    inputId : inputId,
                };
                fCallback = loadAttribute;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
            });

            $('.attributeVal').change(function(){
                var attrID = $(this).find("option:selected").val();
                var attr   = $(this).find("option:selected").text();
                var input  = $(this).attr('id'); 

                if(attrID != "") {
                    var attrDiv = `
                        <div id="${attrID}" data-select="${input}" class="attributeTag includeAttributeTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">${attr} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#"+input+"List").append(attrDiv);

                    $(this).find("option:selected").remove();
                    $(this).val('');
                }
            });

            $(document).on("click",".attributeTag",function() {
                $(this).remove();
                var selectId = $(this).attr('data-select');
                var categoryId = $(this).attr('id');
                var category = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${categoryId}">${category}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
            });

            $('#vendorName').on('change', function() {
                var vendorId = $(this).val();
                if(vendorId != '') {
                    var formData  = {
                        command  : 'generateProductSKU',
                        vendorId : vendorId,
                    };
                    fCallback = loadProductSKU;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
                }
            });

            $('#productType').on('change', function() {
                var productType = $(this).val();
                if(productType == 'Package') {
                    var formData  = {
                        command : 'getPackageProductList',
                        type    : productType,
                    };
                    fCallback = loadPackageProduct;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
                } else {
                    $('#packageBox').hide();
                }
            });

            $('#package').change(function(){
                var packageID = $(this).find("option:selected").val();
                var package   = $(this).find("option:selected").text();
                var input     = $(this).attr('id'); 

                if(packageID != "") {
                    var packDiv = `
                        <div id="${packageID}" data-select="${input}" class="packageTag includePackageTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">${package} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#packageList").append(packDiv);

                    $(this).find("option:selected").remove();
                    $(this).val('');
                }
            });

            $(document).on("click",".packageTag",function() {
                $(this).remove();
                var selectId = $(this).attr('data-select');
                var categoryId = $(this).attr('id');
                var category = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${categoryId}">${category}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
            });

            $('#submitBtn').click(function() { 

                $('[id$="Error"]').text("");

                $(".errorSpan").empty()

                // var imgSizeFlag = true;
                // var videoSizeFlag = true;

                // Language
                // var invProductNameEnglish = $("#invProductNameEnglish").val();
                // var invProductNameChinese = $("#invProductNameChinese").val();

                var productNameArr = [];

                var productNameEnglish = document.getElementById("invProductNameEnglish").value;
                var productNameChinese = document.getElementById("invProductNameChinese").value;

                var englishObj = {
                language: "english",
                name: productNameEnglish
                };

                var chineseObj = {
                language: "chinese",
                name: productNameChinese
                };

                productNameArr.push(englishObj);
                productNameArr.push(chineseObj);


                // var description = $('#description').val();

                var descriptionArr = [];

                var descEnglish = document.getElementById("description").value;
                var descChinese = document.getElementById("descriptionChinese").value;

                var englishObjDesc = {
                    language: "english",
                    name: descEnglish
                };

                var chineseObjDesc = {
                    language: "chinese",
                    name: descChinese
                };

                descriptionArr.push(englishObjDesc);
                descriptionArr.push(chineseObjDesc);

                var remarkArr = [];
                var remarkArray = [];

                for (var j = 0; j < cTNum; j++) {
                    var remarkEnglishElement = document.getElementById("cookingRemark" + (j + 1));
                    var remarkChineseElement = document.getElementById("cookingRemarkChinese" + (j + 1));

                    if (remarkEnglishElement && remarkChineseElement) {
                        var remarkEnglish = remarkEnglishElement.value;
                        var remarkChinese = remarkChineseElement.value;

                        var englishRemark = {
                            language: "english",
                            name: remarkEnglish
                        };

                        var chineseRemark = {
                            language: "chinese",
                            name: remarkChinese
                        };

                        var remarkObj = [englishRemark, chineseRemark];
                        remarkArray.push(remarkObj);
                    }
                }

                // remarkArr.push(remarkArray);



                // var remarkEnglish = document.getElementById("cookingRemark1").value;
                // var remarkChinese = document.getElementById("cookingRemarkChinese1").value;

                var skuCode = $("#skuCode").val();
                var publishStatus = $("input[name=publishStatus]:checked").val();
                var archiveStatus = $("input[name=arhiveStatus]:checked").val();
                var category = [];
                // var weight = $("#weight").val().replace(/[^0-9.]/g, '');
                // var productCost = $("#productCost").val();
                var productType = $("#productType").val();
                var expiredDay = $('#expiredDay').val();
                var cost = $('#cost').val();
                var salePrice = $('#salePrice').val();
                // var cookingTime = $('#cookingTime').val();
                var cookingSuggestion = $('#cookingSuggestion').val();
                var deliveryMethod = document.getElementById("deliveryMethod").value;
                // var fullInstruction = $('#fullInstruction').val();
                // var fullInstruction2 = $('#fullInstruction2').val();
                var vendorId = $('#vendorName option:selected').val();
                var video = $('#video').val();
                // var video2 = $('#video2').val();
                var packageProduct = [];

                cookingSuggestionName = [];
                $(".cookingSuggestInput").each(function(){
                    // var getCookingSuggest = $(this).attr("name");
                    var getValue = $(this).val();
                    buildCookingSuggestName = {
                        // cookingSuggest : getCookingSuggest,
                        content : getValue
                    };
                    cookingSuggestionName.push(buildCookingSuggestName);
                });

                cookingSuggestionUrl = [];
                $(".urlInput").each(function(){
                    // var getlanguageType = $(this).attr("urlInput");
                    var getValue = $(this).val();
                    buildCookingSuggestUrl = {
                        // languageType : getlanguageType,
                        content : getValue
                    };
                    cookingSuggestionUrl.push(buildCookingSuggestUrl);
                });

                cookingSuggestionRemark = [];
                $(".remarkInput").each(function(){
                    // var getlanguageType = $(this).attr("urlInput");
                    var getValue = $(this).val();
                    buildCookingSuggestRemark = {
                        // languageType : getlanguageType,
                        content : getValue
                    };
                    cookingSuggestionRemark.push(buildCookingSuggestRemark);
                });
                

                // var pvPrice = $("#pvPrice").val().replace(/[^0-9.]/g, '');
                // var packagePrice = $('#packagePrice').val();
                // var promoPrice = $('#promoPrice').val();
                // var packageQuantity = $('#packageQuantity').val().replace(/[^0-9.]/g, '');
                // var productQuantity = $('#productQuantity').val();
                // var activeDate = dateToTimestamp($('#activeDate').val());
                // var catalogue = $('#catalogue').is(':checked') ? "1" : "0";
                // var bBasic = $('#bBasic').is(':checked') ? "1" : "0";
                // var packageCategory = [];
                $('.includecategoryTag').each(function (index, value) {  
                    category.push(value.id);
                });

                /*countryTagArr = [];
                $('.includecountryTag').each(function (index, value) {  
                    countryTagArr.push(value.id);
                });*/

                var priceSetting = [];
                $('.chargesQuantityBox').each(function() {
                    var country = $(this).attr('getCountryID');
                    var retailPrice = $(this).find(".price").val().replace(/[^0-9.]/g, '');
                    var promoPrice = $(this).find(".promoPrice").val().replace(/[^0-9.]/g, '');
                    var memberPrice = $(this).find(".memberPrice").val().replace(/[^0-9.]/g, '');
                    var memberUpPrice = $(this).find(".memberUpPrice").val().replace(/[^0-9.]/g, '');
                    var buildPriceSetting = {
                        country         : country,
                        retailPrice     : retailPrice,
                        promoPrice      : promoPrice,
                        memberPrice     : memberPrice,
                        memberUpPrice   : memberUpPrice
                    };

                    priceSetting.push(buildPriceSetting);
                });

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

                        reqData = {
                            imgName : imgName,
                            imgData : JSON.stringify(imgData),
                            // imgType : imgType,
                            // imgSize : imgSize,
                            // uploadType : imgUploadType
                        };
                        
                        uploadImageData.push(reqData);
                        uploadImage.push(reqData);
                    }
                });

                uploadVideo = [];
                uploadVideoData = [];
                $(".popupEmallVideoWrapper").each(function(i, obj) {
                    var videoData = $(obj).find('[id^="storeVideoData"]').val();
                    var videoName = $(obj).find('[id^="storeVideoName"]').val();
                    var videoType = $(obj).find('[id^="storeVideoType"]').val();
                    var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();
                    var videoSize = $(obj).find('[id^="storeVideoSize"]').val();
                    var videoFileID = $(obj).find('[id^="uploadVideo"]').attr('id');
                    var videoFileName = $(obj).find('[id^="storeVideoName"]').attr('id');

                    if(videoData != "") {
                        uploadVideo.push({
                            videoName: videoName,
                            videoType: videoType,
                            videoFlag: videoFlag,
                            videoSize: videoSize,
                            uploadType:"video"
                        });

                        reqVideoData = {
                            videoData: videoData,
                            videoName: videoName,
                            videoType: videoType,
                            videoSize: videoSize,
                            uploadType: "video"
                        };
                        uploadVideoData.push(reqVideoData);

                        // if(parseFloat(videoSize) / 1048576 > 15) {
                        //     videoSizeFlag = false;
                        // }
                    }
                });

                /*if(!videoSizeFlag || !imgSizeFlag) {
                    if(!imgSizeFlag)
                        $("#imgError").text("Image size exceed 3MB.");

                    if(!videoSizeFlag)
                        $("#videoError").text("Video size exceed 15MB.");
                    

                    return false;
                }*/

                var isVariant = $('#isVariant').is(':checked') ? "1" : "0";
                var attrData = [];
                var variants = '';
                $('.includeAttributeTag').each(function (index, value) {  
                    var input = $(this).parent().attr('id');
                    input = input.replace('attributeVal', '');
                    input = input.replace('List', '');

                    if (!attrData[input]) {
                        attrData[input] = [];
                    }
                    attrData[input].push(value.id);
                    variants = Object.assign({}, attrData);
                });

                var packageData = [];
                var variants = '';
                $('.includePackageTag').each(function (index, value) {  
                    packageProduct.push(value.id);
                });

                // var variants = attrDataCopy;
                // var stockDate = dateToTimestamp($('#stockDate').val());
                // var stockSupplierID = $('#stockSupplierID option:selected').val();
                // var stockSupplierDO = $('#stockSupplierDO').val();
                // var stockSKU = $('#stockSKU').val();
                // var stockQty = $('#stockQty').val().replace(/[^0-9.]/g, '');
                // var stockCost = $('#stockCost').val().replace(/[^0-9.]/g, '');
                // var stockFee = $('#addFee').is(':checked') ? $('#stockFee').val() : "";

                /*var subPackageArr = [];
                $.each($(".productBoxes"), function(k,v){
                    var maxSub = $(v).find(".maxSubInp").val();
                    var minSub = $(v).find(".minSubInp").val();
                    var totalSub = $(v).find(".totalSubInp").val();

                    var paymentArr = [];
                     $.each($(v).find(".paymentBox"), function(k1,v1){
                        var pCreditType = $(v1).find(".pCreditTypeInp").val();
                        var pAmount = $(v1).find(".pAmountInp").val();
                        paymentArr.push({
                            creditType: pCreditType,
                            amount: pAmount
                        });
                     });    

                    var depositArr = [];
                     $.each($(v).find(".depositBox"), function(k2,v2){
                        var dCreditType = $(v2).find(".dCreditTypeInp").val();
                        var dAmount = $(v2).find(".dAmountInp").val();
                        var dUsername = $(v2).find(".dUsernameInp").val();
                        depositArr.push({
                            creditType: dCreditType,
                            amount: dAmount,
                            conpanyAcc: dUsername
                        });
                     });

                    subPackageArr.push({
                        maxSub: maxSub,
                        minSub: minSub,
                        totalSub: totalSub,
                        paymentArr: paymentArr,
                        depositArr : depositArr
                    });
                });*/
                // var fullInstruc = [
                //     fullInstruction, fullInstruction2
                // ];

                // var videoList = [];

                // if(video == '' && video2 == '') {
                //     videoList = [];
                // } else {
                //     videoList = [
                //         video, video2
                //     ];
                // }

                var formData  = {
                    command           : 'verifyAddProductInventory',
                    descriptionArr    : descriptionArr,
                    remarkArray       : remarkArray,
                    productNameArr    : productNameArr,
                    skuCode           : skuCode,
                    publishStatus     : publishStatus,
                    archiveStatus     : archiveStatus,
                    productType       : productType,
                    expired_day       : expiredDay,
                    // description       : description,
                    cost              : cost,
                    salePrice         : salePrice,
                    // cookingTime       : cookingTime,
                    cookingSuggest    : cookingSuggestion,
                    // fullInstruc       : fullInstruc,
                    vendorId          : vendorId,
                    category          : category,
                    video             : video,
                    deliveryMethod    : deliveryMethod,
                    cookingSuggestionName: cookingSuggestionName,
                    cookingSuggestionUrl : cookingSuggestionUrl,
                    cookingSuggestionRemark : cookingSuggestionRemark,
                    // nameLanguages   : nameLanguages,
                    // descrLanguages  : descrLanguages
                    // country         : country,
                    // price           : price,
                    // subPackageArr   : subPackageArr,
                    uploadImage       : uploadImage,
                };
                // if(isPackage == "1") {
                //     formData['isPackage'] = isPackage;
                //     formData['pvPrice'] = pvPrice;
                //     // formData['packagePrice'] = packagePrice;
                //     // formData['promoPrice'] = promoPrice;
                //     formData['packageQuantity'] = packageQuantity;
                //     // formData['productQuantity'] = productQuantity;
                //     // formData['activeDate'] = activeDate;
                //     formData['packageCategory'] = packageCategory;
                //     formData['priceSetting'] = priceSetting;
                //     // formData['country'] = countryTagArr;
                //     formData['packageNameLanguages'] = packageNameLanguages;
                //     formData['packageDescrLanguages'] = packageDescrLanguages;
                //     formData['uploadImage'] = uploadImage;
                //     formData['uploadVideo'] = uploadVideo;
                //     // formData['catalogue'] = catalogue;
                //     formData['bBasic'] = bBasic;
                // }
                if(isVariant == "1") {
                    formData['isVariant'] = isVariant;
                    formData['variants']  = variants;
                    // formData['stockDate'] = stockDate;
                    // formData['stockSupplierID'] = stockSupplierID;
                    // formData['stockSupplierDO'] = stockSupplierDO;
                    // formData['stockSKU'] = stockSKU;
                    // formData['stockQty'] = stockQty;
                    // formData['stockCost'] = stockCost;
                    // formData['stockFee'] = stockFee;
                }

                if(productType == 'Package') {
                    formData['packageProduct'] = packageProduct;
                }

                createdData = formData;
                fCallback = verificationCallback;
                // isPackage=="1" ? fCallback=submitCallback : fCallback=addProductSuccess;
                // fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getProductInventory.php');
            });
        });

        /*function getVideoObj() {
            var uploadData = [];

            $(".popupEmallVideoWrapper").each(function(i, obj) {
                var videoData = $(obj).find('[id^="storeVideoData"]').val();
                var videoName = $(obj).find('[id^="storeVideoName"]').val();
                var videoType = $(obj).find('[id^="storeVideoType"]').val();
                var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();
                var videoFileID = $(obj).find('[id^="uploadVideo"]').attr('id');
                var videoFileName = $(obj).find('[id^="storeVideoName"]').attr('id');

                // videoName = videoName;
                // $('[name=videoName]').val()
                uploadData.push({
                    // videoData: videoData,
                    videoName: videoName,
                    videoType: videoType,
                    videoFlag: videoFlag,
                    uploadType:"video"
                });

                reqData = {
                    imgName: imgName,
                    imgData: imgData,
                    uploadType : imgUploadType
                };
            });

            return uploadData;
        }*/

        function displayVideoName(id, n) {
            var dFileName = $("#videoName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeVideoData"+id).val(reader["result"]);
                    $("#storeVideoName"+id).val(n.files[0]["name"]);
                    // $('[name=videoSize]').val(n.files[0]["size"]);
                    $("#storeVideoSize"+id).val(n.files[0]["size"]);
                    $("#storeVideoType"+id).val(n.files[0]["type"]);
                    $("#storeVideoFlag"+id).val('1');

                    $("#showVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');


                };

                reader.readAsDataURL(n.files[0]);
            }

        }

        function showVideo(n) {
            $("#modalImg").attr('style','display: none');
            $("#modalVideo").attr('style','display: block');
            $("#modalVideo").attr('src', $("#storeVideoData"+n).val());
            $("#showImage").modal();
        }

        // function getVideoURL(n, m){
        //     // var cookingTemplate1 = document.getElementById("cookingTemplate1");
        //     // var cookingTemplate2 = document.getElementById("cookingTemplate2");

        //     // if(cookingTemplate1){
        //     //     var cookingTemplate1 = cookingTemplate1.options[cookingTemplate1.selectedIndex];
        //     //     var templateValue1 = cookingTemplate1.value;
        //     // }
        //     // if(cookingTemplate2){
        //     //     var cookingTemplate2 = cookingTemplate2.options[cookingTemplate2.selectedIndex];
        //     //     var templateValue2 = cookingTemplate2.value;
        //     // }
        //     var ctId = "cookingTemplate" + m; 
        //     var ctValue = $('#'+ctId).find(":selected").val();

        //     var formData = {
        //         command         : 'getVideoURL',
        //         templateValue1  : ctValue,
        //         // templateValue2  : templateValue2,
        //     }
        //     fCallback = displayVideoURL;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "", m);            
        // }
        function getVideoURL(id){
            var cookingTemplate = "#cookingTemplate"+id;
            temp_id = id;
            if(cookingTemplate){
                var templateValue = $(cookingTemplate).val();
            }

            var formData = {
                command         : 'getVideoURL',
                templateValue   : templateValue,
                // type            : 'addVideo',
            }
            fCallback = displayVideoURL;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "");            
        }

        // function displayVideoURL(data, m){ 
        //     $('#cookingURL'+m).val(data.video1);
        // }
        function displayVideoURL(data){
            if(data.video){
                $('#cookingURL'+temp_id).val(data.video);
            }
            if(data.remark){
                $('#cookingRemark'+temp_id).val(data.remark);
            }
            if(data.description){
                $('#fullInstruction'+temp_id).val(data.description);
            }
            if(data.cookingTime){
                $('#cookingTime'+temp_id).val(data.cookingTime);
            }
            if(!data.video){
                $('#cookingURL'+temp_id).val('');
            }
            if(!data.remark){
                $('#cookingRemark'+temp_id).val('');
            }
            if(!data.description){
                $('#fullInstruction'+temp_id).val('');
            }
            if(!data.cookingTime){
                $('#cookingTime'+temp_id).val('');
            }
        }

        function deleteVideo(id) {
            $("#uploadVideo"+id).val("");
            $("#videoName"+id).text('No Video Selected');
            $("#storeVideoData"+id).val("");
            $("#storeVideoName"+id).val("");
            $("#storeVideoSize"+id).val("");
            $("#storeVideoType"+id).val("");
            $("#storeVideoFlag"+id).val("");

            $("#showVideo"+id).hide();
            $("#deleteVideo"+id).hide();
        }

        function loadDefaultListing(data, message) {
            buildOptionLength = 0;

            buildOption = `
                <option value="">Select Cooking Suggestion</option>
            `;
            $.each(data.cookingSuggestList, function(k,v) {
                buildOption += `
                    <option value="${v['name']}">${v['name']}</option>
                `;
                buildOptionLength = buildOptionLength + 1;
            });

            categoryOption = "";
            if(data.categoryList) {
                categoryOption += `
                    <option value="">Select Category</option>
                `
                $.each(data.categoryList, function(k,v){
                    categoryOption += `
                        <option value="${v['id']}">${v['categoryDisplay']}</option>
                    `;
                });
            }

            deliveryMethodOption = "";
            if(data.deliveryMethodList) {
                deliveryMethodOption += `
                    <option value="">Select Delivery Method</option>
                `
                $.each(data.deliveryMethodList, function(k,v){
                    deliveryMethodOption += `
                        <option value="${v['id']}">${v['name']}(RM `+numberThousand(v['price'], 2)+`)</option>
                    `;
                });
            }

            var buildSupplier = "";
            if(data.supplierList) {
                buildSupplier += `
                    <option value="">Select Vendor</option>
                `
                $.each(data.supplierList, function(k, v) {
                    buildSupplier += `
                        <option value="${v['supplierID']}">${v['code']} - ${v['name']}</option>
                    `
                });
                $('#vendorName').append(buildSupplier);
                $('#vendorName').val(vendorId);
                $('#vendorName').trigger('change');
            }

            attributeOption = "";
            if(data.productAttrList) {
                attributeOption += `<option value=""> All </option>`;

                $.each(data.productAttrList, function(k,v){
                    attributeOption += `
                        <option value="${v['id']}">${v['name']}</option>
                    `;
                });
            }

            typeOption = "";
            if(data.productType) {
                typeOption += `<option value=""> All </option>`;

                $.each(data.productType, function(k,v){
                    typeOption += `
                        <option value="${v['name']}">${v['name']}</option>
                    `;
                });
            }

            discountPercentage = data.discountPercentage || 0;
            discountUpPercentage = data.discountUpPercentage || 0;
            var buildListing = "";
            if(data.countryList) {
                $.each(data.countryList, function(k,v) {
                    buildListing += `
                        <div class="col-xs-12 chargesContent" style="margin-top: 20px; font-size: 14px; border-bottom: none;">
                            <div class="row" style="border-bottom: 1px solid #1ca011; margin-bottom: 10px;">
                                <div class="col-sm-2 col-xs-12" style="margin-top: 5px;">
                                    ${v['display']}
                                </div>
                                <div class="col-sm-10 col-xs-12">
                                    <div class="buildChargesQuantityBox">
                                        <div class="chargesQuantityBox" getCountryID="${v['id']}">
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-12">
                                                    Retail Price (${v['currencyCode']}) <input type="text" class="form-control limitNum price retailPriceInput" onkeyup="calcMemberPrice(this, 'retailPrice')">
                                                </div>
                                                <span id="retailPrice${k+1}Error" class="errorSpan text-danger"></span>
                                                <div class="col-sm-3 col-xs-12">
                                                    Promotion Price (${v['currencyCode']}) <input type="text" class="form-control limitNum promoPrice promoPriceInput" onkeyup="calcMemberPrice(this, 'promoPrice')">
                                                </div>
                                                <span id="promoPrice${k+1}Error" class="errorSpan text-danger"></span>
                                                <div class="col-sm-3 col-xs-12">
                                                    Member Price (${discountPercentage}%) (${v['currencyCode']}) <input type="text" class="form-control limitNum memberPrice">
                                                </div>
                                                <div class="col-sm-3 col-xs-12">
                                                    Member Price (${discountUpPercentage}%) (${v['currencyCode']}) <input type="text" class="form-control limitNum memberUpPrice">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#buildListing").html(buildListing);
            }

            // buildCountry = ""; 

            // categoryOption += `
            //     <option value="">Select Country</option>
            // `;
            /*$.each(data.countryList, function(k,v){
                buildCountry += `
                    <option value="${v['id']}">${v['display']}</option>
                `;
            });*/

            // var buildSuggestion = "";
            
            var buildSuggestion = `
                <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes default">
                        <div class="row">
                            <span class="dtxt">Default</span>
                            <div class="col-xs-12">
                                <label>Cooking Suggestion</label>
                                <select id="cookingTemplate${cTNum}" type="text" class="form-control cookingSuggestInput" onchange="getVideoURL(${cTNum})">
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Video Url</label>
                                <input id="cookingURL${cTNum}" type="text" class="form-control urlInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Full Instruction</label>
                                <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="" readonly></input>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Remark(English)</label>
                                <input id="cookingRemark${cTNum}" type="text" class="form-control remarkInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Remark(Chinese)</label>
                                <input id="cookingRemarkChinese${cTNum}" type="text" class="form-control">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Cooking Time</label>
                                <input id="cookingTime${cTNum}" type="text" class="form-control cookingTimeInput" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $("#buildCookingSuggest").append(buildSuggestion);
            totalLoop.push(cTNum);
            cTNum++;

            $("#category").html(categoryOption);
            $('#category').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
            
            $("#deliveryMethod").html(deliveryMethodOption);
            $(".attribute").html(attributeOption);
            $('#productType').html(typeOption);
            // $("#packageCategory").html(packageCategoryOption);
            // $("#country").html(buildCountry);
            $(".addCookingSuggestBtn").show();
            $(".addImgBtn").show();
            $(".addVideoBtn").show();
        }

        function loadAttribute(data, message) {
            var inputId = data.inputId;
            attributeValList.push(data.attributeDetail);

            attributeDetail = "";
            attributeDetail += `<option value=""> All </option>`;

            $.each(data.attributeDetail, function(k,v){
                attributeDetail += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
            });

            $('#'+inputId+' .attributeVal').html(attributeDetail);
        }

        function loadProductSKU(data, message) {
            var skuNumber = data.productSku;
            $('#skuCode').val(skuNumber);
        }

        function loadPackageProduct(data, message) {
            packageProductList = data.productList;
            $('#packageBox').show();

            packageDetail = "";
            packageDetail += `<option value=""> All </option>`;

            if(data.productList) {
                $.each(data.productList, function(k,v){
                    packageDetail += `
                        <option value="${v['id']}">${v['name']}</option>
                    `;
                });
                $('#package').html(packageDetail);
            }
        }

        function addCookingSuggest() {
            var totalLoop = [1];
            addCSCount = addCSCount + 1;
            var buildSuggestion = "";
            buildSuggestion += `
                <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes">
                        <div class="row">
                            <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(addCSCount)})">&times;</a>
                            <div class="col-xs-12">
                                <label>Cooking Suggestion</label>
                                <select id="cookingTemplate${cTNum}" type="text" class="form-control cookingSuggestInput" onchange="getVideoURL(${cTNum})">
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Video Url</label>
                                <input id="cookingURL${cTNum}" type="text" class="form-control urlInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Full Instruction</label>
                                <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="" readonly></input>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Remark(English)</label>
                                <input id="cookingRemark${cTNum}" type="text" class="form-control remarkInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Remark(Chinese)</label>
                                <input id="cookingRemarkChinese${cTNum}" type="text" class="form-control">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Cooking Time</label>
                                <input id="cookingTime${cTNum}" type="text" class="form-control cookingTimeInput" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#buildCookingSuggest").append(buildSuggestion);
            totalLoop.push(cTNum);
            cTNum++;
        }

        function addImage() {
            addImgCount = addImgCount + 1;
            addImgIDNum = addImgIDNum + 1;

            var buildImg = "";

            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileFlag${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                            <!--<span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span>-->
                            <img id="thumbnailImg${addImgIDNum}" style="width:100%;" />
                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}')">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;

            $("#buildImg").append(buildImg);

            /*if (addImgCount == 1) {
                $(".addImgBtn").hide();
            }*/
            
        }

        function addVideo() {
            addVideoCount = addVideoCount + 1;
            addVideoIDNum = addVideoIDNum + 1;

            var buildVideo = "";

            buildVideo += `
                <div class="col-sm-4 col-xs-12">
                    <form style="display:block" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                        <div class="popupEmallVideoWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivVideo(this)">×</a>
                            <input type="hidden" id="storeVideoData${addVideoIDNum}">
                            <input type="hidden" id="storeVideoName${addVideoIDNum}">
                            <input type="hidden" id="storeVideoSize${addVideoIDNum}">
                             <input type="hidden" id="storeVideoType${addVideoIDNum}">
                            <input type="hidden" id="storeVideoFlag${addVideoIDNum}">
                            <input type="file" id="uploadVideo${addVideoIDNum}" class="hided" accept="video/*" style="display:none" onchange="displayVideoName('${addVideoIDNum}', this)">
                            <div>
                                <a href="javascript:;" onclick="$('#uploadVideo${addVideoIDNum}').click();" class="btn btn-primary btnUpload">Upload</a>
                                <span id="videoName${addVideoIDNum}" class="fileName">No Video Uploaded</span>
                                <a id="showVideo${addVideoIDNum}" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showVideo('${addVideoIDNum}')">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a id="deleteVideo${addVideoIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteVideo('${addVideoIDNum}')">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            `;

            $("#buildVideo").append(buildVideo);   

            if (addVideoCount == 1) {
                $(".addVideoBtn").hide();
            }
        }

        function closeDiv(n) {;
            var getThisInd = $('.closeBtn').index($(n));
            selectedLang.splice(getThisInd, 1);
            $(n).parent().parent().parent().remove();
            addCSCount = addCSCount - 1;
            $('.addCookingSuggestBtn').show();
        }

        function closeDivImg(n) {
            addImgCount = addImgCount - 1;
            // $(".addImgBtn").show();
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
        }

        function closeDivVideo(n) {
            addVideoCount = addVideoCount - 1;
            $(".addVideoBtn").show();
            $(n).parent().parent().parent().remove();

            $("#videoTypeError").html("");
            $("#videoError").html("");
        }

        function detectDuplicate(n) {

            var options = $('.cookingSuggestInput');
            var values = $.map(options ,function(option) {
                return $(option).val();
            });

            var getThisInd = $('.cookingSuggestInput').index($(n));
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedLang);

            if(inArr >= 0) {
                $(n).val("");
                alert("This cooking suggestion has been selected.");
                selectedLang.splice(getThisInd, 1);
            }else {
                selectedLang[getThisInd] = thisSelected;
                // $(n).parent().parent().find(".cookingSuggestInput").attr("name", $(n).val());
                $(n).parent().parent().find(".descInput").attr("name", $(n).val());
                $(n).parent().parent().find(".urlInput").attr("name", $(n).val());
            }
        }

        /*function detectDuplicateC(n) {

            var options = $('.countriesInput');
            var values = $.map(options ,function(option) {
                return $(option).val();
            });

            var getThisInd = $('.countriesInput').index($(n));
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedCountry);

            if(inArr >= 0) {
                $(n).val("");
                alert("This country is selected.");
                selectedCountry.splice(getThisInd, 1);
            }else {
                selectedCountry[getThisInd] = thisSelected;
            }
        }*/

        function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text("No File Uploaded");
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileUploadType"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();
            $("#fileNotUploaded"+id).show()
            $("#thumbnailImg"+id).attr('src', "");

        }

        function showImg(n) {
            $("#modalImg").attr('style','display: block');
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#modalVideo").attr('style','display:none');
            $("#showImage").modal();
        }


        function displayFileName(id, n) {
            var dFileName = $("#fileName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeFileData"+id).val(reader["result"]);
                    $("#storeFileName"+id).val(n.files[0]["name"]);
                    $("#storeFileSize"+id).val(n.files[0]["size"]);
                    $("#storeFileType"+id).val(n.files[0]["type"]);
                    $("#storeFileFlag"+id).val('1');

                    if((n.files[0]["type"]).split('/')[0] === 'image'){
                        $("#storeFileUploadType"+id).val('image');
                        uploadFileType = 'image';
                    }else{
                        $("#storeFileUploadType"+id).val('video');
                        uploadFileType = 'video';
                    }

                    // $("#viewImg"+id).attr('data-res', reader["result"]);
                    $("#viewImg"+id).css('display', 'inline-block');
                    $("#deleteImg"+id).css('display', 'inline-block');
                    $("#fileNotUploaded"+id).hide()
                    $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val());

                };

                reader.readAsDataURL(n.files[0]);
            }
        }

    //     function submitCallback(data, message) {
	   //      if(data){
	   //          $('#modalProcessing').modal('show');
	   //      	$.each(data.imgName, function (lang, val) {
	   //      		var reqData2 = new FormData();

				// 	if(val){

		  //           	var imagefiles = reqData['imgData'];//$('#uploadVideo')[0].files[0];
		  //               var block = imagefiles.split(";");
		  //               // Get the content type of the image
		  //               var contentType = block[0].split(":")[1];// In this case "image/gif"
		  //               // get the real base64 content of the file
		  //               var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

		  //               var blob = b64toBlob(realData, contentType);
		                
	   //              	reqData2.append('imageData', blob);
		  //               reqData2.append('image', val);
    //                     reqData2.append('folderName', 'product');

		  //           }

	   //              $.ajax({
		  //               url: 'scripts/reqUploadCDN.php',
		  //               type: 'post',
		  //               data: reqData2,
		  //               contentType: false,
		  //               processData: false,
		  //               async: false,
		  //               success: function(data){
		  //               },
		  //           });
	   //          });

	   //      	$('#modalProcessing').modal('hide');

				// uploadVideoSuccess();
	   //      } else {
    //             showMessage(message, 'success', 'Congratulations!', 'upload', 'getTProductNewListing.php');
    //         }
	   //  }

        function verificationCallback(data, message) {
            showMessage("Confirm Add Product?", 'warning', "Add Product", '', '', ['Confirm']);
            $('#canvasConfirmBtn').click(function() {
                var formData = createdData;
                formData['command'] = 'addProductInventory';
                formData['isPackage']=="1" ? fCallback=submitCallback : fCallback=addProductSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }

        function submitCallback(data, message) {
            // var doFolderName = data.doFolderName;
            // var splitted = doFolderName.split('/');
            // var folderName = splitted[1]+'/';
            
            if(data.packageData.imgName){
                $('#modalProcessing').modal('show');
                 $.each(data.packageData.imgName, function (ind, val) {
                     var reqData2 = new FormData();

                     if(val){

                        if(uploadFileType == 'image') {
                            // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            var imagefiles = uploadImageData[ind]['imgData'];//$('#uploadVideo')[0].files[0];
                            var block = imagefiles.split(";");
                            var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // get the real base64 content of the file
                            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // Convert it to a blob to upload
                            var blob = b64toBlob(realData, contentType);
                            // $('[name=videoName]').val(data.company_video_name);
                             
                            reqData2.append('imageData', blob);
                            // reqData2.append('image', folderName+val);
                            reqData2.append('image', val);
                            reqData2.append('folderName', 'inv');
                        }else{
                            // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            var imagefiles = uploadImageData[ind]['imgData'];//$('#uploadVideo')[0].files[0];
                            var block = imagefiles.split(";");
                            var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // get the real base64 content of the file
                            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // Convert it to a blob to upload
                            var blob = b64toBlob(realData, contentType);
                            // $('[name=videoName]').val(data.company_video_name);
                             
                            reqData2.append('imageData', blob);
                            // reqData2.append('image', folderName+val);
                            reqData2.append('image', val);
                            reqData2.append('folderName', 'inv');
                        }

                     }

                     // for (var pair of reqData2.entries()) {
                     // }

                         $.ajax({
                             url: 'scripts/reqUploadCDN.php',
                             type: 'post',
                             data: reqData2,
                             contentType: false,
                             processData: false,
                             async: false,
                             success: function(data){
                                 // return;
                                 // var json = JSON.parse(data);
                                 // if (json.status == 'ok') {
                                 //     uploadVideoSuccess();
                                 // }
                             },
                         });
                    });

             $('#modalProcessing').modal('hide');
            }


            if(data.packageData.videoName){
                $('#modalProcessing').modal('show');
                 $.each(data.packageData.videoName, function (ind, val) {
                     var reqData2 = new FormData();

                     if(val){
                            // // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            // var imagefiles = reqData['imgData'];//$('#uploadVideo')[0].files[0];
                            // var block = imagefiles.split(";");
                            // var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // // get the real base64 content of the file
                            // var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // // Convert it to a blob to upload
                            // var blob = b64toBlob(realData, contentType);
                            // // $('[name=videoName]').val(data.company_video_name);
                             
                            // reqData2.append('imageData', blob);
                            // reqData2.append('image', val);
                            // reqData2.append('folderName', 'product');


                            var base64Data = uploadVideoData[ind]['videoData'];
                            var block = base64Data.split(";");
                            var contentType = block[0].split(":")[1];
                            var realData = block[1].split(",")[1];
                            var blob = b64toBlob(realData, contentType);

                            reqData2.append('videoData', blob);
                            // reqData2.append('video', folderName+val);
                            reqData2.append('video', val);
                            reqData2.append('folderName', 'inv');

                     }

                     // for (var pair of reqData2.entries()) {
                     // }

                         $.ajax({
                             url: 'scripts/reqUploadCDN.php',
                             type: 'post',
                             data: reqData2,
                             contentType: false,
                             processData: false,
                             async: false,
                             success: function(data){
                                 // return;
                                 // var json = JSON.parse(data);
                                 // if (json.status == 'ok') {
                                 //     uploadVideoSuccess();
                                 // }
                             },
                         });
                    });

             $('#modalProcessing').modal('hide');

             uploadVideoSuccess();
            } else {
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

		function uploadVideoSuccess() {
	        showMessage("Add Product and Package Success.", 'success', 'Congratulations!', 'upload', 'getProductInventory.php');
	    }

        function addProductSuccess() {
            showMessage("Add Product Success.", 'success', 'Congratulations!', 'plus', 'getProductInventory.php');
        }

        $(document).on("input",".limitNum",function() {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);
            this.value = this.value!=''?addCormer(this.value):'';
        });

        function displayTotalStockFee() {
            var stockQty = $('#stockQty').val().replace(/[^0-9.]/g, '');
            var stockCost = $('#stockCost').val().replace(/[^0-9.]/g, '');

            if(stockQty!="" && stockCost!="") {
                var totalStockFee = parseFloat(stockQty) * parseFloat(stockCost);
                $('#totalStockFee').val(numberThousand(totalStockFee, 2));
            } else {
                $('#totalStockFee').val('');
            }
        }

        function calcMemberPrice(n, type) {
            var ind = $('.'+type+'Input').index(n);
            var retailPrice = $('.retailPriceInput').eq(ind).val().replace(/[^0-9.]/g, '');
            var promoPrice = $('.promoPriceInput').eq(ind).val().replace(/[^0-9.]/g, '');

            retailPrice = retailPrice==""?0:parseFloat(retailPrice);
            promoPrice = promoPrice==""?0:parseFloat(promoPrice);

            if(retailPrice>promoPrice) {
                if(promoPrice == 0) {
                    $('.memberPrice').eq(ind).val(numberThousand((parseFloat(retailPrice)*(100-discountPercentage)/100), 2));
                    $('.memberUpPrice').eq(ind).val(numberThousand((parseFloat(retailPrice)*(100-discountUpPercentage)/100), 2));
                } else {
                    $('.memberPrice').eq(ind).val(numberThousand((parseFloat(promoPrice)*(100-discountPercentage)/100), 2));
                    $('.memberUpPrice').eq(ind).val(numberThousand((parseFloat(promoPrice)*(100-discountUpPercentage)/100), 2));
                }
            } else {
                if(retailPrice == 0) {
                    $('.memberPrice').eq(ind).val(numberThousand((parseFloat(promoPrice)*(100-discountPercentage)/100), 2));
                    $('.memberUpPrice').eq(ind).val(numberThousand((parseFloat(promoPrice)*(100-discountUpPercentage)/100), 2));
                } else {
                    $('.memberPrice').eq(ind).val(numberThousand((parseFloat(retailPrice)*(100-discountPercentage)/100), 2));
                    $('.memberUpPrice').eq(ind).val(numberThousand((parseFloat(retailPrice)*(100-discountUpPercentage)/100), 2));
                }
            }
        }

        function toggleAttributeBox() {
            $('#isVariant').prop('checked', !$('#isVariant').prop('checked'));
            $('#isVariant').is(':checked') ? $('#attributeBox').show() : $('#attributeBox').hide();
            // $('.stockIco').toggleClass('fa-minus fa-plus');
        }

        function togglePackageBox() {
            $('#isPackage').prop('checked', !$('#isPackage').prop('checked'));
            $('#isPackage').is(':checked') ? $('#packageBox').show() : $('#packageBox').hide();
            // $('.packageIco').toggleClass('fa-minus fa-plus');
        }

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

        $('#vendorName').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

    </script>
</body>
</html>
