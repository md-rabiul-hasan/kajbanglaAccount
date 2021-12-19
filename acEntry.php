<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['remarks']) and isset($_POST['amt']) and isset($_POST['gl_type']) and isset($_POST['gl_id']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$remarks=$_POST['remarks'];
	$amt=$_POST['amt'];
	$gl_type=$_POST['gl_type'];
	$gl_id=$_POST['gl_id'];
	$qInsert=mysqli_query($con,"INSERT INTO `transactions`(`gl_id`, `transaction_type`, `amount`, `status`, `remarks`, `entry_by`, `entry_dt`, `auth_by`, `auth_dt`) VALUES ('$gl_id','$gl_type','$amt','0','$remarks','$user_id','$entry_dt','','')");
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
		$response=4;//field missing
}

print $response;
?>