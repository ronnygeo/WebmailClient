<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php 
echo "<meta
http-equiv='Refresh'
content='5; url=main.php?id='/>";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logging In..</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link rel="stylesheet" type="text/css" href="styles/mail.css" />
<?php 

//header('refresh: 3; main.php');

session_start();
require 'lib/IMAPClient.php';
$flag=false;

$CheckIMAP=new IMAPClient($_POST['server'],$_POST['port'],$_POST['email'],$_POST['password']);
$CheckIMAP->imap_connect();
$flag=$CheckIMAP->Authenticate();

?>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
</head>

<body>

<div id="login-form">
<div class="box-inner">
<div align="center">

<BR />


<h2>Welcome To Shakiro Mail!</h2>

<BR />



<?php 


	if($flag)
	{
	$_SESSION['login']=1;
	$_SESSION['email']=$_POST['email'];
	$_SESSION['server']=$_POST['server'];
	$_SESSION['password']=$_POST['password'];	
	$_SESSION['port']=$_POST['port'];

//echo $_SESSION['email'];

// send a cookie that expires in 30 days

echo "Click <a href='main.php?id='>here</a> to go to your Inbox.<BR>";
echo "Click <a href='newmail.php'>here</a> to send a new email. <BR>";
echo "<p> You will be automatically redirected to the Inbox in 5 seconds..</p> <BR>";

setcookie("email",$_POST['email'], time()+3600*24*30);
setcookie("password",$_POST['password'], time()+3600*24*30);
setcookie("server",$_POST['server'], time()+3600*24*30);
setcookie("port",$_POST['port'], time()+3600*24*30);

	}
	else
	{
	echo "Invalid Login! Please try again.";
		}
?>


</div>
</div>
</div>

</body>
</html>