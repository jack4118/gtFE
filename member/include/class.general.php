<?php
    
	class General
    {

		function getLanguage()
        {
            global  $config;
			if(isset($_SESSION['language'])) {
		        $language = $_SESSION['language'];
				// echo "<script>console.log('language: " . isset($_SESSION['language']) . "' );</script>";

		    }
		    else {
		    	if(isset($_COOKIE["language"])) {
		    		$_SESSION['language'] = $_COOKIE['language'];
			        $language = $_COOKIE['language'];
		    	}
		    	else {
		    		$_SESSION['language'] = $config['defaultLanguage'];
			        $language = $config['defaultLanguage'];
			        setcookie("language", $config['defaultLanguage']);
					
			
		    	}
		    }

		    return $language;
		}
        
        // This function is using server to send mail, might go into Junk
        function sendEmailsUsingSendmail($to, $subject, $content, $replyArray, $fileAry)
        {
            global $mail, $config;

            $mail->isSMTP();
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->Subject = $subject;
            $mail->addAddress($to);
            $mail->msgHTML($content);

            // Authentication section
            $mail->Username = $config['smtpUsername'];
            $mail->Password = $config['smtpPassword'];

            // global $mail, $config;

            // $mail->isMail();
            // $mail->Subject = $subject;
            // $mail->addAddress($to);
            // $mail->msgHTML($content);

            // Set sender information
            $mail->From = $config['senderUsername'];
            $mail->FromName = $config['senderName'];

            if ($replyArray) $mail->addReplyTo($replyArray['address'], $replyArray['name']);

            foreach($fileAry as $row){
                $mail->AddStringAttachment($row['bin'], $row['file']);
            }

            $mailsender = $mail->send();
            $mail->clearAllRecipients();
            $mail->clearReplyTos();
            $mail->clearAttachments();

            return $mailsender? true : $mail->ErrorInfo;

        }
        
        // Use this function if you test on local
        function sendEmailsUsingSMTP($to, $subject, $content, $replyArray, $fileAry)
        {
            global $mail, $config;

            $mail->isSMTP();
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->Subject = $subject;
            $mail->addAddress($to);
            $mail->msgHTML($content);

            // Authentication section
            $mail->Username = $config['smtpUsername'];
            $mail->Password = $config['smtpPassword'];

            // Set sender information
            $mail->From = $config['senderUsername'];
            $mail->FromName = $config['senderName'];

            if ($replyArray) $mail->addReplyTo($replyArray['address'], $replyArray['name']);

            foreach($fileAry as $row){
                $mail->AddStringAttachment($row['bin'], $row['file']);
            }

            $mailsender = $mail->send();
            $mail->clearAllRecipients();
            $mail->clearReplyTos();
            $mail->clearAttachments();

            return $mailsender? true : $mail->ErrorInfo;
        }
	}
?>
