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
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div id="datepicker" class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Schedule Date
                                                            </label>
                                                            <div class="input-daterange input-group" id="datepicker-range" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                                <input id="fromDate" type="text" placeholder="From" class="form-control" dataName="scheduleDate" dataType="dateRange" />
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-chevron-right"></i>
                                                                </div>
                                                                <input id="toDate" type="text" placeholder="To" class="form-control" dataName="scheduleDate" dataType="dateRange" />
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                Campaign Name
                                                            </label>
                                                            <input id="" type="text" class="form-control" dataName="campaignName" dataType="text">
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label>
                                                                <?php echo $translations['A00427'][$language]; /* Priority */?>
                                                            </label>
                                                            <input id="" type="text" class="form-control" dataName="priority" dataType="number" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                Banner Page
                                                            </label>
                                                            <input id="bannerPage" type="text" class="form-control" dataName="bannerPage" dataType="text" required/>
                                                            <!-- <select id="bannerPage" type="text" class="form-control" dataName="bannerPage" dataType="text" required>
                                                                <option value="foodMenu.php">
                                                                    Food Menu
                                                                </option>
                                                            </select>  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-xs-12 m-t-rem1">
                                                <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </div>
                                                <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                                <div id="addBanner" class="btn btn-primary waves-effect waves-light m-b-20">
                                    Add Banner
                                </div>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <!-- <div id="alertMsg" class="text-center alert" style="display: none;"></div> -->
                                            <div id="bannerListDiv" class="table-responsive">
                                                <table id="bannerListTable" class="table table-striped table-bordered no-footer m-0">
                                                </table>
                                            </div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerBannerList"></ul>
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
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'bannerListDiv';
        var tableId  = 'bannerListTable';
        var pagerId  = 'pagerbannerList';
        var btnArray = Array('edit', 'delete');
        var thArray  = Array (
            'ID',
            'From Date',
            'To Date',
            'Campaign Name',
            'Priority',
            'Banner Page'
        );

        var sortThArray = Array(
            "id",
            "from_date",
            "to_date",
            "name",
            "priority",
            "banner_page",
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {

            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchBtn").click();
                }
            });

            pagingCallBack(pageNumber, loadSearch);
                
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

            $('#addBanner').click(function() {
                $.redirect("addGTBanner");
            });
        });

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;
                
                var searchID = 'searchForm';
                var searchData = buildSearchDataByType(searchID);
                var sortData = getSortData(tableId);

                var formData   = {
                    command     : "getGTBannerList",
                    pageNumber  : pageNumber,
                    searchData   : searchData,
                    sortData    : sortData
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            if(data.record){
                $('#basicwizard').show();

                var sortArray = {
                    'sortThArray'   : sortThArray,
                    'sortBy'        : data['sortBy'],
                }

                var tableNo;

                buildTable(data.record, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
                pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

                $('#'+tableId).find('tr').each(function(){
                    $(this).find('th:first-child, td:first-child').hide();
                    $(this).find('td:last-child').css('text-align','center');
                    $(this).find('td:eq(4)').css('text-align', "right");
                })
            }else{
                $('#' + tableId).html('<tr><td colspan="5">' + "No record(s) found" + '</td></tr>');
            }

        }
        
        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var id = tableRow.attr('data-th');

            if(btnName == "edit") {
                $.redirect('editGTBanner', {id : id});
            }
            else if(btnName == "delete") {
                showMessage("Confirm to delete distribution?", 'danger', "Delete Distribution", 'trash', '', ["Confirm"]);
                $('#canvasConfirmBtn').click(function () {
                    var formData  = {command : 'deleteGTBanner', id : id};
                    var fCallback = removeCallback;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                });
            }
        }

        function removeCallback(data, message) {
            showMessage(message, 'success', 'Remove Banner', 'trash', 'getGTBannerList');

        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }

        $('#fromDate').datepicker({
            format      : 'yyyy/mm/dd',
            orientation : 'auto',
            autoclose   : true
        });

        $('#toDate').datepicker({
            format      : 'yyyy/mm/dd',
            orientation : 'auto',
            autoclose   : true
        });
    </script>
</body>
</html>