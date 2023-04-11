<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding" style="position: relative;">
    <!-- <div class="kt-container"> -->
        <div class="col-12 pageTitle">
            <?php echo $translations['M02972'][$language]; //Download ?>
        </div>
        <div id="downloadList" class="row mt-3">
            <!-- <div class="col-md-4 col-12 mb-3 d-flex flex-column">
                <div class="downloadDiv">
                    <div class="h-100 row">
                        <div class="col-12 downloadTitle">Hellohello123</div>
                        <div class="col-12"><div class="downloadHr"></div></div>
                        <div class="col-12 downloadContent">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Nunc neque orci, venenatis
                            fringilla orciet, eleifend sempur lacus.
                            Curabur id sem sit amet ipsum tristique
                        </div>
                        <div class="col-12">
                            <div class="row downloadFooter">
                                <div class="col-4">File Name:</div>
                                <div class="col-8 downloadFileName">as5t48js80akmc90wp2k4u8ifdow8qow8qe93jejufkehwyeiu</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 downloadBtn">Download</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-12 mt-4">
            <div class="row mt-4 px-4 alignMiddle" style="justify-content: space-between;">
                <div class="text-center">
                    <ul class="pagination pagination-md" id="pagerList"></ul>
                </div>
                <span id="paginateText" style="margin-bottom: 1rem;"></span>
            </div>
        </div>
        <!-- <div class="col-12 mt-4">
            <div id="totalPrincipleAmount" class="pull-in col-12 px-0">
            </div>
            <form>
                <div id="basicwizard" class="pull-in col-12 px-0">
                    <div class="tab-content b-0 m-b-0 p-t-0">
                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                        <div id="tableDiv" class="table-responsive"></div>
                        <span id="paginateText"></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="pagerList"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div> -->
    <!-- </div> -->
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>





<script>
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    var pagerId  = 'pagerList';
    /*var divId    = 'tableDiv';
    var tableId  = 'createTableID';
    var pagerId  = 'pagerList';
    var btnArray = {};

    var thArray  = Array(
        '<?php echo $translations['M00064'][$language]; //Subject ?>',
        '<?php echo $translations['M00065'][$language]; //Description ?>',
        '<?php echo $translations['M00541'][$language]; //File Name ?>',
        '<?php echo $translations['M00063'][$language]; //Download ?>'
    );*/

    $(document).ready(function() {
        var formData  = {
        	command: 'documentDownloadList'
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDefaultListing(data, message) {

        // console.log(data);
        var list = data.documentList;

        if (list) {

            var newList = [];
            var btn = [];

            $.each(list, function(k, v){
                $('#downloadList').append(`
                    <div class="col-md-4 col-12 mb-3 d-flex flex-column">
                        <div class="downloadDiv">
                            <div class="h-100 row">
                                <div class="col-12 downloadTitle">${v['subject']}</div>
                                <div class="col-12"><div class="downloadHr"></div></div>
                                <div class="col-12 downloadContent">
                                    ${v['description']}
                                </div>
                                <div class="col-12">
                                    <div class="row downloadFooter">
                                        <div class="col-4">File Name:</div>
                                        <div class="col-8 downloadFileName">${v['attachment_name']}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 downloadBtn" id="${v['id']}" onclick="createDownloadFile(this)"><?php echo $translations['M02972'][$language]; //Download ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                /*var createButton = '<button type="button" class="btn btn-primary" id="'+v["id"]+'" onclick="createDownloadFile(this)"><i class="fa fa-download"></i></button>';

                var rebuildData = {
                    subject : v['subject'],
                    description : v['description'],
                    fileName : v['attachment_name'],
                    download : createButton
                };

                newList.push(rebuildData);*/
            });

            /*var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

            $.each(btn, function(i, obj){
                if(obj.status == 1){
                    $("#"+tableId+" tbody tr").eq(i).find("td:last-child").html(`<a onclick="confirmDelete('${obj.id}')" class="btn waves-effect waves-light">Inactive</a>`);
                }
            });*/

            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        } else {
            $('#downloadList').append(`
                <div class="col-md-12 col-12 d-flex flex-column" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">
                    <div class="h-100 row justify-content-center mb-3">
                        <img src="images/project/no-results.png" width="80px">
                    </div>
                    <div class="h-100 row justify-content-center">
                        <div class="noResultTxt"><?php echo $translations['M02128'][$language]; //No Results Found ?></div>
                    </div>
                </div>
            `);
            /*$("#"+divId).empty();
            $("#paginateText").empty();
            $('#alertMsg').html(`
                <div class="row">
                    <div class="col-12 text-center">
                        ${buildTableHead(thArray)}
                        <div>
                            <i class="fa fa-align-justify noResultIcon"></i>
                            <span class="noResultTxt"><?php echo $translations["M00019"][$language] //No Results Found. ?></span>
                        </div>
                    </div>
                </div>
            `).show();*/
        }

    }

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var formData  = {
	        	command     : 'documentDownloadList',
	        	pageNumber  : pageNumber,
                inputData   : searchData
	        };
            if(!fCallback)
                fCallback = loadSearch;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'Search successful.'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function createDownloadFile(element) {
        var formData  = {
            command: 'documentDownload',
            documentID: element.id
        };

        $.redirect(url, formData);
    }
</script>
