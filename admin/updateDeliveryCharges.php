<?php session_start(); ?>
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
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                               
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <div class="row">

                                                <div class="col-xs-12">
                                                    <div class="row">

                                                        <div class="col-xs-12 chargesTitle">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    Country
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <div class="row">
                                                                        <div class="col-xs-3">
                                                                            State
                                                                        </div>
                                                                        <div class="push-xs-1 col-xs-8">
                                                                            <div class="row">
                                                                                <div class="col-xs-5">
                                                                                    Weight
                                                                                </div>
                                                                                <div class="col-xs-5">
                                                                                    Delivery Charges (USD)
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12">
                                                            <div id="buildListing" class="row"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xs-12">
                                            <div class="adminLine"></div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                                Update
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
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'portfolioListDiv';
    var tableId = 'portfolioListTable';
    var pagerId = 'pagerPortfolioList';
    var btnArray = {};
    var thArray = Array(
        'Package Name',
        'Package Price',
        'Bonus Value',
        'Quantity',
        'Total BV',
        'Total Price'
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var productID;
    var deliveryCharges;

    var allCountryId = [];
    var allStateId = [];

    $(document).ready(function () {
        formData  = {
            command : "getDeliveryCharges"
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#updateBtn").click(function(){

            $(".errorSpan").remove();

            // var buildChargesQuantityBox = $(".buildChargesQuantityBox");
            // $.each(buildChargesQuantityBox, function(k,v){

            //     var getAboveValue = $(this).find(".weight").eq(-2).val();
            //     var getCurrentMinValue = $(this).find(".weight").last().val();

            //     if (parseFloat(getAboveValue) >= parseFloat(getCurrentMinValue)) {
            //          $(this).find(".weight").last().after(`<span class="errorSpan text-danger">Weight cannot be empty or less and equal to previous weight</span>`);
            //     }
            // });

            $.each(allStateId, function(k,v){
                // var countryBox = $(".chargesQuantityBox[getCountryID='"+v+"']");
                var stateBox = $(".chargesQuantityBox[getStateID='"+v+"']");

                $.each(stateBox, function(i, obj) {

                    var countryID = $(this).attr('getCountryID');

                    // c129s33minWeight1Error
                    // c129s33charges13Error

                    $(this).find(".weight").after(`<span id="c${countryID}s${v}minWeight${i+1}Error" class="errorSpan text-danger"></span>`);

                    $(this).find(".chargesAmount").after(`<span id="c${countryID}s${v}charges${i+1}Error" class="errorSpan text-danger"></span>`);
                });
            });

            // "countryID": "129",
            // "stateID": "45",
            // "weight": "1",
            // "charges": "11",

            deliveryCharges = [];

            $('.chargesQuantityBox').each(function() {
                var getCountryID = $(this).attr('getCountryID');
                var getStateID = $(this).attr('getStateID');
                var getWeight = $(this).find(".weight").val();
                var getChargesAmount = $(this).find(".chargesAmount").val();
                buildDeliveryCharges = {
                    countryID : getCountryID,
                    stateID : getStateID,
                    weight : getWeight,
                    charges : getChargesAmount
                };

                deliveryCharges.push(buildDeliveryCharges);

            });

            formData  = {
                command             : "updateDeliveryCharges",
                deliveryCharges     : deliveryCharges,
            };
            fCallback = successUpdate;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })
    });

    function loadDefaultListing(data, message) {

        var countryList = data.countryList;
        var stateList = data.stateList;
        var deliveryChargesList = data.deliveryChargesList;


        var buildListing = "";
        var countryID = [];
        var stateID = [];

        $.each(deliveryChargesList, function(k,v){
            buildListing += `
                <div class="col-xs-12 chargesContent" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12" style="margin-top: 5px;">
                            ${countryList[k].name}
                        </div>
                        <div class="col-sm-10 col-xs-12">
            `;

            $.each(v, function(k1,v1){
                buildListing += `
                            <div class="row" style="border-bottom: 1px solid #1ca011;margin-bottom: 10px;">
                                <div class="col-sm-2 col-xs-9" style="margin-top: 5px;">
                                    ${stateList[k1].name}
                                </div>
                                <div class="col-sm-1 col-xs-3">
                                    <a href="javascript:;" class="btn addCharges" getCountryID="${stateList[k1].country_id}" getStateID="${stateList[k1].id}">+</a>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <div class="buildChargesQuantityBox">
                           
                `;
                

                $.each(v1, function(k2,v2){

                    var getLength = v1.length - 1;

                    if (k2 == 0) {
                        buildListing += `
                            <div class="chargesQuantityBox" getCountryID="${v2['countryID']}" getStateID="${v2['stateID']}">
                                <div class="row findDeleteButton">
                                    <div class="col-sm-5 col-xs-12">
                                        Weight (kg) <input type="text" class="form-control weight" value="${v2['weight']}">
                                    </div>
                                    <div class="col-sm-5 col-xs-12">
                                        Charges Amount <input type="text" class="form-control chargesAmount" value="${v2['charges']}">
                                    </div>
                                </div>
                            </div>
                        `;
                    } else if (k2 == getLength){
                        buildListing += `
                            <div class="chargesQuantityBox" getCountryID="${v2['countryID']}" getStateID="${v2['stateID']}">
                                <div class="row findDeleteButton">
                                    <div class="col-sm-5 col-xs-12">
                                        Next Weight (kg) <input type="text" class="form-control weight" value="${v2['weight']}">
                                    </div>
                                    <div class="col-sm-5 col-xs-12">
                                        Charges Amount <input type="text" class="form-control chargesAmount" value="${v2['charges']}">
                                    </div>
                                    <div class="col-sm-1 col-xs-12">
                                        <a href="javascript:;" class="btn deleteCharges" onclick="deleteCharges(this)">-</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        buildListing += `
                            <div class="chargesQuantityBox" getCountryID="${v2['countryID']}" getStateID="${v2['stateID']}">
                                <div class="row findDeleteButton">
                                    <div class="col-sm-5 col-xs-12">
                                        Next Weight (kg) <input type="text" class="form-control weight" value="${v2['weight']}">
                                    </div>
                                    <div class="col-sm-5 col-xs-12">
                                        Charges Amount <input type="text" class="form-control chargesAmount" value="${v2['charges']}">
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                });

                buildListing += `
                                    </div>
                                </div>
                            </div>
                `;

                stateID.push(stateList[k1].id);
            });

            buildListing += `
                        </div>
                    </div>
                </div>
            `;

            countryID.push(countryList[k].id);
        });

        allCountryId = countryID;
        allStateId = stateID;

        $("#buildListing").html(buildListing);

        $(".addCharges").click(function(){
            var getCountryID = $(this).attr("getCountryID");
            var getStateID = $(this).attr("getStateID");

            var getAboveValue = $(this).parent().parent().find(".weight").eq(-2).val();
            var getCurrentMinValue = $(this).parent().parent().find(".weight").last().val();

            if (getCurrentMinValue == "" || parseFloat(getAboveValue) >= parseFloat(getCurrentMinValue)) {
                // alert("Weight cannot be empty or less and equal to previous weight");
            } else {

                $(this).parent().parent().find(".weight").prop('disabled', false);
                $(this).parent().parent().find(".deleteCharges").parent().remove();

                $(this).parent().parent().find(".buildChargesQuantityBox").append(`
                    <div class="chargesQuantityBox" getCountryID="${getCountryID}" getStateID="${getStateID}">
                        <div class="row findDeleteButton">
                            <div class="col-sm-5 col-xs-12">
                                Next Weight (kg) <input type="text" class="form-control weight">
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                Charges Amount <input type="text" class="form-control chargesAmount">
                            </div>
                            <div class="col-sm-1 col-xs-12">
                                <a href="javascript:;" class="btn deleteCharges" onclick="deleteCharges(this)">-</a>
                            </div>
                        </div>
                    </div>
                `);
            }
        });
    }

    function successUpdate(data, message) {
        showMessage(message, 'success', '<?php echo $translations['A00732'][$language]; /* Congratulations! */ ?>', '', 'updateDeliveryCharges.php');
    }

    function deleteCharges(n) {

        var getDeleteButtonCount = $(n).parent().parent().parent().parent().find(".findDeleteButton").length - 1;

        if (getDeleteButtonCount != 1) {
            $(n).parent().parent().parent().parent().find(".weight").eq(-2).prop('disabled', false);
            $(n).parent().parent().parent().parent().find(".findDeleteButton").eq(-2).append(`
                <div class="col-sm-1 col-xs-12">
                    <a href="javascript:;" class="btn deleteCharges" onclick="deleteCharges(this)">-</a>
                </div>
            `);
        }else{
            $(n).parent().parent().parent().parent().find(".weight").prop('disabled', false);
        }
        
        $(n).parent().parent().parent().remove();
    }

    // $(document).on("keyup", ".weight", function () {

    //     var getAboveValue = $(this).parent().parent().parent().parent().find(".weight").eq(-2).val();
    //     var getCurrentMinValue = $(this).val();

    //     if (getCurrentMinValue == "" || parseFloat(getAboveValue) >= parseFloat(getCurrentMinValue)) {
    //         alert("Weight cannot be empty or less and equal to previous weight");

    //         $(this).val('');
    //     }
    // });

</script>
</body>
</html>