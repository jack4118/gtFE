<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
//Form submission issue
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
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
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>From</label>
                                            <input id="fromRange" type="text" class="form-control" disabled>
                                        </div> 
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>To</label>
                                            <input id="toRange" type="text" class="form-control" disabled>
                                        </div> 
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>State</label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="state" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Delivery Method</label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="deliveryMethod" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Base Price</label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="basePrice" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Surcharge</label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="surcharge" type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" require>
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                               Edit
                                            </button>
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

<script>
var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var postCodeID      = "<?php echo $_POST['id']; ?>";
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";

    $(document).ready(function() {
        var formData  = {
            command: 'getPostCodeData',
            postCodeID: postCodeID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            var inputElement = document.getElementById("surcharge");
            var surcharge   = inputElement.value;


            var formData  = {
                command         : 'getPostCodeData',
                postCodeID      : postCodeID,
                surcharge       : surcharge,
                type            : 'edit'
               
            };
            fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });

    function submitCallback(data, message) {
        showMessage(message, 'success', 'Successful edited', '', '');
    }

    $('#backBtn').click(function() {
        $.redirect('getPostCodeList.php');
    });

    function loadDefaultListing(data) {
        var postCodeData = data.postCodeData;

        $("#fromRange").val(postCodeData.from_range);
        $("#toRange").val(postCodeData.to_range);
        $("#state").val(postCodeData.state);
        $("#deliveryMethod").val(postCodeData.delivery_method_id);
        $("#basePrice").val(postCodeData.shipping_fee);
        $("#surcharge").val(postCodeData.surcharge);
    }

</script>
</body>
</html>

