<?php

// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'Shahid@2022';
$database = 'Pedalpalsfin';

// Establish database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$reg = $_POST['reg'];
$loc= $_POST['loc'];
$make=$_POST['make'];
$model=$_POST['model'];
$gear=$_POST['gear'];
$colour=$POST['colour'];
$sql="INSERT INTO `cycles` (`name`, `reg`,`loc`, `make`, `model`, `gear`, `colour`) VALUES ('$name', '$reg', '$loc', '$make', '$model', '$gear','$colour')";

echo $sql;
if($con->query($sql))

?>