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
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Name</label>
                                                        <input id="attrName" type="text" class="form-control">
                                                        <span id="nameError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Status</label>
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
                                                </div>
                                                
                                                <div class="row attrVal">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Value</label>
                                                        <input id="attrValName1" type="text" class="form-control">
                                                        <span id="attrValError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Value Status</label>
                                                        <div id="attValStatus1" class="m-b-20">
                                                            <div class="radio radio-inline ">
                                                                <input class="attrValStatusRadio1" id="active1" type="radio" value="Active" name="attrValStatusRadio1" checked />
                                                                <label for="active1">
                                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input class="attrValStatusRadio1" id="inActive1" type="radio" value="Inactive" name="attrValStatusRadio1"/>
                                                                <label for="inActive1">
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row attrVal">
                                                    <div class="col-xs-12" style="margin-top: 20px">
                                                        <label>Attribute Value 2</label>
                                                        <input id="attrValName2" type="text" class="form-control">
                                                        <span id="attrVal2Error" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 20px;">
                                                        <label>Attribute Value Status 2</label>
                                                        <div id="attValStatus2" class="m-b-20">
                                                            <div class="radio radio-inline">
                                                                <input class="attrValStatusRadio2" id="active2" type="radio" value="Active" name="attrValStatusRadio2" />
                                                                <label for="active2">
                                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input class="attrValStatusRadio2" id="inActive2" type="radio" value="Inactive" name="attrValStatusRadio2"/>
                                                                <label for="inActive2">
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                                </label>
                                                            </div>
                                                        </div>
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
        var attrValId = [];

        $(document).ready(function() {

            var formData  = {
                command : 'getAttributeDetail',
                attrId  : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {
                var name = $('#attrName').val();
                var status = $(".statusRadio:checked").val();
                var attributeVal = [];

                $.each($(".attrVal"), function(k, v){
                    var attrName = $('#attrValName'+[k+1]).val();
                    var attrStatus = $(".attrValStatusRadio"+[k+1]+":checked").val();
                    var attrId     = attrValId[k];

                    var buildName = {
                        name   : attrName,
                        status : attrStatus,
                        id     : attrId
                    };
                    attributeVal.push(buildName);
                });

                var formData  = {
                    command      : 'editAttribute',
                    attribute    : name,
                    status       : status,
                    attrId       : id,
                    attributeVal : attributeVal,
                };
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getAttributeList.php');
            });
        });

        function loadDefaultListing(data, message) {
            var name = data['attributeDetail'][0]['name'];
            var status = data['attributeDetail'][0]['status'];

            $('#attrName').val(name);
            $(".statusRadio[value='"+status+"']").prop("checked", true);

            var attributeValue = data['attributeDetail'][0]['value'];

            $.each(attributeValue, function(k, v) {
                attrValId[k] = v['id'];
                $('#attrValName'+[k+1]).val(v['name']);
                $(".attrValStatusRadio"+[k+1]+"[value='"+v['status']+"']").prop("checked", true);
            });
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'edit', 'getAttributeList.php');
        }

    </script>
</body>
</html>

