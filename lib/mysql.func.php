<?php
error_reporting(0);
/**
 * Connect database
 * @return 
 */
function connect() {
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

	if (!$con)
	{
		die(" Could not connect: " .mysql_errno().":". mysql_error());
	}
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME) or die("Could not open database");
	return $con;
}

/**
 * Insert the record
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table, $array) {
	$keys=join(",", array_keys($array));
	$vals="'".join("','", array_values($array))."'";
	$sql = "INSERT {$table}($keys) VALUES ({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
}

//update admin set username='admin' where id = 1s
/**
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table, $array, $where=NULL) {
	$str="";
	foreach ($array as $key=>$value ){		

		if ($str==NULL) {
			$sep="";
		}else {
			$sep=",";
		}
		
		$str.=$sep.$key."='".$value."'"; //make up the format of query
		
	}
	$sql="update {$table} set {$str} ".($where==NULL?NULL:" where ".$where);
	$result=mysql_query($sql);
	if ($result){
		return mysql_affected_rows();
	}
	else {
		return false;
	}
}

/**
 * Delete records
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table, $where=NULL) {
	$where=($where==NULL?NULL:" where ".$where);
	$sql="DELETE FROM {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}

/**
 * fetch one specific data from sql
 * @param string $sql
 * @return multitype:
 */
function fetchOne($sql){
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result); 
	return $row;
}


/**
 * @param string $sql
 * @param string $result_type
 * return multitype:
 */
function fetchAll($sql){
	$result=mysql_query($sql);
	while( @$row=mysql_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

/**get the number of rows in the records
 * @param string $sql
 * @return number
 */
function getResultNum($sql) {
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}

/**Get the id of insert record
 * 
 */
function getInsertId(){
	return mysql_insert_id();
}































