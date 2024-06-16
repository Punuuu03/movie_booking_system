<?php

@include 'config.php';

$order_placed = false;

if(isset($_POST['place_order'])){
   $food_id = $_POST['food_id'];
   $customer_name = $_POST['customer_name'];
   $customer_mobile = $_POST['customer_mobile'];
   $quantity = $_POST['quantity'];
   $price = $_POST['price'];
   $total_price = $quantity * $price;

   $order_query = mysqli_query($conn, "INSERT INTO `orders` (food_id, customer_name, customer_mobile, quantity) VALUES ('$food_id', '$customer_name', '$customer_mobile', '$quantity')") or die('query failed');
   
   if($order_query){
      $order_placed = true;
      header('Location: payment.html');
      exit;
   } else {
      $message[] = 'Could not place the order';
   }
}

$food_id = $_GET['food_id'];
$food_query = mysqli_query($conn, "SELECT * FROM `food_items` WHERE id = '$food_id'");
$food_item = mysqli_fetch_assoc($food_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Place Order</title>
   <link rel="stylesheet" href="css/orderform.css">
   <script>
      function reloadPage() {
         location.reload();
      }

      <?php if ($order_placed): ?>
         window.onload = function() {
            window.location.href = 'payment.html';
            setTimeout(reloadPage, 1000); 
         };
      <?php endif; ?>
   </script>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
<section class="order-form">
<h1 class="heading">Place Order</h1>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}
?>
<form action="" method="post" class="place-order-form">
   <h3>Food: <?php echo $food_item['name']; ?></h3>
   <p>Price: ₹<?php echo $food_item['price']; ?></p>
   <input type="hidden" name="food_id" value="<?php echo $food_item['id']; ?>">
   <input type="hidden" name="price" value="<?php echo $food_item['price']; ?>">
   <input type="text" name="customer_name" placeholder="Enter your name" class="box" required>
   <input type="text" name="customer_mobile" placeholder="Enter your mobile number" class="box" required>
   <input type="number" name="quantity" placeholder="Enter quantity" class="box" required>
   <input type="submit" value="Place Order" name="place_order" class="btn">
</form>
</section>
</div>
</body>
</html>
