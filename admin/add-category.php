
<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $catname=$_POST['catename'];
    $query=mysqli_query($con, "insert into  tblcategory(VehicleCat) value('$catname')"); 
    if ($query) {
echo "<script>alert('Category has been added successfully.');</script>";
 echo "<script>window.location.href ='manage-category.php'</script>";
  }else{
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";
}}
  ?> <!-- Contains the SQL POST code to add the typed category to ‘tblcategory’ SQL Table in the database -->
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Repair Managment System</title>
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
                                    <h4 class="m-t-0 header-title">Add Vehicle Category</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
<p style="font-size:16px; color:red" align="center"> 
<?php if($msg){ echo $msg;}  ?> </p>

<form class="form-horizontal" role="form" method="post" name="submit">
                                                   
<div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Category Name</label>
<div class="col-10">
<input type="text" id="catename" name="catename" class="form-control" placeholder="Type a new Vehicle Category" required="true" pattern="[A-Za-z]+" title="This field can only contain A-Z letters">
</div></div>
                                                   

                                                    
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
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->

             <?php include_once('includes/footer.php');?>
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
<?php }  ?>