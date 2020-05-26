<?php

include('DB.php');
$db = new DB();
$db->connect();

//get all active contracts
$db->select('employees','*', null, "status = 'Terminated' OR status = 'Resigned' OR status = 'Ended'");
$result = $db->getResult();

foreach ($result as $row){ 
	$today = strtotime(date("Y-m-d"));
	$updated_at = strtotime($row['updated_at']);

	$diff = ($today - $updated_at) / (60*60*24);

	if($diff == 14){
		//update contract status
		$db->update('employees', array('is_deleted' => 1), 'id = ' . $row['id']);
	}
}