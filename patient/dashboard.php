<?php  include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
h3{
  margin-top:30px !important;
}
section{
  display:flex !important;
  justify-content:center;
  margin-top:20px !important;
}
section div{
  flex-basis:25%;
  border:2px solid red;
  margin-left:20px !important;
  justify-content:center;
  align-items:center;
  text-align:center;
}
</style>
</head>
<body>
<?php   include_once("includes/header.php");  ?>
<div class="row">
    <div class="col-sm-2" style="background-color:black;">
    <p><a style="text-decoration:none;" href="dashboard.php"><i class="fa fa-home"></i> Home</a></p>
    <p><a style="text-decoration:none;" href="request.php"><i class="fa fa-users"></i> Make Request</a></p>
    <!-- <p><a style="text-decoration:none;" href="patient"><i class="fa fa-users"></i> Blood Request</a></p> -->
    </div>
    <!--MAIN SECTION 2 -->
    <div class="col-sm-10" style="background-color:white;">

    <div class="sub_menu">
      <a href="dashboard.php" style="color:black;"><i class="fa fa-home"></i> </a>
      <?php   
      
      $email = $_SESSION['email'];


      $select = mysqli_query($conn,"select * from patient where email='$email'");

      $row=mysqli_fetch_array($select);
      
      ?>
      <h4>Logged In as : <?php  echo $row['patient_name'];?></h4>
      </div>

      <center> <h3>Patient Dashboard</h3></center>    
      <section>
      <div><br>
        <br>
        <i class="fa fa-tint" style="font-size:40px;color:red;"></i><br>
        <br>
         <p>Send Pending Blood Request:

                <?php 
                        $select= mysqli_query($conn,"select * from patient join request_2 on patient.patient_id=request_2.patient_id where status='Pending' and email='$email'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>


         </p><br>
         <br>
        </div>

        <div><br>
        <br>
        <i class="fa fa-tint" style="font-size:40px;color:red;"></i><br>
        <br>
         <p>Approved Blood Request:

                <?php 
                        $select= mysqli_query($conn,"select * from patient join request_2 on patient.patient_id=request_2.patient_id where status='Approved' and email='$email'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>


         </p><br>
         <br>
        </div>
      </section>
   </div>



  </div>
</div>
</body>
</html>