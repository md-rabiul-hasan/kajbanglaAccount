<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['passanger_id']) and isset($_POST['passanger_id']))
{
	$passanger_id=$_POST['passanger_id'];
	$sql = "DELETE FROM passenger WHERE passenger_id ='$passanger_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Passanger delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Passanger delete failed"
		];
		echo json_encode($data);
	}	
}

?>