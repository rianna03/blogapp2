<?php
session_start();
if(!isset($_SESSION{'username'})) {
    header("Location: dashboard.php");
    exit();
     }
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h2>Dashboard</h2>
    <button>
      <a href="logout.php">Logout</a>
    </button>
 </body>
 </html>