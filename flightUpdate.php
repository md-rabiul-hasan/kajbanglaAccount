<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['flight_dt']) and isset($_POST['flight_no']) and isset($_POST['airline']))
{
	$user_id   = $_SESSION['user_id'];
	$entry_dt  = date('Y-m-d');
	$passport  = $_POST['passport'];
	$flight_no = $_POST['flight_no'];
	$flight_id = $_POST['flight_id'];
	$airline   = $_POST['airline'];
	$flight_dt = date('Y-m-d',strtotime($_POST['flight_dt']));
	$data      = getPassportStatusVaccFinal($con,$passport);

	if(!empty($data['vaccine_1_dt']) and !empty($data['vaccine_2_dt']) and $data['vaccine_1_dt']!='0000-00-00' and $data['vaccine_2_dt']!='0000-00-00')//Vaccine  done
	{
        $sql = "UPDATE flight SET 
              passport_no  = '$passport',
              flight_dt    = '$flight_dt',
              flight_no    = '$flight_no',
              airline_name = '$airline',
              status       = '0',
              entry_by_fl  = '$user_id',
              entry_dt_fl  = '$entry_dt'
        WHERE flight_id    = '$flight_id'
        ";
		$qInsert=mysqli_query($con, $sql);
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
		$response=5;
	}
	
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>