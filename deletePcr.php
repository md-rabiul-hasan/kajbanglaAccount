<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['pcr_id']) and isset($_POST['pcr_id']))
{
	$pcr_id=$_POST['pcr_id'];
	$sql = "DELETE FROM pcr WHERE pcr_id   ='$pcr_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "PCR Test delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "PCR Test delete failed"
		];
		echo json_encode($data);
	}	
}

?>