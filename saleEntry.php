<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['company']) and isset($_POST['purchase_amt']) and isset($_POST['sale_amt']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$purchase_amt=$_POST['purchase_amt'];
	$sale_amt=$_POST['sale_amt'];
	$company=$_POST['company'];
	$profession_id=$_POST['profession_id'];
	$data=getPassportStatusMed($con,$passport);
	if($data['status']==1 and $data['medical_status']==2)//medical done and fit
	{
		$qInsert=mysqli_query($con,"INSERT INTO `sales`(`passport_no`, `company_id`, `sale_amt`, `purchase_amt`, `status`, `entry_by_sale`, `entry_dt_sale`, `auth_by_sale`, `auth_dt_sale`,`profession`) VALUES ('$passport','$company','$sale_amt','$purchase_amt','1','$user_id','$entry_dt','','','$profession_id')");
		if($qInsert)
		{
			$response=1;//success
		}
		else
		{
			$response=2;//db failed
		}
	}
	elseif($data['status']=='S')//already pending
	{
		$response=6;
	}
	else
	{
		$response=5;
	}
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>