<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['agent_id']) and isset($_POST['agent_id']))
{
	$agent_id=$_POST['agent_id'];
	$sql = "DELETE FROM agent_info WHERE agent_id   ='$agent_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Agent delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Agent delete failed"
		];
		echo json_encode($data);
	}	
}

?>