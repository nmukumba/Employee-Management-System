<?php

include('DB.php');
$db = new DB();
$db->connect();

//get all active contracts
$db->select('contracts','*', null, "status = 'Active'");
$result = $db->getResult();

foreach ($result as $row){ 
	$today = strtotime(date("Y-m-d"));
	$endDate = strtotime($row['end_date']);

	if($endDate == $today){
		//update contract status
		$db->update('contracts', array('status' => 'Ended'), 'id = ' . $row['id']);
		$db->update('employees', array('status' => 'Ended'), 'id = ' . $row['employee_id']);
	}
}