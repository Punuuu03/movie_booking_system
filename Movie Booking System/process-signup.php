<?php
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
if(!empty($email)){
if (!empty($password)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shop_db";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO user (username,email,password)
values ('$username','$email','$password')";
if ($conn->query($sql)){

    header("Location: signup-success.html");

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
}
else{
echo "Password should not be empty";
die();
}
} 
    
else{
echo "Username should not be empty";
die();
}
?>