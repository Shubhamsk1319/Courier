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
        <title>Sales Report</title>

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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>

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
                                    <h4 class="m-t-0 header-title">Sales Report</h4>
                                    <button class="btn bg-light export_btn" style="font-weight:bold; color:red;" onclick="prex()">Download Report To Excel</button>
                                    
                                     <button class="btn bg-light export_btn" style="font-weight:bold; color:red;" onclick="pr()">Download Report To PDF</button>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<h5 align="center" style="color:blue">Sales Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
                                    
                                    
<?php if($rtype=="dtwise"){?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Date</th>
              <th>Sale Amount</th>
                </tr>
                                        <tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select date(CourierDate) as cdate,sum(ParcelPrice) as totalsum from tblcourier where CourierDate between '$fdate' and '$tdate' group by cdate");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['cdate'];?></td>
                  <td><?php  echo $ttlsl=$row['totalsum'];?></td>
           
           
                </tr>
                <?php
                $totalsales+=$ttlsl; 
$cnt=$cnt+1;
}?>

 <tr>
  <th colspan="2" style="text-align:center">Grand Total</th>     
  <td><?php echo $totalsales;?></td>
 </tr>     

                                    </table>

<?php } elseif($rtype=="mtwise"){ ?>

     <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Date</th>
              <th>Sale Amount</th>
                </tr>
                                        <tr>
                                        </thead>
 <?php
$ret=mysqli_query($con,"select month(CourierDate) as rmonth,year(CourierDate) as ryear,sum(ParcelPrice) as totalsum from tblcourier where CourierDate between '$fdate' and '$tdate' group by rmonth,ryear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['rmonth']."-".$row['ryear'];?></td>
                  <td><?php  echo $ttlsl=$row['totalsum'];?></td>
           
           
                </tr>
                <?php 
      $totalsales+=$ttlsl;                
$cnt=$cnt+1;
}?>
<tr>
  <th colspan="2" style="text-align:center">Grand Total</th>   
  <td><?php echo $totalsales;?></td>
 </tr>
                                        
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