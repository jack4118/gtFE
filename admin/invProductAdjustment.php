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
                        <div onclick="window.location='getProductInventory.php'" class="btn btn-primary waves-effect waves-light m-b-20">
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
                                        <!-- <div class="col-xs-12">
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
                                        </div> -->

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Date</label>
                                            <input id="date" type="text" class="form-control" disabled>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier Code - Name:</label>
                                            <select id="supplierID" class="form-control">
                                                <!-- <?php foreach($_SESSION["supplier"] as $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>">
                                                        <?php echo $value['code']; ?> - <?php echo $value['name']; ?>
                                                    </option>
                                                <?php } ?> -->
                                            </select>
                                            <span id="supplierIDError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier DO (Optional)</label>
                                            <input id="doNum" type="text" class="form-control">
                                            <span id="doNumError" class="errorSpan text-danger"></span>
                                        </div>

                                        <!-- <div class="col-xs-12" style="margin-top: 20px">
                                            <label>SKU Code</label>
                                            <input id="skuCode" type="text" class="form-control">
                                            <span id="skuCodeError" class="customError text-danger"></span>
                                        </div> -->

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Quantity</label>
                                            <input id="quantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value!=''?addCormer(this.value):''" onkeyup="displayTotalStockFee()">
                                            <span id="quantityError" class="customError text-danger"></span>
                                        </div>

                                        <!-- <div class="col-xs-12 input-daterange" style="margin-top: 20px">
                                            <label>Stock In Date (Optional)</label>
                                            <input id="stockInDate" type="text" class="form-control">
                                            <span id="stockInDateError" class="customError text-danger"></span>
                                        </div> -->

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Cost Price Per Qty</label>
                                            <input id="cost" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/); this.value = this.value!=''?addCormer(this.value):''" onkeyup="displayTotalStockFee()">
                                            <span id="costError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Total Cost Price</label>
                                            <input id="totalCost" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);" disabled>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <input type="checkbox" id="feeNChargesCheckbox" name="feeNChargesCheckbox" style="margin: 0;">
                                            <label for="feeNChargesCheckbox">Fee & Charges (Optional)</label>
                                            <input style="display: none;" id="feeNCharges" type="text" class="form-control">
                                            <span id="feeNChargesError" class="customError text-danger"></span>
                                        </div>

                                        <!-- <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Remark (Optional)</label>
                                            <input id="remark" type="text" class="form-control">
                                            <span id="remarkError" class="customError text-danger"></span>
                                        </div> -->

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

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="announcementListDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerAnnouncementList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->

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
    var invProductID = "<?php echo $_POST['invProductID']; ?>";

    /*var divId    = 'announcementListDiv';
    var tableId  = 'announcementListTable';
    var pagerId  = 'pagerAnnouncementList';
    var pageNumber      = 1; 
    var btnArray = {};
    var thArray  = Array (
        "Date",
        "Action",
        "Amount In",
        "Amount Out",
        "Remark"
    );*/

    $(document).ready(function() {
        var date = new Date();
        var month = date.getMonth()+1;
        var day = date.getDate();
        $('#date').val((day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' + date.getFullYear());

        // $('#quantity').change(function() {
        //     if($('#cost').val().replace(/[^0-9.]/g, '') >= 0){
        //         $('#totalCost').val(numberThousand($('#quantity').val().replace(/[^0-9.]/g, '') * $('#cost').val().replace(/[^0-9.]/g, ''), 2));
        //     }
        // });

        // $('#cost').change(function() {
        //     if($('#quantity').val().replace(/[^0-9.]/g, '') >= 0){
        //         $('#totalCost').val(numberThousand($('#quantity').val().replace(/[^0-9.]/g, '') * $('#cost').val().replace(/[^0-9.]/g, ''), 2));
        //     }
        // });

        $('#feeNChargesCheckbox').change(function() {
            if(this.checked) {
                $('#feeNCharges').css({'display':'block'});
            }
            else{
                $('#feeNCharges').css({'display':'none'});
            }
        });

        var formData = {
            command: 'getActiveSupplier'
        }
        fCallback = loadDefaultData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        /*var formData  = {
            command: 'getProductTransactionHistory',
            invProductID : invProductID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);*/

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
            // var skuCode = $("#skuCode").val();
            var quantity = $("#quantity").val().replace(/[^0-9.]/g, '');
            // var stockInDate = $("#stockInDate").val()=="" ? $("#stockInDate").val() : dateToTimestamp($("#stockInDate").val());
            var cost = $("#cost").val().replace(/[^0-9.]/g, '');
            var feeNCharges = $("#feeNCharges").val();
            // var remark = $("#remark").val();

            var formData  = {
                command         : 'adjustInvProduct',
                invProductID : invProductID,
                supplierID : supplierID,
                doNum : doNum,
                // skuCode : skuCode,
                quantity : quantity,
                // stockInDate : stockInDate,
                cost : cost,
                feeNCharges : feeNCharges,
                // remark : remark
            };

            fCallback = successAdjustment;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function displayTotalStockFee() {
        var quantity = $('#quantity').val().replace(/[^0-9.]/g, '');
        var cost = $('#cost').val().replace(/[^0-9.]/g, '');

        if(quantity!="" && cost!="") {
            var totalCost = parseFloat(quantity) * parseFloat(cost);
            $('#totalCost').val(numberThousand(totalCost, 2));
        } else {
            $('#totalCost').val('');
        }
    }

    function successAdjustment(data, message) {
        // showMessage(message, 'success', 'Product Adjustment', 'edit', ['invProductAdjustment.php', {invProductID : invProductID}]);
        showMessage(message, 'success', 'Product Adjustment', 'edit', 'getProductInventory.php');
    }

    function loadDefaultData(data, message) {
        if(data.supplierDetails) {
            $.each(data.supplierDetails, function(k, v) {
                $('#supplierID').append(`<option value="${v['id']}">${v['code']} - ${v['name']}</option>`);
            });
        }
    }

    /*function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "getProductTransactionHistory",
            invProductID : invProductID,
            pageNumber  : pageNumber,
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }*/

    /*function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var list = data.list;
        var totalIn = 0;
        var totalOut = 0;

        if(list) {
            var newList = [];

            $.each(list, function(k, v) {

                var doBtn = v['subject'];
                // if(v['refID']) {
                //     doBtn = `<a href="javascript:void(0);" onclick="goToDO('${v['refID']}')">${v['subject']}</a>`;
                // }

                totalIn += parseFloat(v['amountIn']);
                totalOut += parseFloat(v['amountOut']);

                var rebuildData = {
                    date : v['createdAt'],
                    type : doBtn,
                    amountIn : numberThousand(v['amountIn'],0),
                    amountOut : numberThousand(v['amountOut'],0),
                    remark : v['remark']
                    // remark : v['adminRemark']==""?v['remark']:(v['remark']==""?"Admin Remark: "+v['adminRemark']:v['remark']+"<br>Admin Remark: "+v['adminRemark'])
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId+" tbody tr:last").after(`
            <tr>
                <td colspan="2" class="text-right"><b>Grand Total</b></td>
                <td>${numberThousand(totalIn,0)}</td>
                <td>${numberThousand(totalOut,0)}</td>
                <td></td>
            </tr>
        `);

    }*/

    /*function goToDO(id) {
        $.redirect("getDeliveryOrderDetails.php", {
            id: id,
            backID: "<?php echo $_POST['invProductID']; ?>",
            backUrl: window.location.href
        });
    }*/

    /*function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }*/




</script>
</body>
</html>

