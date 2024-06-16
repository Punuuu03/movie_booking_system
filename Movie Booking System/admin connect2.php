<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE email='$email' and password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();
  if (password_verify($password, $row['password'])) {
  
    echo "Incorrect password!";
  } 
  else {
    
    header("Location:admin home.html");
    
  }
} else {
    echo "please check it may be Email or password not found!";
    
  
}

$conn->close();
?>
