<?php
/**
* @author TtwoWeb Sdn Bhd.
* Date  29/08/2018.
**/
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
include($_SERVER["DOCUMENT_ROOT"].'/include/class.cryptDes.php');
        
$post = new post();
$crypt = new cryptDes();
$command = $_POST['command'];
$username   = $_SESSION['username'];
$userID     = $_SESSION['userID'];
$sessionID  = $_SESSION['sessionID'];

if($_POST['type'] == 'logout') {
    session_destroy();
}
else {

    switch($command) {

        case "getTs":
            $myTimeZone = date_default_timezone_get();
            date_default_timezone_set($myTimeZone);
            $date = new DateTime();
            $serverTimeZone = date_offset_get($date);
            $currentTime = strtotime("now");

            $data->currentTime = $currentTime;
            $data->serverTimeZone = $serverTimeZone;

            $result = json_encode($data);

            echo $result;

            break;

        case "recordPerformance":

            $params["usedTime"] = $_POST["usedTime"];
            $params["eventSection"] = $_POST["eventSection"];
            $params["domainName"] = $_SERVER["HTTP_HOST"];
            $params["registerUsername"] = $_POST["username"];
            $params["package"] = $_POST["package"];

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);
            
            echo $result;

        break;

        case "documentDownload":

            $params = array (
                'documentID' => $_POST['documentID']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            $data = $result['data'];
            $fileName = $data['download']['fileName'];
            $fileData = base64_decode($data['download']['fileData']);

            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            header("Content-Type: {'".$ext."'}");
            header("Content-Transfer-Encoding: base64");
            header("Content-Disposition: attachment; filename=$fileName");
            flush();
            ob_end_clean();
            echo $fileData;
            flush();
            ob_end_clean();
            unlink($fileName);

            break;

        case "getInboxUnreadMessage":
            $params = array ();

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

            $unread = $result['data']['inboxUnreadMessage'];
            $_SESSION["unreadMessage"] = $unread;

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);


            echo $result;
            break;

        case "newsDownload":
            $params = array (
                'announcementID' => $_POST['announcementID']
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            $data = $result['data'];
            $fileName = $data['download']['attachment_name'];
            $fileData = base64_decode($data['download']['base_64']);
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);

            header("Content-Type: {'".$ext."'}");
            header("Content-Transfer-Encoding: base64");
            header("Content-Disposition: attachment; filename=$fileName");
            flush();
            ob_end_clean();
            echo $fileData;
            flush();
            ob_end_clean();
            unlink($fileName);
            break;

        case "getTreeSponsor":

            $params = array(
                'clientID' => $_POST['clientID'],
                'username' => $_POST['username'],
                'realClientID' => $userID
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;
            break;

        case "getTreePlacement":

            $params = array (
                'clientID' => $_POST['clientID'],
                'depthLevel' => $_POST['depthLevel'],
                'realClientID' => $userID,
                'username' => $_POST['username']
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;
            break;

        case "getSponsorTreeVerticalView":
            $params = array (
                "clientID" => $_POST['clientId'],
                "targetID" => $_POST['targetId']?$_POST['targetId']:$_POST['clientId'],
                "targetUsername" => $_POST['targetUsername'],
                "viewType" => $_POST['viewType']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
                

            echo $result;
            break;

        case "getSponsorTreeTextView":

                $params = array(
                    'clientID' => $_POST['clientID'],
                    'username' => $_POST['username']
                );
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);
                if ($result['sessionData']['newSessionID']) {
                    $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                    $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
                } 
                if ($result["code"] == 5 || $result["code"] == 3){
                    setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
                }
                $result = json_encode($result);
                

                echo $result;
                break;

        case "getPlacementTreeVerticalView":
            $params = array (
                "clientID" => $_POST['clientId'],
                "targetID" => $_POST['targetId']?$_POST['targetId']:$_POST['clientId'],
                "username" => $_POST['username'],
                "viewType" => $_POST['viewType']
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;
            break;

        case "getClientIntroductionDetails":
            $params = array(
                      "encrypt_code" => $_POST['encrypt_code'],
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            if($config["isLocalHost"]){
                $resultEncode = $result;
            }else{
                $resultDecode = json_decode($result,true);
                $resultDecode['data']["encryptedUsername"] = $crypt->encrypt($resultDecode['data']["username"]);
                $resultEncode = json_encode($resultDecode);
            }

            echo $resultEncode;
            break;

        // case "getClientIntroductionDetails":
        //     $params = array(
        //               "encrypt_code" => $_POST['encrypt_code'],
        //     );

        //     $result = $post->curl($command, $params);

        //     if($config["isLocalHost"]){
        //         $resultEncode = $result;
        //     }else{
        //         $resultDecode = json_decode($result,true);
        //         $resultDecode['data']["encryptedUsername"] = $crypt->encrypt($resultDecode['data']["username"]);
        //         $resultEncode = json_encode($resultDecode);
        //     }

        //     echo $resultEncode;
        //     break;


        case "decodeUsername":
            $referralUsername = $_POST['qr'];
            if(!$config["isLocalHost"]){
                $crypt = new cryptDes();
                $encryptedUsername = $referralUsername;
                $referralUsername = $crypt->decrypt($referralUsername);
            }

            echo $referralUsername;
            break;

        case "getProductList":
            $params = array(
              "getProductLimit" => 1,
              "subscription" => 1
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
            echo $result;
            break;

        case "memberRegistration":

            $params = array(
              "registrationType"      => $_POST['type'],
              'username' => $_POST['username'],
              'dialCode' => $_POST['dialCode'],
              'telNumber' => $_POST['telNumber'],
              'password' => $_POST['password'],
              'confirmPassword' => $_POST['rePassword'],
              'transactionPassword' => $_POST['tPassword'],
              'confirmTransactionPassword' => $_POST['reTPassword'],
              'fullName'  => $_POST['realName'],
              'passport'  => $_POST['passport'],
              'dob' => $_POST['dateBirth'],
              'email' => $_POST['email'],
              'wechat' => $_POST['weChat'],
              'whatsapp' => $_POST['whatsApp'],
              'country' => $_POST['country'],
              'address' => $_POST['address'],
              'sponsorUsername' => $_POST['introducer'],
              'sponsorTelNumber' => $_POST['sponsorTelNumber'],
              'productId' => $_POST['selectedPackage'],
              'ownerTransactionPassword' => $_POST['ownerTransactionPassword'],
              'step' => $_POST['step'],
              'creditPayment' => $_POST['creditData'],
              'sponsorType'   => $_POST['sponsorType'],
              'placementValue'      => $_POST['placementValue'],
              'placementType'      => $_POST['placementType'],
              "remark"          => $_POST['remark'],
              'placementInputType'   => $_POST['placementInputType'],
              'placementUsername' => $_POST['placementUsername'],
              'placementTelNumber' => $_POST['placementTelNumber']
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
            echo $result;

            break;

        case "memberRegistrationConfirmation":
            $params = array(
              "registrationType"      => $_POST['type'],
              'username' => $_POST['username'],
              'dialCode' => $_POST['dialCode'],
              'telNumber' => $_POST['telNumber'],
              'password' => $_POST['password'],
              'confirmPassword' => $_POST['rePassword'],
              'transactionPassword' => $_POST['tPassword'],
              'confirmTransactionPassword' => $_POST['reTPassword'],
              'fullName'  => $_POST['realName'],
              'passport'  => $_POST['passport'],
              'dob' => $_POST['dateBirth'],
              'email' => $_POST['email'],
              'wechat' => $_POST['weChat'],
              'whatsapp' => $_POST['whatsApp'],
              'country' => $_POST['country'],
              'address' => $_POST['address'],
              'sponsorUsername' => $_POST['introducer'],
              'sponsorTelNumber' => $_POST['sponsorTelNumber'],
              'productId' => $_POST['selectedPackage'],
              'step' => $_POST['step'],
              'ownerTransactionPassword' => $_POST['ownTPassword'],
              'creditPayment' => $_POST['creditData'],
              'sponsorType'   => $_POST['sponsorType'],
              'placementValue'      => $_POST['placementValue'],
              'placementType'      => $_POST['placementType'],
              "remark"          => $_POST['remark'],
              // 'verificationCode' => $_POST['verificationCode']
              'placementInputType'   => $_POST['placementInputType'],
              'placementUsername' => $_POST['placementUsername'],
              'placementTelNumber' => $_POST['placementTelNumber']
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
            echo $result;

            break;

        case "accountOwnerVerification":
            $params = array(
              "identityType"      => $_POST['identityType'],
              'identityNumber' => $_POST['identityNumber'],
              'name' => $_POST['name'],
              'dob' => $_POST['dob']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;

            break;

        case "memberResetPasswordVerification":
            $params = array(
              "identityType"      => $_POST['identityType'],
              'identityNumber' => $_POST['identityNumber'],
              'name' => $_POST['name'],
              'dob' => $_POST['dob'],
              'email' => $_POST['email'],
              'step' => $_POST['step'],
              'verificationCode' => $_POST['verificationCode']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;

            break;

        case "verifyTransactionPassword":
            $params = array (
                "tPassword" => $_POST["tPassword"],
                "clientID" => $userID
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result,true);

            if ($result["status"]=='ok') {
                $_SESSION["ReportTransactionPassword"] = 1;
            }

            // $result = json_encode($result,true);
            // $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
            // print_r($params);
            echo $result;
            break;

        case 'addPublicTicket': 
            $params = array (
                "subject" => $_POST["subject"],
                "message" => $_POST["message"],
                "name" => $_POST["name"],
                "phone" => $_POST["phone"],
                "email" => $_POST["email"]
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;
            break;

        case 'getPVPListing':
            $params = array('searchData' => $_POST['searchData']);

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);

            echo $result;
            break;
        case 'instantMemberExcelExport': 
            $params = array (
                "api" => $_POST["api"],
                "clientID" => $_POST['clientID'],
                "titleKey" => $_POST['titleKey'],
                "type" => $_POST['type'],
                "params" => $_POST['params'],
                "fileName" => $_POST['fileName'],
                "headerAry" => $_POST['headerAry'],
                "keyAry" => $_POST['keyAry'], 
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

        case 'getBankAccountDetailMember': 
        case 'addTicket': 
        case 'addBankAccountDetailMember': 
        case 'getWithdrawalData': 
        case 'memberAddNewWithdrawal': 
        case 'memberAddNewWithdrawalConfirmation': 
        case 'documentDownloadList': 
        case 'getInvoiceList': 
        case 'getInvoiceDetail': 
        case 'getInboxListing': 
        case 'getInboxMessages': 
        case 'addInboxMessages': 
        case 'getUnreadAnnoucement': 
        case 'getInboxUnreadMessage': 
        case 'getCreditData': 
        case 'getAvailableCreditWalletAddress': 
        case 'addWalletAddress': 
        case 'getWalletAddressListing': 
        case 'inactiveWalletAddress': 
        case 'getDocumentAnnouncementUnreadMessage': 
        case 'getNavBarDetails': 
        case 'getCreditData':
        case 'convertCreditVerify':
        case 'convertCreditConfirmation':
        case 'getDashboard':
        case 'newsDisplay':
        case 'verifyTransactionPassword':
        case 'getPortfolioList':
        case 'getWithdrawalListing':
        case 'memberCancelWithdrawal':
        case 'getMemberDetails':
        case 'updateWithdrawalStatus':
        case 'activatePortfolio':
        case 'refundPortfolio':
        case 'getPortfolioReturnListing':
        case 'getRegistrationDetailMember':
        case 'publicRegistration':
        case 'publicRegistrationConfirmation':
        case 'getCreditData':
        case 'updateMemberUpline':
        case 'manageClientIntroductionDetails':
        case 'getTheNuxTransactionToken':
        case 'insertTheNuxFundInTransactionID':
        case 'reentryVerification':
        case 'reentryConfirmation':
        case 'getFundInListing':
        case 'requestPortfolioTermination':
        case 'getKYCDetails':
        case 'addKYC':
        case 'memberRegistration':
        case 'memberRegistrationConfirmation':
        case 'getRebateBonusReport':
        case 'getPairingBonusReport':
        case 'getWaterBucketBonusReport':
        case 'getGoldmineBonusReport':
        case 'getReleaseBonusReport':
        case 'memberChangePassword':
        case 'memberChangeTransactionPassword':
        case 'getMemberDetails':
        case 'editMemberDetails':
        case 'getMinMaxPayableByCredit':
        case 'memberReentryVerification':
        case 'memberReentryConfirmation':
        case 'verifyClientSponsor':
        case 'getRegistrationDetailMember':
        case 'publicRegistration':
        case 'publicRegistrationConfirmation':
        case 'sendOTPCode':
        case 'memberResetPassword':
        case 'resetSuccessPassword':
        case 'getPendingRewardList':
        case 'returnPendingCredit':
        case 'getLeadershipBonusReport':
        case 'getInstanReferalBonusListing':
        case 'getRebateBonusListing':
        case 'getBuilderBonusReport':
        case 'getTransactionHistory':
        case 'memberTransferCredit':
        case 'memberTransferCreditConfirmation':
        case 'getBankAccountDetail':
        case 'getBuyProductList':
        case 'getAddressList':
        case 'addAddress':
        case 'deleteAddress':
        case 'getAddress':
        case 'editAddress':
        case 'validateKYCOTP':
        case 'getKYCDetailsNew':
        case 'addKYCValidation':
        case 'addKYCConfirmation':
        case 'getBuyProductDetails':
        case 'getProductIDForSearch':
        case 'purchasePackageVerification':
        case 'purchasePackageConfirmation':
        case 'getOwnMonthlySalesSummary':
        case 'getTeamBonusReport':
        case 'getAwardBonusReport':
        case 'getCashAward':
        case 'getMemberOrderListing':
        case 'getDashboardBanner':
        case 'getPGPMonthlySalesSummary':
        case 'getBonusAmountListing':
        case 'getShoppingCart':
        case 'addShoppingCart':
        case 'updateShoppingCart':
        case 'removeShoppingCart':
        case "getECatalogueList":
        case "getECatalogue":
        case "getInvoiceDetail":
        case "memberGetRecruitPromoReport":
        case "getRecruitPromoDetails":
        case "getStarAward":
        case "memberGetMemberName":
        case "memberGetMemoList":
        case "checkValidVoucher":
        case "callNicepayPaymentGateway":
        case "addBankAccountDetail":
        case "getDownlinePerformanceReport": 
        case "getNewRecuitAndActiveProgram": 
        case "getEnrollmentBonusReport": 
        case "getCoupleBonusReport": 
        case "getUnilevelBonusReport": 
        case "getLeadershipCashRewardReport": 
        case "getDVPMonthlySalesSummary": 
        case "getOwnMonthlyPerformanceReport":  
        
            $params = array ("clientID" => $userID);

            foreach($_POST AS $key => $val){
                if($key == "command") continue;
                $params[$key] = $val;
            }
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            $result = json_encode($result);
                

            echo $result;
            break;
        }
    }
    ?>
