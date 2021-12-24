<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['mp_dt']))
{
	$user_id          = $_SESSION['user_id'];
	$entry_dt         = date('Y-m-d');
	$passport         = $_POST['passport'];
	$manpower_id      = $_POST['manpower_id'];
	$old_manpower_img = $_POST['old_manpower_img'];
	$mp_dt            = date('Y-m-d',strtotime($_POST['mp_dt']));
	$data             = getPassportStatusTF($con,$passport);
    if(!empty($_FILES["upload_mp_img"]["name"])){
        $mp_dir_name    = "uploads/manpower/";
        $mp_base_name   = basename($_FILES["upload_mp_img"]["name"]);
        $mp_file_ext    = pathinfo($mp_base_name, PATHINFO_EXTENSION);
        $mp_file_name   = date('YmdHis') . '.' . $mp_file_ext;
        $mp_target_file = $mp_dir_name . $mp_file_name;
        $mp_upload      = move_uploaded_file($_FILES["upload_mp_img"]["tmp_name"], $mp_target_file);
        $mp_img_path    = $mp_target_file;
    }else{
        $mp_img_path    = $old_manpower_img;
    }
	
	if($data['training_ceftificate']=='YES' and $data['fingering']=='YES')//training  done
	{

        $sql = "UPDATE manpower SET
              passport_no  = '$passport',
              status       = '0',
              manpower_dt  = '$mp_dt',
              manpower_img = '$mp_img_path',
              entry_by_mp  = '$user_id',
              entry_dt_mp  = '$entry_dt'
        WHERE manpower_id  = '$manpower_id'";
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