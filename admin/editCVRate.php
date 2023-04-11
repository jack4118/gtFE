<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>
    <!-- Begin page -->
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
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div><!-- END wrapper -->

    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4>
                        <span id="editTitle" style="font-size: 20px;">Edit CV Rate</span>
                    </h4>
                </div>

                <div class="modal-body" style="display: block;overflow: auto;">
                    <div class="col-xs-6">
                        <label>CV Rate</label>
                        <input id="newRate" class="form-control newRate" type="text" class="form-control">
                    </div>
                    <p id="id" style="display: none;"></p>
                    <div class="col-xs-6 input-daterange">
                        <label>Active Date</label>
                        <input id="newActiveDate" class="form-control newActiveDate">
                    </div>
                </div>

                <div class="modal-footer m-t-20">
                    <div class="col-12 text-center">
                        <button id="confirmEdit" type="button" class="btn btn-primary waves-effect waves-light m-t-20">
                            Edit
                        </button>
                        <button type="button" class="btn btn-default waves-effect waves-light m-t-20" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'listDiv';
        var tableId  = 'listTable';
        var pagerId  = 'pagerList';
        var btnArray = {};
        var thArray  = Array (
            "Name",
            "Currency Code",
            "Rate",
            "Edit",
            "View"
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {
            var formData   = {
                command     : "getCVRateList",
                pageNumber  : pageNumber
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("#confirmEdit").click(function(){
                var id              = $("#id").val();
                var newRate         = $("#newRate").val();
                var newActiveDate   = $("#newActiveDate").val();
                formData  = {
                    command         : 'editCVRate',
                    countryID       : id,
                    cvRate          : newRate,
                    activeDate      : newActiveDate
                };
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                $("#editModal").modal("hide");
            });
        });

        function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var formData   = {
                command     : "getCVRateList",
                pageNumber  : pageNumber
            };

            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            $('#basicwizard').show();
            var tableNo;
            var list = data.cvRateList;
            if(list) {
                var newList = [];

                $.each(list, function(k, v) {

                    var viewBtn = `
                        <a data-toggle="tooltip" title="" onclick="view('${v['id']}','${v['displayName']}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                    `;

                    var editBtn = `
                        <a data-toggle="tooltip" title="" onclick="edit('${v['id']}','${v['rate']}','${v['activedAt']}','${v['displayName']}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="edit" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;

                   

                    var rebuildData = {
                        displayName : v['displayName'],
                        currencyCode : v['currencyCode'],
                        rate : v['rate'],
                        editBtn : editBtn,
                        viewBtn : viewBtn
                    };

                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    timePicker: true,
                    locale: {
                        format: 'YYYY-MM-DD HH:mm:ss'
                    }
                });
                $(this).val('');
            });
            
            $('#' + tableId).find('thead tr').each(function () {
                $(this).find('th:last').css('text-align', "center");
            });
            $('#' + tableId).find('tbody tr').each(function () {
                $(this).find('td:last').css('text-align', "center");
            });

            $('#' + tableId).find('thead tr').each(function () {
                $(this).find('th:nth-last-child(2)').css('text-align', "center");
            });
            $('#' + tableId).find('tbody tr').each(function () {
                $(this).find('td:nth-last-child(2)').css('text-align', "center");
            });

        }

        
        function edit(id, rate, date, name) {
            $("#editModal").modal("show");

            $("#id").val(id);
            $("#editTitle").html("Edit CV Rate for " + name);
            $("#newRate").val(rate)
            $("#newActiveDate").val(date);
        }

        function view(id, name) {
            $.redirect('cvRateHistory.php', {
                id  : id,
                name: name
            });
        }

        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', 'edit', 'editCVRate.php');
        }
    </script>
</body>
</html>