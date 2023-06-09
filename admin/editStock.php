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
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Expiration Date</label>
                                            <input id="expirationDate" type="date" class="form-control" required>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */?>
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
    var stockID         = "<?php echo $_POST['stockID']; ?>";
    var poId            = '<?php echo $_POST['poId']; ?>';
    var productId       = '<?php echo $_POST['productId']; ?>';
    var productName     = '<?php echo $_POST['productName']; ?>' != "-" ? '<?php echo $_POST['productName']; ?>' : "";
    var vendorName      = '<?php echo $_POST['vendorName']; ?>' != "-" ? '<?php echo $_POST['vendorName']; ?>' : "";
    var code            = '<?php echo $_POST['code']; ?>' != "-" ? '<?php echo $_POST['code']; ?>' : "";


    $(document).ready(function() {
       
        var formData  = {
            command: 'getStockExpirationDate',
            stockID: stockID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            var inputElement = document.getElementById("expirationDate");
            var expiryDate   = inputElement.value;


            var formData  = {
                command         : 'getStockExpirationDate',
                stockID         : stockID,
                expirationDate  : expiryDate,
                type            : 'edit'
               
            };
            fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

       
    });

    function submitCallback(data, message) {
        showMessage(message, 'success', 'Congratulations', '', '');

        $.redirect('stockSerialList.php', {
            // stockID     : stockID,
            poId        : poId,
            productId   : productId,
            productName : productName,
            vendorName  : vendorName,
            code        : code
        });
    }

    $('#backBtn').click(function() {
        $.redirect('stockSerialList.php', {
            // stockID     : stockID,
            poId        : poId,
            productId   : productId,
            productName : productName,
            vendorName  : vendorName,
            code        : code
        });
    });

    function loadDefaultListing(data) {
        $("#expirationDate").val(data);
    }

</script>
</body>
</html>

