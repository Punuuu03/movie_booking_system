<?php

@include 'config.php';

if(isset($_POST['add_booking'])){
   $name = $_POST['name'];
   $mobile = $_POST['mobile'];
   $booking_date = $_POST['booking_date'];
   $slot_time = $_POST['slot_time'];

   $insert_query = mysqli_query($conn, "INSERT INTO `bookings` (name, mobile, booking_date, slot_time) VALUES ('$name', '$mobile', '$booking_date', '$slot_time')") or die('query failed');
   
   if($insert_query){
      header('Location: seat booking.php');
      exit();
   } else {
      $message[] = 'Could not book the slot';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Booking Application</title>
   <style>

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color:#999;
    margin: 0;
    padding: 0;
}


.container {
    max-width: 600px;
    margin: 80px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

section {
    text-align: center;
}

.add-booking-form {
    max-width: 400px;
    margin: 0 auto;
}

.add-booking-form h3 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.add-booking-form .box {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

.add-booking-form .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-booking-form .btn:hover {
    background-color: #45a049;
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
}

.message i {
    cursor: pointer;
}

@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }

    .add-booking-form .box {
        width: calc(100% - 20px);
    }
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
<section>
<form action="" method="post" class="add-booking-form">
   <h3>User Booking Application</h3>
   <input type="text" name="name" placeholder="Enter the name" class="box" required>
   <input type="text" name="mobile" placeholder="Enter mobile number" class="box" required>
   <input type="date" name="booking_date" class="box" required>
   <select name="slot_time" class="box" required>
      <option value="" disabled selected>Select slot time</option>
      <option value="11:00 AM">11:00 AM</option>
      <option value="2:30 PM">2:30 PM</option>
      <option value="6:00 PM">6:00 PM</option>
      <option value="9:30 PM">9:30 PM</option>
   </select>
   <input type="submit" value="Next" name="add_booking" class="btn">
</form>
</section>
</div>
</body>
</html>
