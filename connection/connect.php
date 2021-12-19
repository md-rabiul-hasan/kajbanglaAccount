<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name='kajbangla_account_desk';
// $servername = "localhost";
// $username = "tokyoban_account_desk";
// $password = "X+uc;W^)lVQw";
// $db_name='tokyoban_account_desk';
$con=mysqli_connect($servername,$username,$password,$db_name);

// set the PDO error mode to exception
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    mysqli_select_db($con,$db_name);
}

// ...some PHP code for database "my_db"...

// Change database to "test"


// ...some PHP code for database "test"...
date_default_timezone_set('Asia/Dhaka');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>