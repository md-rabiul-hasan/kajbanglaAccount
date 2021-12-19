<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['pcr']) )
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$pcr=$_POST['pcr'];
	$pcr_dt=date("Y-m-d",strtotime($_POST['pcr_dt']));
	if(empty($_POST['pcr_dt']))
		$pcr_dt='0000-00-00';
	
	
		$qInsert=mysqli_query($con,"UPDATE pcr SET status='0',pcr_test='$pcr',next_pcr_dt='$pcr_dt',entry_by_pcr='$user_id',entry_dt_pcr='$entry_dt' WHERE passport_no='$passport'");
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