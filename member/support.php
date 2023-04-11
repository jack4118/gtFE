<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding">
    <!-- <div class="kt-container"> -->
        <div class="col-12 pageTitle">
            <?php echo $translations['M00314'][$language]; // Support ?>
        </div>
        <div class="col-12 whiteBg" style="margin-top: 20px">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-12">
                    <!-- <div class="row"> -->
                        <div class="form-group row" style="margin-top: 10px">
                            <label class="col-md-4"><?php echo $translations['M00302'][$language]; //Subject ?> <span class="mustFill">*</span></label>
                            <input id="subject" type="text" class="form-control col-md-8">
                        </div>

                        <div class="form-group row" style="margin-top: 20px;">
                            <label class="col-md-4"><?php echo $translations['M00023'][$language]; //Image ?></label>
                            <div class="col-md-8 px-0">
                                <div style="display: none">
                                    <input id="upload" type="file" accept="image/*" name="image">
                                </div>
                                <button class="btn btn-primary" type="button" onclick="chooseFile();"><?php echo $translations['M02078'][$language]; //Choose File ?></button>
                                <input class="supportImageName" id="fileName" name="image" disabled style="margin-left: 10px;">
                                <div class="squareImage-modal-body border-b" align="center">
                                    <input id="trID" type="hidden" name="" value="">
                                    <input id="imgData" type="hidden" name="" value="">
                                    <input id="imgName" type="hidden" name="" value="">
                                    <input id="imgSize" type="hidden" name="" value="">
                                    <input id="imgType" type="hidden" name="" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 20px">
                            <label class="col-md-4"><?php echo $translations['M00316'][$language]; //Message ?> <span class="mustFill">*</span></label>
                            <textarea id="message" rows="5" type="text" class="form-control col-md-8"></textarea>
                        </div>

                        <div class="form-group row mb-0" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <button id="btnSend" type="button" class="btn btn-primary"><?php echo $translations['M00346'][$language]; //Submit ?></button>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    <!-- </div> -->
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
	// Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var uploadImage     = [];
    var uploadImageData = [];

    $(document).ready(function() {

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    $("#imgData").empty().val(reader["result"]);
                    $("#imgName").empty().val(input.files[0]["name"]);
                    $("#imgSize").empty().val(input.files[0]["size"]);
                    $("#imgType").empty().val(input.files[0]["type"]);
                    $("#fileName").empty().val(input.files[0]["name"]);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    	$("#upload").change(function(){
            readURL(this);
        });
    });


    $('#btnSend').click(function() {
    	var subject = $("#subject").val();
    	var message = $("#message").val();

    	$("input").each(function(){
			$(this).removeClass('is-invalid');
			$('.invalid-feedback').html("");
		});

		if (subject == "")
		{
			errorDisplay("subject","<?php echo $translations['E00825'][$language]; //Please Enter Your Subject. ?>");
		}
		else if (message == "")
		{
			errorDisplay("message","<?php echo $translations['E00826'][$language]; //Please Enter Your Message. ?>");
		}
		else{
    		$('.customError').empty();

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
	        	command: 'addTicket',
	        	subject: $('#subject').val(),
	        	message: $('#message').val(),
	        	uploadData : uploadImage,
	        	type: 'support'
	        };
	        var fCallback = sendCallback;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	}
	});

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

    function sendCallback(data, message) {
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
        
    	showMessage(message, 'success', '<?php echo $translations['M00314'][$language]; //Support ?>', 'upload', 'inbox');
    }

    function chooseFile() {
      $("#upload").click();
    }
</script>
