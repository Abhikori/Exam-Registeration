<?php

include 'dbcon.php';
$selectquery="select * from student where phone='7456942028'";
$query=mysqli_query($con,$selectquery);
$nums=mysqli_num_rows($query);
while($res=mysqli_fetch_array($query)){
    echo $res['phone']."<br>";
}

?>