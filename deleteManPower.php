<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['manpower_id']) and isset($_POST['manpower_id']))
{
	$manpower_id=$_POST['manpower_id'];
	$sql = "DELETE FROM manpower WHERE manpower_id   ='$manpower_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Manpower delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Manpower delete failed"
		];
		echo json_encode($data);
	}	
}

?>