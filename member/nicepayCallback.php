<?php
    
    header('P3P: CP="CAO PSA OUR"');
    header('Content-Type: text/html; charset=utf-8');

    // include($_SERVER["DOCUMENT_ROOT"].'/include/class.post.php');
    include_once('include/class.post.php');
    $post = new post();

    unset($dataArray);
    $dataArray = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true); //can also use file_get_contents('php://input')

    if(count($dataArray)<=0){
        $dataArray = json_decode(file_get_contents('php://input'),true);
    }

    $raw_body = "\n".date("Y-m-d H:i:s")."\t";
    $raw_body .= file_get_contents('php://input');
    $raw_body .= "\n".json_encode($_POST);

    $file = 'log/nicepayCallBack.log';
    file_put_contents($file, $raw_body, FILE_APPEND);

    // $dataArray['tXid'] = 'FIXTEST00102202203041559313292';
    // $dataArray['referenceNo'] = 'ORD20220304165444';
    // $dataArray['amt'] = 190000;
    // $dataArray['merchantToken'] = '9cc4d2f5bd0998d2eba2ee964934c724b19457e82596d2e72c96b100b45d99e6';
    // $dataArray['status'] = '0';
    // $dataArray['bankCd'] = 'CENA';
    // $dataArray['vacctNo'] = '70014000091955267274';
    // $dataArray['depositDt'] = date('Ymd');
    // $dataArray['depositTm'] = date('His');
    // $dataArray['mitraCd'] = '';
    // $dataArray['matchCl'] = '1';

    // $command = $dataArray['command'];
    // $dataArray1 = $dataArray['params'];
    $return = $_POST;

    $txID           = $return['tXid'];
    $referenceNo    = $return['referenceNo'];
    $amount         = $return['amt'];
    $token          = $return['merchantToken'];
    $returnStatus   = $return['status']; // 0 = Deposit, 1 = Reversal
    $bankCode       = $return['bankCd'];
    $bankValidNo    = $return['vacctNo']; 
    $depositDate    = $return['depositDt']; 
    $depositTime    = $return['depositTm']; 
    $mitraCd        = $return['mitraCd'];

    switch ($return['matchCl']) { // 1 = Match, 2 = Over, 3 = Under
        case '1':
            $paymentResult = 'Match';
            break;

        case '2':
            $paymentResult = 'Over';
            break;

        case '3':
            $paymentResult = 'Under';
            break;
        
        default:
            $paymentResult = 'undefined';
            break;
    }


    $result =  array('status' => "ok", 'code' => 0, 'statusMsg' => 'Received "'.$returnStatus.'" Status Call Back"', 'data' => "");
    if($returnStatus == "0"){
        $params = array(
            "txID"           => $txID,
            "referenceNo"    => $referenceNo,
            "amount"         => $amount,
            "token"          => $token,
            "returnStatus"   => $returnStatus,
            "bankCode"       => $bankCode,
            "bankValidNo"    => $bankValidNo,
            "depositDate"    => $depositDate,
            "depositTime"    => $depositTime,
            "mitraCd"        => $mitraCd,
            "paymentResult"  => $paymentResult,
            "callbackData"   => json_encode($return),
        );

        $apiResult = $post->curl("nicepayCallback", $params);
    }

    echo json_encode($result);
    
?>