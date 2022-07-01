<?php
include 'dbcon.php';
$appno = $_GET['appno'];
if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $fathername = mysqli_real_escape_string($con, $_POST['fathername']);
    $mothername = mysqli_real_escape_string($con, $_POST['mothername']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $dob = date('Y-m-d', strtotime($_POST['dob']));

    $update = "update student join exam on student.studentid=exam.roll set fname='$fname',lname='$lname',dob='$dob',fathername='$fathername',mothername='$mothername',address='$address' where exam.appno='$appno'";
    if($con->query($update)==true)
        echo "";
    else echo "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>Document</title>
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
    <h1>You Can Change Only These Fields</h1>

    <form action="" method="post">
        <table>
            <?php
            include 'dbcon.php';
            $appno = $_GET['appno'];
            $select = "select *from exam join student on student.studentid=exam.roll where exam.appno='$appno'";
            $query = mysqli_query($con, $select);
            $res = mysqli_fetch_array($query);
            ?>
            <tr>
                <td>First name</td>
                <td><input type="text" name="fname" value=" <?php echo $res['fname'] ?>"></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="lname" value="<?php echo $res['lname'] ?>"></td>
            </tr>
            <tr>
                <td>D.O.B</td>
                <td><input type="text" name="dob" min="1990-01-01" max="2005-12-31" value="<?php echo $res['dob'] ?>"></td>
            </tr>
            <tr>
                <td>Father name</td>
                <td><input type="text" name="fathername" value="<?php echo $res['fathername'] ?>"></td>
            </tr>
            <tr>
                <td>Mother name</td>
                <td><input type="text" name="mothername" value="<?php echo $res['mothername'] ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $res['address'] ?>"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>