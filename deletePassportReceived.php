<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['received_id']) and isset($_POST['received_id']))
{
	$received_id = $_POST['received_id'];
	$sql         = "DELETE FROM passport_received WHERE received_id   ='$received_id'";
	$query       = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Passport received delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Passport received delete failed"
		];
		echo json_encode($data);
	}	
}

?>