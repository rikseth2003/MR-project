<?php
error_reporting(0);

$localhost="localhost";
$user="user";
$pass="";
$bd_name="users";

mysql_db=new mysqli($localhost,$user,$pass,$db_name);

if(mysql_db->error_no){
	
die("sorry cannot connect to server");

}
?>