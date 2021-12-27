<?php
include('header.php');
if(!isset($_SESSION['user_id']) and empty($_SESSION['user_id']))
{
    header("Location:login");
}

?>

<body>

    <div id="wrapper">

    <?php include('sidebar.php');?>

        <div id="page-wrapper" class="gray-bg">
          <?php include('navbar.php');?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>New Menu</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Menu</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>New Menu</strong>
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
                            <h5>New Menu </h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" id="menu_create_form" action="#">
                                 <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <label class="col-sm-2 col-form-label">Office Name</label> -->
                                            <div class="col-md-4 has-success">
                                                <label for="">Menu Title</label>
                                                <input type="text" placeholder="Menu Title" class="form-control" name="menu_title" id="menu_title" required="">
                                            </div>
                                            <!-- <label class="col-sm-2 col-form-label">Office RL No</label> -->
                                            <div class="col-md-4 has-success">
                                                <label for="">Menu Link</label>
                                                <input type="text" placeholder="Menu Link" class="form-control" name="menu_link" id="menu_link" required="" >                                              
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                        <div class="col-md-4 has-success">
                                                <label for="">Menu Status</label>
                                                <select class="select2_demo_1 form-control" onchange="showMenuList(this.value)" id="menu_status" name="menu_status">
                                                    <option value="">Select Option</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>                                                        
                                                </select>
                                            </div>  

                                             <div class="col-md-4 has-success">
                                                <label for="">Roles</label>
                                                <select class="select2_demo_1 form-control" multiple required="" id="roles" name="roles[]">
                                                    <option value="">--Select Roles--</option>
                                                    <?php 
                                                        $sql = "SELECT * FROM `roles`";
                                                        $query = mysqli_query($con, $sql);
                                                        while($data = mysqli_fetch_array($query)){
                                                            ?>
                                                                <option value="<?php echo $data['role_id'] ?>"><?php echo $data['role_name']; ?></option>
                                                            <?php
                                                        }
                                                    ?>                                                    
                                                </select>
                                            </div>  
                                            
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <div class="row">
                                        <div class="col-md-4 has-success" id="parent_menu_section">
                                                <label for="">Parent Menu </label>
                                                <select class="select2_demo_1 form-control"  id="parent_menu" name="parent_menu">
                                                    
                                                        
                                                </select>
                                            </div>  

                                             <div class="col-md-4 has-success">
                                                <label for="">Icon</label>
                                                <input type="text" placeholder="Menu Icon" class="form-control" name="menu_icon" id="menu_icon"  >  
                                               
                                            </div>  
                                            
                                        </div>

                                    </div>
                                </div>
                                
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-danger btn-sm" type="submit">Cancel</button> -->
                                        <input type="submit" class="btn btn-primary btn-bg col-sm-12" id="submit" value="Save" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

   $(document).ready(function(){
        $("#parent_menu_section").hide();
   });
   function showMenuList(status){
       if(status == 2 || status == 3){
            $.ajax({
                type   : 'post',
                url    : 'find_parent_menu',
                data   :{
                    'status' : status
                },  
                success: function (data) {
                    console.log(data);
                    $("#parent_menu_section").show();
                    $("#parent_menu").empty().append(data);
                }
            });
       }else{
            $("#parent_menu_section").hide();
       }
    
   }
</script>

<script>
    $(function () {
        $('#menu_create_form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type   : 'post',
                url    : 'menu_store',
                data   : $('#menu_create_form').serialize(),
                success: function (data) {
                    console.log(data);
                   var obj = JSON.parse(data);
                   if(obj.success === true){
                        cuteAlert({
                            type: "success",
                            title: obj.message,
                            message: "",
                            buttonText: "Okay"
                            }).then((e)=>{
                                window.location.replace("newMenu");
                            })
                    }else{
                        cuteAlert({
                            type: "error",
                            title: "ERROR",
                            message: obj.message,
                            buttonText: "Okay"
                        }).then((e)=>{
                                window.location.replace("newMenu");
                            })
                    }
                }
            });
        });
    });
</script>

<?php 

include('footer.php');
    
?>