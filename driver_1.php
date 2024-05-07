<?php
include 'connect.php';
session_start(); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: student.php");
    exit();
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
        <div>
            Driver Name: <?php echo $_SESSION['name'];?><br/><br>
            Driver ID: <?php echo $_SESSION['id'];?><br/><br>
            Route No: <?php echo $_SESSION['route'];?><br/><br>
            <?php
            $route = $_SESSION['route'];
            // $query = "select adr.*,ast.route from admin_driver adr, admin_student ast where adr.route=ast.route";
            $query = "SELECT art.* FROM admin_route art, admin_driver adr WHERE art.route = '$route' AND adr.route = '$route'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <h4>Route: <?php echo $row['station']; ?></h4><br>
                
          <?php  
            }
       ?>
            <button onclick="a()">Logout</button>
        </div>
    </div>
    
    <fieldset>
        <legend>HEY</legend>
        <form>
            <label for="date">Date</label>
            <input type="date" id="date"><br/>
            <label for="st_time">Start time</label>
            <input type="time" id="st_time"><br/>
            <label for="end_time">End time</label>
            <input type="time" id="end_time"><br/>
            <label for="km_st">KMs. Reading at trip start</label>
            <input type="number" id="km_st"><br/>
            <label for="km_end">KMs. Reading at end of trip</label>
            <input type="number" id="km_end"><br/>
            <label for="from">From</label>
            <input type="text" id="from"><br/>
            <label for="to">To</label>
            <input type="text" id="to">
        </form>
    </fieldset>
    <script src="driver_1.js"></script>
</body>
</html>