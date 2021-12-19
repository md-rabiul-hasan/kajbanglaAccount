<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['pc_no']) )
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$pc_no=$_POST['pc_no'];
	$qInsert=mysqli_query($con,"INSERT INTO `pc`( `passport_no`,`police_c_no`,`entry_by_pc`,`entry_dt_pc`,`status`) VALUES ('$passport','$pc_no','$user_id','$entry_dt','1')");
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