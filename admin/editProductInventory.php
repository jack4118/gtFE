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
                                                <label>Product Name</label>
                                                <input id="invProductName" type="text" class="form-control">
                                                <span id="nameError" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>SKU Code</label>
                                                <input id="code" type="text" class="form-control" disabled>
                                                <span id="codeError" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                                                <label>Product Weight in KG, Weight (KG)</label>
                                                <input id="weight" type="text" class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,3}/); this.value = this.value!=''?addCormer(this.value):'';">
                                                <span id="weightError" class="errorSpan text-danger"></span>
                                            </div>

                                            <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Price</label>
                                                <input id="productCost" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                                <span id="productCostError" class="errorSpan text-danger"></span>
                                            </div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

                                    <!-- <div class="col-sm-6 col-xs-12"> -->
                                        <!-- <div class="row"> -->
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Category</label>
                                                <select id="category" class="form-control category" dataName="category" dataType="text">
                                                </select>
                                                <span id="categoryError" class="errorSpan text-danger"></span>
                                            </div>

                                            <!-- <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                                <label>Category</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select id="category" class="form-control category" dataName="category" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addCategoryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span id="categoryError" class="errorSpan text-danger"></span>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!-- <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                        <label>Name Languages</label>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div id="buildLanguage"></div>
                                            <div class="col-md-4 addLanguageBtn" style="display: none;">
                                                <div class="addLanguageImage" onclick="addLanguage()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Languages</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <span id="nameLanguagesError" class="errorSpan text-danger"></span><br>
                                        <span id="descrLanguagesError" class="errorSpan text-danger"></span>
                                    </div> -->

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Status</label>
                                                <div id="status" class="m-b-20">
                                                    <!-- <div class="radio radio-info radio-inline"> -->
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
                                    </div>

                                    <!-- 
                                        "status": "Pending", "On Sale", "Sold Out", "Close"
                                        "distributionStatus": "Pending", "Distributing", "Ended", "Close"
                                     -->

                                    <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                        <label>Distribution Status</label>
                                        <div id="dstatus" class="m-b-20">
                                            <div class="radio radio-info radio-inline">
                                                <input id="dPending" type="radio" class="dStatusRadio" value="Pending" name="dStatusRadio"/>
                                                <label for="dPending">
                                                    Pending
                                                </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input id="ddistributing" type="radio" class="dStatusRadio" value="Distributing" name="dStatusRadio"/>
                                                <label for="ddistributing">
                                                    Distributing
                                                </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input id="dended" type="radio" class="dStatusRadio" value="Ended" name="dStatusRadio"/>
                                                <label for="dended">
                                                    Ended
                                                </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input id="dclose" type="radio" class="dStatusRadio" value="Close" name="dStatusRadio"/>
                                                <label for="dclose">
                                                    Close
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->

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

    <!-- <div class="modal fade" id="showImage" role="dialog">
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
    </div> -->

   
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
        var reqData =  new FormData();
        var reqVideoData =  new FormData();
        // var nameLanguages;
        // var descrLanguages;
        // var uploadImage;
        // var uploadImageData;
        // var uploadVideo;
        var buildOption;
        var buildOptionLength = 0;
        // var buildCountry;
        var addLangCount = 0;
        // var addImgCount = 0;
        // var addImgIDNum = 0;
        // var uploadFileType = 'image';
        var id = "<?php echo $_POST['id']; ?>";
        // var dataURL = "<?php echo $config['tempMediaUrl']; ?>product/";

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

        $(document).ready(function() {

            var formData  = {
                command: 'getProductInventoryDetails',
                productInvId: id
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            /*$('#category').change(function(){
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
            });*/

            $('#submitBtn').click(function() {

                $('[id$="Error"]').text("");

                // var imgSizeFlag = true;
                // var videoSizeFlag = true;

                var invProductName = $("#invProductName").val();
                // var code = $("#code").val();
                var status = $("input[name=statusRadio]:checked").val()
                var category = $('#category option:selected').val();
                /*var category = [];
                $('.includecategoryTag').each(function (index, value) {  
                    category.push(value.id);
                });*/
                // var country = $("#country").val();
                var weight = $("#weight").val().replace(/[^0-9.]/g, '');
                var productCost = $("#productCost").val();


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

                // nameLanguages = [];
                // $(".productNameInput").each(function(){
                //     var getlanguageType = $(this).attr("languageType");
                //     var getValue = $(this).val();
                //     buildNameLanguages = {
                //         languageType : getlanguageType,
                //         content : getValue
                //     };
                //     nameLanguages.push(buildNameLanguages);
                // });

                // descrLanguages = [];
                // $(".descInput").each(function(){
                //     var getlanguageType = $(this).attr("languageType");
                //     var getValue = $(this).val();
                //     buildDescrLanguages = {
                //         languageType : getlanguageType,
                //         content : getValue
                //     };
                //     descrLanguages.push(buildDescrLanguages);
                // });

                /*uploadImage = [];
                uploadImageData = [];
                $(".popupMemoImageWrapper").each(function() {
                    var imgData = $(this).find('[id^="storeFileData"]').val();
                    var imgName = $(this).find('[id^="storeFileName"]').val();
                    var imgType = $(this).find('[id^="storeFileType"]').val();
                    var imgSize = $(this).find('[id^="storeFileSize"]').val();
                    var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                    var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();
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
                        imgName: imgName,
                        imgData: imgData,
                        uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(buildUploadImage);
                });*/

                /*if(!videoSizeFlag || !imgSizeFlag) {
                    if(!imgSizeFlag)
                        $("#imgError").text("Image size exceed 3MB.");

                    if(!videoSizeFlag)
                        $("#videoError").text("Video size exceed 15MB.");
                    

                    return false;
                }

                $("#imgError").text("");
                $("#videoError").text("");*/

                var formData  = {
                    command         : 'editProductInventory', 
                    productInvId    : id,
                    invProductName  : invProductName,
                    // code            : code,
                    status          : status,
                    category        : category,
                    weight          : weight,
                    productCost     : productCost,
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

                fCallback = submitCallback;
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
            $("#invProductName").val(data.productDetails.name);
            $("#code").val(data.productDetails.skuCode);
            $('input[name=statusRadio]').filter('[value='+data.productDetails.status+']').prop('checked', true);
            $("#weight").val(data.productDetails.weight);
            $("#productCost").val(Number(data.productDetails.cost));

            buildOptionLength = 0;

            buildOption = `
                <option value="">Select Languages</option>
            `;
            $.each(data.languageList, function(k,v) {
                buildOption += `
                    <option value="${v['languageType']}">${v['languageDisplay']}</option>
                `;
                buildOptionLength = buildOptionLength + 1;
            });

            categoryOption = "";
            /*if(data.categoryList) {
                $.each(data.categoryList, function(k,v){
                    var checked = "";
                    Object.values(data.productDetails.category).indexOf(v['categoryDisplay'])>-1 ? checked="checked" : checked="";
                    categoryOption += `
                        <input type="checkbox" id="category${k+1}" name="categoryCheckbox" value="${v['id']}" ${checked}>
                        <label for="category${k+1}">${v['categoryDisplay']}</label><br>
                    `;
                });
            }*/
            if(data.categoryList) {
                $.each(data.categoryList, function(k,v) {
                    categoryOption += `
                        <option value="${v['id']}" name="${v['name']}">${v['categoryDisplay']}</option>
                    `;
                });
                $("#category").html(categoryOption);
                $('#category option[name="'+data.productDetails.category[0]+'"]').prop('selected', true);
                /*$.each(data.categoryList, function(k,v) {
                    var categoryID = v['id'];
                    var category = v['categoryDisplay'];

                    if(Object.values(data.productDetails.category).indexOf(category)>-1) {
                        var categoryDiv = `
                            <div id="${categoryID}" data-select="category" class="categoryTag includecategoryTag" style="">${category} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                        `;

                        $("#addCategoryList").append(categoryDiv);

                        $('#category').find(`option[value=${categoryID}]`).remove();
                    }
                });*/
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
            // $(".addImgBtn").show();



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



            /*if (data.productDetails.imageName) {
                $.each(data.productDetails.imageName, function(k,v){
                    addImgCount = addImgCount + 1;
                    addImgIDNum = addImgIDNum + 1;
        
                    var buildImg = "";
        
                    buildImg += `
                        <div class="col-sm-4 col-xs-12">
                            <div class="popupMemoImageWrapper" imageFlag="0">
                    `;
        
                    buildImg +=`
                                <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                                <input type="hidden" id="storeFileData${addImgIDNum}" value="${dataURL+v.value}">
                                <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.value}">
                                <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.value}">
                                <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.value}">
                                <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.value).toLowerCase()}">
                                <input type="hidden" id="viewFileData${addImgIDNum}" value="${dataURL+v.value}">
                                <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                <div>
                                    <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                                    <span id="fileName${addImgIDNum}" class="fileName">
                                        ${v.value}
                                    </span>
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
        
                    if (addImgCount > 0) {
                        $(".addImgBtn").hide();
                    }
                });
            }*/

            // $("#rate").val(data.rate);

            // calcAmount();
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

        /*function addImage() {
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
                            <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span>
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

            if (addImgCount == 1) {
                $(".addImgBtn").hide();
            }
            
        }*/

        function closeDiv(n) {
            var getThisInd = $('.closeBtn').index($(n));
            selectedLang.splice(getThisInd, 1);
            $(n).parent().parent().parent().remove();
            addLangCount = addLangCount - 1;
            $('.addLanguageBtn').show();
        }

        /*function closeDivImg(n) {
            addImgCount = addImgCount - 1;
            $(".addImgBtn").show();
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
        }*/

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

        /*function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text("No File Uploaded");
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileUploadType"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();

        }*/

        /*function showImg(n) {
            $("#modalImg").attr('style','display: block');
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#modalVideo").attr('style','display:none');
            $("#showImage").modal();
        }*/


        /*function displayFileName(id, n) {
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
                };

                reader.readAsDataURL(n.files[0]);
            }
        }*/

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
                     //     console.log(pair[0]+ ', ' + pair[1]); 
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
                                 // console.log(json);
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

                        // console.log(blob);
                     }

                     // for (var pair of reqData2.entries()) {
                     //     console.log(pair[0]+ ', ' + pair[1]); 
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

    </script>
</body>
</html>
