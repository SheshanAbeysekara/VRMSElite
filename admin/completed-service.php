<?php  session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{
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
                                    <h4 class="m-t-0 header-title">Complete Services</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                               <table class="table mb-0">
 <thead>
                <tr>
                  <th>S.NO</th>
                   <th>Service number</th>
                  <th>Vehicle Category</th>
                  <th>Full Name</th>
                 <th>Mobile Number</th>
                  <th>Email</th>
         
              
                   <th>Action</th>
                </tr>
              </thead>
               <?php
$ret=mysqli_query($con,"select tblservicerequest.ServiceNumber,tblservicerequest.Category,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus ='3'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['ServiceNumber'];?></td>
                  <td><?php  echo $row['Category'];?></td>
              
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNo'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  
                  
                
                  <td><a href="view-service.php?aticid=<?php echo $row['apid'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
   
</table>
 </div>
                                        </div>
                                    </div>
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