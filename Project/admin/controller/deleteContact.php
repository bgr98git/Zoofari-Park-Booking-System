<?php

    include_once "../config/db_connect.php";
    
    $cid=$_REQUEST['cid'];
    $query="DELETE FROM contact where con_id='$cid'";

    $data=mysqli_query($conn,$query);

    if($data){
       echo '<script>alert("contact Deleted")</script>';
            echo '<script>window.location.href = "../index.php";</script>';
    }
    else{
        echo"Not able to delete";
    }
    
?>