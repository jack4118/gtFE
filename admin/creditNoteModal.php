<div class="modal fade" id="creditNoteModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Add Credit Note
                    </h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="creditNoteReferenceInput" class="col-md-3 col-form-label customFont">Remittance reference number</label>
                    <div class="col-md-9">
                        <input id="creditNoteReferenceInput" type="text" class="form-control">
                        <span id="creditNoteError" class="errorSpan text-danger"></span>
                        <span id="nameError" class="errorSpan text-danger"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uploadReceiptSection" class="col-md-3 col-form-label customFont">Upload Receipt</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12" style="margin-top: 20px">
                                <label>Upload Bank Receipt</label>
                                <div class="position-relative">
                                <input class="form-control" type="hidden" id="creditNoteData">
                                <input class="form-control" type="hidden" id="creditNoteName">
                                <input class="form-control" type="hidden" id="creditNoteSize">
                                <input class="form-control" type="hidden" id="creditNoteType">
                            </div>
                            <input type="file" id="uploadCreditNoteReceipt" class="" accept=".jpg, .jpeg, .png, .pdf">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitCreditNoteBtn" class="custom-button2">
                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Close
                </button>
            </div>
    </div>
</div>