<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include('DB.php');
$db = new DB();
$db->connect();

$db->select('employees',"employees.*", null, "status = 'Active' AND MONTH(dob) = MONTH(NOW()) AND DAY(dob) = DAY(NOW())");
$result = $db->getResult();

foreach ($result as $row){ 
	$today = strtotime(date("Y-m-d"));
	$dob = strtotime($row['dob']);

	$difference = $today - $dob;

	$age = floor($difference / 31556926);

	if ($age == 64) {
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    //$mail->SMTPDebug = 3;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'mail.contitouch.co.zw';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'user1@contitouch.co.zw';                     // SMTP username
		    $mail->Password   = 'contitouch';                               // SMTP password
		    //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 25;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('user1@contitouch.co.zw', 'Mailer');
		    $mail->addAddress('norest.mukumba@contitouch.co.zw', 'Joe User');     // Add a recipient
		    $mail->addAddress('norestmukumba@gmail.com');               // Name is optional
		    $mail->addReplyTo('user1@contitouch.co.zw', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Retirement Reminder';
		    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}