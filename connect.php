<?php
$server_name= "localhost";
$user_name= "root";
$password= "";
$database_name= "e-logbook";
$conn= mysqli_connect($server_name , $user_name , $password , $database_name); 
if (!$conn) { 
echo "not connected" ; 
}
?> 