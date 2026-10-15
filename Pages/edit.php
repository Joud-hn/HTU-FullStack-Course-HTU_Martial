
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
$sql = "SELECT * FROM programs WHERE program_id='$id';";
$result = mysqli_query($con,$sql);
 $programs = mysqli_fetch_all($result);
 $program = $programs[0];
    if(isset($_POST['update'])){
          $name = $_POST['name'];
          $type = $_POST['type'];
          $price = $_POST['price'];                
          $desc = $_POST['desc'] ;

          $update = "UPDATE programs SET program_name='$name', program_type='$type', price='$price', description='$desc' WHERE program_id='$id'"; 
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
<h2> Edit Program</h2>
<form method='POST'>
<input type='hidden' name='id' value='{$program[0]}'>
  <div class='box'>
    <label for='name' class='form-label'>Program Name</label>
    <input type='text' name='name' class='form-control' value='{$program[1]}'>
  </div>
  <div class='box'>
    <label for='type' class='form-label'>Program Type</label>
    <input type='text' name='type' class='form-control' value='{$program[2]}'>
  </div>
  <div class='box'>
    <label for='price' class='form-label'>Program Price</label>
    <input type='text' name='price' class='form-control' value='{$program[3]}'>
  </div>
  <div class='box'>
    <label for='desc' class='form-label'>Program Description</label>
    <textarea type='text' name='desc' class='form-control' >{$program[4]}</textarea>
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




