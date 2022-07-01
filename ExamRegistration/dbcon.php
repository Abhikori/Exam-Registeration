<?php

$server="localhost";
$user="root";
$password="";
$db="college";
$con=mysqli_connect($server,$user,$password,$db);
if($con){
    // echo "Connection successfull";
}
else{
    echo "no connection";
}

?>