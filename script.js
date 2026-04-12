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


});