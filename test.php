<?php
include('connection/connect.php');
include('common/common.php');
$visa_dt='2021-01-01';
$days=90;
 $Exdate = strtotime("+".$days." days", strtotime($visa_dt));
 print $visa_exp_dt=date('Y-m-d',$Exdate);
?>