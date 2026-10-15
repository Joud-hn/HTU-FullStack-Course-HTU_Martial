<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/header.css">
    <title>H.T.U Martial</title>
</head>
<body>
                <header id="header">
        <nav class="navBar">
            <div class="logo">
                <img src="../Style/img/unnamed.jpg" alt="logo">
                <span>H.T.U Martial Arts</span>
            </div>
            <div class="pages">
                <ul class="navLinks">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="programs.php">Programs</a></li>
                    <li><a href="instructors.php">Instructors</a></li>
                    <li><a href="programs.php#timetable">Timetable</a></li>
                    <li><a href="#contactUs">Contact Us</a></li>
                    <li><a href="../Pages/signup.php">Signup</a></li>
                <?php
                    if(isset($_SESSION['user_id'])){?>
                 <li><a href="logout.php">Logout</a></li>
               <?php } ?></li>
                <?php if(isset($_SESSION['user_id'])&& ($_SESSION['role']=='admin')){?>
               <li> <a href="admin.php">Admin Dashboard</a>
              <?php }?></li>
                <?php
                    if(isset($_SESSION['user_id'])){?>
                 <li><a href="profile.php">My Profile</a> </li>
               <?php } ?></li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>