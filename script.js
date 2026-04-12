document.addEventListener('DOMContentLoaded', function () {
    const companyName = 'S_CARS Rental';
    let bookingCount = 0;
    const bookingInfo = document.getElementById('bookinginfo');

    if (bookingInfo) {
        bookingInfo.innerText = `${companyName} | bookings: ${bookingCount}`;
    }

    window.increaseBooking = function () {
        bookingCount += 1;
        if (bookingInfo) {
            bookingInfo.innerText = `${companyName} | bookings: ${bookingCount}`;
        }
    };

    window.bookingpop = function () {
        alert('Booking started');
        const confirmBooking = confirm('Do you want to continue?');

        if (confirmBooking) {
            const name = prompt('Enter your name:');
            if (name) {
                alert(`Thank you, ${name}! Your booking is confirmed.`);
                window.increaseBooking();
            } else {
                alert('No name entered. Booking was not completed.');
            }
        } else {
            alert('Booking cancelled.');
        }
    };

    // Note: window.bookingpop exists above.
});

// --- Lab JS Implementations ---
function weluser() {
    return confirm("YOU WANT TO CONTINUE ??");
}

function showAlert() {
    alert("Welcome to S_CARS Rental Dashboard");
}

function showmsg() {
    alert("Vehicle booked successfully!");
}

function submitForm(event) {
    if (!weluser()) {
        event.preventDefault();
        return false;
    }
    
    var name = document.getElementById("name").value;
    var vehicle = document.getElementById("vehicle").value;
    var start_date = document.getElementById("start_date").value;
    var end_date = document.getElementById("end_date").value;
    
    var message = "Mr/Ms: " + name + " reserved a " + vehicle + " from " + start_date + " to " + end_date;
    document.getElementById("result").innerHTML = message;
    
    showmsg();
    
    event.preventDefault();
    setTimeout(function() {
        event.target.submit();
    }, 2000);
}

document.addEventListener("DOMContentLoaded", () => {
    showAlert();
    
    const cells = document.querySelectorAll(".card");
    cells.forEach(cell => {
        cell.addEventListener("click", () => {
            cell.style.backgroundColor = "#d1f7c4";
        });
    });
});