<?php
/**
* @author ttwoweb.
* This file is contains the script to process memberLogin.
*
**/
include 'sessionStore.php';
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");

$post = new post();
$command = $_POST['command'];
if($_POST['type'] == 'logout')
{
  setcookie("sessionData", "", time() - 3600);
  session_destroy();
  setcookie("aaafag5bc2p7hslvh9qg7v4r", "", time() - 3600);
}
else
{
  switch($command)
  {
    case "memberLogin":
    // case "publicRegistrationConfirmation":
    // if($_SESSION['captcha'] == strtoupper($_POST['captcha']) || !empty($_POST['id']))
    // {
      $params = array(
        "id"       => $_POST['id'],
        "username" => $_POST['username'],
        "loginBy" => "phone",
        "password" => $_POST['password'],
        "adminID" => $_POST['adminID'],
        "adminSession" => $_POST['adminSession'],
      );

      if($_SESSION['bkend_token']) {
        $params['bkend_token'] = $_SESSION['bkend_token'];
      }

      $result              = $post->curl($command, $params);
      $bkend_token         = $result['data']['bkend_token'];
      $userData            = $result['data']['userDetails'];
      $userID              = $userData['userID'];
      $username            = $userData['username'];
      $userEmail           = $userData['userEmail'];
      $countryID           = $userData['countryID'];
      $userRoleID          = $userData['userRoleID'];
      $sessionID           = $userData['sessionID'];
      $pagingCount         = $userData['pagingCount'];
      $timeOutFlag         = $userData['timeOutFlag'];
      $decimalPlaces       = $userData['decimalPlaces'];
      $memo                = $userData['memo'];
      $blockedRights       = $userData['blockedRights'];
      $name                = $userData['name'];
      $dataweww                =$userData['sessionID '];

      if($result["status"] == "ok"){
        $_SESSION['bkend_token']                  = $bkend_token;
        $_SESSION["test1"]                        =$dataweww;
        $_SESSION["name"]                         = $name;
        $_SESSION["userEmail"]                    = $userEmail;
        $_SESSION["userID"]                       = $userID;
        $_SESSION["username"]                     = $username;
        $_SESSION["countryID"]                    = $countryID;
        $_SESSION["sessionID"]                    = $sessionID;
        $_SESSION["pagingCount"]                  = $pagingCount;
        $_SESSION["sessionExpireTime"]            = $timeOutFlag;
        $_SESSION["decimalPlaces"]                = $decimalPlaces;
        $_SESSION["memo"]                         = $memo;
        $_SESSION["blockedRights"]                = $blockedRights;
        $_SESSION["bonusReport"]                  = $result['data']['bonusReport'];
        $_SESSION["isTransactionPassword"]        = 0;
      }

      $marcaje      = $result['data']['marcaje'];
      $marcajeTK    = $result['data']['marcajeTK'];
      $expiredTS    = $result['data']['expiredTS'];

      $_SESSION["marcaje"] = $marcaje;
      $_SESSION["marcajeTK"] = $marcajeTK;
      $_SESSION["expiredTS"] = $expiredTS;

      if($result['data']['marcaje'] && $result['data']['marcajeTK']){
        $setlogincookie = array(
          'marcaje' => $marcaje,
          'marcajeTK' => $marcajeTK
        );

        setcookie("marcajeData", json_encode($setlogincookie), $expiredTS,"/",NULL,TRUE,TRUE);
      } else {
        setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
      }

      if ($result["code"] == 5 || $result["code"] == 3){
        setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
      }

      setcookie("sessionData", json_encode($_SESSION));

      $myJson = json_encode($result);
      echo $myJson;
    // }

    // else
    // {
    //   $myJson = array('status' => 'error', 'code' => 1, 'statusMsg' => 'Incorrect security code.', 'data' => array('field' => array(array('id'=>"captchaError",'msg'=>$translations['E00837'][$_SESSION['language']]))));
    //   $myJson = json_encode($myJson);
    //   echo $myJson;
    // }
    break;

    case "setLanguage":

      $_SESSION['language'] = $_POST['language'];
      setcookie("language", $_POST['language'], time() + (86400 * 30), "/");

      if ($_SESSION['language']) {
          $results = array('status' => "ok", 'code' => 0, 'statusMsg' => '', 'data' => "");
          echo json_encode($results);
      }

      $params = array(
        "clientID" => $_SESSION["userID"],
        "language" => $_POST["language"],
        "bkend_token" => $_SESSION['bkend_token'],
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

      break;
      // case "getNavBarDetails":
      case "accountSignUpVerification":

        $params = array(
              'phone' => $_POST['phone'],
              'type' => $_POST['type'],
              'dialCode' => $_POST['dialCode'],
              'number' => $_POST['number'],
            ); 
            
            $result = $post->curl($command, $params);
            $result = json_decode($result, true);
            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            } 
            $_SESSION["consolecode"] =$result["code"];
            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }
            if ($result["code"] == 0) {
                $_SESSION["username"] = $result["data"]["userDetails"]["username"];
                $_SESSION["userID"] = $result["data"]["userDetails"]["userID"];
                $_SESSION["sessionID"] = $result["data"]["userDetails"]["sessionID"];
                setcookie("sessionData", json_encode($_SESSION));
            }
            $result = json_encode($result);

            echo $result;

            break;
      case "memberGetMemberName":
      case "publicRegistration":
      // case "publicRegistrationConfirmation":
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
