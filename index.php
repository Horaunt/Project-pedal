<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="pedalpalsfin";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn) {
echo "Connection successful";
}
else{
    echo " Not Connected";
}

echo "heyyy";
$a = $_POST['name'];
$b = $_POST['owner_reg_no'];
$c= $_POST['location'];
$d=$_POST['make'];
$e=$_POST['model'];
$f=$_POST['gear'];
$g=$_POST['clr'];

echo $a;
echo $b;
echo $c;
echo $d;
echo $e;
echo $f;
echo $g;




$sql="INSERT INTO `cycles` (`name`, `reg`,`loc`, `make`, `model`, `gear`, `colour`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";

$query = mysqli_query($conn, $sql);
if ($query) {
  echo "all New record created successfully";
       
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

/*

?><?php

// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'pedalpalsfin';

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
// if($con->query($sql))

?>*/
?>