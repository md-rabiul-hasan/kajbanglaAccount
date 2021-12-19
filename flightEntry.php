<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['passport']) and isset($_POST['flight_dt']) and isset($_POST['flight_no']) and isset($_POST['airline']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$passport=$_POST['passport'];
	$flight_no=$_POST['flight_no'];
	$airline=$_POST['airline'];
	$flight_dt=date('Y-m-d',strtotime($_POST['flight_dt']));
	$data=getPassportStatusVaccFinal($con,$passport);
	if(!empty($data['vaccine_1_dt']) and !empty($data['vaccine_2_dt']) and $data['vaccine_1_dt']!='0000-00-00' and $data['vaccine_2_dt']!='0000-00-00')//Vaccine  done
	{
		$qInsert=mysqli_query($con,"INSERT INTO `flight`( `passport_no`, `flight_dt`, `flight_no`, `airline_name`, `status`, `entry_by_fl`, `entry_dt_fl`, `auth_by_fl`, `auth_dt_fl`) VALUES ('$passport','$flight_dt','$flight_no','$airline','1','$user_id','$entry_dt','','')");
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