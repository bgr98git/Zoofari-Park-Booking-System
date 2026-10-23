<?php 
  include_once "../config/db_connect.php";
  if(isset($_POST["upload"]))
  {
		$cat_id=$_POST['cid'];
		$cat_nm=$_POST['cname'];
		
       $qry = "UPDATE category SET 
      		    category_name='$cat_nm'
                WHERE category_id='$cat_id'";
   


		
		$res=mysqli_query($conn,$qry);
		
		if($res)
		{
		   echo '<script>alert("updated")</script>';
           echo '<script>window.location.href = "../index.php";</script>';
		}
		else
		{
		
		   echo mysqli_error($conn);
		}
   }
?>
