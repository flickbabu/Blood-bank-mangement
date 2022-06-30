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
.form-group{

  margin-top:20px !important;
}
.table{
  width:90% !important;
  margin-top:100px !important;
  margin-left:5% !important;
  margin-right:5%!important;
}
h3{
  margin-top:30px !important;
}
.message{
    
    color:green;
    margin-bottom:10px !important;
    text-align:center;
}
</style>
</head>
<body>
<?php  include_once("includes/header.php");  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" style="background-color:black;">
    <p><a style="text-decoration:none;" href="dashboard.php"><i class="fa fa-home"></i> Home</a></p>
    <p><a style="text-decoration:none;" href="donate.php"><i class="fa fa-users"></i> Donate Blood</a></p>
    <p><a style="text-decoration:none;" href="request.php"><i class="fa fa-users"></i> Blood Request</a></p>
    </div>
    <!--MAIN SECTION 2 -->
    <div class="col-sm-10" style="background-color:white;">

          <div class="sub_menu">
            <a href="dashboard.php" style="color:black;"><i class="fa fa-home"></i> </a>
            <?php   
      
                      $email = $_SESSION['email'];


                      $select = mysqli_query($conn,"select * from donor where email='$email'");

                      $rowss=mysqli_fetch_array($select);
      
            ?>
            <h4>Logged In as : <?php  echo $rowss['donor_name'];?></h4>
            </div>
            <center> <h3> Donated Blood Infor </h3></center>    
            <br>
            <br>

               <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal" style="float:right;margin-right:20px !important;border:none;padding:5px !important;">Donate Blood</button>
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
                     <th style="padding:20px !important;text-align:center;">Status</th>
                     <!-- <th style="padding:20px !important;">Action</th> -->
                 </tr>
                 </thead>
             <tbody>
             <?php  
             
               //select data

               $select = mysqli_query($conn,"select * from donor join donation on donor.donor_id=donation.donor_id where email='$email'");

               if(mysqli_num_rows($select) > 0){
                     
                    $counter = 1;
                    while($row=mysqli_fetch_array($select)){
                     
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
                    <td style="text-align:center;padding:20px !important"><?php echo $row['status'] ;?></td>
                  </tr>  

                <?php

                    }
               }
               else{

                 ?>
                   <tr>
                 <td colspan=7 style="text-align:center; font-size:20px !important;">Your have not donated any blood yet</td>
               </tr> 
                 <?php

               }

             ?>
                     
             </tbody>
</table>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-right:50px !important;margin-top:10px !important;">&times;</button>
          <center><h4 class="modal-title" style="padding:20px !important;">Blood Donation Form</h4></center>
        </div>
        <div class="modal-body">
          
        <form class="form-horizontal" id="submitBrandForm" action="actions/donate.php" method="POST">

         <?php  
         
              //SELECT BLOOD GROUP 

           $donor_id = $_SESSION['donor_id'];
           $selgroup = mysqli_query($conn,"select blood_group from donation where donor_id='$donor_id'");

           if(mysqli_num_rows($selgroup)> 0){

                $tak = mysqli_fetch_array($selgroup);

           ?>

              <div class="form-group">

        
                      <label for="staffName" class="col-sm-4 control-label">Blood Group:  </label>
                      <div class="col-sm-6" style="margin-left:20px !important;">
                        <input type="text" class="form-control" id="staffName" value="<?php echo $tak['blood_group']; ?>" name="blood_group" autocomplete="off" readonly>
                      </div>
          
               </div> <!-- /form-group--> 

          <?php
           }else{

             ?>

                
                <div class="form-group">
                        <label for="staffName" class="col-sm-4 control-label">Blood Group: </label>
                        <div class="col-sm-6" style="margin-left:20px !important;">
                        <select name="blood_group" id="" class="form-control" required>
                            <option value="">~~~ SELECT BLOOD GROUP ~~~ </option>
                            <option value="O +">O + </option>
                            <option value="O -">O - </option>
                            <option value="A +">A + </option>
                            <option value="A -">A - </option>
                            <option value="B +">B + </option>
                            <option value="B -">B - </option>
                            <option value="AB +">AB + </option>
                            <option value="AB -">AB - </option>
                        </select>
                    </div>

              </div> <!-- /form-group--> 

           <?php
           }
         
         
         ?>
        <div class="form-group">

        
            <label for="staffName" class="col-sm-4 control-label">Unit (In Ml):  </label>
            <div class="col-sm-6" style="margin-left:20px !important;">
              <input type="number" class="form-control" id="staffName" placeholder="Blood Unit (Ml)" name="unit" autocomplete="off" required="">
            </div>
          
          </div> <!-- /form-group--> 

          <div class="form-group">

        
            <label for="staffName" class="col-sm-4 control-label">Disease if any ? : </label>
            <div class="col-sm-6" style="margin-left:20px !important;">
              <input type="text" class="form-control" id="staffName" value="Nothing" name="condition" autocomplete="off" required="">
            </div>
          
          </div> <!-- /form-group--> 
          <input type="hidden" name="donor_id" value="<?php  echo $rowss['donor_id'];?>">
          <input type="hidden" name="dayin" value="<?php echo date('m') .'/ '.date('d').'/ '.date('Y'); ?>">
           <br>
          <br>

        </div>
        <div class="modal-footer"><br>
        <br>
          <button type="submit" class="btn btn-primary" style="padding:10px !important;margin-right:100px !important;margin-bottom:50px !important;">Donate</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="padding:10px !important;margin-right:150px !important;margin-bottom:50px !important;">Close</button>
          
        </div>
        </form>
      </div>
    </div>
  </div>


   </div>



  </div>
</div>
</body>
</html>