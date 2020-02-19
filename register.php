<?php
  require_once "config/db.php";

  session_start();

  if(isset($_SESSION['user_id'])){
    header("Location: index.php");
  }
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name =$_POST['name'];
      $email =$_POST['email'];
      $password =$_POST['password'];

      if(!$name || !$email || !$password){
        echo "Field harus diisi!";
      }else{
        //echo "proses register dilanjutkan";
        $user = mysqli_query($connection, "SELECT * from user where email = '$email'");
        $user = mysqli_fetch_assoc($user);

        if($user){
          echo "User sudah pernah terdaftar";
        }else{
          //echo "insert data ke database";
          mysqli_query($connection, "INSERT INTO user(name, email, password)VALUES ('$name', '$email', '$password')");
          header("Location: index.php");
        }
      }
    }
 ?>
<!DOCTYPE html>
  <head>
    <title>Register</title>
  </head>
  <body>
    <h1>Register</h1>
    <hr />

    <form class="" action="#" method="POST">
      <p>
        <label>name</label><br>
        <input type="text" name="name" />
      </p>
      <p>
        <label>Email</label><br>
        <input type="text" name="email" />
      </p>
      <p>
        <label>password</label><br>
        <input type="password" name="password" />
      </p>
      <input type="submit" name="submit" value="Register">
      <p>
      </p>

    </form>

  </body>
</html>
