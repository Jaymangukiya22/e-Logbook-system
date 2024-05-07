<?php
include 'connect.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route_no = $_POST['route_number']; 
    $station = $_POST['station']; 
    if (count($route_no) === count($station)) {
        for ($i = 0; $i < count($route_no); $i++) {
            $route = mysqli_real_escape_string($conn, $route_no[$i]);
            $station_name = mysqli_real_escape_string($conn, $station[$i]);

            // Update existing routes in the database
            $sql = "UPDATE admin_route SET station='$station_name' WHERE route='$route'";
            
            if (mysqli_query($conn, $sql)) {
                $message = "Routes updated successfully.";
            } else {
                $message = "Error updating routes: " . mysqli_error($conn);
            }
        }
    } else {
        $message = "Error: Route numbers and stations arrays have different lengths";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Route</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Update Route</h2>
    <p><?php echo $message; ?></p>
    <form method="post" action="update_route.php">
      <div id="input-fields">
        <!-- Display existing routes with corresponding stations -->
        <?php
        $sql = "SELECT * FROM admin_route";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $route = $row['route'];
                $station = $row['station'];
                echo '<input type="text" name="route_number[]" class="form-control mb-2" value="'.$route.'" readonly>';
                echo '<input type="text" name="station[]" class="form-control mb-2" value="'.$station.'">';
            }
        }
        ?>
      </div>
      <button type="button" class="btn btn-primary mr-2" onclick="addInputFields()">Add</button>
      <button type="button" class="btn btn-danger" onclick="removeInputFields()">Remove</button>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function addInputFields() {
        var input1 = document.createElement('input');
        var input2 = document.createElement('input');

        input1.setAttribute('type', 'text');
        input1.setAttribute('name', 'route_number[]');
        input1.setAttribute('class', 'form-control mb-2');
        input1.setAttribute('placeholder', 'Enter Route No.');

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
