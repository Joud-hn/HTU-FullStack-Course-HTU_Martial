<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    header('Location:login.php');
}
if(!isset($_POST['id'])){
    header("Location:admin.php");
}
$id = $_POST['id'];
$sql="DELETE FROM programs WHERE program_id='$id';";
mysqli_query($con,$sql);
header("Location:admin.php");
?>
<?php
$id= $_POST['id'];
$sql= "DELETE FROM memberships WHERE membership_id ='$id';";
mysqli_query($con, $sql);
header("Location: admin.php");
?>
<?php
$id= $_POST['id'];
$sql= "DELETE FROM instructors WHERE instructor_id ='$id';";
mysqli_query($con, $sql);
header("Location: admin.php");
?>