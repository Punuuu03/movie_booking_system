<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin View Bookings</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #b5afaf;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.heading {
    margin-bottom: 20px;
}

.box-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-left: 100px;
}

.box {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px black;
    padding: 20px;
    width: calc(33.33% - 20px);
}

.box h3 {
    margin-bottom: 10px;
}

.message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 10px;
    position: relative;
}

.message span {
    display: inline-block;
}

.message i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #721c24;
}

.heading{
    text-align: center;
}


.box input {
    display: none;
 }


  .box img {
    width: 100%;
    height: 200px; 
    object-fit: cover; 
    border-radius: 5px;
    margin-bottom: 10px;
 }
 
 .box {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px black;
    padding: 20px;
    margin: 10px;
    width: 300px;
    display: flex;
    flex-direction: column;
    align-items: center; 
 }
 
 .package {
    font-weight: bold;
    margin-bottom: 10px;
 }
 
 .box input[type="hidden"],
 .box a.btn {
    margin-bottom: 10px;
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
<?php include 'stud header.php'; ?>

<div class="container">
<section class="bookings">
<h1 class="heading">Bookings</h1>
<div class="box-container">
<?php
      $select_bookings = mysqli_query($conn, "SELECT * FROM `bookings`");
      if(mysqli_num_rows($select_bookings) > 0){
         while($fetch_booking = mysqli_fetch_assoc($select_bookings)){
      ?>
<form action="" method="post">
         <div class="box">
            <h3><?php echo $fetch_booking['name']; ?></h3>
            <h3><?php echo $fetch_booking['mobile']; ?></h3>
            <h3><?php echo $fetch_booking['booking_date']; ?></h3>
            <h3><?php echo $fetch_booking['slot_time']; ?></h3>
         </div>
      </form>
      <?php
         }
      }
      ?>
   </div>
</section>
</div>
<script src="js/application.js"></script>
</body>
</html>
