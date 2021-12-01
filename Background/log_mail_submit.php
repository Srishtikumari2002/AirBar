<?php

include("mysql_details.php");
session_start();

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
    echo 0;
    exit;
}


$email = $_POST['email'];

$sql="select * from users";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo 0;
    exit;
}


while($row=mysqli_fetch_assoc($result)){
    if($row["email"]==$email){
        $abc=1;
        echo 1;
        break;
    }
    else{
        $abc=0;
    }
}

if($abc==0){
    echo 2;
}

mysqli_close($conn);

?>