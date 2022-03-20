<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $macname=$_POST['macname'];
     $mobno=$_POST['mobilenumber'];
     $email=$_POST['email'];
     $address=$_POST['macadd'];
     
    $query=mysqli_query($con, "insert into  tblmechanics(FullName,MobileNumber,Email,Address) value('$macname','$mobno','$email','$address')");
if ($query) {
echo "<script>alert('Mechanic Details has been added.');</script>";
 echo "<script>window.location.href ='manage-mechanics.php'</script>";    
  }else{
      $msg="Something Went Wrong. Please try again";
    }}
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

            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Add VSMS Mechanics</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

<div class="row">
<div class="col-12">
<div class="p-20">
<p style="font-size:16px; color:red" align="center"> 
    <?php if($msg){  echo $msg;}  ?> </p>
                                    
<form class="form-horizontal" role="form" method="post" name="submit">
                                                   
<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Mechanic Name</label>
<div class="col-10">
<input type="text" id="macname" name="macname" class="form-control"  required="true">
</div>
</div>

<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Mechanic Contact Number</label>
<div class="col-10">
<input type="text" id="mobilenumber" name="mobilenumber" class="form-control" maxlength="10" required="true">
</div>
</div>

<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Mechanic Email</label>
<div class="col-10">
<input type="email" id="email" name="email" class="form-control"  required="true">
</div>
</div>
                                                   
                                                   
<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Mechanic Address</label>
<div class="col-10">
<input type="text" id="macadd" name="macadd" class="form-control"  required="true">
</div>
</div>
                                                    
                                                    
                                                    
<div class="form-group row">
<div class="col-12">
<p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Add</button></p>
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
        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>