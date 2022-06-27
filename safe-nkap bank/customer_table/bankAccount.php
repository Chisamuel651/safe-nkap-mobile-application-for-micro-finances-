<?php
include "../connection.php";

$res1 = mysqli_query($link, "SELECT SUM(amount) AS deposit_sum FROM deposit");
$row1 = mysqli_fetch_assoc($res1);
$sum = $row1;
foreach ($sum as $sum) {
    print_r($sum);
}
?>
<br>
<?php

$res2 = mysqli_query($link, "SELECT SUM(amount) AS withdrawal_sum FROM withdrawal");
$row2 = mysqli_fetch_assoc($res2);
$sum2 = $row2;
foreach ($sum2 as $sum2) {
    print_r($sum2);
}
?>
<br>
<?php

$result = $sum - $sum2;
echo $result;
?>