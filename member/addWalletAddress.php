<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
        <div class="col-12 pageTitle">
            <span class="showLangCode" data-lang="M00468">
                <?php echo $translations['M00468'][$language]?>
            </span>
        </div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-lg-7 col-md-8 col-12">
	                <div class="">

	                	<div class="form-group row">
	                	    <label class="col-md-5 showLangCode" data-lang="M00970"><?php echo $translations['M00970'][$language]?></label>
                            <div class="col-md-7">
                                <select id="creditType" class="form-control">
                                </select>
                                <span id="creditTypeError" class="customError text-danger"></span>
                            </div>
	                	</div>

	                	<div class="form-group row">
	                	    <label class="col-md-5 showLangCode" data-lang="M00275"><?php echo $translations['M00275'][$language]?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="walletAddress" class="form-control" type="text">
                                <span id="walletAddressError" class="customError text-danger"></span>
                            </div>

	                	    
	                	</div>

	                	<div class="form-group row">
	                	    <label class="col-md-5 showLangCode" data-lang="M00279"><?php echo $translations['M00279'][$language]?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="retypeWalletAddress" class="form-control" type="text">
                                <span id="retypeWalletAddressError" class="customError text-danger"></span>
                            </div>

	                	    
	                	</div>

	                	<div class="form-group row">
	                	    <label class="col-md-5 showLangCode" data-lang="M00192"><?php echo $translations['M00192'][$language]?> <span class="mustFill">*</span></label>
                            <div class="col-md-7">
                                <input id="transactionPassword" class="form-control" type="password">
                                <span id="transactionPasswordError" class="customError text-danger"></span>
                            </div>
	                	</div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button id="nextBtn" type="button" class="btn btn-primary showLangCode" data-lang="M00034"><?php echo $translations['M00034'][$language]?></button>
                            </div>
                        </div>

	                </div>
	            </div>
            </div>
	    </div>

	    <div class="col-12">
	    	
	    </div>	
	</div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

	// Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var url            = 'scripts/reqDefault.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();

    $(document).ready(function() {

    	var formData = {
        	command   : 'getAvailableCreditWalletAddress'
        };
       
        var fCallback = buildCreditType;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

//add wallet address plugin here
    function showTagField() {
    	var cType = $("#creditType").val();
    	if( cType == 'ripple' || cType == 'eos') {
    		$("#tagWrapper").removeClass("hide");
    		var tagName = '';

    		switch (cType) {
    			case 'ripple' : tagName = 'XRP Tag'
    				break;
				case 'eos' : tagName = 'EOS Memo'
    				break;
				default : 
    		}

    		$("#tagDisplay").text(tagName);
    	}else {
    		$("#tagWrapper").addClass("hide");
    	}
    }

    $('#nextBtn').click(function() {

        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');

    	$("#creditTypeError").html("");
		$("#walletAddressError").html("");
		$("#retypeWalletAddressError").html("");
		$("#transactionPasswordError").html("");

    	var creditType =  $("#creditType").val();
		var walletAddress =  $("#walletAddress").val();
		var retypeWalletAddress =  $("#retypeWalletAddress").val();
		var transactionPassword = $("#transactionPassword").val();
		var tag = $("#tag").val();
		if (walletAddress != retypeWalletAddress) {
			$("#retypeWalletAddressError").html("<?php echo $translations['M01025'][$language]; /*wallet address not match*/ ?>");
			return;
		}

    	var formData = {
        	command   : 'addWalletAddress',
        	walletAddress	: walletAddress,
			creditType	: creditType,
			tag 	: tag,
			transactionPassword	: transactionPassword
        };
       
        var fCallback = addWalletAddressAction;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function addWalletAddressAction(data, message) {
    	showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; /* Congratulations */ ?>', 'edit', 'addWalletAddressListing.php');
    }


//listing plugin here
    $('#resetBtn').click(function() {
        $('#alertMsg').removeClass('alert-success').html('').hide();
        $("#creditTypeSelect").val("");
    });

    
    function buildCreditType (data, message){
    	console.log(data);
    	var html = "";
    	$.each(data.creditList, function(i, obj) {
    		// html+=`<option value="${obj.name}">${obj.translation_code}</option>`;
            html+=`<option value="${obj.value}">${obj.display}</option>`;
    	});
		$("#creditType").html(html);
    }

     function loadDefaultListing(data, message) {
        console.log(data);

        if (data.dataList) {

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
                    creditType : obj.credit_type,
                    status : obj.status,
                    action : "",
                };

                btn.push(btnList);
                newList.push(rebuildData);
            });

            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

            $.each(btn, function(i, obj){
                if(obj.status == 1){
                    $("#"+tableId+" tbody tr").eq(i).find("td:last-child").html(`<a onclick="confirmDelete('${obj.id}')" class="btn waves-effect waves-light">Inactive</a>`);
                }
            });

            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        } else {
            $("#"+divId).html('<div class="innerTableDefault"><i class="fa fa-file-text fa-5x" style="padding-top: 50px;" aria-hidden="true"></i><p><?php echo $translations["M01004"][$language] ?></p></div>');

            $("#paginateText").empty();
        }
        
    }

     function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html("<?php echo $translations['M00159'][$language]; /* Search successfully */ ?>").show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchWalletAddress';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getWalletAddressListing",
            pageNumber  : pageNumber,
            searchData  : searchData
        };
        // console.log(formData);
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

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