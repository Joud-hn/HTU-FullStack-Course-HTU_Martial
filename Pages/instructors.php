<?php
include 'connect.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/instructors.css">
    <title>H.T.U Martial</title>
</head>
<body>
    <main>
        <section id="Hero">
            <div class="Instructors">
                <h1>Our Expert Coaches</h1>
                <p>Lern from highly qualified coaches dedicated to your martial arts anf fitness jounery.</p>
            </div>
        </section>
        <section id="instructors">
            <?php
            $sql= "SELECT * FROM instructors;";
            $result = mysqli_query($con, $sql);
            $instructors = mysqli_fetch_all($result);
            foreach($instructors as $inst){
            ?>
            <div class="instructorCard">
                <h3><?php echo $inst[1]?></h3>
                <img src="../uploads/<?php echo $inst[5]?>" alt="instructors">
                <p><?php echo $inst[2]?></p>
                <ul class="instList">
                    <li><strong>Specialty:</strong><?php  echo $inst[3]?></li>
                    <li><strong>Rank:</strong><?php echo $inst[4]?></li>
                </ul>
                </div>
           <?php
            }?>
        </section>
        <section id="instPage">
            <h2>Train with the Best</h2>
            <p>Book a private session or join a class with our professional team today.</p>
                <div class="instBtn">
                    <a href="programs.php#timetable">Viwe schedule</a>
                    <a href="../Pages/contactusFooter.html#contactUs">Contact us</a>
                </div>
        </section>
    </main>
    <section id="istfotter">
        <footer>
            <p>2026 BoBu Arts.All rights reserved</p>
        </footer>
    </section>
    <?php
    require 'contactusFooter.php';
    ?>
</body>
</html>