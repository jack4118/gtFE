<?php

session_start();

include 'include/config.php';
include 'include/class.general.php';
include("language/lang_all.php");

// hide function
 $currentPage = basename($_SERVER['PHP_SELF']);

 if ($currentPage == "addBankAccount" || $currentPage == "bankAccountListing" || $currentPage == "invoice" || $currentPage == "leadershipLadder" || $currentPage == "leadershipLadderDetails" || $currentPage == "leadershipReward") {
    header("Location: index");
 }

// Get the current selected language
$language = General::getLanguage();
$languages = $sys['languages'];

?>

<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>

	<meta charset="utf-8"/>

	<title><?php echo $config['companyName']; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin:: Global Mandatory Vendors -->
	<link href="vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
	<!--end:: Global Mandatory Vendors -->
    
    
    <style>
        :root {
            /*--content:"<?php echo $translations['M00631'][$language]; ?>";*/
            --specialLimited:"<?php echo $translations['M00797'][$language]; //LIMITED ?>";
            --content:"<?php echo $translations['M00327'][$language]; //SOLD OUT ?>";
            --contentMonth:"<?php echo $translations['M00660'][$language]; //For This Month ?>";
             }
    </style>

	<!--begin:: Global Optional Vendors -->
	<link href="vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<!--end:: Global Optional Vendors -->

    <link href="plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/datatables.min.css?ts=<?php echo filemtime('css/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />

    

	<!--begin::Global Theme Styles(used by all pages) -->
    <?php 
        if($_SESSION['username'] == 'director' || $_SESSION['username'] == 'testkv001' || $_SESSION['username'] == 'katetest') {
    ?>

        <link href="css/langcode.css?v=<?php echo filemtime('css/langCode.css'); ?>" rel="stylesheet" type="text/css" />

    <?php     
        }
    ?>

    <link href="css/aos.css?v=<?php echo filemtime('css/aos.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/main.min.css" rel="stylesheet" type="text/css" />
    <link href="css/kt.css?v=<?php echo filemtime('css/kt.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/customResponsive.css?v=<?php echo filemtime('css/customResponsive.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/landing.css?v=<?php echo filemtime('css/landing.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/header.css?v=<?php echo filemtime('css/header.css'); ?>" rel="stylesheet" type="text/css" />


    
	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<!--end::Layout Skins -->

	<link rel="shortcut icon" href="<?php echo $config['favicon']; ?>" />

</head>
<!-- end::Head -->

<div id="canvasLoader" class="hide">
        <div id="canvasLoaderContainer">
            <div class="dank-ass-loader">
              <div class="row">
                 <div class="arrowLoading up outer outer-18"></div>
                 <div class="arrowLoading down outer outer-17"></div>
                 <div class="arrowLoading up outer outer-16"></div>
                 <div class="arrowLoading down outer outer-15"></div>
                 <div class="arrowLoading up outer outer-14"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading up outer outer-1"></div>
                 <div class="arrowLoading down outer outer-2"></div>
                 <div class="arrowLoading up inner inner-6"></div>
                 <div class="arrowLoading down inner inner-5"></div>
                 <div class="arrowLoading up inner inner-4"></div>
                 <div class="arrowLoading down outer outer-13"></div>
                 <div class="arrowLoading up outer outer-12"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading down outer outer-3"></div>
                 <div class="arrowLoading up outer outer-4"></div>
                 <div class="arrowLoading down inner inner-1"></div>
                 <div class="arrowLoading up inner inner-2"></div>
                 <div class="arrowLoading down inner inner-3"></div>
                 <div class="arrowLoading up outer outer-11"></div>
                 <div class="arrowLoading down outer outer-10"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading down outer outer-5"></div>
                 <div class="arrowLoading up outer outer-6"></div>
                 <div class="arrowLoading down outer outer-7"></div>
                 <div class="arrowLoading up outer outer-8"></div>
                 <div class="arrowLoading down outer outer-9"></div>
              </div>
           </div>
        </div>
    </div>

<div class="modal fade" id="canvasMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="" id="modalIcon" class="modal-icon">
                <div id="canvasTitle" class="mt-3 modal-title"></div>
                <div id="canvasAlertMessage" class="mt-3 modalText"></div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button id="canvasCloseBtn" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade centerModal" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="/images/project/successIcon.png" class="modal-icon">
                <div class="mt-3 modal-title">
                    <?php echo $translations['M02815'][$language]; //Shopping Cart ?>
                </div>
                <div class="mt-3 modalText">
                    <?php echo $translations['M03397'][$language]; //Successfully added to cart. ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-default letterSpace w-100" data-dismiss="modal" data-lang="M03398">
                    <?php echo $translations['M03398'][$language]; //Continue Shopping ?>
                 </button>
                 <button onclick="window.location.href='shoppingCart'" type="button" class="ml-3 btn btn-primary green letterSpace w-100" data-dismiss="modal" data-lang="M02817">
                    <?php echo $translations['M02817'][$language]; //Checkout ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="countryRemoveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="/images/project/successIcon.png" class="modal-icon">
                <div class="mt-3 modal-title">
                    <?php echo $translations['M02815'][$language]; //Shopping Cart ?>
                </div>
                <div class="mt-3 modalText">
                    <?php echo $translations['M03396'][$language]; //We are sorry, ?> <span id="countryRemoveText"></span> <?php echo $translations['M03400'][$language]; //package(s) have been removed from your cart due to country eligibility issue. ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="soldOutPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont align-self-center text-center">
                <img src="/images/project/successIcon.png" class="modal-icon">
                <div class="mt-3 modal-title">
                    <?php echo $translations['M02815'][$language]; //Shopping Cart ?>
                </div>
                <div class="mt-3 modalText">
                    <?php echo $translations['M03396'][$language]; //We are sorry, ?> <span id="packageRemoveText"></span> <?php echo $translations['M03404'][$language]; //package(s) are unavailable and have been removed from your cart. ?>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button onclick="location.reload();" type="button" class="btn btn-default letterSpace" data-dismiss="modal" data-lang="M00112">
                    <?php echo $translations['M00112'][$language]; //Close ?>
                 </button>
            </div>
        </div>
    </div>
</div>

<div class="qrModal modal fade show" id="qr_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header">
                <span class="modal-title">Referral Code</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="">
                <div class="position-relative">
                  <div class="" id="qrcode"></div>
                  <div class="iconQRposition">
                      <img class="iconQR" src="<?php echo $config['favicon']; ?>">
                  </div>
                </div>
                <div class="modalText referralTitle mt-3">
                  Referral Link:
                </div>
                <div class="mt-2">
                  <div class="p-2 referralWrap">
                    <div class="row">
                        <div class="col-7">
                          <input type="text" class="form-control referralInp" value="" id="qrInput" readonly="readonly">
                        </div>
                        <div class="col-5 alignMiddle">
                          <button type="button" class="btn btn-primary py-2" onclick="copyQR()">Copy Link</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="copiedMsg mt-2" style="display: none;">
                    <i class="fa fa-check" aria-hidden="true"></i><?php echo $translations['M01122'][$language]; //Copied to Clipboard ?>
                </div>
                <div class="mt-2">
                    <a href="javascript:;" class="btn btnSocial fb" onclick="shareFacebook('qrInput')">
                        <img class="socialMediaIcon" src="/images/project/sm1.png">
                    </a>
                    <a href="javascript:;" class="btn btnSocial twitter" onclick="shareTwitter('qrInput')">
                        <img class="socialMediaIcon" src="/images/project/sm2.png">
                    </a>
                    <a href="javascript:;" class="btn btnSocial whatsapp" onclick="shareWhatsapp('qrInput')">
                        <img class="socialMediaIcon" src="/images/project/sm5.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="news_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<span class="modalIcon"></span>
            <div class="modal-header">
                <span class="modal-title newsTitle">Title</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div class="newsDes" style="margin-top: 10px;">Today, 26 October 2019 Kuala Lumpur curreny raised to 50% above on the rate of ringgit, hurry and travel more!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnPrimaryModal">Download</button>
            </div>
        </div>
    </div>
</div>