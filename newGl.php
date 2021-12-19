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
                    <h2>GL Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>GL Setup Form</strong>
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
                            <h5>GL Info </h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form method="get">
                                 <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="GL Name" class="form-control" name="gl_name" id="gl_name" required="">
                                            <div style="color: red;display: none" id="gl_nameDiv">*GL Name Can not be empty</div>
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="GL No" class="form-control" name="gl_no" id="gl_no" required="" >
                                                 <div style="color: red;display: none" id="gl_noDiv">*Gl No Can not be empty</div>
                                                  
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="gl_type">
                                                    <option value="">--Select GL Type--</option>
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
                                            <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control" onchange="showSubGl(this.value)" id="gl_type_select">
                                                    <option value="1">Main GL</option>
                                                     <option value="2">Sub GL</option>
                                                        
                                                </select>
                                            </div>  
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row" style="display: none" id="showSubGlDiv">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="sub_gl_id">
                                                    <option value="">--Select Parent GL--</option>
                                                        <?php 
                                                        $qGl=mysqli_query($con,"SELECT * FROM gl_head where status='1' and sub_gl_parent='0' and gl_type='0' order by  gl_name DESC");
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
                                                <select class="select2_demo_1 form-control " required="" id="sub_gl_id">
                                                    <option value="">--Select Parent GL--</option>
                                                        <?php 
                                                        $qGl=mysqli_query($con,"SELECT * FROM gl_head where status='1' and sub_gl_parent='0' and gl_type='1' order by  gl_name DESC");
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
                                        
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
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

    function showSubGl(opt)
    {
        var gl_type=document.getElementById('gl_type').value;
        var glDiv=null;

        if(gl_type==0)//expendeture
        {
            glDiv='showSubGlDiv';
            glDiv1='showSubGlDiv1';
        }
        else
        {
            glDiv='showSubGlDiv1';
            glDiv1='showSubGlDiv';
        }
        if(opt==2)
        {
            document.getElementById(glDiv).style.display="block";
            document.getElementById(glDiv1).style.display="none";
        }
        else
        {
            document.getElementById(glDiv).style.display="none";
            document.getElementById(glDiv1).style.display="none";
        }
    }
    function submitForm()
{
    
    var gl_name=document.getElementById('gl_name').value
    var gl_no=document.getElementById('gl_no').value
    var gl_type=document.getElementById('gl_type').value
   var sub_gl_id= document.getElementById('sub_gl_id').value
   var gl_type_select= document.getElementById('gl_type_select').value
    
    var errorCheck=0;
   if(gl_name=='')
   {
        document.getElementById("gl_nameDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
     document.getElementById("gl_nameDiv").style.display = "none";  
   }
   if(gl_no=='')
   {
        document.getElementById("gl_noDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("gl_noDiv").style.display = "none";
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

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'glEntry', 
        data: {
            gl_name : gl_name,
            gl_no : gl_no,
            gl_type : gl_type,
            sub_gl_id : sub_gl_id,
            gl_type_select : gl_type_select,
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "New GL Registered. ",
                      message: "Please Authorize the new GL",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("newGl");
                        })
           }
           else
           {
                cuteAlert({
                  type: "error",
                  title: "ERROR",
                  message: "GL not Registered",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("newGl");
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