<?php
include 'connect.php';
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = "SELECT * FROM users WHERE username= '$username';";
    $result= mysqli_query($con,$check);
    if(mysqli_num_rows($result)==0){
        $sql="INSERT INTO users (username,password,role) VALUES ('$username','$password','user');";
        $result2= mysqli_query($con,$sql);
        if($result2){
            header("Location:login.php");
        }else{
            mysqli_error($con);
        }
    }else{
        echo "<p>Email already exists</p><p>Try Again</p>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/signup.css">
    <title>H.T.U Martial</title>
</head>
<body>
     <h1>H.T.U Martial</h1>
     <h2>Sign Up</h2>
    <form action="" method="POST">
        <div class="reg-container">
            <br>
        <label for="username">Username</label><br>
            <input type="text" class="textinput" placeholder="Enter username" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="text" class="textinput" placeholder="Enter password" name="password"><br>
        <button type="submit" class="submit" name="register">Sign Up</button>
            <p>Alredy have an Account? <a class="red-link" href="login.php">Login</a></p>
        </button>
    </div>
    
    </form>
</body>
</html>