<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$vac_remarks=$_POST['vac_remarks'];
	$vac_1_dt=date('Y-m-d',strtotime($_POST['vac_1_dt']));
	$vac_2_dt=date('Y-m-d',strtotime($_POST['vac_2_dt']));
	$data=getPassportStatusVacc($con,$passport);
	if(empty($data['vaccine_1_dt'])) 
	{
		if(empty($_POST['vac_1_dt']))
		{
			$vac_1_dt='0000-00-00';
		}
		if(empty($_POST['vac_2_dt']))
		{
			$vac_2_dt='0000-00-00';
		}
		$preStatus=$data['previous_status'];
		// if($data['status']=='4' and $data['training_ceftificate']=='YES' and $data['fingering']=='YES')//training  done
		// {
			$qInsert=mysqli_query($con,"INSERT INTO `vaccine`( `passport_no`, `vaccine_1_dt`, `vaccine_2_dt`, `vaccine_remarks`, `status`, `entry_by_vac`, `entry_dt_vac`, `auth_by_vac`, `auth_dt_vac`) VALUES ('$passport','$vac_1_dt','$vac_2_dt','$vac_remarks','1','$user_id','$entry_dt','','')");
			if($qInsert)
			{
				$response=1;//success
			}
			else
			{
				$response=2;//db failed
			}
		// }
		// else
		// {
		// 	$response=5;
		// }
	}
	elseif(!empty($data['vaccine_1_dt']) and empty($data['vaccine_2_dt']))
	{
		
		$vac_1_dt=$data['vaccine_1_dt'];
		
		if(empty($_POST['vac_2_dt']))
		{
			$vac_2_dt='0000-00-00';
		}
		$preStatus=$data['status'];
		// if($data['status']=='4' and $data['training_ceftificate']=='YES' and $data['fingering']=='YES')//training  done
		// {
			$qInsert=mysqli_query($con,"UPDATE `vaccine` SET `vaccine_1_dt`='$vac_1_dt',`vaccine_2_dt`='$vac_2_dt',`vaccine_remarks`='$vac_remarks',`entry_by_vac`='$user_id',`entry_dt_vac`='$entry_dt',`status`='0' WHERE passport_no='$passport'");
			if($qInsert)
			{
				$response=1;//success
			}
			else
			{
				$response=2;//db failed
			}
		// }
		// else
		// {
		// 	$response=5;
		// }
	}
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>