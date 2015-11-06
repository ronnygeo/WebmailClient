<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mailbox</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link rel="stylesheet" type="text/css" href="styles/mail.css" />

<?php
session_start();
if(!isset($_SESSION["login"]))
//header('Location: index.php');
?>

<style type="text/css">
	#mailview-top { height: 262px; }
	#mailview-bottom { top: 316px; height: auto; }
	#mailpreviewframe { display: block; }
	#messagelist tbody tr:hover td { background: #CAEFFD; color: #0768B3; cursor: pointer; }

	
	</style>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript">

function showSettings(s){
	var h=document.getElementById("hoverbox");
	if(s==1)
	h.style.display="inline";
	else
	h.style.display="none";
	}

function setCookie(c_name,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var a = document.getElementById("themedd");
var v=a.options[a.selectedIndex].value;
//alert(v);
var c_value=escape(v) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
document.location.reload(true);
//$("body").css("background-image", "url(/mailbg"+v+".jpg)");
}

onload = function() {
    if (!document.getElementsByTagName || !document.createTextNode) return;
    var rows = document.getElementById('messagelist').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    var ifram = document.getElementById('messagecontframe');
	for (i = 0; i < rows.length; i++) {
		var row = rows[i];
		
        rows[i].onclick = function() {
            //alert(this.rowIndex + 1 );
			//alert ("Opening styles/" + this.id + ".html");
			ifram.src="styles/" + this.id + ".html";
			
        }
    }
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
    

	
	
<div class="minwidth">
<div id="header">
<div id="topline">
	<div class="topleft">
		

			</div>
	
	<div class="topright">
	
			<span class="username"><?php echo $_SESSION["email"];?></span>
		<a class="button-logout" id="rcmbtn103" href="./?_task=logout" onclick="">Logout</a>
	
	</div>
</div>
</div>
<div id="topnav">

	<div id="taskbar" class="topright">
	
   
	<a class="button-settings" id="btnsettings" onclick="showSettings(1);" ondblclick="showSettings(0);"><span class="button-inner">Themes</span></a>

    
			<a class="about-link" onclick="UI.show_about(this);return false" id="rcmbtn102" href="overview.php">Overview</a>
	<span class="minmodetoggle"></span>
    
    
	</div>
    
     <div id="hoverbox" ondblclick="showSettings(0);">

    	<select name="themedd" class="searchfilter decorated" id="themedd" onchange="setCookie('theme',30);">
      
      
          <?php 
	if(isset($_COOKIE['theme']))
	{
		$s=$_COOKIE['theme'];
		
		switch($s){
			case 1: echo "<option value='1' selected='selected'>Leaves</option>
<option value='2'>Sky</option>
<option value='3'>Mountain</option>
<option value='4'>Scenic</option>
<option value='5'>Ocean</option>
</select>";
			break;
			
			case 2: echo "<option value='1'>Leaves</option>
<option value='2' selected='selected'>Sky</option>
<option value='3'>Mountain</option>
<option value='4'>Scenic</option>
<option value='5'>Ocean</option>
</select>";
			break;
			
			case 3: echo "<option value='1'>Leaves</option>
<option value='2'>Sky</option>
<option value='3' selected='selected'>Mountain</option>
<option value='4'>Scenic</option>
<option value='5'>Ocean</option>
</select>";
break;
			
			case 4: echo "<option value='1'>Leaves</option>
<option value='2'>Sky</option>
<option value='3'>Mountain</option>
<option value='4' selected='selected'>Scenic</option>
<option value='5'>Ocean</option>
</select>";
break;		
		case 5:echo "<option value='1'>Leaves</option>
<option value='2'>Sky</option>
<option value='3'>Mountain</option>
<option value='4'>Scenic</option>
<option value='5' selected='selected'>Ocean</option>
</select>";
break;		
			}
		
		
		}
		else
		{
			echo "<option value='1'>Leaves</option>
<option value='2'>Sky</option>
<option value='3'>Mountain</option>
<option value='4'>Scenic</option>
<option value='5'>Ocean</option>
</select>";
			}
	
	?>  


</div>
	<img src="images/shakirologo.png" id="toplogo" border="0" alt="Logo" onclick=""/>
</div>

<br style="clear:both" />
</div>




<div id="mainscreen">

<!-- toolbar -->
<div id="messagetoolbar" class="toolbar" style="margin-left:-230px;">
	<a class="button checkmail" title="Check for new messages" id="rcmbtn108" href="#" onclick="">Refresh</a>
	<a class="button compose" title="Create a new message" id="rcmbtn109" href="newmail.php" onclick="">Compose</a>
<span class="spacer"></span>
<span class="spacer"></span>
<span class="spacer"></span>
<span class="spacer"></span>
<a class="button reply" title="Reply to sender" id="rcmbtn110" href="#" onclick="">Reply</a>
<!--<span class="dropbutton">
	
	<span class="dropbuttontip" id="replyallmenulink" onclick="UI.show_popup('replyallmenu');return false"></span>
</span>-->
<a class="button reply-all" title="Reply to list or to sender and all recipients" id="rcmbtn111" href="#" onclick="">Reply all</a>
<!--<span class="dropbutton">
	
	<span class="dropbuttontip" id="forwardmenulink" onclick=""></span>
</span>-->
<a class="button forward" title="Forward the message" id="rcmbtn112" href="#" onclick="">Forward</a>
<a class="button delete" title="Delete message" id="rcmbtn113" href="#" onclick="">Delete</a>


<a class="button print" id="rcmbtn118" href="#" onclick=""><span class="icon print">Print</span></a>

<div id="forwardmenu" class="popupmenu">
	<ul class="toolbarmenu">
		<li><a class="forwardlink" id="rcmbtn114" href="#" onclick="">Forward inline</a></li>
		<li><a class="forwardattachmentlink" id="rcmbtn115" href="#" onclick="">Forward as attachment</a></li>
		
	</ul>
</div>

</div>

<div id="mailview-left">

<!-- folders list -->
<div id="folderlist-header"></div>
<div id="mailboxcontainer" class="uibox listbox">
<div id="folderlist-content" class="scroller withfooter">
<ul id="mailboxlist" class="listing"><li id="rcmliSU5CT1g" class="mailbox inbox selected"><a href="./?_task=mail&amp;_mbox=INBOX" onclick="" rel="INBOX">Inbox</a>
</li>
<li id="rcmliSU5CT1guRHJhZnRz" class="mailbox drafts"><a href="./?_task=mail&amp;_mbox=INBOX.Drafts" onclick="" rel="INBOX.Drafts">Drafts</a>
</li>
<li id="rcmliSU5CT1guU2VudA" class="mailbox sent"><a href="./?_task=mail&amp;_mbox=INBOX.Sent" onclick="" rel="INBOX.Sent">Sent</a>
</li>
<li id="rcmliSU5CT1guVHJhc2g" class="mailbox trash"><a href="./?_task=mail&amp;_mbox=INBOX.Trash" onclick="" rel="INBOX.Trash">Trash</a>
</li>
</ul>

</div>

</div>

</div>

<div id="mailview-right">

<div id="messagesearchtools">

<!-- search filter -->
<div id="searchfilter">
	<select name="searchfilter" class="searchfilter decorated" id="rcmlistfilter" onchange="">
<option value="ALL">All</option>
<option value="UNSEEN">Unread</option>
<option value="FLAGGED">Flagged</option>
<option value="UNANSWERED">Unanswered</option>
<option value="DELETED">Deleted</option>
<option value="UNDELETED">Not deleted</option>

</select>

</div>

<!-- search box -->
<div id="quicksearchbar" class="searchbox">
<form name="rcmqsearchform" onsubmit="" style="display:inline" action="./" method="get"><input name="_q" id="quicksearchbox" type="text"/></form>

<a id="searchmenulink" class="iconbutton searchoptions" onclick="" title="Search modifiers" href="#"> </a>
<a id="searchreset" class="iconbutton reset" title="Reset search" href="#" onclick=""> </a>
</div>

</div>

<div id="mailview-top" class="uibox fullheight">

<!-- messagelist -->
<div id="messagelistcontainer" class="boxlistcontent">
<table id="messagelist" class="records-table sortheader"><thead><tr>

<td class="to" id="rcmto"><a href="./#sort" onclick="" title="Sort by">To</a></td>
<td class="from" id="rcmfrom"><a href="./#sort" onclick="" title="Sort by">From</a></td>
<td class="date" id="rcmdate"><a href="./#sort" onclick="" title="Sort by">Date</a></td>
<td class="subject" id="rcmsubject"><a href="./#sort" onclick="" title="Sort by">Subject</a></td>
<td class="size" id="rcmsize"><a href="./#sort" onclick="" title="Sort by">Size</a></td>
<td class="attachment" id="rcmattachment"><span class="attachment">&nbsp;</span></td>
</tr>
</thead>
<tbody >
<tr id ="TR1" class="unread"><td>Shakil Kumar</td><td>Ronny Mathew</td><td>03/03/2013 10:10:10</td><td>Let's Meet for Project</td><td>10.00kb</td><td></td></tr>
<tr id ="TR2"><td>Shakil Kumar</td><td>Kirrubananthan</td><td>03/03/2013 10:10:10</td><td>Let's Meet for Project</td><td>10.00kb</td><td></td></tr>
</tbody>
</table>




</div>

<!-- list footer -->
<div id="messagelistfooter">
	<div id="countcontrols" class="pagenav dark">
		<span class="countdisplay" id="rcmcountdisplay" style="color:black">Mailbox is empty.</span>
		<span class="pagenavbuttons">
		<a class="button firstpage disabled" title="Show first page" id="rcmbtn127" href="#" onclick=""><span class="inner">|&lt;</span></a>
		<a class="button prevpage disabled" title="Show previous page" id="rcmbtn128" href="#" onclick=""><span class="inner">&lt;</span></a>
		<a class="button nextpage disabled" title="Show next page" id="rcmbtn129" href="#" onclick=""><span class="inner">&gt;</span></a>
		<a class="button lastpage disabled" title="Show last page" id="rcmbtn130" href="#" onclick=""><span class="inner">&gt;|</span></a>
		</span>
	</div>
</div>

</div><!-- end mailview-top -->

<div id="mailview-bottom" class="uibox">

<div id="mailpreviewframe">

<?php 
	session_start();
	$_SESSION["MailServer"] ="mail.shakilkumar.com";//"imap.asia.secureserver.net";
	$_SESSION["IPort"]="143";
	$_SESSION["UserID"]="webmaster@shakilkumar.com";//"netapps@ronlabz.com";
	$_SESSION["Password"]="welcome123";//"abc123";
	 
		  
	include 'lib/IMAPClient.php';
	 //if($_SERVER["REQUEST_METHOD"] == "POST")
      //{
	  $IMAP = new IMAPClient($_SESSION["MailServer"],$_SESSION["IPort"],$_SESSION["UserID"],$_SESSION["Password"]);
	  $IMAP->imap_connect();
	  $IMAP->Authenticate($_SESSION["UserID"],$_SESSION["Password"]);
	  
	  $IMAP->SelectFolder("INBOX");
	  $IMAP->FetchList(1,5);
	//Print_R( $SMTP->SendMail());
				 
	  //}
?>


<iframe name="messagecontframe" id="messagecontframe" style="width:100%; height:100%" frameborder="0" src="styles/placeholder.html">


</iframe>


</div>

<div id="message" class="statusbar"></div>

</div><!-- end mailview-bottom -->

</div><!-- end mailview-right -->

</div><!-- end mainscreen -->

<div><!-- end minwidth --></div>

<div id="searchmenu" class="popupmenu">
	<ul class="toolbarmenu">
		<li><label><input type="checkbox" name="s_mods[]" value="subject" id="s_mod_subject" onclick="" /> <span>Subject</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="from" id="s_mod_from" onclick="" /> <span>From</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="to" id="s_mod_to" onclick="" /> <span>To</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="cc" id="s_mod_cc" onclick="" /> <span>Cc</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="bcc" id="s_mod_bcc" onclick="" /> <span>Bcc</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="body" id="s_mod_body" onclick="" /> <span>Body</span></label></li>
		<li><label><input type="checkbox" name="s_mods[]" value="text" id="s_mod_text" onclick="" /> <span>Entire message</span></label></li>
	</ul>
</div>

<div id="dragmessagemenu" class="popupmenu">
	<ul class="toolbarmenu">
		<li><a onclick="" id="rcmbtn131" href="#">Move</a></li>
		<li><a onclick="" id="rcmbtn132" href="#">Copy</a></li>
	</ul>
</div>

<div id="mailboxmenu" class="popupmenu">
	<ul class="toolbarmenu" id="mailboxoptionsmenu">
		<li><a id="rcmbtn133" href="#" onclick="">Compact</a></li>
		<li class="separator_below"><a id="rcmbtn134" href="#" onclick="">Empty</a></li>
		<li><a id="rcmbtn135" href="./?_task=settings&amp;_action=folders" class="active">Manage folders</a></li>
		
	</ul>
</div>

<div id="listselectmenu" class="popupmenu dropdown">
	<ul class="toolbarmenu iconized">
		<li><a class="icon" id="rcmbtn136" href="#" onclick=""><span class="icon mail">All</span></a></li>
		<li><a class="icon" id="rcmbtn137" href="#" onclick=""><span class="icon list">Current page</span></a></li>
		<li><a class="icon" id="rcmbtn138" href="#" onclick=""><span class="icon unread">Unread</span></a></li>
		<li><a class="icon" id="rcmbtn139" href="#" onclick=""><span class="icon flagged">Flagged</span></a></li>
		<li><a class="icon" id="rcmbtn140" href="#" onclick=""><span class="icon invert">Invert</span></a></li>
		<li><a class="icon" id="rcmbtn141" href="#" onclick=""><span class="icon cross">None</span></a></li>
	</ul>
</div>

<div id="threadselectmenu" class="popupmenu dropdown">
	<ul class="toolbarmenu">
		<li><a class="icon" id="rcmbtn142" href="#" onclick=""><span class="icon conversation">Expand All</span></a></li>
		<li><a class="icon" id="rcmbtn143" href="#" onclick=""><span class="icon conversation">Expand Unread</span></a></li>
		<li><a class="icon" id="rcmbtn144" href="#" onclick=""><span class="icon conversation">Collapse All</span></a></li>
	</ul>
</div>

<div id="listoptions" class="propform popupdialog">
	<fieldset class="floating">
		<legend>List columns</legend>
		<ul class="proplist">
			<li><label class="disabled"><input type="checkbox" name="list_col[]" value="threads" checked="checked" disabled="disabled" /> <span>Threads</span></label></li>
			<li><label class="disabled"><input type="checkbox" name="list_col[]" value="subject" checked="checked" disabled="disabled" /> <span>Subject</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="fromto" /> <span>From/To</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="from" /> <span>From</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="to" /> <span>To</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="replyto" /> <span>Reply-To</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="cc" /> <span>Cc</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="date" /> <span>Date</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="size" /> <span>Size</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="status" /> <span>Read status</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="attachment" /> <span>Attachment</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="flag" /> <span>Flag</span></label></li>
			<li><label><input type="checkbox" name="list_col[]" value="priority" /> <span>Priority</span></label></li>
		</ul>
	</fieldset>
			<fieldset class="floating">
		<legend>Sorting column</legend>
		<ul class="proplist">
			<li><label><input type="radio" name="sort_col" value="" /> <span>None</span></label></li>
			<li><label><input type="radio" name="sort_col" value="arrival" /> <span>Arrival date</span></label></li>
			<li><label><input type="radio" name="sort_col" value="date" /> <span>Sent date</span></label></li>
			<li><label><input type="radio" name="sort_col" value="subject" /> <span>Subject</span></label></li>
			<li><label><input type="radio" name="sort_col" value="fromto" /> <span>From/To</span></label></li>
			<li><label><input type="radio" name="sort_col" value="from" /> <span>From</span></label></li>
			<li><label><input type="radio" name="sort_col" value="to" /> <span>To</span></label></li>
			<li><label><input type="radio" name="sort_col" value="cc" /> <span>Cc</span></label></li>
			<li><label><input type="radio" name="sort_col" value="size" /> <span>Size</span></label></li>
		</ul>
	</fieldset>
			<fieldset class="floating">
		<legend>Sorting order</legend>
		<ul class="proplist">
			<li><label><input type="radio" name="sort_ord" value="ASC" /> <span>ascending</span></label></li>
			<li><label><input type="radio" name="sort_ord" value="DESC" /> <span>descending</span></label></li>
		</ul>
	</fieldset>
		<br style="clear:both" />
	<div class="formbuttons">
		<input id="listmenusave" type="button" class="button mainaction" onclick="" value="Save" disabled="disabled"/>
		<input id="listmenucancel" type="button" class="button" onclick="" value="Cancel" disabled="disabled"/>
	</div>
</div>



</body>
</html>