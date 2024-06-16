<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Index</title>
    <meta charset="UTF-8">
    <style>

body {
    font-family: Arial, sans-serif;
    color: #2c3e50; 
    margin: 0;
    padding: 0;
    display: flex;
    background-color: #f0f0f0;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: #ffe4b5; 
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
}

h1 {
    margin-bottom: 20px;
    color: #8b4513; 
}

p {
    margin: 20px 0;
}

button {
    background-color: #8b4513; 
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

button:hover {
    background-color: #a0522d; 
    transform: scale(1.05);
}

button a {
    color: white;
    text-decoration: none;
}

button a:hover {
    text-decoration: underline;
}


        </style>
</head>

<body>
    <div class="container">
        <h1>Home</h1>
         
            <p><button><a href="login.php">Log in</a></button> or <button><a href="signup.html">Register</a></button></p>
    
    </div>
</body>

</html>