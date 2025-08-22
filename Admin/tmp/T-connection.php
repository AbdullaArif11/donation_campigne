<?php
$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'temp');

$Name = $_POST['Name'];
$ID = $_POST['ID'];
$Email = $_POST['Email'];
$Rank = $_POST['Rank'];
$OTP = $_POST['OTP'];


$query = "INSERT INTO police_admin(Name, ID, Email, Rank, OTP)
VALUES ('$Name','$ID','$Email','$Rank','$OTP')";

mysqli_query($con, $query);

if($con){
  echo "connected";
}else{
  echo "Connection Error!";
}


?>