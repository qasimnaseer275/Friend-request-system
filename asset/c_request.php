<?php

    session_start();
    include_once 'conn.php';
    $friend_one = $_GET['confirm'];
    $my_id = $_SESSION['$i_id'];//which is friend_two
    $updt = "UPDATE friends SET status='1' WHERE friend_one='$friend_one' AND friend_two='$my_id' ";
    $query = mysqli_query($conn,$updt);
    if ($query) {
        echo "Friend request accepted";
        header('refresh:3 url=home.php');
    }

?>