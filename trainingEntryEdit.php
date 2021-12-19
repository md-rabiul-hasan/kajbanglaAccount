<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['finger'])  and isset($_POST['training']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$finger=$_POST['finger'];
	$training=$_POST['training'];
	if($finger==1)
		$finger="YES";
	else
		$finger="NO";
	if($training==1)
		$training="YES";
	else
		$training="NO";
	// $data=getPassportStatus($con,$passport);
	// $previousStatus=$data['status'];
	// if(!empty($data['training_ceftificate']) and !empty($data['fingering']))//Authorized  Training
	// {
		$qInsert=mysqli_query($con,"UPDATE `training` SET `fingering`='$finger',`training_ceftificate`='$training',`entry_by_t_f`='$user_id',`entry_dt_t_f`='$entry_dt',`status`='0' WHERE passport_no='$passport'");
		
	
		if($qInsert)
		{
			$response=1;//success
		}
		else
		{
			$response=2;//db failed
		}
	// }
	// else
	// {
	// 	$response=5;
	// }
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>