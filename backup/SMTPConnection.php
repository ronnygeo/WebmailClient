<?php
	class SMTPConnection{
			// Private variables 
    		var $_serv;
    		var $_port;
    		var $_usern;
    		var $_pass;
    		var $_to;
    		var $_subj;
    		var $_body;
    		var $_socket;
			var $_tls;
    		// Toggle this if you want to see what the script does in the background, it will screw up the look of the webmail though. 
    		var $_debug	= true;
			var $_app_name	= 'Shakiro Mail';
    		var $_app_desc	= 'Web E-Mail';
    		var $_app_ver 	= '1.0';
			// SMTP Functions 
    		function smtp_init ($server, $port)
    		{
    			// Specify variables, obviously, not many here.
    			$this->_serv = $server;
    			$this->_port = (int)$port;
    		} 
    		function smtp_connect () 
    		{ 
    			// Check to see if the hostname was given. 
    			if ($this->_serv == "")
    				$this->mail_output("Hostname was not specified.");
    			// Check for debuggy thingy, theres loads of these. 
    			if ($this->_debug)
    				$this->mail_output("Connecting to $this->_serv. ...");
    			// Create the socket on whatever port is specified. 
    			$this->_socket = fsockopen($this->_serv,$this->_port);
				$this->mail_output("Opening to $this->_serv in port $this->_port . ...");
    			// Tell the script to login. 
    			//$this->smtp_send_email ($this->_to, $this->_subj, $this->_body); 
    		}
    		function smtp_hand_shake ()
    		{
				$this->_debug =true;
    			// Send the 'HELO' command to the server to let them know we mean business. 
    			$helo = "EHLO " . "$this->_serv";
    			if ($this->mail_write($helo) == 0)
    				return("Could not send the HELO command");
    			// Again, retrieving data from server. 
    			$_mail_get = $this->mail_get($this->_socket);
    			if ($this->_debug)
						$this->mail_output($_mail_get);
    			// Split the data into parameters 
    			$parse = explode(" ", $_mail_get);
    			// Problems with the 'HELO' command have occured. 
    			if (($parse[0] != "250") or ($parse[0] != "220"))
    				return ("Could not continue with hand shake");
    		}
    		function smtp_send_email ($from, $to, $subject, $body) 
    		{
				//Authentication
				if ($this->mail_write("AUTH LOGIN") == 0)
    				return("Could not send the AUTH LOGIN command");
    			$_mail_get = $this->mail_get($this->_socket);
    			//if ($this->_debug)
    				$this->mail_output($_mail_get);
				
				if ($this->mail_write("d2VibWFzdGVyQHNoYWtpbGt1bWFyLmNvbQ==") == 0)
    				return("Could not send the User Name Entered command");
    			$_mail_get = $this->mail_get($this->_socket);
    			//if ($this->_debug)
    				$this->mail_output($_mail_get);
					
				if ($this->mail_write("d2VsY29tZTEyMw==") == 0)
    				return("Could not send the Password command");
    			$_mail_get = $this->mail_get($this->_socket);
    			//if ($this->_debug)
    				$this->mail_output($_mail_get);
						
    			// Start compiling the email. 
    			if ($this->mail_write("MAIL FROM: $from") == 0)
    				return("Could not send the MAIL FROM command");
					
    			$_mail_get = $this->mail_get($this->_socket);
    			//if ($this->_debug)
    				$this->mail_output($_mail_get);
					
    			//$parse = explode(" ", $_mail_get);
				$parse = substr($_mail_get,0,3);
    			if ($parse != "250")
    				return("MAIL FROM error: problems with sending email.");
					
    			if ($this->mail_write("RCPT TO: $to") == 0){
					echo "Could not send the RCPT command";
    				return("Could not send the RCPT command");}
					
    			$_mail_get = $this->mail_get($this->_socket);
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
					
    			$parse = substr($_mail_get,0,3);   //explode(" ", $_mail_get);
    			if ($parse != "250")
    				return("RCPT TO error: problems with sending email.");
    			if ($data_already_sent == 0)
    				if ($this->mail_write("DATA") == 0)
    					return("Could not send the DATA command");
    			$_mail_get = $this->mail_get($this->_socket);
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if (($parse[0] == "250") or ($parse[0] == "220") or ($parse[0] == "354"))
    			{
    				$this->mail_write("X-Mailer: $this->_app_name - $this->_app_desc Version: $this->_app_ver");
    				$this->mail_write("FROM: $from");
    				$this->mail_write("TO: $to");
    				$this->mail_write("Subject: $subject");
    				$this->mail_write("$body");
    				$this->mail_write(".");
    			}
    			$_mail_get = $this->mail_get($this->_socket);
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$data_already_sent = 1;
    		}
    		// Misc Functions 
    		function mail_output ($print)
    		{
    			echo "$print\n<BR/>";
    			return;
    		}
    		function mail_quit ()
    		{
    			$this->mail_write("QUIT");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    		}
    		function mail_write ($data) 
    		{
    			//if ($this->_debug)
    				$this->mail_output ($data);
					
    			// Sending stuff to the server right here. 
    			return(fputs ($this->_socket, $data . "\r\n"));
    		} 
    		function mail_get($socket)
    		{
    			// Retrieving stuff from the server for the first 100 bytes. 
    			for ($line="";;)
    			{
    				if (feof($this->_socket))
    					return(0);
    				$line .= fgets($this->_socket,1024);
    				$length = strlen($line);
    				if (($length >= 2) && (substr($line,$length-2,2) == "\r\n"))
    				{
    					$line = substr($line,0,$length-2);
						echo "$line<BR/>";
    					return($line);
						
    				}
    			}
    		}
	}
	
		// Create a new mail object.
    //$array[0] = new SMTPConnection;
    	// Send the smtp_init command with the server and port.
    	//$array[0]->smtp_init ("mail.shakilkumar.com", 25);
    	// Send the smtp_connect command to have the script connect to the server.
    	//$array[0]->smtp_connect(); 
    	// Tell the server that you wish to send an email and wait for a response.
    	//$array[0]->smtp_hand_shake ();
    	// Send all of the needed commands to send an email.
    	//$array[0]->smtp_send_email("webmaster@shakilkumar.com", "webmaster@shakilkumar.com", "Test", "Body of email here");
    	// Tell the script to disconnect.
    	//$array[0]->mail_quit ();
		
?>