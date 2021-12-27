<?php 
    include './sidebar_menu.php';
?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image"  src="img/logo.png" style="max-height: 100px; max-width: 100px;"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php print $_SESSION['user_name'];?></span>
                            <span class="text-muted text-xs block"><?php print $_SESSION['role_name'];?> <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                    
                </li>
                <?php 
                    $menus = getMenus();
                    foreach($menus['parent_menu'] as $parent_menu){
                        if(count($parent_menu['submenu']) > 0){ // multiple menu
                            ?>
                                <li>
                                    <a href="#"><i class="fa fa-edit"></i>
                                    <span class="nav-label"><?php echo $parent_menu['menu_name']; ?></span> <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-second-level">
                                    <?php 

                                    foreach($parent_menu['submenu'] as  $submenu){
                                        if(count($submenu['submenu_submenu']) > 0){ // multiple sumenut
                                            ?>
                                                <li>
                                                    <a href="#"><?php echo $submenu['menu_name']; ?><span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        <?php 
                                                            foreach($submenu['submenu_submenu'] as $submenu_submenu){
                                                                ?>
                                                                    <li><a href = " <?php echo $submenu_submenu['link']; ?>"> <?php echo $submenu_submenu['menu_name']; ?></a></li>
                                                                <?php
                                                            }
                                                        ?>                                                           
                                                    </ul>
                                                </li>

                                            <?php
                                        }else{  // single submenu
                                            ?>
                                                <li><a href=" <?php echo $submenu['link']; ?>"> <?php echo $submenu['menu_name']; ?></a></li>
                                            <?php
                                        }

                                    }
                                    ?>

                                    </ul>
                                </li>

                            <?php
                           
                        }else{ // single menu
                            ?>
                            <li>
                                <a href="<?php echo $parent_menu['link']; ?>"><i class="fa fa-th-large"></i> 
                                <sp class="nav-label">
                                    <?php echo $parent_menu['menu_name']; ?></a>                                
                            </li>
                            <?php
                        }
                    }

                ?>

                
               </ul>
            

        </div>
    </nav>