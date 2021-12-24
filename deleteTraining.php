<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['training_id']) and isset($_POST['training_id']))
{
	$training_id = $_POST['training_id'];
	$sql         = "DELETE FROM training WHERE training_id   ='$training_id'";
	$query       = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Training+Finger delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Training+Finger delete failed"
		];
		echo json_encode($data);
	}	
}

?>