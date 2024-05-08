<?php
include 'connect.php';
session_start(); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: student.php");
    exit();
}

date_default_timezone_set('Asia/Kolkata');

$time = time();
$date = date('Y-m-d', $time);

if(isset($_POST['start'])){
    $route_start = $_POST['route_start'];
    $km_start = $_POST['km_start'];
    $fuel_start = $_POST['fuel_start'];
    $from_start = $_POST['from_start'];
    $_SESSION['km_start'] = $km_start;
    $check_sql = "SELECT * FROM trip_start WHERE route = '$route_start' AND date_start = '$date'";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) > 0) {
        echo "You have already submitted a start entry for this route today.";
    } else {//$route_end == $_SESSION['route']
        if($route_start == $_SESSION['route']){
            $sql = "INSERT INTO trip_start (date_start, km_start, fuel_start, from_start, route) VALUES ('$date', '$km_start', '$fuel_start', '$from_start', '$route_start')";
        if(mysqli_query($conn, $sql)){
            header("Location: driver_1.php");
            exit();
        } else {
            die(mysqli_error($conn));
        }
        }else{
            echo "You are not assigned to this route.";
        }
    }
}

if(isset($_POST['end'])){
    $route_end = $_POST['route_end'];
    $km_end = $_POST['km_end'];
    $fuel_end = $_POST['fuel_end'];
    $to_end = $_POST['to_end'];
   
    $check_sql = "SELECT * FROM trip_end WHERE route = '$route_end' AND date_end = '$date'";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) > 0) {
        echo "You have already submitted an end entry for this route today.";
    } else {
        if($route_end == $_SESSION['route']&& $km_end>$_SESSION['km_start']){
            $sql1 = "INSERT INTO trip_end (date_end, km_end, fuel_end, to_end, route) VALUES ('$date', '$km_end', '$fuel_end', '$to_end', '$route_end')";
        if(mysqli_query($conn, $sql1)){
            header("Location: driver_1.php");
            exit();
        } else {
            die(mysqli_error($conn));
        }
        }else{
            echo 'You are not assigned to this route or Distance travelled is less than 0!';
        }
    }
}
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
            <h4 style="padding:-5px;">Trip Start Details:</h4>
            <label for="route">Route No.</label>
            <input type="number" id="route" name="route_start"><br/>
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
            <input type="number" id="route" name="route_end"><br/>
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