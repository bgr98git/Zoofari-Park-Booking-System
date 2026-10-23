<?php

    include_once "../config/db_connect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM packages where pid='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>