<?php
include('connection/connect.php');
include('common/common.php');
$passenger_name      = $_POST['passenger_name'];
$passport_no         = $_POST['passport_no'];
$passport_issue_dt   =  date('Y-m-d', strtotime($_POST['passport_issue_dt']));
$passport_expire_dt  = date('Y-m-d', strtotime($_POST['passport_expire_dt']));
$father_name         = $_POST['father_name'];
$mother_name         = $_POST['mother_name'];
$date_of_birth       = date('Y-m-d', strtotime($_POST['date_of_birth']));
$place_of_birth      = $_POST['place_of_birth'];
$phone_no            = $_POST['phone_no'];
$email               = $_POST['email'];
$reference_agent_id = $_POST['reference_agent_id'];
$present_address     = $_POST['present_address'];
$parmanent_address   = $_POST['parmanent_address'];
$entry_by            = $_SESSION['user_id'];
$entry_dt            = date('Y-m-d');
$status = 1;



$q = mysqli_query($con, "SELECT passport_no FROM passenger WHERE passport_no = '$passport_no' LIMIT 1");
if (mysqli_num_rows($q) > 0) {
    die('Passport No ='.$passport_no. ' Already Exist.');
}


$passenger_dir_name = "uploads/passengers/";
$passenger_base_name = basename($_FILES["upload_passenger_img"]["name"]);
$passenger_file_ext = pathinfo($passenger_base_name, PATHINFO_EXTENSION);
$passenger_file_name = date('YmdHis') . '.' . $passenger_file_ext;
$passenger_target_file = $passenger_dir_name . $passenger_file_name;
$passenger_upload = move_uploaded_file($_FILES["upload_passenger_img"]["tmp_name"], $passenger_target_file);

$passport_dir_name = "uploads/passports/";
$passport_base_name = basename($_FILES["upload_passport_img"]["name"]);
$passport_file_ext = pathinfo($passport_base_name, PATHINFO_EXTENSION);
$passport_file_name = date('YmdHis') . '.' . $passport_file_ext;
$passport_target_file = $passport_dir_name . $passport_file_name;
$passport_upload = move_uploaded_file($_FILES["upload_passport_img"]["tmp_name"], $passport_target_file);

$passenger_img = $passenger_target_file;
$passport_img = $passport_target_file;

$sql = "INSERT INTO passenger (passenger_name, passport_no, passport_issue_dt, passport_expire_dt, father_name, mother_name, date_of_birth, place_of_birth, phone_no, email, reference_agent_id, present_address, parmanent_address, entry_by, entry_dt, status, passenger_img, passport_img) VALUES ('$passenger_name', '$passport_no', '$passport_issue_dt', '$passport_expire_dt', '$father_name', '$mother_name', '$date_of_birth', '$place_of_birth', '$phone_no', '$email', '$reference_agent_id', '$present_address', '$parmanent_address', '$entry_by', '$entry_dt', '$status', '$passenger_img', '$passport_img')";
file_put_contents("a1.txt", $sql);
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
