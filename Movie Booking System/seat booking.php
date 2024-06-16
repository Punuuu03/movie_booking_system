<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="css/book.css">
    <script src="js/book.js" defer></script>
</head>

<body>
    <div class="main">
        <div class="tickets">
            <div class="ticket-selector">
                <div class="title">BOOK SEAT</div>
                <div class="seats">
                    <div class="status">
                        <div class="item">Available</div>
                        <div class="item">Booked</div>
                        <div class="item">Selected</div>
                    </div>
                    <div class="all-seats">
                        <input type="checkbox" name="tickets" id="s1">
                        <label for="s1" class="seat booked"></label>
                    </div>
                </div>
            </div>
            <div class="price">
                <div class="total">
                    <span><span class="count">0</span> Tickets</span>
                    <div>₹ <div class="amount">0</div></div>
                </div>
                <button type="button" id="bookButton">Book</button>
            </div>
        </div>
    </div>
</body>

</html>
