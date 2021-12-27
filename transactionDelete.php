<?php
include('connection/connect.php');
include('common/common.php');


if( isset($_POST['transaction_id'])  && !empty($_POST['transaction_id']) ){
    $transaction_id          = $_POST['transaction_id'];
    $user_id          = $_SESSION['user_id'];
    $entry_dt         = date('Y-m-d');
   

    $sql = "DELETE FROM   `transactions`    WHERE transaction_id = '$transaction_id'";
    $query = mysqli_query($con, $sql);
    if($query) {
        $data = [
            "success" => true,
            "message" => "Transaction delete successfully"
        ];
        echo json_encode($data);
    }else{
        $data = [
            "success" => false,
            "message" => "Transaction delete failed."
        ];
        echo json_encode($data);
    }
}
