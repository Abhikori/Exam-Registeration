<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Exam Registration Fee Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1 style="text-align: center;">Exam Fee</h1>
	<pre>
	</pre>
	<?php
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$roll=$_POST['roll'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$collegeexam=$_POST['cname'];
	$appno=$_POST['appno'];
	?>
	<form method="post" action="pgRedirect.php">
		<table border="1" style="margin: auto;">
			<tbody>
				<tr>
					<!-- <th>S.No</th>
					<th>Label</th>
					<th>Value</th> -->
					<th>Student Details</th>
				</tr>
				<tr>
					<!-- <td>1</td> -->
					<!-- <td><label>ORDER_ID::*</label></td> -->
					<!-- <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
					name="ORDER_ID" autocomplete="off"
					value=" echo  "ORDS" . rand(10000,99999999)?>"> -->
					<td>Name</td>
					<td><?php echo $fname." ".$lname ?></td>
					</td>
				</tr>
				<tr>
					<td>Roll No.</td>
					<td><?php echo $roll ?></td>
				</tr>
				<tr>
					<!-- <td>2</td> -->
					<!-- <td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td> -->
					<td>Phone No.</td>
					<td><?php echo $phone ?></td>
				</tr>
				<tr>
					<!-- <td>3</td> -->
					<!-- <td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td> -->
					<td>Email</td>
					<td><?php echo $email ?></td>
				</tr>
				<tr>
					<!-- <td>4</td> -->
					<!-- <td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td> -->
					<td>Exam</td>
					<td><?php echo $collegeexam ?></td>
				</tr>
				<tr>
					<!-- <td>5</td> -->
					<!-- <td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td> -->
					<td><b> Application Number</b></td>
					<td><?php echo $appno ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		
	</form>
</body>
</html>