<?php
include('connection/connect.php');
include('common/common.php');
    $gl_type = $_POST['gl_type'];
    $sql     = "SELECT gl_id,gl_name FROM `gl_head` WHERE gl_type = $gl_type";
    file_put_contents("m.txt", $sql);
    $query   = mysqli_query($con, $sql);
    $output = '<option value="">--Select GL--</option>';
    while($data = mysqli_fetch_array($query)){
        $gl_id   = $data['gl_id'];
        $gl_name = $data['gl_name'];

        $output .= "<option value='$gl_id'>$gl_name</option>";
    }

    echo $output;
