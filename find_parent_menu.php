<?php
include('connection/connect.php');
include('common/common.php');

$status = $_POST['status'] - 1;
$sql = "SELECT * FROM menus WHERE status=$status";
file_put_contents("m.txt", $sql);
$query = mysqli_query($con, $sql);
$output = '<option value="">Select Option</option>';
while($data = mysqli_fetch_array($query)){
    $menu_id = $data['id'];
    $title = $data['title'];
    $output .= "<option value='$menu_id'>$title</option>";
}
echo $output;