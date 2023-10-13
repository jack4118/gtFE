<div class="modal fade" id="addEditAddress" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12" style="margin-bottom: 15px;">

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="customerName" class="col-form-label customFont">Name</label>
                                    <input id="customerName" type="text" class="form-control"/>
                                    <input id="editAddress" type="text" class="form-control" style="display:none"/>
                                    <input id="addressType" type="text" class="form-control" style="display:none"/>
                                    <span id="customerNameInputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="mobileNumber" class="col-form-label customFont">Mobile Number</label>
                                    <input id="mobileNumber" type="text" class="form-control"/>
                                    <span id="customerMobileInputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="addr1" class="col-form-label customFont">Address Line 1</label>
                                    <input id="addr1" type="text" class="form-control"/>
                                    <span id="customerAddr1InputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="addr2" class="col-form-label customFont">Address Line 2</label>
                                    <input id="addr2" type="text" class="form-control"/>
                                    <span id="customerAddr2InputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="city" class="col-form-label customFont">City</label>
                                    <input id="city" type="text" class="form-control"/>
                                    <span id="customerCityInputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="stateList" class="col-form-label customFont">State</label>
                                    <select id="stateList" type="text" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="zipCode" class="col-form-label customFont">ZIP</label>
                                    <input id="zipCode" type="text" class="form-control"/>
                                    <span id="customerZipInputError" class="errorSpan text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <label for="countryList" class="col-form-label customFont">Country</label>
                                    <select id="countryList" type="text" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="submitAddress" class="custom-button2">
                    <?php echo $translations['A01006'][$language]; /* Save */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Discard
                </button>
            </div>
    </div>
</div>