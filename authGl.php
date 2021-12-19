<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['gl_id']) and isset($_POST['opt']))
{
	$gl_id=$_POST['gl_id'];
	$opt=$_POST['opt'];
	
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT gl_id FROM gl_head WHERE gl_id='$gl_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1){
		$status=1;
			$q=mysqli_query($con,"UPDATE gl_head set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE gl_id='$gl_id'");
		if($q)
			$response=1;
		else
			$response=0;
		}
		else{
		$status=3;
		$q=mysqli_query($con,"UPDATE gl_head set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE gl_id='$gl_id'");
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