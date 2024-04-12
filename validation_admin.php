<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = $_POST['admin_username'];
$pattern = '/^MU/i'; 
if (preg_match($pattern, $username)) {

    echo "Username validation passed.";

} else {

    echo "Username validation failed. Try Again";
}
// function btnclk() {
//     fetch('validation_admin.php', {
//         method: 'POST',
//         body: new FormData(document.querySelector('form'))
//     })
//     .then(response => response.text())
//     .then(data => {
//         if (data.includes('validation passed')) {
//             window.location.href = "admin_1.html";
//         } else {
//             alert(data);
//         }
//     })
//     .catch(error => console.error('Error:', error));
// }
