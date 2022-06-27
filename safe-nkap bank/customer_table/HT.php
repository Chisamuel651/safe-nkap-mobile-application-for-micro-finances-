<?php
include "../connection.php";
include "general.php";
session_start();
?>
<style>
    .icon {
        padding: 8px 10px;
        /* background: red; */
        border-radius: 50%;
        background: #2dc653;
        color: green;
    }

    .icon2 {
        padding: 8px 10px;
        /* background: red; */
        border-radius: 50%;
        background: grey;
        color: black;
    }

    .icon3 {
        padding: 8px 10px;
        /* background: red; */
        border-radius: 50%;
        background: #e71d36;
        color: red;
    }

    main table tbody td {
        height: 2.8rem;
        border-bottom: 1px solid var(--color-light);
        color: var(--color-dark-variant);
        width: calc(100%/4);
        font-size: 11px;
    }
</style>
<main>
    <div class="recent_orders">
        <h2>Historical Transactions</h2>

        <table>

            <tbody>
                <?php
                $res = mysqli_query($link, "select * from transaction where contact = '$_SESSION[contact]' order by created_at asc");
                $row1 = mysqli_num_rows($res);

                if($row1 > 0)
                // while ($row = mysqli_fetch_array($res))
                {
                    while ($row = mysqli_fetch_array($res)){
                    echo "<tr>";

                    echo "<td>";
                    echo $row["created_at"];
                    echo "</td>";

                    echo "<td>";
                    switch ($row["status"]) {
                        case 'pending':
                            if ($row["deposit"] == 0) {
                                echo "<i class='fa-solid fa-arrow-down icon'></i>";
                            } else {
                                echo "<i class='fa-solid fa-arrow-up icon2'></i>";
                            }
                            break;

                        case 'failed':
                            echo "<i class='fa-solid fa-minus icon2'></i>";
                            break;
                        default:
                            echo "<i class='fa-solid fa-minus icon2'></i>";
                            break;
                        }
                    echo "</td>";

                    echo "<td>";
                    echo $row["motif"];
                    echo "</td>";

                    echo "<td>";
                    switch ($row["deposit"]) {
                        case $row["deposit"] = 0:
                            $result = "+" . $row["amount"];
                            echo $result;
                            break;

                        case $row["deposit"] = 1:
                            $result = "-" . $row["amount"];
                            echo $result;
                            break;
                    }
                    echo "</td>";

                    echo "</tr>";
                }
                }
                else{
                    echo "<td style = 'font-size: 20px;'>";
                        echo "no transaction has been proceeded yet";
                    echo "</td>";
                }
                ?>
            </tbody>
        </table>
        <!-- <a href="#">Show All</a> -->
    </div>
</main>
</body>

</html>