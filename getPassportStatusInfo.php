<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['passport']))
{
	$passport=$_POST['passport'];
	$q=mysqli_query($con,"SELECT * FROM `process` WHERE passport_no='$passport'");
	if(mysqli_num_rows($q)>0)
	{
		$d=mysqli_fetch_array($q);
		print json_encode($d);
	}
	else
	{

	}
}
?>