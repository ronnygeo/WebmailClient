<?php

class IMAPClient
{
	var $_serv, $_port, $user, $password;
	var $_socket,$m_newmail;
	var $m_Connected = false;
	var $m_Authenticated = false;
	var $m_SelectedFolder = "";
	var $m_MsgCount = 0;
	var $m_NewMsgCount = 0;	
	var $debug =false;
	
	function IMAPClient($server, $port, $user , $pass)
    {
    	// Specify variables, obviously, not many here.
    	$this->_serv = $server;
    	$this->_port = (int)$port;
		$this->user = $user;
		$this->password= $pass;
		//$this->mail_output("Server: " . $this->_serv ."<BR/> Port:".$this->_port . "<BR/>User=". $this->user ."<BR/>Password=". $this->password);
    } 
	
	function imap_connect ()
	{ 
		try{
			/*
    	// Check to see if the hostname was given. 
    	if ($this->_serv == "")
    		$this->mail_output("Hostname was not specified.");
    	// Check for debuggy thingy, theres loads of these. 
    	//if ($this->_debug)
    		$this->mail_output("Connecting to $this->_serv. ...");
			
    	// Create the socket on whatever port is specified. 
    	$this->_socket = fsockopen($this->_serv,$this->_port, $errno, $errstr, 10);
		//sleep(1);

		if(!$this->_socket)
			$this->mail_output("$errstr ($errno)<br />\n");
		else{
			$this->m_Connected = true;
			$this->mail_output("Opened to $this->_serv in port $this->_port . ...");
			$reply = fgets($this->_socket, 1024 );
			$this->mail_output($reply);
		}*/
		
			set_time_limit (0);
				// create socket
			$this->_socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
			// connect to server
			$result = socket_connect($this->_socket, $this->_serv,$this->_port) or die("Could not connect to server\n");  
			// send string to server
			//socket_write($this->_socket, $message, strlen($message)) or die("Could not send data to server\n");
			// get server response
			if(!$this->_socket)
				$this->mail_output("$errstr ($errno)<br />\n");
			else{
				$this->m_Connected = true;
				$this->mail_output("Opened to $this->_serv in port $this->_port . ...");
				$result = socket_read ($this->_socket, 1024) or die("Could not read server response\n");
				$this->mail_output($reply);
			}
			
			// close socket
			//socket_close($this->_socket);
		
		
		}
		catch(Exception $e){
			$this->m_Connected = false;	
		}
		return $this->m_Connected;
    }
	
	function mail_output ($print)
    {
    	if($this->debug)
			echo "$print\n<BR/>";
    	return;
    }
	
	function Authenticate($userName, $password)
	{
			$reply="";
			if(!$this->m_Connected){
				throw new Exception("You must connect first !");
			}
			if(!$this->m_Authenticated){
				//throw new Exception("You are already authenticated !");
				
			try{
				$message = "A LOGIN ".$this->user." ".$this->password;
				socket_write($this->_socket, $message."\n") or $this->mail_output("Could not send data to server\n");			
				//fputs ($this->_socket,"a1 LOGIN ".$this->user." ".$this->password);
				//Core.SendLine(m_pSocket,"a1 LOGIN " + userName +  " " + password);
				//$this->mail_output($message);
				//sleep(1);
				$reply="";
				$reply .= socket_read ($this->_socket, 1024);
				/* while (!feof($this->_socket)) { 
					$reply .= socket_read ($this->_socket, 1024);
					$this->mail_output($reply);
				} */
				
				//$reply = fgets($this->_socket, 1024 );
				//$this->mail_output($reply);
				//$this->mail_output("Waiting for authentication reply");
				
				//string reply = Core.ReadLine(m_pSocket);
				
				
				//$reply = trim(substr($reply, strpos($reply," ")));
				//$this->mail_output($reply);
				$this->mail_output(substr($reply,0, 4));
				
				if(substr($reply,0, 4) == "A OK"){
					$this->m_Authenticated = true;
					$this->mail_output("Shakiro Authenticated");
				}
				else{
					$this->m_Authenticated = false;
					$this->mail_output("Shakiro Authentication Failed");
				}
			}
			catch(Exception $e)
			{
				$this->m_Authenticated = false;
				$this->mail_output("Server returned: " .$reply);
			}
			}
			else{$this->mail_output("You are already authenticated ");}
		return $this->m_Authenticated;
	}
	
	function SelectFolder($folderName)
		{
			if(!$this->m_Connected){
				$this->imap_connect();
				//throw new Exception("You must connect first !");
			}
			if(!$this->m_Authenticated){
				$this->Authenticate($this->user, $this->password);
				//throw new Exception("You must authenticate first !");
			}

			socket_write($this->_socket,"B1 SELECT ".$folderName."\n" );
			$this->mail_output("B1 SELECT ".$folderName);			
			// Must get lines with * and cmdTag + OK or cmdTag BAD/NO
			$reply = socket_read($this->_socket, 1024 );
			//$this->mail_output($reply);	
			
			if($reply[0] == "*"){
				$lines = explode( "\n",$reply);
				$count =1;
				// Read multiline response
				foreach($lines as $line)//while($reply[0] =="*")
				{
					//$this->mail_output("Line ". $count .": " .$line);
					// Get rid of *
					$line = trim( substr($line,1)); //reply.Substring(1).Trim();

					if(strpos($line,"EXISTS") > -1){		
						$this->m_MsgCount = (int)trim(substr($line,0, strpos($line, " ")));  
						//$this->mail_output("Message Count:".$this->m_MsgCount);	
						//Convert.ToInt32(reply.Substring(0,reply.IndexOf(" ")).Trim());
					}
					if(strpos($line,"RECENT") > -1){
						$this->m_NewMsgCount = (int)trim(substr($line,0, strpos($line, " ")));
						//$this->mail_output("New Message Count:".$this->m_NewMsgCount);	
						//Convert.ToInt32(reply.Substring(0,reply.IndexOf(" ")).Trim());
					}
					if(strpos( $line,"UNSEEN") > -1){
						
						$temp = substr($line,strpos($line,"["));
						$temp =substr($temp,(int) strpos($temp," "));
						$temp =substr($temp,0,(int) strpos($temp,"]"));
						$this->m_newmail = $temp;//(int)trim(substr($line,0, strpos($line, " ")));
						//$this->mail_output("New Unseen Count:".$this->m_newmail);
					
					}
					//$reply = fgets($this->_socket, 1024 );
					$count +=1;
				}
			}
			else{
				$reply = $reply.Substring(reply.IndexOf(" ")).Trim(); // Remove Cmd tag
	
				if(substr($reply,0,2)== "OK"){
					$this->mail_output("Server returned: " . $reply);
					throw new Exception("Server returned:" . $reply);
				}
			}
			$this->m_SelectedFolder = $folderName;
		}
	
		function FetchList($start, $end)
		{
			if(!$this->m_Connected){
				$this->imap_connect();
				//throw new Exception("You must connect first !");
			}
			if(!$this->m_Authenticated){
				$this->Authenticate($this->user, $this->password);
				//throw new Exception("You must authenticate first !");
			}
			try
			{
				$this->mail_output("K FETCH ". $start .":".$end." (FLAGS BODY[HEADER.FIELDS (DATE FROM TO SUBJECT)])\n");
				socket_write($this->_socket,"K FETCH ". $start .":".$end." (FLAGS BODY[HEADER.FIELDS (DATE FROM TO SUBJECT)])\n" );
						
				// Must get lines with * and cmdTag + OK or cmdTag BAD/NO
				$reply = socket_read($this->_socket, 1024 );
				$lines = explode( "\n",$reply);
				$strRow =""; $mailsize=""; $msgID=""; $from =""; $strDate =""; $strSubject ="";
				foreach($lines as $line)
				{
					
					if($line[0] =="*")
					{
						
						$strRow .= ($strRow==""?"": $from . $strDate. $strSubject."<td>".$mailsize."</td>"."</tr>");
						//ID of the email message
						$temp = substr($line, strpos($line," "),strpos($line,"FETCH")-1);
						$strRow .= "<tr id=\"".trim($temp). "\""; //"newmail.php?id="+temp
						
						if(strpos($line,"\Seen") <= -1)
							$strRow .=" class=unread "; 
						//getting mail size inbetween {}	
						$mailsize =substr($line, strpos($line,"{") + 1, ((int) strpos($line,"}")) - ((int) strpos($line,"{")) - 1)."kb";
						
						$strRow .=">";
						$from ="<td></td>"; $strDate ="<td></td>"; $strSubject ="<td></td>";
						
					}	
					elseif(strpos($line, "From:") > -1){
						$temp =substr($line,5);	
						$tempName = substr($temp,0, strpos($temp ,"<"));
						if (trim($tempName) <> "")
							$from ="<td>$tempName</td> ";
						else
							$from ="<td>". substr($temp, strpos($temp,"<") + 1, strpos($temp,"@") - strpos($temp,"<") - 1) ."</td> ";
					}
					elseif(strpos($line, "Subject:") > -1){
						$temp =substr($line,8);	
						$strSubject ="<td>$temp</td> ";
					
					}
					elseif(strpos($line, "Date:") > -1){
						$temp =substr($line,5);	
						$strDate ="<td>$temp</td> ";
						
					}
					
				}	
				$strRow .= ($strRow==""?"":$from .$strDate. $strSubject."<td>".$mailsize."</td>"."</tr>");		
				
				echo $strRow;
			}
			catch (Exception $e1)
			{
				$this->mail_output("Error Fetch List".$e1);
			}

			
		}
		
		function FetchMessageTest($id)
		{
			if(!$this->m_Connected){
				$this->imap_connect();
				throw new Exception("You must connect first !");
			}
			if(!$this->m_Authenticated){
				$this->Authenticate($this->user, $this->password);
				throw new Exception("You must authenticate first !");
			}
			try
			{
				$this->mail_output("G1 FETCH ".$id." BODY[]\n");
				socket_write($this->_socket,"G1 FETCH ".$id." BODY[]\n");
					
				// Must get lines with * and cmdTag + OK or cmdTag BAD/NO
				$reply = socket_read($this->_socket, 2048 );
				//echo $reply;
				$lines = explode( "\n",$reply);
				//echo $lines[0];
				$msgline="";
				$body="";
				$f=0;
				$strRow =""; $mailsize=""; $msgID=""; $from =""; $strDate =""; $strSubject ="";
				//echo $lines[0];
				foreach($lines as $line)
				{
					
					if($line[0] =="*")
					{
						
						$strRow .= ($strRow==""?"": $from . $strDate. $strSubject."<td>".$mailsize."</td>"."</tr>");
						//ID of the email message
						$temp = substr($line, strpos($line," "),strpos($line,"FETCH"));
						echo $temp;
					
						$strRow .= "<tr id=\"".$temp. "\"";
						
							$msgline["id"]=$temp;
					
						//getting mail size inbetween {}	
						$mailsize =substr($line, strpos($line,"{") + 1, ((int) strpos($line,"}")) - ((int) strpos($line,"{")) - 1)."kb";
					}	
					elseif(strpos($line, "From:") > -1){
						$temp =substr($line,5);	
						$tempName = substr($temp,0, strpos($temp ,"<"));
						if (trim($tempName) <> "")
							$from ="<td>$tempName</td> ";
						else
							$from ="<td>". substr($temp, strpos($temp,"<") + 1, strpos($temp,"@") - strpos($temp,"<") - 1) ."</td> ";
							
					}
					elseif(strpos($line, "Subject:") > -1){
						$temp =substr($line,8);
						$strSubject ="<td>$temp</td> ";
					
					}
					elseif(strpos($line, "Delivery-date:") > -1){
						$temp =substr($line,5);	
						
						$strDate ="<td>$temp</td> ";
						
					}
					elseif(strpos($line, "\n")>-1){
			$f=1;
			}
			elseif($f==1){
				$body.=$line;
				}
				
				}	
				$msgline["id"]=$id;
				$msgline["from"]=$from;
				$msgline["date"]=$strDate;
				$msgline["subject"]=$strSubject;
				$msgline["body"]=$body;
				
				
				return $msgline;
			}
			
			
				
			catch (Exception $e1)
			{
				$this->mail_output("Error Fetch List".$e1);
			}

			
		}
	
	function delete($id){
		
		if(!$this->m_Connected){
				$this->imap_connect();
				throw new Exception("You must connect first !");
			}
			if(!$this->m_Authenticated){
				$this->Authenticate($this->user, $this->password);
				throw new Exception("You must authenticate first !");
			}
			try
			{
				socket_write($this->_socket,"D1 STORE ".$id." +FLAGS (\Deleted)\n");
					
				// Must get lines with * and cmdTag + OK or cmdTag BAD/NO
				$reply = socket_read($this->_socket, 1024 );
				return $reply;
			}
			catch (Exception $e1)
			{
				$this->mail_output("Error Fetch List".$e1);
			}

		}
	
	
}

?>