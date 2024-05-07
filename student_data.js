
function updateDateTime() {
    var now = new Date();
    var dateTimeString = now.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
    document.getElementById('date-time').textContent = dateTimeString;
}

updateDateTime();
setInterval(updateDateTime, 1000);
function confirmLogout() {
    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "student.php"; 
    }
}