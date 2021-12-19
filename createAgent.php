<?php
include('connection/connect.php');
include('common/common.php');

$user_name = $_POST['user_name'];
$role = $_POST['role'];
$mobile = $_POST['mobile'];
$nid = $_POST['nid'];
$status = $_POST['status'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$entry_date = date('Y-m-d');

$q = mysqli_query($con, "SELECT user_name FROM users WHERE user_name = '$user_name' LIMIT 1");
if (mysqli_num_rows($q) > 0) {
    die('Username ='.$user_name. ' Already Exist.');
}

$sql = "INSERT INTO users (user_name, role, mobile, nid, status, password, entry_date) VALUES ('$user_name','$role', '$mobile', '$nid', '$status', '$passwordHash', '$entry_date')";
if (mysqli_query($con, $sql)) {
    echo true;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
