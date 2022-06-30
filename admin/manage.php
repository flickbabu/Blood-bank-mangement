<?php 
   include_once("includes/dbconnection.php");
?>
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
            <p><a style="text-decoration:none;" href="request.php"><i class="fa fa-history"></i> Blood Requests</a></p>
            <!-- <p><a style="text-decoration:none;" href="/admin-request-history"><i class="fa fa-history"></i>Request History</a></p> -->
            <p><a style="text-decoration:none;" href="donationhistory.php"><i class="fa fa-history"></i> Donation History</a></p>
            <p><a style="text-decoration:none;" href="/admin-blood"><i class="fa fa-database" aria-hidden="true"></i> Blood Stock</a></p>
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
                
                  <center> <h3>Manage Blood Request </h3></center>
    <table class="table table-bordered">
             
             <thead style="background:red;">
                 <tr>
                 <tr>
                            <!-- <th style="padding:20px !important;">#</th>
                            <th style="padding:20px !important;">Patient Name</th> -->
                            <!-- <th style="padding:20px !important;">Patient Age</th> -->
                            <!-- <th style="padding:20px !important;">Reason</th> -->
                            <th style="padding:20px !important;">Blood Group</th>
                            <th style="padding:20px !important;">Amount Requested</th>
                            <th style="padding:20px !important;">Available Amount</th>
                            <!-- <th style="padding:20px !important;">Status</th> -->
                            <th style="padding:20px !important;">Actions</th>
                          </tr>
                 </tr>
                 </thead>
             <tbody>
             <?php  
             
               //select data


               $request_id = $_REQUEST['request_id'];

               $select = mysqli_query($conn,"select * from donor join request on donor.donor_id=request.donor_id where request_id='$request_id'");
                  
               $row=mysqli_fetch_array($select);

                     
               ?>

                  <tr>
                    <!-- <td style="text-align:center;padding:20px !important"><?php //echo $counter;  ?></td>
                    <?php //$counter++; ?>
                    <td style="text-align:center;padding:20px !important"><?php //echo $row['donor_name'] ;?></td>
                    <td style="text-align:center;padding:20px !important"><?php //echo $row['reason'] ;?></td> -->
                    <td style="text-align:center;padding:20px !important"><?php echo $row['blood_group'] ;?></td>
                    <!-- <td style="text-align:center;padding:20px !important"><?php //echo $row['h_condition'] ;?></td> -->
                    <td style="text-align:center;padding:20px !important"><?php echo $row['unit'].' Ml';?></td>
                    <td style="text-align:center;padding:20px !important">
                    <?php 
                    
                    $blooood = $row['blood_group'];
                    
                    //echo $blooood;
                    
                    $selecct = mysqli_query($conn,"select * from blood_store where blood_group='$blooood'");
    
                   
                    if(mysqli_num_rows($selecct)> 0){

                      $see = mysqli_fetch_array($selecct);
                      echo $see['quantity'];

                      $blood_id = $see['blood_id'];
                    }
                    else{

                         echo 0;
                    }
                    




                    
                    
                    ?></td>
                    <!-- <td style="text-align:center;padding:20px !important"><?php //echo $row['status'] ;?></td> -->
                    <td style="text-align:center;padding:20px !important"> 
                      <button class="btn btn-primary">
                        
                      <a href="approve1.php?blood_id=<?php echo $blood_id; ?>" style="color:white;text-decoration:none;">Approve Request</a></button>
                  </td>
                  </tr>  
                     
             </tbody>
</table>
                        
   </div>



  </div>
</div>
</body>
</html>