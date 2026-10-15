

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
$sql = "SELECT * FROM 	memberships	 WHERE membership_id ='$id';";
$result = mysqli_query($con,$sql);
 $memberships = mysqli_fetch_all($result);
 $membership = $memberships[0];
    if(isset($_POST['update'])){
          $name = $_POST['name'];
          $price = $_POST['price'];                
          $desc = $_POST['desc'] ;

          $update = "UPDATE memberships SET membership_name='$name', price='$price', description='$desc' WHERE membership_id='$id';"; 
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
<h2> Edit Membership</h2>
<form method='POST'>
<input type='hidden' name='id' value='{$membership[0]}'>
  <div class='box'>
    <label for='name' class='form-label'>Membership Name</label>
    <input type='text' name='name' class='form-control' value='{$membership[1]}'>
  </div>
  <div class='box'>
    <label for='price' class='form-label'>Membership Price</label>
    <input type='text' name='price' class='form-control' value='{$membership[3]}'>
  </div>
  <div class='box'>
    <label for='desc' class='form-label'>Membership Description</label>
    <textarea type='text' name='desc' class='form-control' >{$membership[2]}</textarea>
  </div>
  <button type='submit' name='update' class='btn-save'>Update Membership</button>
</form>
"
?>
<div class="container mt-3">
    <a href="admin.php" class="back">Back to Dashboard
    </a>
</div>
</body>
</html>