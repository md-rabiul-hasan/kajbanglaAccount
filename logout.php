<?php
include('connection/connect.php');


session_unset();
session_destroy();
header("Location:dashboard");

?>