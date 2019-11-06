<?php
	session_start();
	include('includes/dbconnection.php');
	error_reporting(0);

	if(isset($_POST['botp']))
	{
		if($_SESSION['otp'] == $_POST['getotp'])
		{
			$userid=$_SESSION['detsuid'];
			$cpassword=$_SESSION['cpassword'];
			$newpassword=$_SESSION['npassword'];
			$query=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
			$row=mysqli_fetch_array($query);
			if($row>0){
			$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
			$msg= "Your password successully changed";
			header("Location: dashboard.php");
			} 
			else {
				$msg="Your current password is wrong";
			}
		}
	}


?>



<!DOCTYPE html>
<html>
<head>
	<title>OTP</title>
</head>
<body>
	<form action = "<?php $_PHP_SELF?>" method = "POST">
		OTP : <input type="text" name="getotp" required />
		<br><br><button type="submit" name="botp">Submit</button>
	</form>
</body>
</html>