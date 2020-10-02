<?php
    session_start();
    include_once 'conn.php';
    $to_id =  $_GET['id'];
    $from_id = $_SESSION['$i_id'];

    if($to_id == $from_id) {
        echo "you don't send request this person";
        header('refresh:3 url=home.php');
    }
    else {
        $insert = "INSERT INTO friends(friend_one,friend_two,status) Values('$from_id','$to_id','0')";
        $qry = mysqli_query($conn,$insert);
        if ($qry) {
            echo "friend request send and pending for accept";
            header('refresh:3 url=home.php');
        }
    }
    
?>