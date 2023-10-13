<div class="modal fade" id="productTranslateDescriptionModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Translate: Description
                    </h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="productDescriptionCN" class="col-md-3 col-form-label customFont">Chinese (Simplified) / 简体中文</label>
                    <div class="col-md-9">
                        <input id="descriptionChinese" type="text" class="form-control" style="margin-left: 0px;" maxlength="255">
                        <span id="invProductDescriptionErrorChinese" class="errorSpan text-danger"></span>
                        <span id="nameError" class="errorSpan text-danger"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productDescriptionEN" class="col-md-3 col-form-label customFont">English (US)</label>
                    <div class="col-md-9">
                        <input id="invProductDescriptionEnglish" type="text" class="form-control" style="margin-left: 0px;" maxlength="255" oninput="this.value = this.value.replace(/[\u4e00-\u9fa5]/g, '');">
                        <span id="invProductDescriptionErrorEnglish" class="errorSpan text-danger"></span>
                        <span id="nameError" class="errorSpan text-danger"></span>
                    </div>
                </div>
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitProductDescription" class="custom-button2">
                    <?php echo $translations['A01006'][$language]; /* Save */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Discard
                </button>
            </div>
    </div>
</div>