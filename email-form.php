?php
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
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
 //$password = "4b7c94d485a7577af997c3d3a30b14cc";
 $password = "ovxmkpssllgyjszh";
 $headers = "From $email_from \r\n";
 $headers .= "Reply-To: $visitor_email \r\n";
 $mail = new PHPMailer(true);
 $mail->isSMTP();
 $mail->addAddress('info@stratoscoach.com');
 $mail->addAddress('stratoscoach2019@gmail.com');
 $mail->Host = 'smtp.gmail.com';
 //in-v3.mailjet.com';
 $mail->Port = 587;
 $mail->SMTPSecure = 'tls';
 $mail->SMTPAuth = true;
 $mail->IsSMTP();

 $mail->isHTML(false);
 //$mail->UserName = "25f36ce81b827089e2ead72417a6db83";
 $mail->Username = "stratoscoach2019@gmail.com";
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
