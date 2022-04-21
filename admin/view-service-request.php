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
    
    $cid=$_GET['aticid'];
      $admrmk=$_POST['AdminRemark'];
      $admsta=$_POST['status'];
      $sercharge=$_POST['servicecharge'];
 $addcharge=$_POST['addcharge'];
 $partcharge=$_POST['partcharge'];
 $serviceby=$_POST['serper'];
$query=mysqli_query($con, "update  tblservicerequest set AdminStatus='$admsta' where ID='$cid'");
if ($query) {
    $msg="Status has been updated";
  }else{
  $msg="Something Went Wrong. Please try again";
}}
  

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
            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">View Services</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                              
 <p style="font-size:16px; color:red" align="center"> 
  <?php if($msg){ echo $msg;}  ?> </p>


<?php
$cid=$_GET['aticid'];
$ret=mysqli_query($con,"select * from tblservicerequest join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
<tr>
    <th>Service Number</th>
    <td><?php  echo $row['ServiceNumber'];?></td>

<th>Full Name</th>
    <td><?php  echo $row['FullName'];?></td>
  </tr>

<tr>
    <th>Vehicle Category</th>
    <td><?php  echo $row['Category'];?></td>

    <th>Vehicle Name</th>
    <td><?php  echo $row['VehicleName'];?></td>
  </tr>
 
<tr>
    <th>Vehicle Model</th>
    <td><?php  echo $row['VehicleModel'];?></td>
 
    <th>Vehicle Brand</th>
    <td><?php  echo $row['VehicleBrand'];?></td>
  </tr>
  <tr>
    <th>  Vehicle Registration Number</th>
    <td><?php  echo $row['VehicleRegno'];?></td>

    <th>Service Date</th>
    <td><?php  echo $row['ServiceDate'];?></td>
  </tr>
  <tr>
    <th>Service Time</th>
    <td><?php  echo $row['ServiceTime'];?></td>

    <th>Delivery Type</th>
    <td><?php  echo $row['DeliveryType'];?></td>
  </tr>
<tr>
  <th>Pickup Address</th>
  <td><?php echo $row['PickupAddress'];?></td>

  <th>Service Request Date</th>
  <td><?php echo $row['ServicerequestDate'];?></td>
</tr>
<tr>
    <th>Admin Status</th>
    <td> <?php  
if($row['AdminStatus']=="1")
{
  echo "Selected";
}

if($row['AdminStatus']=="2")
{
  echo "Rejected";
}
if($row['AdminStatus']=="")
{
  echo "Wait for admin approval";
}

     ;?></td>
  </tr>
</table>

  


<table class="table mb-0">

<?php if($row['AdminStatus']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 


  <tr>
    <th>Admin Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="1" selected="true">Selected</option>
     <option value="2">Cancelled</option>
   </select></td>
  </tr>
    <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary pd-x-20">Submit</button></td>
  </tr>
</form>
  <?php } ?>
 

</table>

<?php } ?>

              

                                                
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