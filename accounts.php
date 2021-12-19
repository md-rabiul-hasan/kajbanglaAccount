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
                    <h2>Account Entry </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Account</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Account Entry Form</strong>
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
                            <h5>Account Entry Info </h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form method="get">
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="gl_type" onchange="showSubGl(this.value)">
                                                    <option value="">--Select Type--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM gl_type order by gl_type_id ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $gl_type=$dGlType['gl_type_id'];
                                                            $type_name=$dGlType['type_name'];
                                                        ?>

                                                              <option value="<?php print $gl_type;?>"><?php print $type_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="gl_typeDiv">*Gl Type Can not be empty</div>
                                            </div>  
                                             
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row" style="display: none" id="showSubGlDiv">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="gl_id" onchange="showAcEntry(this.value)">
                                                    <option value="">--Select GL--</option>
                                                        <?php 
                                                        $qGl=mysqli_query($con,"SELECT * FROM gl_head where status='1' and gl_type='0' order by  gl_name DESC");
                                                        while($dGl=mysqli_fetch_array($qGl))
                                                        {
                                                            $gl_id=$dGl['gl_id'];
                                                            $gl_name=$dGl['gl_name'];
                                                        ?>

                                                              <option value="<?php print $gl_id;?>"><?php print $gl_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>  
                                           <!--  <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control" onselect="showSubGl(this.value)">
                                                    <option value="1">Main GL</option>
                                                     <option value="2">Sub GL</option>
                                                        
                                                </select>
                                            </div> -->  
                                        </div>
                                        <div class="row" style="display: none" id="showSubGlDiv1">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="gl_id" onchange="showAcEntry(this.value)">
                                                    <option value="">--Select GL--</option>
                                                        <?php 
                                                        $qGl=mysqli_query($con,"SELECT * FROM gl_head where status='1'  and gl_type='1' order by  gl_name DESC");
                                                        while($dGl=mysqli_fetch_array($qGl))
                                                        {
                                                            $gl_id=$dGl['gl_id'];
                                                            $gl_name=$dGl['gl_name'];
                                                        ?>

                                                              <option value="<?php print $gl_id;?>"><?php print $gl_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>  
                                           <!--  <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control" onselect="showSubGl(this.value)">
                                                    <option value="1">Main GL</option>
                                                     <option value="2">Sub GL</option>
                                                        
                                                </select>
                                            </div> -->  
                                        </div>
                                        <input type="hidden" name="gl_id_val" id="gl_id_val">
                                        <div style="color: red;display: none" id="gl_idDiv">*Gl Can not be empty</div>
                                      <div id="ac_info_div" style="display: none;"> 

                                              <br>
                                        <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success"><input type="number" placeholder="Amount" class="form-control" name="amt" id="amt" required="">
                                            <div style="color: red;display: none" id="amt_Div">*Amount Can not be empty</div>
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Remarks" class="form-control" name="remarks" id="remarks" required="" >
                                                 <div style="color: red;display: none" id="remarks_Div">*Remarks Can not be empty</div>
                                                  
                                            </div>
                                           
                                        </div>
                                    </div>
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
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

    function showAcEntry(gl)
    {
      
        if(gl=='')
        {
            document.getElementById('ac_info_div').style.display="none";
        }
        else
        {
         document.getElementById('ac_info_div').style.display="block";
         document.getElementById('gl_id_val').value=gl;
        }
        
    }

    function showSubGl(opt)
    {
        var gl_type=document.getElementById('gl_type').value;
        var glDiv=null;

        if(opt==0)//expendeture
        {
            glDiv='showSubGlDiv';
            glDiv1='showSubGlDiv1';
            document.getElementById(glDiv).style.display="block";
            document.getElementById(glDiv1).style.display="none";
        }
        else
        {
            glDiv='showSubGlDiv1';
            glDiv1='showSubGlDiv';
            document.getElementById(glDiv).style.display="block";
            document.getElementById(glDiv1).style.display="none";
        }
        
    }
    function submitForm()
{
    
    var remarks=document.getElementById('remarks').value
    var amt=document.getElementById('amt').value
    var gl_type=document.getElementById('gl_type').value
   var gl_id= document.getElementById('gl_id_val').value
   
    
    var errorCheck=0;
   if(remarks=='')
   {
        document.getElementById("remarks_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
     document.getElementById("remarks_Div").style.display = "none";  
   }
   if(amt=='')
   {
        document.getElementById("amt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("amt_Div").style.display = "none";
   }
    if(gl_type=='')
   {
        document.getElementById("gl_typeDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("gl_typeDiv").style.display = "none";
   }
    if(gl_id=='')
   {
        document.getElementById("gl_idDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("gl_idDiv").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'acEntry', 
        data: {
            remarks : remarks,
            amt : amt,
            gl_type : gl_type,
            gl_id : gl_id,
            
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "New Entry Registered. ",
                      message: "Please Authorize the new Entry",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("accounts");
                        })
           }
           else
           {
                cuteAlert({
                  type: "error",
                  title: "ERROR",
                  message: "Entry not Registered",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("accounts");
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