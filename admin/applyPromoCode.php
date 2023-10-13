<div class="modal fade" id="applyPromoCode" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Apply Promo
                    </h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="promoCode" class="col-md-3 col-form-label customFont">Promo Code</label>
                    <div class="col-md-9">
                        <input id="promoCode" type="text" class="form-control"/>
                    </div>
                </div>
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitPromoCode" class="custom-button2">
                    <?php echo $translations['A01006'][$language]; /* Save */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Discard
                </button>
            </div>
    </div>
</div>