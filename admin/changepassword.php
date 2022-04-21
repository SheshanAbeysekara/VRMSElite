<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else {
if(isset($_POST['submit']))
{
$adminid=$_SESSION['adid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Repair Managment System</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">

          <?php include_once('includes/sidebar.php');?>
            <div class="content-page">
                 <?php include_once('includes/header.php');?>
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Change Password</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
<p style="font-size:16px; color:red" align="center"> 
<?php if($msg){echo $msg;}  ?> </p>

<form class="form-horizontal" role="form" method="post" name="changepassword" onsubmit="return checkpass();">
<?php
$adminid=$_SESSION['adid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Current Password</label>
<div class="col-10">
<input type="password" id="currentpassword" name="currentpassword" class="form-control"  required="true">
</div></div>
                                                    
<div class="form-group row">
<label class="col-2 col-form-label">New Password</label>
<div class="col-10">
<input type="password" class="form-control"  name="newpassword" id="newpassword" required="true">
</div>
</div>

<div class="form-group row">
<label class="col-2 col-form-label">Confirm Password</label>
<div class="col-10">
<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="true"></div>
</div>
<?php } ?>


<div class="form-group row">
<div class="col-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Change</button>
</div>
</div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->
                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

             <?php include_once('includes/footer.php');?>
            </div>

        </div>
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
<?php }  ?>