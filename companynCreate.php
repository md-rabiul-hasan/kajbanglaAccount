<?php
include('connection/connect.php');
include('common/common.php');
$company_name      = $_POST['company_name'];


$entry_by            = $_SESSION['user_id'];
$entry_dt            = date('Y-m-d');
$status = 0;



$sql = "INSERT INTO `company`( `company_name`, `status`, `entry_dt`, `entry_by`, `auth_by`, `auth_dt`) VALUES ('$company_name','0','$entry_dt','$entry_by','','')";
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
