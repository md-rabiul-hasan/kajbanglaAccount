<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}
$position_id = $_GET['position_id'];
$sql         = "SELECT * FROM `passport_position` WHERE position_id='$position_id'";
$query       = mysqli_query($con, $sql);
$data        = mysqli_fetch_array($query);

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
         <h2>Passport Position Edit </h2>
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a>Passport Position</a>
            </li>
            <li class="breadcrumb-item active">
               <strong>Passport Position Edit Form</strong>
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
                  <h5>Passport Position Edit Info </h5>
               </div>
               <div class="ibox-content">
                  <form method="get">
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <div class="row">
                              <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                              <div class="col-md-4 has-success">
                                 <input type="text" placeholder="Passport No" class="form-control" name="passport" id="passport" required="" value="<?php echo $data['passport_no']; ?>" onkeyup="getPassangerInfo(this.value)">
                                 <div style="color: red;display: none" id="passport_Div">*Passport No Can not be empty</div>
                                 <div style="color: red;display: none" id="passport_Div1">*Passport Not Found</div>
                                 <input type="hidden" id="passport_check" value="1">
                              </div>
                              <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                              <div class="col-md-4 has-success">
                                 <input type="text" placeholder="Bearer Name" class="form-control" name="bearer_name" value="<?php echo $data['bearer_name']; ?>" id="bearer_name" required="" >
                                 <div style="color: red;display: none" id="bearer_name_Div">*Bearer Name Can not be empty</div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="input-group date has-success">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" placeholder="Submission Date" class="form-control datepicker" value="<?php echo $data['sub_dt']; ?>" name="sub_dt" id="sub_dt" />
                                    <div style="color: red;display: none" id="sub_dt_Div">*Submission Date Can not be empty</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-md-4 has-success">
                                 <input type="text" placeholder="Office" class="form-control" name="office" value="<?php echo $data['office']; ?>" id="office" required="" >
                                 <div style="color: red;display: none" id="office_Div">*Office Can not be empty</div>
                              </div>
                              <div class="col-md-4 has-success">
                                 <input type="text" placeholder="Remarks" class="form-control" name="remarks" value="<?php echo $data['remarks']; ?>" id="remarks" required="" >
                                 <div style="color: red;display: none" id="remarks_Div">*Remarks Can not be empty</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-md-4 has-success">
                                 <label>Select Document(s)</label>
                                 <select class="select2_demo_2 form-control has-success" multiple="multiple" id="doc">
                                    <?php
                                        $doc_array = explode(",", $data['doc']);
                                       $qDoc=mysqli_query($con,"SELECT * FROM `passport_doc` order by doc_name asc");
                                       while($dDoc=mysqli_fetch_array($qDoc))
                                       {
                                           $doc_name=$dDoc['doc_name']
                                       ?> 
                                    <option value="<?php print  $doc_name; ?>" <?php if(in_array($doc_name, $doc_array)){ echo "selected"; } ?> ><?php print  $doc_name; ?></option>
                                    <?php 
                                       }
                                       ?>
                                 </select>
                                 <div style="color: red;display: none" id="doc_Div">*Documents Can not be empty</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="position_id" value="<?php echo $data['position_id']; ?>">
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
    
    var passport       = document.getElementById('passport').value
    var passport_check = document.getElementById('passport_check').value
    var bearer_name    = document.getElementById('bearer_name').value
    var sub_dt         = document.getElementById('sub_dt').value
    var office         = document.getElementById('office').value
    var remarks        = document.getElementById('remarks').value
    var position_id    = document.getElementById('position_id').value
    var doc            = $('#doc').val();
   
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
   if(bearer_name=='')
   {
        document.getElementById("bearer_name_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("bearer_name_Div").style.display = "none";
   }
    
    if(sub_dt=='')
   {
        document.getElementById("sub_dt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("sub_dt_Div").style.display = "none";
   }
   if(office=='')
   {
        document.getElementById("office_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("office_Div").style.display = "none";
   }
   if(remarks=='')
   {
        document.getElementById("remarks_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("remarks_Div").style.display = "none";
   }
   if(doc=='')
   {
        document.getElementById("doc_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("doc_Div").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'passportDocUpdate', 
        data: {
            passport   : passport,
            bearer_name: bearer_name,
            sub_dt     : sub_dt,
            office     : office,
            remarks    : remarks,
            doc        : doc,
            position_id: position_id                
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type      : "success",
                      title     : "Update Passport Position",
                      message   : "Please Authorize the updated Passport Position",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("PassportPositionList");
                        })
           }
           else if(response==5)
           {
                cuteAlert({
                  type      : "error",
                  title     : "ERROR",
                  message   : "Update Passport Position Failed",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("PassportPositionList");
                    })
           }
           else
           {
                cuteAlert({
                  type: "error",
                  title: "ERROR",
                  message: "Passport Position Entry not Registered",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("passportPosition");
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