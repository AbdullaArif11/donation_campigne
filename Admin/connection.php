<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "web_technology_lab_project";
$con = new mysqli($servername, $username, $password, $db_name);
if($con->connect_error){
  die("Connection failed".$con->connect_error);
}else{
  echo "";
}
?>