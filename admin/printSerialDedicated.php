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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Remittance reference number</label>
                                                <input id="invProductName" type="text" class="form-control">
                                                <span id="invProductNameErrorEnglish" class="errorSpan text-danger"></span>
                                                <span id="nameError" class="errorSpan text-danger"></span>
                                            </div> -->
                                            <div class="col-md-4 form-group">
                                                <label>Product Name</label>
                                                <select id="product_id" class="form-control product_id1" onchange="loadSalePrice(this)"></select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-xs-12">
                                        <span id="imgError" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="col-xs-12">
                                        <span id="imgTypeError" class="errorSpan text-danger"></span>
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
        var categoryId          = null;
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
        var action              = '';
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

        $(document).ready(function() {
            condition = 'product';
            action = loadProductList;
            getProductAndCategory();

            condition = 'productCategory';
            action = loadCategoryList;
            getProductAndCategory();

            $('input[name=batchCondition]').change(function() {
                toggleProductCategory(this);
            });

        });

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

        function getProductAndCategory() {
            var formData = {
                command         : 'getProductAndCategory',
                condition       : condition,
                category_id     : categoryId,
            };

            var fCallback = action;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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

            var img = $(n).parent().find('[id^="storeFileID"]').val();

            if(typeof(img) != 'undefined') {
                imageId.push(img);
            }
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
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

        function showImg(n, imgUrl) {
            $("#modalImg").attr('style','display: block');
            
            if(imgUrl != 'undefined')
                $("#modalImg").attr('src', imgUrl);
            else
                $("#modalImg").attr('src', $("#storeFileData" + n).val());

            $("#modalVideo").attr('style','display:none');
            $("#showImage").modal();
        }

        function loadProductList(data, message) {
            if(data) {
                allProducts = [];
                var productList = data.productList;
                productDropdown = '<option></option>';

                if(productList && productList.length > 0) {
                    $.each(productList, function(k, v) {
                        productDropdown += `<option value="${v['id']}">${v['name']}</option>`;
                        allProducts.push(v);
                    });
                    
                    $('.promoProducts_item').each(function() {
                        var productListInput = $(this).find('#product_id');
                        if(productListInput.hasClass('loaded')) return;
                        productListInput.empty().append(productDropdown);
                        productListInput.addClass('loaded');
                    });

                    $('.product_id1').select2({
                        dropdownAutoWidth: true,
                        templateResult: newFormatState,
                        templateSelection: newFormatState,
                    });
                }
            }
        }

        function loadCategoryList(data, message) {
            if(data) {
                allCategories = [];
                var categoryList = data.categoryList;
                categoryDropdown = '<option></option>';

                if(categoryList && categoryList.length > 0) {
                    $.each(categoryList, function(k, v) {
                        categoryDropdown += `<option value="${v['id']}">${v['name']}</option>`;
                        allCategories.push(v);
                    });

                    $('#batchCategoryId').empty().append(categoryDropdown);
                }
            }
        }

        function addBatchRow(data, message) {
            var wrapperLength = 1;
            $('#promoProducts').empty();

            if(data) {
                productsByCategory = [];
                var productList = data.productList;
                if(productList && productList.length > 0) {
                    $.each(productList, function(k, v) {
                        var innerHtml = `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>`;
                        if(k == 0) innerHtml = `<div class="defaultTag">Default</div>`;

                        var html = `
                            <div class="promoProducts_item">
                                ${innerHtml}
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Product Name</label>
                                        <select id="product_id" class="form-control product_id${(wrapperLength)}" onchange="loadSalePrice(this)">
                                            ${productDropdown}
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Sale Price</label>
                                        <input id="sale_price" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Price Computation</label>
                                        <select id="discount_type" class="form-control" onchange="loadDiscountPrice(this)">
                                            <option value=""></option>
                                            <option value="percentage">Discount</option>
                                            <option value="fixed">Fixed Price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Value</label>
                                        <input id="discount_amount" type="text" class="form-control" oninput="loadDiscountPrice(this)">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Discount Price</label>
                                        <input id="discount_price" type="text" class="form-control" disabled>
                                    </div>
                                    <input id="condition" type="hidden" class="form-control" value="${condition}">
                                </div>
                            </div>
                        `;

                        productsByCategory.push(v);
                        $('#promoProducts').append(html);
                        $('.promoProducts_item:last-child').find('#product_id').val(v['id']).trigger('change');
                        $('.promoProducts_item:last-child').find('#discount_amount').val(batchDiscountAmt);
                        $('.promoProducts_item:last-child').find('#discount_type').val(batchComputation).trigger('change');
                    });

                    $('.product_id'+wrapperLength).select2({
                        dropdownAutoWidth: true,
                        templateResult: newFormatState,
                        templateSelection: newFormatState,
                    });

                    wrapperLength++;
                }
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

        function closeDiv(n,id) {
        var totalLoop =[1];

        const index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');
        // $("#id" + id).val('');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        // $(n).parent().parent().remove();
        $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        $("#closeBtn" + id).css("display","none");
        $("#total" + id).val(0.00);
        $("#quantity" + id).val(0);
        $("#quantity" + id).attr("disabled", true);;
        $("#productSelect" + id).attr("disabled", true);

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

    </script>
</body>
</html>
