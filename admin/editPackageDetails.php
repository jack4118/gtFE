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
                                        Package Details
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Package Name (English)</label>
                                                <input id="invPackageName" type="text" class="form-control">
                                                <span id="nameError" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Package Name (Chinese)</label>
                                                <input id="invPackageNameChinese" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Vendor Name</label>
                                                <select id="vendorId" class="form-control" dataName="vendorId" dataType="text">
                                                    <option value="">All</option>
                                                </select>
                                                <span id="vendorIdError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>SKU Code</label>
                                                <input id="skuCode" type="text" class="form-control" disabled>
                                                <span id="skuCodeError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px;"> -->
                                                <!-- <label>Product Type</label> -->
                                                <!-- <select id="productType" class="form-control" dataName="productType" dataType="text"> -->
                                                    <!-- <option value="Package">Package</option> -->
                                                <!-- </select> -->
                                                <!-- <span id="productTypeError" class="errorSpan text-danger"></span> -->
                                            <!-- </div> -->
                                            <input id="productType" type="text" class="form-control" value = 'Product' readonly>
                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Expired Day</label>
                                                <input id="expiredDay" type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span id="expiredDayError" class="errorSpan text-danger"></span>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Category</label>
                                                <select id="category" class="form-control category" dataName="category" dataType="text">
                                                    <option value="">All</option>
                                                </select>
                                                <span id="categoryError" class="errorSpan text-danger"></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addCategoryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Delivery Method</label>
                                                <select id="deliveryMethod" class="form-control category" dataName="deliveryMethod" dataType="text">
                                                </select>
                                                <span id="deliveryMethodError" class="errorSpan text-danger"></span>
                                                <input type="checkbox" id="foc" name="FOC" >
                                                <label for="foc">FOC</label>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Sale Price</label>
                                                <input id="salePrice" type="number" class="form-control">
                                                <span id="costSuggest" class="errorSpan"></span>
                                                <span id="salePriceError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Description (English)</label>
                                                <textarea id="description" class="form-control" rows="4" cols="50"></textarea>
                                                <span id="descriptionError" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Description (Chinese)</label>
                                                <textarea id="descriptionChinese" class="form-control" rows="4" cols="50"></textarea>
                                            </div>

                                            
                                            <!-- New Cooking Suggestion plugin -->
                                            <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                                <label>Cooking Suggestions</label>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div id="buildCookingSuggest"></div>
                                                    <div class="col-md-4 addCookingSuggestBtn">
                                                        <div class="addLanguageImage" onclick="addCookingSuggest()">
                                                            <b><i class="fa fa-plus-circle"></i></b>
                                                            <span>Add Another Cooking Suggestion</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- New Cooking Suggestion plugin end here -->
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                                Package Image (Recommended Size: 600 x 310 px)
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div id="buildImg">
                                                    </div>

                                                    <!-- <div class="col-sm-4 col-xs-12">
                                                        <div class="popupMemoImageWrapper">
                                                            <input type="hidden" id="storeFileData">
                                                            <input type="hidden" id="storeFileName">
                                                            <input type="hidden" id="storeFileType">
                                                            <input type="hidden" id="storeFileFlag">
                                                            <input type="hidden" id="storeFileSize">
                                                            <input type="hidden" id="storeFileUploadType">
                                                            <input type="file" id="fileUpload" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName(this)">

                                                            <div>
                                                                <a href="javascript:;" onclick="$('#fileUpload').click()" class="btn btn-primary btnUpload">Upload</a>
                                                                <span id="fileName" class="fileName">No Image Uploaded</span>
                                                                <a id="viewImg" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg()">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-4 addImgBtn">
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

                                    <!-- <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-6" style="margin-top: 20px;">
                                                <label>Status</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                    <div class="radio radio-inline">
                                                        <input id="active" type="radio" value="Active" name="statusRadio" checked="checked"/>
                                                        <label for="active">
                                                            <?php echo $translations['A00372'][$language]; /* Active */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input id="inActive" type="radio" value="Inactive" name="statusRadio"/>
                                                        <label for="inActive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                        <div class="row">
                                            <div class="col-xs-12" style="border: 1px solid #ff9804; background-color: #fff0db; padding: 10px;">
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
                                    </div> -->

                                    <div id="packageBox" class="col-xs-12 m-t-20">
                                        <div class="row m-0">
                                            <div class="col-xs-12" style="border: 1px solid #ff9804; background-color: #fff0db; padding: 20px;">
                                                <div class="col-xs-12">
                                                    <div class="col-xs-6" style="margin-top: 20px">
                                                        <div class="form-group">
                                                            <label>Package Product</label>
                                                            <select id="package" type="text" class="package form-control">
                                                                <option value="">All</option>
                                                            </select>
                                                            <span id="packageError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6" style="margin-top: 20px; align-self: end; text-align: right;">
                                                        <label>Mystery Food</label>
                                                        <div><button class="btn btn-primary" id="mystery">Add Mystery Food</button></div>
                                                        <span id="mysteryError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="" style="background-color: transparent; padding: 0px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px; display: flex; justify-content: space-between; align-items: center; font-weight: bold;">
                                                            <div style="width: calc(100% - 320px);">Product Name</div>
                                                            <div style="display: flex; align-items: center; width: 320px;">
                                                                <div style="width: calc(50% - 24px); text-align: center;">Quantity</div>
                                                                <div style="width: calc(50% + 24px); text-align: center;">Price</div>
                                                                <div style="width: calc(50% + 24px); text-align: center;">Total Cost</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="packageList" style="margin-top: 10px; border: 1px solid #ddd; height: 200px; overflow: auto; background: white;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12" style="margin-top: 20px">
                                                <label>Package Cost</label>
                                                <input id="package_cost" type="number" class="form-control" readonly>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4 col-xs-12" style="margin-top: 20px">
                                                <label>Sale Price</label>
                                                <input id="salePrice" type="number" class="form-control">
                                                <span id="costSuggest" class="errorSpan" style="color: red;"></span>
                                                <span id="salePriceError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Publish Status</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-inline">
                                                        <input id="active" type="radio" value="1" name="publishStatus"/>
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
                                                        <input id="activeArhive" type="radio" value="1" name="archiveStatus"/>
                                                        <label for="activeArhive">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input id="inActiveArhive" type="radio" value="0" name="archiveStatus"/>
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
                        Package Image
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
var fCallback       = '';

var addImgCount     = 0;
var addImgIDNum     = 0;
var products        = [];
var uploadImage;
var uploadImageData;
var cookingSuggest = [];
var buildOption;
var buildOptionLength = 0;
var addCSCount = 1;
var cTNum = 1;
var totalLoop = [1];
var invTranslationList = [];
var cookingSuggestionName = [];
var cookingSuggestionUrl = [];
var cookingFullInstruction = [];
var cookingSuggestionRemark = [];
var cookingSuggest = [];
var selectedLang = [];
var count = [];
var newProductList = [];

var goCalc = false;
var discountPercentage = 0;
var sale_price_total;
var counter = 1;





$(document).ready(function() {
    getPackageDetail();

    var formData  = {
        command: 'getProductInventoryDetails'
    };
    fCallback = assignDiscountPercentage;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    // hide product type
    document.getElementById("productType").style.display = "none";

    $('#category').change(function(){
        var categoryID = $(this).find("option:selected").val();
        var category = $(this).find("option:selected").text();

        if(categoryID != "") {
            var categoryDiv = `
            <div id="${categoryID}" data-select="category" class="categoryTag includecategoryTag" style="display: flex; justify-content: space-between; align-items: center;">${category} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
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

    $('#package').change(function(){
        var packageID   = $(this).find("option:selected").val();
        var package     = $(this).find("option:selected").text();
        var input       = $(this).attr('id');
        var quantity    = $(this).attr('data-value') || 1;
        var sale_price  = $(this).attr('data-price');
        var total_cost  = $(this).attr('data-cost');

        let = newProductList;
        if(sale_price==0){
            $.each(newProductList, function(k, v) { 
                if(v['id'] == packageID) {
                    sale_price = v['cost'];
                }
            })
        }
        
        
        if(packageID != "") {
            

            if(packageID != 'mystery') {
                    var packDiv = `
                        <div id="${packageID}" data-select="${input}" class=" includePackageTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <div style="width: calc(100% - 320px);">${package}</div>
                            <div style="display: flex; align-items: center; width: 300px;">
                                <input id="quantity${packageID}" onchange="checknumber(${packageID})" type="number" class="form-control" name="quantity" value="${quantity}" size="7" placeholder="Quantity" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID}')">
                                <input id="sale_price${packageID}" type="number" class="form-control" name="sale_price" value="${sale_price}" size="7" placeholder="Price" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID}')" readonly>
                                <input id="total_cost${packageID}" type="number" class="form-control total_cost" value="${sale_price}" name="total_cost" value="" size="7" placeholder="Cost" onclick="event.stopPropagation(); event.preventDefault();" style="cursor: not-allowed;" readonly>
                                <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px; cursor: pointer;" onclick="deleteRecalc(${packageID})"></i>
                            </div>
                        </div>
                    `;
                }else {

                    var packDiv = `
                    <div id="${packageID+counter}" data-select="${input}" class=" includePackageTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px; display: flex; justify-content: space-between; align-items: center;">
                        <div style="width: calc(100% - 320px);">${package}</div>
                        <div style="display: flex; align-items: center; width: 300px;">
                            <input id="quantity${packageID+counter}" onchange="checknumber(String('`+packageID+counter+`'))" type="number" class="form-control" name="quantity" value="${quantity}" size="7" placeholder="Quantity" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID+counter}')">
                            <input id="sale_price${packageID+counter}" type="number" class="form-control" name="sale_price" value="${sale_price}" size="7" placeholder="Price" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID+counter}')" readonly>
                            <input id="total_cost${packageID+counter}" type="number" class="form-control total_cost" value="${sale_price*quantity}" name="total_cost" value="" size="7" placeholder="Cost" onclick="event.stopPropagation(); event.preventDefault();" style="cursor: not-allowed;" readonly>
                            <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px; cursor: pointer;" onclick="deleteRecalc('${packageID+counter}')"></i>
                        </div>
                    </div>
                `;
                
                }
                $('#package').attr('data-price', "");

                

            $("#packageList").append(packDiv);

            $(this).find("option:selected").remove();
            $(this).val('');

            if(goCalc == true) {
                calcTotalCost(packageID);
            }

            if(package == "Mystery Food") {
                $("#sale_price" + packageID+counter).removeAttr('readonly');
                counter++

            }
        }
        calcTotalCost(packageID)

    });

    $(document).on("click",".packageTag",function() {
        $(this).remove();
        var selectId = $(this).attr('data-select');
        var categoryId = $(this).attr('id');
        var category = $(this).text();
        var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

        var csel = $("#"+selectId);

        if(categoryId != 'mystery') { 
            var appendHtml  = `<option value="${categoryId}">${category}</option>`;
            csel.append(appendHtml);
        }

        csel.html(csel.find('option').sort(function(x, y) {
            return $(x).text() > $(y).text() ? 1 : -1;
        }));

        csel.prepend(optionHtml);
        csel.find("option[value='']").not(':first').remove();

        csel.val("");
    });

    $('#mystery').click(function() {
        $('#package').append(`<option value="${$(this).attr('id')}">Mystery Food</option>`);
        $('#package').val($(this).attr('id'));
        $('#package').trigger('change');
    });

    $('#submitBtn').click(function() {
        var salePrice       = $('#salePrice').val();
        salePrice = salePrice;
        console.log("salePrice = "+salePrice);
        console.log("sale_price_total = "+sale_price_total);

        // if( parseFloat(salePrice) >= sale_price_total ){
            $('[id$="Error"]').text("");

            var packageInvId    = '<?php echo $_POST['packageID'] ?>';
            var invPackageName  = $('#invPackageName').val();
            var foc             = $("#foc").is(":checked") ? 1 : 0; 
            var vendorId        = $('#vendorId').val();
            var productType     = $('#productType').val();
            // var expired_day     = $('#expiredDay').val();
            var deliveryMethod = document.getElementById("deliveryMethod").value;
            var skuCode = document.getElementById("skuCode").value;
            
            if ($('input[name="archiveStatus"]:checked').val() == 1)
                var archiveRadio = "Yes";
            else
                var archiveRadio = "No";

            if ($('input[name="publishStatus"]:checked').val() == 1)
                var publishRadio = "Yes";
            else
                var publishRadio = "No";

            if ($('input[name="ignoreStatus"]:checked').val() == 1)
                var ignoreRadio = "Yes";
            else
                var ignoreRadio = "No";
            
            var category = [];
            $('.includecategoryTag').each(function (index, value) {  
                category.push(value.id);
            });

            var salePrice       = $('#salePrice').val();
            var description     = $('#description').val();

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

            var packageProduct = [];
            
            $('.includePackageTag').each(function (index, value) {
                var valueid;
                    var type;
                    if(value.id.indexOf("mystery")==0){
                        valueid = "";
                        type =  "mystery";

                    }else{
                        valueid= value.id;
                        type = ""
                    }
                var list = {
                    product_id  : valueid,
                    quantity    : $(value).find('input[name=quantity]').val(),
                    cost        : $(value).find('input[name=total_cost]').val(),
                    type        : type

                };

                // if(value.id == 'mystery') {
                //     list['product_id'] = '';
                //     list['type'] = value.id
                // }

                packageProduct.push(list);
            });

            var package = [];
            var packageDesc = [];


            var buildName = {
                name        : $("#invPackageName").val(),
                language    : 'english',
                // language    : lang,
            };

            var buildNameChinese = {
                name        : $("#invPackageNameChinese").val(),
                language    : 'chinese',
                // language    : lang,
            };

            var buildNameDesc = {
                description : $("#description").val(),
                language    : 'english',
                // language    : lang,
            };

            var buildNameDescChinese = {
                description : $("#descriptionChinese").val(),
                language    : 'chinese',
                // language    : lang,
            };

            package.push(buildName);
            package.push(buildNameChinese);
            packageDesc.push(buildNameDesc);
            packageDesc.push(buildNameDescChinese);


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

            var formData  = {
                command             : 'editPackageInventory',
                packageInvId        : packageInvId,
                invPackageName      : invPackageName,
                productType         : productType,
                // expired_day         : expired_day,
                description         : description,
                salePrice           : salePrice,
                vendorId            : vendorId,
                category            : category,
                uploadImage         : uploadImage,
                packageProduct      : packageProduct,
                isPublish           : publishRadio,
                isArchive           : archiveRadio,
                isIgnore            : ignoreRadio,
                package             : package,
                packageDesc         : packageDesc,
                cookingSuggestionName   : cookingSuggestionName,
                cookingSuggestionUrl    : cookingSuggestionUrl,
                cookingSuggestionRemark : cookingSuggestionRemark,
                cookingFullInstruction : cookingFullInstruction,
                invTranslationList    : invTranslationList,
                remarkArray       : remarkArray,
                deliveryMethod    : deliveryMethod,
                skuCode           : skuCode,
                foc           : foc,
            };  
            // createdData = formData;
            fCallback = successEditPackageInventory;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // }
        // else{
        //     showMessage('sales price cannot lower than suggested price', 'warning', 'warning', 'warning', '');

        // }
    });

    $('#backBtn').click(function() {
        $.redirect('getPackageList.php');
    });
});

function getPackageDetail() {
    var formData  = {
        command     : 'getPackageDetail',
        packageID   : '<?php echo $_POST['packageID'] ?>',
    };

    fCallback = loadPackageDetail;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function assignDiscountPercentage(data, message) {
    discountPercentage = data.discountPercentage || 0;
}

$('#package_cost').on('change', function() {
    if($(this).val() == '') { 
        // $('#costSuggest').hide();
    } else {
        var cost = $(this).val(); 
        var sale_price = (cost * (100 + discountPercentage)) / 100;
        sale_price_total = sale_price;

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


function loadPackageDetail(data, message) {
    cookingSuggest = data.cookingDetail;
    invTranslationList = data.invTranslationList;
    var archiveStatus = data.packageInfo.archiveStatus;
    var publishStatus = data.packageInfo.publishStatus;
    var ignoreStatus = data.packageInfo.ignoreStatus;
    var packageInfo = data.packageInfo;
    var vendorList = data.supplierList;
    var packageDetails = data.packageDetails;
    var imageList = data.imageList;

    $("#foc").prop("checked", data.focDetail == 1); 

    $.each(imageList, function(k, v) {
        var newK = k + 1;
        addImage(v['url']);
        $('#fileName' + newK).html(v['name']);
        $("#viewImg" + newK).css('display', 'inline-block');

        $('#storeFileName' + newK).val(v['name']);
        $('#storeFileData' + newK).val(v['url']);
        $('#storeFileIsExist' + newK).val('true');

        var dataUrl = '';

        var image = new Image();
        image.crossOrigin='anonymous';
        image.onload = () => {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            canvas.height = image.naturalHeight;
            canvas.width = image.naturalWidth;
            ctx.drawImage(image, 0, 0);
            dataUrl = canvas.toDataURL();

            $('#storeFileIsExist' + newK).val('true');
            $('#storeFile64Bit' + newK).val(dataUrl);
        }
        
        image.src = $('#storeFileData' + newK).val();
    })

    $('input[name="publishStatus"][value="'+ publishStatus + '"]').prop('checked', true);
    $('input[name="archiveStatus"][value="'+ archiveStatus + '"]').prop('checked', true);
    $('input[name="ignoreStatus"][value="'+ ignoreStatus + '"]').prop('checked', true);
    $('#publishStatus').val(packageInfo.publishStatus);

    var productNameEnglish = "";
    var productNameChinese = "";
    var descEnglish = "";
    var descChinese = "";

    if(data.nameTranslationList){
        for (var i = 0; i < data.nameTranslationList.length; i++) {
            if (data.nameTranslationList[i].language === "english") {
                productNameEnglish = data.nameTranslationList[i].content;
            }
            else if (data.nameTranslationList[i].language === "chinese") {
                productNameChinese = data.nameTranslationList[i].content;
            }
        }
    }

    var deliveryMethodOption = "";
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
    $("#deliveryMethod").val(packageInfo.delivery_method);


    if(data.descrTranslationList){
        for (var i = 0; i < data.descrTranslationList.length; i++) {
            if (data.descrTranslationList[i].language === "english") {
                descEnglish = data.descrTranslationList[i].content;
            }
            else if (data.descrTranslationList[i].language === "chinese") {
                descChinese = data.descrTranslationList[i].content;
            }
        }
    }

    // $('#invPackageName').val(productNameEnglish);
    $('#invPackageNameChinese').val(productNameChinese);
    // $('#description').val(descEnglish);
    $('#descriptionChinese').val(descChinese);

    // Package Name
    $('#invPackageName').val(packageInfo.name);

    if(packageInfo.skucode){
        $('#skuCode').val(packageInfo.skucode);
    }


    // Vendor Name
    // $.each(vendorList, function(k, v) {
    //     $('#vendorId').append(`<option value="${v['id']}" data-value="${v['vendor_code']}">${v['name']}</option>`);
    // });
    // $('#vendorId').val(packageInfo.vendor_id);

    $.each(vendorList, function(k, v) {
        $('#vendorId').append(`<option value="${v['id']}" data-value="${v['vendor_code']}">${v['name']}</option>`);
        var name = v['name'].toLowerCase();
        if (v['id'] == packageInfo.vendor_id) {
            $('#vendorId').val(v['id']);

            $("#vendorId").trigger("change");
        }
    });

    // $('#vendorId').val(packageInfo.vendor_id);

    // Expired Day
    // $('#expiredDay').val(packageInfo.expired_day);

    // Category
    var categoryList = data.packageCategoryList;
    $.each(categoryList, function(k, v) {
        $('#category').append(`<option value="${v['id']}">${v['name']}</option>`);
    });
    var categories = packageInfo.categ_id.split(','); // split ["1", "2"]
    $.each(categories, function(k, v) {
        var categoryId = v.split('"')[1];
        $('#category').val(categoryId);
        $('#category').trigger('change');
    });

    // Sale Price
    $('#salePrice').val(packageInfo.sale_price);

    // Description
    $('#description').val(packageInfo.description);

    // Package Image
    $("#viewImg").css('display', 'inline-block');
    $("#deleteImg").css('display', 'inline-block');



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



    //new API by Marcus
    if(data.cookingDetail){
        addCookingSuggest(data.cookingDetail);
    }

    // Package Product List
    // $.each(packageDetails, function(k, v) {
        
    //     if(typeof(v) == 'object') {
    //         var list = {
    //             product_id  : v['product_id'],
    //             name        : v['name'],
    //             quantity    : v['quantity'],
    //         };

    //         if(v['type'] == 'mystery') { list['product_id'] = v['type']; }

    //         products.push(list);
    //     }
    // });

    $.each(packageDetails, function(k, v) {
        if (typeof v === 'object') {
            var list = {
                product_id: v['product_id'],
                name: v['name'],
                quantity: v['quantity'],
                sale_price: v['cost'],
                cost: v['cost'],
                datain :1
            };

            if (v['type'] === 'mystery') {
                list['product_id'] = v['type'];
            }
            products.push(list);

        }
    }); 

    getPackageProductList();
}

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

    function loadProductSKU(data, message) {
        var skuNumber = data.productSku;
        $('#skuCode').val(skuNumber);
    }

    $('#vendorId').on('change', function() {
        var vendorId = $(this).val();

        // if(count > 0){
            getSkuProductCode(vendorId);
        // }
        // count = 1;

    });

    function getSkuProductCode(vendorId) {
        if (vendorId) {
            var formData = {
                command: 'generateProductSKU',
                vendorId: vendorId,
            };
            fCallback = loadProductSKU;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
        }
    }

function displayFileName(n) {
    var dFileName = $("#fileName");

    if (n.files && n.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            // $('#blah').attr('src', e.target.result);
            // $("#imgData"+input.id).empty().val(reader["result"]);
            dFileName.text(n.files[0]["name"]);
            // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
            // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
            // $("#imgFlag"+input.id).empty().val("1");

            $("#storeFileData").val(reader["result"]);
            $("#storeFileName").val(n.files[0]["name"]);
            $("#storeFileSize").val(n.files[0]["size"]);
            $("#storeFileType").val(n.files[0]["type"]);
            $("#storeFileFlag").val('1');

            if((n.files[0]["type"]).split('/')[0] === 'image'){
                $("#storeFileUploadType").val('image');
                uploadFileType = 'image';
            }else{
                $("#storeFileUploadType").val('video');
                uploadFileType = 'video';
            }

            // $("#viewImg"+id).attr('data-res', reader["result"]);
            $("#viewImg").css('display', 'inline-block');
            $("#deleteImg").css('display', 'inline-block');
            $("#fileNotUploaded"+id).hide()
            $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val()).show();
        };

        reader.readAsDataURL(n.files[0]);
    }
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
            $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val()).show();
        };

        reader.readAsDataURL(n.files[0]);
    }
}

function showImg(n, imgUrl) {
    $("#modalImg").attr('style','display: block');
    
    if(imgUrl != 'undefined')
        $("#modalImg").attr('src', imgUrl);
    else
        $("#modalImg").attr('src', $("#storeFileData" + n).val());

    $("#modalVideo").attr('style','display:none');
    $("#showImage").modal();
}

function getPackageProductList() {
    var formData  = {
        command     : 'getPackageProductList',
        type        : 'Package',
    };

    fCallback = loadPackageProductList;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadPackageProductList(data, message) {
    var productList = data.productList;
    newProductList = data.productList
    

        $.each(productList, function(k, v) {
            $('#package').append(`<option value="${v['id']}">${v['name']}</option>`);
        });

    // Add Mystery Food option (hidden)
    $('#package').append(`<option value="mystery" hidden>Mystery Food</option>`);

    // $.each(products, function(k, v) {
    //     $('#package').val(v['product_id']);
    //     $('#package').attr('data-value', v['quantity']);
    //     $('#package').trigger('change');
    // });

    // $('#package').attr('data-value', '');
    $.each(products, function(k, v) {
        var productId = v['product_id'] !== "mystery" ? v['product_id'] : 'mystery';
        var productName = v['product_id'] !== "mystery" ? v['name'] : 'Mystery Food';

        $('#package').val(productId);
        $('#package').attr('data-value', v['quantity']);
        $('#package').attr('data-price', v['sale_price']);
        $('#package').attr('data-cost', v['cost']);

        goCalc = true;
        $('#package').trigger('change');

        if (!$(`#package option[value="${productId}"]`).length) {
            $('#package').append(`<option value="${productId}">${productName}</option>`);
        }
    });
    $('#package').attr('data-value', '');
}

function toggleAttributeBox() {
    $('#isVariant').prop('checked', !$('#isVariant').prop('checked'));
    $('#isVariant').is(':checked') ? $('#attributeBox').show() : $('#attributeBox').hide();
    // $('.stockIco').toggleClass('fa-minus fa-plus');
}

function successEditPackageInventory(data, message) {
    showMessage(message, 'success', 'Edit Package', 'edit', 'getPackageList.php');
}

function addImage(url) {
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
                <input type="hidden" id="storeFileIsExist${addImgIDNum}">
                <input type="hidden" id="storeFile64Bit${addImgIDNum}">
                <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                <div>
                    <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                    <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                    <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
                    <img id="thumbnailImg${addImgIDNum}" src="${url}" style="width:100%;" />
                    <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}', '${url}')">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
            </div>
        </div>
    `;

    $("#buildImg").append(buildImg);
    if(url) $(`#fileNotUploaded${addImgIDNum}`).hide();
    else $(`#thumbnailImg${addImgIDNum}`).hide();

    /*if (addImgCount == 1) {
        $(".addImgBtn").hide();
    }*/
    
}

function closeDivImg(n) {
    addImgCount = addImgCount - 1;
    // $(".addImgBtn").show();
    $(n).parent().parent().remove();

    $("#imgTypeError").html("");
    $("#imgError").html("");
}

function closeDiv(n) {
    var getThisInd = $('.closeBtn').index($(n));
    selectedLang.splice(getThisInd, 1);
    $(n).parent().parent().parent().remove();
    addCSCount = addCSCount - 1;
    $('.addCookingSuggestBtn').show();
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

function calcTotalCost(id) {
    let a = $("#quantity"+id).val();
    let b = $("#sale_price"+id).val();
  

    b = parseFloat(b);

    let c = a * b;

    $("#total_cost"+id).val(c.toFixed(2));

    calcPackagePrice();
}

function deleteRecalc(total_cost) {
    let a = $("#quantity"+total_cost).val();
    let b = $("#sale_price"+total_cost).val();
    var total_sum = $("#package_cost").val();

    b = parseFloat(b);

    let c = a * b;
    let total = total_sum - c;

    // $("#package_cost").val(); 
    

    $('.total_cost').each(function (){
        

        total_sum += parseFloat($(this).val());
    })
    
    $("#package_cost").val(total.toFixed(2))
    $("#package_cost").trigger("change");
    $("#total_cost"+total_cost).val(total.toFixed(2));
    $("#"+total_cost).remove();


    
}
function calcPackagePrice() {
    var total_sum = 0;

    $('.total_cost').each(function (){
        total_sum += parseFloat($(this).val());
    })

    $("#package_cost").val(total_sum.toFixed(2)); 
    goCalc = false;
    $("#package_cost").trigger("change");
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

$('#vendorId').select2({
    dropdownAutoWidth: true,
    templateResult: newFormatState,
    templateSelection: newFormatState,
});

$('#package').select2({
    dropdownAutoWidth: true,
    templateResult: newFormatState,
    templateSelection: newFormatState,
});

$('#category').select2({
    dropdownAutoWidth: true,
    templateResult: newFormatState,
    templateSelection: newFormatState,
});
function checknumber(id){
    let a = $("#quantity"+id).val();
        if(a == "" || a == 0){
            $("#quantity"+id).val(1)
        }
        calcTotalCost(id)
    

}

</script>

</body>
</html>
