<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ACCOUNT | DONOR </title>

<!-- bootstrap -->
	<link rel="stylesheet" href="../assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="../assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="../assests/font-awesome/css/font-awesome.min.css">

  <!-- style css -->
  <link rel="stylesheet" href="../css/style.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">

	<script src="../assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
  <script src="../assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="../assests/bootstrap/js/bootstrap.min.js"></script>
<style>
/*MAIN*/
main{
	float: left;
	width: 75% ;
	margin-left: 12.5% !important;
	background: #f7f9fc;
	padding: 20px !important;
}
.form-group{
    margin-top:20px !important;
}
form .btn{
    padding:10px !important;
}
.message{
    
    color:green;
    margin-bottom:10px !important;
    text-align:center;
}
</style>
</head>
<body>

                <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white;padding:20px !important;"><i class="fa fa-heartbeat"></i>&nbsp; BLOOD BANK MANAGEMENT SYSTEM</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php"> <i class="fa fa-home"></i>&nbsp;  Home</a></li>
                    <li><a href="../patient/index.php"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp; Patient</a></li>
                    <li><a href="index.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Donor</a></li>
                    <li><a href="../admin/index.php"> <i class="fa fa-user"></i>&nbsp;Admin</a></li>
                    </ul>
                </div>
                </nav>

<main>
                <form action="actions/signup.php" method="post">
                          <center><h4>Donor Signup Form</h4></center><br>

                          <?php
	                           
	                           if(isset($_REQUEST['message']))

	                          {
		                         
		                              $message = $_REQUEST['message'];

		                              echo "<p class='message'>".$message."</p>";
		                     
	                          }
                         ?>
                    
                    <div class="form-group">
                        <label for="fullnames">Fullnames:</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter your fullnames" name="fullname" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">~~~ SELECT GENDER ~~~ </option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date of birth">Your Age:</label>
                        <input type="number" class="form-control" id="dbirth" placeholder="Enter your Age " name="dbirth" required>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="number" class="form-control" id="contact" placeholder="Enter your phone number" name="contact" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                    </div>
                    
                    <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>

                    <div class="form-group">
                          <label for="pwd">Confirm Password:</label>
                          <input type="password" class="form-control" id="cpwd" placeholder="Confirm your password" name="cpwd">
                    </div><br>
                    <br>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
</main>
</body>
</html>