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
                        <div class="col-xs-12">
                            <div class="card-box col-12">

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-sm-10">
                                                    <label>Type</label>
                                                </div>
                                                <div class="col-xs-12 col-sm-10 col-md-6 col-lg-5">
                                                    <select id="type" class="form-control" disabled>
                                                        <option value="SST">SST</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-sm-10">
                                                    <label>Rate</label>
                                                </div>
                                                <div class="col-xs-12 col-sm-10 col-md-6 col-lg-5">
                                                    <input id="rate" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
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


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" style="margin-top: 20px;">
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
                                                <form id="searchActivityLog" role="form">
                                                  <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group">
                                                        <label>Type</label>
                                                        <select id="typeS" class="form-control" dataType="select" dataName="type" disabled>
                                                            <option value="SST">SST</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                </form>
                                                <div class="col-xs-12">
                                                    <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                    </button>
                                                    <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                        <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                    <!-- End row -->
                    <!-- Start row -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="card-box p-b-0"> -->
                                    <form>
                                        <div id="basicwizard" class="pull-in" style="display: none">
                                            <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                <div id="activityLogListDiv" class="table-responsive"></div>
                                                <span id="paginateText"></span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pageActivityLogList"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <!-- </div> -->
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

        var divId    = 'activityLogListDiv';
        var tableId  = 'activityLogListTable';
        var pagerId  = 'pageActivityLogList';
        var btnArray = {};
        var thArray  = Array(
                             // "Created At",
                             "Type",
                             // "Country",
                             "Rate",
                             // "Currency Code",
                             // "Creator Username",
                            );
            
        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var pageNumber     = 1;
        var activityDate   = ""; 

        var clientID        = "<?php echo $_POST['clientID']; ?>";

        $(document).ready(function() {

            // setTodayDatePicker();

            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });
            
            $('#resetBtn').click(function() {
                $('#alertMsg').removeClass('alert-success').html('').hide();
                $('#searchActivityLog').find('input:not([type=radio])').each(function() {
                   $(this).val(''); 
                });
                $('#searchActivityLog').find('select').val('');
                // setTodayDatePicker();

                /*$('#datepicker input').each(function () {
                    $(this).datepicker('clearDates');
                });*/
            });

            /*$('#dateRangeStart').datepicker({
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
            });*/

            $('#submitBtn').click(function() {
                var type = $("#type").val();
                var rate = $("#rate").val();
                
                var formData  = {
                    command     : 'setTaxes',
                    type        : type,
                    rate        : rate
                };
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function loadDefaultListing(data, message) {
            $('#basicwizard').show();
            var tableNo;

            if (data) {
                var newList = [];
                newList.push({
                    type : data['type'],
                    rate : data['rate']
                });
                /*$.each(data.taxesList, function (k, v) {
                    var rebuildData = {
                        created_at: v['created_at'],
                        type: v['type'],
                        // countryDisplay: v['countryDisplay'],
                        rate: v['rate'],
                        // currencyCode: v['currencyCode'],
                        creatorUsername: v['creatorUsername']
                    };
                    newList.push(rebuildData);
                });*/
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            /*$('#' + tableId).find('thead tr').each(function () {
                $(this).find('th:eq(2)').css('text-align', "right");
                $(this).find('th:eq(3)').css('text-align', "right");
                $(this).find('th:eq(4)').css('text-align', "right");
            });

            $('#' + tableId).find('tbody tr').each(function () {
                $(this).find('td:eq(2)').css('text-align', "right");
                $(this).find('td:eq(3)').css('text-align', "right");
                $(this).find('td:eq(4)').css('text-align', "right");
            });*/
        }

        /*$('#percentage').on('input', function() {
            var rateAmount = $('#rateAmount').attr("getValue");
            var percentage = $('#percentage').val();
            console.log(rateAmount);
            var newRate = rateAmount * (100-percentage) / 100;
            $('#newRate').val(addCommas(Number(newRate).toFixed(8)));
        });*/

        function pagingCallBack(pageNumber, fCallback){
            // var searchId   = 'searchActivityLog';
            // var searchData = buildSearchDataByType(searchId);
            var type = $('#typeS option:selected').val();

            if(pageNumber > 1) bypassLoading = 1;
            
            var formData = {
                command     : "getTaxes",
                type        : type
                // pageNumber  : pageNumber
            };
            
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function setTodayDatePicker() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            }
            var today = dd+'/'+mm+'/'+yyyy;
            
            $('#searchDate').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            var dateToday = $('#searchDate').val(today);

            $('#timeFrom').timepicker({
                defaultTime : '',
                showSeconds: true
            });
            $('#timeTo').timepicker({
                defaultTime : '',
                showSeconds: true
            });

            return dateToTimestamp(today);
        }

        /*function setSearchOption(data, searchVal) {
            $('#searchActivityLog #activityType').find('option:not(:first-child)').remove();
            $.each(data, function(key, val) {
                $('#searchActivityLog #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
            });
            if (searchVal != ' '){
                $('#searchActivityLog #activityType').val(searchVal);
            }
        }*/
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }
      

        function submitCallback(data, message) {
            showMessage(message, 'success', 'Congratulations', '', 'setTaxes.php');
        }
      

    </script>
</body>
</html>
