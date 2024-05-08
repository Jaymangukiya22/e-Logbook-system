<?php
include 'connect.php';
session_start(); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: student.php");
    exit();
}
?>

<?php
if(isset($_POST['start'])){
    $route = $_POST['route'];
    $km_start = $_POST['km_start'];
    $fuel_start = $_POST['fuel_start'];
    $from_start = $_POST['from_start'];
    $sql = "insert into trip_start ( km_start, fuel_start, from_start, route) values ('$km_start', '$fuel_start', '$from_start', '$route')";
    if(mysqli_query($conn, $sql)){
        //header("Location: driver_1.php");
}else{
    die(mysqli_error($conn));
}}
?>

<?php
if(isset($_POST['end'])){
    $route = $_POST['route'];
    $km_end = $_POST['km_end'];
    $fuel_end = $_POST['fuel_end'];
    $to_end = $_POST['to_end'];
    $sql1 = "insert into trip_end ( km_end, fuel_end, to_end, route) values ('$km_end', '$fuel_end', '$to_end', '$route')";
    if(mysqli_query($conn, $sql1)){
        //header("Location: driver_1.php");
}else{
    die(mysqli_error($conn));
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver_1</title>
    <link rel="stylesheet" href="driver_1.css">
</head>
<body>
    <div id="date-time"></div>
    <div id="side">
        <div id="div1">
            Driver Name: <?php echo $_SESSION['name'];?><br/><br>
            Driver ID: <?php echo $_SESSION['id'];?><br/><br>
            Route No: <?php echo $_SESSION['route'];?><br/><br>
            <h4 >Your Route:</h4>
            <div id="station">
            <?php
            $route = $_SESSION['route'];
            // $query = "select adr.*,ast.route from admin_driver adr, admin_student ast where adr.route=ast.route";
            $query = "SELECT art.* FROM admin_route art, admin_driver adr WHERE art.route = '$route' AND adr.route = '$route'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <h4><?php echo $row['station']; ?></h4>
                
          <?php  
            }
       ?>

            </div>
            <button onclick="a()" >Logout</button>
        </div>
    </div>
    
    <!-- <fieldset>
        <legend>HEY</legend> -->
        <form method="post" action="driver_1.php">
            <div id="fieldset">
            <h4 style="padding:-5px;">Trip Starttt Details:</h4>
            <label for="route">Route No.</label>
            <input type="number" id="route" name="route"><br/>
            <label for="km_start">KMs. Reading at trip start</label>
            <input type="number" id="km_start" name="km_start"><br/>
            <label for="fuel_start">Fuel Reading at trip start</label>
            <input type="number" id="fuel_start" name="fuel_start"><br/>
            <label for="from_start">Starting From</label>
            <input type="text" id="from_start" name="from_start"><br/>
            <div>
                <button name="start" id="start">Start</button>
            </div>
            </div>
            
        <!-- </form>
    </fieldset> -->
    <form method="post" action="driver_1.php">
            <div id="fieldset1">
            <h4 style="padding:-5px;">Trip End Details:</h4>
            <label for="route">Route No.</label>
            <input type="number" id="route" name="route"><br/>
            <label for="km_end">KMs. Reading at trip end</label>
            <input type="number" id="km_end" name="km_end"><br/>
            <label for="fuel_end">Fuel Reading at trip end</label>
            <input type="number" id="fuel_end" name="fuel_end"><br/>
            <label for="to_end">Going To</label>
            <input type="text" id="to_end" name="to_end"><br/>
            <div>
                <button name="end" id="end">End</button>
            </div>
            </div>
            
    <script >
        
function updateDateTime() {
    var now = new Date();
    var dateTimeString = now.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
    document.getElementById('date-time').textContent = dateTimeString;
}

updateDateTime();
setInterval(updateDateTime, 1000);
function a() {
    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "logout.php"; 
        
        
    }
}

    </script>
</body>
</html>