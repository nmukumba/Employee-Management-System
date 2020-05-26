<?php

include('DB.php');
$db = new DB();
$db->connect();

$db->select('employees',"employees.*, contact_details.phone", 'INNER JOIN contact_details on employees.id = contact_details.employee_id', "status = 'Active' AND MONTH(dob) = MONTH(NOW()) AND DAY(dob) = DAY(NOW())");
$result = $db->getResult();

foreach ($result as $row){ 
	$today = strtotime(date("Y-m-d"));
	$dob = strtotime($row['dob']);

	$difference = $today - $dob;

	$age = floor($difference / 31556926);

	$msg = urlencode("Contitouch Technologies wishes a Happy birthday filled with joy. Enjoy your day " . $row['name'] . ".");

	$cell = '263'. (int)$row['phone'];

	$sender = urlencode("Contitouch");

	$user = urlencode('hrsystem');

	$pass = urlencode('$hr_system123');


	//send SMS via ContiSMS gateway

	$url = "https://sms.contitouch.co.zw/api.json?cmd=send&username=". $user . "&password=". $pass. "&senderid=". $sender . "&gsm=". $cell ."&msg=". $msg;

	//logging

	file_put_contents($_SERVER['DOCUMENT_ROOT']."/OutgoingSMS.txt", date('Y-m-d H:i'). '- '.$url .PHP_EOL, FILE_APPEND);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$data = curl_exec($ch);

	//curl_close($ch);

	//Print the data out onto the page.
	if (!$data) {
	    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	} else {
		echo $data;
		//var_dump($data);
	}
	 
	//Close the cURL handle.
	curl_close($ch);
	 

}