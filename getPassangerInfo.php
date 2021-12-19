<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['passport']))
{
	$passport=$_POST['passport'];
	$q=mysqli_query($con,"SELECT *,agnt.agent_name as office_name FROM passenger pas left join agent_info agnt on pas.reference_agent_id=agnt.agent_id WHERE pas.status='1' and passport_no='$passport'");
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