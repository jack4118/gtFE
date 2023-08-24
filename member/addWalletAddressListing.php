<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Portfolio", $_SESSION['blockedRights']['Subscription Portfolio'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
        <div class="col-12 pageTitle">
            <span class="showLangCode" data-lang="M00471">
                <?php echo $translations['M00471'][$language]; //Wallet Address Listing ?>
            </span>
        </div>
	    <div class="col-12">
	    	<form id="searchPortfolio" role="form" class="row mx-0">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group">
			        		<label class="registrationLabel showLangCode" data-lang="M00975"><?php echo $translations['M00975'][$language]; //Coin Type ?></label>
			        		<select id="creditTypeSelect" class="form-control inputDesign" dataName="creditType" dataType="select">
			        		</select>
			        	</div>
			        </div>
	    		</div>
			</form>
	    		<div class="col-12 px-0">
	    				<button id="searchPortfolioBtn" class="btn btn-primary" type="button" name="button">
                            <span class="showLangCode" data-lang="M00243">
                                <?php echo $translations['M00243'][$language] /*Search*/ ?>
                            </span>
                        </button>
	    				<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
	    		</div>

	    	
	    </div>

	   
	</div>
    <div class="kt-container pt-4">
        <div class="col-12">
            <form>
                <div id="basicwizard" class="pull-in col-12 px-0">
                    <div class="tab-content b-0 m-b-0 p-t-0">
                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                        <div id="portfolioListDiv" class="table-responsive"></div>
                        <span id="paginateText"></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="pagerList"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



<?php include 'footer.php'; ?>
</body>


<div id="selectedId" class="hide"></div>

<div class="modal fade" id="confirmInactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span id="canvasTitle" class="modal-title showLangCode" data-lang="M00075">
                    <?php echo $translations['M00075'][$language]; //Inactive Confirmation ?>
                </span> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M01660">
                        <?php echo $translations['M01660'][$language]; ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnDefaultModal" data-dismiss="modal">
                    <span class="showLangCode" data-lang="M00020">
                        <?php echo $translations['M00020'][$language]; //Close ?>
                    </span>
                </button>
                <button onclick="inactiveFunc()" type="button" class="btn btnThemeModal" data-dismiss="modal">
                    <span class="showLangCode" data-lang="M00086">
                        <?php echo $translations['M00086'][$language]; //Confirm ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

    var divId    = 'portfolioListDiv';
    var tableId  = 'portfolioListTable';
    var pagerId  = 'pagerList';
    var btnArray = {};
    var thArray  = Array(
        '<span class="showLangCode bottom" data-lang="M00058"><?php echo $translations['M00058'][$language]; ?></span>',
        '<span class="showLangCode bottom" data-lang="M00036"><?php echo $translations['M00036'][$language]; ?></span>',
        '<span class="showLangCode bottom" data-lang="M00275"><?php echo $translations['M00275'][$language]; ?></span>',
        '<span class="showLangCode bottom" data-lang="M00970"><?php echo $translations['M00970'][$language]; ?></span>',
        '<span class="showLangCode bottom" data-lang="M00011"><?php echo $translations['M00011'][$language]; ?></span>',
        ''
    );

    var method         = 'POST';
    var url            = 'scripts/reqDefault.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchPortfolioBtn").click();
            }
        });

        formData  = {
            command : "getWalletAddressListing"
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        formData = {
            command   : 'getAvailableCreditWalletAddress'
        };
       
        var fCallback = buildCreditType;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchPortfolio').find('input').each(function() {
                $(this).val('');
            });
            $('#searchPortfolio').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchPortfolioBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

    });

    function buildCreditType (data, message){
        var html = `<option value=""><?php echo $translations['M02000'][$language]; ?></option>`;
        $.each(data.creditList, function(i, obj) {
            // html+=`<option value="${obj.name}">${obj.translation_code}</option>`;
            html+=`<option value="${obj.value}">${obj.display}</option>`;
        });
        $("#creditTypeSelect").html(html);
    }

    function loadDefaultListing(data, message) {
        console.log(data);

        if (data.dataList && data.dataList.length > 0) {

            var newList = [];
            var btn = [];

            $.each(data.dataList, function(i, obj){

                var btnList = {
                    status: (obj.status == "Active" ? 1 : 0),
                    id: obj.id
                };

                var rebuildData = {
                    createAt : obj.created_at,
                    username : "<?php echo $_SESSION['username'] ?>",
                    walletAddress : obj.info,
                    creditType : obj.creditTypeDisplay,
                    status : obj.statusDisplay,
                    action : "",
                };

                btn.push(btnList);
                newList.push(rebuildData);
            });

            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

            $.each(btn, function(i, obj){
                if(obj.status == 1){
                    $("#"+tableId+" tbody tr").eq(i).find("td:last-child").html(`<button type="button" onclick="confirmDelete('${obj.id}')" class="btn btn-primary"><?php echo $translations['M00971'][$language]; //Inactive ?></button>`);
                }
            });

            $("#addWalletButton").removeClass("hide");
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        } else {
            $("#"+divId).empty();
            $("#paginateText").empty();
            $('#alertMsg').html(`
                <div class="row">
                    <div class="col-12 text-center">
                        ${buildTableHead(thArray)}
                        <div>
                            <i class="fa fa-align-justify noResultIcon"></i>
                            <span class="noResultTxt showLangCode" data-lang="M00019">
                                <?php echo $translations["M00019"][$language] //No Results Found. ?>
                            </span>
                        </div>
                    </div>
                </div>
            `).show();
        }
        
    }

    function tableBtnClick(btnId) {}

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html("<?php echo $translations['M00159'][$language]; /* Search successful */ ?>").show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchPortfolio';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getWalletAddressListing",
            usernameSearchType : "match",
            pageNumber  : pageNumber,
            searchData  : searchData
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'top',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'top',
        autoclose   : true
    });

    function confirmDelete(id) {
        $("#selectedId").val(id);
        $("#confirmInactiveModal").modal();
    }

    function inactiveFunc() {
        formData  = {
            command : "inactiveWalletAddress",
            addressID : $("#selectedId").val()
        };

        fCallback = loadInactive;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadInactive(data, message) {
        $("#confirmInactiveModal").modal('hide');
        showMessage(message, 'success', '<?php echo $translations['M00079'][$language]; /* update successful */ ?>', 'edit', 'addWalletAddressListing.php');
    }
</script>
