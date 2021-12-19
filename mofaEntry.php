<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['mofa_remarks']) and isset($_POST['mofa_dt']) )
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$mofa_remarks=$_POST['mofa_remarks'];
	$mofa_dt=date("Y-m-d",strtotime($_POST['mofa_dt']));
	$qInsert=mysqli_query($con,"INSERT INTO `mofa`( `passport_no`, `mofa_dt`, `mofa_remakrs`, `status`, `entry_by_mofa`, `entry_dt_mofa`, `auth_by_mofa`, `auth_dt_mofa`) VALUES ('$passport','$mofa_dt','$mofa_remarks','1','$user_id','$entry_dt','','')");
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