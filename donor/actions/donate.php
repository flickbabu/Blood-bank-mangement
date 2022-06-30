<?php

include("../includes/dbconnection.php");
$message = "";

if($_POST) {

    $blood_group = $_POST['blood_group'];
    $unit = $_POST['unit'];
    $condition = $_POST['condition'];
    $donor_id = $_POST['donor_id'];  
    $dayin  = $_POST['dayin'];
    $donor_id = $_SESSION['donor_id'];

    //LETS SEE WEATHER WE HAVE PENDING DONATION PROCESS

    $selectpending = mysqli_query($conn,"select * from donation where status='Pending' and donor_id='$donor_id'");

    if(mysqli_num_rows($selectpending)==1){

        $message = "Sorry,You have a pending Blood donation process !!!";
        header("location:../donate.php?message=$message");
    }
    else{

                //INSERT INTO

                    $insert = mysqli_query($conn,"insert into donation (blood_group,unit,h_condition,donor_id,don_date) values ('$blood_group','$unit','$condition','$donor_id','$dayin')");


                    if($insert){
                            $message = "Blood Donation recorded successfully...";
                            header("location:../donate.php?message=$message");
                    }
                    else{
                        $message = "Blood Donation errrrror";
                        header("location:../donate.php?message=$message");
                    }

    }


}
?>