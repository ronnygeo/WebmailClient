<script type="text/javascript">
function callRegister(){
window.location.href="register.php";
}

function quitdialog(){
	var r=confirm("You have items in your cart, are you sure you want to logout?");
	if (r==true)
	{
		return true;
	}
	else
	return false;
}

</script>
<?php 

function pageheader(){
	echo "<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link rel='stylesheet' type'text/css' href='styles/main.css' />";
	}
function createSQL(){
	$conn=mysql_connect("localhost","spscw","phpcw");
if(!$conn)
{
	die("Error Occured: ".mysql_error());
}

mysql_select_db("bookworld",$conn);
return $conn;
	}

function showMenu($id){
	try{
			
	}catch(Exception $e){}
	}

function siteName(){
	echo "<div id='toplogo'>
      <a href='index.php'><img src='skins/images/shakirologo.png' alt='Shakiro Webmail' /></a>
      <p></p>
    </div>";
	}

function add_date($givendate,$day=0,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d', mktime(date('h',$cd),
    date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
    date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
              }


function loginwide(){
	
		echo "<div class='fl_right' style='display:block; width:200px;text-align:center'><br />
     <form action='welcome.php' name='login' onsubmit='' style='border:1px dotted #000000; opacity:.7;' method='post'>
    Please Login!<BR />
<input type='text' name='userlogin' value='Username' /><BR />
<input type='password' name='passlogin' value='Password'/><BR /><input type='submit' value='Login!' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type='button' value='Register' onclick='callRegister();' />
    </form><br /><br />
    </div>";
	
	}
	
	function logoutpane(){
		
	$sqlcnt=createSQL();
//	$sqldt=mysql_query("SELECT sum(quantity) FROM cart WHERE userid=".$_SESSION['uid'],$sqlcnt);
//	$ctcart=mysql_fetch_array($sqldt);	
//	$count=$ctcart[0];
//	if($count==NULL)

if(empty($_SESSION['qty'])||$_SESSION['qty']==0)
	$count="</hq>No <hq>";
	else
	$count=array_sum($_SESSION['qty']);
	echo "<div id='logoutpane'>";
	echo "Hello, <hq>".$_SESSION['fname']."</hq>.. <BR /><hq>".$count."</hq> Item(s) in <a href='cart.php'><img src='images/cart.png' width='40px' alt='Cart'></a> ";
	logoutbutton();
	echo "</div>"; 
		}
	
function logoutbutton(){
	
	//$sqlcnt=createSQL();
	//$sqldt=mysql_query("SELECT * FROM cart WHERE userid=".$_SESSION['uid'],$sqlcnt);
	//$dt=mysql_fetch_array($sqldt);
	//if($dt==NULL){
	if(empty($_SESSION['cart'])){
	echo "<form action='logoff.php' name='logout'>";
	echo "<input type='submit' value='Logout' /></form>";
	}
	else
	{
	echo "<form action='logoff.php' name='logout'>";
	echo "<input type='submit' onClick='return quitdialog();' value='Logout' /></form>";
	}
		
	
	}

function restricted(){
	
	if($_SESSION['admin']==0)
{header('refresh: 2; "index.php"');
echo "<div class='abcenter'>
<h1 style='font-size:40px;color:#FF0000;'>Restricted Area..</h1><br /> You are not an administrator... <br /> You will be taken back to the homepage in 2 seconds.. </div>";
}
	}


function showFooter(){

	echo "<div id='footer'>
	<p>Copyright (c) 2012 MyBooks.Inc All rights reserved. Images from <a href='http://google.com/'>Google</a>. Design by <a href='http://www.freecsstemplates.org'>FCT</a>.</p>
</div>";	
	}
	
	
function addtocart($id,$qty){
	$index=-1;
for($i=0;$i<(sizeof($_SESSION['cart']));$i++)
{
	if($_SESSION['cart'][$i]==$id)
	$index=$i;
}

	if($index!=-1){
	$_SESSION['qty'][$index]+=$qty;
	}
	else{
	array_push($_SESSION['cart'],$id);
	array_push($_SESSION['qty'],$qty);
	}
	}
	
?>