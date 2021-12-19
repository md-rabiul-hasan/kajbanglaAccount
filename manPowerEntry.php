<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['mp_dt']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$mp_dt=date('Y-m-d',strtotime($_POST['mp_dt']));
	$data=getPassportStatusTF($con,$passport);
	$mp_dir_name = "uploads/manpower/";
	$mp_base_name = basename($_FILES["upload_mp_img"]["name"]);
	$mp_file_ext = pathinfo($mp_base_name, PATHINFO_EXTENSION);
	$mp_file_name = date('YmdHis') . '.' . $mp_file_ext;
	$mp_target_file = $mp_dir_name . $mp_file_name;
	$mp_upload = move_uploaded_file($_FILES["upload_mp_img"]["tmp_name"], $mp_target_file);

	$mp_img_path=$mp_target_file;
	if($data['training_ceftificate']=='YES' and $data['fingering']=='YES')//training  done
	{
		$qInsert=mysqli_query($con,"INSERT INTO `manpower`( `passport_no`, `status`, `manpower_dt`, `manpower_img`, `entry_by_mp`, `entry_dt_mp`, `auth_by_mp`, `auth_dt_mp`) VALUES ('$passport','1','$mp_dt','$mp_img_path','$user_id','$entry_dt','','')");
		
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