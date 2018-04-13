<?php
//setting the error reporting to 0 so that it would not show any error statement
error_reporting(0);

require 'connect.php';

if (isset($_POST['first'])&& isset($_POST['last']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) &&isset($_POST['re_pass'])){
	if (!empty($_POST['first'])&& !empty($_POST['last'])&& !empty($_POST['username'])&& !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['re_pass'])){
		$username=trim($_POST['username']);
		$pass=trim($_POST['pass']);
		$re_pass=$_POST['re_pass'];
		$email =trim(strtolower($_POST['email']));
		$last = $_POST['last'];
		$first = $_POST['first'];
		
		$sql="SELECT * FROM `users` WHERE username='".$user."'";
		$user_check=$db->query($sql);
		
		//checking if the username already exists 
		if(mysqli_num_rows($user_check)==0){
			
			//checking the passwords if did match or not
			if ($pass==$re_pass){
				$hash_pass=md5($pass);
				//taking the values and saving it to database
				$sql_insert="INSERT INTO `users` VALUES('','$username','$email','$hash_pass','$first','$last')";
				$db->query($sql_insert);	
				echo 'Account succesfully created!';
				header("location: login.php");
			}else{
				echo 'The passwords you entered did not match.';
			}
		}else{
			echo 'Username already exists.';
		}
	}else{
		echo 'Please fill up all the fields.';
	}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up</title>
<head>

<form action="register.php" method="post">

<table cellpadding="5" cellspacing="0">
	<tr>
		<td>First name: </td>
		<td><input type="text" name="first" size="20"></td> 	
		<td>Last Name: </td>
		<td><input type="text" name="last" size="20"></td>
	</tr>
	<tr>
		<td>Username: </td>
		<td><input type="text" name="username" size="45"></td>
	</tr>	
	<tr>	
		<td>Email: </td>
		<td><input type="email" name="email" size="45"></td>
	</tr>	
	<tr>	
		<td>Password: </td>
		<td><input type="password" name="pass" size="45" maxlength="8"></td>
	</tr>	
	<tr>	
		<td>Re-type Passowrd: </td>
		<td><input type="password" name="re_pass" size="45" maxlength="8"></td>
	</tr>	
	<tr>
		<td><input type="submit" value="Sign Up"></td>
	</tr>
</table>
</form>


</html>