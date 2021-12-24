<?php
include('connection/connect.php');
include('common/common.php');
$response=NULL;
if(isset($_POST['sale_id']) and isset($_POST['sale_id']))
{
	$sale_id=$_POST['sale_id'];
	$sql = "DELETE FROM sales  WHERE sale_id   ='$sale_id'";
	$query = mysqli_query($con, $sql);
	if($query){
		$data = [
			"success" => true,
			"message" => "Sales delete successfully"
		];
		echo json_encode($data);
	}else{
		$data = [
			"success" => false,
			"message" => "Sales delete failed"
		];
		echo json_encode($data);
	}	
}

?>