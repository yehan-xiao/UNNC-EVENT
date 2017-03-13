<?php
error_reporting(0);
require_once 'include.php';
//1.receive the record from post
$eventID=intval($_POST['eventID']);

//2.prepare the data inserting into table Web_UAE
$userID=$_SESSION['userID'];



$sql="insert into Web_UAE(eID, uID) values($eventID, $userID)";
mysql_query($sql);
$rows=mysql_insert_id();

//return the final result
if($rows){

	$response = array(
		'errno' 	=> 0,
		'errmsg'	=> "Success",
		'data'      => true 

	);	
}else{
	$response = array(
		'errno' 	=> 1,
		'errmsg'	=> "Failed",
		'data'      => false 
		);
}

echo json_encode($response);

