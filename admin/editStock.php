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
                                            <label>Product Name</label>
                                            <input id="productName" type="text" class="form-control" disabled>
                                        </div> 
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Serial Number</label>
                                            <input id="serialNum" type="text" class="form-control" disabled>
                                        </div> 
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Expiration Date</label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="expirationDate" type="text" class="form-control" required>
                                            </div>
                                            <!-- <input id="expirationDate" type="date" class="form-control" required> -->
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                               Edit
                                            </button>
                                            <button type="button" id="printBtn" class="btn btn-primary waves-effect waves-light">
                                                Print Serial
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

    <div id="printarea">
        <div class="printSticker" id="1">
            <div><img src="images/GoTastyLogo.png" class="printLogo"></div>
            <div>Johor Segamat Hock Bee - Sambal Crisps 150g</div>
            <div>Jelutong Genting Cafe</div>
            <div>Chee Cheong Fun - Big (2 Packets)</div>
            <div>Best Before : 27 Feb 23</div>
            <div id="qrCode"></div>
            <div id="qrLink"></div>
            <div>Scan Here for preparation instruction</div>
            <div>Go Tasty Sdn Bhd (1429649-H)</div>
            <div class="socialMediaGrp">
                <div>
                    <img src="">
                    <span>facebook.com/gotasty.net</span>
                </div>
                <div>
                    <img src="">
                    <span>instagram.com/gotastynet</span>
                </div>
            </div>
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
    var serialNumber    = "";
    var productName     = "";
    var expirationDate  = "";
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";

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

        $('#printSerial').click(printStickers);

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
        var stockData = data.stockData;
        productName = stockData.productName;
        serialNumber = stockData.serial_number;
        expirationDate = stockData.expiration_date

        $("#serialNum").val(stockData.serial_number);
        $("#productName").val(stockData.productName);
        $("#expirationDate").val(stockData.expiration_date);
    }

    $('#printBtn').click(function() {
        $('#printarea').empty();

        if(serialNumber && productName) {
            var html = `
                <div class="printSticker" id="printSticker0">
                    <div class="productNameEN bigText"></div>
                    <div><b>Best Before : <span class="bestBefore"></span></b></div>
                    <div class="qrCode"></div>
                    <div class="qrLink smallText"></div>
                </div>
            `;

            $('#printarea').append(html);

            var serialLink = defaultSNUrl + serialNumber;
            var QRCODE_CONTENT = serialLink;

            $(`#printSticker0 .qrLink`).html(serialLink);

            $(`#printSticker0 .qrCode`).qrcode({
                render: "canvas",
                text: QRCODE_CONTENT,
                width: 100,
                height: 100,
                background: "#ffffff",
                foreground: "#000000",
            });

            var count = 0;

            $(`#printSticker0 .productNameZH`).html(productName);
            $(`#printSticker0 .productNameEN`).html(productName);
            $(`#printSticker0 .bestBefore`).html(expirationDate);
            

            window.print();
        } else {
            showMessage('Serial number or product not found.', 'warning', 'Print Serial Number', '', '');
        }
    
    });

    $('#expirationDate').datepicker({
        // language: language,
        format      : 'yyyy-mm-dd',
        orientation : 'auto',
        autoclose   : true
    });

    

</script>
</body>
</html>

