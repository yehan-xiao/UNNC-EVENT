<?php
error_reporting(0);
/*add new event*/
function addEvent(){
	$arr=$_POST;
	if(insert("Web_Event", $arr)){
		$mes="Add Successfully!<br/><a href='addEvent.php' >Add New Event</a>|<a href='listEvent.php'>See The List of Event</a>";
	}else{
		$mes="Failed to add!<br/><a href='addEvent.php' >Add Again</a>";
	}
	return $mes;
}

/**Get all events
 * @return Ambigous <multitype:, multitype:>
 */
function getAllEvent(){
	$sql="select eID, eTitle, startdt, enddt, eCapacity, eDesc, eLocation from Web_Event";
	$rows=fetchAll($sql);
	return $rows;
}

/**Edit event
 * @param int $id
 * @return string
 */
function editEvent($id){
	$arr=$_POST;
	//$arr['password']=($_POST['password']);
	if(update("Web_Event",$arr,"eID=($id)")){
		$mes="Edit Successfully!<br/><a href='listEvent.php'>See the list of event</a>";
	}
	else {
		$mes="Failed to edit!<a href='listEvent.php'>Please edit again!</a>";
	}
	return $mes;
}

/**Delete admin
 * @param int $id
 */
function delEvent($id){
	if (delete("Web_Event","eID=($id)")) {
		$mes="Delete Successfully!<br/><a href='listEvent.php'>See the list of event</a>";
	}
	else{
		$mes="Failed to delete!<a href='listEvent.php'>Please delete again!</a>";
	}
	return $mes;
}