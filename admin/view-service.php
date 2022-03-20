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
    
   $query=mysqli_query($con, "update  tblservicerequest set AdminRemark='$admrmk',AdminStatus='$admsta', ServiceCharge='$sercharge',OtherCharge='$addcharge', PartsCharge='$partcharge', ServiceBy='$serviceby' where ID='$cid'");
    if ($query) {
    $msg="Service has been completed.";
  }else{
  $msg="Something Went Wrong. Please try again";
  }}
  ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Service Managment System</title>
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
                                              
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


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
if($row['AdminStatus']=="3")
{
  echo "Completed";
}

     ;?></td>
  </tr>
</table>

  


<table class="table mb-0">
<?php if($row['AdminRemark']==""){ ?>
<form name="submit" method="post" enctype="multipart/form-data"> 
  
<tr>
    <th>Admin Remark :</th>
    <td>
    <textarea name="AdminRemark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>
<tr>
    <th>Service By :</th>
    <td>
    <select name='serper' id="serper" class="form-control">
     <option value="">Service By</option>
      <?php $query=mysqli_query($con,"select * from tblmechanics");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['FullName'];?>"><?php echo $row['FullName'];?></option>
                  <?php } ?>  
   </select>
   </tr>   

<tr>
<th>Service Charge: </th>
<td>
  <input type="text" name="servicecharge" id="servicecharge" class="form-control wd-450" >
</td></tr>
<tr>
<th>Parts Charge: </th>
<td>
  <input type="text" name="partcharge" id="partcharge" class="form-control wd-450">
</td></tr>
<tr>
<th>Additional Charge: </th>
<td>
  <input type="text" name="addcharge" id="addcharge" class="form-control wd-450">
</td></tr>

  <tr>
    <th>Admin Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="3" selected="true">Completed</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Service Completed</button></td>
  </tr>
  </form>
<?php } else { ?>


<table border="1" class="table table-bordered mg-b-0">
  <tr>
        <th colspan="4" style="font-size:16px;text-align:center;">Servicing Details</th>
    </tr>
<tr>
<th>Service Completion Date</th>
<td><?php echo $row['AdminRemarkdate']; ?>  </td>
 
    <th>Service By</th>
    <td><?php echo $row['ServiceBy']; ?></td>
  </tr>
  <tr>
    <th>Admin Remark</th>
    <td colspan="3"><?php echo $row['AdminRemark']; ?></td>
  </tr>

<tr>
    <th>Service Charge</th>
    <td><?php echo $schrg=$row['ServiceCharge']; ?></td>

    <th>Parts Charge</th>
    <td><?php echo $pchrg=$row['PartsCharge']; ?></td>
  </tr>
<tr>
    <th>Other Charge(if any)</th>
    <td><?php echo $ochrg=$row['OtherCharge']; ?></td>
    <th>Total Amount</th>
    <td><?php echo $ochrg+$schrg+$pchrg; ?></td>
  </tr>

</table>


  

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