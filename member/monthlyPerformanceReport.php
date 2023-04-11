<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <span id=""></span><?php echo $translations['M03736'][$language]; /* Monthly Performance Report */?>
    </div>
    <!-- <div class="mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="whiteBg h-100">
                    <div data-lang="M03271" class="currentRankTitle font-weight-bold"><?php echo $translations['M03271'][$language]; /* Current Rank */?> </div>
                    <div class="mt-4 text-center">
                        <img class="currentRankImg" src="images/project/rank.png" alt="Personal Volume Point">
                        <div id="currentRank" class="mt-2 currentRankText"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4 mt-md-0">
                <div class="whiteBg h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-4">
                            <img class="walletImg" src="images/project/star-program.png">
                        </div>
                        <div class="col-md-8 mt-4 mt-md-0">
                            <div class="caPointLabel">
                                <?php echo $translations['M03512'][$language]; /* Current Total Sales */?>
                            </div>
                            <div id="currtotalSales" class="caPointNum"></div>
                            <div class="mt-4 caPointLabel">
                                <?php echo $translations['M03513'][$language]; /* Current Total PV */?>
                            </div>
                            <div id="buildProgressBar"></div>
                            <div id="currprogressPV" class="caPointNum"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="mt-4">
        <div class="yearSelWrap">
            <label for="yearSelWrap" class="btn btn-primary"><span class="mr-2" id="selYear">Year <?php echo date("Y") ?></span><i class="fas fa-chevron-down"></i></label>
            <input type="checkbox" id="yearSelWrap" class="hide">
            <div class="yearSelBox" id="yearSelection">
                <div class="yearSelOption" data-value="<?php echo date("Y") ?>">
                    Year <?php echo date("Y") ?>
                </div>
                <div class="yearSelOption" data-value="<?php echo date("Y")-1 ?>">
                    Year <?php echo date("Y")-1 ?>
                </div>
                <div class="yearSelOption" data-value="<?php echo date("Y")-2 ?>">
                    Year <?php echo date("Y")-2 ?>
                </div>
            </div>
        </div>
    </div> -->
    <div class="mt-4 whiteBg">
        <div id="starProgramDiv" class="row">
        </div>
    </div>
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

    var year = '';
    var creditType = "<?php echo $_POST['creditType']; ?>";
    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
    var divId    = 'transactionHistoryDiv';
    var tableId  = 'transactionHistoryTable';
    var pagerId  = 'pagerList';
    var btnArray = {};
    var thArray  = Array (
    '<?php echo $translations['M00389'][$language]; //Date ?>',
    '<?php echo $translations['M02069'][$language]; //Transaction Type ?>',
    '<?php echo $translations['M02070'][$language]; //To / From ?>',
    '<?php echo $translations['M02071'][$language]; //In ?>',
    '<?php echo $translations['M02072'][$language]; //Out ?>',
    '<?php echo $translations['M02073'][$language]; //Balance ?>'
    );

    $(document).ready(function() {
        year = $('.yearSelOption:first-child').attr('data-value');
        formData  = {
            command: 'getOwnMonthlyPerformanceReport'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('.yearSelOption').on('click', function() {
            year = $(this).attr('data-value');
            $('#selYear').text($(this).text());
            pagingCallBack(fCallback, year);
        });
    });

    function pagingCallBack(fCallback, year){
        $("#starProgramDiv").empty();
        if(pageNumber > 1) bypassLoading = 1;
        // var year = $('#yearSelection').find(":selected").val();
        var formData = {
            command             : "getOwnMonthlyPerformanceReport",
            year                : year
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        // var currentData = data.current;
        // $('#currentRank').html(currentData.rankDisplay||'-');
        // $("#currtotalSales").html('Rp ' + currentData.totalSales);
        // $("#currprogressPV").html(currentData.totalPV + '/' + currentData.pvLimit);
        // var percentagePV = currentData.totalPV;
        // var pxMaxPerc = currentData.pvLimit;
        // var buildProgressBar = `<progress id="file" value="${percentagePV}" max="${pxMaxPerc}" class="progressBarPV"></progress>`;
        // var buildProgressBar = `<div class="progress">
        //                           <div class="progress-bar" role="progressbar" style="width: ${percentagePV}%" aria-valuenow="${percentagePV}" aria-valuemin="0" aria-valuemax="300"></div>
        //                         </div>`;
        // $("#buildProgressBar").html(buildProgressBar);
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth()+1;
        var starProgramDivHTML = ``;
        var list = data.monthlyPerformanceList;
        var tableNo;

        if(list){
            $.each(list, function(k, v) {
                var blueTitle = 'starProgramTitle';
                var blueBox = 'starProgramContent';
                var percSymbol = '%';
                var totalSalesSymbol = 'Rp';
                if(v['totalSales'] == '-' ){
                    totalSalesSymbol = '';
                }

                if(v['perc'] == '-'){
                    percSymbol = '';
                }
                if(getMonthFromString(k) < currentMonth || year < "<?php echo date('Y') ?>"){
                    blueTitle = 'starProgramTitle1';
                    blueBox = 'awardContent';
                }
                if(getMonthFromString(k) <= currentMonth || year < "<?php echo date('Y') ?>" ) {
                        starProgramDivHTML += 
                    `
                    <div class="col-lg-4 col-md-12 p-4">
                        <div class="${blueTitle} px-4 py-3">
                            <p class="m-0 font-weight-bold">${k}</p>
                        </div>
                        <div class="${blueBox} p-4">
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light" data-lang="M03652"><?php echo $translations['M03652'][$language]; /* PVP */?>:</p>
                                <p class="pr-2 font-weight-bold">${numberThousand(v['pvp'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light" data-lang="M03737"><?php echo $translations['M03737'][$language]; /* DVP Left */?>:</p>
                                <p class="pr-2 font-weight-bold">${numberThousand(v['dvpLeft'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light" data-lang="M03738"><?php echo $translations['M03738'][$language]; /* DVP Right */?>:</p>
                                <p class="pr-2 font-weight-bold">${numberThousand(v['dvpRight'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light" data-lang="M03730"><?php echo $translations['M03730'][$language]; /* Numbers of Couple */?>:</p>
                                <p class="pr-2 font-weight-bold">${numberThousand(v['couples'],0)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light" data-lang="M03739"><?php echo $translations['M03739'][$language]; /* Number of New Recruits */?>:</p>
                                <p class="pr-2 font-weight-bold">${numberThousand(v['newRecruits'],0)}</p>
                            </div>
                        </div>
                    </div>
                    `;
                }
                else {
                    starProgramDivHTML += 
                    `
                    <div class="col-lg-4 col-md-12 p-4">
                        <div class="awardTitle2 px-4 py-3">
                            <p class="m-0 font-weight-bold">${k}</p>
                        </div>
                        <div class="awardContent2 p-4">
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light"><?php echo $translations['M02778'][$language]; /* Total Sales */?>:</p>
                                <p class="pr-2 font-weight-bold">${v['totalSales'] == "-"?v['totalSales']:numberThousand(v['totalSales'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light"><?php echo $translations['M03132'][$language]; /* Total PV */?>:</p>
                                <p class="pr-2 font-weight-bold">${v['totalPV'] == "-"?v['totalPV']:numberThousand(v['totalPV'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light"><?php echo $translations['M03514'][$language]; /* Rebate Percentage */?>:</p>
                                <p class="pr-2 font-weight-bold">${v['perc']}</p>
                            </div>
                        </div>
                    </div>
                    `;
                }
            });

        }
        $("#starProgramDiv").html(starProgramDivHTML);
    }

    function getMonthFromString(mon){
        return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
    }

</script>
