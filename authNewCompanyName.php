<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['company_id']) and isset($_POST['opt']))
{
	$company_id=$_POST['company_id'];
	$opt=$_POST['opt'];
	
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT company_id FROM company WHERE company_id='$company_id'");
	if(mysqli_num_rows($q)>0)
	{	
		if($opt==1){
		$status=1;
			$q=mysqli_query($con,"UPDATE company set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE company_id='$company_id'");
		if($q)
			$response=1;
		else
			$response=0;
		}
		else{
		$status=2;
		$q=mysqli_query($con,"UPDATE company set status='$status',auth_by='$user_id',auth_dt='$dt' WHERE company_id='$company_id'");
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