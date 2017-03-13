<?php 
error_reporting(0);
/**User sign up
 * @return string
 */
function register(){
	$arr=$_POST;
	$arr['uPassword']=md5($_POST['uPassword']);
	if(insert("Web_User", $arr)){
		$mes="Register Successfully!<br/><meta http-equiv='refresh' content='1;url=login.php'/>";
	}else{
		$mes="Failed to register!<br/><a href='register.php'>Register Again</a>|<a href='home.php'>Come Back to Home</a>";
	}
	return $mes;
}

/**User login
 * @return string
 */
function login(){
	$username=$_POST['username'];
	$password=$_POST['password'];

	$username=mysql_escape_string($username);
	$password=mysql_escape_string($password);
	$password=md5($_POST['password']);

	$sql="select * from Web_User where uName='{$username}' and uPassword='{$password}'";

	$row=fetchOne($sql);
	//echo $resNum;
	if($row){
		$_SESSION['loginFlag']=$row['uID'];
		$_SESSION['userName']=$row['uName'];
		$_SESSION['userID']=$row['uID'];
		$mes="Login Successfully!<br/><meta http-equiv='refresh' content='1;url=home.php'/>";
	}else{
		$mes="Failed to log in!<a href='login.php'>Login again!</a>";
	}
	return $mes;
}

/*User log out*/
function userOut(){
	$_SESSION=array();
	header("location:home.php");
}

/*check user whether attend event*/
function checkAttend($sql) {
	return fetchOne($sql);
}
