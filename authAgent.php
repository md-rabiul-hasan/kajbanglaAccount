<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['agent_id']) and isset($_POST['opt']))
{
	$agent_id=$_POST['agent_id'];
	$opt=$_POST['opt'];
	
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT agent_id FROM agent_info WHERE agent_id='$agent_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1){
		$status=1;
			$q=mysqli_query($con,"UPDATE agent_info set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE agent_id='$agent_id'");
		if($q)
			$response=1;
		else
			$response=0;
		}
		else{
		$status=3;
		$q=mysqli_query($con,"UPDATE agent_info set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE agent_id='$agent_id'");
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