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
	$data=getPassportStatusSales($con,$passport);
	if(!empty($data['sale_amt']))
	{
		$qInsert=mysqli_query($con,"INSERT INTO `passport_position`( `passport_no`, `bearer_name`, `sub_dt`, `office`, `doc`, `remarks`, `status`, `entry_by_pos`, `entry_dt_pos`, `auth_by_pos`, `auth_dt_pos`) VALUES ('$passport','$bearer_name','$sub_dt','$office','$doc','$remarks','1','$user_id','$entry_dt','','')");
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
		$response=5;//Sale not done
	}
	
		
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>