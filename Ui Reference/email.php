<?php
ini_set('SMTP', "server.com");
ini_set('smtp_port', "25");
ini_set('sendmail_from', "tanaya.surve@somaiya.edu");
$to = 'tanaya.surve221098@gmail.com';
$subject = 'Marriage Proposal';
$message = 'Hi Jane, will you marry me?'; 
// $from = 'tanaya.surve@somaiya.edu';
 
// Sending email
if(mail($to, $subject, $message)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>