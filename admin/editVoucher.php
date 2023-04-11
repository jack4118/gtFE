<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
if(!isset ($_SESSION['access'][$thisPage]))
    echo '<script>window.location.href="accessDenied.php";</script>';
$_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("topbar.php"); ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sidebar.php"); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
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
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">
                                            <label>Discount Name</label>
                                            <input id="discName" type="text" class="form-control">
                                            <span id="voucherNameError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-sm-4 col-xs-12">
                                            <label>Discount Code</label>
                                            <input id="discCode" type="text" class="form-control" disabled>
                                            <span id="voucherCodeError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-sm-4 col-xs-12">
                                            <label>Quantity</label>
                                            <input id="discQty" type="text" class="form-control" disabled>
                                            <span id="balanceError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="checkbox" name="tieUpCheck" class="typeUpCheckbox" id="tieUpCheckbox" value="normal" onchange="packageWrapperDisplay()">
                                <label for="tieUpCheck" class="tieUpLbl">Tie up with package</label>

                                <input type="checkbox" name="tieUpCheck" class="typeUpCheckbox" id="singleTieUpCheckbox" value="single" style="margin-left: 15px;" onchange="packageWrapperDisplay()">
                                <label for="tieUpCheck" class="tieUpLbl">Single Package Tie Up</label>
                            </div>
                        </div>
                        <div id="packageWrapper" class="card-box" style="margin-top:10px; display: none">
                            <div class="row" style="padding:5px 15px">
                                <div class="pkgTitle">Starter Kit</div>
                                <div class="col-xs-12">
                                    <div class="row wrapBox" id="buildStarterKit"></div>
                                </div>
                            </div>
                            <div class="row" style="padding:5px 15px; margin-top: 10px;">
                                <div class="pkgTitle">Normal Package</div>
                                <div class="col-xs-12">
                                    <div class="row wrapBox" id="buildNormalPkg"></div>
                                </div>
                            </div>
                            <span id="voucherError" class="errorSpan text-danger"></span>
                        </div>
                        <div class="row" style="margin-top: 30px">
                            <div class="col-xs-12">
                                <input id="discPercentage" type="radio" name="discType" value="percentage" class="discType" checked>
                                <label for="discPercentage"
                                       style="margin-right: 15px;">Discount by percentage(%)</label>

                                <input id="fixDisc" type="radio" name="discType" class="discType" value="amount" style="margin-left: 15px;">
                                <label for="fixDisc">Fix Amount</label>
                            </div>
                        </div>
                        <div class="card-box" style="margin-top:10px">
                            <div class="row" id="disPercentageWrap">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <label>Discount Percentage(%)</label>
                                            <input id="disPercentageInp" type="text" class="form-control">
                                            <span id="percentageError" class="errorSpan text-danger"></span>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <label>Max Discount Amount</label>
                                            <input id="maxDiscAmtInp" type="text" class="form-control">
                                            <span id="maxAmountError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="disAmtWrap" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <label>Discount Amount</label>
                                            <input id="discAmtInp" type="text" class="form-control">
                                            <span id="amountError" class="errorSpan text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px">
                            <div class="col-xs-12">
                                <input id="active" type="radio" name="status" value="Active" class="status" checked>
                                <label for="active" style="margin-right: 15px;"><?php echo $translations['A00372'][$language]; /* Active */?></label>

                                <input id="inactive" type="radio" name="status" class="status" value="Inactive" style="margin-left: 15px;">
                                <label for="inactive"><?php echo $translations['A00373'][$language]; /* Inactive */?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
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
        var id              = "<?php echo $_POST['id']; ?>"

        $(document).ready(function() {
            var formData  = {
                command : 'getCurrentDiscountVoucherSetting',
                id      : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 

            $('#backBtn').click(function() {
                $.redirect('discountVoucherSetting.php');
            });

            $('input:checkbox').click(function() {
                $('input:checkbox').not(this).prop('checked', false);
            }); 

            $('#submitBtn').click(function(){
                $('.invalid-feedback').remove();
                $('input').removeClass('is-invalid');
                var voucherName = $('#discName').val();
                var voucherStatus = $("input[type='radio'][name='status']:checked").val();
                var tieUpType = $("input[type='checkbox'][name='tieUpCheck']:checked").val();
                var isTieUpPackage = $('.typeUpCheckbox').is(':checked') ? "1" : "0";
                var packageIDAry = [];
                $('.voucherCheckbox:checked').each(function (index, value) {  
                    packageIDAry.push(value.id);
                });
                var discountBy = $("input[type='radio'][name='discType']:checked").val();
                var discountPercentage = $('#disPercentageInp').val(); 
                var discountMaxAmount = $('#maxDiscAmtInp').val(); 
                var discountAmount = $('#discAmtInp').val(); 

                var formData  = {
                command: 'editDiscountVoucherSetting',
                voucherID              :  id,
                voucherName     :  voucherName,
                voucherStatus   :  voucherStatus,
                isTieUpPackage  :  isTieUpPackage,
                discountBy      :  discountBy
                };
                if(isTieUpPackage == 1){
                    formData['packageIDAry'] = packageIDAry;
                    formData['tieUpType'] = tieUpType;
                }
                if(discountBy == 'percentage'){
                    formData['discountPercentage'] = discountPercentage;
                    formData['discountMaxAmount'] = discountMaxAmount;                    
                }
                if(discountBy == 'amount'){
                    formData['discountAmount'] = discountAmount;                   
                }
                fCallback = successEditVoucherDis;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            })
        });

        $(document).on('change','.discType',function(){
            var discType = $('.discType:checked').val();
            if(discType == 'amount'){
                $("#disPercentageWrap").hide();
                $("#disAmtWrap").show();
            }else{
                $("#disPercentageWrap").show();
                $("#disAmtWrap").hide();
            }
        })

        function packageWrapperDisplay() {
            var isTieUpPackage = $('.typeUpCheckbox').is(':checked');
            isTieUpPackage?$("#packageWrapper").show():$("#packageWrapper").hide();
        }

        function loadDefaultListing(data, message) {
            var packageList = data.packageLists;
            var voucherData = data.voucher.voucherLists;
            var discountData = data.voucher.discountBy;
            $("#discName").val(voucherData.name);
            $("#discCode").val(voucherData.code);
            $("#discQty").val(voucherData.balance);
            $("input[name=discType][value=" + discountData.type + "]").prop('checked', true);
            $("input[name=status][value=" + voucherData.status + "]").prop('checked', true);
            $("#disPercentageInp").val(discountData.percentage);
            $("#maxDiscAmtInp").val(discountData.maxAmount);
            $("#discAmtInp").val(discountData.amount);

            if(data.voucher.isTieUpPackage == 1){
                if(data.voucher.tieUpType == 'single'){
                    $("#singleTieUpCheckbox").prop('checked',true)
                }else{
                    $('#tieUpCheckbox').prop('checked',true);
                }
                $("#packageWrapper").show()
            }else{
                $('#tieUpCheckbox').prop('checked',false);
                $('#singleTieUpCheckbox').prop('checked',false);
                $("#packageWrapper").hide()
            }

            if(discountData.type == 'amount'){
                $("#disPercentageWrap").hide();
                $("#disAmtWrap").show();
            }else{
                $("#disPercentageWrap").show();
                $("#disAmtWrap").hide();
            }

            var buildNormalPkg = "";
            var buildStarterPkg = "";
            if(packageList.normal) {    
                $.each(packageList.normal,function(k,v){
                    var checked = "";
                    if(data['voucher']['packageList']) {
                        var ind = $.inArray(String(v['packageID']), data['voucher']['packageList'])
                        if(ind != -1) {
                            checked = "checked";
                        }
                    }

                    buildNormalPkg += `
                        <div class="col-xs-4" style="margin:10px 0px">
                            <input type="checkbox" name="${v['packageID']}" class="voucherCheckbox" id="${v['packageID']}" ${checked}>
                            <label for="${v['packageID']}" class="pkgNameLbl">${v['packageName']}</label>
                        </div> `;
                });
                $('#buildNormalPkg').html(buildNormalPkg);
            }

            if(packageList.starter){
                $.each(packageList.starter,function(k,v){
                    var checked = "";
                    if(data['voucher']['packageList']) {
                        var ind = $.inArray(String(v['packageID']), data['voucher']['packageList'])
                        if(ind != -1) {
                            checked = "checked";
                        }
                    }

                    buildStarterPkg += `
                        <div class="col-xs-4" style="margin:10px 0px">
                            <input type="checkbox" name="${v['packageID']}" class="voucherCheckbox" id="${v['packageID']}" ${checked}>
                            <label for="${v['packageID']}" class="pkgNameLbl">${v['packageName']}</label>
                        </div> `;
                });
                $('#buildStarterKit').html(buildStarterPkg);
            }
        }

        function successEditVoucherDis(data,message){
            showMessage(message,'success','Edit Discount Voucher','success','discountVoucherSetting.php');
        }

    </script>
</body>
</html>
