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
                    <h2>Office Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Authorize New Office </strong>
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
                            <h5>Unauthorized Office</h5>
                            
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
                                        <th>Office Name </th>
                                        <th>Office RL No </th>
                                        <th>Office Phone No</th>
                                        <th>Office Email</th>
                                        <th>Offcie Address</th>
                                        <th>Entry By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT * FROM office ofc left join users usr on usr.user_id=ofc.entry_by WHERE ofc.status='0' and ofc.entry_by<>'$user_id' order by ofc.office_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $offcie_id=$d['office_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['office_name']?></td>
                                        <td><?php print $d['office_rl_no']?></td>
                                        <td><?php print $d['office_phone_no']?></td>
                                        <td><?php print $d['office_email']?></td>
                                        <td><?php print$d['office_address']?></td>
                                        <td><?php print$d['user_name']?></td>
                                        <td><a href="#" onclick="authOffice('<?php print $offcie_id; ?>','1')"><i class="fa fa-check text-navy"></i></a> <br><a href="#" onclick="authOffice('<?php print $offcie_id; ?>','0')"><i class="fa fa-close " style="color:red"></i></a></td>
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

  function authOffice(office_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authOffice', 
            data: {
                office_id : office_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "New Office Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("authNewOffice");
                              })
                 }
                 else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Office not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewOffice");
                          })
                 }
            }
        });
  }
  

    function checkRLNo(rl)
    {
        $.ajax({  
            type: 'POST',  
            url: 'rlCheck', 
            data: {
                rl : rl,
            },
            success: function(response) {
              alert(response)
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
   

</script>

<?php 

include('footer.php');
    
?>