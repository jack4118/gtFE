<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Account Title -->
<section class="section myAccountBg">
    <div class="kt-container row">
        <div class="col-12 titleText larger bold text-white text-center text-md-left" data-lang="M03798"><?php echo $translations['M03798'][$language] /* My Account */ ?></div>
    </div>
</section>

<!-- My Account Content -->
<section class="section whiteBg">
    <div class="kt-container row mb-5 mb-md-0">
        <div class="col-lg-3 col-md-4 col-12">
            <!-- Menu -->
            <div class="borderAll grey normal greyBg">
                <div class="button borderBottom grey normal px-4 py-3" id="myProfileBtn">
                    <div><img src="images/project/profile-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="myAddressBtn">
                    <div><img src="images/project/home-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="paymentHistoryBtn">
                    <div><img src="images/project/payment-filled.png" width="12px" class="mr-3"><span class="bodyText smaller lightBold text-red" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Order History */ ?></span></div>
                </div>
                <div class="button px-4 py-3" id="changePasswordBtn">
                    <div><img src="images/project/pw-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M00580"><?php echo $translations['M00580'][$language] /* Change Password */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12 pt-5 pt-md-0">
            <!-- Payment History -->
            <div class="whiteBg borderAll grey normal p-4 p-md-5">
                <div class="bodyText larger bold mb-2" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Order History */ ?></div>
                <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
                <form class="mt-4">
                    <div id="basicwizard" class="pull-in col-12 px-0">
                        <div class="tab-content b-0 m-b-0 p-t-0">
                            <div id="alertMsg" class="text-center" style="display: block;"></div>
                            <div id="portfolioDiv" class="table-responsive"></div>
                            <span id="paginateText"></span>
                            <div class="text-center">
                                <ul class="pagination pagination-md" id="pagerList"></ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var fCallback       = '';
var viewQuotationBtn = "";
var viewDoBtn = "";

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array (
    '',
    '<span data-lang="M00903"><?php echo $translations['M00903'][$language] /* Order ID */ ?></span>',
    '<span data-lang="M04019"><?php echo $translations['M04019'][$language] /* Payment Date */ ?></span>',
    '<span data-lang="M01795"><?php echo $translations['M01795'][$language] /* Amount */ ?></span>',
    '<span data-lang="M02103"><?php echo $translations['M02103'][$language] /* Status */ ?></span>',
    '<span data-lang="M03928"><?php echo $translations['M03928'][$language] /* Order Status */ ?></span>',
    // '<span data-lang="M04020"><?php echo $translations['M04020'][$language] /* Invoice */ ?></span>',
    // '<span data-lang="M04021"><?php echo $translations['M04021'][$language] /* Delivery Order */ ?></span>',
    // '<span data-lang="M04065"><?php echo $translations['M04065'][$language] /* Repayment */ ?></span>',
    '<span data-lang="M04079"><?php echo $translations['M04079'][$language] /* Reorder */ ?></span>',

    //'<span data-lang="M00290"><?php echo $translations['M00290'][$language] /* Cancelled */ ?></span>',
);

    $(document).ready(function() {
        // getShoppingCart();
        
        pagingCallBack(pageNumber);

        $('#myProfileBtn').click(function() {
            $.redirect('profile');
        });

        $('#myAddressBtn').click(function() {
            $.redirect('myAddress');
        });

        $('#paymentHistoryBtn').click(function() {
            $.redirect('paymentListing');
        });

        $('#changePasswordBtn').click(function() {
            $.redirect('changePassword');
        });
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command             : "getPurchaseHistory",
            pageNumber          : pageNumber,
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var list = data;
        var tableNo;
        var htmlContent = "";

        if(list){
            var newList = [];
            $.each(list, function(k, v) {
                // var viewQuotationBtn = '';
                // var viewDoBtn = '';
                var viewOrderStatusBtn = '';
                var statusHtml = ``;
                var color = "";
                var viewType = '';
                var languageCode = '';

                switch(v['status']){
                    case "Draft":
                        languageCode = "<?php echo $translations['M04080'][$language] /* Draft */ ?>";
                        break;
                    case "Pending":
                        color = "#eec159";
                        break;
                    case "Payment Verified":
                        color = "#6ed15f";
                        break;
                    case "Pending Payment Approve":
                        languageCode = "<?php echo $translations['M04081'][$language] /* Pending Payment Approve */ ?>";
                        break;
                    case "Paid":
                        languageCode = "<?php echo $translations['M04082'][$language] /* Paid */ ?>";
                        color = "#6ed15f";
                        break;
                    case "Cancelled":
                        languageCode = "<?php echo $translations['M04084'][$language] /* Cancelled */ ?>";
                        color = "#ff554c";
                        break;
                    case "Failed":
                        languageCode = "<?php echo $translations['M04083'][$language] /* Failed */ ?>";
                        color = "#ff554c";
                        break;
                    case "Order Processing":
                        languageCode = "<?php echo $translations['M04085'][$language] /* Order Processing */ ?>";
                        break;
                    case "Packed":
                        languageCode = "<?php echo $translations['M04086'][$language] /* Packed */ ?>";
                        break;
                    case "Out For Delivery":
                        languageCode = "<?php echo $translations['M04087'][$language] /* Out For Delivery */ ?>";
                        break;
                    case "Delivered":
                        languageCode = "<?php echo $translations['M04088'][$language] /* Delivered */ ?>";
                        break;
                    default:
                }
                statusHtml = `<span style="color:${color}">${languageCode}</span>`

                // if(v['status'] == 'Paid' || v['status'] == 'Packed' || v['status'] == 'Out of Delivery' || v['status'] == 'Delivered') {
                //     viewQuotationBtn = `
                //         <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="viewQuotation(${v['id']}, )">
                //             <i class="fa fa-eye" aria-hidden="true"></i>
                //         </a>`;
                // }else{
                //     viewQuotationBtn='&ndash;';
                // }

                // if(v['status'] == 'Packed' || v['status'] == 'Out of Delivery' || v['status'] == 'Delivered') {
                //     viewDoBtn = `
                //         <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="viewDo(${v['id']})">
                //             <i class="fa fa-eye" aria-hidden="true"></i>
                //         </a>`;
                // }else{
                //     viewDoBtn='&ndash;';
                // }

                if(v['status'] != 'Cancelled') {
                    viewOrderStatusBtn = `
                        <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="viewOrderStatus('${v['so_no'].toString()}')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    `;
                }

                if(v['status'] == 'Failed') {
                    repayBtn = `
                        <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="repayQuotation(${v['id']}, )">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>`;
                }else{
                    repayBtn ='&ndash;';
                }

                if(v['status'] == 'Failed') {
                    cancelBtn = `
                        <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary red" onclick="cancelFunction(${v['id']}, )">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>`;
                }else{
                    cancelBtn ='&ndash;';
                }
                
                var rebuildData = {
                    btn             : '',
                    id 		        : '#' + v['so_no'],
                    payment_date  	: v['payment_date'],
                    purchase_amount : 'RM ' + numberThousand(v['purchase_amount'],2),
                    status  		: statusHtml,
                    // viewQuotationBtn: viewQuotationBtn,
                    // viewDoBtn: viewDoBtn,
                    viewOrderStatusBtn : viewOrderStatusBtn,
                    repayBtn: repayBtn,
                    // cancelBtn: cancelBtn,
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(5)').css('text-align', "center");
            $(this).find('td:eq(6)').css('text-align', "center");
        })

        $('#'+tableId+' th').css('text-transform', "uppercase");

        $('#'+tableId).DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "language": {
                "zeroRecords": "", 
                "emptyTable": ""
            },
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            buttons: [
            'colvis'
        ],
            columnDefs: [
                { className: 'control', orderable: false, targets: 0 },
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: 2 },
                { responsivePriority: 3, targets: 3 },
                // { responsivePriority: 4, targets: 4 },
                // { responsivePriority: 5, targets: 5 },
            ]
        });
    }

    // function viewQuotation(id) {
    //     $.redirect('viewInvoice', { id: id, viewType: "quotation" });
    // }

    function repayQuotation(id) {
        var formData = {
            command             : "updateGuestToken",
            id                  : id,
            bkend_token         : '<?php echo $_SESSION['bkend_token'] ?>'
        };
        fCallback = redirectRepay;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    // function viewDo(id) {
    //     $.redirect('viewInvoice', { id: id, viewType: "deliveryOrder" });
    // }

    function viewOrderStatus(so_no) {
        $.redirect('orderStatus', { SONO: so_no }, 'GET');
    }

    function cancelFunction(id) {

        showMessage("<?php echo $translations['M04066'][$language] /* Confirm Delete? */ ?>", 'warning', "<?php echo $translations['M04067'][$language] /* Delete Record */ ?>", '', '', ['<?php echo $translations['M00225'][$language] /* Confirm */ ?>']);
        $('#canvasConfirmBtn').click(function() {
            if(pageNumber > 1) bypassLoading = 1;

            var formData = {
                command             : "updateSOStatus",
                id                  : id,
                status              : "Cancelled",
                fromPage            : "paymentListing",

            };
            fCallback = redirectCancel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
       
    }

    function redirectCancel() {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'paymentListing.php');
    }

    function redirectRepay(data) {
        // $.redirect('checkoutAddress');
        // $.redirect('reviewOrder');
        $.redirect('reviewOrder', { guestToken : data });
    }



</script>
