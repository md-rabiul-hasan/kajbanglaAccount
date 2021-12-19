<?php
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function get_page_name()
{
	return ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) );
}
function getPassportStatus($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `process` WHERE passport_no='$passport'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusMed($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `medical` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusPc($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `pc` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusTF($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `training` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusVacc($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `vaccine` WHERE passport_no='$passport'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusVaccFinal($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `vaccine` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
function getPassportStatusSales($con,$passport)
{
    $q=mysqli_query($con,"SELECT * FROM `sales` WHERE passport_no='$passport' and status='1'");

    $d=mysqli_fetch_array($q);
    return $d;
}
?>