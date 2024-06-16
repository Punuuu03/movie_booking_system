<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Food</title>
   <link rel="stylesheet" href="css/orderfood.css">
   <style>
      body{
         background-color:#0303;
      }
      </style>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
<section class="food-items">
<h1 class="heading">Order Food</h1>
<div class="box-container">
<?php
      $select_food = mysqli_query($conn, "SELECT * FROM `food_items`");
      if(mysqli_num_rows($select_food) > 0){
         while($fetch_food = mysqli_fetch_assoc($select_food)){
      ?>
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_food['image']; ?>" alt="">
            <h3><?php echo $fetch_food['name']; ?></h3>
            <h3>Price: ₹<?php echo $fetch_food['price']; ?></h3>
            <a href="order_form.php?food_id=<?php echo $fetch_food['id']; ?>" class="btn">Order Now</a>
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
