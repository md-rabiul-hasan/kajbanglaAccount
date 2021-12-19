<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['office_id']))
{
	$office_id=$_POST['office_id'];
	$user_id=$_SESSION['user_id'];
	$dt=date('Y-m-d');
	$q=mysqli_query($con,"SELECT * FROM office WHERE office_id='$office_id'");
	if(mysqli_num_rows($q)>0)
	{	
		$d=mysqli_fetch_array($q);
		print json_encode($d);
	}
	else
		print NULL;
}


?>