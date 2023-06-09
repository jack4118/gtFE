<script>
  var language = "<?php echo $language; ?>";
</script>

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
  var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
</script>

<!--begin:: Global Mandatory Vendors -->
<script src="vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="js/croppie.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->


<!-- Data Table -->
<script src="plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="js/datatables.js" type="text/javascript"></script>
<script type="text/javascript" src="plugins/datatable/datatables.js"></script>
<script type="text/javascript" src="plugins/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="plugins/datatable/responsive.bootstrap.min.js"></script>
<!-- Data Table -->


<!--begin:: Standard Platform js -->

<script src="js/jquery.redirect.js" type="text/javascript"></script>
<script src="js/standardJS/general.js?v=<?php echo filemtime('js/standardJS/general.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/logout.js?v=<?php echo filemtime('js/standardJS/logout.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/search.js?v=<?php echo filemtime('js/standardJS/search.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/table.js?v=<?php echo filemtime('js/standardJS/table.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/tree.js?v=<?php echo filemtime('js/standardJS/tree.js'); ?>" type="text/javascript"></script>
<script src="js/tomSelect.js?v=<?php echo filemtime('js/tomSelect.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/tomSelect.css?v=<?php echo time(); ?>">
<!--end:: Standard Platform js -->

<!--begin:: Global Optional Vendors -->
<script src="vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>
<script src="js/performanceMonitoring.js?v=<?php echo filemtime('js/performanceMonitoring.js'); ?>"  type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>



<script src="js/aos.js" type="text/javascript"></script>

<script src="js/qr_packed.js"></script>

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="js/vendors.min.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->
<script src="language/lang_<?php echo $language; ?>.js?v=<?php echo filemtime('language/lang_'.$language.'.js'); ?>"></script>

<script src="js/jquery.migrate.js" type="text/javascript"></script>
<script src="js/lightslider.js" type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>

<?php include "headerjs.php" ?>

<script type="text/javascript">
    var password = document.getElementById("passwordInput");
    var eyeOpened = document.getElementById("eyeOpen");
    var eyeClosed = document.getElementById("eyeClose");
    var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
    var userId = '<?php echo $_SESSION['userID'] ?>';

    $(document).ready(function() {
      var url             = 'scripts/reqLogin.php';
      var method          = 'POST';
      var debug           = 0;
      var bypassBlocking  = 0;
      var bypassLoading   = 0;
      var fCallback = "";

      //SIDEBAR
      var sidebarBG = document.getElementById("sidebarBG");
      var sidebar = document.getElementById("sidebar");
      var closeButton = document.getElementById("closeButton");

      var id        = "<?php echo $_POST['id']; ?>";
      var username  = "<?php echo $_POST['username']; ?>";

      if (id && username) {
          var formData  = {
              'command'   : 'memberLogin',
              'id'        : id,
              'loginType' : loginType,
              'username'  : username
          };

          validateLogin(formData);
      }

      // E-Catalogue Drop Down
      var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
      if(pageName == 'login.php' || pageName == 'publicRegistration.php'){
        return true;
      }
      if(pageName == 'homepage.php' || pageName == 'companyProfile.php' || pageName == 'productPortfolio.php' || pageName == 'productListing.php' || pageName == 'contactUs.php' || pageName == 'shoppingCart.php' || pageName == 'checkout.php' || pageName == 'checkoutStep2.php' || pageName == 'payment.php' || pageName == 'foodMenu.php' || pageName == 'foodDetails.php' || pageName == 'favourite' || pageName == '404') {
        var formData   = {
            command     : "getECatalogueList"
        };
        $.ajax({
            type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url      : 'scripts/reqDefault.php', // the url where we want to POST
            data     : formData, // our data object
            dataType : 'text', // what type of data do we expect back from the server
            encode   : true
        })
        .done(function(data) {
            var obj = JSON.parse(data);
            if(obj.status == "ok") {
              loadECatalogue(obj.data, obj.statusMsg);
            }
            else {
              if(obj.statusMsg != '')
              {
                  if(obj.data != null && obj.data.field)
                      showCustomErrorField(obj.data.field, obj.statusMsg);
                  else
                      errorHandler(obj.code, obj.statusMsg);
              }
            }
        });
      }

      // renderCartNo();

      $('.showDropdown').click(function(){
          $(".showDropdown").not(this).removeClass("open");
          if($(this).hasClass("open")){
            $(this).removeClass("open");
          }else{
            $(this).addClass("open");
          }
      });

      $('#dobForgotID').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
      });

      $('#dobForgotPwd').datepicker({
          autoclose: true,
          format: "dd/mm/yyyy"
      });

      // default login type
      var loginType = "email";

      $('.loginInput').keypress(function(e){
          if(e.which == 13){//Enter key pressed
              $('#loginBtn').click();//Trigger enter button click event
          }
      });

      $('#loginBtn').click(function(){
          var username = $('#usernameInput').val();
          var password = $('#passwordInput').val();
          var current_page = window.location.pathname;

          $("input").each(function(){
              $(this).removeClass('is-invalid');
              $('.invalid-feedback').html("");
          });

          //$('#secureCodeRefresh').parent().removeClass('inputError');
          showCanvas();

          var formData  = {
              'command'   : 'memberLogin',
              'username'  : username,
              'password'  : password,
              'loginType' : "phone",
              current_page
          };

          validateLogin(formData);
      });

      // $('#forgotBtn').click(function(){
      //     $('.modalPage1').css({"display":"none"});
      //     $('.modalPage2').css({"display":"block"});
      // });

      // $('.step2').click(function(){
      //     $('.modalPage1').css({"display":"block"});
      //     $('.modalPage2').css({"display":"none"});
      // });

      // $('#nextBtn').click(function(){
      //     $('.modalPage2').css({"display":"none"});
      //     $('.modalPage3').css({"display":"block"});
      // });

      // $('.step3').click(function(){
      //     $('.modalPage2').css({"display":"block"});
      //     $('.modalPage3').css({"display":"none"});
      // });

      $('#otpBtn').click(function(){
        if($('#forgotEmail').val()!="") {
          $('#forgotEmail').prop("disabled",true);
          $('#otpBtn').prop("disabled",true);
          $('#otpBtn').addClass("homepage_modal_disabled");
          $('#forgotEmail').addClass("homepage_modal_disabled");
          $('#forgotEmailDiv').addClass("homepage_modal_disabled");

          var timer = 180;
          var tempMin, tempSec;
          tempMin = timer/60;
          tempSec = timer%60;
          tempMin = Number(tempMin).toFixed(0);
          tempSec = Number(tempSec).toFixed(0);
          tempSec = (tempSec < 10) ? '0' + tempSec : tempSec;

          var timer2;
          timer2 = tempMin+":"+tempSec;
          $('#otpBtn').html(timer2);
          var interval = setInterval(function() {
              var timer = timer2.split(':');
              var minutes = parseInt(timer[0], 10);
              var seconds = parseInt(timer[1], 10);

              --seconds;

              minutes = (seconds < 0) ? --minutes : minutes;

              seconds = (seconds < 0) ? 59 : seconds;
              seconds = (seconds < 10) ? '0' + seconds : seconds;

              $('#otpBtn').html(minutes + ':' + seconds);
              // console.log($('#otpBtn').html())
              timer2 = minutes + ':' + seconds;

              if(timer2 === "0:00") {
                  clearInterval(interval);
                  $('#otpBtn').html("Send OTP");
                  $('#otpBtn').removeClass("homepage_modal_disabled");
                  $('#forgotEmail').removeClass("homepage_modal_disabled");
                  $('#forgotEmailDiv').removeClass("homepage_modal_disabled");
                  $('#otpBtn').prop("disabled",false);
                  $('#forgotEmail').prop("disabled",false);
              }
          }, 1000);

          // var interval = setInterval(function(){
          //     timer = timer - 1;
          //     $('#otpBtn').html(timer + " seconds");
          //     if(timer === 0) {
          //         clearInterval(interval);
          //         $('#otpBtn').html("Send OTP");
          //         $('#otpBtn').removeClass("homepage_modal_disabled");
          //         $('#forgotEmail').removeClass("homepage_modal_disabled");
          //         $('#forgotEmailDiv').removeClass("homepage_modal_disabled");
          //         $('#otpBtn').prop("disabled",false);
          //         $('#forgotEmail').prop("disabled",false);
          //     }
          // }, 1000);
          // var email = $('#forgotEmail').val()
          // var formData = {
          //     command             : "sendOTPCode",
          //     email               : email,
          //     type                : resetPassword,
          //     sendType            : email
          // };
          // fCallback = countdownTimer;
          // ajaxSend('scripts/reqDefault.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
      });


      $('.input-daterange input').each(function() {
          $(this).daterangepicker({
              singleDatePicker: true,
              timePicker: false,
              locale: {
                  format: 'DD/MM/YYYY'
              }
          });
          $(this).val('');
      });

      // $("#loginModal").on('hide.bs.modal', function(){
      //     $('.modalPage1').css({"display":"block"});
      //     $('.modalPage2').css({"display":"none"});
      //     $('.modalPage3').css({"display":"none"});

      //     $('#usernameInput').val("");
      //     $('#passwordInput').val("");
      //     $('#fullNameInput').val("");
      //     $('#ktpIDInput').val("");
      //     $('.input-daterange input').val("");
      //     $('#forgotEmail').val("");
      //     $('#forgotOTP').val("");
      //     $('#newPwd').val("");
      //     $('#retypeNewPwd').val("");
      //     hidePassword();
      //     $("#forgotID").prop("checked", true);
      //     $("input").each(function(){
      //         $(this).removeClass('is-invalid');
      //         $('.invalid-feedback').html("");
      //     });
      // });

      AOS.init();
      
      loadCoinRate();

      var orangeCount = 0;
      var blueCount = 1;
      var greenCount = 2;

      $(".sideBarItem").each(function(k){

        $(".sideBarItem").eq(orangeCount).addClass('orange').attr('btnColor','orange');
        $(".sideBarItem").eq(blueCount).addClass('blue').attr('btnColor','blue');
        $(".sideBarItem").eq(greenCount).addClass('green').attr('btnColor','green');

        $(".sideBarItem").eq(orangeCount).parent().find('.sideBarMenuDropdownItem').attr('btnColor','orange');
        $(".sideBarItem").eq(blueCount).parent().find('.sideBarMenuDropdownItem').attr('btnColor','blue');
        $(".sideBarItem").eq(greenCount).parent().find('.sideBarMenuDropdownItem').attr('btnColor','green');

        if (this.href == window.location.href){
          $(this).addClass('active');
          
          var currentColor = $(this).attr('btnColor');
          $(".btn.btn-primary").addClass(currentColor);
          $(".themeColor").addClass(currentColor);
          $(".form-control").addClass(currentColor);

          // if(currentColor == "blue"){
          //   $(".btn.btn-primary").css('background','#27a9e0');
          // }else if(currentColor == "green"){
          //   $(".btn.btn-primary").css('background','#8cbe44');
          // }
        }

        orangeCount = orangeCount +3;
        blueCount = blueCount +3;
        greenCount = greenCount +3;
      });

      $(".sideBarMenuDropdownItem").each(function(){
        if (this.href == window.location.href){
          $(this).addClass('active');

          $(this).parent().prev().addClass("active");
          $(this).parent().prev().addClass("open");

          var currentColor = $(this).attr('btnColor');
          $(".btn.btn-primary").addClass(currentColor);
          $(".themeColor").addClass(currentColor);
          $(".form-control").addClass(currentColor);

          // if(currentColor == "blue"){
          //   $(".btn.btn-primary").css('background','#27a9e0');
          // }else if(currentColor == "green"){
          //   $(".btn.btn-primary").css('background','#8cbe44');
          // }
        }
      });

      $(".menuActive").each(function(){
        if (this.href == window.location.href){
          $(this).addClass('active');
        }
      });

      $(".subMenuAddActive").each(function(){
        if (this.href == window.location.href){
          $(this).addClass('active');
        }
      });

      $(".subMenuAddActive.active").each(function(){
        if (this.href == window.location.href){
          $(this).parent().parent().parent().addClass('active');
        }
      });


      $(".subSubMenuAddActive").each(function(){
        if (this.href == window.location.href){
          $(this).addClass('active');
        }
      });

      $(".subSubMenuAddActive.active").each(function(){
        if (this.href == window.location.href){
          $(this).parent().parent().parent().parent().parent().parent().addClass('active');
        }
      });

      $(".sideBarDropdown").click(function(){
        $(".sideBarDropdown").not(this).removeClass("open");
        if($(this).hasClass("open")){
          $(this).removeClass("open");
        }else{
          $(this).addClass("open");
        }
      });

      $(".menuIcon, .sideBarScreen").click(function() {
        if($(".sideBar").hasClass("open")){
          $(".sideBar").removeClass("open");
          $(".sideBarScreen").hide();
        }else{
          $(".sideBar").addClass("open");
          $(".sideBarScreen").show();
        }
    });

        $(".changeLanguage").click(function(){
          changeLanguage($(this).attr("language"));

        });

        $(".loginPageChangeLanguage").change(function(){
          changeLanguage($(this).val());
        });

        if(pageName != 'wishlist.php' && userId) getNumberOfWishlistItems();

        <?php
        $sessionTimeOut = isset($_SESSION['sessionTimeOut'])?$_SESSION['sessionTimeOut']:time();
        $sessionExpireTime = isset($_SESSION['sessionExpireTime'])?$_SESSION['sessionExpireTime']:0;
        $decimalPlaces = isset($_SESSION['decimalPlaces'])?$_SESSION['decimalPlaces']:0;
        ?>

        window.ajaxEnabled = true;

        <?php
        $sessionID = isset($_SESSION["sessionID"])?:'';
        ?>

        var sessionID = "<?php echo $sessionID;?>";

        if(sessionID == '') {
          if((pageName == 'homepage.php') || (pageName == 'accessDenied.php') || (pageName == 'publicRegistration.php') || (pageName == 'publicRegistrationConfirmation.php') || (pageName == 'publicRegistrationSuccess.php') || (pageName == 'resetPassword.php') || (pageName == 'resetPasswordVerification.php') || (pageName == 'resetPasswordSuccess.php') || (pageName == 'landingPage.php') || (pageName == 'productListing.php') || (pageName == 'companyProfile.php') || (pageName == 'memberBenefits.php') || (pageName == 'productPortfolio.php') || (pageName == 'contactUs.php') || (pageName == 'productDetail.php') || (pageName == 'shoppingCart.php' || pageName == 'termsAndConditions.php' || pageName == 'viewInvoiceApp.php') || (pageName == 'payment.php') || (pageName == 'confirmOrder.php') || (pageName == 'checkoutAddress.php') || (pageName == 'reviewOrder.php') || (pageName == 'foodMenu.php') || (pageName == 'career.php')|| (pageName == 'foodDetails.php') || (pageName == 'careerDetail.php') || (pageName == 'viewInvoice.php') || (pageName == 'viewReceipt.php') || (pageName == 'wishlist.php'))
            return true;
        }  

        if(sessionID == '') {
          // No access token, thus don't allow to call backend
          window.ajaxEnabled = false;
          showMessage('You don’t have permission to access. Please try again later.', 'error', 'Access Denied', '', 'homepage.php');
          return true;
        }

          /*if(sessionID == '') {
            // No access token, thus don't allow to call backend
            window.ajaxEnabled = false;
            // localStorage.clear();
            return true;
          }*/
                
          /*formData  = {
              command : "getDocumentAnnouncementUnreadMessage",
              type : "announcementRead"
          };
          fCallback = listUnreadNews;
          ajaxSend("scripts/reqDefault.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);*/

          /*var getNewData  = {
              command   : "getInboxUnreadMessage"
            };
          $.ajax({
                      type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                      url      : 'scripts/reqDefault.php', // the url where we want to POST
                      data     : getNewData, // our data object
                      dataType : 'text', // what type of data do we expect back from the server
                      encode   : true
                  })
          .done(function(data) {
            var obj = JSON.parse(data);
            if (obj.data.inboxUnreadMessage) {
              $(".unreadMsg").show();
            } else {
               $(".unreadMsg").hide();
            }
          });*/

          
          // formData  = {
          //     command : "getNavBarDetails"
          // };
          // fCallback = getNavBarDetails;
          // ajaxSend("scripts/reqDefault.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);



          var currentTime = "<?php echo time();?>";
          var sessionTimeOut = "<?php echo $sessionTimeOut;?>";
          var sessionExpireTime = "<?php echo $sessionExpireTime;?>";

          setTimeout(function(){

            // clearCart();
            localStorage.removeItem('discountPercentage');
            localStorage.removeItem('kycStatus');

          //   $.ajax({
          //     type: 'POST',
          //     url: 'scripts/reqLogin.php',
          //     data: {type : "logout"},
          //     success : function(result) {
          //     },
          //     error : function(result) {
          //     }
          //   });
          //   errorHandler(3, '<?php echo $translations['M03304'][$language]; //Your session had timed out due to inactivity. ?>');
          //   window.ajaxEnabled = false;
          
          }, sessionExpireTime*1000);

          if((currentTime - sessionTimeOut) > sessionExpireTime) {

            // clearCart();
            localStorage.removeItem('discountPercentage');
            localStorage.removeItem('kycStatus');
            
            // $.ajax({
            //   type: 'POST',
            //   url: 'scripts/reqLogin.php',
            //   data: {type : "logout"},
            //   success	: function(result) {
            //   },
            //   error	: function(result) {
            //   }
            // });
            // errorHandler(3, '<?php echo $translations['M03304'][$language]; //Your session had timed out due to inactivity. ?>');
            // window.ajaxEnabled = false;
          }
          else {
            <?php $_SESSION["sessionTimeOut"] = time(); //Reset session ?>
          }

          getTs();

          if((pageName == 'dashboard.php') || (pageName == 'packageRegistration.php') || (pageName == 'repurchasePackage.php')){
            if ( $(window).width() >= 1200 ) {
              const slider = document.querySelector('.items');

              if(slider) {
                let isDown = false;
                let startX;
                let scrollLeft;
                slider.addEventListener('mousedown', (e) => {
                  isDown = true;
                  slider.classList.add('active');
                  startX = e.pageX - slider.offsetLeft;
                  scrollLeft = slider.scrollLeft;
                });
                slider.addEventListener('mouseleave', () => {
                  isDown = false;
                  slider.classList.remove('active');
                });
                slider.addEventListener('mouseup', () => {
                  isDown = false;
                  slider.classList.remove('active');
                });
                slider.addEventListener('mousemove', (e) => {
                    if(!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                    const walk = (x - startX) * 3; //scroll-fast
                    slider.scrollLeft = scrollLeft - walk;
                });
              }
            }
          }

        });

  
  function loadECatalogue(data, message) {
    if(data.documentList) {
      $.each(data.documentList, function(k, v) {
        $('.appendCatalogueDropDown').append(`
          <a href="javascript:;" onclick="displayECatalogue('${v['id']}')" class="btn menuDropdownBtn blackFont">${v['display']}</a>
          `);
      });
    }else{
      $('.appendCatalogueDropDown').append(`
        <a href="javascript:;" class="btn menuDropdownBtn blackFont" style="cursor: default;">${message}</a>
        `);
    }
  }

  function displayECatalogue(id) {
    var formData   = {
        command : "getECatalogue",
        id      : id
    };
    $.ajax({
        type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url      : 'scripts/reqDefault.php', // the url where we want to POST
        data     : formData, // our data object
        dataType : 'text', // what type of data do we expect back from the server
        encode   : true
    })
    .done(function(data) {
        var obj = JSON.parse(data);
        if(obj.status == "ok") {
          if(obj.data.documentDetail) {
            var currentLang = "<?php echo $language ?>";
            var win = "";
            var path = "<?php echo $config['tempMediaUrl'] ?>"
            if(obj.data.documentDetail[currentLang]) {
              path = path + obj.data.documentDetail[currentLang]['attachement_name'];
            } else {
              path = path + obj.data.documentDetail[Object.keys(obj.data.documentDetail)[0]]['attachement_name'];
            }
            win = window.open(path, '_blank');

            if(win) {
              win.focus();
            } else {
              alert('Please allow popups for this website');
            }
          }
        }
        else {
          if(obj.statusMsg != '')
          {
              if(obj.data != null && obj.data.field)
                  showCustomErrorField(obj.data.field, obj.statusMsg);
              else
                  errorHandler(obj.code, obj.statusMsg);
          }
        }
    });
  }

  // function getNavBarDetails(data, message) {
  //   var starterKitPurchased = data.starterKitPurchased;
  //   var placementExist = data.placementExist;

  //   localStorage.setItem('hasplacementPosition', data.placementExist)
    

  //   if(starterKitPurchased == 0){
  //     if(placementExist == 0){
  //       $("#placementPositionWrap").show();
  //     }
  //   }

  //   if(data.placementExist == 1){
  //     $("#hasPlacementPosition").show();
  //   }else{
  //     var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
  //     if(pageName == 'placementDiagram.php'){
  //       window.location.replace('dashboard')
  //     }
  //   }

  //   var cartNo = data.shpCartCount;

  //   if (cartNo > 0) {
  //       if (cartNo > 99) {
  //           $(".cartNo").html('...')
  //       } else {
  //           $(".cartNo").html(cartNo)
  //       }
  //       $(".cartNo").show()
  //   } else {
  //       $(".cartNo").hide() 
  //   }

    
  //   // getBackendCart()

  //   localStorage.setItem('discountPercentage', data.discountPercentage)

  //   getKYC(data.memberKycStatus)

  //   localStorage.setItem('starterKitPurchased', data.starterKitPurchased)

  //   // if (data.memberKycStatus == "New") {
  //   //   $('#noticeKYC').show();
  //   //   $('#kycMsg').html('<?php echo $translations['M00032'][$language]; //You haven't set KYC information. ?>');
  //   // } else if (data.memberKycStatus == "Waiting Approval") {
  //   //   $('#noticeKYC').show();
  //   //   $('#kycMsg').html('<?php echo $translations['M00041'][$language]; //Pending: Your KYC information are pending to be verified. ?>');
  //   // } else if (data.memberKycStatus == "Rejected") {
  //   //   $('#noticeKYC').show();
  //   //   $('#kycMsg').html('<?php echo $translations['M00042'][$language]; //Rejected: Your KYC information failed to be verified. ?>');
  //   // } else {
  //   //   $('#noticeKYC').hide();
  //   // }


  //   // if (data.walletAddressTab == 1) {
  //   //   $('.walletAddressDisplay').show();
  //   // } else {
  //   //   $('.walletAddressDisplay').hide();
  //   // }
    
  // }

  function listUnreadNews(data, message) {
    if (data) {
      if (data.unreadMessage > 0) {
        $(".unreadNews").show();
      }
    }
    
  }

	 function getTs(){
           var url = "scripts/reqDefault.php";
           var val  =  "";
           val  =  {"command" : "getTs"
                   };
           $.ajax({
              url: url,
              type: "POST",
              data: val,

              success: function(result){
               var json = JSON.parse(result);
               serverTimeZone = json.serverTimeZone;
               ts = json.currentTime;
               // console.log(ts);
               window.onload = display_ct(ts); // Display date time at the top nav bar
              },
          });
       }
       

      function display_c(){
          var refresh=1000; // Refresh rate in milli seconds
          mytime=setTimeout('display_ct()',refresh);
      }

      function display_ct() {
          var currentDT = "";

          var days = new Array('<?php echo $translations['M03405'][$language]; //Sunday ?>', '<?php echo $translations['M03406'][$language]; //Monday ?>', '<?php echo $translations['M03407'][$language]; //Tuesday ?>', '<?php echo $translations['M03408'][$language]; //Wednesday ?>', '<?php echo $translations['M03409'][$language]; //Thursday ?>', '<?php echo $translations['M03410'][$language]; //Friday ?>', '<?php echo $translations['M03411'][$language]; //Saturday ?>');
       

          var months = new Array("<?php echo $translations['M03412'][$language]; //January ?>", "<?php echo $translations['M03413'][$language]; //February ?>", "<?php echo $translations['M03414'][$language]; //March ?>", "<?php echo $translations['M03415'][$language]; //April ?>", "<?php echo $translations['M03416'][$language]; //May ?>", "<?php echo $translations['M03417'][$language]; //June ?>", "<?php echo $translations['M03418'][$language]; //July ?>", "<?php echo $translations['M03419'][$language]; //August ?>", "<?php echo $translations['M03420'][$language]; //September ?>", "<?php echo $translations['M03421'][$language]; //October ?>", "<?php echo $translations['M03422'][$language]; //November ?>", "<?php echo $translations['M03423'][$language]; //December ?>");

          var now = new Date();
          
          var tzDifference = now.getTimezoneOffset();
          var offsetTime = new Date(ts*1000 + tzDifference * 60 * 1000 + serverTimeZone*1000);
          
          var hour=offsetTime.getHours();
          var minute=offsetTime.getMinutes();
          var second=offsetTime.getSeconds();
          if(hour <10 ){hour='0'+hour;}
          if(minute <10 ) {minute='0' + minute; }
          if(second<10){second='0' + second;}

          currentDT += days[offsetTime.getDay()] + ", " + offsetTime.getDate() + " " + months[offsetTime.getMonth()] + " " + offsetTime.getFullYear() + " - " + hour +":" + minute + ":" + second;
          $('.currentTime').text(currentDT);
          ts++;
          tt=display_c();
      }

    function changeLanguage(language) {
      var url = 'scripts/reqLogin.php';
      var method = 'POST';
      var debug = 0;
      var bypassBlocking = 0;
      var bypassLoading = 0;
      var fCallback = reloadPage;
      var formData = {command: 'setLanguage', language : language};

      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function reloadPage() {
      location.reload();
    }

    function copyQR() {
      /* Get the text field */
      var copyText = document.getElementById("qrInput");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      // alert("Copied QR Link: " + copyText.value);
      $(".copiedMsg").show();
      setTimeout(function(){$(".copiedMsg").hide();},3000);
    }

    function loadCoinRate(){
      var url             = 'coinRateData/coinRate.xml';
      var method          = 'GET';
      var formData  = {};
      var leaderIDRate = $('#leaderIDRate').val();

      $.ajax({
        type : method,
        url : url,
        data : formData,
        dataType : 'xml',
        encode : true
      })
      .done(function(data){

        $(data).find('Data').each(function(){
              var coinRateName = $(this).find('name').text();
              var coinRateValue = $(this).find('value').text();


              if (coinRateName=="coalculus") {
                $(".coalCoinRate").text(currencyFormat(parseFloat(coinRateValue),3)+" COAL");
              }else if (coinRateName=="infireum") {
                $(".IFRCoinRate").text(currencyFormat(parseFloat(coinRateValue),3)+" IFR");
              }
        });

      });
    }

var text = "<?php echo $qrCodeRegistrationUrl; ?>"
$('#qrInput').val(text);
$('#qrcode').qrcode({

  render: "canvas",
  text: "<?php echo $qrCodeRegistrationUrl; ?>",
  width: 200,
  height: 200,
  background: "#ffffff",
  foreground: "#000000",
  src: '',
  imgWidth: 40,
  imgHeight: 40
});

var position = $(window).scrollTop(); // should start at 0
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll > position) {
    $('#kt_header_mobile').removeClass('header-mobile');
    $('#mobile_fix').removeClass('header-mobile');
    
  } else if ($(window).scrollTop() > 400 ) {
     $('#kt_header_mobile').addClass('header-mobile');
    $('#mobile_fix').addClass('header-mobile');
  }
  position = scroll;
});


function shareFacebook(id) {
  var getUrl = $("#"+id).val();

  window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(getUrl));
}
function shareTwitter(id) {
  var getUrl = $("#"+id).val();

  window.open("https://twitter.com/intent/tweet?url="+encodeURIComponent(getUrl)+"&text=Check out my registration url");
}

function shareWhatsapp(id) {
  var getUrl = $("#"+id).val();
  // window.location="whatsapp://send?text=Check out my registration url: "+encodeURIComponent(getUrl);
  window.open("https://api.whatsapp.com/send?text=Check out my registration url: "+encodeURIComponent(getUrl));
  
}

function shareWeibo(id) {
  var getUrl = $("#"+id).val();
  window.open("http://service.weibo.com/share/share.php?url="+encodeURIComponent(getUrl)+"&appkey=&title=Check out my registration URL: &pic=&ralateUid=&language=zh_cn");
}

function shareTelegram(id) {
  var getUrl = $("#"+id).val();
  window.open("https://t.me/share/url?text=Please check out my registration URL&url="+encodeURIComponent(getUrl));
}

function countdownTimer(data, message){
    $('#forgotEmail').prop("disabled",true);
    $('#otpBtn').prop("disabled",true);
    $('#otpBtn').addClass("homepage_modal_disabled");
    $('#forgotEmail').addClass("homepage_modal_disabled");
    $('#forgotEmailDiv').addClass("homepage_modal_disabled");

    var timer = data.resendOTPCountDown;
    var tempMin, tempSec;
    tempMin = timer/60;
    tempSec = timer%60;
    tempSec = (tempSec < 10) ? '0' + tempSec : tempSec;
    tempMin = Number(tempMin).toFixed(0);
    tempSec = Number(tempSec).toFixed(0);

    var timer2;
    timer2 = tempMin+":"+tempSec;
    // console.log(timer2)
    $('#otpBtn').html(timer2);
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);

        --seconds;

        minutes = (seconds < 0) ? --minutes : minutes;

        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        $('#otpBtn').html(minutes + ':' + seconds);
        // console.log($('#otpBtn').html())
        timer2 = minutes + ':' + seconds;

        if(timer2 === "0:00") {
            clearInterval(interval);
            $('#otpBtn').html("Send OTP");
            $('#otpBtn').removeClass("homepage_modal_disabled");
            $('#forgotEmail').removeClass("homepage_modal_disabled");
            $('#forgotEmailDiv').removeClass("homepage_modal_disabled");
            $('#otpBtn').prop("disabled",false);
            $('#forgotEmail').prop("disabled",false);
        }
    }, 1000);
}

function validateLogin(formData){
    startRecordTime("Login Performance");
        
    $.ajax({
        type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url      : 'scripts/reqLogin.php', // the url where we want to POST
        data     : formData, // our data object
        dataType : 'text', // what type of data do we expect back from the server
        encode   : true
    })
    .done(function(data) {
        var obj = JSON.parse(data);
        hideCanvas();
        if(obj.status == "ok") {

          window.ajaxEnabled = true;

          // to get user discount percentage upon login
          formData  = {
              command : "getNavBarDetails"
          };
          fCallback = getNavBarDetails;
          ajaxSend("scripts/reqDefault.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);

          //add cart(localStorage) to cart(DB) via API
          updateBackendCart()
          // getBackendCart()
        }
        else {
          removeCookie("PHPSESSID");
          if(obj.statusMsg != '')
          {
              if(obj.data != null && obj.data.field)
                  showCustomErrorField(obj.data.field, obj.statusMsg);
              else
                  errorHandler(obj.code, obj.statusMsg);
          }
        }
    });
}

function removeCookie(cookieName) {
    cookieValue = "";
    cookieLifetime = -1;
    var date = new Date();
    date.setTime(date.getTime()+(cookieLifetime*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    document.cookie = cookieName+"="+JSON.stringify(cookieValue)+expires+"; path=/";
}

function showSidebar(){        
    $('.mobileSidebar').addClass('open');
}

function hideSidebar(){        
    $('.mobileSidebar').removeClass('open');
}

function showModal(){
    $("#loginModal").modal("show");
}

function showForgotPwdModal(){
  $("#loginModal").modal("hide");
  $('#forgotPwdModal').modal('show');
}

function backToLogin(){
  $('#password').attr("id","password2")
  $('#forgotPwdModal').modal('hide');
  $("#loginModal").modal("show");
  $('#password1').attr("id","password")
}

function showPassword(){
    eyeOpened.style.display = "block";
    eyeClosed.style.display = "none";
    password.type = "text";
}

function hidePassword(){
    eyeOpened.style.display = "none";
    eyeClosed.style.display = "block";
    password.type = "password";
}

function getKYC(status){

  if (status != undefined) {
    localStorage.setItem('kycStatus', status)
  } else {
    var currentStatus = localStorage.getItem('kycStatus') || 0
    return parseInt(currentStatus)
  }

}

// Forgot ID / Password
$('#memberIDWrap .appendIDError').append('<span id="identityNumber"></span>');
$('#memberIDWrap .appendNameError').append('<span id="name"></span>');
$('#memberIDWrap .appendBODError').append('<span id="dateOfBirth"></span>');
$('.forgotRadio').change(function(){
  var forgotType = $('.forgotRadio:checked').val();

  if(forgotType == 'memberID'){
    $('#memberIDWrap').show();
    $('#pwdWrap').hide();
    $('#forgotNextBtn').html('<?php echo $translations['M03462'][$language]; //Find My ID ?>');
    $('.appendIDError').empty();    
    $('.appendNameError').empty();    
    $('.appendBODError').empty();    
    $('#memberIDWrap .appendIDError').append('<span id="identityNumber"></span>');
    $('#memberIDWrap .appendNameError').append('<span id="name"></span>');
    $('#memberIDWrap .appendBODError').append('<span id="dateOfBirth"></span>');
  }else{
    $('#memberIDWrap').hide();
    $('#pwdWrap').show();
    $('#forgotNextBtn').html('<?php echo $translations['M00024'][$language]; //Reset Password ?>');
    $('.appendIDError').empty();    
    $('.appendNameError').empty();    
    $('.appendBODError').empty(); 
    $('#pwdWrap .appendIDError').append('<span id="identityNumber"></span>');
    $('#pwdWrap .appendNameError').append('<span id="name"></span>');
    $('#pwdWrap .appendBODError').append('<span id="dateOfBirth"></span>');
  }
});

$('#idType').change(function(){
  var idType = $('#idType').val();
  if(idType == 'passport'){
    $('#IDInput').attr('placeholder','<?php echo $translations['M03461'][$language]; //ID Number(Passport) ?>');
  }else{
    $('#IDInput').attr('placeholder','<?php echo $translations['M03460'][$language]; //ID Number(KTP) ?>');
  }
});

$('#idTypePwd').change(function(){
  var idTypePwd = $('#idTypePwd').val();
  if(idTypePwd == 'passport'){
    $('#ktpPwdInput').attr('placeholder','<?php echo $translations['M03461'][$language]; //ID Number(Passport) ?>');
  }else{
    $('#ktpPwdInput').attr('placeholder','<?php echo $translations['M03460'][$language]; //ID Number(KTP) ?>');
  }
});

$('#forgotNextBtn').click(function(){
  $("input").each(function(){
      $(this).removeClass('is-invalid');
      $('.invalid-feedback').html("");
  });
  var forgotType = $('.forgotRadio:checked').val();
  if(forgotType == 'memberID'){
    var formData  = {
      command : "accountOwnerVerification",
      identityType : $('#idType option:selected').val(),
      identityNumber : $('#IDInput').val(),
      name : $('#idFullName').val()
      //dob : dateToTimestamp($('#dobForgotID').val())
    };
        
    fCallback = successFindID;
    ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  }else{
    var formData  = {
      command : "memberResetPasswordVerification",
      identityType : $('#idTypePwd option:selected').val(),
      identityNumber : $('#ktpPwdInput').val(),
      name : $('#pwdFullName').val(),
      //dob : dateToTimestamp($('#dobForgotPwd').val()),
      phone : $('#pwdFullNameInp').val(),
      step : '2',
      verificationCode : $('#verificationCode').val()
    }; 

    fCallback = successVerifyPwd;
    ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
  }
});

$('#sendCodeForgotPwd').click(function(){
  $(".invalid-feedback").remove();

  var formData  = {
    command : "memberResetPasswordVerification",
    //identityType : $('#idTypePwd option:selected').val(),
    //identityNumber : $('#ktpPwdInput').val(),
    //name : $('#pwdFullName').val(),
    //dob : dateToTimestamp($('#dobForgotPwd').val()),
    phone : $('#pwdFullNameInp').val()
  };
      
  fCallback = otpCallbackForgotPwd;
  ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

function otpCallbackForgotPwd(data, message) {
  $('#idTypePwd, #ktpPwdInput, #pwdFullName, #dobForgotPwd, #pwdFullNameInp').attr('disabled',true);
  $('.forgotRadio').attr('disabled',true);
  if(data.remainingTime) {
    var second = data.remainingTime;

    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);

    var leftTime = `${minutes==0?"":minutes + "m"} ${seconds}s.`;


    countDownForgotPwd('#sendCodeForgotPwd', second);
    showMessage(`${message.replace(".", leftTime)}`, "warning", "<?php echo $translations['E00730'][$language]; /* Error */ ?>", "warning");
  }else{
    countDownForgotPwd('#sendCodeForgotPwd', data.resendOTPCountDown);
    showMessage(message, "success", "<?php echo $translations['M03456'][$language]; /* Send OTP Code */ ?>", "success");
  }
}

function countDownForgotPwd(id, second){
  var minutes = Math.floor(second/60);
  var seconds = second - (minutes*60);

  if(minutes == 0 && seconds == 0){
    $('#sendCodeForgotPwd').show();
    $('#timerForgotPwd').hide();
    return;
  }else if(minutes == 0 && seconds != 0){
    $('#sendCodeForgotPwd').hide();
    // $('#sendCode').show();
    $('#timerForgotPwd span').empty().append(seconds+"s");
    setTimeout('countDownForgotPwd(sendCodeForgotPwd,'+(second-1)+')',1000);
  }else{
    $('#sendCodeForgotPwd').hide();
    $('#timerForgotPwd').show();
    $('#timerForgotPwd span').empty().append(minutes+"m"+" "+seconds+"s");
    setTimeout('countDownForgotPwd(sendCodeForgotPwd,'+(second-1)+')',1000);
  }
}

function successFindID(data,message){
  $('#forgotPwdModal').modal('hide');
  showMessage('<?php echo $translations['M02655'][$language]; //email ?> : ' + data.email +'<br>'+ '<?php echo $translations['M00548'][$language]; //member id ?> : ' + data.loginID , 'success', '<?php echo $translations['M02651'][$language]; //Congratulation ?>', 'success', 'homepage.php');
}

function successVerifyPwd(data,message){
  $('#verificationCode').attr('disabled',true);
  $('#forgotNextBtn').hide();
  $('#pwdInp, #retypePassword').parent().show()
  $('#updatedPwd').show();
  $('#password').attr("id","password1");
  $('#password2').attr("id","password");
  $('#updatedPwd').click(function(){
    $('.invalid-feedback').remove();
    var formData  = {
      command : "memberResetPassword",
      //identityType : $('#idTypePwd option:selected').val(),
      //identityNumber : $('#ktpPwdInput').val(),
      //name : $('#pwdFullName').val(),
      //dob : dateToTimestamp($('#dobForgotPwd').val()),
      phone : $('#pwdFullNameInp').val(),
      verificationCode : $('#verificationCode').val(),
      password : $('#pwdInp').val(),
      retypePassword : $('#retypePassword').val()
    };
    fCallback = successResetPwd;
    ajaxSend("scripts/reqDefault.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  });
}

function successResetPwd(data,message){
  $('#forgotPwdModal').modal('hide');
  showMessage(message , 'success', '<?php echo $translations['M02651'][$language]; //Congratulation ?>', 'success', 'homepage.php');
}

function deliveryModal(data,message) {
  showMessage('<img src="images/project/delivery-english.jpg" class="img-fluid">', '', '', 'edit', '');

  $(".modal-content i").css("display","none");
  $("#canvasTitle").css("display","none");
  $(".modal-header").css("padding","0px 20px");
  $(".modal-body").css("padding-top","0px");
  $(".modal-footer").css("padding-bottom","20px");
}

function getNumberOfWishlistItems() {
  var formData  = {
      command : "getWishList",
  };

  showCanvas();
  $.ajax({
      type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url      : 'scripts/reqDefault.php', // the url where we want to POST
      data     : formData, // our data object
      dataType : 'text', // what type of data do we expect back from the server
      encode   : true
  })
  .done(function(data) {
      hideCanvas();
      var obj = JSON.parse(data);
      if(obj.status == "ok") {
        loadNumberOfWishlistItems(obj.data, obj.statusMsg);
      }
      else {
        if(obj.statusMsg != '')
        {
            if(obj.data != null && obj.data.field)
                showCustomErrorField(obj.data.field, obj.statusMsg);
            else
                errorHandler(obj.code, obj.statusMsg);
        }
      }
  });
}

function loadNumberOfWishlistItems(data, message) {
  var html = '';

  html += `
      <img src="images/project/love-icon.png" width="20px">
      <div class="numOfWislistItems">0</div>
  `;

  $('.wishlistIcon').html(html);

  var numberOfWishlistItems = data.length;
  if(numberOfWishlistItems > 0) $('.numOfWislistItems').html(numberOfWishlistItems);
}

function getWishlist() {
    var formData = {
        command         : 'getWishList',
    };
    var fCallback = loadWishlist;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadWishlist(data, message) {
    var list = data;

    var numberHtml = '';

    numberHtml += `
        <img src="images/project/love-icon.png" width="20px">
        <div class="numOfWislistItems">0</div>
    `;

    $('.wishlistIcon').html(numberHtml);

    if(list && list.length > 0) {
        var numberOfWishlistItems = list.length;
        if(numberOfWishlistItems > 0) $('.numOfWislistItems').html(numberOfWishlistItems);

        var html = '';
        $.each(list, function(k, v) {
            html += `
                <div class="borderAll grey normal p-4 mb-4">
                    <div class="row align-items-center">
                        <div class="col-1 text-center">
                            <a href="javascript:;" onclick="showRemoveConfirmationModal(${v['id']})"><img src="images/project/delete-icon2.png" alt=""></a>
                        </div>
                        <div class="col-9 d-flex align-items-center">
                            <div>
                                <img class="wishlistImg" src="${v['url']}">
                            </div>
                            <div class="ml-4">
                                <div class="bodyText smaller lightBold">
                                    ${v['name']}
                                </div>
                                <div class="bodyText smaller">${v['sale_price']}</div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary grey w-100 px-4 py-3 wishlistOutOfStockBtn" id="wishlistOutOfStockBtn${v['id']}">
                                <div class="bodyText smaller text-white" data-lang="M03005"><?php echo $translations['M03005'][$language] /*Out of Stock */ ?></div>
                            </button>
                            <button type="button" class="btn btn-primary w-100 px-4 py-3 wishlistAddToCartBtn" id="wishlistAddToCartBtn${v['id']}">
                                <div class="bodyText smaller text-white" data-lang="M03878"><?php echo $translations['M03878'][$language] /* Add To Cart */ ?></div>
                            </button>
                        </div>
                    </div>
                </div>
            `
        });

        $('#wishlist').html(html);
    } else {
        var html = `
            <div class="borderAll grey normal p-4">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <div class="bodyText smaller lightBold" data-lang="M03803"><?php echo $translations['M03803'][$language] /* No records found */ ?></div>
                        </div>
                    </div>
                </div>
        `;

        $('#wishlist').html(html);
    }
}

function addItemToWishlist(id) {
  var formData = {
    command         : 'addWishList',
    product_id      : id ? id : selectedId,
    action          : 'add'
  };
  var fCallback = successAddItemToWishlist;
  ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successAddItemToWishlist(data, message) {
  var redirect = '';

  if(pageName == 'foodDetails.php') getNumberOfWishlistItems();
  else if(pageName == 'wishlist.php') redirect = 'wishlist';

  showMessage(message, 'success', '<?php echo $translations['M02544'][$language] /* Success */ ?>', 'success', redirect);
  
}

function showRemoveConfirmationModal(id) {
  selectedId = id;
  $('#removeConfirmationModal').modal();
}

function removeItemFromWishlist() {
  var formData = {
      command         : 'addWishList',
      product_id      : selectedId,
      action          : 'remove'
  };
  var fCallback = successRemoveItemFromWishlist;
  ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function successRemoveItemFromWishlist(data, message) {
  showMessage(message, 'success', '<?php echo $translations['M02544'][$language] /* Success */ ?>', 'success', 'wishlist');
}

</script>


<?php include "cartjs.php" ?>
