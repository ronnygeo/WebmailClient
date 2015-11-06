<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Overview</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />


</head>

<body style="background: url(images/mailbg1.jpg) repeat #d1d5d8;">


<div class="minwidth">
<div id="header">
<div id="topline">
	<div class="topleft">
		

	</div>
	
	<div class="topright">
	
			<span class="username">admin@shakilkumar.com</span>
		<a class="button-logout" id="btnlogout" href="./?_task=logout" onclick="">Logout</a>
	
	</div>
</div>

<div id="topnav">
	<div id="taskbar" class="topright">
	
	<a class="button-settings" id="btnsettings" href="./?_task=settings" onclick=""><span class="button-inner">Settings</span></a>
			<a class="about-link" onclick="UI.show_about(this);return false" id="btnoverview" href="#">Overview</a>
	<span class="minmodetoggle"></span>
    
    
	</div>
	<img src="images/shakirologo.png" id="toplogo" border="0" alt="Logo" onclick="" />
</div>

<br style="clear:both" />
</div>




<div id="mainscreen">

<!-- toolbar -->



<div id="mailview-right" style="width:95%; margin:auto;">

<div id="mailview-top" class="uibox fullheight" style="width:100%;padding: 10px 10px 10px 10px">
<h1>Overview</h1>

<h3>Objective</h3>
<p>The Mail User Agent is intented to work with any SMTP servers and work with either POP3 or IMAP servers and let users read their mail and post mail messages.

The user agent will run within a web browser and will achieve the following operations

 - browse subject and content of the messages in mail box
 - read selected mail messages
 - compose and post mail messages
 - delete selected mail messages

The user agent will also

 - interact with mailbox using either POP3 or IMAP
 - interact with mail transport using SMTP
 - add suitable headers to posted mail messages
 - Server programs must not use mail server APIs. They should drive SMTP, POP or IMAP interactions directly using SMTP, POP or IMAP commands.

The project could be divided into the following tasks

initialisation and integration  
eliciting user and mail service details, integrating parts
composing and posting  
composing and posting of mail messages
handling mailbox  
summarising contents of mailbox
message retrieval and deletion  
retrieval and deletion of e-mail messages</p>



<table style="margin:auto;width:70%; border-collapse:collapse; " cellpadding="5" cellspacing="2" border="1">
<tr>
<td>
<img src="images/report/login.jpg" width="50%" alt="Login" />
The user authentication is done based on the 
</td>

</tr>
<tr>
<td>
<img src="images/report/main.jpg" width="50%" alt="Main Mailbox" />

</td>

</tr>
<tr>
<td>
<img src="images/report/newmail.jpg" width="50%" alt="New Mail" />

</td>

</tr>
<tr>
<td>
All the pages have been validated by w3c.

</td>

</tr>
</table>



<p>This project is being created by:</p>


<h4>Shakil Kumar - Kirrubananthan Sunderam - Ronny George Mathew</h4>

<!-- messagelist --><!-- list footer -->
</div><!-- end mailview-top --><!-- end mailview-bottom --><!-- end mailview-right -->
</div>
</div>
</div>
<!-- end mainscreen -->

<div><!-- end minwidth -->



</div>




</body>
</html>