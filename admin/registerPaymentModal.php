<div class="modal fade" id="registerPaymentModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Register Payment
                    </h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="payment_method" class="col-md-3 col-form-label customFont">Payment Method</label>
                    <div class="col-md-9">
                        <select id="payment_method" type="text" class="form-control" dataType="text" onchange="displayReceipt()">
                        </select> 
                    </div>
                </div>
                <span id="receiptInputError" class="errorSpan text-danger"></span>

                <div class="form-group row">
                    <label for="uploadReceiptSection" class="col-md-3 col-form-label customFont">Upload Receipt</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div id="uploadReceiptSection" class="col-md-12 mt-5"  style="margin-top: 10px;margin-bottom: 20px;display:none">
                                <div class="form-group mt-5">
                                    <div class="position-relative">
                                        <input type="hidden" id="storeFileData">
                                        <input type="hidden" id="storeFileName">
                                        <input type="hidden" id="storeFileType">
                                        <input type="hidden" id="storeFileSize">
                                        <input type="hidden" id="storeFileUploadType" value="image">
                                        <input type="hidden" id="uploadType" value="image">
                                    </div>
                                    <input type="file" id="fileUpload" class="d-none" accept=".jpg, .jpeg, .png, .pdf" onchange="displayFileName(this)">
                                    <img id="thumbnailImg" style="width:100%;" />
                                    <a id="viewImg" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg()">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a id="deleteImg" href="javascript:;" class="btn" style="padding:6px;" onclick="deleteImg()">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitPayment" class="custom-button2">
                    <?php echo $translations['A01006'][$language]; /* Save */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Discard
                </button>
            </div>
    </div>
</div>