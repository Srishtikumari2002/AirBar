<?php
session_start();

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
$id = $_SESSION['id'];

$sql="UPDATE users SET email='$email', name='$name' WHERE id='$id'";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo 0 ;
    exit;
}

echo 1;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
mysqli_close($conn);
?>