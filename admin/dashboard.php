<?php 
   include_once("includes/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN | DASHBOARD</title>
<style>
h3{
  margin-top:30px !important;
}
section{
  display:flex !important;
  justify-content:space-around;
  margin-top:20px !important; 
  flex-wrap:wrap;
}
section div{
  flex-basis:23%;
  border:2px solid red;
  justify-content:center;
  align-items:center;
  text-align:center;
  margin-top: 20px !important;
}
</style>
</head>
<body>
<?php include_once("includes/header.php") ; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3" style="background-color:black;">
            <p><a style="text-decoration:none;" href="dashboard.php"><i class="fa fa-home"></i> Home</a></p>
            <p><a style="text-decoration:none;" href="donor.php"><i class="fa fa-users"></i> Donors</a></p>
            <p><a style="text-decoration:none;" href="patient.php"><i class="fa fa-users"></i> Patient</a></p>
            <p><a style="text-decoration:none;" href="donations.php"><i class="fa fa-shield" aria-hidden="true"></i> Donations</a></p>
            <p><a style="text-decoration:none;" href="request.php"><i class="fa fa-pie-chart" aria-hidden="true"></i> Donor blood Requests</a></p>
            <p><a style="text-decoration:none;" href="request2.php"><i class="fa fa-pie-chart" aria-hidden="true"></i> Patient blood Requests</a></p>
            <p><a style="text-decoration:none;" href="donationhistory.php"><i class="fa fa-history"></i> Donation History</a></p>
            
            <p><a style="text-decoration:none;" href="store.php"><i class="fa fa-database" aria-hidden="true"></i> Blood Stock</a></p>
    </div>
    <!--MAIN SECTION 2 -->
    <div class="col-sm-9" style="background-color:white;">

            <div class="sub_menu">
              <a href="dashboard.php" style="color:black;"><i class="fa fa-home"></i> </a>
              <?php 
                 $select = mysqli_query($conn,"select * from admin");
                 $row=mysqli_fetch_array($select );
              ?>
              <h4>Logged In as : <?php echo $row['email']; ?></h4>
              </div>

              <center> <h3>Admin Dashboard</h3></center>

          <section>

                  <div>
                   <br>
                   <br>
                    <i class="fa fa-users" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Patients : <?php 
                        $select= mysqli_query($conn,"select * from patient");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?></p><br>
                    <br>

                  </div>

                  <div>
                  <br>
                   <br>
                    <i class="fa fa-users" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Donors: 

                    <?php 
                        $select= mysqli_query($conn,"select * from donor");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?></p><br>
                    <br>

                   

                  </div>


                  <div>
                  <br>
                   <br>
                    <i class="fa fa-tint" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Patient Pending blood Request:

                    <?php 
                        $select= mysqli_query($conn,"select * from request_2 where status='Pending'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>

                    </p><br>
                    <br>

                  </div>
                  <div>
                  <br>
                   <br>
                    <i class="fa fa-tint" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Donor Pending blood Request:

                    <?php 
                        $select= mysqli_query($conn,"select * from request where status='Pending'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>

                    </p><br>
                    <br>

                  </div>

                  <div>
                  <br>
                   <br>
                    <i class="fa fa-tint" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Donor Approved blood Request:

                    <?php 
                        $select= mysqli_query($conn,"select * from request where status='Approved'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>

                    </p><br>
                    <br>

                  </div>

                  <div>
                  <br>
                   <br>
                    <i class="fa fa-tint" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Patient Approved blood Request:

                    <?php 
                        $select= mysqli_query($conn,"select * from request_2 where status='Approved'");
                        $rowcount = mysqli_num_rows($select);
                       echo $rowcount;
                    ?>

                    </p><br>
                    <br>

                  </div>

                  <div>
                  <br>
                   <br>
                    <i class="fa fa-history" style="font-size:40px;color:red;"></i> <br>
                    <br>
                    <p>Donation History:

                    <?php 
                        $select= mysqli_query($conn,"select * from donation");
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