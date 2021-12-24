<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['finger'])  and isset($_POST['training']))
{
	$user_id  = $_SESSION['user_id'];
	$entry_dt = date('Y-m-d');
	$passport = $_POST['passport'];
	$finger   = $_POST['finger'];
	$training = $_POST['training'];
	$training_id = $_POST['training_id'];
	if($finger==1)
		$finger="YES";
	else
		$finger="NO";
	if($training==1)
		$training="YES";
	else
		$training="NO";
	// $data=getPassportStatus($con,$passport);
	// if($data['status']=='3')//Visa  done
	// {

        $sql = "UPDATE training SET
              passport_no          = '$passport',
              training_ceftificate = '$training',
              fingering            = '$finger',
              status               = '0',
              entry_by_t_f         = '$user_id',
              entry_dt_t_f         = '$entry_dt'
        where training_id          = '$training_id'";
		$qInsert=mysqli_query($con, $sql);
		
	
		if($qInsert)
		{
			$response=1;//success
		}
		else
		{
			$response=2;//db failed
		}
	// }
	// else
	// {
	// 	$response=5;
	// }
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>