<?php

    ##### Added by Gi Wai 14-05-2019 ####
    ##### Ready for FPX transaction call back #####

    // $currentPath = __DIR__;
    // $logPath = $currentPath.'/../log/';
    // $logBaseName = basename(__FILE__, '.php');

    // include($currentPath."/../include/class.post.php");
    // include($currentPath.'/../include/class.log.php');
    
    // $log = new log($logPath, $logBaseName);
    // $post = new post();
    
    // $log->write(date("Y-m-d H:i:s")." "."FILE_GET_CONTENTS : ".file_get_contents('php://input')." ## HTTP_RAW_POST_DATA : ".$GLOBALS['HTTP_RAW_POST_DATA']." ## QUERY_STRING : ".$_SERVER['QUERY_STRING']."\n");

    // $orgCallback = file_get_contents('php://input');
    
    // $params["orgCallback"] = $orgCallback;

    // // $result = $post->curl("paypalCallback", $params);    
    
    // $log->write(date("Y-m-d H:i:s")." ".$result."\n\n");

    // echo "OK";


    $currentPath = __DIR__;



    $logPath = $currentPath.'/log/';
    $logBaseName = basename(__FILE__, '.php');

    include($currentPath."/include/class.post.php");
    include($currentPath.'/include/class.log.php');
    
    $log = new log($logPath, $logBaseName);
    $post = new post();
    
    
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
    
    $fpx_buyerBankBranch=$_POST['fpx_buyerBankBranch'];
    $fpx_buyerBankId=$_POST['fpx_buyerBankId'];
    $fpx_buyerIban=$_POST['fpx_buyerIban'];
    $fpx_buyerId=$_POST['fpx_buyerId'];
    $fpx_buyerName=$_POST['fpx_buyerName'];
    $fpx_creditAuthCode=$_POST['fpx_creditAuthCode'];
    $fpx_creditAuthNo=$_POST['fpx_creditAuthNo'];
    $fpx_debitAuthCode=$_POST['fpx_debitAuthCode'];
    $fpx_debitAuthNo=$_POST['fpx_debitAuthNo'];
    $fpx_fpxTxnId=$_POST['fpx_fpxTxnId'];
    $fpx_fpxTxnTime=$_POST['fpx_fpxTxnTime'];
    $fpx_makerName=$_POST['fpx_makerName'];
    $fpx_msgToken=$_POST['fpx_msgToken'];
    $fpx_msgType=$_POST['fpx_msgType'];
    $fpx_sellerExId=$_POST['fpx_sellerExId'];
    $fpx_sellerExOrderNo=$_POST['fpx_sellerExOrderNo'];
    $fpx_sellerId=$_POST['fpx_sellerId'];
    $fpx_sellerOrderNo=$_POST['fpx_sellerOrderNo'];
    $fpx_sellerTxnTime=$_POST['fpx_sellerTxnTime'];
    $fpx_txnAmount=$_POST['fpx_txnAmount'];
    $fpx_txnCurrency=$_POST['fpx_txnCurrency'];
    $fpx_checkSum=$_POST['fpx_checkSum'];

    // $fpx_buyerBankBranch='';
    // $fpx_buyerBankId='';
    // $fpx_buyerIban='';
    // $fpx_buyerId='';
    // $fpx_buyerName='';
    // $fpx_creditAuthCode='';
    // $fpx_creditAuthNo='';
    // $fpx_debitAuthCode='';
    // $fpx_debitAuthNo='';
    // $fpx_fpxTxnId='';
    // $fpx_fpxTxnTime='';
    // $fpx_makerName='';
    // $fpx_msgToken='AR';
    // $fpx_msgType='01';
    // $fpx_sellerExId='EX00016560';
    // $fpx_sellerExOrderNo='2183016012';
    // $fpx_sellerId='SE00023569';
    // $fpx_sellerOrderNo='2183016012';
    // $fpx_sellerTxnTime='20230322161241';
    // $fpx_txnAmount='1000.00';
    // $fpx_txnCurrency='MYR';
    // $fpx_checkSum='63593C419C61EFC7257FBE8332B80F9ECF2D109112ACF92C3E00E1A81B44FEA03A0A0E077C1BC752C72CF1379B25D82EAEC8E7C9F1CB750784CBDBD6C605152F2C5785F448C7D5394D12DB3FD3B751752FAA2F5F7CD13FE2BDAF8FDA3268B5D29D7824159C1EA932311B27FAB78E22954A4CC54D84E1B5534FD085E5EDE05B29BBFF7D34DB2E951AFD4F333A4DC3A92F971118E9F9705D2BE3491BF425EDDE02E10B8B2B6CC6CB504D75710C39EA6995F45058F864EB49841FC1BEA0F9D6C149F74D735F3A2FF0657B0FDD17F35DBBB34DF53A4281D4BC4E25904CC1D5BA8695D2FFFA24778991116E4E5A7CCD7F06594A4977B9845550828F4FDEE8C21BFC0E';

    $data=$fpx_buyerBankBranch."|".$fpx_buyerBankId."|".$fpx_buyerIban."|".$fpx_buyerId."|".$fpx_buyerName."|".$fpx_creditAuthCode."|".$fpx_creditAuthNo."|".$fpx_debitAuthCode."|".$fpx_debitAuthNo."|".$fpx_fpxTxnId."|".$fpx_fpxTxnTime."|".$fpx_makerName."|".$fpx_msgToken."|".$fpx_msgType."|".$fpx_sellerExId."|".$fpx_sellerExOrderNo."|".$fpx_sellerId."|".$fpx_sellerOrderNo."|".$fpx_sellerTxnTime."|".$fpx_txnAmount."|".$fpx_txnCurrency;

    $val=verifySign_fpx($fpx_checkSum, $data);


    // $params['fpx_buyerBankBranch'] = $_POST['fpx_buyerBankBranch'];
    // $params['fpx_buyerBankId'] = $_POST['fpx_buyerBankId'];
    // $params['fpx_buyerIban'] = $_POST['fpx_buyerIban'];
    // $params['fpx_buyerId'] = $_POST['fpx_buyerId'];
    // $params['fpx_buyerName'] = $_POST['fpx_buyerName'];
    // $params['fpx_creditAuthCode'] = $_POST['fpx_creditAuthCode'];
    // $params['fpx_creditAuthNo'] = $_POST['fpx_creditAuthNo'];
    // $params['fpx_debitAuthCode'] = $_POST['fpx_debitAuthCode'];
    // $params['fpx_debitAuthNo'] = $_POST['fpx_debitAuthNo'];
    // $params['fpx_fpxTxnId'] = $_POST['fpx_fpxTxnId'];
    // $params['fpx_fpxTxnTime'] = $_POST['fpx_fpxTxnTime'];
    // $params['fpx_makerName'] = $_POST['fpx_makerName'];
    // $params['fpx_msgToken'] = $_POST['fpx_msgToken'];
    // $params['fpx_msgType'] = $_POST['fpx_msgType'];
    // $params['fpx_sellerExId'] = $_POST['fpx_sellerExId'];
    // $params['fpx_sellerExOrderNo'] = $_POST['fpx_sellerExOrderNo'];
    // $params['fpx_sellerId'] = $_POST['fpx_sellerId'];
    // $params['fpx_sellerOrderNo'] = $_POST['fpx_sellerOrderNo'];
    // $params['fpx_sellerTxnTime'] = $_POST['fpx_sellerTxnTime'];
    // $params['fpx_txnAmount'] = $_POST['fpx_txnAmount'];
    // $params['fpx_txnCurrency'] = $_POST['fpx_txnCurrency'];
    // $params['fpx_checkSum'] = $_POST['fpx_checkSum'];
    // $params['callBack'] = $data;
    // $params['ErrorCode'] = $ErrorCode;

    // $test = http_get_request_body();

    // echo $test . "\n";
    
    $log->write(date("Y-m-d H:i:s")." "."FILE_GET_CONTENTS : ".file_get_contents('php://input')." ## HTTP_RAW_POST_DATA : ".$GLOBALS['HTTP_RAW_POST_DATA']." ## QUERY_STRING : ".$_SERVER['QUERY_STRING']."\n");

    // $log->write(date("Y-m-d H:i:s") . " Test: " . json_encode(http_get_request_body()) . "\n");
    
    $log->write(date("Y-m-d H:i:s")." ".print_r($_REQUEST,1)."\n\n");

    $TransId = $_REQUEST['fpx_fpxTxnId'];

    $params = $_REQUEST;
    $params['isBackendChecking'] = "1";
    $params["isTranslationID"] = $TransId;
    $params["orgCallback"] = $_REQUEST;



    $log->write(date("Y-m-d H:i:s")."first ".print_r($params,1)."\n\n");
    

    $result = $post->curl("FPXBackendVerify", $params, "Member", "english", "API", "", "", "", "", $TransId);
    $result = json_decode($result,'1');    
    

    
    echo "OK";
    
    
?>