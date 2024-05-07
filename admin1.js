// function driver(){
//     var x = document.getElementById("route");
//     if (x.style.display === "none") {
//       x.style.display = "block";
//     } else {
//       x.style.display = "none";
//     }
// }
function cancel(){
    drivers.style.display = "none";
    students.style.display = "none";
}
function clk(){
    window.location.href = "route.php";

}

document.getElementById('driver').addEventListener('click', function() {
    var background = document.getElementById('background');
    var drivers = document.getElementById('drivers');
    var students = document.getElementById('students');
    var table = document.getElementById('table');
    // Toggle classes to show/hide form and apply/unapply blur effect
    background.classList.toggle('fade-in');
    background.style.display = 'block';
    drivers.classList.toggle('fade-in');
    drivers.style.display = 'block';
   
    
});

// document.getElementById('update').addEventListener('click', function() {
//     var background = document.getElementById('background');
//     var drivers_update = document.getElementById('drivers_update');
//     var students = document.getElementById('students');
//     var table = document.getElementById('table');
//     // Toggle classes to show/hide form and apply/unapply blur effect
//     background.classList.toggle('fade-in');
//     background.style.display = 'block';
//     drivers_update.classList.toggle('fade-in');
//     drivers_update.style.display = 'block';
   
    
// });
// document.querySelectorAll('btn btn-primary text-light update-btn').forEach(item => {
//     item.addEventListener('click', function(event) {
//         event.preventDefault(); // Prevent the default link behavior
//         var background = document.getElementById('background');
//         var driversu = document.getElementById('drivers_update');
//         var students = document.getElementById('students');
//         var table = document.getElementById('table');

//         // Toggle classes to show/hide form and apply/unapply blur effect
//         background.classList.toggle('fade-in');
//         background.style.display = 'block';
//         driversu.classList.toggle('fade-in');
//         driversu.style.display = 'block';
//     });
// });





document.getElementById('student').addEventListener('click', function() {
    var background = document.getElementById('background');
    var drivers = document.getElementById('drivers');
    var students = document.getElementById('students');
    var table = document.getElementById('table');

    // Toggle classes to show/hide form and apply/unapply blur effect
    background.classList.toggle('fade-in');
    background.style.display = 'block';
    students.classList.toggle('fade-in');
    students.style.display = 'block';
    

});