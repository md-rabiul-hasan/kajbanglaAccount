<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['visa_dt']) and isset($_POST['visa']))
{
	$user_id      = $_SESSION['user_id'];
	$entry_dt     = date('Y-m-d');
	$passport     = $_POST['passport'];
	$visa         = $_POST['visa'];
	$old_visa_img = $_POST['old_visa_img'];
	$visa_id      = $_POST['visa_id'];
	$visa_dt      = date('Y-m-d',strtotime($_POST['visa_dt']));
	$days         = 90;
	$Exdate       = strtotime("+".$days." days", strtotime($visa_dt));
	$visa_exp_dt  = date('Y-m-d',$Exdate);
	$data         = getPassportStatusPc($con,$passport);

    if(!empty($_FILES["upload_visa_img"]["name"])){
        $visa_dir_name    = "uploads/visa/";
        $visa_base_name   = basename($_FILES["upload_visa_img"]["name"]);
        $visa_file_ext    = pathinfo($visa_base_name, PATHINFO_EXTENSION);
        $visa_file_name   = date('YmdHis') . '.' . $visa_file_ext;
        $visa_target_file = $visa_dir_name . $visa_file_name;
        $visa_upload      = move_uploaded_file($_FILES["upload_visa_img"]["tmp_name"], $visa_target_file);
        $visa_img_path    = $visa_target_file;
    }else{
        $visa_img_path = $old_visa_img;
    }
	



	if(!empty($data['police_c_no']))//PC  done
	{
        $sql = "UPDATE visa SET 
        passport_no    = '$passport',
        visa_no        = '$visa',
        visa_img       = '$visa_img_path',
        visa_dt        = '$visa_dt',
        visa_expire_dt = '$visa_exp_dt',
        entry_by_visa  = '$user_id',
        entry_dt_visa  = '$entry_dt',
        status         = '0'
        WHERE visa_id='$visa_id'";

		$qInsert=mysqli_query($con, $sql);
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