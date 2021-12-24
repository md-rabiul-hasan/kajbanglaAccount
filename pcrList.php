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
                    <h2>PCR Test List</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>PCR Test</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>PCR Test List</strong>
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
                            <h5>PCR Test List</h5>
                            
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
                                        <th>COVID-19</th>
                                        <th>Next PCR Test Date</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,pr.passport_no as passport_no,pr.entry_dt_pcr as entry_dt FROM `pcr` pr  
                                      left join passenger pa on pr.passport_no=pa.passport_no 
                                      left join users ur on pr.entry_by_pcr=ur.user_id  
                                      where pr.status='1'  order by pcr_id DESC");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $process_id=$d['pcr_id'];
                                        $pcr=$d['pcr_test'];
                                        if($pcr=="P")
                                        {
                                            $pcr="POSITIVE";
                                            $nPcr=$d['next_pcr_dt'];
                                        }
                                        else
                                        {
                                           $pcr="NEGATIVE"; 
                                           $nPcr=NULL;;
                                        }
                                        
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['passport_no']?></td>
                                        <td><?php print $d['passenger_name']?></td>
                                        <td><?php print $pcr?></td>
                                        <td><?php print $nPcr?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print$d['entry_dt']?></td>

                                        <td>
                                            <a href="editPcr?pcr_id=<?php print $process_id; ?>">
                                                <i class="fa fa-edit text-navy">Edit</i>
                                            </a> 
                                            <br>
                                            <a href="#" onclick="deletePcr('<?php print $process_id; ?>')">
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
            url: 'authPcr', 
            data: {
                process_id : process_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "PCR Test Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("pcrAuth");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "PCR Test Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("pcrAuth");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "PCR Test not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("pcrAuth");
                          })
                 }
            }
        });
  }
  

   
   

</script>


<script>
    function deletePcr(pcr_id ){
        if(confirm("Are you sure? You want to delete this pcr information?")){
            $.ajax({  
            type: 'POST',  
            url: 'deletePcr', 
            data: {
                pcr_id : pcr_id
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