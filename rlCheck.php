<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['rl']))
{
	$rl=$_POST['rl'];
	$q=mysqli_query($con,"SELECT office_id FROM office WHERE office_rl_no='$rl'");
	if(mysqli_num_rows($q)==0)
	{
		print 1;
	}
	else
		print 0;
}


?>