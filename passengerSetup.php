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
                    <h2>Passenger Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Passenger Setup Form</strong>
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
                                <h5>Passenger Info </h5>
                            </div>
                            <div class="ibox-content">
                                <form method="POST" class="data-store-form">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Passenger Name</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="passenger_name" placeholder="" />
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Passport NO.</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="passport_no" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Passport Issue Date</b></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control datepicker" name="passport_issue_dt" />
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Passport Expire Date</b></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control datepicker" name="passport_expire_dt" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Father Name</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="father_name" placeholder="" />
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Mother Name</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_name" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Date Of Birth</b></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control datepicker" name="date_of_birth" />
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Place Of Birth</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="place_of_birth" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
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
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Present Address</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="present_address" placeholder="" />
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Parmanent Address</b></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parmanent_address" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Passenger Image</b></label>
                                        <div class="col-sm-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="upload_passenger_img" onchange="preview_image(event,'preview_passenger_img')" />
                                                <label class="custom-file-label">Choose File...</label>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label"><b>Passport Image</b></label>
                                        <div class="col-sm-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="upload_passport_img" onchange="preview_image(event,'preview_passport_img')" />
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
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Reference Agent</b></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b select2" name="reference_agent_id">
                                                <option value="">-- SELECT --</option>
                                                <?php $roles_qry = mysqli_query($con, "SELECT * FROM `agent_info` WHERE status = '1' order by agent_name asc"); ?>
                                                <?php while ($role_data = mysqli_fetch_array($roles_qry)) { ?>
                                                    <option value="<?php echo $role_data['agent_id']; ?>"><?php echo $role_data['agent_name']."(".$role_data['agent_mobile'].")"; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
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
                        format: 'yyyyy-mm-dd'
                    });
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                    });
                    $('#registerBtn').click(function(e) {
                        e.preventDefault();
                        var formData = new FormData(document.querySelector('.data-store-form'));
                        var passenger_name = $(this).closest('form').find('input[name=passenger_name]').val();
                        var passport_no = $(this).closest('form').find('input[name=passport_no]').val();
                        var passport_issue_dt = $(this).closest('form').find('input[name=passport_issue_dt]').val();
                        var passport_expire_dt = $(this).closest('form').find('input[name=passport_expire_dt]').val();
                        var father_name = $(this).closest('form').find('input[name=father_name]').val();
                        var mother_name = $(this).closest('form').find('input[name=mother_name]').val();
                        var date_of_birth = $(this).closest('form').find('input[name=date_of_birth]').val();
                        var place_of_birth = $(this).closest('form').find('input[name=place_of_birth]').val();
                        var phone_no = $(this).closest('form').find('input[name=phone_no]').val();
                        var email = $(this).closest('form').find('input[name=email]').val();
                        var present_address = $(this).closest('form').find('input[name=parmanent_address]').val();
                        var parmanent_address = $(this).closest('form').find('input[name=parmanent_address]').val();


                        var upload_passenger_img = $(this).closest('form').find('input[name=upload_passenger_img]').val();
                        var upload_passport_img = $(this).closest('form').find('input[name=upload_passport_img]').val();
                        var reference_agent_id = $(this).closest('form').find('select[name=reference_agent_id]').val();
                        
                        if (passenger_name == '') {
                            alert('Passenger Name Should Be Empty !');
                            return false;
                        }
                        if (passport_no == '') {
                            alert('Passport No Should Be Empty !');
                            return false;
                        }
                        if (passport_issue_dt == '') {
                            alert('Passport Issue Date Should Be Empty !');
                            return false;
                        }
                        if (passport_expire_dt == '') {
                            alert('Passport Expire Date Should Be Empty !');
                            return false;
                        }
                        if (father_name == '') {
                            alert('Father Name Should Be Empty !');
                            return false;
                        }
                        if (date_of_birth == '') {
                            alert('Date Of Birth Should Be Empty !');
                            return false;
                        }
                        if (place_of_birth == '') {
                            alert('Place Of Birth Should Be Empty !');
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
                        if (present_address == '') {
                            alert('Present Address Should Be Empty !');
                            return false;
                        }
                        if (parmanent_address == '') {
                            alert('Parmanent Address Should Be Empty !');
                            return false;
                        }

                        if (upload_passenger_img == '') {
                            alert('Passenger Image Should Be Empty !');
                            return false;
                        }
                        if (upload_passport_img == '') {
                            alert('Passport Image Should Be Empty !');
                            return false;
                        }
                        if (reference_agent_id == '') {
                            alert('Reference Agent Should Be Empty !');
                            return false;
                        }
                        $.ajax({
                            type: 'POST',
                            url: "passengerCreate",
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
                      title: "New Passanger Registered. ",
                      message: "Please Authorize the new Passanger",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("passengerSetup");
                        })
                                    
                                } else {
                                    cuteAlert({
                                  type: "error",
                                  title: "ERROR",
                                  message: "Passanger not Registered",
                                  buttonText: "Okay"
                                }).then((e)=>{
                                       window.location.replace("passengerSetup");
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