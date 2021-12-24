<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['visa_id']) and isset($_POST['visa_id']))
{
	$visa_id=$_POST['visa_id'];
	$sql = "DELETE FROM visa WHERE visa_id   ='$visa_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Visa delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Visa delete failed"
		];
		echo json_encode($data);
	}	
}

?>