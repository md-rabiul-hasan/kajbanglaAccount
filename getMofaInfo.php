<?php
include('connection/connect.php');
include('common/common.php');

$passport = $_POST['passport'];
$sql      = "SELECT mofa_id,mofa_dt,mofa_remakrs FROM `mofa` WHERE passport_no='$passport' order by mofa_id desc limit 1";
$query    = mysqli_query($con, $sql);
$rowCount = mysqli_num_rows($query);
if($rowCount > 0){
    $data = mysqli_fetch_array($query);
    $response = [
        "is_found"     => true,
        "message"      => "Mofa  found",
        "mofa_id"      => $data['mofa_id'],
        "mofa_dt"      => $data['mofa_dt'],
        "mofa_remakrs" => $data['mofa_remakrs']
    ];
    echo json_encode($response);
}else{
    $response = [
        "is_found" => false,
        "message" =>  "Mofa not found"
    ];
    echo json_encode($response);
}