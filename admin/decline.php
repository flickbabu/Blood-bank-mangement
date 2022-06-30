<?php
include_once("includes/dbconnection.php");

$message="";

    $donation_id = $_REQUEST['donation_id'];
	//$message = "We are sorry your application could not be successful.";
	 
	$update = mysqli_query($conn, "update donation set status='Declined' where donation_id='$donation_id'"); 

	if($update)
	{
		$message = "Blood Donation Rejected.";
	    header("location:donations.php?message=$message");
	}
	else
	{
		$message = "errror";
        header("location:donations.php?message=$message");
	}

?>