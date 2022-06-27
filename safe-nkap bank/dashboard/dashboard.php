<?php
session_start();
include "../connection.php";
// echo $_SESSION["contact"];
?>

<?php
if (isset($_SESSION["contact"])) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard for database administrators</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css -->
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="message.css">
        <style>

            main .data input.date {
                background: transparent;
                color: var(--color-dark);
                padding: 0.5rem 1.6rem;
            }

            .right {
                margin-top: 1.4rem;
            }

            .right .top {
                display: flex;
                justify-content: end;
                gap: 2rem;
            }

            .right .top button {
                display: none;
            }

            .right .theme_toogler {
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 1.6rem;
                width: 4.2rem;
                cursor: pointer;
                color: #7380ec;
                display: none;
            }

            .right .top .profile {
                display: flex;
                gap: 2rem;
                text-align: right;
            }

            .right .recent_updates {
                margin-top: 1rem;
            }

            .right .recent_updates h2 {
                margin-bottom: 0.8rem;
            }

            .right .recent_updates .update {
                background: #fff;
                padding: 1.8rem;
                border-radius: 0.4rem;
                box-shadow: 0 2rem 3rem rgba(132, 139, 200, 0.18);
                transition: all 300ms ease;
            }

            .right .recent_updates .update:hover {
                box-shadow: none;
            }

            .right .recent_updates .update .updates {
                display: grid;
                grid-template-columns: 2.6rem auto;
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .name {
                line-height: 40px;
            }

            .profile1 {
                width: 2.8rem;
                height: 2.8rem;
                border-radius: 50%;
                /* overflow: hidden; */
                font-size: 18px;
                border: 1px solid #111;
                text-align: center;
                justify-content: center;
                align-items: center;
            }

            .profile1 i {
                justify-content: center;
                margin-left: -1px;
                margin-top: 5px;
                font-size: 20px;
            }
            aside .logo img {
                width: 3.4rem;
                height: 3.4rem;
                margin-top: -12px;
            }

        </style>
        <!-- font awesome cdnjs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="../dashboard/images/safe-nkap.png" class="img_logo" alt="">
                        <h2>Safe<span class="danger">-Nkap</span></h2>
                    </div>

                    <div class="close" id="close_btn">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <div class="siderbar">
                    <a href="../dashboard/dashboard.php">
                        <i class="fas fa-th-large"></i>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="../customer_table/account.php" class="active">
                        <i class="far fa-user"></i>
                        <h3>Account</h3>
                    </a>

                    <!-- <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <h3>Account</h3>
                </a> -->

                    <!-- <a href="#">
                    <i class="fas fa-chart-line"></i>
                    <h3>Analytics</h3>
                </a> -->

                    <a href="../customer_table/message.php">
                        <i class="far fa-envelope"></i>
                        <h3>Chiri</h3>
                        <span class="message_count">30</span>
                    </a>

                    <!-- <a href="#">
                    <i class="fas fa-truck-moving"></i>
                    <h3>Products</h3>
                </a> -->

                    <a href="#">
                        <i class="fas fa-exclamation"></i>
                        <h3>Reports</h3>
                    </a>

                    <a href="../customer_table/darkMode.php">
                        <i class="fas fa-cog"></i>
                        <h3>Settings</h3>
                    </a>

                    <a href="../customer_table/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <h3>Log Out</h3>
                    </a>
                </div>
            </aside>
            <!-- aside section ends here -->

            <main>
                <h1>Dashboard</h1>

                <div class="data">
                    <input type="text" class="date" value="<?php echo date('d-m-y'); ?>" disabled>
                </div>

                <div class="insights">
                    <!-- begin of sales -->
                    <div class="sales">
                        <i class="fas fa-chart-pie"></i>

                        <div class="middle">
                            <div class="left">
                                <h3>Account Deposit</h3>
                                <h1>25,000 FCFA</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>81%</p>
                                </div>
                            </div>
                        </div>

                        <!-- <small class="text_muted">Last 24 hours</small> -->
                    </div>

                    <!-- begin of expenses -->
                    <div class="expenses">
                        <i class="fas fa-chart-bar"></i>

                        <div class="middle">
                            <div class="left">
                                <h3>Account Retrival</h3>
                                <h1>342,600 FCFA</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>61.23%</p>
                                </div>
                            </div>
                        </div>

                        <!-- <small class="text_muted">Last 24 hours</small> -->
                    </div>

                    <!-- begin of income -->
                    <div class="income">
                        <i class="far fa-money-bill-alt"></i>

                        <div class="middle">
                            <div class="left">
                                <h3>Account Balance</h3>
                                <h1>129,000 FCFA</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>42%</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </main>
            <!-- main section ends here -->

            <div class="right">
                <div class="top">
                    <button id="menu_btn">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="profile">
                        <div class="info">
                            <?php
                            $name = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]' ");
                            while ($row = mysqli_fetch_array($name)) {
                                $fullname = $row["username"];
                            }
                            ?>
                            <p class="name"><?php echo $fullname ?></p>
                            <!-- <small class="text_muted">Admin</small> -->
                        </div>
                        <div class="profile1">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                <div class="recent_updates">
                    <h2>recent updates</h2>
                    <div class="update">

                        <div class="updates">
                            <div class="profile1">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="message">
                                <p><b>chi samuel</b> received order of night lion N-tec labs</p>
                                <small class="text_muted">2 minutes ago</small>
                            </div>
                        </div>

                        <div class="updates">
                            <div class="profile1">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="message">
                                <p><b>chi samuel</b> received order of night lion N-tec labs</p>
                                <small class="text_muted">2 minutes ago</small>
                            </div>
                        </div>

                        <div class="updates">
                            <div class="profile1">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="message">
                                <p><b>chi samuel</b> received order of night lion N-tec labs</p>
                                <small class="text_muted">2 minutes ago</small>
                            </div>
                        </div>

                        <div class="updates">
                            <div class="profile1">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="message">
                                <p><b>chi samuel</b> received order of night lion N-tec labs</p>
                                <small class="text_muted">2 minutes ago</small>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $ans = mysqli_query($link, "select * from user");
                while ($rowAns = mysqli_fetch_array($ans)) {
                    $name = $rowAns["username"];
                    $address = $rowAns["address"];
                }
                ?>

                <!-- <div class="center">
                <input type="checkbox" name="" id="show">
                <label for="show" class="show_btn"><i class="fa-solid fa-message"></i></label>
                <div class="msg_container">
                    <label for="show" class="close_btn fas fa-times"></label>

                    <div class="textbox">Contact Us</div>

                    <form action="#">
                        <div class="data1">
                            <label>Email</label>
                            <input type="text" value="" name="address" id="" required>
                        </div>
                        <div class="data1">
                            <label>Username</label>
                            <input type="text" value="" name="" id="" required>
                        </div>
                        <div class="data1">
                            <label>Message</label>
                            <textarea name="" id="" placeholder="write a message" cols="10" rows="5"></textarea required>
                        </div>
                        <div class="btn">
                        <div class="inner"></div>
                            <a href="#"><input type="submit" name="submit_message" class="button" value="send message"></a>
                        </div>
                    </form>
                </div>
            </div> -->

            </div>
        </div>
    </body>

    </html>
<?php
} else {
?>
    <script type="text/javascript">
        window.location = "../customer_table/login.php";
    </script>
<?php
}
?>