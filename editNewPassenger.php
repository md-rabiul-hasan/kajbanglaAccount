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
                            <strong>Authorize New Passanger </strong>
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
                            <h5>Unauthorized Passanger</h5>
                            
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
                                        <th>Passanger Name </th>
                                        <th>Passport No </th>
                                        <th>Passport Issue Date </th>
                                        <th>Passport Expire Date </th>
                                        <th>Father's Name</th>
                                        <th>Mother's Name</th>
                                        <th>Date of Birth</th>
                                        <th>Place of Birth</th>
                                        <th>Reference Office</th>
                                        <th>Passport Img</th>
                                        <th>Passanger Img</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,pas.entry_dt as entry_dt FROM `passenger` pas 
                                      left join agent_info agnt on agnt.agent_id=pas.reference_agent_id 
                                      left join users usr on pas.entry_by=usr.user_id
                                       where pas.status='1' order by pas.passenger_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $passenger_id=$d['passenger_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['passenger_name']?></td>
                                        <td><?php print $d['passport_no']?></td>
                                        <td><?php print $d['passport_issue_dt']?></td>
                                        <td><?php print $d['passport_expire_dt']?></td>
                                        <td><?php print $d['father_name']?></td>
                                        <td><?php print $d['mother_name']?></td>
                                        <td><?php print $d['date_of_birth']?></td>
                                        <td><?php print $d['place_of_birth']?></td>
                                        <td><?php print $d['agent_name']?></td>
                                        <td><button class="btn btn-primary" onclick="ShowImg('<?php print $d['passenger_img']?>')">View</button></td>
                                        <td><button class="btn btn-primary" onclick="ShowImg('<?php print $d['passport_img']?>')">View</button></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print $d['entry_dt']?></td>
                                        <td>
                                            <a href="editPassengerInformation?passenger_id=<?php echo $passenger_id; ?>">
                                            <i class="fa fa-pencil text-navy">Edit</i></a> 
                                            <br>
                                            <a href="#" onclick="deltePassanger('<?php echo $passenger_id; ?>')">
                                            <i class="fa fa-trash " style="color:red">Delete</i></a></td>
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
  function authOffice(passenger_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authPassanger', 
            data: {
                passenger_id : passenger_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "New Passanger Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("authNewPassenger");
                              })
                 }
                 else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Passanger not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authNewPassenger");
                          })
                 }
            }
        });
  }
</script>

<script>
    function deltePassanger(passanger_id){
        if(confirm("Are you sure? You want to delete this passanger?")){
            $.ajax({  
            type: 'POST',  
            url: 'deletePassanger', 
            data: {
                passanger_id : passanger_id
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
                            window.location.replace("editNewPassenger");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("editNewPassenger");
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