<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['company_id']) and isset($_POST['profession_id']))
{
	$company_id=$_POST['company_id'];
	$profession_id=$_POST['profession_id'];
	$q=mysqli_query($con,"SELECT * FROM `company_info` cmpi left join company cmp on cmpi.company_id=cmp.company_id where cmp.company_id='$company_id' and cmp.status='1' and cmpi.profession='$profession_id'");
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