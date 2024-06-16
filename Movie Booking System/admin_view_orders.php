<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin View Orders</title>
   <link rel="stylesheet" href="css/adminvieworders.css">
   <style>
      body{
         background-color:#999;
      }
      </style>
</head>
<body>
   <?php
if(isset($message)){
    foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}
?>
<?php include 'header.php'; ?>

<div class="container">
<section class="orders">
<h1 class="heading">Food Orders</h1>
<div class="box-container">
<?php
      $select_orders = mysqli_query($conn, "SELECT orders.*, food_items.name AS food_name FROM `orders` JOIN `food_items` ON orders.food_id = food_items.id");
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
         <div class="box">
            <h3>Food: <?php echo $fetch_orders['food_name']; ?></h3>
            <h3>Customer: <?php echo $fetch_orders['customer_name']; ?></h3>
            <h3>Mobile: <?php echo $fetch_orders['customer_mobile']; ?></h3>
            <h3>Quantity: <?php echo $fetch_orders['quantity']; ?></h3>
         </div>
      <?php
         }
      }
      ?>
   </div>
</section>
</div>
</body>
</html>
