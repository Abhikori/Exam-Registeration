<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {

   


    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $fathername = mysqli_real_escape_string($con, $_POST['fathername']);
    $mothername = mysqli_real_escape_string($con, $_POST['mothername']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $address = mysqli_real_escape_string($con, $_POST['address']);




    $clgname = mysqli_real_escape_string($con, $_POST['clgname']);
    $cname = mysqli_real_escape_string($con, $_POST['cname']);
    $roll = mysqli_real_escape_string($con, $_POST['roll']);
    $enroll = mysqli_real_escape_string($con, $_POST['enroll']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $sem = mysqli_real_escape_string($con, $_POST['sem']);
    $sub1 = mysqli_real_escape_string($con, $_POST['sub1']);
    $sub2 = mysqli_real_escape_string($con, $_POST['sub2']);
    $sub3 = mysqli_real_escape_string($con, $_POST['sub3']);
    $sub4 = mysqli_real_escape_string($con, $_POST['sub4']);
    $sub5 = mysqli_real_escape_string($con, $_POST['sub5']);
    $sub6 = mysqli_real_escape_string($con, $_POST['sub6']);

   
    $appno=mysqli_real_escape_string($con, uniqid());
    
    $msql = "insert into `exam` (`clgname`,`cname`,`roll`,`enroll`,`year`,`sem`,`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`sub6`,`appno`) values('$clgname','$cname','$roll','$enroll','$year','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$appno')";
   
    
    
   

    $sql = "insert into `student` (`studentid`,`fname`,`lname`,`email`,`phone`,`dob`,`fathername`,`mothername`,`gender`,`category`,`address`) values('$roll','$fname','$lname','$email','$phone','$dob','$fathername','$mothername','$gender','$category','$address')";



    
       
        $filename1 = $_FILES["imgupload"]["name"];
        $tempname1 = $_FILES["imgupload"]["tmp_name"];

        $filename2 = $_FILES["signupload"]["name"];
        $tempname2 = $_FILES["signupload"]["tmp_name"];
    
        $file_ext1 = explode('.', $filename1);
        $file_ext2 = explode('.', $filename2);
        $file_ext_check1 = strtolower(end($file_ext1));
        $file_ext_check2 = strtolower(end($file_ext2));
        $valid_ext = array('png', 'jpg', 'jpeg');
        if ((in_array($file_ext_check1, $valid_ext))&&(in_array($file_ext_check1, $valid_ext)) ) {
            $folder1 = "upload/" . $filename1;
            $folder2 = "upload/" . $filename2;
            // $desfile='uplaod/'.$filename;
            // echo $desfile;
            move_uploaded_file($tempname1, $folder1);
            move_uploaded_file($tempname2, $folder2);
            $insql = "insert into upload (pic,sign,studentid) values ('$folder1','$folder2','$roll')";
            $query = mysqli_query($con, $insql);
        } else {
            echo "Not valid extension";
        }
       header("TxnTest.php"); 
}


?>





<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newregistration.css">
    <title>New Registration</title>
</head>

<body>
    <div class="top">
        <h1>Registration Form</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="upper">
            <h3>Personal Details</h3>
        </div>
        <table class="pdetails">
            <tr>
                <td>First Name :</td>
                <td colspan="4"><input type="text" name="fname" id="fname" placeholder="Enter your first name" class="text"></td>
            </tr>
            <tr>
                <td>Last Name :</td>
                <td colspan="4"><input type="text" name="lname" id="lname" placeholder="Enter your last name" class="text"></td>
            </tr>
            <tr>
                <td>Email Id :</td>
                <td colspan="4"><input type="text" name="email" id="email" placeholder="Enter your email" class="text"></td>
            </tr>
            <tr>
                <td>Phone No. :</td>
                <td colspan="4"><input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="text"></td>
            </tr>
            <tr>
                <td>D.O.B :</td>
                <td colspan="4"><input type="date" name="dob" id="dob" value="" min="1990-01-01" max="2005-12-31" class="text"></td>
            </tr>
            <tr>
                <td>Father's Name :</td>
                <td colspan="4"><input type="text" name="fathername" id="fathername" placeholder="Enter your father name" class="text"></td>
            </tr>
            <tr>
                <td>Mother's Name :</td>
                <td colspan="4"><input type="text" name="mothername" id="mothername" placeholder="Enter your mother name" class="text"></td>
            </tr>

            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="gender" id="gender" value="male">Male</td>
                <td><input type="radio" name="gender" id="gender" value="female">Female</td>
                <td><input type="radio" name="gender" id="gender" value="other">Other</td>
            </tr>
            <tr>
                <td>Category :</td>
                <td><input type="radio" name="category" id="category" value="general">General</td>
                <td><input type="radio" name="category" id="category" value="obc">OBC</td>
                <td><input type="radio" name="category" id="category" value="sc">SC</td>
                <td><input type="radio" name="category" id="category" value="st">ST</td>
            </tr>
            <tr>
                <td>Address :</td>
                <td colspan="4"><textarea name="address" id="address" cols="70" rows="5" placeholder="Enter your Address"></textarea></td>
            </tr>
        </table>

        <div class="upper">
            <h3>Education Details</h3>
        </div>
        <table class="edetails">
            <tr>
                <td>College Name :</td>
                <td colspan="4"><input type="text" name="clgname" id="clgname" placeholder="Enter your College name" class="text"></td>
            </tr>
            <tr>
                <td>Course Name :</td>
                <td colspan="4"><input type="text" name="cname" id="cname" placeholder="Enter your Course name" class="text"></td>
            </tr>
            <tr>
                <td>Roll No. :</td>
                <td colspan="4"><input type="text" name="roll" id="roll" placeholder="Enter your Roll no." class="text"></td>
            </tr>
            <tr>
                <td>Enrollment No. :</td>
                <td colspan="4"><input type="text" name="enroll" id="enroll" placeholder="Enter your enrollment no." class="text"></td>
            </tr>
            <tr>
                <td>Year :</td>
                <td colspan="4"><input type="number" name="year" id="year" placeholder="Choose your Year" class="text" min="1" max="4"></td>
            </tr>
            <tr>
                <td>Semester :</td>
                <td colspan="4"><input type="number" name="sem" id="sem" placeholder="Choose your semester" class="text" min="1" max="8"></td>
            </tr>
            <tr>
                <td>Subject 1 :</td>
                <td colspan="4"><input type="text" name="sub1" id="sub1" placeholder="Enter your Subject" class="text"></td>
            </tr>
            <tr>
                <td>Subject 2 :</td>
                <td colspan="4"><input type="text" name="sub2" id="sub2" placeholder="Enter your Subject" class="text"></td>
            </tr>
            <tr>
                <td>Subject 3 :</td>
                <td colspan="4"><input type="text" name="sub3" id="sub3" placeholder="Enter your Subject" class="text"></td>
            </tr>
            <tr>
                <td>Subject 4 :</td>
                <td colspan="4"><input type="text" name="sub4" id="sub4" placeholder="Enter your Subject" class="text"></td>
            </tr>
            <tr>
                <td>Subject 5 :</td>
                <td colspan="4"><input type="text" name="sub5" id="sub5" placeholder="Enter your Subject" class="text"></td>
            </tr>
            <tr>
                <td>Subject 6 :</td>
                <td colspan="4"><input type="text" name="sub6" id="sub6" placeholder="Enter your Subject" class="text"></td>
            </tr>
        </table>
    </form>
        <form action="newregistration.php" method="post" enctype="multipart/form-data">
        <div class="upper">
            <h3>Upload your Photo and Sign</h3>
        </div>
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
            <button type="submit" name="submit" onclick="window.location.href='TxnTest.php'">Submit</button>
            <button type="reset" name="reset" style="background-color: #ff3131;">Reset</button>
        </div>
    </form>

</body>

</html> -->