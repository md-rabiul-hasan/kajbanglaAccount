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
                    <h2>Profession Setup</h2>
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
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,ai.entry_dt as entry_dt FROM `company` ai  left join users usr on ai.entry_by=usr.user_id where ai.status='0' and ai.entry_by<>'$user_id' order by ai.company_id DESC");
                                     
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $company_id=$d['company_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['company_name']?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print $d['entry_dt']?></td>
                                        <td><a href="#" onclick="authCompany('<?php print $company_id; ?>','1')"><i class="fa fa-check text-navy">Accept</i></a> <br><a href="#" onclick="authCompany('<?php print $company_id; ?>','0')"><i class="fa fa-close " style="color:red">Decline</i></a></td>
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Imape</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="ibox-content">
                            <form>
                                <img src="" id="showImg" style="width: 100%;height: 100%;"> 
                            </form>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<!-- modal ends -->


<script type="text/javascript">
    function ShowImg(img)
    {
        $('#myModal').modal('show');
        $('#showImg').attr("src", img);
    }
  function authCompany(company_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authNewCompanyName', 
            data: {
                company_id : company_id,
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
                               window.location.replace("AuthNewCompanySetup");
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
                             window.location.replace("AuthNewCompanySetup");
                          })
                 }
            }
        });
  }
  

    
   

</script>

<?php 

include('footer.php');
    
?>