<?php
include 'connect.php';
include 'header.php';

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");

}
$user_id = $_SESSION['user_id'];
$sql= "SELECT users.username, memberships.membership_name, memberships.price FROM users JOIN registrations ON users.user_id= registrations.user_id 
JOIN memberships ON registrations.membership_id = memberships.membership_id
WHERE users.user_id = '$user_id';";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H.T.U Martial</title>
</head>
<body>
    <h2>My Profile</h2>
    <?php if($data){ ?>
    <p><strong>Name:</strong><?php echo $data['username'];?></p>
    <p><strong>membership:</strong><?php echo $data['membership_name'];?></p>
    <p><strong>Price:</strong><?php echo $data['price'];?></p>
    <form method="POST">
        <button type="submit" name="delete">Delete</button>
    
    </form>
    <?php } else {?>
    <p><strong>No Membership Found</strong></p>
    <?php }?>
    <?php
    if(isset($_POST['delete'])){
        $delete = "DELETE FROM registrations WHERE user_id='$user_id';";
        mysqli_query($con, $delete);
        echo"Membership deleted sucessfully";
    }
    
    include "contactusFooter.php";
    ?>

</body>
</html>