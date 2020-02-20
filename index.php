<?php
  require_once "config/db.php";
  session_start();

  $products = mysqli_query($connection, "SELECT * from products order by id desc");

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="style/home.css" />
  </head>
  <body>
    <h1>HOME</h1>
    <?php if (isset($_SESSION['user_id'])) { ?>
    <div>
    <a href="logout.php">Logout</a> | <a href="order-history.php">Order History</a>
  </div>
  <?php } else { ?>
  <div>
  <a href="login.php">Login</a> | <a href="register.php">Register</a>
</div>
<?php } ?>
    <hr />
    <div id="container">
    <?php while($product = mysqli_fetch_assoc($products)){ ?>
      <div class="product">
        <div class="cover">
          <img src="images/pasminah.jpg" />
        </div>
        <div class="title">
          <?= $product['name'];?>
        </div>
        <div class="price">
          <?= number_format($product['price'], 0, ",", ".");?>
        </div>
        <div class="stock">
          <?= $product['stock'];?> unit
        </div>
        <div>
          <a href="detail.php?id=<?=$product['id'];?>">
            <button>Detail</button>
          </a>
        </div>
      </div>
    <?php }?>
    </div>
  </body>
</html>
