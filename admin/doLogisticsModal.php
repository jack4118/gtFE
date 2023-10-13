<div class="modal fade" id="doLogisticsModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close closes" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title titles" style="color: black; font-weight: bold;">
                        Delivery Order Logistic
                    </h4>
            </div>
            <div class="modal-body">
                <div class="row" id="shippingMethodDiv" style="">
                    <div class="col-lg-12 m-b-30">
                        <div class="card-box">
                            <div class="row">
                                <label for="payment_method" class="col-md-3 col-form-label customFont">Delivery Logistic</label>
                                <div class="col-12 text-center">
                                    <h4 class="header-title m-t-0 m-b-30">Shipping Method</h4>
                                </div>
                                <div class="col-12" id="status" style="display:flex; align-items: center; justify-content: space-around;">
                                    <div class="radio radio-inline">
                                        <input id="PARCELHUB" type="radio" value="PARCELHUB" name="shippingMethod" class="statusRadio" />
                                        <label class="text-center" for="PARCELHUB">
                                            <div class="shippingMethodLogo"><img src="images/ParcelhubLogo2.png"></div>
                                            <div>PARCELHUB</div>
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input id="whallo" type="radio" value="Whallo" name="shippingMethod" class="statusRadio" />
                                        <label class="text-center" for="whallo">
                                            <div class="shippingMethodLogo"><img src="images/Whallo-Logo2.png"></div>
                                            <div>Whallo</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-9">
                        <label for="shippingBranch" class="col-md-3 col-form-label customFont">Shipping Branch</label>
                        <select id="shippingBranch" type="text" class="form-control" dataType="text" onchange="displayReceipt()">
                        </select> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="parcelWeight" class="col-form-label customFont">Parcel Weight (in kg)</label>
                                <input id="parcelWeight" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="parcelHeight" class="col-form-label customFont">Parcel Height (in cm)</label>
                                <input id="parcelHeight" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="parcelWidth" class="col-form-label customFont">Parcel Width (in cm)</label>
                                <input id="parcelWidth" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="parcelLength" class="col-form-label customFont">Parcel Length (in cm)</label>
                                <input id="parcelLength" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverName" class="col-form-label customFont">Receiver / Company Name*</label>
                                <input id="receiverName" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverPhone" class="col-form-label customFont">Receiver Mobile Number*</label>
                                <input id="receiverPhone" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverAddress1" class="col-form-label customFont">Receiver Address Line 1*</label>
                                <input id="receiverAddress1" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverAddress2" class="col-form-label customFont">Receiver Address Line 2*</label>
                                <input id="receiverAddress2" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverCity" class="col-form-label customFont">Receiver City*</label>
                                <input id="receiverCity" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverState" class="col-form-label customFont">Receiver State*</label>
                                <input id="receiverState" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverPostCode" class="col-form-label customFont">Receiver ZIP*</label>
                                <input id="receiverPostCode" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="receiverCountryCode" class="col-form-label customFont">Receiver Country*</label>
                                <input id="receiverCountryCode" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-9">
                        <label for="remark" class="col-md-3 col-form-label customFont">Remark*</label>
                        <input id="remark" type="text" class="form-control"/>
                    </div>
                </div>
                
            </div>


            <div class="modal-footer" style="border-top: 0px; text-align: left;">
                <button id="whalloSubmitBtn" class="custom-button2">
                    <?php echo $translations['A00323'][$language]; /* Submit */?>
                </button>
                <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                    Discard
                </button>
            </div>
    </div>
</div>