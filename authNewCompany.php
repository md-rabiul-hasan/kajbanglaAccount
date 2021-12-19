<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}
$user_id=$_SESSION['user_id'];
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
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Authorize New Company </strong>
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
                            <h5>Unauthorized Company</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <!-- <div class="col-sm-5 m-b-xs"><select class="form-control-sm form-control input-s-sm inline">
                                    <option value="0">--Filter--</option>
                                    <option value="1">Unauthorized</option>
                                    <option value="2">Authorized</option>
                                    <option value="3">Declined</option>
                                </select>
                                </div> -->
                               <!--  <div class="col-sm-3">
                                    <div class="input-group"><input placeholder="Search" type="text" class="form-control form-control-sm"> <span class="input-group-append"> <button type="button" class="btn btn-sm btn-primary">Go!
                                    </button> </span></div>

                                </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                       <!--  <th>check</th> -->
                                        <th>SL</th>
                                        <th>Company Name </th>
                                        <th>Profession</th>
                                        <th>Purchase Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Office</th>
                                        <th>Country</th>
                                        <th>Salary</th>
                                        <th>Working Hour</th>
                                        <th>Food</th>
                                        <th>Accommodation</th>
                                        <th>Age Limit</th>
                                        <th>Reference Code</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,cmpi.entry_dt as entry_dt FROM `company_info` cmpi left join company cmp on cmpi.company_id=cmp.company_id left join office ofc on ofc.office_id=cmpi.office_id left join users usr on usr.user_id=cmpi.entry_by left join profession prf on prf.profession_id=cmpi.profession left join medical_country cnt on cnt.country_id=cmpi.country where cmpi.status='0' and cmpi.entry_by<>'$user_id'");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $company_info_id=$d['company_info_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['company_name']?></td>
                                        <td><?php print $d['profession_name']?></td>
                                        <td><?php print $d['purchase_amt']?></td>
                                        <td><?php print $d['sales_amt']?></td>
                                        <td><?php print $d['office_name']?></td>
                                        <td><?php print $d['country_name']?></td>
                                        <td><?php print $d['salary']?></td>
                                        <td><?php print $d['working_hr']?></td>
                                        <td><?php print $d['food']?></td>
                                        <td><?php print $d['accommodation']?></td>
                                        <td><?php print $d['age_limit']?></td>
                                        <td><?php print $d['ref_code']?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print$d['entry_dt']?></td>
                                        
                                        <td><a href="#" onclick="authCompany('<?php print $company_info_id; ?>','1')"><i class="fa fa-check text-navy">Accept</i></a> <br><a href="#" onclick="authCompany('<?php print $company_info_id; ?>','0')"><i class="fa fa-close " style="color:red">Decline</i></a></td>
                                    </tr>
                                     <?php
                                      }
                                      ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

<script type="text/javascript">

  function authCompany(company_info_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authCompany', 
            data: {
                company_info_id : company_info_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "New Company Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("authNewCompany");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "Company Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewCompany");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Company not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewCompany");
                          })
                 }
            }
        });
  }
  

   
   

</script>

<?php 

include('footer.php');
    
?>