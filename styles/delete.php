<?php 

include "lib/IMAPClient2.php";

$IMAP = new IMAPClient("mail.shakilkumar.com","143",$_SESSION["email"],$_SESSION["password"]);
	  $IMAP->imap_connect();
	  $IMAP->Authenticate($_SESSION["email"],$_SESSION["password"]);
	  $IMAP->SelectFolder("INBOX");
	  $msg=$IMAP->delete($_GET["id"]);
	  echo $_GET["id"];
	  print_r($msg);
?>