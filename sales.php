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
                    <h2>Sales Entry </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Sales</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Sales Entry Form</strong>
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
                            <h5>Sales Entry Info </h5>
                            
                        </div>

                        <div class="ibox-content">
                            <form method="get">
                                 <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                             <div class="col-md-4 has-success">
                                                <select class="select2_demo_1 form-control " required="" id="company" onchange="getProfession(this.value)">
                                                    <option value="">--Select Company--</option>
                                                        <?php 
                                                        $qGlType=mysqli_query($con,"SELECT * FROM `company` where status='1' order by company_name ASC");
                                                        while($dGlType=mysqli_fetch_array($qGlType))
                                                        {
                                                            $company_id=$dGlType['company_id'];
                                                            $company_name=$dGlType['company_name'];
                                                            
                                                        ?>

                                                              <option value="<?php print $company_id;?>"><?php print $company_name;?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                 <div style="color: red;display: none" id="company_Div">*Company Status Can not be empty</div>
                                            </div>  
                                            
                                                <div class="col-md-4 has-success" id="profession_div">
                                                <div id="profession_select_div">
                                                    
                                                        
                                                </div>
                                                 

                                                 <div style="color: red;display: none" id="profession_Div">*Profession Can not be empty</div>
                                             
                                            </div>
                                        </div>

                                    </div>
                                    
                                        
                                </div>
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
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Purchase Amount(BDT)" class="form-control" name="purchase_amt" id="purchase_amt" readonly="" >
                                                 <div style="color: red;display: none" id="purchase_amt_Div">*Purchase Amount(BDT) Can not be empty</div>
                                                  
                                            </div>
                                            <div class="col-md-4 has-success"><input type="text" placeholder="Sale Amount(BDT)" class="form-control" name="sale_amt" id="sale_amt" required="" >
                                                 <div style="color: red;display: none" id="sale_amt_Div">*Sale Amount(BDT) Can not be empty</div>
                                                  <div style="color: red;display: none" id="sale_amt_diff_Div">*Sale Amount(BDT) Can not be Smaller than/Equal to Purchase Amount(DBDT)</div>
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
                                                        <td>Reference Agent:</td>
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
      $("#register").hide();
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
 function getProfession(company_id)
 {
    
         $.ajax({  
        type: 'POST',  
        url: 'getProfessionList', 
        data: {
            company_id : company_id,
            
            
        },
        success: function(response) {
            console.log(response)
            if(response!='')
            {
               
              
               
                $("#profession_select_div").html(response);
            }
            else
            {
               $("#profession_select_div").html(response);
             
            }
           
          
        }
    });
 } 
 
 function showCompanyInfo(company_id,profession_id)
 {
    
        
         $.ajax({  
        type: 'POST',  
        url: 'getCompanyInfo', 
        data: {
            company_id : company_id,
            profession_id:profession_id
            
            
        },
        success: function(response) {
            if(response!='')
            {
               
              obj = JSON.parse(response);
               
               document.getElementById("purchase_amt").value=obj.purchase_amt;
               document.getElementById("sale_amt").value=obj.sales_amt;
            }
            else
            {
               document.getElementById("purchase_amt").value=null;
               document.getElementById("sale_amt").value=null;
             
            }
           
          
        }
    });
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
                $("#register").show();
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
    var company=document.getElementById('company').value
    var purchase_amt=document.getElementById('purchase_amt').value
    var sale_amt=document.getElementById('sale_amt').value
   var passport_check= document.getElementById('passport_check').value
   var profession_id= document.getElementById('profession_id').value
  
   
    
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
   if(company=='')
   {
        document.getElementById("company_Div").style.display = "block";
        errorCheck++;
   }
   else
   {

        document.getElementById("company_Div").style.display = "none";
   }
    if(purchase_amt=='')
   {
        document.getElementById("purchase_amt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("purchase_amt_Div").style.display = "none";
   }
    if(sale_amt=='')
   {
        document.getElementById("sale_amt_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("sale_amt_Div").style.display = "none";
   }
    if(profession_id=='')
   {
        document.getElementById("profession_Div").style.display = "block";
        errorCheck++;
   }
   else
   {
        document.getElementById("profession_Div").style.display = "none";
   }
var s = new Number(sale_amt);
var p = new Number(purchase_amt);

   if( s < p)
   {
        document.getElementById("sale_amt_diff_Div").style.display = "block";
        errorCheck++;
       
   }
   else
   {
         document.getElementById("sale_amt_diff_Div").style.display = "none";
   }

if(errorCheck==0)
{
        $.ajax({  
        type: 'POST',  
        url: 'saleEntry', 
        data: {
            passport : passport,
            company : company,
            purchase_amt : purchase_amt,
            sale_amt:sale_amt,
            profession_id:profession_id
            
            
        },
        success: function(response) {
           if(response==1)
           {
                cuteAlert({
                      type: "success",
                      title: "New Entry Registered. ",
                      message: "Please Authorize the new Sale Entry",
                      buttonText: "Okay"
                    }).then((e)=>{
                         window.location.replace("sales");
                        })
           }
           else
           {
                if(response==5)
                {
                        cuteAlert({
                          type: "error",
                          title: "ERROR",
                          message: "Medical Not Completed Yet",
                          buttonText: "Okay"
                        }).then((e)=>{
                               window.location.replace("sales");
                            })
                }
                else if(response==6)
                {
                        cuteAlert({
                      type: "error",
                      title: "ERROR",
                      message: "Sale Entry Already Waiting for Authorization",
                      buttonText: "Okay"
                    }).then((e)=>{
                           window.location.replace("sales");
                        })
                }
                else
                {
                        cuteAlert({
                      type: "error",
                      title: "ERROR",
                      message: "Sale Entry not Registered",
                      buttonText: "Okay"
                    }).then((e)=>{
                           window.location.replace("sales");
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


</script>

<?php 

include('footer.php');
    
?>