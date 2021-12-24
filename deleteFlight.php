<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['flight_id']) and isset($_POST['flight_id']))
{
	$flight_id=$_POST['flight_id'];
	$sql = "DELETE FROM flight WHERE flight_id   ='$flight_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Flight delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Flight delete failed"
		];
		echo json_encode($data);
	}	
}

?>