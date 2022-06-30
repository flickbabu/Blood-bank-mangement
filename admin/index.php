<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
	<link rel="stylesheet" href="../css/style.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
html, body{

display: grid;
height: 100%;
place-items: center;
background:red;
}
.message{
    
      color:green;
      margin-bottom:10px !important;
      text-align:center;
}
</style>
</head>
<body>
<main>
<div class="form-wrapper">

<div class="title"><br>
<i class="fa fa-user-circle" aria-hidden="true" style='font-size:48px;color:red;'></i>
<center><h5 style="margin-top:15px !important;">ADMIN LOGIN</h5></center>
</div>

 <form action="actions/index.php" method="post">
                 
                   <?php
	                           
	                           if(isset($_REQUEST['message']))

	                          {
		                         
		                              $message = $_REQUEST['message'];

		                              echo "<p class='message'>".$message."</p>";
		                     
	                          }
                         ?>
 <div class="row">
    <i class='fa fa-user'></i>
	 <input type="text" placeholder="ENTER USERNAME" name="username">
 </div>

 <div class="row">
	<i class="fa fa-lock"></i>
	<input type="password" placeholder="PASSWORD" name="password">
 </div>

 <div class="row button">

	<input type="submit" value="Sign In">
 </div>

 <div class="pass"><a href="../index.php">Home</a></div>



 </form>
</div>
</main>
</body>
</html>