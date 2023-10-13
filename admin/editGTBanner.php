<?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
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
                                <form role="form" enctype="multipart/form-data" id=addbanner>
                                    <div id="basicwizard" class=" pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="datepicker" class="form-group row mx-0">
                                                <div class="col-md-5">
                                                    <label >
                                                        Schedule Date
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="fromDate" type="text" placeholder="From" class="input-sm form-control" dataName="date_search" dataType="dateRange" />
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </div>
                                                        <input id="toDate" type="text" placeholder="To" class="input-sm form-control" dataName="date_search" dataType="dateRange" />
                                                    </div>
                                                    <span id="dateError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row mx-0">
                                                <div class="col-md-5">
                                                    <label>
                                                        Campaign Name
                                                    </label>
                                                    <input id="campaignName" type="text" class="form-control" required/>
                                                    <span id="nameError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row mx-0">
                                                <div class="col-md-5">
                                                    <label>
                                                        <?php echo $translations['A00427'][$language]; /* Priority */?>
                                                    </label>
                                                    <input id="priority" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                                    <span id="priorityError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row mx-0">
                                                <div class="col-md-5">
                                                    <label>
                                                        Banner Page
                                                    </label>
                                                    <input id="bannerPage" type="text" class="form-control" required/>
                                                    <span id="pageError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row mx-0" style="margin-top: 30px;">
                                                <div class="col-md-12">
                                                    <label>
                                                        <?php echo $translations['A00439'][$language]; /* Image */ ?>
                                                    </label><br>
                                                    <span >Product Images (Recommended Size: 650 x 350px)</span>

                                                    <div class="row">
                                                        <div id="appendImage"></div>
                                                        <div class="col-md-4">
                                                            <div class="addLanguageImage" onclick="addImage()">
                                                                <b><i class="fa fa-plus-circle"></i></b>
                                                                <span>Add Image</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn col-md-5 btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
            </div>
        </div>
    </div>
</div>

<script>var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback       = "";
    var language        = "<?php echo $language; ?>";
    var systemLang      = null;
    var selectedLang = [];
    var id = "<?php echo $_POST['id']; ?>";
    var isAddImageDisabled = false; 
    var deleted = [];
    var reqData =  new FormData();


    $(document).ready(function() {
        if(!id) {
            var message  = '<?php echo $translations['A00460'][$language]; /* Client does not exist */?>';
            showMessage(message, '', 'Error', 'exclamation-triangle', 'getGTBannerList');
            return;
        }

        formData  = {
            command: 'getGTBannerData',
            id : id
        };
        fCallback = loadDefaultData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#backBtn').click(function() {
            $.redirect('getGTBannerList');
        });

        $('#submitBtn').click(function() {

            $('.errorSpan').empty();

            var campaignName = $('#campaignName').val();
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var priority = $('#priority').val();
            var bannerPage = $('#bannerPage').val();
            var uploadData = getImgObj();

            if(uploadData){
                fCallback = submitCallback;
                formData  = {
                    command: 'editGTBanner',
                    id : id,
                    campaignName : campaignName,
                    fromDate : fromDate,
                    toDate : toDate,
                    priority : priority,
                    bannerPage : bannerPage,
                    deleted : deleted,
                    uploadData : uploadData
                };

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            console.log(deleted)
        });
    });

    function getImgObj() {
        var uploadData = {};
        var imgError = 0;

        $(".popupMemoImageWrapper").each(function(i, obj) {
            var campaignName = $('#campaignName').val();
            var priority = $('#priority').val();
            var bannerPage = $('#bannerPage').val();
            var lang = $(obj).find('[id^="fileUploadLang"]').val();
            var imgData = $(obj).find('[id^="storeFileData"]').val();
            var imgName = $(obj).find('[id^="storeFileName"]').val();

            if(lang!="" && imgData!=""){
               
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();
                var imgSize = $(obj).find('[id^="storeFileSize"]').val();

                var defaultImage = (imgData=='')?'':1;

                if(i > 0) {
                    defaultImage = '';
                }

                uploadData[lang] = {
                    id : id,
                    campaignName: campaignName,
                    priority : priority,
                    bannerPage : bannerPage,
                    deleted : deleted,
                    imgData: imgData,
                    imgName: imgName,
                    imgType: imgType,
                    imgFlag: imgFlag,
                    imgSize: imgSize,
                    defaultImage: defaultImage,
                    languageType : lang
                };

                reqData[lang] = {
                    imgName: imgName,
                    imgData: imgData,
                    campaignName : campaignName,
                    priority, priority,
                    bannerPage : bannerPage
                };
            }else if(imgName ==''){
                imgError = 1;
            }else if(lang == ''){
                imgError = 2;
            }

        });

        if(imgError == 1){
            showMessage('Please select upload an image', 'error', 'Error', 'exclamation-triangle', '');
            return false;
        }else if(imgError == 2){
            showMessage('Please select a language', 'error', 'Error', 'exclamation-triangle', '');
            return false;
        }
        else{
            return uploadData;
        }
    }

    function buildLangOption(lang) {
        var html = `<option value="">Select Language</option>`;
        if(systemLang) {
            $.each(systemLang, function(i, obj) {
                var selected = "";
                if(lang && lang == obj.language) {
                    selected = "selected";
                }
                html += `<option value="${obj.language}" ${selected}>${translations[obj.language_code][language]}</option>`;
            });
        }
        return html;
    }

    function detectDuplicate(n) {
        var thisSelected = $(n).val();
        var inArr = $.inArray(thisSelected, selectedLang);

        if(inArr >= 0) {
            $(n).val("");
            showMessage("This language is selected", 'error', 'Error', 'exclamation-triangle', '');
        }else {
            selectedLang.push(thisSelected);
            $(n).attr('disabled', 'disabled');
        }
    }

    function addImage(){
        if (isAddImageDisabled) {
            return;
        }
        var existingCount = $(".popupMemoImageWrapper").length;

        if (existingCount >= 2) {
            isAddImageDisabled = true;
            return;
        }

        var wrapperLength = existingCount + 1;

        var wrapperLength = $(".popupMemoImageWrapper").length + 1;

        var wrapper = `
        <div class="col-md-4">
        <div class="popupMemoImageWrapper">
        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
        <input type="hidden" id="storeFileData${wrapperLength}">
        <input type="hidden" id="storeFileName${wrapperLength}">
        <input type="hidden" id="storeFileSize${wrapperLength}">
        <input type="hidden" id="storeFileType${wrapperLength}">
        <input type="hidden" id="storeFileFlag${wrapperLength}">
        <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">
        <div>
        <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
        <span id="fileName${wrapperLength}" class="fileName">No File Uploaded</span>
        <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="showImg('${wrapperLength}')">
        <i class="fa fa-eye"></i>
        </a>
        <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${wrapperLength}')">
        <i class="fa fa-times"></i>
        </a>
        </div>

        <select id="fileUploadLang${wrapperLength}" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)">
        ${buildLangOption()}
        </select>
        </div>
        </div>
        `;

        $("#appendImage").append(wrapper);
    }

    function closeDiv(n) {
        var lang = $(n).parent().find('.fileUploadLang').val();
        deleted = $(n).parent().find('.storeFileId').val();

        if(lang != "") {
            var inArr = $.inArray(lang, selectedLang);
            selectedLang.splice(inArr, 1)
        }

        $(n).parent().parent().remove();
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

        var lang = $("#fileUploadLang"+id).val();
        $("#fileUploadLang"+id).html(buildLangOption());
        $("#fileUploadLang"+id).removeAttr('disabled');

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
        var fileUrl = $("#storeFileUrl" + n).val();
        var fileData = $("#storeFileData" + n).val();

        if (fileData) {
            $("#modalImg").attr('src', fileData);
        } else {
            $("#modalImg").attr('src', fileUrl);
        }
        
        $("#showImage").modal();
    }


    function submitCallback(data, message) {
        showMessage('Successful update banner', 'success', 'Congratulations', 'upload', ['editGTBanner', {id: id}]);
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

    function loadDefaultData(data, message){
        
        var imgUrl = data.imgData.url;

        $('#campaignName').val(data.bannerData.name);
        $('#priority').val(data.bannerData.priority);
        $('#bannerPage').val(data.bannerData.banner_page);
        $('#fromDate').val(data.bannerData.from_date);
        $('#toDate').val(data.bannerData.to_date);
        
        systemLang = data.systemLanguages;
        var ind = 0;

        $.each(data.imgData, function(i,obj){
            var i = obj.language;
            selectedLang.push(i);
            var wrapperLength = ind+1;
            var defaultClass = "";
            var closeButton = `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>`;

            if(ind==0) {
                defaultClass = "default";
                closeButton = `<span class="dtxt">Default</span>`;
            }

            var imgF = '';
            var imgView = 'none';

            if(obj.img_name) {
                imgF = '0';
                imgView = 'inline-block';
            }
            var wrapper = `
                <div class="col-md-4">
                    <div class="popupMemoImageWrapper ${defaultClass}">
                        ${closeButton}
                        <input type="hidden" id="storeFileData${wrapperLength}">
                        <input type="hidden" id="storeFileUrl${wrapperLength}" value="${obj.url || ''}">
                        <input type="hidden" id="storeFileName${wrapperLength}" value="${obj.img_name || ''} required">
                        <input type="hidden" id="storeFileSize${wrapperLength}" value="${obj.image_size || ''}">
                        <input type="hidden" id="storeFileType${wrapperLength}" value="${obj.image_type || ''}">
                        <input type="hidden" id="storeFileFlag${wrapperLength}" value="${imgF}">
                        <input type="hidden" class="storeFileId" value="${obj.id}">

                        <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileName${wrapperLength}" class="fileName">${obj.img_name || 'No Image'}</span>
                            <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display: ${imgView};padding:6px;" onclick="showImg('${wrapperLength}')">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:${imgView};padding:6px;" onclick="deleteImg('${wrapperLength}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>

                        <select id="fileUploadLang${wrapperLength}" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)" required disabled>
                            ${buildLangOption(i)}
                        </select>
                    </div>
                </div>
            `;

            $("#appendImage").append(wrapper);

            ind+=1;
        });
    }

    $('#fromDate').datepicker({
        format      : 'yyyy-mm-dd',
        orientation : 'auto',
        autoclose   : true
    });

    $('#toDate').datepicker({
        format      : 'yyyy-mm-dd',
        orientation : 'auto',
        autoclose   : true
    });

</script>
</body>
</html>