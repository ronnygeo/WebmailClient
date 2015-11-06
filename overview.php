<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Overview</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript">

function logout(){
	window.location.href="logoff.php";
	}
	
	</script>

</head>
<?php
session_start();
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
	<?php 
			
			if(isset($_SESSION["login"]))
			{
				echo "<span class='username'>".$_SESSION["email"]."</span>
		<a class='button-logout' id='btnlogout' onclick='logout();'>Logout</a>";
			}
			?>
	</div>
</div>

<div id="topnav">
	<div id="taskbar" class="topright">
			<a class="about-link" onclick="UI.show_about(this);return false" id="btnoverview" href="#">Overview</a>
	<span class="minmodetoggle"></span>
    
    
	</div>
	<a href="main.php"><img src="images/shakirologo.png" id="toplogo" border="0" alt="Logo" onclick="" /></a>
</div>

<br style="clear:both" />
</div>




<div id="mainscreen">

<!-- toolbar -->



<div id="mailview-right" style="width:95%; margin:auto;">

<div id="mailview-top" class="uibox fullheight" style="width:100%;padding: 10px 10px 10px 10px">

<table style="margin:auto;width:70%; border-collapse:collapse; " cellpadding="5" cellspacing="2" border="1">
<tr>

<td width="100%">
<h1>Overview</h1>
<p>This project would allow users to enter their imap server details and allowing them to access their mailbox which inturn facilitates them to check new mails,compose,view stored mails frm inbox, sent items and deleted items.</p> 

<h3>Objective</h3>
<p>The Mail User Agent is intended to work with any SMTP servers and work with  POP3 gmail servers and let users read their mail and post mail messages.</p>

<p>The user agent will run within a web browser and will achieve the following operations <br/><br/>
- Browse subject and content of the messages in mail box<br/>
- Read selected mail messages<br/>
- Compose and post mail messages<br/>
- Delete selected mail messages</p>

<p>The user agent will also interact with mailbox using POP3 </p>
<p> 
- Interact with mail transport using SMTP<br/>
- Add suitable headers to posted mail messages<br/>
- They will drive SMTP and POP interactions directly using SMTP and POP commands.</p>
 
<p>The project was divided into following tasks</p>
<p>  
- Initialisation and integration<br/>
- Eliciting user and mail service details, integrating parts<br/>
- Composing and posting<br/>  
- Composing and posting of mail messages<br/>
- Handling mailbox<br/>  
- Summarising contents of mailbox<br/>
- Message retrieval and deletion<br/>  
- Retrieval and deletion of e-mail messages</p>

<img src="images/report/login.jpg" width="100%" style="margin:auto;" alt="Login" align="center" />
<p> Figure 1.0</p>
<p><h3> Getting Started</h3></p>
<p> By default the user needs to provide the full email address as the username and followed by the password below that it mandatory to provide the exact IMAP Server address and port number if TLS option is required by the main mail server.</p>
<p>The credentials are validated by passing the information to the main server via TCP connection to initiate the session.</p>
</td>
</tr>
<tr>
<td><img src="images/report/main1.jpg" width="100%" alt="Main Mailbox" />
<p> Figure 1.1</p>
<p>The next screen, after you have logged in, gives an overview of your Inbox and mail functions.  The screen consists of four main parts as follows </p>

<p><h4>- The folder list (1)<br/>
- The action bar (2)<br/>
- The application bar (3)<br/>
- The message list (4)</h4></p>

<p><h4>•The folder list (1)</h4>

The menu at the left hand side of the screen shows all the mail folders in your email account.
You will always find the first four of those: Inbox (this is where new emails arrive, by default); Drafts (this is where your draft messages are stored, see later on composing emails); Sent (messages sent by you are stored there); and Trash (for messages that you have deleted). The Trash folder will be emptied when you log out. Some of the folders are indicated in bold and carry a number in parentheses to the right of them. This indicates that these folders contain unread messages and the number tells you how many. To open a folder, click on it once. Its message list will appear shortly. </p>

<p><h4>•The action bar (2)</h4></p>

<p>This part of the screen contains a number of icons that allow you to perform different actions, depending on what is being shown in the main part of the window (4). In this example, the 7 icons have the following functions, from left to right:</p>

<p><h4>Refresh Folder</h4>: checks for new messages in the current folder <br />
<h4>Compose</h4>: creates a new email message <br />
<h4>Reply</h4>: creates a new message in reply to the currently selected one; it will be addressed to the sender of the selected message only.<br />
Reply to all: similar to Reply, but the reply will not only be addressed to the sender of the selected message but also to all of its recipients. This makes sense if the message was sent to a group of people and you want all of them to receive your answer.<br />
Forward Message: forwards the currently selected message to another person <br />
Delete: delete the currently selected message(s), that is, move them to Trash <br />
Print: print the currently selected message </p>

<p>To the right of the action bar, you can see the search field. This field allows you to search all messages in the current folder, much like a search engine on the web. Just enter your search terms and press the Return key. If you are done with your search and want to go back to the original message list, click on the little (X) symbol to the right of the search field. </p>

<p><h4>•The application bar (3)</h4></p>

<p>The settings icon at the top right of the screen give you access to choose different themes in the Shakiro mail. Finally, the logout button terminates your session. You should always logout after using Shakiro mail to make sure that nobody else using the same computer will be able to access your emails. </p>

<p><h4>•The message list (4)</h4></p>

<p>This part of the screen is displaying the list of all messages in the folder. To view a message, you have to single click on it to have it displayed at the bottom screen. Finally, you can also drag-and-drop messages to another folder. Just selected them and then drag them over to one of the folders in the folder list to the left by holding the mouse button. This also provides another way of deleting messages: just drag them into the Trash folder.</p>


</td>

</tr>
<tr>
<td>
<img src="images/report/newmail0.jpg" width="100%" alt="New Mail0" />
<p> Figure 1.2</p>
<img src="images/report/newmail.jpg" width="100%" alt="New Mail" />
<p> Figure 1.3</p>
<p><h4>The Compose Button</h4>:The user can compose a new message by clicking on the the Compose button provided on the main screen after he/she logs in to the webmail, this will open a new screen within the same window.  <p>

<p><h4>The To combo box</h4> (Figure 1.3) is where an email address in entered for the destination of a sent
email . It is important that the address is correctly typed as one incorrect keystroke of a letter or
number in this combo box will ensure an email does not reach its destination. <br />
To select an email address from an address book all that is required is a left click on the To: label
as above in (Figure 1.3)</p>

<p><h4> The Subject</h4>: message box is where a short description of what the message to be sent is about
or what it contains.</p>

<img src="images/report/newmail1.jpg" width="100%" alt="New Mail1" />
<p> Figure 1.4</p>
<p> The message box pictured above in (Figure 1.4) and is where you can type the body of your
message or letter. Some tools are provided to edit the typed messages for example the user can change font, make the text bold etc.</p>

<img src="images/report/newmail2.jpg" width="100%" alt="New Mail2" />
<p> Figure 1.5</p>

<p><h4>Send</h4> - When you are ready for an email to be sent click on the send button and the email will be
delivered.</p>

<p><h4>Dispose</h4> - A click on this button will clear all that is currently being created and return back to the
Inbox, there is no way to return back to message you were working on so be careful when using the
Cancel button.</p>

<img src="images/report/inbox1.jpg" width="100%" alt="New Mail2" />
<p> Figure 2.0</p>
<p><h4> Receiving and Viewing Email Messages </h4></p>
<p>Receiving emails and reading emails is a relatively simple task using Shakiro Webmail,
after an email account has been configured for use, a simple log in as discussed earlier is all that is
required for a receive of all emails. After logging into an email account all email addresses that are
configured will be ready for viewing at any time a left button mouse clicking on the inbox will display
all received emails. An email check can also be made by clicking on the refresh button shown above in(Figure 2.0). 
The mails selected on the right side window will display the content of the mail at the bottom of the same screen.  </p>

<p><h4> Reply Button </h4></p>
<p> To reply to a sender the user can select the mail to which they would like to reply by single clicking on the mail and then click on reply button provided on the toolbar or reply by right clicking on the mail from the mail content display window it can be opened by clicking on the mail.</p>

<p><h4> Forward Button </h4></p>
<p> Similarly Forward Button can be used to forward the received mails from the inbox either by clicking the forward button provided above or by right clicking on the mail from mail content display window it can be opened by clicking on the mail.</p> 

<p><h4> Delete Button </h4></p>
<p> When a message is selected or highlighted by single click from the inbox view and clicked on delete button the mail is moved from the inbox folder to the trash folder.  Multiple mails can be deleted by selecting multiple mails using shift and down arrow for continuous selection or ctrl and single click for random selection of  mails and click on the delete button to continuous the deletion.  The mails that are moved to the trash folder after deletion will be retained in the folder until such time the user right clicks on the trash folder and selects the option to empty deleted items. </p>

<p><h4> Print Button </h4></p>
<p> When a message is selected or highlighted by single click from the inbox view and clicked on Print button the mail is sent to the printer for printing. For printing Multiple mails can be done using shift and down arrow for continuous selection or ctrl and single click for random selection of  mails and click on the print button to continuous the deletion.  The mails are sent to the print spool for printing them. </p>

<br />
<p><h3> Main Left Hand Side Panel</h3></p>
<p><h4> Inbox, Drafts and Sent Folder</h4></p>

<p> Contained in this side window called Folders you will find organisation or storage folders for
your mail. Typically this section on a new mail box will contain Contacts, Drafts, Inbox and Sent
Items folders.  The received messages and new incoming messages are stored in the inbox. The Drafts folder stores all the new messages that are composed by the user and saved. The emails which are sent by the users are stored in this folder after the mails are been dispatched from the outbox. In all these folders the user is allowed to sort them according to from address, received date, subject and mail size, etc    </p>

<p><h4> Trash Folder </h4></p>
<p> When a message is deleted from any of the storage folders ( eg. Inbox, Drafts and Sent folders) it is then moved to the Trash folder and retained for 7 days and then deleted permanentely otherwise the user as the option to right click on the trash folder and then select the option to empty the contents of the trash folder </p>



<p><h3> Main Top Right Utility buttons</h3></p><br /> 
<img src="images/report/logout1.jpg" width="100%" alt="logout1" />
<p> Figure 3.0</p><br />

<p><h4> Themes </h4></p>
<p> There are few pre-defined styling skins are available to user by drop down list selection is available. The user can apply the selected theme by clicking on it and the same theme will be applied each time the user logs in until the change is initiated by the user.   </p>

<p><h4> Overview </h4></p>
<p> The user can review the available features and options that are provided the Shakiro webmail system along with some basic operational manual. </p>

<p><h4> Search Option </h4></p>
<p> The user can search for any mails that are stored in the storage folders (Inbox and Sent) by providing any keyword or and email address as there search criteria, the results for the search will be displayed on the message list window below. </p> 

<p><h4> Logout </h4></p>
<p> when the user is done with the webmail activities, they can logout from the interface by clicking on the logout button as shown in (figure 3.0) </p>


</td>
</tr>


<tr>
<td>
<p>This project was created by:
<h4>Kirrubananthan Sunderam - Ronny George Mathew - Shakilkumar</h4></p>
<p>All the pages are validated by w3c.</p>
</td>
</tr>

</table>





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