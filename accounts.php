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
                            <form method="post" id="transactionSubmit">
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <label for="">Select Income/Expenditure</label>
                                                <select class="select2_demo_1 form-control " required="" id="gl_type" name="gl_type" onchange="showGlList(this.value)">
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

                                            <div class="col-md-4 has-success">
                                                <label for="">Select GL</label>
                                                <select class="select2_demo_1 form-control " required="" name="gl_id" id="gl_id">
                                                    <option value="">--Select GL--</option>
                                                </select>
                                            </div> 
                                             
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <label for="">Select Account Type</label>
                                                <select class="select2_demo_1 form-control " required="" id="account_type" name="account_type" onchange="showOfficeType(this.value)">
                                                    <option value="">--Select Account Type--</option>
                                                    <option value="0">Kaj-Bangla</option>
                                                    <option value="1">Office</option>
                                                    <option value="2">Agent</option>                                                       
                                                </select>
                                                 <div style="color: red;display: none" id="gl_typeDiv">*Gl Type Can not be empty</div>
                                            </div>  

                                            <div class="col-md-4 has-success" id="select_office" require>
                                                <label for="">Select Office</label>
                                                <select class="select2_demo_1 form-control "  id="office_id"  name="office_id">
                                                    <option value="">--Select Office--</option>
                                                </select>
                                            </div> 
                                             
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                            <div class="col-md-4 has-success">
                                                <label for="">Amount *</label>
                                                <input type="number" placeholder="Amount" class="form-control" name="amt" id="amt" required="">
                                                <div style="color: red;display: none" id="amt_Div">*Amount Can not be empty</div>
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success">
                                                <label for="">Remarks</label>
                                                <input type="text" placeholder="Remarks" class="form-control" name="remarks" id="remarks" required="" >
                                                 <div style="color: red;display: none" id="remarks_Div">*Remarks Can not be empty</div>                                                  
                                            </div> 
                                             
                                        </div>

                                    </div>
                                </div>

                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="submit" class="btn btn-primary btn-bg col-sm-12" id="register" value="Submit" name="register" onclick="submitForm()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

    $("#select_office").hide();

    function showGlList(gl_type){
        if(gl_type != ''){
            $.ajax({
                type: 'POST',
                url : 'transactionFindGl',
                data: {
                    "gl_type"   : gl_type,
                },
                beforeSend: function() {
                    // loaderStart();
                },
                success: (data) => {
                    $("#gl_id").empty().append(data);
                },
                error: function(data) {
                   //  console.log(data);
                },
                complete: function() {
                   // loaderEnd();
                }
            });
        }
    }


    function showOfficeType(office_type){
        if(office_type != '' && office_type != '0'){
            $.ajax({
                type: 'POST',
                url : 'transactionFindOffice',
                data: {
                    "office_type"   : office_type,
                },
                beforeSend: function() {
                    // loaderStart();
                },
                success: (data) => {
                    $("#select_office").show();
                    $("#office_id").empty().append(data);
                },
                error: function(data) {
                   //  console.log(data);
                },
                complete: function() {
                   // loaderEnd();
                }
            });
        }else{
            $("#select_office").hide();
        }
    }

    $('#transactionSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'transactionStore',
            data: $('#transactionSubmit').serialize(),
            beforeSend: function() {
                // loaderStart();
            },
            success: (data) => {
               var obj = JSON.parse(data);
               if(obj.success === true){
                    cuteAlert({
                        type      : "success",
                        title     : "Success",
                        message   : obj.message,
                        buttonText: "ok"
                    }).then((e)=>{
                        location.reload(true);
                    });
               }else{
                    cuteAlert({
                        type: "error",
                        title: "Error",
                        message: obj.message,
                        buttonText: "Try Again"
                    });
               }               
            },
            error: function(data) {
                console.log(data);
            },
            complete: function() {
                loaderEnd();
            }
        });
    });





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