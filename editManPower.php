<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}

$manpower_id = $_GET['manpower_id'];
$sql      = "SELECT * FROM `manpower` WHERE manpower_id = '$manpower_id'";
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
                    <h2>Man Power Edit </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Man Power</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Man Power Edit Form</strong>
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
                            <h5>Man Power Edit Info </h5>
                            
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
                                                    <input type="text" placeholder="Man Power Date" value="<?php echo $data['manpower_dt']; ?>" class="form-control datepicker" name="mp_dt" id="mp_dt" />
                                                    <div style="color: red;display: none" id="visa_dt_Div">*Man Power Date Can not be empty</div>
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
                                    <div class="col-sm-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="upload_mp_img" onchange="preview_image(event,'preview_mp_img')" />
                                                <label class="custom-file-label">Man Power Document Image</label>
                                            </div>
                                        </div>
                                  <div class="col-md-4 has-success">
                                                  
                                            </div>
                                    
                                        <div class="col-sm-6">
                                            <img class="img-thumbnail" style="width: 200px;height: 150px;" id="preview_mp_img" />
                                        </div>
                                        
                                </div>

                                <input type="hidden" name="old_manpower_img" id="old_manpower_img" value="<?php echo $data['manpower_img']; ?>">
                                <input type="hidden" name="manpower_id" id="manpower_id" value="<?php echo $data['manpower_id']; ?>">


                                
                                
                                <div class="hr-line-dashed"></div>
                                
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
    
    var passport         = document.getElementById('passport').value
    var passport_check   = document.getElementById('passport_check').value
    var mp_dt            = document.getElementById('mp_dt').value
    var manpower_id      = document.getElementById('manpower_id').value
    var old_manpower_img = document.getElementById('old_manpower_img').value
 
   
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
   if(mp_dt=='')
   {
        document.getElementById("visa_dt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("visa_dt_Div").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type       : 'POST',
        url        : 'manPowerUpdate',
        data       : formData,
        cache      : false,
        processData: false,
        contentType: false,
        success    : function(response) {
            
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "Man Power Update",
                      message: "Please Authorize the updated Man Power",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("manPowerList");
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
                               window.location.replace("manPowerList");
                            })
                }
                else
                {
                        cuteAlert({
                      type      : "error",
                      title     : "ERROR",
                      message   : "Man Power Update Failed",
                      buttonText: "Okay"
                    }).then((e)=>{
                           window.location.replace("manPowerList");
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