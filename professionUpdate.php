<?php
include('connection/connect.php');
include('common/common.php');
$profession_name = $_POST['profession_name'];
$profession_id   = $_POST['profession_id'];


$entry_by            = $_SESSION['user_id'];
$entry_dt            = date('Y-m-d');
$status = 0;

$sql = "UPDATE profession SET 
    profession_name = '$profession_name',
    status = '$status',
    entry_by = '$entry_by',
    entry_dt = '$entry_dt'
    WHERE profession_id='$profession_id'";
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
