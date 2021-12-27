<?php
include('connection/connect.php');
include('common/common.php');


if( isset($_POST['gl_type']) && isset($_POST['gl_id']) && isset($_POST['account_type']) && isset($_POST['amt']) && isset($_POST['remarks']) ){
    $gl_type          = $_POST['gl_type'];
    $gl_id            = $_POST['gl_id'];
    $account_type     = $_POST['account_type'];
    $amt              = $_POST['amt'];
    $remarks          = $_POST['remarks'];
    $select_office_id = $_POST['office_id'];
    $user_id          = $_SESSION['user_id'];
    $entry_dt         = date('Y-m-d');
    $agent_id         = 0;
    $office_id        = 0;
    if($account_type == '1'){
        $office_id = $select_office_id;
    }elseif($account_type == '2'){
        $agent_id = $select_office_id;
    }

    $sql = "INSERT INTO `transactions`(`account_type`, `office_id`, `agent_id`, `gl_id`, `transaction_type`, `amount`, `status`, `remarks`, `entry_by`, `entry_dt`) VALUES ('$account_type','$office_id','$agent_id','$gl_id','$gl_type','$amt','0', '$remarks', '$user_id','$entry_dt')";
    file_put_contents('m.txt', $sql);
    $query = mysqli_query($con, $sql);
    if($query) {
        $data = [
            "success" => true,
            "message" => "Transaction successfully. Please authorize now"
        ];
        echo json_encode($data);
    }else{
        $data = [
            "success" => false,
            "message" => "Transaction failed."
        ];
        echo json_encode($data);
    }
}
