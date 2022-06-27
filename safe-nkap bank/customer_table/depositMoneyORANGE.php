<?php
include "../connection.php";
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit To Account</title>
    <!-- custom css -->
    <link rel="stylesheet" href="newstyle2.css">

    <style>
        .card_holder_box {
            color: #fff;
        }
    </style>
</head>

<body>

    <?php
    $res = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
    while ($row = mysqli_fetch_array($res)) {
        $contact = $row["contact"];
        $username = $row["username"];
    }
    ?>

    <?php
    $number = rand(100, 100000);
    $t = time();
    $response = $number . $t;
    ?>


    <div class="Container">
        <div class="card_container">
            <div class="front">
                <div class="image">
                    <img src="../IMAGES/image_payment/chip.png" alt="">
                    <img src="../IMAGES/image_payment/orange.png" alt="">
                </div>
                <div class="card_number_box"><?php echo $contact; ?></div>
                <div class="card_holder_box"><?php echo $username; ?></div>
            </div>

            <div class="back">
                <div class="strip"></div>
                <div class="box">
                    <span>name</span>
                    <div class="name_box">
                        <img src="../IMAGES/image_payment/orange.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <form name="form1" method="post" action="">
            <div class="inputBox">
                <span>reference</span>
                <input type="text" value="<?php echo $response; ?>" class="card_ref_input" name="ref" id="" disabled />
            </div>

            <div class="inputBox">
                <span>amount</span>
                <input type="text" placeholder="1000" class="card_amount_input" name="amount" id="" required />
            </div>

            <div class="inputBox">
                <span>contact</span>
                <input type="text" value="<?php echo $contact; ?>" minlength="9" class="card_number_input" name="contact" id="" required />
            </div>

            <input type="submit" name="submit_confirm" class="btn2 submit_btn" value="confirm">
        </form>
    </div>

    <?php
    if (isset($_POST["submit_confirm"])) {
        $contact = $_POST["contact"];
        $response;
        $res10 = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
        while ($row10 = mysqli_fetch_assoc($res10)) {
            $agentId = $row10["id"];
        }
        $res11 = mysqli_query($link, "select * from bank_account where user_id = '$agentId'");
        while ($row11 = mysqli_fetch_assoc($res11)) {
            $accountId = $row11["id"];
        }
        $amount = $_POST["amount"];
        $res1 = mysqli_query($link, "select * from transaction where amount = '$amount' ");
        $row1 = mysqli_num_rows($res1);

        if ($amount < 1000) {
            $status = "failed";
            $motive = "demand No$response has not successfully deposited into the account";
            mysqli_query($link, "insert into transaction(id,ref,deposit,status,agentid,account_id,amount,motif,contact) values(NULL, '$response', 0, '$status','$agentId', '$accountId', '$_POST[amount]','$motive', '$contact')");
    ?>
            <div class="msg">
                <div class="signal">
                    <div class="alert alert_danger">
                        <span>amount not sufficient</span>
                    </div>
                </div>
            </div>

            <?php
        } else {

            switch ($contact) {
                case $contact >= 655000000 && $contact <= 659999999:
                    // printf('we here1');
                    $status = "pending";
                    $motive = "demand No$response has successfully made a deposit to his account";
                    mysqli_query($link, "insert into transaction(id,ref,deposit,status,agentid,account_id,amount,motif,contact) values(NULL, '$response', 0, '$status','$agentId', '$accountId', '$_POST[amount]','$motive', '$contact')");
            ?>
                    <!-- <script>
                    window.location = "../dashboard/dashboard.php";
                </script> -->
                    <div class="msg">
                        <div class="signal">
                            <div class="alert alert_success">
                                <span>deposit successful</span>
                            </div>
                        </div>
                    </div>
                <?php
                    break;
                case $contact >= 690000000 && $contact <= 699999999:

                    $status = "pending";
                    $motive = "demand No$response has successfully made a deposit to his account";
                    mysqli_query($link, "insert into transaction(id,ref,deposit,status,agentid,account_id,amount,motif,contact) values(NULL, '$response', 0, '$status','$agentId', '$accountId', '$_POST[amount]','$motive', '$contact')");
                ?>
                    <!-- <script>
                    window.location = "../dashboard/dashboard.php";
                </script> -->
                    <div class="msg">
                        <div class="signal">
                            <div class="alert alert_success">
                                <span>deposit successful</span>
                            </div>
                        </div>
                    </div>
                <?php
                    break;

                default:

                    // printf('we here333');
                ?>
                    <div class="msg">
                        <div class="signal">
                            <div class="alert alert_danger">
                                <span>invalid number</span>
                            </div>
                        </div>
                    </div>
    <?php
                    break;
            }
        }
    }
    ?>

    <script>
        document.querySelector('.card_number_input').oninput = () => {
            document.querySelector('.card_number_box').innerText = document.querySelector('.card_number_input').value;
        }

        document.querySelector('.card_name_input').oninput = () => {
            document.querySelector('.card_holder_box').innerText = document.querySelector('.card_name_input').value;
        }

        document.querySelector('.btn2').onmouseenter = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        }

        document.querySelector('.btn2').onmouseleave = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        }
    </script>
</body>

</html>