<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    header('Location:login.php');
}
if(!isset($_POST['id'])){
    header("Location:admin.php");
}
$id =$_POST['id'];
$sql = "SELECT * FROM instructors WHERE instructor_id ='$id';";
$result = mysqli_query($con,$sql);
 $rows = mysqli_fetch_all($result);
 $inst = $rows[0];
    if(isset($_POST['update'])){
          $name = $_POST['full_name'];
          $job = $_POST['job_title'];
          $spec = $_POST['specialty'];                
          $qual = $_POST['qualifications'] ;

          $update = "UPDATE instructors SET full_name='$name', job_title='$job', specialty='$spec', qualifications='$qual' WHERE instructor_id ='$id'"; 
          mysqli_query($con,$update);
          header("Location:admin.php");
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB' crossorigin='anonymous'>
        <link rel="stylesheet" href="../Style/edit.css">

    <title>H.T.U Martial</title>
</head>
<body>
<?php    
echo "
<h2> Edit Instructors</h2>
<form method='POST'>
<input type='hidden' name='id' value='{$inst[0]}'>
  <div class='box'>
    <label for='name' class='form-label'>Full Name</label>
    <input type='text' name='full_name' class='form-control' value='{$inst[1]}'>
  </div>
  <div class='box'>
    <label for='type' class='form-label'>Job Title</label>
    <input type='text' name='job_title' class='form-control' value='{$inst[2]}'>
  </div>
  <div class='box'>
    <label for='price' class='form-label'>Specialty </label>
    <input type='text' name='pricspecialty' class='form-control' value='{$inst[3]}'>
  </div>
  <div class='box'>
    <label for='desc' class='form-label'>qualifications</label>
    <textarea type='text' name='qualifications' class='form-control' >{$inst[4]}</textarea>
  </div>
  <button type='submit' name='update' class='btn-save'>Update Program</button>
</form>
"
?>
<div class="container mt-3">
    <a href="admin.php" class="back">
        Back to Dashboard
    </a>
</div>
</body>
</html>
