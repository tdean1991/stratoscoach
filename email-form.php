<?php
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
    message: $message"
?>

<?php require 'PHPMailerAutoLoad.php'
 $password = 'vwcbqtmxquzgkcqg';
 $to = "info@stratoscoach.com, tdean1991@gmail.com";
 $headers = "From $email_from \r\n";
 $headers .= "Reply-To: $visitor_email \r\n";
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPSecure = 'tls';
 $mail->UserName = $email_from;
 $mail->Password = $password;
 $mail->addAddress = $to;
 $mail->Subject = $email_subject;
 $mail->msgHTML = $email_body;
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