
<?php
/**
 * This example shows how to handle a simple contact form.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer;

if(isset($_POST['submit'])){

    $name=$_POST['name']; // Get Name value from HTML Form
    $phone=$_POST['phone'];  // Get Mobile No
    $email=$_POST['email'];  // Get Email Value
    $message=$_POST['message']; // Get Message Value
    //Create a new PHPMailer instance


    try {
    //Tell PHPMailer to use SMTP - requires a local mail server

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'cs3002.hostgator.in';        // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'email@neetadvisor.com';                     // SMTP username
    $mail->Password   = 'S99BDLg%J1V(';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('email@neetadvisor.com', 'NEET Advisor Career Solutions');
    $mail->addAddress($email, $name);       // Add a recipient          // Name is optional
    $mail->addReplyTo($email, $name);
    $mail->addCC('info@neetadvisor.com');
    $mail->addBCC('support@icsoln.com');


    $mail->isHTML(true);    
    $mail->Subject = "Contact form submitted by $name"; // This is your subject

    $mail->Body = "Hi $name, <br/> We have received the following details.<br /><br />Name: $name<br />Phone: $phone<br />Email: $email<br />Message: $message<br /><br />We will get back to you as soon as possible. In case you think we missed it, please call us at 9911203280<br /><br />Thanks<br />NEET Advisor<br />https://neetadvisor.com/";
    $mail->send();
    //header("Location: https://leopride.in/success.php");
    echo "<script>window.location = 'https://neetadvisor.com/success.php'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} <br/> Please contact info@neetadvisor.com";

    }
        
}
?>