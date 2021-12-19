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
                            <strong>Authorize New GL </strong>
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
                            <h5>Unauthorized GL</h5>
                            
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
                                        <th>GL Name </th>
                                        <th>GL No </th>
                                        <th>GL Type</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT * FROM `transactions` tr left join gl_head gl on tr.gl_id=gl.gl_id left join gl_type glt on tr.transaction_type=glt.gl_type_id left join users usr on usr.user_id=tr.entry_by where tr.status='0' and tr.entry_by<>'$user_id'order by transaction_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $transaction_id=$d['transaction_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['gl_name']?></td>
                                        <td><?php print $d['gl_ac']?></td>
                                        <td><?php print $d['type_name']?></td>
                                        <td><?php print $d['amount']?></td>
                                        <td><?php print $d['type_name']?></td>
                                        <td><?php print $d['remarks']?></td>
                                        <td><?php print$d['entry_dt']?></td>
                                        
                                        <td><a href="#" onclick="authAc('<?php print $transaction_id; ?>','1')"><i class="fa fa-check text-navy"> Authorize</i></a> <hr><a href="#" onclick="authAc('<?php print $transaction_id; ?>','0')"><i class="fa fa-close " style="color:red"> Decline</i></a></td>
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

  function authAc(transaction_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authAc', 
            data: {
                transaction_id : transaction_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "Entry Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("authAccount");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "Entry Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authAccount");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Entry not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("authAccount");
                          })
                 }
            }
        });
  }
  

   
   

</script>

<?php 

include('footer.php');
    
?>