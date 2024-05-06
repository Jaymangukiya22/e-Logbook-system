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
    <title>Welcome Student</title>
    <link rel="stylesheet" href="student_data.css">
</head>
<body>
    <div>
        <h3 class="welcome">Student Name: <?php echo $_SESSION['name']; ?></h3>
        <h3 class="gr">GR No: <?php echo $_SESSION['gr']; ?></h3>

    </div>
    <div class="data">
    <h4>Shift: <?php echo $_SESSION['shift']; ?></h4>
       <h4>Route No.: <?php echo $_SESSION['route']; ?></h4>
       <?php
            $route = $_SESSION['route'];
            // $query = "select adr.*,ast.route from admin_driver adr, admin_student ast where adr.route=ast.route";
            $query = "SELECT adr.* FROM admin_driver adr, admin_student ast WHERE adr.route = '$route' AND ast.route = '$route'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <h4>Driver Name: <?php echo $row['name']; ?></h4>
                <h4>Driver Contact: <?php echo $row['phone']; ?></h4>
          <?php  
            }
       ?>
    </div>
    <div class="a">
        <a href="logout.php">Logout</a> 
    </div>
</body>
</html>
