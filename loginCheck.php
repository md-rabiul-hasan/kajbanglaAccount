<?php
include('connection/connect.php');
include('common/common.php');
if(isset($_POST['userId']) and isset($_POST['password']))
{
	$password=$_POST['password'];
	$passwordHash=password_hash($password, PASSWORD_DEFAULT);
	$userId=$_POST['userId'];
	$ip=get_client_ip();
	$q=mysqli_query($con,"SELECT * FROM users usr left join roles rl on usr.role=rl.role_id WHERE usr.user_name='$userId' and usr.status='1'");
	$found=0;
	$response=NULL;
	if(mysqli_num_rows($q)>0)
	{
		while($d=mysqli_fetch_array($q))
		{
			$db_password=$d['password'];
			
			if(password_verify($password, $db_password))//password match
			{
			  $db_ip=$d['ip'];  
			  $user_id=$d['user_id']; 
			  $role_name=$d['role_name']; 
			  $role=$d['role']; 
			  $mobile=$d['mobile']; 
			  $nid=$d['nid']; 
			  $status=$d['status']; 
			  $entry_date=$d['entry_date']; 
			  if($ip==$db_ip and  $db_ip!=0)
			  {
			  	
			  	
			  	// $_SESSION['user_id']=array('user_id' => $user_id,

			  	// 							'user_name' =>$userId ,
			  	// 							'role' => 	$role,
			  	// 							'role_name' => 	$role_name,
			  	// 							'mobile' => $mobile,
			  	// 							'nid' =>$nid ,
			  	// 							'status' =>$status ,
			  	// 							'entry_date' => $entry_date,
			  	// 							'ip' => $ip,
			  	// 							 );
			  	$_SESSION['user_id']=$user_id;
			  	$_SESSION['user_name']=$userId;
			  	$_SESSION['role']=$role;
			  	$_SESSION['role_name']=$role_name;
			  	$_SESSION['mobile']=$mobile;
			  	$_SESSION['nid']=$nid;
			  	$_SESSION['status']=$status;
			  	$_SESSION['entry_date']=$entry_date;
			  	$_SESSION['ip']=$ip;

			  	$found=1;
			  	$response=0;
			  	break;
			  	//print_r($_SESSION['user_id']);
			  }
			  elseif($db_ip==0)
			  {
			  		$_SESSION['user_id']=$user_id;
				  	$_SESSION['user_name']=$userId;
				  	$_SESSION['role']=$role;
				  	$_SESSION['role_name']=$role_name;
				  	$_SESSION['mobile']=$mobile;
				  	$_SESSION['nid']=$nid;
				  	$_SESSION['status']=$status;
				  	$_SESSION['entry_date']=$entry_date;
				  	$_SESSION['ip']=$ip;
			  		$qUpdate=mysqli_query($con,"UPDATE users set ip='$ip' WHERE user_id='$user_id'");
			  		$found=1;
			  		$response=0;
			  		break;
			 }
			 else//logged in from different ip
			 {
			 	$response=3;
			 }

			}
			else//password not match
			{
				$response=1;
			}
		}
	}
	else//user not match
	{
		$response=2;
	}
	print $response;
}


?>