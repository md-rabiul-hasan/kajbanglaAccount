<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['gl_name']) and isset($_POST['gl_no']) and isset($_POST['gl_type']) and isset($_POST['sub_gl_id']) and isset($_POST['gl_type_select']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$gl_name=$_POST['gl_name'];
	$gl_no=$_POST['gl_no'];
	$gl_type=$_POST['gl_type'];
	$sub_gl_id=$_POST['sub_gl_id'];
	$gl_type_select=$_POST['gl_type_select'];
	if($gl_type_select==1)//main gl
	{
		$sub_gl_parent=0;
	}
	else
	{
		$sub_gl_parent=$sub_gl_id;
	}
	$qInsert=mysqli_query($con,"INSERT INTO `gl_head`(`gl_name`, `gl_ac`, `gl_type`, `sub_gl_parent`, `status`, `level`, `entry_by`, `entry_dt`, `auth_by`, `auth_dt`) VALUES ('$gl_name','$gl_no','$gl_type','$sub_gl_parent','0','0','$user_id','$entry_dt','','')");
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