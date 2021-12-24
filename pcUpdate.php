<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['pc_no']) )
{
	$user_id  = $_SESSION['user_id'];
	$entry_dt = date('Y-m-d');
	$passport = $_POST['passport'];
	$pc_no    = $_POST['pc_no'];
	$pc_id    = $_POST['pc_id'];

    $sql = "UPDATE pc SET 
          passport_no = '$passport',
          police_c_no = '$pc_no',
          entry_by_pc = '$user_id',
          entry_dt_pc = '$entry_dt',
          status      = '0'
    where pc_id       = '$pc_id'";


	$qInsert  = mysqli_query($con,$sql);
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