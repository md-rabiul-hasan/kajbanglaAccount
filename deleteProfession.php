<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['profession_id']) and isset($_POST['profession_id']))
{
	$profession_id=$_POST['profession_id'];
	$sql = "DELETE FROM profession WHERE profession_id ='$profession_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Profession delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Profession delete failed"
		];
		echo json_encode($data);
	}	
}

?>