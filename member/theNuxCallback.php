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

    /*Received Call Back*/

    //{"command":"paymentGatewayCallback","params":{"receivedTxID":"0x98f7a53346921f92c5cb58babfa27cfb5edc1b5c0173b8d10bf35d8c3ecd33f8","referenceID":"1003073","txID":"","amount":"1015 USDT","amountReceive":"1015 USDT","serviceCharge":"0 USDT","minerAmount":"0 USDT","address":"0x1a6bc554065c322ae7d554422bb8bd5712d5a41e","status":"received","transactionDate":"0","transactionUrl":"","type":"tetherUSD","sender":{"internal":"","external":"0x976002098b697d0bea48c9900403969c570bea21"},"recipient":{"internal":"","external":""},"creditDetails":{"amountDetails":{"amount":"1015000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"amountReceiveDetails":{"amount":"1015000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"serviceChargeDetails":{"amount":0,"unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"minerAmountDetails":{"amount":0,"unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"ethMinerAmountDetails":{"amount":0,"unit":"ETH","rate":"1000000000000000000","type":"ethereum"},"exchangeRate":{"USD":"0.99972120"},"ethExchangeRate":{"USD":"223.98504005"}}}}


    /*Pending Call Back*/
    // {"command":"paymentGatewayCallback","params":{"receivedTxID":"0x98f7a53346921f92c5cb58babfa27cfb5edc1b5c0173b8d10bf35d8c3ecd33f8","referenceID":"1003073","txID":"0xd1db6a3c487b94b159e0c4d9b0512b9644617197ae95a16b669a0762870345a8","amount":"1008.312551 USDT","amountReceive":"1015 USDT","serviceCharge":"5075000 USDT","minerAmount":"1612449 USDT","address":"0x1a6bc554065c322ae7d554422bb8bd5712d5a41e","status":"pending","transactionDate":"0","transactionUrl":"https:\/\/etherscan.io\/tx\/0xd1db6a3c487b94b159e0c4d9b0512b9644617197ae95a16b669a0762870345a8","type":"tetherUSD","sender":{"internal":"","external":"0x976002098b697d0bea48c9900403969c570bea21"},"recipient":{"internal":"","external":"0xd269d7F7Db93B030e750b6c9e26118ab0f732794"},"creditDetails":{"amountDetails":{"amount":1008312551,"unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99935842"}},"amountReceiveDetails":{"amount":"1015000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99935842"}},"serviceChargeDetails":{"amount":"5075000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99935842"}},"minerAmountDetails":{"amount":"1612449000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99935842"}},"ethMinerAmountDetails":{"amount":"8640000000000000000000000000000000","unit":"ETH","rate":"1000000000000000000","type":"ethereum"},"exchangeRate":{"USD":"0.99935842"},"ethExchangeRate":{"USD":"224.06002763"}}}}


    /*Success Call Back*/

    //{"command":"paymentGatewayCallback","params":{"receivedTxID":"0x98f7a53346921f92c5cb58babfa27cfb5edc1b5c0173b8d10bf35d8c3ecd33f8","referenceID":"1003073","txID":"0xd1db6a3c487b94b159e0c4d9b0512b9644617197ae95a16b669a0762870345a8","amount":"1008.312551 USDT","amountReceive":"1015 USDT","serviceCharge":"5.075 USDT","minerAmount":"USDT","address":"0x1a6bc554065c322ae7d554422bb8bd5712d5a41e","status":"success","transactionDate":"1592209082","transactionUrl":"0xd1db6a3c487b94b159e0c4d9b0512b9644617197ae95a16b669a0762870345a8","type":"tetherUSD","sender":{"internal":"","external":"0x976002098b697d0bea48c9900403969c570bea21"},"recipient":{"internal":"","external":"0xd269d7F7Db93B030e750b6c9e26118ab0f732794"},"creditDetails":{"amountDetails":{"amount":"1008312551","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"amountReceiveDetails":{"amount":"1015000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"serviceChargeDetails":{"amount":"5075000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"minerAmountDetails":{"amount":"1612449","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"0.99972120"}},"ethMinerAmountDetails":{"amount":"7200000000000000","unit":"ETH","rate":"1000000000000000000","type":"ethereum","exchangeRate":{"USD":"224.06002763"}},"exchangeRate":{"USD":"0.99972120"},"ethExchangeRate":{"USD":"224.06002763"}}}}

    $raw_body = "\n".date("Y-m-d H:i:s")."\t";
    $raw_body .= file_get_contents('php://input');

    $file = 'log/theNuxCallBack.log';
    file_put_contents($file, $raw_body, FILE_APPEND);

    // $dataArray1 = $dataArray->params;
    $dataArray1 = $dataArray['params'];


    // $returnType = (string)$dataArray->type;
    // $returnAddress = (string)$dataArray->data->address;
    // $returnCurrency = (string)$dataArray->additional_data->amount->currency;
    // $returnHash = (string)$dataArray->additional_data->hash;
    // $returnAmount = (string)$dataArray->additional_data->amount->amount;
    // $referenceID = (string)$dataArray1->referenceID;
    // $returnAddress = (string)$dataArray1->address;
    // $returnCurrency = (string)$dataArray1->type;
    // $returnHash = (string)$dataArray1->txID;
    // $returnAmount = (string)$dataArray1->amountReceive;
    // $returnStatus = (string)$dataArray1->status;

    $referenceID = (string)$dataArray1['referenceID'];
    $returnAddress = (string)$dataArray1['address'];
    $returnCurrency = (string)$dataArray1['type'];
    $returnHash = (string)$dataArray1['txID'];
    $receivedTxID = (string)$dataArray1['receivedTxID'];
    $returnAmount = (string)$dataArray1['amountReceive'];
    $returnStatus = (string)$dataArray1['status'];

    $returnAmount = trim(str_replace(" USD2", "", $returnAmount));
    $returnAmount = trim(str_replace(" USDT", "", $returnAmount));
    $returnAmount = trim(str_replace(" BTC", "", $returnAmount));
    $returnAmount = trim(str_replace(" ETH", "", $returnAmount));
    /*$referenceID = "123";
    $returnAddress = "2N85hoHBU81xS7wC2vpU3P8q7jDsoiBw9e3";
    $returnCurrency = "bitcoin";
    $returnHash = "12312312312312345";
    $returnAmount = "0.00032510";
    $returnStatus = "success";*/  

    $params = array(
                        "receivedTxID" => $receivedTxID,
                        "referenceID" => $referenceID,
                        "walletAddress" => $returnAddress,
                        "transactionHash" => $returnHash,
                        "receivedAmount" => $returnAmount,
                        "returnCurrency" => $returnCurrency,
                        "originalData" => json_encode($dataArray),
                        "status" => $returnStatus,
                    );

    if($returnStatus == 'success' || $returnStatus == 'received'){
        $result = $post->curl("coinBaseCallBack", $params);
    }
    

    echo json_encode($result);
    
?>