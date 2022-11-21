
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



?>

<?php 
                // First get the total number of classes that the logged in student attended

                $quer = "SELECT tblattendance.Id,tblattendance.status,tblattendance.dateTimeTaken,tblclass.className,
                tblclassarms.classArmName,tblsessionterm.sessionName,tblsessionterm.termId,tblterm.termName,
                tblstudents.firstName,tblstudents.lastName,tblstudents.otherName,tblstudents.admissionNumber
                FROM tblattendance
                INNER JOIN tblclass ON tblclass.Id = tblattendance.classId
                INNER JOIN tblclassarms ON tblclassarms.Id = tblattendance.classArmId
                INNER JOIN tblsessionterm ON tblsessionterm.Id = tblattendance.sessionTermId
                INNER JOIN tblterm ON tblterm.Id = tblsessionterm.termId
                INNER JOIN tblstudents ON tblstudents.admissionNumber = tblattendance.admissionNo
                where tblstudents.id='$_SESSION[userId]' and tblattendance.classId = '$_SESSION[classId]' and tblattendance.classArmId = '$_SESSION[classArmId]'";

                $result = $conn->query($quer);
                $total_classes_taken_till_now = $result->num_rows;

                echo $total_classes_taken_till_now;

                $quer2 = mysqli_query($conn,"SELECT tblattendance.Id,tblattendance.status,tblattendance.dateTimeTaken,tblclass.className,
                tblclassarms.classArmName,tblsessionterm.sessionName,tblsessionterm.termId,tblterm.termName,
                tblstudents.firstName,tblstudents.lastName,tblstudents.otherName,tblstudents.admissionNumber
                FROM tblattendance
                INNER JOIN tblclass ON tblclass.Id = tblattendance.classId
                INNER JOIN tblclassarms ON tblclassarms.Id = tblattendance.classArmId
                INNER JOIN tblsessionterm ON tblsessionterm.Id = tblattendance.sessionTermId
                INNER JOIN tblterm ON tblterm.Id = tblsessionterm.termId
                INNER JOIN tblstudents ON tblstudents.admissionNumber = tblattendance.admissionNo
                where tblattendance.status = 1 and tblstudents.id='$_SESSION[userId]' and tblattendance.classId = '$_SESSION[classId]' and tblattendance.classArmId = '$_SESSION[classArmId]'");

                // $result = $conn->query($quer2);
                $total_attended = $quer2->num_rows;

                // echo $total_attended;

                
                // now get the total number of classes from the databse

                $query_total = "SELECT * from skips";
                $rrs = $conn->query($query_total);
                $total_classes = $rrs->fetch_assoc();

                

                $percentage = $total_classes['percent_required'];
                $no_of_total_class = $total_classes['total_class'];

                // echo $percentage;
                // echo $no_of_total_class;

                $attendance_percent = ($total_attended / $no_of_total_class) * 100;

                // echo $attendance_percent;

                $classes_needed = ($percentage / 100) * $no_of_total_class;



                  // no of total skippable classes 
                  // number of skips = (total_attended/0.7 )-(total_number of classes taken till now
                $skips = floor(($total_attended / ($percentage / 100)) - $total_classes_taken_till_now);

                // no of total classes needed to be attended

                // (total_attended + should_attend)/(total_number of classes taken till now + should_attend) = 0.7

                // $should_attend = ($percentage / 100 ) * $no_of_total_class;
                // $attend = floor(($total_attended + $should_attend) / ($total_classes_taken_till_now + $should_attend));

                $should_attend = ceil(((($percentage / 100 ) * $total_classes_taken_till_now ) - $total_attended) / (1 - ($percentage / 100 )));

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

<script>
    function typeDropDown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCallTypes.php?tid="+str,true);
        xmlhttp.send();
    }
}
</script>

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
            <h1 class="h3 mb-0 text-gray-800">View Skippable Classes</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Skippable Classes</li>
            </ol>
          </div>

      

          <div class="row mb-3 align-items-center">
          <!-- Students Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <!-- <div class="row no-gutters align-items-center"> -->
                    <div class="col mr-2 text-align-center">
                      
                    <div class="mt-2 mb-0 text-muted text-xs">
                        <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                      <br>
                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-align-center">Attendance Percentage</div>
                    <br>  
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 align-items-center"><?php echo $attendance_percent . "%";?></div>
                     
                  <!-- </div> -->
                </div>
              </div>
            </div>














          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Skippable Classes</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                      <?php 
                        // echo $total_attended;

                        // echo round($skips);


                        // echo ($total_attended / $total_classes_taken_till_now) * 100;
                        // echo $attend;

                      //  echo $should_attend;

                      // echo round($skips);

                      if (round($skips) < 0) {
                        echo "You cannot skip any classes, You have " .$attendance_percent . "% attendance";
                      }

                      else {
                        echo "You can skip next " . round($skips) . " classes";
                      }

                      ?>
                    </div>
                      <?php
                        echo"<div id='txtHint'></div>";
                      ?>
                    <!-- <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Student<span class="text-danger ml-2">*</span></label>
                        
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Type<span class="text-danger ml-2">*</span></label>
                        
                        </div>
                    </div> -->
                    <!-- <button type="submit" name="view" class="btn btn-primary">View Attendance</button> -->
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total Classes to be attended</h6>
                </div>
                <div class="table-responsive p-3">
                  
                <?php 
                  // echo $total_classes_taken_till_now;

                  // echo $should_attend;


                  if ($should_attend < 0) {
                    echo "You have more than " . $percentage . "% attendance!!";
                  }
                  else {
                    echo "You have less than " . $percentage . "% attendance, You need to attend next " . $should_attend . " classes";
                  }
                ?>


                </div>
              </div>
            </div>
            </div>
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