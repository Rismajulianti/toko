<?php
require_once "config/db.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = mysqli_query($connection, "SELECT * from user where email = '$email' and password ='$password'");
  $user = mysqli_fetch_assoc($user);

  if($user){
    $_SESSION['user_id'] = $user['id'];
    header("Location:index.php");
  }else{
    echo "login gagal! Username/password salah!";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css" />
  </head>
  <body>
    <div class="container">
    <h1>Login</h1>
    <hr />
    <form class="" action="" method="POST">
      <p>
        <label>Email</label><br>
        <input type="text" name="email"/>
        </p>
        <p>
          <label>password</label><br>
          <input type="password" name="password"/>
          </p>
          <p>
            <input type="submit" value="Login"/>
          </div>
    </form>
  </body>
</html>
