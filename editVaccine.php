<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}

$vaccine_id = $_GET['vaccine_id'];
$sql      = "SELECT * FROM `vaccine` WHERE vaccine_id = '$vaccine_id'";
$query    = mysqli_query($con, $sql);
$data     = mysqli_fetch_array($query);



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

    <?php include('sidebar.php');?>

        <div id="page-wrapper" class="gray-bg">
          <?php include('navbar.php');?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Vaccine Edit </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Vaccine Edit</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Vaccine Edit</strong>
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
                            <h5>Vaccine Edit</h5>
                            
                        </div>

                        <div class="ibox-content">
                            <form method="POST" class="data-store-form">
                                  <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success">
                                                <input type="text" placeholder="Passport No" value="<?php echo $data['passport_no']; ?>" class="form-control" name="passport" id="passport" required="" onkeyup="getPassangerInfo(this.value)">
                                            <div style="color: red;display: none" id="passport_Div">*Passport No Can not be empty</div>
                                            <div style="color: red;display: none" id="passport_Div1">*Passport Not Found</div>
                                            <input type="hidden" id="passport_check" value="1">
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                             <div class="col-sm-4">
                                                <div class="input-group date has-success">
                                                    
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" placeholder="Vaccine 1st Dose Date" value="<?php echo $data['vaccine_1_dt']; ?>" class="form-control datepicker" name="vac_1_dt" id="vac_1_dt" />
                                                    <div style="color: red;display: none" id="vac_1_dt_Div">*Vaccine 1st Dose Date Can not be empty</div>
                                                </div>
                                             </div>
                                             <div class="col-sm-4">
                                                <div class="input-group date has-success">
                                                    
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" placeholder="Vaccine 2nd Dose Date" class="form-control datepicker" value="<?php echo $data['vaccine_2_dt']; ?>" name="vac_2_dt" id="vac_2_dt" />
                                                    <div style="color: red;display: none" id="vac_1_dt_Div">*Vaccine 2nd Dose Date Can not be empty</div>
                                                </div>
                                             </div>

                                            <!-- <div class="col-sm-4">
                                                <div class="input-group date has-success">
                                                    
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" placeholder="Visa Expire Date" class="form-control datepicker" name="visa_exp_dt" id="visa_exp_dt" />
                                                    <div style="color: red;display: none" id="visa_exp_dt_Div">*Visa Expire Date Can not be empty</div>
                                                </div>
                                             </div> -->

                                        </div>
                                    </div>
                                </div> 
                                 <div class="form-group row">
                                    <div class="col-md-4 has-success"><input type="text" placeholder="Vaccine Remarks" value="<?php echo $data['vaccine_remarks']; ?>" class="form-control" name="vac_remarks" id="vac_remarks" required="" >
                                            <div style="color: red;display: none" id="vac_remarks_Div">*Vaccine Remarks Can not be empty</div>
                                            
                                  
                                    
                                        
                                      </div>  
                                </div>                            
                                <div class="hr-line-dashed"></div>

                                <input type="hidden" name="vaccine_id" id="vaccine_id" value="<?php echo $data['vaccine_id']; ?>">
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="button" class="btn btn-primary btn-bg col-sm-12" id="register" value="Update" name="register" onclick="submitForm()">
                                    </div>
                                </div>
                                 
                            </form>
                        </div>
                        <div id="dumpdata"></div>
                        <div class="col-md-6" id="showPassengerInfo" style="display: none;">
                        <br>
                                                    <table class="table table-bordered bg-white">
                                                      <tr>
                                                        <th>Passanger </th>
                                                        <th>Info</th>
                                                      </tr>
                                                      <tr>
                                                        <td>Name:</td>
                                                        <td id="passanger_name_dynamic">Hasnain Rahman</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Passport:</td>
                                                        <td id="passanger_passport_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Passport Issue Dt:</td>
                                                        <td id="passport_issue_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Passport Expire Dt:</td>
                                                        <td id="passport_expire_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Date of Birth:</td>
                                                        <td id="dob_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Place of Birth:</td>
                                                        <td id="pob_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Contact No:</td>
                                                        <td id="contact_dynamic">123456</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Reference Office:</td>
                                                        <td id="office_dynamic">123456</td>
                                                      </tr>
                                                    </table>
                                            </div>
                    </div>
                </div>
            </div>
        </div>
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
            <!-- end -:- Datepicker JS -->

            <!-- start -:- Select2 JS -->
<script src="js/plugins/select2/select2.full.min.js"></script>
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
 });               
    function getPassangerInfo(passport)
    {
        
         $.ajax({  
        type: 'POST',  
        url: 'getPassangerInfo', 
        data: {
            passport : passport,
            
            
        },
        success: function(response) {
            if(response!='')
            {
                document.getElementById("showPassengerInfo").style.display = "block";
              obj = JSON.parse(response);
              $('#passanger_name_dynamic').html(obj.passenger_name);
              $('#passanger_passport_dynamic').html(obj.passport_no);
              $('#passport_issue_dynamic').html(obj.passport_issue_dt);
              $('#passport_expire_dynamic').html(obj.passport_expire_dt);
              $('#dob_dynamic').html(obj.date_of_birth);
              $('#pob_dynamic').html(obj.place_of_birth);
              $('#contact_dynamic').html(obj.phone_no);
              $('#office_dynamic').html(obj.office_name);  
               document.getElementById("passport_check").value=1;
            }
            else
            {
                document.getElementById("passport_check").value=null;
                document.getElementById("showPassengerInfo").style.display = "none";
            }
           
          
        }
    });
    }
    function submitForm()
{
    
    var passport       = document.getElementById('passport').value
    var passport_check = document.getElementById('passport_check').value
    var vac_1_dt       = document.getElementById('vac_1_dt').value
    var vac_2_dt       = document.getElementById('vac_2_dt').value
    var vac_remarks    = document.getElementById('vac_remarks').value
    var vaccine_id     = document.getElementById('vaccine_id').value
 
   
    var formData = new FormData(document.querySelector('.data-store-form'));
    
    var errorCheck=0;
   if(passport=='')
   {
        document.getElementById("passport_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        if(passport_check==1)
        {
             document.getElementById("passport_Div").style.display = "none";  
             document.getElementById("passport_Div1").style.display = "none";  
        }
        else
        {
             document.getElementById("passport_Div").style.display = "none";
             document.getElementById("passport_Div1").style.display = "block"; 
            errorCheck++; 
        }
   }
   if(vac_remarks=='')
   {
        document.getElementById("vac_remarks_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("vac_remarks_Div").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type       : 'POST',
        url        : 'vaccineUpdate',
        data       : formData,
        cache      : false,
        processData: false,
        contentType: false,
        success    : function(response) {

           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "Vaccine Update",
                      message: "Please Authorize the updated Vaccine",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("vaccineList");
                        })
           }
           else
           {
                if(response==5)
                {
                        cuteAlert({
                          type: "error",
                          title: "ERROR",
                          message: "Training and Fingering Not Completed Yet",
                          buttonText: "Okay"
                        }).then((e)=>{
                               window.location.replace("vaccineList");
                            })
                }
                else
                {
                        cuteAlert({
                      type: "error",
                      title: "ERROR",
                      message: "Vaccine Update Failed",
                      buttonText: "Okay"
                    }).then((e)=>{
                           window.location.replace("vaccineList");
                        })
                }
           }
          
        }
    });
}
else
{
    cuteAlert({
              type: "error",
              title: "Please Fix the Errors",
              message: "",
              buttonText: "Okay"
            });
}
//     
}
                $('#preview_mp_img').hide();
                

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