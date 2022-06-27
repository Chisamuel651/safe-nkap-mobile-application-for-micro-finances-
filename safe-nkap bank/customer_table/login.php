<?php
session_start();
include "../connection.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="newstyle.css">
    <style>
        .access_login {
            font-size: 12px;
            justify-content: center;
            text-align: center;
            margin-top: -12px;
            padding-bottom: 6px;
        }

        .access_login a {
            text-decoration: none;
            color: #2ec4b6;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="registration_container">
            <div class="registration_header">
                <h2>login</h2>
            </div>

            <form action="" method="post" name="form1" class="form_section" id="form_section">
                <div class="form_control">
                    <label>contact</label>
                    <input type="text" name="contact" placeholder="enter your number" id="contact" required />
                </div>

                <div class="form_control">
                    <label>password</label>
                    <input type="password" name="password" placeholder="enter your password" id="password" required />
                </div>

                <input type="submit" class="btn btn_submit" name="submit_validate" value="login">
            </form>

            <div class="access_login">
                <p>already have an account? <a href="registration.php">register here</a></p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["submit_validate"])) {
        $res = mysqli_query($link, "select * from user where contact = '$_POST[contact]' && password = '$_POST[password]'");
        $row = mysqli_fetch_all($res);
        $count = mysqli_num_rows($res);

        if ($count == 0) {
    ?>
            <div class="container">
                <div class="signal">
                    <div class="alert alert_danger">
                        <span>contact or password incorrect</span>
                    </div>
                </div>
            </div>
    <?php
        } else {
            // $_SESSION["address"] = $_POST["contact"];
            $_SESSION["contact"] = $_POST["contact"];
            
            // obtain otp number
            $genInfo = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
            while($genRow = mysqli_fetch_array($genInfo)){
                $id = $genRow["id"];
                $email = $genRow["address"];
                $contact = $genRow["contact"];
            }

            $otp_number = rand(100000, 999999);

            mysqli_query($link, "insert into otp_number(id,user_id,address,contact,otp) values (NULL,'$id','$email','$contact','$otp_number')");

        ?>
            <script type="text/javascript">
                window.location = "otp_verification.php";
            </script>
    <?php
        }
    }
    ?>
</body>

</html>