<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div id="table">
<h3 style="margin-left:40px; margin-bottom:20px;font-weight: 700;color: #3e8e41; ">Logbook</h3>
<table class="table" style="margin-left:40px;">
  <thead>
    <tr>
    
      <th scope="col">Date</th>
      <th scope="col">Route</th>
      <th scope="col">Start-Time</th>
      <th scope="col">End-Time</th>
      <th scope="col">KM. Reading at Start</th>
      <th scope="col">KM. Reading at End</th>
      <th scope="col">Fuel Level at Start</th>
      <th scope="col">Fuel Level at End</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from trip_start";
    $sql1 = "select * from trip_end ";
    $res = mysqli_query($conn,$sql1);
    $result = mysqli_query($conn,$sql);
    if($result && $res){
        while($row=mysqli_fetch_assoc($result)){
            $row1=mysqli_fetch_assoc($res); 
            $date_start = $row['date_start'];
            $route = $row1['route'];
            $time_start = $row['time_start'];
            $time_end = $row1['time_end'];
            $km_start = $row['km_start'];
            $km_end = $row1['km_end'];
            $fuel_start = $row['fuel_start'];
            $fuel_end = $row1['fuel_end'];
            echo'<tr>
            <th scope="row">'.$date_start.'</th>
            <td>'.$route.'</td>
            <td>'.$time_start.'</td>
            <td>'.$time_end.'</td>
            <td>'.$km_start.'</td>
            <td>'.$km_end.'</td>
            <td>'.$fuel_start.'</td>
            <td>'.$fuel_end.'</td>

            
            
          </tr>';
        }
        
    }
    
    ?>
    
  </tbody>
</table>
</div>
</body>
</html>