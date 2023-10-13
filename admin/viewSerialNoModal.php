<!-- detailed operation -->
<div class="modal fade" id="viewSerialNoModal" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content custom-modal-content">                
            <!-- modal body -->
            <div class="modal-body" id="viewSerialNoModalDiv">
                
            </div>
            <!-- modal footer -->
            <div id="detailedOperationFooter" class="d-flex justify-content-start">
                <button id="printSerialNumber" class="printbtn">
                    <?php echo $translations['A00753'][$language]; /* Print */ ?>
                </button>
                <button class="modalCloseBtn" data-dismiss="modal">
                    <?php echo $translations['A00742'][$language]; /* Close */ ?>
                </button>
            </div>
        </div>
    </div>
</div>