<?php
include('connection/connect.php');
include('common/common.php');

$passport = $_POST['passport'];
$sql      = "SELECT * FROM `pcr` WHERE passport_no='$passport' order by pcr_id desc limit 1";
$query    = mysqli_query($con, $sql);
$rowCount = mysqli_num_rows($query);
if($rowCount > 0){
    $data = mysqli_fetch_array($query);
    $response = [
        "is_found"    => true,
        "message"     => "Mofa  found",
        "pcr_test"    => $data['pcr_test'],
        "next_pcr_dt" => $data['next_pcr_dt'],
        "pcr_id"      => $data['pcr_id']
    ];
    echo json_encode($response);
}else{
    $response = [
        "is_found" => false,
        "message" =>  "Mofa not found"
    ];
    echo json_encode($response);
}