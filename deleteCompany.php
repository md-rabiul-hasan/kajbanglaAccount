<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['company_info_id']) and isset($_POST['company_info_id']))
{
	$company_info_id=$_POST['company_info_id'];
	$sql = "DELETE FROM company_info WHERE company_info_id  ='$company_info_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Company information delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Company information delete failed"
		];
		echo json_encode($data);
	}	
}

?>