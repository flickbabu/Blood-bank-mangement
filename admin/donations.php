<?php include_once("includes/dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.table{
  width:90% !important;
  margin-top:50px !important;
  margin-left:5% !important;
  margin-right:5%!important;
}
h3{
  margin-top:30px !important;
}
.btn{
   padding:5px !important;
   outline:none !important;
}
.message{
    
    color:green;
    margin-bottom:10px !important;
    text-align:center;
}
</style>
</head>
<body>
<?php include_once("includes/header.php") ?>
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
                
                  <center> <h3> Pending Donation details</h3></center><br>
                  <?php
	                           
	                           if(isset($_REQUEST['message']))

	                          {
		                         
		                              $message = $_REQUEST['message'];

		                              echo "<p class='message'>".$message."</p>";
		                     
	                          }
                         ?>
              <table class="table table-bordered">
             
                    <thead style="background:red;">
                        <tr>
                            <th style="padding:20px !important;text-align:center;">#</th>
                            <th style="padding:20px !important;text-align:center;">Donor Name</th>
                            <th style="padding:20px !important;text-align:center;">Gender</th>
                            <th style="padding:20px !important;text-align:center;">Blood Group</th>
                            <th style="padding:20px !important;text-align:center;">Healthy Condition</th>
                            <th style="padding:20px !important;text-align:center;">Unit in (ml)</th>
                            <th style="padding:20px !important;text-align:center;">Donation Date</th>
                            <th style="padding:20px !important;text-align:center;">Actiions</th>
                            <!-- <th style="padding:20px !important;">Action</th> -->
                        </tr>
                        </thead>
                    <tbody>
                    <?php  
                    
                      //select data

                      $select = mysqli_query($conn,"select * from donor join donation on donor.donor_id=donation.donor_id where status='Pending'");

                      if(mysqli_num_rows($select)==1){
                            
                           $counter = 1;
                           while($row=mysqli_fetch_array($select)){

                              $donation_id = $row['donation_id'];
                            
                      ?>

                         <tr>
                           <td style="text-align:center;padding:20px !important"><?php echo $counter;  ?></td>
                           <?php $counter++; ?>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['donor_name'] ;?></td>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['gender'] ;?></td>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['blood_group'] ;?></td>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['h_condition'] ;?></td>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['unit'].' Ml';?></td>
                           <td style="text-align:center;padding:20px !important"><?php echo $row['don_date'] ;?></td>
                           <td style="text-align:center;padding:20px !important">
                             <button class="btn btn-primary"><a href="approve.php?donation_id=<?php echo $donation_id; ?>" style="color:white;text-decoration:none;">Approve</a></button><br>
                             <br>

                             <button class="btn btn-success"><a href="decline.php?donation_id=<?php echo $donation_id; ?>" style="color:white;text-decoration:none;">Decline</a></button>
                          </td>
                         </tr>  

                       <?php

                           }
                      }
                      else{

                        ?>
                          <tr>
                        <td colspan=7 style="text-align:center; font-size:20px !important;">No Pending donation made yet</td>
                      </tr> 
                        <?php

                      }
  
                    ?>
                            
                    </tbody>
    </table>
                        
   </div>



  </div>
</div>
</body>
</html>