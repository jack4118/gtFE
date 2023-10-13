<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<body class="hideScroll">
<?php include("head.php"); ?>
<div id="wrapper">

    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>

    
    <div class="content-page">
        <div class="content">
            <div class="container bg-white">               
                <div class="row" style="margin-top:-30px;">
                    <div class="col-md-10">
                        <?php if($_POST['id'] && $_POST['poType'] != 'duplicate') { ?>
                            <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Purchase / Edit Purchase' ?></span>
                        <?php } else { ?>
                            <span style="font-size: 16px;color: black;" id="title" data-lang="M01015"><?php echo 'Purchase / Create Purchase' ?></span>
                        <?php } ?>
                    </div>
                    <?php if($_POST['id']) { ?>
                        <div class="col-md-2" style="text-align: right;">
                            <b id="poNum"></b>
                            <button style="padding: 1px 10px; background-color: #fff; color: #000; border: 1px solid #eee; border-radius: 0px; font-size: 16px; cursor: pointer; margin-left: 10px;" onclick="goToPage('previous')">
                                <i class="fa fa-angle-left"></i>
                            </button>
                            <button style="padding: 1px 10px; background-color: #fff; color: #000; border: 1px solid #eee; border-radius: 0px; font-size: 16px; cursor: pointer;" onclick="goToPage('next')">
                            <i class="fa fa-angle-right"></i>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="col-md-12 m-t-10 mb-10">
                        <div class="btn-group mr-2">
                            <button class="btn custom-button1" id="backBtn">Back</button>
                        </div>
                        <div class="btn-group mr-2">
                            <button class="btn custom-button2" id="addPO">
                                <span><i class="fa fa-floppy-o m-r-5" aria-hidden="true"></i></span>Save
                            </button>
                        </div>
                        <div class="btn-group mr-2">
                            <button class="btn custom-button2" id="editPO">
                                <span><i class="fa fa-pencil m-r-5" aria-hidden="true"></i></span>Edit
                            </button>
                        </div>
                        <div class="btn-group mr-2">
                            <button class="btn custom-button2" id="editPObtn">
                                <span><i class="fa fa-floppy-o m-r-5" aria-hidden="true"></i></span>Save
                            </button>
                        </div>
                        <div class="btn-group mr-2">
                            <button class="btn custom-button1" id="discard">
                                <span><i class="fa fa-trash" aria-hidden="true"></i></span>Discard
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="actionBtn" type="button" class="btn custom-button1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="fa fa-cog" aria-hidden="true"></i></span> Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu">
                                <a class="dropdown-item custom-dropdown-item" id="duplicateBtn">
                                    <i class="fa fa-clone"></i> Duplicate
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row customRow m-t-5">
                    <div class="col-md-8 bg-custom2" style="border-right: 1px solid #d6d4d4;">
                    
                        <?php if($_POST['id'] && $_POST['poType'] != 'duplicate') { ?>
                            <div class="row bg-white" style="border-bottom: 1px solid #d6d4d4; display: flex;">
                                <div class="col-md-3"></div>
                                <div id="rfqStatusLbl" class="col-md-1 customLabel">RFQ</div>
                                <div id="apprStatusLbl" class="col-md-1 customLabel">Approved</div>
                                <div id="prStatusLbl" class="col-md-1 customLabel">Purchasing</div>
                                <div id="psiStatusLbl" class="col-md-5 customLabel">Pending Stock In</div>
                                <div id="doneStatusLbl" class="col-md-1 customLabel">Done</div>
                            </div>
                        <?php } ?>

                        <!-- <div class="row bg-white"> -->
                        <div class="row bg-white" style = margin-bottom:-10px;>
                            <div class="col-md-12 m-t-5 m-b-5">
                                <button id="addPO" type="submit" class="custom-button2" style="display: none;">
                                    Create Purchase Order
                                </button>
                                <button id="approve" type="submit" class="custom-button2">
                                    Approve
                                </button>
                                <button id="accept" type="submit" class="custom-button2" style="display: none;">
                                    Purchasing
                                </button>
                                <button id="reject" type="submit" class="custom-button2" style="display: none;">
                                    Reject
                                </button>
                                <button id="openVendor" type="submit" class="custom-button2" style="display: none;">
                                    Open Vendor
                                </button>
                                <button id="validateStockIn" class="custom-button2" style="display: none;">
                                    Validate
                                </button>
                                <button id="cancelled" type="submit" class="custom-button2">
                                    Cancelled Purchase Order
                                </button>
                                <button id="upgradeStockIn" type="submit" class="custom-button2" style="display: none;">
                                    Confirm Purchase
                                </button>
                            </div>
                        </div>
                        <div id="poSection" class="card-box m-t-15" style="border-radius: 0px; padding:5px 30px;overflow-y: scroll;height: 400px;" >
                            <div class="">
                                <div class="form-group row">     
                                    <label for="" class="col-md-12 col-form-label customFont">Purchase</label>
                                    <?php if($_POST['id'] && $_POST['poType'] != 'duplicate') { ?>
                                        <label for="" class="col-md-12 col-form-label customFont"><h1 style="font-weight: bold; color: black;margin-top: -18px;" id="poNo"></h1></label>   
                                    <?php } else { ?>
                                        <label for="" class="col-md-12 col-form-label customFont"><h1 style="font-weight: bold; color: black;margin-top: -18px;">NEW</h1></label>   
                                    <?php } ?>
                                </div>     

                                <!-- Assign To Section -->
                                <div class="form-group row">
                                    <label for="assignAdmin" class="col-md-3 col-form-label customFont">Assignee</label>
                                    <div class="col-md-9">
                                        <select id="assignAdmin" class="form-control" required disabled></select>
                                    </div>
                                </div>

                                <!-- Vendor Section -->
                                <div class="form-group row">
                                    <label for="vendorDropdown" class="col-md-3 col-form-label customFont">Vendor</label>
                                    <div class="col-md-9">
                                        <select id="vendorDropdown" class="form-control" required disabled></select>
                                    </div>
                                </div>

                                <!-- Vendor Address Section -->
                                <div class="form-group row">
                                    <label for="branchAddressDropdown" class="col-md-3 col-form-label customFont">Vendor Address</label>
                                    <div class="col-md-9">
                                        <select id="branchAddressDropdown" class="form-control" required disabled>
                                            <option value="">Select the address</option>
                                        </select>
                                        <input id="branchAddressText" class="form-control" style="margin-left: 0px;" readonly>
                                    </div>
                                </div>

                                <!-- Purchase Date Section -->
                                <div class="form-group row">
                                    <label for="purchaseDate" class="col-md-3 col-form-label customFont">Purchase Date</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-0" id="purchaseDate" name="purchaseDate" dataName="purchaseDate" dataType="singleDate" disabled>
                                    </div>
                                </div>

                                <!-- Warehouse Section -->
                                <div class="form-group row">
                                    <label for="warehouseDropdown" id="warehouseLabel" class="col-md-3 col-form-label customFont">Warehouse</label>
                                    <div class="col-md-9">
                                        <select id="warehouseDropdown" class="form-control" required disabled>
                                            <option value="">Select a warehouse</option>
                                        </select>
                                        <!-- <input id="warehouse" type="text" class="form-control" style="display: none; margin-left: 0px;" disabled /> -->
                                    </div>
                                </div>

                                <div class="form-group row" id="createdLbl" style="display: none;">
                                    <label for="createdBy" class="col-md-3 col-form-label customFont">Created By</label>
                                    <div class="col-md-9">
                                        <input id="createdBy" type="text" class="form-control m-0" disabled />
                                    </div>
                                </div>

                                <div class="form-group row" id="approverLbl" style="display: none;">
                                    <label for="approvedBy" class="col-md-3 col-form-label customFont">Approved By</label>
                                    <div class="col-md-9">
                                        <input id="approvedBy" type="text" class="form-control m-0" disabled />
                                    </div>
                                </div>

                                <div class="row" style="margin-top:40px">
                                    <div class="col-md-12 m-t-15">
                                        <table id="productTable" class="customTable table m-b-20">
                                            <caption class="customFont" style="color:#3a5999;">Products</caption>
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Subtotal</th>
                                                    <th><i class="fa fa-ellipsis-v"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- <tr>
                                                <td colspan="5">
                                                    <input type="text" name="inputField" placeholder="Enter something...">
                                                </td>
                                            </tr> -->
                                            </tbody>
                                        </table>
                                        
                                        <button class="custom-button2" onclick="addRow3('add')" id="addProductRow">Add Product</button>
                                        <button class="custom-button1" onclick="addFOC3('add')" id="addFOCRow">Add FOC</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 m-t-15 float-right text-right" style="">
                                        <label>Total : </label>
                                        <label id="subtotal" value="0.00">RM0.00</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label>Remarks</label>
                                        <textarea id="remarks" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="row" id="imageSection" style="display: none;">
                                    <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                        Images (Recommended Size: 600 x 310 px)
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div id="buildImg">
                                            </div>

                                            <div class="col-md-4 addImgBtn">
                                                <div class="addProductImage" onclick="addImage()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Images</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <span id="imgError" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="col-xs-12">
                                        <span id="imgTypeError" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 m-t-20">
                                            <button id="addPO" type="submit" class="btn btn-primary waves-effect waves-light" style="display: none;">
                                                Create Purchase Order
                                            </button>
                                            <!-- <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Update Purchase Order
                                            </button> -->

                                            <!-- <button id="approve" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Confirm Purchase Order
                                            </button> -->
                                            <button id="accept" type="submit" class="btn btn-primary waves-effect waves-light" style="display: none;">
                                                Accept Purchase Order
                                            </button>
                                            <!-- <button id="reject" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Reject Purchase Order
                                            </button> -->
                                            <!-- <button id="cancelled" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Cancelled Purchase Order
                                            </button> -->
                                            <button id="upgradeStockIn" type="submit" class="btn btn-primary waves-effect waves-light" style="display: none;">
                                                Upgrade to Stock In
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row" id="serialNumberTable" style="display: none;">
                                    <div class="col-lg-12 m-t-30 m-b-30">
                                        <div class="card-box">
                                            <div class="card foc-card mx-0" id="foc" >
                                                <p class="text-center foc-title">Serial number</p>
                                                <div class="card-body">
                                                    <div class="form-group" id="focProd">
                                                        <label class="control-label">
                                                            Serial Number List:
                                                        </label>
                                                        <textarea type="text" id="serial" class="form-control" style="height: 100px;"></textarea>
                                                        <textarea type="text" id="serialShowIncrement" class="form-control" style="display: none;"></textarea>
                                                        <textarea type="text" id="serialForDone" class="form-control" style="display: none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            //<button id="confirmSerial" class="btn btn-primary" style="background-color: #1ca011 !important; border: 1px solid #1ca011 !important;" disabled>Confirm Serial Number</button>
                                            <button id="printSerial" class="custom-button2">Print Serial Number</button>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row" id="serialNumber" style="display: none;">
                                    <div class="col-lg-12 m-b-30">
                                        <div class="card-box">
                                            <p class="foc-title" style="border: none; padding: 0; margin-bottom: 5px;">Print Serial Number</p>
                                            <button id="printSerial" class="btn custom-button2" style="margin-bottom: 10px;">
                                                <span><i class="fa fa-print" aria-hidden="true" style="margin-right: 5px;"></i></span>Print
                                            </button>
                                            <div id="serialNumberTable">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="stockIn" style="display: none;">
                                    <div class="col-lg-12 m-b-30">
                                        <div class="card-box">
                                            <p class="foc-title" style="border: none; padding: 0; margin-bottom: 5px;">Stock In</p>
                                            <button id="validatedStock" class="custom-button2" style="margin-bottom: 10px; display: none;">
                                                <img src="/images/Icon-white-package.png">
                                                Validated Stock
                                            </button>
                                            <input class="form-control stockOutInput m-b-10" type="text" id="inputSerial" onchange="removeUrl(this, event)">
                                            <div id="stockInTable"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="validatedStockListPo" style="display: none;">
                                    <div class="col-lg-12 m-b-30">
                                        <div class="card-box">
                                            <div id="validatedStockListPoTable">
                                                <p class="foc-title" style="border: none; padding: 0; margin-bottom: 5px;">Validated Stock</p>
                                            </div>
                                            <button id="printValidatedStockPo" class="printbtn" data-dismiss="modal" style="margin-top: 10px;">
                                                <?php echo $translations['A00753'][$language]; /* Print */ ?>
                                            </button>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="journalSection">
                    <!-- <div class="col-md-4" id="journalSection" style="overflow-y:scroll; height: 600px;"> -->
                        <?php if(!$_POST['id']) { ?>
                            <div class="card-box m-t-10" style="background-color: #eee; color: black; overflow-y:scroll; height: 200px">
                                <div class="customFont"><?php echo $_SESSION['username'] ?></div>
                                <div>Creating a new purchase order...</div>
                            </div>
                        <?php } ?>
                    </div> 
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </div>
</div>
    <div id="printarea">
        <div class="printSticker" id="1">
            <div><img src="images/GoTastyLogo.png" class="printLogo"></div>
            <div>Johor Segamat Hock Bee - Sambal Crisps 150g</div>
            <div>Jelutong Genting Cafe</div>
            <div>Chee Cheong Fun - Big (2 Packets)</div>
            <div>Best Before : 27 Feb 23</div>
            <div id="qrCode"></div>
            <div id="qrLink"></div>
            <div>Scan Here for preparation instruction</div>
            <div>Go Tasty Sdn Bhd (1429649-H)</div>
            <div class="socialMediaGrp">
                <div>
                    <img src="">
                    <span>facebook.com/gotasty.net</span>
                </div>
                <div>
                    <img src="">
                    <span>instagram.com/gotastynet</span>
                </div>
            </div>
        </div>
        <div class="printSticker" id="1">
            <div><img src="images/GoTastyLogo.png" class="printLogo"></div>
            <div>Johor Segamat Hock Bee - Sambal Crisps 150g</div>
            <div>Jelutong Genting Cafe</div>
            <div>Chee Cheong Fun - Big (2 Packets)</div>
            <div>Best Before : 27 Feb 23</div>
            <div id="qrCode"></div>
            <div id="qrLink"></div>
            <div>Scan Here for preparation instruction</div>
            <div>Go Tasty Sdn Bhd (1429649-H)</div>
            <div class="socialMediaGrp">
                <div>
                    <img src="">
                    <span>facebook.com/gotasty.net</span>
                </div>
                <div>
                    <img src="">
                    <span>instagram.com/gotastynet</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                    <video id="modalVideo" width="400" controls>
                    <source src="" type="">
                    </video>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectPOModal" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <button type="button" class="close closes" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titles" style="color: black;">
                        Reject Purchase Orders
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="reasonInput" class="col-md-3 col-form-label">Reason</label>
                        <div class="col-md-9">
                            <textarea class="form-control" placeholder="Enter reason here" id="reasonInput"></textarea>
                            <span id="reasonInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="modal-footer" style="border-top: 0px; text-align: left;">
                    <div class="btn-group mr-auto" role="group">
                        <div id="submitReject" class="custom-button2">
                            <?php echo $translations['A00323'][$language]; /* Submit */?>
                        </div>
                    </div>
                    <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                        <?php echo $translations['A00742'][$language]; /* Close */ ?>
                    </button>
                </div>

        </div>
    </div>

    <div class="modal fade" id="createVendorModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;">
                        Open: Vendor
                    </h4>
                </div>
                <span class="float-left">
                    <!-- Credit Card Icon -->
                    <div class="btn-group mr-auto" role="group" style="margin: 0;">
                        <div id="submitReject" class="btn btn-primary waves-effect waves-light" style="background-color: #fff !important; color: #007bff !important; border: 1px solid #ccc !important;">
                            <img src="images/Icon-awesome-credit-card.png" alt="" height="20px" class="m-r-10">
                            <span>Purchases</span>
                        </div>
                    </div>
                    <!-- Shopping Bag Icon -->
                    <div class="btn-group mr-auto" role="group" style="margin: 0;">
                        <div id="submitReject" class="btn btn-primary waves-effect waves-light" style="background-color: #fff !important; color: #007bff !important; border: 1px solid #ccc !important;">
                            <img src="images/Icon-feather-shopping-bag.png" alt="" height="20px" class="m-r-10">
                            <span>Products</span>
                        </div>
                    </div>
                    <!-- Packaging Box Icon -->
                    <div class="btn-group mr-auto" role="group" style="margin: 0;">
                        <div id="submitReject" class="btn btn-primary waves-effect waves-light" style="background-color: #fff !important; color: #007bff !important; border: 1px solid #ccc !important;">
                            <img src="images/Icon-awesome-box.png" alt="" height="20px" class="m-r-10">
                            <span>Package</span>
                        </div>
                    </div>
                    <!-- Create PO Icon -->
                    <div class="btn-group mr-auto" role="group" style="margin: 0;">
                        <div id="submitReject" class="btn btn-primary waves-effect waves-light" style="background-color: #fff !important; color: #007bff !important; border: 1px solid #ccc !important;">
                            <img src="images/Icon-ionic-ios-document.png" alt="" height="20px" class="m-r-10">
                            <span>Create PO</span>
                        </div>
                    </div>
                </span>
                <br>
                <br>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="companyNameInput" class="col-sm-2 col-form-label">Company Name<span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" id="companyNameInput" class="form-control" style="width: 600px;" required>
                            <span id="companyInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vendorCodeInput" class="col-sm-2 col-form-label">Vendor Code</label>
                        <div class="col-sm-6">
                            <input type="text" id="vendorCodeInput" class="form-control" style="width: 600px;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phoneNoInput" class="col-sm-2 col-form-label">Phone Number<span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" id="phoneNoInput" class="form-control" style="width: 600px;" required>
                            <span id="phoneNoInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vendorEmailInput" class="col-sm-2 col-form-label">Vendor Email</label>
                        <div class="col-sm-6">
                            <input type="text" id="vendorEmailInput" class="form-control" style="width: 600px;">
                            <span id="vendorEmailInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="picInput" class="col-sm-2 col-form-label">PIC</label>
                        <div class="col-sm-6">
                            <input type="text" id="picInput" class="form-control" style="width: 600px;">
                            <span id="picInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="operationHourInput" class="col-sm-2 col-form-label">Operation Hour</label>
                        <div class="col-sm-6">
                            <input type="text" id="operationHourInput" class="form-control" style="width: 600px;">
                            <span id="operationHourInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vendorImage" class="col-sm-2 col-form-label">Vendor Image</label>
                        <div class="col-sm-6" id="imageSection">
                            <div class="row">
                                <div id="vendorBuildImg">
                                </div>

                                <div class="col-md-4 addImgBtn">
                                    <div class="addProductImage" onclick="vendorAddImage()">
                                        <b><i class="fa fa-plus-circle"></i></b>
                                        <span>Add Images</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
       
                    <div class="form-group section-header">
                        <h5 class="modal-title" style="font-weight: bold; color: blue;">Contact & Address</h5>
                    </div>
                    <div id="vendorAddressContainer">
                        <button class="custom-button2" onclick="vendorAddressAddNew()">
                            <span style="display: inline-block; margin-right: 5px;">
                                <i class="fa fa-plus" aria-hidden="true" style="color: white;"></i>
                            </span>
                            Add New
                        </button>
                        <div class="section-wrapper m-t-10 m-b-10 vendorAddressSection" id="vendorAddressSection" style="border-radius: 0px;">
                            <div class="section">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="branchName">Branch Name</label>
                                        <input type="text" id="branchName1" placeholder = "Enter your branch name" class="form-control m-0">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="vendorMobileNo">Mobile Number</label>
                                        <input type="text" id="vendorMobileNo1" placeholder = "Enter your mobile number" class="form-control m-0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="addressLine1">Address Line 1<span class="text-danger">*</span></label>
                                        <input type="text" id="addressLineOne1" placeholder = "Enter your address line 1" class="form-control m-0" required>
                                        <span id="inputErrorAddressLineOne1" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="addressLine2">Address Line 2<span class="text-danger">*</span></label>
                                        <input type="text" id="addressLineTwo1" placeholder = "Enter your address line 2" class="form-control m-0" required>
                                        <span id="inputErrorAddressLineTwo1" class="errorSpan text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="vendorCity">City<span class="text-danger">*</span></label>
                                        <input type="text" id="vendorCity1" placeholder = "Enter your city" class="form-control m-0" required>
                                        <span id="inputErrorVendorCity1" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="vendorState">State<span class="text-danger">*</span></label>
                                        <input type="text" id="vendorState1" placeholder = "Enter your state" class="form-control m-0" required>
                                        <span id="inputErrorVendorState1" class="errorSpan text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="vendorZip">Zip<span class="text-danger">*</span></label>
                                        <input type="text" id="vendorZip1" placeholder = "Enter your ZIP" class="form-control m-0" required>
                                        <span id="inputErrorVendorZip1" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="customFont" for="vendorCountry">Country<span class="text-danger">*</span></label>
                                        <input type="text" id="vendorCountry1" placeholder = "Enter your country" class="form-control m-0" required>
                                        <span id="inputErrorVendorCountry1" class="errorSpan text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-left: 10px;">
                                <button id="editVendorAddress1" class="custom-button2 editVendorAddress">
                                    <?php echo $translations['A00249'][$language]; /* Edit */?>
                                </button>
                                <button id="saveVendorAddress1" class="custom-button2 saveVendorAddress" style="display:none;">
                                    <?php echo 'Save'; /* Edit */?>
                                </button>
                                <button id="deleteVendorAddress1" type="button" class="custom-button1 deleteVendorAddress">
                                    <?php echo $translations['M03292'][$language]; /* Delete */ ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: left; border-top: 0px;">
                    <button id="saveNew" class="custom-button2" style="display: none;">
                        Save & New            
                    </button>
                    <button id="saveClose" class="custom-button2" style="display: none;">
                        Save & Close            
                    </button>
                    <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                        Discard
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerLocationModal" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titles" style="color: black;">
                        Register Location 
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="rackInput" class="col-md-3 col-form-label">Location</label>
                        <div class="col-md-9">
                            <input type="text" id="rackInput" class="form-control" style="margin-left: 0px;" placeholder="Please enter location">
                            <span id="rackInputError" class="errorSpan text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0px; text-align: left;">
                    <div class="btn-group mr-auto" role="group">
                        <div id="submitRack" class="custom-button2">
                            <?php echo $translations['A00323'][$language]; /* Submit */?>
                        </div>
                    </div>
                    <button id="canvasCloseBtn" type="button" class="custom-button1" data-dismiss="modal">
                        <?php echo $translations['A00742'][$language]; /* Close */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Location Update Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content container-fluid" style="border-radius: 0;">
        <div class="modal-header custom-modal-header">
          <button type="button" class="close closes" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
          <div class="row" >
            <div class="col">
              <div class="row text-center"> 
                <img src="images/checkbox_icon.png" width="70" height="70">
              </div>
              <div class="row">
                    <h4 class="text-center" style="color: black;"><b>Product location is successfully updated.</b></h4>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer custom-modal-footer"> 
          <div class="text-center">
            <button type="button" class="custom-button2" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>

   <?php include("validatedStockModal.php")?>
   <?php include("viewSerialNoModal.php")?>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var url2             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback       = "";
    var editId          = "<?php echo $_POST['id']; ?>";
    // var status          = "<?php echo $_POST['status']; ?>";
    var status          = '';
    var createdAt       = "<?php echo $_POST['createdAt']; ?>";
    var vendor          = "<?php echo $_POST['vendor']; ?>";
    var html = `<option value="">Select Product</option>`;
    var product_list      = null;
    var wrapperLength = 1;
    var subtotal = 0;
    var action = "";
    var typeR = "";
    var totalLoop =[1];
    var vendor_id_ini = "";
    var vendor_name = "";
    var assign_id_ini = "";
    var tableIndex;
    var serialInputNum = [];
    var vendorName = "";
    var serial_number = [];
    var validated_serial_num = [];
    var defaultSNUrl = "<?php echo $config["loginToMemberURL"]; ?>" + "sn/";
    var addImgCount = 0;
    var addImgIDNum = 0;
    var usedSerialNo = [];
    var poType          = "<?php echo $_POST['poType']; ?>";
    var productId       = '<?php echo $_POST['productId'] ?>';
    var vendorId        = '<?php echo $_POST['vendorId'] ?>';
    var activeSerialList = [];
    var detailedOperationList = [];
    var totalProductLists = [];
    var totalPO = [];
    var imageId = [];
    var sectionCount = 1;
    var productList = [];
    var productSet= [];
    var printStickersProductList = [];
    var product_listing = [];
    var printStickersValidatedStock = [];
    var overallTotal = 0;
    var rowIndex = 1;
    var currentId = parseInt(editId);
    var addImageEnabled = true;
    var currentWarehouseId;
    var editTotal = 0;
    var imageUploadLink = '';
    var fileUploadedArray = [];
    var imgFileDataArray = [];
    var videoFileDataArray = [];
    var viewMode = true;
    var uploadImage = [];
    var imgUploadFinishFile = [];
    var videoUploadFinishFile = [];

    $(document).ready(function() { 

        $('#backBtn').click(function() {
            $.redirect("order.php");
        });

        resizableGrid(document.getElementById('productTable'));

        if (poType != 'add' && poType != 'duplicate') {
            $("#branchField").show();
            var formData = {
                'command': 'getPurchaseOrderDetails',
                'id'     : editId,
                'module' : 'PO',
                'permissionType'   : 'action'
            };
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            var formData = {
                'command': 'getJournalLog',
                'module_id'     : editId,
                'module' : 'PO',
                'permissionType'   : 'action'
            };
            fCallback = loadJournalLog;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else if(poType == 'duplicate')
        {
            var formData = {
                'command': 'getPurchaseOrderDetails',
                'id'     : editId,
                'module' : 'PO',
                'permissionType'   : 'action'
            };
            fCallback = loadDuplicate;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else
        {
            $(".addProductWrapper").css("display", "none");
            $(".addProductWrapper.noData").css("display", "none");
            $(".addProduct").css("display", "none");
            $("#edit, #approve, #cancelled").hide();
            $("#editPObtn").hide();
            $("#addPO").show();
            $("#editPO").hide();
            $("#discard").hide();
            $("#actionBtn").hide();
            vendorList();

            $("#assignAdmin").prop("disabled", false);
            $("#vendorDropdown").prop("disabled", false);
            $("#branchAddressDropdown").prop("disabled", false);
            $("#purchaseDate").prop("disabled", false);
            $("#warehouseDropdown").prop("disabled", false);
            $("#branchAddressText").hide();

        }

        setTodayDatePicker();


        $(".productSelect").change(function () {
            var select_id = this.id;
            var product_cost = $('option:selected', this).attr('data-cost');
            var costID = "#cost" + select_id.substring(13);
            $(costID).val(product_cost);
            $(".quantityInput").keyup();
            $('.totalInput').trigger('change');

            countSubtotal();
        });

        $('#vendorDropdown').change(function() {
            var branchAddressDropdown = document.getElementById('branchAddressDropdown');
            branchAddressDropdown.options.length = 0;
            if($('#vendorDropdown option:selected').val() != 0 && $('#vendorDropdown option:selected').val() != 'create-vendor') {
                currentTokenCategory = $('#vendorDropdown :selected').val();
                productDetails();
            }

            if($('#vendorDropdown option:selected').val() == 'create-vendor') {
                $('#vendorDropdown').val('');
                $("#companyNameInput").prop("disabled", false);
                $("#vendorCodeInput").prop("disabled", false);       
                $("#phoneNoInput").prop("disabled", false);             
                $("#vendorEmailInput").prop("disabled", false);                
                $("#picInput").prop("disabled", false);                
                $("#operationHourInput").prop("disabled", false);
                $("#saveNew").show();
                $("#saveClose").hide(); 
                $('#createVendorModal').appendTo("body").modal('show'); 
            }
            $('#subtotal').text("0");
            wrapperLength = 1;
            $("#branchAddressDropdown").show();
            $("#branchAddressText").hide(); 
        })

        var formData = {
            command        : "getWarehouse",
            module         : 'warehouse',
            permissionType : 'filter',
        };
        fCallback = loadFormDropdownWarehouse
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#status').val(status);

        $(".productSelect").change(function () {
            var select_id = this.id;
            var product_cost = $('option:selected', this).attr('data-cost');
            var costID = "#cost" + select_id.substring(13);
            $(costID).val(product_cost);
            $(".quantityInput").keyup();
            $('.totalInput').trigger('change');

            countSubtotal();
        });

        $('#approve').click(function() {
            var latestProductTable = getAllRowData('edit');

            // uploadImage = [];
            // uploadImageData = [];
            // $(".popupMemoImageWrapper").each(function() { 
            //     var imgData = $(this).find('[id^="storeFileData"]').val();
            //     var imgName = $(this).find('[id^="storeFileName"]').val();
            //     var imgType = $(this).find('[id^="storeFileType"]').val();
            //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
            //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
            //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

            //     if(imgData != "") {
            //         buildUploadImage = {
            //             imgName : imgName,
            //             imgType : imgType,
            //             imgFlag : imgFlag,
            //             imgSize : imgSize,
            //             uploadType : imgUploadType
            //         };

            //         var stringImgData = '';

            //         if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
            //             stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
            //         } else {
            //             stringImgData = JSON.stringify(imgData);
            //         }

            //         reqData = {
            //             imgName : imgName,
            //             imgData : stringImgData,
            //         };
                    
            //         uploadImageData.push(reqData);
            //         uploadImage.push(reqData);
            //     }
            // });

            var formData = {
                command               : "approvePurchaseOrder",
                assign_id             : $("#assignAdmin").val(),
                vendor_id             : $("#vendorDropdown").val(),
                purchase_product_list : latestProductTable,
                remarks               : $("#remarks").val(),
                // uploadImage           : uploadImage,
                id                    : editId,
                buying_date           : $("#purchaseDate").val(),
                status                : 'Approved',
                module                : 'PO',
                permissionType        : 'action',
                warehouse_id          : $("#warehouseDropdown").val(),
            };

            if (fCallback)
                fCallback = loadConfirmPurchaseOrder;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })

        $('#upgradeStockIn').click(function() {
            var latestProductTable = getAllRowData('edit');

            // uploadImage = [];
            // uploadImageData = [];
            // $(".popupMemoImageWrapper").each(function() { 
            //     var imgData = $(this).find('[id^="storeFileData"]').val();
            //     var imgName = $(this).find('[id^="storeFileName"]').val();
            //     var imgType = $(this).find('[id^="storeFileType"]').val();
            //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
            //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
            //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

            //     if(imgData != "") {
            //         buildUploadImage = {
            //             imgName : imgName,
            //             imgType : imgType,
            //             imgFlag : imgFlag,
            //             imgSize : imgSize,
            //             uploadType : imgUploadType
            //         };

            //         var stringImgData = '';

            //         if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
            //             stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
            //         } else {
            //             stringImgData = JSON.stringify(imgData);
            //         }

            //         reqData = {
            //             imgName : imgName,
            //             imgData : stringImgData,
            //         };
                    
            //         uploadImageData.push(reqData);
            //         uploadImage.push(reqData);
            //     }
            // });

            var formData = {
                command               : "approvePurchaseOrder",
                assign_id             : $("#assignAdmin").val(),
                vendor_id             : $("#vendorDropdown").val(),
                purchase_product_list : latestProductTable,
                remarks               : $("#remarks").val(),
                // uploadImage           : uploadImage,
                id                    : editId,
                status                : 'Pending For Stock In',
                buying_date           : $("#purchaseDate").val(),
                type                  : 'upgrade',
                module                : 'PO',
                permissionType        : 'action',
                warehouse_id          : $("#warehouseDropdown").val(),
            };

            if (fCallback)
                fCallback = approveToPendingStockIn;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })

        $('#reject').click(function() {
            $('#rejectPOModal').appendTo("body").modal('show');
        })
        
        $('#openVendor').click(function() {

            //enable all input when open modal
            $("#companyNameInput").prop("disabled", false);
            $("#vendorCodeInput").prop("disabled", false);       
            $("#phoneNoInput").prop("disabled", false);             
            $("#vendorEmailInput").prop("disabled", false);                
            $("#picInput").prop("disabled", false);                
            $("#operationHourInput").prop("disabled", false);
            $("#saveNew").hide();
            $("#saveClose").show(); 

            var formData = {
                command               : "getSupplierDetail",
                supplierID            : vendor_id_ini,
            };

            if (fCallback)
                fCallback = openVendorDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })

        $('#accept').click(function() {
            var latestProductTable = getAllRowData('edit');

            
            var formData = {
                command               : "acceptRejectPurchaseOrder",
                id                    : editId,
                module                : 'PO',
                permissionType        : 'action',
                status                : 'accept',
                assign_id             : $("#assignAdmin").val(),
                vendor_id             : $("#vendorDropdown").val(),
                branchName_id         : $("#branchNameDropdown").val(),
                branchAddress_id      : $("#branchAddressDropdown").val(),
                vendor_address_id     : $("#branchAddressDropdown").val(),
                warehouse_id          : $("#warehouseDropdown").val(),
                buying_date           : $("#purchaseDate").val(),
                product_list          : latestProductTable,
                remarks               : $("#remarks").val(),
            };

            if (fCallback)
                fCallback = sendEdit;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        })

        $('#submitReject').click(function() {
            var latestProductTable = getAllRowData('edit');
            var reason = $("#reasonInput").val();

            $("#reasonInputError").html("");

            if(reason.length == 0){
                $("#reasonInputError").html("Please provide a reason for rejecting this Purchase Order");
            }else{
                var formData = {
                    command               : "acceptRejectPurchaseOrder",
                    id                    : editId,
                    module                : 'PO',
                    permissionType        : 'action',
                    reason                : reason,
                    status                : 'reject',
                    assign_id             : $("#assignAdmin").val(),
                    vendor_id             : $("#vendorDropdown").val(),
                    branchName_id         : $("#branchNameDropdown").val(),
                    branchAddress_id      : $("#branchAddressDropdown").val(),
                    vendor_address_id     : $("#branchAddressDropdown").val(),
                    warehouse_id          : $("#warehouseDropdown").val(),
                    buying_date           : $("#purchaseDate").val(),
                    product_list          : latestProductTable,
                    remarks               : $("#remarks").val(),
                };

                if (fCallback)
                    fCallback = sendEdit;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $('#rejectPOModal').modal('hide');
            }
        })

        $('#saveClose').click(function() {
            saveOpenVendorDetail();
        });

        $('#saveNew').click(function() {
            saveOpenVendorDetail('new');
        });

        $(document).on('click','.editVendorAddress',function(){
            var newId = $(this).attr('id').replace(/editVendorAddress/g,'');

            $("#editVendorAddress" + newId).hide();
            $("#saveVendorAddress" + newId).show();
            $("#branchName" + newId).prop("disabled", false);
            $("#vendorMobileNo" + newId).prop("disabled", false);       
            $("#addressLineOne" + newId).prop("disabled", false);             
            $("#addressLineTwo" + newId).prop("disabled", false);                
            $("#vendorCity" + newId).prop("disabled", false);                
            $("#vendorState" + newId).prop("disabled", false);                
            $("#vendorZip" + newId).prop("disabled", false);  
            $("#vendorCountry" + newId).prop("disabled", false);     
        });

        $(document).on('click','.saveVendorAddress',function(){
            var newId = $(this).attr('id').replace(/saveVendorAddress/g,'');

            $("#editVendorAddress" + newId).show();
            $("#saveVendorAddress" + newId).hide();
            $("#branchName" + newId).prop("disabled", true);
            $("#vendorMobileNo" + newId).prop("disabled", true);       
            $("#addressLineOne" + newId).prop("disabled", true);             
            $("#addressLineTwo" + newId).prop("disabled", true);                
            $("#vendorCity" + newId).prop("disabled", true);                
            $("#vendorState" + newId).prop("disabled", true);                
            $("#vendorZip" + newId).prop("disabled", true);  
            $("#vendorCountry" + newId).prop("disabled", true);     
        });

        function openVendorDetail(data, message)
        {
            var address = data.address;
            $('#companyNameInput').val(data.name);
            $('#vendorCodeInput').val(data.code);
            $('#phoneNoInput').val(data.dialCode + data.phone);
            $('#vendorEmailInput').val(data.email);
            $('#picInput').val(data.pic);
            $('#operationHourInput').val(data.note);
            $("#vendorCodeInput").attr("disabled", true);
            $("#editVendorAddress1").show();

            $("#vendorBuildImg").empty();
            if(data.media != '') {
                $.each(data.media, function(k,v) {
                    if(v['type'] == 'video') {
                        videoId.push(v['id']);

                        $('#video'+(k+1)).val(v['url']);
                    } else if(v['type'] == 'Image') {
                        addImgCount = addImgCount + 1;
                        addImgIDNum = addImgIDNum + 1;
            
                        var buildImg = "";
            
                        buildImg += `
                            <div class="col-sm-4 col-xs-12">
                                <div class="popupMemoImageWrapper" imageFlag="0">
                        `;
            
                        buildImg +=`
                                    <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                                    <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                                    <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                                    <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                                    <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                                    <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                                    <input type="hidden" id="viewFileData${addImgIDNum}" value="${v.url}">
                                    <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${addImgIDNum}', this)">
                                    <div>
                                        <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                                        <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                                        <!-- <span id="fileName${addImgIDNum}" class="fileName">
                                            ${v.name}
                                        </span> -->
                                        <img id="thumbnailImg${addImgIDNum}" src="${v.url}" style="width:100%;" />
                                        <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="padding: 6px;" onclick="showImg('${addImgIDNum}')">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
            
                        $("#vendorBuildImg").append(buildImg);
                        $(`#fileNotUploaded${addImgIDNum}`).hide();
                    }
                });
            }

            if(address != null && address != '') {
                $.each(address, function(k,v) {
                    var newK = k + 1;
                    // if(k != 1) 
                    //     vendorAddressAddNew(address);

                    $("#branchName" + newK).val(v['name']);
                    $("#vendorMobileNo" + newK).val(v['mobile']);                
                    $("#addressLineOne" + newK).val(v['address_line_1']);                
                    $("#addressLineTwo" + newK).val(v['address_line_2']);                
                    $("#vendorCity" + newK).val(v['city']);                
                    $("#vendorState" + newK).val(v['state']);                
                    $("#vendorZip" + newK).val(v['zip']);  
                    $("#vendorCountry" + newK).val(v['country']);                
                });
            }

            $('#createVendorModal').appendTo("body").modal('show');
        }

        function productDetails() {
            productList = [];
            // reset table everytime when re-select vendor
            var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
            while (tableBody.firstChild) {
                tableBody.removeChild(tableBody.firstChild);
            }

            var selectedOption = $('#vendorDropdown option:selected');
            var vendorName = $.trim(selectedOption.text());
            
            var formData = {
                command        : "getProductList",
                vendor_name    : vendorName,
            };
            fCallback = productListOpt;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }


        function loadConfirmPurchaseOrder(data, message) {
            showMessage('Purchase Order Has Been Approved', 'success', 'Success Update Purchase Order', 'check', 
                ['purchase.php', {
                    id: editId,
                    status: "Approved",
                    createdAt: createdAt,
                    vendor: vendor,
                }]
            );
        }

        function approveToPendingStockIn(data,message) {
            loadConfirmPurchaseOrder(data,message);

            var product_name_set  = $('option:selected', "#productSelect1").text();
            for(var v = 2; v < $(".productSelect").length + 1; v++) {
                var name = ", " + $('option:selected', "#productSelect"+v).text();

                product_name_set += name;
            }
            var formData = {
                command       : 'assignSerial',
                id            : editId
            };
            fCallback = generateSerial2;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadFormDropdownWarehouse(data, message) {
            warehouseData = data;
            $.each(warehouseData, function(key, val) {
                var vName = val['warehouse_location'];
                $('#warehouseDropdown').append($('<option>', {
                    value: val['id'],
                    text: vName
                }));
            });
            if(currentWarehouseId)
            {
                $('#warehouseDropdown').val(currentWarehouseId);
            }
            if(warehouseData && warehouseData.length == 1){
                $('#warehouseDropdown').val(1).trigger('change.select2');
            }
        }

        $('#edit').click(function() {
            var productSet= [];

            for(var v = 1; v < $(".addProductWrapper").length + 1; v++) {
                var name = $('option:selected', "#productSelect"+v).text();
                var cost = $('#cost' + v).val();
                var quantity = $('#quantity' + v).val();
                var product_id = $('option:selected', "#productSelect"+v).val();
                var id = $('#id'+v).val();
                action = $('#action'+v).val();

                if($('#action'+v).val() == "add" && $('#id'+v).val() != "") {
                    action = "";
                    typeR = "";
                }
                if($('#action'+v).val() == "add" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "";
                }
                if ($('#action'+v).val() == "foc" && $('#id'+v).val() == "") {
                    action = "add";
                    typeR = "foc";
                }
                if ($('#action'+v).val() == "delete" && $('#productType'+v).val() == "FOC") {
                    typeR = "foc";
                }
                if (v == "1") {
                    action = "";
                    typeR = "";
                }

                var perProduct = {
                    id : id,
                    product_id : product_id,
                    name:name,
                    cost :cost,
                    quantity: quantity,
                    action: action,
                    type: typeR,
                }
                productSet.push(perProduct);
            }
            // })

            // uploadImage = [];
            // uploadImageData = [];
            // $(".popupMemoImageWrapper").each(function() { 
            //     var imgData = $(this).find('[id^="storeFileData"]').val();
            //     var imgName = $(this).find('[id^="storeFileName"]').val();
            //     var imgType = $(this).find('[id^="storeFileType"]').val();
            //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
            //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
            //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

            //     if(imgData != "") {
            //         buildUploadImage = {
            //             imgName : imgName,
            //             imgType : imgType,
            //             imgFlag : imgFlag,
            //             imgSize : imgSize,
            //             uploadType : imgUploadType
            //         };

            //         var stringImgData = '';

            //         if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
            //             stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
            //         } else {
            //             stringImgData = JSON.stringify(imgData);
            //         }

            //         reqData = {
            //             imgName : imgName,
            //             imgData : stringImgData,
            //         };
                    
            //         uploadImageData.push(reqData);
            //         uploadImage.push(reqData);
            //     }
            // });

            imgFileDataArray = [];
            videoFileDataArray = [];
            imgUploadFinishFile = [];
            videoUploadFinishFile = [];
            uploadImage = [];
            uploadVideo = [];
            // get all the image file
            $('[id^="imgFileUpload"]').each(function() {
                const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
                if (this.files && this.files[0]) {
                    const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                    const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                    imgFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
                }
            });
            if(imgFileDataArray.length > 0)
            {
                handleFileUpload(imgFileDataArray);
            }

            if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
            {
                var formData = {
                    command  : "addPurchase",
                    id : editId,
                    assign_id : $("#assignAdmin").val(),
                    vendor_id : $("#vendorDropdown").val() || vendor_id_ini,
                    branchName_id : $("#branchNameDropdown").val(),
                    branchAddress_id : $("#branchAddressDropdown").val(),
                    vendor_address_id : $("#branchAddressDropdown").val(),
                    warehouse_id : $("#warehouseDropdown").val(),
                    buying_date : $("#purchaseDate").val(),
                    product_list : productSet,
                    remarks : $("#remarks").val(),
                    imageId : imageId,
                    module  : "PO",
                    permissionType : "action",
                }; 
                var fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#printSerial').click(printStickers);

        $('#printValidatedStock, #printValidatedStockPo').click(printValidatedStockSticker);

        $('#printSerialNumber').click(printNotStockInStickers);

        $('#myModal').on('hidden.bs.modal', function () {
            $.redirect("purchase.php",{id: currentId});
        });

        $('#validatedStock').click(function(){
            var formData = {
                command       : 'assignSerial',
                id            : editId
            };
            fCallback = loadValidatedStockModal;
            ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
           
            $('#validatedStockModal').appendTo("body").modal('show');
        });

        // $("#serialNumberTable td:nth-child(1), #serialNumberTable td:nth-child(3), #serialNumberTable td:nth-child(4)").css("cssText", "text-align: center !important");
        // $("#stockInTable td:nth-child(1), #stockInTable td:nth-child(3)").css("cssText", "text-align: center !important");
    });

    function loadSerialNoModal(productId){
        $('#viewSerialNoModal').appendTo("body").modal('show');
        $('#viewSerialNoModalDiv').empty();
        var pId = $(productId).closest('tr').data('th');
        var serialModalHead = totalProductLists;
        var serialNoModalList = detailedOperationList;
        var tableId = 'viewSerialNoModalTable';

        
        if(serialModalHead.length > 0){
            var productName = '';
            var quantity = '';
            serialModalHead.forEach(function (item) {
                if(pId == item.productId){
                    productName = item.name;
                    quantity = item.quantity;
                    return false;
                }
            });

            if (productName && quantity) {
                var html1 = '';
                html1 = `
                    <button type="button" class="close closes" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titles">
                        <b>Detailed Operations</b>
                    </h4>
                    <div class="row form-group" style="margin-bottom: 0px; margin-top: 5px;">
                        <label class="col-md-3 col-form-label vertical-line">Product</label>
                        <div class="col-md-9">
                            <span class="mb-2" style="line-height: 2.5; color: black;">${productName}</span>
                        </div>
                    </div>
                    <div class="row form-group" style="margin-top: 0px">
                        <label class="col-md-3 col-form-label vertical-line">Quantity</label>
                        <div class="col-md-9">
                            <span class="mb-2" style="line-height: 2.5; color: black;">${quantity}</span>
                        </div>
                    </div>
                `;
                
                productName = '';
                quantity = '';
            }
        }

        var html2 = '';

        html2 = `
            <table id="viewSerialNoModalTable" class="custom-modal-table no-footer m-0">
                <thead>
                    <tr>
                        <th style="width : 12px !important;"><input type="checkbox" id="check0" value="myvalue0"></th>
                        <th class="text-left-padding">Lot/Serial Number</th>
                        <th class="text-left-padding">Expiration Date</th>
                        <th style="display: none;">Name</th>
                        <th style="display: none;">No</th>
                    </tr>
                </thead>
                <tbody id="viewSerialNoModalTableBody">
                </tbody>
            </table>
        `;

        $('#viewSerialNoModalDiv').append(html1, html2);

        $('#viewSerialNoModalTableBody').html('');

        loadSerialNoModalBody(serialNoModalList, pId);

        $("#check0").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
            
            var otherCheckboxes = $('input:checkbox').not(this); // Select all checkboxes except #chk0

            otherCheckboxes.each(function () {
                if ($(this).is(':disabled')) {
                    $(this).prop("checked", false);
                }
            });
        });
    }

    function loadSerialNoModalBody(serialNoModalList, pId){
        var k = 0;
        var serialNoModalBody = serialNoModalList;
        var validatedStockSerial = [];

        if(printStickersValidatedStock){
            printStickersValidatedStock.forEach(function(item) {
                validatedStockSerial.push(item.serialNo);
            });
        }

        if(serialNoModalBody.length > 0){
            serialNoModalBody.forEach(function (item) {
                if(item.productId == pId){
                    var isChecked = validatedStockSerial.includes(item.serial_number);

                    var html3 = `
                        <tr ${isChecked ? 'style="background-color: #eee"' : ''}>
                            <td class="checkbox-item" style="width : 12px !important; cursor: default !important;"><input type="checkbox" id="check${k+1}" value="myValue${k+1}" ${isChecked ? 'disabled' : ''}></td>
                            <td class="text-left-padding">${item.serial_number}</td>
                            <td class="text-left-padding">${item.expiration_date}</td>
                            <td style="display: none;">${item.name}</td>
                            <td style="display: none;">${k+1}</td>

                        </tr>
                    `;
            
                    $('#viewSerialNoModalTableBody').append(html3);

                    k++;
                }
            });
        }       
    }

    function loadValidatedStockModal(data, message){
        if(data.status){
            if(data.status == "Done") {
                var divId = 'validatedStockListPoTable';
                $('#validatedStockListPo').css("display", "block");
                $('#validatedStockListPoTable').show();
            }
        }else{
            var divId = 'validatedStockDiv';
        }

        var tableNo;
        var validatedStockTable = data.validatedStock;
        var tableId = 'validatedStockModalTable';
        var btnArray = {};
        var thArray = Array(
            'No',
            'Product Name',
            'Serial No',
            'Location',
        );
        var sortThArray = Array(
            '',
            '',
            '',
            '',
        );

        var sortArray = {
            'sortThArray'   : sortThArray,
            'sortBy'        : data['sortBy'],
        }

        if (validatedStockTable != null ) {
            var newvalidatedStockTable = []
            var tableNum = 0;

            $.each(validatedStockTable, function(k, v) {
                tableNum++;
                var rebuildData = {
                    id : tableNum,
                    productName : v['productName'],
                    serialNo : v['serialNo'],
                    location : v['location'],
                    bestBefore : v['bestBefore'],
                }
                newvalidatedStockTable.push(rebuildData);
            });

        }else{
            showMessage('No Validated Stock.', 'warning', 'Print Validated Stock', '', '');
        }
        buildTable(newvalidatedStockTable, tableId, divId, thArray, btnArray, message, tableNo, sortArray);
        addColumn(tableId);
        $("#validatedStockModalTable tr td:last-child").css("display", "none");
        $("#validatedStockModalTable").addClass("custom-modal-table");
        $("#validatedStockModalTable tr td:nth-child(3), #validatedStockModalTable tr td:nth-child(4), #validatedStockModalTable tr td:nth-child(5)").addClass("text-left-padding");
        $("#validatedStockModalTable").removeClass("table-striped");
        $("#validatedStockModalTable").removeClass("table");
        $("#validatedStockModalTable").removeClass("table-bordered");

        validated_serial_num = validatedStockTable.map(function(item) {
            return item.serialNo;
        });
    }

    function addColumn(tableId) {
        var rows = $('#' + tableId + ' tr');
        
        for (var i = 0; i < rows.length; i++) {
            var checkbox = $('<input />', {
                type: 'checkbox',
                id: 'chk' + i,
                value: 'myvalue' + i
            });
            if(i == 0){
                checkbox.wrap('<th style="width : 12px !important;"></th>').parent().prependTo(rows[i]);
            }
            else{
                checkbox.wrap('<td style="width : 12px !important; cursor: default !important;"></td>').parent().prependTo(rows[i]);
            }
        }
        $("#chk0").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = yyyy+'-'+mm+'-'+dd;
        
        $('#purchaseDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        var dateToday = $('#purchaseDate').val(today);

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    // create purchase Order button
    $('#addPO').click(function() {
        var latestProductTable = getAllRowData();

        // uploadImage = [];
        // uploadImageData = [];
        // $(".popupMemoImageWrapper").each(function() { 
        //     var imgData = $(this).find('[id^="storeFileData"]').val();
        //     var imgName = $(this).find('[id^="storeFileName"]').val();
        //     var imgType = $(this).find('[id^="storeFileType"]').val();
        //     var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
        //     var imgSize = $(this).find('[id^="storeFileSize"]').val();
        //     var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

        //     if(imgData != "") {
        //         buildUploadImage = {
        //             imgName : imgName,
        //             imgType : imgType,
        //             imgFlag : imgFlag,
        //             imgSize : imgSize,
        //             uploadType : imgUploadType
        //         };

        //         var stringImgData = '';

        //         if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
        //             stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
        //         } else {
        //             stringImgData = JSON.stringify(imgData);
        //         }

        //         reqData = {
        //             imgName : imgName,
        //             imgData : stringImgData,
        //         };
                
        //         uploadImageData.push(reqData);
        //         uploadImage.push(reqData);
        //     }
        // });
        imgFileDataArray = [];
        videoFileDataArray = [];
        imgUploadFinishFile = [];
        videoUploadFinishFile = [];
        uploadImage = [];
        uploadVideo = [];
        $('[id^="imgFileUpload"]').each(function() {
            const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
            if (this.files && this.files[0]) {
                const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                imgFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
            }
        });
        if(imgFileDataArray.length > 0)
        {
            handleFileUpload(imgFileDataArray);
        }
        if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
        {
            var formData = {
                command  : "addPurchase",
                assign_id : $("#assignAdmin").val(),
                vendor_id : $("#vendorDropdown").val(),
                branchName_id : $("#branchNameDropdown").val(),
                branchAddress_id : $("#branchAddressDropdown").val(),
                vendor_address_id : $("#branchAddressDropdown").val(),
                warehouse_id : $("#warehouseDropdown").val(),
                buying_date : $("#purchaseDate").val(),
                product_list : latestProductTable,
                remarks : $("#remarks").val(),
                // uploadImage: uploadImage,
                poType  : "add",
                module  : "PO",
                permissionType : "action",
            };
            var fCallback = sendNew;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    // edit purchase Order button
    $('#editPObtn').click(function() {
        var latestProductTable = getAllRowData('edit');

        imgFileDataArray = [];
        videoFileDataArray = [];
        imgUploadFinishFile = [];
        videoUploadFinishFile = [];
        uploadImage = [];
        uploadVideo = [];
        // get all the image file
        $('[id^="imgFileUpload"]').each(function() {
            const addImgIDNum = this.id.match(/\d+/)[0]; // Extract addImgIDNum from the id
            if (this.files && this.files[0]) {
                const uploadTypeValue = $('#uploadType' + addImgIDNum).val();
                const uploadNameValue = $('#storeFileName' + addImgIDNum).val();
                imgFileDataArray.push({ file: this.files[0], uploadType: uploadTypeValue , imgName : uploadNameValue});
            }
        });

        if(imgFileDataArray.length > 0)
        {
            handleFileUpload(imgFileDataArray);
        }

        if(imgFileDataArray.length == 0 && videoFileDataArray.length == 0)
        {
            var formData = {
                command  : "addPurchase",
                assign_id : $("#assignAdmin").val(),
                vendor_id : $("#vendorDropdown").val() || vendor_id_ini,
                branchName_id : $("#branchNameDropdown").val(),
                branchAddress_id : $("#branchAddressDropdown").val(),
                vendor_address_id : $("#branchAddressDropdown").val(),
                warehouse_id : $("#warehouseDropdown").val(),
                buying_date : $("#purchaseDate").val(),
                product_list : latestProductTable,
                remarks : $("#remarks").val(),
                // uploadImage: uploadImage,
                imageId : imageId,
                poType  : "edit",
                module  : "PO",
                permissionType : "action",
                id : editId,
            };
            var fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    $(".quantityInput").keyup(function () {
        this.value|=0;

        var quantity_id = this.id;
        var totalID = "#total" + quantity_id.substring(8);
        var quantity = $('#' + quantity_id).val();
        var product_cost_id = '#cost' + quantity_id.substring(8); 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity).toFixed(2));
        $('.totalInput').trigger('change');
        countSubtotal();
    })

    $(".costInput").keyup(function () {

        var cost_id = this.id;
        var totalID = "#total" + cost_id.substring(4);
        var quantity_id = "#quantity" + cost_id.substring(4);
        var quantity = $(quantity_id).val();
        var product_cost_id = '#cost' + cost_id.substring(4); 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity,2).toFixed(2));
        $('.totalInput').trigger('change');
        countSubtotal();
    })

    function loadFormDropdown(data, message) {
        roleData = data.roleList;

        $.each(roleData, function(key) {
            $('#roleID').append('<option value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });
    }

    function vendorAddImage() 
    {
        // Increment counters and IDs as needed
        addImgCount = addImgCount + 1;
        addImgIDNum = addImgIDNum + 1;

        var buildImg = "";

        buildImg += `
            <div class="col-sm-6 col-xs-12"> <!-- Adjusted width to col-sm-6 -->
                <div class="popupMemoImageWrapper vendorImageWrapper" style="width: 100%; max-width: 400px;"> <!-- Set a maximum width -->
                    <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                    <input type="hidden" id="storeFileData${addImgIDNum}">
                    <input type="hidden" id="storeFileName${addImgIDNum}">
                    <input type="hidden" id="storeFileType${addImgIDNum}">
                    <input type="hidden" id="storeFileFlag${addImgIDNum}">
                    <input type="hidden" id="storeFileSize${addImgIDNum}">
                    <input type="hidden" id="storeFileIsExist${addImgIDNum}">
                    <input type="hidden" id="storeFile64Bit${addImgIDNum}">
                    <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                    <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                    <div>
                        <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                        <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                        <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
                        <img id="thumbnailImg${addImgIDNum}" style="width:100%;" />
                        <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}')">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;
        $("#vendorBuildImg").append(buildImg);
    }

    function vendorAddressAddNew(data) 
    {
        sectionCount++;

        var clonedSection = $("#vendorAddressSection").clone();

        clonedSection.find('[id]').each(function() {
            var newId = $(this).attr('id').replace(/\d+$/, sectionCount);
            $(this).attr('id', newId);
        });

        clonedSection.find('input').val('');

        $("#vendorAddressContainer").append(clonedSection);

        if(data){
            $.each(data, function(k,v) {
                var newK = k + 1;
                
                $("#branchName" + newK).val(v['name']);
                $("#vendorMobileNo" + newK).val(v['mobile']);                
                $("#addressLineOne" + newK).val(v['address_line_1']);                
                $("#addressLineTwo" + newK).val(v['address_line_2']);                
                $("#vendorCity" + newK).val(v['city']);                
                $("#vendorState" + newK).val(v['state']);                
                $("#vendorZip" + newK).val(v['zip']);  
                $("#vendorCountry" + newK).val(v['country']);                
            });
        }
    }

    function displayProductList(data, message) {
        if (data && data.length > 0) {
            var productName = '';
            $.each(data, function(k, v) {
                productName += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
            });

            $('#product_name').html(productName);
        }
    }

    function loadFormDropdownProduct(data, message) {
        $.each(productData, function(key, val) {
            var pName = val['name'];
            $('#product_name').append($('<option>', {
                value: val['id'],
                text: pName
            }));
        });
    }
    // var wrapperLength = $(".addProductWrapper").length + 1;

    function addRow(data){
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-4">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" onchange="loopSelect(${(wrapperLength)});" class="form-control productSelect" required>
                                                                 
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="1" placeholder="1" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Cost</label>
                            <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                        </div>
                        <div class="col-md-3">
                            <label>Total Amount</label>
                            <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>

                            <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="add"/>
                            <input id="productType${(wrapperLength)}" type="text" class="form-control hide" value=""/>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendProduct").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);

        $('#productSelect'+wrapperLength).select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function addFOC(data){
        
        var wrapper = `
            <div class="col-md-12">
                <div class="addProductWrapper">
                    <a href="javascript:;" class="closeBtn" onclick="closeDiv(this,${(wrapperLength)})" id="closeBtn${(wrapperLength)}">&times;</a>
                    <div class="row" id="pr${(wrapperLength)}">
                        <div class="col-md-4">
                            <label>${(wrapperLength)}. Product</label>
                            <select id="productSelect${(wrapperLength)}" class="form-control productSelect" required>
                                                                 
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Quantity</label>
                            <input id="quantity${(wrapperLength)}" type="number" oninput="loopQuantity(${(wrapperLength)})" class="form-control quantityInput" value="1" placeholder="1" required/>
                        </div>
                        <div class="col-md-3">
                            <label>Cost</label>
                            <input id="cost${(wrapperLength)}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                        </div>
                        <div class="col-md-3">
                            <label>Total Amount</label>
                            <input id="total${(wrapperLength)}" type="number" value="0.00" class="form-control totalInput" readonly/>

                            <input id="id${(wrapperLength)}" type="text" class="form-control hide"/>
                            <input id="action${(wrapperLength)}" type="text" class="form-control hide" value="foc" type="foc"/>
                            <input id="productType${(wrapperLength)}" type="text" class="form-control hide" value="FOC"/>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#appendProduct").append(wrapper);
        $("#productSelect"+wrapperLength).html(html);

        $('#productSelect'+wrapperLength).select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        totalLoop.push(wrapperLength);
        wrapperLength++;
    }

    function addRow2(action) {
        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];

        var rowIndex = tableBody.rows.length + 1;

        var newRow = tableBody.insertRow();

        var cell1 = newRow.insertCell(0);
        if(action == 'add')
        {
            var selectElement = document.createElement("select");
            selectElement.id = `productSelect${rowIndex}`;
            selectElement.classList.add("form-control", "productSelect");
            selectElement.setAttribute("required", true);
            selectElement.setAttribute("data-action", "add");

            // Add the <option> element to the <select>
            var optionElement = document.createElement("option");
            optionElement.value = "";
            optionElement.textContent = "Select Product";
            selectElement.appendChild(optionElement);

            // Append the <select> element to the cell
            cell1.appendChild(selectElement);
        }
        else
        {
            cell1.innerHTML = `
                <select id="productSelect${rowIndex}" class="form-control productSelect" required>
                    <option value="">Select Product</option>
                </select>
            `;
        }

        var cell2 = newRow.insertCell(1);
        var quantityInputId = "quantity" + rowIndex;
        cell2.innerHTML = `
            <input id="${quantityInputId}" type="number" class="form-control quantityInput" value="1" oninput="updateSubtotal(this);" placeholder="1" required/>
        `;

        var cell3 = newRow.insertCell(2);
        cell3.innerHTML = `
            <input id="cost${rowIndex}" type="decimal" value="0.00" class="form-control costInput" required readonly/>
        `;

        var cell4 = newRow.insertCell(3);
        cell4.innerHTML = `
            <input id="total${rowIndex}" type="decimal" value="0.00" class="form-control totalInput" readonly/>
        `;

        var cell5 = newRow.insertCell(4);
        cell5.innerHTML = `
            <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
        `;

        var productSelect = newRow.querySelector(".productSelect");
        productSelect.innerHTML = `<option value="">Select Product</option>`;

        productList.forEach(function (product) {
            productSelect.innerHTML += `<option value="${product.id}" data-cost="${product.cost}">${product.name}</option>`;
        });
        
        productSelect.addEventListener("change", function () {
            var row = this.closest("tr");
            updateCostAndTotal(row);
        });

        if(productList && productList.length == 1){
            $('#productSelect'+rowIndex)[0].selectedIndex = 1;
            updateCostAndTotal(newRow);
        }

        rowIndex++;
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function addRow3(action) {
        if(productList.length > 0)
        {
            var wrapper = `
                <tr>
                    <td>
                        <select id="productSelect${wrapperLength}" class="form-control productSelect" required>
                        </select>
                    </td>
                    <td>
                        <input id="quantity${wrapperLength}" type="number" oninput="calcTotalCost(${wrapperLength})" class="form-control quantityInput" value="1" placeholder="1" onkeypress="return isNumberKey(event)" required/>
                    </td>
                    <td>
                        <input id="cost${wrapperLength}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                    </td>
                    <td>
                        <input id="total${wrapperLength}" type="number" value="0.00" class="form-control totalInput" readonly/>
                    </td>
                    <td>
                        <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            `;
    
            $("#productTable tbody").append(wrapper);
    
            var selectElement = $('#productSelect' + wrapperLength);
    
            // Initialize Select2
            selectElement.select2({
                dropdownAutoWidth: true,
                templateResult: newFormatState,
                templateSelection: newFormatState,
            });
    
            // Populate options
            if(action == 'add')
            {
                productList.forEach(function (product) {
                    var option = `<option value="${product.id}" data-cost="${product.cost}">${product.name}</option>`;
                    selectElement.append(option);
                });
            }
            // Event listener for select change
            selectElement.on('change', function () {
                var selectedOption = $(this).find(':selected');
                var productId = selectedOption.val();
                var productCost = selectedOption.data('cost');
                var costInput = $(this).closest('tr').find('.costInput');
                var quantityInput = parseInt($(this).closest('tr').find('.quantityInput').val());
                var totalInput = $(this).closest('tr').find('.totalInput');
                var totalCost = quantityInput * productCost;
                var formattedTotalCost = totalCost.toFixed(2);
                var productName = selectedOption.text();
                selectElement.data('productName', productName);
                totalInput.val(formattedTotalCost);
                costInput.val(productCost);
                $(this).data('productid', productId);
                selectedOption.val(productId);
                countSubtotal();
            });
    
            if (action == 'add') {
                selectElement.data('action', 'add');
            }
    
            var firstOption = selectElement.find('option:first');
            var firstOptionValue = firstOption.val();
            selectElement.val(firstOptionValue).trigger('change');
    
            loopSelect(wrapperLength);
    
            totalLoop.push(wrapperLength);
            wrapperLength++;
        }
    }

    function addFOC2(action) {
        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];

        var newRow = tableBody.insertRow();

        var rowIndex = tableBody.rows.length;

        var cell1 = newRow.insertCell(0);

        // Create the <select> element and set its attributes, including data-action
        var selectElement = document.createElement("select");
        selectElement.id = `productSelect${rowIndex}`;
        selectElement.classList.add("form-control", "productSelect");
        selectElement.setAttribute("required", true);
        selectElement.setAttribute("data-type", "FOC");
        selectElement.setAttribute("data-action", "add");

        // Add the <option> element to the <select>
        var optionElement = document.createElement("option");
        optionElement.value = "";
        optionElement.textContent = "Select Product";
        selectElement.appendChild(optionElement);

        // Append the <select> element to the cell
        cell1.appendChild(selectElement);

        var cell2 = newRow.insertCell(1);
        var quantityInputId = "quantity" + rowIndex;
        cell2.innerHTML = `
            <input id="${quantityInputId}" type="number" class="form-control quantityInput" value="1" oninput="updateSubtotal(this);" placeholder="1" required/>
        `;

        var cell3 = newRow.insertCell(2);
        cell3.innerHTML = `
            <input id="cost${rowIndex}" type="decimal" value="0.00" class="form-control costInput" required readonly/>
        `;

        var cell4 = newRow.insertCell(3);
        cell4.innerHTML = `
            <input id="total${rowIndex}" type="decimal" value="0.00" class="form-control totalInput" readonly/>
        `;

        var cell5 = newRow.insertCell(4);
        cell5.innerHTML = `
            <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
        `;

        var productSelect = newRow.querySelector(".productSelect");
        productSelect.innerHTML = `<option value="">Select Product</option>`;

        productList.forEach(function (product) {
            // No need to set "data-type" here because it's already set on the productSelect element
            productSelect.innerHTML += `<option value="${product.id}" data-cost="0.00">${product.name}</option>`;
        });

        productSelect.addEventListener("change", function () {
            updateCostAndTotal(newRow); // Pass 'newRow' as a parameter
        });

        if(productList && productList.length == 1){
            $('#productSelect'+rowIndex)[0].selectedIndex = 1;
            updateCostAndTotal(newRow);
        }

        rowIndex++;
    }

    function addFOC3(action) {
        if(productList.length > 0)
        {
        var wrapper = `
            <tr>
                <td>
                    <select id="productSelect${wrapperLength}" class="form-control productSelect" required>
                    </select>
                </td>
                <td>
                    <input id="quantity${wrapperLength}" type="number" oninput="calcTotalCost(${wrapperLength})" class="form-control quantityInput" value="1" placeholder="1" onkeypress="return isNumberKey(event)" required/>
                </td>
                <td>
                    <input id="cost${wrapperLength}" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" value="0.00" required readonly/>
                </td>
                <td>
                    <input id="total${wrapperLength}" type="number" value="0.00" class="form-control totalInput" readonly/>
                </td>
                <td>
                    <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;

        $("#productTable tbody").append(wrapper);

        var selectElement = $('#productSelect' + wrapperLength);

        // Initialize Select2
        selectElement.select2({
            dropdownAutoWidth: true,
            templateResult: newFormatState,
            templateSelection: newFormatState,
        });

        // Populate options
        if(action == 'add')
        {
            productList.forEach(function (product) {
                var option = `<option value="${product.id}" data-cost="0">${product.name}</option>`;
                selectElement.append(option);
            });
        }
        // Event listener for select change
        selectElement.on('change', function () {
            var selectedOption = $(this).find(':selected');
            var productId = selectedOption.val();
            var productCost = selectedOption.data('cost');
            var costInput = $(this).closest('tr').find('.costInput');
            var quantityInput = parseInt($(this).closest('tr').find('.quantityInput').val());
            var totalInput = $(this).closest('tr').find('.totalInput');
            var productName = selectedOption.text();
            selectElement.data('productName', productName);
            totalInput.val(0);
            costInput.val(0);
            countSubtotal();
            $(this).data('productid', productId);
            selectedOption.val(productId);
        });

        if (action == 'add') {
            selectElement.data('action', 'add');
        }
        selectElement.data('type', 'FOC');
        var firstOption = selectElement.find('option:first');
        var firstOptionValue = firstOption.val();
        selectElement.val(firstOptionValue).trigger('change');

        loopSelect(wrapperLength);

        totalLoop.push(wrapperLength);
        wrapperLength++;
    }
    }

    function removeRow(button) {
        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
        var row = button.closest('tr'); 

        var productSelect = row.querySelector(".productSelect");
        var productId = productSelect.value;

        tableBody.removeChild(row);

        // update subtotal
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];
        var grandTotal = 0;
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];

            var productSelect = row.querySelector(".productSelect");
            var totalInput = row.querySelector(".totalInput");

            if (productSelect && totalInput) {
                var productId = productSelect.value;
                var total = parseFloat(totalInput.value);

                rowDataArray.push({
                    productId: productId,
                    total: total
                });
                grandTotal += total;
            }
        }
        grandTotal = parseFloat(grandTotal.toFixed(2));
        $("#subtotal").text(grandTotal);
    }


    // function removeRow(button) {
    //     console.log('product_listing in removerow:', product_listing);
    //     var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
    //     var row = button.parentNode.parentNode;
    //     var rowIndex = row.rowIndex;

    //     console.log('before remove row product_listing:',product_listing);
    //     // Remove the data object from the product_listing array
    //     product_listing.splice(rowIndex - 1, 1);
    //     console.log('after remove row product_listing:',product_listing);

    //     tableBody.removeChild(row);

    //     // Update the IDs and event handlers of the remaining rows
    //     for (var i = rowIndex; i <= tableBody.rows.length; i++) {
    //         var cells = tableBody.rows[i - 1].getElementsByTagName('td');
    //         cells[0].querySelector(".productSelect").id = "productSelect" + i;
    //         cells[1].querySelector(".quantityInput").id = "quantity" + i;
    //         cells[2].querySelector(".costInput").id = "cost" + i;
    //         cells[3].querySelector(".totalInput").id = "total" + i;
    //         cells[4].querySelector("button").setAttribute("onclick", "removeRow(this)");
    //     }

    //     var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
    //     var allTotalInputs = tableBody.querySelectorAll(".totalInput");
    //     var grandTotal = 0;
    //     for (var j = 0; j < allTotalInputs.length; j++) {
    //         var rowTotal = parseFloat(allTotalInputs[j].value);
    //         if (!isNaN(rowTotal)) {
    //             grandTotal += rowTotal;
    //         }
    //     }
    //     $("#subtotal").val(grandTotal);
    // }

    function updateSubtotal(input) {
        var row = input.closest("tr");

        if (row) {
            var productSelect = row.querySelector(".productSelect");
            updateCostAndTotal(row);
        } else {
            console.log("Row not found");
        }
    }


    function updateCostAndTotal(row) {
        var productSelect = row.querySelector(".productSelect");
        var costInput = row.querySelector(".costInput");
        var quantityInput = row.querySelector(".quantityInput");
        var totalInput = row.querySelector(".totalInput");

        if (productSelect && costInput && quantityInput && totalInput) {
            var rowIndex = row.rowIndex;
            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var addedBy = row.getAttribute("data-type");
            if (addedBy === "FOC") {
                var addType = "FOC";
            }
            else {
                var addType = "Purchase";
            }
            var rowData = {
                id: selectedOption.value,
                name: selectedOption.textContent,
                cost: parseFloat(selectedOption.getAttribute("data-cost")) || 0,
                quantity: parseFloat(quantityInput.value) || 0,
                total: 0, // Initialize total
                type: addType,
            };

            // Check the custom "data-type" attribute to determine the type
            rowData.type = selectedOption.getAttribute("data-type") || "Other";

            rowData.total = rowData.cost * rowData.quantity;

            product_listing[rowIndex - 1] = rowData;
            var overallTotal = 0;
            for (var i = 0; i < product_listing.length; i++) {
                if (product_listing[i] && product_listing[i].total !== undefined) {
                    overallTotal += parseFloat(product_listing[i].total);
                }
            }

            costInput.value = rowData.cost.toFixed(2);
            totalInput.value = rowData.total.toFixed(2);

        } else {
            console.log("One or more elements not found in the row");
        }

        var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];
        var grandTotal = 0;
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];

            var productSelect = row.querySelector(".productSelect");
            var totalInput = row.querySelector(".totalInput");
            var quantityInput = row.querySelector(".quantityInput");
            var costInput = row.querySelector(".costInput");

            if (productSelect && totalInput) {
                var productId = productSelect.value;
                var total = parseFloat(totalInput.value);
                var total1 = parseInt(quantityInput.value) * parseFloat(costInput.value);
                rowDataArray.push({
                    productId: productId,
                    total: total
                });
                grandTotal += total;
            }
        }
        grandTotal = parseFloat(grandTotal.toFixed(2));
        $("#subtotal").text(grandTotal);
    }

    function closeDiv(n,id) {
        var totalLoop =[1];

        const index = totalLoop.indexOf(id); 

        $("#action" + id).val('delete');

        if (index > -1) {
          totalLoop.splice(index, 1); 
        }

        var lang = $(n).parent().find('.productSelect').val();

        // $(n).parent().parent().remove();
        $(n).parent().css("background-color", "rgba(255, 0, 0, 0.3)");
        $("#closeBtn" + id).css("display","none");
        $("#total" + id).val(0.00);
        $("#quantity" + id).val(0);
        $("#quantity" + id).attr("disabled", true);;
        $("#productSelect" + id).attr("disabled", true);

        countSubtotal();
    }

    function countTotal() {
        $(".totalInput").each(function() {
            var row = $(this).closest("tr");
            var quantity = parseFloat(row.find(".quantityInput").val()) || 0;
            var cost = parseFloat(row.find(".costInput").val()) || 0;
            var total = quantity * cost;
            $(this).val(total.toFixed(2));
        });
    }

    function sendNew(data, message) {
        var editId = data.po_id;
        showMessage('Purchase Order Has Been Created Successfully', 'success', 'Success Create Purchase Order', 'check', ['purchase.php', {id : editId} ])
    }
    
    // function productListOpt(data, message) {
    //     if(data) {
    //         $("#appendBranch").empty();
    //         $("#appendProduct").empty();
        
    //         var branchHTML2 = 
    //             `<div class="col-md-4">
    //                 <label>
    //                     Branch Name
    //                 </label>
    //                 <select id="branchNameDropdown" class="form-control" required>
    //                     <option value="">Select a branch</option>
    //                 </select>
    //             </div>
    //             <div class="col-md-4">
    //                 <label>
    //                     Branch Address
    //                 </label>
    //                 <select id="branchAddressDropdown" class="form-control" required>
    //                     <option value="">Select the address</option>
    //                 </select>
    //             </div>`;

    //         var branchHTML = 
    //         `   <label>
    //                 Branch Address
    //             </label>
    //             <select id="branchAddressDropdown" class="form-control" required>
    //                 <option value="">Select the address</option>
    //             </select>`;

    //         var productHTML =
    //             `<div class="col-md-12">
                                                        
    //                 <div class="addProductWrapper default">
    //                     <span class="dtxt">Default</span>
                        
    //                     <div class="row" id="pr1">
    //                         <div class="col-md-4">
    //                             <label>1. Product</label>
    //                             <select id="productSelect1" onchange="loopSelect('1')" class="form-control productSelect" required></select>
    //                         </div>
    //                         <div class="col-md-2">
    //                             <label>Quantity</label>
    //                             <input id="quantity1" type="number" oninput="productListOpt()" class="form-control quantityInput" value="1" placeholder="1" required/>
    //                         </div>
    //                         <div class="col-md-3">
    //                             <label>Cost</label>
    //                             <input id="cost1" type="number" value="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control costInput" required readonly/>
    //                         </div>
    //                         <div class="col-md-3">
    //                             <label>Total Amount</label>
    //                             <input id="total1" type="number" value="0.00" class="form-control totalInput" readonly/>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>`;
    //         $("#appendBranch").html(branchHTML).show();
    //         $("#appendProduct").html(productHTML);
    //         $(".addProductWrapper").css("display", "block");
    //         $(".addProductWrapper.noData").css("display", "none");
    //         $(".addProduct").css("display", "unset");
    //         $("#remarks").removeAttr("disabled");
            
    //         var html1 = `<option value="">Select Product</option>`;
    //         $.each(data.product, function(i, obj) { 
    //             html1 += `<option value="${obj.id}" datacost="${obj.cost}">${obj.name}</option>`;
    //             html = html1;
    //         });
    //         $("#productSelect1").html(html1);
    //         if(productId) {
    //             $('#productSelect1').val(productId);
    //             loopSelect('1');
    //         }

    //         var html2 = `<option value="">Select a branch</option>`;
    //         $.each(data.branch, function(i, obj) { 
    //             html2 += `<option value="${obj.id}">${obj.branch_name}</option>`;
    //         });
    //         $("#branchNameDropdown").html(html2);

    //         var html3 = `<option value="">Select the address</option>`;
    //         $.each(data.branch, function(i, obj) { 
    //             html3 += `<option value="${obj.id}">${obj.address}</option>`;
    //         });
    //         $("#branchAddressDropdown").html(html3);
    //     } 

    //     if(poType === 'add')
    //     {
    //         if(data.length < 1) {
    //             $(".productSelect").attr("disabled","disabled");
    //             $(".quantityInput").attr("disabled","disabled");
    //             $(".addProduct").css("display", "none");
    //             showMessage('This vendor have no product yet. Please choose other vendor to continue.', 'warning', 'New Purchase Order', 'warning', '');
    //             $('#vendorDropdown').val('');
    //             $('#appendProduct').empty();
    //             $('#appendBranch').hide();
    //         }
    //     }

    //     $(".productSelect").change(function () {
    //         var select_id = this.id;
    //         var product_cost = $('option:selected', this).attr('datacost');
    //         var costID = "#cost" + select_id.substring(13);
    //         $(costID).val(product_cost);
    //         $(".quantityInput").keyup();
    //         $('.totalInput').trigger('change');

    //         countSubtotal();
    //     });

    //     $(".quantityInput").keyup(function () {
    //         this.value|=0;

    //         var quantity_id = this.id;
    //         var totalID = "#total" + quantity_id.substring(8);
    //         var quantity = $('#' + quantity_id).val();
    //         var product_cost_id = '#cost' + quantity_id.substring(8); 
    //         var product_cost = $(product_cost_id).val(); 

    //         $(totalID).val((product_cost * quantity).toFixed(2));
    //         $('.totalInput').trigger('change');
    //         countSubtotal();
    //     })

    //     $('#productSelect1').select2({
    //         dropdownAutoWidth: true,
    //         templateResult: newFormatState,
    //         templateSelection: newFormatState,
    //     });
    // }

    function productListOpt(data, message) {
        productList = data.product;
        if (data) {
            var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];

            var newRow = tableBody.insertRow();

            var rowIndex = tableBody.rows.length;

            var cell1 = newRow.insertCell(0);
            cell1.innerHTML = `
                <select id="productSelect${rowIndex}" class="form-control productSelect" required>
                    <option value="">Select Product</option>
                </select>
            `;

            var cell2 = newRow.insertCell(1);
            cell2.innerHTML = `
                <input type="number" class="form-control quantityInput" value="1" oninput="updateSubtotal(this);" placeholder="1" required/>
            `;

            var cell3 = newRow.insertCell(2);
            cell3.innerHTML = `
                <input id="cost${rowIndex}" type="number" value="0.00" class="form-control costInput" required readonly/>
            `;

            var cell4 = newRow.insertCell(3);
            cell4.innerHTML = `
                <input type="number" value="0.00" class="form-control totalInput" readonly/>
            `;

            var cell5 = newRow.insertCell(4);
            cell5.innerHTML = `
                <button class="removeButton" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
            `;

            var productSelect = newRow.querySelector(".productSelect");
            productSelect.innerHTML = `<option value="">Select Product</option>`;
            $.each(data.product, function(i, obj) {
                productSelect.innerHTML += `<option value="${obj.id}" data-cost="${obj.cost}">${obj.name}</option>`;
            });

            productSelect.addEventListener("change", function() {
                var selectedOption = productSelect.options[productSelect.selectedIndex];
                var costInput = newRow.querySelector(".costInput");
                costInput.value = selectedOption.getAttribute("data-cost") || "0.00";

                // Trigger a change event on the quantity input to update the total
                var quantityInput = newRow.querySelector(".quantityInput");
                quantityInput.dispatchEvent(new Event("input"));

                countTotal(); // Update the total for this row
            });

            var html2 = `<option value="">Select a branch</option>`;
            $.each(data.branch, function(i, obj) { 
                html2 += `<option value="${obj.id}">${obj.branch_name}</option>`;
            });
            $("#branchNameDropdown").html(html2);

            if(data.branch.length == 1)
            {
                $.each(data.branch, function(i, obj) { 
                    html3 += `<option value="${obj.id}">${obj.address}</option>`;
                });
                $("#branchAddressDropdown").html(html3);
            }
            else
            {
                var html3 = `<option value="">Select the address</option>`;
                $.each(data.branch, function(i, obj) { 
                    html3 += `<option value="${obj.id}">${obj.address}</option>`;
                });
                $("#branchAddressDropdown").html(html3);
            }
            rowIndex++;
        }

        // reset table everytime when re-select vendor
        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];

        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }

        rowIndex = 1;
    }
    
    function loadBranchAddress(data, message) {
        productList = data.product;
        if (data) {

            if(data.branch.length == 1)
            {
                $.each(data.branch, function(i, obj) { 
                    html3 += `<option value="${obj.id}">${obj.address}</option>`;
                });
                $("#branchAddressDropdown").html(html3);
            }
            else
            {
                var html3 = `<option value="">Select the address</option>`;
                $.each(data.branch, function(i, obj) { 
                    html3 += `<option value="${obj.id}">${obj.address}</option>`;
                });
                $("#branchAddressDropdown").html(html3);
            }
        }
    }

    function keyinQuantity() {
        var quantity = $("#quantity1").val(); 
        var total_per_row = quantity * product_cost;
        var decimal_total_per_row = total_per_row.toFixed(2);

        $('#total1').val(decimal_total_per_row);
    }

    function loopSelect(id) {
        var select_id = id;
        var productSelect = "#productSelect" + select_id;
        var product_cost = $('option:selected', productSelect).attr('data-cost');
        var costID = "#cost" + select_id;
        $(costID).val(product_cost);

        $("#quantityInput" + id).keyup(id);
        $("#totalInput" + id).trigger('change');
        countSubtotal();
        loopQuantity(id);
    }

    function loopQuantity(id) { 
        this.value|=0;

        var quantity_id = id;
        var totalID = "#total" + quantity_id;
        var quantity = $('#quantity' + quantity_id).val();
        var product_cost_id = '#cost' + quantity_id; 
        var product_cost = $(product_cost_id).val(); 

        $(totalID).val((product_cost * quantity).toFixed(2));
        $("#totalInput" + id).trigger('change');
        countSubtotal();
    }

    $(".quantityInput").keyup(function() {
        countSubtotal();
    })

    function vendorList(vendorName) {
        var formData = {
            command        : "getVendorList",
        };
        fCallback = displayVendorList;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function countSubtotal() {
        var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];
        var subtotal = 0;
        var maxId = 0;

        $(".totalInput").each(function() {
            var id = parseInt($(this).attr("id").replace("total", ""));
            if (!isNaN(id) && id > maxId) {
                maxId = id;
            }
        });
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var quantityInput = row.querySelector(".quantityInput");
            var costInput = row.querySelector(".costInput");
            var quantity = parseFloat(quantityInput.value);
            var cost = parseFloat(costInput.value);

            var total = quantity * cost;
            if(total > 0)
            {
                subtotal += total;
            }
        }
        // for (var i = 1; i <= maxId; i++) {
        //     var totalElement = document.getElementById('total' + i);
        //     var quantityElement = document.getElementById('quantity' + i);
        //     console.log('totalElement',totalElement);
        //     if (totalElement) {
        //         var totalValue = parseFloat(totalElement.value) || 0;
        //         var quantityValue = parseFloat(quantityElement.value) || 0;
        //     console.log('quantityValue',quantityValue);
        //         subtotal += totalValue;
        //         console.log('totalValue',totalValue);
        //     }
        // }
        subtotal = parseFloat(subtotal.toFixed(2));
        $('#subtotal').text(subtotal);
    }

    function displayVendorList(data, message) {
        vendorList = data.vendorList;
        adminList = data.adminList;
        if (vendorList) {
            var vendorName = '';
            vendorName += `<option value="" data-lang="M02737">Please select vendor</option>`;
            // vendorName += `<option value="create-vendor" data-lang="M02737">Create vendor</option>`;

            $.each(vendorList, function(k, v) {
                vendorName += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
            });
            $('#vendorDropdown').html(vendorName); // Append new options
            // $('#vendor_name').html(vendorName);
        }
        if(adminList)
        {
            var adminName = '';
            adminName += `<option value="" data-lang="M02737">Please select assignee</option>`;
            $.each(adminList, function(k, v) {
                adminName += `
                    <option value="${v['id']}">${v['name']}</option>
                `;
            });
            $('#assignAdmin').html(adminName); // Append new options
            $("#assignAdmin").val(assign_id_ini).select2();
        }
    }
    
    function loadEdit(data, message) {
        totalPO = data.totalPO;
        vendorList();
        goToPage();
        status = data.status;
        subtotal = data.total_cost
        subtotal = parseFloat(subtotal.toFixed(2));
        $("#subtotal").text(subtotal);
        $("#remarks").val(data.remarks);
        $("#warehouse").val(data.current_warehouse_location);
        $("#statusField").show();
        $("#status").val(data.status);
        $("#createdBy").val(data.created_by);
        $("#approvedBy").val(data.approved_by);
        $("#branchAddressText").val(data.vendor_address);
        $('#poNo').text(data.order_number);
        $('#purchaseDate').val(data.purchase_date);
        assign_id_ini = data.assignTo;
        productList = data.productList;
        printStickersProductList = data.productList;
        printStickersValidatedStock = data.validatedStock;
        activeSerialList = data.activeStockList;
        detailedOperationList = data.getDetailedOperation;
        totalProductLists = data.totalProductList;
        currentWarehouseId = data.current_warehouse_id;
        $("#save").hide();
        $("#discard").hide();
        $("#branchAddressDropdown").hide();   
        $("#addPO").hide();   
        $("#editPObtn").hide(); 
        $("#addProductRow").hide(); 
        $("#addFOCRow").hide(); 
        $("#remarks").attr("disabled", "true");

        // var selectedOption = $('#vendorDropdown option:selected').text();
        // var formData = {
        //     command        : "getProductList",
        //     vendor_id      : data.vendor_id,
        // };
        // fCallback = productListOpt2;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if(status == 'Purchasing' || status == 'Pending For Stock In' || status == 'Done')
        {
            var addImageEnabled = true;
            $("#imageSection").prop("disabled", false);
            $("#imageSection").show();
            $("#approverLbl").show();
            $("#createdLbl").show();
        }
        
        if(vendor == ""){
            vendorName = data.productList[0]['vendor_name'];
        }

        if(data.status == "Approved" || data.status == "Pending For Stock In" || data.status == "Done" || data.status == "Cancelled" || data.status == "Purchasing") {
            $("#cancelled").hide();
            $("#approve").hide();
        }

        if(data.status == "RFQ"){
            $("#rfqStatusLbl").css("background-color", "#3a5999");
            $("#rfqStatusLbl").css("color", "white");
        }
        else if(data.status == "Approved"){
            $("#apprStatusLbl").css("background-color", "#3a5999");
            $("#apprStatusLbl").css("color", "white");
        }
        else if(data.status == "Pending For Stock In" ){
            $("#psiStatusLbl").css("background-color", "#3a5999");
            $("#psiStatusLbl").css("color", "white");
        }
        else if(data.status == "Done" ){
            $("#doneStatusLbl").css("background-color", "#3a5999");
            $("#doneStatusLbl").css("color", "white");
            $("#editPO").hide(); 
        }
        else if(data.status == "Purchasing" ){
            $("#prStatusLbl").css("background-color", "#3a5999");
            $("#prStatusLbl").css("color", "white");
        }

        if(data.status == "Pending For Stock In") {
            $("#validatedStock").hide();

            if(data.validatedStock != null){
                $("#validatedStock").css("display", "block");
            }
        }

        if(data.status == "Approved")
        {
            $("#accept").show();
            $("#reject").show();
        }
        $("#openVendor").show();

        if(data.status == "Purchasing")
        {
            $("#upgradeStockIn").show();
        }

        if(data.status == "Cancelled")
        {
            $("#editPO").hide();
            $("#discard").hide();
            $("#actionBtn").hide();
            $("#editPObtn").hide();
            $("#edit, #approve, #cancelled").hide();
            $("#warehouseDropdown").hide();
            $("#save").hide();
            $("#branchAddressDropdown").hide();   
            $("#addPO").hide();   
            $("#addProductRow").hide(); 
            $("#addFOCRow").hide(); 
            $("#openVendor").hide(); 
        }

        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
        tableBody.innerHTML = ''; 

        data.productList.forEach(function (product, index) {
            if(product.type == 'Purchase')
            {
                addRow3(); // Call addRow3 to add a new row
            }
            else
            {
                addFOC3();
            }
            var rowIndex = rowIndex;

            $("#quantity" + rowIndex).val(product.quantity);
            $("#id" + rowIndex).val(product.product_id);
            $("#productType" + rowIndex).val(product.type);
            $("#cost" + rowIndex).val(product.cost.toFixed(2));
            editTotal = (product.cost * product.quantity) + editTotal;
            editTotal = parseFloat(editTotal.toFixed(2));
            $("#subtotal").text(editTotal);

            // Set the selected product in the select input
            $("#productSelect" + rowIndex).val(product.product_id);

            if (status != "RFQ" && status != "Approved" && status != "Purchasing") {
                $("#remarks").attr("disabled", true);
                $("input").attr("disabled", true);
                $("select").attr("disabled", true);
                $(".addProduct").css("display", "none");
                $("#edit").attr("disabled", true);
                $("#approve").attr("disabled", true);
                $(".closeBtn").css("display", "none");
                if (status != "Cancelled") {
                    $("#serialNumber").css("display", "block");
                }
                $('.addProductImage').hide();
                $(".costInput").removeAttr("disabled");
                $(".totalInput").removeAttr("disabled");
            }
        });

        if(data.status == "Done")
        {
            loadValidatedStockModal(data, message);

        }

        var productSelects = document.querySelectorAll(".productSelect");

        productSelects.forEach(function(select) {
            select.disabled = true;
        });

        var quantityInputs = document.querySelectorAll(".quantityInput");

        quantityInputs.forEach(function(input) {
            input.disabled = true;
        });

        var removeBtn = document.querySelectorAll(".removeButton");

        removeBtn.forEach(function(input) {
            input.disabled = true;
        });

        var imageList = data.imageList;

        // $.each(imageList, function(k, v) {
        //     var newK = k + 1;
        //     var imgElement = `<img src="${v['url']}" alt="${v['name']}" style="max-width: 600px; max-height: 310px;">`;

        //     // Append the image to the 'buildImg' div
        //     $('#buildImg').append(imgElement);

        //     $('#fileName' + newK).html(v['name']);
        //     $("#viewImg" + newK).css('display', 'inline-block');
        //     $("#deleteImg" + newK).css('display', 'inline-block');

        //     $('#storeFileName' + newK).val(v['name']);
        //     $('#storeFileData' + newK).val(v['url']);
        //     $('#storeFileIsExist' + newK).val('true');

        //     var dataUrl = '';

        //     var image = new Image();
        //     image.crossOrigin = 'anonymous';
        //     image.onload = function() {
        //         var canvas = document.createElement('canvas');
        //         var ctx = canvas.getContext('2d');
        //         canvas.height = image.naturalHeight;
        //         canvas.width = image.naturalWidth;
        //         ctx.drawImage(image, 0, 0);
        //         dataUrl = canvas.toDataURL();

        //         $('#storeFileIsExist' + newK).val('true');
        //         $('#storeFile64Bit' + newK).val(dataUrl);
        //     };

        //     image.src = $('#storeFileData' + newK).val();
        // });

        $.each(imageList, function(k, v) {
            addImgCount = addImgCount + 1; 
            addImgIDNum = addImgIDNum + 1;
            var imgElement = `<img src="${v['url']}" alt="${v['name']}" style="max-width: 600px; max-height: 310px;">`;
    
            var buildImg = "";
    
            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}" value="${v.url}">
                        <input type="hidden" id="storeFileName${addImgIDNum}" value="${v.name}">
                        <input type="hidden" id="storeFileType${addImgIDNum}" value="${v.name}">
                        <input type="hidden" id="storeFileFlag${addImgIDNum}" value="0">
                        <input type="hidden" id="storeFileSize${addImgIDNum}" value="${v.name}">
                        <input type="hidden" id="storeFileID${addImgIDNum}" value="${v.id}">
                        <input type="hidden" id="storeFile64Bit${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}" value="${(v.name).toLowerCase()}">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">
                        <div>
                            <!-- <span id="fileName${addImgIDNum}" class="fileName">
                                ${v.name}
                            </span> -->
                            <img id="thumbnailImg${addImgIDNum}" src="${v.url}" style="width:100%;" />
                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="padding: 6px;" onclick="showImg('${addImgIDNum}')">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;
            $("#buildImg").append(buildImg);
        });

        if(status == 'Pending For Stock In') {
            loadSerialNoTable(data.totalProductList);
            assignSerialNumber();
            $('#serial').prop("readonly", "true");
        }

        if(status == 'Confirmed') {
            assignSerialNumber();
        }

        loopQuantity(data.productList.length);

        if(status == 'Done') {
            var displaySerial = '';

            $.each(data.serialList, function(m, n) {
                displaySerial += `${n}\n`;  
            })

            $('#serial').val(displaySerial);
            $('#serial').prop("readonly", "true");
            loadSerialNoTable(data.totalProductList);

            if(data.serialNumberList != null){
                serial_number = data.serialNumberList;
            
                $('#serialForDone').val(serial_number.join('  ||  '));
            }
        }

        vendor_id_ini = data.vendor_id;

        var formData = {
            command        : "getVendor",
        };
        fCallback = loadFormDropdownVendor;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDuplicate(data, message) {
        vendorName = data.vendor_name;
        vendorList();
        goToPage();
        status = data.status;
        subtotal = data.total_cost
        subtotal = parseFloat(subtotal.toFixed(2));
        $("#subtotal").text(subtotal);
        $("#remarks").val(data.remarks);
        $("#warehouse").val(data.current_warehouse_location);
        $("#status").val(data.status);
        $("#createdBy").val(data.created_by);
        $("#approvedBy").val(data.approved_by);
        $('#poNo').text(data.order_number);
        $('#purchaseDate').val(data.purchase_date);
        assign_id_ini = data.assignTo;
        productList = data.productList;
        printStickersProductList = data.productList;
        activeSerialList = data.activeStockList;
        $("#save").hide();
        $("#discard").hide();
        $("#editPObtn").hide(); 
        $("#addProductRow").hide(); 
        $("#actionBtn").hide(); 
        $("#addFOCRow").hide(); 
        $("#remarks").attr("disabled", "true");
        $(".addProductWrapper").css("display", "none");
        $(".addProductWrapper.noData").css("display", "none");
        $(".addProduct").css("display", "none");
        $("#edit, #approve, #cancelled").hide();
        $("#addPO").show();
        $("#editPO").hide();
        $("#assignAdmin").prop("disabled", false);
        $("#vendorDropdown").prop("disabled", false);
        $("#branchAddressDropdown").prop("disabled", false);
        $("#purchaseDate").prop("disabled", false);
        $("#warehouseDropdown").prop("disabled", false);
        $("#branchAddressText").hide();
        $("#purchaseDate").prop("disabled", false);
        $("#addProductRow").show(); 
        $("#addFOCRow").show(); 
        $("#remarks").prop("disabled", false);
        
        if(vendor == ""){
            vendorName = data.productList[0]['vendor_name'];
        }

        $("#rfqStatusLbl").css("background-color", "#3a5999");
        $("#rfqStatusLbl").css("color", "white");

        var tableBody = document.getElementById("productTable").getElementsByTagName('tbody')[0];
        tableBody.innerHTML = ''; 

        data.productList.forEach(function (product, index) {
            addRow3(); 
            var rowIndex = rowIndex;

            $("#quantity" + rowIndex).val(product.quantity);
            $("#id" + rowIndex).val(product.product_id);
            $("#productType" + rowIndex).val(product.type);
            $("#cost" + rowIndex).val(product.cost.toFixed(2));

            var editTotal = product.cost * product.quantity;
            $("#total" + rowIndex).val(editTotal.toFixed(2));

            $("#productSelect" + rowIndex).val(product.product_id);

        });

        var imageList = data.imageList;

        $.each(imageList, function(k, v) {
            var newK = k + 1;
            var imgElement = `<img src="${v['url']}" alt="${v['name']}" style="max-width: 600px; max-height: 310px;">`;

            // Append the image to the 'buildImg' div
            $('#buildImg').append(imgElement);

            $('#fileName' + newK).html(v['name']);
            $("#viewImg" + newK).css('display', 'inline-block');
            $("#deleteImg" + newK).css('display', 'inline-block');

            $('#storeFileName' + newK).val(v['name']);
            $('#storeFileData' + newK).val(v['url']);
            $('#storeFileIsExist' + newK).val('true');

            var dataUrl = '';

            var image = new Image();
            image.crossOrigin = 'anonymous';
            image.onload = function() {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                canvas.height = image.naturalHeight;
                canvas.width = image.naturalWidth;
                ctx.drawImage(image, 0, 0);
                dataUrl = canvas.toDataURL();

                $('#storeFileIsExist' + newK).val('true');
                $('#storeFile64Bit' + newK).val(dataUrl);
            };

            image.src = $('#storeFileData' + newK).val();
        });

        loopQuantity(data.productList.length);

        vendor_id_ini = data.vendor_id;

        var formData = {
            command        : "getVendor",
        };
        fCallback = loadFormDropdownVendor;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var branchAddressDropdown = document.getElementById('branchAddressDropdown');
        branchAddressDropdown.options.length = 0;
        if($('#vendorDropdown option:selected').val() != 0 && $('#vendorDropdown option:selected').val() != 'create-vendor') {
            currentTokenCategory = $('#vendorDropdown :selected').val();
            productDetails();
        }

        if($('#vendorDropdown option:selected').val() == 'create-vendor') {
            $('#vendorDropdown').val('');
            $("#companyNameInput").prop("disabled", false);
            $("#vendorCodeInput").prop("disabled", false);       
            $("#phoneNoInput").prop("disabled", false);             
            $("#vendorEmailInput").prop("disabled", false);                
            $("#picInput").prop("disabled", false);                
            $("#operationHourInput").prop("disabled", false);
            $("#saveNew").show();
            $("#saveClose").hide(); 
            $('#createVendorModal').appendTo("body").modal('show'); 
        }
        
        wrapperLength = 1;
    }

    function productDetails() {
        var selectedOption = $('#vendorDropdown option:selected');
        var formData = {
            command        : "getProductList",
            vendor_name    : vendorName,
        };
        fCallback = loadBranchAddress;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadFormDropdownVendor(data, message) {
        vendorData = data.getVendorDetail;
        $.each(vendorData, function(key, val) {
            var vName = val['name'];
            $('#vendorDropdown').append($('<option>', {
                value: val['id'],
                text: vName
            }));
        });
        $("#vendorDropdown").val(vendor_id_ini).select2();

        var selectedOption = $('#vendorDropdown option:selected').text();
        var formData = {
            command        : "getProductList",
            vendor_id      : vendor_id_ini,
        };
        fCallback = productListOpt2;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function productListOpt2(data, message) {
        var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];
        productList = data.product;

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var productSelect = row.querySelector(".productSelect");
            var s2id = $(productSelect).attr('id').replace('s2id_', '');
            var selectElement = $('#'+s2id);

            if (data) {
                productList = data.product;
                if (product_listing.length === 0) {
                    product_listing = data.product.map(function (obj) {
                        return {
                            id: obj.id,
                            name: obj.name,
                            cost: obj.cost,
                            quantity: obj.quantity,
                            total: obj.total,
                        };
                    });
                }
    
                $.each(data.product, function (i, obj) {
                    var option = new Option(obj.name, obj.id);
                    $(option).attr('data-cost', obj.cost);
                    selectElement.append(option);
                });
            }
            // var selectElement = $('#productSelect1');
            selectElement.select2({
                    dropdownAutoWidth: true,
                    templateResult: newFormatState,
                    templateSelection: newFormatState,
                });
        }
        loadSelect();
    }

    $('#duplicateBtn').click(function() {
        poType = "duplicate";
        $.redirect("purchase.php",{id: currentId, poType: poType});
    });

    function loadSelect() {
        var formData = {
            'command': 'getPurchaseOrderDetails',
            'id'     : editId,
            'module' : 'PO',
            'permissionType' : 'action'
        };
        fCallback = selectPR;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function selectPR(data, message) {
        var grandTotal = 0;
        productData = data.productList;
        $.each(data.productList, function (m, v) {
            var newM = m + 1;
            var productSelect = $("#productSelect" + newM);

            var optionExists = productSelect.find("option[value='" + v['product_id'] + "']").length > 0;

            if (!optionExists) {
                var newOption = new Option(v['name'], v['product_id']);
                productSelect.append(newOption);
            }

            productSelect.val(v['product_id']).trigger('change');
            $("#cost" + newM).val(v['cost']);
            var quantity = parseInt(v['quantity']);
            var editTotal = (v['cost'] * quantity).toFixed(2);
            $("#total" + newM).val(editTotal);
            $("#quantity" + newM).val(quantity);
            grandTotal += editTotal;
            // Determine the type based on the data, e.g., v['type']
            var type = v['type']; // Modify this to get the actual type from your data
            
            // Set the data-type attribute of the select element
            productSelect.attr('data-type', type);
            productSelect.data('purchaseID', v['purchase_product_id']);
            // productSelect.attr('data-purchaseID', v['purchase_product_id']);

        });

        // when load, its the final part to calculate subtotal amount
        var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];
        var subtotal = 0;
        var maxId = 0;

        $(".totalInput").each(function() {
            var id = parseInt($(this).attr("id").replace("total", ""));
            if (!isNaN(id) && id > maxId) {
                maxId = id;
            }
        });
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var quantityInput = row.querySelector(".quantityInput");
            var costInput = row.querySelector(".costInput");
            var quantity = parseFloat(quantityInput.value);
            var cost = parseFloat(costInput.value);

            var total = quantity * cost;
            if(total > 0)
            {
                subtotal += total;
            }
        }
        subtotal = parseFloat(subtotal.toFixed(2));
        $('#subtotal').text(subtotal);

        // re-select warehouse make sure its selected
        currentWarehouseId = data.current_warehouse_id;
        if(currentWarehouseId)
        {
            $('#warehouseDropdown').val(currentWarehouseId);
        }
        if(warehouseData && warehouseData.length == 1){
            $('#warehouseDropdown').val(1).trigger('change.select2');
        }
    }

    function sendEdit(data, message) {
        showMessage('<?php echo $translations['A01742'][$language] /* Purchase Order Has Been Updated */ ?>', 'success', '<?php echo $translations['A00684'][$language] /* Update Successful */ ?>', 'check', ['purchase.php', {id : editId} ])
    }

    function assignSerialNumber() {
        var product_name_set  = $('option:selected', "#productSelect1").text();

        for(var v = 2; v < $(".productSelect").length + 1; v++) {
            var name = ", " + $('option:selected', "#productSelect"+v).text();

            product_name_set += name;
        }
        
        var formData = {
            command       : 'assignSerial',
            id            : editId
        };

        fCallback = generateSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function generateSerial(data, message) {
        var showIncrement = data.showIncrement;
        serial_number = data.serial_number;

        showIncrement = showIncrement.join(';');

        $('#serialShowIncrement').val(showIncrement);

        var displaySerial = '';

        $.each(data.displaySerialNumber, function(m, n) {
            displaySerial += `${n}\n`;  
        })

        $('#serial').val(displaySerial);
        $('#serial').prop("readonly", "true");

        if(status != "Pending For Stock In") {
            confirmSerialAfterAssign();
        } else {
            loadStockInTable(data.stockTable);
        }

    }

    function generateSerial2(data, message) {
        var showIncrement = data.showIncrement;
        serial_number = data.serial_number;

        var serial_list = data.showIncrement;

        showIncrement = showIncrement.join(';');

        $('#serialShowIncrement').val(showIncrement);

        var displaySerial = '';

        $.each(data.displaySerialNumber, function(m, n) {
            displaySerial += `${n}\n`;  
        })

        $('#serial').val(displaySerial);
        $('#serial').prop("readonly", "true");

        confirmSerialAfterAssign(serial_list);
        loadStockInTable(data.stockTable);
    }

    function clearSerial(){
        $('#serial').val('');
        $("#confirmSerial").attr("disabled", true);
    }

    function confirmSerialAfterAssign(serial_list) {
        var id = editId;
        var serialList = serial_list;
        
        var formData = {
            command           : 'confirmSerial',
            id                : id,
            // product_name      : product_name,
            serial            : serialList,
        } 

        fCallback = successConfirmSerial;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function successConfirmSerial(data, message) {
        status = 'Pending For Stock In';
        $('#status').val(status);
        $("#confirmSerial").attr("disabled", true);
        $("#assign").attr("disabled", true);
        $("#clearInput").attr("disabled", true);

        // loadStockInTable(data.stockTable);
        //showMessage('Confirmed PO Serial Number', 'success', 'Success', 'check', '');
    }

    // function loadStockInTable(serialNumberList) {
    //     $('#stockInTable').show();
    //     $('#stockIn').css("display", "block");

    //     var data = $('#serialShowIncrement').val();
    //     data = data.split(';');
    //     var newData = [];

    //     if(data == '')
    //     {
    //         data = serialNumberList;
    //     }
    //     $.each(data, function(k, v) {
    //         var splitData = v.split(',');

    //         var list = {
    //             serial      : splitData[0],
    //             productId   : splitData[1].split(':')[1],          
    //         };

    //         newData.push(list);
    //     });

    //     var html2 = '';

    //     html2 += `
    //         <table class="table table-striped table-bordered no-footer m-0">
    //             <thead>
    //                 <tr>
    //                     <th>No</th>
    //                     <th>Product Name</th>
    //                     <th>Serial No</th>
    //                     <th>Rack No</th>
    //                 </tr>
    //             </thead>
    //             <tbody id="stockInTableBody">
    //             </tbody>
    //         </table>
    //     `;

    //     $('#stockInTable').html(html2);

    //     tableIndex = 0;

    //     $('#stockInTableBody').html('');

    //     $.each(newData, function(k, v) {
    //         var formData = {
    //             command           : 'getProductDetails',
    //             productInvId      : v['productId'],
    //         }

    //         fCallback = loadStockInTableBody;
    //         ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     });
    // }

    function loadStockInTable(datas) {
        $('#stockInTable').show();
        $('#stockIn').css("display", "block");
        var stockIn = datas;
        var html2 = '';

        html2 += `
            <table class="custom-modal-table no-footer m-0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-left-padding">Product Name</th>
                        <th class="text-center">Serial No</th>
                    </tr>
                </thead>
                <tbody id="stockInTableBody">
                </tbody>
            </table>
        `;

        $('#stockInTable').html(html2);
        // $("#stockInTable td:nth-child(1), #stockInTable td:nth-child(3)").css("text-align", "center");

        $('#stockInTableBody').html('');

        loadStockInTableBody(stockIn);
    }

    function loadStockInTableBody(data) {
        var k = 0;
        var stockTable = data;

        if(stockTable.length > 0){
            stockTable.forEach(function (item) {
                var html3 = `
                    <tr>
                        <td class="text-center">${k+1}</td>
                        <td class="text-left-padding">${item.productName}</td>
                        <td class="text-center">
                            <input class="form-control stockInInput" type="text" id="stockInSerialNo${k+1}" onfocus="serialChecking(this)" oninput="inputSerialChecking(this)" ${status === "Done" ? "disabled" : "disabled"}> 
                            <input class="form-control stockInInputProductId" style="display: none;" type="text" id="stockInProductId${k+1}" value="${item.productId}">
                            <input class="form-control hide" type="text" id="skuCode${k+1}" value="${item.skuCode.replace('N', '')}">
                        </td>
                    </tr>
                `;

                $('#stockInTableBody').append(html3);

                k++;
            });
        }
        $("#stockInTableBody td:nth-child(1), #stockInTableBody td:nth-child(3)").css("text-align", "center");

        // if(status == "Pending For Stock In" || status == "Done") $('#inputSerial').removeAttr('disabled').focus();
    }

    function loadSerialNoTable(datas) {
        $('#serialNumberTable').show();
        $('#serialNumber').css("display", "block");
        var serialNoProduct = datas;
        var html4 = '';

        html4 += `
            <table class="custom-modal-table no-footer m-0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-left-padding">Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">View Serial No</th>
                    </tr>
                </thead>
                <tbody id="serialNumberTableBody">
                </tbody>
            </table>
        `;

        $('#serialNumberTable').html(html4);
        // $("#serialNumberTable td:nth-child(1), #serialNumberTable td:nth-child(3), #serialNumberTable td:nth-child(4)").css("text-align", "center").css("cssText", "text-align: center !important");;
       
        $('#serialNumberTableBody').html('');

        loadSerialNoTableBody(serialNoProduct);
    }

    function loadSerialNoTableBody(data) {
        var k = 0;
        var serialNoProductTable = data;
        if(serialNoProductTable.length > 0){
            serialNoProductTable.forEach(function (item) {
                var html5 = `
                    <tr data-th="${item.productId}">
                        <td class="text-center">${k+1}</td>
                        <td class="text-left-padding">${item.name}</td>
                        <td class="text-center">${item.quantity}</td>
                        <td class="text-center"> 
                            <button onclick="loadSerialNoModal(this)" class="btn btn-icon waves-effect waves-light" style="background-color: white; color: #3b5998; padding: 0;"> 
                                <img src="/images/Icon-awesome-edit.png" style="max-width: 20px; width: 100%;"> 
                            </button>
                        </td>
                    </tr>
                `;
       
                $('#serialNumberTableBody').append(html5);

                k++;
            });
            $('td:nth-child(2)').addClass('text-left');

        }
        $("#serialNumberTableBody td:nth-child(1), #serialNumberTableBody td:nth-child(3), #serialNumberTableBody td:nth-child(4)").css("text-align", "center !important");

    }

    function getAllRowData(editType) {
        var tableBody = document.getElementById("productTable").getElementsByTagName("tbody")[0];
        var rows = tableBody.getElementsByTagName("tr");
        var rowDataArray = [];

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var productSelect = row.querySelector(".productSelect");
            var quantityInput = row.querySelector(".quantityInput");
            var costInput = row.querySelector(".costInput");
            var totalInput = row.querySelector(".totalInput");
            var s2id = $(productSelect).attr('id').replace('s2id_', '');
            var productId = $('#'+s2id).val();
            // var productId = $(productSelect).data('productid');
            // Only proceed if a product is selected (product ID is not empty)
            if (productId) {
                var productName = $('#'+s2id).data('productName');
                // var productName = ($('#'+s2id).text()).trim();
                var quantity = parseFloat(quantityInput.value);
                var cost = parseFloat(costInput.value);
                var total = parseFloat(totalInput.value);

                var type = $('#'+s2id).data('type');
                var action = $('#'+s2id).data('action');
                var purchaseProductId = $('#'+s2id).data('purchaseID');
                // var purchaseProductId = productSelect.getAttribute("data-purchaseID");
                var rowData = {
                    id: editType === 'edit' ? purchaseProductId : productId,
                    product_id: productId,
                    name: productName,
                    quantity: quantity,
                    cost: cost,
                    total: total,
                    type: type,
                    action: action ? action : '',
                };

                rowDataArray.push(rowData);
            }
        }

        return rowDataArray;
    }
    
    function getProductIDFromSelect(selectElement) {
        // Retrieve product ID using jQuery data()
        return $(selectElement).data('productid');
    }

    $('#editPO').click(function() {
        $("#assignAdmin").prop("disabled", false);
        if(status == 'RFQ' || status == "Approved")
        {
            $("#vendorDropdown").prop("disabled", false);
        }
        $("#branchAddressDropdown").prop("disabled", false);
        $("#purchaseDate").prop("disabled", false);
        $("#warehouseDropdown").prop("disabled", false);
        $("#remarks").prop("disabled", false);
        $("#warehouseDropdown").prop("disabled", false);
        $("#save").show();
        $("#discard").show();
        $("#editPO").hide();
        $("#editPObtn").show();
        viewMode = false;

        if(status != 'Pending For Stock In' && status != 'Done' ){
            $("#addProductRow").show();
            $("#addFOCRow").show();
        }

        if(status != 'Pending For Stock In')
        {
            $("#editPObtn").show();
        }else if(status == 'Pending For Stock In'){
            $("#assignAdmin").prop("disabled", true);
            $("#purchaseDate").prop("disabled", true);
            $("#addProductRow").hide();
            $("#addFOCRow").hide();
            $("#inputSerial").prop("disabled", false);
        }
        // $("#addProductRow").show(); 
        // $("#addFOCRow").show(); 
        addImageEnabled = false;

        var productSelects = document.querySelectorAll(".productSelect");

        productSelects.forEach(function(select) {
            if(status == 'Pending For Stock In'){
                select.disabled = true;
            }else{
                select.disabled = false;
            }
        });

        var quantityInputs = document.querySelectorAll(".quantityInput");

        quantityInputs.forEach(function(input) {
            if(status == 'Pending For Stock In'){
                input.disabled = true;
            }else{
                input.disabled = false;
            }
        });

        var removeBtn = document.querySelectorAll(".removeButton");

        removeBtn.forEach(function(input) {
            if(status == 'Pending For Stock In'){
                input.disabled = true;
            }else{
                input.disabled = false;
            }
        });

        var stockInInputs = document.querySelectorAll('.stockInInput');

        stockInInputs.forEach(function(input) {
            input.removeAttribute('disabled');
        });
    })

    $('#discard').click(function() {
        $("#save").hide();
        $("#discard").hide();
        $("#editPO").show();
        $("#editPObtn").hide();
        $("#assignAdmin").prop("disabled", true);
        $("#vendorDropdown").prop("disabled", true);
        $("#branchAddressDropdown").prop("disabled", true);
        $("#purchaseDate").prop("disabled", true);
        $("#warehouseDropdown").prop("disabled", true);
        $("#remarks").prop("disabled", true);
        $("#addProductRow").hide(); 
        $("#addFOCRow").hide(); 
        addImageEnabled = true;

        var productSelects = document.querySelectorAll(".productSelect");

        productSelects.forEach(function(select) {
            select.disabled = true;
        });

        var quantityInputs = document.querySelectorAll(".quantityInput");

        quantityInputs.forEach(function(input) {
            input.disabled = true;
        });

        var removeBtn = document.querySelectorAll(".removeButton");

        removeBtn.forEach(function(input) {
            input.disabled = true;
        });

        $.redirect("purchase.php",{id: currentId});
    })

    $('#validateStockIn').click(function() {
        $('#registerLocationModal').appendTo("body").modal('show');
        $("#rackInput").prop("disabled", false);
        $("#inputRackNo").prop("disabled", false);
    })

    $('#submitRack').click(function() {
        var rackInput = document.getElementById('rackInput').value;

        if (rackInput.trim() === '') {
            document.getElementById('rackInputError').innerText = 'Location No cannot be empty.';
            return;
        }
        var serial = [];
        var serialProductId = [];

        for(i = 0; i < $(".stockInInput").length; i++) {
            var newI = i + 1;
            var perSerial = {
                serial_number: $("#stockInSerialNo" + newI).val(),
            }
            serial.push(perSerial);
        }

        for(i = 0; i < $(".stockInInputProductId").length; i++) {
            var newI = i + 1;
            var perSerialProductId = {
                serial_number: $("#stockInSerialNo" + newI).val(),
                product_id: $("#stockInProductId" + newI).val(),
            }
            serialProductId.push(perSerialProductId);
        }

        var selectedRack = $('#rackInput').val();

        var formData = {
            command         : 'ActiveSerialCheck',
            po_id           : editId,
            serial          : serial,
            serialProductId : serialProductId,
            rack_no         : selectedRack,
        }
        fCallback = checkSerialNotInList;
        ajaxSend(url2, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        $('#registerLocationModal').modal('hide');
    })

    function checkSerialNotInList(data, message) {
        var serialNotInList = data.serialNotInList;

        if(serialNotInList) {
            // Clear serial not in list & show error message
        } else {
            successSaveSerial();
        }
    }

    // function successSaveSerial() {
    //     showMessage('Stock in saved', 'success', 'Stock In', 'check', ['purchase.php', {id : editId} ])
    // }

    function successSaveSerial() {
    // Show the modal
    $('#myModal').appendTo("body").modal('show');

}

    function printStickers() {
    $('#printarea').empty();

    if (serial_number && printStickersProductList) {
        var serialIndex = 0;  // Initialize the serial index

        for (var k = 0; k < printStickersProductList.length; k++) {
            var productDetails = printStickersProductList[k];
            var quantity = productDetails.quantity;  // Retrieve the quantity for the current product

            for (var i = 0; i < quantity; i++) {
                serialIndex++;  // Increment the serial index for each sticker
                var stickerHtml = `
                    <div class="printSticker" id="printSticker${serialIndex}">
                        <div class="productNameEN bigText">${productDetails.name}</div>
                        <div><b>Best Before: <span class="bestBefore">${productDetails.best_before_days}</span></b></div>
                        <div class="qrCode"></div>
                        <div class="qrLink smallText">Serial Number URL: ${defaultSNUrl + serial_number[serialIndex - 1]}</div>
                    </div>
                `;
                $('#printarea').append(stickerHtml);

                // Generate the QR code
                var qrCodeContent = defaultSNUrl + serial_number[serialIndex - 1];
                $(`#printSticker${serialIndex} .qrCode`).qrcode({
                    render: "canvas",
                    text: qrCodeContent,
                    width: 100,
                    height: 100,
                    background: "#ffffff",
                    foreground: "#000000",
                });
            }
        }

        // Print the stickers
        var printContent = document.getElementById('printarea');
        printContent.scrollIntoView(); 

        window.print();

        // Remove the stickers after printing
        $('#printarea').empty();
    } else {
        showMessage('Serial number or product not found.', 'warning', 'Print Serial Number', '', '');
    }
}



    function printValidatedStockSticker() {
        $('#printarea').empty();

        var ischeck =$("#validatedStockModalTable tr:has(td) input[type=checkbox]");
        if (ischeck.filter(":checked").length === 0) {
            if (printStickersValidatedStock) {
                for (var k = 0; k < printStickersValidatedStock.length; k++) {
                    var validatedStock = printStickersValidatedStock[k % printStickersValidatedStock.length];

                    var stickerHtml = `
                        <div class="printSticker" id="printSticker${k + 1}">
                            <div class="productNameEN bigText">${validatedStock.productName}</div>
                            <div><b>Best Before : <span class="bestBefore">${validatedStock.bestBefore}</span></b></div>
                            <div class="qrCode"></div>
                            <div class="qrLink smallText">Serial Number URL: ${defaultSNUrl + validated_serial_num[k]}</div>
                        </div>
                    `;
                    $('#printarea').append(stickerHtml);

                    // Generate the QR code
                    var qrCodeContent = defaultSNUrl + serial_number[k];
                    $(`#printSticker${k + 1} .qrCode`).qrcode({
                        render: "canvas",
                        text: qrCodeContent,
                        width: 100,
                        height: 100,
                        background: "#ffffff",
                        foreground: "#000000",
                    });
                }

                // Print the stickers
                var printContent = document.getElementById('printarea');
                printContent.scrollIntoView(); 

                window.print();

                // Remove the stickers after printing
                $('#printarea').empty();
            } else {
                showMessage('No Validated Stock.', 'warning', 'Print Validated Stock', '', '');
            }
        }else{
            $("#validatedStockModalTable tr:has(td) input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                // if ($(row).index() !== 0) {
                    var stickerHtml = `
                        <div class="printSticker" id="printSticker${row.cells[1].innerHTML}">
                            <div class="productNameEN bigText">${row.cells[2].innerHTML}</div>
                            <div><b>Best Before : <span class="bestBefore">${row.cells[5].innerHTML}</span></b></div>
                            <div class="qrCode"></div>
                            <div class="qrLink smallText">Serial Number URL: ${defaultSNUrl + row.cells[3].innerHTML}</div>
                        </div>
                    `;

                    $('#printarea').append(stickerHtml);

                    // Generate the QR code
                    var qrCodeContent = defaultSNUrl + row.cells[3].innerHTML;
                    $(`#printSticker${row.cells[1].innerHTML} .qrCode`).qrcode({
                        render: "canvas",
                        text: qrCodeContent,
                        width: 100,
                        height: 100,
                        background: "#ffffff",
                        foreground: "#000000",
                    });
                // }
            });

            // Print the stickers
            var printContent = document.getElementById('printarea');
            printContent.scrollIntoView(); 

            window.print();

            // Remove the stickers after printing
            $('#printarea').empty();
            
        } 
    }

    function printNotStockInStickers() {
        $('#printarea').empty();
        var validatedStockSerial = [];

        var ischeck =$("#viewSerialNoModalTableBody tr:has(td) input[type=checkbox]");

        if (ischeck.filter(":checked").length === 0) {
            $("#viewSerialNoModalTableBody tr:has(td) input[type=checkbox]:not(:checked):not(:disabled)").each(function () {
                var row = $(this).closest("tr")[0];

                var stickerHtml = `
                    <div class="printSticker" id="printSticker${row.cells[4].innerHTML}">
                        <div class="productNameEN bigText">${row.cells[3].innerHTML}</div>
                        <div><b>Best Before : <span class="bestBefore">${row.cells[2].innerHTML}</span></b></div>
                        <div class="qrCode"></div>
                        <div class="qrLink smallText">Serial Number URL: ${defaultSNUrl + row.cells[1].innerHTML}</div>
                    </div>
                `;

                $('#printarea').append(stickerHtml);

                // Generate the QR code
                var qrCodeContent = defaultSNUrl + row.cells[1].innerHTML;
                $(`#printSticker${row.cells[4].innerHTML} .qrCode`).qrcode({
                    render: "canvas",
                    text: qrCodeContent,
                    width: 100,
                    height: 100,
                    background: "#ffffff",
                    foreground: "#000000",
                });
            });

            // Print the stickers
            var printContent = document.getElementById('printarea');
            printContent.scrollIntoView(); 

            window.print();

            // Remove the stickers after printing
            $('#printarea').empty();

        }else{
            $("#viewSerialNoModalTableBody tr:has(td) input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                var stickerHtml = `
                    <div class="printSticker" id="printSticker${row.cells[4].innerHTML}">
                        <div class="productNameEN bigText">${row.cells[3].innerHTML}</div>
                        <div><b>Best Before : <span class="bestBefore">${row.cells[2].innerHTML}</span></b></div>
                        <div class="qrCode"></div>
                        <div class="qrLink smallText">Serial Number URL: ${defaultSNUrl + row.cells[1].innerHTML}</div>
                    </div>
                `;

                $('#printarea').append(stickerHtml);

                // Generate the QR code
                var qrCodeContent = defaultSNUrl + row.cells[1].innerHTML;
                $(`#printSticker${row.cells[4].innerHTML} .qrCode`).qrcode({
                    render: "canvas",
                    text: qrCodeContent,
                    width: 100,
                    height: 100,
                    background: "#ffffff",
                    foreground: "#000000",
                });
            });

            // Print the stickers
            var printContent = document.getElementById('printarea');
            printContent.scrollIntoView(); 

            window.print();

            // Remove the stickers after printing
            $('#printarea').empty();
        } 
    }

    function removeUrl(e, evt) {
        var url = $(e).val();
        var serialNo = url.replace(defaultSNUrl, '');

        var index = serialNo.lastIndexOf('GT');
        serialNo = serialNo.substring(index);
        $(e).val(serialNo);

        $('#stockInTableBody tr').each(function() {
            var skuCode = $(this).find('[id^=skuCode]').val() + '-';
            if(serialNo.includes(skuCode)) {
                var stockInSerialNo = $(this).find('[id^=stockInSerialNo]');
                if(stockInSerialNo.val() == serialNo) {
                    $('#canvasMessage').addClass('serialExist');
                    showMessage(`Serial number ${serialNo} already exist.`, 'warning', 'Warning', 'warning', '');
                    $('#inputSerial').focus();
                    return false;
                } else if(stockInSerialNo.val() == '' || stockInSerialNo.val() == skuCode) {
                    $("#validateStockIn").show();
                    if(!usedSerialNo.includes(serialNo)) {
                        usedSerialNo.push(serialNo)
                        stockInSerialNo.val(serialNo);
                        return false;
                    }
                }
            }   
        });
    }

    $('#canvasMessage').on('hidden.bs.modal', function() {
        if($(this).hasClass('serialExist')) {
            $('#inputSerial').focus();
            $(this).removeClass('serialExist');
        } else if($(this).hasClass('inputSerialExist')) {
            warningInput.focus();
            $(this).removeClass('inputSerialExist');
        }
    })

    function serialChecking(e) {
        var skuCode = $(e).parent().find('[id^=skuCode]').val() + '-';
        if($(e).val() == '') $(e).val(skuCode);
        $("#validateStockIn").show();
    }

    function inputSerialChecking(e) {
        var aNthChild = $(e).attr('id').replace('stockInSerialNo', '');
        var skuCode = $(e).parent().find('[id^=skuCode]').val() + '-';

        var aSerialLength = $(e).val().length;
        var bSerialLength = skuCode.length;

        if(aSerialLength < bSerialLength) {
            $(e).val(skuCode);
        }

        $('#stockInTableBody tr').each(function() {
            var stockInSerialNo = $(this).find('[id^=stockInSerialNo]');
            var bNthChild = stockInSerialNo.attr('id').replace('stockInSerialNo', '');
            
            if(bNthChild != aNthChild) {
                if(stockInSerialNo.val() == $(e).val() && stockInSerialNo.val() != skuCode) {
                    $('#canvasMessage').addClass('inputSerialExist');
                    showMessage(`Serial number ${$(e).val()} already exist.`, 'warning', 'Warning', 'warning', '');
                    $(e).val(skuCode);
                    warningInput = e;
                }
            }
        });
    }

    function closeDivImg(n) {
        if(!viewMode && status != 'Pending For Stock In')
        {
            addImgCount = addImgCount - 1;

            var img = $(n).parent().find('[id^="storeFileID"]').val();

            if(typeof(img) != 'undefined') {
                imageId.push(img);
            }
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
        }
    }

    function deleteImg(id) {
        $("#fileUpload"+id).val("");
        $("#fileName"+id).text("No File Uploaded");
        $("#storeFileData"+id).val("");
        $("#storeFileName"+id).val("");
        $("#storeFileType"+id).val("");
        $("#storeFileUploadType"+id).val("");

        $("#viewImg"+id).hide();
        $("#deleteImg"+id).hide();
        $("#fileNotUploaded"+id).show()
        $("#thumbnailImg"+id).attr('src', "");
    }

    // function showImg(n, imgUrl) {
    //     $("#modalImg").attr('style','display: block');
        
    //     if(imgUrl != 'undefined')
    //         $("#modalImg").attr('src', imgUrl);
    //     else
    //         $("#modalImg").attr('src', $("#storeFileData" + n).val());

    //     $("#modalVideo").attr('style','display:none');
    //     $("#showImage").modal();
    // }
    function showImg(n) {
        // $("#modalImg").attr('style', 'display: block');

        // var imageSrc = $("#storeFileData" + n).val();

        // $("#modalImg").attr('src', imageSrc);

        // $("#showImage").on('hidden.bs.modal', function () {
        //     $("#createVendorModal").modal('show');
        // });

        // $("#showImage").modal('show');
        // $("#modalVideo").attr('style','display:none');

        // $("#createVendorModal").modal('hide');
        $("#modalImg").attr('style','display: block');
        var imageSrc = $("#storeFileData"+n).val();
        $("#modalImg").attr('src', imageSrc);
        $("#modalVideo").attr('style','display:none');
        $('#showImage').appendTo("body").modal('show');
    }

    function addImage(url) {
        if(!addImageEnabled)
        {
            addImgCount = addImgCount + 1; 
            addImgIDNum = addImgIDNum + 1;
    
            var buildImg = "";
    
            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileFlag${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileIsExist${addImgIDNum}">
                        <input type="hidden" id="storeFile64Bit${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="file" id="imgFileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">
    
                        <div>
                            <a href="javascript:;" onclick="$('#imgFileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileNotUploaded${addImgIDNum}" class="fileName">No Image Uploaded</span>
                            <!-- <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span> -->
                            <img id="thumbnailImg${addImgIDNum}" src="${url}" style="width:100%;" />
                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}', '${url}')">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;
            $("#buildImg").append(buildImg);
    
            if(url) $(`#fileNotUploaded${addImgIDNum}`).hide();
            else $(`#thumbnailImg${addImgIDNum}`).hide();
        }

    }

    function displayFileName(id, n) {
        var dFileName = $("#fileName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                dFileName.text(n.files[0]["name"]);

                const file = n.files[0];

                $("#storeFileData"+id).val(reader["result"]);
                $("#storeFileName"+id).val(n.files[0]["name"]);
                $("#storeFileSize"+id).val(n.files[0]["size"]);
                $("#storeFileType"+id).val(n.files[0]["type"]);
                $("#storeFileFlag"+id).val('1');
                var fileSizeInBytes = n.files[0].size;

                if((n.files[0]["type"]).split('/')[0] === 'image'){
                    $("#storeFileUploadType"+id).val('image');
                    uploadFileType = 'image';
                    inputImgFile = {
                        file : file,
                    }
                    imgFileDataArray.push(inputImgFile);
                    var maxSizeInBytes = 100 * 1024 * 1024;
                }else{
                    $("#storeFileUploadType"+id).val('video');
                    uploadFileType = 'video';
                    var maxSizeInBytes = 300 * 1024 * 1024;
                }
                if (fileSizeInBytes > maxSizeInBytes) {
                    alert('File size exceeds the allowed limit (100 MB). Please choose a smaller file.');
                    return;
                }

                $("#viewImg"+id).css('display', 'inline-block');
                $("#deleteImg"+id).css('display', 'inline-block');
                $("#fileNotUploaded"+id).hide()
                $("#thumbnailImg"+id).attr('src', $("#storeFileData"+id).val()).show();
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

    $('#cancelled').click(function() {
        var formData   = {
            command     : "cancelledPurchaseOrder",
            id          : editId,
            assign_id   : $("#assignAdmin").val(),
            module      : 'PO',
            permissionType : 'action',
        };
        
        fCallback = loadCancelled;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadCancelled(result, message) {
        showMessage('Purchase Order has been cancelled.', 'success', 'Purchase Order has been cancelled.', 'check', 'order.php'); 
    }

    function newFormatState(method) {
        if (!method.id) {
            return method.text;
        }

        var optimage = $(method.element).attr('data-image')
        if (!optimage) {
            return method.text;
        } else {
            var $opt = $(
                '<span onclick="changeTokenCategory('+method.text+')"><img src="' + optimage + '" class="tokenOptionImg" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
            );
            return $opt;
        }
    };

    $('#vendorDropdown').select2({
        dropdownAutoWidth: true,
        templateResult: newFormatState,
        templateSelection: newFormatState,
    });

    $('#assignAdmin').select2({
        dropdownAutoWidth: true,
        templateResult: newFormatState,
        templateSelection: newFormatState,
    });

    function goToPage(direction, data) {
        var poNum = $('#poNum');
        if (!totalPO || totalPO.length === 0) {
            return;
        }
        if (direction === 'previous') {
            var prevId = currentId - 1;
            while (totalPO.findIndex(item => item.id === prevId) === -1 && prevId > 0) {
                prevId--;
            }
            if (prevId >= 1) {
                currentId = prevId;
            }
        } else if (direction === 'next') {
            var nextId = currentId + 1;
            while (totalPO.findIndex(item => item.id === nextId) === -1 && nextId <= totalPO[totalPO.length - 1].id) {
                    nextId++;
            }
            if (nextId <= totalPO[totalPO.length - 1].id) {
                currentId = nextId;
            }
        }
        poNum.text(currentId + '/' + totalPO[totalPO.length - 1].id);
        if(editId != currentId)
        {
            $.redirect("purchase.php",{id: currentId});
        }
    }

    function loadJournalLog(data, message) {
        if(data.journal_list){

            $("#journalSection").empty();

            var html = '';
            $.each(data.journal_list, function (k, v) {
                html += '<div class="card-box m-t-10" style="background-color: #eee; color: black;">';
                html += '<div class="customFont">'+v['action_user']+'</div>';
                html += '<div>'+v['action_msg']+'</div>';

                if(v['msg']){
                    html += '<div><ul>';
                    $.each(v['msg'], function (k2, v2) {
                        html += '<li>'+v2+'</li>';
                    });
                    html += '</ul></div>';
                }

                html += '</div>';
            });

            $("#journalSection").append(html);

        }
    }

    function saveOpenVendorDetail(type){

        if($('#companyNameInput').val() == ''){
            $('#companyInputError').html('<span>Please enter vendor name</span>').css('display', 'block');
            $('html, body').animate({scrollTop : $("#companyInputError").offset().top-100},350);
            $('input#companyNameInput').focus();
            return false;
        }

        if($('#phoneNoInput').val() == ''){
            $('#phoneNoInputError').html('<span>Please enter vendor phone</span>').css('display', 'block');
            $('html, body').animate({scrollTop : $("#phoneNoInputError").offset().top-100},350);
            $('input#phoneNoInput').focus();
            return false;
        }
        
        var name         = $('#companyNameInput').val();
        var code         = $('#vendorCodeInput').val();
        var contact      = "60" + $('#phoneNoInput').val();
        var email        = $('#vendorEmailInput').val();
        var pic          = $('#picInput').val();
        var note         = $('#operationHourInput').val();
        var addressArray = [];
        
        for(var i = 1; i < $(".vendorAddressSection").length + 1; i++) {

            // if($('#addressLineOne' +i).val() == ''){
            //     $('#inputErrorAddressLineOne' +i).html('<span>Please enter vendor address line 1</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorAddressLineOne" +i).offset().top-100},350);
            //     $('input#addressLineOne' +i).focus();
            //     return false;
            // }
            // if($('#addressLineTwo' +i).val() == ''){
            //     $('#inputErrorAddressLineTwo' +i).html('<span>Please enter vendor address line 2</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorAddressLineTwo" +i).offset().top-100},350);
            //     $('input#addressLineTwo' +i).focus();
            //     return false;
            // }
            // if($('#vendorCity' +i).val() == ''){ 
            //     $('#inputErrorVendorCity' +i).html('<span>Please enter vendor city</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorVendorCity" +i).offset().top-100},350);
            //     $('input#vendorCity' +i).focus();
            //     return false;
            // }
            // if($('#vendorState' +i).val() == ''){ 
            //     $('#inputErrorVendorState' +i).html('<span>Please enter vendor state</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorVendorState" +i).offset().top-100},350);
            //     $('input#vendorState' +i).focus();
            //     return false;
            // }
            // if($('#vendorZip' +i).val() == ''){ 
            //     $('#inputErrorVendorZip' +i).html('<span>Please enter vendor zip</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorVendorZip" +i).offset().top-100},350);
            //     $('input#vendorZip' +i).focus();
            //     return false;
            // }
            // if($('#vendorCountry' +i).val() == ''){ 
            //     $('#inputErrorVendorCountry' +i).html('<span>Please enter vendor country</span>').css('display', 'block');
            //     $('html, body').animate({scrollTop : $("#inputErrorVendorCountry" +i).offset().top-100},350);
            //     $('input#vendorCountry' +i).focus();
            //     return false;
            // }

            var details = {
                branch_name: $('#branchName' +i).val(),
                mobile: $('#vendorMobileNo' +i).val(),
                address_line_1: $('#addressLineOne' +i).val(),
                address_line_2: $('#addressLineTwo' +i).val(),
                city: $('#vendorCity' +i).val(),
                state: $('#vendorState' +i).val(),
                zip: $('#vendorZip' +i).val(),
                country: $('#vendorCountry' +i).val()
            };
            addressArray.push(details);

        }

        //uploadImage = [];
        var vendorUploadImage = [];
        
        $(".vendorImageWrapper").each(function() { 
            var imgData = $(this).find('[id^="storeFileData"]').val();
            var imgName = $(this).find('[id^="storeFileName"]').val();
            var imgType = $(this).find('[id^="storeFileType"]').val();
            var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
            var imgSize = $(this).find('[id^="storeFileSize"]').val();
            var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();

            if(imgData != "") {
                buildUploadImage = {
                    imgName : imgName,
                    imgType : imgType,
                    imgFlag : imgFlag,
                    imgSize : imgSize,
                    uploadType : imgUploadType
                };

                var stringImgData = '';

                if($(this).find('[id^="storeFileIsExist"]').val() == 'true') {
                    stringImgData = '"' + $(this).find('[id^="storeFile64Bit"]').val() + '"';
                } else {
                    stringImgData = JSON.stringify(imgData);
                }

                reqData = {
                    imgName : imgName,
                    imgData : stringImgData,
                };
                
                // uploadImageData.push(reqData);
                vendorUploadImage.push(reqData);
            }
        });

        if(type == 'new'){
            var formData  = {
                command     : 'addSupplier',
                name        : name,
                code        : code,
                address     : addressArray,
                email       : email,
                pic         : pic,
                contact     : contact,
                phone       : contact,
                status      : status,
                note        : note,
                uploadImage : vendorUploadImage
            };

            fCallback = createSupplierCallback;
        }
        else{
            var formData  = {
                command     : 'editSupplier',
                supplierID  : vendor_id_ini,
                name        : name,
                code        : code,
                address     : addressArray,
                email       : email,
                pic         : pic,
                contact     : contact,
                status      : status,
                uploadImage : vendorUploadImage,
                // imageId     : imageId,
                note        : note
            };

            fCallback = editSupplierCallback;
        }

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function createSupplierCallback(data, message) {
        showMessage(message, 'success', 'Create Vendor', 'add', ["purchase.php",{id: currentId}]);
    }

    function editSupplierCallback(data, message) {
        showMessage(message, 'success', 'Edit Vendor', 'edit', ["purchase.php",{id: currentId}]);
    }

    function calcTotalCost(id) {
        let a = $("#quantity"+id).val();
        let b = $("#cost"+id).val();

        b = parseFloat(b);

        let c = a * b;

        $("#total"+id).val(c.toFixed(2));

        calcPackagePrice();
        countSubtotal();
    }

    function calcPackagePrice() {
        var total_sum = 0;

        $('.total').each(function (){
            total_sum += parseFloat($(this).val());
        })

        $("#subtotal").text(total_sum.toFixed(2)); 
        goCalc = false;
        $("#subtotal").trigger("change");
    }

    function handleFileUpload(file) {
        file.forEach(function(file, index) {
            var formData = {
                command  : "awsGeneratePreSignedUrl",
                action   : "upload",
                mimeType : file.file.type,
            };
            ajaxSend(url, formData, method, function(data, message) {
                verificationImgVideoLink(data, message, file);  // Pass the file to the function
            }, debug, bypassBlocking, bypassLoading, 0);
        });
    }

    function verificationImgVideoLink(data, message, file){
        var latestProductTable = getAllRowData('edit');

        const presignedUrl = data;
        $.ajax({
            type: 'PUT',
            url: presignedUrl,
            contentType: 'binary/octet-stream',
            processData: false,
            crossDomain : true,
            data: file.file,
            headers: {
                'x-amz-acl': 'public-read',
                'Access-Control-Allow-Headers' : 'Content-Type, Authorization',
                'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE',
            },
            })
            .success(function() {
            })
            .error(function() {
        });

        const indexOfDO = presignedUrl.indexOf('?');
        const extractedUrl = presignedUrl.substring(0, indexOfDO);
        if (file.file.type.startsWith('image/'))
        {
            if(file.imgName && extractedUrl)
            {
                uploadImage.push({
                    imgName : file.imgName,
                    imgData : extractedUrl,
                    uploadType : file.uploadType,
                });
            }
            imgUploadFinishFile.push({
                file : file.file,
            })
        }
        if(imgFileDataArray.length == imgUploadFinishFile.length)
        {
            var formData = {
                command  : "addPurchase",
                assign_id : $("#assignAdmin").val(),
                vendor_id : $("#vendorDropdown").val(),
                branchName_id : $("#branchNameDropdown").val(),
                branchAddress_id : $("#branchAddressDropdown").val(),
                vendor_address_id : $("#branchAddressDropdown").val(),
                warehouse_id : $("#warehouseDropdown").val(),
                buying_date : $("#purchaseDate").val(),
                product_list : latestProductTable,
                remarks : $("#remarks").val(),
                uploadImage: uploadImage,
                imageId : imageId,
                poType  : "edit",
                module  : "PO",
                permissionType : "action",
                id : editId,
            };
            var fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }
</script>
</body>

<style>
</style>
</html>