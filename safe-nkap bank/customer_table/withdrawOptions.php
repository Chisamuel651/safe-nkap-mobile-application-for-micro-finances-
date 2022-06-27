<?php
include "general.php";
include "../connection.php";
session_start();
?>

<?php
$res = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
}
?>

<head>
    <style>
        .img_size {
            width: 50%;
            height: 50%;
            margin-left: 45px;
            margin-top: -5px;
        }

        main .insights a>div {
            background: var(--color-white);
            /* padding: var(--card-padding); */
            padding: 2.35rem;
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
            /* width: 250px; */
        }

        .sales.mtn {
            background-color: #fac60e;
            cursor: pointer;
        }

        .sales.orange {
            cursor: pointer;
            background: #000;
        }

        .sales.moneygram {
            cursor: pointer;
            background-color: #fff;
        }

        .sales.expressunion {
            background-color: #055aaa;
            cursor: pointer;
        }
    </style>
</head>

<html>

<body>
    <main>
        <main>
            <h1>Deposit No <?php echo $id; ?></h1>

            <div class="data">
                <input type="text" class="date" value="<?php echo date('d-m-y'); ?>" disabled>
            </div>

            <div class="insights">

                <a href="withdrawMoneyMTN.php">
                    <div class="sales mtn">
                        <img src="../IMAGES/image_payment/mtn1.png" class="img_size" alt="">
                    </div>
                </a>

                <a href="withdrawalMoneyORANGE.php">
                    <div class="sales orange">
                        <img src="../IMAGES/image_payment/orange.png" class="img_size" alt="">
                    </div>
                </a>

                <a href="withdrawMoneyEU.php">
                    <div class="sales expressunion">
                        <img src="../IMAGES/image_payment/eu.png" class="img_size" alt="">
                    </div>
                </a>

                <!-- <a href="#">
                    <div class="sales moneygram">
                        <img src="../IMAGES/image_payment/MoneyGram(1).png" class="img_size" alt="">
                    </div>
                </a>

                <a href="#">
                    <div class="sales moneygram">
                        <img src="../IMAGES/image_payment/MoneyGram(1).png" class="img_size" alt="">
                    </div>
                </a>

                <a href="#">
                    <div class="sales moneygram">
                        <img src="../IMAGES/image_payment/MoneyGram(1).png" class="img_size" alt="">
                    </div>
                </a> -->

            </div>

            </div>
        </main>
</body>

</html>