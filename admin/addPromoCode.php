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
                                                        </option> -->
                                                        <!-- <option value="PWP">
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

                                        <div class="row">
                                            <div id="appendConditionProduct">
                                                
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
                                                
                                            </div>

                                            <div class="col-md-4">
                                                <div class="addRewardProduct" onclick="addRewardRow()" style="display: none; height: 96px; padding: 4px; width: 160px;">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Reward Product</span>
                                                </div>
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

        var promoCodeResult = "";
        var productHTML = "";
        var html ="";

        $(document).ready(function() {
            setTodayDatePicker();

            if(promoCodeResult.type == "freeShipping") {
                $(".not_for_free_shipping").hide();
            } else {
                $(".not_for_free_shipping").show();
            }

            $("#PWP2_section").hide();
            $("#ftp_section").hide();
        });
        
        function loadDefaultListing(data, message) {

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
                command         : "addPromoCode",
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
                promo_product    : promo_product,
            };

            fCallback = successAddPromoCode; 
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        function successAddPromoCode(data,msg) {
            showMessage("Promo Code successfully added.", 'success', 'Congratulations!', 'plus', 'promoCodeListing.php');
        }

        $('#backBtn').click(function() {
            $.redirect('promoCodeListing.php');
        });

        $('#promoCodeType').change(function() {
            if($('#promoCodeType option:selected').val() == 'PWP') {
                productConditionDetails();
                productRewardDetails();
                $(".not_for_free_shipping").show();
                $(".addConditionProduct").css("display", "unset");
                $(".addRewardProduct").css("display", "unset");
                $("#PWP2_section").hide();
            } else if($('#promoCodeType option:selected').val() == 'PWP2') {
                productConditionDetails();
                productRewardDetails2();
                $(".not_for_free_shipping").show();
                $(".addConditionProduct").css("display", "unset");
                $(".addRewardProduct").css("display", "unset");
                $("#discount_section").hide();
                $("#PWP2_section").show();
                $("#max_discount_amount_section").hide();
            } else if($('#promoCodeType option:selected').val() == 'freeShipping') {
                $(".not_for_free_shipping").hide();
                $("#appendConditionProduct").empty();
                $("#appendRewardProduct").empty();
                $(".addConditionProduct").css("display", "none");
                $(".addRewardProduct").css("display", "none");
                $("#PWP2_section").hide();
            } else if($('#promoCodeType option:selected').val() == 'firstTimePurchase') {
                productConditionDetails();
                // productRewardDetails();
                $(".not_for_free_shipping").show();
                $("#appendRewardProduct").empty();
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
            rewardWrapperLength = 2;
            conditionWrapperLength = 2;
        })

        function productConditionDetails() {
            var formData = {
                command        : "getProduct",
            };
            fCallback = conditionProductListOpt;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function productRewardDetails() {
            var formData = {
                command        : "getProduct",
            };
            fCallback = rewardProductListOpt;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function productRewardDetails2() { // PWP2 setting
            var formData = {
                command        : "getProduct",
            };
            fCallback = rewardProductListOpt2;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function conditionProductListOpt(data, message) {
            if(data) {
                $("#appendConditionProduct").empty();

                var productHTML =
                    `<div class="col-md-12">                
                        <div class="addConditionProductWrapper default">
                            <span class="dtxt">Default</span>
                            
                            <div class="row" id="pr1">
                                <div class="col-md-9">
                                    <label>1. Condition Product</label>
                                    <select id="conditionProductSelect1" class="form-control productSelect" required></select>
                                </div>
                                <div class="col-md-3">
                                    <label>Quantity</label>
                                    <input id="conditionProductQuantity1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $("#appendConditionProduct").html(productHTML);
                $(".addConditionProductWrapper").css("display", "block");
                $(".addConditionProductWrapper.noData").css("display", "none");
                $(".addConditionProduct").css("display", "unset");

                var html1 = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) { 
                    html1 += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    html = html1;
                });
                $("#conditionProductSelect1").html(html1);

                $('#conditionProductSelect1').select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
            }
        }

        function rewardProductListOpt(data, message) {
            if(data) {
                $("#appendRewardProduct").empty();

                var productHTML =
                    `<div class="col-md-12">                
                        <div class="addRewardProductWrapper default">
                            <span class="dtxt">Default</span>
                            
                            <div class="row" id="pr1">
                                <div class="col-md-6">
                                    <label>1. Reward Product</label>
                                    <select id="rewardProductSelect1" onchange="rewardProductSelect(1);" class="form-control productSelect" required></select>
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
                    </div>`;

                $("#appendRewardProduct").html(productHTML);
                $(".addRewardProductWrapper").css("display", "block");
                $(".addRewardProductWrapper.noData").css("display", "none");
                $(".addRewardProduct").css("display", "unset");

                var html1 = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) { 
                    html1 += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    html = html1;
                });
                $("#rewardProductSelect1").html(html1);

                $('#rewardProductSelect1').select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
            }
        }

        function rewardProductListOpt2(data, message) {
            if(data) {
                $("#appendRewardProduct").empty();

                var productHTML =
                    `<div class="col-md-12">                
                        <div class="addRewardProductWrapper default">
                            <span class="dtxt">Default</span>
                            
                            <div class="row" id="pr1">
                                <div class="col-md-9">
                                    <label>1. Reward Product</label>
                                    <select id="rewardProductSelect1" onchange="rewardProductSelect(1);" class="form-control productSelect" required></select>
                                </div>
                                <div class="col-md-3">
                                    <label>Price</label>
                                    <input id="rewardProductPrice1" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $("#appendRewardProduct").html(productHTML);
                $(".addRewardProductWrapper").css("display", "block");
                $(".addRewardProductWrapper.noData").css("display", "none");
                $(".addRewardProduct").css("display", "unset");

                var html1 = `<option value="">Select Product</option>`;
                $.each(data.getProductDetail, function(i, obj) { 
                    html1 += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
                    html = html1;
                });
                $("#rewardProductSelect1").html(html1);

                $('#rewardProductSelect1').select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
            }
        }

        function addConditionRow(){
            var totalConditionLoop =[1];
            
            var wrapper = `
                <div class="col-md-12">
                    <div class="addConditionProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeConditionDiv(this,${(conditionWrapperLength)})">&times;</a>
                        <div class="row" id="pr${(conditionWrapperLength)}">
                            <div class="col-md-9">
                                <label>${(conditionWrapperLength)}. Condition Product</label>
                                <select id="conditionProductSelect${(conditionWrapperLength)}" class="form-control productSelect" required>
                                                                     
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

            $("#conditionProductSelect"+conditionWrapperLength).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            totalConditionLoop.push(conditionWrapperLength);
            conditionWrapperLength++;
        }

        function addRewardRow(){
            var totalRewardLoop =[1];
            
            var wrapper = `
                <div class="col-md-12">
                    <div class="addRewardProductWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeRewardDiv(this,${(rewardWrapperLength)})">&times;</a>
                        <div class="row" id="pr${(rewardWrapperLength)}">
                            <div class="col-md-6">
                                <label>${(rewardWrapperLength)}. Reward Product</label>
                                <select id="rewardProductSelect${(rewardWrapperLength)}" onchange="rewardProductSelect(${(rewardWrapperLength)});" class="form-control productSelect" required>
                                                                     
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Price</label>
                                <input id="rewardProductPrice${(rewardWrapperLength)}" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                            <div class="col-md-3">
                                <label>Quantity</label>
                                <input id="rewardProductQuantity${(rewardWrapperLength)}" type="number" class="form-control quantityInput" value="0" placeholder="0" required/>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#appendRewardProduct").append(wrapper);
            $("#rewardProductSelect"+rewardWrapperLength).html(html);

            $("#rewardProductSelect"+rewardWrapperLength).select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });

            totalRewardLoop.push(rewardWrapperLength);
            rewardWrapperLength++;
        }

        function closeConditionDiv(n,id) {
            var totalConditionLoop =[1];

            const index = totalConditionLoop.indexOf(id); 
            if (index > -1) {
              totalConditionLoop.splice(index, 1); 
            }

            // $(n).parent().parent().hide();
            $(n).parent().parent().remove();
        }

        function closeRewardDiv(n,id) {
            var totalRewardLoop =[1];

            const index = totalRewardLoop.indexOf(id); 
            if (index > -1) {
              totalRewardLoop.splice(index, 1); 
            }

            // $(n).parent().parent().hide();
            $(n).parent().parent().remove();
        }

        function rewardProductSelect(id) {
            var formData = {
                command        : "getProduct",
            };

            fCallback = assignPrice;
            vidID = id;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0, 0, 0, vidID);
        }

        function assignPrice(data, message) {
            var optSelected = ($("#rewardProductSelect" + this.vidID).find("option:selected").val()); 
            console.log("optSelected = "+optSelected);

             var price;

            for(var v = 0; v < data.getProductDetail.length; v++) {
                if(data.getProductDetail[v].id == optSelected){
                    price = data.getProductDetail[v].sale_price;
                }
            }

           

            $("#rewardProductPrice" + this.vidID).val(price);
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


    </script>
</body>
</html>
