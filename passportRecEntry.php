<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['bearer_name']) and isset($_POST['sub_dt']) and isset($_POST['office']) and isset($_POST['remarks']) and isset($_POST['doc']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$bearer_name=$_POST['bearer_name'];
	$sub_dt=date("Y-m-d",strtotime($_POST['sub_dt']));
	$office=$_POST['office'];
	$doc=implode(",",$_POST['doc']);
	$remarks=$_POST['remarks'];
	
	$qInsert=mysqli_query($con,"INSERT INTO `passport_received`( `passport_no`, `bearer_name`, `sub_dt`, `office`, `doc`, `remarks`, `status`, `entry_by_rec`, `entry_dt_rec`, `auth_by_rec`, `auth_dt_rec`) VALUES ('$passport','$bearer_name','$sub_dt','$office','$doc','$remarks','0','$user_id','$entry_dt','','')");
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