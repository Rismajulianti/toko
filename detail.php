<?php
  require_once("config/db.php");

  session_start();

  $id = $_GET['id'];
  $product = mysqli_query($connection, "SELECT * from products where id =$id");
  $product = mysqli_fetch_assoc($product);

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    //var_dump($_POST);
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];

    if($quantity > $product['stock']) {
      echo "stock tidak mencukupi";
    }else{
      $user_id = $_SESSION['user_id'];
      $product_id = $product['id'];
      $product_price = $product['price'];
      mysqli_query($connection, "INSERT INTO orders (user_id, product_id, quantity, address,price)VALUES ($user_id, $product_id, $quantity, '$address', $product_price)");
      $new_stock = $product['stock'] -$quantity;
      mysqli_query($connection, "UPDATE products set stock = $new_stock where id = $product_id");

      $product['stock'] = $new_stock;
      echo "pembelian sukses!";
    }
  }
  //var_dump($product);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $product['name']; ?></title>
  </head>
  <body>
    <h1>Detail <?= $product['name']; ?></h1>
    <a href="index.php">Kembali</a>
    <hr />
    <div>
      stok : <?=$product['stock']; ?>unit
    </div>
    <div>
      price : <?= number_format($product['price'], 0, ",", "."); ?>
    </div>

    <?php if(isset($_SESSION['user_id'])) { ?>
      <form method="POST" action="#">
          <p>
            <label>Jumlah</label><br>
            <input type="number" name="quantity"></input>
            </p>
            <p>
              <label>Alamat</label><br>
              <textarea name="address"></textarea>
              </p>
              <p>
                <input type="submit" value="beli" />
      </form>
    <?php } else{?>
      Maaf, anda belum login. Silahkan login terlebih dahulu sebelum melakukan pembelian.
      <a href="login.php">Login Disini</a>
  <?php }?>
  </body>
</html>
