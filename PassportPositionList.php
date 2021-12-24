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
                    <h2>Passport Setup</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Passport</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Passport Position List</strong>
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
                            <h5>Authorized Passport Position List</h5>
                            
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
                                        <th>Passport</th>
                                        <th>Passanger Name </th>
                                        <th>Bearer</th>
                                        <th>Submission Date</th>
                                        <th>Office</th>
                                        <th>Documents</th>
                                        <th>Remarks</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,pr.passport_no as passport_no,pr.entry_dt_pos as entry_dt FROM `passport_position` pr 
                                      left join passenger pa on pr.passport_no=pa.passport_no 
                                      left join users ur on pr.entry_by_pos=ur.user_id 
                                      where pr.status='1' order by position_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $process_id=$d['position_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['passport_no']?></td>
                                        <td><?php print $d['passenger_name']?></td>
                                        <td><?php print $d['bearer_name']?></td>
                                        <td><?php print $d['sub_dt']?></td>
                                        <td><?php print $d['office']?></td>
                                        <td><?php

                                         $doc=$d['doc'];
                                         $docArray=explode(",", $doc);
                                         foreach ($docArray as $key => $value) {
                                            $sl=$key+1;
                                             print "<p><button class='btn btn-primary'>$value</button></p>";
                                         }


                                     ?></td>
                                        <td><?php print $d['remarks']?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print$d['entry_dt']?></td>  
                                        <td>
                                            <a href="editPassportPosition?position_id=<?php print $process_id; ?>">
                                                <i class="fa fa-edit text-navy">Edit</i>
                                            </a> 
                                            <br>
                                            <a href="#" onclick="deletePassportPosition('<?php print $process_id; ?>')">
                                            <i class="fa fa-trash " style="color:red">Delete</i></a>
                                        </td>                                      
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

  function authPass(process_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authpassportPosition', 
            data: {
                process_id : process_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "Passport Position Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("authNewPassportPosition");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "Passport Position Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewPassportPosition");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Passport Position not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewPassportPosition");
                          })
                 }
            }
        });
  }
  

   
   

</script>
<script>
    function deletePassportPosition(position_id ){
        if(confirm("Are you sure? You want to delete this passport position information?")){
            $.ajax({  
            type: 'POST',  
            url: 'deletePassportPosition', 
            data: {
                position_id : position_id
            },
            success: function(response) {
                var obj = JSON.parse(response);
                if(obj.success === true){
                    cuteAlert({
                        type: "success",
                        title: obj.message,
                        message: "",
                        buttonText: "Okay"
                        }).then((e)=>{
                            window.location.replace("PassportPositionList");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("PassportPositionList");
                        })
                }
               
            }
        });
        }
    }
</script>
<?php 

include('footer.php');
    
?>