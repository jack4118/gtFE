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

                                    <!-- <div> -->
                                        <!-- <label>Category Type</label> -->
                                        <!-- <div class="cateTab"> -->
                                            <!-- <div class="radio radio-info radio-inline"> -->
                                            <!-- <div class="cateItem">
                                                <input class="typeRadio" id="Package" type="radio" value="package" name="typeRadio" />
                                                <label for="Package">
                                                    <?php echo $translations['A00203'][$language]; /* Package */?>
                                                </label>
                                            </div>
                                            <div class="cateItem">
                                                <input class="typeRadio" id="Product" type="radio" value="product" name="typeRadio"/>
                                                <label for="Product">
                                                    <?php echo $translations['A00828'][$language]; /* Product */?>
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-xs-12 cateblock" style="border-width: 1px 1px 1px 1px;">
                                        <div class="row">

                                            <div class="col-sm-5 col-xs-12">
                                                <div class="row">
                                                    <!-- <div class="col-xs-12">
                                                        <label>Name</label>
                                                        <input id="name" type="text" class="form-control">
                                                        <span id="nameError" class="errorSpan text-danger"></span>
                                                    </div> -->

                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label class="show m-b-10 contentPageTitle">Category Name</label>

                                                        <div id="loadLangName"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Status</label>
                                                <div id="status" class="m-b-20">
                                                    <!-- <div class="radio radio-info radio-inline"> -->
                                                    <div class="radio radio-inline">
                                                        <input class="statusRadio" id="active" type="radio" value="Active" name="statusRadio" />
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
                                                </div>
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
        var id = "<?php echo $_POST['id']; ?>";

        $(document).ready(function() {

            var formData  = {
                command         : 'getCategoryInventoryDetail',
                categoryInvId   : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {
                var type = $(".typeRadio:checked").val();
                var status = $(".statusRadio:checked").val();
                var category = [];
                // var name = $("#name").val();
                // var nameTagArr = [];

                $.each($(".langInp"), function(k, v){
                    var lang = $(v).attr('data-lang');
                    var name = $(v).val();

                    var buildName = {
                        name        : name,
                        language    : lang
                    };

                    category.push(buildName);
                });

                /*$('.nameTag').each(function (index, value) {
                    // nameTagArr.push(value.id);

                    var username = $(this).attr("data-username");

                    // var details = {
                    //     username: username
                    // };

                    nameTagArr.push(username);
                });*/

                var formData  = {
                    command         : 'editCategoryInventory',
                    category        : category,
                    // type            : type,
                    status          : status,
                    categoryInvId   : id
                };

                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getCategoryList.php');
            });
        });

        /*$(document).on("click",".nameTagBlock",function() {
            $(this).remove();
        });*/

        function loadDefaultListing(data, message) {
            // $("#name").val(data.productCategoryList.name);
            var type = data.categoryRes.type;
            var status = data.categoryRes.status;

            $(".typeRadio[id='"+type+"']").prop("checked", true);
            $(".typeRadio").prop("disabled", true);
            $(".statusRadio[value='"+status+"']").prop("checked", true);

            var langHtml = "";

            $.each(data.languageList, function(k,v){

                var getArr = (data.nameTranslationList).filter((item) => item.language == v['languageType'])[0];

                langHtml += `
                    <div class="form-group">
                        <label>${v['languageDisplay']}</label>
                        <input type="text" class="form-control langInp" name="" data-lang="${v['languageType']}" value="${getArr.content}">
                    </div>
                `;
            });

            $("#loadLangName").html(langHtml);
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'edit', 'getCategoryList.php');
        }

        /*function uploadVideoSuccess() {
            showMessage('Upload Success', 'success', 'Congratulations!', 'upload', 'getProductCategory.php');
        }*/

    </script>
</body>
</html>

