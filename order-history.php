<?php
  require_once("config/db.php");
  session_start();

  $user_id = $_SESSION['user_id'];
  $keyword = $_GET['keyword'];

  $orders = mysqli_query($connection, "SELECT *, orders.id as order_id from orders join products on orders.product_id = products.id where user_id AND address like '%$keyword%' order by created_at desc");

  //var_dump(mysqli_fetch_all($orders, MYSQLI_ASSOC));
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Order History</title>
    <link rel="stylesheet" href="style/order.css" />

  </head>
  <body>
    <?php if(mysqli_num_rows($orders) == 0){ ?>
      <h1>Belum Ada data orders</h1>
    <?php } else { ?>
      <div class="wrapapper">
      <form class="#" method="GET">
        <input type="text" placeholder="Cari Order" name="keyword" />
      </form><br><br>
      <table border="1" cellpadding="5" cellspacing="0" width="50%">
          <thead>
          <th>Order-ID</th>
          <th>product</th>
          <th>quantity</th>
          <th>price</th>
          <th>address</th>
          <th>date</th>

          </thead>
          <tbody>
          </div>
            <?php while($order = mysqli_fetch_assoc($orders)) {?>
              <tr>
                <td><?= $order['order_id']; ?></td>
                <td><?= $order['name']; ?></td>
                <td><?= $order['quantity']; ?>unit</td>
                <td><?= number_format( $order['price'], 0, ",", "."); ?></td>
                <td><?= $order['address']; ?></td>
                <td><?= $order['created_at']; ?></td>
              </tr>
            <?php } ?>
      </table>
    <?php } ?>



  </body>
</html>
