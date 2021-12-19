<?php
include('connection/connect.php');
include('common/common.php');
$profession_name      = $_POST['profession_name'];


$entry_by            = $_SESSION['user_id'];
$entry_dt            = date('Y-m-d');
$status = 0;



$sql = "INSERT INTO `profession`(`profession_name`, `status`, `entry_by`, `entry_dt`, `auth_by`, `auth_dt`) VALUES ('$profession_name','1','$entry_by ','$entry_dt ','','')";
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
