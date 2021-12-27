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
                    <h2>Transaction Authorization Pending List</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Transaction Authorization Pending List</strong>
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
                            <h5>Transaction Authorization Pending List</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Account Type</th>
                                        <th>Transaction Type</th>
                                        <th>DR_CR</th>
                                        <th>GL Name</th>
                                        <th>Office/Agent</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $sql = "SELECT tr.transaction_id,account_type,gt.type_name ,gt.dr_cr , 
                                      o.office_name ,ai.agent_name ,gh.gl_name , tr.amount , tr.remarks , tr.status ,u.user_name , tr.entry_dt 
                                      from  transactions tr
                                      left join gl_type gt on tr.transaction_type  = gt.gl_type_id 
                                      left join  gl_head gh on tr.gl_id = gh.gl_id 
                                      left join office o on tr.office_id  = o.office_id 
                                      left join agent_info ai on tr.agent_id  = ai.agent_id 
                                      left  join  users u on tr.entry_by  = u.user_id 
                                      where tr.status  = 0 AND tr.entry_by<>'$user_id'";
                                        $q = mysqli_query($con, $sql);
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $transaction_id=$d['transaction_id']
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td>
                                            <?php 
                                                if($d['account_type'] == '0'){
                                                    echo "Kaj-Bangla";
                                                }elseif($d['account_type'] == '1'){
                                                    echo "Office";
                                                }elseif($d['account_type'] == '2'){
                                                    echo "Agent";
                                                }
                                            ?>
                                        </td>
                                        <td><?php print $d['type_name']?></td>
                                        <td><?php print $d['dr_cr']?></td>
                                        <td><?php print $d['gl_name']?></td>
                                       
                                        <td>
                                        <?php 
                                                if($d['account_type'] == '0'){
                                                    echo "Kaj-Bangla";
                                                }elseif($d['account_type'] == '1'){
                                                    echo $d['office_name'];
                                                }elseif($d['account_type'] == '2'){
                                                    echo $d['agent_name'];
                                                }
                                            ?>
                                        </td>
                                        <td><?php print number_format($d['amount'],2); ?></td>
                                        <td><?php print $d['remarks']; ?></td>
                                        <td><?php print $d['user_name']; ?></td>
                                        <td><?php print $d['entry_dt']; ?></td>
                                        <td>
                                             <a href="#" onclick="authorizeTransaction('<?php print $transaction_id; ?>')">
                                            <i  style="color:green">Autorize</i></a>
                                            <br>
                                            <a href="#" onclick="deleteTransaction('<?php print $transaction_id; ?>')">
                                            <i  style="color:red">Delete</i></a>
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






<script>
    function authorizeTransaction(transaction_id){
        if(confirm("Are you sure? You want to authorize this transaction?")){
            $.ajax({  
            type: 'POST',  
            url: 'transactionAuthroize', 
            data: {
                transaction_id : transaction_id
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
                            window.location.replace("transcationPendingAuthorize");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("transcationPendingAuthorize");
                        })
                }
               
            }
        });
        }
    }
</script>



<script>
    function deleteTransaction(transaction_id ){
        if(confirm("Are you sure? You want to delete this transaction?")){
            $.ajax({  
            type: 'POST',  
            url: 'transactionDelete', 
            data: {
                transaction_id : transaction_id
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
                            window.location.replace("transcationPendingAuthorize");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("transcationPendingAuthorize");
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