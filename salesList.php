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
                    <h2>Sales List</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Sales List</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Sales List</strong>
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
                            <h5>Sales List</h5>
                            
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
                                        <th>Company Name</th>
                                        <th>Profession</th>
                                        <th>Purchase Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Entry By</th>
                                        <th>Entry Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $q=mysqli_query($con,"SELECT *,s.passport_no as passport_no,s.sale_amt as sale_amt,s.purchase_amt as purchase_amt from sales s 
                                      left join company cmp on cmp.company_id=s.company_id 
                                      left join company_info cmpi on s.company_id=cmpi.company_id 
                                      left join passenger p on s.passport_no=p.passport_no 
                                      left join users u on u.user_id=s.entry_by_sale 
                                      left join profession prf on s.profession=prf.profession_id 
                                      where s.status='1' group by sale_id");
                                     
                                      $sl=0;
                                      while($d=mysqli_fetch_array($q))
                                      {
                                        $sl++;
                                        $process_id=$d['sale_id'];
                                        $process_sale=$d['sale_amt'];
                                        $comp_sale=$d['sales_amt'];
                                        if($process_sale==$comp_sale)
                                        {
                                            $sale=$process_sale;
                                        }
                                        else
                                        {
                                            $sale=$process_sale."(".$comp_sale.")";
                                        }
                                      ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"  class="i-checks" name="input[]"></td> -->
                                        <td><?php print $sl?></td>
                                        <td><?php print $d['passport_no']?></td>
                                        <td><?php print $d['passenger_name']?></td>
                                        <td><?php print $d['company_name']?></td>
                                        <td><?php print $d['profession_name']?></td>
                                        <td><?php print $d['purchase_amt']?></td>
                                        <td><?php print $sale?></td>
                                        <td><?php print $d['user_name']?></td>
                                        <td><?php print$d['entry_dt']?></td>

                                        <td>
                                            <a href="salesEdit?sale_id=<?php print $process_id; ?>">
                                                <i class="fa fa-edit text-navy">Edit</i>
                                            </a> 
                                            <br>
                                            <a href="#" onclick="deleteSales('<?php print $process_id; ?>')">
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

  function authSales(process_id,opt)
  {
    
    $.ajax({  
            type: 'POST',  
            url: 'authSales', 
            data: {
                process_id : process_id,
                opt:opt
            },
            success: function(response) {
               
               if(response==1)
                 {
                      cuteAlert({
                            type: "success",
                            title: "Sales Authorized. ",
                            message: "",
                            buttonText: "Okay"
                          }).then((e)=>{
                               window.location.replace("salesAuth");
                              })
                 }
                 else if(response==2)
                 {
                      cuteAlert({
                        type: "error",
                        title: "success",
                        message: "Sales Authorization Declined",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("salesAuth");
                          })
                 }
                  else
                 {
                      cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: "Sales not Authorized",
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("medicalAuth");
                          })
                 }
            }
        });
  }
  

   
   

</script>



<script>
    function deleteSales(sale_id ){
        if(confirm("Are you sure? You want to delete this sales information?")){
            $.ajax({  
            type: 'POST',  
            url: 'deleteSale', 
            data: {
                sale_id : sale_id
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
                            window.location.replace("salesList");
                        })
                }else{
                    cuteAlert({
                        type: "error",
                        title: "ERROR",
                        message: obj.message,
                        buttonText: "Okay"
                      }).then((e)=>{
                             window.location.replace("salesList");
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