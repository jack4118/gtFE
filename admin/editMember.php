<?php 
    session_start();

    include_once("mobileDetect.php");
    $detect = new Mobile_Detect;
    
    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapse">
                                                <?php echo $translations['A00280'][$language]; /* Menu */ ?>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 menuActive active">
                                                <a>
                                                    <?php echo $translations['A00281'][$language]; /* Edit Profile */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00282'][$language]; /* Password Maintain */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00283'][$language]; /* Referral Diagram */ ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <?php 
                            if( $detect->isMobile() ) {
                                include 'editMemberSideBarXs.php';
                            }else{
                                include 'editMemberSideBar.php';
                            }
                        ?>

                        <div class="col-lg-9 col-md-9">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00284'][$language]; /* Member Details */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> :
                                                        </span>
                                                        <b id="topName" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?> :
                                                        </span>
                                                        <b id="topUsername" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?> :
                                                        </span>
                                                        <b id="topMemberID" class="m-l-rem1"></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00291'][$language]; /* Edit Member Details */ ?>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" style="font-size: 1.2em;">
                                                            Credentials
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="name" type="text" class="form-control">
                                                        <span id="nameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                            <?php echo $translations['A00195'][$language]; /* Email Address */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="email" type="text" class="form-control">
                                                        <span id="emailError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00171'][$language]; /* Phone */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div id="phoneDiv" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                            <select id="dialingArea" class="form-control" style="border: none; max-width: 90px;"></select>
                                                            <input type="text" id="phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="border: none;">
                                                        </div>
                                                        <span id="phoneError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="identityType">
                                                            Identity Type
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="identityType" class="form-control">
                                                            <option value="nric">KTP</option>
                                                            <option value="passport">Passport</option>
                                                        </select>
                                                        <span id="identityTypeError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div id="identityNumberDiv" class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="identityNumber">
                                                            ID Number (KTP)
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="identityNumber" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <span id="identityNumberError" class="customError text-danger"></span>
                                                    </div>
                                                    <div id="passportDiv" class="col-sm-6 form-group" style="display: none;">
                                                        <label class="control-label" for="" data-th="passport">
                                                            Passport Number
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="passport" type="text" class="form-control">
                                                        <span id="identityNumberError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="dob">
                                                            DOB
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="dob" class="form-control">
                                                        <span id="dobError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <div class="col-sm-12 px-0">
                                                            <label class="control-label" for="" data-th="#">
                                                                <?php echo $translations['A01441'][$language]; /* Gender */ ?>
                                                                <span class="text-danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 px-0">
                                                            <input class="genderRadio" id="Male" type="radio" value="male" name="genderRadio" />
                                                            <label for="Male">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 px-0">
                                                            <input class="genderRadio" id="Female" type="radio" value="female" name="genderRadio" />
                                                            <label for="Female">
                                                                Female
                                                            </label>
                                                        </div>
                                                        <span id="genderError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="countryID" class="form-control">
                                                        </select>
                                                        <span id="countryIDError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="state">
                                                <input type="hidden" id="city">
                                                <input type="hidden" id="district">
                                                <input type="hidden" id="subDistrict">

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <hr style="color: #aaa;">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" style="font-size: 1.2em;">
                                                            Additional Info
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Status
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="martialStatus" class="form-control beforeLoginForm">
                                                            <option value="">--- Select Martial Status ---</option>
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                            <option value="widowed">Widowed</option>
                                                            <option value="divorced">Divorced</option>
                                                            <option value="separated">Separated</option>
                                                        </select>
                                                        <span id="martialStatusError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Numbers of Child
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="childNumber" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <span id="childNumberError" class="customError text-danger" error="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label" for="" data-th="#">
                                                                    Child Age
                                                                    <span class="text-danger">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <select id="childAge" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group">
                                                                <div id="childAgeList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span id="childAgeError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label" for="" data-th="#">
                                                                    NPWP Number
                                                                    <span class="text-danger">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <input type="text" id="taxNumber" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <span id="taxNumberError" class="customError text-danger" error="error"></span>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label" for="" data-th="#">
                                                                    Member ID
                                                                    <span class="text-danger">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <input type="text" id="memberID" class="form-control" disabled>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label" for="" data-th="#">
                                                                    SponsorID
                                                                    <span class="text-danger">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <input type="text" id="sponsorID" class="form-control" disabled>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label" for="" data-th="#">
                                                                    Account Status
                                                                    <span class="text-danger">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <select id="status" class="form-control">
                                                                    <option value="active">
                                                                        Active
                                                                    </option>
                                                                    <option value="inactive" disabled hidden>
                                                                        Inactive
                                                                    </option>
                                                                    <option value="disabled" disabled hidden>
                                                                        Disabled
                                                                    </option>
                                                                    <option value="suspended">
                                                                        Suspended
                                                                    </option>
                                                                    <option value="freezed" disabled hidden>
                                                                        Freezed
                                                                    </option>
                                                                    <option value="terminated">
                                                                        Terminated
                                                                    </option>
                                                                </select>
                                                                <span id="statusError" class="customError text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <hr style="color: #aaa;">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" style="font-size: 1.2em;">
                                                            Bank Info
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Bank Name
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="normalbankID" class="form-control"></select>
                                                        <!-- <select id="normalbankID" class="form-control"></select> -->
                                                        <span id="bankIDError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Bank Branch
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="branch" class="form-control">
                                                        <span id="bankBranchError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Bank City
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="bankCity" class="form-control">
                                                        <span id="bankCityError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Account Holder's Name
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="accountHolder" class="form-control">
                                                        <span id="bankAccHolderError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Bank Account Number
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="accountNo" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <span id="bankAccError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <hr style="color: #aaa">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" style="font-size: 1.2em;">
                                                            Billing Address
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Name
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="billingName" class="form-control">
                                                        <span id="fullnameErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Address
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="billingAddress" class="form-control">
                                                        <span id="addressErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            District
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="billingDistrict" class="form-control"></select>
                                                        <span id="streetNameErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Sub District
                                                            <!-- <span class="text-danger">
                                                                *
                                                            </span> -->
                                                        </label>
                                                        <select id="billingSubDistrict" class="form-control"></select>
                                                        <span id="subDistrictErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            City
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="billingCity" class="form-control"></select>
                                                        <span id="cityErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Postal Code
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="billingPostalCode" class="form-control"></select>
                                                        <span id="postalCodeErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            State
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="billingState" class="form-control"></select>
                                                        <span id="billingStateError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Country
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="billingCountryID" class="form-control"></select>
                                                        <span id="billingCountryIDError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Email
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="billingEmail" class="form-control">
                                                        <span id="emailErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Contact No
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div id="phoneBilling" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                            <select id="billingDialingArea" class="form-control" style="border: none; max-width: 90px;"></select>
                                                            <input type="text" id="billingPhone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="border: none;">
                                                        </div>
                                                        <span id="phoneErrorBilling" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <hr style="color: #aaa;">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" style="font-size: 1.2em;">
                                                            Delivery Address
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Name
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="deliveryName" class="form-control">
                                                        <span id="fullnameErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Address
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="deliveryAddress" class="form-control">
                                                        <span id="addressErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            District
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="deliveryDistrict" class="form-control"></select>
                                                        <span id="districtErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Sub District
                                                        </label>
                                                        <select id="deliverySubDistrict" class="form-control"></select>
                                                        <span id="subDistrictErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            City
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="deliveryCity" class="form-control"></select>
                                                        <span id="cityErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Postal Code
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="deliveryPostalCode" class="form-control"></select>
                                                        <span id="postalCodeErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            State
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="deliveryState" class="form-control"></select>
                                                        <span id="deliveryStateError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Country
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="deliveryCountryID" class="form-control"></select>
                                                        <span id="deliveryCountryIDError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Email
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" id="deliveryEmail" class="form-control">
                                                        <span id="emailErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            Contact No
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div id="phoneDelivery" class="row justify-content-between mx-0 form-control beforeLoginForm" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                            <select id="deliveryDialingArea" class="form-control" style="border: none; max-width: 90px;"></select>
                                                            <input type="text" id="deliveryPhone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="border: none;">
                                                        </div>
                                                        <span id="phoneErrorDelivery" class="customError text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id="updateBtn" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="">
                                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include("footer.php"); ?>
        </div><!-- End content-page -->

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div><!-- END wrapper -->

    <script>var resizefunc = [];</script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
        var url            = 'scripts/reqClient.php';
        var jsonUrl         = 'json/addressList.json';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var countriesList;
        var districtList;
        var subDistrictList;
        var postalCodeList;
        var cityList;
        var stateList;
        var saveJsonData;
        var bankList;
        var firstCountry;

        $(document).ready(function() {
            var memberId = "<?php echo $_POST['id']; ?>";
            // if id empty return back member.php             
            if(!memberId) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }
            
            var formData  = {
                command : "getMemberDetails",
                memberId : memberId
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#dob').datepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('#identityType').change(function() {
                var identityType = $('#identityType option:selected').val();
                if(identityType=="nric") {
                    $('#identityNumberDiv').show();
                    $('#passportDiv').hide();
                } else {
                    $('#identityNumberDiv').hide();
                    $('#passportDiv').show();
                }
            });

            $('#childAge').change(function() {
                var selected = $('#childAge :selected').val();
                var text = $('#childAge :selected').text();
                if(selected != "") {
                    $('#childAgeList').append(`
                        <div class="ageTag" name="${selected}">${text} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `);
                }
                $('#childAgeList').show();
                $('#childAge').val('');
            });

            $(document).on("click", ".ageTag", function() {
                $(this).remove();
            });

            $('#updateBtn').click(function() {
                $('.customError').text('');
                var name  = $('#name').val();
                var email     = $('#email').val();
                var dialingArea = $('#dialingArea option:selected').val();
                var phone     = $('#phone').val();                
                var countryID   = $('#countryID option:selected').val();
                var identityType = $('#identityType option:selected').val();
                var identityNumber = $('#identityNumber').val();
                var passport = $('#passport').val();
                var dob = dateToTimestamp($('#dob').val());
                var gender = $('.genderRadio:checked').val();
                var martialStatus = $('#martialStatus option:selected').val();
                var childNumber = $('#childNumber').val();
                var childAge = [];
                $('.ageTag').each(function(index, value) {
                    childAge.push($(this).attr('name'));
                });
                var taxNumber = $('#taxNumber').val();
                var status = $('#status option:selected').val();
                var bankID = $('#normalbankID option:selected').val();
                var branch = $('#branch').val();
                var bankCity = $('#bankCity').val();
                var accountHolder = $('#accountHolder').val();
                var accountNo = $('#accountNo').val();
                var billingName = $('#billingName').val();
                var billingAddress = $('#billingAddress').val();
                var billingDistrict = $('#billingDistrict option:selected').val();
                var billingSubDistrict = $('#billingSubDistrict option:selected').val();
                var billingCity = $('#billingCity option:selected').val();
                var billingPostalCode = $('#billingPostalCode option:selected').val();
                var billingState = $('#billingState option:selected').val();
                var billingCountryID = $('#billingCountryID option:selected').val();
                var billingEmail = $('#billingEmail').val();
                var billingDialingArea = $('#billingDialingArea option:selected').val();
                var billingPhone = $('#billingPhone').val();
                var deliveryName = $('#deliveryName').val();
                var deliveryAddress = $('#deliveryAddress').val();
                var deliveryDistrict = $('#deliveryDistrict option:selected').val();
                var deliverySubDistrict = $('#deliverySubDistrict option:selected').val();
                var deliveryCity = $('#deliveryCity option:selected').val();
                var deliveryPostalCode = $('#deliveryPostalCode option:selected').val();
                var deliveryState = $('#deliveryState option:selected').val();
                var deliveryCountryID = $('#deliveryCountryID option:selected').val();
                var deliveryEmail = $('#deliveryEmail').val();
                var deliveryDialingArea = $('#deliveryDialingArea option:selected').val();
                var deliveryPhone = $('#deliveryPhone').val();
                
                var formData = {
                                    command             : "editMemberDetails",
                                    memberId            : memberId,
                                    name                : name,
                                    email               : email,
                                    dialingArea         : dialingArea,
                                    phone               : phone,
                                    countryID           : countryID,
                                    identityType        : identityType,
                                    dob                 : dob,
                                    gender              : gender,
                                    martialStatus       : martialStatus,
                                    childNumber         : childNumber,
                                    childAge            : childAge,
                                    taxNumber           : taxNumber,
                                    status              : status,
                                    bankID              : bankID,
                                    branch              : branch,
                                    bankCity            : bankCity,
                                    accountHolder       : accountHolder,
                                    accountNo           : accountNo,
                                    billingName         : billingName,
                                    billingAddress      : billingAddress,
                                    billingDistrict     : billingDistrict,
                                    billingSubDistrict  : billingSubDistrict,
                                    billingCity         : billingCity,
                                    billingPostalCode   : billingPostalCode,
                                    billingState        : billingState,
                                    billingCountryID    : billingCountryID,
                                    billingEmail        : billingEmail,
                                    billingDialingArea  : billingDialingArea,
                                    billingPhone        : billingPhone,
                                    deliveryName        : deliveryName,
                                    deliveryAddress     : deliveryAddress,
                                    deliveryDistrict    : deliveryDistrict,
                                    deliverySubDistrict : deliverySubDistrict,
                                    deliveryCity        : deliveryCity,
                                    deliveryPostalCode  : deliveryPostalCode,
                                    deliveryState       : deliveryState,
                                    deliveryCountryID   : deliveryCountryID,
                                    deliveryEmail       : deliveryEmail,
                                    deliveryDialingArea : deliveryDialingArea,
                                    deliveryPhone       : deliveryPhone
                                };
                identityType=="nric" ? formData['identityNumber']=identityNumber : formData['passport']=passport;
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('input#identityNumber').keypress(function( e ) {
                if(e.which === 32) 
                return false;
            });

            $('#editMemberDetails').parent().addClass('active');

            $('#backBtn').click(function() {
                $.redirect('member.php');
            });

            $('#editMemberDetails').click(function() {
                $.redirect('editMember.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#memberPasswordMaintain').click(function() {
                $.redirect('memberPasswordMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#sponsorTree').click(function() {
                $.redirect('treeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#placementTree').click(function() {
                $.redirect('treePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#uplineListing').click(function() {
                $.redirect('sponsorUpline.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#rankMaintain').click(function() {
                $.redirect('rankMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#portfolioList').click(function() {
                $.redirect('memberPortfolioList.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#activityLogsListing').click(function() {
                $.redirect('activityLogsListing.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#changeSponsor').click(function() {
                $.redirect('changeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#changePlacement').click(function() {
                $.redirect('changePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#memberCreditsTransaction').click(function() {
                $.redirect('memberCreditsTransaction.php', {id : "<?php echo $_POST['id']; ?>"});
            });
            $('#loginToMember').click(function(){
                var url = "scripts/reqAdmin.php";
                var formData  = {
                    command : "getMemberLoginDetail",
                    memberId : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loginToMember;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function loadDefaultData(data, message) {
            // Ready empty drop down
            $('#countryID').append('<option value="" name="">--- Select Country ---</option>');
            $('#childAge').append('<option value="">--- Select Age---</option>');
            $('#billingCountryID').append('<option value="" name="">--- Select Country ---</option>');
            $('#billingState').append('<option value="" data-code="" style="display: block;">--- Select State ---</option>');
            $('#deliveryCountryID').append('<option value="" name="">--- Select Country ---</option>');
            $('#deliveryState').append('<option value="" data-code="" style="display: block;">--- Select State ---</option>');
            $('#normalbankID').append('<option value="" name="" style="display: block;">--- Select Bank ---</option>');
            var countryList = data.countryList;
            var member = data.member;
            var dobArr = member['dob'].split('-');
            $('#name').val(member['fullname']);
            $('#email').val(member['email']);
            $('#phone').val(member['phoneNumber']);
            $('#dob').val(dobArr[2]+'/'+dobArr[1]+'/'+dobArr[0]);
            $('.genderRadio[id='+member['gender']+']').prop('checked', true);

            var memberDetails = data.member;
            if(memberDetails['active'] == 1){
              $('#status').val("active");
             }
             if(memberDetails['suspended'] == 1){
              $('#status').val("suspended");
             }
             if(memberDetails['terminated'] == 1){
              $('#status').val("terminated");
             }

            var credentials = data.credentials;
            if (data.identityType == "nric") {
                $('#identityType option[value=nric]').prop('selected', true);
                $('#identityNumberDiv').show();
                $('#passportDiv').hide();
            } else {
                $('#identityType option[value=passport]').prop('selected', true);
                $('#identityNumberDiv').hide();
                $('#passportDiv').show();
            }
            $('#identityNumber').val(credentials['identityNumber']);
            $('#passport').val(credentials['passport']);

            var additionalInfo = data.additionalInfo;
            $('#martialStatus option[value='+additionalInfo['martialStatus']+']').prop('selected', true);
            $('#childNumber').val(additionalInfo['childNumber']);
            $('#taxNumber').val(additionalInfo['taxNumber']);
            $('#memberID').val(additionalInfo['memberID']);
            $('#sponsorID').val(additionalInfo['sponsorID']);

            var childAgeOption = additionalInfo['childAgeOption'];
            $.each(childAgeOption, function(k, v) {
                $('#childAge').append(`<option value="${k}">${v['display']}</option>`);
            });
            if(additionalInfo['childAge'] && additionalInfo['childAge']!="-") {
                $.each(additionalInfo['childAge'].split('#'), function(k, v) {
                    $('#childAgeList').append(`
                        <div class="ageTag" name="${v}">${childAgeOption[v]['display']} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `);
                });
            }

            var billingInfo = data.billingInfo;
            var deliveryInfo = data.deliveryInfo;
            var bankList = data.bankList;
            var bankInfo = data.bankInfo;
            $.getJSON(jsonUrl, function( jsonData ) {

                saveJsonData = jsonData;
                firstCountry = saveJsonData['countriesList'][0]['id'];

                if(saveJsonData['countriesList']) {
                    $.each(saveJsonData['countriesList'], function(k,v) {
                        var selected = '';

                        var countryDisplay = '';
                        countryDisplay = v['display'];

                        $('#countryID, #billingCountryID ,#deliveryCountryID').append('<option value="'+v['id']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" '+selected+'>'+countryDisplay+'</option>');
                        $('#dialingArea, #billingDialingArea ,#deliveryDialingArea').append('<option value="'+v['countryCode']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" display="'+countryDisplay+'" '+selected+'>+'+v['countryCode']+'</option>');
                    });
                    $('#countryID').val(data.member.countryID);
                    $('#billingCountryID').val(billingInfo.countryId);
                    $('#deliveryCountryID').val(deliveryInfo.country_id);
                }

                // filter state based on country selected then build option
                var countryID = $("#countryID").val();
                var billingCountryID = $("#billingCountryID").val();
                var deliveryCountryID = $("#deliveryCountryID").val();
                filterData("test", countryID, "country_id", "stateList", "id", "stateDisplay");
                filterData("billingState", billingCountryID, "country_id", "stateList", "id", "stateDisplay");
                filterData("deliveryState", deliveryCountryID, "country_id", "stateList", "id", "stateDisplay");
                $('#billingState').val(billingInfo.stateID || $('#billingState').first().val());
                $('#deliveryState').val(deliveryInfo.stateID || $('#deliveryState').first().val());

                // filter city based on state selected then build option
                var billingState = $("#billingState").val();
                var deliveryState = $("#deliveryState").val();
                filterData("billingCity", billingState, "state_id", "cityList", "id", "cityDisplay");
                filterData("deliveryCity", deliveryState, "state_id", "cityList", "id", "cityDisplay");
                $('#billingCity').val(billingInfo.cityID || $('#billingCity').first().val());
                $('#deliveryCity').val(deliveryInfo.cityID || $('#deliveryCity').first().val());

                // filter district based on state selected then build option
                var billingCityID = $("#billingCity").val();
                var deliveryCityID = $("#deliveryCity").val();
                filterData("billingDistrict", billingCityID, "city_id", "countyList", "id", "countyDisplay");
                filterData("deliveryDistrict", deliveryCityID, "city_id", "countyList", "id", "countyDisplay");
                $('#billingDistrict').val(billingInfo.districtID || $('#billingDistrict').first().val());
                $('#deliveryDistrict').val(deliveryInfo.districtID || $('#deliveryDistrict').first().val());


                // filter sub district based on state selected then build option
                var billingCountyID = $("#billingDistrict").val();
                var deliveryCountyID = $("#deliveryDistrict").val();
                filterData("billingSubDistrict", billingCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");
                filterData("deliverySubDistrict", deliveryCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");
                $('#billingSubDistrict').val(billingInfo.subDistrictID || $('#billingSubDistrict').first().val());
                $('#deliverySubDistrict').val(deliveryInfo.subDistrictID || $('#deliverySubDistrict').first().val());

                // filter zipcode based on state selected then build option
                var billingSubCountyID = $("#billingSubDistrict").val();
                var deliverySubCountyID = $("#deliverySubDistrict").val();
                filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                $('#billingPostalCode').val(billingInfo.postCodeID || $('#billingPostalCode').first().val());
                $('#deliveryPostalCode').val(deliveryInfo.post_code_id || $('#deliveryPostalCode').first().val());

                $('#countryID').change(function(){
                    var countryID = $("#countryID").val();
                    filterData("state", countryID, "country_id", "stateList", "id", "stateDisplay");

                    var stateID = $("#state").val();
                    filterData("city", stateID, "state_id", "cityList", "id", "cityDisplay");

                    var cityID = $("#city").val();
                    filterData("district", cityID, "city_id", "countyList", "id", "countyDisplay");

                    var countyID = $("#district").val();
                    filterData("subDistrict", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var subCountyID = $("#subDistrict").val();
                    filterData("postalCode", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $('#billingCountryID').change(function(){
                    var billingCountryID = $("#billingCountryID").val();
                    filterData("billingState", billingCountryID, "country_id", "stateList", "id", "stateDisplay");

                    var billingStateID = $("#billingState").val();
                    filterData("billingCity", billingStateID, "state_id", "cityList", "id", "cityDisplay");

                    var billingCityID = $("#city").val();
                    filterData("billingDistrict", billingCityID, "city_id", "countyList", "id", "countyDisplay");

                    var billingCountyID = $("#district").val();
                    filterData("billingSubDistrict", billingCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var billingSubCountyID = $("#subDistrict").val();
                    filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $('#deliveryCountryID').change(function(){
                    var deliveryCountryID = $("#deliveryCountryID").val();
                    filterData("deliveryState", deliveryCountryID, "country_id", "stateList", "id", "stateDisplay");

                    var deliveryStateID = $("#deliveryState").val();
                    filterData("deliveryCity", deliveryStateID, "state_id", "cityList", "id", "cityDisplay");

                    var deliveryCityID = $("#city").val();
                    filterData("deliveryDistrict", deliveryCityID, "city_id", "countyList", "id", "countyDisplay");

                    var deliveryCountyID = $("#district").val();
                    filterData("deliverySubDistrict", deliveryCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var deliverySubCountyID = $("#subDistrict").val();
                    filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#billingState").change(function(){
                    var billingStateID = $(this).val();
                    filterData("billingCity", billingStateID, "state_id", "cityList", "id", "cityDisplay");

                    var billingCityID = $("#city").val();
                    filterData("billingDistrict", billingCityID, "city_id", "countyList", "id", "countyDisplay");

                    var billingCountyID = $("#district").val();
                    filterData("billingSubDistrict", billingCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var billingSubCountyID = $("#subDistrict").val();
                    filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#deliveryState").change(function(){
                    var deliveryStateID = $(this).val();
                    filterData("deliveryCity", deliveryStateID, "state_id", "cityList", "id", "cityDisplay");

                    var deliveryCityID = $("#deliveryCity").val();
                    filterData("deliveryDistrict", deliveryCityID, "city_id", "countyList", "id", "countyDisplay");

                    var deliveryCountyID = $("#deliveryDistrict").val();
                    filterData("deliverySubDistrict", deliveryCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var deliverySubCountyID = $("#deliverySubDistrict").val();
                    filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#billingCity").change(function(){
                    var billingCityID = $(this).val();
                    filterData("billingDistrict", billingCityID, "city_id", "countyList", "id", "countyDisplay");

                    var billingCountyID = $("#district").val();
                    filterData("billingSubDistrict", billingCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var billingSubCountyID = $("#subDistrict").val();
                    filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#deliveryCity").change(function(){
                    var deliveryCityID = $(this).val();
                    filterData("deliveryDistrict", deliveryCityID, "city_id", "countyList", "id", "countyDisplay");

                    var deliveryCountyID = $("#deliveryDistrict").val();
                    filterData("deliverySubDistrict", deliveryCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var deliverySubCountyID = $("#deliverySubDistrict").val();
                    filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#billingDistrict").change(function(){
                    var billingCountyID = $(this).val();
                    filterData("billingSubDistrict", billingCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var billingSubCountyID = $("#billingSubDistrict").val();
                    filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#deliveryDistrict").change(function(){
                    var deliveryCountyID = $(this).val();
                    filterData("deliverySubDistrict", deliveryCountyID, "county_id", "subCountyList", "id", "subCountyDisplay");

                    var deliverySubCountyID = $("#deliverySubDistrict").val();
                    filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#billingSubDistrict").change(function(){
                    var billingSubCountyID = $(this).val();
                    filterData("billingPostalCode", billingSubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                $("#deliverySubDistrict").change(function(){
                    var deliverySubCountyID = $(this).val();
                    filterData("deliveryPostalCode", deliverySubCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
                });

                if(bankList){
                    $.each(bankList, function(key) {
                        var selected = '';
                        if(bankList[key][0]['country_id']==firstCountry) {
                            $.each(bankList[key], function(k) {
                                $('#normalbankID').append('<option value="'+bankList[key][k]['id']+'" data-code="'+bankList[key][k]['country_id']+'" name="'+bankList[key][k]['name']+'" '+selected+'>'+bankList[key][k]['name']+'</option>');
                            });
                            $('#normalbankID').val(bankInfo.bankID);
                        }
                    });
                }
            });

            $('#branch').val(bankInfo['branch']);
            $('#bankCity').val(bankInfo['bankCity']);
            $('#accountHolder').val(bankInfo['accountHolder']);
            $('#accountNo').val(bankInfo['accountNo']);

            $('#billingName').val(billingInfo['name']);
            $('#billingAddress').val(billingInfo['address']);
            $('#billingEmail').val(billingInfo['email']);
            $('#billingPhone').val(billingInfo['phone']);

            $('#deliveryName').val(deliveryInfo['name']);
            $('#deliveryAddress').val(deliveryInfo['address']);
            $('#deliveryEmail').val(deliveryInfo['email']);
            $('#deliveryPhone').val(deliveryInfo['phone']);

            // if(member.emailVerify == 1) {
            //     $("#email").prop("disabled", true);
            // }
            if(member.IDVerification == 'Approved') {
                // $("#name").prop("disabled", true);
                // $("#identityType").prop("disabled", true);
                // $("#identityNumber").prop("disabled", true);
                // $("#passport").prop("disabled", true);
                $("#countryID").prop("disabled", true);
            }
            // if(member.NPWPVerification == 'Approved') {
            //     $("#taxNumber").prop("disabled", true);
            // }
            // if(member.BankAccountCover == 'Approved'){
            //     $("#normalbankID").prop("disabled", true);
            //     $("#branch").prop("disabled", true);
            //     $("#bankCity").prop("disabled", true);
            //     $("#accountHolder").prop("disabled", true);
            //     $("#accountNo").prop("disabled", true);
            // }

            if(data.memberDetails) {
                $('#topName').text(data.memberDetails.name);
                $('#topMemberID').text(data.memberDetails.member_id);
                $('#topUsername').text(data.memberDetails.username);
                $('#topUnitTier').text(data.memberDetails.unit_tier);
                $('#topPairingBP').text(data.memberDetails.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.memberDetails.sponsor_bonus_percentage+"%");
                $('#quantumAcc').text(data.memberDetails.quantumAcc);

                $("#username").val(data.memberDetails.username);
            }
        }

        function filterData(nextSelectID, id, idVariable, nextAdd, value, display) {
            var filteredArr = (saveJsonData[nextAdd]).filter((item) => item[idVariable] == id );
            buildOption(nextSelectID, filteredArr, value, display);
        }

        function buildOption(id, data, value, display) {
            var option = `<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>`;
            data = data.sort(function(a, b) {
                var aName = a[display].toLowerCase();
                var bName = b[display].toLowerCase(); 
                return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
            });
            $.each(data, function(k,v){
                option+=`<option value="${v[value]}">${v[display]}</option>`;
            });
            $("#"+id).html(option);
        }

        function focus() {
          [].forEach.call(this.options, function(o) {
            o.textContent = o.getAttribute('display') + ' (' + o.getAttribute('data-code') + ')';
          });
        }
        function blur() {
          [].forEach.call(this.options, function(o) {
            // console.log(o);
            o.textContent = o.getAttribute('data-code');
          });
        }

        [].forEach.call(document.querySelectorAll('#billingDialingArea'), function(s) {
            s.addEventListener('focus', focus);
            s.addEventListener('blur', blur);
            blur.call(s);
        });

        $('#billingDialingArea').change(function() {
            $('#billingDialingArea').blur();
        });

        [].forEach.call(document.querySelectorAll('#deliveryDialingArea'), function(s) {
            s.addEventListener('focus', focus);
            s.addEventListener('blur', blur);
            blur.call(s);
        });

        $('#deliveryDialingArea').change(function() {
            $('#deliveryDialingArea').blur();
        });

        function loginToMember(data, message){

            var form = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
                action: data.url
            }).appendTo(document.body);

            $('<input type="hidden" />').attr({
                name: 'id',
                value: data.id
            }).appendTo(form);

            $('<input type="hidden" />').attr({
                name: 'username',
                value: data.username
            }).appendTo(form);

            form.submit();

            form.remove();
        }

        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00501'][$language]; /* Successful updated member details. */ ?>', 'success', '<?php echo $translations['A00291'][$language]; /* Edit Member Details */ ?>', 'edit', ['editMember.php', {id : "<?php echo $_POST['id']; ?>"}]);
        }
    </script>
</body>
</html>