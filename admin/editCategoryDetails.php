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

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12">
                                                <div class="row">
                                                    <!-- <div class="col-xs-12">
                                                        <label>Name</label>
                                                        <input id="name" type="text" class="form-control">
                                                        <span id="nameError" class="errorSpan text-danger"></span>
                                                    </div> -->

                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Category Name (English) <span class="text-danger">*</span></label>                                                        
                                                        <input type="text" class="form-control" id="categoryName" required>
                                                        <input type="text" class="form-control hide" id="categoryLang">

                                                        <span id="nameError" class="errorSpan text-danger"></span>
                                                    </div>

                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Category Name (Chinese)</label>                                                        
                                                        <input type="text" class="form-control" id="categoryNameChinese">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-5 col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <div class="form-group">
                                                            <label>Parent Category Name</label>
                                                            
                                                            <select id="parentCategorySelect" class="form-control" required></select>
                                                        </div>
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
        var nameLanguages;
        var id = "<?php echo $_POST['id']; ?>";

        $(document).ready(function() {
            var formData  = {
                command         : 'getCategoryInventory',
            };
            fCallback = loadCategory;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {
                var type = $(".typeRadio:checked").val();
                var status = $(".statusRadio:checked").val();
                var category = [];
                // var name = $("#name").val();
                // var nameTagArr = [];

                // $.each($(".langInp"), function(k, v){
                    // var lang = $(v).attr('data-lang');
                    // var name = $(v).val();

                    var buildName = {
                        name        : $("#categoryName").val(),
                        language    : language
                    };

                    var buildNameChinese = {
                        name        : $("#categoryNameChinese").val(),
                        language    : 'chinese',
                    };

                    category.push(buildName);
                    category.push(buildNameChinese);

                // });

                var formData  = {
                    command         : 'editCategoryInventory',
                    status          : status,
                    categoryInvId   : id,
                    // name            : $("#categoryName").val(),
                    // language        : 'English',
                    parent_id       : $('option:selected', "#parentCategorySelect").val(),
                    category        : category
                };

                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getCategoryList.php');
            });
        });

        function loadCategory(data, message) {
            var html = `<option value="0">No Parent</option>`;
            var parent_id = '';

            $.each(data.categoryList, function(k,v){
                if(v['id'] == id) {
                    parent_id = v['parent_id'];
                }
            });

            $.each(data.parentCategoryList, function(k,v){
                if(v['id'] != id) {
                    if(v['id'] == parent_id){
                        html += `
                        <option value="${v['id']}" selected>${v['name']}</option>
                        `;
                    }else{
                        html += `
                            <option value="${v['id']}">${v['name']}</option>
                        `;
                    }
                }
            });

            $("#parentCategorySelect").html(html);

            $('#parentCategorySelect').select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            var formData  = {
                command         : 'getCategoryInventoryDetail',
                categoryInvId   : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadDefaultListing(data, message) {
            // $("#name").val(data.productCategoryList.name);
            var type = data.categoryRes.type;
            var status = data.categoryRes.status;
            var category = data.categoryRes.parent_id;
            var name = data.categoryRes.name;

            if(data.categoryRes.nameChinese.chinese){
                var nameChinese = data.categoryRes.nameChinese.chinese.content;
            }else{
                var nameChinese = '';
            }

            $(".typeRadio[id='"+type+"']").prop("checked", true);
            $(".typeRadio").prop("disabled", true);
            $(".statusRadio[value='"+status+"']").prop("checked", true);
            $("#parentCategorySelect").val(category);
            $("#categoryName").val(name);
            $("#categoryNameChinese").val(nameChinese);
            if(data.matchingCategories == 'not match')
            {
                document.getElementById('parentCategorySelect').disabled = true;
            }

            var langHtml = "";

            $.each(data.languageList, function(k,v){

                var getArr = (data.nameTranslationList).filter((item) => item.language == v['languageType'])[0];

                if(getArr){
                    langHtml += `
                        <div class="form-group">
                            <label>${v['languageDisplay']}</label>
                            <input type="text" class="form-control langInp" name="" data-lang="${v['languageType']}" value="${getArr.content}">
                        </div>
                    `;
                }
                
            });

            $("#loadLangName").html(langHtml);

            // var html = `<option value="">Select Product</option>`;

            // $.each(data.languageList, function(k,v){
            //     html += `
            //         <div class="form-group">
            //             <label>${v['languageDisplay']}</label>
            //             <input type="text" class="form-control langInp" name="categoryName" data-lang="${v['languageType']}">
            //             <span id="name${v['languageType']}Error" class="errorSpan text-danger"></span>
            //         </div>
            //     `;
            // });

            // $("#parentCategorySelect").html(html);
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'edit', 'getCategoryList.php');
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

