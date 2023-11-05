<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'servxph@gmail.com';


  
   $to = $receiving_email_address;
  $name = $_POST['name'];
  $frmemail = $_POST['email'];
  $subject = $_POST['subject'];

  $messageTxt = $_POST['message'];



$message = "
<html>
<head>
<title>Contact</title>
</head>
<body style='background:#BABABA;border: 1px solid green;border-radius: 5px; height: 200px;'>
<p style='color:white;'>$messageTxt</p>
</body>
</html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:'.'<'.$frmemail.'>'. "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
    
    echo'Successfully sent !';
    sleep(3);
echo"<script type=\"text/javascript\">window.location.href='http://servxpos.com'</script>";
} else{
    echo'Something went wrong !!';
}
  


?>
