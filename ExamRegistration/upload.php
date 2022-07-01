<?php 

include 'dbcon.php';

if(isset($_POST['imgsubmit'])){
    $filename = $_FILES["imgupload"]["name"];
    $tempname = $_FILES["imgupload"]["tmp_name"];    
    
    $file_ext=explode('.',$filename);
    $file_ext_check=strtolower(end($file_ext));
    $valid_ext=array('png','jpg','jpeg');
    if(in_array($file_ext_check,$valid_ext)){
        $folder = "upload/".$filename;
        // $desfile='uplaod/'.$filename;
        // echo $desfile;
        move_uploaded_file($tempname,$folder);
        $insql="insert into upload (pic) values ('$folder')";
        $query=mysqli_query($con,$insql);
    }
    else{
        echo "Not valid extension";
    }

       
        // if($query)
        //     echo "Insert";
        // else    
        //     echo "not";
}
if(isset($_POST['signsubmit'])){
    $filename = $_FILES["signupload"]["name"];
    $tempname = $_FILES["signupload"]["tmp_name"];  
    $folder = "upload/".$filename;
    move_uploaded_file($tempname,$folder);
    $insql="insert into upload (sign) values ('$folder')";
    $query=mysqli_query($con,$insql);
    if($query)
            echo "Insert";
        else    
            echo "not";
} 

?> 


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload.css">
    <title>Upload</title>
</head>
<body>
    <div class="upld">
        <h3>Upload your Photo and Sign</h3>
    </div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="upldimg">
            <p> Select image to upload</p>
            <input type="file" name="imgupload" id="imgupload" class="select">
            <input type="submit" value="Upload Image" name="imgsubmit" class="btn">
        </div>
        <br><br>
        <div class="upldsign">
            <p>Select sign to upload</p>
            <input type="file" name="signupload" id="signupload" class="select">
            <input type="submit" value="Upload sign" name="signsubmit" class="btn">
        </div>
        <div class="submitdoc">
            <button type="submit" name="submit" >Submit</button>
        </div>
      </form>
</body>
</html> -->