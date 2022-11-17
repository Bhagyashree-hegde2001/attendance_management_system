
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';


// //$sql = " select s_id,name from `scheduling`.`details` WHERE class = 4 ";
// // $result = mysqli_query($con,$sql);
// // echo $sql;

// // $sql = " select name,class,date,time FROM details INNER JOIN student ON (details.class = student.s_class) ";
// $sql = "select name,class,date,time,new FROM details INNER JOIN student ON (details.class = student.s_class and details.new=1)LIMIT 1 ; ";
// // $sql .= "select name, class,date,time WHERE new==1;";
// //  $result = $conn->query($sql);


?>

<?php 
   // $sql = "select name,class,date,time,new FROM details INNER JOIN tblstudents ON (details.class = tblstudents.classId and details.new=1)";
    $first = "SELECT * FROM tblstudents INNER JOIN details on tblstudents.classId = details.class WHERE (tblstudents.Id = '$_SESSION[userId]' and details.new=1)";
    $resultt = $conn->query($first);
    $result = $resultt->fetch_assoc();
    // echo 'result is ' . $result[];
      
                    
    //echo " name = " . $result['name'] ."<br>". " date = " . $result['date'] ."<br>"." time  = " . $result['time']."<br>";
    // echo "Happy Learning";
          
    
    $name = $result['name'];
    $date = $result['date'];
    $time = $result['time'];

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Classes Scheduled</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Classes Scheduled</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Classes Scheduled</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">

                <div class="row mb-3">
          <!-- New User Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Teacher</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $name;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Date </div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $date;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h4 text-xs font-weight-bold text-uppercase mb-1 text-gray-900">Time</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $time;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                  


                </div>
              </div>

              <!-- Input Group -->
               
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  </body>

</html>  
