 <!-- Validated Stock Modal -->
 <div class="modal fade" id="validatedStockModal" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content custom-modal-content">                
            <!-- modal body -->
            <div class="modal-body" id="validatedStockDiv">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title titles">
                    <b>Validated Stock</b>
                </h4>
            </div>
            <!-- modal footer -->
            <div id="validateStockFooter" class="d-flex justify-content-start">
                <button id="printValidatedStock" class="printbtn">
                    <?php echo $translations['A00753'][$language]; /* Print */ ?>
                </button>
                <button class="modalCloseBtn" data-dismiss="modal">
                    <?php echo $translations['A00742'][$language]; /* Close */ ?>
                </button>
            </div>
        </div>
    </div>
</div>