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
                    <h2>Police Clearance List</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Parameter Setup</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Police Clearance List </strong>
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
                            <h5>Police Clearance List</h5>
                            
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
                                        <th>Police Clearance No</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,pr.passport_no as passport_no,pr.entry_dt_pc as entry_dt FROM `pc` pr 
                                      left join passenger pa on pr.passport_no=pa.passport_no 
                                      left join users ur on pr.entry_by_pc=ur.user_id 
                                      where pr.status='1' order by pc_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $process_id=$d['pc_id'];
                                        
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['passport_no']?></td>
                                        <td><?php print $d['passenger_name']?></td>
                                        <td><?php print $d['police_c_no']?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print$d['entry_dt']?></td>

                                        <td>
                                            <a href="editPoliceClearance?pc_id=<?php print $process_id; ?>">
                                                <i class="fa fa-edit text-navy">Edit</i>
                                            </a> 
                                            <br>
                                            <a href="#" onclick="deletePoliceClearance('<?php print $process_id; ?>')">
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

  function authPc(process_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authPc', 
            data: {
                process_id : process_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "Police Clearance Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("pcAuth");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "Police Clearance Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("pcAuth");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Police Clearance not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("pcAuth");
                          })
                 }
            }
        });
  }
  

   
   

</script>


<script>
    function deletePoliceClearance(pc_id ){
        if(confirm("Are you sure? You want to delete this police clearance ?")){
            $.ajax({  
            type: 'POST',
            url : 'deletePc',
            data: {
                pc_id : pc_id
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
                            window.location.replace("agentList");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("agentList");
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