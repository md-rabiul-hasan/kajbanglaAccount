<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['bearer_name']) and isset($_POST['sub_dt']) and isset($_POST['office']) and isset($_POST['remarks']) and isset($_POST['doc']))
{
	$user_id     = $_SESSION['user_id'];
	$entry_dt    = date('Y-m-d');
	$passport    = $_POST['passport'];
	$bearer_name = $_POST['bearer_name'];
	$sub_dt      = date("Y-m-d",strtotime($_POST['sub_dt']));
	$office      = $_POST['office'];
	$doc         = implode(",",$_POST['doc']);
	$remarks     = $_POST['remarks'];
	$received_id     = $_POST['received_id'];

    $sql = "UPDATE passport_received SET 
          passport_no  = '$passport',
          bearer_name  = '$bearer_name',
          sub_dt       = '$sub_dt',
          office       = '$office',
          doc          = '$doc',
          remarks      = '$remarks',
          status       = '0',
          entry_by_rec = '$user_id',
          entry_dt_rec = '$entry_dt'
    WHERE received_id  = '$received_id'";
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