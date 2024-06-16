document.addEventListener("DOMContentLoaded", () => {
    let seats = document.querySelector(".all-seats");
    for (let i = 0; i < 59; i++) {
        let randint = Math.floor(Math.random() * 2);
        let booked = randint === 1 ? "booked" : "";

        seats.insertAdjacentHTML(
            "beforeend",
            `<input type="checkbox" name="tickets" id="s${i + 2}" ${booked ? "disabled" : ""}/>
            <label for="s${i + 2}" class="seat ${booked}"></label>`
        );
    }

    let tickets = seats.querySelectorAll("input");
    tickets.forEach((ticket) => {
        ticket.addEventListener("change", () => {
            let amount = document.querySelector(".amount").innerHTML;
            let count = document.querySelector(".count").innerHTML;

            amount = Number(amount);
            count = Number(count);

            if (ticket.checked) {
                count += 1;
                amount += 200;
            } else {
                count -= 1;
                amount -= 200;
            }
            document.querySelector(".amount").innerHTML = amount;
            document.querySelector(".count").innerHTML = count;
        });
    });

    const bookButton = document.getElementById("bookButton");
    bookButton.addEventListener("click", () => {
        let selectedSeats = Array.from(tickets).filter((ticket) => ticket.checked);
        if (selectedSeats.length > 0) {
            alert("Booking successful!");
            window.location.href = "payment.html";
        } else {
            alert("Please select at least one seat to book.");
        }
    });
});
