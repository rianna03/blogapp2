<?php 
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
        }
    }else{
        echo"Incorrect Password";
    }

    $stmt->close();
    
}else{
    echo"User not found";
}




?>



<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
  </head>
  <body>
    <form action="login.php" method="POST">

        <label for="username">Username: </label>
        <input type="text" name="username"></input>

        <label for="email">Email: </label>
        <input type="email" name="email"></input>

        <label for="password">Password: </label>
        <input type="password" name="password"></input>

        <button type="submit"> Login</button>

        <button type="button"><a href="register.php"> Register</a></button>


    </form>
  </body>
  </html>