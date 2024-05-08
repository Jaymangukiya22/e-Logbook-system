<?php
include 'connect.php';

if(isset($_POST['val'])){
    $srch = $_POST['val'];
    $query = "SELECT ts.date_start, ts.route, ts.time_start, te.time_end, ts.km_start, te.km_end, ts.fuel_start, te.fuel_end 
          FROM trip_start ts 
          INNER JOIN trip_end te ON ts.route = te.route
          WHERE ts.date_start LIKE '%$srch%' OR 
                ts.route LIKE '%$srch%' OR 
                ts.time_start LIKE '%$srch%' OR 
                te.time_end LIKE '%$srch%' OR 
                ts.km_start LIKE '%$srch%' OR 
                te.km_end LIKE '%$srch%' OR 
                ts.fuel_start LIKE '%$srch%' OR 
                te.fuel_end LIKE '%$srch%'";

    $query_run = mysqli_query($conn, $query);
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
            <form action="logbook_search.php" method="post" id="searchForm">
                <div id="input-fields">
                    <input type="text" id="ip" name="val" class="form-control mb-3" style="width: 300px;display:inline;margin-left:40px;" placeholder="Search" value="<?php echo $srch; ?>">
                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
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
                    if(mysqli_num_rows($query_run) > 0){
                        while($row = mysqli_fetch_array($query_run)){
                            echo '<tr>
                                    <th scope="row">'.$row['date_start'].'</th>
                                    <td>'.$row['route'].'</td>
                                    <td>'.$row['time_start'].'</td>
                                    <td>'.$row['time_end'].'</td>
                                    <td>'.$row['km_start'].'</td>
                                    <td>'.$row['km_end'].'</td>
                                    <td>'.$row['fuel_start'].'</td>
                                    <td>'.$row['fuel_end'].'</td>
                                  </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="8">No Record Found!</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}
?>
