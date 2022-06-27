

<?php
    //define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

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
    $mail->Subject = "this is the code for authentification go to your site and write these";

    // set sender email
    $mail->setFrom("chisamuel0306@gmail.com");

    // enable HTML
    $mail->isHTML(true);

    // add attachment
    // $mail->addAttachment()

    // email body
    $mail->Body = "this is just a text";

    // add recipient
    $mail->addAddress("chijoe0306@gmail.com");

    // finally send address
    if ($mail->send()) {
        echo "email sent";
    }else{
        echo "error";
    }

    // close smtp connection
    $mail->smtpClose();
?>
