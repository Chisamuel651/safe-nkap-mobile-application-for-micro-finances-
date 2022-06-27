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
                <h2>user account</h2>
            </div>

            <form action="" method="post" name="form1" class="form_section" id="form_section">
                <?php
                $currentContact = $_SESSION["contact"];
                $userInfo = mysqli_query($link, "select * from user where contact = '$currentContact'");
                if ($userInfo) {
                    if (mysqli_num_rows($userInfo) > 0) {
                        while ($response = mysqli_fetch_array($userInfo)) {
                            $name = $response["name"];
                            $sur_name = $response["sur_name"];
                            $address = $response["address"];
                            $location = $response["location"];
                            $dob = $response["dob"];
                            $contact = $response["contact"];
                            $username = $response["username"];
                            $password = $response["password"];
                            $rpassword = $response["retype_password"];
                            $idcard = $response["IDcardNo"];
                ?>
                            <div class="general_control">
                                <div class="form_control">
                                    <label>name</label>
                                    <input type="text" name="name" value="<?php echo $name; ?>" id="name" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>sur-name</label>
                                    <input type="text" name="sur_name" value="<?php echo $sur_name; ?>" id="sur_name" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>address</label>
                                    <input type="email" name="address" value="<?php echo $address; ?>" id="email" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>location</label>
                                    <input type="text" name="location" value="<?php echo $location; ?>" id="location" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>date of birth</label>
                                    <input type="date" value="<?php echo $dob; ?>" name="dob" id="date_of_birth" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>contact</label>
                                    <input type="contact" name="contact" value="<?php echo $contact; ?>" id="contact" disabled />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>username</label>
                                    <input type="text" name="username" value="<?php echo $username; ?>" id="username" required />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>password</label>
                                    <input type="password" name="password" value="<?php echo $password; ?>" id="password_account" disabled />
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>re-write password</label>
                                    <input type="password" name="retype_password" value="<?php echo $rpassword; ?>" id="rewrite_password_account" disabled>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <small>error message</small>
                                </div>

                                <div class="form_control">
                                    <label>ID card number</label>
                                    <input type="number" name="IDcardNo" value="<?php echo $idcard; ?>" id="ID_card_num" required />
                                </div>

                                <div class="form_control">
                                    <select class="select_option" name="account_type" id="" disabled>
                                        <option>savings</option>
                                        <option>currency</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn_submit" name="submit_validate" value="validate">
                <?php
                        }
                    }
                }
                ?>
            </form>

            <!-- <div class="access_login">
                <p>already have an account? <a href="login.php">login</a></p>
            </div> -->
        </div>
    </div>

    <?php

    if (isset($_POST["submit_validate"])) {
            // mysqli_query($link, "insert into user values(NULL, '$_POST[name]', '$_POST[sur_name]', '$_POST[address]', '$_POST[location]', '$_POST[dob]', '$_POST[contact]', '$_POST[username]', '$_POST[password]', '$_POST[retype_password]', '$_POST[IDcardNo]')");
            mysqli_query($link, "update user set name = '$_POST[name]', sur_name = '$_POST[sur_name]', address = '$_POST[address]', location = '$_POST[location]', dob = '$_POST[dob]', username = '$_POST[username]', IDcardNo = '$_POST[IDcardNo]' where contact = '$_SESSION[contact]' ");
            ?>
                <script type="text/javascript">
                    window.location = "../dashboard/dashboard.php";
                </script>
            <?php
    }
    ?>



    <!-- <script src="../javascript/script.js"></script> -->
</body>

</html>