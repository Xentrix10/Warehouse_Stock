<?php
$servername = "sql203.epizy.com";
$username = "epiz_31841586";
$password = "8NiAmuumRLJtMC";
$dbname = "epiz_31841586_wh";

$con = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>