<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <!-- <div class="col-12 pageTitle">
        <?php echo $translations['M00307'][$language]; //Inbox ?>
    </div> -->
    <!-- <div id="inboxList" class="row mt-3"> -->
        <!-- <div class="col-md-4 col-12 mb-3 d-flex flex-column">
            <div class="inboxDiv">
                <div class="h-100 row">
                    <div class="col-12 inboxTitle">Title Here</div>
                    <div class="col-12"><div class="inboxHr"></div></div>
                    <div class="col-12 inboxContent">
                        Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Nunc neque orci, venenatis
                        fringilla orciet, eleifend sempur lacus.
                        Curabur id sem sit amet ipsum tristique
                    </div>
                    <div class="col-12">
                        <div class="row mx-0 justify-content-between inboxFooter">
                            <span>Director123</span>
                            <span>12.15PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </div> -->

    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <button class="kt-app__aside-close" id="kt_chat_aside_close">
            <i class="la la-close"></i>
        </button>
        <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside" style="opacity: 1;">
            <div class="kt-portlet kt-portlet--last" style="background: #fafafa; border-radius: 0!important; min-height: 100%;">
                <div class="kt-portlet__body inboxList">
                    <div class="kt-widget kt-widget--users">
                        <div class="kt-widget__item inboxChatListTop">
                            <span class="pageTitle" style="margin-right: 10px"><?php echo $translations['M00307'][$language]; //Inbox ?></span>
                            <span>(<span id="numMessages">0</span> <?php echo $translations['M03516'][$language]; //messages ?>)</span>
                        </div>
                        <div class="kt-scroll ps ps--active-y scrolbarColor" style="max-height: 500px;overflow: auto!important;">
                            <div class="kt-widget__items kt-scroll ps ps--active-y" id="inboxList"></div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content" style="margin-left: 0;">
            <div class="kt-chat" style="height:100%;">
                <div class="kt-portlet kt-portlet--head-lg kt-portlet--last" style="background: #fafafa; border-radius: 0!important; height:100%;">
                    <div class="kt-portlet__head" style="flex-grow: 0!important;">
                        <div class="kt-chat__head ">
                            <div>
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop" id="kt_chat_aside_mobile_toggle">
                                    <i class="flaticon2-open-text-book"></i>
                                </button>
                            </div>

                            <div class="kt-chat__center text-left">
                                <div class="kt-chat__label">
                                    <span class="kt-chat__title" id="titleName"></span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body" style="overflow-y: auto; max-height: 300px;">
                        <div id="inboxDIV" class="kt-scroll kt-scroll--pull ps ps--active-y" data-mobile-height="300" style="min-height: 250px; overflow-y: auto;">
                            <div class="kt-chat__messages" id="inboxMessages"></div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot" id="replyDiv" style="margin: 20px; background-color: #fff; border-radius: 5px; border-top: none; display:none;">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea style="color: #000" rows="3" placeholder="<?php echo $translations['M02606'][$language]; //Type a message... ?>..." id="inputMessage"></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a id="button"><i class="flaticon2-photograph"></i></a>
                                    <input type='file' id="upload" accept="image/*" style="display: none;" />
                                    <div class="squareImage-modal-body border-b" align="center">
                                        <input id="trID" type="hidden" name="" value="">
                                        <input id="imgData" type="hidden" name="" value="">
                                        <input id="imgName" type="hidden" name="" value="">
                                        <input id="imgSize" type="hidden" name="" value="">
                                        <input id="imgType" type="hidden" name="" value="">
                                    </div>
                                </div>
                                <div class="kt_chat__actions">
                                    <!-- <button type="button" id="btnSend" value="" class="btn btn-primary" onclick="sendMessage(this)"><?php echo $translations['M00152'][$language]; //Reply ?></button> -->
                                    <button type="button" id="btnSend" value="" class="btn btn-primary" style="background-color: transparent; padding: 0;" onclick="sendMessage(this)">
                                        <img src="/images/project/send.png" alt="<?php echo $translations['M00311'][$language]; //Send Message ?>" style="width: 40px; height: 40px;">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>


<script>
    "use strict";
// Class definition
var KTAppChat = function () {
    var chatAsideEl;
    var chatContentEl;

// Private functions
var initAside = function () {
// Mobile offcanvas for mobile mode
var offcanvas = new KTOffcanvas(chatAsideEl, {
    overlay: true,
    baseClass: 'kt-app__aside',
    closeBy: 'kt_chat_aside_close',
    toggleBy: 'kt_chat_aside_mobile_toggle'
});

}

return {
// public functions
init: function() {
// elements
chatAsideEl = KTUtil.getByID('kt_chat_aside');

// init aside and user list
initAside();

// init inline chat example
KTChat.setup(KTUtil.getByID('kt_chat_content'));
}
};
}();

KTUtil.ready(function() {
    KTAppChat.init();
});


// Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;

    var id;
    var tempMediaUrl    = "<?php echo $config['tempMediaUrl']; ?>";
    var uploadImage     = [];
    var uploadImageData = [];

    $(document).ready(function(){
      var formData  = {
        command: 'getInboxListing'
      };
      var fCallback = loadDefaultListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

      $('#button').click(function () {
        $("input[type='file']").trigger('click');
      })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageInboxSend').attr('src', e.target.result);
                    $("#imgData").empty().val(reader["result"]);
                    $("#imgName").empty().val(input.files[0]["name"]);
                    $("#imgSize").empty().val(input.files[0]["size"]);
                    $("#imgType").empty().val(input.files[0]["type"]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#upload").change(function(){
            readURL(this);
        });
    });

    function loadDefaultListing(data, message, object)
    {
        /*var inboxList = data.inboxListing;
        if(inboxList) {
            $.each(inboxList, function(k, v) {
                $('#inboxList').append(`
                    <div class="col-md-4 col-12 mb-3 d-flex flex-column">
                        <div class="inboxDiv">
                            <div class="h-100 row">
                                <div class="col-12 inboxTitle">${v['subject']}</div>
                                <div class="col-12"><div class="inboxHr"></div></div>
                                <div class="col-12 inboxContent">
                                    ${v['lastMessage']}
                                </div>
                                <div class="col-12">
                                    <div class="row mx-0 justify-content-between inboxFooter">
                                        <span>${v['lastSender']}</span>
                                        <span>${v['time_different']}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });
        } else {
            $('#inboxList').append(`
                <div class="col-md-12 col-12 d-flex flex-column" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">
                    <div class="h-100 row justify-content-center mb-3">
                        <img src="images/project/no-results.png" width="80px">
                    </div>
                    <div class="h-100 row justify-content-center">
                        <div class="noResultTxt"><?php echo $translations['M02128'][$language]; //No Results Found ?></div>
                    </div>
                </div>
            `);
        }*/


      $(".inboxNotification").hide();

      var inboxList = data.inboxListing;
      var message = object.statusMsg;
      var inboxListDetails = '';
      var totalUnreadMessage = 0;
      if(inboxList)
      {
        $.each(inboxList, function(key,value){

          inboxListDetails+='<a class="kt-widget__item inboxChatList" style="cursor: pointer;" id="'+value['id']+'" name="'+value['subject']+'" onclick="inboxClick(this)">';
          inboxListDetails+='   <div class="kt-widget__info">';
          inboxListDetails+='     <div class="kt-widget__section">';
          inboxListDetails+='       <span class="kt-widget__username" style="color: #000">'+value['subject']+'</span>';
          inboxListDetails+='     </div>';
          inboxListDetails+='     <span class="kt-widget__desc" style="font-weight: normal;">';
          if (value['lastMessage'] == "") {
          inboxListDetails+='';
          }else{
            // inboxListDetails+=         value['lastMessage']+' <?php echo $translations['M00154'][$language]; ?> '+value['lastSender'];
            inboxListDetails+=         value['lastMessage'];
          }
          inboxListDetails+='     </span>';
          inboxListDetails+='    </div>';
          inboxListDetails+='    <div class="kt-widget__action">';
          inboxListDetails+='    <span class="kt-widget__date" style="font-weight: normal;">'+value['time_different']+'</span>';
          totalUnreadMessage += value['unreadMessage'];
          if (value['unreadMessage'] > 0) {
            inboxListDetails+='    <div class="msgNumber">'+value['unreadMessage']+'</div>';
          }
          
          inboxListDetails+='   </div>';
          inboxListDetails+='</a> ';
        });
        $("#inboxList").empty().append(inboxListDetails);
        $('.inboxChatList').removeClass('active');
    		$('.inboxChatList#'+id).addClass('active');
      }else{
        inboxListDetails+='<a class="kt-widget__item inboxChatList">';
        inboxListDetails+='   <div class="kt-widget__info">';
        inboxListDetails+='     <div class="kt-widget__section">';
        inboxListDetails+='       <span class="kt-widget__username" style="color: #000"></span>';
        inboxListDetails+='     </div>';
        inboxListDetails+='     <span class="kt-widget__desc" style="text-transform: uppercase; font-weight: normal;">';
        inboxListDetails+=        message;
        inboxListDetails+='     </span>';
        inboxListDetails+='    </div>';
        inboxListDetails+='    <div class="kt-widget__action">';
        inboxListDetails+='    <span class="kt-widget__date" style="font-weight: normal;></span>';
        inboxListDetails+='    <span class="kt-badge kt-badge--success kt-font-bold" style="background:#6f7071;">0</span>';
        inboxListDetails+='   </div>';
        inboxListDetails+='</a> ';
        $("#inboxList").empty().append(inboxListDetails);
        $("#titleName").append('<p class="m-0" style="color: #74788d; font-weight: 500;"><?php echo $translations['M02084'][$language]; //Contact us if you have any queries ?></p>');
        $("#inboxMessages").html('<img src="images/qtn/emailIcon.png" style="width:40%;left:30%;position:absolute;opacity:0.6;" alt="">');
      }

      $('#numMessages').html(totalUnreadMessage);
    }

    function inboxClick(element) {
		$('.inboxChatList').removeClass('active');
		$('.inboxChatList#'+element.id).addClass('active');
        if($('.inboxChatList#'+element.id).children('.msgNumber').length > 0) {
            totalUnreadMessage -= $('.inboxChatList#'+element.id).children('.msgNumber').html();
            $('#numMessages').html(totalUnreadMessage);
        }

		$('#btnSend').attr('value', element.id);
    var titleName = element.name;

		var formData  = {
        	command: 'getInboxMessages',
        	inboxID: element.id
        };
        var fCallback = inboxMessages;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#titleName").html(titleName);
        $('#inboxMessages').empty();
	}

    function inboxMessages(data,message)
    {
      $('#replyDiv').show();
      var message = data.messages;
      var inboxMessage = "";

      if(message)
      {
        $.each(message, function(key,value){
          if(value['message_type'] == "image/text"  || value['message_type'] == "image"){
            if(value['person'] != '<?php echo $translations['M00425'][$language]; ?>'){
            inboxMessage+='     <div class="kt-chat__message">';
            }else{
            inboxMessage+='     <div class="kt-chat__message kt-chat__message--right">';
            }
            if(value['person'] != '<?php echo $translations['M00425'][$language]; ?>'){
            inboxMessage+='       <div class="kt-chat__text kt-bg-light-success">';
            }else{
            inboxMessage+='       <div class="kt-chat__text kt-bg-light-brand">';
            }
            inboxMessage+='         <img src="'+tempMediaUrl+value['base64Image']+'" alt="" style="width:100%;">';
            inboxMessage+='       </div>';
            inboxMessage+='       <div class="kt-chat__user">';
            /*if(value['person'] == '<?php echo $translations['M00425'][$language]; ?>'){
            inboxMessage+='         <span href="#" class="kt-chat__username"><?php echo $translations['M02922'][$language]; ?></span>';
            }else{
            inboxMessage+='         <span href="#" class="kt-chat__username">'+value['person']+'</span>';
            }*/
            inboxMessage+='         <span class="kt-chat__datetime">'+value['datetime']+'</span>';
            inboxMessage+='       </div>';
            inboxMessage+='     </div>';
          }

          if(value['message'] != ""){
          if(value['person'] != '<?php echo $translations['M00425'][$language]; ?>'){
          inboxMessage+='     <div class="kt-chat__message">';
          }else{
          inboxMessage+='     <div class="kt-chat__message kt-chat__message--right">';
          }
          if(value['person'] == '<?php echo $translations['M00425'][$language]; ?>'){
          inboxMessage+='       <div class="kt-chat__text kt-bg-light-success">';
          }else{
          inboxMessage+='       <div class="kt-chat__text kt-bg-light-brand">';
          }
          inboxMessage+=            value['message'];
          inboxMessage+='       </div>';
          inboxMessage+='       <div class="kt-chat__user">';
          /*if(value['person'] == '<?php echo $translations['M00425'][$language]; ?>'){
          inboxMessage+='         <span href="#" class="kt-chat__username"><?php echo $translations['M02922'][$language]; ?></span>';
          }else{
          inboxMessage+='         <span href="#" class="kt-chat__username">'+value['person']+'</span>';
          }*/
          inboxMessage+='         <span class="kt-chat__datetime">'+value['datetime']+'</span>';
          inboxMessage+='       </div>';
          inboxMessage+='     </div>';
          }
        });
      }
      $('#inboxMessages').html(inboxMessage);
      $('#inboxDIV').scrollTop(0);
      $("#inboxDIV").animate({ scrollTop: $('#inboxDIV').prop("scrollHeight")}, 1000);
    }

    function sendMessage(element) {
      $('.inboxChatList').removeClass('active');
  		$('.inboxChatList#'+element.id).addClass('active');
      if(element.value) {
        var imageData = $('#imgData').val();
        var imageType = $('#imgType').val();
        var imageName = $('#imgName').val();
        var imageSize = $('#imgSize').val();

        if(imageData == ""){
          var imageFlag = 0;
        }else{
          var imageFlag = 1;
        }

        uploadImage = [];
        uploadImageData = [];
        if(imageData != "") {
            uploadImage.push({
              // imageData : imageData,
              imageType : imageType,
              imageName : imageName,
              imageFlag : imageFlag,
              imageSize : imageSize,
              uploadType : 'image'
            });

            uploadImageData.push({
                imgName: imageName,
                imgData: imageData,
                imgType : imageType,
                imgSize : imageSize,
                uploadType : 'image'
            });
        }

        var formData  = {
          command: 'addInboxMessages',
          inboxID: element.value,
          message: $('#inputMessage').val(),
          uploadData : uploadImage,
        };
        var fCallback = sendMessageStatus;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
      }
    }

    /*function submitCallback(data, message) {
        id = data.inboxID;
        
        if(data.uploadData){
            var reqData2 = new FormData();

            if(data.uploadData.image_name){
                var imagefiles = uploadImageData[ind]['imgData'];
                var block = imagefiles.split(";");
                var contentType = block[0].split(":")[1];// In this case "image/gif"
                // get the real base64 content of the file
                var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                // // Convert it to a blob to upload
                var blob = b64toBlob(realData, contentType);
                 
                reqData2.append('imageData', blob);
                reqData2.append('image', data.uploadData.image_name);
            }

            $.ajax({
                url: 'scripts/reqUploadCDN.php',
                type: 'post',
                data: reqData2,
                contentType: false,
                processData: false,
                async: false,
                success: function(data){}
            });
        }

        sendMessageStatus();
    }*/

    function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

        var blob = new Blob(byteArrays, {type: contentType});
        return blob;
    }

    function sendMessageStatus(data, message) {
        if(data.uploadData){
            var reqData2 = new FormData();

            if(data.uploadData.image_name){
                var imagefiles = uploadImageData[0]['imgData'];
                var block = imagefiles.split(";");
                var contentType = block[0].split(":")[1];// In this case "image/gif"
                // get the real base64 content of the file
                var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                // // Convert it to a blob to upload
                var blob = b64toBlob(realData, contentType);
                 
                reqData2.append('imageData', blob);
                reqData2.append('image', data.uploadData.image_name);
            }

            $.ajax({
                url: 'scripts/reqUploadCDN.php',
                type: 'post',
                data: reqData2,
                contentType: false,
                processData: false,
                async: false,
                success: function(data){}
            });
        }

      id = data.inboxID;

      if(data.inboxID)
      {
        var formData  = {
	        	command: 'getInboxMessages',
	        	inboxID: data.inboxID
	        };
	        var fCallback = inboxMessages;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
      }
      $("#inputMessage").val("");

      var formData  = {
        command: 'getInboxListing'
      };
      var fCallback = loadDefaultListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
</script>
