<?php
error_reporting(0);
require_once 'include.php';

$username=$_POST['uName'];

$sql="select * from Web_User where uName = '$username' ";

	if (getResultNum($sql)==0){
		echo "true";
	}
	else{
		echo "false";
	}



