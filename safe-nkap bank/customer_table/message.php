<?php
// include "../connection.php";
// include "sub_message.php";
session_start();
include "general.php";
include "../connection.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="message.css">
    <style>
        .wrapper {
            margin-left: 290px;
            width: 500px;
            height: 81%;
            margin-top: 60px;
        }

        .form {
            height: 80%;
        }

        .wrapper .title {
            background: #41f1b6;
            border-bottom: 1px solid #41f1b6;
        }

        .wrapper .form .inbox .icon {
            background-color: #41f1b6;
        }

        .wrapper .form .inbox .msg_header p {
            background-color: #41f1b6;
        }

        .typing_field .input_data input:focus {
            border-color: #41f1b6;
        }

        .wrapper .typing_field .input_data button {
            border: 1px solid #41f1b6;
            background-color: #41f1b6;
        }

        .wrapper .form .user_inbox .msg_header p {
            background-color: #f1f1f1;
        }

        .icon i{
            justify-content: center;
            margin-left: 12px;
            margin-top: 9px;
            font-size: 20px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    $res = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
    while ($row = mysqli_fetch_array($res)) {
        $name = $row["username"];
    }
    ?>
    <div class="wrapper">
        <div class="title">chat with chiri <?php echo $name; ?></div>

        <div class="form">
            <div class="bot_inbox inbox">
                <div class="icon">
                    <i class="fa-solid fa-user"></i>
                    <!-- font awesome icon-->
                </div>
                <div class="msg_header">
                    <p>hello dear friend how can i help you?</p>
                </div>
            </div>
        </div>

        <div class="typing_field">
            <div class="input_data">
                <input type="text" id="data" placeholder="type something....." required />
                <button id="send_btn">send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#send_btn").on("click", function() {
                $value = $("#data").val();
                // alert($value);
                $msg = '<div class="user_inbox inbox"><div class="msg_header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'sub_message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        $reply = '<div class="bot_inbox inbox"><div class="icon">user</div><div class="msg_header"><p>' + result + '</p></div></div>';
                        $(".form").append($reply);
                        // automatic movement of the scroll
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

    <?php

    ?>
</body>

</html>