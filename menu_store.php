<?php
include('connection/connect.php');
include('common/common.php');

$menu_title     = $_POST['menu_title'];
$menu_link      = $_POST['menu_link'];
$menu_status    = $_POST['menu_status'];
$roles          = join(",",$_POST['roles']);
$parent_menu    = $_POST['parent_menu'] ?? 0;
$menu_icon      = $_POST['menu_icon'];
$entry_datetime = date('Y-m-d H:i:s');

if($menu_status == 3){
    $root_parent_id = getRootParentId($parent_menu);
}else{
    $root_parent_id = 0;
}
$sql = "INSERT INTO `menus`(`title`, `link`, `status`, `parent_id`, `root_parent_id`, `icon`, `role_ids`, `entry_datetime`) VALUES ('$menu_title','$menu_link','$menu_status','$parent_menu', '$root_parent_id', '$menu_icon','$roles','$entry_datetime')";
$query = mysqli_query($con, $sql);
if($query){
    $data = [
        "success" => true,
        "message" => "Menu added successfully"
    ];
    echo json_encode($data);
}else{
    $data = [
        "success" => false,
        "message" => "Menu added failed"
    ];
    echo json_encode($data);
}


function getRootParentId($id){
    global $con;
    $sql   = "SELECT parent_id from menus where  id = $id";
    $query = mysqli_query($con, $sql);
    $data  = mysqli_fetch_array($query);
    return $data['parent_id'];
}


?>