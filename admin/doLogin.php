<?php
error_reporting(0);
require_once '../include.php';
$username=$_POST['username'];
$username=mysql_escape_string($username);
$password=$_POST['password'];
$password=mysql_escape_string($password);
$password=md5($_POST['password']);

$sql="select * from Web_Admin where aName = '$username' and aPassword='$password'";

$row=checkAdmin($sql);
if($row){
	$_SESSION['adminName']=$row['aName'];
	$_SESSION['adminID']=$row['aID'];
	alertMes("Login Successfully!","index.php");
}
else{
	alertMes("Failed to log in!","login.html");
}