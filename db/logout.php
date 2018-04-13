<?php
session_start();

//unsetting the session 
unset($_SESSION['username']);

//redirecting the user to the to the login page
header("location: login.php");

?>