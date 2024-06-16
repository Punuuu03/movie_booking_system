<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST["payment_method"];
    $amount = $_POST["amount"];
    $pic_code = $_POST["pic_code"];
    $mysqli = require 'database.php';
    $sql = "INSERT INTO payments (payment_method, amount, pic_code) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $payment_method, $amount, $pic_code);

    if ($stmt->execute()) {
        echo "Payment sent successfully!";
    } else {
        echo "Error sending payment: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
