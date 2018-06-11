<?php
$host = 'localhost';
$uname = "root";
$pwd = "";
$db = "webhncom_aeo";
 
$con = new mysqli($host,$uname,$pwd,$db);

mysqli_set_charset($con,"utf8");
?>