<?php
include('header.php');
if (!isset($_SESSION['user_id']) and empty($_SESSION['user_id'])) {
    header("Location:login");
}

?>

<head>
    <!-- start -:- Select2 CSS -->
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet">
    <!-- end -:- Select2 CSS -->
</head>

<body>

    <div id="wrapper">

        <?php include('sidebar.php'); ?>

        <div id="page-wrapper" class="gray-bg">
            <?php include('navbar.php'); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Create New User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>User Management</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Create New User</strong>
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
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form method="POST" class="data-store-form">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Username</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="user_name" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <?php
                                    $roles_qry = mysqli_query($con, "SELECT * FROM `roles` ORDER BY role_id ASC");
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Role</b></label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b select2" name="role">
                                                <option value="">-- SELECT --</option>
                                                <?php while ($role_data = mysqli_fetch_array($roles_qry)) { ?>
                                                    <option value="<?php echo $role_data['role_id']; ?>"><?php echo $role_data['role_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Mobile</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="mobile" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>National ID</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nid" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Status</b></label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b select2" name="status">
                                                <option value="1">ACTIVE</option>
                                                <option value="0">DEACTIVE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Password</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="password" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <!-- start -:- Select2 JS -->
    <script src="js/plugins/select2/select2.full.min.js"></script>
    <!-- end -:- Select2 JS -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $(".select2").select2({
                theme: 'bootstrap4',
            });

            $('.data-store-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(document.querySelector('.data-store-form'));
                var user_name = $(this).closest('form').find('input[name=user_name]').val();
                var role = $(this).closest('form').find('select[name=role]').val();
                var mobile = $(this).closest('form').find('input[name=mobile]').val();
                var nid = $(this).closest('form').find('input[name=nid]').val();
                var status = $(this).closest('form').find('select[name=status]').val();
                var password = $(this).closest('form').find('input[name=password]').val();
                if (user_name == '') {
                    alert('Username Should Not Be Null !');
                    return false;
                }
                if (role == '') {
                    alert('Role Should Not Be Null !');
                    return false;
                }
                if (mobile == '') {
                    alert('Mobile Should Not Be Null !');
                    return false;
                }
                if (nid == '') {
                    alert('National ID Should Not Be Null !');
                    return false;
                }
                if (status == '') {
                    alert('Status Should Not Be Null !');
                    return false;
                }
                if (password == '') {
                    alert('Password Should Not Be Null !');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: "createUser",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        
                    },
                    success: function(response) {
                        if (response == true) {
                            alert('Success ! Information Stored Successfully.');
                            location.reload();
                        } else {
                            alert(response);
                        }
                        console.log(response);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function(response) {
            
                    }
                });
            }); // End Ajax Event.
        }); // End -:- Document Ready
    </script>
</body>



</html>