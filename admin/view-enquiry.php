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
      $adresp=$_POST['adminresponse'];
      $admsta=$_POST['status']; 
   $query=mysqli_query($con, "update  tblenquiry set AdminResponse='$adresp',AdminStatus='$admsta' where ID='$cid'");
    if ($query) {
    $msg="Enquiry has been responded successfully.";
  }
  else
    {
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
                                    <h4 class="m-t-0 header-title">View Enquiry</h4>
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
$ret=mysqli_query($con,"select * from tblenquiry join tbluser on tbluser.ID=tblenquiry.UserId where tblenquiry.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
<tr>
    <th>Enquiry Number</th>
    <td><?php  echo $row['EnquiryNumber'];?></td>
  </tr>

<tr>
<th>Full Name</th>
    <td><?php  echo $row['FullName'];?></td>
  </tr>
<tr>
    <th>Enquiry Type</th>
    <td><?php  echo $row['EnquiryType'];?></td>
  </tr>
   <tr>
    <th>Description</th>
    <td><?php  echo $row['Description'];?></td>
  </tr>
 
<tr>
    <th>Enquiry Date</th>
    <td><?php  echo $row['EnquiryDate'];?></td>
  </tr>
  
 
 
  
  


<tr>
    <th>Admin Status</th>
    <td> <?php  
if($row['AdminStatus']=="1")
{
  echo "Responded";
}


     ;?></td>
  </tr>
</table>

  


<table class="table mb-0">

<?php if($row['AdminResponse']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Admin Response :</th>
    <td>
    <textarea name="adminresponse" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

 

  <tr>
    <th>Admin Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="1" selected="true">Responded</option>
   
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>


<table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Admin Response</th>
    <td><?php echo $row['AdminResponse']; ?></td>
  </tr>
   
<tr>
<th>Admin Remark date</th>
<td><?php echo $row['AdminRemarkdate']; ?>  </td></tr>
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