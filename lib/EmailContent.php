<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Content</title>
<link href="../styles/mail.css" rel="stylesheet" type="text/css" />
<link href="../styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body  style ="background: url(../images/linen.jpg)">
<!--<div id="mainscreen">-->
<?php
	session_start();
	$_SESSION["MailServer"] ="mail.shakilkumar.com";//"imap.asia.secureserver.net";
	$_SESSION["IPort"]="143";
	$_SESSION["UserID"]="webmaster@shakilkumar.com";//"netapps@ronlabz.com";
	$_SESSION["Password"]="welcome123";//"abc123";
	 $id = $_GET["id"];
		  
	include 'IMAPClient.php';
	 //if($_SERVER["REQUEST_METHOD"] == "POST")
      //{
	  $IMAP = new IMAPClient($_SESSION["MailServer"],$_SESSION["IPort"],$_SESSION["UserID"],$_SESSION["Password"]);
	  $IMAP->imap_connect();
	  $IMAP->Authenticate($_SESSION["UserID"],$_SESSION["Password"]);
	  
	  $IMAP->SelectFolder("INBOX");
	 try
		{
				//$IMAP->mail_output("G1 FETCH ".$id." BODY[]\n");
				socket_write($IMAP->_socket,"G1 FETCH ".$id." BODY[]\n");
					
				// Must get lines with * and cmdTag + OK or cmdTag BAD/NO
				$reply = socket_read($IMAP->_socket, 2048 );
				//echo $reply;
				$lines = explode( "\n",$reply);
				//echo $lines[0];
				$msgline="";
				$body=""; $To="";
				$f=0;
				$bodyBegin=false;
				$strRow =""; $mailsize=""; $msgID=""; $from =""; $strDate =""; $strSubject =""; $fromEmail="";
				//echo $lines[0];
				foreach($lines as $line)
				{
					
					if($line[0] =="*")
					{
						
						$strRow .= ($strRow==""?"": $from . $strDate. $strSubject."<td>".$mailsize."</td>"."</tr>");
						//ID of the email message
						$temp = substr($line, strpos($line," "),strpos($line,"FETCH"));
						//echo $temp;
					
						$strRow .= "<tr id=\"".$temp. "\"";
						
							$msgline["id"]=$temp;
					
						//getting mail size inbetween {}	
						$mailsize =substr($line, strpos($line,"{") + 1, ((int) strpos($line,"}")) - ((int) strpos($line,"{")) - 1)."kb";
					}	
					elseif(strpos($line, "From:") > -1){
						$temp =substr($line,5);	
						$tempName = substr($temp,0, strpos($temp ,"<"));
						if (trim($tempName) <> "")
							$from ="$tempName";
						else
							$from ="". substr($temp, strpos($temp,"<") + 1, strpos($temp,"@") - strpos($temp,"<") - 1) ." ";
							
						$fromEmail = substr($temp,strpos($temp,"<") + 1,strpos($temp,">") - strpos($temp,"<") - 1);
					}
					elseif(strpos($line, "To:") > -1){
						$To =substr($line,3);	
						
					}
					elseif(strpos($line, "Subject:") > -1){
						$temp =substr($line,8);
						$strSubject ="$temp ";
					
					}
					elseif(strpos($line, "Delivery-date:") > -1){
						$temp =substr($line,14);	
						
						$strDate ="$temp";
						
					}
					elseif(strpos($line, "Content-Type:") > -1)
					{
						if(!$bodyBegin)
							$bodyBegin=true;
					}
					elseif(strpos($line, "\n")>-1){
					$f=1;
					}
					if($bodyBegin == true && strpos($line, "Content-Type:") < -1 && strpos($line, "--") < -1)
						$body .=$line ."<br/>";
				
				}	
				$msgline["id"]=$id;
				$msgline["from"]=$from;
				$msgline["date"]=$strDate;
				$msgline["subject"]=$strSubject;
				$msgline["body"]=$body;
				
				
				//return $msgline;
			}
			
			
				
			catch (Exception $e1)
			{
				$IMAP->mail_output("Error Fetch List".$e1);
			}

?>

<div id="messageheader" style="margin-top:-5px;">
<h2 class="subject"><?php echo $strSubject; ?></h2>
<table class="headers-table"><tbody><tr><td class="header-title">From</td>
<td class="header from"><span class="adr"><a href=<?php echo "\"".$fromEmail. "\""; ?> onclick="" title="<?php echo "\"".$fromEmail. "\""; ?>" class="rcmContactAddress"><?php echo $from . " " . $fromEmail; ?></a></span></td>
</tr>
<tr><td class="header-title">To</td>
<td class="header to"><span class="adr"><a href=<?php echo "\"".$To. "\""; ?> onclick="" class="rcmContactAddress">webmaster@shakilkumar.com</a><a href="#add" onclick="" title="Add to address book" class="rcmaddcontact"></a></span></td>
</tr>

<tr><td class="header-title">Date</td>
<td class="header date"><?php echo $strDate; ?></td>
</tr>
</tbody>
</table>
<span class="moreheaderstoggle"></span>
</div>

<div id="messagecontent">
<?php echo $body; ?>
<!--<div class="leftcol">-->
<div id="message-objects">
<div id="remote-objects-message" class="notice" style="display: none"><a href="#loadimages" onclick="rcmail.command('load-images')"></a> <a href="#alwaysload" onclick="rcmail.command('always-load')" style="white-space:nowrap"></a>
</div>
</div>

<div id="messagebody" style="margin-top:-20px; overflow:auto;"><div class="message-htmlpart"><!-- html ignored --><!-- head ignored --><!-- meta ignored --><div class="rcmBody" style="font-family: Verdana,Geneva,sans-serif;">

</div>
<!--</div> for leftcol-->
</div><!--messagecontent -->
</div>

</div>
</div>

</div><!-- end mailview-right -->

<!--</div> end mainscreen -->
</body>
</html>