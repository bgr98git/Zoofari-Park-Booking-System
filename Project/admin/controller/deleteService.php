<?php

    include_once "../config/db_connect.php";
    
    $s_id=$_REQUEST['sid'];
    $query="DELETE FROM services where s_id='$s_id'";

    $data=mysqli_query($conn,$query);

    if($data){
       echo '<script>alert("Services Deleted")</script>';
            echo '<script>window.location.href = "../index.php";</script>';
    }
    else{
        echo"Not able to delete";
    }
    
?>