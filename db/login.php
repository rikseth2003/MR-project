<?php
//setting the error reporting to 0 so that it would not show any error statement
//error_reporting(0);

require 'connect.php';

if (isset($_POST['email'])&& isset($_POST['pass'])){
	
	$email=trim(strtolower($_POST['email']));
	$pass=trim($_POST['pass']);
	$hashed_pass=md5($pass);
	
	if (!empty($_POST['email'])&& !empty($_POST['pass'])){
		$sql="SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$hashed_pass."' LIMIT 1";
		$result=$db->query($sql);
		$select="SELECT `username` FROM `users`	WHERE `email`='".$email."'";
		$user_select=$db->query($select);
		$userrow=mysqli_fetch_assoc($user_select);
		$user=$userrow['username'];
		
		
		if(mysqli_num_rows($result)==1){
			//starting the session if the user successfully logs in
			session_start();
			$_SESSION['username']=$user;
			$_SESSION['email']=$email;
			
			//redirecting the user to the index page
			header("location: ../index.php");
		}else{
			echo 'Wrong username/ password.';
		}
	}else{
		echo 'Please fill up all the fields.';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../css/accounts.css" rel="stylesheet" type="text/css"/>
<title>Login</title>
<head>
<form action="login.php" method="post">
<div id="login">
<div id="head">
<h1>CHAT HUB</h1>
</div>
<div id="div-content">

Email : <input type="text" name="email" size="25">
Password : <input type="password" name="pass" size="25" maxlength="8">

<input type="submit" value="Login" id="logbtn">
</div>
</div>
</form>

</html>