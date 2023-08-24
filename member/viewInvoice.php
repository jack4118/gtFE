<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'homepageHeader.php'; ?>

<link href="css/invoice.css" rel="stylesheet" type="text/css" />
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<?php
$viewTypeFromSession = $_SESSION['POST'][$postAryName]['viewType'];
$viewTypeFromQueryParams = $_GET['viewType'];

$viewType = $viewTypeFromQueryParams ? $viewTypeFromQueryParams : $viewTypeFromSession;

if ($viewType == "invoice") {
?>
    <section class="pageContent loginPagePadding section">
        <div class="kt-container row">
            <div id="invoiceContent" class="col-12 invoiceOuterWrapper whiteBg mt-3">
                <div class="invoiceWrapper">
                    <div class="col-12 pt-5">
                        <div class="row pb-4">
                            <div class="col-12 col-md-5 text-center text-md-left">
                                <img src="images/project/newlogo-dark.png" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-6 offset-md-1 text-center text-md-right mt-5 mt-md-0">
                                <div class="bodyText larger" id="companyAddress" style="max-width: 300px; margin-left: auto;">-</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="borderBottom darkGrey normal"></div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12 text-center pt-3 pb-5">
                                <div class="titleText larger bold invoiceTitle"><?php echo $translations['M04020'][$language] /* Invoice */ ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="bodyText smaller bold" data-lang="M03438"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?>:</div>
                                <div class="bodyText smaller mt-2" id="billingAddress">-</div>
                            </div>
                            <div class="col-12 col-md-6 mt-5 mt-md-0">
                                <div class="bodyText smaller bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?>:</div>
                                <div class="bodyText smaller mt-2" id="shippingAddress">-</div>
                            </div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-12 col-md-6">
                                <div class="bodyText smaller bold" data-lang="M03935"><?php echo $translations['M03935'][$language] /* Order */ ?> <font id="orderNumber"></font></div>

                                <div class="bodyText smaller bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:</div>
                                <div class="bodyText smaller" id="orderDate">-</div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <form id="orderHistoryPrint">
                                    <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                            <div id="invoiceDiv" class="table-responsive"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="col-12" data-lang="A01150">
                                <?php echo $translations['A01150'][$language] /* Payment Method */ ?>: <font id="paymentMethod">-</font>
                            </div>
                            <?php if($_SESSION['POST'][$postAryName]['viewType'] == "receipt"){ ?>
                            <div class="col-12" data-lang="M04068">
                                <?php echo $translations['M04068'][$language] /* Payment Status */ ?>: <font id="paymentStatus">-</font>
                            </div>
                            <?php } ?>
                            <div id="giftDisplay" class="col-12" data-lang="A01150" style="display:none; color:red">
                                <?php echo $translations['A00571'][$language] /* Remark */ ?>: <font id="gift">-</font>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-container row flex-column flex-md-row align-items-center py-5">
            <div class="col-12 col-lg-2 col-md-3 mr-0 mr-md-4 px-0">
                <button type="button" class="btn btn-primary grey text-center w-100" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
            </div>
            <div class="col-12 col-lg-2 col-md-3 px-0">
                <button type="button" class="btn btn-primary text-center mt-3 mt-md-0 w-100" id="download">
                <div class="bodyText smaller text-white" data-lang="M00150">
                    <?php echo $translations['M00150'][$language]; /* Download */ ?>
                    <?php if(isset($_SESSION['POST'][$postAryName]['type'])) echo $_SESSION['POST'][$postAryName]['type']; /* Invoice / Quotation */ ?>
                </div>
            </button>
            </div>
        </div>
    </section>
<?php } ?>

<?php
$viewTypeFromSession = $_SESSION['POST'][$postAryName]['viewType'];
$viewTypeFromQueryParams = $_GET['viewType'];

$viewType = $viewTypeFromQueryParams ? $viewTypeFromQueryParams : $viewTypeFromSession;

if ($viewType == "receipt") {
?>
    <section class="pageContent loginPagePadding section">
        <div class="kt-container row">
            <div id="invoiceContent" class="col-12 invoiceOuterWrapper whiteBg mt-3">
                <div class="invoiceWrapper">
                    <div class="col-12 pt-5">
                        <div class="row pb-4">
                            <div class="col-12 col-md-5 text-center text-md-left">
                                <img src="images/project/newlogo-dark.png" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-6 offset-md-1 text-center text-md-right mt-5 mt-md-0">
                                <div class="bodyText larger" id="companyAddress" style="max-width: 300px; margin-left: auto;">-</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="borderBottom darkGrey normal"></div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12 text-center pt-3 pb-5">
                                <div class="titleText larger bold invoiceTitle"><?php echo $translations['M04064'][$language] /* Receipt */  ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="bodyText smaller bold" data-lang="M03438"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?>:</div>
                                <div class="bodyText smaller mt-2" id="billingAddress">-</div>
                            </div>
                            <div class="col-12 col-md-6 mt-5 mt-md-0">
                                <div class="bodyText smaller bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?>:</div>
                                <div class="bodyText smaller mt-2" id="shippingAddress">-</div>
                            </div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-12 col-md-6">
                                <div class="bodyText smaller bold" data-lang="M03935"><?php echo $translations['M03935'][$language] /* Order */ ?> <font id="orderNumber"></font></div>

                                <div class="bodyText smaller bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:</div>
                                <div class="bodyText smaller" id="orderDate">-</div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <form id="orderHistoryPrint">
                                    <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                            <div id="invoiceDiv" class="table-responsive"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="col-12" data-lang="A01150">
                                <?php echo $translations['A01150'][$language] /* Payment Method */ ?>: <font id="paymentMethod">-</font>
                            </div>
                            <?php if($_SESSION['POST'][$postAryName]['viewType'] == "receipt"){ ?>
                            <div class="col-12" data-lang="M04068">
                                <?php echo $translations['M04068'][$language] /* Payment Status */ ?>: <font id="paymentStatus">-</font>
                            </div>
                            <?php } ?>
                            <div id="giftDisplay" class="col-12" data-lang="A01150" style="display:none; color:red">
                                <?php echo $translations['A00571'][$language] /* Remark */ ?>: <font id="gift">-</font>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-container row flex-column flex-md-row align-items-center py-5">
            <div class="col-12 col-lg-2 col-md-3 mr-0 mr-md-4 px-0">
                <button type="button" class="btn btn-primary grey text-center w-100" id="backBtn">
                    <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                </button>
            </div>
            <div class="col-12 col-lg-2 col-md-3 px-0">
                <button type="button" class="btn btn-primary text-center mt-3 mt-md-0 w-100" id="download">
                <div class="bodyText smaller text-white" data-lang="M00150">
                    <?php echo $translations['M00150'][$language]; /* Download */ ?>
                    <?php if(isset($_SESSION['POST'][$postAryName]['type'])) echo $_SESSION['POST'][$postAryName]['type']; /* Invoice / Quotation */ ?>
                </div>
            </button>
            </div>
        </div>
    </section>
<?php } ?>

<?php 
$viewTypeFromSession = $_SESSION['POST'][$postAryName]['viewType'];
$viewTypeFromQueryParams = $_GET['viewType'];

$viewType = $viewTypeFromQueryParams ? $viewTypeFromQueryParams : $viewTypeFromSession;
if($viewType == "delivery order"){ ?> 
    <section class="pageContent loginPagePadding section deliveryOrder">
        <div class="kt-container row">
            <div id="invoiceContent" class="col-12 invoiceOuterWrapper whiteBg mt-3">
                <div class="invoiceWrapper">
                    <div class="col-12 pt-5">
                        <div class="row pb-4">
                            <div class="col-12 col-md-5 text-center text-md-left">
                                <img src="images/project/newlogo-dark.png" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-6 offset-md-1 text-center text-md-right mt-5 mt-md-0">
                                <div class="bodyText larger" id="companyAddress3" style="max-width: 300px; margin-left: auto;">-</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="borderBottom darkGrey normal"></div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12 text-center pt-3 pb-5">
                                <div class="titleText larger bold invoiceTitle"><?php echo $_SESSION['POST'][$postAryName]['viewType'] ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                            </div>
                            <div class="col-12 col-md-6 mt-5 mt-md-0">
                                <div class="bodyText smaller mt-2" id="shippingAddressDO">-</div>
                            </div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-12 col-md-6">
                                <div class="bodyText smaller bold" data-lang="M04023"><?php echo $translations['M04023'][$language] /* DO RECEIPT */ ?>  <font id="orderNumber2"></font></div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12 col-md-4">
                                <div class="bodyText smaller bold" data-lang="M02954"><?php echo $translations['M02954'][$language] /* Invoice Date */ ?>:</div>
                                <div class="bodyText smaller" id="orderDate2">-</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="bodyText smaller bold" data-lang="M03936"><?php echo $translations['M03936'][$language] /* Due Date */ ?>:</div>
                                <div class="bodyText smaller" id="dueDate">-</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="bodyText smaller bold" data-lang="M03937"><?php echo $translations['M03937'][$language] /* Source */ ?>:</div>
                                <div class="bodyText smaller" id="source">-</div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <form id="orderHistoryPrint">
                                    <div id="basicwizardInvoice" class="pull-in col-12 px-0">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsgInvoice" class="text-center" style="display: block;"></div>
                                            <div id="invoiceDiv" class="table-responsive"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <p data-lang="M04024"><?php echo $translations['M04024'][$language] /* Please use the following communication for your payment: RECEIPT */ ?><font id="orderNumberInfo"></font></p>

                                <p style="color: red;">所有食物请保存在4摄氏度以下。已解冻的食物不宜再反复冷冻存放。所有事物烹饪前都不需要预先解冻。</p>

                                <p style="color: red;">Please keep all food below 4 degree Celsius. Thawed food should not be re-frozen.</p>

                                <p style="color: red;">No thawing is needed prior cooking.</p>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="col-12">
                                <p class="bodyText larger" style="color:#38571a;" data-lang="M04025"><b><?php echo $translations['M04025'][$language] /* Earn RM10 by referring a friend! */ ?></b></p>

                                <p style="color:#38571a;" data-lang="M04026"><?php echo $translations['M04026'][$language] /* Get your friend to sign up an account with GoTasty with referral code: your phone number. <br/>You are entitled for RM10 rewards when your friend make first purchase above RM100. */ ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-container row flex-column flex-md-row align-items-center py-5">
                <?php if ($_GET['admin'] != 1): ?>
                    <div class="col-12 col-lg-2 col-md-3 mr-0 mr-md-4 px-0">
                        <button type="button" class="btn btn-primary grey text-center w-100" id="backBtn">
                            <div class="bodyText smaller text-white" data-lang="M00218"><?php echo $translations['M00218'][$language] /* Back */ ?></div>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="col-12 col-lg-2 col-md-3 px-0">
                    <button type="button" class="btn btn-primary text-center mt-3 mt-md-0 w-100" id="download">
                    <div class="bodyText smaller text-white" data-lang="M00150">
                        <?php echo $translations['M00150'][$language]; /* Download */ ?>
                        <?php if(isset($_SESSION['POST'][$postAryName]['type'])) echo $_SESSION['POST'][$postAryName]['type']; /* Invoice / Quotation */ ?>
                    </div>
                </button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include 'homepageFooter.php'; ?>

</body>

<!-- Print Content  -->
<?php if($_SESSION['POST'][$postAryName]['viewType'] == "invoice" || $_SESSION['POST'][$postAryName]['viewType'] == "receipt"){ ?>
    <div id="printContent" class="invoiceOuterWrapper whiteBg" style="display: none;">
        <div class="invoiceWrapper">
            <div class="col-12 pt-5">
                <div class="row pb-4">
                    <div class="col-5 text-left">
                        <img src="images/project/newlogo-dark.png" class="img-fluid">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6 text-right">
                        <div class="bodyText larger" id="companyAddress2" style="max-width: 300px; margin-left: auto;">-</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="borderBottom darkGrey normal"></div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12 text-center pt-3 pb-5">
                        <div class="titleText larger bold invoiceTitle"><?php echo $_SESSION['POST'][$postAryName]['viewType'] ?></div>
                    </div>
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03438"><?php echo $translations['M03934'][$language] /* Invoicing Address */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="billingAddress2">-</div>
                    </div>
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03192"><?php echo $translations['M03192'][$language] /* Shipping Address */ ?>:</div>
                        <div class="bodyText smaller mt-2" id="shippingAddress2">-</div>
                    </div>
                </div>
                
                <div class="row pt-4">
                    <div class="col-6">
                        <div class="bodyText smaller bold" data-lang="M03935"><?php echo $translations['M03935'][$language] /* Order */ ?> <font id="orderNumber3"></font></div>

                        <div class="bodyText smaller bold" data-lang="M03909"><?php echo $translations['M03909'][$language] /* Order Date */ ?>:</div>
                        <div class="bodyText smaller" id="orderDate3">-</div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <form id="orderHistoryPrint2">
                            <div id="basicwizardInvoice2" class="pull-in col-12 px-0">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsgInvoice2" class="text-center" style="display: block;"></div>
                                    <div id="invoiceDiv2" class="table-responsive"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-12" data-lang="A01150">
                        <?php echo $translations['A01150'][$language] /* Payment Method */ ?>: <font id="paymentMethod2">-</font>
                    </div>
                    <?php if($_SESSION['POST'][$postAryName]['viewType'] == "receipt"){ ?>
                    <div class="col-12" data-lang="M04068">
                        <?php echo $translations['M04068'][$language] /* Payment Status */ ?>: <font id="paymentStatus2">-</font>
                    </div>
                    <?php } ?>
                    <div id="giftDisplay2" class="col-12" data-lang="A01150" style="display:none; color:red">
                        <?php echo $translations['A00571'][$language] /* Remark */ ?>: <font id="gift2">-</font>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($_SESSION['POST'][$postAryName]['viewType'] == "delivery order"){ ?>
    <div id="printContent" class="invoiceOuterWrapper whiteBg">
        <div class="invoiceWrapper">
                <div class="col-12 pt-5">
                    <div class="row pb-4">
                        <div class="col-5 text-center text-md-left">
                            <img src="images/project/newlogo-dark.png" class="img-fluid">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6 text-right mt-5 mt-md-0">
                            <div class="bodyText larger" id="companyAddress4" style="max-width: 300px; margin-left: auto;">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="borderBottom darkGrey normal"></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12 text-center pt-3 pb-5">
                            <div class="titleText larger bold invoiceTitle"><?php echo $translations['M04021'][$language] /* Delivery Order */ ?></div>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="bodyText smaller mt-2" id="billingAddressDO2">-</div>
                        </div>
                    </div>
                    
                    <div class="row pt-4">
                        <div class="col-12 col-md-6">
                            <div class="bodyText smaller bold" data-lang="M04023"><?php echo $translations['M04023'][$language] /* DO RECEIPT */ ?><font id="orderNumber4"></font></div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M02954"><?php echo $translations['M02954'][$language] /* Invoice Date */ ?>:</div>
                            <div class="bodyText smaller" id="orderDate4">-</div>
                        </div>
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M03936"><?php echo $translations['M03936'][$language] /* Due Date */ ?>:</div>
                            <div class="bodyText smaller" id="dueDate2">-</div>
                        </div>
                        <div class="col-4">
                            <div class="bodyText smaller bold" data-lang="M03937"><?php echo $translations['M03937'][$language] /* Source */ ?>:</div>
                            <div class="bodyText smaller" id="source">-</div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <form id="orderHistoryPrint2">
                                <div id="basicwizardInvoice2" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsgInvoice2" class="text-center" style="display: block;"></div>
                                        <div id="invoiceDiv2" class="table-responsive"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <p data-lang="M04024"><?php echo $translations['M04024'][$language] /* Please use the following communication for your payment: RECEIPT */ ?><font id="orderNumberInfo"></font></p>

                            <p style="color: red;">所有食物请保存在4摄氏度以下。已解冻的食物不宜再反复冷冻存放。所有事物烹饪前都不需要预先解冻。</p>

                            <p style="color: red;">Please keep all food below 4 degree Celsius. Thawed food should not be re-frozen.</p>

                            <p style="color: red;">No thawing is needed prior cooking.</p>
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="col-12">
                            <p class="bodyText larger" style="color:#38571a;" data-lang="M04025"><b><?php echo $translations['M04025'][$language] /* Earn RM10 by referring a friend! */ ?></b></p>

                            <p style="color:#38571a;" data-lang="M04026"><?php echo $translations['M04026'][$language] /* Get your friend to sign up an account with GoTasty with referral code: your phone number. <br/>You are entitled for RM10 rewards when your friend make first purchase above RM100. */ ?></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>


<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var queryParams     = new URLSearchParams(window.location.search);
var saleId          = queryParams.get('saleId');
if(!saleId){
    var saleId          = '<?php echo $_SESSION['POST'][$postAryName]['id']  ?>';
}
var responseCode    = '<?php echo $_SESSION['POST'][$postAryName]['responseCode'] ?>';
var fromFPX         = '<?php echo $_SESSION['POST'][$postAryName]['fromFPX'] ?>';
var viewType            = queryParams.get('viewType');
if(!viewType){
    var viewType        = '<?php echo $_SESSION['POST'][$postAryName]['viewType']  ?>';
}
var doNo            = queryParams.get('doNo');

// var phone           = '<?php echo $_SESSION['POST'][$postAryName]['phone'] ?>';
// var redirectPass    = '<?php echo $_SESSION['POST'][$postAryName]['redirectPass'] ?>';
var phone = '<?php echo $_SESSION['POST'][$postAryName]['phone'] ?>';
var soNo            = queryParams.get('soNo');
if(!soNo){
    var soNo = '<?php echo $_SESSION['POST'][$postAryName]['soNo'] ?>';
}
/*if('<?php echo $_SESSION['POST'][$postAryName]['phone'] ?>'){
    var phone       = '<?php echo $_SESSION['POST'][$postAryName]['phone'] ?>';
}else if('<?php echo $_SESSION['POST'][$postAryName]['redirectPass'] ?>'){
    var phone       = '<?php echo $_SESSION['POST'][$postAryName]['redirectPass'] ?>';
}*/
var returnedSoNum   = '<?php echo $_SESSION['POST'][$postAryName]['returnedSoNum'] ?>';

var invoiceDivId    = 'invoiceDiv';
var invoiceTableId  = 'invoiceTable';
var invoicePagerId  = 'invoicePagerList';
var btnArrayInvoice = {};
var deliveryDate = document.getElementById("deliveryDate");
var deliveryDateLabel = document.getElementById("deliveryDateLabel");
var trackingNoLabel = document.getElementById("trackingNoLabel");
var trackingNo = document.getElementById("trackingNo");

// Hide the deliveryDate and trackingNo elements
// <?php if($_SESSION['POST'][$postAryName]['type'] != $translations['M03923'][$language] /* Delivery Order */) 
// {
// ?>
//     deliveryDate.style.display = "none";
//     deliveryDateLabel.style.display = "none";
//     trackingNoLabel.style.display = "none";
//     trackingNo.style.display = "none";
// <?php
// }
// ?>


var thArrayInvoice  = Array (
    "<?php echo $translations['M03910'][$language] /* Product */ ?>",
    "<?php echo $translations['M00244'][$language] /* Quantity */ ?>",
    "<?php echo $translations['M00242'][$language] /* Unit Price */ ?>",
    "<?php echo $translations['M01795'][$language] /* Amount */ ?>",
);

var thArrayDO  = Array (
    "<?php echo $translations['M03910'][$language] /* Product */ ?>",
    "<?php echo $translations['M00244'][$language] /* Quantity */ ?>",
);

$(document).ready(function() { 
    if(!saleId) {
        showMessage('<?php echo $translations['M03911'][$language] /* Invalid Order. */ ?>', 'warning', '<?php if(isset($_SESSION['POST'][$postAryName]['type'])) { echo $_SESSION['POST'][$postAryName]['type']; } /* Invoice / Quotation */ ?>', 'warning', 'paymentListing');
    }

    formData  = {
        command     : "getSaleDetail",
        doNo        : doNo,
        SaleID      : saleId
    };
    fCallback = loadInvoiceDetails;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#backBtn').click(function() {
        //callBackend();
        $.redirect('orderStatus', { SONO:  soNo,phone:phone}, 'GET');
        // $.redirect('orderStatus', {id: saleId, responseCode: responseCode, fromFPX: fromFPX, phone: phone, returnedSoNum: returnedSoNum});
    })

    $('#download').click(function() {
        window.print();
    })

    /*function callBackend() {
        var formData = {
            command: 'getSO_NO',
            id: saleId,
        };
        var fCallback = getsaleOrderNO;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function getsaleOrderNO(data, message) {
        so_no = data;
        redirectToOrderStatus();
    }

    function redirectToOrderStatus() {
        if (typeof so_no !== 'undefined' && so_no !== null && so_no !== '') {
            clearCart();
            removeCookie('redeemAmount');
            $.redirect('orderStatus', { SONO: so_no }, 'GET');
        }
    }*/

    var so_no;

});

function loadInvoiceDetails(data, message) {
    if(data) {
        var companyAddressAct = data.companyAddressAct;
        var productQuantity = data.productQuantity;
        var companyContact = data.companyContact;
        var shippingAddress = data.deliveryAddress;
        var billingAddress = data.billingAddress;
        var invoiceDetail = data.invoiceDetail;
        var giftStatus = data.giftStatus;
        var deliveryOrderNo = data.deliveryOrderNo;

        if(viewType == "invoice" || viewType == "receipt") {
            var packageList = data.packageList;
        }
        else if(doNo != null)
        {
            var packageList = data.detailDeliveryOrder;
            var orderNumber2 = deliveryOrderNo;
        }
        else{
            console.log(doNo);
            var packageList = data.invoiceDetailDelivery;
            var orderNumber2 = invoiceDetail.id;

        }
        var subtotal = data.subtotal;
        var dueDate = data.dueDate;
        var source = data.source;
        var accumulatedRewardPoint = data.accumulatedRewardPoint;
        var companyAddress = data.companyAddress;

        // $("#paymentMethod").html(invoiceDetail.paymentMethod);
        // $("#paymentMethod2").html(invoiceDetail.paymentMethod);

        if(invoiceDetail.status == 'Paid' || invoiceDetail.status == 'Packed' || invoiceDetail.status == 'Delivered' || invoiceDetail.status == 'Out of Delivery' || invoiceDetail.status == 'Out For Delivery' || invoiceDetail.status == 'Order Processing'){
            var paymentStatus = '<?php echo $translations['M02544'][$language] /* Success */ ?>';
        }else{
            var paymentStatus = '<?php echo $translations['M04083'][$language] /* Failed */ ?>';
        }
        $("#paymentStatus").html(paymentStatus);
        $("#paymentStatus2").html(paymentStatus);

        // if(viewType == 'invoice'){
        //     const divElement = document.querySelector('div[data-lang="M04068"]');
        //     divElement.style.display = 'none';
        // }

        $("#paymentMethod").html(invoiceDetail.paymentMethod);
        $("#paymentMethod2").html(invoiceDetail.paymentMethod);


        if(giftStatus){
            $("#giftDisplay").css("display", "block");
            $("#gift").html('This is a gift');

            $("#giftDisplay2").css("display", "block");
            $("#gift2").html('This is a gift');
        }


        // var company = `
        //     <div class="bodyText smaller bold">${companyAddressAct['name']}</div>
        //     <div class="bodyText smaller">${companyAddressAct['address']}, ${companyAddressAct['city']},</div>
        //     <div class="bodyText smaller">${companyAddressAct['postCode']} ${companyAddressAct['state']}</div>
        // `;

        var company = `
            <div class="bodyText smaller bold">${companyAddressAct['name']}</div>
            <div class="bodyText smaller">${companyAddress}</div>
        `;

        $('#companyAddress').html(company);
        $('#companyAddress2').html(company);
        $('#companyAddress3').html(company);
        $('#companyAddress4').html(company);

        if(invoiceDetail.deliveryMethod == 'Pickup') {
            $('#shippingAddress').parent().find('div:first-child').html('<?php echo $translations['M02994'][$language] /* Pickup Address */ ?>:');
            
            var pickup = `
                <div class="bodyText smaller">${data.companyAddressAct.name}</div>
                <div class="bodyText smaller address">${data.companyAddress.replace(/\n/g, '<br>')}</div>
                <div class="bodyText smaller"> <i class="fa fa-phone bodyText smaller bold"></i> ${data.companyContact.contactNo}</div>
            `;

            // var shippingMobile = `
                
            // `;

            // $('#shippingAddress').html(pickup);
            // $('#shippingPhone').html(pickup);


            // var pickup = `
            //     <div class="bodyText smaller bold">${invoiceDetail.deliveryMethod}</div>
            // `;
            // $('#shippingAddress').parent().find('div:first-child').append(pickup);
            // $('#shippingAddress2').parent().find('div:first-child').append(pickup);
            $('#shippingAddress').html(pickup);
            $('#shippingAddress2').html(pickup);
        } else {
            // if(shippingAddress) {
                var shipping = `
                    <div class="bodyText smaller">${invoiceDetail.shipping_name}</div>
                    <div class="bodyText smaller">${invoiceDetail.shipping_address}</div>
                    <div class="bodyText smaller"> <i class="fa fa-phone bodyText smaller bold"></i> ${invoiceDetail.shipping_phone}</div>
                `;
                $('#shippingAddress').html(shipping);
                $('#shippingAddress2').html(shipping);
                $('#shippingAddressDO').html(shipping);
            // } 
        }
        
        // if(billingAddress) {
            var billing = `
                <div class="bodyText smaller">${invoiceDetail.billing_name}</div>
                <div class="bodyText smaller">${invoiceDetail.billing_address}</div>
                <div class="bodyText smaller"><i class="fa fa-phone bodyText smaller bold"></i> ${invoiceDetail.billing_phone}</div>
            `;
            $('#billingAddress').html(billing);
            $('#billingAddress2').html(billing);
            $('#billingAddressDO').html(billing);
            $('#billingAddressDO2').html(billing);
        // }

        $('#orderNumber').html("#" + invoiceDetail.so_no);
        $('#orderNumberInfo').html(invoiceDetail.id);
        $('#orderNumber2').html(orderNumber2);
        $('#orderNumber3').html("#" + invoiceDetail.so_no);
        $('#orderNumber4').html(invoiceDetail.do_name);

        // moment(v['created_at'], 'YYYY-MM-DD h:mm:ss').format('Do MMMM YYYY')
        $('#orderDate').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate2').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate3').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");
        $('#orderDate4').html(moment(invoiceDetail.orderDate, 'DD-MM-YYYY h:mm:ss').format('Do MMMM YYYY') + "");

        $('#dueDate').html(dueDate);
        $('#dueDate2').html(dueDate);
        $('#source').html(source);

        var newList = [];
        $.each(packageList, function(k, v) {
            var productName = '';

            productName += `
                <font class="bodyText smaller">${v['packageDisplay']}</font>
            `;

            if(v['product_attribute_name'] != '') {
                productName += `
                    <div class="bodyText smaller">(${v['product_attribute_name']})</div>
                `;
            }

            var rebuildData = {
                productName     : productName,
                quantity        : numberThousand(v['packageQuantity'], 0),
                // unitPrice       : 'RM' + numberThousand(v['packagePrice'], 2),
                // amount          : 'RM' + numberThousand(v['totalPackagePrice'], 2),
            };

            if(viewType == "invoice" || viewType == "receipt") {
                var hasDiscount = false;
                if(v['latestUnitPrice'] != 0 && v['latestPrice'] != 0) hasDiscount = true;
                    
                if(hasDiscount) {
                    rebuildData['unitPrice'] = 'RM' + Number(v['latestUnitPrice']).toFixed(2);
                    rebuildData['amount'] = 'RM' + Number(v['latestPrice']).toFixed(2);
                } else {

                    if(v["type"] == "redeem_point")rebuildData['unitPrice'] = 'RM' + Number(v['packagePrice']).toFixed(3);
                    else rebuildData['unitPrice'] = 'RM' + Number(v['packagePrice']).toFixed(2);
                    rebuildData['amount'] = 'RM' + Number(v['totalPackagePrice']).toFixed(2);
                }
            }

            if(v["negativeValue"] == "true"){
                rebuildData['amount'] = "- "+rebuildData['amount']
            }
            newList.push(rebuildData);
        });

        var tableNo;

        var thArray;

        if(viewType == "invoice" || viewType == "receipt") {
            thArray = thArrayInvoice;
        } else {
            thArray = thArrayDO;
        }

        buildTable(newList, invoiceTableId, invoiceDivId, thArray, btnArrayInvoice, message, tableNo);
        pagination(invoicePagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // $('#' + invoiceTableId).find('tbody tr:last-child').after(`
        //     <tr>
        //         <td><?php echo $translations['M03821'][$language] /* Taxes */ ?></td>
        //         <td>1</td>
        //         <td>RM${numberThousand(invoiceDetail.paymentTax, 2)}</td>
        //         <td>RM${numberThousand(invoiceDetail.paymentTax, 2)}</td>
        //     </tr>
        //     <tr>
        //         <td><?php echo $translations['M03794'][$language] /* Delivery Fee */ ?></td>
        //         <td>1</td>
        //         <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
        //         <td>RM${numberThousand(invoiceDetail.shippingfee, 2)}</td>
        //     </tr>
        // `);
           
        if(viewType == "invoice" || viewType == "receipt") {             
            $('#' + invoiceTableId).find('tbody').after(`
                <tr id="totalRow">
                    <td colspan="2"></td>
                    <td>
                        <?php echo $translations['M00250'][$language] /* Total */ ?>
                    </td>
                    <td style="text-align: right;">
                        RM${numberThousand(invoiceDetail.paymentAmount, 2)}
                    </td>
                </tr>
            `);
        }

        if(viewType == "delivery order") {             
            $('#' + invoiceTableId).find('tbody').after(`
                <thead>
                <tr id="totalRow">
                    <td>
                        <?php echo $translations['A01657'][$language] /* Total Quantity */ ?>
                    </td>
                    <td style="text-align: right;">
                        ${productQuantity}
                    </td>
                </tr>
                <tr id="totalRow">
                    <td>
                        <?php echo $translations['M04027'][$language] /* Accumulated Reward Point */ ?>
                    </td>
                    <td style="text-align: right;">
                        ${accumulatedRewardPoint}
                    </td>
                </tr>
                </thead>
            `);
        }

        $('#' + invoiceTableId).addClass('invoiceTable');

        $('#' + invoiceTableId).find('thead tr, tbody tr').each(function () {
            $(this).find('th:eq(1), td:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2), td:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3), td:eq(3)').css('text-align', "right");
        });

        $('#' + invoiceTableId).find('thead#totalGrp').each(function () {
            $(this).find('tr:eq(0)').css('border-bottom', "none");
            $(this).find('tr:eq(1)').css('border-bottom', "none");
            $(this).find('tr:eq(2)').css('border-bottom', "none");

            $(this).find('tr:eq(0)').css('border-top', "1px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(1)').css('border-top', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(1)').css('border-bottom', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(2)').css('border-top', "2px solid #E9EBF2");
            $(this).find('tr:last-child td:eq(2)').css('border-bottom', "2px solid #E9EBF2");
        });

        var table = $('#basicwizardInvoice').html();
        $('#basicwizardInvoice2').html(table);
    }
}

</script>
