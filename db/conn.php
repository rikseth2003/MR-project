<?php
error_reporting(0);

$host_name='Localhost';		
$host_username='root';
$host_password='';
$db_name='users';	//database name
$db=new mysqli($host_name,$host_username,$host_password,$db_name);

//checking for the connection error 
if ($db->connect_errno){
	die('Connection Error!');
}
?>
