<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

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


</body>
</html>
