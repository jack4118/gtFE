<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />


<div class="kt-container px-0" style="color: #000;">
    <div class="homepagePadding mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="checkoutTitle" data-lang="M00268">
                    <?php echo $translations['M00268'][$language]; //Confirmation ?>
                </div>
            

                <div class="mt-5 row">
                    <div class="row mx-0 px-0 justify-content-center">
                        <div class="col-md-6 pr-lg-5">
                            <div class="formTitle deliverySection" style="display:none">
                                <label data-lang="M03192"><?php echo $translations['M03192'][$language]; /* Shipping Address */?></label>
                            </div>
                            <div class="row mx-0 justify-content-between borderline3 deliverySection" style="display:none">
                                <table style="width: 100%;">
                                    <tr style="width: 100%;">
                                        <td style="width:40%;" class="grayFont" data-lang="M03193">
                                            <?php echo $translations['M00177'][$language]; /* Full Name */?>
                                        </td>
                                        <td style="width:10%;" class="grayFont">
                                            :
                                        </td>
                                        <td style="width:50%;" class="blackFont">
                                            <div id="fullNameShipping"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M02466">
                                            <?php echo $translations['M02466'][$language]; /* Address */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="address"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03497">
                                            <?php echo $translations['M03497'][$language]; /* District */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="district"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03155">
                                            <?php echo $translations['M03155'][$language]; /* Sub-District */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="subDistrict"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03153">
                                            <?php echo $translations['M02846'][$language]; /* City */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="city"></div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="grayFont" data-lang="M03153">
                                            <?php echo $translations['M03153'][$language]; //Street Name ?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="streetName"></div>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="grayFont" data-lang="M00180">
                                            <?php echo $translations['M00181'][$language]; /* Province */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="stateDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03158">
                                            <?php echo $translations['M03158'][$language]; /* Postal Code */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="postalCode"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00178">
                                            <?php echo $translations['M00178'][$language]; /* Country */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="countryDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr id="courierDisplayWrapper2" style="display: none">
                                        <td class="grayFont" data-lang="M03522">
                                            <?php echo $translations['M03577'][$language]; /* Courier Company */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="courierCompany"></div>
                                        </td>
                                    </tr>
                                    <tr id="courierDisplayWrapper" style="display: none">
                                        <td class="grayFont" data-lang="M03522">
                                            <?php echo $translations['M03522'][$language]; /* Courier Service */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="courierDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00298">
                                            <?php echo $translations['M02298'][$language]; /* Phone Number */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="phoneNumber"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00187">
                                            <?php echo $translations['M00187'][$language]; /* Email Address */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="emailAddress"></div>
                                        </td>
                                    </tr>
                                    <tr class="paymentPlacementWrap" style="display: none">
                                        <td class="grayFont" data-lang="M00197">
                                            <?php echo $translations['M00197'][$language]; //Placement Position ?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div class="placementPositionDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03459">
                                            <?php echo $translations['M03459'][$language]; /* Special Note */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div class="purchaseSpecialNote"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03160">
                                            <?php echo $translations['M03160'][$language]; /* Remarks */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div class="purchaseRemark"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="mt-5 formTitle deliverySection" style="display:none">
                                <label data-lang="M03260"><?php echo $translations['M03260'][$language]; /* Billing Address */?></label>
                            </div>
                            <div class="row mx-0 justify-content-between borderline3 deliverySection" style="display:none">
                                <table style="width: 100%;">
                                    <tr style="width: 100%;">
                                        <td style="width:40%;" class="grayFont" data-lang="M03193">
                                            <?php echo $translations['M00177'][$language]; /* Full Name */?>
                                        </td>
                                        <td style="width:10%;" class="grayFont">
                                            :
                                        </td>
                                        <td style="width:50%;" class="blackFont">
                                            <div id="billingFullName"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M02466">
                                            <?php echo $translations['M02466'][$language]; /* Address */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingAddress"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03497">
                                            <?php echo $translations['M03497'][$language]; /* District */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingDistrict"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03155">
                                            <?php echo $translations['M03155'][$language]; /* Sub-District */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingSubDistrict"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03153">
                                            <?php echo $translations['M02846'][$language]; /* City */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingCity"></div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="grayFont" data-lang="M03153">
                                            <?php echo $translations['M03153'][$language]; //Street Name ?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingStreetName"></div>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="grayFont" data-lang="M00180">
                                            <?php echo $translations['M00181'][$language]; /* Province */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingStateDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03158">
                                            <?php echo $translations['M03158'][$language]; /* Postal Code */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingPostalCode"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00178">
                                            <?php echo $translations['M00178'][$language]; /* Country */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingCountryDisplay"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00298">
                                            <?php echo $translations['M02298'][$language]; /* Phone Number */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingPhoneNumber"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M00187">
                                            <?php echo $translations['M00187'][$language]; /* Email Address */?>
                                        </td>
                                        <td class="grayFont">
                                            :
                                        </td>
                                        <td class="blackFont">
                                            <div id="billingEmailAddress"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="formTitle pickupSection" style="display:none">
                                <label data-lang="M02830"><?php echo $translations['M02830'][$language]; /* Pickup Address */?></label>
                            </div>
                            <div class="row mx-0 justify-content-between borderline3 pickupSection" style="display:none">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="grayFont" data-lang="M00471" style="border-bottom: 1px solid transparent;">
                                            <?php echo $translations['M00471'][$language]; /* Branch */?> :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="blackFont" id="pickupName" style="border-bottom: 1px solid transparent"></td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M02466" style="border-bottom: 1px solid transparent;">
                                            <?php echo $translations['M02466'][$language]; /* Address */?> :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="blackFont" id="pickupAddress" style="border-bottom: 1px solid transparent"></td>
                                    </tr>
                                    <tr class="paymentPlacementWrap" style="display: none">
                                        <td class="grayFont" data-lang="M00197" style="border-bottom: 1px solid transparent;">
                                            <?php echo $translations['M00197'][$language]; /* Placement Position */?> :
                                        </td>
                                    </tr>
                                    <tr class="paymentPlacementWrap" style="display: none">
                                        <td class="blackFont placementPositionDisplay" style="border-bottom: 1px solid transparent"></td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03459" style="border-bottom: 1px solid transparent;">
                                            <?php echo $translations['M03459'][$language]; /* Special Note */?> :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="blackFont purchaseSpecialNote" style="border-bottom: 1px solid transparent"></td>
                                    </tr>
                                    <tr>
                                        <td class="grayFont" data-lang="M03160" style="border-bottom: 1px solid transparent;">
                                            <?php echo $translations['M03160'][$language]; /* Remark */?> :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="blackFont purchaseRemark" style="border-bottom: 1px solid transparent"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 pl-lg-5 mt-5 mt-md-0">
                            <div class="formTitle pl-2">
                                <label data-lang="M02885"><?php echo $translations['M02885'][$language]; /* Payment Method */?></label>
                            </div>
                            <div class="row m-1 mb-4">
                                <div class="col-12 paymentDiv mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <input class="radioStyle" type="radio" name="paymentMethod" id="walletCredit" value="walletCredit" checked>
                                        </div>
                                        <div class="col-8 pr-5">
                                            <label for="pickupLocation1 mb-0">
                                                <h3 class="bold blackFont" data-lang="M03381"><?php echo $translations['M03381'][$language]; /* Wallet Credits */?></h3>
                                                <div class="grayFont" data-lang="M03382"><?php echo $translations['M03382'][$language]; /* Use wallet credits to make faster payment online */?>.</div>
                                                <div class="blackFont mt-3" data-lang="M00219"><?php echo $translations['M00219'][$language]; /* Balance */?>: <span id="totalBalance"></span> IDR</div>
                                            </label>
                                        </div>
                                        <div class="col-2 text-right">
                                            <img class="paymentIcon" src="images/project/walletCredit.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 paymentDiv mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <input class="radioStyle" type="radio" name="paymentMethod" id="creditCard" value="nicepay">
                                        </div>
                                        <div class="col-8 pr-5">
                                            <label for="pickupLocation1 mb-0">
                                                <h3 class="bold blackFont" data-lang="M03530"><?php echo $translations['M03530'][$language]; /* Virtual Account */?></h3>
                                                <div class="grayFont" data-lang="M03531"><?php echo $translations['M03531'][$language]; /* Use virtual account to make faster payment online */?>.</div>
                                            </label>

                                            <div class="paymentSelectWrap" onclick="showDropdown();">
                                                <div id="selectDiv" class="customDropdown my-auto" style="display: none;">
                                                    <a id="paymentMethod" href="javascript:;" class="dropbtn" data-custom="">Public Bank</a><i class="fas fa-chevron-down downIcon"></i>
                                                    <div id="selectType" class="customDropdown-content">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-right">
                                            <img class="paymentIcon" src="images/project/virtualAccount.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 paymentDiv">
                                    <div class="row align-items-center">
                                        <div class="col-2 text-center">
                                            <input class="radioStyle" type="radio" name="paymentMethod" id="creditCard" value="creditCard" >
                                        </div>
                                        <div class="col-8 pr-5">
                                            <label for="pickupLocation1 mb-0">
                                                <h3 class="bold blackFont" data-lang="M03537"><?php echo $translations['M03537'][$language]; /* Credit Card */?></h3>
                                                <div class="grayFont" data-lang="M03538"><?php echo $translations['M03538'][$language]; /* Use credit card to make faster payment online */?>.</div>
                                            </label>
                                        </div>
                                        <div class="col-2 text-right">
                                            <img class="paymentIcon" src="images/project/mastercard.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-1 p-4 pickupDiv">
                                <div class="row m-2 justify-content-between promoInput" style="display: none;">
                                    <div class="col-12 px-0">
                                        <label class="promocodeTitle" data-lang="M03262"><?php echo $translations['M03262'][$language]; //Promo Code ?></label>
                                    </div>
                                </div>
                                <div class="row m-2 justify-content-between promoInput" style="display: none;">
                                    <div class="col-12 px-0">
                                        <div class="form-group mb-0">
                                            <div class="inputBox input-group">
                                                <input id="promoCode" type="text" class="form-control inputPrepend" placeholder="<?php echo $translations['M03523'][$language]; //Enter Promocode ?>">
                                                <div class="input-group-append m-1">
                                                    <span class="login-input-group-text inputAppendText promocodeItem">
                                                        <button id="applyPromoBtn" class="btn btn-primary whiteFont btnAddToCart" data-lang="M03263"><?php echo $translations['M03263'][$language]; //Apply Code ?></button>
                                                        <i id="checkmark" class="fas fa-check" style="display: none;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2 justify-content-between">
                                    <span id="voucherCode" class="errorSpan text-danger"></span>
                                </div>
                                <div class="row m-2 justify-content-between showPromo" style="display: none;">
                                    <input type="checkbox" name="voucherCode" id="voucherCheck" hidden>
                                    <p class="blackFont thin mb-0"><?php echo $translations['M03524'][$language]; //Promo code applied! We've taken ?> <span class="discountAmount"></span> <?php echo $translations['M03525'][$language]; //off your order ?></p>
                                </div>
                                <div class="row m-2 mb-3 justify-content-between showPromo" style="display: none;">
                                    <p id="removePromo" data-lang="M03526" class="removePromo"><?php echo $translations['M03526'][$language]; //Remove this code ?></p>
                                </div>
                                <div class="row d-flex m-2 justify-content-between">
                                    <p class="blackFont thin" data-lang="M02881"><?php echo $translations['M02881'][$language]; /* Subtotal */?></p>
                                    <p class="bold blackFont" id="subTotal"></p>
                                </div>
                                <div class="row d-flex m-2 justify-content-between">
                                    <p class="blackFont thin" data-lang="M02882"><?php echo $translations['M02882'][$language]; /* Shipping Fee */?></p>
                                    <p class="bold blackFont" id="shippingFee"></p>

                                    <!-- <p class="bold blackFont" data-lang="M00061"><?php echo $translations['M00061'][$language]; /* Free */?></p> -->
                                </div>
                                <div class="row d-flex m-2 justify-content-between">
                                    <p class="blackFont thin" data-lang="M02924"><?php echo $translations['M02924'][$language]; /* Tax */?><span id="taxPercentage"></span></p>
                                    <p class="bold blackFont" id="taxes"></p>
                                </div>

                                <div id="totalInsuranceChargesDisplay">
                                    <div class="row d-flex m-2 justify-content-between" id="totalInsuranceCharges">
                                        <p class="blackFont thin" data-lang="M03761"><?php echo $translations['M03761'][$language]; /* Total Insurance Charges */?>
                                            <span id=""></span>
                                        </p>
                                        <p class="bold blackFont" id="insuranceTaxes"></p>
                                    </div>
                                </div>

                                <div class="row m-2 justify-content-between showPromo" style="display: none;">
                                    <p class="blackFont thin" data-lang="M03188"><?php echo $translations['M03188'][$language]; /* Promocode */?></p>
                                    <p class="bold redFont discountAmount"></p>
                                </div>
                                <div class="row d-flex m-2 justify-content-between borderline3">
                                    <p class="blackFont thin" data-lang="M00250"><?php echo $translations['M00250'][$language]; /* Total */?></p>
                                    <p class="bold blackFont" id="totalPrice"></p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary whiteFont btnAddToCart" id="confirmBtn" data-lang="M03199"><?php echo $translations['M03199'][$language]; /* Pay Now */?>&nbsp;<i class="ml-1 fas fa-chevron-right"></i></button>
                                    <div class="col-12 mt-3 text-danger" id="totalAmount"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="" id="modalIcon" class="modal-icon">
                <div id="canvasTitle" class="mt-3 modal-title"><span data-lang="M00667"><?php echo $translations['M00667'][$language]; //Payment Confirmation ?></span></div>
                <div id="canvasAlertMessage" class="mt-3 modalText"><?php echo $translations['M03528'][$language]; //Do you want to proceed the payment of your purchase to Metafiz? ?></div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button id="modalCloseBtn" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M02663'][$language]; //Cancel ?>
                 </button>
                 <button id="modalConfirmBtn" type="button" class="btn btn-primary letterSpace ml-3" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M03529'][$language]; //Proceed ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="" id="modalIcon" class="modal-icon">
                <div class="mt-3 modal-title"><span data-lang="M00667"><?php echo $translations['M03535'][$language]; //Congratulation ?></span></div>
                <div class="mt-3 modalText row justify-content-center">
                    <div class="col-sm-9 form-group m-b-1">
                        <label class="control-label float-left" for="" data-th="name">
                            <?php echo $translations['M03532'][$language]; //Vacct No ?>
                            
                        </label>
                        <input disabled="" id="nicepayNo" type="text" class="form-control">
                    </div>
                    <div class="col-sm-9 form-group m-b-1">
                        <label class="control-label float-left" for="" data-th="name">
                            <?php echo $translations['M00467'][$language]; //Bank ?>
                        </label>
                        <input disabled="" id="nicepayBank" type="text" class="form-control">
                    </div>
                    <div class="col-sm-9 form-group m-b-1">
                        <label class="control-label float-left" for="" data-th="name">
                            <?php echo $translations['M03533'][$language]; //Tx ID ?>
                            
                        </label>
                        <input disabled="" id="nicepayID" type="text" class="form-control">
                    </div>
                    <div class="col-sm-9 form-group m-b-1">
                        <label class="control-label float-left" for="" data-th="name">
                            <?php echo $translations['M01795'][$language]; //Amount ?>
                        </label>
                        <input disabled="" id="nicepayAmount" type="text" class="form-control">
                    </div>
                    <div class="col-sm-9 form-group m-b-1">
                        <label class="control-label float-left" for="" data-th="name">
                            <?php echo $translations['M03534'][$language]; //Vacct Valid TM  ?>
                        </label>
                        <input disabled="" id="nicepayTM" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button id="closeModalBtn" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;

var sendData = '<?php echo $_POST['sendData']; ?>';
var pickupID = '<?php echo $_POST['pickupID']; ?>';
var isBillingAddress = parseInt('<?php echo $_POST['isBillingAddress']; ?>');
var packageAry = getPackageAry();

var deliveryOption;
var fullName;
var countryID;
var address;
var stateID;
var district;
var subDistrict;
var city;
var postalCode;
var dialingArea;
var phoneNumber;
var emailAddress;
var placementPosition;

var purchaseSpecialNote;
var purchaseRemark;

var billingFullName;
var billingCountryID;
var billingAddress;
var billingDistrict;
var billingSubDistrict;
var billingCity;
var billingStateID;
var billingPostalCode;
var billingDialingArea;
var billingPhoneNumber;
var billingEmailAddress;
var courierService = '<?php echo $_POST['courierDisplay']; ?>';
var courierCompany = '<?php echo $_POST['courierCompany']; ?>';
var saveDeliveryType = '<?php echo $_POST['saveDeliveryType']; ?>';
var insuranceOption = '<?php echo $_POST['insuranceOption']; ?>';
// var insuranceTax;


var deliveryAddressID;
var packageIDAry;
var totalPrice;

var currentPaymentMethod;

$(document).ready(function() {
    // console.log(sendData);

    $(window).on("click",function(event){
        if (!event.target.matches('#selectDiv') && !event.target.matches('#paymentMethod')) {
            $("#selectType").hide();
        }
    })

    if (sendData == "") {
        window.location.href='checkout'
    } else {
        sendData = JSON.parse(sendData)
    }

    loadPayment(sendData);
    loadBankOptions(sendData);

    if(deliveryOption != 'pickup') {
        loadPackageID(packageAry)
        $('.promoInput').show();
    }

    // insuranceTax = numberThousand(sendData.insuranceTaxes,2)

    if(insuranceOption == 0){
        $("#totalInsuranceChargesDisplay").hide();
    }else{
        $("#totalInsuranceChargesDisplay").show();
        $("#insuranceTaxes").html("IDR " + numberThousand(sendData.insuranceTaxes,2))
    }

    $('input[name="paymentMethod"]').on('change', function(){
        if($('input[name="paymentMethod"]:checked').val() == "nicepay")
            $('.customDropdown').show();
        else{
            $('.customDropdown').hide();
        }
    })

    $(".choosePaymentMethod").click(function(){
        var selectedOption = $(this).html();
        $("#paymentMethod").html(`${selectedOption}`);
        $("#paymentMethod").data("custom",($(this).data("custom")));
        currentPaymentMethod = $(this).data("custom");
    });

    $('#applyPromoBtn').click(function() {
        $(".invalid-feedback").remove();
        var voucherCode = $('#promoCode').val();

        var formData = {
            command: 'checkValidVoucher',
            voucherCode,
            packageIDAry,
            courierService
        }

        var fCallback = loadVoucherView;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#removePromo').click(function() {
        $('#promoCode').prop('disabled', false);
        $('#promoCode').val("");
        $('.discountAmount').text("");
        $('#totalPrice').text(getCurrency()+" "+numberThousand(totalPrice, 2))
        $('.showPromo').hide();
        $('#applyPromoBtn').show();
        $('#checkmark').hide();
        $('#voucherCheck').prop('checked', false);
    });

    $('#confirmBtn').click(function() {
        $("#confirmPaymentModal").modal("toggle");
    });

    $('#closeModalBtn').click(function(){
        window.location.href = 'dashboard';
    })

    $('#successModal').on('hidden.bs.modal', function () {
        window.location.href = 'dashboard';
    });

    $("#modalConfirmBtn").click(function(){
        $(".invalid-feedback").remove();

        if (pickupID) {

            var formData  = {
                command: 'purchasePackageConfirmation',
                step: 4,
                packageAry,
                deliveryOption,
                pickupID,
                purchaseSpecialNote,
                purchaseRemark,
                placementPosition
            }

        } else {

            if (isBillingAddress) {

                if (deliveryAddressID) {

                    var formData  = {
                        command: 'purchasePackageConfirmation',
                        step: 5,
                        packageAry,
                        deliveryOption,
                        addressID: deliveryAddressID,
                        isBillingAddress,
                        purchaseSpecialNote,
                        purchaseRemark,
                        courierService,
                        courierCompany,
                        placementPosition,
                        insuranceOption
                    }

                } else {

                    var formData  = {
                        command: 'purchasePackageConfirmation',
                        step: 5,
                        packageAry,
                        deliveryOption,
                        fullName,
                        countryID,
                        address,
                        stateID,
                        district,
                        subDistrict,
                        city,
                        // streetName,
                        postalCode,
                        dialingArea,
                        phoneNumber,
                        emailAddress,
                        isBillingAddress,
                        purchaseSpecialNote,
                        purchaseRemark,
                        courierService,
                        courierCompany,
                        placementPosition,
                        insuranceOption
                    }

                }

            } else {

                if (deliveryAddressID) {

                    var formData  = {
                        command: 'purchasePackageConfirmation',
                        step: 5,
                        packageAry,
                        deliveryOption,
                        addressID: deliveryAddressID,
                        isBillingAddress,
                        billingFullName,
                        billingCountryID,
                        billingAddress,
                        billingDistrict,
                        billingSubDistrict,
                        billingCity,
                        // billingStreetName,
                        billingStateID,
                        billingPostalCode,
                        billingDialingArea,
                        billingPhoneNumber,
                        billingEmailAddress,
                        purchaseSpecialNote,
                        purchaseRemark,
                        courierService,
                        courierCompany,
                        placementPosition,
                        insuranceOption
                    }

                } else {

                    var formData  = {
                        command: 'purchasePackageConfirmation',
                        step: 4,
                        packageAry,
                        deliveryOption,
                        fullName,
                        countryID,
                        address,
                        stateID,
                        district,
                        subDistrict,
                        city,
                        postalCode,
                        dialingArea,
                        phoneNumber,
                        emailAddress,
                        isBillingAddress,
                        billingFullName,
                        billingCountryID,
                        billingAddress,
                        billingDistrict,
                        billingSubDistrict,
                        billingCity,
                        // billingStreetName,
                        billingStateID,
                        billingPostalCode,
                        billingDialingArea,
                        billingPhoneNumber,
                        billingEmailAddress,
                        purchaseSpecialNote,
                        purchaseRemark,
                        courierService,
                        courierCompany,
                        placementPosition
                    }

                }

            }

        }

        if($('#voucherCheck').prop('checked')) {
            formData['voucherCode'] = $('#promoCode').val();
        }

        if($('input[name="paymentMethod"]:checked').val() == "nicepay"){
            nicepayCallback();
        }else if($('input[name="paymentMethod"]:checked').val() == "creditCard"){
            creditCardCallback();
        }else{
            var fCallback = paymentSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });
});


function loadPayment(data) {
    if(data.placementPosition){
        $(".paymentPlacementWrap").show();
    }

    $("#subTotal").html(getCurrency() + " " + addCommas(data.subTotal))
    if (data.shippingFee > 0) {
        $("#shippingFee").html(getCurrency() + " " + addCommas(data.shippingFee))
    } else {
        $("#shippingFee").html('<?php echo $translations['M00061'][$language]; /* Free */?>')
    }
    $("#taxPercentage").html(" (" + parseFloat(data.taxPercentage) + "%)")
    $("#taxes").html(getCurrency() + " " + addCommas(data.taxes))
    $("#totalPrice").html(getCurrency() + " " + addCommas(data.totalPrice))
    totalPrice = data.totalPrice;

    deliveryOption = data.deliveryOption
    deliveryAddressID = data.deliveryAddressID
    placementPosition = data.placementPosition || "-";
    var placementPositionDisplay;
    if(placementPosition == 1){
        placementPositionDisplay = '<?php echo $translations['M00198'][$language]; /* Left */?>'
    }else{
        placementPositionDisplay = '<?php echo $translations['M00200'][$language]; /* Right */?>'
    }
    switch(data.deliveryOption) {
      case 'delivery':
        $('.pickupSection').hide();
        $('.deliverySection').show();
        var selectedDeliveryAddress = data.deliveryAddressData[0]
        fullName = selectedDeliveryAddress.fullName;
        address = selectedDeliveryAddress.address
        district = selectedDeliveryAddress.districtID;
        subDistrict = selectedDeliveryAddress.subDistrictID;
        city = selectedDeliveryAddress.cityID;
        // streetName = selectedDeliveryAddress.streetName;
        postalCode = selectedDeliveryAddress.postalCodeID;
        stateID = selectedDeliveryAddress.stateID;
        countryID = selectedDeliveryAddress.countryID;
        dialingArea = selectedDeliveryAddress.dialingArea;
        phoneNumber = selectedDeliveryAddress.phoneNumber;
        emailAddress = selectedDeliveryAddress.emailAddress || "-";
        purchaseRemark = data.purchaseRemark || "-";
        purchaseSpecialNote = data.purchaseSpecialNote || "-";

        $("#fullNameShipping").html(fullName)
        $("#address").html(address)
        $("#city").html(selectedDeliveryAddress.city)
        $("#district").html(selectedDeliveryAddress.district)
        $("#subDistrict").html(selectedDeliveryAddress.subDistrict)
        // $("#streetName").html(streetName)
        $("#postalCode").html(selectedDeliveryAddress.postalCode)
        $("#stateDisplay").html(selectedDeliveryAddress.stateName || "-")
        $("#countryDisplay").html(selectedDeliveryAddress.countryDisplay)
        $(".placementPositionDisplay").html(placementPositionDisplay)

        var courierDisplay = '<?php echo $_POST['courierDisplay']; ?>';
        if(courierDisplay != "") {
            $("#courierDisplay").html(courierDisplay)
            $("#courierDisplayWrapper").show();
        }
        var courierCompany = '<?php echo $_POST['courierCompany']; ?>';
        if(courierCompany != "") {
            $("#courierCompany").html(courierCompany)
            $("#courierDisplayWrapper2").show();
        }
        
        $("#phoneNumber").html("(+"+dialingArea+") "+phoneNumber)
        $("#emailAddress").html(emailAddress)
        $(".purchaseRemark").html(purchaseRemark)
        $(".purchaseSpecialNote").html(purchaseSpecialNote)


        var billingAddressData = data.billingAddressData[0]
        // billingFullName = billingAddressData.fullName;
        // billingAddress = billingAddressData.address
        // billingDistrict = billingAddressData.districtID;
        // billingSubDistrict = billingAddressData.subDistrictID;
        // billingCity = billingAddressData.cityID;
        // billingStreetName = billingAddressData.streetName;
        // billingPostalCode = billingAddressData.postalCodeID;
        // billingStateID = billingAddressData.stateID;
        // billingCountryID = billingAddressData.countryID;
        // billingDialingArea = billingAddressData.dialingArea;
        // billingPhoneNumber = billingAddressData.phoneNumber;
        // billingEmailAddress = billingAddressData.emailAddress || "-";

        $("#billingFullName").html(billingAddressData.fullName)
        $("#billingAddress").html(billingAddressData.address)
        $("#billingDistrict").html(billingAddressData.district)
        $("#billingSubDistrict").html(billingAddressData.subDistrict)
        $("#billingCity").html(billingAddressData.city)
        // $("#billingStreetName").html(billingStreetName)
        $("#billingPostalCode").html(billingAddressData.postalCode)
        $("#billingStateDisplay").html(billingAddressData.stateName || "-")
        $("#billingCountryDisplay").html(billingAddressData.countryDisplay)
        $("#billingPhoneNumber").html("(+"+billingAddressData.dialingArea+") "+billingAddressData.phoneNumber)
        $("#billingEmailAddress").html(billingAddressData.emailAddress)

        break;
      case 'pickup':
        $('.pickupSection').show();
        $('.deliverySection').hide();
        var selectedPickupAddress = (data.pickupAddressData).filter((address) => address.pickupID == pickupID )
        purchaseRemark = data.purchaseRemark || "-";
        purchaseSpecialNote = data.purchaseSpecialNote || "-";
        // placementPosition = data.placementPosition || "-";
        $("#pickupName").html(selectedPickupAddress[0].name)
        $("#pickupAddress").html(selectedPickupAddress[0].address)
        $(".purchaseRemark").html(purchaseRemark)
        $(".purchaseSpecialNote").html(purchaseSpecialNote)
        $(".placementPositionDisplay").html(placementPositionDisplay)
        break;
      default:
        $('.pickupSection').hide();
        $('.deliverySection').show();
    }    
}

function loadPackageID(data) {
    packageIDAry = [];
    $.each(data, function(key, value) {
        packageIDAry.push(value['packageID']);
    });
}

function loadVoucherView(data, message) {
    // console.log(data);
    $('#promoCode').prop('disabled', true);
    $('.discountAmount').text(getCurrency()+" "+numberThousand(data.discountAmount, 2));
    $('#totalPrice').text(getCurrency()+" "+numberThousand((totalPrice-data.discountAmount), 2))
    $('.showPromo').show();
    $('#applyPromoBtn').hide();
    $('#checkmark').show();
    $('#voucherCheck').prop('checked', true);
}

function paymentSuccess(data, message) {
    clearCart();
    if($('input[name="paymentMethod"]:checked').val() == "nicepay"){
        $("#successModal").modal("toggle");
        var temp = data.vacctvalidtm;
        $("#nicepayTM").val(`${temp[0]}${temp[1]}:${temp[2]}${temp[3]}:${temp[4]}${temp[5]}`)
        $("#nicepayAmount").val(data.amount)
        $("#nicepayID").val(data.txid)
        $("#nicepayNo").val(data.vacctNo)
        $("#nicepayBank").val(data.bank)
    }else if($('input[name="paymentMethod"]:checked').val() == "creditCard"){
        window.location.href = data.redirectURL;
    }else{
        showMessage(message, 'success', '<span data-lang="M02651"><?php echo $translations['M02651'][$language]; //Congratulation ?></span>', '', 'dashboard');
    }
}

function showDropdown() {
    $("#selectType").css('display')=='none'?$("#selectType").show():$("#selectType").hide();
}

function loadBankOptions(data) {
    var bankOption = data.nicepayBankAry;
    var buildOptions = "";
    $.each(bankOption, function(k,v) {
        buildOptions += `
            <a href="javascript:;" class="choosePaymentMethod" data-custom="${v['code']}">
                ${v['name']}
            </a>
        `;
    })

    $("#paymentMethod").html(`${bankOption[0].name}`)
    $("#paymentMethod").data("custom",bankOption[0].code)
    $("#selectType").html(buildOptions);
}

function nicepayCallback(){
    document.cookie = `sessionData=<?php echo json_encode($_SESSION) ; ?>`;
    
    $(".invalid-feedback").remove();
    var makePaymentMethod = "nicepay"
    var nicepayBankCode = $("#paymentMethod").data('custom');

    if (pickupID) {

        var formData  = {
            command: 'callNicepayPaymentGateway',
            step: 5,
            packageAry,
            deliveryOption,
            pickupID,
            purchaseSpecialNote,
            purchaseRemark,
            makePaymentMethod,
            nicepayBankCode,
            insuranceOption
        }

    } else {

        if (isBillingAddress) {

            if (deliveryAddressID) {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    addressID: deliveryAddressID,
                    isBillingAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    nicepayBankCode,
                    placementPosition,
                    insuranceOption
                }

            } else {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    fullName,
                    countryID,
                    address,
                    stateID,
                    district,
                    subDistrict,
                    city,
                    // streetName,
                    postalCode,
                    dialingArea,
                    phoneNumber,
                    emailAddress,
                    isBillingAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    nicepayBankCode,
                    placementPosition,
                    insuranceOption
                }

            }

        } else {

            if (deliveryAddressID) {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    addressID: deliveryAddressID,
                    isBillingAddress,
                    billingFullName,
                    billingCountryID,
                    billingAddress,
                    billingDistrict,
                    billingSubDistrict,
                    billingCity,
                    // billingStreetName,
                    billingStateID,
                    billingPostalCode,
                    billingDialingArea,
                    billingPhoneNumber,
                    billingEmailAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    nicepayBankCode,
                    placementPosition,
                    insuranceOption
                }

            } else {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    fullName,
                    countryID,
                    address,
                    stateID,
                    district,
                    subDistrict,
                    city,
                    postalCode,
                    dialingArea,
                    phoneNumber,
                    emailAddress,
                    isBillingAddress,
                    billingFullName,
                    billingCountryID,
                    billingAddress,
                    billingDistrict,
                    billingSubDistrict,
                    billingCity,
                    // billingStreetName,
                    billingStateID,
                    billingPostalCode,
                    billingDialingArea,
                    billingPhoneNumber,
                    billingEmailAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    nicepayBankCode,
                    placementPosition,
                    insuranceOption
                }

            }

        }

    }

    if($('#voucherCheck').prop('checked')) {
        formData['voucherCode'] = $('#promoCode').val();
    }
    var fCallback = paymentSuccess;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function creditCardCallback(){
    $(".invalid-feedback").remove();
    var makePaymentMethod = "creditCard"

    if (pickupID) {

        var formData  = {
            command: 'callNicepayPaymentGateway',
            step: 5,
            packageAry,
            deliveryOption,
            pickupID,
            purchaseSpecialNote,
            purchaseRemark,
            makePaymentMethod,
            placementPosition,
            insuranceOption
        }

    } else {

        if (isBillingAddress) {

            if (deliveryAddressID) {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    addressID: deliveryAddressID,
                    isBillingAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    placementPosition,
                    insuranceOption
                }

            } else {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    fullName,
                    countryID,
                    address,
                    stateID,
                    district,
                    subDistrict,
                    city,
                    // streetName,
                    postalCode,
                    dialingArea,
                    phoneNumber,
                    emailAddress,
                    isBillingAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    placementPosition,
                    insuranceOption
                }

            }

        } else {

            if (deliveryAddressID) {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    addressID: deliveryAddressID,
                    isBillingAddress,
                    billingFullName,
                    billingCountryID,
                    billingAddress,
                    billingDistrict,
                    billingSubDistrict,
                    billingCity,
                    // billingStreetName,
                    billingStateID,
                    billingPostalCode,
                    billingDialingArea,
                    billingPhoneNumber,
                    billingEmailAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    placementPosition,
                    insuranceOption
                }

            } else {

                var formData  = {
                    command: 'callNicepayPaymentGateway',
                    step: 5,
                    packageAry,
                    deliveryOption,
                    fullName,
                    countryID,
                    address,
                    stateID,
                    district,
                    subDistrict,
                    city,
                    postalCode,
                    dialingArea,
                    phoneNumber,
                    emailAddress,
                    isBillingAddress,
                    billingFullName,
                    billingCountryID,
                    billingAddress,
                    billingDistrict,
                    billingSubDistrict,
                    billingCity,
                    // billingStreetName,
                    billingStateID,
                    billingPostalCode,
                    billingDialingArea,
                    billingPhoneNumber,
                    billingEmailAddress,
                    purchaseSpecialNote,
                    purchaseRemark,
                    courierService,
                    courierCompany,
                    makePaymentMethod,
                    placementPosition,
                    insuranceOption
                }

            }

        }

    }

    if($('#voucherCheck').prop('checked')) {
        formData['voucherCode'] = $('#promoCode').val();
    }
    var fCallback = paymentSuccess;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function getNavBarDetails(data, message) {
    $('#totalBalance').html(numberThousand(data.totalBalance, 2));
}
</script>