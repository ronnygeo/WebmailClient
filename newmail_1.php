<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Compose</title>

<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link rel="stylesheet" type="text/css" href="styles/mail.css" />


<script src="styles/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="styles/editor.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">

<?php
 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  
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
?>
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
    height:"350px",
    width:"100%"
});

</script>

<script type="text/javascript">

function valFull(){
	f=0;
	 if (document. getElementById("to").value=="")
f=1;
/*if(document. getElementById("cc").value=="")
f=1;
if (document. getElementById("bcc").value=="")
f=1;*/
if(f==0)
return true;
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
	
	if(f=1)
	return true;
	else
	return false;
	
	}
</script>


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

<div id="header">
<div id="topline">
	<div class="topleft">
		
		<a class="about-link" onclick="" id="rcmbtn100" href="overview.php">About</a>
			</div>
	
	<div class="topright">
	
				<span class="username" style="color:white">admin@shakilkumar.com</span>
		<a class="button-logout" id="rcmbtn103" href="./?_task=logout" onclick="">Logout</a>
		</div>
</div>


<div id="topnav">
	<div id="taskbar" class="topright">
	
			<a class="about-link" onclick="" id="rcmbtn102" href="overview.php">Overview</a>
	<span class="minmodetoggle"></span>
	</div>
	<a href="main.php"><img src="styles/images/shakirologo.png" id="toplogo" border="0" alt="Logo" onclick="" /></a>
</div>

<br style="clear:both" />
</div>

</div>


<div id="mainscreen">

<!-- toolbar -->
<div id="messagetoolbar" style="margin-left:-230px;">
<div id="mailtoolbar" class="toolbar">
	
	<a class="button close" id="rcmbtn102" href="#" onclick="">Dispose</a>
	<span class="spacer"></span>
	<a class="button send" title="Send now" id="rcmbtn103" href="#" onclick="return valSend();">Send</a>
    	<span class="spacer"></span>
<a class="button attach" title="Attach a file" onclick="" id="rcmbtn106" href="#">Attach</a>

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

<form name="form" action="./" method="post" id="compose-content" class="uibox">
<input type="hidden" name="_token" value="bc7ac8109b7d3379b38dde77d9686990">

<!-- message headers -->
<div id="composeheaders">
<!--<a href="#options" id="composeoptionstoggle" class="moreheaderstoggle"><span class="iconlink" title="Options"></span></a>-->

<table class="headers-table compose-headers">
<tbody>
	<tr>
		<td class="title top"><label for="to">To</label></td>
		<td class="editfield"><textarea name="to" id="to" cols="70" rows="1" tabindex="2"></textarea><script type="text/javascript">
var to = new LiveValidation('to');
to.add( Validate.Email );
</script></td>
	</tr>
   
    <tr>
		<td class="title top">
			<label for="cc">cc</label>
			
		</td>
		<td class="editfield"><textarea name="cc" id="cc" cols="70" rows="1" tabindex="3"></textarea><script type="text/javascript">
var cc = new LiveValidation('cc');
cc.add( Validate.Email );
</script></td>
	</tr> <!--<tr id="compose-bcc">
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
		<td class="editfield"><input name="subject" id="compose-subject" tabindex="8" value="" type="text"></td>
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
		<textarea name="_message" id="composebody" cols="100" rows="20" tabindex="9"></textarea>

	</div>
</div>

</form>


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