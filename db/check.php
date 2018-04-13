<?php
//setting the error reporting to 0 so that it would not show any error statement
error_reporting(0);
session_start();

//checking if the user is signed in 
if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){
	header("location: db/accounts.php");
}
?>
