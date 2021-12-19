<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}

?>

<body>

    <div id="wrapper">

    <?php include('sidebar.php');?>

        <div id="page-wrapper" class="gray-bg">
          <?php include('navbar.php');?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Office Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Office Setup Form</strong>
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
                            <h5>Office Info </h5>
                            <!-- <div class="ibox-tools">
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
                            </div> -->
                        </div>
                        <div class="ibox-content">
                            <form method="get">
                                 <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Office Name" class="form-control" name="office_name" id="office_name" required="">
                                            <div style="color: red;display: none" id="office_nameDiv">*Office Name Can not be empty</div>
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Office RL No" class="form-control" name="office_rl_no" id="office_rl_no" required="" onkeyup="checkRLNo(this.value)">
                                                 <div style="color: red;display: none" id="office_rl_noDiv">*Office RL No Can not be empty</div>
                                                  <div style="color: red;display: none" id="office_rl_noDivN">*Office RL No Already Registered</div>
                                                   <div style="color: green;display: none" id="office_rl_noDivY">Office RL No not registered</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Phone No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Office Phone No" class="form-control" name="office_phone_no" id="office_phone_no" required="">
                                                <div style="color: red;display: none" id="office_phone_noDiv">*Office Phone No Can not be empty</div>
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office Email</label> -->
                                            <div class="col-md-4 has-success"><input type="Email" placeholder="Office Email" class="form-control" name="office_email" id="office_email" required="">
                                                <div style="color: red;display: none" id="office_emailDiv">*Office Email Can not be empty</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row has-success"><!-- <label class="col-sm-2 col-form-label">Office Address</label> -->

                                    <div class="col-sm-8"><input type="text" class="form-control" placeholder="Office Address" name="office_address" id="office_address" required="">

                                        <div style="color: red;display: none" id="office_addressDiv">*Office Address Can not be empty</div>
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="button" class="btn btn-primary btn-bg col-sm-12" id="register" value="Register" name="register" onclick="submitForm()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

    function checkRLNo(rl)
    {
        $.ajax({  
            type: 'POST',  
            url: 'rlCheck', 
            data: {
                rl : rl,
            },
            success: function(response) {
               if(response==1)
               {
                document.getElementById("office_rl_noDivN").style.display = "none";
                document.getElementById("office_rl_noDivY").style.display = "block";
               }
               else
               {
                     document.getElementById("office_rl_noDivN").style.display = "block";
                document.getElementById("office_rl_noDivY").style.display = "none";
               }
            }
        });
    }
    function submitForm()
{
    
    var office_name=document.getElementById('office_name').value
    var office_rl_no=document.getElementById('office_rl_no').value
    var office_phone_no=document.getElementById('office_phone_no').value
   var office_email= document.getElementById('office_email').value
    var office_address=document.getElementById('office_address').value
    var errorCheck=0;
   if(office_name=='')
   {
        document.getElementById("office_nameDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
     document.getElementById("office_nameDiv").style.display = "none";  
   }
   if(office_rl_no=='')
   {
        document.getElementById("office_rl_noDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("office_rl_noDiv").style.display = "none";
   }
   if(office_phone_no=='')
   {
        document.getElementById("office_phone_noDiv").style.display = "block";
       errorCheck++;
   }
   else
   {
    document.getElementById("office_phone_noDiv").style.display = "none";
   }
   if(office_email=='')
   {
        document.getElementById("office_emailDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
    document.getElementById("office_emailDiv").style.display = "none";
   }
   if(office_address=='')
   {
        document.getElementById("office_addressDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
    document.getElementById("office_addressDiv").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'officeEntry', 
        data: {
            office_name : office_name,
            office_rl_no : office_rl_no,
            office_email : office_email,
            office_address : office_address,
            office_phone_no : office_phone_no,
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "New Office Registered. ",
                      message: "Please Authorize the new Office",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("officeSetup");
                        })
           }
           else
           {
                cuteAlert({
                  type: "error",
                  title: "ERROR",
                  message: "Office not Registered",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("officeSetup");
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