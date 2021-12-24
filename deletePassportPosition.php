<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['position_id']) and isset($_POST['position_id']))
{
	$position_id = $_POST['position_id'];
	$sql         = "DELETE FROM passport_position WHERE position_id   ='$position_id'";
	$query       = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Passport position delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Passport position delete failed"
		];
		echo json_encode($data);
	}	
}

?>