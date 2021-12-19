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
                            <strong>Edit New Office </strong>
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
                            <h5>Edit Office</h5>
                            
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
                                      $q=mysqli_query($con,"SELECT * FROM office ofc left join users usr on usr.user_id=ofc.entry_by  where ofc.status='1' order by ofc.office_id DESC");
                                     
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
                                        <td>
                                          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="showData('<?php print $offcie_id;?>')">Edit</button>
                                        </td>
                                        <!-- <td><a href="#" onclick="authOffice('<?php print $offcie_id; ?>','1')"><i class="fa fa-check text-navy"></i></a> <br><a href="#" onclick="authOffice('<?php print $offcie_id; ?>','0')"><i class="fa fa-close " style="color:red"></i></a></td> -->
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

<!-- Modal start-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Office Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="ibox-content">
                            <form>
                                
                                <div class="form-group row has-success">Office Name

                                    <div class="col-lg-10"><input type="text" placeholder="Office Name" class="form-control" id="name"> 
                                    </div>
                                </div>
                                <div class="form-group row has-success">Office RL No

                                    <div class="col-lg-10"><input type="text" placeholder="Office RL No" class="form-control" id="rl"></div>
                                </div>
                                <div class="form-group row has-success">Office Phone No

                                    <div class="col-lg-10"><input type="text" placeholder="Office Phone No" class="form-control" id="phone"></div>
                                </div>
                                <div class="form-group row has-success">Office Email

                                    <div class="col-lg-10"><input type="text" placeholder="Office Email" class="form-control" id="email"></div>
                                </div>
                                <div class="form-group row has-success">Office Address

                                    <div class="col-lg-10"><input type="text" placeholder="Office Address" class="form-control" id="address"></div>
                                </div>
                                <input type="hidden" name="id" id="id">
                            </form>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveUpdate">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- modal ends -->









<script type="text/javascript">

  $(document).ready(function() {
    $("#saveUpdate").click(function(){
         var  name=document.getElementById('name').value
         var  rl=document.getElementById('rl').value
         var  phone=document.getElementById('phone').value
         var  email=document.getElementById('email').value
         var address =document.getElementById('address').value
         var  id=document.getElementById('id').value
         $.ajax({  
            type: 'POST',  
            url: 'updateOffice', 
            data: {
                name : name,
                rl : rl,
                phone : phone,
                email : email,
                address : address,
                id : id,
            },
            success: function(response) {
               if(response==1)
               {
                  cuteAlert({
                            type: "success",
                            title: "Office Info Updated. ",
                            message: "Please Authorized the entry",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("editNewOffice");
                              })
               }
               else
               {
                  cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Office Info Not Updated",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("editNewOffice");
                          })
               }
            }
        });

    }); 
});

  function showData(office_id)
  {
       $.ajax({  
            type: 'POST',  
            url: 'showOffice', 
            data: {
                office_id : office_id,
            },
            success: function(response) {
               obj = JSON.parse(response);
               document.getElementById('name').value=obj.office_name
               document.getElementById('rl').value=obj.office_rl_no
               document.getElementById('phone').value=obj.office_phone_no
               document.getElementById('email').value=obj.office_email
               document.getElementById('address').value=obj.office_address
               document.getElementById('id').value=obj.office_id
            }
        });
  }

  
  

    
   

</script>

<?php 

include('footer.php');
    
?>