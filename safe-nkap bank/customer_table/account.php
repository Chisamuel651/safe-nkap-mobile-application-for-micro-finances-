<?php
include "../connection.php";
include "general.php";
session_start();
// echo $_SESSION["contact"];
?>

<?php
if ($_SESSION["contact"]) {
?>

    <head>
        <link rel="stylesheet" href="account.css">
    </head>

    <main>
        <?php
        $res1 = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
        while($row1 = mysqli_fetch_array($res1)){
            $id = $row1["id"];
        }
        // echo $_SESSION["address"];
        $res = mysqli_query($link, "select * from transaction where status = 'pending' && agentid = '$id'");
        // $data = mysqli_query($link,"SELECT * FROM user WHERE id='$contact' LIMIT 1");
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
        $sums = $row;
        $balance = 0;
        foreach ($sums as $sum) {
            if ($sum["deposit"] == 0) {
                $balance += $sum["amount"];
            } else {
                $balance -= $sum["amount"];
            }
        }

        // print_r($balance);
        ?>

        <?php
        $response = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]'");
        while ($row1 = mysqli_fetch_array($response)) {
            $id = $row1['id'];
            $name = $row1['username'];
        }
        ?>
        <section>
            <div class="container-x">
                <div class="wave wave1"></div>
                <div class="wave wave2"></div>
                <div class="wave wave3"></div>
                <div class="wave wave4"></div>
                <h1><?php echo $name; ?> </h1>
            </div>
        </section>

        <div class="recent_orders">
            <div class="info">
                <h2>Principal account</h2>

                <span>id: <?php echo $id; ?></span>
            </div>

            <div class="details">

                <h2><?php print_r($balance . " FCFA"); ?></h2>
            </div>
            <div class="link">
                <a href="createAccount.php" style="color: black;"><i class="fa-solid fa-greater-than"></i></a>
            </div>
        </div>
        <div class="recent_orders transaction">
            <div class="info">
                <small style="color: grey;">TRANSACTION</small>
                <br>
                <h2>Deposit To Account</h2>
                <h2>Withdraw From Account</h2>
                <h2>Historical Transactions</h2>
            </div>
            <div class="link">
                <a href="paymentOptions.php" style="color: black;">
                    <i class="fa-solid fa-greater-than"></i>
                </a>

                <a href="withdrawOptions.php" style="color: black;">
                    <i class="fa-solid fa-greater-than"></i>
                </a>

                <a href="HT.php" style="color: black;">
                    <i class="fa-solid fa-greater-than"></i>
                </a>
            </div>
        </div>
    </main>
<?php
}else{
    echo "error message";
}
?>