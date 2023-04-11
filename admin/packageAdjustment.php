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
                        <div onclick="window.location='getPackageList.php'" class="btn btn-primary waves-effect waves-light m-b-20">
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
                                            <label>Package Name:</label>
                                            <input id="packageDisplay" type="text" class="form-control" disabled>
                                        </div>
                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Stock Balance:</label>
                                            <input id="quantityDisplay" type="text" class="form-control" disabled>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Adjustment Type</label>
                                            <div id="adjustmentType">
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
                                            <label>Quantity</label>
                                            <input id="quantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span id="quantityError" class="customError text-danger"></span>
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
    var packageID = "<?php echo $_POST['packageID']; ?>";

    var divId    = 'announcementListDiv';
    var tableId  = 'announcementListTable';
    var pagerId  = 'pagerAnnouncementList';
    var pageNumber      = 1; 
    var btnArray = {};
    var thArray  = Array (
        "Package ID",
        "Quantity"
    );

    $(document).ready(function() {

        var formData  = {
            command: 'getPackageAdjustment',
            packageID : packageID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.customError').text('');

            var type = $('input[name=adjustmentType]:checked').val();
            var quantity = $("#quantity").val();

            var formData  = {
                command     : 'packageAdjustment',
                packageID   : packageID,
                type        : type,
                quantity    : quantity
            };

            fCallback = successAdjustment;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function successAdjustment(data, message) {
        showMessage(message, 'success', 'Package Adjustment', 'edit', ['packageAdjustment.php', {packageID : packageID}]);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "getPackageAdjustment",
            packageID   : packageID,
            pageNumber  : pageNumber
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        /*$('#basicwizard').show();
        var tableNo;

        if(data) {
            var newList = [];

            $.each(data, function(k, v) {

                var rebuildData = {
                    packageID   : packageID,
                    quantity    : numberThousand(v, 0)
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr, thead tr').each(function () {
            $(this).find('td:last-child, th:last-child').css('text-align', "right");
        });*/
        $('#packageDisplay').val(data.packageName);
        data.quantity ? $('#quantityDisplay').val(numberThousand(data.quantity, 0)) : $('#quantityDisplay').val("-");
    }

    /*function goToDO(id) {
        $.redirect("getDeliveryOrderDetails.php", {
            id: id,
            backID: "<?php echo $_POST['invProductID']; ?>",
            backUrl: window.location.href
        });
    }*/

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }




</script>
</body>
</html>

