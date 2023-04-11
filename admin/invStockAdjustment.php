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
                        <div onclick="redirectBack()" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Adjustment Type</label>
                                            <div id="adjustmentType" class="m-b-20">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="adjustmentTypeIn" name="adjustmentType" value="in" data-parsley-multiple="adjustmentType">
                                                    <label for="adjustmentTypeIn">In</label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="adjustmentTypeOut" name="adjustmentType" value="out" data-parsley-multiple="adjustmentType">
                                                    <label for="adjustmentTypeOut">Out</label>
                                                </div>
                                            </div>
                                            <span id="typeError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier Code - Name:</label>
                                            <select id="supplierID" class="form-control"></select>
                                            <span id="supplierIDError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier DO (Optional)</label>
                                            <input id="doNum" type="text" class="form-control">
                                            <span id="doNumError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Quantity</label>
                                            <input id="quantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span id="quantityError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12 input-daterange" style="margin-top: 20px">
                                            <label>Stock In Date (Optional)</label>
                                            <input id="stockInDate" type="text" class="form-control">
                                            <span id="stockInDateError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Cost</label>
                                            <input id="cost" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                            <span id="costError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Fee & Charges (Optional)</label>
                                            <input id="feeNCharges" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                            <span id="feeNChargesError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Remark (Optional)</label>
                                            <input id="remark" type="text" class="form-control">
                                            <span id="remarkError" class="customError text-danger"></span>
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
    var stockID = "<?php echo $_POST['stockID']; ?>";
    var invProductID = "<?php echo $_POST['invProductID']; ?>";

    $(document).ready(function() {

        var formData = {
            command: 'getActiveSupplier'
        }
        fCallback = loadDefaultData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // Initialize date picker
        $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            $(this).val('');
        });

        $('#submitBtn').click(function() {
            $('.customError').text('');

            var type = $('input[name=adjustmentType]:checked').val();
            var supplierID = $('#supplierID option:selected').val();
            var doNum = $('#doNum').val();
            var quantity = $("#quantity").val();
            var stockInDate = $("#stockInDate").val()=="" ? $("#stockInDate").val() : dateToTimestamp($("#stockInDate").val());
            var cost = $("#cost").val();
            var feeNCharges = $("#feeNCharges").val();
            var remark = $("#remark").val();

            var formData  = {
                command         : 'adjustInvStock',
                stockID : stockID,
                type : type,
                supplierID : supplierID,
                doNum : doNum,
                quantity : quantity,
                stockInDate : stockInDate,
                cost : cost,
                feeNCharges : feeNCharges,
                remark : remark
            };

            fCallback = successAdjustment;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function successAdjustment(data, message) {
        showMessage(message, 'success', 'Stock Adjustment', 'edit', ['invStockDetail.php', {invProductID : invProductID}]);
    }

    function redirectBack() {
        $.redirect('invStockDetail.php', {
            invProductID: invProductID
        });
    }

    function loadDefaultData(data, message) {
        if(data.supplierDetails) {
            $.each(data.supplierDetails, function(k, v) {
                $('#supplierID').append(`<option value="${v['id']}">${v['code']} - ${v['name']}</option>`);
            });
        }
    }

</script>
</body>
</html>

