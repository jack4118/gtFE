<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Vendor Name/Company Name <span class="text-danger">*</span></label>
                                            <input id="name" type="text" class="form-control">
                                            <span id="nameError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Vendor Code</label>
                                            <input id="code" type="text" class="form-control" disabled>
                                            <span id="codeError" class="errorSpan text-danger"></span>
                                        </div>

                                        <!-- <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Vendor Address</label>
                                            <input id="address" type="text" class="form-control">
                                            <span id="addressError" class="customError text-danger"></span>
                                        </div> -->

                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="form-control">
                                            <span id="emailError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Person In Charge</label>
                                            <input id="pic" type="text" class="form-control">
                                            <span id="picError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px;">
                                            <label>Vendor number <span class="text-danger">*</span></label>
                                            <!-- <div id="phone" class="row justify-content-between form-control" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                <input id="contact" type="text" class="form-control col-xs-8" style="border: none;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]{0,30}/);">
                                            </div> -->
                                            <div id="phoneDiv" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+60</span>
                                                    </div>
                                                    <input type="text" id="phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="border: none;">
                                                </div>
                                            </div>

                                            <span id="phoneError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                            <label>Operation Hour</label>
                                            <input id="internalNote" type="text" class="form-control">
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;">
                                            <label for="address">Address</label>
                                        </div>
                                        <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                            <label>Status</label>
                                            <div id="status" class="m-b-20">
                                                <div class="radio radio-inline">
                                                    <input id="active" type="radio" value="Active" name="statusRadio" checked="checked"/>
                                                    <label for="active">
                                                        <?php echo $translations['A00372'][$language]; /* Active */?>
                                                    </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input id="inActive" type="radio" value="Inactive" name="statusRadio"/>
                                                    <label for="inActive">
                                                        <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-12">                                                
                                                <div class="row">
                                                    <div id="appendAddress">
                                                        <div class="col-md-12">
                                                            <div class="addProductWrapper default" style="margin-top: 0px;">
                                                                <span class="dtxt">Default</span>
                                                                
                                                                <div class="row" id="address1">
                                                                    <input id="addressId1" class="form-control hide" required/>

                                                                    <div class="col-md-5">
                                                                        <label>1. Branch Name</label>
                                                                        <input id="branchName1" class="form-control" required/>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <label>Address <span class="text-danger">*</span></label>
                                                                        <input id="branchAddress1" class="form-control" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="addProduct" onclick="addRow()">
                                                            <b><i class="fa fa-plus-circle"></i></b>
                                                            <span>Add Address</span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                                Images (Recommended Size: 600 x 310 px)
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div id="buildImg">
                                                    </div>

                                                    <div class="col-md-4 addImgBtn">
                                                        <div class="addProductImage" onclick="addImage()">
                                                            <b><i class="fa fa-plus-circle"></i></b>
                                                            <span>Add Images</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <span id="imgError" class="errorSpan text-danger"></span>
                                            </div>
                                            <div class="col-xs-12">
                                                <span id="imgTypeError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>

                                         

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */?>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>

<div class="modal fade" id="showImage" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                </h4>
            </div>
            <div class="modal-body">
                <img id="modalImg" width="100%" src="">
                <video id="modalVideo" width="400" controls>
                  <source src="" type="">
                </video>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
            </div>
        </div>
    </div>
</div>

<script>
var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var addImgCount = 0;
    var addImgIDNum = 0;
    var uploadImage;
    var uploadImageData;

    var wrapperLength = 2;
    var totalLoop =[1];

    $(document).ready(function() {

        var formData  = {
            command: 'getSupplierDetail',
            type: 'add'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.customError').text('');

            var name = $('#name').val();
            var code = $('#code').val();
            // var address = $('#address').val();
            // var dialCode = $('#dialCode option:selected').val();
            var contact = "60" + $('#phone').val();
            var status = $("input[name=statusRadio]:checked").val();
            var email = $("#email").val();
            var pic = $("#pic").val();
            var note = $("#internalNote").val();

            var address = $('#addressList').find('.addressTemp');
            var addressArray = [];

            uploadImage = [];
            uploadImageData = [];
            $(".popupMemoImageWrapper").each(function() {
                var imgData = $(this).find('[id^="storeFileData"]').val();
                var imgName = $(this).find('[id^="storeFileName"]').val();
                var imgType = $(this).find('[id^="storeFileType"]').val();
                var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                var imgSize = $(this).find('[id^="storeFileSize"]').val();
                var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

                if(imgData != "") {
                    buildUploadImage = {
                        imgName : imgName,
                        imgType : imgType,
                        imgFlag : imgFlag,
                        imgSize : imgSize,
                        uploadType : imgUploadType
                    };

                    // if(parseFloat(imgSize) / 1048576 > 3) {
                    //     imgSizeFlag = false;
                    // }

                    reqData = {
                        imgName : imgName,
                        imgData : JSON.stringify(imgData),
                        // imgType : imgType,
                        // imgSize : imgSize,
                        // uploadType : imgUploadType
                    };
                    
                    uploadImageData.push(reqData);
                    uploadImage.push(reqData);
                }
            });

            for(var checkingLength = 1; checkingLength < $(".addProductWrapper").length + 1; checkingLength++) {
                if($('#branchName' + checkingLength).val() != "") { 
                    if($('#branchAddress' + checkingLength).val() == "") { console.log("here")
                        showMessage("Address cannot be empty!", 'warning', 'Add Vendor', 'warning', '');
                        return;
                    }
                }
            }

            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                if($('#branchAddress' + v).val() != "") {
                    var branchName = $('#branchName' + v).val();
                    var branchAddress = $('#branchAddress' + v).val();
                    var branchAddressID = $('#addressId' + v).val();

                    var perBranch = {
                        address: branchAddress,
                        branch_name: branchName,
                        addressID: branchAddressID
                    }

                    addressArray.push(perBranch);
                }
            }

            var formData  = {
                command     : 'addSupplier',
                name        : name,
                code        : code,
                address     : addressArray,
                email       : email,
                pic         : pic,
                phone	    : $('#phone').val(),
                contact     : contact,
                status      : status,
                note        : note,
                uploadImage : uploadImage
            };
            fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#backBtn').click(function() {
            $.redirect('vendor.php');
        });
    });

    function SortByName(a, b){
        var aName = a.name.toLowerCase();
        var bName = b.name.toLowerCase(); 
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
    }

    function loadDefaultListing(data, message) {
        $('#code').val(data.code);
        if(data.validCountry) {
            var dialCode = data.validCountry;
            dialCode.sort(SortByName);
            $.each(dialCode, function(k, v) {
                $('#dialCode').append(`<option value="${v['country_code']}" display="${v['name']}">+${v['country_code']}</option>`);
            });
        }
    }

    function addRow(data){
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="address${(wrapperLength)}">

                        <input id="addressId${(wrapperLength)}" class="form-control hide" required/>

                        <div class="col-md-5">
                            <label>${(wrapperLength)}. Branch Name</label>
                            <input id="branchName${(wrapperLength)}" class="form-control" required/>
                        </div>
                        <div class="col-md-7">
                            <label>Address <span class="text-danger">*</span></label>
                            <input id="branchAddress${(wrapperLength)}" class="form-control" required/>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendAddress").append(wrapper);
        // $("#stateSelect"+wrapperLength).html(html);

        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function closeDiv(n,id) {
        var totalLoop =[1];

        const index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');
        // $("#id" + id).val('');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        // $(n).parent().parent().remove();
        $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        $("#closeBtn" + id).css("display","none");
        $("#branchName" + id).attr("disabled", true);
        $("#branchName" + id).val("");
        $("#branchAddress" + id).attr("disabled", true);
        $("#branchAddress" + id).val("");

        // var formData = {
        //     'command': 'deleteShippingAddress',
        //     'id': $("#addressId" + id).val()
        // };
        // fCallback = successDelete;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function addImage() {
        addImgCount = addImgCount + 1;
        addImgIDNum = addImgIDNum + 1;

        var buildImg = "";

        buildImg += `
            <div class="col-sm-4 col-xs-12">
                <div class="popupMemoImageWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                    <input type="hidden" id="storeFileData${addImgIDNum}">
                    <input type="hidden" id="storeFileName${addImgIDNum}">
                    <input type="hidden" id="storeFileType${addImgIDNum}">
                    <input type="hidden" id="storeFileFlag${addImgIDNum}">
                    <input type="hidden" id="storeFileSize${addImgIDNum}">
                    <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                    <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                    <div>
                        <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                        <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                        <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
                        <img id="thumbnailImg${addImgIDNum}" style="width:100%;" />
                        <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}')">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;

        $("#buildImg").append(buildImg);

        /*if (addImgCount == 1) {
            $(".addImgBtn").hide();
        }*/
        
    }

    function focus() {
      [].forEach.call(this.options, function(o) {
        o.textContent = o.getAttribute('display') + ' (+' + o.getAttribute('value') + ')';
      });
    }
    function blur() {
      [].forEach.call(this.options, function(o) {
        o.textContent = '+'+o.getAttribute('value');
      });
    }

    [].forEach.call(document.querySelectorAll('#dialCode'), function(s) {
        s.addEventListener('focus', focus);
        s.addEventListener('blur', blur);
        blur.call(s);
    });

    $('#dialCode').change(function() {
        $('#dialCode').blur();
    });

    function submitCallback(data, message) {
        showMessage(message, 'success', 'Add Vendor', 'plus', 'vendor.php');
    }

    function addAddress() {
        // var k = parseInt($('#addressList').find('.address:last-child').attr('id').replace('address', ''));

        var lastAddress = $('#addressList').find('.address:last-child');
        var k = 1;
        if (lastAddress.length > 0) {
            k = parseInt(lastAddress.attr('id').replace('address', ''));
        }


        var html = '';

        html += `
            <div class="address" id="address${k+1}">
                <div class="row mx-0 productGroup">
                    <div class="col-md-1">
                        <label class="number">${k+1}.</label>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control addressTemp" type="text" value="">
                        </div>
                    </div>
                    <!-- Remove Product -->
                    <div class="removeProduct" id="removeProduct${k+1}" onclick="removeProduct(this)">
                        <b><i class="fa fa-times removeProductIcon"></i></b>
                    </div>
                </div>
            </div>
        `;

        $('#addressList').append(html);

        // getProduct();

        // var productName = $(`#product${k+1}`).find('.productName');
        // beforeGetProductDetails(productName);
    }

    function removeProduct(e) {
        var index = $(e).attr('id').replace('removeProduct', '');

        $(`#address${index}`).remove();

        var products = $('#addressList').find('.address');
        var lastIndex = parseInt($('#addressList').find('.address:last-child').attr('id').replace('address', ''));
        
        var k = 1;
        $.each(products, function() {
            $(this).attr('id', `address${k}`);
            // $(this).find('.number').html(`${k}.`);
            // $(this).find('.productName').attr('id', `productName${k}`);
            // $(this).find('.quantity').attr('id', `quantity${k}`);
            $(this).find('.removeProduct').attr('id', `removeProduct${k}`);
            k++;
        });

        // var quantityField = $(`#product1 .quantity`);
        // calculatePrice(quantityField);
    }

    function closeDivImg(n) {
        addImgCount = addImgCount - 1;
        // $(".addImgBtn").show();
        $(n).parent().parent().remove();

        $("#imgTypeError").html("");
        $("#imgError").html("");
    }

    function deleteImg(id) {
        $("#fileUpload"+id).val("");
        $("#fileName"+id).text("No File Uploaded");
        $("#storeFileData"+id).val("");
        $("#storeFileName"+id).val("");
        $("#storeFileType"+id).val("");
        $("#storeFileUploadType"+id).val("");

        $("#viewImg"+id).hide();
        $("#deleteImg"+id).hide();
        $("#fileNotUploaded"+id).show()
        $("#thumbnailImg"+id).attr('src', "");
    }

    function showImg(n) {
        $("#modalImg").attr('style','display: block');
        $("#modalImg").attr('src', $("#storeFileData"+n).val());
        $("#modalVideo").attr('style','display:none');
        $("#showImage").modal();
    }


    function displayFileName(id, n) {
        var dFileName = $("#fileName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // $('#blah').attr('src', e.target.result);
                // $("#imgData"+input.id).empty().val(reader["result"]);
                dFileName.text(n.files[0]["name"]);
                // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                // $("#imgFlag"+input.id).empty().val("1");

                $("#storeFileData"+id).val(reader["result"]);
                $("#storeFileName"+id).val(n.files[0]["name"]);
                $("#storeFileSize"+id).val(n.files[0]["size"]);
                $("#storeFileType"+id).val(n.files[0]["type"]);
                $("#storeFileFlag"+id).val('1');

                if((n.files[0]["type"]).split('/')[0] === 'image'){
                    $("#storeFileUploadType"+id).val('image');
                    uploadFileType = 'image';
                }else{
                    $("#storeFileUploadType"+id).val('video');
                    uploadFileType = 'video';
                }

                // $("#viewImg"+id).attr('data-res', reader["result"]);
                $("#viewImg"+id).css('display', 'inline-block');
                $("#deleteImg"+id).css('display', 'inline-block');
                $("#fileNotUploaded"+id).hide()
                $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val());
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

</script>
</body>
</html>

