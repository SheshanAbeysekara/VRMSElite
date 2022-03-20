<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
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
<script type="text/javascript">
  function printdata()
  {
    window.print();
  }
</script>
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
                                    <h4 class="m-t-0 header-title">Enquiry History View</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
         
         <form method="post">
        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>
         <?php
$antcid=substr(base64_decode($_GET['ticid']),0,-5);
$uid=$_SESSION['sid'];
$ret=mysqli_query($con,"select * from  tblenquiry where ID='$antcid' and UserId='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
 
   <tr>
    <th>Enquiry Date</th>
    <td><?php  echo $row['EnquiryDate'];?></td>
  </tr>
<tr>
    <th>Enquiry Number</th>
    <td><?php  echo $row['EnquiryNumber'];?></td>
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
    <th>Admin Response</th>
    <td><?php
if($row['AdminResponse']==""){
  echo "No action taken yet";
} else {
      echo $row['AdminResponse'];
    }?></td>
  </tr>


   

</table>

<?php } ?>
</form>
</div>
</div>
</div>
</div>
</div>
</div></div></div></div></div>
</body>
</html>

<?php } ?>