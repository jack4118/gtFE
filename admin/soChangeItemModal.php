<div class="modal fade" id="changeItemModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Change Item
                    </h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="originalItemSelection" class="col-md-3 col-form-label customFont">Original Item:</label>
                    <div class="col-md-9">
                        <select id="originalItemSelection" class="form-control">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="itemSelection" class="col-md-3 col-form-label customFont">Change Item:</label>
                    <div class="col-md-9">
                        <select id="itemSelection" class="form-control">
                        </select>
                    </div>
                </div>
                
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitChangeItemRequestBtn" class="custom-button2">
                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Close
                </button>
            </div>
    </div>
</div>