<?php 
session_start();
header('Location: index.php');
    $_SESSION = array();
	session_destroy();
echo "Logged out successfully";
?>


