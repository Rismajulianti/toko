<?php
  require_once "config/db.php";

  $products = mysqli_query($connection, "SELECT * from products order by id desc");

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>HOME</h1>
    <a href="logout.php">Logout</a>
    <hr />
    <div id="container">
    <?php while($product = mysqli_fetch_assoc($products)){ ?>
      <div>
        <div class="title">
          <? = $product['name'];?>
        </div>
      </div>
    <?php }?>
    </div>
  </body>
</html>
