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