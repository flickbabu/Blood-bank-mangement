<?php
include_once("includes/dbconnection.php");

$message="";

    $donation_id = $_REQUEST['donation_id'];

    $select = mysqli_query($conn,"select * from donation where donation_id='$donation_id'");

    $row=mysqli_fetch_array($select);


    $blood = $row['blood_group'];

    $amount = $row['unit'];


    // echo $blood;
    // echo $amount;

    //SELECT FROM DATABASE STORE

    $take = mysqli_query($conn,"select * from blood_store where blood_group='$blood'");
    $rowss = mysqli_fetch_array($take);

    $qul = $rowss['quantity'];


    $tol_q = $qul + $amount;

    //echo $tol_q;

    $update = mysqli_query($conn, "update blood_store set quantity='$tol_q' where blood_group='$blood'"); 

    if($update)
	{
	 	$message = "Blood Quantity updated.";
	     header("location:store.php?message=$message");

         //update2

         $update2 = mysqli_query($conn,"update donation set status='Recorded' where blood_group='$blood'");
	 }
	 else
	 {
		$message = "errror";
        header("location:store.php?message=$message");
	}

	//$message = "We are sorry your application could not be successful.";
	 
	// $update = mysqli_query($conn, "update donation set status='Declined' where donation_id='$donation_id'"); 

	// if($update)
	// {
	// 	$message = "Blood Donation Rejected.";
	//     header("location:donations.php?message=$message");
	// }
	// else
	// {
	// 	$message = "errror";
    //     header("location:donations.php?message=$message");
	// }

?>