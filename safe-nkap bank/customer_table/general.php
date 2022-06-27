<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard for database administrators</title>

    <!-- custom css -->
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <style>
        main .data input.date {
            background: transparent;
            color: var(--color-dark);
            padding: 0.5rem 1.6rem;
        }

        .logo h2.active {
            color: #fff;
        }

        .siderbar #title.active {
            color: #fff;
        }

        .siderbar #title1.active {
            color: #fff;
        }

        .siderbar #title2.active {
            color: #fff;
        }

        .siderbar #title3.active {
            color: #fff;
        }

        .siderbar #title4.active {
            color: #fff;
        }

        .siderbar #title5.active {
            color: #fff;
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
                    <h2 class="app_name">Safe<span class="danger">-Nkap</span></h2>
                </div>

                <div class="close" id="close_btn">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <div class="siderbar">
                <a href="../dashboard/dashboard.php" id="title">
                    <i class="fas fa-th-large"></i>
                    <h3>Dashboard</h3>
                </a>

                <a href="account.php" class="active1" id="title1">
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

                <a href="message.php" id="title2">
                    <i class="far fa-envelope"></i>
                    <h3>Chiri</h3>
                    <span class="message_count">30</span>
                </a>

                <!-- <a href="#">
                    <i class="fas fa-truck-moving"></i>
                    <h3>Products</h3>
                </a> -->

                <a href="#" id="title3">
                    <i class="fas fa-exclamation"></i>
                    <h3>Reports</h3>
                </a>

                <a href="darkMode.php" id="title4">
                    <i class="fas fa-cog"></i>
                    <h3>Settings</h3>
                </a>

                <a href="logout.php" id="title5">
                    <i class="fas fa-sign-out-alt"></i>
                    <h3>Log Out</h3>
                </a>
            </div>
        </aside>
        <!-- aside section ends here -->