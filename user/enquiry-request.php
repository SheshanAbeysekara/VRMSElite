<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $uid=$_SESSION['sid'];
     $enquirytype=$_POST['enquirytype'];
     $description=$_POST['description'];
     $enqnumber = mt_rand(100000000, 999999999);
     
     $query=mysqli_query($con,"insert into tblenquiry(UserId,EnquiryNumber,EnquiryType,Description) value('$uid','$enqnumber','$enquirytype','$description')");
    if ($query) {
echo "<script>alert('Your enquiry has been sent successfully.');</script>";
 echo "<script>window.location.href ='enquiry-request.php'</script>";
  }
  else
    {
 echo "<script>alert('Your enquiry has been sent successfully.');</script>";
 echo "<script>window.location.href ='enquiry-request.php'</script>";
    }

  
}
}




?>
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
                                    <h4 class="m-t-0 header-title">Enquiry Form</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">

            <form class="form-horizontal" role="form" method="post" name="submit">
           <div class="form-group row">
          <label class="col-2 col-form-label">Enquiry</label>
             <div class="col-10">
        <select name='enquirytype' id="enquirytype" class="form-control" required="true">
     <option value="">Enquiry Type</option>
      <?php $query=mysqli_query($con,"select * from tblenquirytype");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['EnquiryType'];?>"><?php echo $row['EnquiryType'];?></option>
                  <?php } ?>  
   </select>
                                                        </div>
                                                    </div>
      <div class="form-group row">
        <label class="col-2 col-form-label" for="example-email">Description</label>
        <div class="col-10">
       <textarea name="description" value="description" id="description" rows="6" cols="15" class="form-control" required></textarea>
        </div>
         </div>
                                                    
<div class="form-group row">
<div class="col-12">
<p style="text-align: center;">     <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button></p>
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


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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
