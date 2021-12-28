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
                    <h2>Transaction Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Transaction Report</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Transaction Report</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-6">
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
                                        <label class="col-sm-4 col-form-label"><b>Starting Date</b></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="starting_date" id="starting_date"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Ending Date</b></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="ending_date" id="ending_date"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Account Type</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-b select2" name="account_type" id="account_type" onchange="showSubAccount(this.value)">
                                                <option value="all">ALL</option>
                                                <option value="0">Kaj-Bangla</option>
                                                <option value="1">Office</option>
                                                <option value="2">Agent</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="select_office">
                                        <label class="col-sm-4 col-form-label"><b>Select Office</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-b select2" name="office_id" id="office_id">
                                                <option value="all">ALL</option>
                                                <?php 
                                                    $sql = "SELECT office_id,office_name FROM `office` ORDER by office_name";
                                                    $query = mysqli_query($con, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php echo $data['office_id']; ?>"><?php echo $data['office_name']; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="select_agent">
                                        <label class="col-sm-4 col-form-label"><b>Select Agent</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-b select2" name="agent_id" id="agent_id">
                                                <option value="all">ALL</option>
                                                <?php 
                                                    $sql = "SELECT agent_id,agent_name FROM `agent_info` ORDER by agent_name;";
                                                    $query = mysqli_query($con, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php echo $data['agent_id']; ?>"><?php echo $data['agent_name']; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Transaction Type</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-b select2" name="transaction_id" id="transaction_id">
                                                <option value="all">ALL</option>
                                                <?php 
                                                    $sql = "SELECT gl_type_id,type_name FROM `gl_type`";
                                                    $query = mysqli_query($con, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php echo $data['gl_type_id']; ?>"><?php echo $data['type_name']; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>GL Type</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-b select2" name="gl_id" id="gl_id">
                                                <option value="all">ALL</option>
                                                <?php 
                                                    $sql = "SELECT gl_id,gl_name FROM `gl_head` ORDER by gl_name;";
                                                    $query = mysqli_query($con, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php echo $data['gl_id']; ?>"><?php echo $data['gl_name']; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <button type="button" class="btn btn-primary" onclick="generateReport()">Generate Report</button>
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

            $("#select_office").hide();
            $("#select_agent").hide();
            

        }); // End -:- Document Ready
    </script>

    <script>
        function showSubAccount(account_type){
            if(account_type == 1){
                $("#select_office").show();
                $("#select_agent").hide(); 
            }

            if(account_type == 2){
                $("#select_office").hide();
                $("#select_agent").show(); 
            }
        }
    </script>

    <script>
        function generateReport(){
            var starting_date  = $("#starting_date").val();
            var ending_date    = $("#ending_date").val();
            var account_type   = $("#account_type").val();
            var office_id      = $("#office_id").val();
            var agent_id       = $("#agent_id").val();
            var transaction_id = $("#transaction_id").val();
            var gl_id          = $("#gl_id").val();

            var root_url = window.location.pathname.split( '/' );

            var base_url = root_url[0]+"/"+root_url[1]+"/transaction_report_info?starting_date="+starting_date+"&ending_date="+ending_date+"&account_type="+account_type+"&agent_id="+agent_id+"&transaction_id="+transaction_id+"&gl_id="+gl_id;
            window.open(base_url,"", "width=1600,height=1200");

        }
    </script>
</body>



</html>