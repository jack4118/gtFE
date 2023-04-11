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
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
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
                                            <form id="searchBankAccount" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                               <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="name" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                               <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00595'][$language]; /* Account Holder Name */ ?>
                                                            </label>
                                                            <input id="accHolderName" type="text" class="form-control" dataName="accHolderName" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00606'][$language]; /* Bank */ ?>
                                                            </label>
                                                            <input id="typeBank" type="text" class="form-control" dataName="typeBank" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00597'][$language]; /* Branch */ ?>
                                                            </label>
                                                            <input id="branch" type="text" class="form-control" dataName="branch" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00598'][$language]; /* Province */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="province" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status" dataType="select" >
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="1">
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */ ?>
                                                                </option>
                                                                <option value="0">
                                                                    <?php echo $translations['A00372'][$language]; /* Active */ ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-xs-12">
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
                        <div class="col-xs-12">
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="accountListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <!-- start -->
                                            <div id="paginationOptions" class="newLineMargin" style="display: table;padding: 10px 0px;">
                                                <div style="display: none;">
                                                    <span class="m-l-rem1">
                                                        <?php echo $translations['A00602'][$language]; /* with selected */ ?> : 
                                                    </span>
                                                </div>
                                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                                    <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                                        <option value="Inactive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */ ?>
                                                        </option>
                                                        <<!-- option value="Deleted">
                                                            <?php echo $translations['A00374'][$language]; /* Deleted */ ?>
                                                        </option> -->
                                                    </select>
                                                </div>
                                                <div style="display: inline-block; margin-left:20px;">
                                                    <div id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->

            <?php include("footer.php"); ?>

        </div>

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'accountListDiv';
    var tableId  = 'accountListTable';
    var pagerId  = 'pageAccountList';
    var btnArray = {};
    var thArray  = Array(
                         '',
                         '<?php echo $translations['A00606'][$language]; /* Bank */ ?>',
                         "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
                         "<?php echo $translations['A00117'][$language]; /* Full Name */?>",
                         '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00608'][$language]; /* Account Holder Name */ ?>',
                         '<?php echo $translations['A00609'][$language]; /* Account No */ ?>',
                         '<?php echo $translations['A00598'][$language]; /* Province */ ?>',
                         '<?php echo $translations['A00597'][$language]; /* Branch */ ?>',
                         '<?php echo $translations['A00318'][$language]; /* Status */ ?>'
                        );
    var searchId = 'searchBankAccount';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqClient.php';
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
        
        // fCallback = loadDefaultListing;
        // formData  = {command: 'getBankAccountListAdmin'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchBankAccount').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchBankAccount').find('select').each(function() {
                $(this).val('');
            $("#searchBankAccount")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function() {
            var checkedIDs = [];
            $('#'+tableId).find('[type=checkbox]:checked').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });

            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateBankAccStatusAdmin',
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').find('option:selected').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });
    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        //set default if data.bankAccList is null
        var bankAccList, pageNumberData, totalPageData, totalRecordData, numRecordData;
        $('#paginationOptions').hide();

        var newList = [];
        if(data != null) {
            if(data.bankAccList) {
                bankAccList = data.bankAccList;
                $('#paginationOptions').show();

                $.each(data.bankAccList, function(i, obj){
                    var rebuildData = {
                        id : obj.id,
                        bankName : obj.bankName,
                        memberID : obj.memberID,
                        fullName : obj.fullName,
                        username : obj.username,
                        accountHolder : obj.accountHolder,
                        accountNo : obj.accountNo,
                        province : obj.province,
                        branch : obj.branch,
                        status : obj.statusDisplay,
                    };
                    newList.push(rebuildData);
                });
            }
            pageNumberData  = data.pageNumber;
            totalPageData   = data.totalPage;
            totalRecordData = data.totalRecord;
            numRecordData   = data.numRecord
        }
        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, pageNumberData, totalPageData, totalRecordData, numRecordData);
        addColumn(tableId, data, 7, "Inactive");

        if(data != null) {
            $.each(data.bankAccList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
            });      
        }

        $('#'+tableId).find('tbody tr').each(function(){

             var status = $(this).find("td:eq(-1)").text();
             // console.log(status);
             if (status == "Inactive"){
                $(this).find("td:eq(0)").empty().append('-');
             }

             $(this).find("td:eq(1)").remove();
             $(this).find('td:first-child').css('text-align', 'center');
        });

        $('#'+tableId).find('thead tr td').eq(0).remove();
    }

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchData = buildSearchDataByType(searchId);
            var formData   = {
                command     : 'getBankAccountListAdmin',
                pageNumber  : pageNumber,
                inputData   : searchData,
                usernameSearchType : $("input[name=usernameType]:checked").val()
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'accountNumberListing.php');
    }
</script>
</body>
</html>
