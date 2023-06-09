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
                            <div class="card-box">
                                <div class="row">

                                    <!-- <div class="">
                                        <label>Category Type</label>
                                        <div class="cateTab">
                                            <div class="radio radio-info radio-inline">
                                            <div class="cateItem">
                                                <input class="typeRadio" id="package" type="radio" value="package" name="typeRadio" checked />
                                                <label for="package">
                                                    <?php echo $translations['A00203'][$language]; /* Package */?>
                                                </label>
                                            </div>
                                            <div class="cateItem">
                                                <input class="typeRadio" id="product" type="radio" value="product" name="typeRadio"/>
                                                <label for="product">
                                                    <?php echo $translations['A00828'][$language]; /* Product */?>
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-xs-12 cateblock">
                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 10px">
                                                        <label class="show m-b-10 contentPageTitle">Template Name (English) <span class="text-danger">*</span></label>
                                                        <input type="text" id="methodName" class="form-control" name="" required>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 10px">
                                                        <label class="show m-b-10 contentPageTitle">Template Name (Chinese)</label>
                                                        <input type="text" id="methodNameChinese" class="form-control" name="">
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 10px">
                                                        <label class="show m-b-10 contentPageTitle">Cooking Time <span class="text-danger">*</span></label>
                                                        <input type="text" id="methodTime" class="form-control" name="" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label class="show m-b-10 contentPageTitle">Cooking Instruction (English) <span class="text-danger">*</span></label>
                                                        <textarea id="instruction" class="form-control" rows="4" cols="50" required></textarea>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label class="show m-b-10 contentPageTitle">Cooking Instruction (Chinese)</label>
                                                        <textarea id="instructionChinese" class="form-control" rows="4" cols="50" required></textarea>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 10px">
                                                        <label class="show m-b-10 contentPageTitle">Default URL <span class="text-danger">*</span></label>
                                                        <input type="text" id="methodURL" class="form-control" name="" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <!-- <label>Status</label>
                                                <div id="status" class="m-b-20">
                                                    <div class="radio radio-inline">
                                                        <input class="statusRadio" id="active" type="radio" value="Active" name="statusRadio" checked />
                                                        <label for="active">
                                                            <?php echo $translations['A00372'][$language]; /* Active */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input class="statusRadio" id="inActive" type="radio" value="Inactive" name="statusRadio"/>
                                                        <label for="inActive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                        </label>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="col-xs-12" style="margin-bottom: 20px;">
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
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        // var language        = "<?php echo $language; ?>";
        // var selectedLang = [];
        var nameLanguages;
        // var descrLanguages;
        // var buildOption;
        // var addImgCount = 0;
        // var addImgIDNum = 0;
        // var dataURL = "<?php echo $config['tempMediaUrl']; ?>product/";

        $(document).ready(function() {

            $('#submitBtn').click(function() {
                var methodName = $('#methodName').val();
                var methodURL = $('#methodURL').val();
                var methodTime = $('#methodTime').val();
                // var instruction = $('#instruction').val();
                var instruction = tinymce.get('instruction').getContent();


                var cookingSuggestNameArr = [];

                var productNameEnglish = document.getElementById("methodName").value;
                var productNameChinese = document.getElementById("methodNameChinese").value;

                var englishObj = {
                language: "english",
                name: productNameEnglish
                };

                var chineseObj = {
                language: "chinese",
                name: productNameChinese
                };

                cookingSuggestNameArr.push(englishObj);
                cookingSuggestNameArr.push(chineseObj);


                // var description = $('#description').val();

                var descriptionArr = [];

                var descEnglish = tinymce.get('instruction').getContent();
                var descChinese = tinymce.get('instructionChinese').getContent();

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

                var inputArray = [];

                var buildName = {
                    descriptionArr           : descriptionArr,
                    cookingSuggestNameArr    : cookingSuggestNameArr,
                    methodName  : methodName,
                    methodURL   : methodURL,
                    methodTime  : methodTime,
                    instruction : instruction
                };
                inputArray.push(buildName);


                var formData  = {
                    command     : 'addCookingSuggestion',
                    inputArray    : inputArray,
                };

                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getCookingSuggest.php');
            });
        });

        // Plugins for text editor
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists searchreplace wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline addcomment showcomments | align lineheight | checklist numlist bullist | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
        });

        function loadDefaultListing(data, message) {
            // var langHtml = "";

            // $.each(data.languageList, function(k,v){
            //     langHtml += `
            //         <div class="form-group">
            //             <label>${v['languageDisplay']}</label>
            //             <input type="text" class="form-control langInp" name="" data-lang="${v['languageType']}">
            //             <span id="name${v['languageType']}Error" class="errorSpan text-danger"></span>
            //         </div>
            //     `;
            // });

            // $("#loadLangName").html(langHtml);
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'plus', 'getCookingSuggest.php');
        }

    </script>
</body>
</html>

