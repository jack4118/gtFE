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
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form>
                                                    <div id="basicwizard" class="pull-in" style="display: none">
                                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                                            <h4 id="pageTitle"></h4>
                                                            <div id="alertMsg" class="text-center" style="display: block;"></div>
                                                            <div id="listingDiv" class="table-responsive"></div>
                                                            <span id="paginateText"></span>
                                                            <div class="text-center">
                                                                <ul class="pagination pagination-md" id="pagerListing"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

    <!-- <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                    <video id="modalVideo" width="400" controls>
                      <source src="" type="">
                    </video>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div> -->

   
    <!-- <div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="canvasTitle" class="modal-title"><?php echo "Processing"; //Processing ?></span>
                </div>
                <div class="modalLine"></div>
                <div class="modal-body modalBodyFont">
                    <div id="canvasAlertMessage"><?php echo "Uploading file..."; //Uploading file... ?></div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div> -->
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize all the id in this page
        var divId    = 'listingDiv';
        var tableId  = 'listingTable';
        var pagerId  = 'pagerListing';
        var btnArray = {};
        var thArray  = Array (
            "Admin",
            "Created Date",
            "Activated Date",
            "Rate"
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 
        var id = "<?php echo $_POST['id']; ?>";
        var name = "<?php echo $_POST['name']; ?>";

        $(document).ready(function() {

            $('#pageTitle').html(name + " CV Rate History");
            var formData  = {
                command         : 'getCVRateHistory',
                id              : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#backBtn').click(function() {
                $.redirect('editCVRate.php');
            });

            
        });

        /*$(document).on("click",".nameTagBlock",function() {
            $(this).remove();
        });*/

        function loadDefaultListing(data, message) {
            // console.log(data);
            var tableNo;
            var list = data.cvRateHistory;

            $('#basicwizard').show();
            
            buildTable(list, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
    </script>
</body>
</html>

