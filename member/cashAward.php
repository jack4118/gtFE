<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <div class="pageTitle">
        <span id="creditType"></span><?php echo $translations['M03121'][$language]; /* MetaFiz Cash Award */?>
    </div>
    <div class="mt-4">
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
                            <img class="walletImg" src="images/project/cashAward.png" alt="Personal Volume Point">
                        </div>
                        <div class="col-md-8 mt-4 mt-md-0">
                            <div class="caPointLabel">
                                <?php echo $translations['M03269'][$language]; /* Personal Group Point */?>
                            </div>
                            <div id="pgp" class="caPointNum">
                            </div>
                            <div class="mt-4 caPointLabel">
                                <?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>
                            </div>
                            <div id="dvp" class="caPointNum">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="col-lg-8 col-md-12 p-0 mx-0 mt-4 row" style="background: white;">
                <div class="col-lg col-md-12 p-0">
                    <img class="mx-auto d-block walletImg" src="images/project/cashAward.png" alt="Personal Volume Point">
                </div>
                <div class="col-lg col-md-12">
                    <h5 class="pt-4 font-weight-light">
                        <?php echo $translations['M03269'][$language]; /* Personal Group Point */?>
                    </h5>
                    <h2 id="pgp">
                    </h2>
                    <h5 class="pt-4 mt-4 font-weight-light">
                        <?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>
                    </h5>
                    <h2 id="dvp">
                    </h2>
                </div>
            </div> -->
        </div>
    </div>
    <div class="mt-4">
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
            <!-- <select id="yearSelection" class="cashAwardSelect">
                <option value="2022">
                    Year 2022
                </option>
                <option value="2021">
                    Year 2021
                </option>
                <option value="2020">
                    Year 2020
                </option>
            </select> -->
        </div>
    </div>
    <div class="mt-4 whiteBg">
        <div id="awardDiv" class="row">
            <!-- <div class="col-lg-4 col-md-12 p-4">
                <div class="awardTitle p-4">
                    <p class="m-0 font-weight-bold">January</p>
                </div>
                <div class="awardContent p-4">
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?>:</p>
                        <p class="pr-2 font-weight-bold">100 PV</p>
                    </div>
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>:</p>
                        <p class="pr-2 font-weight-bold">250 PV</p>
                    </div>
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light">Rank Hit:</p>
                        <p class="pr-2 font-weight-bold"><?php echo $translations['M03272'][$language]; /* Fiz Entrepreneur */?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 p-4">
                <div class="awardTitle fancy p-4">
                    <p class="m-0 font-weight-bold">January</p>
                </div>
                <div class="awardContent  p-4">
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?>:</p>
                        <p class="pr-2 font-weight-bold">100 PV</p>
                    </div>
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>:</p>
                        <p class="pr-2 font-weight-bold">250 PV</p>
                    </div>
                    <div class="row justify-content-between">
                        <p class="pl-2 font-weight-light">Rank Hit:</p>
                        <p class="py-2 pl-2 pr-3 font-weight-bold fancyRank "><img class="crownImg" src="images/project/cashAwardCrown.png"><?php echo $translations['M03273'][$language]; /* Fiz Director */?></p>
                    </div>
                </div>
                <img src="images/project/fancyBG.png" class="p-4 fancyBG">
            </div> -->
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
            command: 'getCashAward'
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
        $("#awardDiv").empty();
        if(pageNumber > 1) bypassLoading = 1;
        // var year = $('#yearSelection').find(":selected").val();
        var formData = {
            command             : "getCashAward",
            year                : year
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        // console.log(data);
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth()+1;

        var awardDivHTML = ``;

        var list = data.dataList;
        var tableNo;

        if(list){
            $.each(list, function(k, v) {
                if(v['fancy'] == 1) {
                    awardDivHTML += 
                    `
                    <div class="col-lg-4 col-md-12 p-4">
                        <div class="awardTitle fancy px-4 py-3">
                            <p class="m-0 font-weight-bold">${k}</p>
                        </div>
                        <div class="awardContent p-4">
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?>:</p>
                                <p class="pr-2 font-weight-bold">${v['PGP'] == "-"?v['PGP']:numberThousand(v['PGP'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>:</p>
                                <p class="pr-2 font-weight-bold">${v['DVP'] == "-"?v['DVP']:numberThousand(v['DVP'],2)}</p>
                            </div>
                            <div class="row justify-content-between">
                                <p class="pl-2 font-weight-light">Rank Hit:</p>
                                <p class="py-2 pl-2 pr-3 font-weight-bold fancyRank "><img class="crownImg" src="images/project/cashAwardCrown.png">${v['rankDisplay']}</p>
                            </div>
                        </div>
                        <img src="images/project/fancyBG.png" class="p-4 fancyBG">
                    </div>
                    `;
                }
                else {
                    if(getMonthFromString(k) <= currentMonth || year < "<?php echo date('Y') ?>") {
                            awardDivHTML += 
                        `
                        <div class="col-lg-4 col-md-12 p-4">
                            <div class="awardTitle px-4 py-3">
                                <p class="m-0 font-weight-bold">${k}</p>
                            </div>
                            <div class="awardContent p-4">
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?>:</p>
                                    <p class="pr-2 font-weight-bold">${v['PGP'] == "-"?v['PGP']:numberThousand(v['PGP'],2)}</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>:</p>
                                    <p class="pr-2 font-weight-bold">${v['DVP'] == "-"?v['DVP']:numberThousand(v['DVP'],2)}</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light">Rank Hit:</p>
                                    <p class="pr-2 font-weight-bold">${v['rankDisplay']}</p>
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    else {
                        awardDivHTML += 
                        `
                        <div class="col-lg-4 col-md-12 p-4">
                            <div class="awardTitle2 px-4 py-3">
                                <p class="m-0 font-weight-bold">${k}</p>
                            </div>
                            <div class="awardContent2 p-4">
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light"><?php echo $translations['M03269'][$language]; /* Personal Group Point */?>:</p>
                                    <p class="pr-2 font-weight-bold">${v['PGP'] == "-"?v['PGP']:numberThousand(v['PGP'],2)}</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light"><?php echo $translations['M03270'][$language]; /* Downline Volume Point */?>:</p>
                                    <p class="pr-2 font-weight-bold">${v['DVP'] == "-"?v['DVP']:numberThousand(v['DVP'],2)}</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="pl-2 font-weight-light">Rank Hit:</p>
                                    <p class="pr-2 font-weight-bold">${v['rankDisplay']}</p>
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    
                }

            });

        }

        if(data.current){
            $('#currentRank').html(data.current.rankDisplay?data.current.rankDisplay:"-");
            $('#pgp').html(numberThousand(data.current.PGP,2) + " PV");
            $('#dvp').html(numberThousand(data.current.DVP,2) + " PV");
        }

        $("#awardDiv").html(awardDivHTML);
    }

    function getMonthFromString(mon){
        return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
    }

</script>
