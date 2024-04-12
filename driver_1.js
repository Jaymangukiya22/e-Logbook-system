
function updateDateTime() {
    var now = new Date();
    var dateTimeString = now.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
    document.getElementById('date-time').textContent = dateTimeString;
}

// Call updateDateTime function initially
updateDateTime();

// Update date and time every second
setInterval(updateDateTime, 1000);
