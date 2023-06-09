<body>

</body>

<?php include 'sharejs.php'; ?>

</html>

<script>
    clearCart();
    removeCookie('oldToken')
    removeCookie('redeemAmount');
    $.redirect('viewReceipt', {
        fpx_sellerOrderNo: '<?php echo $_POST['fpx_sellerOrderNo'] ?>',
        fpx_debitAuthCode: '<?php echo $_POST['fpx_debitAuthCode'] ?>',
    });
</script>