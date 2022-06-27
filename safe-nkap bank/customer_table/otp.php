<?php
include "../connection.php";
session_start();
include "test3.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .msg1 {
        text-align: center;
        margin-bottom: -110px;
        margin-top: 50px;
    }

    .signal1 {
        padding: 20px 30px;
        justify-content: center;
        color: #fff;
        background-color: #41f1b6;
        width: 50%;
        margin-left: 25%;
        opacity: 0.6;
    }
</style>

<body>

    <div class="msg1">
        <div class="signal1">
            <div class="alert1 alert_success1">
                <span>a code has been sent to your email address</span>
            </div>
        </div>
    </div>
    <div class="wrapper" style="margin-bottom: 50px;">
        <div class="registration_container">
            <div class="registration_header">
                <h2>Validate Transaction</h2>
            </div>

            <form action="" method="post" name="form1" class="form_section" id="form_section">
                <div class="form_control">
                    <label>verification number</label>
                    <input type="text" name="otp_number" placeholder="******" id="otp_number" required />
                    <i class="fa-solid fa-circle-check"></i>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <small>error message</small>
                </div>

                <input type="submit" class="btn btn_submit" name="submit_for_otp" value="confirm">
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["submit_for_otp"])) {
        $input_otp_number = $_POST["otp_number"];

        $res = mysqli_query($link, "select * from otp_number where contact = '$_SESSION[contact]'");
        while ($row = mysqli_fetch_array($res)) {
            $otp_number = $row["otp"];
            $address = $row["address"];
        }

        if ($input_otp_number === $otp_number) {
    ?>
            <script type="text/javascript">
                window.location = "../dashboard/dashboard.php";
            </script>
        <?php
        } else {
        ?>
            <div class="container">
                <div class="signal">
                    <div class="alert alert_danger">
                        <span>otp donot match</span>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        $res = mysqli_query($link, "select * from otp_number where contact = '$_SESSION[contact]'");
        while ($row = mysqli_fetch_array($res)) {
            $otp_number = $row["otp"];
            $address = $row["address"];
        }
        send_otp_mail($address, $otp_number);
    }
    ?>
</body>

</html>