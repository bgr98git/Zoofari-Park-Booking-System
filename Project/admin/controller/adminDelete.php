<?php

    include_once "../config/db_connect.php";
    
    $id=$_REQUEST["uid"];
	echo $id;
    $query="DELETE FROM user_rajister where uid='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo '<script>alert("deleted")</script>';
			echo '<script>window.location.href = "../index.php";</script>';
    }
    else{
        echo"Not able to delete";
    }
    
?>