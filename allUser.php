<?php
include('header.php');
if (!isset($_SESSION['user_id']) and empty($_SESSION['user_id'])) {
    header("Location:login");
}
$user_id = $_SESSION['user_id'];
?>

<body>

    <div id="wrapper">

        <?php include('sidebar.php'); ?>

        <div id="page-wrapper" class="gray-bg">
            <?php include('navbar.php'); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2 class="text-uppercase">All User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">User Management</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>All User</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">


                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Mobile</th>
                                                <th>National ID</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q = mysqli_query($con, "SELECT u.*, r.role_name FROM users u LEFT JOIN roles r ON u.role = r.role_id ORDER BY u.entry_date DESC");

                                            $sl = 0;
                                            while ($d = mysqli_fetch_array($q)) {
                                                $sl++;
                                            ?>
                                                <tr>
                                                    <th><?php echo $sl; ?></th>
                                                    <td><?php echo $d['user_name']; ?></td>
                                                    <td><?php echo $d['role_name']; ?></td>
                                                    <td><?php echo $d['mobile']; ?></td>
                                                    <td><?php echo $d['nid']; ?></td>
                                                    <td>
                                                        <?php if($d['status'] == 1) {?>
                                                            <span class="badge badge-primary">Active</span>
                                                        <?php }else {?>
                                                            <span class="badge badge-danger">Deactive</span>
                                                        <?php }?>    
                                                    </td>
                                                    <td><a href="editUser?user_id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <script type="text/javascript">
                


                
            </script>

            <?php

            include('footer.php');

            ?>