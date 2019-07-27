<?php
    require "vendor/autoload.php";
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['msg'];
    $phone = $_POST['phone'];  
?>

<?php

    $email_from = 'stratoscoach2019@gmail.com';
    $email_subject = 'New Form Submission';
    $email_body = "You have received a new message from $name.\n
    Name: $name
    Phone: $phone
    email: $visitor_email
    message: $message "
?>

<?php 
 $password = "ouesqykfjznywjvc";
 
 $headers = "From $email_from \r\n";
 $headers .= "Reply-To: $visitor_email \r\n";
 $mail = new PHPMailer(true);
 $mail->isSMTP();
 $mail->addAddress('info@stratoscoach.com');
 $mail->addAddress('tdean1991@gmail.com');
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPSecure = 'tls';
 $mail->STMPAuth = true;
 $mail->IsSMTP();
 
 $mail->isHTML(false);
 $mail->UserName = $email_from;
 $mail->setFrom($email_from);
 $mail->Password = $password;
 $mail->Subject = $email_subject;
 $mail->Body = $email_body;
 $mail->SMTPDebug = 2;
 if (!$mail->send()) {
     $error = "Mailer Error: " . $mail->ErrorInfo;
     echo '<p id="para">'.$error.'</p>';
 } else {
     echo '<p id="para">Message sent!</p>';
 }

 
?>

<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>