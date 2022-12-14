<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en">

    <head>
        <!-- App title -->
        <title>CMS Courier View</title>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">
      <div id="wrapper">
        <!-- Begin page -->
       
 <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                    
                                    <button class="btn bg-light export_btn" style="font-weight:bold; color:red;" onclick="prex()">Download Report To Excel</button>
                                    
                                     <button class="btn bg-light export_btn" style="font-weight:bold; color:red;" onclick="pr()">Download Report To PDF</button>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
<?php if($rtype=="all"){?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table>

<?php } elseif($rtype=="0"){ ?>

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where Status='0' && CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table>
 <?php } elseif($rtype=="Shipped"){ ?>

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where Status='Shipped' && CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table>                                   
 <?php } elseif($rtype=="Intransit"){ ?>

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where Status='Intransit' && CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table>

<?php } elseif($rtype=="Out for Delivery"){ ?>

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where Status='Out for Delivery' && CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table>
                                    <?php } elseif($rtype=="Delivered"){ ?>

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Reference Number</th>
              <th>Sender Name</th>
              <th>Recipient Name</th>
              <th>Courier Date</th>
            
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select *from tblcourier where Status='Delivered' && CourierDate between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['RefNumber'];?></td>
                  <td><?php  echo $row['SenderName'];?></td>
                <td><?php  echo $row['RecipientName'];?></td>
                <td><?php  echo $row['CourierDate'];?></td>
                                  <td><a href="view-courier.php?editid=<?php echo $row['ID'];?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                        
                                    </table> 
                                    <?php } ?>                                    
                                </div>
                            </div>
                        </div> <!-- end row -->


</div></div>
</div>



       
            

            <?php include_once('includes/footer.php');?>

</div>
        

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="../plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>
<script>
 function pr() 
 {
        var form = document.getElementById("form");
        var btn = document.getElementById("btn");
        
        
        //Print Page
        window.print();
     

    }
</script>            
            
            
            
            
//sales export
 <script>
        function prex() {
            $("#datatable").table2excel({
                filename: "Table.xls"
            });
        }  
</script>


    </body>
</html>
<?php }  ?>