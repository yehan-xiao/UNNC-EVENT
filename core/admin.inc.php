<?php
error_reporting(0);
/**
 * check whether exists this Admin
 * @param unknown $sql
 * @return multitype:
 */
function checkAdmin($sql) {
	return fetchOne($sql);	
}
/**
 * check whether Admin has loged in
 * 
 */
function checkIsLogin() {
	if($_SESSION['adminID']==""){
		alertMes("Please log in", "login.html");
	}
}

/**
 * Admin Log Out
 */
function logout(){
	$_SESSION=array();
	header("location:login.html");
}

/**Add admin
 * @return string
 */
function addAdmin(){
	$arr=$_POST;
	$arr['aPassword']=md5($_POST['aPassword']);
	if(insert("Web_Admin", $arr)){
		$mes="Add Successfully!<br/><a href='addAdmin.php' >Add New Admin</a>|<a href='listAdmin.php'>See The List of Admin</a>";
	}else{
		$mes="Failed to add!<br/><a href='addAdmin.php' >Add Again</a>";
	}
	return $mes;
}


/**Get all admins
 * @return Ambigous <multitype:, multitype:>
 */
function getAllAdmin(){
	$sql="select aID, aName, aPhoneNumber, aEmail from Web_Admin";
	$rows=fetchAll($sql);
	return $rows;
}

/**Edit admin
 * @param int $id
 * @return string
 */
function editAdmin($id){
	$arr=$_POST;
	$arr['aPassword']=($_POST['aPassword']);
	if(update("Web_Admin",$arr,"aID=($id)")){
		$mes="Edit Successfully!<br/><a href='listAdmin.php'>See the list of admin</a>";
	}
	else {
		$mes="Failed to edit!<a href='listAdmin.php'>Please edit again!</a>";
	}
	return $mes;
}

/**Delete admin
 * @param int $id
 */
function delAdmin($id){
	if (delete("Web_Admin","aID={$id}")) {
		$mes="Delete Successfully!<br/><a href='listAdmin.php'>See the list of admin</a>";
	}
	else{
		$mes="Failed to delete!<a href='listAdmin.php'>Please delete again!</a>";
	}
	return $mes;
}









