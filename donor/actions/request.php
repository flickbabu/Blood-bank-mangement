<?php  

include("../includes/dbconnection.php");
$message = "";

if($_POST) {

    $blood_group = $_POST['blood_group'];
    $unit = $_POST['unit'];
    $reason = $_POST['reason'];
    $donor_id = $_POST['donor_id'];  
    $dayin  = $_POST['dayin'];
    $donor_id = $_SESSION['donor_id'];

    //LETS SEE WEATHER WE HAVE PENDING REQUEST PROCESS

    $selectpending = mysqli_query($conn,"select * from request where status='Pending' and donor_id='$donor_id'");

    if(mysqli_num_rows($selectpending)==1){

        $message = "Sorry,You have a pending Blood request process !!!";
        header("location:../request.php?message=$message");
    }
    else
    {
        $insert = mysqli_query($conn,"insert request(blood_group,unit,reason,donor_id,don_date) values ('$blood_group','$unit','$reason','$donor_id','$dayin')");


        if($insert){
                $message = "Blood Request sent successfully...";
                header("location:../request.php?message=$message");
        }
        else{
            $message = "Blood  errrrror";
            header("location:../request.php?message=$message");
        }
    



    }


}
?>