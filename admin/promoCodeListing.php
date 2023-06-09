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
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01727'][$language]; /* Code */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="code" dataType="text">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" data-th="disabled">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="status" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="active">
                                                                <?php echo $translations['A00372'][$language]; /* Active */ ?>
                                                            </option>
                                                            <option value="deactive">
                                                                <?php echo $translations['A01728'][$language]; /* Deactive */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <a onclick="addPromoCode()" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                            <?php echo $translations['A01729'][$language]; /* New Promo Code */ ?>
                        </a>
                        <form>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<div class="modal fade" id="newPromoCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>

                <h4 class="modal-title"><i class="fa fa-3x fa-"></i><span><?php echo $translations['A01729'][$language]; /* New Promo Code */ ?></span></h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo $translations['A01730'][$language]; /* Promo Code */ ?>:</label>
                    <input type="text" class="form-control" id="newCode" required>
                </div>

                <div class="form-group">
                    <label><?php echo $translations['A00819'][$language]; /* Type */ ?>:</label>
                    <select class="form-control" id="promoCodeType">
                        <option value="freeShipping">
                            <?php echo $translations['A01731'][$language]; /* Free Shipping */ ?>
                        </option>
                        <option value="billDiscount">
                            <?php echo $translations['A01732'][$language]; /* Bill Discount */ ?>
                        </option>
                        <option value="doubleReward">
                            <?php echo $translations['A01733'][$language]; /* Double Reward */ ?>
                        </option>
                        <option value="comingSoon">
                            <?php echo $translations['A01746'][$language]; /* Coming Soon */ ?>
                        </option>
                    </select>
                </div>
            </div>
              
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                <button id="submitBtn" type="button" class="btn btn-primary"><?php echo $translations['A00323'][$language]; /* Submit */ ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPromoCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>

                <h4 class="modal-title"><i class="fa fa-3x fa-"></i><span><?php echo $translations['A01734'][$language]; /* Edit Promo Code */ ?></span></h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo $translations['A01730'][$language]; /* Promo Code */?>:</label>
                    <input type="text" class="form-control" id="editCode" disabled>
                    <input type="hidden" class="form-control" id="editCodeId">
                </div>

                <div class="form-group">
                    <label><?php echo $translations['A00819'][$language]; /* Type */ ?>:</label>
                    <select class="form-control" id="editPromoCodeType">
                        <option value="freeShipping">
                            <?php echo $translations['A01731'][$language]; /* Free Shipping */ ?>
                        </option>
                        <option value="billDiscount">
                            <?php echo $translations['A01732'][$language]; /* Bill Discount */ ?>
                        </option>
                        <option value="doubleReward">
                            <?php echo $translations['A01733'][$language]; /* Double Reward */ ?>
                        </option>
                        <option value="comingSoon">
                            <?php echo $translations['A01746'][$language]; /* Coming Soon */ ?>
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo $translations['A00318'][$language]; /* Status */?>:</label>
                    <select class="form-control" id="editPromoCodeStatus">
                        <option value="Active">
                            <?php echo $translations['A00372'][$language]; /* Active */?>
                        </option>
                        <option value="Deactive">
                            <?php echo $translations['A01728'][$language]; /* Deactive */ ?>
                        </option>
                    </select>
                </div>
            </div>
              
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */?></button>
                <button id="editBtn" type="button" class="btn btn-primary"><?php echo $translations['A00323'][$language]; /* Submit */ ?></button>
            </div>
        </div>
    </div>
</div>

<script>
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('edit', 'delete');
    var thArray  = Array(
        '<?php echo $translations['A01734'][$language]; /* Promo Code */?>',
        '<?php echo $translations['A00819'][$language]; /* Type */ ?>',
        '<?php echo $translations['A01747'][$language]; /* Used Amount */ ?>',
        '<?php echo $translations['A01705'][$language]; /* Status */ ?>',
        );
    var searchId = 'searchForm';

    var url             = 'scripts/reqBonus.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#submitBtn').click(function() {
            if($("#newCode").val != null) {
                $('#newPromoCode').modal('hide');

                var formData   = {
                    command     : "addPromoCode",
                    type    : $("#promoCodeType").find("option:selected").val(),
                    code    : $("#newCode").val(),
                };

                fCallback = refreshListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#editBtn').click(function() {
            if($("#editCode").val != null) {
                $('#editPromoCode').modal('hide');

                var formData   = {
                    command     : "updatePromoCodeStatus",
                    status    : $("#editPromoCodeStatus").find("option:selected").val(),
                    codeID    : $("#editCodeId").val(),
                };

                fCallback = refreshListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }); 
    });

    function refreshListing() {
        $("#searchBtn").click();
    }

    function pagingCallBack(pageNumber, fCallback){
        $("#promoCodeType").val("freeShipping");
        $("#newCode").val("");

        $("#editCode").val("");

        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPromoCodeListing",
            pageNumber  : pageNumber,
            searchData   : searchData
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.listing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+ tableId).find('thead tr').each(function(){
            $(this).find('th').css('text-align','center');
        });

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td').css('text-align','center');
        });
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'delete') {
            var promoCodeID = tableRow.find('td:eq(0)').text();

            var formData   = {
                command     : "deletePromoCode",
                promoCodeID   : promoCodeID
            };

            fCallback = refreshListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            var editCode = tableRow.find('td:eq(0)').text();
            var editStatus = tableRow.find('td:eq(3)').text();

            document.getElementById("editCode").disabled = false;
            editPromoCode(editId, editCode, editStatus);
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function addPromoCode() {
        $('#newPromoCode').modal('show');
    }

    function editPromoCode(a,b,c){
        $("#editPromoCode").modal('show');

        $("#editCodeId").val(a);
        $("#editCode").val(b);
        $("#editPromoCodeStatus").val(c);
    }


</script>
</body>
</html>
