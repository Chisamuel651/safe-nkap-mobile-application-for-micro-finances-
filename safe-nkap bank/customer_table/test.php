<?php
// include "../connection.php";
// session_start();

// $res = mysqli_query($link, "select * from otp_number where contact = '$_SESSION[contact]'");
// while ($row = mysqli_fetch_array($res)) {
//     $otp = $row["otp"];
//     $address = $row["address"];
// }
// ?>

<?php
// include phpmailer files
require '../php_mailer/Exception.php';
require '../php_mailer/PHPMailer.php';
require '../php_mailer/SMTP.php';

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


function send_otp_mail($address, $otp)
{
    // create instance of phpmailer
    $mail = new PHPMailer();

    // set mailer to use smtp
    $mail->isSMTP();

    // define smtp host
    $mail->Host = "smtp.gmail.com";

    // enable smtp authentication
    $mail->SMTPAuth = "true";

    // set type of encryption(ssl/tsl)
    $mail->SMTPSecure = "tls";

    // set port to connect to smtp
    $mail->Port = "587";

    // set gmail username
    $mail->Username = "chisamuel0306@gmail.com";

    // set gmail password
    $mail->Password = "Some123one45";

    // set email subject
    $mail->Subject = "SAFE-NKAP LOGIN";

    // set sender email
    $mail->setFrom("chisamuel0306@gmail.com");

    // enable HTML
    $mail->isHTML(true);

    // add attachment
    // $mail->addAttachment()

    // email body
    $mail->Body = "we've sent you a verification code to access your home page to pursue your activities dear customer. This is the code $otp";

    // add recipient
    $mail->addAddress("$address");

    return $mail->send();
}

?>