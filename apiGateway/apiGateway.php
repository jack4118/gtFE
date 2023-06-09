<?php

    // Temporary solution for frontend development, please add a config flag for frontend to use
    header("Access-Control-Allow-Origin: *");

    session_start();

    include("include/config.php");
    include("include/class.post.php");
    $post = new post();

    // Build your command

    $dataArray = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true); //can also use file_get_contents('php://input')

    if(count($dataArray)<=0){
        $dataArray = json_decode(file_get_contents('php://input'),true);
    }

    $command = $dataArray['command'];
    $site = $dataArray['site'];
    $userID = $dataArray['userID'];
    $sessionID = $dataArray['sessionID'];
    $username = $dataArray['username'];
    $language = $dataArray['language'];

    // Build your params
    foreach ($dataArray['params'] as $key => $value) {

        // Filter certain keys
        if ($key == "command") continue;

        $params[$key] = $value;
    }

    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $userID;
    $_SESSION['sessionTimeOut'] = time();
    $_SESSION['language'] = $language;

    // Post to backend  
    $result = $post->curl($command, $params, $site);
    //$_SESSION['sessionTimeOut'] = time();

    /*
    if($command == "memberLogin") {


        $userData            = $result['data']['userDetails'];
        $userID              = $userData['userID'];
        $username            = $userData['username'];
        $userEmail           = $userData['userEmail'];
        $userRoleID          = $userData['userRoleID'];
        $sessionID           = $userData['sessionID'];
        $pagingCount         = $userData['pagingCount'];
        $timeOutFlag         = $userData['timeOutFlag'];
        $decimalPlaces       = $userData['decimalPlaces'];
        $memo                = $userData['memo'];
        $blockedRights       = $userData['blockedRights'];


        $_SESSION["userID"]              = $userID;
        $_SESSION["username"]            = $username;
        $_SESSION["sessionID"]           = $sessionID;
        $_SESSION["pagingCount"]         = $pagingCount;
        $_SESSION["sessionExpireTime"]   = $timeOutFlag;
        $_SESSION["decimalPlaces"]       = $decimalPlaces;
        $_SESSION["memo"]                = $memo;
        $_SESSION["blockedRights"]       = $blockedRights;
        $_SESSION["bonusReport"]         = $result['data']['bonusReport'];
        $_SESSION["displaySharePortfolio"] = $result['data']['displaySharePortfolio'];
        $_SESSION["displayPortfolio"] = $result['data']['displayPortfolio'];
        $_SESSION["displayMarchPromo"]     = $result['data']['displayMarchPromo'];
        $_SESSION["displaySharePlusPortfolio"] = $result['data']['displaySharePlusPortfolio'];
        $_SESSION["isTransactionPassword"]       = 0;

        $result = json_encode($result);

    }
    */

    // Return json_encoded result to frontend
    echo $result;
    // echo $_SESSION;

?>
