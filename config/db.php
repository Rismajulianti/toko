<?php
  $connection =mysqli_connect("localhost", "root", "", "toko");

  if(!$connection){
    echo "Failed to connect database!";
    exit();
  }
 ?>
