function driver(event) {
    event.preventDefault(); 
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var usr = "jay";
    var pwd = "2210";
    if (username === usr && password === pwd) {
        window.location.href = "driver_1.html";
    } else {
        alert("Invalid username or password. Please try again.");
    }
}
document.getElementById("loginForm").addEventListener("submit", driver);
