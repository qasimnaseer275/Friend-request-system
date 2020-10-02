<?php
    include_once 'conn.php';
    if (isset($_POST['r_btn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $_SESSION['$e_eamil'] = $email;

       $insert = "INSERT INTO users(name,email,pass) Values('$name','$email','$pass')";
       $exe = mysqli_query($conn,$insert);

       if ($exe) {
        $select = "SELECT *FROM users where email='$email' ";
        $query = mysqli_query($conn,$select);
        $fetch = mysqli_fetch_array($query);
        $id = $fetch['id'];
    
        $insert2 = "INSERT INTO friends(friend_one,friend_two,status) Values('$id','$id','2')";
        $qry = mysqli_query($conn,$insert2);
            if($qry) {
            echo "You register successfully";
            header('refresh:3 url=../index.php');
            }
       }
    }

?> 