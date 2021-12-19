<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport'])  and isset($_POST['status']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$status=$_POST['status'];
	$medical_remarks=$_POST['medical_remarks'];
	$data=getPassportStatusMed($con,$passport);
	$preMedStatus=$data['medical_status'];
	$preStatus=$data['status'];
	if($status==$preMedStatus)//same status so no update
	{
		$response=5;
	}
	else
	{
			$qInsert=mysqli_query($con,"UPDATE medical set medical_status='$status',medical_remarks='$medical_remarks',status='0',entry_by_medical='$user_id',entry_dt_medical='$entry_dt' WHERE passport_no='$passport'");

			if($qInsert)
			{
				$response=1;//success
			}
			else
			{
				$response=2;//db failed
			}
	}
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>