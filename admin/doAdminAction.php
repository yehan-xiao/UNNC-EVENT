<?php
error_reporting(0);
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="logout"){
	logout();
} elseif($act=="addAdmin"){
	$mes=addAdmin();
} elseif ($act=="editAdmin") {
	$mes=editAdmin($id);
} elseif ($act=="delAdmin") {
	$mes=delAdmin($id);
} elseif ($act=="addEvent") {
	$mes=addEvent();
} elseif ($act=="editEvent") {
	$mes=editEvent($id);
} elseif ($act=="delEvent") {
	$mes=delEvent($id);
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}

?>
</body>
</html>