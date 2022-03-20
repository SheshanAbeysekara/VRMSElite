<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $pid=$_SESSION['sid'];
    $FName=$_POST['fullname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $query=mysqli_query($con, "update tbluser set FullName='$FName',  MobileNo='$mobno',  Email='$email' where ID='$pid'");
    if ($query) {
    $msg="Your profile has been updated.";
  }else{
    $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Service Managment System</title>
 
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

          <?php include_once('includes/sidebar.php');?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Update Profile</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

<form class="form-horizontal" role="form" method="post" >
<?php
$userid=$_SESSION['sid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>


                                    <div class="form-group row">
            <label class="col-2 col-form-label" for="example-email">Full Name</label>
            <div class="col-10">
            <input type="text" id="fullname" name="fullname" class="form-control"  required="true" value="<?php  echo $row['FullName'];?>">
                            </div></div>

<div class="form-group row">
<label class="col-2 col-form-label">Mobile Number</label>
<div class="col-10">
 <input type="text" class="form-control"  name="mobilenumber" id="mobilenumber" required="true" readonly="true" value="<?php  echo $row['MobileNo'];?>">
</div>
</div>

<div class="form-group row">
 <label class="col-2 col-form-label">Email</label>
<div class="col-10">
<input type="email" class="form-control" name="email" id="email" required="true" readonly="true" value="<?php  echo $row['Email'];?>">
</div>
</div>
                                                    

<div class="form-group row">
<label class="col-2 col-form-label">Registration Date</label>
<div class="col-10">
<input type="text" class="form-control" name="regdate" id="regdate" required="true" readonly="true" value="<?php  echo $row['RegDate'];?>">
</div>
</div>
<?php } ?>


<div class="form-group row">
<div class="col-12">
<p style="text-align: center;">   <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
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
        <!-- END wrapper -->



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
<?php }  ?>