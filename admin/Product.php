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
                <div class="container bg-white">               
                    <div class="row">
                        <div class="col-md-10">
                            <?php if($_POST['id']) { ?>
                                <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Product / Edit Product' ?></span>
                            <?php } else { ?>
                                <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Product / Create Product' ?></span>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 m-t-10">
                            <div class="btn-group mr-2">
                                <button class="btn custom-button2" id="createProduct">
                                    <span><i class="fa fa-floppy-o m-r-5" aria-hidden="true"></i></span>Save
                                </button>
                            </div>

                            <div class="btn-group mr-2">
                                <button class="btn custom-button2" id="editProduct">
                                    <span><i class="fa fa-pencil m-r-5" aria-hidden="true"></i></span>Edit
                                </button>
                            </div>

                            <div class="btn-group mr-2">
                                <button class="btn custom-button2" id="updateProduct">
                                    <span><i class="fa fa-floppy-o m-r-5" aria-hidden="true"></i></span>Save
                                </button>
                            </div>

                            <button id="createProductNav" class="btn custom-button1" style="padding: 5px 10px; background: #white; border: 1px solid #ccc;">
                                <span style="display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-plus text-black" aria-hidden="true"></i>
                                </span>
                                Create
                            </button>

                            <div class="btn-group mr-2">
                                <button class="btn custom-button1" id="backBtn">
                                    <img src="images/Icon-metro-cross.png" alt=""  class="m-r-5">
                                    Discard
                                </button>
                            </div>

                            <div class="btn-group mr-2">
                                <button class="btn custom-button1" id="cancelEditBtn">
                                    <img src="images/Icon-metro-cross.png" alt=""  class="m-r-5">
                                    Discard
                                </button>
                            </div>

                            <button id="printButton" class="btn custom-button2" style="padding: 5px 10px; background: white; border: 1px solid #ccc; color: black;">
                                <span style="display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </span>
                                Print
                            </button>

                            <div class="btn-group">
                                <button id="actionBtn" type="button" class="btn custom-button1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="fa fa-cog" aria-hidden="true"></i></span> Action
                                </button>
                    
                            </div>
                        </div>
                    </div>

                    <div class="row customRow m-t-15" id="printPreviewArea">
                        <div class="col-md-8 bg-custom2" style="border-right: 1px solid #d6d4d4;">
                            <div class="card-box m-t-15" style="border-radius: 0px;padding: 5px 30px;">
                                <div style="display: flex;">
                                    <div id="unitOnHandBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20 m-r-10" style="display: flex; align-items: center;">
                                        <img src="images/Icon-awesome-truck.png" alt="" height="28px" class="m-r-10">
                                        <div>
                                            <div><span id="unitOnHand" style="color: black;">0</span></div> <!-- Set color to black -->
                                            <div>Unit on hand</div>
                                        </div>
                                    </div>
                                    <div id="inOutBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20 m-r-10" style="display: flex; align-items: center;">
                                        <img src="images/InOut-Icon.png" alt="" height="28px" class="m-r-10">
                                        <div style="display: flex; justify-content: space-between;">
                                            <div id="inOutAmt" style="margin-right: 10px;">
                                                0 <br>
                                                0
                                            </div>
                                            <div class="m-r-5">
                                                in <br>
                                                out
                                            </div>
                                        </div>
                                    </div>
                                    <div id="orderBtn" class="btn btn-primary action-btn waves-effect waves-light m-b-20" style="display: flex; align-items: center;">
                                        <img src="images/Icon-awesome-edit.png" alt="" height="28px" class="m-r-10">
                                        <div>Order</div>
                                    </div>
                                </div>
                                <div class="">
                                    <div>
                                        <div class="form-group row">
                                            <label for="setting" class="col-md-3 col-form-label customFont">Setting</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-check" id="checkboxWrapper">
                                                    <div class="form-check-item">
                                                        <input type="checkbox" class="form-check-input" id="publishCheckbox" checked>
                                                        <label class="form-check-label" for="publishCheckbox">Publish</label>
                                                    </div>
                                                    <div class="form-check-item">
                                                        <input type="checkbox" class="form-check-input" id="archiveCheckbox">
                                                        <label class="form-check-label archive-label" for="archiveCheckbox">Archive</label>
                                                    </div>
                                                    <div class="form-check-item">
                                                        <input type="checkbox" class="form-check-input" id="ignoreStockCountCheckbox">
                                                        <label class="form-check-label ignoreStockCount-label" for="ignoreStockCountCheckbox">Ignore Stock Count</label>
                                                    </div>
                                                    <div class="form-check-item">
                                                        <input type="checkbox" class="form-check-input" id="focCheckbox">
                                                        <label class="form-check-label FOC-label" for="focCheckbox">FOC Delivery</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productName" class="col-md-3 col-form-label customFont">Product Name (EN)</label>
                                        <div class="col-md-9">
                                            <input id="invProductName" type="text" class="form-control" readonly style="margin-left: 0px;">
                                            <span id="invProductNameErrorEnglish" class="errorSpan text-danger"></span>
                                            <span id="nameError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="vendorName" class="col-md-3 col-form-label customFont">Vendor Name</label>
                                        <div class="col-md-9"> 
                                            <select id="vendorName" class="form-control" disabled dataName="vendorName" dataType="text">
                                                <option value="">Select the vendor</option>
                                            </select>
                                            <span id="vendorNameError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="skuCode" class="col-md-3 col-form-label customFont">SKU Code</label>
                                        <div class="col-md-9">
                                            <input id="skuCode" type="text" class="form-control" readonly style="margin-left: 0px;">
                                            <span id="skuCodeError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-md-3 col-form-label customFont">Product Description (EN)</label>
                                        <div class="col-md-9">
                                            <input id="description" type="text" class="form-control" readonly style="margin-left: 0px;">
                                            <span id="descriptionError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cost" class="col-md-3 col-form-label customFont">Cost</label>
                                        <div class="col-md-9">
                                            <input id="cost" type="number" class="form-control" readonly style="margin-left: 0px;" oninput="this.value = this.value.replace(/[^.0-9]/g, '');" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                            <span id="costError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="salePrice" class="col-md-3 col-form-label customFont">Sales Price</label>
                                        <div class="col-md-9">
                                            <input id="salePrice" type="number" class="form-control" readonly style="margin-left: 0px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                            <div><span id="costSuggest" class=""></span></div>
                                            <div><span id="salePriceError" class="errorSpan text-danger"></span></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bestBefore" class="col-md-3 col-form-label customFont">Best Before Days</label>
                                        <div class="col-md-9">
                                            <input id="bestBefore" type="number" class="form-control" readonly style="margin-left: 0px;" oninput="this.value = this.value.replace(/[^0-9]/g, '');" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;">
                                            <span id="bestBeforeError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reminderDays" class="col-md-3 col-form-label customFont">Reminder Days</label>
                                        <div class="col-md-9">
                                            <input id="reminderDays" type="number" class="form-control" readonly style="margin-left: 0px;" oninput="this.value = this.value.replace(/[^0-9]/g, '');" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;"> 
                                            <span id="reminderDaysError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category" class="col-md-3 col-form-label customFont">Category</label>
                                        <div class="col-md-9">
                                            <select id="category" class="form-control category" dataName="category" dataType="text" readonly disabled>
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

                                    <div class="form-group row">
                                        <label for="deliveryMethod" class="col-md-3 col-form-label customFont">Delivery Method</label>
                                        <div class="col-md-9">
                                            <select id="deliveryMethod" class="form-control category" dataName="deliveryMethod" dataType="text" readonly disabled>
                                            </select>
                                            <span id="deliveryMethodError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productCoverImage" class="col-md-3 col-form-label customFont">Product Image</label>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div id="buildCoverImg">
                                                </div>
                                                <div class="col-md-4 addImgBtn" id="coverImg">
                                                    <div class="addProductImage" onclick="addCoverImg()">
                                                        <img src="images/Icon-addImage.png" alt="" height="28px" class="m-r-10">
                                                        <span>Cover Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span id="imgError" class="errorSpan text-danger"></span>
                                            <span id="imgTypeError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productDegreeImage" class="col-md-3 col-form-label customFont"></label>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div id="buildDegreeImg">
                                                </div>
                                                <div class="col-md-4 addImgBtn" id="degreeImg">
                                                    <div class="addProductImage" onclick="addDegreeImg()">
                                                        <img src="images/Icon-addImage.png" alt="" height="28px" class="m-r-10">
                                                        <span>45 Degree Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productTopView" class="col-md-3 col-form-label customFont"></label>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div id="buildTopImg">
                                                </div>
                                                <div class="col-md-4 addImgBtn" id="topImg">
                                                    <div class="addProductImage" onclick="addTopImg()">
                                                        <img src="images/Icon-addImage.png" alt="" height="28px" class="m-r-10">
                                                        <span>Top View</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productOtherImage" class="col-md-3 col-form-label customFont"></label>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div id="buildImg">
                                                </div>
                                                <div class="col-md-4 addImgBtn">
                                                    <div class="addProductImage" onclick="addImage()">
                                                        <img src="images/Icon-addImage.png" alt="" height="28px" class="m-r-10">
                                                        <span>Other Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="productVideo" class="col-md-3 col-form-label customFont">Product Video</label>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div id="buildVideo">
                                                </div>
                                                <div class="col-md-4 addVideoBtn" id="productVideoDiv">
                                                    <div class="addProductImage" onclick="addVideo()">
                                                        <img src="images/Icon-addVideo.png" alt="" height="28px" class="m-r-10">
                                                        <span>Add Video</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deliveryMethod" class="col-md-3 col-form-label customFont">Cooking Suggestions</label>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <button id="addNewCookingBtn" onclick="addCookingSuggest()" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;" disabled>
                                                <span style="display: inline-block; margin-right: 5px;">
                                                    <i class="fa fa-plus text-white" aria-hidden="true"></i>
                                                </span>
                                                Add New
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div id="buildCookingSuggest"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="journalSection">
                            <?php if(!$_POST['id']) { ?>
                                <div class="card-box m-t-10" style="background-color: #eee; color: black;">
                                    <div class="customFont"><?php echo $_SESSION['username'] ?></div>
                                    <div>Creating a new Product...</div>
                                </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>

    <?php include("productTranslateNameModal.php"); ?>
    <?php include("productTranslateDescriptionModal.php"); ?>
    <?php include("productTranslateRemarkModal.php"); ?>

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
        var uploadImage = [];
        var uploadVideo = [];
        var buildOption;
        var buildOptionLength = 0;
        var addCSCount = 1;
        var cTNum = 1;
        var totalLoop = [1];
        var addLangCount = 0;
        var addImgCount = 0;
        var addVideoCount = 0;
        var addImgIDNum = 0;
        var addVideoIDNum = 0;
        var id = "<?php echo $_POST['id']; ?>";
        var actionType = "<?php echo $_POST['actionType']; ?>";
        var dataURL = "<?php echo $config['tempMediaUrl']; ?>";
        var discountPercentage = 0;
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
        var coverImageData = [];
        var degreeImageData = [];
        var topImageData = [];
        var viewMode = true;
        var getVendorSelected = "<?php echo $_POST['vendorId']; ?>";
        var expiredDayInput = document.getElementById('expiredDay');
        var expiredDayError = document.getElementById('expiredDayError');

        var productName;
        var vendorId;
        var skuCode;
        var imgFileDataArray = [];
        var videoFileDataArray = [];
        var imgUploadFinishFile = [];
        var videoUploadFinishFile = [];

        $(document).ready(function() {
            if(actionType == "add")
            {
                viewMode = false;
                var productNameInput = document.getElementById('invProductName');
                // var vendorNameInput = document.getElementById('vendorName');
                var descriptionInput = document.getElementById('description');
                var costInput = document.getElementById('cost');
                var salePriceInput = document.getElementById('salePrice');
                var bestBeforeInput = document.getElementById('bestBefore');
                var reminderDaysInput = document.getElementById('reminderDays');
                var categorySelect = document.getElementById('category');
                var deliveryMethodSelect = document.getElementById('deliveryMethod');
                
                productNameInput.removeAttribute('readonly');
                // vendorNameInput.removeAttribute('readonly');
                $("#vendorName").prop("disabled", false);
                descriptionInput.removeAttribute('readonly');
                costInput.removeAttribute('readonly');
                salePriceInput.removeAttribute('readonly');
                bestBeforeInput.removeAttribute('readonly');
                reminderDaysInput.removeAttribute('readonly');
                categorySelect.removeAttribute('readonly');
                deliveryMethodSelect.removeAttribute('readonly');
                $("#addNewCookingBtn").prop("disabled", false);
                $("#editProduct").hide();
                $("#createProductNav").hide();
                $("#updateProduct").hide();
                $("#cancelEditBtn").hide();

                $("#unitOnHandBtn").hide();
                $("#inOutBtn").hide();
                $("#orderBtn").hide();

                var formData  = {
                    command: 'getProductInventoryDetails'
                };
                fCallback = createLoadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $('.input-daterange input').each(function() {
                    $(this).daterangepicker({
                        singleDatePicker: true,
                        timePicker: false,
                        locale: {
                            format: 'DD/MM/YYYY'
                        }
                    });
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

                // create Product Button
                $('#createProduct').click(function() { 
                    $('[id$="Error"]').text("");

                    $(".errorSpan").empty()

                    var productNameArr = [];

                    imgFileDataArray = [];
                    videoFileDataArray = [];
                    imgUploadFinishFile = [];
                    videoUploadFinishFile = [];
                    uploadImage = [];
                    uploadVideo = [];
                    // get all the image file
                    $('[id^="fileUpload"]').each(function() {
                        const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
                        if (this.files && this.files[0]) {
                            const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                            const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                            imgFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
                        }
                    });

                    // get all the video file
                    $('[id^="fileVideoUpload"]').each(function() {
                        const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
                        if (this.files && this.files[0]) {
                            const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                            const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                            videoFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
                        }
                    });


                    if(imgFileDataArray.length > 0)
                    {
                        handleFileUpload(imgFileDataArray);
                    }

                    if(videoFileDataArray.length > 0)
                    {
                        handleFileUpload(videoFileDataArray);
                    }

                    // var productName = document.getElementById("invProductName").value;
                    var productNameEnglish = document.getElementById("invProductNameEnglish").value;
                    var productNameChinese = document.getElementById("invProductNameChinese").value;

                    var englishObj = {
                    language: "english",
                    name: productNameEnglish
                    // name: productName
                    };

                    var chineseObj = {
                    language: "chinese",
                    name: productNameChinese
                    };

                    productNameArr.push(englishObj);
                    productNameArr.push(chineseObj);

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
                        var remarkEnglishElement = document.getElementById("cookingRemarkEn" + (j + 1));
                        var remarkChineseElement = document.getElementById("cookingRemarkCn" + (j + 1));

                        if (remarkEnglishElement && remarkChineseElement) {
                        // if (remarkEnglishElement) {
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
                            // var remarkObj = [englishRemark];
                            remarkArray.push(remarkObj);
                        }
                    }

                    var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                    var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                    var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                    var foc = $("#focCheckbox").is(":checked") ? 1 : 0;
                    var category = [];
                    var productType = $("#productType").val();
                    var expiredDay = $('#bestBefore').val();
                    var reminderDays = $('#reminderDays').val();
                    var cost = $('#cost').val();
                    var salePrice = $('#salePrice').val();
                    var cookingSuggestion = $('#cookingSuggestion').val();
                    var deliveryMethod = document.getElementById("deliveryMethod").value;
                    var vendorId = $('#vendorName option:selected').val();
                    var video = $('#video').val();
                    var packageProduct = [];
                    var skuCode = $('#skuCode').val();;

                    cookingSuggestionName = [];
                    $(".cookingSuggestInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestName = {
                            content : getValue
                        };
                        cookingSuggestionName.push(buildCookingSuggestName);
                    });

                    cookingSuggestionUrl = [];
                    $(".urlInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestUrl = {
                            content : getValue
                        };
                        cookingSuggestionUrl.push(buildCookingSuggestUrl);
                    });

                    cookingSuggestionRemark = [];
                    $(".remarkInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestRemark = {
                            content : getValue
                        };
                        cookingSuggestionRemark.push(buildCookingSuggestRemark);
                    });

                    $('.includecategoryTag').each(function (index, value) {  
                        category.push(value.id);
                    });

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

                    // uploadImage = [];
                    // uploadVideo = [];
                    // uploadImageData = [];
                    // $(".popupMemoImageWrapper").each(function() {
                    //     var imgData = $(this).find('[id^="storeFileData"]').val();
                    //     var imgName = $(this).find('[id^="storeFileName"]').val();
                    //     var imgType = $(this).find('[id^="storeFileType"]').val();
                    //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                    //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
                    //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();
                    //     var uploadType = $(this).find('[id^="uploadType"]').val();
                    //     if(uploadType == 'video')
                    //     {
                    //         if(imgData != "") {
                    //             buildUploadImage = {
                    //                 vidName : imgName,
                    //                 imgFlag : imgFlag,
                    //                 imgSize : imgSize,
                    //                 uploadType : uploadType
                    //             };
                              
                    //             reqData = {
                    //                 vidName : imgName,
                    //                 vidData : JSON.stringify(imgData),
                    //                 uploadType : 'video'
                    //             };

                    //             const extension = imgName.split('.').pop();
                    //             const mimeType = getMimeTypeFromExtension(extension);
                    //             console.log('vidData',JSON.stringify(imgData));
                                
                    //             uploadImageData.push(reqData);
                    //             uploadVideo.push(reqData);
                    //         }
                    //     }
                    //     else
                    //     {
                    //         if(imgData != "") {
                    //             buildUploadImage = {
                    //                 imgName : imgName,
                    //                 imgType : imgType,
                    //                 imgFlag : imgFlag,
                    //                 imgSize : imgSize,
                    //                 uploadType : imgUploadType
                    //             };
                              
                    //             reqData = {
                    //                 imgName : imgName,
                    //                 imgData : JSON.stringify(imgData),
                    //                 uploadType : uploadType
                    //             };
                                
                    //             uploadImageData.push(reqData);
                    //             uploadImage.push(reqData);
                    //         }
                    //     }
                    // });

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

                    // change upload video to mimeType
     


                    // var formData  = {
                    //     command           : 'awsGeneratePreSignedUrl',
                    //     action            : upload,
                    //     mimeType          : remarkArray,
                    // };
                    // fCallback = verificationVideoLink;
                    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
                    {
                        var formData  = {
                            command           : 'verifyAddProductInventory',
                            descriptionArr    : descriptionArr,
                            remarkArray       : remarkArray,
                            productNameArr    : productNameArr,
                            skuCode           : skuCode,
                            productType       : 'product',
                            expired_day       : expiredDay,
                            reminderDays      : reminderDays,
                            cost              : cost,
                            salePrice         : salePrice,
                            cookingSuggest    : cookingSuggestion,
                            vendorId          : vendorId,
                            category          : category,
                            video             : video,
                            deliveryMethod    : deliveryMethod,
                            cookingSuggestionName: cookingSuggestionName,
                            cookingSuggestionUrl : cookingSuggestionUrl,
                            cookingSuggestionRemark : cookingSuggestionRemark,
                            // uploadImage       : uploadImage,
                            // uploadVideo       : uploadVideo,
                            publishStatus     : publishStatus,
                            archiveStatus     : archiveStatus,
                            ignoreStatus      : ignoreStatus,
                            foc               : foc,
                        };
                        if(isVariant == "1") {
                            formData['isVariant'] = isVariant;
                            formData['variants']  = variants;
                        }
    
                        if(productType == 'Package') {
                            formData['packageProduct'] = packageProduct;
                        }
    
                        createdData = formData;
                        fCallback = verificationCallback;
                        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    }
                });

                $('#backBtn').click(function() {
                    $.redirect('getProductInventory.php');
                });
            }
            else
            {
                $("#createProduct").hide();
                $("#updateProduct").hide();
                $("#cancelEditBtn").hide();

                var formData  = {
                    command: 'getProductInventoryDetails',
                    productInvId: id
                };
    
                fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                // var formData = {
                //     'command'          : 'getJournalLog',
                //     'module_id'        : id,
                //     'module'           : 'product',
                //     'permissionType'   : 'action'
                // };
                // fCallback = loadJournalLog;
                // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }


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
                $('#skuCode').val('');
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

            $('#updateProduct').click(function() {
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
                    var remarkEnglishElement = document.getElementById("cookingRemarkEn" + (j + 1));
                    var remarkChineseElement = document.getElementById("cookingRemarkCn" + (j + 1));

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
                var code = $("#skuCode").val();
                var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                var foc = $("#focCheckbox").is(":checked") ? 1 : 0;
                var productType = $("#productType").val();
                var expiredDay = $('#bestBefore').val();
                var reminderDays = $('#reminderDays').val();
                var description = $('#description').val();
                var cost = $('#cost').val();
                var salePrice = $('#salePrice').val();
                var cookingTime = $('#cookingTime').val();
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

                cookingSuggestionName = [];
                $(".cookingSuggestInput").each(function(){
                    var getValue = $(this).val();
                    buildCookingSuggestName = {
                        content : getValue
                    };
                    cookingSuggestionName.push(buildCookingSuggestName);
                });

                cookingSuggestionUrl = [];
                $(".urlInput").each(function(){
                    var getValue = $(this).val();
                    buildCookingSuggestUrl = {
                        content : getValue
                    };
                    cookingSuggestionUrl.push(buildCookingSuggestUrl);
                });

                cookingFullInstruction = [];
                $(".fullInstuctionInput").each(function(){
                    var getValue = $(this).val();
                    buildCookingFullInstruction = {
                        content : getValue
                    };
                    cookingFullInstruction.push(buildCookingFullInstruction);
                });

                cookingSuggestionRemark = [];
                $(".remarkInput").each(function(){
                    var getValue = $(this).val();
                    buildCookingSuggestRemark = {
                        content : getValue
                    };
                    cookingSuggestionRemark.push(buildCookingSuggestRemark);
                });

                // uploadImage = [];
                // uploadVideo = [];
                // uploadImageData = [];
                // $(".popupMemoImageWrapper").each(function() {
                //     var imgData = $(this).find('[id^="storeFileData"]').val();
                //     var imgName = $(this).find('[id^="storeFileName"]').val();
                //     var imgType = $(this).find('[id^="storeFileType"]').val();
                //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
                //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                //     var imgID   = $(this).find('[id^="storeFileID"]').val();
                //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();
                //     var uploadType = $(this).find('[id^="uploadType"]').val();
                //     if(uploadType == 'video')
                //     {
                //         if(imgData != "") {
                //             buildUploadImage = {
                //                 vidName : imgName,
                //                 imgFlag : imgFlag,
                //                 imgSize : imgSize,
                //                 uploadType : uploadType
                //             };
                            
                //             reqData = {
                //                 vidName : imgName,
                //                 vidData : JSON.stringify(imgData),
                //                 uploadType : 'video'
                //             };
                            
                //             uploadImageData.push(reqData);
                //             uploadVideo.push(reqData);
                //         }
                //     }
                //     else
                //     {
                //         if(typeof(imgID) == 'undefined') {
                //             imgID = '';
                //         }
    
                //         buildUploadImage = {
                //             imgName : imgName,
                //             imgType : imgType,
                //             imgSize : imgSize,
                //             imgFlag : imgFlag,
                //             uploadType : imgUploadType
                //         };
    
                //         reqData = {
                //             imgID      : imgID,
                //             imgName    : imgName,
                //             imgData    : JSON.stringify(imgData),
                //             uploadType : uploadType
                //         };
                //         uploadImageData.push(reqData);
                //         uploadImage.push(reqData);
                //     }
                // });

                imgFileDataArray = [];
                videoFileDataArray = [];
                imgUploadFinishFile = [];
                videoUploadFinishFile = [];
                uploadImage = [];
                uploadVideo = [];
                // get all the image file
                $('[id^="fileUpload"]').each(function() {
                    const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
                    if (this.files && this.files[0]) {
                        const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                        const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                        imgFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
                    }
                });

                // get all the video file
                $('[id^="fileVideoUpload"]').each(function() {
                    const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
                    if (this.files && this.files[0]) {
                        const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                        const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                        videoFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
                    }
                });

                if(imgFileDataArray.length > 0)
                {
                    var action = 'edit';
                    handleFileUpload(imgFileDataArray, action);
                }

                if(videoFileDataArray.length > 0)
                {
                    var action = 'edit';
                    handleFileUpload(videoFileDataArray, action);
                }

                var packageData = [];
                var variants = '';
                $('.includePackageTag').each(function (index, value) {  
                    packageProduct.push(value.id);
                });

                if(video == '' && video2 == '') {
                    videoList = [];
                } else {
                    videoList = [
                        video, video2
                    ];
                }
     
                if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
                {
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
                        publishStatus   : publishStatus,
                        archiveStatus   : archiveStatus,
                        ignoreStatus    : ignoreStatus,
                        productType     : 'product',
                        expired_day     : expiredDay,
                        reminderDays    : reminderDays,
                        description     : description,
                        cost            : cost,
                        salePrice       : salePrice,
                        cookingTime     : cookingTime,
                        vendorId        : vendorId,
                        category        : category,
                        videoList       : videoList,
                        videoId         : videoId,
                        // uploadImage     : uploadImage,
                        // uploadVideo     : uploadVideo,
                        imageId         : imageId,
                        deliveryMethod  : deliveryMethod,
                        cookingSuggestionName   : cookingSuggestionName,
                        cookingSuggestionUrl    : cookingSuggestionUrl,
                        cookingSuggestionRemark : cookingSuggestionRemark,
                        cookingFullInstruction : cookingFullInstruction,
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
                }
            });

            $('#backBtn').click(function() {
                $.redirect('getProductInventory.php');
            });

            $('#unitOnHandBtn').click(function() {
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

            // $('#orderBtn').click(function() {
            //     var cfProductId = id;
            //     var cfVendorId = vendorId;
            //     var poType = "add";

            //     $('#redirectForm').empty().html(`
            //         <input type="text" name="productId" value="${cfProductId}">
            //         <input type="text" name="vendorId" value="${cfVendorId}">
            //     `).attr('action', 'purchase.php', {poType, poType}).submit();
            // });
            $('#orderBtn').click(function() {
                var cfProductId = id;
                var cfVendorId = vendorId;
                var poType = "add";

                // Create a form element
                var form = $('<form>').attr({
                    method: 'POST',
                    action: 'purchase.php',
                    target: '_blank'  // Open in a new tab
                });

                // Add the parameters as hidden input fields
                form.append($('<input>').attr({
                    type: 'hidden',
                    name: 'productId',
                    value: cfProductId
                }));

                form.append($('<input>').attr({
                    type: 'hidden',
                    name: 'vendorId',
                    value: cfVendorId
                }));

                form.append($('<input>').attr({
                    type: 'hidden',
                    name: 'poType',
                    value: poType
                }));

                // Append the form to the body and submit it
                $('body').append(form);
                form.submit();
            });
        });

        function createLoadDefaultListing(data, message) {
            $("#category").prop("disabled", false);
            $("#deliveryMethod").prop("disabled", false);

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
         
                $.each(data.supplierList, function(k, v) {
                    buildSupplier += `
                        <option value="${v['supplierID']}">${v['code']} - ${v['name']}</option>
                    `
                });
                $('#vendorName').append(buildSupplier);
                $('#vendorName').val(vendorId);
                $('#vendorName').trigger('change');
                if(getVendorSelected)
                {
                    $('#vendorName').val(getVendorSelected);
                    $('#vendorName').trigger('change');
                }
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

            var buildSuggestion = `
                <div class="section-wrapper m-t-10 m-b-10 cookingSuggestionSection" id="cookingSuggestionSection${cTNum}" style="border-radius: 0px;">
                    <div class="section">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label class="col-form-label customFont" for="branchName">Template Name</label>
                                <select id="cookingTemplate${cTNum}" type="text" class="form-control cookingSuggestInput" onchange="getVideoURL(${cTNum})" disabled>
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label customFont" for="videoInstruction">Video Instruction</label>
                                <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="" readonly></input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label customFont" for="cookingURL">Cooking URL</label>
                                <input id="cookingURL${cTNum}" type="text" class="form-control urlInput" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label customFont" for="cookingTime">Cooking Time</label>
                                <input id="cookingTime${cTNum}" type="text" class="form-control cookingTimeInput" disabled>
                            </div>
                        </div>
                        
                        <!-- Single "Remark" input -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label customFont" for="remark">Remark</label>
                                <input id="cookingRemark${cTNum}" type="text" class="form-control remarkInput" onclick="openRemarkModal(${cTNum})" disabled>
                                <input id="cookingRemarkEn${cTNum}" type="text" class="form-control urlRemark" value="" style="display:none;"></input>
                                <input id="cookingRemarkCn${cTNum}" type="text" class="form-control urlRemark" value="" style="display:none;"></input>
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 10px; margin-top: 10px;"> <!-- Adjust margin-top for spacing -->
                        <button id="deleteVendorAddress1" type="button" class="custom-button1 deleteVendorAddress" onclick="closeDiv(this, ${addCSCount})">
                            <?php echo 'Discard'; ?>
                        </button>
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
            $(".addCookingSuggestBtn").show();
            $(".addImgBtn").show();
            $(".addVideoBtn").show();

            $('#vendorName').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            var cookingSuggestInputs = document.querySelectorAll(".cookingSuggestInput");

            cookingSuggestInputs.forEach(function(input) {
                input.disabled = false;
            });

            var fullInstructionInputs = document.querySelectorAll(".fullInstructionInput");

            fullInstructionInputs.forEach(function(input) {
                input.disabled = false;
            });

            var urlInputs = document.querySelectorAll(".urlInput");

            urlInputs.forEach(function(input) {
                input.disabled = false;
            });

            var cookingTimeInputs = document.querySelectorAll(".urlCookingTime");

            cookingTimeInputs.forEach(function(input) {
                input.disabled = false;
            });

            var remarkInputs = document.querySelectorAll(".remarkInput");

            remarkInputs.forEach(function(input) {
                input.disabled = false;
            });
        }

        function loadDefaultListing(data, message) {
            $('#unitOnHand').html(data.stockOnHand);
            if(data.stockInOutAmt)
            {
                $('#inOutAmt').html(`${data.stockInOutAmt.stockInCount}<br>${data.stockInOutAmt.stockOutCount}`);
            }
            $("#focCheckbox").prop("checked", data.focDetail == 1);
            if(data.productDetails)
            {
                $("#publishCheckbox").prop("checked", data.productDetails.is_published == 1);
                $("#archiveCheckbox").prop("checked", data.productDetails.is_archive == 1);
                $("#ignoreStockCountCheckbox").prop("checked", data.productDetails.ignore_stock_count == 1);
                productName = data.productDetails.name;
                skuCode = data.productDetails.skuCode;
                $("#weight").val(data.productDetails.weight);
                $('#bestBefore').val(data.productDetails.expired_day);
                $('#reminderDays').val(data.productDetails.reminder_day);
                $('#description').val(data.productDetails.description);
                $('#cost').val(numberThousand(data.productDetails.cost,2));
                $('#salePrice').val(numberThousand(data.productDetails.sale_price, 2));
                $('#cookingTime').val(data.productDetails.cooking_time);
                $('#cookingSuggestion').val(data.productDetails.suggestionName);
            }
            $('#publishCheckbox').prop('disabled', true);
            $('#archiveCheckbox').prop('disabled', true);
            $('#ignoreStockCountCheckbox').prop('disabled', true);
            $('#focCheckbox').prop('disabled', true);
            cookingSuggest = data.cookingDetail;
            $("#invProductName").val(productName);
            $("#skuCode").val(skuCode);

            var productNameEnglish = "";
            var productNameChinese = "";
            var descEnglish = "";
            var descChinese = "";
            invTranslationList = data.invTranslationList;
            if(invTranslationList)
            {
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
            }

            $('#invProductNameChinese').val(productNameChinese);
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
                        <option value="${v['id']}">${v['name']}(RM `+numberThousand(v['price'], 2)+`)</option>
                    `;
                });
            }
            $("#deliveryMethod").html(deliveryMethodOption);
            if(data.productDetails)
            {
                $("#deliveryMethod").val(data.productDetails.delivery_method);
            }
            

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
                if(data.cookingDescription[0]){
                    $('#fullInstruction').val(data.cookingDescription[0]);
                }
                if(data.cookingDescription[1]){
                    $('#fullInstruction2').val(data.cookingDescription[1]);
                }
            }

            var buildSupplier = "";
            if(data.supplierList) {
                $.each(data.supplierList, function(k, v) {
                    buildSupplier += `
                        <option value="${v['supplierID']}">${v['code']} - ${v['name']}</option>
                    `
                });
                $('#vendorName').append(buildSupplier);
            }
            if(data.productDetails)
            {
                vendorId = data.productDetails.vendor_id;
            }
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
            if(data.productDetails)
            {
                $("#productType").val(data.productDetails.product_type);
            }

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

            $(".addCookingSuggestBtn").show();
            $(".addImgBtn").show();

            if(data.cookingDetail){
                addCookingSuggest(data.cookingDetail);
            }

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

            if(data.productDetails){
                if(data.productDetails.media != '') {
                    $.each(data.productDetails.media, function(k,v) {
                        if(v['type'] == 'video') {
                            // videoId.push(v['id']);
        
                            // $('#video'+(k+1)).val(v['url']);
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
                                        <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="uploadType${addImgIDNum}" value="video">
                                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">
                                        <div>
                                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
                                            <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Video Uploaded</span>
                                            <!-- <span id="fileName${addImgIDNum}" class="fileName">
                                                ${v.name}
                                            </span> -->
                                            <img id="thumbnailImg${addImgIDNum}" src="${v.url}" style="width:100%;" />
                                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="padding: 6px;" onclick="showVideo('${addImgIDNum}')">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;
                
                            $("#buildVideo").append(buildImg);
                            // $("#productVideoDiv").hide();
                            $(`#fileNotUploaded${addImgIDNum}`).hide();
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
                                        <input type="hidden" id="uploadType${addImgIDNum}" value="${v.type}">
                                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                        <div>
                                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                        else if(v['type'] == 'coverImg') {
                            addImgCount = addImgCount + 1;
                            addImgIDNum = addImgIDNum + 1;
                
                            var buildImg = "";
                
                            buildImg += `
                                <div class="col-sm-4 col-xs-12">
                                    <div class="popupMemoImageWrapper" imageFlag="0">
                            `;
                
                            buildImg +=`
                                        <a href="javascript:;" class="closeBtn" onclick="closeCoverDivImg(this)">×</a>
                                        <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                        <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                                        <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                                        <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="uploadType${addImgIDNum}" value="coverImg">
                                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                        <div>
                                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                
                            $("#buildCoverImg").append(buildImg);
                            $("#coverImg").hide();
                            $(`#fileNotUploaded${addImgIDNum}`).hide();
                        }
                        else if(v['type'] == 'degreeImg') {
                            addImgCount = addImgCount + 1;
                            addImgIDNum = addImgIDNum + 1;
                
                            var buildImg = "";
                
                            buildImg += `
                                <div class="col-sm-4 col-xs-12">
                                    <div class="popupMemoImageWrapper" imageFlag="0">
                            `;
                
                            buildImg +=`
                                        <a href="javascript:;" class="closeBtn" onclick="closeDegreeDivImg(this)">×</a>
                                        <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                        <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                                        <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                                        <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="uploadType${addImgIDNum}" value="degreeImg">
                                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                        <div>
                                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                
                            $("#buildDegreeImg").append(buildImg);
                            $("#degreeImg").hide();
                            $(`#fileNotUploaded${addImgIDNum}`).hide();
                        }
                        else if(v['type'] == 'topImg') {
                            addImgCount = addImgCount + 1;
                            addImgIDNum = addImgIDNum + 1;
                
                            var buildImg = "";
                
                            buildImg += `
                                <div class="col-sm-4 col-xs-12">
                                    <div class="popupMemoImageWrapper" imageFlag="0">
                            `;
                
                            buildImg +=`
                                        <a href="javascript:;" class="closeBtn" onclick="closeTopDivImg(this)">×</a>
                                        <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                        <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                        <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                                        <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                                        <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                        <input type="hidden" id="uploadType${addImgIDNum}" value="topImg">
                                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                        <div>
                                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                
                            $("#buildTopImg").append(buildImg);
                            $("#topImg").hide();
                            $(`#fileNotUploaded${addImgIDNum}`).hide();
                        }
                    });
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
            if(data && data.video){
                $('#cookingURL'+temp_id).val(data.video);
            }
            if(data && data.description){
                $('#fullInstruction'+temp_id).val(data.description);
            }
            if(data && data.cookingTime){
                $('#cookingTime'+temp_id).val(data.cookingTime);
            }
            if(!data){
                console.log('trigg1');
                $('#cookingURL'+temp_id).val('');
                $('#fullInstruction'+temp_id).val('');
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
                        <input type="hidden" id="uploadType${addImgIDNum}" value="Image">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this); checkFileSize('${addImgIDNum}', this, 'errorspan');">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                    <div id="errorContainer${addImgIDNum}" class="errorSpan text-danger"></div>
                </div>
            `;

            $("#buildImg").append(buildImg);
        }

        
        function addCoverImg() {
            addImgCount = addImgCount + 1;
            addImgIDNum = addImgIDNum + 1;

            var buildImg = "";

            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeCoverDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="coverImg">
                        <input type="hidden" id="uploadType${addImgIDNum}" value="coverImg">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this); checkFileSize('${addImgIDNum}', this, 'errorspan');">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                    <div id="errorContainer${addImgIDNum}" class="errorSpan text-danger"></div>
                    
                </div>
            `;

            $("#buildCoverImg").append(buildImg);
            $("#coverImg").hide();
        }

        function checkFileSize(addImgID, input, errorSpanId) {
            const maxFileSizeInBytes = 100 * 1024 * 1024; 
            const file = input.files[0]; 
            const errorContainer = document.getElementById(`errorContainer${addImgID}`);
            errorContainer.innerHTML = '';


            if (file && file.size > maxFileSizeInBytes) {
                errorContainer.innerHTML = '<span class="errorSpan text-danger">File size is too big. Only files up to 100MB are allowed.</span>';
                input.value = ''; 
            } else {
                errorContainer.innerHTML = '';
                errorMessageSpan.style.display = "none";

            }
        }

        function checkFileSizeVideo(addImgID, input, errorSpanId) {
            const maxFileSizeInBytes = 300 * 1024 * 1024; 
            const file = input.files[0]; 
            const errorContainer = document.getElementById(`errorContainer${addImgID}`);
            errorContainer.innerHTML = '';


            if (file && file.size > maxFileSizeInBytes) {
                errorContainer.innerHTML = '<span class="errorSpan text-danger">File size is too big. Only files up to 300MB are allowed.</span>';
                input.value = ''; 
            } else {
                errorContainer.innerHTML = '';
                errorMessageSpan.style.display = "none";

            }
        }

        function addDegreeImg() {
            addImgCount = addImgCount + 1;
            addImgIDNum = addImgIDNum + 1;

            var buildImg = "";

            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDegreeDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="hidden" id="uploadType${addImgIDNum}" value="degreeImg">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this); checkFileSize('${addImgIDNum}', this, 'errorspan');">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                    <div id="errorContainer${addImgIDNum}" class="errorSpan text-danger"></div>

                </div>
            `;

            $("#buildDegreeImg").append(buildImg);
            $("#degreeImg").hide();
        }

        function addTopImg() {
            addImgCount = addImgCount + 1;
            addImgIDNum = addImgIDNum + 1;

            var buildImg = "";

            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeTopDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="hidden" id="uploadType${addImgIDNum}" value="topImg">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this); checkFileSize('${addImgIDNum}', this, 'errorspan');">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
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
                    <div id="errorContainer${addImgIDNum}" class="errorSpan text-danger"></div>

                </div>
            `;

            $("#buildTopImg").append(buildImg);
            $("#topImg").hide();
        }

        function addVideo() {
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
                        <input type="hidden" id="uploadType${addImgIDNum}" value="video">
                        <input type="file" id="fileVideoUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this); checkFileSizeVideo('${addImgIDNum}', this, 'errorspan');">

                        <div>
                            <a href="javascript:;" onclick="$('#fileVideoUpload${addImgIDNum}').click()" class="btn custom-button2">Upload</a>
                            <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Video Uploaded</span>
                            <!-- <span id="fileName${addImgIDNum}" class="fileName">No Video Uploaded</span> -->
                            <img id="thumbnailImg${addImgIDNum}" style="width:100%;" />
                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showVideo('${addImgIDNum}')">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div id="errorContainer${addImgIDNum}" class="errorSpan text-danger"></div>
                </div>
            `;

            $("#buildVideo").append(buildImg);
        }

        function closeDiv(button, sectionNumber) {
            if(!viewMode)
            {
                var sectionId = "#cookingSuggestionSection" + sectionNumber;
                $(sectionId).remove();
                addCSCount = addCSCount - 1;
                $('.addCookingSuggestBtn').show();
            }
        }

        function closeDivImg(n) {
            if(actionType == "add"){
                viewMode = false
            }
            if(!viewMode)
            {
                addImgCount = addImgCount - 1;

                var img = $(n).parent().find('[id^="storeFileID"]').val();
                var uploadType = $(n).parent().find('[id^="uploadType"]').val();
                if(typeof(img) != 'undefined') {
                    imageId.push(img);
                }
                $(n).parent().parent().remove();

                if(uploadType == 'video')
                {
                    videoId.push(img);
                }

                $("#imgTypeError").html("");
                $("#imgError").html("");
            }
        }

        function closeCoverDivImg(n) {
            if(actionType == "add"){
                viewMode = false
            }
            if(!viewMode)
            {
                addImgCount = addImgCount - 1;
    
                var img = $(n).parent().find('[id^="storeFileID"]').val();
    
                if(typeof(img) != 'undefined') {
                    imageId.push(img);
                }
                $(n).parent().parent().remove();
    
                $("#imgTypeError").html("");
                $("#imgError").html("");
                $("#coverImg").show();
            }
        }

        function closeDegreeDivImg(n) {
            if(actionType == "add"){
                viewMode = false
            }
            if(!viewMode)
            {
                addImgCount = addImgCount - 1;
    
                var img = $(n).parent().find('[id^="storeFileID"]').val();
    
                if(typeof(img) != 'undefined') {
                    imageId.push(img);
                }
                $(n).parent().parent().remove();
    
                $("#imgTypeError").html("");
                $("#imgError").html("");
                $("#degreeImg").show();
            }
        }

        function closeTopDivImg(n) {
            if(actionType == "add"){
                viewMode = false
            }
            if(!viewMode)
            {
                addImgCount = addImgCount - 1;
    
                var img = $(n).parent().find('[id^="storeFileID"]').val();
    
                if(typeof(img) != 'undefined') {
                    imageId.push(img);
                }
                $(n).parent().parent().remove();
    
                $("#imgTypeError").html("");
                $("#imgError").html("");
                $("#topImg").show();
            }
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
            $('#showImage').appendTo("body").modal('show');
        }

        function showVideo(n){
            $("#modalVideo").attr('style','display: block');
            var imageSrc = $("#storeFileData"+n).val();
            $("#modalVideo").attr('src', imageSrc);
            $("#modalImg").attr('style','display:none');
            $('#showImage').appendTo("body").modal('show');
        }

        function displayFileName(id, n) {
            var dFileName = $("#fileName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    dFileName.text(n.files[0]["name"]);

                    const file = n.files[0];

                    $("#storeFileData"+id).val(reader["result"]);
                    $("#storeFileName"+id).val(n.files[0]["name"]);
                    $("#storeFileSize"+id).val(n.files[0]["size"]);
                    $("#storeFileType"+id).val(n.files[0]["type"]);
                    $("#storeFileFlag"+id).val('1');

                    if((n.files[0]["type"]).split('/')[0] === 'image'){
                        $("#storeFileUploadType"+id).val('image');
                        uploadFileType = 'image';
                        inputImgFile = {
                            file : file,
                        }
                        imgFileDataArray.push(inputImgFile);
                    }else{
                        $("#storeFileUploadType"+id).val('video');
                        uploadFileType = 'video';
                        inputVideoFile = {
                            file : file,
                        }
                        videoFileDataArray.push(inputVideoFile);
                    }

                    $("#viewImg"+id).css('display', 'inline-block');
                    $("#deleteImg"+id).css('display', 'inline-block');
                    $("#fileNotUploaded"+id).hide()
                    $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val());
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations!', 'edit', 
                ['Product.php', {
                    id: data.productID,
                }]
            );
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

        function verificationCallback(data, message) {
            showMessage("Confirm Add Product?", 'warning', "Add Product", '', '', ['Confirm']);
            $('#canvasConfirmBtn').click(function() {
                var formData = createdData;
                formData['command'] = 'addProductInventory';
                formData['isPackage']=="1" ? fCallback=submitCallback : fCallback=addProductSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }

        function addProductSuccess(data, message) {
            showMessage('Add Product Success', 'success', 'Congratulations!', 'plus', 
                ['Product.php', {
                    id: data.productID,
                }]
            );

            // showMessage("Add Product Success.", 'success', 'Congratulations!', 'plus', 'getProductInventory.php');
        }

        $('#invProductName').click(function() {
            if ($(this).prop('readonly') || $(this).is(':disabled')) {
                return;
            }

            var englishProductName = $('#invProductName').val();
            if (englishProductName != '') {
                $('#invProductNameEnglish').val(englishProductName);
            }
            $('#productTranslateNameModal').appendTo("body").modal('show');
        });

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

                    var buildSuggestion =`
                        <div class="section-wrapper m-t-10 m-b-10 cookingSuggestionSection" id="cookingSuggestionSection${cTNum}" style="border-radius: 0px;">
                            <div class="section">
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label customFont" for="branchName">Template Name</label>
                                        <select id="cookingTemplate${cTNum}" class="form-control cookingSuggestInput" readonly selected="${suggestionName}" onchange="getVideoURL(${cTNum})" disabled>
                                            ${buildOption}
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label customFont" for="videoInstruction">Video Instruction</label>
                                        <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="${description}" readonly></input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label customFont" for="cookingURL">Cooking URL</label>
                                        <input id="cookingURL${cTNum}" type="text" class="form-control urlInput" value="${suggestionUrl}" disabled></input>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label customFont" for="cookingTime">Cooking Time</label>
                                        <input id="cookingTime${cTNum}" type="text" class="form-control urlCookingTime" value="${cookingTime}" disabled></input>
                                    </div>
                                </div>
                                
                                <!-- Single "Remark" input -->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label customFont" for="remark">Remark</label>
                                        <input id="cookingRemark${cTNum}" type="text" class="form-control remarkInput" value="${suggestionRemark}" onclick="openRemarkModal(${cTNum})" disabled></input>
                                        <input id="cookingRemarkEn${cTNum}" type="text" class="form-control urlRemark" value="${suggestionRemark}" style="display:none;"></input>
                                        <input id="cookingRemarkCn${cTNum}" type="text" class="form-control urlRemark" value="${suggestionRemarkChinese}" style="display:none;"></input>
                                    </div>
                                </div>
                                <div style="padding-left: 10px; margin-top: 10px;"> <!-- Adjust margin-top for spacing -->
                                    <button id="deleteVendorAddress1" type="button" class="custom-button1 deleteVendorAddress" onclick="closeDiv(this, ${addCSCount})">
                                        <?php echo 'Discard'; ?>
                                    </button>
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
                    <div class="section-wrapper m-t-10 m-b-10 cookingSuggestionSection" id="cookingSuggestionSection${cTNum}" style="border-radius: 0px;">
                        <div class="section">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label customFont" for="branchName">Template Name</label>
                                    <select id="cookingTemplate${cTNum}" class="form-control cookingSuggestInput" readonly selected="${suggestionName}" onchange="getVideoURL(${cTNum})">
                                        ${buildOption}
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label customFont" for="videoInstruction">Video Instruction</label>
                                    <input id="fullInstruction${cTNum}" type="text" class="form-control fullInstructionInput" value="" readonly></input>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label customFont" for="cookingURL">Cooking URL</label>
                                    <input id="cookingURL${cTNum}" type="text" class="form-control urlInput" value=""></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label customFont" for="cookingTime">Cooking Time</label>
                                    <input id="cookingTime${cTNum}" type="text" class="form-control urlCookingTime" value=""></input>
                                </div>
                            </div>
                            
                            <!-- Single "Remark" input -->
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label customFont" for="remark">Remark</label>
                                    <input id="cookingRemark${cTNum}" type="text" class="form-control remarkInput" onclick="openRemarkModal(${cTNum})"></input>
                                    <input id="cookingRemarkEn${cTNum}" type="text" class="form-control urlRemark" value="" style="display:none;"></input>
                                    <input id="cookingRemarkCn${cTNum}" type="text" class="form-control urlRemark" value="" style="display:none;"></input>
                                </div>
                            </div>
                            <div style="padding-left: 10px; margin-top: 10px;"> <!-- Adjust margin-top for spacing -->
                                <button id="deleteVendorAddress1" type="button" class="custom-button1 deleteVendorAddress" onclick="closeDiv(this, ${addCSCount})">
                                    <?php echo 'Discard'; ?>
                                </button>
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
                if(cookingDetails)
                {
                    var suggestionName = cookingDetails[i].name;
                }
                for (var j = 0; j < selectElement.options.length; j++) {
                    var option = selectElement.options[j];
                    if (option.value === suggestionName) {
                        option.selected = true;
                        break;
                    }
                }
            }
        }

        $('#submitProductName').click(function() {
            $('#invProductName').val('');
            var englishProductName = $('#invProductNameEnglish').val();

            $('#invProductName').val(function(index, currentValue) {
                return currentValue + englishProductName;
            });

            $('#productTranslateNameModal').modal('hide');
        })

        $('#description').click(function() {
            if ($(this).prop('readonly') || $(this).is(':disabled')) {
                return;
            }

            var englishProductDescription = $('#description').val();
            if(englishProductDescription != '')
            {
                $('#invProductDescriptionEnglish').val(englishProductDescription);
            }
            $('#productTranslateDescriptionModal').appendTo("body").modal('show');
        })

        $('#submitProductDescription').click(function() {
            $('#description').val('');
            var englishProductDescription = $('#invProductDescriptionEnglish').val();

            $('#description').val(function(index, currentValue) {
                return currentValue + englishProductDescription;
            });

            $('#productTranslateDescriptionModal').modal('hide');
        })

        function openRemarkModal(remarkNo) 
        {
            if ($(this).prop('readonly') || $(this).is(':disabled')) {
                return;
            }

            var englishField = $('#cookingRemark'+remarkNo).val();
            $('#invProductRemarkEnglish').val('');
            $('#remarkChinese').val('');
            $('#hiddenRemark').data('remarkno', remarkNo);
            var hiddenRemark = $('#hiddenRemark').data('remarkno');

            // get the current cooking remark for both language
            var englishField = $('#cookingRemarkEn'+remarkNo).val();
            var chineseField = $('#cookingRemarkCn'+remarkNo).val();

            $('#remarkChinese').val(chineseField);
            $('#invProductRemarkEnglish').val(englishField);
            $('#productTranslateRemarkModal').appendTo("body").modal('show');
        }


        $('#submitProductRemark').click(function() {
            var hiddenRemark = $('#hiddenRemark').data('remarkno');
            // empty all value
            $('#cookingRemark'+hiddenRemark).val('');
            $('#cookingRemarkEn'+hiddenRemark).val('');
            $('#cookingRemarkCn'+hiddenRemark).val('');

            var invProductRemarkEnglish = $('#invProductRemarkEnglish').val();
            var remarkChinese = $('#remarkChinese').val();
            var englishField = $('#cookingRemark'+hiddenRemark).val();
            $('#cookingRemark'+hiddenRemark).val(invProductRemarkEnglish);

            // assign to hidden value
            $('#cookingRemarkEn'+hiddenRemark).val(invProductRemarkEnglish);
            $('#cookingRemarkCn'+hiddenRemark).val(remarkChinese);

            $('#productTranslateRemarkModal').modal('hide');
        })

        $('#editProduct').click(function() {
            var productNameInput = document.getElementById('invProductName');
            var descriptionInput = document.getElementById('description');
            var costInput = document.getElementById('cost');
            var salePriceInput = document.getElementById('salePrice');
            var bestBeforeInput = document.getElementById('bestBefore');
            var reminderDaysInput = document.getElementById('reminderDays');
            var categorySelect = document.getElementById('category');
            var deliveryMethodSelect = document.getElementById('deliveryMethod');
            
            productNameInput.removeAttribute('readonly');
            $("#vendorName").prop("disabled", false);
            $("#category").prop("disabled", false);
            $("#deliveryMethod").prop("disabled", false);
            descriptionInput.removeAttribute('readonly');
            costInput.removeAttribute('readonly');
            salePriceInput.removeAttribute('readonly');
            bestBeforeInput.removeAttribute('readonly');
            reminderDaysInput.removeAttribute('readonly');
            categorySelect.removeAttribute('readonly');
            deliveryMethodSelect.removeAttribute('readonly');
            $("#editProduct").hide();
            $("#createProductNav").hide();
            $("#backBtn").hide();
            $("#updateProduct").show();
            $("#cancelEditBtn").show();
            $("#addNewCookingBtn").prop("disabled", false);
            $('#publishCheckbox').prop('disabled', false);
            $('#archiveCheckbox').prop('disabled', false);
            $('#ignoreStockCountCheckbox').prop('disabled', false);
            $('#focCheckbox').prop('disabled', false);
            viewMode = false;

            var cookingSuggestInputs = document.querySelectorAll(".cookingSuggestInput");

            cookingSuggestInputs.forEach(function(input) {
                input.disabled = false;
            });

            var fullInstructionInputs = document.querySelectorAll(".fullInstructionInput");

            fullInstructionInputs.forEach(function(input) {
                input.disabled = false;
            });

            var urlInputs = document.querySelectorAll(".urlInput");

            urlInputs.forEach(function(input) {
                input.disabled = false;
            });

            var cookingTimeInputs = document.querySelectorAll(".urlCookingTime");

            cookingTimeInputs.forEach(function(input) {
                input.disabled = false;
            });

            var remarkInputs = document.querySelectorAll(".remarkInput");

            remarkInputs.forEach(function(input) {
                input.disabled = false;
            });

            var deleteCookingSuggestBtn = document.querySelectorAll(".deleteVendorAddress");

            deleteCookingSuggestBtn.forEach(function(input) {
                input.disabled = false;
            });

        })

        $('#cancelEditBtn').click(function() {
            $.redirect("Product.php",{id: id});
        })

        $('#createProductNav').click(function() {
            var actionType = "add";
            $.redirect("Product.php", {actionType, actionType})
        })

        function handleFileUpload(file, action) {
            console.log('handle file', file);
            file.forEach(function(file, index) {
                var formData = {
                    command  : "awsGeneratePreSignedUrl",
                    action   : "upload",
                    mimeType : file.file.type,
                };
                ajaxSend(url, formData, method, function(data, message) {
                    verificationImgVideoLink(data, message, file, action);  // Pass the file to the function
                }, debug, bypassBlocking, bypassLoading, 0);
            });
        }

        function verificationImgVideoLink(data, message, file, action){
            const presignedUrl = data;
            $.ajax({
                type: 'PUT',
                url: presignedUrl,
                contentType: 'binary/octet-stream',
                processData: false,
                crossDomain : true,
                data: file.file,
                headers: {
                    'x-amz-acl': 'public-read',
                    'Access-Control-Allow-Headers' : 'Content-Type, Authorization',
                    'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE',
                },
                })
                .success(function() {
                })
                .error(function() {
            })

            const indexOfDO = presignedUrl.indexOf('?');
            const extractedUrl = presignedUrl.substring(0, indexOfDO);
            console.log('file', file);
            if (file.file.type.startsWith('image/'))
            {
                if(file.imgName && extractedUrl && file.uploadType)
                {
                    uploadImage.push({
                        imgName : file.imgName,
                        imgData : extractedUrl,
                        uploadType : file.uploadType,
                    });
                }
                imgUploadFinishFile.push({
                    file : file.file,
                })
            }
            else
            {
                uploadVideo.push({
                    vidName : file.imgName,
                    vidData : extractedUrl,
                    uploadType : file.uploadType,
                });
                videoUploadFinishFile.push({
                    file : file.file,
                })
            }

            if(imgFileDataArray.length == imgUploadFinishFile.length && videoFileDataArray.length == videoUploadFinishFile.length)
            {
                if(action != 'edit')
                {
                    $('[id$="Error"]').text("");
    
                    $(".errorSpan").empty()
    
                    var productNameArr = [];
                    var productNameEnglish = document.getElementById("invProductNameEnglish").value;
                    var productNameChinese = document.getElementById("invProductNameChinese").value;
                    var englishObj = {
                    language: "english",
                    name: productNameEnglish
                    // name: productName
                    };
    
                    var chineseObj = {
                    language: "chinese",
                    name: productNameChinese
                    };
    
                    productNameArr.push(englishObj);
                    productNameArr.push(chineseObj);
    
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
                        var remarkEnglishElement = document.getElementById("cookingRemarkEn" + (j + 1));
                        var remarkChineseElement = document.getElementById("cookingRemarkCn" + (j + 1));
    
                        if (remarkEnglishElement && remarkChineseElement) {
                        // if (remarkEnglishElement) {
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
                            // var remarkObj = [englishRemark];
                            remarkArray.push(remarkObj);
                        }
                    }
    
                    var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                    var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                    var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                    var foc = $("#focCheckbox").is(":checked") ? 1 : 0;
                    var category = [];
                    var productType = $("#productType").val();
                    var expiredDay = $('#bestBefore').val();
                    var reminderDays = $('#reminderDays').val();
                    var cost = $('#cost').val();
                    var salePrice = $('#salePrice').val();
                    var cookingSuggestion = $('#cookingSuggestion').val();
                    var deliveryMethod = document.getElementById("deliveryMethod").value;
                    var vendorId = $('#vendorName option:selected').val();
                    var video = $('#video').val();
                    var packageProduct = [];
                    var skuCode = $('#skuCode').val();;
    
                    cookingSuggestionName = [];
                    $(".cookingSuggestInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestName = {
                            content : getValue
                        };
                        cookingSuggestionName.push(buildCookingSuggestName);
                    });
    
                    cookingSuggestionUrl = [];
                    $(".urlInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestUrl = {
                            content : getValue
                        };
                        cookingSuggestionUrl.push(buildCookingSuggestUrl);
                    });
    
                    cookingSuggestionRemark = [];
                    $(".remarkInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestRemark = {
                            content : getValue
                        };
                        cookingSuggestionRemark.push(buildCookingSuggestRemark);
                    });
    
                    $('.includecategoryTag').each(function (index, value) {  
                        category.push(value.id);
                    });
    
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
    
                    var formData  = {
                        command           : 'verifyAddProductInventory',
                        descriptionArr    : descriptionArr,
                        remarkArray       : remarkArray,
                        productNameArr    : productNameArr,
                        skuCode           : skuCode,
                        productType       : 'product',
                        expired_day       : expiredDay,
                        reminderDays      : reminderDays,
                        cost              : cost,
                        salePrice         : salePrice,
                        cookingSuggest    : cookingSuggestion,
                        vendorId          : vendorId,
                        category          : category,
                        video             : video,
                        deliveryMethod    : deliveryMethod,
                        cookingSuggestionName: cookingSuggestionName,
                        cookingSuggestionUrl : cookingSuggestionUrl,
                        cookingSuggestionRemark : cookingSuggestionRemark,
                        uploadImage       : uploadImage,
                        uploadVideo       : uploadVideo,
                        publishStatus     : publishStatus,
                        archiveStatus     : archiveStatus,
                        ignoreStatus      : ignoreStatus,
                        foc               : foc,
                    };
                    if(isVariant == "1") {
                        formData['isVariant'] = isVariant;
                        formData['variants']  = variants;
                    }
    
                    if(productType == 'Package') {
                        formData['packageProduct'] = packageProduct;
                    }
    
                    createdData = formData;
                    fCallback = verificationCallback;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
                else
                {
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
                        var remarkEnglishElement = document.getElementById("cookingRemarkEn" + (j + 1));
                        var remarkChineseElement = document.getElementById("cookingRemarkCn" + (j + 1));

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
                    var code = $("#skuCode").val();
                    var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                    var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                    var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                    var foc = $("#focCheckbox").is(":checked") ? 1 : 0;
                    var productType = $("#productType").val();
                    var expiredDay = $('#bestBefore').val();
                    var reminderDays = $('#reminderDays').val();
                    var description = $('#description').val();
                    var cost = $('#cost').val();
                    var salePrice = $('#salePrice').val();
                    var cookingTime = $('#cookingTime').val();
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

                    cookingSuggestionName = [];
                    $(".cookingSuggestInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestName = {
                            content : getValue
                        };
                        cookingSuggestionName.push(buildCookingSuggestName);
                    });

                    cookingSuggestionUrl = [];
                    $(".urlInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestUrl = {
                            content : getValue
                        };
                        cookingSuggestionUrl.push(buildCookingSuggestUrl);
                    });

                    cookingFullInstruction = [];
                    $(".fullInstuctionInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingFullInstruction = {
                            content : getValue
                        };
                        cookingFullInstruction.push(buildCookingFullInstruction);
                    });

                    cookingSuggestionRemark = [];
                    $(".remarkInput").each(function(){
                        var getValue = $(this).val();
                        buildCookingSuggestRemark = {
                            content : getValue
                        };
                        cookingSuggestionRemark.push(buildCookingSuggestRemark);
                    });

                    var packageData = [];
                    var variants = '';
                    $('.includePackageTag').each(function (index, value) {  
                        packageProduct.push(value.id);
                    });

                    if(video == '' && video2 == '') {
                        videoList = [];
                    } else {
                        videoList = [
                            video, video2
                        ];
                    }

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
                        publishStatus   : publishStatus,
                        archiveStatus   : archiveStatus,
                        ignoreStatus    : ignoreStatus,
                        productType     : 'product',
                        expired_day     : expiredDay,
                        reminderDays    : reminderDays,
                        description     : description,
                        cost            : cost,
                        salePrice       : salePrice,
                        cookingTime     : cookingTime,
                        vendorId        : vendorId,
                        category        : category,
                        videoList       : videoList,
                        videoId         : videoId,
                        uploadImage     : uploadImage,
                        uploadVideo     : uploadVideo,
                        imageId         : imageId,
                        deliveryMethod  : deliveryMethod,
                        cookingSuggestionName   : cookingSuggestionName,
                        cookingSuggestionUrl    : cookingSuggestionUrl,
                        cookingSuggestionRemark : cookingSuggestionRemark,
                        cookingFullInstruction : cookingFullInstruction,
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
                }
            }
        }

        function loadJournalLog(data, message) {
            if(data.journal_list){

                $("#journalSection").empty();

                var html = '';
                $.each(data.journal_list, function (k, v) {
                    html += '<div class="card-box m-t-10" style="background-color: #eee; color: black;">';
                    html += '<div class="customFont">'+v['action_user']+'</div>';
                    html += '<div>'+v['action_msg']+'</div>';

                    if(v['msg']){
                        html += '<div><ul>';
                        $.each(v['msg'], function (k2, v2) {
                            html += '<li>'+v2+'</li>';
                        });
                        html += '</ul></div>';
                    }

                    html += '</div>';
                });

                $("#journalSection").append(html);

            }
        }

        $('#printButton').click(function() {
            printPageArea('printPreviewArea');
        });

        function printPageArea(areaID){
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }

    </script>
</body>
</html>