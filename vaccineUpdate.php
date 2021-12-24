<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']))
{
	$user_id     = $_SESSION['user_id'];
	$entry_dt    = date('Y-m-d');
	$passport    = $_POST['passport'];
	$vaccine_id  = $_POST['vaccine_id'];
	$vac_remarks = $_POST['vac_remarks'];
	$vac_1_dt    = date('Y-m-d',strtotime($_POST['vac_1_dt']));
	$vac_2_dt    = date('Y-m-d',strtotime($_POST['vac_2_dt']));
	$data        = getPassportStatusVacc($con,$passport);
	if(isset($_POST['vaccine_id'])) 
	{
		if(empty($_POST['vac_1_dt']))
		{
			$vac_1_dt='0000-00-00';
		}
		if(empty($_POST['vac_2_dt']))
		{
			$vac_2_dt='0000-00-00';
		}
		//$preStatus=$data['previous_status'];
		// if($data['status']=='4' and $data['training_ceftificate']=='YES' and $data['fingering']=='YES')//training  done
		// {

            $sql = "UPDATE vaccine SET 
                  passport_no     = '$passport',
                  vaccine_1_dt    = '$vac_1_dt',
                  vaccine_2_dt    = '$vac_2_dt',
                  vaccine_remarks = '$vac_remarks',
                  status          = '0',
                  entry_by_vac    = '$user_id',
                  entry_dt_vac    = '$entry_dt'
            WHERE vaccine_id      = '$vaccine_id'";


			$qInsert=mysqli_query($con, $sql);
			if($qInsert)
			{
				echo $response=1;//success
                die();
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