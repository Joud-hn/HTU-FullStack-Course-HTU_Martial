<?php
include 'connect.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/program.css">
    <title>H.T.U Martial</title>
</head>
<body>

    <main>
        <section id="Hero">
            <div class="program">
                <h1>Programs & courses</h1>
                <p>
                    Explore our martial arts classes, fitness training, specialist courses, and membership plans.
                </p>
                <div class="actions">
                    <a class="mbtn" href="#memberships">View Memberships</a>
                    <a class="tbtn" href="#timetable">Viwe Timetable</a>
                </div>
            </div>
        </section>
        <section id="filters">
            <div>
                <button type="button" class="all">All</button>
                <button type="button" class="filterbtn">Martial Arts</button>
                <button type="button" class="filterbtn">Fitness</button>
                <button type="button" class="filterbtn">Self-Defence</button>
                <button type="button" class="filterbtn">Kids</button>
                <button type="button" class="filterbtn">Private Tuition</button>

            </div>
        </section>
        <section id="programCard">
          
                <?php
                    $sql= "SELECT * FROM programs;";
                    $result = mysqli_query($con, $sql);
                    $programs = mysqli_fetch_all($result);
                    foreach($programs as $cource ){
                        $id =$cource[0]; 
                        $name = $cource[1];
                        $type = $cource[2];
                        $price = $cource[3];
                        $desc = $cource[4];
                        ?>

                        <div class="programCard">
                          <h3><?php echo $name; ?></h3>
                          <p><?php echo $desc; ?></p>
                         <ul class='programList'>
                          <li><strong>Price:</strong><?php echo $price; ?></li>
                          <li><strong>Type:</strong><?php echo  $type; ?></li>
                          </ul>
                         <button class='details-btn'>Viwe More</button>
                        <div class='card-details'>
                        <p> Improves self-defence and discipline</p>
                        <p> Suitable for beginners and advanced students</p>
                         <p> Focuses on technique rather than strength</p>
               
                    </div>
                    </div>

                <?php
                    }
                    ?>
           
        </section>
         <section id="memberships">
            <h2>membership Plans</h2>
            <div class="membershipContainer">

            <?php
                    $sql= "SELECT * FROM memberships;";
                    $result = mysqli_query($con, $sql);
                    $memberships = mysqli_fetch_all($result);
                    foreach($memberships as $membership ){
                        $id =$membership[0]; 
                        $name = $membership[1];
                        $desc = $membership[2];
                        $price = $membership[3];

                        ?>
               <div class="membershipCard">
                <h3><?php echo $name; ?></h3>
                <p class="membershipPrice"><?php echo $price; ?><span> / month</span></p>
                <ol>
                    <p><?php echo $desc; ?></p>
                </ol>
                <a href="register.php?membership_id=<?php echo $id;?>">Choose Plan</a>
            </div>
            <?php
            }
                ?>
            </div>
         
          <section id="timetable">
            <h2>Weekly Timetable</h2>
            <div class="table">
                <?php
                $sql= "SELECT day, time, class_name FROM timetable;";
                $result = mysqli_query($con,$sql);
                $timetable = [];
               
                while( $rows = mysqli_fetch_assoc($result)){
                    $timetable[$rows['time']][$rows['day']]= $rows['class_name'];
                }
                $times = [
                "06:00-07:30",
                 "08:00-10:00",
                 "10:30-12:00",
                 "13:00-14:30",
                 "15:00-17:00",
                 "17:30-19:00",
                 "19:00-21:00"
                    ];
                    $days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];

                ?>
            <table>
              
                <thead>
                    <tr>
                        <th>Time</th>
                         <?php foreach($days as $day){?>
                         <th><?php echo $day ?></th>
                         <?php };?>
                    </tr>
                </thead>
                   <tbody>
                    <?php foreach($times as $time){?>

<tr>
    <td><?php echo $time?> </td>
    <?php foreach($days as $day){?>
    <td>
        <?php echo $timetable[$time][$day]?>
    </td>
    <?php };?>
</tr>
<?php };?>
</tbody>
</table>

</div>
</section>
          
          <section id="Dprogram">
            <h2>Ready to get started?</h2>
            <p>Join a membership plan or contact us to find the right program for you.</p>
            <div>
                <a href="register.php">Joun Now</a>


                <a href="#contactUs">Contact Us</a>
            </div>
          </section>

    </main>
    <footer id="programFooter">
        <p>2026 BoBu Arts. All right reserved</p>
    </footer>
    <script src="../Script/program.js"></script>
    <?php
    require 'contactusFooter.php';
    ?>
</body>
</html>