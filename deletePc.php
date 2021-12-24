<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['pc_id']) and isset($_POST['pc_id']))
{
	$pc_id=$_POST['pc_id'];
	$sql = "DELETE FROM pc WHERE pc_id   ='$pc_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Police clearance delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Police clearance delete failed"
		];
		echo json_encode($data);
	}	
}

?>