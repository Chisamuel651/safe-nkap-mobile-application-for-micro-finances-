<?php
include "../connection.php";
include "general.php";
// #363949
session_start();


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <link rel="stylesheet" href="../dashboard/dashboard.php">
    <style>
        body.active {
            background-color: #363949;
        }

        input {
            background-color: #fff;
            position: relative;
            width: 4rem;
            height: 2rem;
            border: none;
            outline: none;
            box-shadow: 2px 2px 4px #cbced1,
                -2px -2px 4px #ffffff,
                inset 5px 5px 5px #cbced1,
                inset -5px -5px 5px #ffffff;
            -webkit-appearance: none;
            border-radius: 3rem;
            cursor: pointer;
        }

        input::before {
            content: '';
            position: absolute;
            width: 2rem;
            background-color: #000;
            height: 100%;
            border-radius: 50%;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1),
                -2px -2px 4px rgba(0, 0, 0, 0.1);
            transition: 0.5s;
        }

        input:checked:before {
            transform: translateX(2rem);
        }

        input::after {
            content: '';
            position: absolute;
            width: 0.6rem;
            height: 0.6rem;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1),
                -2px -2px 4px rgba(0, 0, 0, 0.1);
            top: 0;
            bottom: 0;
            left: 0.6rem;
            margin: auto;
            transition: 0.9s;
        }

        input:checked:after {
            left: 2.8rem;
            width: 0.5rem;
            height: 1rem;
            border-radius: 3rem;
        }

        .darkmode {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .recent_orders {
            background: var(--color-white);
            width: 100%;
            border-radius: var(--card-border-radius);
            padding: 15px 30px;
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
            display: flex;
            margin-bottom: -22px;
            height: 10%;
        }

        .recent_orders.active {
            background: #363949;
            border: 1px solid #fff;
            box-shadow: none;
        }

        .title {
            font-size: 20px;
        }

        span.title.active {
            color: #fff;
        }

        section {
            height: 20vh;
        }

        .personal_info .link a i {
            margin-left: 250px;
            line-height: 5px;
        }

    </style>
</head>

<body>
    <main>
        <?php
        $response = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
        while ($row1 = mysqli_fetch_array($response)) {
            $id = $row1['id'];
            $name = $row1['username'];
        }
        ?>
        <section>
            <div class="container-x">
                <h1><?php echo $name; ?> </h1>
            </div>
        </section>
        <div class="darkmode recent_orders">
            <span class="title">change theme of your site</span>
            <input type="checkbox" class="toggle" id="mode_btn">
        </div>



        <div class="recent_orders personal_info">
            <div class="info">
                <h2>personal informations</h2>
            </div>
            <div class="link">
                <a href="modifyUserInfo.php" style="color: black;">
                    <i class="fa-solid fa-greater-than"></i>
                </a>
            </div>
        </div>
    </main>

    <?php
    // include "general_footer.php";
    ?>

    <script>
        const body = document.querySelector('body');
        const toggleBtn = document.getElementById('mode_btn');
        const appName = document.querySelector('.app_name');
        const sideBars = document.getElementById('title');
        const sideBars1 = document.getElementById('title1');
        const sideBars2 = document.getElementById('title2');
        const sideBars3 = document.getElementById('title3');
        const sideBars4 = document.getElementById('title4');
        const sideBars5 = document.getElementById('title5');
        const title = document.querySelector('span.title');
        const h2 = document.querySelector('h2.title');
        const box = document.querySelector('.recent_orders');
        const update = document.querySelector('.recent_updates .update');
        const textP = document.querySelector('.message p');
        const textP2 = document.querySelector('.message2 p');
        const textP3 = document.querySelector('.message3 p');
        const textP4 = document.querySelector('.info p');
        const textSmall = document.querySelector('.message small');
        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('active');
            appName.classList.toggle('active');
            sideBars.classList.toggle('active');
            sideBars1.classList.toggle('active');
            sideBars2.classList.toggle('active');
            sideBars3.classList.toggle('active');
            sideBars4.classList.toggle('active');
            sideBars5.classList.toggle('active');
            title.classList.toggle('active');
            box.classList.toggle('active');
            h2.classList.toggle('active');
            update.classList.toggle('active');
            textP.classList.toggle('active');
            textP2.classList.toggle('active');
            textP3.classList.toggle('active');
            textSmall.classList.toggle('active');
            textP4.classList.toggle('active');

        });

    </script>
</body>


</html>