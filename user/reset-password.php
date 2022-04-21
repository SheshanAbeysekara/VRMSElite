<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->

<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);


if(isset($_POST['submit']))
{
 $mobno=$_SESSION['mobilenumber'];
    $email=$_SESSION['email'];
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"update tbluser set Password ='$newpassword' where  Email='$email' && MobileNo = $mobno ");
$row=mysqli_fetch_array($query);
if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>






<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>VSMS | Reset Password</title>

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../assets/js/modernizr.min.js"></script>

    </head>

<script type="text/javascript">
function checkpass()
{
if(document.resetpassword.newpassword.value!=document.resetpassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.resetpassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h3 class="text-uppercase text-center pb-4">
                                <a href="../index.php" >
                                    <span>VSMS | Reset Password</span>
                                </a>
                            </h3>
                               <hr color="#000" />
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

                            <form class="" action="" name="resetpassword" method="post" onSubmit="return checkpass();">

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">New Password</label>
                                        <input class="form-control" type="password" id="newpassword" name="newpassword" required="" >
                                    </div>
                                </div>
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Confirm Password</label>
                                        <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" required="" >
                                    </div>
                                </div>

                                
                               

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit" name="submit">Reset</button>
                                    </div>
                                </div>

                            </form>

                                                      <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">For Existing User!! <a href="index.php" class="text-dark m-l-5"><b>Sign In</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright"><?php echo date('Y');?> © Vehicle Service Managment System</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>