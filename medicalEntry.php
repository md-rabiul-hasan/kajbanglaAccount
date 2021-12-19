<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['medical_center']) and isset($_POST['status']) and isset($_POST['medical_dt']) and isset($_POST['medical_country']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$medical_center=$_POST['medical_center'];
	$medical_dt=date("Y-m-d",strtotime($_POST['medical_dt']));
	$status=$_POST['status'];
	$medical_remarks=$_POST['medical_remarks'];
	$medical_country=$_POST['medical_country'];
	$data=getPassportStatus($con,$passport);
	
		$qInsert=mysqli_query($con,"INSERT INTO `medical`(`passport_no`,  `medical_center`, `medical_dt`, `medical_status`,`status`, `entry_dt_medical`, `entry_by_medical`, `auth_by_medical`, `auth_dt_medical`,`medical_remarks`,`medical_country`) VALUES ('$passport','$medical_center','$medical_dt','$status','1','$entry_dt','$user_id','','','$medical_remarks','$medical_country')");
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