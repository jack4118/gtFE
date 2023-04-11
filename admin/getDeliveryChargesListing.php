<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);
    $countryList = $_SESSION['countryList'];
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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group" id="datepicker">
                                                        <label class="control-label" data-th="">Date</label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control"
                                                                   name="start" dataName="date" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control"
                                                                   name="end" dataName="date" dataType="dateRange"
                                                                   autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Country
                                                        </label>
                                                        <!-- <select class="form-control" dataName="countryID" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>

                                                            <?php
                                                                foreach ($countryList as $value => $countryRow) {
                                                                    echo "<option value='".$countryRow['id']."'>".$countryRow['display']."</option>";
                                                                }
                                                            ?>
                                                        </select> -->

                                                        <select id="country" class="form-control" dataName="countryID" dataType="select">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        

                                        </form>
                                      

                                        <div class="col-sm-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
                                                    class="btn btn-default waves-effect waves-light">
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
                        <!-- <div class="card-box p-b-0"> -->
                        <!-- <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                            Export to xlsx
                        </button> -->
                        <button id="seeAllBtn" class="btn btn-primary waves-effect waves-light m-b-20" style="display: none">
                            See All
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: block;">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: block;"></div>
                                    <div id="bonusListDiv" class="table-responsive"></div>
                                    <span id="grandTotal"></span>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId = 'bonusListDiv';
    var tableId = 'bonusListTable';
    var pagerId = 'pagerBonusList';
    var btnArray = {};
    var thArray = Array(
        'Date',
        'Country',
        'State',
        'Weight (kg)',
        'Charges (RM)',
        'Done By'
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";
    var buildcountrycount = 0;

    $(document).ready(function () {

        formData  = {
            command : "getDeliveryCharges"
        };
        fCallback = loadCountry;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#seeAllBtn').click(function () {

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            formData = {
                command: 'getDeliveryChargesListing',
                searchData: searchData,
                pageNumber: 1,
                seeAll: 1
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    /*$('#exportBtn').click(function () {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var key = Array(
            'date',
            'countryDisplay',
            'stateDisplay',
            'weight',
            'charges',
            'doneBy'
        );

        var formData = {
            command     : "getDeliveryCharges",
            filename    : "DeliveryChargesReport",
            searchData  : searchData,
            pageNumber  : 1,
            seeAll      : 1,
            header      : thArray,
            key         : key,
            DataKey     : "deliveryCharges",
            type        : 'export'
        };
        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });*/

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getDeliveryChargesListing",
            searchData: searchData,
            pageNumber: pageNumber
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadCountry(data, message) {
        var buildCountry = "";

        buildCountry += `
            <option value="">
               All
            </option>
        `;

        $.each(data.countryList, function(k,v){
            buildCountry += `
                <option value="${v['id']}">
                   ${translations[v['translation_code']][language]}
                </option>
            `;
        });
        $("#country").html(buildCountry);

        buildcountrycount = 1;
    }

    function loadDefaultListing(data, message) {
        if (buildcountrycount ==  0) {
            var buildCountry = "";

            buildCountry += `
                <option value="">
                   All
                </option>
            `;

            $.each(data.countryList, function(k,v){
                buildCountry += `
                    <option value="${v['id']}">
                       ${translations[v['translation_code']][language]}
                    </option>
                `;
            });
            $("#country").html(buildCountry);

            buildcountrycount = 1;
        }

        if (data.totalPage > 1) {
            $("#seeAllBtn").show();
        } else {
            $("#seeAllBtn").hide();
        }

        /*if (data) {
            $("#exportBtn").show();
        } else {
            $("#exportBtn").hide();
        }*/
        
        $("#basicwizard").show();
        
        var tableNo;

        if (data.deliveryChargesList) {
            var newList = [];
            $.each(data.deliveryChargesList, function(k, v) {
                var rebuildData = {
                    date            : v['date'],
                    country         : v['countryDisplay'],
                    stateDisplay    : v['stateDisplay'],
                    weight          : addCommas(Number(v['weight']).toFixed(2)),
                    charges         : addCommas(Number(v['charges']).toFixed(2)),
                    doneBy          : v['doneBy']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


        $('#' + tableId).find('thead tr').each(function () {
            $(this).find('th:eq(3)').css('text-align', "right");
            $(this).find('th:eq(4)').css('text-align', "right");
        });

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4)').css('text-align', "right");
        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


</script>
</body>
</html>
