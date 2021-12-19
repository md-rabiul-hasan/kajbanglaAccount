<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['office_name']) and isset($_POST['office_rl_no']) and isset($_POST['office_email']) and isset($_POST['office_address']) and isset($_POST['office_phone_no']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$office_name=$_POST['office_name'];
	$office_rl_no=$_POST['office_rl_no'];
	$office_email=$_POST['office_email'];
	$office_address=$_POST['office_address'];
	$office_phone_no=$_POST['office_phone_no'];
	$q=mysqli_query($con,"SELECT office_id FROM office WHERE office_rl_no='$office_rl_no'");
	if(mysqli_num_rows($q)==0)
	{
		$qInsert=mysqli_query($con,"INSERT INTO `office`( `office_name`, `office_rl_no`, `office_phone_no`, `office_email`, `office_address`, `status`, `entry_by`, `entry_dt`) VALUES ('$office_name','$office_rl_no','$office_phone_no','$office_email','$office_address','0','user_id','$entry_dt')");
		if($qInsert)
		{
			$response=1;//success
		}
		else
		{
			$response=2;//db failed
		}
	}
	else
	{
		$response=3;//duplicate entry
	}
}
else
{
		$response=4;//field missing
}

print $response;
?>