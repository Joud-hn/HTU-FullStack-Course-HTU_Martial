<?php
session_start();
include 'connect.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)==1){
        $user = mysqli_fetch_assoc($result); //to make result as array
        $_SESSION['user_id']=$user['user_id'];
        $_SESSION['username']=$user['username'];
        $_SESSION['role'] =$user['role'];
        if($user['role']=='admin'){
            header("Location:admin.php");
        }else{

        header("Location:index.php");
    }
    
}
   else{
        echo "<p>Inavlid Username or Password</p><p>Try Again</p>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/login.css">
    <title>H.T.U Martial</title>
</head>
<body>
    <h1>H.T.U Martial</h1>
    
    <h2>LOG IN</h2>
      <form action="" method="POST">
        <div class="reg-container">
        <label for="username">Username</label><br>
            <input type="text" class="textinput" placeholder="Enter username" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="text" class="textinput" placeholder="Enter password" name="password"><br>
        <button type="submit" class="submit" name="login">register</button>
            <p>Don't have an Account? <a class="red-link" href="signup.php">Sign up</a></p>
        </button>
    </div>
    </form>
</body>
</html>