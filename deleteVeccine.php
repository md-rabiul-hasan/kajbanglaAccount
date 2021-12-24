<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['vaccine_id']) and isset($_POST['vaccine_id']))
{
	$vaccine_id=$_POST['vaccine_id'];
	$sql = "DELETE FROM vaccine WHERE vaccine_id   ='$vaccine_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Veccine  delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Veccine delete failed"
		];
		echo json_encode($data);
	}	
}

?>