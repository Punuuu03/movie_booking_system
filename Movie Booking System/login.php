<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking System</title>
     <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: #ffe4b5;
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

h1 {
    color: #8b4513;
    margin-bottom: 10px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    color: #2c3e50;
    font-weight: bold;
    margin-bottom: 8px; 
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
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
    margin: 10px 2px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
    cursor: pointer;
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
a{
    text-decoration:none;
    color:black;
}
        </style>


</head>

<body>
    
    <div id="register">
        <div class="container">
            <h1>Login</h1>
            <form method="post" action="connect2.php">
                email: <input type="email" name="email"><br>
                Password : <input type="password" name="password"><br>
                <button>Login</button>
                <br>
                <div>Not a member... <a href="signup.html">Register</a></div>
                <closeform></closeform>
            </form>
        </div>
    </div>
    </script>
</body>

</html>