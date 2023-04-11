<?php

    if($_SERVER['REQUEST_METHOD'] != 'POST') die("invalid action");
	include('include/config.php');
	include('language/lang_all.php');
	include('include/class.msgpack.php');
	include('include/class.cryptDes.php');
	$webServiceUrl = $config['webserviceURL'];

	$dataArray = json_decode(file_get_contents('php://input'), true);

    // Set any key values that is needed to be passed to backend
    $dataArray['site'] 		= "Member";
    $dataArray['ip']		= getRealUserIp();
    // $dataArray['ip'] 		= $_SERVER['REMOTE_ADDR'];
    $dataArray['source'] 	= "Apps";
    
    $name_arg = basename(__FILE__, '.php');
    $file = 'log/'.$name_arg.".log";
    
    $write = date("Y-m-d H:i:s")."\n".json_encode($dataArray)."\n";
    file_put_contents($file, $write, FILE_APPEND);

	$msgpack = new msgpack();
	$msg = $msgpack->msgpack_pack($dataArray);

	if($dataArray['command'] == 'getAllLanguage'){
		$msgReturn = array('status' => "ok", 'code' => 0, 'statusMsg' => "", 'data' => $translations);
		die(json_encode($msgReturn));
	}

	if($dataArray['command'] == 'getMaintenanceTime'){
		$data["startTs"] = $config['startTs'];
		$data["endTs"] = $config['endTs'];

		$msgReturn = array('status' => "ok", 'code' => 0, 'statusMsg' => "", 'data' => $data);
		die(json_encode($msgReturn));
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $webServiceUrl);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-msgpack'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
	$result = curl_exec($ch);
	curl_close($ch);
	$msgReturn = $msgpack->msgpack_unpack($result);

	if($dataArray['command'] == 'getDashboard' && $dataArray['username']){
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

		if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		    $protocol = 'https://';
		}
		else {
		    $protocol = 'http://';
		}

		$domainName = $_SERVER['HTTP_HOST']."";
		$crypt = new cryptDes();
	    $encrypt = $crypt->encrypt($dataArray['username']);
		$msgReturn['data']['url'] = urldecode($protocol.$domainName."/publicRegistration.php?qr=".$encrypt);
	}

	echo json_encode($msgReturn);

	function getRealUserIp(){
		switch(true){
			case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
			case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
			case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
			default : return $_SERVER['REMOTE_ADDR'];
		}
	}

?>
