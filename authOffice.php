<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['office_id']) and isset($_POST['opt']))
{
	$office_id=$_POST['office_id'];
	$opt=$_POST['opt'];
	
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT office_id FROM office WHERE office_id='$office_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1)
		$status=1;
		else
		$status=3;	
		$q=mysqli_query($con,"UPDATE office set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE office_id='$office_id'");
		if($q)
		$response=1;
		else
			$response=0;
	}
	else
		$response=0;
}

print $response;
?>