<?php
include('connection/connect.php');
include('common/common.php');
$agent_name      = $_POST['agent_name'];
$agent_ref_code         = $_POST['agent_ref_code'];
$phone_no            = $_POST['phone_no'];
$email               = $_POST['email'];

$address     = $_POST['address'];

$entry_by            = $_SESSION['user_id'];
$entry_dt            = date('Y-m-d');
$status = 0;

$passenger_dir_name = "uploads/agentImage/";
$passenger_base_name = basename($_FILES["upload_agent_img"]["name"]);
$passenger_file_ext = pathinfo($passenger_base_name, PATHINFO_EXTENSION);
$passenger_file_name = date('YmdHis') . '.' . $passenger_file_ext;
$passenger_target_file = $passenger_dir_name . $passenger_file_name;
$passenger_upload = move_uploaded_file($_FILES["upload_agent_img"]["tmp_name"], $passenger_target_file);

$passport_dir_name = "uploads/agentNid/";
$passport_base_name = basename($_FILES["upload_agent_nid_img"]["name"]);
$passport_file_ext = pathinfo($passport_base_name, PATHINFO_EXTENSION);
$passport_file_name = date('YmdHis') . '.' . $passport_file_ext;
$passport_target_file = $passport_dir_name . $passport_file_name;
$passport_upload = move_uploaded_file($_FILES["upload_agent_nid_img"]["tmp_name"], $passport_target_file);

$agent_img = $passenger_target_file;
$agent_nid_img = $passport_target_file;

$sql = "INSERT INTO `agent_info`( `agent_name`, `agent_mobile`, `agent_email`, `referral_code`, `agent_address`, `agent_img`, `agent_nid_img`, `status`, `entry_by`, `entry_dt`) VALUES ('$agent_name','$phone_no','$email','$agent_ref_code','$address','$agent_img','$agent_nid_img','1','$entry_by','$entry_dt')";
file_put_contents("agnt.txt", $sql);
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
