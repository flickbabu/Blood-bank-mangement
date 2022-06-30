<?php   

include("../includes/dbconnection.php");

$message="";

if($_POST){

            $fullname = $_POST['fullname'];
            $gender = $_POST['gender'];
            $dbirth = $_POST['dbirth'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $cpwd = $_POST['cpwd'];
            $encryptancy = base64_encode($pwd);

    //LETS MAKE EMAIL UNIQUE

    $checkemail = mysqli_query($conn,"select * from donor where email='$email'");

    if(mysqli_num_rows($checkemail)==1){

        $message = "Email already exists.";
        header("location:../signup.php?message=$message");
    }
    elseif($pwd != $cpwd ){

        $message = "Sorry, Your password do not Match";
        header("location:../signup.php?message=$message");
         
    }
    else{

          //INSERT INTO DATABASE

          $insert = mysqli_query($conn,"insert into donor(donor_name,gender,age,phone,address,email,password) values('$fullname','$gender','$dbirth','$contact','$address','$email','$encryptancy')");

          if($insert){
            $message = "Registration was successful...";
            header("location:../index.php?message=$message");
          }
          else{
            $message = "errrror...";
            header("location:../signup.php?message=$message");
          }
    }

}



?>