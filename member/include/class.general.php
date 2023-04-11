<?php
    
	class General
    {

		function getLanguage()
        {
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
		    		$_SESSION['language'] = "english";
			        $language = "english";
			        setcookie("language", "english");
					
			
		    	}
		    }

		    return $language;
		}
        
        // This function is using server to send mail, might go into Junk
        function sendEmailsUsingSendmail($to, $subject, $content, $replyArray)
        {
            
            global $mail, $config;
            
            $mail->isMail();
            $mail->Subject = $subject;
            $mail->addAddress($to);
            $mail->msgHTML($content);
            
            // Set sender information
            $mail->From = $config['senderUsername'];
            $mail->FromName = $config['senderName'];
            
            if ($replyArray) $mail->addReplyTo($replyArray['address'], $replyArray['name']);
            
            $mailsender = $mail->send();
            $mail->clearAllRecipients();
            $mail->clearReplyTos();
            
            return $mailsender? true : $mail->ErrorInfo;
            
        }
        
        // Use this function if you test on local
        function sendEmailsUsingSMTP($to, $subject, $content, $replyArray)
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
            
            $mailsender = $mail->send();
            $mail->clearAllRecipients();
            $mail->clearReplyTos();
            
            return $mailsender? true : $mail->ErrorInfo;
            
        }
	}
?>
