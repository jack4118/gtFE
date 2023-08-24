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
                        <div class="col-md-12 productList-buttonGrp">
                            <div>
                                <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                    <?php echo $translations['A00115'][$language]; /* Back */?>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <div id="unitOnHandBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20 m-r-10" style="display: flex; align-items: center;">
                                    <img src="images/unit-on-hand.png" alt="" height="28px" class="m-r-10">
                                    <div>
                                        <div><span id="unitOnHand">0</span> Unit</div>
                                        <div>on hand</div>
                                    </div>
                                </div>
                                <div id="inOutBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20 m-r-10" style="display: flex; align-items: center;">
                                    <img src="images/in-out.png" alt="" height="28px" class="m-r-10">
                                    <div style="display: flex; justify-content: space-between;">
                                        <div class="m-r-5">
                                            In: <br>
                                            Out:
                                        </div>
                                        <div id="inOutAmt">
                                            0 <br>
                                            0
                                        </div>
                                    </div>
                                </div>
                                <div id="orderBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20" style="display: flex; align-items: center;">
                                    <img src="images/order.png" alt="" height="28px" class="m-r-10">
                                    <div>Order</div>
                                </div>
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
                                                <input id="invProductName" type="text" class="form-control">
                                                <span id="invProductNameErrorEnglish" class="errorSpan text-danger"></span>
                                                <span id="nameError" class="errorSpan text-danger"></span>
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
                                                <input id="productType" type="text" class="form-control" value = 'Product' readonly>
                                                <!-- <label>Product Type</label> -->
                                                <!-- <select id="productType" class="form-control" dataName="productType" dataType="text"> -->
                                                <!-- </select> -->
                                                <!-- <span id="productTypeError" class="errorSpan text-danger"></span> -->
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
                                                <br>
                                                <input type="checkbox" id="foc" name="FOC">
                                                <label for="foc">FOC</label>
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
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Video</label>
                                                <input id="video1" type="text" class="form-control">
                                                <span id="videoError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Video 2</label>
                                                <input id="video2" type="text" class="form-control">
                                                <span id="video2Error" class="errorSpan text-danger"></span>
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

                                    <div class="col-xs-12" style="margin-top: 20px;">
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
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 20px;">
                                        <label>Archive Status</label>
                                        <div id="status" class="m-b-20">
                                            <div class="radio radio-inline">
                                                <input id="activeArhive" type="radio" value="1" name="arhiveStatus" checked="checked"/>
                                                <label for="activeArhive">
                                                    <?php echo $translations['A00056'][$language]; /* Yes */?>
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input id="inActiveArhive" type="radio" value="0" name="arhiveStatus"/>
                                                <label for="inActiveArhive">
                                                    <?php echo $translations['A00057'][$language]; /* No */?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 20px;">
                                        <label>Ignore Stock Count Status</label>
                                        <div id="status" class="m-b-20">
                                            <div class="radio radio-inline">
                                                <input id="stockActive" type="radio" value="1" name="ignoreStatus" checked="checked"/>
                                                <label for="stockActive">
                                                    <?php echo $translations['A00056'][$language]; /* Yes */?>
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input id="stockInActive" type="radio" value="0" name="ignoreStatus"/>
                                                <label for="stockInActive">
                                                    <?php echo $translations['A00057'][$language]; /* No */?>
                                                </label>
                                            </div>
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
                                                        <select id="attributeVal1" class="form-control attributeVal" dataName="attributeVal1" dataType="text">
                                                        </select>
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
                                                        <select id="attributeVal2" class="form-control attributeVal" dataName="attributeVal2" dataType="text">
                                                        </select>
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

    <form action="" method="post" id="redirectForm" target="_blank">

    </form>

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
        var reqData =  new FormData();
        var reqVideoData =  new FormData();
        // var nameLanguages;
        // var descrLanguages;
        var uploadImage;
        // var uploadImageData;
        // var uploadVideo;
        var buildOption;
        var buildOptionLength = 0;
        // var buildCountry;
        var addCSCount = 1;
        var cTNum = 1;
        var totalLoop = [1];
        var addLangCount = 0;
        var addImgCount = 0;
        var addImgIDNum = 0;
        // var uploadFileType = 'image';
        var id = "<?php echo $_POST['id']; ?>";
        var dataURL = "<?php echo $config['tempMediaUrl']; ?>";
        var discountPercentage = 0;

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
        var attributeValList = [];
        var attrIdList = [];
        var videoId = [];
        var varFlag = 0;
        var imageId = [];
        var cookingSuggestionName = [];
        var cookingSuggestionUrl = [];
        var cookingFullInstruction = [];
        var cookingSuggestionRemark = [];
        var cookingSuggest = [];
        var invTranslationList = [];
        var deliveryMethodOption = '';

        var expiredDayInput = document.getElementById('expiredDay');
        var expiredDayError = document.getElementById('expiredDayError');

        var productName;
        var vendorId;
        var skuCode;

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

        $(document).ready(function() {
            // hide product type
            document.getElementById("productType").style.display = "none";

            var formData  = {
                command: 'getProductInventoryDetails',
                productInvId: id
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#cost').on('change', function() {
                var cost = $('#cost').val();

                if(cost){
                    if($(this).val() == '') {
                        $('#costSuggest').hide();
                    } else {
                        var cost = $(this).val();
                        var sale_price = (cost * (100 + discountPercentage)) / 100;

                        $('#costSuggest').text('Suggested sale price is RM ' + numberThousand(sale_price, 2));
                    }
                }

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

            $('.attributeVal').on('change',function(){
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
                var attrID = $(this).attr('id');
                var attr = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${attrID}">${attr}</option>`;
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

            $('#submitBtn').click(function() {
                $('.errorSpan').text('');
                $('#nameErrorEnglish').text('');


                $('[id$="Error"]').text("");

                // var imgSizeFlag = true;
                // var videoSizeFlag = true;

                var productNameArr = [];

                var productNameEnglish = document.getElementById("invProductName").value;
                var productNameChinese = document.getElementById("invProductNameChinese").value;
                var deliveryMethod = document.getElementById("deliveryMethod").value;

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

                var invProductName = $("#invProductName").val();
                var foc = $("#foc").is(":checked") ? 1 : 0;
                var code = $("#skuCode").val();
                // var status = $("input[name=statusRadio]:checked").val()
                var publishStatus = $("input[name=publishStatus]:checked").val();
                var archiveStatus = $("input[name=arhiveStatus]:checked").val();
                var ignoreStatus = $("input[name=ignoreStatus]:checked").val();
                var productType = $("#productType").val();
                var expiredDay = $('#expiredDay').val();
                var description = $('#description').val();
                var cost = $('#cost').val();
                var salePrice = $('#salePrice').val();
                var cookingTime = $('#cookingTime').val();
                // var cookingSuggestion = $('#cookingSuggestion').val();
                // var fullInstruction = $('#fullInstruction').val();
                // var fullInstruction2 = $('#fullInstruction2').val();
                var vendorId = $('#vendorName option:selected').val();
                var video = $('#video1').val();
                var video2 = $('#video2').val();
                var packageProduct = [];

                var category = [];
                $('.includecategoryTag').each(function (index, value) {  
                    category.push(value.id);
                });

                var isVariant = $('#isVariant').is(':checked') ? "1" : "0";
                var attrData = [];
                var variants = '';
                var checkVariant = [];
                $('.includeAttributeTag').each(function (index, value) {  
                    var input = $(this).parent().attr('id');
                    input = input.replace('attributeVal', '');
                    input = input.replace('List', '');

                    if (!attrData[input]) {
                        attrData[input] = [];
                    }
                    attrData[input].push(value.id);
                    checkVariant.push(value.id);
                    variants = Object.assign({}, attrData);
                });

                // check the variant is same or not
                if(JSON.stringify(checkVariant) == JSON.stringify(attrIdList)) {
                    varFlag = 1;
                    variants = [];
                } else {
                    varFlag = 0;
                }

                // var country = $("#country").val();
                // var weight = $("#weight").val().replace(/[^0-9.]/g, '');
                // var productCost = $("#productCost").val();


                // var quantity = $("#quantity").val();
                // uploadVideo = [];
                // $(".popupEmallVideoWrapper").each(function(i, obj) {
                //     var videoData = $(obj).find('[id^="storeVideoData"]').val();
                //     var videoName = $(obj).find('[id^="storeVideoName"]').val();
                //     var videoType = $(obj).find('[id^="storeVideoType"]').val();
                //     var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();
                //     var videoSize = $(obj).find('[id^="storeVideoSize"]').val();
                //     var videoFileID = $(obj).find('[id^="uploadVideo"]').attr('id');
                //     var videoFileName = $(obj).find('[id^="storeVideoName"]').attr('id');
                //     uploadVideo.push({
                //         videoName: videoName,
                //         videoType: videoType,
                //         videoFlag: videoFlag,
                //         videoSize: videoSize,
                //         uploadType:"video"
                //     });

                //     reqVideoData = {
                //         videoData: videoData,
                //         videoName: videoName,
                //         videoType: videoType,
                //         videoFlag: videoFlag,
                //         uploadType: "video"
                //     };

                //     if(parseFloat(videoSize) / 1048576 > 15) {
                //         videoSizeFlag = false;
                //     }
                // });

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

                cookingFullInstruction = [];
                $(".fullInstuctionInput").each(function(){
                    // var getlanguageType = $(this).attr("urlInput");
                    var getValue = $(this).val();
                    buildCookingFullInstruction = {
                        // languageType : getlanguageType,
                        content : getValue
                    };
                    cookingFullInstruction.push(buildCookingFullInstruction);
                });

                cookingSuggestionRemark = [];
                $(".urlRemark").each(function(){
                    // var getlanguageType = $(this).attr("urlInput");
                    var getValue = $(this).val();
                    buildCookingSuggestRemark = {
                        // languageType : getlanguageType,
                        content : getValue
                    };
                    cookingSuggestionRemark.push(buildCookingSuggestRemark);
                });

                uploadImage = [];
                uploadImageData = [];
                $(".popupMemoImageWrapper").each(function() {
                    var imgData = $(this).find('[id^="storeFileData"]').val();
                    var imgName = $(this).find('[id^="storeFileName"]').val();
                    var imgType = $(this).find('[id^="storeFileType"]').val();
                    var imgSize = $(this).find('[id^="storeFileSize"]').val();
                    var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                    var imgID   = $(this).find('[id^="storeFileID"]').val();
                    var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

                    if(typeof(imgID) == 'undefined') {
                        imgID = '';
                    }

                    buildUploadImage = {
                        imgName : imgName,
                        imgType : imgType,
                        imgSize : imgSize,
                        imgFlag : imgFlag,
                        uploadType : imgUploadType
                    };

                    // if(parseFloat(imgSize) / 1048576 > 3) {
                    //     imgSizeFlag = false;
                    // }

                    reqData = {
                        imgID      : imgID,
                        imgName    : imgName,
                        imgData    : JSON.stringify(imgData),
                        uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(reqData);
                });

                /*if(!videoSizeFlag || !imgSizeFlag) {
                    if(!imgSizeFlag)
                        $("#imgError").text("Image size exceed 3MB.");

                    if(!videoSizeFlag)
                        $("#videoError").text("Video size exceed 15MB.");
                    

                    return false;
                }

                $("#imgError").text("");
                $("#videoError").text("");*/
                var packageData = [];
                var variants = '';
                $('.includePackageTag').each(function (index, value) {  
                    packageProduct.push(value.id);
                });

                // var fullInstruc = [
                //     fullInstruction, fullInstruction2
                // ];

                // var videoList = [];

                if(video == '' && video2 == '') {
                    videoList = [];
                } else {
                    videoList = [
                        video, video2
                    ];
                }
                // for (let i = 0; i < cookingSuggest.length; i++) {
                //     const id = cookingSuggest[i].id;
                //     cookingSuggest2.push([{id: id}, i]);
                // }
                var formData  = {
                    command         : 'editProductInventory', 
                    descriptionArr    : descriptionArr,
                    invTranslationList    : invTranslationList,
                    remarkArray       : remarkArray,
                    productNameArr    : productNameArr,
                    productInvId    : id,
                    invProductName  : invProductName,
                    code            : code,
                    foc             : foc,
                    // status          : status,
                    publishStatus   : publishStatus,
                    archiveStatus   : archiveStatus,
                    ignoreStatus    : ignoreStatus,
                    productType     : productType,
                    expired_day     : expiredDay,
                    description     : description,
                    cost            : cost,
                    salePrice       : salePrice,
                    cookingTime     : cookingTime,
                    // cookingSuggest  : cookingSuggestion,
                    // fullInstruc     : fullInstruc,
                    vendorId        : vendorId,
                    category        : category,
                    videoList       : videoList,
                    videoId         : videoId,
                    uploadImage     : uploadImage,
                    imageId         : imageId,
                    deliveryMethod  : deliveryMethod,
                    cookingSuggestionName   : cookingSuggestionName,
                    cookingSuggestionUrl    : cookingSuggestionUrl,
                    cookingSuggestionRemark : cookingSuggestionRemark,
                    cookingFullInstruction : cookingFullInstruction,
                    // cookingSuggest : cookingSuggest,
                    // nameLanguages   : nameLanguages,
                    // descrLanguages  : descrLanguages
                    // country         : [country],
                    // minSub          : minSub,
                    // totalSub        : totalSub,
                    // multipler       : multipler,
                    // price           : price,
                    // lifeCycle       : lifeCycle,
                    // uploadImage     : uploadImage,
                    // status          : status,
                    // distributionStatus : distributionStatus,
                    // updateType      : "product"
                };

                if(isVariant == "1") {
                    formData['isVariant']    = isVariant;
                    formData['variants']     = variants;
                }

                if(productType == 'Package') {
                    formData['packageProduct'] = packageProduct;
                }
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getProductInventory.php');
            });

            $('#unitOnHandBtn').click(function() {
                // $.redirect('stockBatchList.php', {
                //     productId   : id,
                //     productName : productName,
                //     vendorName  : $('#vendorName').find(`option[value=${vendorId}]`).html(),
                //     code        : skuCode,
                // });

                var cfProductId = id;
                var cfProductName = productName;
                var cfVendorName = $('#vendorName').find(`option[value=${vendorId}]`).html();
                var cfSkuCode = skuCode;

                $('#redirectForm').empty().html(`
                    <input type="text" name="productId" value="${cfProductId}">
                    <input type="text" name="productName" value="${cfProductName}">
                    <input type="text" name="vendorName" value="${cfVendorName}">
                    <input type="text" name="code" value="${cfSkuCode}">
                `).attr('action', 'stockBatchList.php').submit();
            });

            $('#inOutBtn').click(function() {
                // $.redirect('stockMovementDetail.php', {
                //     productId   : id,
                //     productName : productName,
                //     vendorName  : $('#vendorName').find(`option[value=${vendorId}]`).html(),
                //     code        : skuCode,
                // });

                var cfProductId = id;
                var cfProductName = productName;
                var cfVendorName = $('#vendorName').find(`option[value=${vendorId}]`).html();
                var cfSkuCode = skuCode;

                $('#redirectForm').empty().html(`
                    <input type="text" name="productId" value="${cfProductId}">
                    <input type="text" name="productName" value="${cfProductName}">
                    <input type="text" name="vendorName" value="${cfVendorName}">
                    <input type="text" name="code" value="${cfSkuCode}">
                `).attr('action', 'stockMovementDetail.php').submit();
            });

            $('#orderBtn').click(function() {
                // $.redirect('newPurchaseRequest.php', {
                //     productId           : id,
                //     vendorId            : vendorId,
                // });

                var cfProductId = id;
                var cfVendorId = vendorId;

                $('#redirectForm').empty().html(`
                    <input type="text" name="productId" value="${cfProductId}">
                    <input type="text" name="vendorId" value="${cfVendorId}">
                `).attr('action', 'newPurchaseRequest.php').submit();
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

        /*function displayVideoName(id, n) {
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
                    // $("#storeVideoFlag"+id).val('1');

                    $("#viewVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');


                };

                reader.readAsDataURL(n.files[0]);
            }

        }*/

        /*function showVideo(n) {
            $("#modalImg").attr('style','display: none');
            $("#modalVideo").attr('style','display: block');
            $("#modalVideo").attr('src', $("#storeVideoData"+n).val());
            $("#showImage").modal();
        }*/

        /*function deleteVideo(id) {
            $("#videoUpload"+id).val("");
            $("#videoName"+id).text('No Video Selected');
            $("#storeVideoData"+id).val("");
            $("#storeVideoName"+id).val("");
            $("#storeVideoSize"+id).val("");
            $("#storeVideoType"+id).val("");
            $("#storeVideoFlag"+id).val("");

            $("#viewVideo"+id).hide();
            $("#deleteVideo"+id).hide();
        }*/

        // function calcAmount(){
        //     var price = $("#price").val();
        //     price = price==""?0:parseFloat(price);
        //     var rate = $("#rate").val();
        //     rate = rate==""?0:parseFloat(rate);
        //     var calcPv = (price/rate).toFixed(1);

        //     var getDecimal = parseInt(calcPv.toString().split('.')[1]);

        //     if(getDecimal > 2 && getDecimal < 5) {
        //         calcPv = parseFloat((price/rate).toFixed(0)) + 1;
        //     }else{
        //         calcPv = (price/rate).toFixed(0);
        //     }

        //     $("#productPV").val(calcPv);
        // }

        function loadDefaultListing(data, message) {
            $('#unitOnHand').html(data.stockOnHand);
            $('#inOutAmt').html(`${data.stockInOutAmt.stockInCount}<br>${data.stockInOutAmt.stockOutCount}`);
            $("#foc").prop("checked", data.focDetail == 1);
            cookingSuggest = data.cookingDetail;
            productName = data.productDetails.name;
            $("#invProductName").val(productName);
            skuCode = data.productDetails.skuCode;
            $("#skuCode").val(skuCode);
            // $('input[name=statusRadio]').filter('[value='+data.productDetails.status+']').prop('checked', true);
            $('input[name=publishStatus]').filter('[value='+data.productDetails.is_published+']').prop('checked', true);
            $('input[name=arhiveStatus]').filter('[value='+data.productDetails.is_archive+']').prop('checked', true);
            $('input[name=ignoreStatus]').filter('[value='+data.productDetails.ignore_stock_count+']').prop('checked', true);
            $("#weight").val(data.productDetails.weight);
            $('#expiredDay').val(data.productDetails.expired_day);
            $('#description').val(data.productDetails.description);
            $('#cost').val(numberThousand(data.productDetails.cost,2));
            $('#salePrice').val(numberThousand(data.productDetails.sale_price, 2));
            $('#cookingTime').val(data.productDetails.cooking_time);
            $('#cookingSuggestion').val(data.productDetails.suggestionName);

            var productNameEnglish = "";
            var productNameChinese = "";
            var descEnglish = "";
            var descChinese = "";
            invTranslationList = data.invTranslationList;

            if(data.invTranslationList.product){
                for (var i = 0; i < data.invTranslationList.product.length; i++) {
                    if (data.invTranslationList.product[i].type === "name" && data.invTranslationList.product[i].language === "english") {
                        productNameEnglish = data.invTranslationList.product[i].content;
                    }
                    else if (data.invTranslationList.product[i].type === "name" && data.invTranslationList.product[i].language === "chinese") {
                        productNameChinese = data.invTranslationList.product[i].content;
                    }
                    else if (data.invTranslationList.product[i].type === "description" && data.invTranslationList.product[i].language === "english") {
                        descEnglish = data.invTranslationList.product[i].content;
                    }
                    else if (data.invTranslationList.product[i].type === "description" && data.invTranslationList.product[i].language === "chinese") {
                        descChinese = data.invTranslationList.product[i].content;
                    }
                }
            }
           

            // $('#invProductName').val(productNameEnglish);
            $('#invProductNameChinese').val(productNameChinese);
            // $('#description').val(descEnglish);
            $('#descriptionChinese').val(descChinese);

            discountPercentage = data.discountPercentage || 0;

            buildOptionLength = 0;

            buildOption = `
                <option value="">Select Cooking Suggestion</option>
            `;
            if(data.cookingSuggestList){
                $.each(data.cookingSuggestList, function(k,v) {
                buildOption += `
                    <option value="${v['name']}">${v['name']}</option>
                `;
                buildOptionLength = buildOptionLength + 1;
            });
            }

            deliveryMethodOption = "";
            if(data.deliveryMethodList) {
                deliveryMethodOption += `
                    <option value="">Select Delivery Method</option>
                `
                $.each(data.deliveryMethodList, function(k,v){
                    deliveryMethodOption += `
                        <option value="${v['id']}">${v['name']}</option>
                    `;
                });
            }
            $("#deliveryMethod").html(deliveryMethodOption);
            $("#deliveryMethod").val(data.productDetails.delivery_method);
            

            categoryOption = "";
            if(data.categoryList) {
                categoryOption += `
                    <option value="">Select Category</option>
                `
                $.each(data.categoryList, function(k,v) {
                    categoryOption += `
                        <option value="${v['id']}" name="${v['name']}">${v['categoryDisplay']}</option>
                    `;
                });
                $("#category").html(categoryOption);

                if(data.productCategory) {
                    $.each(data.productCategory, function(k,v) {
                        var categoryID = v['id'];
                        var category = v['name'];
                        var categoryDiv = `
                            <div id="${categoryID}" data-select="category" class="categoryTag includecategoryTag" style="">${category} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                        `;

                        $("#addCategoryList").append(categoryDiv);
                        $('#category').find(`option[value=${categoryID}]`).remove();
                    });
                }
            }
            $('#category').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
            
            if(data.cookingDescription){
                // fullInstruction
                // $('#expiredDay').val(data.productDetails.expired_day);

                if(data.cookingDescription[0]){
                    $('#fullInstruction').val(data.cookingDescription[0]);
                }
                if(data.cookingDescription[1]){
                    $('#fullInstruction2').val(data.cookingDescription[1]);
                }

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
            }
            vendorId = data.productDetails.vendor_id;
            $('#vendorName').val(vendorId); 

            $('#vendorName').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            if(data.attrIdList) {
                toggleAttributeBox();

                if(data.productAttrList) {
                    attributeOption = "";
                    attributeOption += `<option value=""> All </option>`;

                    $.each(data.productAttrList, function(k,v){
                        attributeOption += `
                            <option value="${v['id']}">${v['name']}</option>
                        `;
                    });
                    $(".attribute").html(attributeOption);
                }

                $.each(data.attrIdList, function(key,val) {
                    var attId = val['pa_id'];
                    var input = '';
                    input = 'attributeVal'+(key+1);
                    
                    $('#attribute'+(key+1)).val(attId);

                    if(data.attribute) {
                        attributeDetail = "";
                        attributeDetail += `<option value=""> All </option>`;

                        $.each(data.attribute, function(key1,val1){
                            if(attId == val1['product_attribute_id']) {
                                attributeDetail += `
                                    <option value="${val1['id']}">${val1['name']}</option>
                                `;
                            }
                            $('#'+input+'').html(attributeDetail);
                        });
    
                        $.each(val['id'], function(k,v) {
                            attrIdList.push(v.toString());
                            var attrDiv = `
                                <div id="${v}" data-select="${input}" class="attributeTag includeAttributeTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">${val['name'][k]} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                            `;
                            $('#'+input+'List').append(attrDiv);
    
                            input = 'attributeVal'+(key+1);
                            var select = document.getElementById(input);
                            var options = select.options;
    
                            for (var i = 0; i < options.length; i++) {
                                if (options[i].value == v) {
                                    select.removeChild(options[i]);
                                    break;
                                }
                            }
                        });
                    }
                });
            } else {
                attributeOption = "";
                if(data.productAttrList) {
                    attributeOption += `<option value=""> All </option>`;

                    $.each(data.productAttrList, function(k,v){
                        attributeOption += `
                            <option value="${v['id']}">${v['name']}</option>
                        `;
                    });
                }
                $(".attribute").html(attributeOption);
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
            $('#productType').html(typeOption);
            $("#productType").val(data.productDetails.product_type);

            if(data.packageProduct) {
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

                $.each(data.packageProduct, function(k,v) {
                    var packageID = v['product_id'];
                    var package = v['name'];
                    var packageDiv = `
                        <div id="${packageID}" data-select="package" class="packageTag includePackageTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">${package} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#packageList").append(packageDiv);
                    $('#package').find(`option[value=${packageID}]`).remove();
                });
            }

            // buildCountry = ""; 

            // categoryOption += `
            //     <option value="">Select Category</option>
            // `;
            /*$.each(data.countryList, function(k,v){
                buildCountry += `
                    <option value="${v['id']}">${v['display']}</option>
                `;
            });*/

            // $("#firstLanguage").html(buildOption);
            // $("#category").html(categoryOption);
            // $("#country").html(buildCountry);
            // $(".addLanguageBtn").show();
            $(".addCookingSuggestBtn").show();
            $(".addImgBtn").show();

            //new API by Marcus
            if(data.cookingDetail){
                addCookingSuggest(data.cookingDetail);
            }
            
            // if(data.cookingDetail.suggestionName2){
            //     var suggestionName2 = data.cookingDetail.suggestionName2;
            //     var suggestionUrl2 = data.produccookingDetailtDetails.suggestionUrl2;
            //     addCookingSuggest(suggestionName2,suggestionUrl2);

            // }

            var buildLanguage = "";
            $.each(data.nameTranslationList, function(k,v){

                if(v['language'] != "") {
                    buildLanguage += `
                        <div class="col-sm-4 col-xs-12" style="margin-top: 20px;">
                            <div class="col-xs-12 productBoxes">
                                <div class="row">
                    `;

                    if (k != 0) {
                       buildLanguage += `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">×</a>`; 
                    }
                    

                    buildLanguage += `
                                    <div class="col-xs-12">
                                        <label>Language</label>
                                        <select type="text" class="form-control productLanguagesInput" onchange="detectDuplicate(this)" languagetype="${v['language']}">
                                            ${buildOption}
                                        <select>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control productNameInput" languagetype="${v['language']}">
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <label>Description</label>
                                        <input type="text" class="form-control descInput" languagetype="${v['language']}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;  
                    addLangCount = addLangCount + 1;
                }
                
            });
            $("#buildLanguage").append(buildLanguage);

            $(".productLanguagesInput").each(function(){
                var thisLang = $(this).attr("languagetype");
                $(this).val(thisLang);
                detectDuplicate(this);
            });

            $(".productNameInput").each(function(){
                var thisLang = $(this).attr("languagetype");
                var getArr = (data.nameTranslationList).filter((item) => item.language == thisLang);
                getArr = getArr[0];
                $(this).val(getArr.content);
            });

            $(".descInput").each(function(){
                var thisLang = $(this).attr("languagetype");
                var getArr = (data.descTranslationList).filter((item) => item.language == thisLang);
                getArr = getArr[0];
                $(this).val(getArr.content);
            });

            if(data.productDetails.media != '') {
                $.each(data.productDetails.media, function(k,v) {
                    if(v['type'] == 'video') {
                        videoId.push(v['id']);
    
                        $('#video'+(k+1)).val(v['url']);
                    } else if(v['type'] == 'Image') {
                        addImgCount = addImgCount + 1;
                        addImgIDNum = addImgIDNum + 1;
            
                        var buildImg = "";
            
                        buildImg += `
                            <div class="col-sm-4 col-xs-12">
                                <div class="popupMemoImageWrapper" imageFlag="0">
                        `;
            
                        buildImg +=`
                                    <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                                    <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                                    <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                    <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                                    <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                                    <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                    <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                    <div>
                                        <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                                        <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                                        <!-- <span id="fileName${addImgIDNum}" class="fileName">
                                            ${v.name}
                                        </span> -->
                                        <img id="thumbnailImg${addImgIDNum}" src="${v.url}" style="width:100%;" />
                                        <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="padding: 6px;" onclick="showImg('${addImgIDNum}')">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
            
                        $("#buildImg").append(buildImg);
                        $(`#fileNotUploaded${addImgIDNum}`).hide();
                    }
                });
            }
        }

        //new API by Marcus
        function addCookingSuggest(cookingDetails) {
            var buildCooking = "";
            if (cookingDetails){
            for (var i = 0; i < cookingDetails.length; i++) {
                var suggestionName = cookingDetails[i].name;
                var suggestionUrl = cookingDetails[i].url;
                var description = cookingDetails[i].description;
                var cookingTime = cookingDetails[i].cooking_time;
                var suggestionRemark = "";
                var suggestionRemarkChinese = "";

                if (cookingDetails[i].language) {
                    for (var j = 0; j < cookingDetails[i].language.length; j++) {
                        var language = cookingDetails[i].language[j];

                        if (language.type === 'remark' && language.language === 'english') {
                            suggestionRemark = language.content;
                        } else 
                        if (language.type === 'remark' && language.language === 'chinese') {
                            suggestionRemarkChinese = language.content;
                        }
                    }
                }

                var buildSuggestion = `
                <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes default">
                    <div class="row">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(addCSCount)})">&times;</a>
                        <div class="col-xs-12">
                            <label>Template Name</label>
                            <select id="cookingTemplate${cTNum}" type="text" class="form-control cookingSuggestInput" selected="${suggestionName}" onchange="getVideoURL(${cTNum})">
                                 ${buildOption}
                            </select>
                        </div>
                        <div class="col-xs-12" style="margin-top: 10px">
                            <label>Video Url</label>
                            <input id="cookingURL${cTNum}" type="text" class="form-control urlInput" value="${suggestionUrl}"></input>
                        </div>
                        <div class="col-xs-12" style="margin-top: 10px">
                            <label>Cooking Instruction</label>
                            <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="${description}" readonly></input>
                        </div>
                        <div class="col-xs-12" style="margin-top: 10px">
                            <label>Remark(English)</label>
                            <input id="cookingRemark${cTNum}" type="text" class="form-control urlRemark" value="${suggestionRemark}"></input>
                        </div>
                        <div class="col-xs-12" style="margin-top: 10px">
                            <label>Remark(Chinese)</label>
                            <input id="cookingRemarkChinese${cTNum}" type="text" class="form-control" value="${suggestionRemarkChinese}"></input>
                        </div>
                        <div class="col-xs-12" style="margin-top: 10px">
                            <label>Cooking Time</label>
                            <input id="cookingTime${cTNum}" type="text" class="form-control urlCookingTime" value="${cookingTime}" disabled></input>
                        </div>
                    </div>
                    </div>
                </div>
                `;
                buildCooking += buildSuggestion;
                $("#buildCookingSuggest").html(buildCooking);
                cTNum++;
            }
            }else if (typeof cookingDetails === 'undefined'){
                var totalLoop = [1];
                addCSCount = addCSCount + 1;
                var buildSuggestion = "";
                buildSuggestion += `
                    <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                        <div class="col-xs-12 productBoxes">
                            <div class="row">
                                <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(addCSCount)})">&times;</a>
                                <div class="col-xs-12">
                                    <label>Template name</label>
                                    <select id="cookingTemplate${cTNum}" type="text" class="form-control cookingSuggestInput" onchange="getVideoURL(${cTNum})">
                                        ${buildOption}
                                    <select>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <label>Video Url</label>
                                    <input id="cookingURL${cTNum}" type="text" class="form-control urlInput">
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <label>Cooking Instruction</label>
                                    <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstuctionInput" readonly>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <label>Remark(English)</label>
                                    <input id="cookingRemark${cTNum}" type="text" class="form-control urlRemark" value=""></input>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <label>Remark(Chinese)</label>
                                    <input id="cookingRemarkChinese${cTNum}" type="text" class="form-control" value=""></input>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <label>Cooking Time</label>
                                    <input id="cookingTime${cTNum}" type="text" class="form-control urlCookingTime" disabled></input>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $("#buildCookingSuggest").append(buildSuggestion);
                totalLoop.push(cTNum);
                cTNum++;
            }

            // select the suggestion options by default
            var selectElements = document.getElementsByClassName("cookingSuggestInput");
            for (var i = 0; i < selectElements.length; i++) {
                var selectElement = selectElements[i];
                var suggestionName = cookingDetails[i].name;
                for (var j = 0; j < selectElement.options.length; j++) {
                var option = selectElement.options[j];
                if (option.value === suggestionName) {
                    option.selected = true;
                    break;
                }
                }
            }
        }





        function addLanguage() {
            addLangCount = addLangCount + 1;
            var buildLanguage = "";

            buildLanguage += `
                <div class="col-sm-4 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes">
                        <div class="row">
                            <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">×</a>
                            <div class="col-xs-12">
                                <label>Language</label>
                                <select type="text" class="form-control productLanguagesInput" onchange="detectDuplicate(this)">
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Name</label>
                                <input type="text" class="form-control productNameInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Description</label>
                                <input type="text" class="form-control descInput">
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#buildLanguage").append(buildLanguage);

            if (addLangCount == buildOptionLength) {
                $(".addLanguageBtn").hide();
            }
        }

        function getVideoURL(id){
            var cookingTemplate = "#cookingTemplate"+id;
            temp_id = id;
            if(cookingTemplate){
                var templateValue = $(cookingTemplate).val();
            }
            var formData = {
                command         : 'getVideoURL',
                templateValue  : templateValue,
            }

            fCallback = displayVideoURL;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, "", "");            
        }

        function loadProductSKU(data, message) 
        {
            var skuNumber = data.productSku;
            $('#skuCode').val(skuNumber);
        }

        function displayVideoURL(data){
            if(data.video){
                $('#cookingURL'+temp_id).val(data.video);
            }
            // if(data.remark){
            //     $('#cookingRemark'+temp_id).val(data.remark);
            // }
            if(data.description){
                $('#fullInstruction'+temp_id).val(data.description);
            }
            if(data.cookingTime){
                $('#cookingTime'+temp_id).val(data.cookingTime);
            }
            if(!data.video){
                $('#cookingURL'+temp_id).val('');
            }
            // if(!data.remark){
            //     $('#cookingRemark'+temp_id).val('');
            // }
            if(!data.description){
                $('#fullInstruction'+temp_id).val('');
            }
            if(!data.cookingTime){
                $('#cookingTime'+temp_id).val('');
            }
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
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                            <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
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
        }

        function closeDiv(n) {
            var getThisInd = $('.closeBtn').index($(n));
            selectedLang.splice(getThisInd, 1);
            $(n).parent().parent().parent().remove();
            addCSCount = addCSCount - 1;
            $('.addCookingSuggestBtn').show();
        }

        function closeDivImg(n) {
            addImgCount = addImgCount - 1;

            var img = $(n).parent().find('[id^="storeFileID"]').val();

            if(typeof(img) != 'undefined') {
                imageId.push(img);
            }
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
        }

        function detectDuplicate(n) {

            var options = $('.productLanguagesInput');
            var values = $.map(options ,function(option) {
                return $(option).val();
            });

            var getThisInd = $('.productLanguagesInput').index($(n));
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedLang);

            if(thisSelected != "" && inArr >= 0) {
                $(n).val("");
                alert("This language is selected.");
                selectedLang.splice(getThisInd, 1);
            }else {
                selectedLang[getThisInd] = thisSelected;
                $(n).parent().parent().find(".productNameInput").attr("languageType", $(n).val());
                $(n).parent().parent().find(".descInput").attr("languageType", $(n).val());
            }
        }

        function toggleAttributeBox() {
            $('#isVariant').prop('checked', !$('#isVariant').prop('checked'));
            $('#isVariant').is(':checked') ? $('#attributeBox').show() : $('#attributeBox').hide();
        }

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
            var imageSrc = $("#storeFileData"+n).val();
            $("#modalImg").attr('src', imageSrc);
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
    //             showMessage(message, 'success', 'Congratulations!', 'upload', 'getTProductListing.php');
    //         }
	   //  }

        function submitCallback(data, message) {
            /*if(data.imageName){
                $('#modalProcessing').modal('show');
                 $.each(data.imageName, function (ind, val) {
                     var reqData2 = new FormData();

                     var imagefiles = uploadImageData[ind]['imgData'];//$('#uploadVideo')[0].files[0];
                     var block = imagefiles.split(";");
                     var contentType = block[0].split(":")[1];// In this case "image/gif"
                     // get the real base64 content of the file
                     var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                     // // Convert it to a blob to upload
                     var blob = b64toBlob(realData, contentType);
                     // $('[name=videoName]').val(data.company_video_name);
                      
                     reqData2.append('imageData', blob);
                     reqData2.append('image', val);
                     reqData2.append('folderName', 'product');

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

                                 // var json = JSON.parse(data);
                             },
                         });
                    });

             $('#modalProcessing').modal('hide');
            }


            if(data.videoName){
                $('#modalProcessing').modal('show');
                 $.each(data.videoName, function (lang, val) {
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


                            var base64Data = reqVideoData['videoData'];
                            var block = base64Data.split(";");
                            var contentType = block[0].split(":")[1];
                            var realData = block[1].split(",")[1];
                            var blob = b64toBlob(realData, contentType);

                            reqData2.append('videoData', blob);
                            reqData2.append('video', val);
                            reqData2.append('folderName', 'product');

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
            }*/
            showMessage(message, 'success', 'Congratulations', 'edit', 'getProductInventory.php');
        }

		/*function b64toBlob(b64Data, contentType, sliceSize) {
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
	    }*/

		/*function uploadVideoSuccess() {
	        showMessage("Edit Package Success.", 'success', 'Congratulations!', 'upload', 'getProductInventory.php');
	    }*/

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

        // $('#vendorName').select2({
        //     dropdownAutoWidth: true,
        //     templateResult: newFormatState,
        //     templateSelection: newFormatState,
        // });

        // $('#category').select2({
        //     dropdownAutoWidth: true,
        //     templateResult: newFormatState,
        //     templateSelection: newFormatState,
        // });

    </script>
</body>
</html>
