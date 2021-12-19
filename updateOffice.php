<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['id']))
{
	$office_id=$_POST['id'];
	$name=$_POST['name'];
	$rl=$_POST['rl'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"UPDATE `office` SET `office_name`='$name',`office_rl_no`='$rl',`office_phone_no`='$phone',`office_email`='$email',`office_address`='$address',`status`='0',`entry_by`='$user_id',`entry_dt`='$dt' WHERE office_id='$office_id'");
	if($q)
	{	
		print 1;
	}
	else
		print 0;
}


?>