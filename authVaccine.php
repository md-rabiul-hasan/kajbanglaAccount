<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['process_id']) and isset($_POST['opt']))
{
	$process_id=$_POST['process_id'];
	$opt=$_POST['opt'];
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT vaccine_id FROM vaccine WHERE vaccine_id='$process_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1){
		$status=1;
			$q=mysqli_query($con,"UPDATE vaccine set status='$status',auth_by_vac='$user_id',auth_dt_vac='$dt' WHERE vaccine_id='$process_id'");
		if($q)
			$response=1;
		else
			$response=0;
		}
		else{
		$status=2;
		$q=mysqli_query($con,"UPDATE vaccine set status='$status',auth_by_vac='$user_id',auth_dt_vac='$dt' WHERE vaccine_id='$process_id'");
		
		if($q)
			$response=2;
		else
			$response=0;
		}	
		
	}
	else
		$response=0;
}

print $response;
?>