<?php
include 'connect.php';
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H.T.U Martial</title>
    <link rel="stylesheet" href="../Style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    </header>
    <section id="hero">
        <video autoplay muted loop  >
            <source src="../Style/video/7045340-hd_1920_1080_30fps.mp4" type="video/mp4">
        </video>
        <div class="content">
            <h1>Become Stronger</h1>
            <p>Train martial arts, improve fitness, and build confidence with expert coaching and structured programs.</p>
            <a href="programs.php" class="Programs">View Programs</a>
        </div>
    </section>
    <section id="programs">
        <h2> Programs Overview</h2>
        <div class="programsCard">
            <div class="card">
                <h3>Martial Arts</h3>
                <p>Explore our martial arts classes</p>
                <a href="programs.php#programCard" class="explore">Explore</a>
            </div>
            <div class="card">
                <h3>Fitness Training</h3>
                <p>Healthy body, healthy life</p>
                <a href="programs.php#programCard" class="explore">Explore</a>
            </div>
            <div class="card">
                <h3>Self Defence</h3>
                <p>Be Stronger</p>
                <a href="programs.php#programCard" class="explore">Explore</a>
            </div>
            <div class="card">
                <h3>Special & Private</h3>
                <p>Personalised training and special courses</p>
                <a href="programs.php#programCard" class="explore">Explore</a>
            </div>
        </div>
    
    </section>
    <section id="top-instructors">
        <h2>Our Expert Coaches for this month</h2>

        <div class="instructor-card">
            <div class="instructorCard">
                <img src="../Style/img/download (1).jpg" class="img-top1" alt="CoachPhoto" >
                <h3>Coache 1</h3>
            </div>
            <div class="instructorCard">
                <img src="../Style/img/Ali.jpg" class="img-top2" alt="CoachPhoto">
                <h3>Coache 2</h3>
            </div>
            <div class="instructorCard">
                <img src="../Style/img/download.jpg" class="img-top3" alt="CoachPhoto">
                <h3>Coache 3</h3>
               
            </div>
        </div>

    </section>
    <?php
    require 'contactusFooter.php';  
?>



    <img src="../uploads/alii.jpg" class="random" >
    <img src="../uploads/fares.webp" class="random" >
    <img src="../uploads/jana.jpg" class="random" >
    <img src="../uploads/maen.jpg" class="random" >
    <img src="../uploads/sara.jpg" class="random" >
    <img src="../uploads/reem.jpg" class="random" >
    <script src="../Script/random.js"></script>
</body>

</html>