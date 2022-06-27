<?php
include "../connection.php";
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="newstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .select_option {
            width: 100%;
            padding: 12px 18px;
            border-radius: 5px;
            background-color: #2ec4b6;
            color: #fff;
        }

        .alert {
            padding: 20px 30px;
            /* background-color: #028090; */
            width: 50%;
            height: 40px;
            margin-left: 25%;
            margin-top: -80px;
            color: #fff;
        }
        .access_login{
            font-size: 12px;
            justify-content: center;
            text-align: center;
            margin-top: -12px;
            padding-bottom: 6px;
        }
        .access_login a{
            text-decoration: none;
            color: #2ec4b6;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="registration_container">
            <div class="registration_header">
                <h2>create account</h2>
            </div>

            <form action="" method="post" name="form1" class="form_section" id="form_section">
                <div class="general_control">
                    <div class="form_control">
                        <label>name</label>
                        <input type="text" name="name" placeholder="enter your name" id="name" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>sur-name</label>
                        <input type="text" name="sur_name" placeholder="enter your sur-name" id="sur_name" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>address</label>
                        <input type="email" name="address" placeholder="enter your email" id="email" />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>location</label>
                        <input type="text" name="location" placeholder="enter your residence" id="location" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>date of birth</label>
                        <input type="date" name="dob" id="date_of_birth" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <!-- <div class="form_control">
                        <label>place of birth</label>
                        <input type="text" placeholder="enter your place of birth" id="place_of_birth">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div> -->

                    <div class="form_control">
                        <label>contact</label>
                        <input type="contact" name="contact" placeholder="enter your name" id="contact" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>username</label>
                        <input type="text" name="username" placeholder="enter your name" id="username" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>password</label>
                        <input type="password" name="password" placeholder="enter a password" id="password_account" required />
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>re-write password</label>
                        <input type="password" name="retype_password" placeholder="retype your password" id="rewrite_password_account" required>
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>

                    <div class="form_control">
                        <label>ID card number</label>
                        <input type="number" name="IDcardNo" placeholder="enter your ID card number" id="ID_card_num" required />
                    </div>

                    <div class="form_control">
                        <select class="select_option" name="account_type" id="">
                            <option>savings</option>
                            <option>currency</option>
                        </select>
                    </div>
                </div>

                <!-- <button>NEXT</button> -->
                <input type="submit" class="btn btn_submit" name="submit_validate" value="register">
            </form>

            <div class="access_login">
                <p>already have an account? <a href="login.php">login</a></p>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST["submit_validate"])) {
        $confirm_password = $_POST["retype_password"];
        $password1 = $_POST["password"];
        $password = password_hash($password1, PASSWORD_DEFAULT);
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $username = $_POST["username"];
        $res = mysqli_query($link, "select * from user where contact = '$contact' || username ='$username'");
        $row = mysqli_num_rows($res);

        if ($password1 !== $confirm_password) {

    ?>
            <div class="container">
                <div class="signal">
                    <div class="alert alert_danger">
                        <span>password donot match</span>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($row > 0) {
        ?>
            <div class="container">
                <div class="signal">
                    <div class="alert alert_danger">
                        <span>sorry username or contact or email already exist</span>
                    </div>
                </div>
            </div>
        <?php
        } else {
            mysqli_query($link, "insert into user values(NULL, '$_POST[name]', '$_POST[sur_name]', '$_POST[address]', '$_POST[location]', '$_POST[dob]', '$_POST[contact]', '$_POST[username]', '$_POST[password]', '$_POST[retype_password]', '$_POST[IDcardNo]')");
            $res2 = mysqli_query($link, "select * from user");
            while ($row2 = mysqli_fetch_array($res2)) {
                $id = $row2["id"];
                // $acc_type = $row2["account_type"];
            }
            mysqli_query($link, "insert into bank_account values (NULL,'$id','$_POST[account_type]')");
            $res3 = mysqli_query($link, "select * from bank_account");
            while ($row3 = mysqli_fetch_array($res3)) {
                $id2 = $row2["id"];
                // $acc_type = $row2["account_type"];
            }
            $_SESSION["id"] = $id2;
        ?>
            <div class="container">
                <div class="signal">
                    <div class="alert alert_success">
                        <span>informations accepted</span>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                window.location = "login.php";
            </script>
    <?php
        }
    }
    ?>



    <!-- <script src="../javascript/script.js"></script> -->
</body>

</html>