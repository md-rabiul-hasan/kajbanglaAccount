<?php
include('header.php');
if (!isset($_SESSION['user_id']) and empty($_SESSION['user_id'])) {
    header("Location:login");
}

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
                    <h2>Agent Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Agent Setup Form</strong>
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
                                <h5>Agent Info </h5>
                            </div>
                            <div class="ibox-content">
                                <form method="POST" class="data-store-form">
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Agent Name</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="agent_name" placeholder="" />
                                        </div>
                                    </div>
                               
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Agent Referral Code</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="agent_ref_code" placeholder="" />
                                        </div>
                                        
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                   
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Phone no</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="phone_no" placeholder="" />
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>email</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="email" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Address</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="address" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row has-success">
                                        <label class="col-sm-2 col-form-label"><b>Agent Image</b></label>
                                        <div class="col-sm-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="upload_agent_img" onchange="preview_image(event,'preview_passenger_img')" />
                                                <label class="custom-file-label">Choose File...</label>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Agent  Nid Image</b></label>
                                        <div class="col-sm-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="upload_agent_nid_img" onchange="preview_image(event,'preview_passport_img')" />
                                                <label class="custom-file-label">Choose File...</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <img class="img-thumbnail" style="width: 200px;height: 150px;" id="preview_passenger_img" />
                                        </div>
                                        <div class="col-sm-6">
                                            <img class="img-thumbnail" style="width: 200px;height: 150px;" id="preview_passport_img" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    
                                    <div class="hr-line-dashed"></div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary btn-bg" id="registerBtn" value="Register" name="register" />
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
                        var formData = new FormData(document.querySelector('.data-store-form'));
                        var agent_name = $(this).closest('form').find('input[name=agent_name]').val();
                        var agent_ref_code = $(this).closest('form').find('input[name=agent_ref_code]').val();
                        var phone_no = $(this).closest('form').find('input[name=phone_no]').val();
                        var email = $(this).closest('form').find('input[name=email]').val();
                        var address = $(this).closest('form').find('input[name=address]').val();
                       


                        var upload_agent_img = $(this).closest('form').find('input[name=upload_agent_img]').val();
                        var upload_agent_nid_img = $(this).closest('form').find('input[name=upload_agent_nid_img]').val();
                        
                        
                        if (agent_name == '') {
                            alert('Agent Name Should Be Empty !');
                            return false;
                        }
                        if (agent_ref_code == '') {
                            alert('Agent Ref Code Should Be Empty !');
                            return false;
                        }
                        
                        if (phone_no == '') {
                            alert('Phone NO Should Be Empty !');
                            return false;
                        }
                        if (email == '') {
                            alert('E-mail Should Be Empty !');
                            return false;
                        }
                        if (address == '') {
                            alert('Present Address Should Be Empty !');
                            return false;
                        }
                        
                        if (upload_agent_img == '') {
                            alert('Agent Image Should Be Empty !');
                            return false;
                        }
                        if (upload_agent_nid_img == '') {
                            alert('Agent NID Image Should Be Empty !');
                            return false;
                        }
                        
                        $.ajax({
                            type: 'POST',
                            url: "agentCreate",
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
                                          title: "New Agent Registered. ",
                                          message: "Please Authorize the new Agent",
                                          buttonText: "Okay"
                                        }).then((e)=>{
                                             window.location.replace("agentSetup");
                                            })
                                } else {
                                    cuteAlert({
                                          type: "error",
                                          title: "ERROR",
                                          message: "Agent not Registered",
                                          buttonText: "Okay"
                                        }).then((e)=>{
                                               window.location.replace("agentSetup");
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