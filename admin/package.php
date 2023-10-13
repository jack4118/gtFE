
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
                            <?php if($_POST['packageID']) { ?>
                                <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Package / Edit Package' ?></span>
                            <?php } else { ?>
                                <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Package / Create Package' ?></span>
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

                    <div class="row customRow m-t-15">
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
                                        <label for="productName" class="col-md-3 col-form-label customFont">Package Name (EN)</label>
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
                                            <span id="vendorIdError" class="errorSpan text-danger"></span>
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
                                            <button onclick="addCookingSuggest()" class="text-white" style="padding: 5px 10px; background: #3a5999; border: 1px solid #ccc;">
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

                                    <div class="row" style="margin-top:40px">
                                        <div class="col-md-12 m-t-15">
                                            <table id="productTable" class="customTable table m-b-20">
                                                <caption class="customFont" style="color:#3a5999;">Package Product</caption>
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total Cost</th>
                                                        <th><i class="fa fa-ellipsis-v"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            
                                            <button class="custom-button2" onclick="addRow('add')" id="addProductRow">Add Product</button>
                                            <button class="custom-button1" onclick="addMystery('add')" id="addMysteryRow">Add Mystery Food</button>
                                        </div>
                                        <span id="packageError" class="errorSpan text-danger"></span>

                                    </div>

                                    <div class="form-group row">
                                        <label for="cost" class="col-md-3 col-form-label customFont">Cost</label>
                                        <div class="col-md-9">
                                            <input id="package_cost" type="number" class="form-control" readonly style="margin-left: 0px;">
                                            <span id="costError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="salePrice" class="col-md-3 col-form-label customFont">Sales Price</label>
                                        <div class="col-md-9">
                                            <input id="salePrice" type="number" class="form-control" readonly style="margin-left: 0px;"  oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                            <div><span id="costSuggest" class=""></span></div>
                                            <div><span id="salePriceError" class="errorSpan text-danger"></span></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="journalSection">
                            <?php if(!$_POST['packageID']) { ?>
                                <div class="card-box m-t-10" style="background-color: #eee; color: black;">
                                    <div class="customFont"><?php echo $_SESSION['username'] ?></div>
                                    <div>Creating a new Package...</div>
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
        var fCallback       = '';

        var addImgCount     = 0;
        var addImgIDNum     = 0;
        var products        = [];
        var uploadImage = [];
        var uploadVideo = [];
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
        var imageId = [];
        var videoId = [];
        var rowIndex = 1;
        var goCalc = false;
        var discountPercentage = 0;
        var sale_price_total;
        var counter = 1;
        var actionType = "<?php echo $_POST['actionType']; ?>";
        var wrapperLength = 1;
        var html = `<option value="">Select Product</option>`;
        var invPackageID = "<?php echo $_POST['packageID']; ?>";
        var viewMode = true;
        var imgFileDataArray = [];
        var videoFileDataArray = [];
        var imgUploadFinishFile = [];
        var videoUploadFinishFile = [];

        $(document).ready(function() {

            if(actionType == "add")
            {
                var productNameInput = document.getElementById('invProductName');
                var descriptionInput = document.getElementById('description');
                // var costInput = document.getElementById('cost');
                var salePriceInput = document.getElementById('salePrice');
                // var bestBeforeInput = document.getElementById('bestBefore');
                // var reminderDaysInput = document.getElementById('reminderDays');
                var categorySelect = document.getElementById('category');
                var deliveryMethodSelect = document.getElementById('deliveryMethod');
                
                productNameInput.removeAttribute('readonly');
                $("#vendorName").prop("disabled", false);
                descriptionInput.removeAttribute('readonly');
                // costInput.removeAttribute('readonly');
                salePriceInput.removeAttribute('readonly');
                // bestBeforeInput.removeAttribute('readonly');
                // reminderDaysInput.removeAttribute('readonly');
                categorySelect.removeAttribute('readonly');
                deliveryMethodSelect.removeAttribute('readonly');
                $("#editProduct").hide();
                $("#createProductNav").hide();
                $("#updateProduct").hide();
                $("#cancelEditBtn").hide();

                var formData  = {
                    command     : 'getPackageDetail',
                };

                fCallback = createLoadPackageDetail;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                var formData  = {
                    command: 'getProductInventoryDetails'
                };
                fCallback = createLoadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

                $('#package').change(function(){
                    var packageID   = $(this).find("option:selected").val();
                    var package     = $(this).find("option:selected").text();
                    var input       = $(this).attr('id');
                    var quantity    = $(this).attr('data-value') || 1;
                    var sale_price; 

                    let = newProductList;
                    $.each(newProductList, function(k, v) { 
                        if(v['id'] == packageID) {
                            sale_price = v['cost'];
                        }
                    })

                
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
                                    <input id="quantity${packageID+counter}" onchange="checknumber(${packageID+counter})" type="number" class="form-control" name="quantity" value="${quantity}" size="7" placeholder="Quantity" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID+counter}')">
                                    <input id="sale_price${packageID+counter}" type="number" class="form-control" name="sale_price" value="${sale_price}" size="7" placeholder="Price" onclick="event.stopPropagation(); event.preventDefault();" style="margin-right: 20px;" oninput="calcTotalCost('${packageID+counter}')" readonly>
                                    <input id="total_cost${packageID+counter}" type="number" class="form-control total_cost" value="${sale_price}" name="total_cost" value="" size="7" placeholder="Cost" onclick="event.stopPropagation(); event.preventDefault();" style="cursor: not-allowed;" readonly>
                                    <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px; cursor: pointer;" onclick="deleteRecalc('${packageID+counter}')"></i>
                                </div>
                            </div>
                        `;
                        }
                        

                        $("#packageList").append(packDiv);

                        $(this).find("option:selected").remove();
                        $(this).val('');

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

                $('#backBtn').click(function() {
                    $.redirect('getPackageList.php');
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

                $('#vendorId').on('change', function() {
                    var vendorId = $(this).val();
                    getSkuProductCode(vendorId);
                });

            }
            else
            {
                getPackageProductList();
                $("#createProduct").hide();
                $("#updateProduct").hide();
                $("#cancelEditBtn").hide();
                var formData  = {
                    command: 'getProductInventoryDetails'
                };
                fCallback = assignDiscountPercentage;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }    

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

            $('#updateProduct').click(function() {
                var latestProductTable = getAllRowData();
                var salePrice       = $('#salePrice').val();
                salePrice = salePrice;

                // if( parseFloat(salePrice) >= sale_price_total ){
                    $('[id$="Error"]').text("");

                    var packageInvId    = '<?php echo $_POST['packageID'] ?>';
                    var invPackageName  = $('#invProductName').val();
                    var foc             = $("#focCheckbox").is(":checked") ? 1 : 0; 
                    var vendorId        = $('#vendorName option:selected').val();
                    var productType     = $('#productType').val();
                    var deliveryMethod = document.getElementById("deliveryMethod").value;
                    var skuCode = document.getElementById("skuCode").value;
                    
                    var category = [];
                    $('.includecategoryTag').each(function (index, value) {  
                        category.push(value.id);
                    });

                    var salePrice       = $('#salePrice').val();
                    var description     = $('#description').val();

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

                    // uploadImage = [];
                    // uploadVideo = [];
                    // uploadImageData = [];
                    // $(".popupMemoImageWrapper").each(function() { 
                    //     var imgID   = $(this).find('[id^="storeFileID"]').val();
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
                    //             if(imgData != "") {
                    //                 buildUploadImage = {
                    //                     vidName : imgName,
                    //                     imgFlag : imgFlag,
                    //                     imgSize : imgSize,
                    //                     uploadType : uploadType
                    //                 };
                                    
                    //                 reqData = {
                    //                     vidID   : imgID,
                    //                     vidName : imgName,
                    //                     vidData : JSON.stringify(imgData),
                    //                     uploadType : 'video'
                    //                 };
                                    
                    //                 uploadImageData.push(reqData);
                    //                 uploadVideo.push(reqData);
                    //             }
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

                        packageProduct.push(list);
                    });

                    var package = [];
                    var packageDesc = [];

                    var productNameEnglish = document.getElementById("invProductName").value;
                    var productNameChinese = document.getElementById("invProductNameChinese").value;

                    var englishObj = {
                    language: "english",
                    name: productNameEnglish
                    };

                    var chineseObj = {
                    language: "chinese",
                    name: productNameChinese
                    };

                    package.push(englishObj);
                    package.push(chineseObj);


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

                    packageDesc.push(buildNameDesc);
                    packageDesc.push(buildNameDescChinese);


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

                    var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                    var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                    var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                    if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
                    {
                        var formData  = {
                            command             : 'editPackageInventory',
                            packageInvId        : packageInvId,
                            invPackageName      : invPackageName,
                            productType         : 'package',
                            description         : description,
                            salePrice           : salePrice,
                            vendorId            : vendorId,
                            category            : category,
                            // uploadImage         : uploadImage,
                            // uploadVideo         : uploadVideo,
                            imageId             : imageId,
                            videoId             : videoId,
                            packageProduct      : latestProductTable,
                            isPublish           : publishStatus,
                            isArchive           : archiveStatus,
                            isIgnore            : ignoreStatus,
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
                        fCallback = successEditPackageInventory;
                        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    }
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
            getPackageDetail();
        }

        // $('#package_cost').on('change', function() {
        //     if($(this).val() == '') { 
        //         // $('#costSuggest').hide();
        //     } else {
        //         var cost = $('#package_cost').val(); 
        //         var sale_price = (cost * (100 + discountPercentage)) / 100;
        //         sale_price_total = sale_price;

        //         $('#costSuggest').text('Suggested sale price is RM ' + numberThousand(sale_price, 2));
        //     }
        // });

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

        function createLoadPackageDetail(data, message) {
            // Vendor Name
            var vendorList = data.supplierList;
            $.each(vendorList, function(k, v) {
                $('#vendorId').append(`<option value="${v['id']}" data-value="${v['vendor_code']}">${v['name']}</option>`);
                var name = v['name'].toLowerCase();
                if (/go tasty/i.test(name)) {
                    $('#vendorId').val(v['id']);

                    $("#vendorId").trigger("change");
                }
            });

            // Category
            var categoryList = data.packageCategoryList;
            $.each(categoryList, function(k, v) {
                $('#category').append(`<option value="${v['id']}">${v['name']}</option>`);
            });
            
            getPackageProductList();
        }

        function addRow() {
            var wrapper = `
                <tr>
                    <td>
                        <lable>Product</lable>
                        <select id="productSelect${wrapperLength}" onchange="loopSelect(${wrapperLength})"  class="form-control productSelect" required>
                        </select>
                    </td>
                    <td>
                        <label>Quantity</label>
                        <input id="quantity${wrapperLength}" type="number" oninput="calcTotalCost(${wrapperLength})" class="form-control quantityInput" value="1" placeholder="1" required/>
                    </td>
                    <td>
                        <label>Price</label>
                        <input id="cost${wrapperLength}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                    </td>
                    <td>
                        <label>Total</label>
                        <input id="total${wrapperLength}" type="number" value="0.00" class="form-control totalInput" readonly/>
                    </td>
                    <td>
                        <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            `;

            $("#productTable tbody").append(wrapper);

            var selectElement = $('#productSelect' + wrapperLength);

            // Initialize Select2
            selectElement.select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
            // Populate options
            newProductList.forEach(function(product, index) {
                var option = new Option(product.name, product.id);
                $(option).attr('data-cost', product.cost);
                selectElement.append(option);
            });

            // Event listener for select change
            selectElement.on('change', function() {
                var selectedOption = $(this).find(':selected');
                var productId = selectedOption.val();
                var productCost = selectedOption.data('cost');
                
                // Set product ID as a data attribute on the select element
                $(this).data('productid', productId);

            });

            var firstOption = selectElement.find('option:first');
            var firstOptionValue = firstOption.val();
            selectElement.val(firstOptionValue).trigger('change');

            loopSelect(wrapperLength);

            totalLoop.push(wrapperLength);
            wrapperLength++;
        }

        function addMystery() {
            var selectOptions = '';

            // Generate HTML options for the select based on newProductList
            selectOptions += `<option value="" data-cost="${0.00}">Mystery Food</option>`;

            var wrapper = `
                <tr>
                    <td>
                        <select id="productSelect${wrapperLength}" onchange="loopSelect(${wrapperLength});" class="form-control productSelect" required>
                            ${selectOptions} <!-- Append options here -->
                        </select>
                    </td>
                    <td>
                        <input id="quantity${wrapperLength}" type="number" oninput="calcTotalCost(${wrapperLength})" class="form-control quantityInput" value="1" placeholder="1" required/>
                    </td>
                    <td>
                        <input id="cost${wrapperLength}" type="number" step="0.01" value="0.00" oninput="calcTotalCost(${wrapperLength});" class="form-control costInput" value="0.00" required/>
                    </td>
                    <td>
                        <input id="total${wrapperLength}" type="number" value="0.00" class="form-control totalInput" readonly/>
                    </td>
                    <td>
                        <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            `;

            $("#productTable tbody").append(wrapper);

            // Update select2 options
            $('#productSelect' + wrapperLength).html(selectOptions);

            // Initialize select2
            $('#productSelect' + wrapperLength).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            loopSelect(wrapperLength);

            totalLoop.push(wrapperLength);
            wrapperLength++;
        }

        function loopSelect(id) {
            var select_id = id;
            var productSelect = "#productSelect" + select_id;
            var product_cost = $('option:selected', productSelect).attr('data-cost');
            var costID = "#cost" + select_id;
            $(costID).val(product_cost);

            $("#quantityInput" + id).keyup(id);
            $("#totalInput" + id).trigger('change');
            countSubtotal();
            loopQuantity(id);
        }

        function loopQuantity(id) { 
            this.value|=0;

            var quantity_id = id;
            var totalID = "#total" + quantity_id;
            var quantity = $('#quantity' + quantity_id).val();
            var product_cost_id = '#cost' + quantity_id; 
            var product_cost = $(product_cost_id).val(); 

            $(totalID).val((product_cost * quantity).toFixed(2));
            $("#totalInput" + id).trigger('change');
            countSubtotal();
        }

        function countSubtotal() {
            var subtotal = 0;
            var maxId = 0;

            $(".totalInput").each(function() {
                var id = parseInt($(this).attr("id").replace("total", ""));
                if (!isNaN(id) && id > maxId) {
                    maxId = id;
                }
            });

            for (var i = 1; i <= maxId; i++) {
                var totalElement = document.getElementById('total' + i);
                if (totalElement) {
                    var totalValue = parseFloat(totalElement.value) || 0;
                    subtotal += totalValue;
                }
            }

            $('#package_cost').val((subtotal).toFixed(2));

            var sale_price = (subtotal * (100 + discountPercentage)) / 100;
            sale_price_total = sale_price;

            $('#costSuggest').text('Suggested sale price is RM ' + numberThousand(sale_price, 2));
        }

        function loadPackageDetail(data, message) {
            cookingSuggest = data.cookingDetail;
            invTranslationList = data.invTranslationList;
            var packageInfo = data.packageInfo;
            var vendorList = data.supplierList;
            var packageDetails = data.packageDetails;
            var imageList = data.imageList;
            var videoList = data.videoList ? data.videoList : "";
            $("#invProductName").val(data.packageInfo.name);
            var cost = parseFloat(data.packageInfo.cost);
            if(cost)
            {
                $("#package_cost").val(cost.toFixed(2));
            }

            $("#focCheckbox").prop("checked", data.focDetail == 1);
            $("#publishCheckbox").prop("checked", data.packageInfo.publishStatus == 1);
            $("#archiveCheckbox").prop("checked", data.packageInfo.archiveStatus == 1);
            $("#ignoreStockCountCheckbox").prop("checked", data.packageInfo.ignoreStatus == 1);

            $('#publishCheckbox').prop('disabled', true);
            $('#archiveCheckbox').prop('disabled', true);
            $('#ignoreStockCountCheckbox').prop('disabled', true);
            $('#focCheckbox').prop('disabled', true);


            if(imageList.length > 0 || videoList.length > 0)
            {
                $.each(imageList, function(k, v) {
                    if(v['uploadType'] == 'Image') {
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
                                    <input type="hidden" id="uploadType${addImgIDNum}" value="Image">
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
                    else if(v['uploadType'] == 'coverImg') {
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
                    else if(v['uploadType'] == 'degreeImg') {
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
                    else if(v['uploadType'] == 'topImg') {
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
                })

                if(data.videoList) {
                    $.each(videoList, function(k, v) {
                        if(v['uploadType'] == 'video') {
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
                        }
                    })
                }
            }

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
                        <option value="${v['id']}">${v['name']}(RM `+numberThousand(v['price'], 2)+`)</option>
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

            $('#invProductNameChinese').val(productNameChinese);
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
                $('#vendorName').append(`<option value="${v['id']}" data-value="${v['vendor_code']}">${v['name']}</option>`);
                var name = v['name'].toLowerCase();
                if (v['id'] == packageInfo.vendor_id) {
                    $('#vendorName').val(v['id']);

                    $("#vendorName").trigger("change");
                }
            });

            // $('#vendorId').val(packageInfo.vendor_id);

            // Expired Day
            // $('#expiredDay').val(packageInfo.expired_day);

            // Category
            var categoryList = data.packageCategoryList;
            $.each(categoryList, function(k, v) {
                $('#category').append(`<option value="${v['id']}">${v['categoryDisplay']}</option>`);
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



            if(data.cookingDetail){
                addCookingSuggest(data.cookingDetail);
            }

            rowIndex = 1;
            $.each(packageDetails, function(k, v) {
                if (typeof v === 'object') {
                    var list = {
                        product_id: v['product_id'],
                        name: v['name'],
                        quantity: v['quantity'],
                        sale_price: v['cost'],
                        cost: v['cost'],
                        datain: 1
                    };

                    if (v['type'] === 'mystery') {
                        list['product_id'] = v['type'];
                    }
                    products.push(list);

                    if(v['type'] == 'mystery')
                    {
                        addMystery();
                    }
                    else
                    {
                        addRow();
                        var select2Element = $('#productSelect' + rowIndex);
                        select2Element.val(v.product_id).trigger('change');
                    }
                    $("#quantity" + rowIndex).val(v.quantity);
                    $("#cost" + rowIndex).val(v.cost);
                    calcTotalCost(rowIndex);
                    rowIndex++;
                }
            });
            getPackageProductList();
        }

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
                    const file = n.files[0];

                    $("#storeFileData").val(reader["result"]);
                    $("#storeFileName").val(n.files[0]["name"]);
                    $("#storeFileSize").val(n.files[0]["size"]);
                    $("#storeFileType").val(n.files[0]["type"]);
                    $("#storeFileFlag").val('1');

                    if((n.files[0]["type"]).split('/')[0] === 'image'){
                        $("#storeFileUploadType").val('image');
                        uploadFileType = 'image';
                        inputImgFile = {
                            file : file,
                        }
                        imgFileDataArray.push(inputImgFile);
                    }else{
                        $("#storeFileUploadType").val('video');
                        uploadFileType = 'video';
                        inputVideoFile = {
                            file : file,
                        }
                        videoFileDataArray.push(inputVideoFile);
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

        // function showImg(n, imgUrl) {
        //     $("#modalImg").attr('style','display: block');
            
        //     if(imgUrl != 'undefined')
        //         $("#modalImg").attr('src', imgUrl);
        //     else
        //         $("#modalImg").attr('src', $("#storeFileData" + n).val());

        //     $("#modalVideo").attr('style','display:none');
        //     $('#showImage').appendTo("body").modal('show');
        // }
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
            // newProductList = data.productList
            newProductList = [];
            $.each(productList, function(k, v) {
                $('#package').append(`<option value="${v['id']}">${v['name']}</option>`);
                if (v.product_type === 'product') {
                    newProductList.push(v);
                }
            });

            // Add Mystery Food option (hidden)
            $('#package').append(`<option value="mystery" hidden>Mystery Food</option>`);

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
            showMessage(message, 'success', 'Edit Package', 'edit', ['package.php', {
                packageID: invPackageID,
            }]);
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

        function closeDivImg(n) {
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

        function closeDiv(n) {
            var getThisInd = $('.closeBtn').index($(n));
            selectedLang.splice(getThisInd, 1);
            $(n).parent().parent().parent().remove();
            addCSCount = addCSCount - 1;
            $('.addCookingSuggestBtn').show();
        }

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
                                    <button id="deleteVendorAddress1" type="button" class="custom-button1 deleteVendorAddress" onclick="closeDiv(this, ${addCSCount})" disabled>
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

        function closeCoverDivImg(n) {
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

        function closeDegreeDivImg(n) {
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

        function closeTopDivImg(n) {
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
            if(data && data.video){
                $('#cookingURL'+temp_id).val(data.video);
            }
            // if(data.remark){
            //     $('#cookingRemark'+temp_id).val(data.remark);
            // }
            if(data && data.description){
                $('#fullInstruction'+temp_id).val(data.description);
            }
            if(data && data.cookingTime){
                $('#cookingTime'+temp_id).val(data.cookingTime);
            }
            if(!data){
                $('#cookingURL'+temp_id).val('');
                $('#fullInstruction'+temp_id).val('');
                $('#cookingTime'+temp_id).val('');
            }
        }

        function calcTotalCost(id) {
            let a = $("#quantity"+id).val();
            let b = $("#cost"+id).val();

            b = parseFloat(b);

            let c = a * b;

            $("#total"+id).val(c.toFixed(2));

            calcPackagePrice();
            countSubtotal();
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

            $('.total').each(function (){
                total_sum += parseFloat($(this).val());
            })

            $("#package_cost").val(total_sum.toFixed(2)); 
            goCalc = false;
            $("#package_cost").trigger("change");
        }

        function removeRow(button) 
        {
            var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
            var row = button.closest('tr'); 

            var productSelect = row.querySelector(".productSelect");
            var productId = productSelect.value;

            tableBody.removeChild(row);

            // update subtotal
            var rows = tableBody.getElementsByTagName("tr");
            var rowDataArray = [];
            var grandTotal = 0;
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];

                var productSelect = row.querySelector(".productSelect");
                var totalInput = row.querySelector(".totalInput");

                if (productSelect && totalInput) {
                    var productId = productSelect.value;
                    var total = parseFloat(totalInput.value);

                    rowDataArray.push({
                        productId: productId,
                        total: total
                    });
                    grandTotal += total;
                }
            }
            grandTotal = parseFloat(grandTotal.toFixed(2));
            $("#subtotal").text(grandTotal);
            countSubtotal();
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
            
            $(".attribute").html(attributeOption);
            $("#deliveryMethod").html(deliveryMethodOption);
            $('#productType').html(typeOption);
            // $("#packageCategory").html(packageCategoryOption);
            // $("#country").html(buildCountry);
            $(".addCookingSuggestBtn").show();
            $(".addImgBtn").show();
            $(".addVideoBtn").show();

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

        // create Package Button
        $('#createProduct').click(function() {
            var latestProductTable = getAllRowData();
            var salePrice       = $('#salePrice').val();
            salePrice = salePrice;
           
            $('[id$="Error"]').text("");
            $('[id$="Error"]').text("");

            var invPackageName  = $('#invPackageName').val();
            var vendorId = $('#vendorName option:selected').val();
            var productType     = $('#productType').val();
            var foc             = $("#focCheckbox").is(":checked") ? 1 : 0; 
            var skuCode         = $('#skuCode').val();
            var deliveryMethod = document.getElementById("deliveryMethod").value;
            var cost = $('#cost').val();

            var category = [];

            $('.includecategoryTag').each(function (index, value) {  
                category.push(value.id);
            });

            var salePrice       = $('#salePrice').val();
            var description     = $('#description').val();

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

                if(value.id == 'mystery') {
                    list['product_id'] = '';
                    list['type'] = value.id;
                }

                 packageProduct.push(list);
            });

            var package = [];
            var packageDesc = [];

            var productNameEnglish = document.getElementById("invProductNameEnglish").value;
            var productNameChinese = document.getElementById("invProductNameChinese").value;

            var buildName = {
                name        : productNameEnglish,
                language    : 'english',
            };

            var buildNameChinese = {
                name        : productNameChinese,
                language    : 'chinese',
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

            var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
            var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
            var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
            var cost = $('#package_cost').val();
            if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
            {
                var formData  = {
                    command           : 'addPackageInventory',
                    invPackageName    : productNameEnglish,
                    package           : package,
                    packageDesc       : packageDesc,
                    productType       : productType,
                    description       : description,
                    remarkArray       : remarkArray,
                    skuCode           : skuCode,
                    salePrice         : salePrice,
                    vendorId          : vendorId,
                    category          : category,
                    // uploadImage       : uploadImage,
                    // uploadVideo       : uploadVideo,
                    packageProduct    : latestProductTable,
                    cookingSuggestionName: cookingSuggestionName,
                    cookingSuggestionUrl : cookingSuggestionUrl,
                    cookingSuggestionRemark : cookingSuggestionRemark,
                    remarkArray       : remarkArray,
                    deliveryMethod    : deliveryMethod,
                    foc               : foc,
                    isArchive         : archiveStatus,
                    isIgnore          : ignoreStatus,
                    isPublish         : publishStatus,
                    cost              : cost,
                };
    
                fCallback = successAddPackageInventory;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        function successAddPackageInventory(data, message) {
            showMessage(message, 'success', 'Add Package', 'add', ['package.php', {
                packageID: data.packageID,
            }]);
        }

        function getAllRowData(editType) {
            var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
            var rows = tableBody.getElementsByTagName("tr");
            var rowDataArray = [];

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var productSelect = row.querySelector(".productSelect");
                var quantityInput = row.querySelector(".quantityInput");
                var costInput = row.querySelector(".costInput");
                var totalInput = row.querySelector(".totalInput"); 
                // var productSelect = $('#productSelect' + (i + 1));  // Replace with the appropriate select element
                var s2id = $(productSelect).attr('id').replace('s2id_', '');
                var productId = $('#'+s2id).val();
                // var productId = getProductIDFromSelect(productSelect);

                if(!productId)
                {
                    // mystery food
                    productId = 0;
                    var type = 'mystery';
                }
                else
                {
                    var type = 'product';
                }

                // Only proceed if a product is selected (product ID is not empty)
                // if (productId) {
                    // var productName = productSelect.options[productSelect.selectedIndex].text;
                    var quantity = parseFloat(quantityInput.value);
                    var cost = parseFloat(costInput.value);
                    var total = parseFloat(totalInput.value);

                    var rowData = {
                        // id: editType === 'edit' ? purchaseProductId : productId,
                        product_id: productId,
                        quantity: quantity,
                        cost: cost,
                        total: total,
                        type : type,
                    };

                    rowDataArray.push(rowData);
                // }
            }

            return rowDataArray;
        }

        function getProductIDFromSelect(selectElement) {
            return $(selectElement).data('productid');
        }

        $('#editProduct').click(function() {
            var productNameInput = document.getElementById('invProductName');
            var descriptionInput = document.getElementById('description');
            var costInput = document.getElementById('cost');
            var salePriceInput = document.getElementById('salePrice');
            // var bestBeforeInput = document.getElementById('bestBefore');
            // var reminderDaysInput = document.getElementById('reminderDays');
            var categorySelect = document.getElementById('category');
            var deliveryMethodSelect = document.getElementById('deliveryMethod');
            
            productNameInput.removeAttribute('readonly');
            $("#vendorName").prop("disabled", false);
            $("#category").prop("disabled", false);
            $("#deliveryMethod").prop("disabled", false);
            descriptionInput.removeAttribute('readonly');
            // costInput.removeAttribute('readonly');
            salePriceInput.removeAttribute('readonly');
            // bestBeforeInput.removeAttribute('readonly');
            // reminderDaysInput.removeAttribute('readonly');
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

        $('#vendorName').select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        $('#cancelEditBtn').click(function() {
            $.redirect("package.php",{packageID: invPackageID});
        })

        $('#createProductNav').click(function() {
            var actionType = "add";
            $.redirect("package.php", {actionType, actionType})
        })

        $('#backBtn').click(function() {
            $.redirect('getProductInventory.php');
        });

        function handleFileUpload(file, action) {
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
            if (file.file.type.startsWith('image/'))
            {
                if(file.imgName && extractedUrl && file.uploadType)
                {
                    uploadImage.push({
                        imgName : file.imgName,
                        imgData : extractedUrl,
                        uploadType : file.uploadType,
                    });
                    imgUploadFinishFile.push({
                        file : file.file,
                    })
                }
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
                    var latestProductTable = getAllRowData();
                    var salePrice       = $('#salePrice').val();
                    salePrice = salePrice;
                
                    $('[id$="Error"]').text("");
                    $('[id$="Error"]').text("");

                    var invPackageName  = $('#invPackageName').val();
                    var vendorId = $('#vendorName option:selected').val();
                    var productType     = $('#productType').val();
                    var foc             = $("#focCheckbox").is(":checked") ? 1 : 0; 
                    var skuCode         = $('#skuCode').val();
                    var deliveryMethod = document.getElementById("deliveryMethod").value;
                    var cost = $('#cost').val();

                    var category = [];

                    $('.includecategoryTag').each(function (index, value) {  
                        category.push(value.id);
                    });

                    var salePrice       = $('#salePrice').val();
                    var description     = $('#description').val();

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

                        if(value.id == 'mystery') {
                            list['product_id'] = '';
                            list['type'] = value.id;
                        }

                        packageProduct.push(list);
                    });

                    var package = [];
                    var packageDesc = [];

                    var productNameEnglish = document.getElementById("invProductNameEnglish").value;
                    var productNameChinese = document.getElementById("invProductNameChinese").value;

                    var buildName = {
                        name        : productNameEnglish,
                        language    : 'english',
                    };

                    var buildNameChinese = {
                        name        : productNameChinese,
                        language    : 'chinese',
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

                    var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                    var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                    var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;
                    var cost = $('#package_cost').val();

                    var formData  = {
                        command           : 'addPackageInventory',
                        invPackageName    : productNameEnglish,
                        package           : package,
                        packageDesc       : packageDesc,
                        productType       : productType,
                        description       : description,
                        remarkArray       : remarkArray,
                        skuCode           : skuCode,
                        salePrice         : salePrice,
                        vendorId          : vendorId,
                        category          : category,
                        uploadImage       : uploadImage,
                        uploadVideo       : uploadVideo,
                        packageProduct    : latestProductTable,
                        cookingSuggestionName: cookingSuggestionName,
                        cookingSuggestionUrl : cookingSuggestionUrl,
                        cookingSuggestionRemark : cookingSuggestionRemark,
                        remarkArray       : remarkArray,
                        deliveryMethod    : deliveryMethod,
                        foc               : foc,
                        isArchive         : archiveStatus,
                        isIgnore          : ignoreStatus,
                        isPublish         : publishStatus,
                        cost              : cost,
                    };
    
                    fCallback = successAddPackageInventory;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
                else
                {
                    var latestProductTable = getAllRowData();
                    var salePrice       = $('#salePrice').val();
                    salePrice = salePrice;

                    // if( parseFloat(salePrice) >= sale_price_total ){
                        $('[id$="Error"]').text("");

                        var packageInvId    = '<?php echo $_POST['packageID'] ?>';
                        var invPackageName  = $('#invProductName').val();
                        var foc             = $("#focCheckbox").is(":checked") ? 1 : 0; 
                        var vendorId        = $('#vendorName option:selected').val();
                        var productType     = $('#productType').val();
                        var deliveryMethod = document.getElementById("deliveryMethod").value;
                        var skuCode = document.getElementById("skuCode").value;
                        
                        var category = [];
                        $('.includecategoryTag').each(function (index, value) {  
                            category.push(value.id);
                        });

                        var salePrice       = $('#salePrice').val();
                        var description     = $('#description').val();

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

                            packageProduct.push(list);
                        });

                        var package = [];
                        var packageDesc = [];

                        var productNameEnglish = document.getElementById("invProductName").value;
                        var productNameChinese = document.getElementById("invProductNameChinese").value;

                        var englishObj = {
                        language: "english",
                        name: productNameEnglish
                        };

                        var chineseObj = {
                        language: "chinese",
                        name: productNameChinese
                        };

                        package.push(englishObj);
                        package.push(chineseObj);

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

                        var publishStatus = $("#publishCheckbox").is(":checked") ? 1 : 0;
                        var archiveStatus = $("#archiveCheckbox").is(":checked") ? 1 : 0;
                        var ignoreStatus = $("#ignoreStockCountCheckbox").is(":checked") ? 1 : 0;

                        var formData  = {
                            command             : 'editPackageInventory',
                            packageInvId        : packageInvId,
                            invPackageName      : invPackageName,
                            productType         : 'package',
                            description         : description,
                            salePrice           : salePrice,
                            vendorId            : vendorId,
                            category            : category,
                            uploadImage         : uploadImage,
                            uploadVideo         : uploadVideo,
                            imageId             : imageId,
                            videoId             : videoId,
                            packageProduct      : latestProductTable,
                            isPublish           : publishStatus,
                            isArchive           : archiveStatus,
                            isIgnore            : ignoreStatus,
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
                        fCallback = successEditPackageInventory;
                        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            }
        }

    </script>

</body>
</html>
