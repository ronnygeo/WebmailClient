<?php
class SMTPClient
	{

	function SMTPClientConfig ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body)
	{

		$this->SmtpServer = $SmtpServer;
		$this->SmtpUser = base64_encode ($SmtpUser); //base64_encode (
		$this->SmtpPass = base64_encode ($SmtpPass);//base64_encode (
		$this->from = $from;
		$this->to = $to;
		$this->subject = $subject;
		$this->body = $body;

		if ($SmtpPort == "") 
		{
			$this->PortSMTP = 25;
		}
		else
		{
			$this->PortSMTP = $SmtpPort;
		}
	}

	function SendMail ()
	{
		if ($SMTPIN = fsockopen ($this->SmtpServer, $this->PortSMTP)) 
		{
			echo "Connection to $this->SmtpServer with $SMTPIN\r\n";
			$HTTP_HOST =$this->SmtpServer;
			fputs ($SMTPIN, "EHLO\r\n"); 
			
			$talk["hello"] = fgets ( $SMTPIN, 1024 ); 
			echo "EHLO\r\n";
			echo $talk["hello"];
			fputs($SMTPIN, "auth login\r\n");
			$talk["res"]=fgets($SMTPIN,1024);
			fputs($SMTPIN, $this->SmtpUser."\r\n");
			$talk["user"]=fgets($SMTPIN,1024);
			fputs($SMTPIN, $this->SmtpPass."\r\n");
			$talk["pass"]=fgets($SMTPIN,256);
			fputs ($SMTPIN, "MAIL FROM: <".$this->from.">\r\n"); 
			$talk["From"] = fgets ( $SMTPIN, 1024 ); 
			fputs ($SMTPIN, "RCPT TO: <".$this->to.">\r\n"); 
			$talk["To"] = fgets ($SMTPIN, 1024); 
			fputs($SMTPIN, "DATA\r\n");
			$talk["data"]=fgets( $SMTPIN,1024 );
			fputs($SMTPIN, "To: <".$this->to.">\r\nFrom: <".$this->from.">\r\nSubject:".$this->subject."\r\n\r\n\r\n".$this->body."\r\n.\r\n");
			$talk["send"]=fgets($SMTPIN,256);
			//CLOSE CONNECTION AND EXIT ... 
			fputs ($SMTPIN, "QUIT\r\n"); 
			fclose($SMTPIN); 
			// 
		} 
		//return $talk;
		return true;
	} 
	
	
	}
	$smtp = new SMTPClient;
	$smtp->SMTPClientConfig ("mail.shakilkumar.com", "25","webmaster@shakilkumar.com","welcome123","webmaster@shakilkumar.com", "webmaster@shakilkumar.com", "Test", "Body of email here");
	$smtp->SendMail();
?>