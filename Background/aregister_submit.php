<?php
include("mysql_details.php");

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
    echo 0;
    exit;
}


$name=$_POST['name'];
$email = $_POST['email'];
$psd = $_POST['psd'];

$sql="INSERT INTO users (name, email, psd, level) VALUES ('$name', '$email', '$psd',1)";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo 0 ;
    exit;
}

echo 1;
mysqli_close($conn);
?>