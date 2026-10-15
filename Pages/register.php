<?php
include 'connect.php';
include 'header.php';

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/register.css">
    <title> H.T.U Martial Arts</title>
</head>
<body>
<?php



if (isset($_POST['join'])) {

    $user_id = $_SESSION['user_id'];
    $membership_id = $_POST['membership'];
    $program_id = $_POST['program'];

    $sql = "INSERT INTO registrations (user_id, membership_id, program_id)
              VALUES ('$user_id', '$membership_id', '$program_id');";

    if (mysqli_query($con, $sql)) {
        header("Location: profile.php");
    } else {
        echo mysqli_error($con);
    }
}
?>
    <section id="registerForm">
         <h1>Choose Your Path</h1>
            <p>select the membership and program that fit your goals</p>
        <form action="register.php" method="POST">


            
            <div class="input">
                <label for="membership">Select Membership</label>
                <select name="membership" id="membership" required>
                    <option value="">Choose Plan</option>
                    <option value="13">Basic</option>
                    <option value="2">Intermediate</option>
                    <option value="3">Advanced</option>
                    <option value="4">Elite</option>
                    <option value="5">Junior</option>
                </select>
                <small class="error"></small>
            </div>
            <div class="input">
                <label for="program">Select Program</label>
                <select name="program" id="program" required>
                    <option value="">Choose Program</option>
                    <option value="13">Jiu-Jitsu</option>
                    <option value="14">Karate</option>
                    <option value="15">Judo</option>
                    <option value="16">Muay-Thai</option>
                    <option value="17">Fitness Room</option>
                    <option value="18">Fitness Training</option>
                    <option value="19">Self-Defence</option>
                    <option value="20">Kids Martial Arts</option>
                    <option value="21">Private Martial Arts Tuition</option>
                </select>
                <small class="error"></small>
            </div>
            <button type="submit" name="join">Join Now</button>
        </form>
        

    </section>
<?php
require 'contactusFooter.php';
?>


</body>
</html>