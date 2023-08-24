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
                            <div class="card-box p-b-0">
                                <div class="row">

                                    <div class="col-xs-12 contentPageTitle">
                                        <h4 class="header-title m-t-0 m-b-30">New Promo Code</h4>
                                    </div>

                                    <div class="col-xs-12" style="margin-bottom: 15px;">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Promo Code Name:</label>
                                                    <input type="text" class="form-control" id="codeName" required>
                                                    <div><span id="nameError" class="errorSpan text-danger"></span></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" id = "max_discount_amount_section">
                                                <div class="form-group">
                                                    <label>Max Discount Amount(Max Cap):</label>
                                                    <input type="text" class="form-control" id="maxDiscount" required>
                                                    <div><span id="discountError" class="errorSpan text-danger"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label><?php echo $translations['A01730'][$language]; /* Promo Code */ ?>:</label>
                                                    <input type="text" class="form-control" id="newCode" required>
                                                    <input type="text" class="form-control hide" id="discount_id">
                                                    <div><span id="codeError" class="errorSpan text-danger"></span></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label><?php echo $translations['A00819'][$language]; /* Type */ ?>:</label>
                                                    <select class="form-control" id="promoCodeType">
                                                        <option value="billDiscount">
                                                            Bill Discount
                                                        </option>
                                                        <option value="freeShipping">
                                                            Free Shipping
                                                        </option>
                                                        <!-- <option value="freeProduct">
                                                            Free Product
                                                        </option><option value="PWP">
                                                            PWP (Fixed)
                                                        </option> -->
                                                        <option value="PWP2">
                                                            PWP (Flexible Amount)
                                                        </option>
                                                        <option value="firstTimePurchase">
                                                            Bill Discount on Specific Product
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row not_for_free_shipping" id="discount_section">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Discount Type:</label>
                                                    <select class="form-control" id="discount_type">
                                                        <option value="percentage">
                                                            Percentage (%)
                                                        </option>
                                                        <option value="amount">
                                                            Fix Amount (RM)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Discount:</label>
                                                    <input type="number" class="form-control" id="discount" required>
                                                    <div><span id="discountError" class="errorSpan text-danger"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row not_for_free_shipping" id="PWP2_section">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Maximum Quantity:</label>
                                                    <input type="number" class="form-control" id="maxQuantity" required>
                                                    <div><span id="quantityError" class="errorSpan text-danger"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row not_for_free_shipping">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Discount Apply On:</label>
                                                    <select class="form-control" id="discount_apply_on">
                                                        <option value="onOrder">
                                                            On Order
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Apply Type:</label>
                                                    <select class="form-control" id="apply_type">
                                                        <option value="useCode">
                                                            Use a code
                                                        </option>
                                                        <option value="autoApply">
                                                            Automatically Applied
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <label>Start Date</label>
                                                <input id="start_date" type="text" class="form-control">
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <label>End Date</label>
                                                <input id="end_date" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Status</label>
                                        <div id="status" class="m-b-20">
                                            <!-- <div class="radio radio-info radio-inline"> -->
                                            <div class="radio radio-inline">
                                                <input id="active" type="radio" value="Active" name="statusRadio" class="statusRadio" />
                                                <label for="active">
                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input id="inActive" type="radio" value="Inactive" name="statusRadio" class="statusRadio" />
                                                <label for="inActive">
                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div id="appendConditionProduct">
                                            <div class="col-md-12 condition-special__container">                
                                                <div class="addConditionProductWrapper default">
                                                    <span class="dtxt">Default</span>
                                                    
                                                    <div class="row" id="pr1">
                                                        <div class="col-md-9">
                                                            <label>1. Condition Product</label>
                                                            <select id="conditionProductSelect1" class="form-control conditionProductSelect" required></select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Quantity</label>
                                                            <input id="conditionProductQuantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="addConditionProduct" onclick="addConditionRow()" style="display: none; height: 96px; padding: 4px; width: 160px;">
                                                <b><i class="fa fa-plus-circle"></i></b>
                                                <span>Add Condition Product</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                        </div>

                                        <div id="appendRewardProduct">
                                            <div class="col-md-12 reward-special__container">                
                                                <div class="addRewardProductWrapper default">
                                                    <span class="dtxt">Default</span>
                                                    
                                                    <div class="row" id="pr1">
                                                        <div class="col-md-6">
                                                            <label>1. Reward Product</label>
                                                            <select id="rewardProductSelect1" onchange="rewardProductSelect(1);" class="form-control rewardProductSelect" required></select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Price</label>
                                                            <input id="rewardProductPrice1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Quantity</label>
                                                            <input id="rewardProductQuantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="addRewardProduct" onclick="addRewardRow()" style="display: none; height: 96px; padding: 4px; width: 160px;">
                                                <b><i class="fa fa-plus-circle"></i></b>
                                                <span>Add Reward Product</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" id ="ftp_section">
                                        <label>First Time Purchase</label>
                                        <div id="status" class="m-b-20">
                                            <div class="radio radio-inline">
                                                <input id="ftpActive" type="radio" value="Active" name="ftpRadio" class="statusRadio" />
                                                <label for="ftpActive">
                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input id="ftpInActive" type="radio" value="Inactive" name="ftpRadio" class="statusRadio" />
                                                <label for="ftpInActive">
                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
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
            <?php include("footer.php"); ?>
        </div>
    </div>

    <script>var resizefunc = [];</script>

    <?php include("shareJs.php"); ?>

    <script>

        var url             = 'scripts/reqBonus.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var fCallback;
        var promoCodeDetail;
        var promoCodeResult;
        var promoCodeProduct;
        var assignProduct;
        var getPromoCodeDetail;
        var newReward;

        var productHTML = "";
        var html = `<option value="">Select Product</option>`;
        var totalLoop =[1];

        var selectedConditionProduct;
        var selectedRewardProduct;

        $(document).ready(function() {
            setTodayDatePicker();
            $('.errorSpan').html("");


            var formData   = {
                command         : "getPromoCodeDetail",
                promo_code_id   : "<?php echo $_POST['promoCodeId']; ?>",
            };

            fCallback = loadDefaultListing; 
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("#PWP2_section").hide();
            $("#ftp_section").hide();
        });
        
        function loadDefaultListing(data, message) {
            getPromoCodeDetail = data;
            promoCodeDetail = data.promoCodeDetail;
            promoCodeResult = data.promoCodeResult;
            promoCodeProduct = data.promoCodeProduct;

            $("#codeName").val(promoCodeResult.name);
            $("#newCode").val(promoCodeResult.code);
            $("#promoCodeType").val(promoCodeResult.type);
            $('#promoCodeType').change();
            $("#apply_type").val(promoCodeResult.apply_type);
            $("#discount_apply_on").val(promoCodeResult.discount_apply_on);
            $("#discount").val(promoCodeResult.discount);
            $("#maxDiscount").val(promoCodeResult.max_discount_amount);
            $("#discount_type").val(promoCodeResult.discount_type);
            $("#discount_id").val(promoCodeResult.id);
            $('input[name=statusRadio]').filter('[value='+promoCodeResult.status+']').prop('checked', true);
            $('input[name=ftpRadio]').filter('[value='+promoCodeResult.is_first_time_purchase+']').prop('checked', true);
            $("#start_date").val(promoCodeResult.start_date);
            $("#end_date").val(promoCodeResult.end_date);
            $("#maxQuantity").val(promoCodeResult.max_quantity);

            // if(promoCodeResult.type == "PWP" || promoCodeResult.type == "PWP2" || promoCodeResult.type == "firstTimePurchase") {
                rewardWrapperLength = 2;
                conditionWrapperLength = 2;
                console.log(assignProduct,'load default')
                var formData   = {
                    command         : "getProduct",
                };

                fCallback = assignProduct1; 
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                // if(!assignProduct){
                //     console.log("1");
                //     var formData   = {
                //         command         : "getProduct",
                //     };

                //     fCallback = assignProduct1; 
                //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                // }else{
                //     assignProduct1(assignProduct, '');
                // }
                

            // }

            if(promoCodeResult.type == "freeShipping") {
                $(".not_for_free_shipping").hide();
            }
            else if(promoCodeResult.type == "PWP2")
            {
                $("#discount_section").hide();
            }
            else {
                $(".not_for_free_shipping").show();
            }
        }


        //test
        function assignProduct1(data, message) {
            assignProduct = data;

            if(assignProduct) {
                    var html = `<option value="">Select Product</option>`;
                    $.each(assignProduct.getProductDetail, function(i, obj) { 
                        html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                        // html = html1;
                    });

                    $("#conditionProductSelect1").html(html);

                    // $('#conditionProductSelect1').select2({
                    //     dropdownAutoWidth: true,
                    //     templateResult: newFormatState,
                    //     templateSelection: newFormatState,
                    // });

                    $("#rewardProductSelect1").html(html);

                    $('#rewardProductSelect1').select2({
                        dropdownAutoWidth: true,
                        templateResult: newFormatState,
                        templateSelection: newFormatState,
                    });
            }

            $.each(promoCodeDetail, function(k, v) {
                var newK = k + 1;
                if(k != 0) {
                    addConditionRow(v);
                }

                $("#conditionProductSelect" + newK).val(v['product_id']);

                $("#conditionProductSelect"+newK).select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });

                $("#conditionProductQuantity" + newK).val(v['quantity']);
            })

            $.each(promoCodeProduct, function(k, v) {
                var newK = k + 1;
                if(k != 0) {
                    addRewardRow(v);
                }

                $("#rewardProductSelect" + newK).val(v['product_id']);

                $("#rewardProductSelect"+newK).select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });

                $("#rewardProductQuantity" + newK).val(v['quantity']);
                $("#rewardProductPrice" + newK).val(v['sale_price']);
            })
        }





        $('#submitBtn').click(function() {
            $('.errorSpan').html("");

            var product_list= [];
            var promo_product= [];

            for(var v = 1; v < $(".addConditionProductWrapper").length + 1; v++) {
                var id = $("#conditionProductSelect" + v).val();
                var quantity = $('#conditionProductQuantity' + v).val();

                var perProduct = {
                    product_id :id,
                    quantity: quantity,
                }
                product_list.push(perProduct);
            }

            for(var v = 1; v < $(".addRewardProductWrapper").length + 1; v++) {
                var id = $("#rewardProductSelect" + v).val();
                var quantity = $('#rewardProductQuantity' + v).val();
                var price = $('#rewardProductPrice' + v).val();

                var perProduct = {
                    product_id :id,
                    quantity: quantity,
                    price: price,
                }
                promo_product.push(perProduct);
            }

            var formData   = {
                command         : "updatePromoCodeStatus",
                name            : $("#codeName").val(),
                code            : $("#newCode").val(),
                discount        : $("#discount").val(),
                max_quantity    : $("#maxQuantity").val(),
                apply_type      : $("#apply_type").find("option:selected").val(),
                type            : $("#promoCodeType").find("option:selected").val(),
                discount_type   : $("#discount_type").find("option:selected").val(),
                discount_apply_on: $("#discount_apply_on").find("option:selected").val(),
                max_discount    : $('#maxDiscount').val(),
                start_date      : $('#start_date').val(),
                end_date        : $('#end_date').val(),
                ftpStatus       : $("input[name=ftpRadio]:checked").val(), 
                product_list    : product_list,
                promo_product   : promo_product,
                status          : $("input[name=statusRadio]:checked").val(), 
                promoCodeID     : $("#discount_id").val(),
            };

            fCallback = successEditPromoCode;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        function successEditPromoCode(data,msg) {
            showMessage("Promo Code successfully updated.", 'success', 'Congratulations!', 'check', 'promoCodeListing.php');
        }

        function successUpdatePromoCode(data,msg) {
            showMessage("Promo Code successfully updated.", 'success', 'Updated', 'plus', 'promoCodeListing.php');
        }

        $('#backBtn').click(function() {
            $.redirect('promoCodeListing.php');
        });

        $('#promoCodeType').change(function() {
            console.log(newReward);
            if(newReward == 1){
                clearDiv()
            }
            newReward = 1;
            if($('#promoCodeType option:selected').val() == 'PWP') {

                productConditionDetails();
                productRewardDetails();
                $(".not_for_free_shipping").show();
                $(".addConditionProduct").css("display", "unset");
                $(".addRewardProduct").css("display", "unset");
                $("#PWP2_section").hide();
            } else if($('#promoCodeType option:selected').val() == 'PWP2') {

                // productConditionDetails();
                productRewardDetails2();
                $(".not_for_free_shipping").show();
                $(".addConditionProduct").css("display", "unset");
                $(".addRewardProduct").css("display", "unset");
                $("#discount_section").hide();
                $("#max_discount_amount_section").hide();
                $("#PWP2_section").show();
            } else if($('#promoCodeType option:selected').val() == 'freeShipping') {
                $(".not_for_free_shipping").hide();
                $("#appendConditionProduct").empty();
                $("#appendRewardProduct").empty();
                $(".addConditionProduct").css("display", "none");
                $(".addRewardProduct").css("display", "none");
            } else if($('#promoCodeType option:selected').val() == 'firstTimePurchase') {

                // productConditionDetails();
                productRewardDetails();
                $(".not_for_free_shipping").show();
                $(".addConditionProduct").css("display", "unset");
                $("#appendRewardProduct").empty();
                $(".addRewardProduct").css("display", "unset");
                $(".addRewardProduct").css("display", "none");
                $("#PWP2_section").hide();
                $("#ftp_section").show();
            }
            else {
                $(".not_for_free_shipping").show();
                $("#appendConditionProduct").empty();
                $("#appendRewardProduct").empty();
                $(".addConditionProduct").css("display", "none");
                $(".addRewardProduct").css("display", "none");
                $("#PWP2_section").hide();
            }
            
            $('#subtotal').val("0.00");
            rewardWrapperLength = 1;
            conditionWrapperLength = 1;
        })

        function productConditionDetails() {
            // if(!assignProduct){
            //     console.log('2');
            //     var formData = {
            //         command        : "getProduct",
            //     };
            //     // fCallback = conditionProductListOpt;

            //     //test
            //     fCallback = loadConditionSelect;

            //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            // }else{
                loadConditionSelect();
            // }
        }

        function productRewardDetails() {
            rewardProductListOpt(assignProduct, '');

            // if (!assignProduct) {
            //     console.log('3');
            //     var formData = {
            //         command: "getProduct",
            //     };
            //     fCallback = rewardProductListOpt;

            //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            // } else {
            //     rewardProductListOpt(assignProduct, '');
            // }
        }

        function productRewardDetails2() { // PWP2 setting
            rewardProductListOpt2(assignProduct, '');

            // if(!assignProduct){
            //     console.log('4');
            //     var formData = {
            //         command        : "getProduct",
            //     };
            //     fCallback = rewardProductListOpt2;

            //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            // }else{
            //     rewardProductListOpt2(assignProduct, '');
            // }
        }

        function conditionProductListOpt(data, message) {
            if(data) {
                var html = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) { 
                    html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    // html = html1;
                });
                $(".conditionProductSelect").html(html);

                loadConditionSelect();
            }
        }

        function loadConditionSelect() {
            if(!getPromoCodeDetail){
                var formData = {
                    'command': 'getPromoCodeDetail',
                    'promo_code_id'     : '<?php echo $_POST['promoCodeId']; ?>'
                };
                fCallback = selectConditionPR;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }else{
                selectConditionPR(getPromoCodeDetail, '');
            }
            
        }

        function selectConditionPR(data, message) {
            getPromoCodeDetail = data;
            $.each(data.promoCodeDetail, function (index, value) {
                var conditionProductSelectID = "#conditionProductSelect" + (index + 1);
                $(conditionProductSelectID).val(value.product_id);
            });

            setTimeout(function() {
                $("#warehouseDropdown").val(data.warehouse_id);
            }, 100); 
        }

        function rewardProductListOpt(data, message) {
            if (data) {
                assignProduct = data; 
                var html = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) { 
                    html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                });
                loadRewardSelect(html);
            }

        }


        function rewardProductListOpt2(data, message) {
            if(data) {
                assignProduct = data; 
                var html = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) {
                    html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    // html = html1;
                });
                // $(".rewardProductSelect").html(html);
                // loadRewardSelect();
            }
        }

        function loadRewardSelect() {
            if(!getPromoCodeDetail){
                var formData = {
                    'command': 'getPromoCodeDetail',
                    'promo_code_id'     : '<?php echo $_POST['promoCodeId']; ?>'
                };
                fCallback = selectRewardPR;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }else{
                selectRewardPR(getPromoCodeDetail, '');
            }
        }

        function selectRewardPR(data, message) {
            getPromoCodeDetail = data;
            $.each(data.promoCodeProduct, function (index, value) {
                var rewardProductSelectID = "#rewardProductSelect" + (index + 1);
                $(rewardProductSelectID).val(value.product_id);
            });

            setTimeout(function() {
                $("#warehouseDropdown").val(data.warehouse_id);
            }, 100); 
        }

        function addConditionRow(obj){
            // var totalLoop =[1];
            
            var wrapper = `
                <div class="col-md-12 condition-special__container">
                    <div class="addConditionProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeConditionDiv(this,${(conditionWrapperLength)})">&times;</a>
                        <div class="row" id="pr${(conditionWrapperLength)}">
                            <div class="col-md-9">
                                <label>${(conditionWrapperLength)}. Condition Product</label>
                                <select id="conditionProductSelect${(conditionWrapperLength)}" class="form-control conditionProductSelect" required>
                                                                     
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Quantity</label>
                                <input id="conditionProductQuantity${(conditionWrapperLength)}" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#appendConditionProduct").append(wrapper);

            $("#conditionProductSelect"+conditionWrapperLength).html(html);
            totalLoop.push(conditionWrapperLength);


            //test
            if(assignProduct) {
                var html = `<option value="">Select Product</option>`;
                $.each(assignProduct.getProductDetail, function(i, obj) { 
                    html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    // html = html1;
                });
                $("#conditionProductSelect"+conditionWrapperLength).html(html);

                $("#conditionProductSelect"+conditionWrapperLength).select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
            }



            conditionWrapperLength++;
            // productConditionDetails();
        }

        function addRewardRow(obj){
            // var totalLoop =[1];
            
            var wrapper = `
                <div class="col-md-12 reward-special__container" id="rewardSpecialContainer${rewardWrapperLength}">
                    <div class="addRewardProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeRewardDiv(this,${(rewardWrapperLength)})">&times;</a>
                        <div class="row" id="pr${(rewardWrapperLength)}">
                            <div class="col-md-6">
                                <label>${(rewardWrapperLength)}. Reward Product</label>
                                <select id="rewardProductSelect${(rewardWrapperLength)}" onchange="rewardProductSelect(${(rewardWrapperLength)});" class="form-control rewardProductSelect" required>
                                                                     
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Price</label>
                                <input id="rewardProductPrice${(rewardWrapperLength)}" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#appendRewardProduct").append(wrapper);
            $("#rewardProductSelect"+rewardWrapperLength).html(html);
            totalLoop.push(rewardWrapperLength);


            //test
            if(assignProduct) {
                var html = `<option value="">Select Product</option>`;
                $.each(assignProduct.getProductDetail, function(i, obj) { 
                    html += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    // html = html1;
                });
                $("#rewardProductSelect"+rewardWrapperLength).html(html);

                $("#rewardProductSelect"+rewardWrapperLength).select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
            }



            rewardWrapperLength++;
            // productRewardDetails();
        }

        function closeConditionDiv(n,id) {
            var totalLoop =[1];

            const index = totalLoop.indexOf(id); 
            if (index > -1) {
              totalLoop.splice(index, 1); 
            }

            // $(n).parent().parent().hide();
            $(n).parent().parent().remove();
        }

        function closeRewardDiv(n,id) {
            var totalLoop =[1];

            const index = totalLoop.indexOf(id); 
            if (index > -1) {
              totalLoop.splice(index, 1); 
            }

            $("#rewardSpecialContainer"+id).remove()

            // $(n).parent().parent().hide();
            // $(n).parent().parent().remove();
        }

        function clearDiv() {

            $('.reward-special__container').each(function(){
                (this).remove()
            });
            $('.condition-special__container').each(function(){
                (this).remove()
            });
            // $("#rewardSpecialContainer"+id).remove()
        }
        function rewardProductSelect(id) {
            if (!assignProduct) {
                console.log('5');
                var formData = {
                    command: "getProduct",
                };

                fCallback = function(data, message) {
                    assignPrice(data, message, id); 
                };

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, 0, 0, id);
            } else {
                assignPrice(assignProduct, '', id); 
            }
        }

        function assignPrice(data, message, id) {
            assignProduct = data;
            var optSelected = ($("#rewardProductSelect" + id).find("option:selected").val()); 
            console.log(optSelected);

            console.log(data);

            //var price = data.getProductDetail[optSelected - 1].sale_price;

            var price;

            for(var v = 0; v < data.getProductDetail.length; v++) {
                if(data.getProductDetail[v].id == optSelected){
                    price = data.getProductDetail[v].sale_price;
                }
            }

            $("#rewardProductPrice" + id).val(price);
        }

        function setTodayDatePicker() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var todayFormatted = yyyy + '-' + mm + '-' + dd;

            $('#start_date').daterangepicker({
                minDate: todayFormatted,
                singleDatePicker: true,
                timePicker: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
            });

            $('#end_date').daterangepicker({
                minDate: todayFormatted,
                singleDatePicker: true,
                timePicker: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
            });

            return dateToTimestamp(todayFormatted);
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

        const maxDiscountInput = document.getElementById('maxDiscount');
        maxDiscountInput.addEventListener('input', function(event) {
            const validValue = event.target.value.replace(/[^\d.]/g, '');
            const decimalCount = validValue.split('.').length - 1;
            if (decimalCount > 1) {
                const parts = validValue.split('.');
                event.target.value = parts[0] + '.' + parts.slice(1).join('');
            } else {
                event.target.value = validValue;
            }
        });
    </script>
</body>
</html>
