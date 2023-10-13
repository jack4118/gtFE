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
                                <form role="form" enctype="multipart/form-data" id=addform>
                                    <div id="basicwizard" class=" pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="datepicker" class="form-group row mx-0">
                                                <div class="col-md-5">
                                                    <label class="control-label">
                                                        Schedule Date
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="fromDate" type="text" placeholder="From" class="input-sm form-control" dataName="date_search" dataType="dateRange" required/>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </div>
                                                        <input id="toDate" type="text" placeholder="To" class="input-sm form-control" dataName="date_search" dataType="dateRange" required/>
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
                                                    <!-- <select id="bannerPage" type="text" class="form-control" dataName="bannerPage" dataType="text" required>
                                                        <option value="foodMenu.php">
                                                            Food Menu
                                                        </option>
                                                    </select>  -->
                                                </div>
                                            </div>

                                            <div class="form-group row mx-0" style="margin-top: 30px;">
                                                <div class="col-md-12">
                                                    <label>
                                                        <?php echo $translations['A00439'][$language]; /* Image */ ?>
                                                    </label><br>
                                                    <span>Product Images (Recommended Size: 650 x 350px)</span>
                                                    <div class="row">
                                                        <div id="appendImage">
                                                            <div class="col-md-4">
                                                                <div class="popupMemoImageWrapper default">
                                                                    <span class="dtxt">Default</span>
                                                                    <input type="hidden" id="storeFileData1">
                                                                    <input type="hidden" id="storeFileName1">
                                                                    <input type="hidden" id="storeFileSize1">
                                                                    <input type="hidden" id="storeFileType1">
                                                                    <input type="hidden" id="storeFileFlag1">
                                                                    <input type="file" id="fileUpload1" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('1', this)" required />
                                                                    <div>
                                                                        <a href="javascript:;" onclick="$('#fileUpload1').click()" class="btn btn-primary btnUpload">Upload</a>
                                                                        <span id="fileName1" class="fileName">No File Uploaded</span>
                                                                        <a id="viewImg1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showImg('1')">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </div>

                                                                    <select id="fileUploadLang1" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)" required></select>
                                                                </div>
                                                                <span id="imgError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="addLanguageImage" onclick="addImage()">
                                                                <b><i class="fa fa-plus-circle"></i></b>
                                                                <span>Add Image</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span id="imgLanguageError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-5 row mx-0">
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
                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
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
    var isAddImageDisabled = false;
    var reqData =  new FormData();


    $(document).ready(function() {
        $('#backBtn').click(function() {
            $.redirect('getGTBannerList');
        });

        $('#fromDate').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function(start, end, label) {
            $("#fromDate").val(start.format('YYYY-MM-DD'));
            $("#toDate").val(end.format('YYYY-MM-DD'));
        });
       
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd<10)
            dd = '0'+dd;

        if (mm<10)
            mm = '0'+mm;

        today = yyyy + '-' + mm + '-' + dd;
        $("#fromDate, #toDate").val(today);

        $('#htmlDiv').hide()

        fCallback = buildCountry;
        formData  = {command: 'getBannerList'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            
            $('.errorSpan').empty();
            var campaignName = $('#campaignName').val();
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var priority = $('#priority').val();
            var bannerPage = $('#bannerPage').val();
            var uploadData = getImgObj();

            fCallback = submitCallback;
            formData  = {
                command: 'addGTBanner',
                campaignName : campaignName,
                fromDate : fromDate,
                toDate : toDate,
                priority : priority,
                bannerPage : bannerPage,
                uploadData : uploadData                
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

    function getImgObj() {
        var uploadData = {};

        $(".popupMemoImageWrapper").each(function(i, obj) {
            // var campaignName = $('#campaignName').val();
            // var priority = $('#priority').val();
            // var bannerPage = $('#bannerPage').val();
            var lang = $(obj).find('[id^="fileUploadLang"]').val();
            if(lang!=""){
                var imgData = $(obj).find('[id^="storeFileData"]').val();
                var imgName = $(obj).find('[id^="storeFileName"]').val();
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();
                var imgSize = $(obj).find('[id^="storeFileSize"]').val();

                var defaultImage = (imgData=='')?'':1;

                if(i > 0) {
                    defaultImage = '';
                }

                uploadData[lang] = {
                    // campaignName: campaignName,
                    // priority : priority,
                    // bannerPage : bannerPage,
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
                    // campaignName : campaignName,
                    // priority, priority,
                    // bannerPage : bannerPage
                };
            }else{
                var imgData = $(obj).find('[id^="storeFileData"]').val();
                var imgName = $(obj).find('[id^="storeFileName"]').val();
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();
                var imgSize = $(obj).find('[id^="storeFileSize"]').val();

                uploadData['noLang'] = {
                    // campaignName: campaignName,
                    // priority : priority,
                    // bannerPage : bannerPage,
                    imgData: imgData,
                    imgName: imgName,
                    imgType: imgType,
                    imgFlag: imgFlag,
                    imgSize: imgSize,
                    defaultImage: '',
                    languageType: null
                };
            }

        });

        return uploadData;
    }

    function buildLangOption() {
        var html = `<option value="">Select Language</option>`;
        if(systemLang) {
            $.each(systemLang, function(i, obj) {
                html += `<option value="${obj.language}">${translations[obj.language_code][language]}</option>`;
            });
        }

        return html;
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

    function addImage(){
      
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
        $("#modalImg").attr('src', $("#storeFileData"+n).val());
        $("#showImage").modal();
    }


    function submitCallback(data, message) {
        showMessage('Successful add banner', 'success', 'Congratulations', 'upload', 'getGTBannerList');
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

    function buildCountry(data, message){
        systemLang = data.systemLanguages;

        $("#fileUploadLang1").html(buildLangOption());

        $(".upload").change(function(){
            readURL(this);
        });
    }

</script>
</body>
</html>