<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['company_id']) and isset($_POST['profession']) and isset($_POST['purchase_amt']) and isset($_POST['sales_amt']) and isset($_POST['office_id']))
{
	$user_id=$_SESSION['user_id'];
	$entry_dt=date('Y-m-d');
	$company_id=$_POST['company_id'];

	$profession      = $_POST['profession'];
	$purchase_amt    = $_POST['purchase_amt'];
	$sales_amt       = $_POST['sales_amt'];
	$salary          = $_POST['salary'];
	$office_id       = $_POST['office_id'];
	$working_hr      = $_POST['working_hr'];
	$food            = $_POST['food'];
	$accommodation   = $_POST['accommodation'];
	$age_limit       = $_POST['age_limit'];
	$ref_code        = $_POST['ref_code'];
	$country_id      = $_POST['country_id'];
	$company_info_id = $_POST['company_info_id'];

	$qInsert       = mysqli_query($con,"INSERT INTO `company_info`(`company_id`, `profession`, `purchase_amt`, `sales_amt`,
	 `office_id`, `salary`, `working_hr`, `food`, `accommodation`, `age_limit`, `ref_code`, `country`, `status`, `entry_by`, 
	 `entry_dt`, `auth_by`, `auth_dt`) VALUES ('$company_id','$profession','$purchase_amt','$sales_amt','$office_id',
	 '$salary','$working_hr','$food','$accommodation','$age_limit','$ref_code','$country_id','0','$user_id','$entry_dt','','')");

	 $sql = "UPDATE company_info SET
	 company_id    = '$company_id',
	 profession    = '$profession',
	 purchase_amt  = '$purchase_amt',
	 sales_amt     = '$sales_amt',
	 office_id     = '$office_id',
	 salary        = '$salary',
	 working_hr    = '$working_hr',
	 food          = '$food',
	 accommodation = '$accommodation',
	 age_limit     = '$age_limit',
	 ref_code      = '$ref_code',
	 country       = '$country_id',
	 status        = '0',
	 entry_by      = '$user_id',
	 entry_dt      = '$entry_dt'
	 WHERE company_info_id = '$company_info_id'";
	 file_put_contents("mt.txt", $sql);
	 $qInsert = mysqli_query($con, $sql);	
	if($qInsert)
	{
		$response=1;//success
	}
	else
	{
		$response=2;//db failed
	}
	
	
}
else
{
		$response=4;//field missing
}

print $response;
?>