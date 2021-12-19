<?php
include('header.php');
?>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">

                <h2 class="font-bold">Welcome to KajBangla Account Desk</h2>

                <p>
                    Kaj Bangla Employment Service is one of the leading Governments approved Manpower Agencies having License No.1345 in Bangladesh registered under the Ministry of Expatriates’ Welfare & Overseas Employment which facilitates professionally managed outflow of work force from Bangladesh to abroad.</p> 
                     <p>Kaj Bangla Employment Service, a foremost conglomerate of Bangladesh, is also a member of Bangladesh Association of International Recruiting Agencies (BAIRA). In spite of numerous recruitment agencies in Bangladesh, 
                </p>

                

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" required="" id="username">
                            <div style="color: red;display: none" id="userDiv">*wrong username</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" id="password">
                            <div style="color: red;display: none" id="passDiv">*wrong password</div>
                        </div>
                        <input type="button" name="Login" value="Login" class="btn btn-primary block full-width m-b" onclick="CheckLogin(document.getElementById('username').value,document.getElementById('password').value)">
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright KajBangla
            </div>
            <div class="col-md-6 text-right">
               <small>© 2020 - <?php print date('Y');?></small>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
    function CheckLogin(userId,password)
{
    
   


    $.ajax({  
    type: 'POST',  
    url: 'loginCheck', 
    data: {
        userId : userId,
        password : password,
    },
    success: function(response) {
       if(response==1)//password missmatch
       {
        document.getElementById("passDiv").style.display = "block";
        document.getElementById("userDiv").style.display = "none";
       }
       else if(response==2)//user missmatch
       {
        document.getElementById("userDiv").style.display = "block";
         document.getElementById("passDiv").style.display = "none";
       }
       else if(response==3)
       {
            cuteAlert({
              type: "error",
              title: "Already Logged in From Different IP",
              message: "Please Log out from previous PC and Login Again",
              buttonText: "Okay"
            });
       }
       else if(response==null)
       {
            document.getElementById("passDiv").style.display = "block";
            document.getElementById("userDiv").style.display = "block";
       }
       else
       {
        window.location.replace("dashboard");
       }
    }
});
}


</script>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Sep 2020 06:10:52 GMT -->
</html>

