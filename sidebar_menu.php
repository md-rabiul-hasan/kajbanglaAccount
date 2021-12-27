<?php
function getMenus(){
    global $con;
    $role  = $_SESSION['role'];
    $sql   = "select * from menus where find_in_set('$role',role_ids) <> 0";
    $query = mysqli_query($con, $sql);

    $menus = [];

    while($data = mysqli_fetch_array($query)){
        if($data['status'] == 1){              
            $menus['parent_menu'][$data['id']] = [
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
                'menu_name'       => $data['title'],
                'link'            => $data['link'],
                'status'          => $data['status'],
                'parent_id'       => $data['parent_id'],
                'root_parent_id'  => $data['root_parent_id'],
                'icon'            => $data['icon'],
            ];
        }

    }

    return $menus;

}