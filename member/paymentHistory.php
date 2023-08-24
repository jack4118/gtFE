<?php
include 'include/config.php';
include 'head.php';
?>

<body>

</body>

<?php include 'sharejs.php'; ?>

<script>
    $(document).ready(function() {
        var guestPhoneNumber = '<?php echo $_SESSION['guestPhoneNumber'] ?>';

        function callBackend() {
            var formData = {
                command: 'getSO_NO',
                id: '<?php echo $_SESSION['POST'][$postAryName]['fpx_sellerOrderNo'] ?>',

            };
            var fCallback = getsaleOrderNO;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function getsaleOrderNO(data, message) {
            so_no = data;
            redirectToOrderStatus();
        }

        function redirectToOrderStatus() {
            if (typeof so_no !== 'undefined' && so_no !== null && so_no !== '') {
                clearCart();
                removeCookie('redeemAmount');
                $.redirect('orderStatus', { SONO: so_no ,phone: guestPhoneNumber.substr(-4)}, 'GET');
            }
        }

        var so_no;

        callBackend();
    });

    // // $.redirect('orderStatus?SO=sfsdfdsf', {
    // //     id: '<?php echo $_SESSION['POST'][$postAryName]['fpx_sellerOrderNo'] ?>',
    // //     responseCode: '<?php echo $_SESSION['POST'][$postAryName]['fpx_debitAuthCode'] ?>',
    // //     fromFPX: 1,
    // // });
</script>



</html>