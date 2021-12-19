<?php
include('connection/connect.php');
include('common/common.php');


if(isset($_POST['company_id']) and !empty($_POST['company_id']))
{

    $company_id=$_POST['company_id'];
?>




 <select class="select2_demo_1 form-control " required="" id="profession_id" onchange="showCompanyInfo(<?php print  $company_id;?>,this.value)">
    <option value="">--Select Profession--</option>
        <?php 
        $qGlType=mysqli_query($con,"select * FROM profession prf left join company_info comp_info on comp_info.profession=prf.profession_id left join company cmp on cmp.company_id=comp_info.company_id where comp_info.company_id='$company_id' order by prf.profession_name ASC");
        while($dGlType=mysqli_fetch_array($qGlType))
        {
            $profession_id=$dGlType['profession_id'];
            $profession_name=$dGlType['profession_name'];
            
        ?>

              <option value="<?php print $profession_id;?>"><?php print $profession_name;?></option>

        <?php
        }
        ?>
</select>
<?php
}
?>