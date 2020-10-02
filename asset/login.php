<?php
    session_start();
    include_once 'conn.php';
    if (isset($_POST['l_btn'])) {
       $email = $_POST['email2'];
       $pass = $_POST['pass2'];
       $select = "SELECT *FROM users where email='$email' AND pass='$pass' ";
       $query = mysqli_query($conn,$select);
       if ($query) {
           echo "email match";# code...
           $_SESSION['$e_email'] = $email;
           header("location:home.php");
       }else {
           echo "Your account does'nt exist";
           mysqli_error($conn);
       }

        # code...
    }

?>