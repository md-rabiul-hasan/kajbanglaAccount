<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
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

    <?php include('sidebar.php');?>

        <div id="page-wrapper" class="gray-bg">
          <?php include('navbar.php');?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Medical Entry </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Medical</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Medical Entry Form</strong>
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
                            <h5>Medical Entry Info </h5>
                            
                        </div>

                        <div class="ibox-content">
                            <form method="get">
                                  <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Passport No" class="form-control" name="passport" id="passport" required="" onkeyup="getPassangerInfo(this.value)">
                                            <div style="color: red;display: none" id="passport_Div">*Passport No Can not be empty</div>
                                            <div style="color: red;display: none" id="passport_Div1">*Passport Not Found</div>
                                            <input type="hidden" id="passport_check">
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Medical Center" class="form-control" name="medical_center" id="medical_center" required="" >
                                                 <div style="color: red;display: none" id="medical_center_Div">*Medical Center Can not be empty</div>
                                                  
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="input-group date has-success">
                                                
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" placeholder="Medical Date" class="form-control datepicker" name="medical_dt" id="medical_dt" />
                                                <div style="color: red;display: none" id="medical_dt_Div">*Medical Date Can not be empty</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="status" onchange="showRemarks(this.value)">
                                                    <option value="">--Select Status--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM medical_status order by medical_status_id ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $medical_status_id=$dGlType['medical_status_id'];
                                                            $status_name=$dGlType['status_name'];
                                                        ?>

                                                              <option value="<?php print $medical_status_id;?>"><?php print $status_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="status_Div">*Medical Status Can not be empty</div>
                                            </div>  
                                             <div class="col-md-4 has-success" id="Remarks_Div" style="display: none"><input type="text" placeholder="Medical Remarks" class="form-control" name="medical_center" id="medical_remarks" required="" >
                                                 <div style="color: red;display: none" id="medical_remarks_Div">*Medical Remarks Can not be empty</div>
                                                  
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="medical_country" >
                                                    <option value="">--Select Country--</option>
                                                        <?php 
                                                        $qctnType=mysqli_query($con,"SELECT * FROM `medical_country` order by country_name asc");
                                                        while($dctnType=mysqli_fetch_array($qctnType))
                                                        {
                                                            $country_id=$dctnType['country_id'];
                                                            $country_name=$dctnType['country_name'];
                                                        ?>

                                                              <option value="<?php print $country_id;?>"><?php print $country_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="medical_country_Div">*Country Can not be empty</div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                        
                                </div>

                                
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="button" class="btn btn-primary btn-bg col-sm-12" id="register" value="Submit" name="register" onclick="submitForm()">
                                    </div>
                                </div>
                                 
                            </form>
                        </div>
                        <div id="dumpdata"></div>
                        <div class="" id="showPassengerInfo" style="display: none;">
                                                    <table>
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

 function showRemarks(med_id)
 {
    
    if(med_id!=2)
    {
        document.getElementById("Remarks_Div").style.display = "block";
    }
    else
    {
       document.getElementById("Remarks_Div").style.display = "none"; 
    }
 }         
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
    
    var passport=document.getElementById('passport').value
    var passport_check=document.getElementById('passport_check').value
    var medical_center=document.getElementById('medical_center').value
   var status= document.getElementById('status').value
   var medical_dt= document.getElementById('medical_dt').value
   var medical_remarks= document.getElementById('medical_remarks').value
   var medical_country= document.getElementById('medical_country').value
   
    
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
   if(medical_center=='')
   {
        document.getElementById("medical_center_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("medical_center_Div").style.display = "none";
   }
    if(status=='')
   {
        document.getElementById("status_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        
        if(status!=2)
        {
            if(medical_remarks=='')
            {
                document.getElementById("medical_remarks_Div").style.display = "block";
                 errorCheck++;
            }
            else
            {
                document.getElementById("medical_remarks_Div").style.display = "none";
                document.getElementById("status_Div").style.display = "none";
            }
        }
        else
        {
            document.getElementById("status_Div").style.display = "none";
        }
   }
    if(medical_dt=='')
   {
        document.getElementById("medical_dt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("medical_dt_Div").style.display = "none";
   }
   if(medical_country=='')
   {
        document.getElementById("medical_country_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("medical_country_Div").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'medicalEntry', 
        data: {
            passport : passport,
            medical_center : medical_center,
            status : status,
            medical_dt:medical_dt,
            medical_remarks:medical_remarks,
            medical_country:medical_country
            
            
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "New Entry Registered. ",
                      message: "Please Authorize the new Medical Entry",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("medical");
                        })
           }
           else
           {
                cuteAlert({
                  type: "error",
                  title: "ERROR",
                  message: "Medical Entry not Registered",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("medical");
                    })
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


</script>

<?php 

include('footer.php');
    
?>