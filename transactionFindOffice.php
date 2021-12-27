<?php
include('connection/connect.php');
include('common/common.php');

if(isset($_POST['office_type']) && !empty($_POST['office_type'])){
    $office_type = $_POST['office_type'];
    if($office_type == 1){ // office
        $sql     = "SELECT office_id,office_name FROM `office` order by office_name;";
        $query   = mysqli_query($con, $sql);
        $output  = '<option value="">--Select Office--</option>';
        while($data = mysqli_fetch_array($query)){
            $office_id   = $data['office_id'];
            $office_name = $data['office_name'];

            $output .= "<option value='$office_id'>$office_name</option>";
        }

        echo $output;
    }elseif($office_type == 2){ // agent
        $sql     = "SELECT agent_id,agent_name FROM `agent_info` order by agent_name;";
        $query   = mysqli_query($con, $sql);
        $output  = '<option value="">--Select Agent--</option>';
        while($data = mysqli_fetch_array($query)){
            $agent_id   = $data['agent_id'];
            $agent_name = $data['agent_name'];
    
            $output .= "<option value='$agent_id'>$agent_name</option>";
        }
    
        echo $output;
    }
    
}

