<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route_no = $_POST['route_number']; 
    $station = $_POST['station']; 
    if (count($route_no) === count($station)) {
        for ($i = 0; $i < count($route_no); $i++) {
            $route = mysqli_real_escape_string($conn, $route_no[$i]);
            $station_name = mysqli_real_escape_string($conn, $station[$i]);

            $check = "SELECT * FROM admin_route WHERE route = '$route'";
            $result = mysqli_query($conn, $check);

            if (mysqli_num_rows($result) > 0) {
                echo "Error: Route number '$route' already exists<br>";
            } else {
                $sql = "INSERT INTO admin_route (route, station) VALUES ('$route', '$station_name')";
                if (mysqli_query($conn, $sql)) {
                    //echo "Record inserted successfully<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    } else {
        echo "Error: Route numbers and stations arrays have different lengths";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Route</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Add Route</h2>
    <form method="post" action="route.php">
      <div id="input-fields">
              

        <input type="text" id="ip" name="route_number[]" class="form-control mb-2" placeholder="Enter Route No.">
        <input type="text" name="station[]" class="form-control mb-2" placeholder="Enter Station">
      </div>
      <button type="button" class="btn btn-primary mr-2" onclick="addInputFields()">Add</button>
      <button type="button" class="btn btn-danger" onclick="removeInputFields()">Remove</button>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
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
