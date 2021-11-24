<?php
$db_hostname="localhost:3308";
$db_username="root";
$db_password="python trial";
$db_name="airbar";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
    echo 0;
    exit;
}


$name=$_POST['name'];
$email = $_POST['email'];
$psd = $_POST['psd'];

$sql="INSERT INTO users (name, email, psd) VALUES ('$name', '$email', '$psd')";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo 0 ;
    exit;
}

echo 1;
mysqli_close($conn);
?>