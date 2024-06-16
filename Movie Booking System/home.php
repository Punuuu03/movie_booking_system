<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIHg5FsJSZTqbb2XsJ9pUMqPy3WIqjn38f_w&s');
  background-size: cover;
  background-repeat: no-repeat;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 1;
            position: relative;
            margin-top:200px;
        }

        .container h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #d35400;
            animation: fadeInDown 1s ease-out;
        }

        .container p {
            font-size: 1.2em;
            margin-bottom: 20px;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out;
        }

        .action-button {
            background-color: #d35400;
            color: #fff;
            padding: 15px 30px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s, transform 0.3s;
        }

        .action-button a {
            color: #fff;
            text-decoration: none;
        }

        .action-button:hover {
            background-color: #ba4a00;
            transform: scale(1.05);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>Movie Booking System</h1>
        <p>Welcome to our movie booking system! Here you can find all the information you need about available movies and how to book tickets.</p>
        <p>We aim to revolutionize the way people experience movies by providing a hassle-free, efficient, and enjoyable ticket booking process.</p>
        <button class="action-button"><a href="products.php">See Available Movies</a></button>
        <button class="action-button"><a href="order_food.php">Order Food</a></button>
    </div>
</body>
</html>
