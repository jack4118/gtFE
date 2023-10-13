<div class="modal fade" id="soStockOutListModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Delivery Order Details
                    </h4>
            </div>
            <div class="modal-body">
                    <div id="doList">
                    </div>
                <div class="row" style="margin-top: 40px;" id="stockOutModalDO">
                    <div class="col-md-12 m-t-15">
                        <table id="deliveryOrderTable" class="customTable table m-b-20">
                            <label for="" class="col-md-12 col-form-label customFont"><h3 style="font-weight: bold; color: black;margin-top: -18px;">Stock Out List</h3></label>   
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-check" id="checkboxWrapper">
                                            <div class="form-check-item">
                                                <input type="checkbox" class="form-check-input" id="skipWarning">
                                                <label class="form-check-label" for="skipWarning">Check to ignore extra stock warning</label>
                                            </div>
                                            <div class="form-check-item">
                                                <input type="checkbox" class="form-check-input" id="stockOutMystery">
                                                <label class="form-check-label archive-label" for="stockOutMystery">Check to stock out mystery food</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control m-b-10" type="text" id="inputSerialModalDO" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Serial No</th>
                                    <th><i class="fa fa-ellipsis-v"></i></th>
                                </tr>
                            </thead>
                            <tbody id="deliveryOrderModalTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="saveDeliveryOrderModal" class="custom-button2">
                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                </button>
                <button id="selectDelivery" class="custom-button2">
                    Choose Delivery Logistics
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Close
                </button>
            </div>
    </div>
</div>