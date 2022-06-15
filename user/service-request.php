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
     $category=$_POST['category'];
     $vehname=$_POST['vehiclename'];
     $vehmodel=$_POST['vehilemodel'];
     $vehbrand=$_POST['vehiclebrand'];
     $vehrego=$_POST['vehicleregno'];
     $vehservicedate=$_POST['servicedate'];
     $vehservicetime=$_POST['servicetime'];
     $deltype=$_POST['deltype'];
     $pickupadd=$_POST['pickupadd'];
     $sernumber = mt_rand(100000000, 999999999);
     
     $query=mysqli_query($con,"insert into tblservicerequest(UserId,Category,ServiceNumber,VehicleName,VehicleModel,VehicleBrand,VehicleRegno,ServiceDate,ServiceTime,DeliveryType,PickupAddress) value('$uid','$category','$sernumber','$vehname','$vehmodel','$vehbrand','$vehrego','$vehservicedate','$vehservicetime','$deltype','$pickupadd')");
    if ($query) {
    echo "<script>alert('Data has been added successfully.');</script>";
 echo "<script>window.location.href ='service-request.php'</script>";
  }
  else
    {
       echo "<script>alert('Something went wrong.Please try again.');</script>";
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
$(document).ready(function () {
$('#pickupaddress').hide();
$('#deltype').change(function () {
var v = $("#deltype").val();


if(v=='dropservice')
{
$('#pickupaddress').hide();
}

if(v=='pickupservice')
{
$('#pickupaddress').show();
}
});
});</script>
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
                                    <h4 class="m-t-0 header-title">Service Request Form</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                                <form class="form-horizontal" role="form" method="post" name="submit">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Category</label>
                                                        <div class="col-10">
                                                            <select name='category' id="category" class="form-control" required="true">
     <option value="">Category</option>
      <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?>  
   </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Vehicle Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="vehiclename" name="vehiclename" class="form-control" placeholder="Vehicle Name" required="true" pattern="[A-Za-z]+" title="This field can only contain A-Z letters">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Model</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control"  name="vehilemodel" id="vehilemodel" placeholder="Vehicle model" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Brand</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Brand" name="vehiclebrand" id="vehiclebrand" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Registration Number</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="vehicleregno" id="vehicleregno" placeholder="Vehicle Registration Number" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Service Date</label>
                                                        <div class="col-10">
                                                            <input type="date" class="form-control" name="servicedate" id="servicedate" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Service Time</label>
                                                        <div class="col-10">
                                                            <input type="time" class="form-control" name="servicetime" id="servicetime" required="true">
                                                        </div>
                                                    </div>
                                              
                                                 <div class="form-group row">
                                                        <label class="col-2 col-form-label">Delivery Type</label>
                                                        <div class="col-10">
                                                            <select name="deltype" id="deltype" required="true" class="form-control">
                                                                <option value="">Select</option>
                                                                 <option value="pickupservice">Pickup Service</option> 
 <option value="dropservice">Drop Service</option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                              <div class="form-group row" id="pickupaddress">
                                                        <label class="col-2 col-form-label">Pickup Address</label>
                                                        <div class="col-10">
                                                             <input type="text" class="form-control" name="pickupadd" id="pickupadd">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="true">
                                            <label for="remember">
         I accept <a href="terms-conditions.php" class="text-custom" target="_blank">Terms and Conditions</a>
                                            </label>
                                        </div>

                                    </div>
                                                     <div class="form-group row">
                                                    
                                                        <div class="col-12">
                                                           <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button></p>
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
<?php } ?>
