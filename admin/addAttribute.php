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
                                    <div class="col-xs-12 cateblock" style="border-width: 1px 1px 1px 1px;">
                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Name</label>
                                                        <input id="attrName" type="text" class="form-control">
                                                        <span id="nameError" class="errorSpan text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Value</label>
                                                        <input id="attrValName" type="text" class="attrVal form-control">
                                                        <span id="attrValError" class="errorSpan text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Value 2</label>
                                                        <input id="attrValName2" type="text" class="attrVal form-control">
                                                        <span id="attrVal2Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Status</label>
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

        $(document).ready(function() {

            $('#submitBtn').click(function() {
                $('[id$="Error"]').text("");
                
                var type = $(".typeRadio:checked").val();
                var status = $(".statusRadio:checked").val();
                var attribute = $('#attrName').val();
                var attributeVal = [];

                $.each($(".attrVal"), function(k, v){
                    var name = $(v).val();

                    if(name != '') {
                        var buildName = {
                            name        : name
                        };
                    }
                    attributeVal.push(buildName);
                });

                var formData  = {
                    command      : 'addAttribute',
                    attribute    : attribute,
                    attributeVal : attributeVal,
                    status       : status,
                };
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getAttributeList.php');
            });
        });

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'plus', 'getAttributeList.php');
        }

    </script>
</body>
</html>

