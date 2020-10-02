<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1 align="center">Home Page</h1>
        <?php
        
        include_once 'conn.php';
        $email = $_SESSION['$e_email'];

        $select =  "SELECT * FROM users WHERE email='$email' ";
        $query = mysqli_query($conn,$select);
        $fetch = mysqli_fetch_array($query);
        $my_id = $fetch['id'];
        $_SESSION['$i_id'] = $fetch['id'];
        echo "<h3>ID : ".$fetch['id']."</h3>";
        echo "<h3>Name : ".$fetch['name']."</h3>";
        echo "<h3>Email : ".$fetch['email']."</h3>";
    ?>
        <a href="logout.php">Logout</a>
       
            <table border="3" align = "center">
                     <tr>
                        <td align="center" colspan="3"> People You May Know</td>
                    </tr>
                    
                    
                        <?php
                            
                             $select1 = "SELECT *FROM users";
                             $query1 = mysqli_query($conn,$select1);
                             while ($fetch1 = mysqli_fetch_array($query1)) { 
                        ?>
                             <tr>
                                <td><?php echo $fetch1['name']; ?></td>
                                <td><?php echo $fetch1['email']; ?></td>
                                <td><a href="tr.php?id=<?php echo $fetch1['id']; ?>">Add Friend</a></td>
                             </tr>
                        <?php } ?>    
            </table>  <br/> 
                            

            <table border="2" align="left">
                    <tr>
                        <td colspan="3" align="center">Sent Requests</td>
                    </tr>
                    
                        <?php
                        
                            $my_select = "SELECT *FROM friends";
                            $my_query = mysqli_query($conn,$my_select);
                            while ($my_fetch = mysqli_fetch_array($my_query)) {

                                if ($my_fetch['friend_one']==$my_id AND $my_fetch['status']=='0') {
                                    
                                    $pending = $my_fetch['friend_two'];
                                    $select = "SELECT *FROM users where id='$pending' ";
                                    $p_query = mysqli_query($conn,$select);
                                    
                                    while($p_fetch = mysqli_fetch_array($p_query)){
                                        echo "<tr>";
                                        echo "<td> Name :".$p_fetch['name']."</td>";
                                        echo "<td> Email :".$p_fetch['email']."</td>";
                                        echo "<td>Friend Request Send</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            
                        ?>
                    
            </table>

            <table border="2" align="right">
                    <tr>
                        <td colspan="3" align="center">Requests</td>
                    </tr>
                    <tr>
                        <?php
                        
                           $my_select2 = "SELECT *FROM friends";
                           $my_query2 = mysqli_query($conn,$my_select2);
                           while ($my_fetch2 = mysqli_fetch_array($my_query2)) {
                                if ($my_fetch2['friend_two']==$my_id AND $my_fetch2['status']==0) {

                                    $pending2 = $my_fetch2['friend_one'];
                                    $my_select3 = "SELECT *FROM users WHERE id='$pending2'";
                                    $my_query3 = mysqli_query($conn,$my_select3);
                                    while ($my_fetch3 = mysqli_fetch_array($my_query3)) {
                                        echo "<td> Name :".$my_fetch3['name']."</td>";
                                        echo "<td> Email :".$my_fetch3['email']."</td>";

                        ?>
                        <td><a href="c_request.php?confirm=<?php echo $pending2 ?>">Confirm Request</a></td>
                        <?php                
                                    }

                                }
                           }
                           
                        ?>
                    </tr>
            </table>
            <table>
                    <tr>
                        <td>Friends</td>
                    </tr>
                    <?php
                    
                        $friends = "SELECT FROM friends ";
                        $f_query = mysqli_query($conn,$friends);
                        while($f_fetch = mysqli_fetch_array($f_query)){
                            echo "<tr>";
                            if ($f_fetch['friend_one']==$my_id AND $f_fetch['status']=='1') {
                                
                                $my_friend = $f_fetch['friend_two'];
                                $fr_select = "SELECT *FROM users where id='$my_friend'";
                                while($fr_fetch = mysqli_fetch_array($fr_select)){
                                    echo "<td>".$fr_fetch['id']."</td>";
                                    echo "<td>".$fr_fetch['name']."</td>";
                                    echo "<td>".$fr_fetch['email']."</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        

                    ?>
            </table>


    </body>
</html>