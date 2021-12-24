<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['mofa_id']) and isset($_POST['mofa_id']))
{
	$mofa_id=$_POST['mofa_id'];
	$sql = "DELETE FROM mofa WHERE mofa_id   ='$mofa_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Mofa delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Mofa delete failed"
		];
		echo json_encode($data);
	}	
}

?>