<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

?>

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


	$appno = mysqli_real_escape_string($con, uniqid());

	$msql = "insert into `exam` (`clgname`,`cname`,`roll`,`enroll`,`year`,`sem`,`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`sub6`,`appno`) values('$clgname','$cname','$roll','$enroll','$year','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$appno')";
	if($con->query($msql)==true)
		



	$sql = "insert into `student` (`studentid`,`fname`,`lname`,`email`,`phone`,`dob`,`fathername`,`mothername`,`gender`,`category`,`address`) values('$roll','$fname','$lname','$email','$phone','$dob','$fathername','$mothername','$gender','$category','$address')";
	if($con->query($sql)==true)
	




	$filename1 = $_FILES["imgupload"]["name"];
	$tempname1 = $_FILES["imgupload"]["tmp_name"];

	$filename2 = $_FILES["signupload"]["name"];
	$tempname2 = $_FILES["signupload"]["tmp_name"];

	$file_ext1 = explode('.', $filename1);
	$file_ext2 = explode('.', $filename2);
	$file_ext_check1 = strtolower(end($file_ext1));
	$file_ext_check2 = strtolower(end($file_ext2));
	$valid_ext = array('png', 'jpg', 'jpeg');
	if ((in_array($file_ext_check1, $valid_ext)) && (in_array($file_ext_check1, $valid_ext))) {
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


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Exam Registration Fee Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
	<style>
		table{
			width: 1000px;
			height: 100px;
			background-color: #7d7a85db;
			font-size: 1.5rem;
		}
		td:nth-child(2){
			width: 300px;
		}
		td{
			padding: 10px 0px;
		}
		h1{
			background-color: #040737;
			color: white;
			padding: 10px 0px;
		}
	</style>
</head>

<body>
	<h1 style="text-align: center;">Exam Fee</h1>
	<pre>
	</pre>
	<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$roll = $_POST['roll'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$collegeexam = $_POST['cname'];

	$select = "select appno from exam where roll='$roll'";
	$query = mysqli_query($con, $select);
	$res = mysqli_fetch_array($query);
	?>
	<form method="post" action="pgRedirect.php">
		<table border="1" style="margin: auto; border-collapse:collapse; ">
			<tbody>
				<tr>
					<!-- <th>S.No</th>
					<th>Label</th>
					<th>Value</th> -->
					<th style="width: 0;border:none"></th>
					<th colspan="2">Student Details</th>
				</tr>
				<tr>
					<!-- <td>1</td> -->
					<!-- <td><label>ORDER_ID::*</label></td> -->
					<td style="width: 0;border:none"><input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>"></td>
					<td>Name</td>
					<td><?php echo $fname . " " . $lname ?></td>
					</td>
				</tr>
				<tr>
					<td style="width: 0;border:none"></td>
					<td>Roll No.</td>
					<td><?php echo $roll ?></td>
				</tr>
				<tr>
					<!-- <td>2</td> -->
					<!-- <td><label>CUSTID ::*</label></td> -->
					<td style="width: 0; border:none"><input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
					<td>Phone No.</td>
					<td><?php echo $phone ?></td>
				</tr>
				<tr>
					<!-- <td>3</td> -->
					<!-- <td><label>INDUSTRY_TYPE_ID ::*</label></td> -->
					<td style="width: 0; border:none"><input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
					<td>Email</td>
					<td><?php echo $email ?></td>
				</tr>
				<tr>
					<!-- <td>4</td> -->
					<!-- <td><label>Channel ::*</label></td> -->
					<td style="width: 0; border:none"><input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
					<td>Exam</td>
					<td><?php echo $collegeexam ?></td>
				</tr>
				<tr>
					<!-- <td>5</td> -->
					<!-- <td><label>txnAmount*</label></td> -->
					<td style="width: 0;border:none"></td>
					<td><b> Application Number</b></td>
					<td><?php echo $res['appno'] ?></td>
				</tr>
				<tr>
					<td style="width: 0;border:none"></td>
					<td>Exam Fees</td>
					<td colspan="3"><input style="background-color: #7d7a85db; width:200px; font-size:1.5rem;box-shadow:inset -2px -2px 5px #474747cc" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="250"  >
					</td>
				</tr>
				<tr>
					<td style="width: 0;border:none"></td>
					<td colspan="2"><input style="width: 200px; height:50px;margin:10px 350px;color:white;cursor:pointer;background-color:#285c03d9;border-radius:10px; box-shadow:inset 2px 2px 5px white,inset -2px -2px 10px black ;" value="Pay Fee" type="submit" onclick=""></td>
				</tr>
			</tbody>
		</table>

	</form>
</body>

</html>