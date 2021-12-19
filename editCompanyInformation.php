<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}

?>

<?php 
    $company_info_id = $_GET['company_info_id'];
    $sql             = "SELECT * FROM company_info where company_info_id='$company_info_id'";
    $query           = mysqli_query($con, $sql);
    $data            = mysqli_fetch_array($query);
?>

<body>

    <div id="wrapper">

    <?php include('sidebar.php');?>

        <div id="page-wrapper" class="gray-bg">
          <?php include('navbar.php');?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Company Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Company Setup Form</strong>
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
                            <h5>Company Info </h5>
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
                                            <div class="col-md-4 has-success"><select class="select2_demo_1 form-control " required="" id="company_id" >
                                                    <option value="">--Select Company--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM `company` where status='1' order by company_name ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $company_id=$dGlType['company_id'];
                                                            $company_name=$dGlType['company_name'];
                                                        ?>

                                                              <option value="<?php print $company_id;?>" <?php if($data['company_id'] == $company_id){ echo "selected"; }  ?>><?php print $company_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            <div style="color: red;display: none" id="company_nameDiv">*Company Name Can not be empty</div>
                                        </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="profession_id" >
                                                    <option value="">--Select Profession--</option>
                                                        <?php 
                                                        $qProfType=mysqli_query($con,"SELECT * FROM profession where status='1' order by profession_name ASC");
                                                        while($dProfType=mysqli_fetch_array($qProfType))
                                                        {
                                                            $profession_id=$dProfType['profession_id'];
                                                            $profession_name=$dProfType['profession_name'];
                                                        ?>

                                                              <option value="<?php print $profession_id;?>" <?php if($data['profession'] == $profession_id){ echo "selected"; }  ?> ><?php print $profession_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="profession_idDiv">*Profession Can not be empty</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Phone No</label> -->
                                            <div class="col-md-4 has-success">
                                                <input type="number" placeholder="Purchase Amount (BDT)" class="form-control" name="purchase_amt" value="<?php echo $data['purchase_amt']; ?>" id="purchase_amt" required="">
                                                <div style="color: red;display: none" id="purchase_amtDiv">*Purchase Amount (BDT) Can not be empty</div>
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office Email</label> -->
                                            <div class="col-md-4 has-success"><input type="number" placeholder="Selling Amount (BDT)" class="form-control" value="<?php echo $data['sales_amt']; ?>" name="sales_amt" id="sales_amt" required="">
                                                <div style="color: red;display: none" id="sales_amtDiv">*Selling Amount (BDT) Can not be empty</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="office_id" onchange="showSubGl(this.value)">
                                                    <option value="">--Select Office--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM office where status='1' order by office_name ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $office_id=$dGlType['office_id'];
                                                            $office_name=$dGlType['office_name'];
                                                        ?>

                                                              <option value="<?php print $office_id;?>" <?php if($data['office_id'] == $office_id){ echo "selected"; }  ?> ><?php print $office_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="office_idDiv">*Office Can not be empty</div>
                                            </div> 
                                             <div class="col-md-4 has-success"><input type="text" placeholder="Salary" class="form-control" name="salary"  value="<?php echo $data['salary']; ?>" id="salary" required="">
                                                
                                            </div> 
                                             
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Phone No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Working Hour" class="form-control"  value="<?php echo $data['working_hr']; ?>" name="working_hr" id="working_hr" required="">
                                                
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office Email</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Food" class="form-control" name="food" value="<?php echo $data['food']; ?>" id="food" required="">
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Phone No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Accommodation" class="form-control" name="accommodation" value="<?php echo $data['accommodation']; ?>" id="accommodation" required="">
                                                
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office Email</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Age Limit" class="form-control" name="age_limit" value="<?php echo $data['age_limit']; ?>" id="age_limit" required="">
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Phone No</label> -->
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Reference Code" class="form-control" name="ref_code"  value="<?php echo $data['ref_code']; ?>"id="ref_code" required="">
                                                
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office Email</label> -->
                                            <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="country_id" >
                                                    <option value="">--Select Country--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM medical_country  order by country_name ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $country_id=$dGlType['country_id'];
                                                            $country_name=$dGlType['country_name'];
                                                        ?>

                                                              <option value="<?php print $country_id;?>" <?php if($data['country'] == $country_id){ echo "selected"; }  ?> ><?php print $country_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="office_idDiv">*Office Can not be empty</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <input type="hidden" name="company_info_id" id="company_info_id" value="<?php echo $company_info_id; ?>">
                                
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="button" class="btn btn-primary btn-bg col-sm-12" id="register" value="Update" name="register" onclick="submitForm()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

    function submitForm()
{
    
    var company_id      = document.getElementById('company_id').value
    var profession      = document.getElementById('profession_id').value
    var purchase_amt    = document.getElementById('purchase_amt').value
    var sales_amt       = document.getElementById('sales_amt').value
    var office_id       = document.getElementById('office_id').value
    var salary          = document.getElementById('salary').value
    var working_hr      = document.getElementById('working_hr').value
    var food            = document.getElementById('food').value
    var accommodation   = document.getElementById('accommodation').value
    var age_limit       = document.getElementById('age_limit').value
    var ref_code        = document.getElementById('ref_code').value
    var country_id      = document.getElementById('country_id').value
    var company_info_id = document.getElementById('company_info_id').value
    
    var errorCheck=0;
   if(company_id=='')
   {
        document.getElementById("company_nameDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
     document.getElementById("company_nameDiv").style.display = "none";  
   }
   if(profession=='')
   {
        document.getElementById("profession_idDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("profession_idDiv").style.display = "none";
   }
   if(purchase_amt=='')
   {
        document.getElementById("purchase_amtDiv").style.display = "block";
       errorCheck++;
   }
   else
   {
    document.getElementById("purchase_amtDiv").style.display = "none";
   }
   if(sales_amt=='')
   {
        document.getElementById("sales_amtDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
    document.getElementById("sales_amtDiv").style.display = "none";
   }
   if(office_id=='')
   {
        document.getElementById("office_idDiv").style.display = "block";
        errorCheck++;
   }
   else
   {
    document.getElementById("office_idDiv").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'companyUpdate', 
        data: {
            company_id     : company_id,
            profession     : profession,
            purchase_amt   : purchase_amt,
            sales_amt      : sales_amt,
            office_id      : office_id,
            salary         : salary,
            working_hr     : working_hr,
            food           : food,
            accommodation  : accommodation,
            age_limit      : age_limit,
            ref_code       : ref_code,
            country_id     : country_id,
            company_info_id: company_info_id
        },
        success: function(response) {
        
           if(response==1)
           {
                cuteAlert({
                      type      : "success",
                      title     : "Company information Update.",
                      message   : "Company information updated successfully",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("companySetup");
                        })
           }
           else
           {
                cuteAlert({
                  type      : "error",
                  title     : "ERROR",
                  message   : "Company information updated failed",
                  buttonText: "Okay"
                }).then((e)=>{
                       window.location.replace("companySetup");
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