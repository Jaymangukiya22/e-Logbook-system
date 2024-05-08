<?php
include 'connect.php';
session_start(); 

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//          header("Location: admin.html");
//     exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route_no = $_POST['route_number']; 
    $station = $_POST['station']; 
    if (count($route_no) === count($station)) {
        for ($i = 0; $i < count($route_no); $i++) {
            $route = mysqli_real_escape_string($conn, $route_no[$i]);
            $station_name = mysqli_real_escape_string($conn, $station[$i]);

            $sql = "INSERT INTO admin_route (route, station) VALUES ('$route', '$station_name')";
            
            if (mysqli_query($conn, $sql)) {
                //echo "Record inserted successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: Route numbers and stations arrays have different lengths";
    }
}

$sql = "SELECT DISTINCT route FROM admin_route";
$result = mysqli_query($conn, $sql);

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Route</title>
<style>
    .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:#3e8e41;
    overflow-x: hidden;
    padding-top: 60px;
  }
  img{
    margin-left: 95px;
    margin-top: -30px;
    margin-bottom: 10px;
    
  }
  .sidenav button {
    padding: 16px;
    text-decoration: none;
    font-size: 27px;
    color: white;
    display: block;
    border: none;
    background: none;
    width: 100%;
    /*text-align: center;*/
    margin-left: -5px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: 700;
  }
  
  .sidenav button:hover {
    background-color:green;
  }
  
  .sidenav button:focus {
    outline: none;
  }
  #rt{
    margin-left: 350px;
  }
  #ip input, h2{
    width: 500px;
    margin-left: 250px;
    
}
#ip #add{
    display: inline;
    margin-left: 250px;
}
#ip #remove, #submit{
    position: relative;
    margin-left: 10px;
}
</style>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div id="mySidenav" class="sidenav">
  
  <a href="index.html"><img src="file1.png" alt=""></a>
  <button id="driver">Drivers</button>

  <button id="student">Students</button>
  <button><a href="admin.php" style="text-decoration: none; color:white; ">Admin</a></button>
  <button><a href="logbook.php" style="text-decoration: none; color:white; ">Logbook</a></button>
  <button><a href="admin.html" style="text-decoration: none; color: white; position:relative; bottom:0px;">Logout</a></button>


</div>
<div class="background" id="background">
  <h1></h1>
</div>

  <div class="container mt-5" id="ip">
    <h2>Add Route</h2>
    <form method="post" action="route.php">
      <div id="input-fields">
              

        <input type="text" id="ip" name="route_number[]" class="form-control mb-2" placeholder="Enter Route No.">
        <input type="text" name="station[]" class="form-control mb-2" placeholder="Enter Station">
      </div>
      <button type="button" id="add" class="btn btn-primary mr-2" onclick="addInputFields()">Add</button>
      <button type="button" id="remove" class="btn btn-danger" onclick="removeInputFields()">Remove</button>
      <button type="submit" id="submit" class="btn btn-success">Submit</button>
    </form>
  </div>


</div>
 <div class="container mt-5" id="rt">
    <?php
     $sql = "SELECT DISTINCT route FROM admin_route";
     $result = mysqli_query($conn, $sql);
     if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $route = $row['route'];
            echo '<div>';
            echo '<h3>Route: ' . $route . '</h3>';
            
            $stations_query = "SELECT station FROM admin_route WHERE route='$route'";
            $stations_result = mysqli_query($conn, $stations_query);
            if ($stations_result) {
                echo '<h4>Stations:</h4>';
                while ($station_row = mysqli_fetch_assoc($stations_result)) {
                    echo '<p>' . $station_row['station'] . '</p>';
                }
            }
            
            $driver_query = "SELECT name, phone FROM admin_driver WHERE route='$route'";
            $driver_result = mysqli_query($conn, $driver_query);
            if ($driver_result) {
                echo '<h4>Driver:</h4>';
                while ($driver_row = mysqli_fetch_assoc($driver_result)) {
                    echo '<p>Name: ' . $driver_row['name'] . '</p>';
                    echo '<p>Contact: ' . $driver_row['phone'] . '</p>';
                }
            }
            
            $student_query = "SELECT name, gr FROM admin_student WHERE route='$route'";
            $student_result = mysqli_query($conn, $student_query);
            if ($student_result) {
                echo '<h4>Students:</h4>';
                while ($student_row = mysqli_fetch_assoc($student_result)) {
                    echo '<p>Name: ' . $student_row['name'] . '</p>';
                    echo '<p>GR No.: ' . $student_row['gr'] . '</p>';
                }
            }
                    echo '<a class="btn btn-danger text-light"  href="delete_route.php?route=' . $route . '">Delete</a>';
            echo '<a class="btn btn-primary text-light update-btn" style="margin-left:10px;" href="update_route.php?route=' . $route . '">Update</a>';
            
            echo '<hr>';
            echo '</div>';
        }
    }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function addInputFields() {
        var originalInput = document.getElementById('ip').value;

        var input1 = document.createElement('input');
        var input2 = document.createElement('input');

        input1.setAttribute('type', 'text');
        input1.setAttribute('name', 'route_number[]');
        input1.setAttribute('class', 'form-control mb-2');
        input1.setAttribute('placeholder', 'Enter Route No.');
        input1.value = originalInput;

        input2.setAttribute('type', 'text');
        input2.setAttribute('name', 'station[]');
        input2.setAttribute('class', 'form-control mb-2');
        input2.setAttribute('placeholder', 'Enter Station');

        document.getElementById('input-fields').appendChild(input1);
        document.getElementById('input-fields').appendChild(input2);
    }

    function removeInputFields() {
        var inputFields = document.getElementById('input-fields').children;
        var length = inputFields.length;

        if (length >= 3) {
            document.getElementById('input-fields').removeChild(inputFields[length - 1]);
            document.getElementById('input-fields').removeChild(inputFields[length - 2]);
        }
    }
</script>

</body>
</html>
