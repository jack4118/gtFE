function beforeLogout() {
    var yes     = translations["M00056"][language]; /* Yes */
    var message = translations['M00611'][language] + '?'; /* Are you sure you want to logout */
    var title   = translations["M00612"][language]; /* Logout */
    var alert   = "Error";
    var canvasBtnArray = {
        'Yes' : yes
    };
    showMessage(message, 'warning', title, 'logout', '', canvasBtnArray);
    $('#canvasYesBtn').click(function() {
        window.localStorage.clear();

        $.ajax({
            type: 'POST',
            url: 'scripts/reqLogin.php',
            data: {type : "logout"},
            success	: function(result) {
                window.location.href = 'foodMenu'; 
            },
            error	: function(result) {
                alert(alert);
            }
        });
    });
}
