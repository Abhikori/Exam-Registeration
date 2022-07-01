<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admitcard.css">
    <title>Admit Card</title>
</head>

<body>
    <nav>
        <div class="top">
            <h3 style="color: white;">Ministry of Education</h3>
            <p style="color: white;">Governmnet of India</p>
            <h2>Exam Registeration Portal</h2>
        </div>
        <div class="bottom">
            <p>Home</p>
        </div>
    </nav>
    <div class="main">
        <div class="card">
            <h1>Admit Card </h1>
        </div>
        <hr>

        <?php

        include 'dbcon.php';
        $app = mysqli_real_escape_string($con, $_GET['appno']);
        $selectstudent = "select *from student";
        $selectexam = "select *from exam inner join student on student.studentid=exam.roll inner join upload on student.studentid=upload.studentid where exam.appno='$app'";


        $query = mysqli_query($con, $selectexam);
        // $query = mysqli_query($con, $selectphoto);
        $nums = mysqli_num_rows($query);
        $res = mysqli_fetch_array($query);

        ?>



        <div class="right">
            <div class="img">
                <img src="<?php echo $res['pic'] ?> " alt="">
            </div>
            <div class="sign">
                <img src="<?php echo $res['sign'] ?>" alt="">
            </div>
        </div>
        <table class="persondetails">
            <tr>
                <td>Name</td>
                <td> <?php echo $res['fname'] . " " . $res['lname'] ?></td>
            </tr>
            <tr>
                <td>Roll No.</td>
                <td> <?php echo $res['roll'] ?></td>
            </tr>
            <tr>
                <td>Enrollment No.</td>
                <td><?php echo $res['enroll'] ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $res['dob'] ?></td>
            </tr>
            <tr>
                <td>Father's Name / Mother's Name</td>
                <td><?php echo $res['fathername'] . " / " . $res['mothername'] ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $res['address'] ?></td>
            </tr>
            <tr>
                <td>Course</td>
                <td><?php echo $res['cname'] ?></td>
            </tr>
            <tr>
                <td>Year/Sem</td>
                <td><?php echo "Year " . $res['year'] . " / " . "Sem " . $res['sem'] ?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?php echo $res['category'] ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $res['gender'] ?></td>
            </tr>
            <tr>
                <td>College Studying</td>
                <td><?php echo $res['clgname'] ?></td>
            </tr>
            <tr>
                <td>Center</td>
                <td><?php echo $res['clgname'] ?></td>
            </tr>
        </table>
        <table class="examdetails">
            <tr>
                <th>Paper No.</th>
                <th>Paper Name</th>
            </tr>
            <tr>
                <td>1.)</td>
                <td><?php echo $res['sub1'] ?></td>
            </tr>
            <tr>
                <td>2.)</td>
                <td><?php echo $res['sub2'] ?></td>
            </tr>
            <tr>
                <td>3.)</td>
                <td><?php echo $res['sub3'] ?></td>
            </tr>
            <tr>
                <td>4.)</td>
                <td><?php echo $res['sub4'] ?></td>
            </tr>
            <tr>
                <td>5.)</td>
                <td><?php echo $res['sub5'] ?></td>
            </tr>
            <tr>
                <td>6.)</td>
                <td><?php echo $res['sub6'] ?></td>
            </tr>
        </table>

        <h1>Important Points</h1>
        <p>1.) The Candidate must read the instruction given to the cover page of the Question Booklet. </p>
        <p>2.) Candidate are Required to reach the Exam center at leat 30 min before the start of the test. </p>
        <p>3.) Candidate must bring the admit card and identity proof such as Aadhar card/Pan card for entry in the Exam center.</p>
        <p>4.) Candidate will not permited to leave the exam hall before the end of Exam.</p>
        <p>5.) Admit card is consisdered to be valid only if both photograph and signature are clear To ensure this admit card on A4 size paper using laser printer.</p>
        <p> <b>6.) Any type of Book/Calculator/Mobile are not allowed in Exam Hall </b></p>
    </div>
</body>

</html>