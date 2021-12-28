<?php
include('header.php');
include('connection/connect.php');
if (!isset($_SESSION['user_id']) and empty($_SESSION['user_id'])) {
    header("Location:login");
}
$user_id=$_SESSION['user_id'];

$starting_date  = date('Y-m-d', strtotime($_GET['starting_date']));
$ending_date    = date('Y-m-d', strtotime($_GET['ending_date']));
$account_type   = $_GET['account_type'];;
$office_id      = $_GET['office_id'] ?? 'all';
$agent_id       = $_GET['agent_id'] ?? 'all';
$transaction_id = $_GET['transaction_id'];;
$gl_id          = $_GET['gl_id'];

$dateSql = "  and tr.entry_dt between '$starting_date' and '$ending_date' ";

if($account_type == 'all'){
    $account_type_sql = '';
}elseif($account_type == '0'){
    $account_type_sql = " and tr.account_type = '0' ";
}elseif($account_type == '1'){
    $account_type_sql = " and tr.account_type = '1' ";
}elseif($account_type == '2'){
    $account_type_sql = " and tr.account_type = '2' ";
}

if($office_id == 'all'){
    $office_sql = "";
}else{
    $office_sql = " and tr.office_id = '$office_id' ";
}

if($agent_id == 'all'){
    $agent_sql = "";
}else{
    $agent_sql = " and tr.agent_id = '$agent_id' ";
}

if($transaction_id == 'all'){
    $transaction_sql = "";
}else{
    $transaction_sql = " and tr.transaction_type = '$transaction_id' ";
}


if($gl_id == 'all'){
    $gl_sql = "";
}else{
    $gl_sql = " and tr.gl_id = '$gl_id' ";
}



$sql = "SELECT tr.transaction_id,account_type,gt.type_name ,gt.dr_cr , 
o.office_name ,ai.agent_name ,gh.gl_name , tr.amount , tr.remarks , tr.status ,
u.user_name , tr.entry_dt ,au.user_name  as auth_user, tr.auth_dt 
from  transactions tr
left join gl_type gt on tr.transaction_type  = gt.gl_type_id 
left join  gl_head gh on tr.gl_id = gh.gl_id 
left join office o on tr.office_id  = o.office_id 
left join agent_info ai on tr.agent_id  = ai.agent_id 
left  join  users u on tr.entry_by  = u.user_id 
left join  users au on tr.auth_by  = au.user_id 
where tr.status  = 1 $dateSql $account_type_sql $office_sql $agent_sql $transaction_sql $gl_sql order by tr.transaction_id  desc";

?>

<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


<body>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Transaction  List</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Account Type</th>
                                        <th>Transaction Type</th>
                                        <!-- <th>DR_CR</th> -->
                                        <th>GL Name</th>
                                        <th>Office/Agent</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Status</th>
                                        <th>Auth By</th>
                                        <th>Auth Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                  
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
                                        <!-- <td><?php // print $d['dr_cr']?></td> -->
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
                                        <td><?php print 'Authorized'; ?></td>
                                        <td><?php print $d['auth_user']; ?></td>
                                        <td><?php print $d['auth_dt']; ?></td>

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

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

        <!-- Page-Level Scripts -->
        <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'TransactionFile'},
                    {extend: 'pdf', title: 'TransactionFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>