<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['visa_dt']) and isset($_POST['visa']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$visa=$_POST['visa'];
	$visa_dt=date('Y-m-d',strtotime($_POST['visa_dt']));
	$days=90;
	$Exdate = strtotime("+".$days." days", strtotime($visa_dt));
	$visa_exp_dt=date('Y-m-d',$Exdate);
	$data=getPassportStatusPc($con,$passport);

	$visa_dir_name = "uploads/visa/";
	$visa_base_name = basename($_FILES["upload_visa_img"]["name"]);
	$visa_file_ext = pathinfo($visa_base_name, PATHINFO_EXTENSION);
	$visa_file_name = date('YmdHis') . '.' . $visa_file_ext;
	$visa_target_file = $visa_dir_name . $visa_file_name;
	$visa_upload = move_uploaded_file($_FILES["upload_visa_img"]["tmp_name"], $visa_target_file);

	$visa_img_path=$visa_target_file;
	if(!empty($data['police_c_no']))//PC  done
	{
		$qInsert=mysqli_query($con,"INSERT INTO `visa`( `passport_no`, `visa_no`, `visa_img`, `visa_dt`, `visa_expire_dt`, `entry_by_visa`, `entry_dt_visa`, `auth_by_visa`, `auth_dt_visa`,`status`) VALUES ('$passport','$visa','$visa_img_path','$visa_dt','$visa_exp_dt','$user_id','$entry_dt','','','1')");
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
		$response=5;
	}
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>