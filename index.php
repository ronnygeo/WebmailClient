<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<?php 
require 'functions.php';
session_start();
if(isset($_SESSION['url']))
/*echo "<script>alert('Invalid Login. Try again.')</script>";*/


$email="email";
	$password="";
	$server="mail.shakilkumar.com";
	$port="143";

if(isset($_COOKIE['email'])){
	$email=$_COOKIE['email'];
$password=$_COOKIE['password'];
$server=$_COOKIE['server'];
$port=$_COOKIE['port'];

	}
?>
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">

function valFull(){
	f=0;
	 if (document. getElementById("pwd").value=="")
f=1;
if(document. getElementById("user").value=="")
f=1;
if (document. getElementById("server").value=="")
f=1;
if(document. getElementById("port").value=="")
f=1;


if(f==0)
return true;
else
return false;

	 }
</script>


<link rel="stylesheet" type="text/css" href="styles/styles.css" />

</head>

<body style="background-image:url(images/loginbg.jpg);" >



 <br class="clear" />
  <br class="clear" />


<div id="login-form">
<div class="box-inner">
<div align="center">
<img src="images/shakirologo.png" alt="Shakiro Webmail" /></div>

<?php 
if(isset($_SESSION['email']))
{
	echo "Already logged in as ".ucfirst($_SESSION['email']).".. <br /><br />";
	echo "Go back to <a href='main.php?id='>Inbox</a>.<br /><br />";
	 logoutbutton();
	}
else
{
	echo "
    <form action='process.php' name='login' method='post' onsubmit='return valFull();'>";
	echo "<br /><br /><span>Please login to your webmail.. </span><br /> <br />";

   echo "<span>Username: &nbsp; &nbsp;<input type='text' name='email' id='email' value='".$email."' /><BR /><script type='text/javascript'>
		   var user = new LiveValidation('user');
		            user.add(Validate.Length, { minimum: 5 } );
					
		          </script><br />
   Password: &nbsp; &nbsp;<input type='password' name='password' value='".$password."' id='password' /><BR /><script type='text/javascript'>
		            var pwd = new LiveValidation('pwd');
		            pwd.add(Validate.Length, { minimum: 5 } );
		          </script> <br />
   Server Address: &nbsp; <BR /><input type='text' name='server' id='server' value='".$server."' style='width:50%' /> <br />
   <script type='text/javascript'>
		            var s = new LiveValidation('server');
		            s.add(Validate.Length, { minimum: 8 } );
		          </script>
   Port: &nbsp; &nbsp;<BR /><input type='text' id='port' name='port' value='".$port."' style='width:50%' /> <br /><script type='text/javascript'>
		            var p = new LiveValidation('port');
		            p.add(Validate.Length, { minimum: 2 } );
		          </script> <br />
 
   <BR/><BR/>
   <input type='submit' value='  Login!  ' />
		</form>

    </div>
	
	</div>";
	//  Use TLS: &nbsp; &nbsp;   <input type='checkbox' name='tls' value='0' /><BR />
   //</span>
	}
?>
</div>
</div>



</body>
</html>