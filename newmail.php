<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
if(!isset($_SESSION["email"]))
//header ("Location:index.php");
{
/* echo "<meta
http-equiv='Refresh'
content='0; url=index.php'/>";
exit("NOT AUTHORIZED");
*/
}
$email=$_SESSION["email"]; 
?>
<title>Compose</title>

<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link rel="stylesheet" type="text/css" href="styles/mail.css" />



<script src="styles/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="styles/editor.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/php_ajax_framework.js"></script>



<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "composebody",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
    theme_advanced_buttons3 : "",
	theme_advanced_statusbar_location : "none",
    height:"350px",
    width:"100%"
});

</script>

<script type="text/javascript">

function logout(){
	window.location.href="logoff.php";
	}
function redirection(){
	window.location.href="main.php?id=1";
	}
	
	
	function SendMail() {
		
	  var user_field = document.getElementById('to').value;
	  //alert('Send Mail To Add -' + user_field);
	  if (user_field.length > 0) {
		  alert('Calling Ajax');
		//call our AJAX function in the PHP AJAX Framework
		ajaxHelper('SendEmail');
	  }
	  else {
		//clear results field 
		 alert('Wrong result');
		var results_div = document.getElementById('result');
		results_div.innerHTML = 'Nope';
  		}
  	}
  
  function SendEmail_init() {
  		  var To = document.getElementById('to');
		  var subj = document.getElementById('compose-subject');
		  var Body = tinyMCE.get('composebody').getContent();
		  var script = 'SendEmail.php';
		  var queryString = "To=" + To.value + "&" + "Sub=" + subj.value + "&" + "Body=" + Body;
		 // alert(queryString);
		  return queryString;
	}


	function SendEmail_ajax(results) {
		alert("Result : " + results);
		  var targetDiv = document.getElementById('result');
		  var resultHTML= results;
		  targetDiv.innerHTML = resultHTML;
	}


function valFull(){
	f=0;
	 if (document.getElementById("to").value=="")
f=1;
/*if(document. getElementById("cc").value=="")
f=1;
if (document. getElementById("bcc").value=="")
f=1;*/
if(f==0){
	setTimeout(continueExecution, 1000);
return true;}
else
return false;

	 }
	 
function valSend(){
	f=0;
	if(document.getElementById("compose-subject").value=="")
	{
		var c=confirm("No subject entered. Do you want to continue?");
		if(c==true)
		f=1;
		else
		f=0;
		}
		
		if(document.getElementById("composebody").value="")
		var c= confirm("There is no body for this message, do you want to continue?");
		if(c=true)
		f=1;
		else
		f=0;
	
	if(f=1){
		document.getElementById("compose-content").submit();
		//alert('Validation Success');
		//SendMail();
		return false;
		//return true;
	}
	else
	return false;
	
	}
	
	function val2(){
		
		if(document.getElementById("flag").innerHTML==1){
		return true;}
		else 
		return false;
		}

</script>

<?php
 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>'; 
		require 'lib/SMTPClass.php';
		include "lib/IMAPClient.php";
    	$_SESSION['MailServer'] ="mail.shakilkumar.com";
		$_SESSION['Port']=25;
		$_SESSION['UserID']="webmaster@shakilkumar.com";
		$_SESSION['Password']="welcome123";
		$to="";
  $subject="";
  $body="";
       if($_SERVER["REQUEST_METHOD"] == "GET"){
		   
		   //echo $_GET["id"];
	  
			$IMAP = new IMAPClient($_SESSION['MailServer'],"143",$_SESSION["UserID"],$_SESSION["Password"]);
		  $IMAP->imap_connect();
		  //echo "IMAP Connected";
		  $IMAP->Authenticate($_SESSION["UserID"],$_SESSION["Password"]);
		  $IMAP->SelectFolder("INBOX");
		  $msg=$IMAP->FetchMessage($_GET["id"]);
		  //echo $msg;
		  //echo $msg[0].$msg[1];
		  
		  //echo $_GET["type"];
		  if($_GET["type"]=="reply")
		  $to=$msg["from"];
		  else $to="";
		  $body=$msg["body"];
		  if($_GET["id"]=="")
		  $subject="";
		  else
		  $subject="RE: ".$msg["subject"];
	  }

	  
		
	 
		  $f=0;
	
		 if($_SERVER["REQUEST_METHOD"] == "POST")
		  {
			  htmlspecialchars($_POST['to']);
			  htmlspecialchars($_POST['_message']);
			  
			$SMTP = new SMTPClient($_SESSION['MailServer'],$_SESSION['Port'],$_SESSION['UserID'],$_SESSION['Password'],$_SESSION['UserID'],htmlspecialchars($_POST['to']),$_POST['subject'],htmlentities($_POST['_message']));
			 
			if($SMTP->SendMail()){
				echo "<script type=\"text/javascript\">alert('Email sent!');redirection();</script>";
				}
				else{
					echo "Email failed!";
				}
			$f=1;
			echo "<div id='flag' style='display:none;'>".$f."</div>";
		  }
?>

</head>
<?php
if(isset($_COOKIE['theme'])){
		//echo $_COOKIE['theme'];
			echo "<body style='background: url(images/mailbg".$_COOKIE['theme'].".jpg) repeat #d1d5d8;'>";
		}
		else
		{
	echo "<body style='background: url(images/mailbg1.jpg) repeat #d1d5d8;'>";
		}
        
        ?>
	<?php
// Should use some proper HTML filtering here.
  /*if($_POST['elm1']!='') {
    $sHeader = '<h1>Ah, content is king.</h1>';
    $sContent = strip_tags(stripslashes($_POST['elm1']),$allowedTags);
} else {
    $sHeader = '<h1>Nothing submitted yet</h1>';
    $sContent = '<p>Start typing...</p>';
    $sContent.= '<p><img width="107" height="108" border="0" src="/mediawiki/images/badge.png"';
    $sContent.= 'alt="TinyMCE button"/>This rover has crossed over</p>';
  }
  */
  //include 'lib/SMTPConnection.php';
 
 /*
  
  if($_GET['task'] == 'Send')
  	{
		echo "Going in to GET Metod";
		/*
			// Create a new mail object.
    	$array[0] = new SMTPConnection;
    	// Send the smtp_init command with the server and port.
    	$array[0]->smtp_init ("mail.shakilkumar.com", 25);
    	// Send the smtp_connect command to have the script connect to the server.
    	$array[0]->smtp_connect(); 
    	// Tell the server that you wish to send an email and wait for a response.
    	$array[0]->smtp_hand_shake ();
    	// Send all of the needed commands to send an email.
    	echo $array[0]->smtp_send_email("webmaster@shakilkumar.com", "webmaster@shakilkumar.com", "Test", "Body of email here");
    	// Tell the script to disconnect.
    	$array[0]->mail_quit ();
				
		
		$SMTP = new SMTPClient("mail.shakilkumar.com",25,"webmaster@shakilkumar.com","welcome123","webmaster@shakilkumar.com","webmaster@shakilkumar.com","Test Email","Try this");
		$SMTP->SendMail();
	}
	*/

  
?>

<div id="header">
<div id="topline">
	<div class="topleft">
		
		<a class="about-link" onclick="" id="rcmbtn100" href="overview.php">About</a>
			</div>
	
	<div class="topright">
	
				<span class="username" style="color:white"><?php echo $email;?></span>
		<a class="button-logout" id="rcmbtn103" onclick="logout();">Logout</a>
		</div>
</div>


<div id="topnav">
	<div id="taskbar" class="topright">
	
			<a class="about-link" onclick="" id="rcmbtn102" href="overview.php">Overview</a>
	<span class="minmodetoggle"></span>
	</div>
	<a href="main.php?id=1"><img src="styles/images/shakirologo.png" id="toplogo" border="0" alt="Logo" onclick="" /></a>
</div>

<br style="clear:both" />
</div>

</div>


<div id="mainscreen">

<!-- toolbar -->
<div id="messagetoolbar" style="margin-left:-230px;">
<div id="mailtoolbar" class="toolbar">
	
	<a class="button close" id="rcmbtn102" href="main.php?id=" onclick="">Dispose</a>
	<span class="spacer"></span>
	<a class="button send" title="Send now" id="rcmbtn103" href="main.php?id=1" onclick="valSend();return false;val2();">Send</a>
    	<span class="spacer"></span>
<a class="button attach" title="Attach a file" onclick="" id="rcmbtn106" href="#">Attach</a>
<!--button onclick="valSend();" value ="Send Mail"> </button -->
</div>
</div>

<div id="composeview-left">
<div id="folderlist-header"></div>
<div id="mailboxcontainer" class="uibox listbox">
<div id="folderlist-content" class="scroller withfooter">
<ul id="mailboxlist" class="listing">
<li id="rcmliSU5CT1g" class="mailbox inbox"><a href="./?_task=mail&amp;_mbox=INBOX" onclick="" rel="INBOX">Inbox</a>
</li>
<li id="rcmliSU5CT1guRHJhZnRz" class="mailbox drafts"><a href="./?_task=mail&amp;_mbox=INBOX.Drafts" onclick="" rel="INBOX.Drafts">Drafts</a>
</li>
<li id="rcmliSU5CT1guU2VudA" class="mailbox sent"><a href="./?_task=mail&amp;_mbox=INBOX.Sent" onclick="" rel="INBOX.Sent">Sent</a>
</li>

</li>
<li id="rcmliSU5CT1guVHJhc2g" class="mailbox trash"><a href="./?_task=mail&amp;_mbox=INBOX.Trash" onclick="" rel="INBOX.Trash">Trash</a>
</li>
</ul>

</div>

</div>


</div>
<div id="composeview-right">

<form name="form" action="" method="post" id="compose-content" class="uibox">
<input type="hidden" name="_token" value="bc7ac8109b7d3379b38dde77d9686990">

<!-- message headers -->
<div id="composeheaders">
<!--<a href="#options" id="composeoptionstoggle" class="moreheaderstoggle"><span class="iconlink" title="Options"></span></a>-->

<table class="headers-table compose-headers">
<tbody>
	<tr>
		<td class="title top"><label for="to">To</label></td>
		<td class="editfield"><textarea name="to" id="to" cols="70" rows="1" tabindex="2" value="<?php echo $to;?>"><?php echo $to;?></textarea><script type="text/javascript">
var to = new LiveValidation('to');
to.add( Validate.Email );
</script></td>
	</tr>
   
    <!--tr>
		<td class="title top">
			<label for="cc">cc</label>
			
		</td>
		<td class="editfield"><textarea name="cc" id="cc" cols="70" rows="1" tabindex="3"></textarea><script type="text/javascript">
var cc = new LiveValidation('cc');
cc.add( Validate.Email );
</script></td>
	</tr> <tr id="compose-bcc">
		<td class="title top">
			<label for="bcc">Bcc</label>
			<a href="#bcc" onclick="" class="iconbutton cancel" title="Delete" />x</a>
		</td>
		<td colspan="2" class="editfield"><textarea name="_bcc" spellcheck="false" id="_bcc" cols="70" rows="1" tabindex="4"></textarea><script type="text/javascript">
var bcc = new LiveValidation('bcc');
bcc.add( Validate.Email );
</script></td> 
	</tr>
		<tr>
		<td></td>
		<td class="formlinks">
			<a href="#cc" onclick="show_header_row('cc'); return false" id="cc-link" class="iconlink add">Add Cc</a>
			<a href="#bcc" onclick="show_header_row('bcc'); return false" id="bcc-link" class="iconlink add">Add Bcc</a>
		
		</td>
	</tr>
     -->
    <tr>
		<td class="title"><label for="compose-subject">Subject</label></td>
		<td class="editfield"><input name="subject" id="compose-subject" tabindex="4" value="<?php echo $subject;?>" type="text"></td>
	</tr>
</tbody>
</table>

<div id="composebuttons" class="pagenav formbuttons">
	
</div>

<!-- (collapsable) message options -->

</div>

<!-- message compose body -->
<div id="composeview-bottom">
	<div id="composebodycontainer">
		<textarea name="_message" id="composebody" cols="100" rows="20" tabindex="9">
<?php echo $body; ?>
        </textarea>

	</div>
</div>

</form>

<div id="result">
<div>

</div><!-- end mailview-right -->

</div><!-- end mainscreen -->

<div id="upload-dialog" class="propform popupdialog" title="Attach a file">
	<div id="uploadform"><form id="uploadformFrm" name="uploadform" method="post" enctype="multipart/form-data" action="./">
<input type="hidden" name="_token" value="bc7ac8109b7d3379b38dde77d9686990"><input type="hidden" name="_extwin" value="1"><div><input size="40" type="file" name="_attachments[]" multiple="multiple"></div>
<div class="hint">Maximum allowed file size is 5.0 MB</div>
</form>
</div>

	<div class="formbuttons">
		<input type="button" class="button mainaction" id="rcmbtn119" onclick="" value="Upload" disabled="disabled">
		<input type="button" class="button" onclick="" id="rcmbtn120" value="Cancel">
	</div>
</div>


</body>
</html>