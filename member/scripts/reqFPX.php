<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  19/05/2018.
    **/
    session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    
    $post       = new post();

    $command    = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];
    // $creditBalance = $_SESSION['creditBalance'];

    function validateCertificate($path,$sign, $toSign)
    {
        global  $ErrorCode;

        $d_ate=date("Y");
        //validating Last Three Certificates 
        $fpxcert=array($path."fpxprod_current.cer",$path."fpxprod.cer");
        $certs=checkCertExpiry($fpxcert);
        // echo count($certs) ;
                $signdata = hextobin($sign);
                
        
        if(count($certs)==1)
        {

        $pkeyid =openssl_pkey_get_public($certs[0]);
        $ret = openssl_verify($toSign, $signdata, $pkeyid);  
            if($ret!=1) 
            {
            $ErrorCode=" Your Data cannot be verified against the Signature. "." ErrorCode :[09]";
            return "09";   
            }
        }
        elseif(count($certs)==2)
        {
        
        $pkeyid =openssl_pkey_get_public($certs[0]);
        $ret = openssl_verify($toSign, $signdata, $pkeyid);    
        if($ret!=1)
        {
        
            $pkeyid =openssl_pkey_get_public($certs[1]);
            $ret = openssl_verify($toSign, $signdata, $pkeyid); 
            if($ret!=1) 
            {
            $ErrorCode=" Your Data cannot be verified against the Signature. "." ErrorCode :[09]";
            return "09";    
            }
            }
            
        }
        if($ret==1)
        {

            $ErrorCode=" Your signature has been verified successfully. "." ErrorCode :[00]";
            return "00";      
        }
            
            
        return $ErrorCode;

    }

    function verifySign_fpx($sign,$toSign) 
    {
        error_reporting(0);

        return validateCertificate(__DIR__.'/../MbbFpxKey',$sign, $toSign);
         // return validateCertificate('/Users/zl96/Sites/',$sign, $toSign);
    }

    function checkCertExpiry($path)
    {
        global  $ErrorCode;

        $stack = array();
        $t_ime= time();
        $curr_date=date("Ymd",$t_ime);
        for($x=0;$x<2;$x++)
        {
           error_reporting(0);
           $key_id = file_get_contents($path[$x]);
           if($key_id==null)
           {
               $cert_exists++;
             continue;
           }     
           $certinfo = openssl_x509_parse($key_id);
           $s= $certinfo['validTo_time_t']; 
           $crtexpirydate=date("Ymd",$s-86400);
          if($crtexpirydate > $curr_date)
           {
                if ($x > 0)
                {
                 if(certRollOver($path[$x], $path[$x-1])=="true")
                     {  array_push($stack,$key_id);
                        return $stack;
                      }
                }   
                array_push($stack,$key_id);
              return $stack;
           }
           elseif($crtexpirydate == $curr_date)
           {
                 if ($x > 0 && (file_exists($path[$x-1])!=1))  
                 {     
                       if(certRollOver($path[$x], $path[$x-1])=="true")
                       {  array_push($stack,$key_id);
                          return $stack;
                     }
                 }
                 else if(file_exists($path[$x+1])!=1)
                 {
                         array_push($stack,file_get_contents($path[$x]),$key_id);
                         return $stack;
                 }
            
               
                array_push($stack,file_get_contents($path[$x+1]),$key_id);
          
                return $stack;
            }
                
        }
            if ($cert_exists == 2)
                $ErrorCode="Invalid Certificates.  " . " ErrorCode : [06]";  //No Certificate (or) All Certificate are Expired 
            else if ($stack.Count == 0 && $cert_exists == 1)
                $ErrorCode="One Certificate Found and Expired " . "ErrorCode : [07]";  
            else if ($stack.Count == 0 && $cert_exists == 0)
               $ErrorCode="Both Certificates Expired " . "ErrorCode : [08]";  
            return $stack;
    }

    function hextobin($hexstr) 
    { 
        $n = strlen($hexstr); 
        $sbin="";   
        $i=0; 
        while($i<$n) 
        {       
            $a =substr($hexstr,$i,2);           
            $c = pack("H*",$a); 
            if ($i==0){$sbin=$c;} 
            else {$sbin.=$c;} 
            $i+=2; 
        } 
        return $sbin; 
    }

    function certRollOver($old_crt,$new_crt)
    {  

        if (file_exists($new_crt)==1)
        {
            
                rename($new_crt,$new_crt."_".date("YmdHis", time()));//FPXOLD.cer to FPX_CURRENT.cer_<CURRENT TIMESTAMP>

        }
        if ((file_exists($new_crt)!=1) && (file_exists($old_crt)==1))
        {
            rename($old_crt,$new_crt);                                 //FPX.cer to FPX_CURRENT.cer
        }

        
        return "true";
    }

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            case "getBankLists":
                $fpxBankInfo          = $_POST['fpxBankInfo'];
               
                //Merchant will need to edit the below parameter to match their environment.
                error_reporting(E_ALL);

                /* Generating String to send to fpx */
                /*For B2C, message.token = 01
                For B2B1, message.token = 02 */

                $fpx_msgToken="01";
                $fpx_msgType="BE";
                $fpx_sellerExId="EX00016560";
                $fpx_version="7.0";
                /* Generating signing String */
                $data=$fpx_msgToken."|".$fpx_msgType."|".$fpx_sellerExId."|".$fpx_version;
                /* Reading key */
                // $priv_key = file_get_contents('/Users/zl96/Sites/EX00010815.key');
                // $priv_key = file_get_contents('/opt/odoo/odoo15/addons/maybank_fpx/controllers/EX00016560.key');
                $priv_key = file_get_contents('mbb_key.key');

                $pkeyid = openssl_get_privatekey($priv_key);

                openssl_sign($data, $binary_signature, $pkeyid, OPENSSL_ALGO_SHA1);
                $fpx_checkSum = strtoupper(bin2hex( $binary_signature ) );
                
                // echo json_encode(array ('status' => 'ok' ,'code' => 0, 'statusMsg' => "SDASDADA", 'data' => $priv_key)); // Please enter top up amount.
                // break;

                //extract data from the post
                extract($_POST);
                $fields_string="";

                //set POST variables
                // $url ='https://www.mepsfpx.com.my/FPXMain/RetrieveBankList';
                $url ='https://uat.mepsfpx.com.my/FPXMain/RetrieveBankList';

                $fields = array(
                    'fpx_msgToken' => urlencode($fpx_msgToken),
                    'fpx_msgType' => urlencode($fpx_msgType),
                    'fpx_sellerExId' => urlencode($fpx_sellerExId),
                    'fpx_checkSum' => urlencode($fpx_checkSum),
                    'fpx_version' => urlencode($fpx_version)
                    
                );
                $response_value=array();
                $bank_list=array();

                try{
                //url-ify the data for the POST
                foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
                rtrim($fields_string, '&');

                //open connection
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

                //set the url, number of POST vars, POST data
                curl_setopt($ch,CURLOPT_URL, $url);

                curl_setopt($ch,CURLOPT_POST, count($fields));
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

                // receive server response ...
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //execute post
                $result = curl_exec($ch);

                
                echo "\n";
                echo curl_error($ch);
                //close connection
                curl_close($ch);

                $token = strtok($result, "&");

                while ($token !== false)
                {
                list($key1,$value1)=explode("=", $token);
                $value1=urldecode($value1);
                $response_value[$key1]=$value1;
                $token = strtok("&");
                }

                $fpx_msgToken=reset($response_value);

                //Response Checksum Calculation String
                $data=$response_value['fpx_bankList']."|".$response_value['fpx_msgToken']."|".$response_value['fpx_msgType']."|".$response_value['fpx_sellerExId'];
                $val=verifySign_fpx($response_value['fpx_checkSum'], $data);

                // val == 00 verification success

                $token = strtok($response_value['fpx_bankList'], ",");
                // list($key1,$value1)=explode("~", $token);
                // $value1=urldecode($value1);

                while ($token !== false)
                {
                    list($key1,$value1)=explode("~", $token);
                    $value1=urldecode($value1);

                    foreach ($fpxBankInfo as $key => $value) {
                        if($key == $key1){

                            if($value1 == "B"){
                                $displayName = $fpxBankInfo[$key1]['display_name']." (Offline)";
                            }else{
                                $displayName = $fpxBankInfo[$key1]['display_name'];
                            }

                            $bank_list[]= array(
                                                "displayName" => $displayName,
                                                "name" => $key1, 
                                                "value" => $value1,
                                                
                                                );

                            /// Convert to lower case for compare
                            $displayNameArray[] = strtolower($displayName);
                        }
                    }

                    array_unique($displayNameArray);
                    array_multisort($displayNameArray, SORT_ASC, SORT_STRING, $bank_list);

                    $token = strtok(",");
                }
                }
                catch(Exception $e){
                    echo 'Error :', ($e->getMessage());
                }

                if ($bank_list){
                    $dataReturn['status'] = 'ok';
                    $dataReturn['code'] = 0;
                    $dataReturn['msgCode'] = '';
                    $dataReturn['statusMsg'] = '';
                    $dataReturn['data'] = $bank_list;
                }else{
                    $dataReturn['status'] = 'error';
                    $dataReturn['code'] = 1;
                    $dataReturn['msgCode'] = 'E00093';
                    $dataReturn['statusMsg'] = 'The security code is incorrect 2 .';
                    $dataReturn['data'] = $bank_list;
                }

                echo json_encode($dataReturn);
                break;
                
            case "buildCheckSum":
                $buyAccNo = '';
                $buyerBankBranch = '';
                $buyerIban = '';
                $buyerId = '';
                $buyerName = '';
                $makerName = '';

                $bankId = $_POST['bankId'];
                $buyerEmail = $_POST['buyerEmail'];
                $msgToken = $_POST['msgToken'];
                $msgType = $_POST['msgType'];
                $prodDesc = $_POST['prodDesc'];
                $sellerBankCode = $_POST['sellerBankCode'];
                $sellerExId = $_POST['sellerExId'];
                $sellerExOrderNo = $_POST['sellerExOrderNo'];
                $sellerId = $_POST['sellerId'];
                $sellerOrderNo = $_POST['sellerOrderNo'];
                $txnTime = date('YmdHis', strtotime($_POST['txnTime']));
                $txnAmount = $_POST['txnAmount'];
                $txnCurrency = $_POST['txnCurrency'];
                $version = $_POST['version'];

                $params = array( 
                    "buyAccNo"          => $buyAccNo,
                    "buyerBankBranch"   => $buyerBankBranch,
                    "buyerIban"         => $buyerIban,
                    "buyerId"           => $buyerId,
                    "buyerName"         => $buyerName,
                    "makerName"         => $makerName,

                    "bankId"            => $bankId,
                    "buyerEmail"        => $buyerEmail,
                    "msgToken"          => $msgToken,
                    "msgType"           => $msgType,
                    "prodDesc"          => $prodDesc,
                    "sellerBankCode"    => $sellerBankCode,
                    "sellerExId"        => $sellerExId,
                    "sellerExOrderNo"   => $sellerExOrderNo,
                    "sellerId"          => $sellerId,
                    "sellerOrderNo"     => $sellerOrderNo,
                    "txnTime"           => $txnTime,
                    "txnAmount"         => $txnAmount,
                    "txnCurrency"       => $txnCurrency,
                    "version"           => $version,

                    "checkSum"  => $buyAccNo."|".$buyerBankBranch."|".$bankId."|".$buyerEmail."|".$buyerIban."|".$buyerId."|".$buyerName."|".$makerName."|".$msgToken."|".$msgType."|".$prodDesc."|".$sellerBankCode."|".$sellerExId."|".$sellerExOrderNo."|".$sellerId."|".$sellerOrderNo."|".date('YmdHis', strtotime($txnTime))."|".$txnAmount."|".$txnCurrency."|".$version,
                );

                $priv_key = file_get_contents('mbb_key.key');
                // $priv_key = file_get_contents('/Users/zl96/Sites/EX00010815.key');
                $pkeyid = openssl_get_privatekey($priv_key);
                openssl_sign($params['checkSum'], $binary_signature, $pkeyid, OPENSSL_ALGO_SHA1);
                $params['fpx_checkSum'] = strtoupper(bin2hex( $binary_signature ) );

                $dataReturn['status'] = 'ok';
                $dataReturn['code'] = 0;
                $dataReturn['msgCode'] = '';
                $dataReturn['statusMsg'] = '';
                $dataReturn['data'] = $params;

                // $dataReturn['status'] = 'error';
                // $dataReturn['code'] = 1;
                // $dataReturn['msgCode'] = E00093;
                // $dataReturn['statusMsg'] = 'The security code is incorrect.';
                // $dataReturn['data'] = $params;

                echo json_encode($dataReturn);

                break;

            case "getBankDetails":
                $params = array (
                    'paymentMethod' => $_POST['paymentMethod'],
                    'clientPromotionUrl' => $_POST['clientPromotionUrl'],
                );
                $result = $post->curl($command, $params);


                echo $result;
                break;

            case "addNewPayment":
                $params = array (
                    'userID' => $userId,
                    'purchase_amount' => $_POST['purchase_amount'],
                    'package_id' => $_POST['package_id'],
                    // 'payment_method' => $_POST['payment_method'],
                    'quantityOfReward' => $_POST['quantityOfReward'],
                    'isRedeemReward' => $_POST['isRedeemReward'],
                    'redeemAmount' => $_POST['redeemAmount'],
                    'memberPointDeduct' => $_POST['memberPointDeduct'],
                    'shipping_fee' => $_POST['shipping_fee'],
                    'billing_address' => $_POST['billing_address'],
                    'shipping_address' => $_POST['shipping_address'],
                    'bkend_token' => $_POST['bkend_token']

                    // 'hashData' => $_POST['hashData'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case 'getProviderSettingFPX':
                $params = array ();

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;

                break;
        }

        // update session balance
        $temp = json_decode($result, true);
        if(isset($temp["balance"]) && $temp["balance"] != "") $_SESSION["balance"] = $temp["balance"];

        if(isset($temp["theNuxUser"]) && $temp["theNuxUser"] != "") $_SESSION["theNuxUser"] = $temp["theNuxUser"];

        if(isset($temp["theNuxRewardBalance"]) && $temp["theNuxRewardBalance"] != "") $_SESSION["theNuxRewardBalance"] = $temp["theNuxRewardBalance"];
    }
?>
