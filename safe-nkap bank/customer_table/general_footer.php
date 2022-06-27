<?php  ?>

<head>
    <!-- <link rel="stylesheet" href="../dashboard/dashboard.css"> -->
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

        .info p.active {
            color: #fff;
        }

        .message p.active {
            color: #fff;
        }

        .message2 p.active {
            color: #fff;
        }

        .message3 p.active {
            color: #fff;
        }

        .message small.active {
            color: #fff;
        }

        h2.title.active {
            color: #fff;
        }

        .recent_updates .update.active {
            background-color: #363949;
            border: 1px solid #fff;
            box-shadow: none;
        }
    </style>
</head>

<div class="right">
    <div class="top">
        <button id="menu_btn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="theme_toogler">
            <i class="far fa-sun"></i>
            <i class="far fa-moon"></i>
        </div>

        <div class="profile">
            <div class="info">
                <?php
                $name = mysqli_query($link, "select * from user where contact = '$_SESSION[contact]' ");
                while ($row = mysqli_fetch_array($name)) {
                    $fullname = $row["username"];
                }
                ?>
                <p><?php echo $fullname ?></p>
                <!-- <small class="text_muted">Admin</small> -->
            </div>
            <div class="profile_photo">
                <img src="../dashboard/images/profile-1.png" alt="">
            </div>
        </div>
    </div>

    <div class="recent_updates">
        <h2 class="title">recent updates</h2>
        <div class="update">

            <div class="updates">
                <div class="profile_photo">
                    <img src="../dashboard/images/profile-1.png" alt="">
                </div>
                <div class="message">
                    <p>CHI SAMUEL received order of night lion N-tec labs</p>
                    <small class="text_muted">2 minutes ago</small>
                </div>
            </div>

            <div class="updates">
                <div class="profile_photo">
                    <img src="../dashboard/images/profile-1.png" alt="">
                </div>
                <div class="message message2">
                    <p>WAMBANINA received order of night lion N-tec labs</p>
                    <small class="text_muted">2 minutes ago</small>
                </div>
            </div>

            <div class="updates">
                <div class="profile_photo">
                    <img src="../dashboard/images/profile-1.png" alt="">
                </div>
                <div class="message message3">
                    <p>SAFE-NKAP received order of night lion N-tec labs</p>
                    <small class="text_muted">2 minutes ago</small>
                </div>
            </div>
        </div>
    </div>