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

                        <form name="search" method="post" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Search Service</h4>
                                   
        <div class="form-group row">
        <label class="col-4 col-form-label" for="example-email">Search by Name / Email id / Contact number:</label>
          <div class="col-6">
         <input id="searchdata" type="text" name="searchdata" required class="form-control">
          </div></div> 

<div class="form-group row">
     <div class="col-4"></div>
    <div class="col-6">
    <p style="text-align: center;"><button type="submit" name="search" class="btn btn-info btn-min-width mr-1 mb-1">Search</button></p></div></div> 
</div>
    </form>
                                               
<?php
if(isset($_POST['search'])){ 
$sdata=$_POST['searchdata'];?>
  <h4 align="center" style="color:#fff">Result against "<?php echo $sdata;?>" keyword </h4> 


                                               <table style="background-color:#fff !important;" class="table">
                                                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Vehicle Category</th>
                  <th>Service Number</th>
                  <th>Full Name</th>
                 <th>Mobile Number</th>
                  <th>Email</th>
                   <th>Registration Date</th>
              
                   <th>Action</th>
                </tr>
              </thead>
 
               <?php
               
$ret=mysqli_query($con,"select tblservicerequest.Category,tblservicerequest.ServiceNumber,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email,tbluser.RegDate from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tbluser.FullName like '%$sdata%' || tbluser.MobileNo like '%$sdata%' || tbluser.Email like '%$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>


              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['Category'];?></td>
                  <td><?php  echo $row['ServiceNumber'];?></td>              
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNo'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['RegDate'];?></td>
                  
                
                  <td><a href="view-service.php?aticid=<?php echo $row['apid'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  
  <?php } } ?>

</table>

                                                
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