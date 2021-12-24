<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['mofa_remarks']) and isset($_POST['mofa_dt']) )
{
	$user_id      = $_SESSION['user_id'];
	$entry_dt     = date('Y-m-d');
	$passport     = $_POST['passport'];
	$mofa_remarks = $_POST['mofa_remarks'];
	$mofa_id      = $_POST['mofa_id'];
	$mofa_dt      = date("Y-m-d",strtotime($_POST['mofa_dt']));


    $sql = "UPDATE mofa SET 
          passport_no   = '$passport',
          mofa_dt       = '$mofa_dt',
          mofa_remakrs  = '$mofa_remarks',
          status        = '0',
          entry_by_mofa = '$user_id',
          entry_dt_mofa = '$entry_dt'
    where mofa_id       = '$mofa_id'";
    $qInsert = mysqli_query($con, $sql);
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