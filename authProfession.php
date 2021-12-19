<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['profession_id']) and isset($_POST['opt']))
{
	$profession_id=$_POST['profession_id'];
	$opt=$_POST['opt'];
	
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT profession_id FROM profession WHERE profession_id='$profession_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1){
		$status=1;
			$q=mysqli_query($con,"UPDATE profession set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE profession_id='$profession_id'");
		if($q)
			$response=1;
		else
			$response=0;
		}
		else{
		$status=2;
		$q=mysqli_query($con,"UPDATE profession set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE profession_id='$profession_id'");
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