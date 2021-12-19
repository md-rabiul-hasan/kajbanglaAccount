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
	// if($data['status']=='3')//Visa  done
	// {
		$qInsert=mysqli_query($con,"INSERT INTO `training`( `passport_no`, `training_ceftificate`, `fingering`, `status`, `entry_by_t_f`, `entry_dt_t_f`, `auth_by_t_f`, `auth_dt_t_f`) VALUES ('$passport','$training','$finger','1','$user_id','$entry_dt','','')");
		
	
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