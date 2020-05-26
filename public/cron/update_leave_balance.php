<?php

include('DB.php');
$db = new DB();
$db->connect();

//get all active contracts
$db->select('contracts','*', null, "status = 'Active'");
$result = $db->getResult();

foreach ($result as $row){ 
	$today = strtotime(date("Y-m-d"));
	$startDate = strtotime($row['start_date']);
	$diff = ($today - $startDate) / (60*60*24);
	if($diff % 30 == 0){
		$db->select('employees','leave_balance', null, "id = " . $row['employee_id']);
		$result = $db->getResult();
		$leave_balance = $result[0]['leave_balance'] + 1.99;
		//update employee leave balance
		$db->update('employees', array('leave_balance' => $leave_balance), 'id = ' . $row['employee_id']);
		
	}
}
