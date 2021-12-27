<?php
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function get_page_name()
{
	return ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) );
}
function getPassportStatus($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `process` WHERE passport_no='$passport'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusMed($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `medical` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusPc($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `pc` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusTF($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `training` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusVacc($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `vaccine` WHERE passport_no='$passport'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusVaccFinal($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `vaccine` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusSales($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `sales` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}

function getMenus(){
    global $con;
    $role  = $_SESSION['role'];
    $sql   = "select * from menus where find_in_set('$role',role_ids) <> 0";
    $query = mysqli_query($con, $sql);

    $menus = [];

    while($data = mysqli_fetch_array($query)){
        if($data['status'] == 1){              
            $menus['parent_menu'][$data['id']] = [
                'menu_id'        => $data['id'],
                'menu_name'      => $data['title'],
                'link'           => $data['link'],
                'status'         => $data['status'],
                'parent_id'      => $data['parent_id'],
                'root_parent_id' => $data['root_parent_id'],
                'icon'           => $data['icon'],
                'submenu'        => []
            ];
        }

        if($data['status'] == 2){
            $menus['parent_menu'][$data['parent_id']]['submenu'][$data['id']] = [
                'menu_id'         => $data['id'],
                'menu_name'       => $data['title'],
                'link'            => $data['link'],
                'status'          => $data['status'],
                'parent_id'       => $data['parent_id'],
                'root_parent_id'  => $data['root_parent_id'],
                'icon'            => $data['icon'],
                'submenu_submenu' => []
            ];
        }

        if($data['status'] == 3){                
            $menus['parent_menu'][$data['root_parent_id']]['submenu'][$data['parent_id']]['submenu_submenu'][$data['id']] = [
                'menu_id'        => $data['id'],
                'menu_name'      => $data['title'],
                'link'           => $data['link'],
                'status'         => $data['status'],
                'parent_id'      => $data['parent_id'],
                'root_parent_id' => $data['root_parent_id'],
                'icon'           => $data['icon'],
            ];
        }

    }

    return $menus;

}

function getCurrentPageMenuInformation(){
    global $con;
    $url   = basename($_SERVER['PHP_SELF']);
    $url   = str_replace(".php", "", $url);
    $sql   = "SELECT * FROM menus where link='$url'";
    $query = mysqli_query($con, $sql);
    $data  = mysqli_fetch_array($query);
    return $data;
}
?>