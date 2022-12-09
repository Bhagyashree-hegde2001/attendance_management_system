
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



?>

<?php


 //echo "success connecting to the db";
$name = $_POST['name'];
$class = $_POST['class'];
$date = $_POST['date'];
$time = $_POST['time'];
$new = 1;
$sql = " update `details` SET `new`=0 ; ";
$sql .="INSERT INTO `details` (`name`, `class`, `date`, `time`,`new`) VALUES ('$name', '$class', '$date', '$time',1);";
// INSERT INTO `scheduling`.`details` (`name`, `class`, `date`, `time`,`new`) VALUES ('$name', '$class', '$date', '$time',1);
//echo $sql;

if($conn->multi_query($sql) === TRUE)
{
    //echo "successfully inserted";
}
else{
   // echo "not inserted";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classschedule</title>
    <!-- CSS only -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<style>
  .parallax {
    /* The image used */
    background-image: url("./jene-stephaniuk--MCrF6hnojU-unsplash.jpg") ;
  
    /* Set a specific height */
    min-height: 400px;
  
    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.75; 
  }
  .headingdiv{
    width:24% ;
     margin-left: 38%;
  }
  .heading{
     /* margin: 100px 50px 0px 200px; */
    
    color:rgb(80, 76, 76);
    display:block;
    /* float:left; */
    margin:5px 10px 20px 10px;
    /* padding-top: 20px ;
    padding-bottom: 20px;
    padding-left: 40%; */
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
     background-color: rgb(235, 206, 222);
    text-align: center;
     box-sizing: border-box;
     padding: 10px 10px;
     
    }

    .new_form {
      justify-content: center;
      align-items: center;
      display: flex;
      line-height: 2rem;
      padding-top: 20px ;
    padding-bottom: 20px;
    
    }

  </style>

</head>
<body  >
    

  
      <div class="parallax">
        <div class="headingdiv" ><span class="heading" style="margin-top: 0px;">WANT TO SCHEDULE?</span></div>
      </div>
     
         
          <!-- <div class="parallax">
            <div  style=" width:30% ;float: right; margin-right: 20px;">
              <img src="./chat_icon.png" alt="hey">
            </div>
            <div style=" width:50% ;box-shadow: 5px 8px #eac7e7;float: left; margin: 0px 20px 0px 20px; padding:40px 40px 40px 40px ; background-color: aliceblue;">
               -->
              <!-- <div>Hello! I'm</div>  <div>Ayushee Bansal</div> </div> -->


               <div class="new_form">
              <form action="indexban.php" method="post">
              <div class="form-group" >
                  <label for="name">Name</label>
                  <input required type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                </div>

                <div class="form-group" >
                  <label for="class">Class</label>
                  <input required type="text" class="form-control" name="class" id="class"  placeholder="Enter class">
                 </div>
                
                <div  class="form-group">
                  <label for="date">Date</label>
                  <input required type="date" class="form-control" name="date" id="date" placeholder="Enter date">
                </div>

                <div class="form-group">
                  <label for="time">Time</label>
                  <input required type="time" class="form-control" name="time" id="time" placeholder="Enter time">
                </div>

                <!-- <div style=" width:24% ; margin-left: 38%;" > -->
                 <div style="padding-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  
                 </div> 
               
              </form>
            </div>




          </div>
          
<!-- about me -->

   <div style=" width:24% ; margin-left: 38%;" >
    <span class="heading" style="font-family:Comic Sans MS ;">happy teaching</span>
  </div> 

<div class="parallax" style="background-image:url(./pexels-antonio-prado-2566211.jpg);opacity: 0.85;">
  
</div>

   
    <div class="parallax"style="background-image:url(./pexels-antonio-prado-2566211.jpg);opacity: 0.85; ">
     
      
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>