
<?php 
var_dump($_POST);
var_dump($_FILES);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['originalLanguage'])    &&
	isset($_POST['targetLanguage'])   &&
	isset($_FILES['form_fields']) && // ປ່ຽນເປັນ $_FILES
	isset($_POST['name'])   &&
	isset($_POST['email'])   &&
	isset($_POST['phoneNamber'])   &&
    isset($_POST['subject']) &&
    isset($_POST['text'])) {
	
	$originalLanguage = $_POST['originalLanguage'];
	$targetLanguage = $_POST['targetLanguage'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneNamber = $_POST['phoneNamber'];
	$subject = $_POST['subject'];
	$text = $_POST['text'];
	$files = $_FILES['form_fields']; // ດຶງຂໍ້ມູນໄຟລ໌ຈາກ $_FILES
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$em = "Invalid email format";
    	header("Location: index.php?error=$em");
    }

    if (empty($originalLanguage) || empty($targetLanguage) || empty($name) || empty($subject) || empty($text) ) {
    	$em = "Fill out all required entry fields";
    	header("Location: index.php?error=$em");
    }

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    $mail->isSMTP();                               
	    $mail->Host = 'smtp.gmail.com'; 
	    $mail->SMTPAuth   = true;
	    //Your Email
	    $mail->Username= 'aaop8054@gmail.com';
	    //App password
	    $mail->Password = 'ocpiocrrodwkdhoe'; 
	    $mail->SMTPSecure = "ssl";          
	    $mail->Port       = 465;                                  
	    //Recipients
	    $mail->setFrom($email, $name);   
	    // your Email
	    $mail->addAddress('aaop8054@gmail.com'); 

	    //Content
		
	    $mail->isHTML(true);                             
	    $mail->Subject = $subject;
		$mail->CharSet = 'UTF-8';
	    $mail->Body    = "

		 <div style='font-family: \"Noto Sans Lao\", sans-serif;'>
		
		
	           <h3>ສະບາຍດີບໍລິສັດ Techart ຂ້າພະເຈົ້າສົນໃຈບໍລິການແປພາສາ</h3>
			   <p><strong>ພາສາຕົ້ນສະບັບ</strong>: $originalLanguage</p>
			   <p><strong>ພາສາເປົ້າໝາຍ</strong>: $targetLanguage</p>
			
			   <p><strong>ຂ້າພະເຈົ້າຊື່</strong>: $name</p>
			   <p><strong>Email</strong>: $email</p>
			   <p><strong>ເບີໂທ</strong>: $phoneNamber</p>
			   <p><strong>Subject</strong>: $subject</p>
			   <p><strong>Message</strong>: $text</p>
			    <h3>ເມືອທ່ານເຫັນຂໍ້ຄວາມນີ້ລົບກວນຕອບກັບຂ້າພະເຈົ້າດ້ວຍ</h3>
				 </div>
	                     ";
				  // ແນບໄຟລ໌
				  $fileCount = count($files['name']);
				  for ($i = 0; $i < $fileCount; $i++) {
					  if ($files['error'][$i] === UPLOAD_ERR_OK) {
						  $mail->addAttachment($files['tmp_name'][$i], $files['name'][$i]);
					  }
				  }

	    $mail->send();
	    $sm= 'Message';
    	header("Location: index.php?success=$sm");
	} catch (Exception $e) {
	    $em = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    	header("Location: index.php?error=$em");
	}

}

