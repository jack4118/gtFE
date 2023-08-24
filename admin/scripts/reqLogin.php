<?php
    /**
     * @author ttwoweb.
     * This file is contains the script to process adminLogin.
     *
    **/
    
    session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");

    //$general = new general();
    //$language = $general->getLanguage();
    $post = new post();

    $command = $_POST['command'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else {
        switch ($command) {   //switch function for command//
            case 'adminLogin':

            // if($_SESSION['captcha'] == strtoupper($_POST['captcha'])) {
                $params = array("username" => $_POST['username'],
                    "password" => $_POST['password']
                );
                $result = $post->curl($command, $params);
                //        $status = $result['status'];
                //        $code = $result['code'];
                //        $statusMsg = $result['statusMsg'];
                $userData = $result['data']['userDetails'];
               // print_r($result);
                //
                //        $data = json_decode($data);
                //        
                $pages = $result['data']['pages'];
                $hiddens = $result['data']['hidden'];
                $permissions = $result['data']['permissions'];

                $userID = $userData['userID'];
                $username = $userData['username'];
                $userEmail = $userData['userEmail'];
                $userRoleID = $userData['userRoleID'];
                $sessionID = $userData['sessionID'];
                $sessionTimeOut = $userData['sessionTimeOut'];
                $pagingCount = $userData['pagingCount'];
                $timeOutFlag = $userData['timeOutFlag'];
                $decimalPlaces = $userData['decimalPlaces'];
                $unread = $result['data']['inboxUnreadMessage'];
                $withdrawalNotification = $result['data']['userDetails']['withdrawalRecordNotification'];
                $invEditable = $result['data']['invEditable'];
                $bankAry = $result['data']['paymentGatewayBankAry'];
                $statusAry = $result['data']['paymentGatewayStatusAry'];

                $_SESSION["permission"] = $permissions;
        //        $_SESSION["userData"] = $permissions;
                $_SESSION["userID"] = $userID;
                $_SESSION["username"] = $username;
                $_SESSION["userEmail"] = $userEmail;
                $_SESSION["userRoleID"] = $userRoleID;
                $_SESSION["sessionID"] = $sessionID;
                $_SESSION["pagingCount"] = $pagingCount;
                $_SESSION["sessionExpireTime"] = $timeOutFlag;
                $_SESSION["decimalPlaces"] = $decimalPlaces;
                $_SESSION["unreadMessage"] = $unread;
                $_SESSION["withdrawalNotification"] = $withdrawalNotification;
                $_SESSION["transactionTypeList"] = $result['data']['transactionTypeList'];
                $_SESSION["invEditable"] = $invEditable;
                $_SESSION["bankAry"] = $bankAry;
                $_SESSION["statusAry"] = $statusAry;

                $countryList = $result['data']['countryList'];
                $_SESSION["countryList"] = $countryList;
                $creditList = $result['data']['creditList'];
                $_SESSION["creditList"] = $creditList;
                $supplierIDArr = $result['data']['supplierIDArr'];
                $_SESSION["supplierIDArr"] = $supplierIDArr;
                $supplier = $result['data']['supplier'];
                $_SESSION["supplier"] = $supplier;
                $rankList = $result['data']['rankList']['Bonus Tier'];
                $_SESSION["rankList"] = $rankList;
                $activityLogDateArr = $result['data']['activityLogDateArr'];
                $_SESSION["activityLogDateArr"] = $activityLogDateArr;

                // Set session for menu and submenu
                foreach($permissions as $array) {
                    if($array['file_path'] != '')
                        $_SESSION["access"][$array['file_path']] = $array['name'];
                    $menuPath[$array['id']] = $array['file_path'];
                    $_SESSION["menuLanguage"][$array['file_path']] = $array["translation_code"];
                }

                // Set session for hidden page
                foreach($hiddens as $array) {
                    $menuPath[$array['id']] = $array['file_path'];
                    $_SESSION["access"][$array['file_path']] = $array['name'];
                    $_SESSION["menuLanguage"][$array['file_path']] = $array["translation_code"];
        //            $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
                }

                // Set session for hidden parent. To get to know which parent this hidden page belongs to
                foreach($pages as $array) {
                    $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
                    $_SESSION["menuLanguage"][$array['file_path']] = $array["translation_code"];
                }

                // Set session for page
                foreach($pages as $array) {
                    $menuPath[$array['id']] = $array['file_path'];
                    $_SESSION["access"][$array['file_path']] = $array['name'];
                    $_SESSION["menuLanguage"][$array['file_path']] = $array["translation_code"];
        //            $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
                }

                // Set session for page parent. To get to know which parent this page belongs to
                foreach($pages as $array) {
                    $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
                    $_SESSION["menuLanguage"][$array['file_path']] = $array["translation_code"];
                }

                $_SESSION['lastVisited'] = 'admin.php';
                $_SESSION['menuPath'] = $menuPath;
                $myJson = json_encode($result);
                echo $myJson;
            // }
            // else {
            //     $myJson = array('status' => 'error', 'code' => 1, 'statusMsg' => 'Incorrect security code.', 'data' => "");
            //     $myJson = json_encode($myJson);
            //     echo $myJson;
            // }

            break;

            case "setLanguage":

            $_SESSION['language'] = $_POST['language'];
            setcookie("language", $_POST['language'], time() + (86400 * 30), "/");

            if ($_SESSION['language']) {
                $results = array('status' => "ok", 'code' => 0, 'statusMsg' => '', 'data' => "");
                echo json_encode($results);
            }
            break;
            
        }
        

    }
    ?>
