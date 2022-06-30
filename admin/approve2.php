<?php
include_once("includes/dbconnection.php");

$message="";

// $blooood = $_REQUEST['blood_group'];
$blood_id = $_REQUEST['blood_id'];

//echo $blood_id;

$sel = mysqli_query($conn,"select * from blood_store where blood_id='$blood_id'");

 $row=mysqli_fetch_array($sel);


$myQu= $row['quantity'];

$blood= $row['blood_group'];


$don = mysqli_query($conn,"select * from request_2 where blood_group='$blood'");

$rowd = mysqli_fetch_array($don);


$myunit= $rowd['unit'];

$total = $myQu - $myunit;

echo $total;

$update = mysqli_query($conn, "update blood_store set quantity='$total' where blood_group='$blood'"); 


if($update)
	{
		$message = "Blood Request Approved.";
	    header("location:request2.php?message=$message");

        //update request status

        $update2 = mysqli_query($conn,"update request_2 set status='Approved' where blood_group='$blood'");
	}
	else
	{
		$message = "errror";
        header("location:request2.php?message=$message");
	}



?>
 