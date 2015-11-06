<?php


class SMTPClient
{
	var $SmtpServer="";
	var $SmtpUser="";
	var $SmtpPass ="";
	var $from="";
	var $to="";
	var $subject="";
	var $body="";
function SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body)
{

$this->SmtpServer = $SmtpServer;
$this->SmtpUser = base64_encode ($SmtpUser);
$this->SmtpPass = base64_encode ($SmtpPass);
$this->from = $from;
$this->to = $to;

$this->subject = $subject;
$this->body = $body;

//print_R($body);
//print_R( $to);

	if ($SmtpPort == "") 
	{
	$this->PortSMTP = 25;
		}else{
	$this->PortSMTP = $SmtpPort;
	}


}

                   

function SendMail ()
{
	try{
		if ($SMTPIN = fsockopen ($this->SmtpServer, $this->PortSMTP)) 
		{
			   
			   fputs ($SMTPIN, "EHLO\r\n");  
			   $talk["hello"] = fgets ( $SMTPIN, 1024 ); 
					   
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
			   
				 $mime = "MIME-Version: 1.0;\r\n";
				 $mime .="Content-Type: text/html; charset=\"iso-8859-1\";\r\n";
				 $mime .= "Content-Transfer-Encoding: 7bit;\r\n\r\n";
				$this->body = "<html><body>".$this->body."</body></html>";
				
				
				fputs($SMTPIN, "To: <".$this->to.">\r\nFrom: <".$this->from.">\r\nSubject:".$this->subject."\r\n".$mime."".$this->body.""."\r\n.\r\n");
				$talk["send"]=fgets($SMTPIN,256);
			   
			   //CLOSE CONNECTION AND EXIT ... 
			   
			   fputs ($SMTPIN, "QUIT\r\n");  
			   fclose($SMTPIN); 
			   return true;
			 //  
		}  
		return false;
	}
	catch (Exception $e1){
		return false;}
	//return $talk;


}        
           
        

}


?>

