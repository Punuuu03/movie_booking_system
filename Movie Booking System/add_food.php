<?php

@include 'config.php';

if(isset($_POST['add_food'])){
   $name = $_POST['name'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   if(move_uploaded_file($image_tmp_name, $image_folder)){
      $insert_query = mysqli_query($conn, "INSERT INTO `food_items` (name, image, price) VALUES ('$name', '$image', '$price')") or die('query failed');
      if($insert_query){
         $message[] = 'Food item added successfully';
      } else {
         $message[] = 'Could not add the food item';
      }
   } else {
      $message[] = 'Failed to upload image';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Food Item</title>
   <link rel="stylesheet" href="css/addfood.css">
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
<section>
<form action="" method="post" enctype="multipart/form-data" class="add-food-form">
   <h3>Add Food Item</h3>
   <input type="text" name="name" placeholder="Enter the food name" class="box" required>
   <input type="number" step="0.01" name="price" placeholder="Enter the price" class="box" required>
   <input type="file" name="image" class="box" required>
   <input type="submit" value="Add Food" name="add_food" class="btn">
</form>
</section>
</div>
</body>
</html>
