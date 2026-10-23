<?php

    include_once "../config/db_connect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM pkg_detail where de_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"variation Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>