<?php
include('header.php');
if (!isset($_SESSION['user_id']) and empty($_SESSION['user_id'])) {
    header("Location:login");
}
$profession_id = $_GET['profession_id'];
$sql           = "SELECT * FROM `profession` WHERE profession_id='$profession_id'";
$query         = mysqli_query($con, $sql);
$data          = mysqli_fetch_array($query);

?>

<head>
    <!-- start -:- Datepicker3 CSS -->
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- end -:- Datepicker3 CSS -->

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
                    <h2>Edit Profession</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Edit Profession Form</strong>
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
                                <h5>Edit Profession</h5>
                            </div>
                            <div class="ibox-content">
                                <form method="POST" class="data-store-form">
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Profession Name</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="profession_name" value="<?php echo $data['profession_name']; ?>" placeholder="" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="profession_id" value="<?php echo $profession_id; ?>">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary btn-bg" id="registerBtn" value="Update" name="register" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
 

            <!-- start -:- Datepicker JS -->
            <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
            <!-- end -:- Datepicker JS -->

            <!-- start -:- Select2 JS -->
            <script src="js/plugins/select2/select2.full.min.js"></script>
            <!-- end -:- Select2 JS -->

            <script type="text/javascript">
                $(document).ready(function() {
                    // $(".select2").select2({
                    //     theme: 'bootstrap4',
                    // });
                    $('.datepicker').datepicker({
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd-mm-yyyy'
                    });
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                    });
                    $('#registerBtn').click(function(e) {
                        e.preventDefault();
                        var formData        = new FormData(document.querySelector('.data-store-form'));
                        var profession_name = $(this).closest('form').find('input[name=profession_name]').val();
                        var profession_id   = $(this).closest('form').find('input[name=profession_id]').val();
                        
                       


                        
                        
                        
                        if (profession_name == '') {
                            alert('profession Name Should Be Empty !');
                            return false;
                        }
                        
                        
                        $.ajax({
                            type: 'POST',
                            url: "professionUpdate",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            beforeSend: function() {

                            },
                            success: function(response) {
                                
                                if (response == 1) {
                                   
                                    cuteAlert({
                                          type: "success",
                                          title: "Profession Update. ",
                                          message: "Please Authorize the updated Profession",
                                          buttonText: "Okay"
                                        }).then((e)=>{
                                             window.location.replace("professionList");
                                            })
                                } else {
                                    cuteAlert({
                                          type: "error",
                                          title: "ERROR",
                                          message: "Profession update failed",
                                          buttonText: "Okay"
                                        }).then((e)=>{
                                               window.location.replace("professionList");
                                            })
                                }
                                console.log(response);
                            },
                            error: function(response) {
                                console.log(response);
                            },
                            complete: function(response) {

                            }
                        });

                    });
                }); // End -:- Document Ready

                $('#preview_passenger_img').hide();
                $('#preview_passport_img').hide();

                function preview_image(event, showid) {
                    var reader = new FileReader();
                    $('#' + showid).show();
                    reader.onload = function() {
                        var output = document.getElementById(showid);
                        output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>

            <?php

            include('footer.php');

            ?>