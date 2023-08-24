<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  21/07/2017.
    **/
	session_start();

    include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else{
        switch($command) {
            case "getMemberList":
                $params = array();

                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getCountriesList":
                $params = array("pagination" => $_POST['pagination']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getMemberDetails":
                $params = array("clientID" => $_POST['memberId']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addNewMember":
            case "editMemberDetails":
                $params = array(
                                    "clientID"  => $_POST['clientID'],
                                    "fullName"  => $_POST['fullName'],
                                    "email"     => $_POST['email'],
                                    "dialingArea" => $_POST['dialingArea'],
                                    "phone"     => $_POST['phone'],
                                    "password"      => $_POST['password'],
                                    'checkPassword'     => $_POST['checkPassword'],
                                    'userType'      => $_POST['userType'],
                                    "shipping" => $_POST['shipping'],
                                    // "countryID"   => $_POST['countryID'],
                                    // "identityType"  => $_POST['identityType'],
                                    // "identityNumber" => $_POST['identityNumber'],
                                    // "passport" => $_POST['passport'],
                                    // "dob" => $_POST['dob'],
                                    // "gender" => $_POST['gender'],
                                    // "martialStatus" => $_POST['martialStatus'],
                                    // "childAge" => $_POST['childAge'],
                                    // "childNumber" => $_POST['childNumber'],
                                    // "taxNumber" => $_POST['taxNumber'],
                                    // "status"  => $_POST['status'],
                                    // "bankID"  => $_POST['bankID'],
                                    // "branch"  => $_POST['branch'],
                                    // "bankCity"  => $_POST['bankCity'],
                                    // "accountHolder"  => $_POST['accountHolder'],
                                    // "accountNo"  => $_POST['accountNo'],
                                    // "billingName" => $_POST['billingName'],
                                    // "billingAddress" => $_POST['billingAddress'],
                                    // "billingDistrict" => $_POST['billingDistrict'],
                                    // "billingSubDistrict" => $_POST['billingSubDistrict'],
                                    // "billingCity" => $_POST['billingCity'],
                                    // "billingPostalCode" => $_POST['billingPostalCode'],
                                    // "billingState" => $_POST['billingState'],
                                    // "billingCountryID" => $_POST['billingCountryID'],
                                    // "billingEmail" => $_POST['billingEmail'],
                                    // "billingDialingArea" => $_POST['billingDialingArea'],
                                    // "billingPhone" => $_POST['billingPhone'],
                                    // "deliveryName" => $_POST['deliveryName'],
                                    // "deliveryAddress" => $_POST['deliveryAddress'],
                                    // "deliveryDistrict" => $_POST['deliveryDistrict'],
                                    // "deliverySubDistrict" => $_POST['deliverySubDistrict'],
                                    // "deliveryCity" => $_POST['deliveryCity'],
                                    // "deliveryPostalCode" => $_POST['deliveryPostalCode'],
                                    // "deliveryState" => $_POST['deliveryState'],
                                    // "deliveryCountryID" => $_POST['deliveryCountryID'],
                                    // "deliveryEmail" => $_POST['deliveryEmail'],
                                    // "deliveryDialingArea" => $_POST['deliveryDialingArea'],
                                    // "deliveryPhone" => $_POST['deliveryPhone'],
                                    "clientID" => $_POST['clientID'],

                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "deleteShippingAddress":
            case "deleteAddress":
                $params = array("id"         => $_POST['id']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getViewMemberDetails":
                $params = array("clientID" => $_POST['memberId']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "memberRegistration":
                $params = array ("clientID" => $userID);

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "memberRegistrationConfirmation":
                
                $params = array ("clientID" => $userID);

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationDetailAdmin":
                
                $params = array();

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationPackageDetailAdmin":
                
                $params = array("codeNum"         => $_POST['codeNum'],
                                "type"            => $_POST['type'],
                                "status"          => $_POST['status'],
                                "sponsorUsername" => $_POST['sponsorUsername']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationPaymentDetailAdmin":
                
                $params = array("sponsorUsername" => $_POST['sponsorUsername'],
                                "codeNum"         => $_POST['codeNum']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "verifyPaymentAdmin":
                
                $params = array("clientId"   => $_POST['sponsorID'],    
                                "packageId"  => $_POST['packageId'],
                                "creditData" => $_POST['creditData']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getCreditTransactionList":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getBankAccountListAdmin":
                
                $params = array("searchData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateBankAccStatusAdmin":

                $params = array(
                    'checkedIDs' => $_POST['checkedIDs'],
                    'status'     => $_POST['status']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "reentryPin":

                $params = array("receiverId"        => $_POST['receiverId'],
                                "pinNumber"         => $_POST['pinNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRepurchasePackagePaymentDetailAdmin":

                $params = array("packageID"         => $_POST['packageId'],
                                "clientID"          => $_POST['clientID'],
                                "reentryAmount"     => $_POST['reentryAmount']

                );
                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "reentryPackageAdmin":

                $params = array("clientID"          => $_POST['clientId'],
                                "packageID"         => $_POST['packageId'],
                                "creditData"        => $_POST['creditData'],
                                "creatorId"         => $userId

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getClientRepurchasePinDetail":

                $params = array("clientId" => $_POST['clientId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getClientRepurchasePackageDetailAdmin":

                $params = array("clientID"  => $_POST['clientID'],
                                "pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRepurchasePackageSuccessDetailAdmin":

                $params = array("clientID"  => $_POST['clientID'],
                                "packageID" => $_POST['packageId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminManualApproveFundIn":

                $params = array("walletAddress"  => $_POST['walletAddress'],
                                "amount" => $_POST['amount'],
                                "adminID" => $_SESSION['userID']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getWalletAddressDetails":

                $params = array(
                    "searchData" => $_POST['searchData']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;
            
            case "getAdminApproveFundInListing":

                $params = array(
                    "pageNumber" => $_POST['pageNumber'],
                    "searchData" => $_POST['searchData']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "setWaterBucketPercentage":
                
                $params = array("username" => $_POST['username'],
                                "percentage" => $_POST['percentage']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminReentryAmountVerification":

            $params = array(
                 "clientID"   => $_POST["clientID"],
                 "packageID"   => $_POST["packageID"],
                 "portfolioType"   => $_POST["portfolioType"],
                 "paymentType"   => $_POST["paymentType"],
                 "creditPaymentAry"   => $_POST["creditPaymentAry"],
                 "reentryAmount"   => $_POST["reentryAmount"]
                 // "totalAmount" => $_POST['totalAmount']
            );

             $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminReentryAmountConfirmation":

            $params = array(
                 "clientID"   => $_POST["clientID"],
                 "packageID"   => $_POST["packageID"],
                 "portfolioType"   => $_POST["portfolioType"],
                 "paymentType"   => $_POST["paymentType"],
                 "creditPaymentAry"   => $_POST["creditPaymentAry"],
                 "reentryAmount"   => $_POST["reentryAmount"]
                 // "totalAmount" => $_POST['totalAmount']
            );

             $result = $post->curl($command, $params);

            echo $result;
            break;

            case "getRankListing":
                
                $params = array("searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "pageNumber" => $_POST['pageNumber'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminViewMemberBlockRightListing":
                
                $params = array("searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "pageNumber" => $_POST['pageNumber'],
                                "type"       => $_POST['type'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminGetWalletAddressListing":
                
                $params = array("searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "pageNumber" => $_POST['pageNumber'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getFundInWithdrawConvertListing":
                
                $params = array("searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "pageNumber" => $_POST['pageNumber'],
                                "type"       => $_POST['type'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateWalletAddressStatusAdmin":

                $params = array(
                    'checkedIDs' => $_POST['checkedIDs'],
                    'status'     => $_POST['status']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getExcelReqList":
              $params = array("searchData" => $_POST['inputData'],
                              "pageNumber" => $_POST['pageNumber']
              );

              $result = $post->curl($command, $params);
              echo $result;
              break;

            case "addExcelReq":
              $params = array("command"     => $_POST['API'],
                              "type"        => 'excel',
                              "titleKey"    => $_POST['titleKey'],
                              "params"      => $_POST['params'],
                              "headerAry"   => $_POST['headerAry'],
                              "totalAry"   => $_POST['totalAry'],
                              "keyAry"      => $_POST['keyAry'],
                              "fileName"    => $_POST['fileName']
              );

              $result = $post->curl($command, $params);
              echo $result;
            break;
            case "getAvailableCreditWalletAddress":
                
                $params = array();

                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "reentryPackageValidate":

                $params = array(
                    "clientID" => $_POST['clientID'],
                    "invesmentAmount" => $_POST['invesmentAmount'],
                    "step" => $_POST['step'],
                    "portfolioType" => $_POST['portfolioType'],
                    "creditData" => $_POST['creditData']
                );

                 $result = $post->curl($command, $params);

                echo $result;
                break;

            case "reentryPackage":

                $params = array(
                    "clientID" => $_POST['clientID'],
                    "invesmentAmount" => $_POST['invesmentAmount'],
                    "step" => $_POST['step'],
                    "portfolioType" => $_POST['portfolioType'],
                    "creditData" => $_POST['creditData']
                );

                 $result = $post->curl($command, $params);

                echo $result;
                break;


            case "getPagePermission":

                $params = array(
                    "filePath" => $_POST['filePath'],
                );

                 $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAllBankAccountDetail":
                
                    $params = array(
                        "clientID" => $_POST['clientID'],
                    );

                    $result = $post->curl($command, $params);

                    echo $result;
                break;

            case "getAutoWithdrawalData":
                
                    $params = array(
                        "clientID" => $_POST['clientID'],
                    );

                    $result = $post->curl($command, $params);

                    echo $result;
                break;

            case "getKYCDetails":
                
                    $params = array(
                        "clientID" => $_POST['clientID'],
                    );

                    $result = $post->curl($command, $params);

                    echo $result;
                break;

            case "adminSetAutoWithdrawal":
                
                    $params = array(
                        "clientID"          => $_POST['clientID'],
                        "withdrawalType"    => $_POST['withdrawalType'],
                        "creditType"        => $_POST['creditType'],
                        "walletAddress"     => $_POST['walletAddress'],
                        "bankID"        => $_POST['bankID'],
                        "accountHolderName" => $_POST['accountHolderName'],
                        "accountNo"         => $_POST['accountNo'],
                        "province"          => $_POST['province'],
                        "branch"            => $_POST['branch'],
                        "status"            => $_POST['status'],
                    );

                    $result = $post->curl($command, $params);

                    echo $result;
                break;

            case "getKYCListing":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getKYCDataByID":
                
                $params = array("kycID" => $_POST['kycID']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateKYC":
                
                $params = array(
                    "kycIDAry" => $_POST['kycIDAry'],
                    "status" => $_POST['status'],
                    "remark" => $_POST['remark']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;
                
            case "portfolioTerminateRequestList":
                
                $params = array("searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                                "pageNumber" => $_POST['pageNumber'],
                                "type"       => $_POST['type'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "terminatePortfolio":
                $params = array(
                    "client_id" => $_POST['client_id']
                );

                $result = $post->curl($command, $params);
                echo $result;

                break;

            case "terminatePortfolioByBatch":
                $params = array(
                    "clientIDAry" => $_POST['clientIDAry'],
                    "status"      => $_POST['status'],
                    "remark"      => $_POST['remark']
                );

                $result = $post->curl($command, $params);
                echo $result;

                break;

            case "getState":
            case "reentryConfirmation":
                $params = array(
                    "clientID" => $_POST['receiverId'],
                    "pinCode"      => $_POST['pinNumber'],
                    "type"      => $_POST['type']
                );

                $result = $post->curl($command, $params);
                echo $result;

                break;

            case "addNewMember":
            case "deleteShippingAddress":

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
        }
    }
?>
