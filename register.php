  <?php
  include("db.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES(?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    if( $stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    }else{
        echo"Error registering the user" . $stmt->error;
    }
    $stmt->close();
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
    <form action="register.php" method="POST">

        <label for="username">Username: </label>
        <input type="text" name="username"></input>

        <label for="email">Email: </label>
        <input type="email" name="email"></input>

        <label for="password">Password: </label>
        <input type="password" name="password"></input>

        <button type="submit"> Register</button>


    </form>
  </body>
  </html>