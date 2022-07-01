<?php
if(isset($_POST['']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aftersignin.css">
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
    <?php
    include 'dbcon.php';
    $appno=$_POST['appno'];
    // if(mysqli_num_rows($result)==0){
    //   echo "not a row";
    // }
    $select="select *from exam join student on student.studentid=exam.roll where exam.appno='$appno'";
    $query=mysqli_query($con,$select);
    $res = mysqli_fetch_array($query);
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo $res['fname'].' '.$res['lname'] ?></td>
        </tr>
        <tr>
            <td>Roll Number</td>
            <td><?php echo $res['roll'] ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?php echo $res['phone'] ?></td>
        </tr>
        <tr>
            <td>E-Mail ID</td>
            <td><?php echo $res['email'] ?></td>
        </tr>
        <tr>
            <td>Application Number</td>
            <td><?php echo $res['appno'] ?></td>
        </tr>
    </table>
    <div class="first" id="first" ><h1>
        <a href="admitcard.php?appno=<?=$appno?>"> View Admit Card</a></h1></div>
    <div class="second" id="second"><h1>
        <a href="update.php?appno=<?=$appno?>">Update your Form</a></h1></div>

    
</body>
</html>