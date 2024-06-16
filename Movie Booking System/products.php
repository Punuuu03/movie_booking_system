<?php

@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Apply</title>
   <style>

body {
   font-family: Arial, sans-serif;
   background-color: #666;
   margin: 0;
   padding: 0;
}


.container {
   max-width: 1200px;
   width: 100%;
   padding: 20px;
   background-color: #fff;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   border-radius: 8px;
   margin: 80px auto; 
}

.placement {
   width: 100%;
}

.heading {
   text-align: center;
   margin-bottom: 20px;
   font-size: 28px;
   color: #333;
}

.box-container {
   display: flex;
   flex-wrap: wrap;
   gap: 30px;
   justify-content: center;
}

.box {
   background-color: #f9f9f9;
   border: 1px solid #ddd;
   border-radius: 8px;
   padding: 20px;
   width: 300px; 
   height: 400px; 
   box-sizing: border-box;
   text-align: center;
   display: flex;
   flex-direction: column;
   justify-content: space-between;
}

.box img {
   max-width: 100%;
   height: 220px;
   border-radius: 8px;
   margin-bottom: 10px;
   object-fit:cover;
}

.box h3 {
   margin: 0 0 10px;
   font-size: 18px;
   color: #555;
}

.package {
   font-size: 20px;
   color: #333;
}

.btn {
   display: inline-block;
   padding: 10px 20px;
   background-color: #d35400;
   color: #fff;
   border: none;
   border-radius: 4px;
   font-size: 16px;
   cursor: pointer;
   text-decoration: none;
   transition: background-color 0.3s ease;
   text-align: center;
   margin-top: 10px;
}

.btn:hover {
   background-color: #4cae4c;
}

.message {
   background-color: #f8d7da;
   color: #721c24;
   padding: 10px;
   margin-bottom: 10px;
   border: 1px solid #f5c6cb;
   border-radius: 4px;
   display: flex;
   justify-content: space-between;
   align-items: center;
   width: 100%;
}

.message i {
   cursor: pointer;
}

@media (max-width: 768px) {
   .box {
       width: 45%;
   }
}

@media (max-width: 480px) {
   .box {
       width: 90%;
   }

   .heading {
       font-size: 24px;
   }
}

      </style>
</head>
<body>
   
<?php

 if(isset($message)){
    foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
 };

?>

<?php include 'header.php'; ?>

<div class="container">

<section class="placement">

   <h1 class="heading">Latest Movies</h1>

   <div class="box-container">

      <?php
      $select_placement = mysqli_query($conn, "SELECT * FROM `placement`");
      if(mysqli_num_rows($select_placement) > 0){
         while($fetch_placement= mysqli_fetch_assoc($select_placement)){
      ?>
    <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_placement['image']; ?>" alt="">
            <h3><?php echo $fetch_placement['name']; ?></h3>
            <h3><?php echo $fetch_placement['role']; ?></h3>
            <div class="package">₹<?php echo $fetch_placement['package']; ?>/-</div>
            <input type="hidden" name="placement_name" value="<?php echo $fetch_placement['name']; ?>">
            <input type="hidden" name="placement_role" value="<?php echo $fetch_placement['role']; ?>">
            <input type="hidden" name="placement_package" value="<?php echo $fetch_placement['package']; ?>">
            <a href="only.php" class="btn">Book</a>
         </div>
      </form>
      <?php
         };
      };
      ?>

   </div>

</section>

</div>
<script src="js/script.js"></script>

</body>
</html>
