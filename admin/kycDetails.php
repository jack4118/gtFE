<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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

                    <div class="row" id="kycDetailsBlock">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <ul class="nav nav-tabs" id="appendTab">
                                        <li id="idTab">
                                            <a data-toggle="tab" class="displayTab">
                                                <span id="idVerify"></span>ID Verification
                                            </a>
                                        </li>
                                        <li id="bankTab" >
                                            <a data-toggle="tab" class="displayTab">
                                                <span id="bankVerify"></span>Bank Account
                                            </a>
                                        </li>
                                        <li id="npwpTab" >
                                            <a data-toggle="tab" class="displayTab">
                                                <span id="npwpVerify"></span>NPWP Verification
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="basicwizard">
                                        <div class="tab-content m-b-30 displayContent" id="IDWrap">
                                            <div id="idDetails" style="display: none">
                                                <div class="row m-t-15">
                                                     <label class="control-label col-md-2"><?php echo $translations["A00117"][$language];/*Full Name*/?> : </label>
                                                     <label id="idName" class="control-label col-md-10">-</label>
                                                 </div>
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2">ID Type : </label>
                                                     <label id="idType" class="control-label col-md-10">-</label>
                                                 </div>
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2">KPT No : </label>
                                                     <label id="idKPTNo" class="control-label col-md-10">-</label>
                                                 </div>
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2"><?php echo $translations["A00296"][$language];/*Address*/?> : </label>
                                                     <label id="idAddress" class="control-label col-md-10">-</label>
                                                 </div> 
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2"><?php echo $translations["A01443"][$language];/*Image*/?> : </label>
                                                     <div class="control-label col-md-10">
                                                         <div class="row">
                                                             <div class="col-md-4" id="frontImgBlock">
                                                                <a data-toggle="tooltip" href="javascript:;" onclick="viewIDImg()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>
                                                                 <img id="idImage" class="show" src="" width="80%">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div> 
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2"><?php echo $translations["A00318"][$language];/*Status*/?> : </label>
                                                     <div class="col-md-4 form-group">
                                                         <select id="idStatus" class=" form-control">
                                                             <option value="Waiting Approval">
                                                                 <?php echo $translations['A01019'][$language]; /* Waiting Approval */ ?>
                                                             </option>
                                                             <option value="Approved">
                                                                 <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                                             </option>
                                                             <option value="Rejected">
                                                                 <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                                             </option>
                                                         </select>
                                                     </div>
                                                 </div> 
                                                 <div class="row m-t-15">
                                                     <label class="control-label col-md-2"><?php echo $translations["A00571"][$language];/*Remark*/?> : </label>
                                                     <div class="col-md-4 form-group">
                                                         <input type="text" id="idRemark" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class="row mt-15">
                                                     <input type="hidden" id="idKYCID">
                                                 </div>
                                                 <div class="row m-t-30">
                                                     <a href="kycListing.php" class="btn btn-primary waves-effect waves-light">
                                                         <?php echo $translations["A00115"][$language]; /* Back */?>
                                                     </a>
                                                     <a href="javascript:;" id="idUpdatedBtn" class="updatedBtn btn btn-primary waves-effect waves-light" onclick="updatedBtn('ID');" style="width: 100px">
                                                         <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                     </a>
                                                 </div>
                                            </div>
                                            <div id="idNoRe" class="alert alert-info" style="display: none">
                                                <span>No Result Found</span>
                                            </div>
                                        </div>
                                        <div class="tab-content m-b-30 displayContent" id="bankWrap">
                                            <div id="bankDetails" style="display: none">
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2">Bank Name : </label>
                                                    <label id="bankName" class="control-label col-md-10"></label>
                                                </div>
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2">Bank Account No : </label>
                                                    <label id="bankNo" class="control-label col-md-10">-</label>
                                                </div>
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2">Bank Account Holder : </label>
                                                    <label id="bankHolder" class="control-label col-md-10">-</label>
                                                </div>
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A01443"][$language];/*Image*/?> : </label>
                                                    <div class="control-label col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4" id="frontImgBlock">
                                                               <a data-toggle="tooltip" href="javascript:;" onclick="viewImg()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>
                                                                <img id="bankImage" class="show" src="" width="80%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A00318"][$language];/*Status*/?> : </label>
                                                    <div class="col-md-4 form-group">
                                                        <select id="bankStatus" class=" form-control">
                                                            <option value="Waiting Approval">
                                                                <?php echo $translations['A01019'][$language]; /* Waiting Approval */ ?>
                                                            </option>
                                                            <option value="Approved">
                                                                <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                                            </option>
                                                            <option value="Rejected">
                                                                <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A00571"][$language];/*Remark*/?> : </label>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="bankRemark" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mt-15">
                                                    <input type="hidden" id="bankKYCID">
                                                </div>
                                                <div class="row m-t-30">
                                                    <a href="kycListing.php" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations["A00115"][$language]; /* Back */?>
                                                    </a>
                                                    <a href="javascript:;" onclick="updatedBtn('bank');" id="bankUpdatedBtn" class="updatedBtn btn btn-primary waves-effect waves-light">Submit</a>
                                                </div>
                                            </div>
                                            <div id="bankNoRe" class="alert alert-info" style="display: none">
                                                <span>No Result Found</span>
                                            </div>
                                        </div>
                                        <div class="tab-content m-b-30 displayContent" id="NPWPWrap">
                                            <div id="npwpDetails" style="display: none">
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A00117"][$language];/*Full Name*/?> : </label>
                                                    <label id="npwpName" class="control-label col-md-10"></label>
                                                </div>
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2">NPWP No : </label>
                                                    <label id="npwpNo" class="control-label col-md-10"></label>
                                                </div> 
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A01443"][$language];/*Image*/?> : </label>
                                                    <div class="control-label col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4" id="frontImgBlock">
                                                               <a data-toggle="tooltip" href="javascript:;" onclick="viewNPWPImg()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>
                                                                <img id="npwpImage" class="show" src="" width="80%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A00318"][$language];/*Status*/?> : </label>
                                                    <div class="col-md-4 form-group">
                                                        <select id="npwpStatus" class=" form-control">
                                                            <option value="Waiting Approval">
                                                                <?php echo $translations['A01019'][$language]; /* Waiting Approval */ ?>
                                                            </option>
                                                            <option value="Approved">
                                                                <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                                            </option>
                                                            <option value="Rejected">
                                                                <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="row m-t-15">
                                                    <label class="control-label col-md-2"><?php echo $translations["A00571"][$language];/*Remark*/?> : </label>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="npwpRemark" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mt-15">
                                                    <input type="hidden" id="npwpKYCID">
                                                </div>
                                                <div class="row m-t-30">
                                                    <a href="kycListing.php" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations["A00115"][$language]; /* Back */?>
                                                    </a>
                                                    <a href="javascript:;" onclick="updatedBtn('npwp');" id="npwpUpdatedBtn" type="button" class="btn btn-primary waves-effect waves-light updatedBtn">Submit</a>
                                                </div>
                                            </div>
                                            <div id="npwpNoRe" class="alert alert-info" style="display: none">
                                                <span>No Result Found</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <div class="modal fade" id="showImage" role="dialog">
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
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var clientID = '<?php echo $_POST['clientID']?>';
    var imgDataBank = '';
    var imgDataID = '';
    var imgDataNPWP = '';
    var tempMediaUrl = "<?php echo $config['tempMediaUrl']; ?>kyc/";
    var tabArr = ["ID Verification", "Bank Account Cover", "NPWP Verification"];
    var currentTab = null;

    $(document).ready(function(){
        formData  = {
            command    : 'getKYCDetails',
            clientID      : clientID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDefaultListing(data, message) {
        if(data){
            $.each(data, function (k,v){
                if(k == "Bank Account Cover"){
                    if(v['record'] == 1){
                        $("#bankDetails").show();
                        $("#bankNoRe").hide();
                        // $('#bankWrap').html(bankHtml);
                        $('#bankTab').show();
                        $('#bankName').text(v['Bank Name']);
                        $('#bankNo').text(v['Bank Account Number']);
                        $('#bankHolder').text(v['Bank Account Holder']);
                        imgDataBank = v['Image Name 1'];
                        $('#bankImage').attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+v['Image Name 1']);
                        $('#bankStatus').val(v['status']).prop('checked',true);
                        $('#bankRemark').val(v['remark']);
                        $('#bankKYCID').val(v['kycID']);
                        if(data[k]['status'] == "Waiting Approval"){
                            $('#bankUpdatedBtn').show();
                            $('#bankStatus').prop('disabled',false);
                            $('#bankRemark').prop('disabled',false);
                        }else{
                            $('#bankUpdatedBtn').hide();
                            $('#bankStatus').prop('disabled',true);
                            $('#bankRemark').prop('disabled',true);
                        }
                    }else{
                        // var bankHtml = `<span>No Result Found</span>`;
                        $("#bankDetails").hide();
                        $("#bankNoRe").show();
                    }
                    
                }else if(k == "ID Verification"){
                    if(v['record'] == 1){
                        $("#idDetails").show();
                        $("#idNoRe").hide();
                        $('#idName').text(v['Full Name']);
                        $('#idType').text(v['idType']);
                        $('#idKPTNo').text(v['Identity Number']);
                        $('#idAddress').text(v['Address']);
                        imgDataID = v['Image Name 1'];
                        $('#idImage').attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+v['Image Name 1']);
                        $('#idStatus').val(v['status']).prop('checked',true);
                        $('#idRemark').val(v['remark']);
                        $('#idKYCID').val(v['kycID']);
                        if(data[k]['status'] == "Waiting Approval"){
                            $('#idUpdatedBtn').show();
                            $('#idStatus').prop('disabled',false);
                            $('#idRemark').prop('disabled',false);
                        }else{
                            $('#idUpdatedBtn').hide();
                            $('#idStatus').prop('disabled',true);
                            $('#idRemark').prop('disabled',true);
                        }
                    }else{
                        // var idHTML = `<span>No Result Found</span>`;
                        $("#idDetails").hide();
                        $("#idNoRe").show();
                    }
                    // $('#IDWrap').html(idHTML);
                    

                }else if(k == "NPWP Verification"){ 
                    if(v['record'] == 1){
                        $("#npwpDetails").show();
                        $("#npwpNoRe").hide();
                        $('#npwpName').text(v['Full Name']);
                        $('#npwpNo').text(v['NPWP Number']);
                        imgDataNPWP = v['Image Name 1'];
                        $('#npwpImage').attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+v['Image Name 1']);
                        $('#npwpStatus').val(v['status']).prop('checked',true);
                        $('#npwpRemark').val(v['remark']);
                        $('#npwpKYCID').val(v['kycID'])
                        if(v['status'] == "Waiting Approval"){
                            $('#npwpUpdatedBtn').show();
                            $('#npwpStatus').prop('disabled',false);
                            $('#npwpRemark').prop('disabled',false);
                        }else{
                            $('#npwpUpdatedBtn').hide();
                            $('#npwpStatus').prop('disabled',true);
                            $('#npwpRemark').prop('disabled',true);
                        }    
                    }else{
                        // var npwpHtml = `<span>No Result Found</span>`;
                        $("#npwpDetails").hide();
                        $("#npwpNoRe").show();
                    }
                }

                if(currentTab) {
                    var checkData;
                    var tabNow;
                    var nextTab;
                    if(currentTab == "ID") {
                        tabNow = 0; 
                        nextTab = 1; 
                        checkData = tabArr[1];
                    }else if(currentTab == "bank"){
                        tabNow = 1; 
                        nextTab = 2; 
                        checkData = tabArr[2];
                    }else{
                        tabNow = 2; 
                        nextTab = 2; 
                        checkData = tabArr[2];
                    }

                    $('#appendTab li').removeClass("active");
                    $('#basicwizard .displayContent').removeClass('active'); 

                    if(data[checkData]['record'] == 1) {
                        $('#appendTab li').eq(nextTab).addClass('active');
                        $('#basicwizard .displayContent').eq(nextTab).addClass('active'); 
                    }else{
                        $('#appendTab li').eq(tabNow).addClass('active');
                        $('#basicwizard .displayContent').eq(tabNow).addClass('active'); 
                    }
                }else{
                    $('#appendTab li:first').addClass('active');
                    $('#basicwizard .displayContent:first').addClass('active'); 
                }
            });            
        }else{
             showMessage('No Result Found', 'warning', '', 'warning', 'kycListing.php');
        }
    }

    $(document).on("click",'.displayTab',function(){
        var index = $('.displayTab').index($(this));
        $(".displayTab").removeClass("active");
        $(this).addClass("active");
        $(".displayContent").removeClass("active");
        $(".displayContent").eq(index).addClass("active");
    });

    function viewImg() {
        $("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgDataBank);
        $("#showImage").modal();
    }

    function viewIDImg() {
        $("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgDataID);
        $("#showImage").modal();
    }

    function viewNPWPImg() {
        $("#modalImg").attr('src', '<?php echo $config['tempMediaUrl'] ?>kyc/'+imgDataNPWP);
        $("#showImage").modal();
    }
    function updatedBtn(currType){
        // var currType = currType;
        currentTab = currType;

        if(currType == 'bank'){
            var kycIDArr = [];
            var kycID = $('#bankKYCID').val();
            kycIDArr.push(kycID);
            var formData   = {
                command : 'updateKYC',
                kycIDAry : kycIDArr,
                status : $('#bankStatus').val(),
                remark : $('#bankRemark').val()
            };
            fCallback = updateCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }else if(currType == 'ID'){
            var kycIDArr = [];
            var kycID = $('#idKYCID').val();
            kycIDArr.push(kycID);
            var formData   = {
                command : 'updateKYC',
                kycIDAry : kycIDArr,
                status : $('#idStatus').val(),
                remark : $('#idRemark').val()
            };
            fCallback = updateCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }else if(currType == 'npwp'){
            var kycIDArr = [];
            var kycID = $('#npwpKYCID').val();
            kycIDArr.push(kycID);
            var formData   = {
                command : 'updateKYC',
                kycIDAry : kycIDArr,
                status : $('#npwpStatus').val(),
                remark : $('#npwpRemark').val()
            };
            fCallback = updateCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
    }
    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', "");
        // ['kycDetails.php', {clientID : clientID} ]
        formData  = {
            command    : 'getKYCDetails',
            clientID      : clientID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
</script>
</body>
</html>
